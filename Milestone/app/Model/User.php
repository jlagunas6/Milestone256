<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //user collums
    private $id;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $email;
    private $password;
    private $admin_role;
    private $created_on;
    private $active;
    
    //user constructor
    public function __construct($id, $fn, $mn, $ln, $em, $pw, $ar, $co, $a)
    {
        $this->id = $id;
        $this->first_name = $fn;
        $this->middle_name = $mn;
        $this->last_name = $ln;
        $this->email = $em;
        $this->password = $pw;
        $this->admin_role = $ar;
        $this->created_on = $co;
        $this->active = $a;
    }
    
    //users collum getters and setters
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getFirst_name()
    {
        return $this->first_name;
    }
    
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }
    
    public function getMiddle_name()
    {
        return $this->middle_name;
    }
    
    public function setMiddle_name($middle_name)
    {
        $this->middle_name = $middle_name;
    }
    
    public function getLast_name()
    {
        return $this->last_name;
    }
    
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function getAdmin_role()
    {
        return $this->admin_role;
    }
    
    public function setAdmin_role($admin_role)
    {
        $this->admin_role = $admin_role;
    }
    
    public function getCreated_on()
    {
        return $this->created_on;
    }
    
    public function setCreated_on($created_on)
    {
        $this->created_on = $created_on;
    }
    
    public function getActive()
    {
        return $this->active;
    }
    
    public function setActive($active)
    {
        $this->active = $active;
    }
    
}
