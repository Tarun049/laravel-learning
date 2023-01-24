<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //html from
    function get_data(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required | min:10',
            'image' => 'required',
            'password' => 'required | min:5',
            'confirm-password' => 'required | min:5',
        ]);

        return $request->input();
        // return view("userForm");
    }
}
