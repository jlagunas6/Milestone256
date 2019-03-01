<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //takes user to the home page
    public function Index(){
        return view('welcome');
    }
    
    //takes user to the login page
    public function Login(){
        return view('login');
    }
}
