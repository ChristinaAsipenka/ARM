<?php

namespace Basis\Model\Spr_type_gaz;

use Engine\Model;

class spr_type_gazRepository extends Model
{

    public function getSpr_type_gaz()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_type_gaz')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_type_gazData($id)
    {
        $spr_type_gaz = new Spr_type_gaz($id);

        return $spr_type_gaz->findOne();
    }


    public function createSpr_type_gaz($params)
    {
        $spr_type_gaz = new Spr_type_gaz;
        $spr_type_gaz->setName($params['name']);
		$spr_type_gazId = $spr_type_gaz->save();

        return $spr_type_gazId;
    }


    public function updateSpr_type_gaz($params)
    {
        if (isset($params['id'])) {
            $spr_type_gaz = new Spr_type_gaz($params['id']);
			$spr_type_gaz->setName($params['name']);
            $spr_type_gaz->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_og_type_gaz')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}