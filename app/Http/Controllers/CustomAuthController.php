<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:12',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (User::where('password', '=',$request->password)
                ->orWhere('email','=',$request->email)->first()) {

                $request->session()->put('loginId', $user->id);
                return redirect('/');

            } else {
                return back()->with('fail', 'Password is Wrong.');
            }

        } else {
            return back()->with('fail', 'This email is not registered.');
        }

    }


    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }else{
            return redirect('login');
        }
    }

}
