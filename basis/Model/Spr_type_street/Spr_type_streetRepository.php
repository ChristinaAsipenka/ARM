<?php

namespace Basis\Model\Spr_type_street;

use Engine\Model;

class spr_type_streetRepository extends Model
{

    public function getSpr_type_street()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_type_street')
            ->orderBy('name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_type_streetData($id)
    {
        $spr_type_street = new Spr_type_street($id);

        return $spr_type_street->findOne();
    }


    public function createSpr_type_street($params)
    {
        $spr_type_street = new Spr_type_street;
        $spr_type_street->setName($params['name']);
		$spr_type_street->setSokr_name($params['sokr_name']);
		$spr_type_streetId = $spr_type_street->save();

        return $spr_type_streetId;
    }


    public function updateSpr_type_street($params)
    {
        if (isset($params['id'])) {
            $spr_type_street = new Spr_type_street($params['id']);
			$spr_type_street->setName($params['name']);
			$spr_type_street->setSokr_name($params['sokr_name']);
            $spr_type_street->save();
        }
    }
   /* public function updateSpr_type_street($params)
    {
        if (isset($params['id'])) {
            $spr_type_street = new Spr_type_street($params['id']);
			$spr_type_street->setName($params['name']);
			$spr_type_street->setSokr_name($params['sokr_name']);
            $spr_type_street->save();
        }
    }*/	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_type_street')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
	
	
	
	
	
	
	
	
	
	
}