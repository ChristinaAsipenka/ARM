<?php

namespace Basis\Model\Tabs;

use Engine\Core\Database\ActiveRecord;

class tabs
{
    use ActiveRecord;

    protected $table = 'mkm_teplo_uzel';

    public $id;
	public $id_reestr_object;
    public $id_uzel_block;
	public $info;
	public $name_vkladka;
	public $id_systemheat_water;
	public $id_systemheat_dependent;
	public $id_systemheat_type_op;
	public $id_gvs_open;
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
    public function getId_reestr_object()
    {
        return $this->id_reestr_object;
    }
    public function setId_reestr_object($id_reestr_object)
    {
        $this->id_reestr_object = $id_reestr_object;
    }
  /////////////////////////////////////////
    public function getId_uzel_block()
    {
        return $this->id_uzel_block;
    }
    public function setId_uzel_block($id_uzel_block)
    {
        $this->id_uzel_block = $id_uzel_block;
    }
  /////////////////////////////////////////
    public function getInfo()
    {
        return $this->info;
    }
    public function setInfo($info)
    {
        $this->info = $info;
    }
  /////////////////////////////////////////
    public function getName_vkladka()
    {
        return $this->name_vkladka;
    }
    public function setName_vkladka($name_vkladka)
    {
        $this->name_vkladka = $name_vkladka;
    } 
   /////////////////////////////////////////
    public function getId_systemheat_water()
    {
        return $this->id_systemheat_water;
    }
    public function setId_systemheat_water($id_systemheat_water)
    {
        $this->id_systemheat_water = $id_systemheat_water;
    }
    /////////////////////////////////////////
    public function getId_systemheat_dependent()
    {
        return $this->id_systemheat_dependent;
    }
    public function setId_systemheat_dependent($id_systemheat_dependent)
    {
        $this->id_systemheat_dependent = $id_systemheat_dependent;
    }
    /////////////////////////////////////////
    public function getId_systemheat_type_op()
    {
        return $this->id_systemheat_type_op;
    }
    public function setId_systemheat_type_op($id_systemheat_type_op)
    {
        $this->id_systemheat_type_op = $id_systemheat_type_op;
    }	
    /////////////////////////////////////////
    public function getId_gvs_open()
    {
        return $this->id_gvs_open;
    }
    public function setId_gvs_open($id_gvs_open)
    {
        $this->id_gvs_open = $id_gvs_open;
    }	
	
	
 
}