<?php

namespace Basis\Model\Region;

use Engine\Core\Database\ActiveRecord;

class region
{
    use ActiveRecord;

    protected $table = 'spr_region';

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