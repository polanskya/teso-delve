<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->string('uniqueId');
            $table->integer('characterId')->nullable();
            $table->string('name');
            $table->integer('trait')->nullable();
            $table->integer('equipType')->nullable();
            $table->integer('setId')->nullable();
            $table->integer('count')->default(0);
            $table->integer('quality');
            $table->integer('armorType')->nullable();
            $table->integer('weaponType')->nullable();
            $table->integer('locked')->default(0);
            $table->string('enchant')->nullable();
            $table->string('icon')->nullable();
            $table->integer('level')->nullable();
            $table->integer('championLevel')->nullable();
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('items');
    }
}
