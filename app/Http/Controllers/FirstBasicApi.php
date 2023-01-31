<?php

namespace App\Http\Controllers;

use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use App\Models\Test;
use PhpParser\Node\Scalar\String_;

class FirstBasicApi extends Controller
{
    //first laravel api
    function fristBasicApi(){
        $data = [
            'name' => 'tarun',
            'email' => 'test@gmail.com',
            'phone' => '12345678',
            'address' => '14/2 indore',
            'country' => 'India',
        ];

        return $data;
    }

    //function to get api data from database
    function membersList(){
        $data = Member::all();
        $data_count = count($data);
        return array('data' => $data, 'info' => array('page'=>1, "total_records"=>$data_count));
    }

    //function to learn api with parameter
    function firstParamApi($id=null){

        $data = $id?Member::find($id):Member::all();

        // $data = Member::query()
        // // ->where('name', 'LIKE', '%'. $id .'%')
        // ->where('id', '=', $id)
        // // ->orWhere('email', 'LIKE', "%$id%")
        // // ->orWhere('phone', 'LIKE', "%$id%")
        // ->first();

        // return $data;

        // $data = (array) $data;
        if( !$id ) {
            $data_count = count($data);
        } elseif( $data == null ){
            $data_count = null;
        } else {
            $data_count = 1;
        }
        return array('data' => $data, 'info' => array('page'=>1, "total_records"=>$data_count));
    }

    // first post api
    function firstPostApi(Request $request) {

        // return $request;

        $phone = $request->phone;

        // $query = Test::where('phone', $phone)->get();
        // return strlen($phone);

        // if( $phone == $query[0]->phone ){
        //     return array("result" => "Duplicate Entry");
        // }
        $save_data = new Test;
        $save_data->name = $request->name;
        $save_data->email = $request->email;
        $save_data->phone = $request->phone;
        $save_data->password = Hash::make($request->password);
        $result = $save_data->save();

        if( $result ) {
            return array("result" => "done");
        } else {
            return array("result" => "error");
        }
        // return $result;

    }
    // function to add put api
    function firstPutApi( Request  $request){
        $update_data = Test::find($request->id);

        $update_data->name = $request->name? $request->name: $update_data->name;
        $update_data->email = $request->email ? $request->email: $update_data->email;
        $update_data->phone = $request->phone? $request->phone: $update_data->phone;
        $update_data->password = $request->password? Hash::make($request->password) : $update_data->password;
        $result = $update_data->save();
        if( $result ) {
            return array("result" => "done");
        } else {
            return array("result" => "error");
        }
    }

    function firstDeleteApi( $user_id=null) {

        if(!$user_id) {
            return array("result" => "Please privode id");
        }
        $user = Test::find($user_id);

        if( $user ) {
            $result = $user->delete();
            if( $result ) {
                return array("result" => "Record Deleted");
            } else {
                return array("result" => "Something went wrong");
            }
        } else {
            return array("result" => "Please provide valid User Id");
        }
    }
}
