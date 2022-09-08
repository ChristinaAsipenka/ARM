<?php

namespace Basis\Model\Spr_ot_heatnet_type_obj;

use Engine\Model;

class spr_ot_heatnet_type_objRepository extends Model
{

    public function getSpr_ot_heatnet_type_obj()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_heatnet_type_obj')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_heatnet_type_objData($id)
    {
        $spr_ot_heatnet_type_obj = new Spr_ot_heatnet_type_obj($id);

        return $spr_ot_heatnet_type_obj->findOne();
    }


    public function createSpr_ot_heatnet_type_obj($params)
    {
        $spr_ot_heatnet_type_obj = new Spr_ot_heatnet_type_obj;
        $spr_ot_heatnet_type_obj->setName($params['name']);
		$spr_ot_heatnet_type_obj = $spr_ot_heatnet_type_obj->save();

        return $spr_ot_heatnet_type_objId;
    }


    public function updateSpr_ot_heatnet_type_obj($params)
    {
        if (isset($params['id'])) {
            $spr_ot_heatnet_type_obj = new Spr_ot_heatnet_type_obj($params['id']);
			$spr_ot_heatnet_type_obj->setName($params['name']);
            $spr_ot_heatnet_type_obj->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_heatnet_type_obj')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}