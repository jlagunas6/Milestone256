<?php
namespace App\Services\Data;

use App\Model\User;

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
        if ($stmt->execute())
        {
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        session()->put('id', $result['id']);
        session()->put('first_name', $result['first_name']);
        session()->put('middle_name', $result['middle_name']);
        session()->put('last_name', $result['last_name']);
        session()->put('email', $result['email']);
        session()->put('password', $result['password']);
        session()->put('admin_role', $result['admin_role']);
        session()->put('active', $result['active']);
        return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function registerNewUser(User $user)
    {
        // get email and password from login user model
        $first_name = $user->getFirst_name();
        $middle_name = $user->getMiddle_name();
        $last_name = $user->getLast_name();
        $email = $user->getEmail();
        $password = $user->getPassword();
        //TODO:: date variable
        
        // prepares sql statement
        // adds user input data and executes statement
        $stmt= $this->conn->prepare("INSERT INTO users(first_name, middle_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)");                      
        $stmt->bindParam(1, $first_name);
        $stmt->bindParam(2, $middle_name);
        $stmt->bindParam(3, $last_name);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $password);
        $stmt->execute();
        
        if($stmt->rowCount() === 0){
            return FALSE;
        }
        else{
            return TRUE;        
        }
    }
}