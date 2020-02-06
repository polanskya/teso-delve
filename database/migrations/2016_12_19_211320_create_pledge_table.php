<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePledgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyPledges', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('pledge1');
            $table->integer('pledge2');
            $table->integer('pledge3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dailyPledges');
    }
}
