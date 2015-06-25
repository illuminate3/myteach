<?php namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class AdminContactController extends Controller {


    public function all()
    {
        return Contact::all();
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin.contact.index');
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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Contact::findOrFail($id);
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
        $question = Contact::findOrFail($id);
        //return $question;
        $subject_answer = Request::get('subject_answer');
        $message_answer = Request::get('message_answer');
        $question->subject_answer = $subject_answer;
        $question->message_answer = $message_answer;
        $question->checked =1;
        $question->save();
        \Mail::send('emails.answer_question',['question'=>$message_answer],function($message) use  ($subject_answer,$question){
            $message->to($question->email)->subject($subject_answer);
        });
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
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return 'true';
    }

    public function active($id){
        $contact = Contact::findOrFail($id);
        $contact->active = ! $contact->active;
        $contact->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Contact::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Contact::deleteAll($inputs);
    }


}
