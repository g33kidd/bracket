<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function(Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('short_name');
          $table->string('slug');
          $table->string('logo');
          $table->string('banner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('platforms');
    }
}
