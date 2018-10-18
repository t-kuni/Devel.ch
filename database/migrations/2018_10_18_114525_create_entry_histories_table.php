<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_article_id');
            $table->string('name');
            $table->string('entry_date');
            $table->string('entry_count');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('post_article_id')->references('id')->on('post_articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entry_histories');
    }
}
