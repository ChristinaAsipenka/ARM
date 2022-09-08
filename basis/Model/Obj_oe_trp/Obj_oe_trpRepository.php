<?php

namespace Basis\Model\Obj_oe_trp;

use Engine\Model;

class obj_oe_trpRepository extends Model
{

    public function getObj_oe_trp()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oe_trp')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_oe_trpById($id)
    {
			$sql = $this->queryBuilder->select('obj_oe_trp.id, obj_oe_trp.id_reestr_object, obj_oe_trp.name, obj_oe_trp.id_type, obj_oe_trp.power, obj_oe_trp.volt, obj_oe_trp.year_begin, obj_oe_trp.category, obj_oe_trp.srok, obj_oe_trp.next_srok, spr_oe_category_line.name as spr_trp_category_line_name')
            ->from('obj_oe_trp')
			->joinLeftTable('spr_oe_category_line','spr_oe_category_line.id = obj_oe_trp.category')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_oe_trpData($id)
    {
        $obj_oe_trp = new Obj_oe_trp($id);

        return $obj_oe_trp->findOne();
    }



	public function updateObj_oe_trpInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oe_trp = new Obj_oe_trp($params['id']);

				if(strlen($params['name'])>0){
					$obj_oe_trp->setName($params['name']);
				}
			/// изначально задумано как отдельный справочник, но пока сделано для ручного ввода	
				if(strlen($params['id_type'])>0){
					$obj_oe_trp->setId_type($params['id_type']);
				}

				if(strlen($params['power'])>0){
					$obj_oe_trp->setPower($params['power']);
				}
				
				if(strlen($params['volt'])>0){
					$obj_oe_trp->setVolt($params['volt']);
				}

				if(strlen($params['year_begin'])>0){
					$obj_oe_trp->setYear_begin($params['year_begin']);
				}			
				if(strlen($params['objects_id'])>0){
					$obj_oe_trp->setId_reestr_object($params['objects_id']);
				}
				
				if(strlen($params['category'])>0){
					$obj_oe_trp->setCategory($params['category']);
				}				
				if(strlen($params['srok'])>0){
					$obj_oe_trp->setSrok($params['srok']);
				}	
				if(strlen($params['next_srok'])>0){
					$obj_oe_trp->setNext_srok($params['next_srok']);
				}				
			$obj_oe_trpId = $obj_oe_trp->save();

      return $params['id'];
        }
		
    }




    public function createObj_oe_trp($params)
    {

		$obj_oe_trp = new Obj_oe_trp;
		
		if(strlen($params['name'])>0){
			$obj_oe_trp->setName($params['name']);
		}
	/// изначально задумано как отдельный справочник, но пока сделано для ручного ввода	
		if(strlen($params['id_type'])>0){
			$obj_oe_trp->setId_type($params['id_type']);
		}
		if(strlen($params['power'])>0){
			$obj_oe_trp->setPower($params['power']);
		}
		if(strlen($params['volt'])>0){
			$obj_oe_trp->setVolt($params['volt']);
		}
		if(strlen($params['year_begin'])>0){
			$obj_oe_trp->setYear_begin($params['year_begin']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_oe_trp->setId_reestr_object($params['objects_id']);
		}		
		if(strlen($params['category'])>0){
			$obj_oe_trp->setCategory($params['category']);
		}				
		if(strlen($params['srok'])>0){
			$obj_oe_trp->setSrok($params['srok']);
		}	
		if(strlen($params['next_srok'])>0){
			$obj_oe_trp->setNext_srok($params['next_srok']);
		}		
			
			$obj_oe_trpId = $obj_oe_trp->save();
		
		
        return $obj_oe_trpId;
    }


    public function updateObj_oe_trp($params)
    {
		
        if (isset($params['id_obj_oe_trp'])) {
            $obj_oe_trp = new Obj_oe_trp($params['id_obj_oe_trp']);

			$obj_oe_trp->setId_reestr_object($params['id_reestr_object']);
		
            $obj_oe_trp->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_oe_trp_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oe_trp')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();

		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_trp')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_trp')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
}