<?php

namespace Basis\Model\Department;

use Engine\Core\Database\ActiveRecord;

class department
{
    use ActiveRecord;

    protected $table = 'spr_department';

    public $id;
    public $name_ved;
	public $cod_ved;
	public $id_pr;


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
    public function getName_ved()
    {
        return $this->name_ved;
    }
    public function setName_ved($name_ved)
    {
        $this->name_ved = $name_ved;
    }
  /////////////////////////////////////////
    public function getCod_ved()
    {
        return $this->cod_ved;
    }
    public function setCod_ved($cod_ved)
    {
        $this->cod_ved = $cod_ved;
    }
 /////////////////////////////////////////
    public function getId_pr()
    {
        return $this->id_pr;
    }
    public function setId_pr($id_pr)
    {
        $this->id_pr = $id_pr;
    } 
}