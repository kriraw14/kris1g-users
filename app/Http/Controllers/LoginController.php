<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session, Input, Validator, Redirect;
use Auth;

class LoginController extends Controller
{
    //
    public function postLogin()
    {
        $rules = [
            'email' => 'required|exists:users',
            'password' => 'required'
        ];

        $input = Input::only('email', 'password');

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::to('login')->withInput()->withErrors($validator);
        }

        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'confirmed' => 1
        ];

        if ( ! Auth::attempt($credentials))
        {
            Session::flash('alert-class', 'alert-danger');
            Session::flash('message', 'Email unconfirmed, please check your email!');
            return Redirect::to('login');
        }

        return Redirect::to('home');
    }
}
