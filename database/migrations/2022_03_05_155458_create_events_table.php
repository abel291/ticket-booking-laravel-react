<?php

use App\Enums\EventTypes;
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
            $table->boolean('active')->default(0);
            $table->string('duration');
            $table->string('banner')->nullable();
            $table->string('card')->nullable();
            $table->string('thum')->nullable();
            $table->string('entry');
            $table->string('type')->default('private'); //private - public
            $table->string('status')->default('draft'); //draft - in-progress - finalized
            $table->text('description');

            $table->foreignId('location_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('sub_category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('format_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            //$table->foreignId('promotion_id')->nullable()->constrained('promotions')->nullOnDelete();

            // $table->string('ceo_title');
            // $table->string('ceo_desc');
            // $table->string('social_fa')->nullable();
            // $table->string('social_tw')->nullable();
            // $table->string('social_yt')->nullable();

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
