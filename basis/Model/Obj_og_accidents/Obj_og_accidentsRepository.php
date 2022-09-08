<?php

namespace Basis\Model\Obj_og_accidents;

use Engine\Model;

class obj_og_accidentsRepository extends Model
{

    public function getObj_og_accidents()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_og_accidents')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_og_accidentsById($id)
    {
      

	   $sql = $this->queryBuilder->select('obj_og_accidents.id, obj_og_accidents.date_accidents, obj_og_accidents.type_accidents, obj_og_accidents.character_accidents, spr_og_accidents.name')
            ->from('obj_og_accidents')
            ->joinLeftTable('spr_og_accidents','spr_og_accidents.id = obj_og_accidents.type_accidents')
            ->where('obj_og_accidents.id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_og_accidentsData($id)
    {
        $obj_og_accidents = new Obj_og_accidents($id);

        return $obj_og_accidents->findOne();
    }


    /*public function createObj_og_obsl($params)
    {
        $obj_og_obsl = new Obj_og_obsl;
        $obj_og_obsl->setName($params['type_obsl']);
		$obj_og_obsl->setName($params['date_obsl']);
		$obj_og_obsl = $obj_og_obsl->save();

        return $obj_og_obslId;
    }*/

	
	public function updateObj_og_accidentsInfo($params)
    {

	   if (isset($params['id'])) {
            $obj_og_accidents = new Obj_og_accidents($params['id']);

			
			if(strlen($params['type_accidents'])>0){	
				$obj_og_accidents->setType_accidents($params['type_accidents']);		
			}		
			if(strlen($params['date_accidents'])>0){
				$obj_og_accidents->setDate_accidents($params['date_accidents']);
			}	
			if(strlen($params['character_accidents'])>0){
				$obj_og_accidents->setCharacter_accidents($params['character_accidents']);
			}			
			if(strlen($params['objects_id'])>0){
				$obj_og_accidents->setId_reestr_object($params['objects_id']);
			}
			$obj_og_accidentsId = $obj_og_accidents->save();

      return $params['id'];
        }
		
    }
	
    public function updateObj_og_accidents($params)
    {
      
	   if (isset($params['obj_og_accidents_id'])) {
            $obj_og_accidents = new Obj_og_accidents($params['obj_og_accidents_id']);

			
			$obj_og_accidents->setId_reestr_object($params['id_reestr_object']);

			
            $obj_og_accidents->save();
        }
		
    }
	
	public function createObj_og_accidents($params)
    {
	

        $obj_og_accidents = new Obj_og_accidents;

		if(isset($params['date_accidents'])){	
			if(strlen($params['type_accidents'])>0){	
				$obj_og_accidents->setType_accidents($params['type_accidents']);		
			}		
			if(strlen($params['date_accidents'])>0){
				$obj_og_accidents->setDate_accidents($params['date_accidents']);
			}	
			if(strlen($params['character_accidents'])>0){
				$obj_og_accidents->setCharacter_accidents($params['character_accidents']);
			}			
			if(strlen($params['objects_id'])>0){
				$obj_og_accidents->setId_reestr_object($params['objects_id']);
			}
		}
		
		$obj_og_accidentsId = $obj_og_accidents->save();

      return $obj_og_accidentsId;
    }
	
	/// Удаляем пункт который не имеет id объекта	
	public function deleteObj_og_accidents_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_og_accidents')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
		
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {
echo $itemId;
		$sql = $this->queryBuilder
			->delete()
            ->from('obj_og_accidents')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_og_accidents')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
}