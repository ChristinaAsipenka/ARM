<?php

namespace Basis\Model\Spr_oti_type_fuel_rezerv;

use Engine\Core\Database\ActiveRecord;

class spr_oti_type_fuel_rezerv
{
    use ActiveRecord;

    protected $table = 'spr_oti_type_fuel';

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