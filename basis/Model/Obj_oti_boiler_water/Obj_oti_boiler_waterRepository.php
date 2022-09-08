<?php

namespace Basis\Model\Obj_oti_boiler_water;

use Engine\Model;

class obj_oti_boiler_waterRepository extends Model
{

    public function getObj_oti_boiler_water()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oti_boiler_water')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

	public function getObj_oti_boiler_waterById($id)
    {
	   $sql = $this->queryBuilder->select('obj_oti_boiler_water.id, obj_oti_boiler_water.year, obj_oti_boiler_water.power, obj_oti_boiler_water.type, obj_oti_boiler_water.counts, obj_oti_boiler_water.type_osn_fuel, obj_oti_boiler_water.type_rezerv_fuel, osn_fuel.name as name_osn_fuel, rezerv_fuel.name as name_rezerv_fuel')
            ->from('obj_oti_boiler_water')
			->joinLeftTable('spr_oti_type_fuel as osn_fuel','osn_fuel.id = obj_oti_boiler_water.type_osn_fuel')
			->joinLeftTable('spr_oti_type_fuel as rezerv_fuel','rezerv_fuel.id = obj_oti_boiler_water.type_rezerv_fuel')
            ->where('obj_oti_boiler_water.id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }

	
	public function getObj_oti_boiler_water_sumById($id)
    {
	   $sql = $this->queryBuilder->select('round(SUM(obj_oti_boiler_water.power),3) as sum_power_kot_water')
            ->from('obj_oti_boiler_water')
            ->where('obj_oti_boiler_water.id_reestr_object', $id)
            ->sql();
		return $this->db->query($sql, $this->queryBuilder->values);
    }	
	
	public function getObj_oti_boiler_water_sum_kotlById($id)
    {
	   $sql = $this->queryBuilder->select('SUM(obj_oti_boiler_water.counts) as sum_kot_water')
            ->from('obj_oti_boiler_water')
            ->where('obj_oti_boiler_water.id_reestr_object', $id)
            ->sql();
		return $this->db->query($sql, $this->queryBuilder->values);
    }	
	
	
    public function getObj_oti_boiler_waterData($id)
    {
        $obj_oti_boiler_water = new Obj_oti_boiler_water($id);

        return $obj_oti_boiler_water->findOne();
    }


    public function createObj_oti_boiler_water($params)
    {
        $obj_oti_boiler_water = new Obj_oti_boiler_water;
        $obj_oti_boiler_water->setName($params['type']);
		$obj_oti_boiler_water = $obj_oti_boiler_water->save();

        return $obj_oti_boiler_waterId;
    }


    public function updateObj_oti_boiler_water($params)
    {
		print_r($params);
        if (isset($params['obj_oti_boiler_water_id'])) {
            $obj_oti_boiler_water = new Obj_oti_boiler_water($params['obj_oti_boiler_water_id']);
			//$obj_oti_boiler_water->setName($params['type']);
			
			$obj_oti_boiler_water->setId_reestr_object($params['id_reestr_object']);
	
            $obj_oti_boiler_water->save();
        }
    }



	public function updateObj_oti_boiler_waterInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oti_boiler_water = new Obj_oti_boiler_water($params['id']);

				if(strlen($params['type'])>0){	
					$obj_oti_boiler_water->setType_boiler($params['type']);		
				}	
				if(strlen($params['year'])>0){	
					$obj_oti_boiler_water->setYear($params['year']);
				}
				if(strlen($params['power'])>0){
					$obj_oti_boiler_water->setPower($params['power']);
				}		
				if(strlen($params['objects_id'])>0){
					$obj_oti_boiler_water->setId_reestr_object($params['objects_id']);
				}
				if(strlen($params['counts'])>0){
					$obj_oti_boiler_water->setCounts($params['counts']);
				}
				if(strlen($params['type_osn_fuel'])>0){
					$obj_oti_boiler_water->setType_osn_fuel($params['type_osn_fuel']);
				}
				if(strlen($params['type_rezerv_fuel'])>0){
					$obj_oti_boiler_water->setType_rezerv_fuel($params['type_rezerv_fuel']);
				}
			$obj_oti_boiler_waterId = $obj_oti_boiler_water->save();

      return $params['id'];
        }
		
    }



	
	public function createBoiler_water($params)
    {
	

        $obj_oti_boiler_water = new Obj_oti_boiler_water;

			/*if(strlen($params['id_reestr_object'])>0){	
				$obj_oti_boiler_water->setId_reestr_object($params['id_reestr_object']);
			}*/	
			
		if(isset($params['type'])){	
			if(strlen($params['type'])>0){	
				$obj_oti_boiler_water->setType_boiler($params['type']);		
			}	
			if(strlen($params['year'])>0){	
				$obj_oti_boiler_water->setYear($params['year']);
			}
			if(strlen($params['power'])>0){
				$obj_oti_boiler_water->setPower($params['power']);
			}	
			if(strlen($params['objects_id'])>0){
				$obj_oti_boiler_water->setId_reestr_object($params['objects_id']);
			}	
			if(strlen($params['counts'])>0){
				$obj_oti_boiler_water->setCounts($params['counts']);
			}
			if(strlen($params['type_osn_fuel'])>0){
				$obj_oti_boiler_water->setType_osn_fuel($params['type_osn_fuel']);
			}
			if(strlen($params['type_rezerv_fuel'])>0){
				$obj_oti_boiler_water->setType_rezerv_fuel($params['type_rezerv_fuel']);
			}			
	}
		$obj_oti_boiler_waterId = $obj_oti_boiler_water->save();

      return $obj_oti_boiler_waterId;
    }
	
	/// Удаляем  который не имеет id объекта	
	public function deleteObj_oti_boiler_water_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oti_boiler_water')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
				
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oti_boiler_water')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oti_boiler_water')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}