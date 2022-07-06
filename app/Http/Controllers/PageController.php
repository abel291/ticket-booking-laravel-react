<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Models\Category;
use App\Models\Event;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        $carousel = Event::where('home', true)->has('session')->get()->random(10);

        $featured = Event::has('session')->with('session', 'category', 'location')->get()->random(8);

        $free = Event::has('session')->with('session', 'category', 'location')->whereRelation('ticket_types', 'type', 'free')->get()->random(8);

        $home_categories = Category::where('type', CategoryType::EVENT)->get();

        return Inertia::render('Home/Home', [
            'eventsCarousel' => EventResource::collection($carousel),
            'eventsFeacture' => EventResource::collection($featured),
            'eventsFree' => EventResource::collection($free),
            'categories' => CategoryResource::collection($home_categories),
        ]);
    }

    public function privacy_policy()
    {
        return Inertia::render('PrivacyPolicy/PrivacyPolicy');
    }

    public function about_us()
    {
        return Inertia::render('AboutUs/AboutUs');
    }

    public function terms_of_service()
    {
        return Inertia::render('TermsOfService/TermsOfService');
    }

    public function faq()
    {
        return Inertia::render('Faq/Faq');
    }
}
