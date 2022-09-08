<?php

namespace Basis\Model\Spr_flue_mater;

use Engine\Model;

class spr_flue_materRepository extends Model
{

    public function getSpr_flue_mater()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_flue_mater')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_flue_materData($id)
    {
        $spr_flue_mater = new Spr_flue_mater($id);

        return $spr_flue_mater->findOne();
    }


    public function createSpr_flue_mater($params)
    {
        $spr_flue_mater = new Spr_flue_mater;
        $spr_flue_mater->setName($params['name']);
		$spr_flue_materId = $spr_flue_mater->save();

        return $spr_flue_materId;
    }


    public function updateSpr_flue_mater($params)
    {
        if (isset($params['id'])) {
            $spr_flue_mater = new Spr_flue_mater($params['id']);
			$spr_flue_mater->setName($params['name']);
            $spr_flue_mater->save();
        }
    }


    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_og_flue_mater')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
}