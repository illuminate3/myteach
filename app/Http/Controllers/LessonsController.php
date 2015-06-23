<?php namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LessonsController extends Controller {


	public function show($id)
	{
		return Book::whereActive(1)->findOrFail($id);
	}


}
