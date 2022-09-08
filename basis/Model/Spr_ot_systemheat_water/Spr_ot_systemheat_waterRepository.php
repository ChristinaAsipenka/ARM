<?php

namespace Basis\Model\Spr_ot_systemheat_water;

use Engine\Model;

class spr_ot_systemheat_waterRepository extends Model
{

    public function getSpr_ot_systemheat_water()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_systemheat_water')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_systemheat_waterData($id)
    {
        $spr_ot_systemheat_water = new Spr_ot_systemheat_water($id);

        return $spr_ot_systemheat_water->findOne();
    }


    public function createSpr_ot_systemheat_water($params)
    {
        $spr_ot_systemheat_water = new Spr_ot_systemheat_water;
        $spr_ot_systemheat_water->setName($params['name']);
		$spr_ot_systemheat_waterId = $spr_ot_systemheat_water->save();

        return $spr_ot_systemheat_waterId;
    }


    public function updateSpr_ot_systemheat_water($params)
    {
        if (isset($params['id'])) {
            $spr_ot_systemheat_water = new Spr_ot_systemheat_water($params['id']);
			$spr_ot_systemheat_water->setName($params['name']);
            $spr_ot_systemheat_water->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_systemheat_water')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}