<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::with('sessions', 'ticket_types')->get();
        foreach ($events as $event) {
            $sessions = $event->sessions;
            $ticket_types = $event->ticket_types;

            foreach ($sessions as $session) {
                $random_ticket_types = $ticket_types->random(rand(1, $ticket_types->count()));
                $session->ticket_types()->sync($random_ticket_types->pluck('id'));
            }
        }
    }
}
