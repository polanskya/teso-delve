<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets_new', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('external_id')->nullable()->after('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('craftable')->default(0);
            $table->integer('set_type_id')->nullable()->after('craftable');
            $table->integer('traits_needed')->nullable();
            $table->string('slug');

          //  $table->unique(['slug', 'lang'], 'slug_unique');
 
//            $table->unique(['external_id', 'lang'], 'external_id_lang_unique');
//            $table->unique(['slug', 'lang'], 'slug_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sets_new');
    }
}
