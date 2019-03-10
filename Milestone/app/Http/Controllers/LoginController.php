<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Services\Business\SecurityService;
Use Illuminate\Validation\ValidationException;

//
use App\Services\Business\UserService;
use Exception;
use PDOException;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Login;

class LoginController extends Controller
{

    private function validateForm(Request $request)
    {
        // BEST PRACTICE: centralize your rules so you have a consistent architecture
        // and even reuse your rules
        // BAD PRACTICE: not using a defined DATA VALIDATION FRAMEWORK, putting rules
        // over your code, doing only on Client Side or Database
        // Setup Data Validation Rules for Login Form
        $rules = [
            'email' => 'Required | Between:6,25',
            'password' => 'Required | Between:4,16'
        ];
        // Run Data Validation Rules
        $this->validate($request, $rules);
    }

    public function Authenticate(Request $request)
    {
        try {
            // Get the posted Form Database
            $email = $request->input('email');
            $password = $request->input('password');
            // Validate the Form Data (note will automatically redirect back to login view if error)
            $this->validateForm($request);

            // 2. Create Object Model
            // Save posted Form Data in User Object Model
            $user = new User(- 1, - 1, - 1, - 1, $email, $password, - 1, - 1, - 1);

            // 3. Execute business service
            // Call Security Business Service
            $service = new SecurityService();
            $status = $service->authenticate($user);

            // 4. Navigation
            // Render a failed or success response View and pass the UserModel to it
            if ($status) {
                $d = new UserService();
                $data = $d->findByLogin($user);
                if (session()->get('active') === 0) {
                    return view('userBlocked');
                } else {
                    return view('welcome');
                }
            } else {
                return view('loginFailed');
            }
        } // catch rules errors
        catch (ValidationException $e1) {
            // NOTE: this exception MUST BE caught before Exception because
            // ValidationException extends from Excetption!!!
            // NOTE: you must rethrow this exception in order for Larvel to display your submitted page with errors!!!
            //
            // Catch and rethrow the Data Validation Exception (so we can catch all others in our next exception catch block)
            throw $e1;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        // catch errors
        /*
         * catch (Exception $e) {
         * // BEST PRACTICE: Catch all exceptions, log the exception, and display a common Error page (or use a Global Exception Handler)
         * // Log exception and display Exception view
         * Log::error("Exception: ", array(
         * "message" => $e->getMessage()
         * ));
         * $data = [
         * 'errorMsg' => $e->getMessage()
         * ];
         * return view('exception')->with($data);
         * }
         */
    }

    public function Logout(Request $request)
    {
        session()->flush();
        return view('/login');
    }
}