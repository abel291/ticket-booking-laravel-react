<?php

namespace App\Http\Controllers;

use App\Enums\EventTypes;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Models\Category;
use App\Models\Event;
use App\Models\Format;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Enum;
use Inertia\Inertia;

class EventController extends Controller
{
    public function events(Request $request)
    {

        // $request->validate([
        //     'categories.*' => 'sometimes|nullable|exists:categories,slug',
        //     'priceMin' => 'sometimes|nullable|numeric',
        //     'priceMax' => 'sometimes|nullable|numeric',
        //     'perPage' => 'sometimes|in:12,24,32|numeric',
        //     'search' => 'sometimes|string|',
        // ]);

        $events = Event::query();
        $events->active()
            ->has('session')
            ->with('session', 'location');
            

        if ($request->categories && array_filter($request->categories)) {
            $events->whereHas('category', function (Builder $query) use ($request) {
                $query->whereIn('slug', $request->categories);
            });
        }
        // elseif ($request->category) {
        //     $events->whereHas('category', function (Builder $query) use ($request) {
        //         $query->where('slug', $request->category);
        //     });            
        // }

        if ($request->formats && array_filter($request->formats)) {
            $events->whereHas('format', function (Builder $query) use ($request) {
                $query->whereIn('slug', $request->formats);
            });
        }

        if ($request->priceMin) {
            $events->whereHas('ticket_types', function (Builder $query) use ($request) {
                $query->where('price', '>=', $$request->priceMin);
            });
        }

        if ($request->priceMax) {
            $events->whereHas('ticket_types', function (Builder $query) use ($request) {
                $query->where('price', '<=', $$request->priceMax);
            });
        }

        if ($request->search) {
            $events->where('title', 'like', "%" . $request->search . "%");
        }

        if ($request->date) {
            $events->whereRelation('sessions', 'date', '=', $request->date);
        }

        $paginate = $request->perPage ?: 12;

        $filters = $request->only('categories', 'priceMin', 'priceMax', 'perPage', 'order', 'search', 'date', 'formats');
        $events = $events->paginate($paginate)->appends($filters);
        
        return Inertia::render('Filters/Filters', [
            "events" => EventResource::collection($events),
            "formats" => CategoryResource::collection(Format::active()->get()),
            'filters' => $filters,
        ]);
    }

    public function event_details(Event $event)
    {
        $event->load('location', 'session', 'sessions', 'ticket_types','speakers');        
        return Inertia::render('EventDetails/EventDetails', [
            'event' => new EventResource($event)
        ]);
    }
}

//responsive event details , agrega campos db speakers
