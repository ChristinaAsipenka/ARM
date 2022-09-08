<?php

namespace Basis\Model\Obj_ot_tepl_kot;

use Engine\Core\Database\ActiveRecord;

class obj_ot_tepl_kot
{
    use ActiveRecord;

    protected $table = 'obj_ot_tepl_kot';

    public $id; 				
	public $id_reestr_object; 	
	public $teploobm;
    public $name; 				
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
	public function getTeploobm()
    {
        return $this->teploobm;
    }
    public function setTeploobm($teploobm)
    {
        $this->teploobm = $teploobm;
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