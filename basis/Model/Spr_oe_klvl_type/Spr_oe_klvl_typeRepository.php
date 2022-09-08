<?php

namespace Basis\Model\Spr_oe_klvl_type;

use Engine\Model;

class spr_oe_klvl_typeRepository extends Model
{

    public function getSpr_oe_klvl_type()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_oe_klvl_type')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_oe_klvl_typeData($id)
    {
        $spr_oe_klvl_type = new Spr_oe_klvl_type($id);

        return $spr_oe_klvl_type->findOne();
    }


    public function createSpr_oe_klvl_type($params)
    {
        $spr_oe_klvl_type = new Spr_oe_klvl_type;
        $spr_oe_klvl_type->setName($params['name']);
        $spr_oe_klvl_type->setName_short($params['sokr_name']);
		$spr_oe_klvl_typeId = $spr_oe_klvl_type->save();

        return $spr_oe_klvl_typeId;
    }


    public function updateSpr_oe_klvl_type($params)
    {
        if (isset($params['id'])) {
            $spr_oe_klvl_type = new Spr_oe_klvl_type($params['id']);
			$spr_oe_klvl_type->setName($params['name']);
			$spr_oe_klvl_type->setName_short($params['sokr_name']);
            $spr_oe_klvl_type->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_oe_klvl_type')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}