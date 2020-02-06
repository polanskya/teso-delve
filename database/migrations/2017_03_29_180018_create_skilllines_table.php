<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('classEnum')->nullable();
            $table->tinyInteger('raceEnum')->nullable();
            $table->tinyInteger('skilltypeEnum');
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
        Schema::dropIfExists('skill_lines');
    }
}
