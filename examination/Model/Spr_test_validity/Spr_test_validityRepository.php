<?php

namespace Examination\Model\Spr_test_validity;

use Engine\Model;

class spr_test_validityRepository extends Model
{

    public function getSpr_test_validity()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_validity')
            ->orderBy('spr_test_validity.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_test_vidData($id)
    {
        $spr_test_validity = new spr_test_validity($id);

        return $spr_test_validity->findOne();
    }


    public function createSpr_test_validity($params)
    {
        $spr_test_validity = new Spr_test_validity;
        
		if(strlen($params['name'])>0){
			$spr_test_validity->setName($params['name']);
		}
		
		$spr_test_validityId = $spr_test_validity->save();

        return $spr_test_validityId;
    }


    public function updateSpr_test_validity($params)
    {
        if (isset($params['id'])) {
            $spr_test_validity = new Spr_test_validity($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_validity->setName($params['name']);
			}
           
		   $spr_test_validity->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_validity')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}