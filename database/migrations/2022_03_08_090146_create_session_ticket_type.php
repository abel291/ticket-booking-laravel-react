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
        Schema::create('session_ticket_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_type_id')->constrained('ticket_types')->cascadeOnDelete();
<<<<<<<< HEAD:database/migrations/2022_03_08_090146_ticket_type_session.php
            $table->foreignId('session_id')->constrained('sessions')->cascadeOnDelete();
========
            $table->foreignId('session_id')->constrained('sessions')->cascadeOnDelete();            
>>>>>>>> dashboard-tailwind:database/migrations/2022_03_08_090146_create_session_ticket_type.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_ticket_type');
    }
};
