<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupTeamsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Just add the primary team to the users profile.
        Schema::table('users', function(Blueprint $table) {
            $table->integer('primary_team_id')->unsigned()->nullable();
        });

        // Create the main Teams Table
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('profile_image');
            $table->string('description');
            $table->timestamps();
        });

        // Create the Teams Users Relations table
        Schema::create('teams_users', function(Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->timestamps();

            // create the foreign keys
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('team_id')->references('id')->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        // Create the Team Invites table
        Schema::create('team_invites', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->enum('type', ['invite', 'request']);
            $table->string('email');
            $table->string('accept_token');
            $table->string('deny_token');
            $table->timestamps();
            $table->foreign('team_id')->references('id')->on('teams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('primary_team_id');
        });

        Schema::table('teams_users', function(Blueprint $table) {
            $table->dropForeign(['user_id', 'team_id']);
        });

        Schema::drop('teams');
        Schema::drop('teams_users');
        Schema::drop('team_invites');
    }
}
