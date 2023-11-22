<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Sociolite;
use App\Models\User;
use Auth;
use Mail;
use App\Mail\User\AfterRegister;

class UserController extends Controller
{
    public function login() {
        return view (auth.user.login);
    }

    public function google() {
        return \Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback(){
        $callback = socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback -> getName(),
            'email' => $callback -> getEmail(),
            'avatar' => $callback -> getAvatar(),
            'email_vertified_at' => date('Y-m-d H:i:s', time())
        ];

        // $user = User::firstOrCreate([ 'email' => $callback -> getEmail()], $data);
        $User=user::whereEmail($data['email'])->first();
        if(!$user) {
            $user = User::create($data);
            Mail::to($user->email)->send(new AfterRegister($user));
        }
        Auth::login($user, true);

        return redirect(route('welcome'));
    }
}
