<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Exam_Student;
use App\Student;
use App\Exam;
use App\Emails\SendAll;

class AdminExamsGradesController extends Controller {


	public function store()
	{
//        $data =  Request::all();
//
//        return $data[0]['grade'];

		$grade = Request::get('grade');
        $exam_id = Request::get('exam_id');
        $student_id = Request::get('student_id');
        $model = '';
        if($a = Exam_Student::whereStudent_id($student_id)->whereExam_id($exam_id)->first()){
            $model = $a;
        }else{

            $model = new Exam_Student();
        }
        $model->student_id = $student_id;
        $model->grade = $grade;
        $model->exam_id = $exam_id;
        $model->save();
        return 'true';
	}

    public function present($student_id,$exam_id){
        if($a = Exam_Student::whereStudent_id($student_id)->whereExam_id($exam_id)->first()){
            $model = $a;
        }else {
            $model = new Exam_Student();
            $model->student_id = $student_id;
            $model->exam_id = $exam_id;
        }
        $model->present = ! $model->present;
        $model->save();
        return 'true';

    }

    public function emailAll(SendAll $sendAll){
        $exam_id =  Request::get('examId');
        $present = 0;
        $title =  Request::get('tile');
        $description =  Request::get('description');
        $students = \DB::table('exam_student')->whereExam_id($exam_id)->wherePresent("0")
            ->leftJoin('students','students.id', '=', 'exam_student.student_id')
            ->select('students.id', 'students.name','students.family','students.email','exam_student.grade','exam_student.present')
            ->get();

       // $students = Student::wherePresent(0)->whereExam_id($exam_id)->get();

       return $sendAll->sendAll($students,$title,$description);



    }



}
