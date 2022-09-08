<?php

namespace Basis\Model\Obj_ot_personal_tp;

use Engine\Core\Database\ActiveRecord;

class obj_ot_personal_tp
{
    use ActiveRecord;

    protected $table = 'obj_ot_personal_tp';

    public $id;
	public $id_reestr_object;
    public $device;
	public $nazn_tp_ot;
	public $nazn_tp_gvs;
	public $nazn_tp_tn;
	public $nazn_tp_vent;
	public $id_table;
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
    public function getDevice()
    {
        return $this->device;
    }
    public function setDevice($device)
    {
        $this->device = $device;
    }
  /////////////////////////////////////////
    public function getNazn_tp_ot()
    {
        return $this->nazn_tp_ot;
    }
    public function setNazn_tp_ot($nazn_tp_ot)
    {
        $this->nazn_tp_ot = $nazn_tp_ot;
    }
  /////////////////////////////////////////
    public function getNazn_tp_gvs()
    {
        return $this->nazn_tp_gvs;
    }
    public function setNazn_tp_gvs($nazn_tp_gvs)
    {
        $this->nazn_tp_gvs = $nazn_tp_gvs;
    } 
  /////////////////////////////////////////
    public function getNazn_tp_tn()
    {
        return $this->nazn_tp_tn;
    }
    public function setNazn_tp_tn($nazn_tp_tn)
    {
        $this->nazn_tp_tn = $nazn_tp_tn;
    } 
   /////////////////////////////////////////
    public function getNazn_tp_vent()
    {
        return $this->nazn_tp_vent;
    }
    public function setNazn_tp_vent($nazn_tp_vent)
    {
        $this->nazn_tp_vent = $nazn_tp_vent;
    }
    /////////////////////////////////////////
    public function getId_table()
    {
        return $this->id_table;
    }
    public function setId_table($id_table)
    {
        $this->id_table = $id_table;
    }
 
}