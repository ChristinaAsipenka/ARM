<?php

namespace Basis\Model\Obj_ot_prit_vent;

use Engine\Model;

class obj_ot_prit_ventRepository extends Model
{

    public function getObj_ot_prit_vent()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_ot_prit_vent')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_ot_prit_ventById($id)
    {
	   $sql = $this->queryBuilder->select('obj_ot_prit_vent.id, obj_ot_prit_vent.id_table, obj_ot_prit_vent.id_reestr_object, obj_ot_prit_vent.name, obj_ot_prit_vent.srok, obj_ot_prit_vent.next_srok, obj_ot_prit_vent.year_begin')
            ->from('obj_ot_prit_vent')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_ot_prit_ventData($id)
    {
        $obj_ot_prit_vent = new Obj_ot_prit_vent($id);

        return $obj_ot_prit_vent->findOne();
    }

	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_prit_vent')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}

	public function updateObj_ot_prit_ventInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_ot_prit_vent = new Obj_ot_prit_vent($params['id']);

			if(strlen($params['name'])>0){
				$obj_ot_prit_vent->setName($params['name']);
			}
			if(strlen($params['srok'])>0){
				$obj_ot_prit_vent->setSrok($params['srok']);
			}
			if(strlen($params['next_srok'])>0){
				$obj_ot_prit_vent->setNext_srok($params['next_srok']);
			}
			if(strlen($params['year_begin'])>0){
				$obj_ot_prit_vent->setYear_begin($params['year_begin']);
			}
			if(strlen($params['objects_id'])>0){
				$obj_ot_prit_vent->setId_reestr_object($params['objects_id']);
			}			
			if(strlen($params['id_table'])>0){
				$obj_ot_prit_vent->setId_table($params['id_table']);
			}
			
			$obj_ot_prit_ventId = $obj_ot_prit_vent->save();

      return $params['id'];
        }
		
    }


    public function createObj_ot_prit_vent($params)
    {
		$obj_ot_prit_vent = new Obj_ot_prit_vent;
		
		if(strlen($params['name'])>0){
			$obj_ot_prit_vent->setName($params['name']);
		}
		if(strlen($params['srok'])>0){
			$obj_ot_prit_vent->setSrok($params['srok']);
		}
		if(strlen($params['next_srok'])>0){
			$obj_ot_prit_vent->setNext_srok($params['next_srok']);
		}
		if(strlen($params['year_begin'])>0){
			$obj_ot_prit_vent->setYear_begin($params['year_begin']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_ot_prit_vent->setId_reestr_object($params['objects_id']);
		}		
		if(strlen($params['id_table'])>0){
			$obj_ot_prit_vent->setId_table($params['id_table']);
		}
			
			$obj_ot_prit_ventId = $obj_ot_prit_vent->save();
		
		
        return $obj_ot_prit_ventId;
    }


    public function updateObj_ot_prit_vent($params)
    {
		
        if (isset($params['id_obj_ot_prit_vent'])) {
            $obj_ot_prit_vent = new Obj_ot_prit_vent($params['id_obj_ot_prit_vent']);

			$obj_ot_prit_vent->setId_reestr_object($params['id_reestr_object']);
		
            $obj_ot_prit_vent->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_ot_prit_vent_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_ot_prit_vent')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
				echo $sql;
		$this->db->query($sql, $this->queryBuilder->values);
    }
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_prit_vent')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}

	public function removeItemsByTab($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_prit_vent')
            ->where('id_table', 'obj_ot_prit_vent-'.$itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
		
}