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
        Schema::create('payment_ticket_type_dates', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('quantity');
            $table->float('total_price');
            $table->json('date');
            $table->json('ticket_type');
            $table->foreignId('payment_id');
            $table->timestamps();
            $table->index(['payment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_ticket_type_dates');
    }
};
