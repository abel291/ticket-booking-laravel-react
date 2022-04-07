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
            $table->string('code', 10);
            $table->string('type', 20);
            $table->unsignedSmallInteger('quantity');
            $table->unsignedFloat('sub_total');
            $table->unsignedFloat('total');
            $table->string('status',20)->default(1);
            $table->json('promotion_data')->nullable();
            $table->json('event_data');
            $table->json('user_data');
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('promotion_id')->nullable()->constrained('promotions')->nullOnDelete();
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
