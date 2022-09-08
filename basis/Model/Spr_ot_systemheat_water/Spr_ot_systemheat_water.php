<?php

namespace Basis\Model\Spr_ot_systemheat_water;

use Engine\Core\Database\ActiveRecord;

class spr_ot_systemheat_water
{
    use ActiveRecord;

    protected $table = 'spr_ot_systemheat_water';

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