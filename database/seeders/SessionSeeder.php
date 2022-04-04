<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Session;
use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('session_ticket_type')->truncate();
        //Session::truncate();

        
        $events = Event::with('ticket_types', 'sessions')->get();

        foreach ($events as  $event) {
            
            foreach ($event->sessions as $key => $session) {

                foreach ($event->ticket_types as $key => $ticket_type) {

                    DB::table('session_ticket_type')->insert([

                        'ticket_type_id' => $ticket_type->id,

                        'session_id' => $session->id
                    ]);
                }
            }
        }
    }
}
