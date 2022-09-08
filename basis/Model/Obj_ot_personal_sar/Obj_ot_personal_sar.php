<?php

namespace Basis\Model\Obj_ot_personal_sar;

use Engine\Core\Database\ActiveRecord;

class obj_ot_personal_sar
{
    use ActiveRecord;

    protected $table = 'obj_ot_personal_sar';

    public $id;
	public $id_reestr_object;
    public $sar;
	public $nazn_sar_ot;
	public $nazn_sar_gvs;
	public $nazn_sar_tn;
	public $nazn_sar_vent;
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
     public function getSar()
    {
        return $this->sar;
    }
    public function setSar($sar)
    {
        $this->sar = $sar;
    }  
    /////////////////////////////////////////	
     public function getNazn_sar_ot()
    {
        return $this->nazn_sar_ot;
    }
    public function setNazn_sar_ot($nazn_sar_ot)
    {
        $this->nazn_sar_ot = $nazn_sar_ot;
    } 
     /////////////////////////////////////////	
     public function getNazn_sar_gvs()
    {
        return $this->nazn_sar_gvs;
    }
    public function setNazn_sar_gvs($nazn_sar_gvs)
    {
        $this->nazn_sar_gvs = $nazn_sar_gvs;
    } 
      /////////////////////////////////////////	
     public function getNazn_sar_tn()
    {
        return $this->nazn_sar_tn;
    }
    public function setNazn_sar_tn($nazn_sar_tn)
    {
        $this->nazn_sar_tn = $nazn_sar_tn;
    }
       /////////////////////////////////////////	
     public function getNazn_sar_vent()
    {
        return $this->nazn_sar_vent;
    }
    public function setNazn_sar_vent($nazn_sar_vent)
    {
        $this->nazn_sar_vent = $nazn_sar_vent;
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