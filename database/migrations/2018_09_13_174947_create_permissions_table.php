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

        // Create admin user permissions
        DB::table('permissions')->insert([
            [
                'user_id'           => '1',
                'sys_admin'         => '1',
                'user_management'   => '1',
                'g1_entry'          => '1',
                'g1_admin'          => '1',
                'g2_entry'          => '1'
            ],
            [
                'user_id'           => '2',
                'sys_admin'         => '0',
                'user_management'   => '1',
                'g1_entry'          => '1',
                'g1_admin'          => '1',
                'g2_entry'          => '1'
            ]
        ]);
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
