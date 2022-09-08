<?php

namespace Basis\Model\Obj_oti_boiler_vapor;

use Engine\Core\Database\ActiveRecord;

class obj_oti_boiler_vapor
{
    use ActiveRecord;

    protected $table = 'obj_oti_boiler_vapor';

    public $id;
	public $id_reestr_object;
    public $type;
 	public $year; 
	public $power;
	public $counts;
	public $perfomance;
	public $vapor_type_osn_fuel;
	public $vapor_type_rezerv_fuel;
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
     public function getPerfomance()
    {
        return $this->perfomance;
    }
    public function setPerfomance($perfomance)
    {
        $this->perfomance = $perfomance;
    } 
   /////////////////////////////////////////	
     public function getVapor_type_osn_fuel()
    {
        return $this->vapor_type_osn_fuel;
    }
    public function setVapor_type_osn_fuel($vapor_type_osn_fuel)
    {
        $this->vapor_type_osn_fuel = $vapor_type_osn_fuel;
    } 	
   /////////////////////////////////////////	
     public function getVapor_type_rezerv_fuell()
    {
        return $this->vapor_type_rezerv_fuel;
    }
    public function setVapor_type_rezerv_fuel($vapor_type_rezerv_fuel)
    {
        $this->vapor_type_rezerv_fuel = $vapor_type_rezerv_fuel;
    } 	
	
	
	
}