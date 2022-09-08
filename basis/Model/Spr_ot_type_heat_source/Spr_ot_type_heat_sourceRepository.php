<?php

namespace Basis\Model\Spr_ot_type_heat_source;

use Engine\Model;

class spr_ot_type_heat_sourceRepository extends Model
{

    public function getSpr_ot_type_heat_source()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_type_heat_source')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_type_heat_sourceData($id)
    {
        $spr_ot_type_heat_source = new Spr_ot_type_heat_source($id);

        return $spr_ot_type_heat_source->findOne();
    }


    public function createSpr_ot_type_heat_source($params)
    {
        $spr_ot_type_heat_source = new Spr_ot_type_heat_source;
        $spr_ot_type_heat_source->setName($params['name']);
		$spr_ot_type_heat_sourceId = $spr_ot_type_heat_source->save();

        return $spr_ot_type_heat_sourceId;
    }


    public function updateSpr_ot_type_heat_source($params)
    {
        if (isset($params['id'])) {
            $spr_ot_type_heat_source = new Spr_ot_type_heat_source($params['id']);
			$spr_ot_type_heat_source->setName($params['name']);
            $spr_ot_type_heat_source->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_type_heat_source')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}