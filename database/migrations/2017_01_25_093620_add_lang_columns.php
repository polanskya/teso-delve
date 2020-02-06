<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLangColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sets', function (Blueprint $table) {
            $table->string('lang', 10)->default(config('constants.default-language'))->after('name');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('lang', 10)->default(config('constants.default-language'))->after('email');
            $table->dateTime('seen_at')->nullable()->after('dumpUploaded_at');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->string('lang', 10)->default(config('constants.default-language'))->after('name');
        });

        Schema::table('characters', function (Blueprint $table) {
            $table->string('lang', 10)->default(config('constants.default-language'))->after('externalId');
            $table->string('server')->nullable()->after('lang');
            $table->string('account')->nullable()->after('server');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lang');
            $table->dropColumn('seen_at');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('lang');
        });

        Schema::table('sets', function (Blueprint $table) {
            $table->dropColumn('lang');
        });

        Schema::table('characters', function (Blueprint $table) {
            $table->dropColumn('lang');
            $table->dropColumn('server');
            $table->dropColumn('account');
        });
    }
}
