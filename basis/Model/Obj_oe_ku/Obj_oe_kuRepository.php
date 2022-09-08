<?php

namespace Basis\Model\Obj_oe_ku;

use Engine\Model;

class obj_oe_kuRepository extends Model
{

    public function getObj_oe_ku()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oe_ku')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_oe_kuById($id)
    {
			$sql = $this->queryBuilder->select('obj_oe_ku.id, obj_oe_ku.id_reestr_object, obj_oe_ku.place, obj_oe_ku.name, obj_oe_ku.ku_count, obj_oe_ku.power, obj_oe_ku.voltage, obj_oe_ku.year_begin, obj_oe_ku.srok, obj_oe_ku.next_srok, obj_oe_ku.count_ar, obj_oe_ku.max_ar')
            ->from('obj_oe_ku')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_oe_kuData($id)
    {
        $obj_oe_ku = new Obj_oe_ku($id);

        return $obj_oe_ku->findOne();
    }



	public function updateObj_oe_kuInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oe_ku = new Obj_oe_ku($params['id']);

				if(strlen($params['place'])>0){
					$obj_oe_ku->setPlace($params['place']);
				}
				if(strlen($params['name'])>0){
					$obj_oe_ku->setName($params['name']);
				}

				if(strlen($params['count'])>0){
					$obj_oe_ku->setKu_count($params['count']);
				}

				if(strlen($params['power'])>0){
					$obj_oe_ku->setPower($params['power']);
				}
				
				if(strlen($params['voltage'])>0){
					$obj_oe_ku->setVoltage($params['voltage']);
				}
				if(strlen($params['count_ar'])>0){
					$obj_oe_ku->setCount_ar($params['count_ar']);
				}
				if(strlen($params['max_ar'])>0){
					$obj_oe_ku->setMax_ar($params['max_ar']);
				}
				if(strlen($params['year_begin'])>0){
					$obj_oe_ku->setYear_begin($params['year_begin']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_oe_ku->setId_reestr_object($params['objects_id']);
				}			
				if(strlen($params['srok'])>0){
					$obj_oe_ku->setSrok($params['srok']);
				}	
				if(strlen($params['next_srok'])>0){
					$obj_oe_ku->setNext_srok($params['next_srok']);
				}				
			$obj_oe_kuId = $obj_oe_ku->save();

      return $params['id'];
        }
		
    }




    public function createObj_oe_ku($params)
    {

		$obj_oe_ku = new Obj_oe_ku;
		if(strlen($params['place'])>0){
			$obj_oe_ku->setPlace($params['place']);
		}		
		if(strlen($params['name'])>0){
			$obj_oe_ku->setName($params['name']);
		}
		if(strlen($params['count'])>0){
			$obj_oe_ku->setKu_count($params['count']);
		}
		if(strlen($params['power'])>0){
			$obj_oe_ku->setPower($params['power']);
		}
		if(strlen($params['voltage'])>0){
			$obj_oe_ku->setVoltage($params['voltage']);
		}
		if(strlen($params['count_ar'])>0){
			$obj_oe_ku->setCount_ar($params['count_ar']);
		}
		if(strlen($params['max_ar'])>0){
			$obj_oe_ku->setMax_ar($params['max_ar']);
		}
		if(strlen($params['year_begin'])>0){
			$obj_oe_ku->setYear_begin($params['year_begin']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_oe_ku->setId_reestr_object($params['objects_id']);
		}						
		if(strlen($params['srok'])>0){
			$obj_oe_ku->setSrok($params['srok']);
		}	
		if(strlen($params['next_srok'])>0){
			$obj_oe_ku->setNext_srok($params['next_srok']);
		}		
			
			$obj_oe_kuId = $obj_oe_ku->save();
		
		
        return $obj_oe_kuId;
    }


    public function updateObj_oe_ku($params)
    {
		
        if (isset($params['id_obj_oe_ku'])) {
            $obj_oe_ku = new Obj_oe_ku($params['id_obj_oe_ku']);

			$obj_oe_ku->setId_reestr_object($params['id_reestr_object']);
		
            $obj_oe_ku->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_oe_ku_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oe_ku')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();

		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_ku')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_ku')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
}