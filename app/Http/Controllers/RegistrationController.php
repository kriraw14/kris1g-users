<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Input, Validator, Redirect, Session;
use App\User;
use Hash, Mail;

class RegistrationController extends Controller
{
    //
    public function postRegister()
    {
        $rules = [
            'name' => 'required|max:255',
            'lastname' =>'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ];

        $input = Input::only(
            'name',
            'lastname',
            'email',
            'password',
            'password_confirmation'
        );

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::to('register')->withInput()->withErrors($validator);
        }

        $confirmation_code = str_random(30);

        User::create([
            'name' => Input::get('name'),
            'lastname' => Input::get('lastname'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'confirmation_code' => $confirmation_code
        ]);

        Mail::send('email.verify', ['confirmation_code' => $confirmation_code], function($m) {
            $m->from('kris1.anywhere@gmail.com', 'Krishan');
            $m->to(Input::get('email'), Input::get('name'))
                ->subject('Confirm your email address');
        });

        Session::flash('message', 'Thanks for signing up! Please check your email for confirmation.');

        return Redirect::to('register');
    }
    public function confirm($confirmation_code)
    {
        if(!$confirmation_code)
        {
            return "unlisted link";
        }

        $user = User::where('confirmation_code', $confirmation_code)->first();

        if (!$user)
        {
            return "unlisted link";
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Session::flash('message', 'Your account has been successfully verified, please login!');

        return Redirect::to('login');
    }
}
