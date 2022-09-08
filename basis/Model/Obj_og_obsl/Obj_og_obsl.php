<?php

namespace Basis\Model\Obj_og_obsl;

use Engine\Core\Database\ActiveRecord;

class obj_og_obsl
{
    use ActiveRecord;

    protected $table = 'obj_og_obsl';

    public $id;
	public $id_reestr_object;
    public $date_obsl;
 	public $type_obsl; 


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
    public function getDate_obsl()
    {
        return $this->date_obsl;
    }
    public function setDate_obsl($date_obsl)
    {
        $this->date_obsl = $date_obsl;
    }
    /////////////////////////////////////////	
     public function getType_obsl()
    {
        return $this->type_obsl;
    }
    public function setType_obsl($type_obsl)
    {
        $this->type_obsl = $type_obsl;
    }
 
}