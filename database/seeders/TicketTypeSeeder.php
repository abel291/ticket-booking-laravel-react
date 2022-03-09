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
        DB::table('ticket_type_date')->truncate();
        $events = Event::with('ticket_types', 'dates')->get();
        DB::table('ticket_type_date')->truncate();
        foreach ($events as  $event) {

            foreach ($event->dates as $key => $date) {

                foreach ($event->ticket_types->random(2) as $key => $ticket_type) {
                    DB::table('ticket_type_date')->insert([
                        'ticket_type_id' => $ticket_type->id,
                        'event_date_id' => $date->id
                    ]);
                }
            }
        }
    }
}
