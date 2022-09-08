<?php

namespace Basis\Model\Spr_og_vid;

use Engine\Model;

class spr_og_vidRepository extends Model
{

    public function getSpr_og_vid()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_device_type')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_og_vidData($id)
    {
        $spr_og_vid = new Spr_og_vid($id);

        return $spr_og_vid->findOne();
    }


    public function createSpr_og_vid($params)
    {
        $spr_og_vid = new Spr_og_vid;
        $spr_og_vid->setName($params['name']);
		$spr_og_vid = $spr_og_vid->save();

        return $spr_og_vidId;
    }


    public function updateSpr_og_vid($params)
    {
        if (isset($params['id'])) {
            $spr_og_vid = new Spr_og_vid($params['id']);
			$spr_og_vid->setName($params['name']);
            $spr_og_vid->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_og_device_type')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}