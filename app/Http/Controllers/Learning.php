<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Learning extends Controller
{
    //
    function loadView() {


        $data = ['English', 'Hindi', 'Maths'];

        return view('learning', ['subjects' => $data ]);
    }
}
