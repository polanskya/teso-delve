<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuildRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guild_ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guild_id');
            $table->integer('external_id');
            $table->integer('rank_index');
            $table->string('name');
            $table->boolean('isGuildmaster')->default(0);
            $table->string('icon_small');
            $table->string('icon_large');
            $table->string('icon_active');
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
        Schema::dropIfExists('guild_ranks');
    }
}
