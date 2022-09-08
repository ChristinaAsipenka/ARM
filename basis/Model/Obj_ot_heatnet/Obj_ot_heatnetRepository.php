<?php

namespace Basis\Model\Obj_ot_heatnet;

use Engine\Model;

class obj_ot_heatnetRepository extends Model
{

    public function getObj_ot_heatnet()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_ot_heatnet')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_ot_heatnetById($id)
    {
      

	   $sql = $this->queryBuilder->select('obj_ot_heatnet.id, obj_ot_heatnet.length, obj_ot_heatnet.id_reestr_object, obj_ot_heatnet.count_tube, obj_ot_heatnet.diameter, obj_ot_heatnet.conect_point, obj_ot_heatnet.end_point, obj_ot_heatnet.underground, obj_ot_heatnet.isolation, obj_ot_heatnet.type_isolation, obj_ot_heatnet.year, obj_ot_heatnet.prim, spr_ot_heatnet_type_iso.name as name_iso, spr_ot_heatnet_type_underground.name as name_underground, spr_ot_type_izol.name as name_izol, spr_ot_diametr_tube.name as diameter_name')
            ->from('obj_ot_heatnet')
			->joinLeftTable('spr_ot_heatnet_type_underground','spr_ot_heatnet_type_underground.id = obj_ot_heatnet.underground')
			->joinLeftTable('spr_ot_heatnet_type_iso','spr_ot_heatnet_type_iso.id = obj_ot_heatnet.isolation')
			->joinLeftTable('spr_ot_type_izol','spr_ot_type_izol.id = obj_ot_heatnet.type_isolation')
			->joinLeftTable('spr_ot_diametr_tube','spr_ot_diametr_tube.id = obj_ot_heatnet.diameter')
            ->where('obj_ot_heatnet.id_reestr_object', $id)
            ->sql();
//echo $sql;
		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_ot_heatnetData($id)
    {
        $obj_ot_heatnet = new Obj_ot_heatnet($id);

        return $obj_ot_heatnet->findOne();
    }


    public function createObj_ot_heatnet($params)
    {
        $obj_ot_heatnet = new Obj_ot_heatnet;
        $obj_ot_heatnet->setName($params['type']);
		$obj_ot_heatnet = $obj_ot_heatnet->save();

        return $obj_ot_heatnetId;
    }


    public function updateObj_ot_heatnet($params)
    {
        if (isset($params['obj_ot_heatnet_id'])) {
            $obj_ot_heatnet = new Obj_ot_heatnet($params['obj_ot_heatnet_id']);

			
			$obj_ot_heatnet->setId_reestr_object($params['id_reestr_object']);
			
			
			
			
            $obj_ot_heatnet->save();
        }
    }



	public function updateObj_ot_heatnetInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_ot_heatnet = new Obj_ot_heatnet($params['id']);

		
				if(strlen($params['end_point'])>0){
					$obj_ot_heatnet->setEnd_point($params['end_point']);
				}				
				if(strlen($params['year'])>0){
					$obj_ot_heatnet->setYear($params['year']);
				}
				if(strlen($params['prim'])>0){
					$obj_ot_heatnet->setPrim($params['prim']);
				}				
				if(strlen($params['length'])>0){
					$obj_ot_heatnet->setLength($params['length']);
				}
				if(strlen($params['diameter'])>0){
					$obj_ot_heatnet->setDiameter($params['diameter']);
				}
				if(strlen($params['conect_point'])>0){
					$obj_ot_heatnet->setConect_point($params['conect_point']);
				}			
				if(strlen($params['underground'])>0){
					$obj_ot_heatnet->setUnderground($params['underground']);
				}
				if(strlen($params['heatnet_type_isolation'])>0){
					$obj_ot_heatnet->setType_isolation($params['heatnet_type_isolation']);
				}
				if(strlen($params['type_isolation'])>0){
					$obj_ot_heatnet->setIsolation($params['type_isolation']);
				}
				if(strlen($params['count_tube'])>0){
					$obj_ot_heatnet->setCount_tube($params['count_tube']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_ot_heatnet->setId_reestr_object($params['objects_id']);
				}
			$obj_ot_heatnetId = $obj_ot_heatnet->save();

      return $params['id'];
        }
		
    }



	
	public function createDevice_ot_heatnet($params)
    {
	
//print_r($params);
        $obj_ot_heatnet = new Obj_ot_heatnet;

	
			if(strlen($params['end_point'])>0){
				$obj_ot_heatnet->setEnd_point($params['end_point']);
			}				
			if(strlen($params['year'])>0){
				$obj_ot_heatnet->setYear($params['year']);
			}
			if(strlen($params['prim'])>0){
				$obj_ot_heatnet->setPrim($params['prim']);
			}		
			if(strlen($params['length'])>0){
				$obj_ot_heatnet->setLength($params['length']);
			}
			if(strlen($params['diameter'])>0){
				$obj_ot_heatnet->setDiameter($params['diameter']);
			}
			if(strlen($params['conect_point'])>0){
				$obj_ot_heatnet->setConect_point($params['conect_point']);
			}			
			if(strlen($params['underground'])>0){
				$obj_ot_heatnet->setUnderground($params['underground']);
			}
			if(strlen($params['heatnet_type_isolation'])>0){
				$obj_ot_heatnet->setType_isolation($params['heatnet_type_isolation']);
			}
			if(strlen($params['type_isolation'])>0){
				$obj_ot_heatnet->setIsolation($params['type_isolation']);
			}
			if(strlen($params['count_tube'])>0){
				$obj_ot_heatnet->setCount_tube($params['count_tube']);
			}
			if(strlen($params['objects_id'])>0){
				$obj_ot_heatnet->setId_reestr_object($params['objects_id']);
			}

		$obj_ot_heatnetId = $obj_ot_heatnet->save();

      return $obj_ot_heatnetId;
    }
	
/// Удаляем пункт который не имеет id объекта	
	public function deleteObj_ot_heatnet_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_ot_heatnet')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
				
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_heatnet')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_heatnet')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}