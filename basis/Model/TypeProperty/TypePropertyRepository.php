<?php

namespace Basis\Model\TypeProperty;

use Engine\Model;

class TypePropertyRepository extends Model
{

    public function getTypeProperty()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_type_property')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getTypePropertyData($id)
    {
        $typeProperty = new TypeProperty($id);

        return $typeProperty->findOne();
    }


    public function createTypeProperty($params)
    {
        $typeProperty = new TypeProperty;
        $typeProperty->setName($params['name']);
		$typePropertyId = $typeProperty->save();

        return $typePropertyId;
    }


    public function updateTypeProperty($params)
    {
        if (isset($params['id'])) {
            $typeProperty = new TypeProperty($params['id']);
			$typeProperty->setName($params['name']);
            $typeProperty->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_type_property')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}