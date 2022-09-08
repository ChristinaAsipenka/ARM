<?php

namespace Basis\Model\Obj_oe_avr;

use Engine\Core\Database\ActiveRecord;

class obj_oe_avr
{
    use ActiveRecord;

    protected $table = 'obj_oe_avr';

    public $id;
	public $id_reestr_object;
    public $place;
 	public $power; 
 	public $time; 
	public $date ; 

	
/////////////////////////////////////////
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
 /////////////////////////////////////////
    public function getId_reestr_object()
    {
        return $this->id_reestr_object;
    }
    public function setId_reestr_object($id_reestr_object)
    {
        $this->id_reestr_object = $id_reestr_object;
    }
  /////////////////////////////////////////
    public function getPlace()
    {
        return $this->place;
    }
    public function setPlace($place)
    {
        $this->place = $place;
    }
    /////////////////////////////////////////	
     public function getPower()
    {
        return $this->power;
    }
    public function setPower($power)
    {
        $this->power = $power;
    }
    /////////////////////////////////////////	
     public function getTime()
    {
        return $this->time;
    }
    public function setTime($time)
    {
        $this->time = $time;
    }	
    /////////////////////////////////////////	
     public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }	
    
}