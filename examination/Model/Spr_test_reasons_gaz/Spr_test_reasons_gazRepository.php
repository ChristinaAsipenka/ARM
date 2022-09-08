<?php

namespace Examination\Model\Spr_test_reasons_gaz;

use Engine\Model;

class spr_test_reasons_gazRepository extends Model
{

    public function getSpr_test_reasons_gaz()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_reasons_gaz')
            ->orderBy('spr_test_reasons_gaz.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_test_vidData($id)
    {
        $spr_test_reasons_gaz = new spr_test_reasons_gaz($id);

        return $spr_test_reasons_gaz->findOne();
    }


    public function createSpr_test_reasons($params)
    {
        $spr_test_reasons_gaz = new Spr_test_reasons;
        
		if(strlen($params['name'])>0){
			$spr_test_reasons_gaz->setName($params['name']);
		}
		
		$spr_test_reasons_gazId = $spr_test_reasons_gaz->save();

        return $spr_test_reasons_gazId;
    }


    public function updateSpr_test_reasons($params)
    {
        if (isset($params['id'])) {
            $spr_test_reasons_gaz = new Spr_test_reasons($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_reasons_gaz->setName($params['name']);
			}
           
		   $spr_test_reasons_gaz->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_reasons_gaz')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}