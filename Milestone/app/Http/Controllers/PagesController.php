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
        return view('login/login');
    }
    
    //takes user to the registration page
    public function Register(){
        return view('registration/registration');
    }
    
    //TODO::profile function controller
    
    public function editContact(){
        //return view('profile/editContact');
        return view('profile/editContact');
    }
    
    
    
    

}
