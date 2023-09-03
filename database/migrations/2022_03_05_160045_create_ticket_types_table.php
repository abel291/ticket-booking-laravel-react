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
            $table->string('type'); // free - paid
            $table->unsignedFloat('price_basic');
            $table->unsignedFloat('price');
            $table->boolean('includeFee')->default(0);
            $table->unsignedMediumInteger('quantity');
            $table->boolean('default')->default(0);
            $table->string('entry')->nullable();
            $table->unsignedMediumInteger('min_purchase');
            $table->unsignedMediumInteger('max_purchase');
            $table->boolean('show_remaining_entries');
            $table->boolean('active');
            $table->timestamp('sales_start_date');
            $table->timestamp('sales_end_date');
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

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
