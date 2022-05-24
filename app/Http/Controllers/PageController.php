<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;

use App\Http\Resources\CategoryResource;

use App\Models\Category;

use Inertia\Inertia;


class PageController extends Controller
{
    public function home()
    {

        $home_categories = Category::where('type', CategoryType::EVENT)
            ->active()
            ->where('home', true)
            ->has('events.session')
            ->with(['events' => function ($query) {
                $query->with('session', 'location')->active()->limit(8);
            }])->take(4)->get();


        //dd($categories[2]->events);
        return Inertia::render('Home/Home', [
            "homeCategories" => CategoryResource::collection($home_categories),
        ]);
    }
    function search()
    {
    }
}
