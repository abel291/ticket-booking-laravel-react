<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Format;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
        $events->has('session')->with(['session', 'location', 'ticket_default_price']);

        if ($request->categories && array_filter($request->categories)) {
            $events->whereHas('category', function (Builder $query) use ($request) {
                $query->whereIn('slug', $request->categories);
            });
        }

        if ($request->formats && array_filter($request->formats)) {
            $events->whereHas('format', function (Builder $query) use ($request) {
                $query->whereIn('slug', $request->formats);
            });
        }

        if ($request->price) {
            $events->whereHas('ticket_types', function (Builder $query) use ($request) {
                switch ($request->price) {
                    case 'free':
                        $query->where('type', 'free');
                        break;
                    case '0-20':
                        $query->where('price', '<=', 20);
                        break;

                    case '20-40':
                        $query->whereBetween('price', [20, 40]);
                        break;

                    case '40-60':
                        $query->whereBetween('price', [40, 60]);
                        break;

                    case '60-80':
                        $query->whereBetween('price', [60, 80]);
                        break;

                    case '80-100':
                        $query->whereBetween('price', [80, 100]);
                        break;

                    case '100++':
                        $query->where('price', '>', 100);
                        break;
                    default:
                        break;
                }
            });
        }

        if ($request->search) {
            $events->where('title', 'like', '%'.$request->search.'%');
        }

        if ($request->date) {
            $events->whereRelation('sessions_available', 'date', $request->date);
        }

        $paginate = $request->perPage ?: 12;

        $filters = $request->only(
            'categories',
            'price',
            'perPage',
            'order',
            'search',
            'date',
            'formats'
        );
        $events = $events->paginate($paginate)->appends($filters);

        return Inertia::render('Filters/Filters', [
            'events' => EventResource::collection($events),
            'formats' => CategoryResource::collection(Format::active()->get()),
            'filters' => $filters,
        ]);
    }

    public function event_details(Event $event)
    {
        $event->load(['location', 'session', 'sessions', 'ticket_types', 'speakers', 'images']);
        //dd($event->images);
        return Inertia::render('EventDetails/EventDetails', [
            'event' => new EventResource($event),
        ]);
    }
}
