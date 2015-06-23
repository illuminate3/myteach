<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Latest_News;
use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller {

	public function index(){

        return view('pages.home');
    }
	public function cvPage(){

        return view('pages.cv');
    }
	public function persianPage(){

        return view('pages.persian');
    }

	public function home(){
        $page = Page::whereTitle('home')->first();
        if(! $page){
            return '';
        }else{
            return $page;
        }
    }

	public function news(){
        $news = Latest_News::whereActive(1)->orderBy('created_at','desc')->take(10)->get();
        return $news;
    }

	public function cv(){
        $page = Page::whereTitle('cv')->first();
        if(! $page){
            return '';
        }else{
            return $page;
        }
    }

	public function persian(){
        $page = Page::whereTitle('persian')->first();
        if(! $page){
            return '';
        }else{
            return $page;
        }
    }

	public function showNews($id){
        $news = Latest_News::whereActive(1)->findOrFail($id);
        return $news;
    }

}
