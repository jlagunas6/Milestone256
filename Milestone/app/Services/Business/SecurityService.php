<?php 
namespace App\Services\Business;

use App\Model\User;
use Illuminate\Support\Facades\Log;
use PDO;
use App\Services\Data\SecurityDAO;



class SecurityService
{
    public function authenticate(User $user)
    {
        //logging
        Log::info("Entering SecurityService.authenticate()");
        
        //BEST PRACTICE: externalize your application configuration
        //get credentials for the db
        $host = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $db = config("database.connections.mysql.database");
        
        //BEST PRACTICE: do not create db conn in DAO
        //create conn to pass through to DAO
        //TODO: 1.connection
        $conn = NULL; //new PDO("mysql:host=localhost;dbname=Milestone256", $username,$password);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create DAO with connection
        //call function to login user
        $service = new SecurityDAO($conn);
        $flag = $service->findUser($user);
        
        //end log
        Log::info("Exiting SercurityService.authenticate() with ".$flag);
        
        //return DAO bool
        return $flag;
    }
}

?>