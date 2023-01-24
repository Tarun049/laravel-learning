<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class Membercontroller extends Controller
{
    //
    function showList() {

        // $data = Member::all();
        // $data = Member::paginate(2);

        // return view('list', ['users' => $data]);
        // return view('userLogin', ['users' => $data]);
    }

    function deleteListUser($user_id) {

        $data = Member::find($user_id);
        $data->delete();
        return redirect('/user/member-list');
    }

    function getUpdateListUser($user_id){
        $data = Member::find($user_id);
        return view("updateUserMember",["userData" =>$data]);
    }

    function UpdateListUser(Request $request){

        // $email = $request->email;
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required | min:10',
            'password' => 'required | min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if( $validate ) {


            // $request->session()->put('user_email', $email);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img'), $imageName);

            $data = Member::find($request->user_id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->image = $imageName;
            $data->password = Hash::make($request->password);
            $data->save();

            return redirect("/user/member-list");
        } else {
            echo "validate error";
        }
    }

    function queryBuilder(){
        // $data = DB::table('members')
        // ->where('id','>', '5')
        // ->get();

        // $data = DB::table('members')->
        //     insert(
        //         [
        //             'name' => 'tarun',
        //             'email' => 'tarun1234@gmail.com',
        //             'phone' => 65988986549,
        //             'password' => '12345678',
        //         ]
        //     );

        $data = DB::table('members')->max('id');
        return $data;
    }

    // function to get data from ajax
    function getAjaxData(Request $req) {
        return $req;
    }
}
