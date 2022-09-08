<?php

namespace Basis\Model\Spr_type_street;

use Engine\Core\Database\ActiveRecord;

class spr_type_street
{
    use ActiveRecord;

    protected $table = 'spr_type_street';

    public $id;
    public $name;
	public $sokr_name;

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
   /////////////////////////////////////////
    public function getSokr_name()
    {
        return $this->sokr_name;
    }
    public function setSokr_name($sokr_name)
    {
        $this->sokr_name = $sokr_name;
    }
}