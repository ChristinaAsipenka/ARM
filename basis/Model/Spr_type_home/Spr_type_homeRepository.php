<?php

namespace Basis\Model\Spr_type_home;

use Engine\Model;

class spr_type_homeRepository extends Model
{

    public function getSpr_type_home()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_type_home')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_type_homeData($id)
    {
        $spr_type_home = new Spr_type_home($id);

        return $spr_type_home->findOne();
    }


    public function createSpr_type_home($params)
    {
        $spr_type_home = new Spr_type_home;
        $spr_type_home->setName($params['name']);
		$spr_type_homeId = $spr_type_home->save();

        return $spr_type_homeId;
    }


    public function updateSpr_type_home($params)
    {
        if (isset($params['id'])) {
            $spr_type_home = new Spr_type_home($params['id']);
			$spr_type_home->setName($params['name']);
            $spr_type_home->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_og_type_home')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}