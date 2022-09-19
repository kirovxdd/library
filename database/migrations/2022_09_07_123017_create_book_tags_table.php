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
        Schema::create('book_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->index('book_id', 'books_book_tags_idx');
            $table->index('tag_id', 'tags_book_tags_idx');

            $table->foreign('book_id', 'books_book_tags_fk')->on('books')->references('id');
            $table->foreign('tag_id', 'tags_book_tags_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_tags');
    }
};
