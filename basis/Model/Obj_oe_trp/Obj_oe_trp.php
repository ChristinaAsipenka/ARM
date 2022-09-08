<?php

namespace Basis\Model\Obj_oe_trp;

use Engine\Core\Database\ActiveRecord;

class obj_oe_trp
{
    use ActiveRecord;

    protected $table = 'obj_oe_trp';

    public $id; 				//Транформаторные и распределительные подстанции
	public $id_reestr_object; 	//привязка к объекту
    public $name; 				// наименование/ марка
 	public $id_type; 			//тип из справочника ... изначально задумано как отдельный справочник, но пока сделано для ручного ввода	
 	public $power; 				//мощность, кВт
	public $volt; 				//напряжение, кВ
	public $year_begin;  		// год ввода в эксплуатацию
	public $category;
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
	public function getId_type()
    {
        return $this->id_type;
    }
    public function setId_type($id_type)
    {
        $this->id_type = $id_type;
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
  public function getVolt()
    {
        return $this->volt;
    }
    public function setVolt($volt)
    {
        $this->volt = $volt;
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
     public function getCategory()
    {
        return $this->category;
    }
    public function setCategory($category)
    {
        $this->category = $category;
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