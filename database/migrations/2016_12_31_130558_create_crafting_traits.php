<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCraftingTraits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('craftingTraits', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('characterId');
            $table->tinyInteger('craftingTypeEnum');
            $table->tinyInteger('traitId');
            $table->tinyInteger('traitIndex');
            $table->tinyInteger('researchLineIndex');
            $table->dateTime('researchDone_at')->nullable();
            $table->boolean('isKnown');
            $table->string('name');
            $table->string('image');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('craftingTraits');
    }
}
