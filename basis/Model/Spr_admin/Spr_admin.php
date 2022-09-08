<?php

namespace Basis\Model\Spr_admin;

use Engine\Core\Database\ActiveRecord;

class spr_admin
{
    use ActiveRecord;

    protected $table = 'spr_admin';

    public $id;
    public $name;
    public $id_spr_region;


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
    public function getId_spr_region()
    {
        return $this->id_spr_region;
    }
    public function setId_spr_region($id_spr_region)
    {
        $this->id_spr_region = $id_spr_region;
    }
}