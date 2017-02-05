<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportRowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_group', function (Blueprint $table) {
            $table->string('guid')->unique();
            $table->integer('user_id');
            $table->string('file');
            $table->integer('items');
            $table->integer('smithing');
            $table->integer('itemStyles');
            $table->integer('characters');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['guid', 'user_id']);
        });

        Schema::create('import_row', function (Blueprint $table) {
            $table->string('guid')->unique();
            $table->integer('user_id');
            $table->string('import_group_guid');
            $table->text('row');
            $table->integer('type');
            $table->timestamps();
            $table->index(['guid', 'user_id', 'import_group_guid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_group');
        Schema::dropIfExists('import_row');

    }
}
