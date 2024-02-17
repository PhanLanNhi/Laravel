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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->increments('borrowingID');
            $table->unsignedInteger('bookID');
            $table->integer('memberID');
            $table->date('borrowDate');
            $table->date('dueDate');
            $table->date('returnedDate')->nullable();
            $table->timestamps();
            $table->foreign('bookID')->references('bookID')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
