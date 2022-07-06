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
            $table->string('title');
            //$table->string('sub_title');
            $table->boolean('active');
            $table->boolean('home')->default(0);
            $table->string('duration');
            $table->string('banner');
            $table->string('card');
            $table->string('thumb');
            $table->string('desc_min');
            $table->text('desc_max');
            $table->string('ceo_title');
            $table->string('ceo_desc');
            $table->string('social_fa')->nullable();
            $table->string('social_tw')->nullable();
            $table->string('social_yt')->nullable();
            // $table->foreignId('location_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('format_id')->nullable()->constrained()->nullOnDelete();
            // //$table->foreignId('promotion_id')->nullable()->constrained('promotions')->nullOnDelete();
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
