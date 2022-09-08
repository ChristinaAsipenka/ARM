<?php

namespace Basis\Model\City;

use Engine\Core\Database\ActiveRecord;

class city
{
    use ActiveRecord;

    protected $table = 'spr_city';

    public $id;
    public $name;
	public $id_spr_district;
	public $key_region;
	public $key_district;
	public $key_admin;

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
	public function getIdSprDistrict()
    {
        return $this->id_spr_district;
    }
    public function setIdSprDistrict($id_spr_district)
    {
        $this->id_spr_district = $id_spr_district;
    }
   /////////////////////////////////////////
	public function getKeyRegion()
    {
        return $this->key_region;
    }
    public function setKeyRegion($key_region)
    {
        $this->key_region = $key_region;
    }
   /////////////////////////////////////////
	public function getKeyDistrict()
    {
        return $this->key_district;
    }
    public function setKeyDistrict($key_district)
    {
        $this->key_district = $key_district;
    }
	/////////////////////////////////////////
	public function getKeyAdmin()
    {
        return $this->key_admin;
    }
    public function setKeyAdmin($key_admin)
    {
        $this->key_admin = $key_admin;
    }
}
