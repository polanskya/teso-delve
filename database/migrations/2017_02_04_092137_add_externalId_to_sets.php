<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExternalIdToSets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sets', function (Blueprint $table) {
            $table->string('external_id')->nullable()->after('name')->unique();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->string('external_id')->nullable()->after('name');
        });

        \App\Model\Set::whereIn('lang', ['kor', 'jp'])->delete();
        \App\Model\Item::whereIn('lang', ['kor', 'jp'])->delete();

        $query = 'UPDATE sets SET external_id=name';
        DB::update($query);

        $query = 'UPDATE items SET external_id=name';
        DB::update($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sets', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
    }
}
