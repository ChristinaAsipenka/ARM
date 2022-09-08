<?php

namespace Basis\Model\Obj_oti_boiler_vapor;

use Engine\Model;

class obj_oti_boiler_vaporRepository extends Model
{

    public function getObj_oti_boiler_vapor()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oti_boiler_vapor')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

	public function getObj_oti_boiler_vaporById($id)
    {
	   $sql = $this->queryBuilder->select('obj_oti_boiler_vapor.id, obj_oti_boiler_vapor.year, obj_oti_boiler_vapor.power, obj_oti_boiler_vapor.type, obj_oti_boiler_vapor.counts, obj_oti_boiler_vapor.perfomance, obj_oti_boiler_vapor.vapor_type_osn_fuel, obj_oti_boiler_vapor.vapor_type_rezerv_fuel, osn_fuel.name as name_osn_fuel, rezerv_fuel.name as name_rezerv_fuel')
            ->from('obj_oti_boiler_vapor')
			->joinLeftTable('spr_oti_type_fuel as osn_fuel','osn_fuel.id = obj_oti_boiler_vapor.vapor_type_osn_fuel')
			->joinLeftTable('spr_oti_type_fuel as rezerv_fuel','rezerv_fuel.id = obj_oti_boiler_vapor.vapor_type_rezerv_fuel')			
            ->where('obj_oti_boiler_vapor.id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getObj_oti_boiler_vapor_sumById($id)
    {
	   $sql = $this->queryBuilder->select('round(SUM(obj_oti_boiler_vapor.power),3) as sum_power_kot_vapor')
            ->from('obj_oti_boiler_vapor')
            ->where('obj_oti_boiler_vapor.id_reestr_object', $id)
            ->sql();
		return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function getObj_oti_boiler_vapor_sum_kotlById($id)
    {
	   $sql = $this->queryBuilder->select('SUM(obj_oti_boiler_vapor.counts) as sum_kot_water')
            ->from('obj_oti_boiler_vapor')
            ->where('obj_oti_boiler_vapor.id_reestr_object', $id)
            ->sql();
		return $this->db->query($sql, $this->queryBuilder->values);
    }
	
    public function getObj_oti_boiler_vaporData($id)
    {
        $obj_oti_boiler_vapor = new Obj_oti_boiler_vapor($id);

        return $obj_oti_boiler_vapor->findOne();
    }


    public function createObj_oti_boiler_vapor($params)
    {
        $obj_oti_boiler_vapor = new Obj_oti_boiler_vapor;
        $obj_oti_boiler_vapor->setName($params['type']);
		$obj_oti_boiler_vapor = $obj_oti_boiler_vapor->save();

        return $obj_oti_boiler_vaporId;
    }


    public function updateObj_oti_boiler_vapor($params)
    {
        if (isset($params['obj_oti_boiler_vapor_id'])) {
            $obj_oti_boiler_vapor = new Obj_oti_boiler_vapor($params['obj_oti_boiler_vapor_id']);
			//$obj_oti_boiler_water->setName($params['type']);
			
			$obj_oti_boiler_vapor->setId_reestr_object($params['id_reestr_object']);
			
			
			
			
            $obj_oti_boiler_vapor->save();
        }
    }



	public function updateObj_oti_boiler_vaporInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oti_boiler_vapor = new Obj_oti_boiler_vapor($params['id']);

				if(strlen($params['type'])>0){	
					$obj_oti_boiler_vapor->setType_boiler($params['type']);		
				}	
				if(strlen($params['year'])>0){	
					$obj_oti_boiler_vapor->setYear($params['year']);
				}
				if(strlen($params['power'])>0){
					$obj_oti_boiler_vapor->setPower($params['power']);
				}		
				if(strlen($params['objects_id'])>0){
					$obj_oti_boiler_vapor->setId_reestr_object($params['objects_id']);
				}
				if(strlen($params['counts'])>0){
					$obj_oti_boiler_vapor->setCounts($params['counts']);
				}
				if(strlen($params['perfomance'])>0){
					$obj_oti_boiler_vapor->setPerfomance($params['perfomance']);
				}
				if(strlen($params['vapor_type_rezerv_fuel'])>0){
					$obj_oti_boiler_vapor->setVapor_type_rezerv_fuel($params['vapor_type_rezerv_fuel']);
				}	
				if(strlen($params['vapor_type_osn_fuel'])>0){
					$obj_oti_boiler_vapor->setVapor_type_osn_fuel($params['vapor_type_osn_fuel']);
				}				
			$obj_oti_boiler_vaporId = $obj_oti_boiler_vapor->save();

      return $params['id'];
        }
		
    }





	
	public function createBoiler_vapor($params)
    {
	

        $obj_oti_boiler_vapor = new Obj_oti_boiler_vapor;

			/*if(strlen($params['id_reestr_object'])>0){	
				$obj_oti_boiler_water->setId_reestr_object($params['id_reestr_object']);
			}*/	
		if(isset($params['type'])){	
			if(strlen($params['type'])>0){	
				$obj_oti_boiler_vapor->setType_boiler($params['type']);		
			}	
			if(strlen($params['year'])>0){	
				$obj_oti_boiler_vapor->setYear($params['year']);
			}
			if(strlen($params['power'])>0){
				$obj_oti_boiler_vapor->setPower($params['power']);
			}				
			if(strlen($params['objects_id'])>0){
				$obj_oti_boiler_vapor->setId_reestr_object($params['objects_id']);
			}
			if(strlen($params['counts'])>0){
				$obj_oti_boiler_vapor->setCounts($params['counts']);
			}
			if(strlen($params['perfomance'])>0){
				$obj_oti_boiler_vapor->setPerfomance($params['perfomance']);
			}
			if(strlen($params['vapor_type_rezerv_fuel'])>0){
				$obj_oti_boiler_vapor->setVapor_type_rezerv_fuel($params['vapor_type_rezerv_fuel']);
			}	
			if(strlen($params['vapor_type_osn_fuel'])>0){
				$obj_oti_boiler_vapor->setVapor_type_osn_fuel($params['vapor_type_osn_fuel']);
			}			
		}	
			
		$obj_oti_boiler_vaporId = $obj_oti_boiler_vapor->save();

      return $obj_oti_boiler_vaporId;
    }
	
	/// Удаляем АВР который не имеет id объекта	
	public function deleteObj_oti_boiler_vapor_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oti_boiler_vapor')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
				echo $sql;
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oti_boiler_vapor')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oti_boiler_vapor')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}