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

        Schema::create('ticket_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('quantity');
            $table->string('type');
            $table->float('price');
            $table->boolean('default')->default(0);
            $table->string('desc')->nullable();
            $table->tinyInteger('min_tickets_purchase');
            $table->tinyInteger('max_tickets_purchase');
            $table->boolean('show_remaining_entries');
            $table->boolean('active');            
            // $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
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
        Schema::dropIfExists('ticket_types');
    }
};
