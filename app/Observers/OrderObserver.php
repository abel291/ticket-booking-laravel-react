<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        dd($order->order_tickets);
        foreach ($order->order_tickets as $key => $order_ticket) {
            $dani = DB::table('session_ticket_type')
                ->where('session_id', $order->session_id)
                ->where('ticket_type_id', $order_ticket->ticket_type_id)
                //->increment('sales', $order_ticket->quantity)
                ->get();
            dd($dani);
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
