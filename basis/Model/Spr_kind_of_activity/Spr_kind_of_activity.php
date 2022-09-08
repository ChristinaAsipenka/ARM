<?php

namespace Basis\Model\Spr_kind_of_activity;

use Engine\Core\Database\ActiveRecord;

class spr_kind_of_activity
{
    use ActiveRecord;

    protected $table = 'spr_kind_of_activity';

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