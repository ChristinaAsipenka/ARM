<?php

namespace Basis\Model\CityZone;

use Engine\Model;

class CityZoneRepository extends Model
{

    public function getCityZoneList()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_city_zone')
            ->orderBy('spr_city_zone.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

	public function getCityZoneByCity($idCity)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_city_zone')
			->where('id_spr_city',$idCity)
            ->orderBy('spr_city_zone.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
		
    }
	
    public function getCityZoneData($id)
    {
        $cityZone = new CityZone($id);

        return $cityZone->findOne();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createCityZone($params)
    {
        $cityZone = new CityZone;
        $cityZone->setName($params['name']);
        $cityZone->setIdSprCity($params['id_spr_city']);
		$cityZoneId = $cityZone->save();

        return $cityZoneId;
    }


    public function updateCityZone($params)
    {
        if (isset($params['id'])) {
            $cityZone = new CityZone($params['id']);
			$cityZone->setName($params['name']);
			$cityZone->setIdSprCity($params['id_spr_city']);
            $cityZone->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_city_zone')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	

    public function getCityZoneListGuides()
    {
        $sql = $this->queryBuilder->select('spr_city_zone.id, spr_city_zone.name, spr_city_zone.id_spr_city, spr_region.id AS spr_region_id, spr_region.name AS spr_region_name, spr_district.id AS spr_district_id, spr_district.name AS spr_district_name, spr_district.id_spr_region AS spr_district_id_spr_region,spr_city.id AS spr_city_id, spr_city.name AS spr_city_name, spr_city.id_spr_district AS spr_city_id_spr_district')
            ->from('spr_city_zone')
			->joinLeftTable('spr_city', 'spr_city.id = spr_city_zone.id_spr_city')
            ->joinLeftTable('spr_district', 'spr_district.id = spr_city.id_spr_district')
			->joinLeftTable('spr_region', 'spr_region.id = spr_district.id_spr_region')
			->sql();
        return $this->db->query($sql, $this->queryBuilder->values);	
		
    }
	
	
}