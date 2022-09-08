<?php

namespace Basis\Model\Obj_oe_aie;

use Engine\Core\Database\ActiveRecord;

class obj_oe_aie
{
    use ActiveRecord;

    protected $table = 'obj_oe_aie';

    public $id; 				// автономные источники электроснабжения
	public $id_reestr_object; 	//привязка к объекту
    public $name; 				// наименование/ марка
 	public $type; 				//тип
 	public $power; 				//мощность, кВт
	public $factory; 			//завод-изготовитель 
	public $date_last; 		// дата последнего тех обслуживания
	public $place ; 			// место установки
	public $srok; 
	public $next_srok; 
	public $year_begin; 
	public $pitanie; 
	public $mosch;
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
	public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    /////////////////////////////////////////
	public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
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
  public function getFactory()
    {
        return $this->factory;
    }
    public function setFactory($factory)
    {
        $this->factory = $factory;
    }	
    /////////////////////////////////////////	
     public function getDateLast()
    {
        return $this->date_last;
    }
    public function setDateLast($date)
    {
        $this->date_last = $date;
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
     public function getYear_begin()
    {
        return $this->year_begin;
    }
    public function setYear_begin($year_begin)
    {
        $this->year_begin = $year_begin;
    }
     /////////////////////////////////////////	
     public function getPitanie()
    {
        return $this->pitanie;
    }
    public function setPitanie($pitanie)
    {
        $this->pitanie = $pitanie;
    }
     /////////////////////////////////////////	
     public function getMosch()
    {
        return $this->mosch;
    }
    public function setMosch($mosch)
    {
        $this->mosch = $mosch;
    }
 
}