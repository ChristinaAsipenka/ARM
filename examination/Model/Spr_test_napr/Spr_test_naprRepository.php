<?php

namespace Examination\Model\Spr_test_napr;

use Engine\Model;

class spr_test_naprRepository extends Model
{

    public function getSpr_test_napr()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_napr')
            ->orderBy('spr_test_napr.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_test_naprData($id)
    {
        $spr_test_napr = new Spr_test_napr($id);

        return $spr_test_napr->findOne();
    }


    public function createSpr_test_napr($params)
    {
        $spr_test_napr = new Spr_test_napr;
        
		if(strlen($params['name'])>0){
			$spr_test_napr->setName($params['name']);
		}
		
		$spr_test_naprId = $spr_test_napr->save();

        return $spr_test_naprId;
    }


    public function updateSpr_test_napr($params)
    {
        if (isset($params['id'])) {
            $spr_test_napr = new Spr_test_napr($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_napr->setName($params['name']);
			}
           
		   $spr_test_napr->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_napr')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}