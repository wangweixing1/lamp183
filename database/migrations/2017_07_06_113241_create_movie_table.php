<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 书写电影表结构
        Schema::create('movie', function (Blueprint $table) {
                    $table -> increments('id'); // 自增
                    $table -> string('movie_name'); 
                    $table -> integer('tid'); // 整型
                    $table -> string('price');
                    $table -> string('depict');
                    $table -> string('movie_img');
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
        Schema::dropIfExists('movie');
    }
}
