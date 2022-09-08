<?php

namespace Basis\Model\Obj_oe_vvd;

use Engine\Core\Database\ActiveRecord;

class obj_oe_vvd
{
    use ActiveRecord;

    protected $table = 'obj_oe_vvd';

    public $id; 				
	public $id_reestr_object; 	
    public $name; 			
 	public $vvd_count; 				
 	public $power; 				
	public $voltage; 				
	public $year_begin;  		
	public $srok;
	public $next_srok;
	
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
	public function getVvd_count()
    {
        return $this->vvd_count;
    }
    public function setVvd_count($vvd_count)
    {
        $this->vvd_count = $vvd_count;
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

 
}