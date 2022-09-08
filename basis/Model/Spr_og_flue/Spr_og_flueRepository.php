<?php

namespace Basis\Model\Spr_og_flue;

use Engine\Model;

class spr_og_flueRepository extends Model
{

    public function getSPR_VidDym()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_flue')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSPR_VidDymData($id)
    {
        $spr_vidDym = new spr_og_flue($id);

        return $spr_vidDym->findOne();
    }


    public function createSPR_VidDym($params)
    {
        $spr_vidDym = new spr_og_flue;
        $spr_vidDym->setName($params['name']);
		$spr_vidDymId = $spr_vidDym->save();

        return $spr_vidDymId;
    }


    public function updateSPR_VidDym($params)
    {
        if (isset($params['id'])) {
            $spr_vidDym = new spr_og_flue($params['id']);
			$spr_vidDym->setName($params['name']);
            $spr_vidDym->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_og_flue')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}