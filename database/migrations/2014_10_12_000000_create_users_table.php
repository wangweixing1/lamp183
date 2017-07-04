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
<<<<<<< HEAD
            $table->increments('id');  // 自增
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('avatar')->default('default.jpg');
=======
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
>>>>>>> dea069a55b4b8a8ae93aa2315a059c77316bf974
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
