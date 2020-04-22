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
            return redirect()->intended('admin');
        }else{
            
            echo "Vous n'etes pas rentrés dans la boucle \n le pass hashed :". password_hash($credentials['password'],PASSWORD_DEFAULT);
        }
    }
}
