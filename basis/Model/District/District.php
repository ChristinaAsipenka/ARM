<?php

namespace Basis\Model\District;

use Engine\Core\Database\ActiveRecord;

class district
{
    use ActiveRecord;

    protected $table = 'spr_district';

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
	public function getIdSprRegion()
    {
        return $this->id_spr_region;
    }
    public function setIdSprRegion($id_spr_region)
    {
        $this->id_spr_region = $id_spr_region;
    }
 
}