<?php

namespace Examination\Model\Spr_test_themes_elektro;

use Engine\Model;

class spr_test_themes_elektroRepository extends Model
{

    public function getSpr_test_themes_elektro()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_themes_elektro')
          //  ->orderBy('spr_test_themes_elektro.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	
	public function getSpr_test_themes_elektro_by_group($elektro_group)
    {
  

	   $sql = $this->queryBuilder->select()
            ->from('spr_test_themes_elektro');
			
			if($elektro_group == 2){
				$sql = $this->queryBuilder->where('group2',0,'>');
			}elseif($elektro_group == 3){
				$sql = $this->queryBuilder->where('group3',0,'>');
			}elseif($elektro_group == 4){
				$sql = $this->queryBuilder->where('group4',0,'>');
			}elseif($elektro_group == 5){
				$sql = $this->queryBuilder->where('group5',0,'>');
			}
            $sql = $this->queryBuilder->sql();
     //echo $sql;
        return $this->db->query($sql, $this->queryBuilder->values);
    }

/*	public function getSpr_test_themesGuides()
    {
        $sql = $this->queryBuilder->select('spr_test_themes.id, spr_test_themes.name, spr_test_themes.napr, spr_test_napr.id AS spr_test_napr_id, spr_test_napr.name AS spr_test_napr_name')
            ->from('spr_test_themes')
			->joinLeftTable('spr_test_napr', 'spr_test_napr.id = spr_test_themes.napr')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);	
		
    }*/
	
    public function getSpr_test_themes_elektroData($id)
    {
        $spr_test_themes_elektro = new Spr_test_themes_elektro($id);

        return $spr_test_themes_elektro->findOne();
    }


    public function createSpr_test_themes_elektro($params)
    {
        $spr_test_themes_elektro = new Spr_test_themes_elektro;
        
		if(strlen($params['name'])>0){
			$spr_test_themes_elektro->setName($params['name']);
		}	




		
		$spr_test_themes_elektroId = $spr_test_themes_elektro->save();

        return $spr_test_themes_elektroId;
    }


    public function updateSpr_test_themes_elektro($params)
    {
        if (isset($params['id'])) {
            $spr_test_themes_elektro = new Spr_test_themes_elektro($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_themes_elektro->setName($params['name']);
			} 



			if(strlen($params['group2'])>0){
				$spr_test_themes_elektro->setGroup2($params['group2']);
			} 
			if(strlen($params['group3'])>0){
				$spr_test_themes_elektro->setGroup3($params['group3']);
			}
			if(strlen($params['group4'])>0){
				$spr_test_themes_elektro->setGroup4($params['group4']);
			}
			if(strlen($params['group5'])>0){
				$spr_test_themes_elektro->setGroup5($params['group5']);
			}

			
		   $spr_test_themes_elektro->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_themes_elektro')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}