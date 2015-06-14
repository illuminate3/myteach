<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use Request;

class AdminStudentsController extends Controller {

    public function pages(){
        return view('admin.students.index');
    }

    public function all($id){
        return Student::whereCourse_id($id)->get();
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        return Student::create(Request::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Student::findOrfail($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $student = Student::findOrFail($id);
        $student->name = Request::get('name');
        $student->family = Request::get('family');
        $student->email = Request::get('email');
        $student->save();
        return 'true';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $student = Student::findOrFail($id);
        $student->delete();
        return 'true';
	}

    public function active($id){
        $student = Student::findOrFail($id);
        $student->active = ! $student->active;
        $student->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Student::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Student::deleteAll($inputs);
    }

    public function gradesCourse($id,$examId){
        return \DB::table('students')->where('students.course_id','=',"$id")
             ->leftJoin('exam_student',function($join) use ($examId) {
                 $join->on('students.id', '=', 'exam_student.student_id')
                 ->where('exam_student.exam_id','=',$examId);
             })
           // ->leftJoin('exams','exams.id', '=', 'exam_student.exam_id')
            ->select('students.id', 'students.name','students.family','students.email','students.course_id','exam_student.grade','exam_student.present')
            ->get();
//            ->leftJoin('exam_student','students.id', '=', 'exam_student.student_id')//->where('exam_student.exam_id',$examId)
//            ->leftJoin('exams','exams.id', '=', 'exam_student.exam_id')
//            ->select('students.id', 'students.name','students.family','students.email','students.course_id','exam_student.grade', 'exams.high_score')
//            ->get();
    }

    public function grades($id){

        $student = Student::findOrFail($id);
        return $student->exam_student()->wherePresent(0)->with('exams','exams.course.book')->orderBy('created_at')->get();//with('students')->get();
    }

}
