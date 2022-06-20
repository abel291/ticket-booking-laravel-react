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
            $table->string('status', 20)->default('successful');

            $table->unsignedMediumInteger('quantity');
            $table->dateTime('session');
            $table->string('stripe_id');

            //json
            $table->json('promotion_data')->nullable();
            $table->json('event_data');
            $table->json('user_data');
            $table->json('cancel_data')->nullable();

            //amount
            $table->unsignedFloat('fee');
            $table->unsignedFloat('fee_porcent');
            $table->unsignedFloat('sub_total');
            $table->unsignedFloat('total');

            //relationships
            // $table->foreignId('session_id')->constrained();
            // $table->foreignId('event_id')->constrained();
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('promotion_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamp('canceled_at')->nullable();
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
