<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('session_ticket_type')->truncate();

        $events = Event::with('ticket_types', 'sessions')->get();
        
        // foreach ($events as  $event) {

        //     foreach ($event->sessions as  $session) {

        //         foreach ($event->ticket_types as  $ticket_type) {

        //             DB::table('ticket_type_session')->insert([
                        
        //                 'ticket_type_id' => $ticket_type->id,

        //                 'session_id' => $session->id
        //             ]);
        //         }
        //     }
        // }
    }
}
