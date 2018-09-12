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
        Schema::create('category_box', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->tinyInteger('type');
            $table->integer('is_under');
            $table->string('cat1_label');
            $table->string('cat2_label');
            $table->string('cat3_label');
            $table->string('cat3_label');
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
        Schema::dropIfExists('category_box');
    }
}
