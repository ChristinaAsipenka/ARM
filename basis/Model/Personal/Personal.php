<?php

namespace Basis\Model\Personal;

use Engine\Core\Database\ActiveRecord;

class personal
{
    use ActiveRecord;

    protected $table = 'reestr_personal';

    public $id;
	public $id_reestr_unp;
    public $firstname;
    public $secondname;
	public $lastname;
	public $tel;
	public $email;
	public $post;
	public $post_data;

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
    public function getId_reestr_unp()
    {
        return $this->id_reestr_unp;
    }
    public function setId_reestr_unp($id_reestr_unp)
    {
        $this->id_reestr_unp = $id_reestr_unp;
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
    public function getTel()
    {
        return $this->tel;
    }
    public function setTel($tel)
    {
        $this->tel = $tel;
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
    public function getPost()
    {
        return $this->post;
    }
    public function setPost($post)
    {
        $this->post = $post;
    }  
  /////////////////////////////////////////
    public function getPost_data()
    {
        return $this->post_data;
    }
    public function setPost_data($post_data)
    {
        $this->post_data = $post_data;
    }
	
 
}