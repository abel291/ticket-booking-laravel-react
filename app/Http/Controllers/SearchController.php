<?php

namespace App\Http\Controllers;


use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        //dd($request->all());
        $events = Event::query();
        $events->where('active', true)
            ->with('session', 'location');

        if ($request->search) {
            $events->where('name', 'like', "%" . $request->search . "%");
        }

        if ($request->type && $request->type != "all") {
            $events->where('type', $request->type);
        }

        if ($request->date) {
            $events->whereRelation('sessions', 'date', '=', $request->date);
        }

        $paginate = $request->perPage ?: 12;

        $filters = $request->only('search', 'type', 'date');

        $events = $events->paginate($paginate)->appends($filters);
        //dd(EventResource::collection($events));
        return Inertia::render('EventSearch/EventSearch', [
            "items" => EventResource::collection($events),
            'filters' => $filters,
        ]);
    }
}
