<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();            
            $table->date('date');
            $table->time('time');
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
<<<<<<<< HEAD:database/migrations/2022_03_05_160044_create_sessions_table.php
            //$table->foreignId('ticket_type_id')->constrained('ticket_types')->cascadeOnDelete();
========
>>>>>>>> dashboard-tailwind:database/migrations/2022_03_05_160044_create_sessions.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
