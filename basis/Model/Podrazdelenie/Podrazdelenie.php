<?php

namespace Basis\Model\Podrazdelenie;

use Engine\Core\Database\ActiveRecord;

class podrazdelenie
{
    use ActiveRecord;

    protected $table = 'spr_podrazdelenie';

    public $id;
    public $name_podrazd;
	public $cod_branch;
	public $adress;
	public $phone_cod;
	public $phone;
	public $fax;
	public $email;
	public $sokr_name;
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
    public function getName_podrazd()
    {
        return $this->name_podrazd;
    }
    public function setName_podrazd($name_podrazd)
    {
        $this->name_podrazd = $name_podrazd;
    }
  /////////////////////////////////////////
	public function getCod_branch()
    {
        return $this->cod_branch;
    }
    public function setCod_branch($cod_branch)
    {
        $this->cod_branch = $cod_branch;
    }
  /////////////////////////////////////////
	public function getAdress()
    {
        return $this->adress;
    }
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }	
   /////////////////////////////////////////
	public function getPhone_cod()
    {
        return $this->phone_cod;
    }
    public function setPhone_cod($phone_cod)
    {
        $this->phone_cod = $phone_cod;
    }	
   /////////////////////////////////////////
	public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }	
   /////////////////////////////////////////
	public function getFax()
    {
        return $this->fax;
    }
    public function setFax($fax)
    {
        $this->fax = $fax;
    }	
   /////////////////////////////////////////
	public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }	
   /////////////////////////////////////////
	public function getSokr_name()
    {
        return $this->sokr_name;
    }
    public function setSokr_name($sokr_name)
    {
        $this->sokr_name = $sokr_name;
    }	




 
}