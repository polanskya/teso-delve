<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sets', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('id');
        });

        Schema::table('itemStyles', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('id')->unique();
        });

        Schema::table('dungeons', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('id')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sets', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('dungeons', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('itemStyles', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
