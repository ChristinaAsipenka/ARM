<?php

namespace Basis\Model\Obj_og_obsl;

use Engine\Model;

class obj_og_obslRepository extends Model
{

    public function getObj_og_obsl()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_og_obsl')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_og_obslById($id)
    {
      

	   $sql = $this->queryBuilder->select('obj_og_obsl.id, obj_og_obsl.date_obsl, obj_og_obsl.type_obsl, spr_og_obsl_go.name')
            ->from('obj_og_obsl')
            ->joinLeftTable('spr_og_obsl_go','spr_og_obsl_go.id = obj_og_obsl.type_obsl')
            ->where('obj_og_obsl.id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_og_obslData($id)
    {
        $obj_og_obsl = new Obj_og_obsl($id);

        return $obj_og_obsl->findOne();
    }


    /*public function createObj_og_obsl($params)
    {
        $obj_og_obsl = new Obj_og_obsl;
        $obj_og_obsl->setName($params['type_obsl']);
		$obj_og_obsl->setName($params['date_obsl']);
		$obj_og_obsl = $obj_og_obsl->save();

        return $obj_og_obslId;
    }*/

	
	public function updateObj_og_obslInfo($params)
    {
  //print_r($params);    
	   if (isset($params['id'])) {
            $obj_og_obsl = new Obj_og_obsl($params['id']);

			
			if(strlen($params['type_obsl'])>0){	
				$obj_og_obsl->setType_obsl($params['type_obsl']);		
			}		
			if(strlen($params['date_obsl'])>0){
				$obj_og_obsl->setDate_obsl($params['date_obsl']);
			}			
			if(strlen($params['objects_id'])>0){
				$obj_og_obsl->setId_reestr_object($params['objects_id']);
			}
			$obj_og_obslId = $obj_og_obsl->save();

      return $params['id'];
        }
		
    }
	
    public function updateObj_og_obsl($params)
    {
      
	   if (isset($params['obj_og_obsl_id'])) {
            $obj_og_obsl = new Obj_og_obsl($params['obj_og_obsl_id']);

			
			$obj_og_obsl->setId_reestr_object($params['id_reestr_object']);

			
            $obj_og_obsl->save();
        }
		
    }
	
	public function createObj_og_obsl($params)
    {
	

        $obj_og_obsl = new Obj_og_obsl;

		if(isset($params['date_obsl'])){	
			if(strlen($params['type_obsl'])>0){	
				$obj_og_obsl->setType_obsl($params['type_obsl']);		
			}		
			if(strlen($params['date_obsl'])>0){
				$obj_og_obsl->setDate_obsl($params['date_obsl']);
			}			
			if(strlen($params['objects_id'])>0){
				$obj_og_obsl->setId_reestr_object($params['objects_id']);
			}
		}
		
		$obj_og_obslId = $obj_og_obsl->save();

      return $obj_og_obslId;
    }
	
	/// Удаляем пункт который не имеет id объекта	
	public function deleteObj_og_obsl_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_og_obsl')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
		
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_og_obsl')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_og_obsl')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
}