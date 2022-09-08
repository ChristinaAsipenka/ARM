<?php

namespace Basis\Model\Spr_ot_type_izol;

use Engine\Model;

class spr_ot_type_izolRepository extends Model
{

    public function getSpr_ot_type_izol()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_type_izol')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_type_izolData($id)
    {
        $spr_ot_type_izol = new Spr_ot_type_izol($id);

        return $spr_ot_type_izol->findOne();
    }


    public function createSpr_ot_type_izol($params)
    {
        $spr_ot_type_izol = new Spr_ot_type_izol;
        $spr_ot_type_izol->setName($params['name']);
		$spr_ot_type_izolId = $spr_ot_type_izol->save();

        return $spr_ot_type_izolId;
    }


    public function updateSpr_ot_type_izol($params)
    {
        if (isset($params['id'])) {
            $spr_ot_type_izol = new Spr_ot_type_izol($params['id']);
			$spr_ot_type_izol->setName($params['name']);
            $spr_ot_type_izol->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_type_izol')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}