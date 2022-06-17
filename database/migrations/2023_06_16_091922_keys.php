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
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('location_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('format_id')->nullable()->constrained()->nullOnDelete();
            //$table->foreignId('promotion_id')->nullable()->constrained('promotions')->nullOnDelete();
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
        });

        Schema::table('blog', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
        });
        Schema::table('ticket_types', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
        });
        Schema::table('event_promotion', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('promotion_id')->constrained()->cascadeOnDelete();
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('session_id')->constrained();
            $table->foreignId('event_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('promotion_id')->nullable()->constrained()->nullOnDelete();
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('payment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ticket_type_id')->constrained()->cascadeOnDelete();
        });

        Schema::table('blog_category', function (Blueprint $table) {
            $table->foreignId('blog_id')->constrained('blog')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
        });
        Schema::table('speakers', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
        });
        Schema::table('session_ticket_type', function (Blueprint $table) {
            $table->foreignId('session_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ticket_type_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
