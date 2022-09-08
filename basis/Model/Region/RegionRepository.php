<?php

namespace Basis\Model\Region;

use Engine\Model;

class RegionRepository extends Model
{

    public function getRegion()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_region')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getRegionData($id)
    {
        $region = new Region($id);

        return $region->findOne();
    }
	
	public function getRegionDataByName($name)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_region')
			->where('name',$name, 'LIKE')
            ->limit(1)
            ->sql();

//echo $sql;
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createRegion($params)
    {
        $region = new Region;
        $region->setName($params['name']);
		$regionId = $region->save();

        return $regionId;
    }

    public function createSpr_regionByCity($params)
    {
        $region = new Region;
        $region->setName($params['name']);
		$regionId = $region->save();

        return $regionId;
    }
	
	
    public function updateRegion($params)
    {
        if (isset($params['id'])) {
            $region = new Region($params['id']);
			$region->setName($params['name']);
            $region->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_region')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}