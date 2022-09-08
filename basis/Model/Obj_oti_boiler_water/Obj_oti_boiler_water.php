<?php

namespace Basis\Model\Obj_oti_boiler_water;

use Engine\Core\Database\ActiveRecord;

class obj_oti_boiler_water
{
    use ActiveRecord;

    protected $table = 'obj_oti_boiler_water';

    public $id;
	public $id_reestr_object;
    public $type;
 	public $year; 
	public $power;
	public $counts;
	public $type_osn_fuel;
	public $type_rezerv_fuel;

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
    public function getType_boiler()
    {
        return $this->type;
    }
    public function setType_boiler($type)
    {
        $this->type = $type;
    }
  /////////////////////////////////////////	
     public function getYear()
    {
        return $this->year;
    }
    public function setYear($year)
    {
        $this->year = $year;
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
     public function getCounts()
    {
        return $this->counts;
    }
    public function setCounts($counts)
    {
        $this->counts = $counts;
    }
    /////////////////////////////////////////	
    public function getType_osn_fuel()
    {
        return $this->type_osn_fuel;
    }
    public function setType_osn_fuel($type_osn_fuel)
    {
        $this->type_osn_fuel = $type_osn_fuel;
    }
    /////////////////////////////////////////	
    public function getType_rezerv_fuel()
    {
        return $this->type_rezerv_fuel;
    }
    public function setType_rezerv_fuel($type_rezerv_fuel)
    {
        $this->type_rezerv_fuel = $type_rezerv_fuel;
    } 
 
 
 
}