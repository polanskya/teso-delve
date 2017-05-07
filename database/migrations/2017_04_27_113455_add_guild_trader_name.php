<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGuildTraderName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guilds', function (Blueprint $table) {
            $table->string('kiosk_name')->nullable()->after('description');
            $table->string('guild_master', 75)->nullable()->after('description');
            $table->tinyInteger('alliance_id')->default(1)->after('guild_master');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guilds', function (Blueprint $table) {
            $table->dropColumn(['kiosk_name', 'guild_master', 'alliance_id']);
        });
    }
}
