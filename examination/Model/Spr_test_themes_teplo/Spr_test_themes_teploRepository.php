<?php

namespace Examination\Model\Spr_test_themes_teplo;

use Engine\Model;

class spr_test_themes_teploRepository extends Model
{

    public function getSpr_test_themes_teplo()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_themes_teplo')
            ->orderBy('spr_test_themes_teplo.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


	
    public function getSpr_test_themes_teploData($id)
    {
        $spr_test_themes_teplo = new Spr_test_themes_teplo($id);

        return $spr_test_themes_teplo->findOne();
    }


    public function createSpr_test_themes_teplo($params)
    {
        $spr_test_themes_teplo = new Spr_test_themes_teplo;
        
		if(strlen($params['name'])>0){
			$spr_test_themes_teplo->setName($params['name']);
		}		
		$spr_test_themes_teploId = $spr_test_themes_teplo->save();

        return $spr_test_themes_teploId;
    }


    public function updateSpr_test_themes_teplo($params)
    {
        if (isset($params['id'])) {
            $spr_test_themes_teplo = new Spr_test_themes_teplo($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_themes_teplo->setName($params['name']);
			}         


			if(strlen($params['count_g'])>0){
				$spr_test_themes_teplo->setCount_g($params['count_g']);
			}

		   $spr_test_themes_teplo->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_themes_teplo')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function getSpr_test_themes_teplo_by_group()
    {
  

	   $sql = $this->queryBuilder->select()
            ->from('spr_test_themes_teplo');
			
			
            $sql = $this->queryBuilder->sql();
     //echo $sql;
        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
}