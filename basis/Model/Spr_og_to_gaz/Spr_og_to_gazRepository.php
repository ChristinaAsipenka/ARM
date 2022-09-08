<?php

namespace Basis\Model\Spr_og_to_gaz;

use Engine\Model;

class spr_og_to_gazRepository extends Model
{

    public function getSpr_og_to_gaz()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_to_gaz')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_og_to_gazData($id)
    {
        $spr_og_to_gaz = new Spr_og_to_gaz($id);

        return $spr_og_to_gaz->findOne();
    }


    public function createSpr_og_to_gaz($params)
    {
        $spr_og_to_gaz = new Spr_og_to_gaz;
        $spr_og_to_gaz->setName($params['name']);
		$spr_og_to_gazId = $spr_og_to_gaz->save();

        return $spr_og_to_gazId;
    }


    public function updateSpr_og_to_gaz($params)
    {
        if (isset($params['id'])) {
            $spr_og_to_gaz = new Spr_og_to_gaz($params['id']);
			$spr_og_to_gaz->setName($params['name']);
            $spr_og_to_gaz->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_og_to_gaz')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}