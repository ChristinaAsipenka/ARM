<?php

namespace Basis\Model\Spr_units_power;

use Engine\Model;

class spr_units_powerRepository extends Model
{

    public function getSpr_units_power()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_units_power')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_units_powerData($id)
    {
        $spr_units_power = new Spr_units_power($id);

        return $spr_units_power->findOne();
    }


    public function createSpr_units_power($params)
    {
        $spr_units_power = new Spr_units_power;
        $spr_units_power->setName($params['name']);
		$spr_units_power->setRatio($params['ratio']);
		$spr_units_powerId = $spr_units_power->save();

        return $spr_units_powerId;
    }


    public function updateSpr_units_power($params)
    {
        if (isset($params['id'])) {
            $spr_units_power = new Spr_units_power($params['id']);
			$spr_units_power->setName($params['name']);
			$spr_units_power->setRatio($params['ratio']);
            $spr_units_power->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_units_power')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}