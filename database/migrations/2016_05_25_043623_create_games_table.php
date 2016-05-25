<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('games', function(Blueprint $table) {
          $table->increments('id');
          $table->string('name', 100);
          $table->string('short_name');
          $table->string('slug')->unique();
          $table->string('logo');
          $table->string('banner');
          $table->integer('platform_id')->unsigned();
          $table->foreign('platform_id')->references('id')->on('platforms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('games');
    }
}
