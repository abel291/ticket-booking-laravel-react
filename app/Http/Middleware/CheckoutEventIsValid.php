<?php

namespace App\Http\Middleware;

use App\Models\Event;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckoutEventIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $date = $request->date;

        Event::whereHas('sessions_available', function ($query) use ($date) {
            if ($date) {
                $query->where('date',  $date);
            }
        })
            ->has('sessions_available.ticket_types_available')
            ->where('slug', $request->route('slug'))->firstOrFail();


        return $next($request);
    }
}
