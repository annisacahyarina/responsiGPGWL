<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index2Controller extends Controller
{
    //
    public function index2()
    {
        $data = [
            "title" => "BeachBuddy",
        ];


        return view('index2', $data);



    }
}
