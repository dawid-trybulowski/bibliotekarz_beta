<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaitingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiting_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('book_id')
                ->unsigned();
            $table->foreign('book_id')
                ->references('id')
                ->on('items');
            $table->integer('position');
            $table->integer('status')
                ->default(1);
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
        Schema::dropIfExists('waiting_lists');
    }
}
