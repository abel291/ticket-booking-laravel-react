<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PivotSessionTicketTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('session_ticket_type')->truncate();
        $events = Event::with('sessions', 'ticket_types')->get();

        foreach ($events as $event) {
            $sessions = $event->sessions;
            $ticket_types = $event->ticket_types;
            
            foreach ($sessions as $session) {

                $ramdom_ticket_types = $ticket_types->random(rand(1, $ticket_types->count()));
                $pivot_ticket_types = [];
                foreach ($ramdom_ticket_types as $ticket_type) {

                    $pivot_ticket_types[$ticket_type->id] = [
                        'remaining' => $ticket_type->quantity,
                        'quantity' => $ticket_type->quantity,
                    ];
                }
                

                $session->ticket_types()->attach($pivot_ticket_types);
            }
        }
    }
}
