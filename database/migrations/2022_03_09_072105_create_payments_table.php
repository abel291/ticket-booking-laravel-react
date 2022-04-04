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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('total_quantity');
            $table->string('code',10);
            $table->json('discount')->nullable();
            $table->float('total_price');
            $table->tinyInteger('status')->default(1);            
            $table->json('event');            
            $table->json('user');            
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('payments');
    }
};
