<?php

namespace App\Http\Livewire\Dashboard;

use App\Enums\OrderStatus;
use App\Models\Order;
use Livewire\Component;

class DashboardPage extends Component
{
    public function render()
    {

        //ingresos totales
        $orders = auth()->user()->orders()
            ->with('order_tickets')
            ->orderBy('id', 'desc')
            //->whereMonth('created_at', now()->month)
            ->get();

        $events = auth()->user()->events()->whereHas('sessions_available')->with('session', 'session.ticket_types.order_tickets')
            ->select('id', 'title', 'thum', 'slug')->get();
        $eventsCount = $events->count();
        //$events = $events->take(6);

        $ordersCompleted = $orders->where('status', OrderStatus::SUCCESSFUL);

        $totalRevenue = $ordersCompleted->sum('total');
        $ticketSold = $ordersCompleted->sum('quantity');
        $averageOrderValue = $ticketSold ? round($totalRevenue / $ticketSold) : 0;
        //dd($ticketSold);
        return view('livewire.dashboard.dashboard-page', [
            'orders' => $orders,
            'totalRevenue' => $totalRevenue,
            'ticketSold' => $ticketSold,
            'averageOrderValue' => $averageOrderValue,
            'events' => $events,
            'eventsCount' => $eventsCount,
        ]);
    }
}
