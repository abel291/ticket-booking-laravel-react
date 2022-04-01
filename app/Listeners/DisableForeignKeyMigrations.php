<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Events\MigrationsStarted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Schema;

class DisableForeignKeyMigrations
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Database\Events\MigrationsStarted  $event
     * @return void
     */
    public function handle(MigrationsStarted $event)
    {
        Schema::disableForeignKeyConstraints();
    }
}
