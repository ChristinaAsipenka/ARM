<?php

namespace Examination\Model\Spr_test_reasons_gaz;

use Engine\Core\Database\ActiveRecord;

class spr_test_reasons_gaz
{
    use ActiveRecord;

    protected $table = 'spr_test_reasons_gaz';

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