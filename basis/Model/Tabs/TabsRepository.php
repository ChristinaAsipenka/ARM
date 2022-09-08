<?php

namespace Basis\Model\Tabs;

use Engine\Model;

class tabsRepository extends Model
{

    public function getTabs()
    {
        $sql = $this->queryBuilder->select()
            ->from('mkm_teplo_uzel')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getTabsById($id)
    {
	   $sql = $this->queryBuilder->select('mkm_teplo_uzel.id, mkm_teplo_uzel.id_reestr_object, mkm_teplo_uzel.id_uzel_block, mkm_teplo_uzel.info, mkm_teplo_uzel.name_vkladka, reestr_object.id as reestr_object_id, reestr_object.name as reestr_object_name, spr_ot_uzel_block.id as spr_ot_uzel_block_id, spr_ot_uzel_block.name as spr_ot_uzel_block_name, mkm_teplo_uzel.id_systemheat_water, mkm_teplo_uzel.id_systemheat_dependent, mkm_teplo_uzel.id_systemheat_type_op, mkm_teplo_uzel.id_gvs_open, spr_ot_systemheat_water.id as spr_ot_systemheat_water_id, spr_ot_systemheat_water.name as spr_ot_systemheat_water_name, spr_ot_systemheat_dependent.id as spr_ot_systemheat_dependent_id, spr_ot_systemheat_dependent.name as spr_ot_systemheat_dependent_name, spr_ot_type_ot_pribor.id as spr_ot_type_ot_pribor_id, spr_ot_type_ot_pribor.name as spr_ot_type_ot_pribor_name, spr_ot_gvs_open.id as spr_ot_gvs_open_id, spr_ot_gvs_open.name as spr_ot_gvs_open_name')
            ->from('mkm_teplo_uzel')
			->joinLeftTable('reestr_object', 'reestr_object.id = mkm_teplo_uzel.id_reestr_object')
			->joinLeftTable('spr_ot_uzel_block', 'spr_ot_uzel_block.id = mkm_teplo_uzel.id_uzel_block')
			->joinLeftTable('spr_ot_systemheat_water', 'spr_ot_systemheat_water.id = mkm_teplo_uzel.id_systemheat_water')
			->joinLeftTable('spr_ot_systemheat_dependent', 'spr_ot_systemheat_dependent.id = mkm_teplo_uzel.id_systemheat_dependent')
			->joinLeftTable('spr_ot_type_ot_pribor', 'spr_ot_type_ot_pribor.id = mkm_teplo_uzel.id_systemheat_type_op')
			->joinLeftTable('spr_ot_gvs_open', 'spr_ot_gvs_open.id = mkm_teplo_uzel.id_gvs_open')
            ->where('mkm_teplo_uzel.id_reestr_object', $id)
            ->sql();
			//print_r($sql);
		return $this->db->query($sql, $this->queryBuilder->values);
    }
/// запрос для получения объектов, подключенных к теплоисточнику
	/*public function getMkm_object_t_tiByIdTI($id)
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
    }*/	
	

    public function getTabsData($id)
    {
        $mkm_teplo_uzel = new Tabs($id);

        return $mkm_teplo_uzel->findOne();
    }


  /*  public function createMkm_teplo_uzel($params)
    {
        $mkm_teplo_uzel = new Mkm_teplo_uzel;
        $mkm_teplo_uzel->setName($params['id_reestr_object']);
		$mkm_teplo_uzel = $mkm_teplo_uzel->save();

        return $mkm_teplo_uzelId;
    }*/


    public function updateTabs($params)
    {
print_r($params);
		 if (isset($params['id'])) {
            $mkm_teplo_uzel = new Tabs($params['id']);

			if(isset($params['id_reestr_object'])){
				$mkm_teplo_uzel->setId_reestr_object($params['id_reestr_object']);	
			}
			if(isset($params['id_uzel_block'])){
				$mkm_teplo_uzel->setId_uzel_block($params['id_uzel_block']);	
			}
			if(isset($params['info'])){
				$mkm_teplo_uzel->setInfo($params['info']);	
			}			
			if(isset($params['name_vkladka'])){
				$mkm_teplo_uzel->setName_vkladka($params['name_vkladka']);	
			}
			if(isset($params['id_systemheat_water'])){
				$mkm_teplo_uzel->setId_systemheat_water($params['id_systemheat_water']);	
			}
			if(isset($params['id_systemheat_dependent'])){
				$mkm_teplo_uzel->setId_systemheat_dependent($params['id_systemheat_dependent']);	
			}
			if(isset($params['id_systemheat_type_op'])){
				$mkm_teplo_uzel->setId_systemheat_type_op($params['id_systemheat_type_op']);	
			}
			if(isset($params['id_gvs_open'])){
				$mkm_teplo_uzel->setId_gvs_open($params['id_gvs_open']);	
			}			
			
            $mkm_teplo_uzel->save();
        }
    }



	public function updateTabsInfo($params)
    {
	   if (isset($params['id'])) {
            $mkm_teplo_uzel = new Tabs($params['id']);

			
			if(isset($params['id_reestr_object'])){
				$mkm_teplo_uzel->setId_reestr_object($params['id_reestr_object']);	
			}
			if(isset($params['id_uzel_block'])){
				$mkm_teplo_uzel->setId_uzel_block($params['id_uzel_block']);	
			}
			if(isset($params['info'])){
				$mkm_teplo_uzel->setInfo($params['info']);	
			}	
			if(isset($params['name_vkladka'])){
				$mkm_teplo_uzel->setName_vkladka($params['name_vkladka']);	
			}	
			if(isset($params['id_systemheat_water'])){
				$mkm_teplo_uzel->setId_systemheat_water($params['id_systemheat_water']);	
			}
			if(isset($params['id_systemheat_dependent'])){
				$mkm_teplo_uzel->setId_systemheat_dependent($params['id_systemheat_dependent']);	
			}
			if(isset($params['id_systemheat_type_op'])){
				$mkm_teplo_uzel->setId_systemheat_type_op($params['id_systemheat_type_op']);	
			}
			if(isset($params['id_gvs_open'])){
				$mkm_teplo_uzel->setId_gvs_open($params['id_gvs_open']);	
			}				

			$mkm_teplo_uzelId = $mkm_teplo_uzel->save();

     echo $params['id'];
        }
		
    }


	/*public function getObjectsListOtHeatnet($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.name AS reestr_object_name, mkm_object_t_ti.id_reestr_subject, mkm_object_t_ti.id_reestr_object_t,  mkm_object_t_ti.id_reestr_object_ti, reestr_subject.id, reestr_subject.name, mkm_object_t_ti.id_unp_sbj_ti, mkm_object_t_ti.id_unp_sbj_own')
            ->from('mkm_object_t_ti')
			->joinLeftTable('reestr_object', 'reestr_object.id = mkm_object_t_ti.id_reestr_object_t')
			->where('id_reestr_object_t', $id)
            ->sql();


        return $this->db->query($sql, $this->queryBuilder->values);
    }*/

	/*public function getMkm_object_heatnet_ById($id)
    {
	   $sql = $this->queryBuilder->select('mkm_object_t_ti.id, mkm_object_t_ti.id_reestr_subject, mkm_object_t_ti.id_reestr_object_t, mkm_object_t_ti.id_reestr_object_ti, reestr_object.id, reestr_object.name, reestr_object.ti_name, reestr_subject.name AS reestr_subject_name, reestr_subject.id, mkm_object_t_ti.id_unp_sbj_ti, mkm_object_t_ti.id_unp_sbj_own')
            ->from('mkm_object_t_ti')
			->joinLeftTable('reestr_object', 'reestr_object.id = mkm_object_t_ti.id_reestr_object_ti')
			->joinLeftTable('reestr_subject', 'reestr_subject.id = mkm_object_t_ti.id_reestr_subject')
            ->where('mkm_object_t_ti.id_reestr_object_t', $id)
            ->sql();
		return $this->db->query($sql, $this->queryBuilder->values);
    }*/
//// Создаем новую запись в MKM 	
	public function createTabs($params)
    {
	

        $mkm_teplo_uzel = new Tabs;


	
			if(strlen($params['id_reestr_object'])>0){	
				$mkm_teplo_uzel->setId_reestr_object($params['id_reestr_object']);
			}
			
			/*if(strlen($params['id_uzel_block'])>0){	
				$mkm_teplo_uzel->setId_uzel_block($params['id_uzel_block']);
			}
			if(isset($params['info'])){
				$mkm_teplo_uzel->setInfo($params['info']);	
			}*/
			if(isset($params['name_vkladka'])){
				$mkm_teplo_uzel->setName_vkladka($params['name_vkladka']);	
			}	
			/*if(isset($params['id_systemheat_water'])){
				$mkm_teplo_uzel->setId_systemheat_water($params['id_systemheat_water']);	
			}
			if(isset($params['id_systemheat_dependent'])){
				$mkm_teplo_uzel->setId_systemheat_dependent($params['id_systemheat_dependent']);	
			}
			if(isset($params['id_systemheat_type_op'])){
				$mkm_teplo_uzel->setId_systemheat_type_op($params['id_systemheat_type_op']);	
			}
			if(isset($params['id_gvs_open'])){
				$mkm_teplo_uzel->setId_gvs_open($params['id_gvs_open']);	
			}*/			
			

		$mkm_teplo_uzelId = $mkm_teplo_uzel->save();

      return $mkm_teplo_uzelId;
    }
	
	
	/// Удаляем пункт который не имеет id объекта	
	public function deleteTabs_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('mkm_teplo_uzel')
				->where('id', $id)
				->whereIsNull('id_reestr_object')
				->sql();
		
		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('mkm_teplo_uzel')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('mkm_teplo_uzel')
            ->where('id_reestr_object', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}