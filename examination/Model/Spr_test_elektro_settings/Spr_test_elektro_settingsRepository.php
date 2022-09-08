<?php

namespace Examination\Model\Spr_test_elektro_settings;

use Engine\Model;

class spr_test_elektro_settingsRepository extends Model
{

    public function getSpr_test_elektro_settings()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_elektro_settings')
            ->orderBy('spr_test_elektro_settings.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


	
    public function getSpr_test_elektro_settingsData($id)
    {
        $spr_test_elektro_settings = new Spr_test_elektro_settings($id);

        return $spr_test_elektro_settings->findOne();
    }
	
	
	/*public function getSpr_test_elektro_settings_by_group($id)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_elektro_settings')
			->where('id', $itemId)
            ->orderBy('spr_test_elektro_settings.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }*/


    public function createSpr_test_elektro_settings($params)
    {
        $spr_test_elektro_settings = new Spr_test_elektro_settings;
        
		if(strlen($params['name'])>0){
			$spr_test_elektro_settings->setName($params['name']);
		}	

		if(strlen($params['name'])>0){
			$spr_test_elektro_settings->setName($params['name']);
		}


		
		$spr_test_elektro_settingsId = $spr_test_elektro_settings->save();

        return $spr_test_elektro_settingsId;
    }


    public function updateSpr_test_elektro_settings($params)
    {
        if (isset($params['id'])) {
            $spr_test_elektro_settings = new Spr_test_elektro_settings($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_elektro_settings->setName($params['name']);
			} 

			if(strlen($params['group2'])>0){
				$spr_test_elektro_settings->setGroup2($params['group2']);
			} 
			if(strlen($params['group3'])>0){
				$spr_test_elektro_settings->setGroup3($params['group3']);
			}
			if(strlen($params['group4'])>0){
				$spr_test_elektro_settings->setGroup4($params['group4']);
			}
			if(strlen($params['group5'])>0){
				$spr_test_elektro_settings->setGroup5($params['group5']);
			}








			
		   $spr_test_elektro_settings->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_elektro_settings')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}