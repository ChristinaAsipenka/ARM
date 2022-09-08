<?php

namespace Basis\Model\Obj_oe_block;

use Engine\Model;

class obj_oe_blockRepository extends Model
{

    public function getObj_oe_block()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oe_block')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_oe_blockById($id)
    {
      

	   $sql = $this->queryBuilder->select('obj_oe_block.id, obj_oe_block.id_reestr_object, obj_oe_block.name, obj_oe_block.power, obj_oe_block.type, obj_oe_block.add_load, spr_oe_energy_type.id as spr_oe_energy_type_id,  spr_oe_energy_type.name as spr_oe_energy_type_name')
            ->from('obj_oe_block')
			->joinLeftTable('spr_oe_energy_type','spr_oe_energy_type.id = obj_oe_block.type')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_oe_blockData($id)
    {
        $obj_oe_block = new Obj_oe_block($id);

        return $obj_oe_block->findOne();
    }



	public function updateObj_oe_blockInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oe_block = new Obj_oe_block($params['id']);

			
				if(strlen($params['name'])>0){
					$obj_oe_block->setName($params['name']);
				}

				if(strlen($params['type'])>0){
					$obj_oe_block->setType($params['type']);
				}
				
				
				if(strlen($params['power'])>0){
					$obj_oe_block->setPower($params['power']);
				}
				
				if(strlen($params['add_load'])>0){
					$obj_oe_block->setAdd_load($params['add_load']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_oe_block->setId_reestr_object($params['objects_id']);
				}
			
			$obj_oe_blockId = $obj_oe_block->save();

      return $params['id'];
        }
		
    }







    public function createObj_oe_block($params)
    {
//print_r($params);
		$obj_oe_block = new Obj_oe_block;
		
		if(strlen($params['name'])>0){
			$obj_oe_block->setName($params['name']);
		}

		if(strlen($params['type'])>0){
			$obj_oe_block->setType($params['type']);
		}
		
		
		if(strlen($params['power'])>0){
			$obj_oe_block->setPower($params['power']);
		}
		
		if(strlen($params['add_load'])>0){
			$obj_oe_block->setAdd_load($params['add_load']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_oe_block->setId_reestr_object($params['objects_id']);
		}
			$obj_oe_blockId = $obj_oe_block->save();
		//echo $obj_oe_blockId;
        return $obj_oe_blockId;
    }


    public function updateObj_oe_block($params)
    {
		
        if (isset($params['id_obj_oe_block'])) {
            $obj_oe_block = new obj_oe_block($params['id_obj_oe_block']);

			$obj_oe_block->setId_reestr_object($params['id_reestr_object']);
		
            $obj_oe_block->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_oe_block_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oe_block')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
				
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_block')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}

	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_block')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
}