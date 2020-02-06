<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemStylesChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemStyle_chapter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('itemStyleId');
            $table->integer('itemStyleChapterEnum');
            $table->integer('itemId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemStyle_chapter');
    }
}
