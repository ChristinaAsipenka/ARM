<?php

namespace Basis\Model\Obj_oe_block;

use Engine\Core\Database\ActiveRecord;

class obj_oe_block
{
    use ActiveRecord;

    protected $table = 'obj_oe_block';

    public $id; 				
	public $id_reestr_object; 	
    public $name; 				
 	public $type; 				
	public $power ; 			
	public $add_load ; 				
				


	
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
	public function getPower()
    {
        return $this->power;
    }
    public function setPower($power)
    {
        $this->power = $power;
    }
    /////////////////////////////////////////	
	public function getAdd_load()
    {
        return $this->add_load;
    }
    public function setAdd_load($add_load)
    {
        $this->add_load = $add_load;
    }	
}
