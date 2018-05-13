<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')
                ->unsigned();
            $table->foreign('book_id')
                ->references('id')
                ->on('items');
            $table->integer('item_id')
                ->unsigned();
            $table->foreign('item_id')
                ->references('id')
                ->on('items');
            $table->integer('user_id')
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->date('borrow_date_start');
            $table->date('borrow_date_end');
            $table->integer('reservation_id')
                ->nullable();
            $table->foreign('reservation_id')
                ->references('id')
                ->on('reservations');
            $table->integer('delay')
                ->default(0);
            $table->float('delay_cost')
                ->default(0);
            $table->integer('extended')
                ->default(0);
            $table->integer('status');
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
        Schema::dropIfExists('borrows');
    }
}
