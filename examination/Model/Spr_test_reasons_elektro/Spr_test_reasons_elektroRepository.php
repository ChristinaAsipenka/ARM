<?php

namespace Examination\Model\Spr_test_reasons_elektro;

use Engine\Model;

class spr_test_reasons_elektroRepository extends Model
{

    public function getSpr_test_reasons_elektro()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_reasons_elektro')
            ->orderBy('spr_test_reasons_elektro.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_test_vidData($id)
    {
        $spr_test_reasons_elektro = new spr_test_reasons_elektro_elektro($id);

        return $spr_test_reasons_elektro->findOne();
    }


    public function createSpr_test_reasons($params)
    {
        $spr_test_reasons_elektro = new Spr_test_reasons;
        
		if(strlen($params['name'])>0){
			$spr_test_reasons_elektro->setName($params['name']);
		}
		
		$spr_test_reasons_elektroId = $spr_test_reasons_elektro->save();

        return $spr_test_reasons_elektroId;
    }


    public function updateSpr_test_reasons($params)
    {
        if (isset($params['id'])) {
            $spr_test_reasons_elektro = new Spr_test_reasons($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_reasons_elektro->setName($params['name']);
			}
           
		   $spr_test_reasons_elektro->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_reasons_elektro')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}