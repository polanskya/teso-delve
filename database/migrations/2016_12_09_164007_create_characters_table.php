<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('userId');
            $table->bigInteger('externalId');
            $table->integer('classId');
            $table->integer('raceId')->default(1);
            $table->integer('allianceId')->default(1);
            $table->integer('level')->default(1);
            $table->integer('championLevel')->default(1);
            $table->integer('ridingUnlocked_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
