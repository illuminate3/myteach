<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Latest_News;
use Request;

class AdminLatestNewsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('admin.latest.index');
	}
	public function getNews()
	{

        return Latest_News::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.latest.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return Latest_News::create(Request::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Latest_News::find($id);
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
		$latest = Latest_News::findOrFail($id);
        $latest->title = Request::get('title');
        $latest->intro = Request::get('intro');
        $latest->description = Request::get('description');
        $latest->save();
        return 'true';

	}
    public function active($id){
        $latest = Latest_News::findOrFail($id);
        $latest->active = ! $latest->active;
        $latest->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Latest_News::activeAll($inputs);
//        $inputs = json_decode($inputsJson);
//        dd($inputs);
//        foreach($inputs as $input){
//            echo $input->title;
//        }


    }
    public function deleteAll(){
        $inputs = (Request::all());
        return Latest_News::deleteAll($inputs);
    }
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id)
	{
        $latest = Latest_News::findOrFail($id);
        $latest->delete();
        return 'true';

    }

}
