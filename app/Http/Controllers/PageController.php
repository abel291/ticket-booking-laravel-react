<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
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

        $home_categories = Category::where('type', CategoryType::EVENT)->active()->where('home', true)->has('events.session')
            ->with(['events' => function ($query) {
                $query->with('session', 'location')->active()->limit(8);
            }])->take(4)->get();


        //dd($categories[2]->events);
        return Inertia::render('Home/Home', [
            "homeCategories" => CategoryResource::collection($home_categories),
        ]);
    }
    function search(){
        
    }
}
