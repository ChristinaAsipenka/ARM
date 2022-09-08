<?php

namespace Basis\Model\Otdel;

use Engine\Model;

class otdelRepository extends Model
{

    public function getOtdelList()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_otdel')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

	public function getOtdelByPodrazdelenie($idRegion)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_otdel')
			->where('cod_podch',$idRegion)
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
		
    }
	
    public function getOtdelData($id)
    {
        $otdel = new Otdel($id);

        return $otdel->findOne();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createOtdel($params)
    {
		
		$otdel = new Otdel;
		
        $otdel->setName_otdel($params['otdel_name']);
        $otdel->setAdress($params['otdel_adress']);
		$otdel->setPhone_cod($params['otdel_phone_cod']);
		$otdel->setPhone($params['otdel_phone']);
		$otdel->setFax($params['otdel_fax']);
		$otdel->setEmail($params['otdel_email']);
		$otdel->setSokr_name($params['otdel_sokr_name']);
		$otdel->setCod_branch($params['id_spr_branch']);
		$otdel->setCod_podch($params['id_spr_podrazd']);
		
		$otdelId = $otdel->save();
        return $otdelId;
		
    }


    public function updateOtdel($params)
    {
        if (isset($params['id'])) {
            $otdel = new Otdel($params['id']);
			$otdel->setName_otdel($params['otdel_name']);
			$otdel->setAdress($params['otdel_adress']);
			$otdel->setPhone_cod($params['otdel_phone_cod']);
			$otdel->setPhone($params['otdel_phone']);
			$otdel->setFax($params['otdel_fax']);
			$otdel->setEmail($params['otdel_email']);
			$otdel->setSokr_name($params['otdel_sokr_name']);
			$otdel->setCod_branch($params['id_spr_branch']);
			$otdel->setCod_podch($params['id_spr_podrazd']);
            $otdel->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_otdel')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	

    public function getOtdelListGuides()
    {
        $sql = $this->queryBuilder->select('spr_otdel.id, spr_otdel.name_otdel, spr_otdel.cod_branch, spr_otdel.cod_podch, spr_otdel.adress, spr_otdel.phone_cod, spr_otdel.phone, spr_otdel.fax, spr_otdel.sokr_name, spr_otdel.email, spr_branch.id AS spr_branch_id, spr_branch.name AS spr_branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.name_podrazd AS spr_podrazdelenie_name_podrazd')
            ->from('spr_otdel')
			->joinLeftTable('spr_branch', 'spr_branch.id = spr_otdel.cod_branch')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = spr_otdel.cod_podch')
			->sql();
        return $this->db->query($sql, $this->queryBuilder->values);	
		
    }



	
}