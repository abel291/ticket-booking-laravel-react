<?php


namespace App\Services;

use App\Enums\CartEnum;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class EventService
{
    public static function getRulesCreateEvent()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:App\Models\Event,slug',
            'active' => 'required|boolean',
            'duration' => 'nullable|string',
            'entry' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'sub_category_id' => 'required|exists:App\Models\Category,id',
            'location_id' => 'required|exists:App\Models\Location,id',

            'banner' => 'required|image|max:1024|mimes:jpeg,jpg,png',
            'card' => 'required|image|max:1024|mimes:jpeg,jpg,png',
            'thum' => 'required|image|max:1024|mimes:jpeg,jpg,png',
        ];
    }
    public static function getEvent($event_id)
    {

        return Event::select('id', 'title', 'slug', 'thum', 'user_id', 'category_id', 'sub_category_id', 'updated_at')
            ->where('user_id', auth()->user()->id)
            ->with('category:id,name')
            ->with('subCategory:id,name')
            ->findOrFail($event_id);
    }
}
