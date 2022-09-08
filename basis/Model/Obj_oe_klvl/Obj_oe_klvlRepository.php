<?php

namespace Basis\Model\Obj_oe_klvl;

use Engine\Model;

class obj_oe_klvlRepository extends Model
{

    public function getObj_oe_klvl()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oe_klvl')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_oe_klvlById($id)
    {
      

	   $sql = $this->queryBuilder->select('obj_oe_klvl.id, obj_oe_klvl.id_reestr_object, obj_oe_klvl.type, obj_oe_klvl.volt, obj_oe_klvl.name, obj_oe_klvl.mark, obj_oe_klvl.length, obj_oe_klvl.name_center, obj_oe_klvl.year, obj_oe_klvl.category, obj_oe_klvl.srok, obj_oe_klvl.next_srok, spr_oe_klvl_type.name_short as spr_oe_klvl_type_name, spr_oe_klvl_volt.name as spr_oe_klvl_volt_name, spr_oe_category_line.name as spr_oe_category_line_name')
            ->from('obj_oe_klvl')
            ->joinLeftTable('spr_oe_klvl_type','spr_oe_klvl_type.id = obj_oe_klvl.type')
			->joinLeftTable('spr_oe_klvl_volt','spr_oe_klvl_volt.id = obj_oe_klvl.volt')
			->joinLeftTable('spr_oe_category_line','spr_oe_category_line.id = obj_oe_klvl.category')
            ->where('obj_oe_klvl.id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_oe_klvlData($id)
    {
        $obj_oe_klvl = new Obj_oe_klvl($id);

        return $obj_oe_klvl->findOne();
    }




	public function updateObj_oe_klvlInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oe_klvl = new Obj_oe_klvl($params['id']);

			
				if(strlen($params['name'])>0){
					$obj_oe_klvl->setName($params['name']);
				}

				if(strlen($params['type'])>0){
					$obj_oe_klvl->setType($params['type']);
				}
				
				
				if(strlen($params['mark'])>0){
					$obj_oe_klvl->setMark($params['mark']);
				}
				
				if(strlen($params['volt'])>0){
					$obj_oe_klvl->setVolt($params['volt']);
				}
				
				
				if(strlen($params['year'])>0){
					$obj_oe_klvl->setYear($params['year']);
				}
				
				if(strlen($params['name_center'])>0){
					$obj_oe_klvl->setName_center($params['name_center']);
				}
				
				if(strlen($params['length'])>0){
					$obj_oe_klvl->setLength($params['length']);
				}

				if(strlen($params['category'])>0){
					$obj_oe_klvl->setCategory($params['category']);
				}		
				if(strlen($params['next_srok'])>0){
					$obj_oe_klvl->setNext_srok($params['next_srok']);
				}
				if(strlen($params['srok'])>0){
					$obj_oe_klvl->setSrok($params['srok']);
				}
				
				if(strlen($params['objects_id'])>0){
					$obj_oe_klvl->setId_reestr_object($params['objects_id']);
				}
			$obj_oe_klvlId = $obj_oe_klvl->save();

      return $params['id'];
        }
		
    }










    public function createObj_oe_klvl($params)
    {

		$obj_oe_klvl = new Obj_oe_klvl;
		
		if(strlen($params['name'])>0){
			$obj_oe_klvl->setName($params['name']);
		}
		if(strlen($params['type'])>0){
			$obj_oe_klvl->setType($params['type']);
		}
		if(strlen($params['mark'])>0){
			$obj_oe_klvl->setMark($params['mark']);
		}	
		if(strlen($params['volt'])>0){
			$obj_oe_klvl->setVolt($params['volt']);
		}
		if(strlen($params['year'])>0){
			$obj_oe_klvl->setYear($params['year']);
		}		
		if(strlen($params['name_center'])>0){
			$obj_oe_klvl->setName_center($params['name_center']);
		}		
		if(strlen($params['length'])>0){
			$obj_oe_klvl->setLength($params['length']);
		}		
		if(strlen($params['category'])>0){
			$obj_oe_klvl->setCategory($params['category']);
		}		
		if(strlen($params['next_srok'])>0){
			$obj_oe_klvl->setNext_srok($params['next_srok']);
		}
		if(strlen($params['srok'])>0){
			$obj_oe_klvl->setSrok($params['srok']);
		}		
		if(strlen($params['objects_id'])>0){
			$obj_oe_klvl->setId_reestr_object($params['objects_id']);
		}		
		
			$obj_oe_klvlId = $obj_oe_klvl->save();
		
		
        return $obj_oe_klvlId;
    }


    public function updateObj_oe_klvl($params)
    {
		
        if (isset($params['id_obj_oe_klvl'])) {
            $obj_oe_klvl = new obj_oe_klvl($params['id_obj_oe_klvl']);

			$obj_oe_klvl->setId_reestr_object($params['id_reestr_object']);
		
            $obj_oe_klvl->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_oe_klvl_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oe_klvl')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
		
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_klvl')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_klvl')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}

	
}