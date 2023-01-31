<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    // function for login user
    function userLoginAuth(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validate) {
            $logged_user = Member::where('email', '=', $request->email)->first();
            if ($logged_user) {

                if (Hash::check($request->password, $logged_user->password)) {
                    $email = $logged_user->email;
                    // return $logged_user;
                    $request->session()->put('user_email', $email);
                    return redirect('userProfile');
                } else {
                    return back()->with('fail', "Password Dosen't match !!");
                }
            } else {
                return back()->with('fail', "This User is not registered !!");
            }
        }
    }
}