<?php

namespace Basis\Model\Spr_kind_of_activity;

use Engine\Model;

class spr_kind_of_activityRepository extends Model
{

    public function getSpr_kind_of_activity()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_kind_of_activity')
            ->orderBy('spr_kind_of_activity.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_kind_of_activityData($id)
    {
        $spr_kind_of_activity = new Spr_kind_of_activity($id);

        return $spr_kind_of_activity->findOne();
    }


    public function createSpr_kind_of_activity($params)
    {
        $spr_kind_of_activity = new Spr_kind_of_activity;
        $spr_kind_of_activity->setName($params['name']);
		$spr_kind_of_activityId = $spr_kind_of_activity->save();

        return $spr_kind_of_activityId;
    }


    public function updateSpr_kind_of_activity($params)
    {
        if (isset($params['id'])) {
            $spr_kind_of_activity = new Spr_kind_of_activity($params['id']);
			$spr_kind_of_activity->setName($params['name']);
            $spr_kind_of_activity->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_kind_of_activity')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}