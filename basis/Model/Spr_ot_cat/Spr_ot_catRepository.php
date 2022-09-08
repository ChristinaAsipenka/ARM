<?php

namespace Basis\Model\Spr_ot_cat;

use Engine\Model;

class spr_ot_catRepository extends Model
{

    public function getSpr_ot_cat()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_cat')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_catData($id)
    {
        $spr_ot_cat = new Spr_ot_cat($id);

        return $spr_ot_cat->findOne();
    }


    public function createSpr_ot_cat($params)
    {
        $spr_ot_cat = new Spr_ot_cat;
        $spr_ot_cat->setName($params['name']);
		$spr_ot_catId = $spr_ot_cat->save();

        return $spr_ot_catId;
    }


    public function updateSpr_ot_cat($params)
    {
        if (isset($params['id'])) {
            $spr_ot_cat = new Spr_ot_cat($params['id']);
			$spr_ot_cat->setName($params['name']);
            $spr_ot_cat->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_cat')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}