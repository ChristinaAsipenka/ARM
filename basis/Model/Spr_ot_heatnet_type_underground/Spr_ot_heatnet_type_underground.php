<?php

namespace Basis\Model\Spr_ot_heatnet_type_underground;

use Engine\Core\Database\ActiveRecord;

class spr_ot_heatnet_type_underground
{
    use ActiveRecord;

    protected $table = 'spr_ot_heatnet_type_underground';

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