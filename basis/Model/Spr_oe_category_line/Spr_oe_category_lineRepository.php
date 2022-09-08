<?php

namespace Basis\Model\Spr_oe_category_line;

use Engine\Model;

class spr_oe_category_lineRepository extends Model
{

    public function getSpr_oe_category_line()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_oe_category_line')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_oe_category_lineData($id)
    {
        $spr_oe_category_line = new Spr_oe_category_line($id);

        return $spr_oe_category_line->findOne();
    }


    public function createSpr_oe_category_line($params)
    {
        $spr_oe_category_line = new Spr_oe_category_line;
        $spr_oe_category_line->setName($params['name']);
		$spr_oe_category_lineId = $spr_oe_category_line->save();

        return $spr_oe_category_lineId;
    }


    public function updateSpr_oe_category_line($params)
    {
        if (isset($params['id'])) {
            $spr_oe_category_line = new Spr_oe_category_line($params['id']);
			$spr_oe_category_line->setName($params['name']);
            $spr_oe_category_line->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('Spr_oe_category_line')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}