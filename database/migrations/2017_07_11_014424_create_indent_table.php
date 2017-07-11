<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 书写订单结构
        Schema::create('indent', function (Blueprint $table) {
            $table -> increments('id'); // 自增
            $table -> string('movie_id'); 
            $table -> string('user_id'); 
            $table -> string('poll');
            $table -> string('date');
            $table -> string('state');
            
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
    }
}
