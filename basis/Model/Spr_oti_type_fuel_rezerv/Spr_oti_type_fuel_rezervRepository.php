<?php

namespace Basis\Model\Spr_oti_type_fuel_rezerv;

use Engine\Model;

class spr_oti_type_fuel_rezervRepository extends Model
{

    public function getSpr_oti_type_fuel_rezerv()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_oti_type_fuel')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_oti_type_fuel_rezervData($id)
    {
        $spr_oti_type_fuel_rezerv = new Spr_oti_type_fuel_rezerv($id);

        return $spr_oti_type_fuel_rezerv->findOne();
    }


    public function createSpr_oti_type_fuel_rezerv($params)
    {
        $spr_oti_type_fuel_rezerv = new Spr_oti_type_fuel_rezerv;
        $spr_oti_type_fuel_rezerv->setName($params['name']);
		$spr_oti_type_fuel_rezervId = $spr_oti_type_fuel_rezerv->save();

        return $spr_oti_type_fuel_rezervId;
    }


    public function updateSpr_oti_type_fuel_rezerv($params)
    {
        if (isset($params['id'])) {
            $spr_oti_type_fuel_rezerv = new Spr_oti_type_fuel_rezerv($params['id']);
			$spr_oti_type_fuel_rezerv->setName($params['name']);
            $spr_oti_type_fuel_rezerv->save();
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