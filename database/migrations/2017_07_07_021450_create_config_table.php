<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 网站配置表
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');  // 自增
            $table->string('webname');
            $table->string('copy');
            $table->string('keywords');
            $table->string('logo')->default('default.jpg');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::dropIfExists('config');
    }
}
