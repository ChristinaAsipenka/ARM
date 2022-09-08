<?php

namespace Basis\Model\Spr_og_accidents;

use Engine\Core\Database\ActiveRecord;

class spr_og_accidents
{
    use ActiveRecord;

    protected $table = 'spr_og_accidents';

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