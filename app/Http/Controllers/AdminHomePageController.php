<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use Laracasts\Flash\Flash;
use Request;
use Redirect;

class AdminHomePageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//        $page = Page::whereTitle('home')->first();
//        if(! $page){
//            $page=nulls;
//        }

		return view('admin.home.index');


	}
	public function pages($item)
	{

        $page = Page::whereTitle($item)->first();
        if(! $page){
            $page='';
            return $page;
        }

		return $page->description;


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($item)
	{
        $input=[];
        $desc = $input = Request::get('description');
        $title = $item;
        $page = Page::whereTitle($item)->first();
        if(! $page){
            $page = new Page();
        }
        $page->description=$desc;
        $page->title=$title;
        $page->save();

        return 'true';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
