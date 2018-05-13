<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksHaveGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_have_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')
                ->unsigned();
            $table->integer('genre_id')
                ->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('books_have_genres', function (Blueprint $table) {
            $table->foreign('book_id')
                ->references('id')
                ->on('books');
        });

        Schema::table('books_have_genres', function (Blueprint $table) {
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BooksHaveGenres');
    }
}
