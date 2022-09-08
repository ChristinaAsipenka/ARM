<?php

namespace Basis\Model\Spr_ot_diametr_tube;

use Engine\Model;

class spr_ot_diametr_tubeRepository extends Model
{

    public function getSpr_ot_diametr_tube()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_diametr_tube')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_diametr_tubeData($id)
    {
        $spr_ot_diametr_tube = new Spr_ot_diametr_tube($id);

        return $spr_ot_diametr_tube->findOne();
    }


    public function createSpr_ot_diametr_tube($params)
    {
        $spr_ot_diametr_tube = new Spr_ot_diametr_tube;
        $spr_ot_diametr_tube->setName($params['name']);
		$spr_ot_diametr_tubeId = $spr_ot_diametr_tube->save();

        return $spr_ot_diametr_tubeId;
    }


    public function updateSpr_ot_diametr_tube($params)
    {
        if (isset($params['id'])) {
            $spr_ot_diametr_tube = new Spr_ot_diametr_tube($params['id']);
			$spr_ot_diametr_tube->setName($params['name']);
            $spr_ot_diametr_tube->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_diametr_tube')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}