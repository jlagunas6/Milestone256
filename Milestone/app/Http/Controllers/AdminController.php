<?php

namespace App\Http\Controllers;

//TODO:: organize namespaces
use Illuminate\Http\Request;
use App\Services\Business\AdminService;
use Exception;


class AdminController extends Controller
{
    //function retrieves all users for admin
    public static function allUsers(){
        try{
            $service = new AdminService();
            $allUsers = $service->allUsers();
            
            return view('admin/allUsers')->with('allUsers',$allUsers);
            
        }//TODO::catches all errors/log
        catch (Exception $e){
            //
        }
    }
}
