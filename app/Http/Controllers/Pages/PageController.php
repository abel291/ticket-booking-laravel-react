<?php

namespace App\Http\Controllers\Pages;

use App\Enums\CategoryType;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Models\Category;
use App\Models\Event;
use App\Models\Speaker;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        $carousel = Event::has('session')->get()->take(10);

        $featured = Event::has('session')->with('session', 'category', 'location')->get()->take(8);

        $free = Event::has('session')->with('session', 'category', 'location')->whereRelation('ticket_types', 'type', 'free')->get()->take(8);

        $home_categories = Category::active()->whereNull('category_id')->get();

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
    public function speaker($slug)
    {
        $speaker = Speaker::active()->where('slug', $slug)->firstOrFail();
        return Inertia::render('Speaker/Speaker', ['speaker' => $speaker]);
    }
}
