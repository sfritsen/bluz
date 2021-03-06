<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_type')->default('1');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password');
            $table->string('theme')->default('app.css');
            $table->tinyInteger('searchable')->default('1');
            $table->tinyInteger('active')->default('1');
            $table->rememberToken();
            $table->timestamps();
        });

        // Create admin user with default password 123456
        DB::table('users')->insert([
            [
                'account_type'  => '1',
                'name'          => 'Admin',
                'email'         => 'donotreply@telus.com',
                'username'      => 'admin',
                'password'      => bcrypt('123456'),
                'theme'         => 'app.css',
                'searchable'    => '0',
                'active'        => '1'
            ],
            [
                'account_type'  => '1',
                'name'          => 'Stephen Fritsen',
                'email'         => 'orion2020@gmail.com',
                'username'      => 't815138',
                'password'      => bcrypt('616461'),
                'theme'         => 'app.css',
                'searchable'    => '1',
                'active'        => '1'
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
        Schema::dropIfExists('users');
    }
}
