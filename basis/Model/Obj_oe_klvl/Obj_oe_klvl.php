<?php

namespace Basis\Model\Obj_oe_klvl;

use Engine\Core\Database\ActiveRecord;

class obj_oe_klvl
{
    use ActiveRecord;

    protected $table = 'obj_oe_klvl';

    public $id; 				//Транформаторные и распределительные подстанции
	public $id_reestr_object; 	//привязка к объекту
    public $name; 				// название и номер линии 
 	public $type; 				//спр тип КЛ или ВЛ spr_oe_klvl_type 	
	public $volt ; 				//спр напряжение линии spr_oe_klvl_volt 
	public $mark ; 				//марка провода 
	public $length ; 			//длина км
	public $name_center; 		//точка подключения питающего центра
	public $year;  				// год ввода в эксплуатацию
	public $category;  			// спркатегорий spr_oe_category
	public $srok;  				// срок службы
	public $next_srok;  		// продление эксплуатации
	
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
	public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
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
     public function getYear()
    {
        return $this->year;
    }
    public function setYear($year)
    {
        $this->year = $year;
    }

    /////////////////////////////////////////	
     public function getMark()
    {
        return $this->mark;
    }
    public function setMark($mark)
    {
        $this->mark = $mark;
    }	
    /////////////////////////////////////////	
     public function getLength()
    {
        return $this->length;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }	     
    /////////////////////////////////////////
	public function getName_center()
    {
        return $this->name_center;
    }
    public function setName_center($name_center)
    {
        $this->name_center = $name_center;
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
