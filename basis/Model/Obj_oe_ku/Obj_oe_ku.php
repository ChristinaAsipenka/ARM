<?php

namespace Basis\Model\Obj_oe_ku;

use Engine\Core\Database\ActiveRecord;

class obj_oe_ku
{
    use ActiveRecord;

    protected $table = 'obj_oe_ku';

    public $id; 				
	public $id_reestr_object; 	
    public $name; 			
 	public $ku_count; 				
 	public $power; 				
	public $voltage; 				
	public $count_ar;
	public $max_ar;
	public $year_begin;  		
	public $srok;
	public $next_srok;
	public $place;
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
	public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    /////////////////////////////////////////
	public function getKu_count()
    {
        return $this->ku_count;
    }
    public function setKu_count($ku_count)
    {
        $this->ku_count = $ku_count;
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
  public function getVoltage()
    {
        return $this->voltage;
    }
    public function setVoltage($voltage)
    {
        $this->voltage = $voltage;
    }	

    	
     /////////////////////////////////////////	
     public function getYear_begin()
    {
        return $this->year_begin;
    }
    public function setYear_begin($year_begin)
    {
        $this->year_begin = $year_begin;
    }	
     /////////////////////////////////////////	
     public function getSrok()
    {
        return $this->srok;
    }
    public function setSrok($srok)
    {
        $this->srok = $srok;
    }
     /////////////////////////////////////////	
     public function getNext_srok()
    {
        return $this->next_srok;
    }
    public function setNext_srok($next_srok)
    {
        $this->next_srok = $next_srok;
    }
     /////////////////////////////////////////	
     public function getCount_ar()
    {
        return $this->count_ar;
    }
    public function setCount_ar($count_ar)
    {
        $this->count_ar = $count_ar;
    }
      /////////////////////////////////////////	
     public function getMax_ar()
    {
        return $this->max_ar;
    }
    public function setMax_ar($max_ar)
    {
        $this->max_ar = $max_ar;
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
}