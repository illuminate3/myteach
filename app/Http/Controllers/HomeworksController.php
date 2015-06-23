<?php namespace App\Http\Controllers;

use App\Homework;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeworksController extends Controller {



	public function show($id)
	{
		return Homework::whereActive(1)->whereCourse_id($id)->orderBy('created_at')->get();
	}

    public function exercise($id){
        return Homework::whereActive(1)->findOrFail($id);
    }

}
