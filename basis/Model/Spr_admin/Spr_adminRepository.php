<?php

namespace Basis\Model\Spr_admin;

use Engine\Model;

class spr_adminRepository extends Model
{

    public function getSpr_admin()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_admin')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_adminData($id)
    {
        $spr_admin = new Spr_admin($id);

        return $spr_admin->findOne();
    }


    public function createSpr_admin($params)
    {
        $spr_admin = new Spr_admin;
        $spr_admin->setName($params['name']);
		$spr_admin->setId_spr_region($params['idSprRegion']);
		$spr_adminId = $spr_admin->save();

        return $spr_adminId;
    }


    public function createSpr_adminByCity($params)
    {
    

    $spr_admin = new Spr_admin;
        $spr_admin->setName($params['name']);
		$spr_admin->setId_spr_region($params['id_spr_region']);
		$spr_adminId = $spr_admin->save();

        return $spr_adminId;
    }
	
    public function createSpr_adminByDistrict($params)
    {
        $spr_admin = new Spr_admin;
        $spr_admin->setName($params['name']);
		$spr_admin->setId_spr_region($params['idSprRegion']);
		$spr_adminId = $spr_admin->save();

        return $spr_adminId;
    }
	
	
    public function updateSpr_admin($params)
    {
        if (isset($params['id'])) {
            $spr_admin = new Spr_admin($params['id']);
			$spr_admin->setName($params['name']);
			$spr_admin->setId_spr_region($params['idSprRegion']);
            $spr_admin->save();
        }
    }
	
	public function getSpr_adminGuides()
    {
        $sql = $this->queryBuilder->select('spr_admin.id, spr_admin.name, spr_admin.id_spr_region, spr_region.id AS spr_region_id, spr_region.name AS spr_region_name')
            ->from('spr_admin')
			->joinLeftTable('spr_region', 'spr_region.id = spr_admin.id_spr_region')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);	
		
    }



    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_admin')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}













}