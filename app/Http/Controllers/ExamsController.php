<?php namespace App\Http\Controllers;

use App\Course;
use App\Exam;
use App\Exam_Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Stringy\StaticStringy;

class ExamsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('exams.index');
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
		return Exam::whereCourse_id($id)->whereActive(1)->get();
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

    public function getPassword($id, Request $request){

        $this->validate($request, [
             'email' => 'required | email'
        ]);
        $email = $request->get('email');

        $student = Student::whereCourse_id($id)->whereEmail($email)->with('course.book')->first();

        if(! $student){
            return Redirect::back()->withErrors(['email'=>'This Email address is not defined in this course!']);
        }else{
            $student_email = $student->email;
            $user = User::whereCourse_id($id)->whereEmail($student_email)->first();
            if(! $user){
                $user = new User();
            }
            $user->name = $student->name . ' '. $student->family;
            $user->email = $student_email;
            $user->course_id = $id;
            $random = str_random(14);
            $user->password = \Hash::make($random);
            $user->save();
            $this->sendEmail($random,$student);

            Flash::success('Password will send to your Email in few minutes ');
            return Redirect::to('/');

        }
    }

    public function sendEmail($pass,$student)
    {
        $course_title = $student->course->book->title;
        $subject = 'Password for '. $course_title . ' course';
        \Mail::send('emails.get_password',['pass'=>$pass,'title'=>$course_title],function($message) use  ($subject,$student){
            $message->to($student->email)->subject($subject);
        });
    }

}
