<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->tinyInteger('sys_admin')->default('0')->unsigned();
            $table->tinyInteger('user_management')->default('0')->unsigned();
            $table->tinyInteger('g1_entry')->default('0')->unsigned();
            $table->tinyInteger('g1_admin')->default('0')->unsigned();
            $table->tinyInteger('g2_entry')->default('0')->unsigned();
            $table->tinyInteger('g2_admin')->default('0')->unsigned();
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
        Schema::dropIfExists('permissions');
    }
}
