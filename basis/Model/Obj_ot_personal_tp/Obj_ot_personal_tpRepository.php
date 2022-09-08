<?php

namespace Basis\Model\Obj_ot_personal_tp;

use Engine\Model;

class obj_ot_personal_tpRepository extends Model
{

    public function getObj_ot_personal_tp()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_ot_personal_tp')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_ot_personal_tpById($id)
    {
	   $sql = $this->queryBuilder->select('obj_ot_personal_tp.id, obj_ot_personal_tp.id_table, obj_ot_personal_tp.device, obj_ot_personal_tp.id_reestr_object, obj_ot_personal_tp.nazn_tp_ot, obj_ot_personal_tp.nazn_tp_gvs, obj_ot_personal_tp.nazn_tp_tn, obj_ot_personal_tp.nazn_tp_vent')
            ->from('obj_ot_personal_tp')
            ->where('obj_ot_personal_tp.id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }	
	

    public function getObj_ot_personal_tpData($id)
    {
        $obj_ot_personal_tp = new Obj_ot_personal_tp($id);

        return $obj_ot_personal_tp->findOne();
    }


    public function createObj_ot_personal_tp($params)
    {
        $obj_ot_personal_tp = new Obj_ot_personal_tp;
        $obj_ot_personal_tp->setName($params['type']);
		$obj_ot_personal_tp = $obj_ot_personal_tp->save();

        return $obj_ot_personal_tpId;
    }


    public function updateObj_ot_personal_tp($params)
    {
        if (isset($params['obj_ot_personal_tp_id'])) {
            $obj_ot_personal_tp = new Obj_ot_personal_tp($params['obj_ot_personal_tp_id']);

			
			$obj_ot_personal_tp->setId_reestr_object($params['id_reestr_object']);

            $obj_ot_personal_tp->save();
        }
    }



	public function updateObj_ot_personal_tpInfo($params)
    {
      print_r($params);
	   if (isset($params['id'])) {
            $obj_ot_personal_tp = new Obj_ot_personal_tp($params['id']);

			
			if(strlen($params['device'])>0){	
				$obj_ot_personal_tp->setDevice($params['device']);		
			}	
			if(strlen($params['objects_id'])>0){
				$obj_ot_personal_tp->setId_reestr_object($params['objects_id']);
			}					
			if(strlen($params['nazn_tp_ot'])>0){	
				$obj_ot_personal_tp->setNazn_tp_ot($params['nazn_tp_ot']);
			}
			if(strlen($params['nazn_tp_gvs'])>0){	
				$obj_ot_personal_tp->setNazn_tp_gvs($params['nazn_tp_gvs']);
			}			
			if(strlen($params['nazn_tp_tn'])>0){	
				$obj_ot_personal_tp->setNazn_tp_tn($params['nazn_tp_tn']);
			}			
			if(strlen($params['nazn_tp_vent'])>0){	
				$obj_ot_personal_tp->setNazn_tp_vent($params['nazn_tp_vent']);
			}			
			if(strlen($params['id_table'])>0){	
				$obj_ot_personal_tp->setId_table($params['id_table']);
			}
			
			
			$obj_ot_personal_tpId = $obj_ot_personal_tp->save();

      return $params['id'];
        }
		
    }


	
	public function createOt_personal_tp($params)
    {
	
	$obj_ot_personal_tp = new Obj_ot_personal_tp;
		if(isset($params['device'])){
	
			if(strlen($params['device'])>0){	
				$obj_ot_personal_tp->setDevice($params['device']);		
			}				
			if(strlen($params['nazn_tp_ot'])>0){	
				$obj_ot_personal_tp->setNazn_tp_ot($params['nazn_tp_ot']);
			}
			if(strlen($params['nazn_tp_gvs'])>0){	
				$obj_ot_personal_tp->setNazn_tp_gvs($params['nazn_tp_gvs']);
			}			
			if(strlen($params['nazn_tp_tn'])>0){	
				$obj_ot_personal_tp->setNazn_tp_tn($params['nazn_tp_tn']);
			}			
			if(strlen($params['nazn_tp_vent'])>0){	
				$obj_ot_personal_tp->setNazn_tp_vent($params['nazn_tp_vent']);
			}			
			if(strlen($params['objects_id'])>0){
				$obj_ot_personal_tp->setId_reestr_object($params['objects_id']);
			}
			if(strlen($params['id_table'])>0){	
				$obj_ot_personal_tp->setId_table($params['id_table']);
			}			
	}
		$obj_ot_personal_tpId = $obj_ot_personal_tp->save();
	
      return $obj_ot_personal_tpId;
    }
	
	
	/// Удаляем пункт который не имеет id объекта	
	public function deleteObj_ot_personal_tp_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_ot_personal_tp')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
		
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_personal_tp')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_personal_tp')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByTab($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_personal_tp')
            ->where('id_table', 'obj_ot_personal_tp-'.$itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
}