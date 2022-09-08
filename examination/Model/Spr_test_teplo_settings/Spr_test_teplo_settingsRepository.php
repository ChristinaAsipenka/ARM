<?php

namespace Examination\Model\Spr_test_teplo_settings;

use Engine\Model;

class spr_test_teplo_settingsRepository extends Model
{

    public function getSpr_test_teplo_settings()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_teplo_settings')
            ->orderBy('spr_test_teplo_settings.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


	
    public function getSpr_test_teplo_settingsData($id)
    {
        $spr_test_teplo_settings = new Spr_test_teplo_settings($id);

        return $spr_test_teplo_settings->findOne();
    }


    public function createSpr_test_teplo_settings($params)
    {
        $spr_test_teplo_settings = new Spr_test_teplo_settings;
        
		if(strlen($params['name'])>0){
			$spr_test_teplo_settings->setName($params['name']);
		}	

		
		$spr_test_teplo_settingsId = $spr_test_teplo_settings->save();

        return $spr_test_teplo_settingsId;
    }


    public function updateSpr_test_teplo_settings($params)
    {
        if (isset($params['id'])) {
            $spr_test_teplo_settings = new Spr_test_teplo_settings($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_teplo_settings->setName($params['name']);
			} 
			if(strlen($params['count_g'])>0){
				$spr_test_teplo_settings->setCount_g($params['count_g']);
			} 

			
		   $spr_test_teplo_settings->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_teplo_settings')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}