<?php

namespace App\Http\Controllers;

use App\Enums\EventTypes;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Enum;
use Inertia\Inertia;

class EventController extends Controller
{
    public function events(Request $request)
    {

        $request->validate([
            'categories.*' => 'sometimes|nullable|exists:categories,slug',
            'priceMin' => 'sometimes|nullable|numeric',
            'priceMax' => 'sometimes|nullable|numeric',
            'perPage' => 'sometimes|in:12,24,32|numeric',
            'search' => 'sometimes|in:12,24,32|numeric',
        ]);

        switch (Route::currentRouteName()) {
            case 'movies':
                $type = EventTypes::MOVIE;
                break;
            case 'events':
                $type = EventTypes::EVENT;
                break;
            case 'sports':
                $type = EventTypes::SPORT;
                break;
        }

        $events = Event::query();
        $events->where('active', true)
            ->has('session')
            ->with('session', 'location')
            ->where('type', $type);

        if ($request->categories && array_filter($request->categories)) {
            $events->whereHas('category', function (Builder $query) use ($request) {
                $query->whereIn('slug', $request->categories);
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
        $paginate = $request->perPage ?: 12;

        $filters = $request->only('categories', 'priceMin', 'priceMax', 'perPage', 'order');
        $events = $events->paginate($paginate)->appends($filters);;

        $categories = Category::where('active', true)->get();
        //$categories = Category::where('active', true)->where('type', $type )->get();


        return Inertia::render('Filters/Filters', [
            "items" => EventResource::collection($events),
            "categories" => CategoryResource::collection($categories),
            'filters' => $filters,
            'title' => $type->title(),
            'type' => $type->value
        ]);
    }
    public function movies(Request $request)
    {

        $request->validate([
            'categories.*' => 'sometimes|nullable|exists:categories,slug',
            'priceMin' => 'sometimes|nullable|numeric',
            'priceMax' => 'sometimes|nullable|numeric',
            'perPage' => 'sometimes|in:12,24,32|numeric',
            'search' => 'sometimes|in:12,24,32|numeric',
        ]);

        $movies = Event::query();
        $movies->where('active', true)
            ->has('session')
            ->with('session', 'location')
            ->where('type', EventTypes::MOVIE);

        $movies = $this->FiltersSearch($movies, $request);

        $categories = Category::where('active', true)->get();
        //$categories = Category::where('active', true)->where('type', $type )->get();

        return Inertia::render('Movies/Movies', [
            "items" => EventResource::collection($movies),
            "categories" => CategoryResource::collection($categories),
            'filters' => $request->only('categories', 'priceMin', 'priceMax', 'perPage', 'order'),
        ]);
    }
    public function FiltersSearch($model, $request)
    {
        if ($request->categories && array_filter($request->categories)) {
            $model->whereHas('category', function (Builder $query) use ($request) {
                $query->whereIn('slug', $request->categories);
            });
        }

        if ($request->priceMin) {
            $model->whereHas('ticket_types', function (Builder $query) use ($request) {
                $query->where('price', '>=', $$request->priceMin);
            });
        }

        if ($request->priceMax) {
            $model->whereHas('ticket_types', function (Builder $query) use ($request) {
                $query->where('price', '<=', $$request->priceMax);
            });
        }
        $paginate = $request->perPage ?: 12;


        return $model->paginate($paginate);
    }
}
