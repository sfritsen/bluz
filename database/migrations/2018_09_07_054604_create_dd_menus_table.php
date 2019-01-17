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
            $table->increments('id');
            $table->tinyInteger('type')->unsigned();
            $table->integer('group_id');
            $table->integer('parent_id');
            $table->string('menu_text');
            $table->tinyInteger('active')->unsigned();
            $table->timestamps();
        });

        DB::table('dd_menus')->insert(
            array(
                'type' => '0',
                'group_id' => '0',
                'parent_id' => '0',
                'menu_text' => 'Abandon',
                'active' => '1'
            )
        );
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
