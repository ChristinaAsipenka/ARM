<?php

namespace Basis\Model\Spr_ot_gvs_open;

use Engine\Model;

class spr_ot_gvs_openRepository extends Model
{

    public function getSpr_ot_gvs_open()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_gvs_open')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_gvs_openData($id)
    {
        $spr_ot_gvs_open = new Spr_ot_gvs_open($id);

        return $spr_ot_gvs_open->findOne();
    }


    public function createSpr_ot_gvs_open($params)
    {
        $spr_ot_gvs_open = new Spr_ot_gvs_open;
        $spr_ot_gvs_open->setName($params['name']);
		$spr_ot_gvs_openId = $spr_ot_gvs_open->save();

        return $spr_ot_gvs_openId;
    }


    public function updateSpr_ot_gvs_open($params)
    {
        if (isset($params['id'])) {
            $spr_ot_gvs_open = new Spr_ot_gvs_open($params['id']);
			$spr_ot_gvs_open->setName($params['name']);
            $spr_ot_gvs_open->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_gvs_open')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}