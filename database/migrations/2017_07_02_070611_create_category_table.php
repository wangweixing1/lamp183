<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           // 书写表结构
           Schema::create('category', function (Blueprint $table) {
                    $table -> increments('id'); // 自增
                    $table -> string('name'); 
                    $table -> integer('pid'); // 整型
                    $table -> string('path');
                    $table -> smallInteger('status'); // 小整型
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
        Schema::dropIfExists('category');
    }
}
