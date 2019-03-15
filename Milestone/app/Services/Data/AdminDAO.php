<?php
namespace App\Services\Data;
//TODO:: organize namespaces


class AdminDAO
{

    // create empty connection variable
    private $conn = NULL;

    public function __construct($conn)
    {
        $this->conn = $conn;
        return $this->conn;
    }

    public function allUsers()
    {
        // prepares sql statement
        // adds user input data and executes statement
        $stmt= $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        
 
        
        //return results in array
        if (!$stmt)
        {
          echo "Something wrong in retreiving users!";
          return NULL;
        }

        else
        {
          $allUsers_array = array();
          while ($user = $stmt->fetch())
          {
            array_push($allUsers_array, $user);
          }
            }
            return $allUsers_array;
      }

}