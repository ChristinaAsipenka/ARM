<?php

namespace Basis\Model\Obj_og_accidents;

use Engine\Core\Database\ActiveRecord;

class obj_og_accidents
{
    use ActiveRecord;

    protected $table = 'obj_og_accidents';

    public $id;
	public $id_reestr_object;
    public $date_accidents;
 	public $type_accidents; 
	public $character_accidents; 

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
    public function getDate_accidents()
    {
        return $this->date_accidents;
    }
    public function setDate_accidents($date_accidents)
    {
        $this->date_accidents = $date_accidents;
    }
    /////////////////////////////////////////	
     public function getType_accidents()
    {
        return $this->type_accidents;
    }
    public function setType_accidents($type_accidents)
    {
        $this->type_accidents = $type_accidents;
    }
     /////////////////////////////////////////	
     public function getCharacter_accidents()
    {
        return $this->character_accidents;
    }
    public function setCharacter_accidents($character_accidents)
    {
        $this->character_accidents = $character_accidents;
    }
}