<?php

namespace Basis\Model\Obj_og_device;

use Engine\Core\Database\ActiveRecord;

class obj_og_device
{
    use ActiveRecord;

    protected $table = 'obj_og_device';

    public $id;
	public $id_reestr_object;
    public $type;
 	public $counts; 


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
    public function getType_device()
    {
        return $this->type;
    }
    public function setType_device($type)
    {
        $this->type = $type;
    }
    /////////////////////////////////////////	
     public function getCounts()
    {
        return $this->counts;
    }
    public function setCounts($counts)
    {
        $this->counts = $counts;
    }
 
}