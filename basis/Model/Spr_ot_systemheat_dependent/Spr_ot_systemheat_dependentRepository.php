<?php

namespace Basis\Model\Spr_ot_systemheat_dependent;

use Engine\Model;

class spr_ot_systemheat_dependentRepository extends Model
{

    public function getSpr_ot_systemheat_dependent()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_systemheat_dependent')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_systemheat_dependentData($id)
    {
        $spr_ot_systemheat_dependent = new Spr_ot_systemheat_dependent($id);

        return $spr_ot_systemheat_dependent->findOne();
    }


    public function createSpr_ot_systemheat_dependent($params)
    {
        $spr_ot_systemheat_dependent = new Spr_ot_systemheat_dependent;
        $spr_ot_systemheat_dependent->setName($params['name']);
		$spr_ot_systemheat_dependentId = $spr_ot_systemheat_dependent->save();

        return $spr_ot_systemheat_dependentId;
    }


    public function updateSpr_ot_systemheat_dependent($params)
    {
        if (isset($params['id'])) {
            $spr_ot_systemheat_dependent = new Spr_ot_systemheat_dependent($params['id']);
			$spr_ot_systemheat_dependent->setName($params['name']);
            $spr_ot_systemheat_dependent->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_systemheat_dependent')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}