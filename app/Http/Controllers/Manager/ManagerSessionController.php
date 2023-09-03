<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\SessionResource;
use App\Http\Resources\TicketTypeResource;
use App\Models\Event;
use App\Models\Session;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManagerSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($event_id)
    {
        $event = Event::select('id', 'title', 'slug', 'thum', 'user_id', 'category_id', 'sub_category_id', 'updated_at')
            ->where('user_id', auth()->user()->id)
            ->with('category:id,name')
            ->with('subCategory:id,name')
            ->findOrFail($event_id);

        $sessions = $event->sessions()->select('id', 'date', 'active', 'updated_at')
            ->with('ticket_types:id,name,type,price')
            ->orderBy('id', 'desc')
            ->paginate(20);

        //dd($sessions);

        return Inertia::render('Manager/Session/SessionList', [
            'event' => new EventResource($event),
            'sessions' => $sessions,
            'eventId' => $event_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($event_id)
    {
        $ticket_types = TicketType::select('id', 'name', 'type', 'price', 'quantity', 'updated_at')->active()->where('event_id', $event_id)->get();
        return Inertia::render('Manager/Session/SessionCreate', [
            'session' => new Session(Session::factory()->make()->toArray()),
            'ticketTypes' => TicketTypeResource::collection($ticket_types),
            'ticket_type_selected' => [],
            'edit' => false,
            'eventId' => $event_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionRequest $request, $event_id)
    {

        $validated = $request->validated();
        $session = new Session($validated);
        $session->event_id = $event_id;
        $session->user_id = auth()->user()->id;
        $session->save();

        $ticket_type_selected = TicketType::whereHas('event', function ($query) use ($event_id) {
            $query->where('id', $event_id);
            $query->where('user_id', auth()->user()->id);
        })->whereIn('id', $request->ticket_type_selected)->pluck('id');

        $session->ticket_types()->sync($ticket_type_selected);
        return  to_route('manager.events.sessions.index', $event_id)->with(['success' => 'Registro guardado']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $event_id, string $id)
    {
        $session = Session::whereHas('event', function ($query) use ($event_id) {
            $query->where('id', $event_id);
            $query->where('user_id', auth()->user()->id);
        })->with('ticket_types')->findOrFail($id);

        //dd($session->ticket_types);

        $ticket_types = TicketType::select('id', 'name', 'type', 'price', 'quantity', 'updated_at')->active()->where('event_id', $event_id)->get();
        return Inertia::render('Manager/Session/SessionCreate', [
            'session' => new SessionResource($session),
            'edit' => true,
            'ticketTypes' => TicketTypeResource::collection($ticket_types),
            'ticket_type_selected' => $session->ticket_types->pluck('id'),
            'edit' => true,
            'eventId' => $event_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SessionRequest $request, $event_id, string $id)
    {

        $session = $session = Session::whereHas('event', function ($query) use ($event_id) {
            $query->where('id', $event_id);
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id);

        $session->active = $request->active;
        $session->date = $request->date;
        $session->save();

        $ticket_type_selected = TicketType::whereHas('event', function ($query) use ($event_id) {
            $query->where('id', $event_id);
            $query->where('user_id', auth()->user()->id);
        })->whereIn('id', $request->ticket_type_selected)->pluck('id');

        $session->ticket_types()->syncWithoutDetaching($ticket_type_selected);

        return  to_route('manager.events.sessions.index', $event_id)->with(['success' => 'Registro guardado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $event_id, string $id)
    {
        $session = $session = Session::whereHas('event', function ($query) use ($event_id) {
            $query->where('id', $event_id);
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id);

        $session->delete();
        return  to_route('manager.events.sessions.index', $event_id)->with(['success' => 'Registro Eliminado']);
    }
}
