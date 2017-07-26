<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 书写轮播表结构
        Schema::create('carousel', function (Blueprint $table) {
            $table -> increments('id'); // 自增
            $table -> string('carousel_name');            
            $table -> string('carousel_img');            
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
        Schema::dropIfExists('carousel');
    }
}
