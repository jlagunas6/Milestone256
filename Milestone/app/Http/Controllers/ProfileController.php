<?php

namespace App\Http\Controllers;
//TODO:: organize namespaces
use Illuminate\Http\Request;
use App\Model\Contact;
use App\Services\Business\UserService;
use Exception;


class ProfileController extends Controller
{    
    public function updateContact(Request $request)
    {
        try {
            //take form data
            $phone = $request->input('phone');
            $ad_lin_1 = $request->input('ad_lin_1');
            $ad_lin_2 = $request->input('ad_lin_2');
            $city = $request->input('city');
            $state = $request->input('state');
            $zip = $request->input('zip');
            
            //create new instance with contact information
            $contact = new Contact($phone, $ad_lin_1, $ad_lin_2, $city, $state, $zip);
            
            //start business service
            $service = new UserService();
            $status = $service->updateContact($contact);
            
            if ($status){
                return view('welcome');
                // return view('profile');
            } else {
                return view('updateFailed');
            }    
        }// catch errors/log
        catch(Exception $e) {
            
        }
    }
}
