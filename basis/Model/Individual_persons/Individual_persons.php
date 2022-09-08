<?php

namespace Basis\Model\Individual_persons;

use Engine\Core\Database\ActiveRecord;

class individual_persons
{
    use ActiveRecord;

    protected $table = 'reestr_individual';

    public $id;
	public $firstname;
    public $secondname;
	public $lastname;
	public $identification_number;


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
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    } 
 /////////////////////////////////////////
    public function getSecondname()
    {
        return $this->secondname;
    }
    public function setSecondname($secondname)
    {
        $this->secondname = $secondname;
    }
  /////////////////////////////////////////
    public function getLastname()
    {
        return $this->lastname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
  /////////////////////////////////////////
    public function getIdentification_number()
    {
        return $this->identification_number;
    }
    public function setIdentification_number($identification_number)
    {
        $this->identification_number = $identification_number;
    } 

	
 
}