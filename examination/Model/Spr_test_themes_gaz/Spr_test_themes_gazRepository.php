<?php

namespace Examination\Model\Spr_test_themes_gaz;

use Engine\Model;

class spr_test_themes_gazRepository extends Model
{

    public function getSpr_test_themes_gaz()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_themes_gaz')
            ->orderBy('spr_test_themes_gaz.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


	
    public function getSpr_test_themes_gazData($id)
    {
        $spr_test_themes_gaz = new Spr_test_themes_gaz($id);

        return $spr_test_themes_gaz->findOne();
    }


    public function createSpr_test_themes_gaz($params)
    {
        $spr_test_themes_gaz = new Spr_test_themes_gaz;
        
		if(strlen($params['name'])>0){
			$spr_test_themes_gaz->setName($params['name']);
		}		
		$spr_test_themes_gazId = $spr_test_themes_gaz->save();

        return $spr_test_themes_gazId;
    }


    public function updateSpr_test_themes_gaz($params)
    {
        if (isset($params['id'])) {
            $spr_test_themes_gaz = new Spr_test_themes_gaz($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_themes_gaz->setName($params['name']);
			}         
		   $spr_test_themes_gaz->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_themes_gaz')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}