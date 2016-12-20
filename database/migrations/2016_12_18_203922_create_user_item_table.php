<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('itemId');
            $table->integer('characterId')->nullable();
            $table->string('uniqueId')->nullable();

            $table->integer('bagEnum')->nullable();
            $table->integer('traitEnum')->nullable();
            $table->string('traitDescription')->nullable();
            $table->string('enchant')->nullable();
            $table->string('enchantDescription')->nullable();
            $table->integer('equipTypeEnum')->nullable();
            $table->integer('armorTypeEnum')->nullable();
            $table->integer('weaponTypeEnum')->nullabe();

            $table->boolean('isLocked')->default(0);
            $table->boolean('isBound')->default(0);
            $table->boolean('isJunk')->default(0);

            $table->integer('count')->default(1);

            $table->timestamps();
        });

        Schema::table('items', function ($table) {
            $table->dropColumn('userId');
        });

        Schema::table('items', function ($table) {
            $table->string('itemLink')->nullable()->after('uniqueId');
            $table->integer('userId')->nullable()->after('uniqueId');
            $table->string('traitDescription')->nullable()->after('trait');
            $table->string('enchantDescription')->nullable()->after('enchant');
            $table->integer('itemValue')->nullable()->after('weaponType');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_items');

        Schema::table('items', function ($table) {
            $table->dropColumn('itemLink');
        });


    }
}
