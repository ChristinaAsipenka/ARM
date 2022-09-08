<?php

namespace Basis\Model\Obj_oe_aie;

use Engine\Model;

class obj_oe_aieRepository extends Model
{

    public function getObj_oe_aie()
    {
        $sql = $this->queryBuilder->select()
            ->from('obj_oe_aie')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getObj_oe_aieById($id)
    {
	   $sql = $this->queryBuilder->select('obj_oe_aie.id, obj_oe_aie.id_reestr_object, obj_oe_aie.name, obj_oe_aie.type, obj_oe_aie.power, obj_oe_aie.mosch, obj_oe_aie.factory, obj_oe_aie.srok, obj_oe_aie.date_last, obj_oe_aie.place, obj_oe_aie.next_srok, obj_oe_aie.year_begin, obj_oe_aie.pitanie')
            ->from('obj_oe_aie')
            ->where('id_reestr_object', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getObj_oe_aieData($id)
    {
        $obj_oe_aie = new Obj_oe_aie($id);

        return $obj_oe_aie->findOne();
    }

	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_aie')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}

	public function updateObj_oe_aieInfo($params)
    {
      
	   if (isset($params['id'])) {
            $obj_oe_aie = new Obj_oe_aie($params['id']);

			if(strlen($params['name'])>0){
				$obj_oe_aie->setName($params['name']);
			}
			
			if(strlen($params['type'])>0){
				$obj_oe_aie->setType($params['type']);
			}
			
			if(strlen($params['place'])>0){
				$obj_oe_aie->setPlace($params['place']);
			}
			
			if(strlen($params['power'])>0){
				$obj_oe_aie->setPower($params['power']);
			}

			if(strlen($params['mosch'])>0){
				$obj_oe_aie->setMosch($params['mosch']);
			}
			
			if(strlen($params['date_last'])>0){
				$obj_oe_aie->setDateLast($params['date_last']);
			}
			
			if(strlen($params['factory'])>0){
				$obj_oe_aie->setFactory($params['factory']);
			}
			
			if(strlen($params['srok'])>0){
				$obj_oe_aie->setSrok($params['srok']);
			}
			if(strlen($params['next_srok'])>0){
				$obj_oe_aie->setNext_srok($params['next_srok']);
			}
			if(strlen($params['year_begin'])>0){
				$obj_oe_aie->setYear_begin($params['year_begin']);
			}
			if(strlen($params['pitanie'])>0){
				$obj_oe_aie->setPitanie($params['pitanie']);
			}
			if(strlen($params['objects_id'])>0){
				$obj_oe_aie->setId_reestr_object($params['objects_id']);
			}			

			$obj_oe_aieId = $obj_oe_aie->save();

      return $params['id'];
        }
		
    }


    public function createObj_oe_aie($params)
    {
		$obj_oe_aie = new Obj_oe_aie;
		
		if(strlen($params['name'])>0){
			$obj_oe_aie->setName($params['name']);
		}
		
		if(strlen($params['type'])>0){
			$obj_oe_aie->setType($params['type']);
		}
		
		if(strlen($params['place'])>0){
			$obj_oe_aie->setPlace($params['place']);
		}
		
		if(strlen($params['power'])>0){
			$obj_oe_aie->setPower($params['power']);
		}

		if(strlen($params['mosch'])>0){
			$obj_oe_aie->setMosch($params['mosch']);
		}
		
		if(strlen($params['date_last'])>0){
			$obj_oe_aie->setDateLast($params['date_last']);
		}
		
		if(strlen($params['factory'])>0){
			$obj_oe_aie->setFactory($params['factory']);
		}
		
		if(strlen($params['srok'])>0){
			$obj_oe_aie->setSrok($params['srok']);
		}
		if(strlen($params['next_srok'])>0){
			$obj_oe_aie->setNext_srok($params['next_srok']);
		}
		if(strlen($params['year_begin'])>0){
			$obj_oe_aie->setYear_begin($params['year_begin']);
		}
		if(strlen($params['pitanie'])>0){
			$obj_oe_aie->setPitanie($params['pitanie']);
		}
		if(strlen($params['objects_id'])>0){
			$obj_oe_aie->setId_reestr_object($params['objects_id']);
		}		
		
			$obj_oe_aieId = $obj_oe_aie->save();
		
		
        return $obj_oe_aieId;
    }


    public function updateObj_oe_aie($params)
    {
		
        if (isset($params['id_obj_oe_aie'])) {
            $obj_oe_aie = new obj_oe_aie($params['id_obj_oe_aie']);

			$obj_oe_aie->setId_reestr_object($params['id_reestr_object']);
		
            $obj_oe_aie->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteObj_oe_aie_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('obj_oe_aie')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
				echo $sql;
		$this->db->query($sql, $this->queryBuilder->values);
    }
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('obj_oe_aie')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
		
}