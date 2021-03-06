<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHallTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// 书写日期表结构
		Schema::create('hall', function (Blueprint $table) {
			$table -> increments('id'); // 自增
			$table -> string('hall_name'); 
			$table -> integer('tid'); // 整型
			$table -> string('path');
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
		Schema::dropIfExists('hall');
	}
}
