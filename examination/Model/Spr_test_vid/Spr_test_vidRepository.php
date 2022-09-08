<?php

namespace Examination\Model\Spr_test_vid;

use Engine\Model;

class spr_test_vidRepository extends Model
{

    public function getSpr_test_vid()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_test_vid')
            ->orderBy('spr_test_vid.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_test_vidData($id)
    {
        $spr_test_vid = new Spr_test_vid($id);

        return $spr_test_vid->findOne();
    }


    public function createSpr_test_vid($params)
    {
        $spr_test_vid = new Spr_test_vid;
        
		if(strlen($params['name'])>0){
			$spr_test_vid->setName($params['name']);
		}
		
		$spr_test_vidId = $spr_test_vid->save();

        return $spr_test_vidId;
    }


    public function updateSpr_test_vid($params)
    {
        if (isset($params['id'])) {
            $spr_test_vid = new Spr_test_vid($params['id']);
			
			if(strlen($params['name'])>0){
				$spr_test_vid->setName($params['name']);
			}
           
		   $spr_test_vid->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_test_vid')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}