<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 书写电影表结构
        Schema::create('order', function (Blueprint $table) {
                    $table -> increments('id'); // 自增
                    $table -> string('mid'); // 电影id
                    $table -> string('movie_name'); // 电影id
                    $table -> string('price'); // 价格
                    // $table -> string('uesr_name'); // 用户名
                    $table -> string('set'); // 座位号
                    $table -> string('num'); // 订单号
                    $table -> string('date');// 放映日期
                    $table -> string('time');// 放映时间
                    $table -> string('cinema_name'); // 影城
                    $table -> string('hall_name');// 影厅
                    $table -> smallInteger('status');// 状态
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
        Schema::dropIfExists('order');
    }
}
