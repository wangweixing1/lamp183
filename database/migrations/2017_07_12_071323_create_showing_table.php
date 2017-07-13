<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 书写电影表结构
        Schema::create('showing', function (Blueprint $table) {
                    $table -> increments('id'); // 自增
                    $table -> string('showing_name'); 
                    $table -> integer('pid'); // 整型
                    $table -> string('showing_price');
                    $table -> string('showing_depict');
                    $table -> string('showing_img');
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
        Schema::dropIfExists('showing');
    }
}
