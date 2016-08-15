<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');

            // Needed for Challonge
            $table->integer('challonge_id')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['single elimination', 'double elimination', 'round robin', 'swiss']);
            $table->dateTime('start_on');
            $table->integer('checkin_duration');
            
            $table->enum('max_teams', [4, 8, 16, 32, 64, 128, 256]);
            $table->text('description')->nullable();
            $table->text('rules')->nullable();

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
        Schema::drop('tournaments');
    }
}
