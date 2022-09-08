<?php

namespace Basis\Model\Spr_oti_boiler_type;

use Engine\Model;

class spr_oti_boiler_typeRepository extends Model
{

    public function getSpr_oti_boiler_type()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_oti_boiler_type')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_oti_boiler_typeData($id)
    {
        $spr_oti_boiler_type = new Spr_oti_boiler_type($id);

        return $spr_oti_boiler_type->findOne();
    }


    public function createSpr_oti_boiler_type($params)
    {
        $spr_oti_boiler_type = new Spr_oti_boiler_type;
        $spr_oti_boiler_type->setName($params['name']);
		$spr_oti_boiler_typeId = $spr_oti_boiler_type->save();

        return $spr_oti_boiler_typeId;
    }


    public function updateSpr_oti_boiler_type($params)
    {
        if (isset($params['id'])) {
            $spr_oti_boiler_type = new Spr_oti_boiler_type($params['id']);
			$spr_oti_boiler_type->setName($params['name']);
            $spr_oti_boiler_type->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_oti_boiler_type')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}