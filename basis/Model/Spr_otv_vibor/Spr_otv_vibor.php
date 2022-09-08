<?php

namespace Basis\Model\Spr_otv_vibor;

use Engine\Core\Database\ActiveRecord;

class spr_otv_vibor
{
    use ActiveRecord;

    protected $table = 'spr_otv_vibor';

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