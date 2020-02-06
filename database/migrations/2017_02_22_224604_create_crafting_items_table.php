<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCraftingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crafting_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('smithingTypeEnum');
            $table->integer('researchLineIndex')->nullable();
            $table->integer('level');
            $table->integer('championLevel')->nullable();
            $table->string('name')->nullable();
            $table->integer('material_id')->nullable();
            $table->integer('materialCount')->nullable();
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
        Schema::dropIfExists('crafting_items');
    }
}
