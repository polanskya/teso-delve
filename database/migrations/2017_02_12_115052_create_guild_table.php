<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guilds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('world');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable()->default(null);
            $table->text('motd')->nullable()->default(null);
            $table->dateTime('founded_at');
            $table->timestamps();
        });

        Schema::create('guild_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guild_id');
            $table->integer('user_id')->nullable();
            $table->integer('account_id')->nullable();
            $table->string('accountName');
            $table->integer('rank');
            $table->dateTime('lastSeen_at');
            $table->string('playerStatus')->nullable();
            $table->text('note');
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
        Schema::dropIfExists('guilds');
        Schema::dropIfExists('guild_members');
    }
}
