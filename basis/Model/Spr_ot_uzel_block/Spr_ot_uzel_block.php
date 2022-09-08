<?php

namespace Basis\Model\Spr_ot_uzel_block;

use Engine\Core\Database\ActiveRecord;

class spr_ot_uzel_block
{
    use ActiveRecord;

    protected $table = 'spr_ot_uzel_block';

    public $id;
    public $name;
	public $name_razdel;


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
    public function getName_razdel()
    {
        return $this->name_razdel;
    }
    public function setName_razdel($name_razdel)
    {
        $this->name_razdel = $name_razdel;
    }	
  
}