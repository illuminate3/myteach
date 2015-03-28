<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Course;

class AdminCoursesController extends Controller {

    public function pages(){
        return view('admin.courses.index');
    }

    public function all(){
        //return Course::with('book')->get();
        return \DB::table('courses')
            ->leftJoin('books','courses.book_id', '=', 'books.id')
            ->select('courses.id', 'courses.created_at','courses.year','courses.semester','courses.active', 'books.title')
            ->get();
    }

    public function active($id){
        $course = Course::findOrFail($id);
        $course->active = ! $course->active;
        $course->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Course::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Course::deleteAll($inputs);
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
        return Course::create(Request::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return \DB::table('courses')->where('courses.id','=',"$id")
            ->leftJoin('books','courses.book_id', '=', 'books.id')
            ->select('courses.id', 'courses.created_at','courses.year','courses.semester','courses.active', 'books.title')
            ->get();
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
        $course = Course::findOrFail($id);
        $course->year = Request::get('year');
        $course->semester = Request::get('semester');
        $course->save();
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
        $course = Course::findOrFail($id);
        $course->delete();
        return 'true';
	}

}
