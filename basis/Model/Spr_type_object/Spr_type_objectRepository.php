<?php

namespace Basis\Model\Spr_type_object;

use Engine\Model;

class spr_type_objectRepository extends Model
{

    public function getSpr_type_object()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_type_object')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_type_objectData($id)
    {
        $spr_type_object = new Spr_type_object($id);

        return $spr_type_object->findOne();
    }


    public function createSpr_type_object($params)
    {
        $spr_type_object = new Spr_type_object;
        $spr_type_object->setName($params['name']);
		$spr_type_objectId = $spr_type_object->save();

        return $spr_type_objectId;
    }


    public function updateSpr_type_object($params)
    {
        if (isset($params['id'])) {
            $spr_type_object = new Spr_type_object($params['id']);
			$spr_type_object->setName($params['name']);
            $spr_type_object->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_type_object')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}