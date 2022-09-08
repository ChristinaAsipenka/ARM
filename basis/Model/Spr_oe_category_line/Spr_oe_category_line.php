<?php

namespace Basis\Model\Spr_oe_category_line;

use Engine\Core\Database\ActiveRecord;

class spr_oe_category_line
{
    use ActiveRecord;

    protected $table = 'spr_oe_category_line';

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