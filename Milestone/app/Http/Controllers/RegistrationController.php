<?php
namespace App\Http\Controllers;
//TODO:: organize namespaces
// overall
use Illuminate\Http\Request;
use App\Model\User;
use App\Services\Business\UserService;
// validateForm
use Illuminate\Validation\ValidationException;
// register
use Exception;
use App\Services\Business\SecurityService;

class RegistrationController extends Controller
{

    private function validateForm(Request $request)
    {
        // BEST PRACTICE: centralize your rules so you have a consistent architecture
        // and even reuse your rules
        // BAD PRACTICE: not using a defined DATA VALIDATION FRAMEWORK, putting rules
        // over your code, doing only on Client Side or Database
        // Setup Data Validation Rules for Login Form
        $rules = [  'first_name' => 'Required | Between:4,10 | Alpha',
                    // 'first_name.required' => "Let's start with what's your first name?" | 'Between:2,25',
                    // 'last_name.required' => "Let's start with what's your last name?" | 'Between:2,25',
                    // 'email.required' => "We need your email, please!" | 'Email' |'Between:6,25',
                    // 'password.required' => "Password must be 6-16 characters!" | 'Between:6,25',
                    // 'password.alpha_num' => "Password must contain at least one uppercase, lowercase, and number."
        ];
        $messages = [
            'required' => 'Let us start with your :attribute?'
        ];
        // Run Data Validation Rules
        $this->validate($request, $rules, $messages);
    }

    public function Register(Request $request)
    {
        try {
            // TODO:: messages for validations
             //Validate the Form Data (note will automatically redirect back to login view if error)
             $this->validateForm($request);

            // Get the posted information
            $first_name = $request->input('first_name');
            if ($request->input('middle_name') == NULL) {
                $middle_name = NULL;
            } else {
                $middle_name = $request->input('middle_name');
            }
            $last_name = $request->input('last_name');
            $email = $request->input('email');
            $password = $request->input('password');

            // create object model
            // save posted form data in user object model
            $user = new User(- 1, $first_name, $middle_name, $last_name, $email, $password, - 1, - 1, - 1);
            
            // execute business service to check for existing account
            $securityService = new SecurityService();
            $status1 = $securityService->authenticate($user);

            // if duplicate failed, if no account exists then it creates account
            if ($status1) {
                return view('registration/duplicateUser');
            } else {
                // execute business service to proceed to register
                $userService = new UserService();
                $status2 = $userService->register($user);

                // failed or success reponse view
                if ($status2) {
                    $d = new UserService();
                    $data = $d->findByLogin($user);
                    return view('welcome');
                    // return view('profile');
                } else {
                    return view('registration/registrationFailed');
                }
            }
        } // catch rules errors
        catch (ValidationException $messages) {
            // NOTE: this exception MUST BE caught before Exception because
            // ValidationException extends from Excetption!!!
            // NOTE: you must rethrow this exception in order for Larvel to display your submitted page with errors!!!
            //
            // Catch and rethrow the Data Validation Exception (so we can catch all others in our next exception catch block)
            throw $messages;
        } // TODO::catch exception errors/log
        catch (Exception $e) {
           return view('exception');
        }
    }
}
