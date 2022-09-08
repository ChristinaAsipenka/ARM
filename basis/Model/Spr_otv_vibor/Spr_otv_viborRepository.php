<?php

namespace Basis\Model\Spr_otv_vibor;

use Engine\Model;

class spr_otv_viborRepository extends Model
{

    public function getSpr_otv_vibor()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_otv_vibor')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_otv_viborData($id)
    {
        $spr_otv_vibor = new Spr_otv_vibor($id);

        return $spr_otv_vibor->findOne();
    }


    public function createSpr_otv_vibor($params)
    {
        $spr_otv_vibor = new Spr_otv_vibor;
        $spr_otv_vibor->setName($params['name']);
		$spr_otv_viborId = $spr_otv_vibor->save();

        return $spr_otv_viborId;
    }


    public function updateSpr_otv_vibor($params)
    {
        if (isset($params['id'])) {
            $spr_otv_vibor = new Spr_otv_vibor($params['id']);
			$spr_otv_vibor->setName($params['name']);
            $spr_otv_vibor->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_otv_vibor')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}