<?php

use Illuminate\Support\Facades\DB;
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
                ->unsigned()
                ->nullable();
            $table->foreign('borrow_id')
                ->references('id')
                ->on('borrows');
            $table->date('reservation_date_start');
            $table->date('reservation_date_end');
            $table->integer('status');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
