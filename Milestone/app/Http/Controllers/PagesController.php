<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

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
    
    //takes user to the registration page
    public function Register(){
        return view('registration');
    }
    
    
    
    public function allusers()
    {
        $users = \App\Model\Users::all();
        
        return view('allusers', compact('users'));
    }
}
