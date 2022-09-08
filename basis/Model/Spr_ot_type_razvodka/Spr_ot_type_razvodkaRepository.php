<?php

namespace Basis\Model\Spr_ot_type_razvodka;

use Engine\Model;

class spr_ot_type_razvodkaRepository extends Model
{

    public function getSpr_ot_type_razvodka()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_type_razvodka')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_type_razvodkaData($id)
    {
        $spr_ot_type_razvodka = new Spr_ot_type_razvodka($id);

        return $spr_ot_type_razvodka->findOne();
    }


    public function createSpr_ot_type_razvodka($params)
    {
        $spr_ot_type_razvodka = new Spr_ot_type_razvodka;
        $spr_ot_type_razvodka->setName($params['name']);
		$spr_ot_type_razvodkaId = $spr_ot_type_razvodka->save();

        return $spr_ot_type_razvodkaId;
    }


    public function updateSpr_ot_type_razvodka($params)
    {
        if (isset($params['id'])) {
            $spr_ot_type_razvodka = new Spr_ot_type_razvodka($params['id']);
			$spr_ot_type_razvodka->setName($params['name']);
            $spr_ot_type_razvodka->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_type_razvodka')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}