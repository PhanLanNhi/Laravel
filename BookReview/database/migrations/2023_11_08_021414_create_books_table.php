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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('bookID');
            $table->string('title');
            $table->string('author');
            $table->enum('genre', ['romatic', 'detective', 'blockbuster', 'comedy']);
            $table->year('publicationYear');
            $table->integer('ISBN');
            $table->string('coverImageURL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
