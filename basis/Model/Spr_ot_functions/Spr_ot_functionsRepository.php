<?php

namespace Basis\Model\Spr_ot_functions;

use Engine\Model;

class spr_ot_functionsRepository extends Model
{

    public function getSpr_ot_functions()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_functions')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_functionsData($id)
    {
        $spr_ot_functions = new Spr_ot_functions($id);

        return $spr_ot_functions->findOne();
    }


    public function createSpr_ot_functions($params)
    {
        $spr_ot_functions = new Spr_ot_functions;
        $spr_ot_functions->setName($params['name']);
		$spr_ot_functionsId = $spr_ot_functions->save();

        return $spr_ot_functionsId;
    }


    public function updateSpr_ot_functions($params)
    {
        if (isset($params['id'])) {
            $spr_ot_functions = new Spr_ot_functions($params['id']);
			$spr_ot_functions->setName($params['name']);
            $spr_ot_functions->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_functions')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}