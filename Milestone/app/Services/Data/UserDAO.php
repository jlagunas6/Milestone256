<?php
namespace App\Services\Data;

use App\Model\User;
use App\Model\Contact;

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
    
    public function updateContact(Contact $contact)
    {
        //take info from contact model
        $id = session()->get('id');
        $phone = $contact->getPhone();
        $ad1 = $contact->getAd_lin_1();
        $ad2 = $contact->getAd_lin_2();
        $city = $contact->getCity();
        $state = $contact->getState();
        $zip = $contact->getZip();
        
        $check = $this->conn->prepare("SELECT user_id FROM contact WHERE user_id = ?");
        $check->bindParam(1, $id);
        $check->execute();
        
        
        //sql prepare/execute
        //if no contact information exists        
        if($check->rowCount() === 0){ 
            $stmt = $this->conn->prepare("INSERT INTO contact VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $phone);
            $stmt->bindParam(3, $ad1);
            $stmt->bindParam(4, $ad2);
            $stmt->bindParam(5, $city);
            $stmt->bindParam(6, $state);
            $stmt->bindParam(7, $zip);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return FALSE;
            }
            else{
                
                return TRUE;
            }
        }// if contact information already exists
        else {
            $stmt = $this->conn->prepare("UPDATE contact SET phone = ?, address_1 = ?, address_2 = ?, city = ?, state = ?, zip =? WHERE user_id = ?");
            $stmt->bindParam(1, $phone);
            $stmt->bindParam(2, $ad1);
            $stmt->bindParam(3, $ad2);
            $stmt->bindParam(4, $city);
            $stmt->bindParam(5, $state);
            $stmt->bindParam(6, $zip);
            $stmt->bindParam(7, $id);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return FALSE;
            }
            else{
                
                return TRUE;
            }
        }
    }
}