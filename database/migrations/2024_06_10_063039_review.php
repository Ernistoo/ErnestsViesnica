<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('room_name');
            $table->string('stars'); // Assuming stars is an integer from 1 to 5
            $table->text('review_content');
            $table->timestamps();

            // Assuming user names are unique, otherwise, you might need a different approach
            $table->foreign('user_name')->references('name')->on('users')->onDelete('cascade');
            $table->foreign('room_name')->references('name')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
