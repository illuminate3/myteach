<?php namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Homework;
use Request;

class AdminExercisesController extends Controller {

    public function pages(){
        return view('admin.exercises.index');
    }

    public function all($id){
        return Homework::whereCourse_id($id)->get();
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
        $file =  Request::file('file');
        if($file) {
            $name = $file->getClientOriginalName();
            Request::file('file')->move('homeworks', $name);
            return 'true';
        }else{
            $input = Request::all();
            $input['file'] = '/storage/'.$input['file'];
            return Homework::create($input);
        }

	}

    public function editUpload($id){
        $file =  Request::file('file');
        if($file) {
            $name = $file->getClientOriginalName();
            Request::file('file')->move('homeworks', $name);
            $homework = Homework::findOrFail($id);
            $homework->file = 'homeworks/'.$name;
            $homework->save();
            return 'true';
        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Homework::findOrfail($id);
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
        $homework = Homework::findOrFail($id);
        $homework->title = Request::get('title');
        $homework->description = Request::get('description');
        $homework->save();
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
        $homework = Homework::findOrFail($id);
        $homework->delete();
        return 'true';
	}

    public function active($id){
        $homework = Homework::findOrFail($id);
        $homework->active = ! $homework->active;
        $homework->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Homework::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Homework::deleteAll($inputs);
    }

}
