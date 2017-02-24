<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('weaponTypeEnum')->nullable();
            $table->integer('armorTypeEnum')->nullable();
            $table->integer('equipTypeEnum')->nullable();
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
