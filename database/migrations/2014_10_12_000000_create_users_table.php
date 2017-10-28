<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')
                ->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('second_name')
                ->nullable();
            $table->string('surname');
            $table->string('city');
            $table->string('street')
                ->nullable();
            $table->string('house_number');
            $table->string('apartment_number')
                ->nullable();
            $table->string('post_code');
            $table->date('birth_date');
            $table->boolean('verified');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
