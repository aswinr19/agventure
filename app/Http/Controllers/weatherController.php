<?php

namespace App\Http\Controllers;


class weatherController extends Controller
{
    public function index()
    {
        return view('weather.index',['title'=>'Weather page']);
    }
}
