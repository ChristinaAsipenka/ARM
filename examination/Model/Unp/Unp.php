<?php

namespace Examination\Model\Unp;

use Engine\Core\Database\ActiveRecord;

class unp
{
    use ActiveRecord;

    protected $table = 'reestr_unp';

    public $id;
    public $unp;
    public $name;
	public $name_short;
	public $address_index;
	public $address_region;
	public $address_district ;
	public $address_city;
	public $address_city_zone;
	public $address_street;
	public $address_street_type;
	public $address_city_type;
	public $address_building;
	public $address_flat ;
	public $address_portal;
	public $liquidated;

/////////////////////////////////////////
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
////////////////////////////////////////
    public function getUnp()
    {
        return $this->unp;
    }
    public function setUnp($unp)
    {
        $this->unp = $unp;
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
    public function getName_short()
    {
        return $this->name_short;
    }
    public function setName_short($name_short)
    {
        $this->name_short = $name_short;
    }
  /////////////////////////////////////////
    public function getAddress_index()
    {
        return $this->address_index;
    }
    public function setAddress_index($address_index)
    {
        $this->address_index = $address_index;
    } 
  /////////////////////////////////////////
    public function getAddress_region()
    {
        return $this->address_region;
    }
    public function setAddress_region($address_region)
    {
        $this->address_region = $address_region;
    }  
   /////////////////////////////////////////
    public function getAddress_district()
    {
        return $this->address_district;
    }
    public function setAddress_district($address_district)
    {
        $this->address_district = $address_district;
    }
    /////////////////////////////////////////
    public function getAddress_city()
    {
        return $this->address_city;
    }
    public function setAddress_city($address_city)
    {
        $this->address_city = $address_city;
    }
     /////////////////////////////////////////
    public function getAddress_city_zone()
    {
        return $this->address_city_zone;
    }
    public function setAddress_city_zone($address_city_zone)
    {
        $this->address_city_zone = $address_city_zone;
    }
      /////////////////////////////////////////
    public function getAddress_street()
    {
        return $this->address_street;
    }
    public function setAddress_street($address_street)
    {
        $this->address_street = $address_street;
    }
      /////////////////////////////////////////
    public function getAddress_street_type()
    {
        return $this->address_street_type;
    }
    public function setAddress_street_type($address_street_type)
    {
        $this->address_street_type = $address_street_type;
    }
      /////////////////////////////////////////
    public function getAddress_city_type()
    {
        return $this->address_city_type;
    }
    public function setAddress_city_type($address_city_type)
    {
        $this->address_city_type = $address_city_type;
    }	
      /////////////////////////////////////////
    public function getAddress_building()
    {
        return $this->address_building;
    }
    public function setAddress_building($address_building)
    {
        $this->address_building = $address_building;
    }
      /////////////////////////////////////////
    public function getAddress_flat()
    {
        return $this->address_flat;
    }
    public function setAddress_flat($address_flat)
    {
        $this->address_flat = $address_flat;
    }

 /////////////////////////////////////////
    public function getAddress_portal()
    {
        return $this->address_portal;
    }
    public function setAddress_portal($address_portal)
    {
        $this->address_portal = $address_portal;
    }
	/////////////////////////////////////////
    public function getLiquidated()
    {
        return $this->liquidated;
    }
    public function setLiquidated($liquidated)
    {
        $this->liquidated = $liquidated;
    }

	
 
}