<?php

namespace Basis\Model\Spr_ot_nazn_sar;

use Engine\Model;

class spr_ot_nazn_sarRepository extends Model
{

    public function getSpr_ot_nazn_sar()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_nazn_sar')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_nazn_sarData($id)
    {
        $spr_ot_nazn_sar = new Spr_ot_nazn_sar($id);

        return $spr_ot_nazn_sar->findOne();
    }


    public function createSpr_ot_nazn_sar($params)
    {
        $spr_ot_nazn_sar = new Spr_ot_nazn_sar;
        $spr_ot_nazn_sar->setName($params['name']);
		$spr_ot_nazn_sarId = $spr_ot_nazn_sar->save();

        return $spr_ot_nazn_sarId;
    }


    public function updateSpr_ot_nazn_sar($params)
    {
        if (isset($params['id'])) {
            $spr_ot_nazn_sar = new Spr_ot_nazn_sar($params['id']);
			$spr_ot_nazn_sar->setName($params['name']);
            $spr_ot_nazn_sar->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_nazn_sar')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}