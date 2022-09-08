<?php

namespace Basis\Model\Mkm_object_t_ti;

use Engine\Core\Database\ActiveRecord;

class mkm_object_t_ti
{
    use ActiveRecord;

    protected $table = 'mkm_object_t_ti';

    public $id;
	public $id_reestr_object_t;
    public $id_reestr_object_ti;
	public $id_reestr_subject;
	public $id_unp_sbj_own;
	public $id_unp_sbj_ti;

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
    public function getId_reestr_object_t()
    {
        return $this->id_reestr_object_t;
    }
    public function setId_reestr_object_t($id_reestr_object_t)
    {
        $this->id_reestr_object_t = $id_reestr_object_t;
    }
  /////////////////////////////////////////
    public function getId_reestr_object_ti()
    {
        return $this->id_reestr_object_ti;
    }
    public function setId_reestr_object_ti($id_reestr_object_ti)
    {
        $this->id_reestr_object_ti = $id_reestr_object_ti;
    }
	/////////////////////////////////////////
    public function getId_unp_sbj_own()
    {
        return $this->id_unp_sbj_own;
    }
    public function setId_unp_sbj_own($id_unp_sbj_own)
    {
        $this->id_unp_sbj_own = $id_unp_sbj_own;
    }
	/////////////////////////////////////////
    public function getId_unp_sbj_ti()
    {
        return $this->id_unp_sbj_ti;
    }
    public function setId_unp_sbj_ti($id_unp_sbj_ti)
    {
        $this->id_unp_sbj_ti = $id_unp_sbj_ti;
    }
  /////////////////////////////////////////
    public function getId_reestr_subject()
    {
        return $this->id_reestr_subject;
    }
    public function setId_reestr_subject($id_reestr_subject)
    {
        $this->id_reestr_subject = $id_reestr_subject;
    } 
 
 
 
 
 
}