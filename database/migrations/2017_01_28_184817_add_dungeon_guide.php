<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDungeonGuide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dungeons', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->integer('dungeonTypeEnum')->default(\App\Enum\DungeonType::GROUP_DUNGEON)->after('zone');
        });

        Schema::create('bosses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('dungeon_id')->nullable();
            $table->integer('zone_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->nulable();
            $table->boolean('optional')->default(0);
            $table->text('mechanics')->nullable();
            $table->text('strategy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dungeons', function (Blueprint $table) {
            $table->integer('type');
            $table->dropColumn('dungeonTypeEnum');
        });

        Schema::dropIfExists('bosses');
    }
}
