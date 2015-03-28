<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Book;

class AdminBooksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Book::all();
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
        return Book::create(Request::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Book::findOrfail($id);
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
		$book = Book::findOrFail($id);
        $book->title = Request::get('title');
        $book->intro = Request::get('intro');
        $book->description = Request::get('description');
        $book->save();
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
        $book = Book::findOrFail($id);
        $book->delete();
        return 'true';
	}
    public function active($id){
        $book = Book::findOrFail($id);
        $book->active = ! $book->active;
        $book->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Book::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Book::deleteAll($inputs);
    }

}
