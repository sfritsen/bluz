<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthCounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counts_monthly', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->smallInteger('year')->default('0')->unsigned();
            $table->smallInteger('january')->default('0')->unsigned();
            $table->smallInteger('february')->default('0')->unsigned();
            $table->smallInteger('march')->default('0')->unsigned();
            $table->smallInteger('april')->default('0')->unsigned();
            $table->smallInteger('may')->default('0')->unsigned();
            $table->smallInteger('june')->default('0')->unsigned();
            $table->smallInteger('july')->default('0')->unsigned();
            $table->smallInteger('august')->default('0')->unsigned();
            $table->smallInteger('september')->default('0')->unsigned();
            $table->smallInteger('october')->default('0')->unsigned();
            $table->smallInteger('november')->default('0')->unsigned();
            $table->smallInteger('december')->default('0')->unsigned();
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
        Schema::dropIfExists('counts_monthly');
    }
}
