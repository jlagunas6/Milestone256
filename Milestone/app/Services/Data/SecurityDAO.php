<?php
namespace App\Services\Data;

use App\Model\User;

class SecurityDAO
{

    // create empty connection variable
    private $conn = NULL;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function findUser(User $user)
    {
        // get email and password from login user model
        $email = $user->getEmail();
        $password = $user->getPassword();

        // prepares sql statement
        // adds user input data and executes statement
        $stmt= $this->conn->prepare("SELECT * FROM USERS WHERE EMAIL = ? AND PASSWORD = ?");
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->execute();

        // if user does not exist or info does not match return FALSE
        // if user exists and info is correct return TRUE
        if ($stmt->rowCount() === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

?>