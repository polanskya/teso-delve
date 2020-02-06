<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddItemtypeenumToUserItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_items', function (Blueprint $table) {
            $table->integer('itemTypeEnum')->nullable()->after('weaponTypeEnum');
        });

        /* $query = 'UPDATE user_items
             INNER JOIN items
                 ON user_items.itemId=items.id
             SET user_items.itemTypeEnum = items.type';

         DB::update($query);
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_items', function (Blueprint $table) {
            $table->dropColumn('itemTypeEnum');
        });
    }
}
