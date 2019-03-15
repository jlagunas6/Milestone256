<?php 
namespace App\Services\Business;

//TODO:: organize namespaces
//overall
use Illuminate\Support\Facades\Log;
use PDO;
use App\Services\Data\AdminDAO;



class AdminService
{
    public function allUsers()
    {
        //logging
        Log::info("Entering AdminService.allUsers()");
        
        //get credentials for the db
        $host = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $db = config("database.connections.mysql.database");
        
        //create conn to pass through to DAO
        $conn = new PDO("mysql:host=$host;dbname=$db", $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create DAO with connection
        //call function to login user
        $service = new AdminDAO($conn);
        $allUsers = $service->allUsers();
        
        //end log
        Log::info("Exiting AdminService.allUsers() with ");
        
        //return DAO array
        return $allUsers;
    }
}

?>