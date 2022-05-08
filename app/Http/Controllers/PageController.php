<?php

namespace App\Http\Controllers;

use App\Enums\EventTypes;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;

class PageController extends Controller
{
    public function home()
    {
        $data  = Event::where('active', true)
            ->has('session')
            ->with('session', 'location')
            ->get();

        $events = $data->where('type', EventTypes::EVENT)->take(8);
        $movies = $data->where('type', EventTypes::MOVIE)->take(8);
        $sports = $data->where('type', EventTypes::SPORT)->take(8);

        return Inertia::render('Home/Home', [
            "events" => EventResource::collection($events),
            "movies" => EventResource::collection($movies),
            "sports" => EventResource::collection($sports),
        ]);
    }
    public function movies(Request $request)
    {

        $filters = $request->validate([
            'categories.*' => 'sometimes|nullable|exists:categories,slug',
            'priceMin' => 'sometimes|nullable|numeric',
            'priceMax' => 'sometimes|nullable|numeric',
            'perPage' => 'sometimes|in:12,24,32|numeric',
        ]);


        $movies = Event::query();
        $movies->where('active', true)->where('type', EventTypes::MOVIE)
            ->has('session')
            ->with('session', 'location','category');


        if (array_key_exists('categories', $filters) && $filters['categories']) {

            $filter_categories = $filters['categories'];
            $movies->whereHas('category', function (Builder $query) use ($filter_categories) {
                $query->whereIn('slug', $filter_categories);
            });
        }

        if (array_key_exists('priceMin', $filters) && $filters['priceMin']) {
            $filter_price_min = $filters['priceMin'];
            $movies->whereHas('ticket_types', function (Builder $query) use ($filter_price_min) {
                $query->where('price', '>=', $filter_price_min);
            });
        }

        if (in_array('priceMax', $filters) && $filters['priceMax']) {
            $filter_price_max = $filters['priceMax'];
            $movies->whereHas('ticket_types', function (Builder $query) use ($filter_price_max) {
                $query->where('price', '<=', $filter_price_max);
            });
        }

        if (array_key_exists('perPage', $filters) && $filters['perPage']) {

            $paginate = $filters['perPage'];
        } else {
            $paginate = 12;
        }

        $movies = $movies->paginate($paginate);

        $categories = Category::where('active', true)->get();

        return Inertia::render('Movies/Movies', [
            "movies" => EventResource::collection($movies),
            "categories" => CategoryResource::collection($categories),
            'filters' => $request->only('categories', 'priceMin', 'priceMax', 'perPage', 'order')
        ]);
    }
}
