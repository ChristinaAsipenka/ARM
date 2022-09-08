<?php

namespace Basis\Model\Spr_oe_klvl_volt;

use Engine\Model;

class spr_oe_klvl_voltRepository extends Model
{

    public function getSpr_oe_klvl_volt()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_oe_klvl_volt')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_oe_klvl_voltData($id)
    {
        $spr_oe_klvl_volt = new Spr_oe_klvl_volt($id);

        return $spr_oe_klvl_volt->findOne();
    }


    public function createSpr_oe_klvl_volt($params)
    {
        $spr_oe_klvl_volt = new Spr_oe_klvl_volt;
        $spr_oe_klvl_volt->setName($params['name']);
		$spr_oe_klvl_voltId = $spr_oe_klvl_volt->save();

        return $spr_oe_klvl_voltId;
    }


    public function updateSpr_oe_klvl_volt($params)
    {
        if (isset($params['id'])) {
            $spr_oe_klvl_volt = new Spr_oe_klvl_volt($params['id']);
			$spr_oe_klvl_volt->setName($params['name']);
            $spr_oe_klvl_volt->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_oe_klvl_volt')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}