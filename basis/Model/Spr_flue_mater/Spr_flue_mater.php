<?php

namespace Basis\Model\Spr_flue_mater;

use Engine\Core\Database\ActiveRecord;

class spr_flue_mater
{
    use ActiveRecord;

    protected $table = 'spr_og_flue_mater';

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