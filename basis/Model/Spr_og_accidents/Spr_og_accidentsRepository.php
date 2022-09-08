<?php

namespace Basis\Model\Spr_og_accidents;

use Engine\Model;

class spr_og_accidentsRepository extends Model
{

    public function getSpr_og_accidents()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_accidents')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_og_accidentsData($id)
    {
        $spr_og_accidents = new Spr_og_accidents($id);

        return $spr_og_accidents->findOne();
    }


    public function createSpr_og_accidents($params)
    {
        $spr_og_accidents = new Spr_og_accidents;
        $spr_og_accidents->setName($params['name']);
		$spr_og_accidentsId = $spr_og_accidents->save();

        return $spr_og_accidentsId;
    }


    public function updateSpr_og_accidents($params)
    {
        if (isset($params['id'])) {
            $spr_og_accidents = new Spr_og_accidents($params['id']);
			$spr_og_accidents->setName($params['name']);
            $spr_og_accidents->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_og_accidents')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}