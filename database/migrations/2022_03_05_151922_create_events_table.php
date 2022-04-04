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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('duration');
            $table->string('des_min');
            $table->text('des_max');
            $table->string('tomatoes')->nullable(); //movies
            $table->string('audience')->nullable(); //movies
            $table->string('calificación')->nullable(); //movies
            $table->string('img_banner');
            $table->string('img_card');
            $table->string('img_thum')->nullable();
            $table->string('ceo_title');
            $table->string('ceo_desc');
            $table->string('social_fa')->nullable();
            $table->string('social_tw')->nullable();
            $table->string('social_yt')->nullable();
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('category_id')->constrained('categories');
            $table->softDeletes();
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
        Schema::dropIfExists('events');
    }
};
