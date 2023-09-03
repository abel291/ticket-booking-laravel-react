<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\LocationResource;
use App\Models\Category;
use App\Models\Event;
use App\Models\Location;
use App\Services\EventService;
use App\Traits\TraitUploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ManagerEventController extends Controller
{
    use TraitUploadImage;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = auth()->user()->events()->select('id', 'title', 'slug', 'thum', 'status', 'active', 'updated_at', 'user_id', 'category_id', 'sub_category_id')
            ->where('title', 'like', '%' . $request->search . '%')
            ->with('category', 'subCategory', 'ticket_types')
            //->withSum('ticket_types', 'quantity') //ticket_types_sum_quantity
            ->orderBy('id', 'desc')
            ->paginate(20);

        $events->getCollection()->transform(function ($event) {
            $event->ticket_types_sum = $event->ticket_types->sum('quantity');
            $event->ticket_sales_sum = $event->ticket_types->sum('ticket.sales');
            return $event;
        });

        return Inertia::render('Manager/Events/EventsList', [
            'events' => EventResource::collection($events),
            'filters' => $request->only('search')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = auth()->user()->locations()->select('name', 'address', 'id')->get();
        $categories = Category::with('subCategories')->whereNull('category_id')->get();

        return Inertia::render('Manager/Events/EventsCreate', [
            'locations' => LocationResource::collection($locations),
            'categories' => CategoryResource::collection($categories),
            'edit' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventStoreRequest $request)
    {
        $validated = $request->safe()->except(['card', 'thum', 'banner']);
        $event = new Event($validated);
        $event->slug = Str::slug($event->slug);
        $event->user_id = auth()->user()->id;
        $event->category_id = Category::with('category')->find($request->sub_category_id)->category->id;

        if ($request->card) {
            $event->card = $this->upload_image($event->title, 'events/card', $request->card);
        }

        if ($request->thum) {
            $event->thum = $this->upload_image($event->title, 'events/thum', $request->thum);
        }

        if ($request->banner) {
            $event->banner = $this->upload_image($event->title, 'events', $request->banner);
        }

        $event->save();

        return  to_route('manager.events.index')->with(['success' => 'El evento fue creado , ahora puede agregarle las session y los tipos de boleto']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = auth()->user()->events()->findOrFail($id);
        $locations = auth()->user()->locations()->select('name', 'address', 'id')->get();
        $categories = Category::with('subCategories')->whereNull('category_id')->get();

        return Inertia::render(
            'Manager/Events/EventsCreate',
            [
                'locations' => LocationResource::collection($locations),
                'categories' => CategoryResource::collection($categories),
                'edit' => true,
                'event' => $event
            ]
        );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EventStoreRequest $request, string $id)
    {
        $validated = $request->safe()->except(['card', 'thum', 'banner']);
        $event = auth()->user()->events()->findOrFail($id)->fill($validated);
        $event->slug = Str::slug($event->slug);
        $event->category_id = Category::with('category')->find($request->sub_category_id)->category->id;

        if ($request->card) {
            $event->card = $this->upload_image($event->title, 'events/card', $request->card);
        }

        if ($request->thum) {
            $event->thum = $this->upload_image($event->title, 'events/thum', $request->thum);
        }

        if ($request->banner) {
            $event->banner = $this->upload_image($event->title, 'events', $request->banner);
        }

        $event->save();

        return  to_route('manager.events.index')->with(['success' => 'El evento fue Editado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = auth()->user()->events()->findOrFail($id);
        Storage::delete([$event->card, $event->banner, $event->thum]);
        $event->delete();
        return  to_route('manager.events.index')->with(['success' => 'Evento Eliminado']);
    }
}
