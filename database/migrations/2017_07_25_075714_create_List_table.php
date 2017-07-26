<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 书写榜单结构
        Schema::create('list', function (Blueprint $table) {
            $table -> increments('id'); // 自增
            $table -> string('list_name')->unique();
            $table -> string('list_depict');
            $table -> string('list_img')->default('default.jpg');
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
        Schema::dropIfExists('list');
    }
}
