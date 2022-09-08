<?php

namespace Basis\Model\Obj_oe_ek;

use Engine\Model;

class obj_oe_ekRepository extends Model
{

    public function getObj_oe_ek()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oe_ek')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_oe_ekById($id)
    {
			$sql = $this->queryBuilder->select('obj_oe_ek.id, obj_oe_ek.id_reestr_object, obj_oe_ek.place, obj_oe_ek.name, obj_oe_ek.ek_count, obj_oe_ek.power, obj_oe_ek.nazn, obj_oe_ek.year_begin, obj_oe_ek.srok, obj_oe_ek.next_srok, obj_oe_ek.rezim, obj_oe_ek.is_avt, obj_oe_ek.is_pu, obj_oe_ek.is_ak, obj_oe_ek.date_vid, spr_shift_of_work.name as rezim_name')
            ->from('obj_oe_ek')
			->joinLeftTable('spr_shift_of_work','spr_shift_of_work.id = obj_oe_ek.rezim')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_oe_ekData($id)
    {
        $obj_oe_ek = new Obj_oe_ek($id);

        return $obj_oe_ek->findOne();
    }



	public function updateObj_oe_ekInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oe_ek = new Obj_oe_ek($params['id']);
				if(strlen($params['place'])>0){
					$obj_oe_ek->setPlace($params['place']);
				}
				if(strlen($params['name'])>0){
					$obj_oe_ek->setName($params['name']);
				}
				if(strlen($params['count'])>0){
					$obj_oe_ek->setEk_count($params['count']);
				}
				if(strlen($params['power'])>0){
					$obj_oe_ek->setPower($params['power']);
				}
				if(strlen($params['nazn'])>0){
					$obj_oe_ek->setNazn($params['nazn']);
				}				
				if(strlen($params['rezim'])>0){
					$obj_oe_ek->setRezim($params['rezim']);
				}
				if(strlen($params['date_vid'])>0){
					$obj_oe_ek->setDate_vid($params['date_vid']);
				}
				if(strlen($params['is_avt'])>0){
					$obj_oe_ek->setIs_avt($params['is_avt']);
				}				
				if(strlen($params['is_pu'])>0){
					$obj_oe_ek->setIs_pu($params['is_pu']);
				}				
				if(strlen($params['is_ak'])>0){
					$obj_oe_ek->setIs_ak($params['is_ak']);
				}					
				if(strlen($params['year_begin'])>0){
					$obj_oe_ek->setYear_begin($params['year_begin']);
				}			
				if(strlen($params['srok'])>0){
					$obj_oe_ek->setSrok($params['srok']);
				}	
				if(strlen($params['next_srok'])>0){
					$obj_oe_ek->setNext_srok($params['next_srok']);
				}				
				if(strlen($params['objects_id'])>0){
					$obj_oe_ek->setId_reestr_object($params['objects_id']);
				}			
				
			$obj_oe_ekId = $obj_oe_ek->save();

      return $params['id'];
        }
		
    }




    public function createObj_oe_ek($params)
    {

		$obj_oe_ek = new Obj_oe_ek;
		if(strlen($params['place'])>0){
			$obj_oe_ek->setPlace($params['place']);
		}		
		if(strlen($params['name'])>0){
			$obj_oe_ek->setName($params['name']);
		}
		if(strlen($params['count'])>0){
			$obj_oe_ek->setEk_count($params['count']);
		}
		if(strlen($params['power'])>0){
			$obj_oe_ek->setPower($params['power']);
		}
		if(strlen($params['nazn'])>0){
			$obj_oe_ek->setNazn($params['nazn']);
		}
		if(strlen($params['rezim'])>0){
			$obj_oe_ek->setRezim($params['rezim']);
		}
		if(strlen($params['date_vid'])>0){
			$obj_oe_ek->setDate_vid($params['date_vid']);
		}
		if(strlen($params['is_avt'])>0){
			$obj_oe_ek->setIs_avt($params['is_avt']);
		}				
		if(strlen($params['is_pu'])>0){
			$obj_oe_ek->setIs_pu($params['is_pu']);
		}				
		if(strlen($params['is_ak'])>0){
			$obj_oe_ek->setIs_ak($params['is_ak']);
		}	
		if(strlen($params['year_begin'])>0){
			$obj_oe_ek->setYear_begin($params['year_begin']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_oe_ek->setId_reestr_object($params['objects_id']);
		}						
		if(strlen($params['srok'])>0){
			$obj_oe_ek->setSrok($params['srok']);
		}	
		if(strlen($params['next_srok'])>0){
			$obj_oe_ek->setNext_srok($params['next_srok']);
		}		
			
			$obj_oe_ekId = $obj_oe_ek->save();
		
		
        return $obj_oe_ekId;
    }


    public function updateObj_oe_ek($params)
    {
		
        if (isset($params['id_obj_oe_ek'])) {
            $obj_oe_ek = new Obj_oe_ek($params['id_obj_oe_ek']);

			$obj_oe_ek->setId_reestr_object($params['id_reestr_object']);
		
            $obj_oe_ek->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_oe_ek_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oe_ek')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();

		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_ek')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_ek')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
}