<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use Request;

class AdminGalleryController extends Controller {


    public function all()
    {
        return Image::get(['id','photo']);
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin.gallery.index');
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
        if( $file = Request::file('fileMainSlideShow')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainSlideShow')->move('images/gallery', $name);
            $image = '/images/gallery/' . $name;
            return Image::create([ 'photo' => $image ]);

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
	public function updateGallery($id)
	{
        if( $file = Request::file('fileMainSlideShowEdit')){

            if($gallery = Image::findOrFail($id)){
               // return $gallery;
//                $filename =  public_path().$gallery->image;
//                \File::delete($filename);

                $name = $file->getClientOriginalName();
                $file->move('images/gallery', $name);
                $image = '/images/gallery/' . $name;

                $gallery->photo = $image;
                $gallery->save();
                return $gallery;
            }

        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $gallery = Image::findOrFail($id);
        $gallery->delete();
        $filename =  public_path().$gallery->image;
        \File::delete($filename);
        return 'true';
	}

}
