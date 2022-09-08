<?php

namespace Basis\Model\Obj_oe_vvd;

use Engine\Model;

class obj_oe_vvdRepository extends Model
{

    public function getObj_oe_vvd()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oe_vvd')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_oe_vvdById($id)
    {
			$sql = $this->queryBuilder->select('obj_oe_vvd.id, obj_oe_vvd.id_reestr_object, obj_oe_vvd.name, obj_oe_vvd.vvd_count, obj_oe_vvd.power, obj_oe_vvd.voltage, obj_oe_vvd.year_begin, obj_oe_vvd.srok, obj_oe_vvd.next_srok')
            ->from('obj_oe_vvd')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_oe_vvdData($id)
    {
        $obj_oe_vvd = new Obj_oe_vvd($id);

        return $obj_oe_vvd->findOne();
    }



	public function updateObj_oe_vvdInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oe_vvd = new Obj_oe_vvd($params['id']);

				if(strlen($params['name'])>0){
					$obj_oe_vvd->setName($params['name']);
				}

				if(strlen($params['count'])>0){
					$obj_oe_vvd->setVvd_count($params['count']);
				}

				if(strlen($params['power'])>0){
					$obj_oe_vvd->setPower($params['power']);
				}
				
				if(strlen($params['voltage'])>0){
					$obj_oe_vvd->setVoltage($params['voltage']);
				}

				if(strlen($params['year_begin'])>0){
					$obj_oe_vvd->setYear_begin($params['year_begin']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_oe_vvd->setId_reestr_object($params['objects_id']);
				}			
				if(strlen($params['srok'])>0){
					$obj_oe_vvd->setSrok($params['srok']);
				}	
				if(strlen($params['next_srok'])>0){
					$obj_oe_vvd->setNext_srok($params['next_srok']);
				}				
			$obj_oe_vvdId = $obj_oe_vvd->save();

      return $params['id'];
        }
		
    }




    public function createObj_oe_vvd($params)
    {

		$obj_oe_vvd = new Obj_oe_vvd;
		
		if(strlen($params['name'])>0){
			$obj_oe_vvd->setName($params['name']);
		}
		if(strlen($params['count'])>0){
			$obj_oe_vvd->setVvd_count($params['count']);
		}
		if(strlen($params['power'])>0){
			$obj_oe_vvd->setPower($params['power']);
		}
		if(strlen($params['voltage'])>0){
			$obj_oe_vvd->setVoltage($params['voltage']);
		}
		if(strlen($params['year_begin'])>0){
			$obj_oe_vvd->setYear_begin($params['year_begin']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_oe_vvd->setId_reestr_object($params['objects_id']);
		}						
		if(strlen($params['srok'])>0){
			$obj_oe_vvd->setSrok($params['srok']);
		}	
		if(strlen($params['next_srok'])>0){
			$obj_oe_vvd->setNext_srok($params['next_srok']);
		}		
			
			$obj_oe_vvdId = $obj_oe_vvd->save();
		
		
        return $obj_oe_vvdId;
    }


    public function updateObj_oe_vvd($params)
    {
		
        if (isset($params['id_obj_oe_vvd'])) {
            $obj_oe_vvd = new Obj_oe_vvd($params['id_obj_oe_vvd']);

			$obj_oe_vvd->setId_reestr_object($params['id_reestr_object']);
		
            $obj_oe_vvd->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_oe_vvd_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oe_vvd')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();

		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_vvd')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_vvd')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
}