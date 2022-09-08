<?php

namespace Basis\Model\CityZone;

use Engine\Core\Database\ActiveRecord;

class cityZone
{
    use ActiveRecord;

    protected $table = 'spr_city_zone';

    public $id;
    public $name;
	public $id_spr_city;

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
	public function getIdSprCity()
    {
        return $this->id_spr_city;
    }
    public function setIdSprCity($id_spr_city)
    {
        $this->id_spr_city = $id_spr_city;
    }
 
}
