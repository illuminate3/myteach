<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_student', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('exam_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->tinyInteger('grade')->unsigned();
            $table->tinyInteger('present')->default(0);
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->unique( array('exam_id','student_id') );
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
		Schema::drop('exam_student');
	}

}
