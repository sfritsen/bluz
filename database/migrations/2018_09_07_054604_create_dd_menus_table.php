<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDdMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_menus', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->integer('menu_owner');
            $table->tinyInteger('type')->unsigned();
            $table->integer('group_id');
            $table->integer('parent_id');
            $table->string('menu_text');
            $table->tinyInteger('active')->unsigned();
            // $table->integer('dd_last_edit_time');
            // $table->integer('dd_last_edit_by');
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
        Schema::dropIfExists('dd_menus');
    }
}
