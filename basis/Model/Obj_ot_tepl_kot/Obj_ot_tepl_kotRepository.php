<?php

namespace Basis\Model\Obj_ot_tepl_kot;

use Engine\Model;

class obj_ot_tepl_kotRepository extends Model
{

    public function getObj_ot_tepl_kot()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_ot_tepl_kot')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_ot_tepl_kotById($id)
    {
			$sql = $this->queryBuilder->select('obj_ot_tepl_kot.id, obj_ot_tepl_kot.id_reestr_object, obj_ot_tepl_kot.name, obj_ot_tepl_kot.teploobm, obj_ot_tepl_kot.year_begin, obj_ot_tepl_kot.srok, obj_ot_tepl_kot.next_srok, spr_ot_type_to.name as spr_ot_type_to_name')
            ->from('obj_ot_tepl_kot')
			->joinLeftTable('spr_ot_type_to','spr_ot_type_to.id = obj_ot_tepl_kot.teploobm')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_ot_tepl_kotData($id)
    {
        $obj_ot_tepl_kot = new Obj_ot_tepl_kot($id);

        return $obj_ot_tepl_kot->findOne();
    }



	public function updateObj_ot_tepl_kotInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_ot_tepl_kot = new Obj_ot_tepl_kot($params['id']);

				if(strlen($params['teploobm'])>0){
					$obj_ot_tepl_kot->setTeploobm($params['teploobm']);
				}				
				if(strlen($params['name'])>0){
					$obj_ot_tepl_kot->setName($params['name']);
				}
				if(strlen($params['year_begin'])>0){
					$obj_ot_tepl_kot->setYear_begin($params['year_begin']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_ot_tepl_kot->setId_reestr_object($params['objects_id']);
				}				
				if(strlen($params['srok'])>0){
					$obj_ot_tepl_kot->setSrok($params['srok']);
				}	
				if(strlen($params['next_srok'])>0){
					$obj_ot_tepl_kot->setNext_srok($params['next_srok']);
				}		
				
			$obj_ot_tepl_kotId = $obj_ot_tepl_kot->save();

      return $params['id'];
        }
		
    }




    public function createObj_ot_tepl_kot($params)
    {

		$obj_ot_tepl_kot = new Obj_ot_tepl_kot;
		
		if(strlen($params['teploobm'])>0){
			$obj_ot_tepl_kot->setTeploobm($params['teploobm']);
		}		
		if(strlen($params['name'])>0){
			$obj_ot_tepl_kot->setName($params['name']);
		}
		if(strlen($params['year_begin'])>0){
			$obj_ot_tepl_kot->setYear_begin($params['year_begin']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_ot_tepl_kot->setId_reestr_object($params['objects_id']);
		}						
		if(strlen($params['srok'])>0){
			$obj_ot_tepl_kot->setSrok($params['srok']);
		}	
		if(strlen($params['next_srok'])>0){
			$obj_ot_tepl_kot->setNext_srok($params['next_srok']);
		}	
			
			$obj_ot_tepl_kotId = $obj_ot_tepl_kot->save();
		
		
        return $obj_ot_tepl_kotId;
    }


    public function updateObj_ot_tepl_kot($params)
    {
		
        if (isset($params['id_obj_ot_tepl_kot'])) {
            $obj_ot_tepl_kot = new Obj_ot_tepl_kot($params['id_obj_ot_tepl_kot']);

			$obj_ot_tepl_kot->setId_reestr_object($params['id_reestr_object']);
		
            $obj_ot_tepl_kot->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_ot_tepl_kot_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_ot_tepl_kot')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();

		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_tepl_kot')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_tepl_kot')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByTab($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_tepl_kot')
            ->where('id_table', 'obj_ot_tepl_kot-'.$itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
}