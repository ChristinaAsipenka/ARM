<?php

namespace Basis\Model\Spr_ot_heatnet_type_underground;

use Engine\Model;

class spr_ot_heatnet_type_undergroundRepository extends Model
{

    public function getSpr_ot_heatnet_type_underground()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_heatnet_type_underground')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_heatnet_type_undergroundData($id)
    {
        $spr_ot_heatnet_type_underground = new Spr_ot_heatnet_type_underground($id);

        return $spr_ot_heatnet_type_underground->findOne();
    }


    public function createSpr_ot_heatnet_type_underground($params)
    {
        $spr_ot_heatnet_type_underground = new Spr_ot_heatnet_type_underground;
        $spr_ot_heatnet_type_underground->setName($params['name']);
		$spr_ot_heatnet_type_undergroundId = $spr_ot_heatnet_type_underground->save();

        return $spr_ot_heatnet_type_undergroundId;
    }


    public function updateSpr_ot_heatnet_type_underground($params)
    {
        if (isset($params['id'])) {
            $spr_ot_heatnet_type_underground = new Spr_ot_heatnet_type_underground($params['id']);
			$spr_ot_heatnet_type_underground->setName($params['name']);
            $spr_ot_heatnet_type_underground->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_heatnet_type_underground')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}