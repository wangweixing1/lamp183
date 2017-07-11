<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// 书写日期表结构
		Schema::create('project', function (Blueprint $table) {
			$table -> increments('id'); // 自增
			$table -> string('cinema_id'); 
			$table -> string('hall_id'); 
			$table -> string('movie_id'); 
			$table -> string('date_id'); 
			$table -> string('time_id'); 
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
		Schema::dropIfExists('project');
	}
}
