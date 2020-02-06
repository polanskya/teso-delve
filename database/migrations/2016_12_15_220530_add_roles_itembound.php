<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolesItembound extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('characters', function ($table) {
            $table->boolean('isTank')->nullable()->after('championLevel');
            $table->boolean('isHealer')->nullable()->after('isTank');
            $table->boolean('isDPS')->nullable()->after('isHealer');
        });

        Schema::table('items', function ($table) {
            $table->boolean('isBound')->nullable()->after('locked');
            $table->boolean('isJunk')->nullable()->after('isBound');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('characters', function ($table) {
            $table->dropColumn('isTank');
            $table->dropColumn('isHealer');
            $table->dropColumn('isDPS');
        });

        Schema::table('items', function ($table) {
            $table->dropColumn('isBound');
            $table->dropColumn('isJunk');
        });
    }
}
