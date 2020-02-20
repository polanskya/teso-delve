<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_zone_id')->nullable();
            $table->string('name', 100);
            $table->string('slug')->nullable();

            $table->integer('dlc');
            $table->string('dlc_name');
            $table->integer('alliance');
            $table->boolean('hidden')->nullable();
         
            $table->timestamps();
      });
    }
//    * @property mixed name
 //   * @property bool dlc
  //  * @property bool aliance

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zones');
    }

}