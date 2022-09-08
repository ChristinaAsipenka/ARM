<?php

namespace Basis\Model\Spr_type_object;

use Engine\Core\Database\ActiveRecord;

class spr_type_object
{
    use ActiveRecord;

    protected $table = 'spr_type_object';

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