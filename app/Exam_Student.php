<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_Student extends Model {

	protected $table = 'exam_student';

    public function exams(){
        return $this->belongsTo('App\Exam','exam_id');
    }

    public function students(){
        return $this->belongsTo('App\Student','student_id');
    }

}
