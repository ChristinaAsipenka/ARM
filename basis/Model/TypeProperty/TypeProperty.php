<?php

namespace Basis\Model\TypeProperty;

use Engine\Core\Database\ActiveRecord;

class typeProperty
{
    use ActiveRecord;

    protected $table = 'spr_type_property';

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
  /////////////////////////////////////////

 
}