<?php

namespace Examination\Model\Spr_test_group;

use Engine\Core\Database\ActiveRecord;

class spr_test_group
{
    use ActiveRecord;

    protected $table = 'spr_test_group';

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