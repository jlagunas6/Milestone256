<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //contact colums
    private $phone;
    private $ad_lin_1;
    private $ad_lin_2;
    private $city;
    private $state;
    private $zip;
    
    //user constructor
    public function __construct($p, $ad1, $ad2, $c, $s, $z)
    {
        $this->phone = $p;
        $this->ad_lin_1 = $ad1;
        $this->ad_lin_2 = $ad2;
        $this->city = $c;
        $this->state = $s;
        $this->zip = $z;
    }
    
    //contact info getters and setters
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getAd_lin_1()
    {
        return $this->ad_lin_1;
    }

    public function setAd_lin_1($ad_lin_1)
    {
        $this->ad_lin_1 = $ad_lin_1;
    }

    public function getAd_lin_2()
    {
        return $this->ad_lin_2;
    }

    public function setAd_lin_2($ad_lin_2)
    {
        $this->ad_lin_2 = $ad_lin_2;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }
 
}
