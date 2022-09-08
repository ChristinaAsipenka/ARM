<?php

namespace Basis\Model\Spr_og_obsl_go;

use Engine\Core\Database\ActiveRecord;

class spr_og_obsl_go
{
    use ActiveRecord;

    protected $table = 'spr_og_obsl_go';

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