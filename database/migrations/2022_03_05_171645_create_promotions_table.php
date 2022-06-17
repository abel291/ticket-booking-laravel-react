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

        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('value');
            $table->string('type',20); //percent- amount
            $table->integer('quantity');
            $table->timestamp('expired');
            $table->string('description')->nullable();
            $table->boolean('active')->default(1);
            //$table->softDeletes();
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
        Schema::dropIfExists('promotions');
    }
};
