<?php

namespace Basis\Model\Spr_oti_type_fuel;

use Engine\Model;

class spr_oti_type_fuelRepository extends Model
{

    public function getSpr_oti_type_fuel()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_oti_type_fuel')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_oti_type_fuelData($id)
    {
        $spr_oti_type_fuel = new Spr_oti_type_fuel($id);

        return $spr_oti_type_fuel->findOne();
    }


    public function createSpr_oti_type_fuel($params)
    {
        $spr_oti_type_fuel = new Spr_oti_type_fuel;
        $spr_oti_type_fuel->setName($params['name']);
		$spr_oti_type_fuelId = $spr_oti_type_fuel->save();

        return $spr_oti_type_fuelId;
    }


    public function updateSpr_oti_type_fuel($params)
    {
        if (isset($params['id'])) {
            $spr_oti_type_fuel = new Spr_oti_type_fuel($params['id']);
			$spr_oti_type_fuel->setName($params['name']);
            $spr_oti_type_fuel->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_oti_type_fuel')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
}