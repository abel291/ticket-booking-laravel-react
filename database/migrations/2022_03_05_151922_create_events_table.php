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
            $table->boolean('active');
            $table->string('duration');
            $table->string('type',20);
            $table->string('desc_min');
            $table->text('desc_max');
            $table->string('tomatoes')->nullable(); //movies
            $table->string('audience')->nullable(); //movies
            $table->string('score')->nullable(); //movies
            // $table->string('img_banner');
            // $table->string('img_card');
            // $table->string('img_thum')->nullable();
            $table->string('ceo_title');
            $table->string('ceo_desc');
            $table->string('social_fa')->nullable();
            $table->string('social_tw')->nullable();
            $table->string('social_yt')->nullable();
            $table->foreignId('location_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('promotion_id')->nullable()->constrained('promotions')->nullOnDelete();
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
