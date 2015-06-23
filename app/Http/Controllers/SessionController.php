<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;


class SessionController extends Controller {

	public function login(){
        return view('auth.admin_login');
    }

    public function  valid(Request $request){
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required'/*,'captcha' => 'required|captcha'*/
        ]);

        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials, $request->has('remember')))
        {
            return redirect('/admin');
        }

        return redirect('/adminLogin')
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Username or Password is not correct!',
            ]);


    }

    public function destroy(){
        \Auth::logout();
        return redirect('/');
    }

}
