<?php

namespace Basis\Model\Obj_ot_teploobmennik_gvs;

use Engine\Model;

class obj_ot_teploobmennik_gvsRepository extends Model
{

    public function getObj_ot_teploobmennik_gvs()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_ot_teploobmennik_gvs')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_ot_teploobmennik_gvsById($id)
    {
			$sql = $this->queryBuilder->select('obj_ot_teploobmennik_gvs.id, obj_ot_teploobmennik_gvs.id_table, obj_ot_teploobmennik_gvs.id_reestr_object, obj_ot_teploobmennik_gvs.name, obj_ot_teploobmennik_gvs.teploobm, obj_ot_teploobmennik_gvs.year_begin, obj_ot_teploobmennik_gvs.srok, obj_ot_teploobmennik_gvs.next_srok, spr_ot_type_to.name as spr_ot_type_to_name')
            ->from('obj_ot_teploobmennik_gvs')
			->joinLeftTable('spr_ot_type_to','spr_ot_type_to.id = obj_ot_teploobmennik_gvs.teploobm')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_ot_teploobmennik_gvsData($id)
    {
        $obj_ot_teploobmennik_gvs = new Obj_ot_teploobmennik_gvs($id);

        return $obj_ot_teploobmennik_gvs->findOne();
    }



	public function updateObj_ot_teploobmennik_gvsInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_ot_teploobmennik_gvs = new Obj_ot_teploobmennik_gvs($params['id']);

				if(strlen($params['teploobm'])>0){
					$obj_ot_teploobmennik_gvs->setTeploobm($params['teploobm']);
				}				
				if(strlen($params['name'])>0){
					$obj_ot_teploobmennik_gvs->setName($params['name']);
				}
				if(strlen($params['year_begin'])>0){
					$obj_ot_teploobmennik_gvs->setYear_begin($params['year_begin']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_ot_teploobmennik_gvs->setId_reestr_object($params['objects_id']);
				}				
				if(strlen($params['srok'])>0){
					$obj_ot_teploobmennik_gvs->setSrok($params['srok']);
				}	
				if(strlen($params['next_srok'])>0){
					$obj_ot_teploobmennik_gvs->setNext_srok($params['next_srok']);
				}	
				if(strlen($params['id_table'])>0){
					$obj_ot_teploobmennik_gvs->setId_table($params['id_table']);
				}	
				
			$obj_ot_teploobmennik_gvsId = $obj_ot_teploobmennik_gvs->save();

      return $params['id'];
        }
		
    }




    public function createObj_ot_teploobmennik_gvs($params)
    {

		$obj_ot_teploobmennik_gvs = new Obj_ot_teploobmennik_gvs;
		
		if(strlen($params['teploobm'])>0){
			$obj_ot_teploobmennik_gvs->setTeploobm($params['teploobm']);
		}		
		if(strlen($params['name'])>0){
			$obj_ot_teploobmennik_gvs->setName($params['name']);
		}
		if(strlen($params['year_begin'])>0){
			$obj_ot_teploobmennik_gvs->setYear_begin($params['year_begin']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_ot_teploobmennik_gvs->setId_reestr_object($params['objects_id']);
		}						
		if(strlen($params['srok'])>0){
			$obj_ot_teploobmennik_gvs->setSrok($params['srok']);
		}	
		if(strlen($params['next_srok'])>0){
			$obj_ot_teploobmennik_gvs->setNext_srok($params['next_srok']);
		}
		if(strlen($params['id_table'])>0){
			$obj_ot_teploobmennik_gvs->setId_table($params['id_table']);
		}		
			
			$obj_ot_teploobmennik_gvsId = $obj_ot_teploobmennik_gvs->save();
		
		
        return $obj_ot_teploobmennik_gvsId;
    }


    public function updateObj_ot_teploobmennik_gvs($params)
    {
		
        if (isset($params['id_obj_ot_teploobmennik_gvs'])) {
            $obj_ot_teploobmennik_gvs = new Obj_ot_teploobmennik_gvs($params['id_obj_ot_teploobmennik_gvs']);

			$obj_ot_teploobmennik_gvs->setId_reestr_object($params['id_reestr_object']);
		
            $obj_ot_teploobmennik_gvs->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_ot_teploobmennik_gvs_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_ot_teploobmennik_gvs')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();

		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_teploobmennik_gvs')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_teploobmennik_gvs')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByTab($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_teploobmennik_gvs')
            ->where('id_table', 'obj_ot_teploobmennik_gvs-'.$itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
}