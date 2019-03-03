<?php
namespace App\Services\Data;

use App\Services\Business\SecurityService;
use App\Models\UsersModel;

class SecurityDAO
{

    // create empty connection variable
    private $conn = NULL;

    public function __contruct($conn)
    {
        $this->conn = $conn;
    }

    public function loginUser(UsersModel $user)
    {
        $email = $user->getEmail();
        $password = $user->getPassword();
        $stmt = $this->conn->prepare("SELECT * FROM USERS WHERE EMAIL LIKE ? AND PASSWORD LIKE ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

?>