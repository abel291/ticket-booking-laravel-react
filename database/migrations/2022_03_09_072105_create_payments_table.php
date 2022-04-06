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
<<<<<<< HEAD
            $table->tinyInteger('total_quantity');
            $table->string('code', 10);
            $table->float('total_price');
            $table->tinyInteger('status')->default(1);
            $table->json('event');
            $table->json('user');
            $table->json('promotion')->nullable();
=======
            $table->unsignedTinyInteger('total_quantity');
            $table->string('code',10);
            $table->string('type',20);
            $table->json('discount')->nullable();
            $table->float('total_price');
            $table->unsignedTinyInteger('status')->default(1);            
            $table->json('event');            
            $table->json('user');            
>>>>>>> dashboard-tailwind
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('promotion_id')->nullable()->constrained('promotions');
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
