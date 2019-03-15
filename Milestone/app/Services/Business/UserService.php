<?php 
namespace App\Services\Business;
//TODO:: organize namespaces
//overall
use App\Model\User;
use Illuminate\Support\Facades\Log;
use PDO;
use App\Services\Data\UserDAO;
use App\Model\Contact;



class UserService
{
    public function findByLogin(User $user)
    {
        //logging
        Log::info("Entering UserService.findbyLogin()");
        
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
        $service = new UserDAO($conn);
        $flag = $service->findByLogin($user);
        
        //end log
        Log::info("Exiting UserService.findByLogin() with ".$flag);
        
        //return DAO bool
        return $flag;
    }
    
    public function register(User $user)
    {
        //logging
        Log::info("Entering UserService.register()");
        
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
        $service = new UserDAO($conn);
        $flag = $service->registerNewUser($user);
        
        //end log
        Log::info("Exiting UserService.register() with ".$flag);
        
        //return DAO bool
        return $flag;
    }
    
    public function updateContact(Contact $contact)
    {
        //logging
        Log::info("Entering UserService.updateContact()");

        //get credentials for the db
        $host = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $db = config("database.connections.mysql.database");
        
        //create conn to pass through to DAO
        $conn = new PDO("mysql:host=$host;dbname=$db", $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //db conn => DAO
        $service = new UserDAO($conn);
        $flag = $service->updateContact($contact);
        
        //close out log for function
        Log::info("Exiting UserService.updateContact()");
        
        //return DAO boolean
        return $flag;
    }
}

?>