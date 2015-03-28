<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller {

	public function home(){
        $page = Page::whereTitle('home')->first();
        if(! $page){
            $page=null;
        }
        return view('pages.home',compact('page'));
    }

}
