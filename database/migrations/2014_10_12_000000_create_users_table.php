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
<<<<<<< HEAD
        Schema::create('users', function (Blueprint $table) {
=======

        Schema::create('users', function (Blueprint $table) 
		{

>>>>>>> 67edc232c18e3132b0548e0a56c482293fb51cdd
            $table->increments('id');  // 自增
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('avatar')->default('default.jpg');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
