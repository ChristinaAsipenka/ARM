<?php

namespace Basis\Model\Spr_ot_type_to;

use Engine\Model;

class spr_ot_type_toRepository extends Model
{

    public function getSpr_ot_type_to()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_type_to')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_type_toData($id)
    {
        $spr_ot_type_to = new Spr_ot_type_to($id);

        return $spr_ot_type_to->findOne();
    }


    public function createSpr_ot_type_to($params)
    {
        $spr_ot_type_to = new Spr_ot_type_to;
        $spr_ot_type_to->setName($params['name']);
		$spr_ot_type_toId = $spr_ot_type_to->save();

        return $spr_ot_type_toId;
    }


    public function updateSpr_ot_type_to($params)
    {
        if (isset($params['id'])) {
            $spr_ot_type_to = new Spr_ot_type_to($params['id']);
			$spr_ot_type_to->setName($params['name']);
            $spr_ot_type_to->save();
        }
    }

    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_type_to')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
}