<?php

namespace Basis\Model\Podrazdelenie;

use Engine\Model;

class podrazdelenieRepository extends Model
{

    public function getPodrazdelenieList()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_podrazdelenie')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

	public function getPodrazdelenieByRegion($idRegion)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_podrazdelenie')
			->where('cod_branch',$idRegion)
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
		
    }
	
    public function getPodrazdelenieData($id)
    {
        $podrazdelenie = new Podrazdelenie($id);

        return $podrazdelenie->findOne();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createPodrazdelenie($params)
    {
        $podrazdelenie = new Podrazdelenie;
        $podrazdelenie->setName_podrazd($params['podrazdelenie_name']);
        $podrazdelenie->setAdress($params['podrazdelenie_adress']);
		$podrazdelenie->setPhone_cod($params['podrazdelenie_phone_cod']);
		$podrazdelenie->setPhone($params['podrazdelenie_phone']);
		$podrazdelenie->setFax($params['podrazdelenie_fax']);
		$podrazdelenie->setEmail($params['podrazdelenie_email']);
		$podrazdelenie->setSokr_name($params['podrazdelenie_sokr_name']);
		$podrazdelenie->setCod_branch($params['id_spr_branch']);
		$podrazdelenieId = $podrazdelenie->save();

        return $podrazdelenieId;
    }


    public function updatePodrazdelenie($params)
    {
        if (isset($params['id'])) {
            $podrazdelenie = new Podrazdelenie($params['id']);
			$podrazdelenie->setName_podrazd($params['podrazdelenie_name']);
			$podrazdelenie->setAdress($params['podrazdelenie_adress']);
			$podrazdelenie->setPhone_cod($params['podrazdelenie_phone_cod']);
			$podrazdelenie->setPhone($params['podrazdelenie_phone']);
			$podrazdelenie->setFax($params['podrazdelenie_fax']);
			$podrazdelenie->setEmail($params['podrazdelenie_email']);
			$podrazdelenie->setSokr_name($params['podrazdelenie_sokr_name']);
			$podrazdelenie->setCod_branch($params['id_spr_branch']);
            $podrazdelenie->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_podrazdelenie')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	





    public function getPodrazdelenieListGuides()
    {
        $sql = $this->queryBuilder->select('spr_podrazdelenie.id, spr_podrazdelenie.name_podrazd, spr_podrazdelenie.cod_branch, spr_podrazdelenie.adress, spr_podrazdelenie.phone_cod, spr_podrazdelenie.phone, spr_podrazdelenie.fax, spr_podrazdelenie.sokr_name, spr_podrazdelenie.email, spr_branch.id AS spr_branch_id, spr_branch.name AS spr_branch_name')
            ->from('spr_podrazdelenie')
			->joinLeftTable('spr_branch', 'spr_branch.id = spr_podrazdelenie.cod_branch')
			->sql();
        return $this->db->query($sql, $this->queryBuilder->values);	
		
    }




	
}