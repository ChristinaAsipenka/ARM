<?php

namespace Basis\Model\Obj_ot_heatnet;

use Engine\Core\Database\ActiveRecord;

class obj_ot_heatnet
{
    use ActiveRecord;

    protected $table = 'obj_ot_heatnet';

    public $id;
	public $id_reestr_object;
 	public $length; 
 	public $count_tube; 
	public $diameter; 
	public $conect_point; 
	public $underground; 
	public $isolation; 
	public $type_isolation;
	public $end_point;
	public $year;
	public $prim;
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
     public function getLength()
    {
        return $this->length;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }
    /////////////////////////////////////////	
     public function getCount_tube()
    {
        return $this->count_tube;
    }
    public function setCount_tube($count_tube)
    {
        $this->count_tube = $count_tube;
    }	
    /////////////////////////////////////////	
     public function getDiameter()
    {
        return $this->diameter;
    }
    public function setDiameter($diameter)
    {
        $this->diameter = $diameter;
    }	
     /////////////////////////////////////////	
     public function getConect_point()
    {
        return $this->conect_point;
    }
    public function setConect_point($conect_point)
    {
        $this->conect_point = $conect_point;
    }
     /////////////////////////////////////////	
     public function getUnderground()
    {
        return $this->underground;
    }
    public function setUnderground($underground)
    {
        $this->underground = $underground;
    }	
     /////////////////////////////////////////	
     public function getIsolation()
    {
        return $this->isolation;
    }
    public function setIsolation($isolation)
    {
        $this->isolation = $isolation;
    }	
     /////////////////////////////////////////	
     public function getType_isolation()
    {
        return $this->type_isolation;
    }
    public function setType_isolation($type_isolation)
    {
        $this->type_isolation = $type_isolation;
    }		
     /////////////////////////////////////////	
     public function getEnd_point()
    {
        return $this->end_point;
    }
    public function setEnd_point($end_point)
    {
        $this->end_point = $end_point;
    }	
     /////////////////////////////////////////	
     public function getYear()
    {
        return $this->year;
    }
    public function setYear($year)
    {
        $this->year = $year;
    }
     /////////////////////////////////////////	
     public function getPrim()
    {
        return $this->prim;
    }
    public function setPrim($prim)
    {
        $this->prim = $prim;
    }	
}