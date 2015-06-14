<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exam;
use Request;

class AdminExamsController extends Controller {


    public function pages(){
        return view('admin.exams.index');
    }

    public function all($id){
        return Exam::whereCourse_id($id)->get();
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
        return Exam::create(Request::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Exam::with('course','course.book')->findOrfail($id);
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
        $exam = Exam::findOrFail($id);
        $exam->title = Request::get('title');
        $exam->date = Request::get('date');
        $exam->high_score = Request::get('high_score');
        $exam->save();
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
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return 'true';
	}

    public function active($id){
        $exam = Exam::findOrFail($id);
        $exam->active = ! $exam->active;
        $exam->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Exam::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Exam::deleteAll($inputs);
    }

    public function gradesPlot($id){
        $exam = Exam::findOrFail($id);
        return $exam->exam_student()->wherePresent(0)->with('students')->orderBy('grade','desc')->get();//with('students')->get();
    }

}
