<?php

namespace Basis\Model\Spr_units_power;

use Engine\Core\Database\ActiveRecord;

class spr_units_power
{
    use ActiveRecord;

    protected $table = 'spr_units_power';

    public $id;
    public $name;
	public $ratio;


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
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
	 /////////////////////////////////////////
    public function getRatio()
    {
        return $this->ratio;
    }
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;
    }
 
}