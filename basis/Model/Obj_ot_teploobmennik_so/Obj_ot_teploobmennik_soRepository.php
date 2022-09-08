<?php

namespace Basis\Model\Obj_ot_teploobmennik_so;

use Engine\Model;

class obj_ot_teploobmennik_soRepository extends Model
{

    public function getObj_ot_teploobmennik_so()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_ot_teploobmennik_so')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_ot_teploobmennik_soById($id)
    {
			$sql = $this->queryBuilder->select('obj_ot_teploobmennik_so.id, obj_ot_teploobmennik_so.id_table, obj_ot_teploobmennik_so.id_reestr_object, obj_ot_teploobmennik_so.name, obj_ot_teploobmennik_so.teploobm, obj_ot_teploobmennik_so.year_begin, obj_ot_teploobmennik_so.srok, obj_ot_teploobmennik_so.next_srok, spr_ot_type_to.name as spr_ot_type_to_name')
            ->from('obj_ot_teploobmennik_so')
			->joinLeftTable('spr_ot_type_to','spr_ot_type_to.id = obj_ot_teploobmennik_so.teploobm')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_ot_teploobmennik_soData($id)
    {
        $obj_ot_teploobmennik_so = new Obj_ot_teploobmennik_so($id);

        return $obj_ot_teploobmennik_so->findOne();
    }



	public function updateObj_ot_teploobmennik_soInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_ot_teploobmennik_so = new Obj_ot_teploobmennik_so($params['id']);

				if(strlen($params['teploobm'])>0){
					$obj_ot_teploobmennik_so->setTeploobm($params['teploobm']);
				}				
				if(strlen($params['name'])>0){
					$obj_ot_teploobmennik_so->setName($params['name']);
				}
				if(strlen($params['year_begin'])>0){
					$obj_ot_teploobmennik_so->setYear_begin($params['year_begin']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_ot_teploobmennik_so->setId_reestr_object($params['objects_id']);
				}				
				if(strlen($params['srok'])>0){
					$obj_ot_teploobmennik_so->setSrok($params['srok']);
				}	
				if(strlen($params['next_srok'])>0){
					$obj_ot_teploobmennik_so->setNext_srok($params['next_srok']);
				}	
				if(strlen($params['id_table'])>0){
					$obj_ot_teploobmennik_so->setId_table($params['id_table']);
				}
				
			$obj_ot_teploobmennik_soId = $obj_ot_teploobmennik_so->save();

      return $params['id'];
        }
		
    }




    public function createObj_ot_teploobmennik_so($params)
    {

		$obj_ot_teploobmennik_so = new Obj_ot_teploobmennik_so;
		
		if(strlen($params['teploobm'])>0){
			$obj_ot_teploobmennik_so->setTeploobm($params['teploobm']);
		}		
		if(strlen($params['name'])>0){
			$obj_ot_teploobmennik_so->setName($params['name']);
		}
		if(strlen($params['year_begin'])>0){
			$obj_ot_teploobmennik_so->setYear_begin($params['year_begin']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_ot_teploobmennik_so->setId_reestr_object($params['objects_id']);
		}						
		if(strlen($params['srok'])>0){
			$obj_ot_teploobmennik_so->setSrok($params['srok']);
		}	
		if(strlen($params['next_srok'])>0){
			$obj_ot_teploobmennik_so->setNext_srok($params['next_srok']);
		}		
		if(strlen($params['id_table'])>0){
			$obj_ot_teploobmennik_so->setId_table($params['id_table']);
		}		
		
			$obj_ot_teploobmennik_soId = $obj_ot_teploobmennik_so->save();
		
		
        return $obj_ot_teploobmennik_soId;
    }


    public function updateObj_ot_teploobmennik_so($params)
    {
		
        if (isset($params['id_obj_ot_teploobmennik_so'])) {
            $obj_ot_teploobmennik_so = new Obj_ot_teploobmennik_so($params['id_obj_ot_teploobmennik_so']);

			$obj_ot_teploobmennik_so->setId_reestr_object($params['id_reestr_object']);
		
            $obj_ot_teploobmennik_so->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_ot_teploobmennik_so_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_ot_teploobmennik_so')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();

		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_teploobmennik_so')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_teploobmennik_so')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByTab($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_teploobmennik_so')
            ->where('id_table', 'obj_ot_teploobmennik_so-'.$itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
}