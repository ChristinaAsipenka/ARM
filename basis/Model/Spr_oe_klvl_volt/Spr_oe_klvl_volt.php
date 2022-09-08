<?php

namespace Basis\Model\Spr_oe_klvl_volt;

use Engine\Core\Database\ActiveRecord;

class spr_oe_klvl_volt
{
    use ActiveRecord;

    protected $table = 'spr_oe_klvl_volt';

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