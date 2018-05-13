<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('unified_title');
            $table->string('author');
            $table->string('subauthors')
                ->nullable();
            $table->longText('description')
                ->nullable();
            $table->longText('content_description')
                ->nullable();
            $table->string('image_url')
                ->nullable();
            $table->integer('status');
            $table->integer('items');
            $table->float('rate')
                ->nullable();
            $table->integer('rate_count')
                ->default(0);
            $table->integer('rate_sum')
                ->default(0);
            $table->integer('category_id')
                ->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->integer('age_category_id')
                ->unsigned();
            $table->foreign('age_category_id')
                ->references('id')
                ->on('age_categories');
            $table->string('isbn');
            $table->string('language')
                ->default('PL');
            $table->string('publishing_house')
                ->nullable();
            $table->string('publication_country_code')
                ->default('PL')
                ->nullable();
            $table->integer('pages')
                ->nullable();
            $table->string('edition')
                ->nullable();
            $table->string('brinding')
                ->nullable();
            $table->integer('publication_year')
                ->nullable();
            $table->integer('location_id')
                ->unsigned();
            $table->foreign('owner')
                ->references('id')
                ->on('locations');
            $table->string('keys')
                ->nullable();
            $table->boolean('active')
                ->default(true);
            $table->boolean('visible')
                ->default(true);
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
        Schema::dropIfExists('books');
    }
}
