<?php

namespace Basis\Model\Spr_oe_energy_type;

use Engine\Model;

class spr_oe_energy_typeRepository extends Model
{

    public function getSpr_oe_energy_type()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_oe_energy_type')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_oe_energy_typeData($id)
    {
        $spr_oe_energy_type = new Spr_oe_energy_type($id);

        return $spr_oe_energy_type->findOne();
    }


    public function createSpr_oe_energy_type($params)
    {
        $spr_oe_energy_type = new Spr_oe_energy_type;
        $spr_oe_energy_type->setName($params['name']);
		$spr_oe_energy_typeId = $spr_oe_energy_type->save();

        return $spr_oe_energy_typeId;
    }


    public function updateSpr_oe_energy_type($params)
    {
        if (isset($params['id'])) {
            $spr_oe_energy_type = new Spr_oe_energy_type($params['id']);
			$spr_oe_energy_type->setName($params['name']);
            $spr_oe_energy_type->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_oe_energy_type')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}