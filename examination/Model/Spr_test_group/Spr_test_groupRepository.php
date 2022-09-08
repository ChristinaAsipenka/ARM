<?php

namespace Examination\Model\Spr_test_group;

use Engine\Model;

class spr_test_groupRepository extends Model
{

    public function getSpr_test_group()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_group')
            ->orderBy('spr_test_group.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_test_groupData($id)
    {
        $spr_test_group = new Spr_test_group($id);

        return $spr_test_group->findOne();
    }


    public function createSpr_test_group($params)
    {
        $spr_test_group = new Spr_test_group;
        
		if(strlen($params['name'])>0){
			$spr_test_group->setName($params['name']);
		}
		
		$spr_test_groupId = $spr_test_group->save();

        return $spr_test_groupId;
    }


    public function updateSpr_test_group($params)
    {
        if (isset($params['id'])) {
            $spr_test_group = new Spr_test_group($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_group->setName($params['name']);
			}
           
		   $spr_test_group->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_group')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}