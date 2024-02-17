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
            $table->increments('reviewID');
            $table->unsignedInteger('bookID');
            $table->unsignedBigInteger('userID');
            $table->integer('rating');
            $table->string('reviewText');
            $table->date('reviewDate');
            $table->timestamps();
            $table->foreign('bookID')->references('bookID')->on('books')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
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
