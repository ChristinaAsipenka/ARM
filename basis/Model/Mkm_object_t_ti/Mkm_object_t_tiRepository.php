<?php

namespace Basis\Model\Mkm_object_t_ti;

use Engine\Model;

class mkm_object_t_tiRepository extends Model
{

    public function getMkm_object_t_ti()
    {
        $sql = $this->queryBuilder->select()
            ->from('mkm_object_t_ti')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getMkm_object_t_tiById($id)
    {
	   $sql = $this->queryBuilder->select('mkm_object_t_ti.id, mkm_object_t_ti.id_reestr_subject, mkm_object_t_ti.id_reestr_object_t, mkm_object_t_ti.id_reestr_object_ti, reestr_object.id as reestr_object_id, reestr_object.name, reestr_object.ti_name, reestr_subject.name AS reestr_subject_name, reestr_subject.id as reestr_subject_id, mkm_object_t_ti.id_unp_sbj_ti, mkm_object_t_ti.id_unp_sbj_own')
            ->from('mkm_object_t_ti')
			->joinLeftTable('reestr_object', 'reestr_object.id = mkm_object_t_ti.id_reestr_object_ti')
			->joinLeftTable('reestr_subject', 'reestr_subject.id = mkm_object_t_ti.id_reestr_subject')
            ->where('mkm_object_t_ti.id_reestr_object_t', $id)
            ->sql();
			//print_r($sql);
		return $this->db->query($sql, $this->queryBuilder->values);
    }
/// запрос для получения объектов, подключенных к теплоисточнику
	public function getMkm_object_t_tiByIdTI($id)
    {
	   $sql = $this->queryBuilder->select('mkm_object_t_ti.id, mkm_object_t_ti.id_reestr_subject, mkm_object_t_ti.id_reestr_object_t, mkm_object_t_ti.id_reestr_object_ti, reestr_object.id as reestr_object_id, reestr_object.name, reestr_object.ti_name, reestr_subject.name AS reestr_subject_name, reestr_subject.id as reestr_subject_id, mkm_object_t_ti.id_unp_sbj_ti, mkm_object_t_ti.id_unp_sbj_own')
            ->from('mkm_object_t_ti')
			//->joinLeftTable('reestr_object', 'reestr_object.id = mkm_object_t_ti.id_reestr_object_ti')
			->joinLeftTable('reestr_object', 'reestr_object.id = mkm_object_t_ti.id_reestr_object_t')
			->joinLeftTable('reestr_subject', 'reestr_subject.id = reestr_object.id_reestr_subject')
            ->where('mkm_object_t_ti.id_reestr_object_ti', $id)
            ->sql();
			//print_r($sql);
		return $this->db->query($sql, $this->queryBuilder->values);
    }	
	

    public function getMkm_object_t_tiData($id)
    {
        $mkm_object_t_ti = new Mkm_object_t_ti($id);

        return $mkm_object_t_ti->findOne();
    }


    public function createMkm_object_t_ti($params)
    {
        $mkm_object_t_ti = new Mkm_object_t_ti;
        $mkm_object_t_ti->setName($params['id_reestr_object_t']);
		$mkm_object_t_ti = $mkm_object_t_ti->save();

        return $mkm_object_t_tiId;
    }


    public function updateMkm_object_t_ti($params)
    {

		if (isset($params['obj_ot_heat_source_id'])) {
            $mkm_object_t_ti = new Mkm_object_t_ti($params['obj_ot_heat_source_id']);

			if(isset($params['id_reestr_object_t'])){
				$mkm_object_t_ti->setId_reestr_object_t($params['id_reestr_object_t']);	
			}
			if(isset($params['id_reestr_object'])){
				$mkm_object_t_ti->setId_reestr_object_t($params['id_reestr_object']);	
			}
			

            $mkm_object_t_ti->save();
        }
    }



	public function updateMkm_object_t_tiInfo($params)
    {
      print_r($params);
	   if (isset($params['id'])) {
            $mkm_object_t_ti = new Mkm_object_t_ti($params['id']);

			
			if(strlen($params['id_reestr_object_t'])>0){	
				$mkm_object_t_ti->setId_reestr_object_t($params['id_reestr_object_t']);		
			}	
			if(strlen($params['id_reestr_object_ti'])>0){	
				$mkm_object_t_ti->setId_reestr_object_ti($params['id_reestr_object_ti']);
			}
	
			

			$mkm_object_t_tiId = $mkm_object_t_ti->save();

     echo $params['id'];
        }
		
    }


	public function getObjectsListOtHeatnet($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.name AS reestr_object_name, mkm_object_t_ti.id_reestr_subject, mkm_object_t_ti.id_reestr_object_t,  mkm_object_t_ti.id_reestr_object_ti, reestr_subject.id, reestr_subject.name, mkm_object_t_ti.id_unp_sbj_ti, mkm_object_t_ti.id_unp_sbj_own')
            ->from('mkm_object_t_ti')
			->joinLeftTable('reestr_object', 'reestr_object.id = mkm_object_t_ti.id_reestr_object_t')
			->where('id_reestr_object_t', $id)
            ->sql();


        return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function getMkm_object_heatnet_ById($id)
    {
	   $sql = $this->queryBuilder->select('mkm_object_t_ti.id, mkm_object_t_ti.id_reestr_subject, mkm_object_t_ti.id_reestr_object_t, mkm_object_t_ti.id_reestr_object_ti, reestr_object.id, reestr_object.name, reestr_object.ti_name, reestr_subject.name AS reestr_subject_name, reestr_subject.id, mkm_object_t_ti.id_unp_sbj_ti, mkm_object_t_ti.id_unp_sbj_own')
            ->from('mkm_object_t_ti')
			->joinLeftTable('reestr_object', 'reestr_object.id = mkm_object_t_ti.id_reestr_object_ti')
			->joinLeftTable('reestr_subject', 'reestr_subject.id = mkm_object_t_ti.id_reestr_subject')
            ->where('mkm_object_t_ti.id_reestr_object_t', $id)
            ->sql();
//print_r($sql);
		return $this->db->query($sql, $this->queryBuilder->values);
    }
//// Создаем новую запись в MKM 	
	public function createOt_mkm_object_t_ti($params)
    {
	

        $mkm_object_t_ti = new Mkm_object_t_ti;


	
			if(strlen($params['id_reestr_object_ti'])>0){	
				$mkm_object_t_ti->setId_reestr_object_ti($params['id_reestr_object_ti']);
			}
			
			if(strlen($params['id_reestr_object_t'])>0){	
				$mkm_object_t_ti->setId_reestr_object_t($params['id_reestr_object_t']);
			}
			
			if(strlen($params['id_reestr_subject'])>0){	
				$mkm_object_t_ti->setId_reestr_subject($params['id_reestr_subject']);
			}
		// записываем УНП собственного потребителя	
			if(strlen($params['id_unp_sbj_own'])>0){	
				$mkm_object_t_ti->setId_unp_sbj_own($params['id_unp_sbj_own']);
			}
		// записываем УНП теплоисточника	
			if(strlen($params['id_unp_sbj_ti'])>0){	
				$mkm_object_t_ti->setId_unp_sbj_ti($params['id_unp_sbj_ti']);
			}
			

		$mkm_object_t_tiId = $mkm_object_t_ti->save();

      return $mkm_object_t_tiId;
    }
	
	
	/// Удаляем пункт который не имеет id объекта	
	public function deleteMkm_object_t_ti_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('mkm_object_t_ti')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
		
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('mkm_object_t_ti')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('mkm_object_t_ti')
            ->where('id_reestr_object_t', $itemId)
			->orWhere('id_reestr_object_ti', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}