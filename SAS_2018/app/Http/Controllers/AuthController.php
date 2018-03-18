<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $req) {
        $user = \App\User::where("username", $req->username)->first();
    	if ( !$user ) {
    		$req->session()->flash("login_error", "User is not found");
    		return redirect()->route('login');
    	}
    	$hashed = $req->password;
    	if ( $user->password == $hashed ) {
    		Auth::login($user);
    		return redirect('/welcome');
    	} else {
    		$req->session()->flash("login_error", "Wrong username or password");
    		return redirect()->route('login');
    	}
    }

}
