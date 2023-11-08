<?php

namespace App\Observers;

use App\Enums\OrderStatus;
use App\Models\OrderTicket;
use Illuminate\Support\Facades\DB;

class OrderTicketObserver
{
    /**
     * Handle the OrderTicket "created" event.
     */
    public function created(OrderTicket $orderTicket): void
    {
        if ($orderTicket->order->status == OrderStatus::SUCCESSFUL) {
            DB::table('session_ticket_type')
                ->where('session_id', $orderTicket->order->session_id)
                ->where('ticket_type_id', $orderTicket->ticket_type_id)
                ->increment('sales', $orderTicket->quantity);
        }
    }

    /**
     * Handle the OrderTicket "updated" event.
     */
    public function updated(OrderTicket $orderTicket): void
    {
        //
    }

    /**
     * Handle the OrderTicket "deleted" event.
     */
    public function deleted(OrderTicket $orderTicket): void
    {
        //
    }

    /**
     * Handle the OrderTicket "restored" event.
     */
    public function restored(OrderTicket $orderTicket): void
    {
        //
    }

    /**
     * Handle the OrderTicket "force deleted" event.
     */
    public function forceDeleted(OrderTicket $orderTicket): void
    {
        //
    }
}
