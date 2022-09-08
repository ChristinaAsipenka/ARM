<?php

namespace Basis\Model\Spr_type_city;

use Engine\Model;

class spr_type_cityRepository extends Model
{

    public function getSpr_type_city()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_type_city')
            ->orderBy('name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_type_cityData($id)
    {
        $spr_type_city = new Spr_type_city($id);

        return $spr_type_city->findOne();
    }


    public function createSpr_type_city($params)
    {
        $spr_type_city = new Spr_type_city;
        $spr_type_city->setName($params['name']);
		 $spr_type_city->setSokr_name($params['sokr_name']);
		$spr_type_cityId = $spr_type_city->save();

        return $spr_type_cityId;
    }


    public function updateSpr_type_city($params)
    {
        if (isset($params['id'])) {
            $spr_type_city = new Spr_type_city($params['id']);
			$spr_type_city->setName($params['name']);
			$spr_type_city->setSokr_name($params['sokr_name']);
            $spr_type_city->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_type_city')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}