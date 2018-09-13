<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryBoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->tinyInteger('type')->unsigned();
            $table->integer('is_under')->default('0');
            $table->string('cat1_label')->default('-');
            $table->string('cat2_label')->default('-');
            $table->string('cat3_label')->default('-');
            $table->string('cat4_label')->default('-');
            $table->tinyInteger('active')->unsigned()->default('1');
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
        Schema::dropIfExists('category_boxes');
    }
}
