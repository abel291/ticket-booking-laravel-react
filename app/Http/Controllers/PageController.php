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

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Enum;

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
    
}
