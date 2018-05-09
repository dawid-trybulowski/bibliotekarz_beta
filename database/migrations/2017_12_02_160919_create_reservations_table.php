<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')
                ->unsigned();
            $table->foreign('book_id')
                ->references('id')
                ->on('items');
            $table->integer('user_id')
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('item_id')
                ->unsigned();
            $table->foreign('item_id')
                ->references('id')
                ->on('items');
            $table->integer('borrow_id')
                ->nullable();
            $table->date('reservation_date_start');
            $table->date('reservation_date_end');
            $table->boolean('status');
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
        Schema::dropIfExists('reservations');
    }
}
