<?php
namespace App\Http\Controllers;

//overall
use Illuminate\Http\Request;
use App\Model\User;
//authenticate
use App\Services\Business\SecurityService;
use App\Services\Business\UserService;
use Exception;
use PDOException;
//logout


class LoginController extends Controller
{

    public function Authenticate(Request $request)
    {
        try {
            // Get the posted Form Database
            $email = $request->input('email');
            $password = $request->input('password');

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
                if (session()->get('active') == 0) {
                    //TODO::userblocked.blade.php
                    return view('userBlocked');
                } else {
                    return view('welcome');
                }
            } else {
                return view('loginFailed');
            }
        } // catch errors
        catch (Exception $e) {
            // BEST PRACTICE: Catch all exceptions, log the exception, and display a common Error page (or use a Global Exception Handler)
            // Log exception and display Exception view
            /* Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data); */
        } //catch PDO errors
        catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
            
        
    }

    public function Logout(Request $request)
    {
        session()->flush();
        return view('/login');
    }
}