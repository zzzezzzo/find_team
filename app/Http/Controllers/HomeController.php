<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('user.dashboard');
    }
    public function store(){
        // code to store data in database goes here
        return view('user.post');
    }
}
