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
<<<<<<<< HEAD:database/migrations/2022_03_09_074226_payment_ticket_type_session.php
        Schema::create('payment_ticket_type_sessions', function (Blueprint $table) {
========
        Schema::create('payment_ticket_types', function (Blueprint $table) {
>>>>>>>> dashboard-tailwind:database/migrations/2022_03_09_074226_payment_ticket_types.php
            $table->id();
            $table->unsignedTinyInteger('quantity');
            $table->float('total_price');
<<<<<<<< HEAD:database/migrations/2022_03_09_074226_payment_ticket_type_session.php
            $table->json('session_ticket_type');
========
            $table->json('session');
            $table->json('ticket_type');
>>>>>>>> dashboard-tailwind:database/migrations/2022_03_09_074226_payment_ticket_types.php
            $table->foreignId('payment_id')->constrained('payments')->cascadeOnDelete();
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
<<<<<<<< HEAD:database/migrations/2022_03_09_074226_payment_ticket_type_session.php
        Schema::dropIfExists('payment_ticket_type_sessions');
========
        Schema::dropIfExists('payment_ticket_types');
>>>>>>>> dashboard-tailwind:database/migrations/2022_03_09_074226_payment_ticket_types.php
    }
};
