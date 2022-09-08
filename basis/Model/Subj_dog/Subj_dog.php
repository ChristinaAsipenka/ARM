<?php

namespace Basis\Model\Subj_dog;

use Engine\Core\Database\ActiveRecord;

class subj_dog
{
    use ActiveRecord;

    protected $table = 'subj_dog';

    public $id; 				
	public $id_subject; 	
    public $name; 				
	public $number;  		
	public $date_dog;
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
    public function getId_subject()
    {
        return $this->id_subject;
    }
    public function setId_subject($id_subject)
    {
        $this->id_subject = $id_subject;
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
     public function getNumber()
    {
        return $this->number;
    }
    public function setNumber($number)
    {
        $this->number = $number;
    }	
     /////////////////////////////////////////	
     public function getDate_dog()
    {
        return $this->date_dog;
    }
    public function setDate_dog($date_dog)
    {
        $this->date_dog = $date_dog;
    }

 
}