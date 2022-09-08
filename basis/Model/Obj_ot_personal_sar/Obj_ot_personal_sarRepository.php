<?php

namespace Basis\Model\Obj_ot_personal_sar;

use Engine\Model;

class obj_ot_personal_sarRepository extends Model
{

    public function getObj_ot_personal_sar()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_ot_personal_sar')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_ot_personal_sarById($id)
    {
	   $sql = $this->queryBuilder->select('obj_ot_personal_sar.id, obj_ot_personal_sar.id_table, obj_ot_personal_sar.sar, obj_ot_personal_sar.nazn_sar_ot, obj_ot_personal_sar.nazn_sar_gvs, obj_ot_personal_sar.nazn_sar_tn, obj_ot_personal_sar.nazn_sar_vent, obj_ot_personal_sar.id_reestr_object')
            ->from('obj_ot_personal_sar')
			/*->joinLeftTable('spr_ot_nazn_sar', 'spr_ot_nazn_sar.id = obj_ot_personal_sar.nazn_sar')*/
            ->where('obj_ot_personal_sar.id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }	
	

    public function getObj_ot_personal_sarData($id)
    {
        $obj_ot_personal_sar = new Obj_ot_personal_sar($id);

        return $obj_ot_personal_sar->findOne();
    }


    public function createObj_ot_personal_sar($params)
    {
        $obj_ot_personal_sar = new Obj_ot_personal_sar;
        $obj_ot_personal_sar->setName($params['sar']);
		$obj_ot_personal_sarId = $obj_ot_personal_sar->save();

        return $obj_ot_personal_sarId;
    }


    public function updateObj_ot_personal_sar($params)
    {
        if (isset($params['obj_ot_personal_sar_id'])) {
            $obj_ot_personal_sar = new Obj_ot_personal_sar($params['obj_ot_personal_sar_id']);

			
			$obj_ot_personal_sar->setId_reestr_object($params['id_reestr_object']);

            $obj_ot_personal_sar->save();
        }
    }



	public function updateObj_ot_personal_sarInfo($params)
    {

	  if (isset($params['id'])) {
            $obj_ot_personal_sar = new Obj_ot_personal_sar($params['id']);

			
			if(strlen($params['sar'])>0){
				$obj_ot_personal_sar->setSar($params['sar']);
			}	
			if(strlen($params['nazn_sar_ot'])>0){	
				$obj_ot_personal_sar->setNazn_sar_ot($params['nazn_sar_ot']);
			}
			if(strlen($params['nazn_sar_gvs'])>0){	
				$obj_ot_personal_sar->setNazn_sar_gvs($params['nazn_sar_gvs']);
			}	
			if(strlen($params['nazn_sar_tn'])>0){	
				$obj_ot_personal_sar->setNazn_sar_tn($params['nazn_sar_tn']);
			}	
			if(strlen($params['nazn_sar_vent'])>0){	
				$obj_ot_personal_sar->setNazn_sar_vent($params['nazn_sar_vent']);
			}			
			if(strlen($params['objects_id'])>0){
				$obj_ot_personal_sar->setId_reestr_object($params['objects_id']);
			}
			if(strlen($params['id_table'])>0){
				$obj_ot_personal_sar->setId_table($params['id_table']);
			}			
			
			$obj_ot_personal_sarId = $obj_ot_personal_sar->save();

      return $params['id'];
        }
		
    }


	
	public function createOt_personal_sar($params)
    {
	

        $obj_ot_personal_sar = new Obj_ot_personal_sar;
		if(isset($params['sar'])){
			if(strlen($params['sar'])>0){
				$obj_ot_personal_sar->setSar($params['sar']);
			}				
			if(strlen($params['nazn_sar_ot'])>0){	
				$obj_ot_personal_sar->setNazn_sar_ot($params['nazn_sar_ot']);
			}
			if(strlen($params['nazn_sar_gvs'])>0){	
				$obj_ot_personal_sar->setNazn_sar_gvs($params['nazn_sar_gvs']);
			}	
			if(strlen($params['nazn_sar_tn'])>0){	
				$obj_ot_personal_sar->setNazn_sar_tn($params['nazn_sar_tn']);
			}	
			if(strlen($params['nazn_sar_vent'])>0){	
				$obj_ot_personal_sar->setNazn_sar_vent($params['nazn_sar_vent']);
			}
			if(strlen($params['objects_id'])>0){
				$obj_ot_personal_sar->setId_reestr_object($params['objects_id']);
			}
			if(strlen($params['id_table'])>0){
				$obj_ot_personal_sar->setId_table($params['id_table']);
			}			
		}	
		$obj_ot_personal_sarId = $obj_ot_personal_sar->save();

      return $obj_ot_personal_sarId;
    }
	
	
	/// Удаляем пункт который не имеет id объекта	
	public function deleteObj_ot_personal_sar_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_ot_personal_sar')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
		
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_personal_sar')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_personal_sar')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	public function removeItemsByTab($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_personal_sar')
            ->where('id_table', 'obj_ot_personal_sar-'.$itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
}