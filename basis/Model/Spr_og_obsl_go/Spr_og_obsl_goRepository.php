<?php

namespace Basis\Model\Spr_og_obsl_go;

use Engine\Model;

class spr_og_obsl_goRepository extends Model
{

    public function getSpr_og_obsl_go()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_og_obsl_go')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_og_obsl_goData($id)
    {
        $spr_og_obsl_go = new Spr_og_obsl_go($id);

        return $spr_og_obsl_go->findOne();
    }


    public function createSpr_og_obsl_go($params)
    {
        $spr_og_obsl_go = new Spr_og_obsl_go;
        $spr_og_obsl_go->setName($params['name']);
		$spr_og_obsl_goId = $spr_og_obsl_go->save();

        return $spr_og_obsl_goId;
    }


    public function updateSpr_og_obsl_go($params)
    {
        if (isset($params['id'])) {
            $spr_og_obsl_go = new Spr_og_obsl_go($params['id']);
			$spr_og_obsl_go->setName($params['name']);
            $spr_og_obsl_go->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_og_obsl_go')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	
}