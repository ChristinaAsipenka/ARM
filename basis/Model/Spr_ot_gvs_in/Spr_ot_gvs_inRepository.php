<?php

namespace Basis\Model\Spr_ot_gvs_in;

use Engine\Model;

class spr_ot_gvs_inRepository extends Model
{

    public function getSpr_ot_gvs_in()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_gvs_in')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_gvs_inData($id)
    {
        $spr_ot_gvs_in = new Spr_ot_gvs_in($id);

        return $spr_ot_gvs_in->findOne();
    }


    public function createSpr_ot_gvs_in($params)
    {
        $spr_ot_gvs_in = new Spr_ot_gvs_in;
        $spr_ot_gvs_in->setName($params['name']);
		$spr_ot_gvs_inId = $spr_ot_gvs_in->save();

        return $spr_ot_gvs_inId;
    }


    public function updateSpr_ot_gvs_in($params)
    {
        if (isset($params['id'])) {
            $spr_ot_gvs_in = new Spr_ot_gvs_in($params['id']);
			$spr_ot_gvs_in->setName($params['name']);
            $spr_ot_gvs_in->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_gvs_in')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}