<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('side');
            $table->integer('hp');
            $table->integer('attack');
            $table->string('special_ability');
            $table->timestamps();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('side');
            $table->timestamps();
        });

        Schema::create('hero_team', function (Blueprint $table) {
            $table->integer('hero_id')->unsigned();
            $table->integer('team_id')->unsigned();

            $table->foreign('hero_id')->references('id')->on('heroes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['hero_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroes');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('hero_team');
    }
}
