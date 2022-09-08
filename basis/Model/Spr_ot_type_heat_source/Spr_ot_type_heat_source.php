<?php

namespace Basis\Model\Spr_ot_type_heat_source;

use Engine\Core\Database\ActiveRecord;

class spr_ot_type_heat_source
{
    use ActiveRecord;

    protected $table = 'spr_ot_type_heat_source';

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