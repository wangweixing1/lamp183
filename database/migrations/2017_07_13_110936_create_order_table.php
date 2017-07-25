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
        // 书写订单结构
        Schema::create('order', function (Blueprint $table) {
            $table -> increments('id'); // 自增
            $table -> string('movie_name'); 
            $table -> string('user_name'); 
            $table -> string('time');
            $table -> string('hall');
            $table -> string('price');
            $table -> string('poll');
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
        Schema::dropIfExists('order');
    }
}
