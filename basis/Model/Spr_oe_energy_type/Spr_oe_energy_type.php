<?php

namespace Basis\Model\Spr_oe_energy_type;

use Engine\Core\Database\ActiveRecord;

class spr_oe_energy_type
{
    use ActiveRecord;

    protected $table = 'spr_oe_energy_type';

    public $id;
    public $name;



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
  
}