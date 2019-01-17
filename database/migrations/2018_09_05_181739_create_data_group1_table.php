<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataGroup1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_group1', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('emp_info_name');
            $table->string('emp_info_id');
            $table->string('emp_info_city');
            $table->string('emp_info_mgr_id');
            $table->string('emp_info_mgr_name');
            $table->string('emp_info_title');
            $table->string('phone_number', 10);
            $table->string('lynx', 10);
            $table->string('chat_session_id');
            $table->integer('incident_type');
            $table->integer('equip_type');
            $table->integer('resolution');
            $table->integer('troubleshooting');
            $table->tinyInteger('client_no_ts')->unsigned();
            $table->tinyInteger('invalid_ref')->unsigned();
            $table->integer('cat_box_1');
            $table->integer('cat_box_2');
            $table->integer('cat_box_3' );
            $table->text('additional_notes');
            $table->tinyInteger('abandon')->unsigned();
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
        Schema::dropIfExists('data_group1');
    }
}
