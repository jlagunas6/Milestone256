<?php
namespace App\Services\Data;

use App\Model\User;

use Illuminate\Support\Facades\DB;

class SecurityDAO
{

    // create empty connection variable
    private $conn = NULL;

    public function __contruct($conn)
    {
        $this->conn = $conn;
        return $this->conn;
    }

    public function findUser(User $user)
    {
        // get email and password from login user model
        $email = $user->getEmail();
        $password = $user->getPassword();

        // prepares sql statement
        // adds user input data and executes statement
        $stmt = DB::connection()->select('SELECT EMAIL, PASSWORD FROM USERS WHERE EMAIL = :email AND PASSWORD = :password', ['email'=>$email, 'password'=>$password]);
        //TODO: 2.connection
        /* $stmt = $this->conn->prepare("SELECT EMAIL, PASSWORD FROM USERS WHERE EMAIL LIKE ? AND PASSWORD LIKE ?");
        $stmt->execute(array(
            $email,
            $password
        )); */

        // if user does not exist or info does not match return FALSE
        // if user exists and info is correct return TRUE       
/*         //TODO: 3.connection
        $result = $stmt->fetch_all();
        if ($result->num_rows === 0) {
            return FALSE;
        } else {
            return TRUE;
        } */
        if ($stmt==NULL) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

?>