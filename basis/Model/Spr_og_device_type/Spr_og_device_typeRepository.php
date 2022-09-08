<?php

namespace Basis\Model\Spr_og_device_type;

use Engine\Model;

class spr_og_device_typeRepository extends Model
{

    public function getSpr_og_device_type()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_device_type')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_og_device_typeData($id)
    {
        $spr_og_device_type = new Spr_og_device_type($id);

        return $spr_og_device_type->findOne();
    }


    public function createSpr_og_device_type($params)
    {
        $spr_og_device_type = new Spr_og_device_type;
        $spr_og_device_type->setName($params['name']);
		$spr_og_device_typeId = $spr_og_device_type->save();

        return $spr_og_device_typeId;
    }


    public function updateSpr_og_device_type($params)
    {
        if (isset($params['id'])) {
            $spr_og_device_type = new Spr_og_device_type($params['id']);
			$spr_og_device_type->setName($params['name']);
            $spr_og_device_type->save();
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