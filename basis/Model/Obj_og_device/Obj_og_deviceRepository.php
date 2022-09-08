<?php

namespace Basis\Model\Obj_og_device;

use Engine\Model;

class obj_og_deviceRepository extends Model
{

    public function getObj_og_device()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_og_device')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_og_deviceById($id)
    {
      

	   $sql = $this->queryBuilder->select('obj_og_device.id, obj_og_device.counts, obj_og_device.type, spr_og_device_type.name' )
            ->from('obj_og_device')
            ->joinLeftTable('spr_og_device_type','spr_og_device_type.id = obj_og_device.type')
            ->where('obj_og_device.id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_og_deviceData($id)
    {
        $obj_og_device = new Obj_og_device($id);

        return $obj_og_device->findOne();
    }


    public function createObj_og_device($params)
    {
        $obj_og_device = new Obj_og_device;
        $obj_og_device->setName($params['type']);
		$obj_og_device = $obj_og_device->save();

        return $obj_og_deviceId;
    }

	
	public function updateObj_og_deviceInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_og_device = new Obj_og_device($params['id']);

			
			if(strlen($params['type'])>0){	
				$obj_og_device->setType_device($params['type']);		
			}		
			if(strlen($params['counts'])>0){
				$obj_og_device->setCounts($params['counts']);
			}
			if(strlen($params['objects_id'])>0){
				$obj_og_device->setId_reestr_object($params['objects_id']);
			}			

			$obj_og_deviceId = $obj_og_device->save();

      return $params['id'];
        }
		
    }
	
    public function updateObj_og_device($params)
    {
      
	   if (isset($params['obj_og_device_id'])) {
            $obj_og_device = new Obj_og_device($params['obj_og_device_id']);

			
			$obj_og_device->setId_reestr_object($params['id_reestr_object']);

            $obj_og_device->save();
        }
		
    }
	
	public function createDevice_obj_og($params)
    {
	

        $obj_og_device = new Obj_og_device;


		if(isset($params['type'])){
			if(strlen($params['type'])>0){	
				$obj_og_device->setType_device($params['type']);		
			}		
			if(strlen($params['counts'])>0){
				$obj_og_device->setCounts($params['counts']);
			}
			if(strlen($params['objects_id'])>0){
				$obj_og_device->setId_reestr_object($params['objects_id']);
			}	
		}
			
		$obj_og_deviceId = $obj_og_device->save();

      return $obj_og_deviceId;
    }
	
	/// Удаляем пункт который не имеет id объекта	
	public function deleteObj_og_device_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_og_device')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
		
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_og_device')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_og_device')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
}