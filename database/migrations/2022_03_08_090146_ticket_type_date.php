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
        Schema::create('ticket_type_date', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_type_id');
            $table->foreignId('event_date_id');
            $table->index(['ticket_type_id', 'event_date_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_type_date');
    }
};
