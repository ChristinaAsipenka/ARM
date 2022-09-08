<?php

namespace Basis\Model\Spr_ot_heatnet_type_iso;

use Engine\Model;

class spr_ot_heatnet_type_isoRepository extends Model
{

    public function getSpr_ot_heatnet_type_iso()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_heatnet_type_iso')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_heatnet_type_isoData($id)
    {
        $spr_ot_heatnet_type_iso = new Spr_ot_heatnet_type_iso($id);

        return $spr_ot_heatnet_type_iso->findOne();
    }


    public function createSpr_ot_heatnet_type_iso($params)
    {
        $spr_ot_heatnet_type_iso = new Spr_ot_heatnet_type_iso;
        $spr_ot_heatnet_type_iso->setName($params['name']);
		$spr_ot_heatnet_type_isoId = $spr_ot_heatnet_type_iso->save();

        return $spr_ot_heatnet_type_isoId;
    }


    public function updateSpr_ot_heatnet_type_iso($params)
    {
        if (isset($params['id'])) {
            $spr_ot_heatnet_type_iso = new Spr_ot_heatnet_type_iso($params['id']);
			$spr_ot_heatnet_type_iso->setName($params['name']);
            $spr_ot_heatnet_type_iso->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_heatnet_type_iso')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}