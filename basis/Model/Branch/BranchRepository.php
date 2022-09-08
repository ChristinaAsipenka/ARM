<?php

namespace Basis\Model\Branch;

use Engine\Model;

class BranchRepository extends Model
{

    public function getBranch()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_branch')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getBranchData($id)
    {
        $branch = new Branch($id);

        return $branch->findOne();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createBranch($params)
    {
        $branch = new Branch;
        $branch->setName($params['name']);
		$branch->setAdress($params['branch_adress']);
		$branch->setPhone_cod($params['branch_phone_cod']);
		$branch->setPhone($params['branch_phone']);
		$branch->setFax($params['branch_fax']);
		$branch->setEmail($params['branch_email']);
		$branch->setSokr_name($params['branch_sokr_name']);

		$branchId = $branch->save();

        return $branchId;
    }


    public function updateBranch($params)
    {
        if (isset($params['id'])) {
            $branch = new Branch($params['id']);
			$branch->setName($params['name']);
			$branch->setAdress($params['branch_adress']);
			$branch->setPhone_cod($params['branch_phone_cod']);
			$branch->setPhone($params['branch_phone']);
			$branch->setFax($params['branch_fax']);
			$branch->setEmail($params['branch_email']);
			$branch->setSokr_name($params['branch_sokr_name']);
            $branch->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_branch')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
}