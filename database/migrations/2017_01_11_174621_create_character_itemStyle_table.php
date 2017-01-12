<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterItemStyleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_itemStyle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('characterId');
            $table->integer('itemStyleId');
            $table->integer('itemStyleChapterEnum');
            $table->boolean('isKnown');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_itemStyle');
    }
}
