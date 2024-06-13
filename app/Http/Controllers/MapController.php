<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "BeachBuddy",
        ];

        if (auth()->check()){

        return view('index', $data);
    }

        return view('index-public', $data);



    }
    public function table()
    {
        $data = [
            "title" => "table",
        ];
        return view('table', $data);
    }

}
