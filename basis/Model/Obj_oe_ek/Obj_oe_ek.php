<?php

namespace Basis\Model\Obj_oe_ek;

use Engine\Core\Database\ActiveRecord;

class obj_oe_ek
{
    use ActiveRecord;

    protected $table = 'obj_oe_ek';

    public $id; 				
	public $id_reestr_object; 	
    public $name; 			
 	public $ek_count; 
	public $nazn;
 	public $power; 				
	public $date_vid; 				
	public $rezim; 
	public $is_avt; 
	public $is_pu;
	public $is_ak; 
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
	public function getEk_count()
    {
        return $this->ek_count;
    }
    public function setEk_count($ek_count)
    {
        $this->ek_count = $ek_count;
    }
    /////////////////////////////////////////		
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
	public function getNazn()
    {
        return $this->nazn;
    }
    public function setNazn($nazn)
    {
        $this->nazn = $nazn;
    }
    /////////////////////////////////////////
 	public function getDate_vid()
    {
        return $this->date_vid;
    }
    public function setDate_vid($date_vid)
    {
        $this->date_vid = $date_vid;
    }
    /////////////////////////////////////////
 	public function getRezim()
    {
        return $this->rezim;
    }
    public function setRezim($rezim)
    {
        $this->rezim = $rezim;
    }
    /////////////////////////////////////////
 	public function getIs_avt()
    {
        return $this->is_avt;
    }
    public function setIs_avt($is_avt)
    {
        $this->is_avt = $is_avt;
    }
    /////////////////////////////////////////
 	public function getIs_pu()
    {
        return $this->is_pu;
    }
    public function setIs_pu($is_pu)
    {
        $this->is_pu = $is_pu;
    }
    /////////////////////////////////////////
  	public function getIs_ak()
    {
        return $this->is_ak;
    }
    public function setIs_ak($is_ak)
    {
        $this->is_ak = $is_ak;
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
     public function getPlace()
    {
        return $this->place;
    }
    public function setPlace($place)
    {
        $this->place = $place;
    }
 
}