<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Test;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function testing($id)
    {
        // if(view()->exists('register')){

        $url = route('custom_route', ['id' => $id]);
        echo $url;
        // return view('register');
        // } else { echo "Not Found"; } 
    }

    // db query in controller without model
    function setDbUsingClass()
    {
        $data = DB::select('Select * from users');
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    // db query in controller with model
    function setDbUsingModel()
    {
        return User::all();
    }

    // function to use external api's 
    function getExternalApi()
    {
        $data = Http::get("https://reqres.in/api/users?page=1");

        return view("apiHtml", ["api" => $data['data']]);
    }

    // function to get http requests
    // function to create session
    function testRequest(Request $request)
    {
        $data = $request->input();
        // $email = $data['email'];

        // return $request;

        // $add_user = new Member;
        // $add_user->name = $request->name;
        // $add_user->email = $request->email;
        // $add_user->phone = $request->phone;
        // $add_user->password = Hash::make($request->password);
        // $add_user->save();

        // echo public_path('img');
        // die;
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:members',
            'phone' => 'required | min:10',
            'password' => 'required | min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'confirm-password' => 'required |same:password| min:5',
        ]);
        
        if ($validate) {
            // $request->session()->put('user_email', $email);
            $imageName = time().'.'.$request->image->extension();
            // $request->file('image')->storeAs('public/img', $imageName);
            $request->image->move(public_path('img'), $imageName);


            DB::table('members')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $imageName,
                'password' => Hash::make($request->password),
            ]);
            return redirect('userProfile');
        }

        // echo session("user_email");
        // return $request->input();
    }

    // function to understand file upload
    function flash_session(Request $request)
    {

        $name = $request->input('name');

        $request->file('image')->store('img');
        // echo $name;
        $request->session()->flash('user_name', $name);
        return redirect("flashSession");
    }
}