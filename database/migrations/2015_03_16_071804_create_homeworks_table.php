<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homeworks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id');
			$table->string('title');
			$table->text('description');
			$table->string('file',64);
            $table->tinyInteger('active');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('homeworks');
	}

}
