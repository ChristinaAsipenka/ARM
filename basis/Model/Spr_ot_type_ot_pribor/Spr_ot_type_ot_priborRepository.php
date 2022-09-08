<?php

namespace Basis\Model\Spr_ot_type_ot_pribor;

use Engine\Model;

class spr_ot_type_ot_priborRepository extends Model
{

    public function getSpr_ot_type_ot_pribor()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_type_ot_pribor')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_type_ot_priborData($id)
    {
        $spr_ot_type_ot_pribor = new Spr_ot_type_ot_pribor($id);

        return $spr_ot_type_ot_pribor->findOne();
    }


    public function createSpr_ot_type_ot_pribor($params)
    {
        $spr_ot_type_ot_pribor = new Spr_ot_type_ot_pribor;
        $spr_ot_type_ot_pribor->setName($params['name']);
		$spr_ot_type_ot_priborId = $spr_ot_type_ot_pribor->save();

        return $spr_ot_type_ot_priborId;
    }


    public function updateSpr_ot_type_ot_pribor($params)
    {
        if (isset($params['id'])) {
            $spr_ot_type_ot_pribor = new Spr_ot_type_ot_pribor($params['id']);
			$spr_ot_type_ot_pribor->setName($params['name']);
            $spr_ot_type_ot_pribor->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_type_ot_pribor')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}