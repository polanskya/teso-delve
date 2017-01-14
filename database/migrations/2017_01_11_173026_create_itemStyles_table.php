<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemStyles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('craftable')->default(0);
            $table->string('image');
            $table->integer('externalId');
            $table->string('material')->nullable();
            $table->text('location')->nullable();
            $table->boolean('isHidden')->default(1);
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->integer('itemStyleId')->nullable()->after('equipType');
        });

        Schema::table('user_items', function (Blueprint $table) {
            $table->integer('itemStyleId')->nullable()->after('uniqueId');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemStyles');

        Schema::table('items', function ($table) {
            $table->dropColumn('itemStyleId');
        });

        Schema::table('user_items', function ($table) {
            $table->dropColumn('itemStyleId');
        });
    }
}
