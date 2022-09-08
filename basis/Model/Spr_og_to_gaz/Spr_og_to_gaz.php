<?php

namespace Basis\Model\Spr_og_to_gaz;

use Engine\Core\Database\ActiveRecord;

class spr_og_to_gaz
{
    use ActiveRecord;

    protected $table = 'spr_og_to_gaz';

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