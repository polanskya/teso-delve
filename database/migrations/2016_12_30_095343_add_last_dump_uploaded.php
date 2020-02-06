<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastDumpUploaded extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->dateTime('dumpUploaded_at')->nullable()->after('remember_token');
        });

        Schema::table('user_items', function ($table) {
            $table->integer('slotId')->nullable()->after('bagEnum');
        });

        Schema::table('characters', function ($table) {
            $table->integer('currency')->nullable()->after('isDPS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('dumpUploaded_at');
        });

        Schema::table('user_items', function ($table) {
            $table->dropColumn('slotId');
        });

        Schema::table('characters', function ($table) {
            $table->dropColumn('currency');
        });
    }
}
