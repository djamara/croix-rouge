<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
   
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            ///return redirect()->intended('admin');
            echo 'succes';
            
        }else{
            
            echo 'pasdedonnees';
        }
    }
}
