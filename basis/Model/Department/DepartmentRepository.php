<?php

namespace Basis\Model\Department;

use Engine\Model;

class DepartmentRepository extends Model
{

    public function getDepartment()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_department')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

	public function getDepartmentByTypeProperty($idDepartment)
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_department')
			->where('id_pr',$idDepartment)
            ->orderBy('spr_department.name_ved', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
		
    }

    public function getDepartmentData($id)
    {
        $department = new Department($id);

        return $department->findOne();
    }


    public function createDepartment($params)
    {
		
		$department = new Department;
        $department->setName_ved($params['name']);
		$department->setId_pr($params['idSprDepartment']);
		$departmentId = $department->save();

        return $departmentId;
    }


    public function updateDepartment($params)
    {
        if (isset($params['id'])) {
            $department = new Department($params['id']);
			$department->setName_ved($params['name']);
			$department->setId_pr($params['idSprDepartment']);
            $department->save();
        }
    }
	
	
	public function getDepartmentGuides()
    {
        $sql = $this->queryBuilder->select('spr_department.id, spr_department.name_ved, spr_department.id_pr, spr_type_property.id AS spr_type_property_id, spr_type_property.name AS spr_type_property_name')
            ->from('spr_department')
			->joinLeftTable('spr_type_property', 'spr_type_property.id = spr_department.id_pr')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);	
		
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_department')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}