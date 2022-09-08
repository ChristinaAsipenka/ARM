<?php

namespace Basis\Model\Obj_ot_heatnet_t;

use Engine\Model;

class obj_ot_heatnet_tRepository extends Model
{

    public function getObj_ot_heatnet_t()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_ot_heatnet_t')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_ot_heatnet_tById($id)
    {
      

	   $sql = $this->queryBuilder->select('obj_ot_heatnet_t.id, obj_ot_heatnet_t.length, obj_ot_heatnet_t.id_reestr_object, obj_ot_heatnet_t.count_tube, obj_ot_heatnet_t.diameter, obj_ot_heatnet_t.conect_point, obj_ot_heatnet_t.end_point, obj_ot_heatnet_t.underground, obj_ot_heatnet_t.isolation, obj_ot_heatnet_t.type_isolation, obj_ot_heatnet_t.year, obj_ot_heatnet_t.prim, spr_ot_heatnet_type_iso.name as name_iso, spr_ot_heatnet_type_underground.name as name_underground, spr_ot_type_izol.name as name_izol, spr_ot_diametr_tube.name as diameter_name')
            ->from('obj_ot_heatnet_t')
			->joinLeftTable('spr_ot_heatnet_type_underground','spr_ot_heatnet_type_underground.id = obj_ot_heatnet_t.underground')
			->joinLeftTable('spr_ot_heatnet_type_iso','spr_ot_heatnet_type_iso.id = obj_ot_heatnet_t.isolation')
			->joinLeftTable('spr_ot_type_izol','spr_ot_type_izol.id = obj_ot_heatnet_t.type_isolation')
			->joinLeftTable('spr_ot_diametr_tube','spr_ot_diametr_tube.id = obj_ot_heatnet_t.diameter')
            ->where('obj_ot_heatnet_t.id_reestr_object', $id)
            ->sql();
//echo $sql;
		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_ot_heatnet_tData($id)
    {
        $obj_ot_heatnet_t = new Obj_ot_heatnet_t($id);

        return $obj_ot_heatnet_t->findOne();
    }


    public function createObj_ot_heatnet_t($params)
    {
        $obj_ot_heatnet_t = new Obj_ot_heatnet_t;
        $obj_ot_heatnet_t->setName($params['type']);
		$obj_ot_heatnet_t = $obj_ot_heatnet_t->save();

        return $obj_ot_heatnet_tId;
    }


    public function updateObj_ot_heatnet_t($params)
    {
        if (isset($params['obj_ot_heatnet_t_id'])) {
            $obj_ot_heatnet = new Obj_ot_heatnet($params['obj_ot_heatnet_t_id']);

			
			$obj_ot_heatnet_t->setId_reestr_object($params['id_reestr_object']);
			
			
			
			
            $obj_ot_heatnet_t->save();
        }
    }



	public function updateObj_ot_heatnet_tInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_ot_heatnet_t = new Obj_ot_heatnet_t($params['id']);

		
				if(strlen($params['end_point'])>0){
					$obj_ot_heatnet_t->setEnd_point($params['end_point']);
				}				
				if(strlen($params['year'])>0){
					$obj_ot_heatnet_t->setYear($params['year']);
				}
				if(strlen($params['prim'])>0){
					$obj_ot_heatnet_t->setPrim($params['prim']);
				}				
				if(strlen($params['length'])>0){
					$obj_ot_heatnet_t->setLength($params['length']);
				}
				if(strlen($params['diameter'])>0){
					$obj_ot_heatnet_t->setDiameter($params['diameter']);
				}
				if(strlen($params['conect_point'])>0){
					$obj_ot_heatnet_t->setConect_point($params['conect_point']);
				}			
				if(strlen($params['underground'])>0){
					$obj_ot_heatnet_t->setUnderground($params['underground']);
				}
				if(strlen($params['heatnet_type_isolation'])>0){
					$obj_ot_heatnet_t->setType_isolation($params['heatnet_type_isolation']);
				}
				if(strlen($params['type_isolation'])>0){
					$obj_ot_heatnet_t->setIsolation($params['type_isolation']);
				}
				if(strlen($params['count_tube'])>0){
					$obj_ot_heatnet_t->setCount_tube($params['count_tube']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_ot_heatnet_t->setId_reestr_object($params['objects_id']);
				}
			$obj_ot_heatnet_tId = $obj_ot_heatnet_t->save();

      return $params['id'];
        }
		
    }



	
	public function createDevice_ot_heatnet_t($params)
    {
	
//print_r($params);
        $obj_ot_heatnet_t = new Obj_ot_heatnet_t;

	
			if(strlen($params['end_point'])>0){
				$obj_ot_heatnet_t->setEnd_point($params['end_point']);
			}				
			if(strlen($params['year'])>0){
				$obj_ot_heatnet_t->setYear($params['year']);
			}
			if(strlen($params['prim'])>0){
				$obj_ot_heatnet_t->setPrim($params['prim']);
			}		
			if(strlen($params['length'])>0){
				$obj_ot_heatnet_t->setLength($params['length']);
			}
			if(strlen($params['diameter'])>0){
				$obj_ot_heatnet_t->setDiameter($params['diameter']);
			}
			if(strlen($params['conect_point'])>0){
				$obj_ot_heatnet_t->setConect_point($params['conect_point']);
			}			
			if(strlen($params['underground'])>0){
				$obj_ot_heatnet_t->setUnderground($params['underground']);
			}
			if(strlen($params['heatnet_type_isolation'])>0){
				$obj_ot_heatnet_t->setType_isolation($params['heatnet_type_isolation']);
			}
			if(strlen($params['type_isolation'])>0){
				$obj_ot_heatnet_t->setIsolation($params['type_isolation']);
			}
			if(strlen($params['count_tube'])>0){
				$obj_ot_heatnet_t->setCount_tube($params['count_tube']);
			}
			if(strlen($params['objects_id'])>0){
				$obj_ot_heatnet_t->setId_reestr_object($params['objects_id']);
			}

		$obj_ot_heatnet_tId = $obj_ot_heatnet_t->save();

      return $obj_ot_heatnet_tId;
    }
	
/// Удаляем пункт который не имеет id объекта	
	public function deleteObj_ot_heatnet_t_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_ot_heatnet_t')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
				
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_heatnet_t')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_ot_heatnet_t')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}