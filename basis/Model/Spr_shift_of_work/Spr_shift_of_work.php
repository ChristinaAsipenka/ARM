<?php

namespace Basis\Model\Spr_shift_of_work;

use Engine\Core\Database\ActiveRecord;

class spr_shift_of_work
{
    use ActiveRecord;

    protected $table = 'spr_shift_of_work';

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