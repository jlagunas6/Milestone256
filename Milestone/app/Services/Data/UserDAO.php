<?php
namespace App\Services\Data;

use App\Model\User;

use PDO;


class UserDAO
{

    // create empty connection variable
    private $conn = NULL;

    public function __construct($conn)
    {
        $this->conn = $conn;
        return $this->conn;
    }

    public function findByLogin(User $user)
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

        //push all to session
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        session()->put('id', $result['id']);
        session()->put('first_name', $result['first_name']);
        session()->put('middle_name', $result['middle_name']);
        session()->put('last_name', $result['last_name']);
        session()->put('email', $result['email']);
        session()->put('password', $result['password']);
        session()->put('admin_role', $result['admin_role']);
        session()->put('active', $result['active']);

    }
}

?>