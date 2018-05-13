<?php

use Illuminate\Support\Facades\DB;
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
            $table->string('login')
                ->unique();
            $table->string('first_name')
                ->nullable();
            $table->string('second_name')
                ->nullable();
            $table->string('surname')
                ->nullable();
            $table->string('city')
                ->nullable();
            $table->string('street')
                ->nullable();
            $table->string('house_number')
                ->nullable();
            $table->string('apartment_number')
                ->nullable();
            $table->string('post_code')
                ->nullable();
            $table->date('birth_date')
                ->nullable();
            $table->integer('status');
            $table->integer('debt')
                ->default(0);
            $table->boolean('active')
                ->default(true);
            $table->integer('permissions')
                ->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
