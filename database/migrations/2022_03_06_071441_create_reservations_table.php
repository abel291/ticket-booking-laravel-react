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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('order')->index();
            $table->string('phone');
            $table->string('note')->nullable();
            $table->json('events');
            $table->json('discount')->nullable();
            $table->float('sub_total',10, 2);
            $table->float('tax_percent',4, 2);
            $table->float('tax_amount',10, 2);
            $table->float('total',10, 2);
            $table->enum('state', ['canceled', 'refunded', 'successful'])->default('successful');
            $table->foreignId('user_id')->index();
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
        Schema::dropIfExists('reservations');
    }
};
