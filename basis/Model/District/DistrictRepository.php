<?php

namespace Basis\Model\District;

use Engine\Model;

class DistrictRepository extends Model
{

    public function getDistrictList()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_district')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }



    public function getDistrictListGuides()
    {
        $sql = $this->queryBuilder->select('spr_district.id, spr_district.name, spr_district.id_spr_region, spr_region.id AS spr_region_id, spr_region.name AS spr_region_name')
            ->from('spr_district')
			->joinLeftTable('spr_region', 'spr_region.id = spr_district.id_spr_region')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);	
		
    }

	public function getDistrictByRegion($idRegion)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_district')
			->where('id_spr_region',$idRegion)
            ->orderBy('name', 'ASC')
            ->sql();


        return $this->db->query($sql, $this->queryBuilder->values);
		
    }
	
    public function getDistrictData($id)
    {
        $district = new District($id);

        return $district->findOne();
    }
	
	public function getDistrictDataByName($name)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_district')
			->where('name',$name, 'LIKE')
            ->limit(1)
            ->sql();


        return $this->db->query($sql, $this->queryBuilder->values);
    }



    public function createSpr_districtByCity($params)
    {
    
		$district = new District;
        $district->setName($params['name']);
		$district->setIdSprRegion($params['id_spr_region']);
		$districtId = $district->save();

        return $districtId;
    }



    /**
     * @param $params
     * @return mixed
     */
    public function createDistrict($params)
    {
        $district = new District;
        $district->setName($params['name']);
        $district->setIdSprRegion($params['idSprRegion']);
		$districtId = $district->save();

        return $districtId;
    }


    public function updateDistrict($params)
    {
        if (isset($params['id'])) {
            $district = new District($params['id']);
			$district->setName($params['name']);
			$district->setIdSprRegion($params['idSprRegion']);
            $district->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_district')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}