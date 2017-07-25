<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 书写电影表结构
        Schema::create('coming', function (Blueprint $table) {
                    $table -> increments('id'); // 自增
                    $table -> string('coming_name'); 
                    $table -> integer('pid'); // 整型
                    $table -> string('coming_price');
                    $table -> string('coming_depict');
                    $table -> string('coming_img');
                    $table -> smallInteger('status');
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
        Schema::dropIfExists('coming');
    }
}
