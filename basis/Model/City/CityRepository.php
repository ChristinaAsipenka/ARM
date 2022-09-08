<?php

namespace Basis\Model\City;

use Engine\Model;

class cityRepository extends Model
{

    public function getCityList()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_city')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

	public function getCityByDistrict($idDistrict)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_city')
			->where('id_spr_district',$idDistrict)
            ->orderBy('name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
		
    }
	
    public function getCityData($id)
    {
        $city = new City($id);

        return $city->findOne();
    }
	
	public function getCityDataByName($name)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_city')
			->where('name',$name, 'LIKE')
            ->limit(1)
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    /**
     * @param $params
     * @return mixed
     */
   /* public function createCity($params)
    {
        $city = new City;
        $city->setName($params['name']);
        $city->setIdSprDistrict($params['id_spr_district']);
		
			if(strlen($params['key_district'])>0){
				$city->setKeyDistrict($params['key_district']);
			}
			if(strlen($params['key_region'])>0){
				$city->setKeyRegion($params['key_region']);
			}		
			if(strlen($params['key_admin'])>0){
				$city->setKeyAdmin($params['key_admin']);
			}		

		$city = $city->save();

        return $regionId;
    }*/
    public function createCityGuides($params)
    {
        $city = new City;
	
			if(strlen($params['name'])>0){
				$city->setName($params['name']);
			}
			if(strlen($params['id_spr_district'])>0){
				$city->setIdSprDistrict($params['id_spr_district']);
			}			
			/*if(strlen($params['key_district'])>0){
				$city->setKeyDistrict($params['key_district']);
			}
			if(strlen($params['key_region'])>0){
				$city->setKeyRegion($params['key_region']);
			}		
			if(strlen($params['key_admin'])>0){
				$city->setKeyAdmin($params['key_admin']);
			}*/		

		$cityId = $city->save();

        return $cityId;
    }

    public function updateCity($params)
    {
        if (isset($params['id'])) {
			
			print_r($params);
			
            $city = new City($params['id']);
			$city->setName($params['name']);
			$city->setIdSprDistrict($params['id_spr_district']);
				/*if(strlen($params['key_district'])>0){
					$city->setKeyDistrict($params['key_district']);
				}
				if(strlen($params['key_region'])>0){
					$city->setKeyRegion($params['key_region']);
				}		
				if(strlen($params['key_admin'])>0){
					$city->setKeyAdmin($params['key_admin']);
				}*/
            $city->save();
        }
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_city')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}


    public function getCityListGuides()
    {
        $sql = $this->queryBuilder->select('spr_city.id, spr_city.name, spr_city.id_spr_district, spr_city.key_region, spr_city.key_district, spr_city.key_admin, spr_district.id AS spr_district_id, spr_district.name AS spr_district_name, spr_district.id_spr_region AS spr_district_id_spr_region, spr_region.id AS spr_region_id, spr_region.name AS spr_region_name')
            ->from('spr_city')
			->joinLeftTable('spr_district', 'spr_district.id = spr_city.id_spr_district')
            ->joinLeftTable('spr_region', 'spr_region.id = spr_district.id_spr_region')
			->sql();
        return $this->db->query($sql, $this->queryBuilder->values);	
		
    }


	
	
}