<?php

namespace Examination\Model\Spr_test_reasons_teplo;

use Engine\Model;

class spr_test_reasons_teploRepository extends Model
{

    public function getSpr_test_reasons_teplo()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_reasons_teplo')
            ->orderBy('spr_test_reasons_teplo.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_test_vidData($id)
    {
        $spr_test_reasons_teplo = new spr_test_reasons_teplo_elektro($id);

        return $spr_test_reasons_teplo->findOne();
    }


    public function createSpr_test_reasons($params)
    {
        $spr_test_reasons_teplo = new Spr_test_reasons;
        
		if(strlen($params['name'])>0){
			$spr_test_reasons_teplo->setName($params['name']);
		}
		
		$spr_test_reasons_teploId = $spr_test_reasons_teplo->save();

        return $spr_test_reasons_teploId;
    }


    public function updateSpr_test_reasons($params)
    {
        if (isset($params['id'])) {
            $spr_test_reasons_teplo = new Spr_test_reasons($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_reasons_teplo->setName($params['name']);
			}
           
		   $spr_test_reasons_teplo->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_reasons_teplo')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}