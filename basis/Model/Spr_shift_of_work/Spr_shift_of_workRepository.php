<?php

namespace Basis\Model\Spr_shift_of_work;

use Engine\Model;

class spr_shift_of_workRepository extends Model
{

    public function getSpr_shift_of_work()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_shift_of_work')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_shift_of_workData($id)
    {
        $spr_shift_of_work = new Spr_shift_of_work($id);

        return $spr_shift_of_work->findOne();
    }


    public function createSpr_shift_of_work($params)
    {
        $spr_shift_of_work = new Spr_shift_of_work;
        $spr_shift_of_work->setName($params['name']);
		$spr_shift_of_workId = $spr_shift_of_work->save();

        return $spr_shift_of_workId;
    }


    public function updateSpr_shift_of_work($params)
    {
        if (isset($params['id'])) {
            $spr_shift_of_work = new Spr_shift_of_work($params['id']);
			$spr_shift_of_work->setName($params['name']);
            $spr_shift_of_work->save();
        }
    }
	
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_shift_of_work')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}