<?php

namespace Basis\Model\Obj_oe_avr;

use Engine\Model;

class obj_oe_avrRepository extends Model
{

    public function getObj_oe_avr()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oe_avr')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_oe_avrById($id)
    {
      

	   $sql = $this->queryBuilder->select('id, id_reestr_object, place, power, time, date')
            ->from('obj_oe_avr')
            ->where('id_reestr_object', $id)
            ->sql();
//echo $sql;
		return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_avr')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
    public function getObj_oe_avrData($id)
    {
        $obj_oe_avr = new Obj_oe_avr($id);

        return $obj_oe_avr->findOne();
    }



	public function updateObj_oe_avrInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oe_avr = new Obj_oe_avr($params['id']);

			
			if(strlen($params['place'])>0){
				$obj_oe_avr->setPlace($params['place']);
			}
			
			if(strlen($params['power'])>0){
				$obj_oe_avr->setPower($params['power']);
			}
			
			if(strlen($params['time'])>0){
				$obj_oe_avr->setTime($params['time']);
			}
			
			if(strlen($params['date'])>0){
				$obj_oe_avr->setDate($params['date']);
			}			
			if(strlen($params['objects_id'])>0){
				$obj_oe_avr->setId_reestr_object($params['objects_id']);
			}
			$obj_oe_avrId = $obj_oe_avr->save();

      return $params['id'];
        }
		
    }






    public function createObj_oe_avr($params)
    {
        $obj_oe_avr = new Obj_oe_avr;
		
		if(strlen($params['place'])>0){
			$obj_oe_avr->setPlace($params['place']);
		}
		
		if(strlen($params['power'])>0){
			$obj_oe_avr->setPower($params['power']);
		}
		
		if(strlen($params['time'])>0){
			$obj_oe_avr->setTime($params['time']);
		}
		
		if(strlen($params['date'])>0){
			$obj_oe_avr->setDate($params['date']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_oe_avr->setId_reestr_object($params['objects_id']);
		}		
			$obj_oe_avrId = $obj_oe_avr->save();
		return $obj_oe_avrId;
    }


    public function updateObj_oe_avr($params)
    {
		
        if (isset($params['id_obj_oe_avr'])) {
            $obj_oe_avr = new Obj_oe_avr($params['id_obj_oe_avr']);

			$obj_oe_avr->setId_reestr_object($params['id_reestr_object']);
		
            $obj_oe_avr->save();
        }
    }
/// Удаляем АВР который не имеет id объекта	
	public function deleteObj_oe_avr_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oe_avr')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
				//echo $sql;
		$this->db->query($sql, $this->queryBuilder->values);
    }
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_avr')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
		
}