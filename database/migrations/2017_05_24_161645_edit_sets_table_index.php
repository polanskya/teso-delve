<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSetsTableIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sets', function (Blueprint $table) {
            $table->dropUnique('sets_external_id_unique');
        });

        Schema::table('sets', function (Blueprint $table) {
            $table->unique(['external_id', 'lang'], 'external_id_lang_unique');
            $table->unique(['slug', 'lang'], 'slug_unique');
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
            $table->dropUnique('external_id_lang_unique');
            $table->dropUnique('slug_unique');
        });

        Schema::table('sets', function (Blueprint $table) {
            $table->unique('external_id', 'sets_external_id_unique');
        });
    }
}
