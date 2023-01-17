<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class Membercontroller extends Controller
{
    //
    function showList() {

        $data = Member::all();
        // $data = Member::paginate(2);

        return view('list', ['users' => $data]);
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

        $data = Member::find($request->user_id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect("/user/member-list");
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
}
