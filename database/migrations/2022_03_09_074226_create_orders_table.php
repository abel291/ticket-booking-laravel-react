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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->string('status', 20)->default('pending');
            $table->unsignedInteger('quantity');

            $table->unsignedFloat('fee_porcent');
            $table->unsignedFloat('fee');
            $table->unsignedFloat('tax_value')->nullable(); // sin uso
            $table->unsignedFloat('tax_percent')->nullable(); // sin uso
            $table->unsignedFloat('sub_total');
            $table->unsignedFloat('total');
            $table->json('data')->nullable();
            $table->string('stripe_id');

            $table->foreignId('promotion_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('session_id')->constrained()->cascadeOnDelete();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->timestamp('refund_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
