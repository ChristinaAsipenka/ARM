<?php

namespace Examination\Model\Otdel;

use Engine\Core\Database\ActiveRecord;

class otdel
{
    use ActiveRecord;

    protected $table = 'spr_otdel';

    public $id;
    public $name_otdel;
	public $cod_branch;
	public $cod_podch;
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
    public function getName_otdel()
    {
        return $this->name_otdel;
    }
    public function setName_otdel($name_otdel)
    {
        $this->name_otdel = $name_otdel;
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
	public function getCod_podch()
    {
        return $this->cod_podch;
    }
    public function setCod_podch($cod_podch)
    {
        $this->cod_podch = $cod_podch;
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