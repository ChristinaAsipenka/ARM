<?php

namespace Basis\Model\Spr_oe_klvl_type;

use Engine\Core\Database\ActiveRecord;

class spr_oe_klvl_type
{
    use ActiveRecord;

    protected $table = 'spr_oe_klvl_type';

    public $id;
    public $name;
    public $name_short;


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
    public function getName_short()
    {
        return $this->name_short;
    }
    public function setName_short($name_short)
    {
        $this->name_short = $name_short;
    }
  
}