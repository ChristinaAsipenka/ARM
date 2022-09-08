<?php

namespace Basis\Model\Objects;

use Engine\Model;

class ObjectsRepository extends Model
{

    public function getObjects($id)
    {
		//echo 
        $sql = $this->queryBuilder->select()
            ->from('reestr_object')
            ->where('id_reestr_subject', $id)
			->orderBy('reestr_object.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }


	public function getObjectsList($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.name AS reestr_object_name, reestr_object.e_insp AS reestr_object_e_insp, reestr_object.t_insp AS reestr_object_t_insp, reestr_object.ti_insp AS reestr_object_ti_insp, reestr_object.g_insp AS reestr_object_g_insp, reestr_object.id_reestr_subject AS reestr_subject_id_reestr_subject, reestr_object.address_index, reestr_object.address_region, reestr_object.address_district, reestr_object.address_city, reestr_object.address_city_zone, reestr_object.address_street, reestr_object.address_building, reestr_object.address_flat, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, users_t.fio AS users_fio_t, users_ti.fio AS users_fio_ti, users_e.fio AS users_fio_e, users_g.fio AS users_fio_g, reestr_object.t_is, reestr_object.ti_is, reestr_object.gaz_is, reestr_object.is_dom, reestr_object.del_e, reestr_object.del_t, reestr_object.del_ti, reestr_object.del_g, inactive_e, inactive_g, inactive_t, inactive_ti, g_vid_dym_vstr, g_vid_dym_pr, g_vid_dym_koak, g_mat_dym, reestr_object.elektro_is, reestr_object.type_object, spr_podrazd_e.sokr_name as name_podrazd_e, spr_podrazd_t.sokr_name as name_podrazd_t, spr_podrazd_ti.sokr_name as name_podrazd_ti, spr_podrazd_g.sokr_name as name_podrazd_g, spr_branch_e.sokr_name as name_branch_e, spr_branch_t.sokr_name as name_branch_t, spr_branch_ti.sokr_name as name_branch_ti, spr_branch_g.sokr_name as name_branch_g, spr_branch_e.id as id_branch_e, spr_branch_t.id as id_branch_t, spr_branch_ti.id as id_branch_ti, spr_branch_g.id as id_branch_g, users_t.spr_cod_otd AS users_cod_otd_t, users_ti.spr_cod_otd AS users_cod_otd_ti, users_e.spr_cod_otd AS users_cod_otd_e, users_g.spr_cod_otd AS users_cod_otd_g, reestr_object.address_city_type, reestr_object.address_street_type, spr_type_city.sokr_name AS spr_type_city_sokr_name, spr_type_street.sokr_name AS spr_type_street_sokr_name, reestr_object.address_city_zone, spr_city_zone.name AS spr_city_zone_name, spr_city.key_region AS spr_city_key_region')
            ->from('reestr_object')
			->joinLeftTable('spr_region', 'spr_region.id = reestr_object.address_region')
			->joinLeftTable('spr_district', 'spr_district.id = reestr_object.address_district')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_object.address_city_type')
			->joinLeftTable('spr_city', 'spr_city.id = reestr_object.address_city')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_object.address_street_type')
			->joinLeftTable('spr_city_zone', 'spr_city_zone.id = reestr_object.address_city_zone')
			->joinLeftTable('users as users_t', 'users_t.id = reestr_object.t_insp')
			->joinLeftTable('users as users_e', 'users_e.id = reestr_object.e_insp')
			->joinLeftTable('users as users_g', 'users_g.id = reestr_object.g_insp')
			->joinLeftTable('users as users_ti', 'users_ti.id = reestr_object.ti_insp')
			->joinLeftTable('spr_podrazdelenie as spr_podrazd_e', 'users_e.spr_cod_podrazd= spr_podrazd_e.id')
			->joinLeftTable('spr_podrazdelenie as spr_podrazd_t', 'users_t.spr_cod_podrazd= spr_podrazd_t.id')
			->joinLeftTable('spr_podrazdelenie as spr_podrazd_ti', 'users_ti.spr_cod_podrazd= spr_podrazd_ti.id')
			->joinLeftTable('spr_podrazdelenie as spr_podrazd_g', 'users_g.spr_cod_podrazd= spr_podrazd_g.id')
			->joinLeftTable('spr_branch as spr_branch_e', 'users_e.spr_cod_branch= spr_branch_e.id')
			->joinLeftTable('spr_branch as spr_branch_t', 'users_t.spr_cod_branch= spr_branch_t.id')
			->joinLeftTable('spr_branch as spr_branch_ti', 'users_ti.spr_cod_branch= spr_branch_ti.id')
			->joinLeftTable('spr_branch as spr_branch_g', 'users_g.spr_cod_branch= spr_branch_g.id')
			->where('id_reestr_subject', $id)
			->orderBy('reestr_object.name', 'ASC')
			->orderBy('spr_region_name', 'ASC')
			->orderBy('spr_district_name', 'ASC')
			->orderBy('spr_city_name', 'ASC')
			->orderBy('reestr_object.address_street', 'ASC')
			->orderBy('reestr_object.address_building', 'ASC')
			->orderBy('reestr_object.address_flat', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }


	public function getObjectsListBron($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.name AS reestr_object_name, reestr_object.e_insp AS reestr_object_e_insp, reestr_object.t_insp AS reestr_object_t_insp, reestr_object.ti_insp AS reestr_object_ti_insp, reestr_object.g_insp AS reestr_object_g_insp, reestr_object.id_reestr_subject AS reestr_subject_id_reestr_subject, reestr_object.address_index, reestr_object.address_region, reestr_object.address_district, reestr_object.address_city, reestr_object.address_city_zone, reestr_object.address_street, reestr_object.address_building, reestr_object.address_flat, reestr_object.e_armor_crach, reestr_object.e_armor_tech, reestr_object.e_armor_time, reestr_object.e_armor_date')
            ->from('reestr_object')
			->where('id_reestr_subject', $id)
			->where('e_armor', 1)
			->orderBy('reestr_object.name', 'ASC')
            ->sql();


        return $this->db->query($sql, $this->queryBuilder->values);
    }


	public function getObjectsListBronTeplo($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.name AS reestr_object_name, reestr_object.e_insp AS reestr_object_e_insp, reestr_object.t_insp AS reestr_object_t_insp, reestr_object.ti_insp AS reestr_object_ti_insp, reestr_object.g_insp AS reestr_object_g_insp, reestr_object.id_reestr_subject AS reestr_subject_id_reestr_subject, reestr_object.address_index, reestr_object.address_region, reestr_object.address_district, reestr_object.address_city, reestr_object.address_city_zone, reestr_object.address_street, reestr_object.address_building, reestr_object.address_flat, reestr_object.e_armor_crach, reestr_object.e_armor_tech, reestr_object.e_armor_time, reestr_object.e_armor_date, reestr_object.t_armor_crach, reestr_object.t_armor_crach_vapor, reestr_object.t_armor_tech, reestr_object.t_armor_tech_vapor, reestr_object.t_armor_time, reestr_object.t_armor_date')
            ->from('reestr_object')
			->where('id_reestr_subject', $id)
			->where('t_armor', 1)
			->orderBy('reestr_object.name', 'ASC')
            ->sql();


        return $this->db->query($sql, $this->queryBuilder->values);
    }


  /*  public function getNewObjects()
    {
		//echo 
        $sql = $this->queryBuilder->select()
            ->from('reestr_object')
			->orderBy('id', 'ASC')
            ->sql();
//echo $sql; 
        return $this->db->query($sql);
    }*/


    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('reestr_object')
            ->where('id', $itemId)
            ->sql();
		
		return $this->db->query($sql, $this->queryBuilder->values);
       
			
			
		/*removeItemsSubobj($itemId);*/
	
		
	}

	public function removeItemsSubobj($itemId)
    {
		//echo "Hello";
		$sql = $this->queryBuilder
			->update('reestr_object')
			->set(['e_subobj_obj' => null, 'e_subobj_power' => null,'e_subobj_subject' => null,'e_subobj' => 0])            
			->where('e_subobj_obj', $itemId)
            ->sql();
		//echo $sql;	
		return $this->db->query($sql, $this->queryBuilder->values);	
	}



    public function getObjectsData($id)
    {
        $objects = new Objects($id);

        return $objects->findOne();
    }

	public function getObjectsByName($name, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.name AS reestr_object_name, reestr_object.id_reestr_subject AS reestr_subject_id_reestr_subject, reestr_object.address_index, reestr_object.address_region, reestr_object.address_district, reestr_object.address_city, reestr_object.address_city_zone, reestr_object.address_street, reestr_object.address_building, reestr_object.address_flat, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name')
            ->from('reestr_object reestr_object')
			->joinTable('spr_region spr_region', 	 'spr_region.id = reestr_object.place_address_region')
			->joinTable('spr_district spr_district', 'spr_district.id = reestr_object.place_address_district')
			->joinTable('spr_city spr_city',		 'spr_city.id = reestr_object.place_address_city')
			->where('reestr_object.name', '%'.trim($name).'%', 'LIKE')
			->orderBy('reestr_object.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
/**  Сведения о подключенных субабонентах **/
	public function getSubobjectData($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id as reestr_object_id, reestr_object.name AS reestr_object_name, reestr_object.e_cat_1 AS reestr_object_e_cat_1, reestr_object.e_cat_2 AS reestr_object_e_cat_2,  reestr_object.e_cat_1plus AS reestr_object_e_cat_1plus, reestr_object.e_cat_3 AS reestr_object_e_cat_3, reestr_object.e_subobj_power AS reestr_object_e_subobj_power, reestr_subject.id as reestr_subject_id, reestr_subject.name as reestr_subject_name, reestr_subject.type_activity as reestr_subject_type_activity, spr_kind_of_activity.name as spr_kind_of_activity_name, reestr_object.address_index, reestr_object.address_region, reestr_object.address_district, reestr_object.address_city, reestr_object.address_city_zone, reestr_object.address_street, reestr_object.address_building, reestr_object.address_flat, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name')
            ->from('reestr_object')
			->joinLeftTable('reestr_subject', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('spr_region', 'spr_region.id = reestr_object.address_region')
			->joinLeftTable('spr_district', 'spr_district.id = reestr_object.address_district')
			->joinLeftTable('spr_city', 'spr_city.id = reestr_object.address_city')
			->joinLeftTable('spr_kind_of_activity', 'spr_kind_of_activity.id = reestr_subject.type_activity')
			->where('e_subobj_obj', $id)
			->orderBy('reestr_object.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function createObjects($params)
    {
//print_r($params);
        $objects = new Objects;
		/*******************************ОСНОВНОЕ***************************/
			if(strlen($params['id_reestr_subject'])>0){
				$objects->setId_reestr_subject($params['id_reestr_subject']);
			}
			if(isset($params['name'])){
				if(strlen($params['name'])>0){
					$objects->setName($params['name']);
				}
			}
			if(isset($params['num_case_o'])){
				if(strlen($params['num_case_o'])>0){
					$objects->setNum_case_o($params['num_case_o']);
				}
			}
			if(isset($params['t_id_spr_ot_functions'])){	
				if(strlen($params['t_id_spr_ot_functions'])>0){	
					$objects->setT_id_spr_ot_functions($params['t_id_spr_ot_functions']);
				}	
			}	
			if(isset($params['type_object'])){	
				if(strlen($params['type_object'])>0){	
					$objects->setType_object($params['type_object']);
				}			
			}			
			if(isset($params['address_index'])){
				if(strlen($params['address_index'])>0){
					$objects->setAddress_index($params['address_index']);
				}
			}
			if(isset($params['address_region'])){
				if(strlen($params['address_region'])>0){
					$objects->setAddress_region($params['address_region']);
				}
			}
			if(isset($params['address_district'])){
				if(strlen($params['address_district'])>0){
					$objects->setAddress_district($params['address_district']);
				}	
			}	
			if(isset($params['address_city'])){
				if(strlen($params['address_city'])>0){
					$objects->setAddress_city($params['address_city']);
				}	
			}	
			if(isset($params['address_city_zone'])){
				if(strlen($params['address_city_zone'])>0){
					$objects->setAddress_city_zone($params['address_city_zone']);
				}
			}
			if(isset($params['address_street'])){
				if(strlen($params['address_street'])>0){
					$objects->setAddress_street($params['address_street']);
				}	
			}	
			if(isset($params['address_street_type'])){
				if(strlen($params['address_street_type'])>0){
					$objects->setAddress_street_type($params['address_street_type']);
				}
			}
			if(isset($params['address_city_type'])){
				if(strlen($params['address_city_type'])>0){
					$objects->setAddress_city_type($params['address_city_type']);
				}			
			}			
			if(isset($params['address_building'])){
				if(strlen($params['address_building'])>0){
					$objects->setAddress_building($params['address_building']);
				}
			}
			if(isset($params['address_flat'])){
				if(strlen($params['address_flat'])>0){
					$objects->setAddress_flat($params['address_flat']);
				}
			}
		
		/*******************************ЭЛЕКТРО***************************/	
			if(isset($params['elektro_is'])){	
				if(strlen($params['elektro_is'])>0){	
					$objects->setElektro_is($params['elektro_is']);
				}
			}
			if(isset($params['e_insp'])){	
				if(strlen($params['e_insp'])>0){	
					$objects->setE_insp($params['e_insp']);
				}
			}
			if(isset($params['e_district'])){	
				if(strlen($params['e_district'])>0){	
					$objects->setE_district($params['e_district']);
				}
			}
			if(isset($params['e_subobj'])){	
				if(strlen($params['e_subobj'])>0){	
					$objects->setE_subobj($params['e_subobj']);
				}
			}
			if(isset($params['e_subobj_subject_id'])){	
				if(strlen($params['e_subobj_subject_id'])>0){	
					$objects->setE_subobj_subject($params['e_subobj_subject_id']);
				}
			}
			if(isset($params['e_subobj_obj_id'])){	
				if(strlen($params['e_subobj_obj_id'])>0){	
					$objects->setE_subobj_obj($params['e_subobj_obj_id']);
				}
			}
			if(isset($params['e_subobj_power'])){	
				if(strlen($params['e_subobj_power'])>0){	
					$objects->setE_subobj_power($params['e_subobj_power']);
				}
			}
			if(isset($params['e_armor'])){	
				if(strlen($params['e_armor'])>0){	
					$objects->setE_armor($params['e_armor']);
				}
			}
			if(isset($params['e_armor_crach'])){	
				if(strlen($params['e_armor_crach'])>0){	
					$objects->setE_armor_crach($params['e_armor_crach']);
				}
			}
			if(isset($params['e_armor_tech'])){	
				if(strlen($params['e_armor_tech'])>0){	
					$objects->setE_armor_tech($params['e_armor_tech']);
				}
			}
			if(isset($params['e_armor_time'])){	
				if(strlen($params['e_armor_time'])>0){	
					$objects->setE_armor_time($params['e_armor_time']);
				}
			}
			if(isset($params['e_armor_date'])){	
				if(strlen($params['e_armor_date'])>0){	
					$objects->setE_armor_date($params['e_armor_date']);
				}
			}
			if(isset($params['e_cat_1'])){	
				if(strlen($params['e_cat_1'])>0){	
					$objects->setE_cat_1($params['e_cat_1']);
				}
			}
			if(isset($params['e_cat_1plus'])){	
				if(strlen($params['e_cat_1plus'])>0){	
					$objects->setE_cat_1plus($params['e_cat_1plus']);
				}
			}
			if(isset($params['e_cat_2'])){	
				if(strlen($params['e_cat_2'])>0){	
					$objects->setE_cat_2($params['e_cat_2']);
				}
			}
			if(isset($params['e_cat_3'])){	
				if(strlen($params['e_cat_3'])>0){	
					$objects->setE_cat_3($params['e_cat_3']);
				}
			}
			if(isset($params['e_flooding'])){	
				if(strlen($params['e_flooding'])>0){	
					$objects->setE_flooding($params['e_flooding']);
				}
			}
			if(isset($params['e_note'])){	
				if(strlen($params['e_note'])>0){	
					$objects->setE_note($params['e_note']);
				}
			}
		/*******************************ТЕПЛО*****************************/
			if(isset($params['t_insp'])){	
				if(strlen($params['t_insp'])>0){	
					$objects->setT_insp($params['t_insp']);
				}
			}
			if(isset($params['t_is'])){	
				if(strlen($params['t_is'])>0){	
					$objects->setT_is($params['t_is']);
				}			
			}			
			if(isset($params['t_armor'])){	
				if(strlen($params['t_armor'])>0){	
					$objects->setT_armor($params['t_armor']);
				}		
			}		
			if(isset($params['t_armor_crach'])){		
				if(strlen($params['t_armor_crach'])>0){		
					$objects->setT_armor_crach($params['t_armor_crach']);
				}		
			}		
			if(isset($params['t_armor_crach_vapor'])){	
				if(strlen($params['t_armor_crach_vapor'])>0){	
					$objects->setT_armor_crach_vapor($params['t_armor_crach_vapor']);
				}		
			}		
			if(isset($params['t_armor_tech'])){	
				if(strlen($params['t_armor_tech'])>0){	
					$objects->setT_armor_tech($params['t_armor_tech']);
				}	
			}	
			if(isset($params['t_armor_tech_vapor'])){	
				if(strlen($params['t_armor_tech_vapor'])>0){	
					$objects->setT_armor_tech_vapor($params['t_armor_tech_vapor']);
				}
			}
			if(isset($params['t_armor_time'])){	
				if(strlen($params['t_armor_time'])>0){	
					$objects->setT_armor_time($params['t_armor_time']);
				}	
			}	
			if(isset($params['t_armor_date'])){	
				if(strlen($params['t_armor_date'])>0){	
					$objects->setT_armor_date($params['t_armor_date']);
				}	
			}	
			if(isset($params['t_id_spr_ot_cat'])){	
				if(strlen($params['t_id_spr_ot_cat'])>0){	
					$objects->setT_id_spr_ot_cat($params['t_id_spr_ot_cat']);
				}	
			}
			if(isset($params['t_id_gvs_open'])){
				if(strlen($params['t_id_gvs_open'])>0){	
					$objects->setT_id_gvs_open($params['t_id_gvs_open']);
				}			
			}			
			if(isset($params['t_workload_heating'])){	
				if(strlen($params['t_workload_heating'])>0){	
					$objects->setT_workload_heating($params['t_workload_heating']);
				}else{
					$objects->setT_workload_heating(0);
				}	
			}	
			if(isset($params['t_workload_gvs'])){	
				if(strlen($params['t_workload_gvs'])>0){	
					$objects->setT_workload_gvs($params['t_workload_gvs']);
				}else{
					$objects->setT_workload_gvs(0);
				}	
			}	
			if(isset($params['t_workload_pov'])){	
				if(strlen($params['t_workload_pov'])>0){	
					$objects->setT_workload_pov($params['t_workload_pov']);
				}else{
					$objects->setT_workload_pov(0);
				}
			}
			if(isset($params['t_workload_tech'])){	
				if(strlen($params['t_workload_tech'])>0){	
					$objects->setT_workload_tech($params['t_workload_tech']);
				}else{
					$objects->setT_workload_tech(0);
				}
			}
			if(isset($params['t_workload_vapor'])){	
				if(strlen($params['t_workload_vapor'])>0){	
					$objects->setT_workload_vapor($params['t_workload_vapor']);
				}	
			}	
			if(isset($params['t_workload_percent'])){	
				if(strlen($params['t_workload_percent'])>0){	
					$objects->setT_workload_percent($params['t_workload_percent']);
				}
			}
			if(isset($params['t_systemheat_place'])){	
				if(strlen($params['t_systemheat_place'])>0){	
					$objects->setT_systemheat_place($params['t_systemheat_place']);
				}
			}
			if(isset($params['t_systemheat_water'])){	
				if(strlen($params['t_systemheat_water'])>0){	
					$objects->setT_systemheat_water($params['t_systemheat_water']);
				}
			}
			if(isset($params['t_systemheat_dependent'])){	
				if(strlen($params['t_systemheat_dependent'])>0){	
					$objects->setT_systemheat_dependent($params['t_systemheat_dependent']);
				}
			}
			if(isset($params['t_systemheat_layout'])){	
				if(strlen($params['t_systemheat_layout'])>0){	
					$objects->setT_systemheat_layout($params['t_systemheat_layout']);
				}
			}
			if(isset($params['t_systemheat_type_op'])){	
				if(strlen($params['t_systemheat_type_op'])>0){	
					$objects->setT_systemheat_type_op($params['t_systemheat_type_op']);
				}	
			}	
			if(isset($params['t_systemheat_mark_op'])){	
				if(strlen($params['t_systemheat_mark_op'])>0){	
					$objects->setT_systemheat_mark_op($params['t_systemheat_mark_op']);
				}	
			}	
			if(isset($params['t_spr_id_ot_type_to'])){
				if(strlen($params['t_spr_id_ot_type_to'])>0){
					$objects->setT_spr_id_ot_type_to($params['t_spr_id_ot_type_to']);
				}	
			}	
			if(isset($params['t_systemheat_mark_to'])){
				if(strlen($params['t_systemheat_mark_to'])>0){
					$objects->setT_systemheat_mark_to($params['t_systemheat_mark_to']);
				}
			}

			if(isset($params['t_gvs_place'])){
				if(strlen($params['t_gvs_place'])>0){
					$objects->setT_gvs_place($params['t_gvs_place']);
				}
			}
			/*if(isset($params['t_count_itp'])){
				if(strlen($params['t_count_itp'])>0){
					$objects->setT_count_itp($params['t_count_itp']);
				}			
			}*/			
		/*******************************ТИ*****************************/
			if(isset($params['ti_is'])){
				if(strlen($params['ti_is'])>0){	
					$objects->setTi_is($params['ti_is']);
				}
			}

			if(isset($params['ti_reestr'])){	
				if(strlen($params['ti_reestr'])>0){	
					$objects->setTi_reestr($params['ti_reestr']);
				}
			}
			if(isset($params['ti_name'])){	
				if(strlen($params['ti_name'])>0){	
					$objects->setTi_name($params['ti_name']);
				}			
			}			
			if(isset($params['ti_insp'])){	
				if(strlen($params['ti_insp'])>0){	
					$objects->setTi_insp($params['ti_insp']);
				}			
			}			
			if(isset($params['ti_id_spr_ot_boiler_type'])){	
				if(strlen($params['ti_id_spr_ot_boiler_type'])>0){	
					$objects->setTi_id_spr_ot_boiler_type($params['ti_id_spr_ot_boiler_type']);
				}			
			}
			if(isset($params['ti_year'])){
				if(strlen($params['ti_year'])>0){	
					$objects->setTi_year($params['ti_year']);
				}			
			}			
			if(isset($params['ti_power'])){	
				if(strlen($params['ti_power'])>0){	
					$objects->setTi_power($params['ti_power']);
				}			
			}
			if(isset($params['ti_dop_power'])){	
				if(strlen($params['ti_dop_power'])>0){	
					$objects->setTi_dop_power($params['ti_dop_power']);
				}			
			}			
			if(isset($params['ti_id_spr_ot_type_fuel_1'])){	
				if(strlen($params['ti_id_spr_ot_type_fuel_1'])>0){	
					$objects->setTi_id_spr_ot_type_fuel_1($params['ti_id_spr_ot_type_fuel_1']);
				}			
			}			
			if(isset($params['ti_id_spr_ot_type_fuel_2'])){	
				if(strlen($params['ti_id_spr_ot_type_fuel_2'])>0){	
					$objects->setTi_id_spr_ot_type_fuel_2($params['ti_id_spr_ot_type_fuel_2']);
				}			
			}			
			if(isset($params['ti_out_power_ot'])){	
				if(strlen($params['ti_out_power_ot'])>0){	
					$objects->setTi_out_power_ot($params['ti_out_power_ot']);
				}			
			}			
			if(isset($params['ti_out_power_gvs'])){	
				if(strlen($params['ti_out_power_gvs'])>0){	
					$objects->setTi_out_power_gvs($params['ti_out_power_gvs']);
				}			
			}			
			if(isset($params['ti_out_power_tech'])){	
				if(strlen($params['ti_out_power_tech'])>0){	
					$objects->setTi_out_power_tech($params['ti_out_power_tech']);
				}				
			}				
			if(isset($params['ti_out_power_vent'])){	
				if(strlen($params['ti_out_power_vent'])>0){	
					$objects->setTi_out_power_vent($params['ti_out_power_vent']);
				}				
			}			
		/*******************************ГАЗ***************************/
			if(isset($params['gaz_is'])){	
				if(strlen($params['gaz_is'])>0){	
					$objects->setGaz_is($params['gaz_is']);
				}
			}
			if(isset($params['g_insp'])){	
				if(strlen($params['g_insp'])>0){	
					$objects->setG_insp($params['g_insp']);
				}
			}
			if(isset($params['is_dom'])){	
				if(strlen($params['is_dom'])>0){	
					$objects->setIs_dom($params['is_dom']);
				}			
			}			
			if(isset($params['g_count_flat'])){	
				if(strlen($params['g_count_flat'])>0){	
					$objects->setG_count_flat($params['g_count_flat']);		
				}
			}
			if(isset($params['g_count_entrance'])){
				if(strlen($params['g_count_entrance'])>0){
					$objects->setG_count_entrance($params['g_count_entrance']);
				}	
			}	
			/*if(strlen($params['g_id_spr_og_flue'])>0){
				$objects->setG_id_spr_og_flue($params['g_id_spr_og_flue']);
			}	
			if(strlen($params['g_id_spr_og_flue_mater'])>0){	
				$objects->setG_id_spr_og_flue_mater($params['g_id_spr_og_flue_mater']);
			}*/
			if(isset($params['g_flue_size'])){
				if(strlen($params['g_flue_size'])>0){
					$objects->setG_flue_size($params['g_flue_size']);
				}	
			}	
			if(isset($params['g_id_spr_og_type_gaz'])){	
				if(strlen($params['g_id_spr_og_type_gaz'])>0){	
					$objects->setG_id_spr_og_type_gaz($params['g_id_spr_og_type_gaz']);		
				}
			}


		$objectsId = $objects->save();
		
			return $objectsId;
    }


    public function updateObjects($params)
    {
	//print_r($params);
      if (isset($params['objects_id'])) {

			$objects = new Objects($params['objects_id']);	
		/*******************************ОСНОВНОЕ***************************/
			if(strlen($params['id_reestr_subject'])>0){
				$objects->setId_reestr_subject($params['id_reestr_subject']);
			}
			if(strlen($params['name'])>0){
				$objects->setName($params['name']);
			}
			if(strlen($params['num_case_o'])>0){
				$objects->setNum_case_o($params['num_case_o']);
			}
			if(strlen($params['t_id_spr_ot_functions'])>0){	
				$objects->setT_id_spr_ot_functions($params['t_id_spr_ot_functions']);
			}
			if(strlen($params['type_object'])>0){	
				$objects->setType_object($params['type_object']);
			}			
			if(strlen($params['address_index'])>0){
				$objects->setAddress_index($params['address_index']);
			}
			if(isset($params['address_region'])){
				$objects->setAddress_region($params['address_region']);
			}
			if(isset($params['address_district'])){
				$objects->setAddress_district($params['address_district']);
			}	
			if(isset($params['address_city'])>0){
				$objects->setAddress_city($params['address_city']);
			}	
			if(isset($params['address_city_zone'])){
				$objects->setAddress_city_zone($params['address_city_zone']);
			}
			if(isset($params['address_street'])>0){
				$objects->setAddress_street($params['address_street']);
			}
			if(isset($params['address_street_type'])){
				$objects->setAddress_street_type($params['address_street_type']);
			}
			if(isset($params['address_city_type'])){
				$objects->setAddress_city_type($params['address_city_type']);
			}			
			if(isset($params['address_building'])){
				$objects->setAddress_building($params['address_building']);
			}
			if(isset($params['address_flat'])){
				$objects->setAddress_flat($params['address_flat']);
			}
			/*if(strlen($params['id_spr_admin'])>0){
				$objects->setId_spr_admin($params['id_spr_admin']);
			}*/
		/*	if(strlen($params['spr_branch'])>0){
				$objects->setSpr_branch($params['spr_branch']);
			}
			if(strlen($params['spr_podrazdelenie'])>0){
				$objects->setSpr_podrazdelenie($params['spr_podrazdelenie']);
			}
			if(strlen($params['spr_otdel'])>0){
				$objects->setSpr_otdel($params['spr_otdel']);
			}		*/	
		/*******************************ЭЛЕКТРО***************************/	
		if(isset($params['e_insp'])){
			if(strlen($params['elektro_is'])>0){	
				$objects->setElektro_is($params['elektro_is']);
			}
			if(strlen($params['e_insp'])>0){	
				$objects->setE_insp($params['e_insp']);
			}
			if(strlen($params['e_district'])>0){	
				$objects->setE_district($params['e_district']);
			}
			if(strlen($params['e_subobj'])>0){	
				$objects->setE_subobj($params['e_subobj']);
			}
			if(strlen($params['e_subobj_subject_id'])>0){	
				$objects->setE_subobj_subject($params['e_subobj_subject_id']);
			}
			if(strlen($params['e_subobj_obj_id'])>0){	
				$objects->setE_subobj_obj($params['e_subobj_obj_id']);
			}
			if(strlen($params['e_subobj_power'])>0){	
				$objects->setE_subobj_power($params['e_subobj_power']);
			}
			if(strlen($params['e_armor'])>0){	
				$objects->setE_armor($params['e_armor']);
			}
			if(strlen($params['e_armor_crach'])>0){	
				$objects->setE_armor_crach($params['e_armor_crach']);
			}
			if(strlen($params['e_armor_tech'])>0){	
				$objects->setE_armor_tech($params['e_armor_tech']);
			}
			if(strlen($params['e_armor_time'])>0){	
				$objects->setE_armor_time($params['e_armor_time']);
			}
			if(strlen($params['e_armor_date'])>0){	
				$objects->setE_armor_date($params['e_armor_date']);
			}
			if(strlen($params['e_cat_1'])>0){	
				$objects->setE_cat_1($params['e_cat_1']);
			}
			if(strlen($params['e_cat_1plus'])>0){	
				$objects->setE_cat_1plus($params['e_cat_1plus']);
			}
			if(strlen($params['e_cat_2'])>0){	
				$objects->setE_cat_2($params['e_cat_2']);
			}
			if(strlen($params['e_cat_3'])>0){	
				$objects->setE_cat_3($params['e_cat_3']);
			}
			if(strlen($params['e_flooding'])>0){	
				$objects->setE_flooding($params['e_flooding']);	
			}
			if(strlen($params['del_e'])>0){	
				$objects->setDel_e($params['del_e']);	
			}
			if(strlen($params['inactive_e'])>0){	
				$objects->setInactive_e($params['inactive_e']);	
			}			
		}	
		/*******************************ТЕПЛО*****************************/
		if(isset($params['t_insp'])){
			if(strlen($params['t_insp'])>0){	
				$objects->setT_insp($params['t_insp']);
			}
			if(strlen($params['t_is'])>0){	
				$objects->setT_is($params['t_is']);
			}			
			if(strlen($params['t_armor'])>0){	
				$objects->setT_armor($params['t_armor']);
			}		
			if(strlen($params['t_armor_crach'])>0){	
				$objects->setT_armor_crach($params['t_armor_crach']);
			}		
			if(strlen($params['t_armor_crach_vapor'])>0){	
				$objects->setT_armor_crach_vapor($params['t_armor_crach_vapor']);
			}		
			if(strlen($params['t_armor_tech'])>0){	
				$objects->setT_armor_tech($params['t_armor_tech']);
			}	
			if(strlen($params['t_armor_tech_vapor'])>0){	
				$objects->setT_armor_tech_vapor($params['t_armor_tech_vapor']);
			}
			if(strlen($params['t_armor_time'])>0){	
				$objects->setT_armor_time($params['t_armor_time']);
			}	
			if(strlen($params['t_armor_date'])>0){	
				$objects->setT_armor_date($params['t_armor_date']);
			}
	
			if(strlen($params['t_id_spr_ot_cat'])>0){	
				$objects->setT_id_spr_ot_cat($params['t_id_spr_ot_cat']);
			}	
			if(strlen($params['t_id_gvs_open'])>0){	
				$objects->setT_id_gvs_open($params['t_id_gvs_open']);
			}
			if(strlen($params['t_workload_heating'])>0){	
				$objects->setT_workload_heating($params['t_workload_heating']);
			}else{
				$objects->setT_workload_heating(0);
			}	
			if(strlen($params['t_workload_gvs'])>0){	
				$objects->setT_workload_gvs($params['t_workload_gvs']);
			}else{
				$objects->setT_workload_gvs(0);
			}	
			if(strlen($params['t_workload_pov'])>0){	
				$objects->setT_workload_pov($params['t_workload_pov']);
			}else{
				$objects->setT_workload_pov(0);
			}
			if(strlen($params['t_workload_tech'])>0){	
				$objects->setT_workload_tech($params['t_workload_tech']);
			}else{
				$objects->setT_workload_tech(0);
			}
			if(strlen($params['t_workload_vapor'])>0){	
				$objects->setT_workload_vapor($params['t_workload_vapor']);
			}	
			if(strlen($params['t_workload_percent'])>0){	
				$objects->setT_workload_percent($params['t_workload_percent']);
			}
			/*if(strlen($params['t_systemheat_place'])>0){	
				$objects->setT_systemheat_place($params['t_systemheat_place']);
			}*/
			if(strlen($params['t_systemheat_water'])>0){	
				$objects->setT_systemheat_water($params['t_systemheat_water']);
			}
			if(strlen($params['t_systemheat_dependent'])>0){	
				$objects->setT_systemheat_dependent($params['t_systemheat_dependent']);
			}
			/*if(strlen($params['t_systemheat_layout'])>0){	
				$objects->setT_systemheat_layout($params['t_systemheat_layout']);
			}*/
			if(strlen($params['t_systemheat_type_op'])>0){	
				$objects->setT_systemheat_type_op($params['t_systemheat_type_op']);
			}	
			/*if(strlen($params['t_systemheat_mark_op'])>0){	
				$objects->setT_systemheat_mark_op($params['t_systemheat_mark_op']);
			}*/
			/*if(strlen($params['t_spr_id_ot_type_to'])>0){	
				$objects->setT_spr_id_ot_type_to($params['t_spr_id_ot_type_to']);
			}*/
			/*if(strlen($params['t_systemheat_mark_to'])>0){
				$objects->setT_systemheat_mark_to($params['t_systemheat_mark_to']);
			}*/	
			if(strlen($params['del_t'])>0){	
				$objects->setDel_t($params['del_t']);	
			}
			/*if(strlen($params['t_count_itp'])>0){
				$objects->setT_count_itp($params['t_count_itp']);
			}*/
			if(strlen($params['inactive_t'])>0){	
				$objects->setInactive_t($params['inactive_t']);	
			}			
		}
		/*******************************ТИ*****************************/
		if(isset($params['ti_insp'])){
			if(strlen($params['ti_is'])>0){	
				$objects->setTi_is($params['ti_is']);
			}
			if(strlen($params['ti_reestr'])>0){	
				$objects->setTi_reestr($params['ti_reestr']);
			}
			if(strlen($params['ti_name'])>0){	
				$objects->setTi_name($params['ti_name']);
			}		
			if(strlen($params['ti_insp'])>0){	
				$objects->setTi_insp($params['ti_insp']);
			}			
			if(strlen($params['ti_id_spr_ot_boiler_type'])>0){	
				$objects->setTi_id_spr_ot_boiler_type($params['ti_id_spr_ot_boiler_type']);
			}			
			if(strlen($params['ti_year'])>0){	
				$objects->setTi_year($params['ti_year']);
			}	
			if(strlen($params['ti_power'])>0){	
				$objects->setTi_power($params['ti_power']);
			}	
			if(isset($params['ti_dop_power'])){	
				if(strlen($params['ti_dop_power'])>0){	
					$objects->setTi_dop_power($params['ti_dop_power']);
				}			
			}			
			/*if(strlen($params['ti_id_spr_ot_type_fuel_1'])>0){	
				$objects->setTi_id_spr_ot_type_fuel_1($params['ti_id_spr_ot_type_fuel_1']);
			}			
			if(strlen($params['ti_id_spr_ot_type_fuel_2'])>0){	
				$objects->setTi_id_spr_ot_type_fuel_2($params['ti_id_spr_ot_type_fuel_2']);
			}*/			
			if(strlen($params['ti_out_power_ot'])>0){	
				$objects->setTi_out_power_ot($params['ti_out_power_ot']);
			}			
			if(strlen($params['ti_out_power_gvs'])>0){	
				$objects->setTi_out_power_gvs($params['ti_out_power_gvs']);
			}			
			if(strlen($params['ti_out_power_tech'])>0){	
				$objects->setTi_out_power_tech($params['ti_out_power_tech']);
			}			
			if(strlen($params['ti_out_power_vent'])>0){	
				$objects->setTi_out_power_vent($params['ti_out_power_vent']);
			}	
			if(strlen($params['del_ti'])>0){	
				$objects->setDel_ti($params['del_ti']);	
			}
			if(strlen($params['inactive_ti'])>0){	
				$objects->setInactive_ti($params['inactive_ti']);	
			}			
		}
		/*******************************ГАЗ***************************/
		if(isset($params['g_insp'])){
			if(strlen($params['gaz_is'])>0){	
				$objects->setGaz_is($params['gaz_is']);
			}
			if(strlen($params['g_insp'])>0){	
				$objects->setG_insp($params['g_insp']);
			}
			if(strlen($params['g_date_initial_start'])>0){	
				$objects->setG_date_initial_start($params['g_date_initial_start']);
			}else{
				$objects->setG_date_initial_start('0000-00-00');
			}
			if(isset($params['is_dom'])){	
				$objects->setIs_dom($params['is_dom']);
			}			
			if(strlen($params['g_count_flat'])>0){	
				$objects->setG_count_flat($params['g_count_flat']);		
			}
			if(strlen($params['g_count_entrance'])>0){
				$objects->setG_count_entrance($params['g_count_entrance']);
			}	
			
			if(strlen($params['g_vid_dym_vstr'])>0){
				$objects->setG_vid_dym_vstr($params['g_vid_dym_vstr']);
			}			
			if(strlen($params['g_vid_dym_pr'])>0){
				$objects->setG_vid_dym_pr($params['g_vid_dym_pr']);
			}			
			if(strlen($params['g_vid_dym_koak'])>0){
				$objects->setG_vid_dym_koak($params['g_vid_dym_koak']);
			}
			if(strlen($params['g_mat_dym'])>0){
				$objects->setG_mat_dym($params['g_mat_dym']);
			}			
			
			
			if(strlen($params['g_flue_naim_org_insp'])>0){
				$objects->setG_flue_naim_org_insp($params['g_flue_naim_org_insp']);
			}


			if(strlen($params['g_flue_date_insp'])>0){
				$objects->setG_flue_date_insp($params['g_flue_date_insp']);
			}else{
				$objects->setG_flue_date_insp('0000-00-00');
			}
			
			
			
			if(strlen($params['g_flue_date_insp_next'])>0){
				$objects->setG_flue_date_insp_next($params['g_flue_date_insp_next']);
			}else{
				$objects->setG_flue_date_insp_next('0000-00-00');
			}
			
			
			
			
			if(strlen($params['g_flue_size'])>0){
				$objects->setG_flue_size($params['g_flue_size']);
			}
			if(strlen($params['g_id_spr_og_type_gaz'])>0){	
				$objects->setG_id_spr_og_type_gaz($params['g_id_spr_og_type_gaz']);		
			}
			
			if(strlen($params['g_flue_date_dog'])>0){
				$objects->setG_flue_date_dog($params['g_flue_date_dog']);
			}else{
				$objects->setG_flue_date_dog('0000-00-00');
			}
			
			
			
			if(strlen($params['otv_type_g'])>0){
				$objects->setOtv_type_g($params['otv_type_g']);
			}			
			if(strlen($params['ins_data_g'])>0){
				$objects->setIns_data_g($params['ins_data_g']);
			}			
			if(strlen($params['otv_g3'])>0){
				$objects->setOtv_g3($params['otv_g3']);
			}			
			if(strlen($params['order_num_g3'])>0){
				$objects->setOrder_num_g3($params['order_num_g3']);
			}
			if(strlen($params['order_data_g3'])>0){
				$objects->setOrder_data_g3($params['order_data_g3']);
			}
			if(strlen($params['dog_num_g3'])>0){
				$objects->setDog_num_g3($params['dog_num_g3']);
			}
			if(strlen($params['dog_data_g3'])>0){
				$objects->setDog_data_g3($params['dog_data_g3']);
			}
			if(strlen($params['dog_data_cont_g3'])>0){
				$objects->setDog_data_cont_g3($params['dog_data_cont_g3']);
			}
			if(strlen($params['otv_g1'])>0){
				$objects->setOtv_g1($params['otv_g1']);
			}
			if(strlen($params['otv_g2'])>0){
				$objects->setOtv_g2($params['otv_g2']);
			}
			if(strlen($params['order_num_g1'])>0){
				$objects->setOrder_num_g1($params['order_num_g1']);
			}
			if(strlen($params['order_num_g2'])>0){
				$objects->setOrder_num_g2($params['order_num_g2']);
			}
			if(strlen($params['order_data_g1'])>0){
				$objects->setOrder_data_g1($params['order_data_g1']);
			}
			if(strlen($params['order_data_g2'])>0){
				$objects->setOrder_data_g2($params['order_data_g2']);
			}			
			
			if(strlen($params['g_flue_num_dog'])>0){
				$objects->setG_flue_num_dog($params['g_flue_num_dog']);
			}
			if(strlen($params['g_flue_naim_org_dog'])>0){
				$objects->setG_flue_naim_org_dog($params['g_flue_naim_org_dog']);
			}
			
			
			if(strlen($params['g_flue_date_to'])>0){
				$objects->setG_flue_date_to($params['g_flue_date_to']);
			}else{
				$objects->setG_flue_date_to('0000-00-00');
			}

			
			if(strlen($params['g_flue_date_gto'])>0){
				$objects->setG_flue_date_gto($params['g_flue_date_gto']);
			}else{
				$objects->setG_flue_date_gto('0000-00-00');
			}	

			
			if(strlen($params['g_flue_date_prto'])>0){
				$objects->setG_flue_date_prto($params['g_flue_date_prto']);
			}else{
				$objects->setG_flue_date_prto('0000-00-00');
			}
			
			if(strlen($params['del_g'])>0){	
				$objects->setDel_g($params['del_g']);	
			}
			if(strlen($params['inactive_g'])>0){	
				$objects->setInactive_g($params['inactive_g']);	
			}			
		}
        }
		$objects->save();
	
			
		return $params['objects_id'];	
    }
	
	
    public function createBoiler_water($params)
    {
	

        $obj_oti_boiler_water = new Obj_oti_boiler_water;

			if(strlen($params['id_reestr_object'])>0){	
				$obj_oti_boiler_water->setId_reestr_object($params['id_reestr_object']);
			}	
			if(strlen($params['type'])>0){	
				$obj_oti_boiler_water->setType_boiler($params['type']);		
			}
			if(strlen($params['count'])>0){
				$obj_oti_boiler_water->setG_count_entrance($params['count']);
			}	
			if(strlen($params['year'])>0){	
				$obj_oti_boiler_water->setYear($params['year']);
			}
			if(strlen($params['power'])>0){
				$obj_oti_boiler_water->setPower($params['power']);
			}	
			

		$obj_oti_boiler_waterId = $obj_oti_boiler_water->save();

      return $obj_oti_boiler_waterId;
    }	

	public function createOt_personal_tp($params)
    {
	

        $obj_ot_personal_tp = new Obj_ot_personal_tp;


			if(strlen($params['device'])>0){	
				$obj_ot_personal_tp->setDevice($params['device']);		
			}	
			if(strlen($params['count_device'])>0){	
				$obj_ot_personal_tp->setCount_device($params['count_device']);
			}
			if(strlen($params['sar'])>0){
				$obj_ot_personal_tp->setSar($params['sar']);
			}	
			if(strlen($params['count_sar'])>0){	
				$obj_ot_personal_tp->setCount_sar($params['count_sar']);
			}			

		$obj_ot_personal_tpId = $obj_ot_personal_tp->save();

      return $obj_ot_personal_tpId;
    }

    public function createBoiler_vapor($params)
    {
	
        $obj_oti_boiler_vapor = new Obj_oti_boiler_vapor;

			if(strlen($params['id_reestr_object'])>0){	
				$obj_oti_boiler_vapor->setId_reestr_object($params['id_reestr_object']);
			}	
			if(strlen($params['type'])>0){	
				$obj_oti_boiler_vapor->setType_boiler($params['type']);		
			}	
			if(strlen($params['year'])>0){	
				$obj_oti_boiler_vapor->setYear($params['year']);
			}
			if(strlen($params['power'])>0){
				$obj_oti_boiler_vapor->setPower($params['power']);
			}	


		$obj_oti_boiler_vaporId = $obj_oti_boiler_vapor->save();
	
      return $obj_oti_boiler_vaporId;
    }	

    public function createDevice_obj_og($params)
    {
        $obj_og_device = new Obj_og_device;

			if(strlen($params['id_reestr_object'])>0){	
				$obj_og_device->setId_reestr_object($params['id_reestr_object']);
			}	
			if(strlen($params['type'])>0){	
				$obj_og_device->setType_device($params['type']);		
			}
			if(strlen($params['counts'])>0){
				$obj_og_device->setCounts($params['counts']);
			}	
			

		$obj_og_deviceId = $obj_og_device->save();

      return $obj_og_deviceId;
    }

	public function getObjectsByFilter($params)
	{
		
		$sql = $this->queryBuilder->select('reestr_object.id as reestr_object_id, reestr_object.name AS reestr_object_name, reestr_object.e_cat_1 AS reestr_object_e_cat_1, reestr_object.e_cat_2 AS reestr_object_e_cat_2,  reestr_object.e_cat_1plus AS reestr_object_e_cat_1plus, reestr_object.e_cat_3 AS reestr_object_e_cat_3, reestr_object.e_subobj_power AS reestr_object_e_subobj_power, reestr_subject.id as reestr_subject_id, reestr_subject.name as reestr_subject_name, reestr_subject.type_activity as reestr_subject_type_activity, spr_kind_of_activity.name as spr_kind_of_activity_name, reestr_object.address_index, reestr_object.address_region, reestr_object.address_district, reestr_object.address_city, reestr_object.address_city_zone, reestr_object.address_street, reestr_object.address_building, reestr_object.address_flat, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, spr_type_city.sokr_name AS spr_type_city_sokr_name, spr_type_street.sokr_name AS spr_type_street_sokr_name, reestr_object.address_city_zone, spr_city_zone.name AS spr_city_zone_name, spr_city.key_region AS spr_city_key_region')
            ->from('reestr_object')
			->joinLeftTable('reestr_subject', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('spr_region', 'spr_region.id = reestr_object.address_region')
			->joinLeftTable('spr_district', 'spr_district.id = reestr_object.address_district')
			->joinLeftTable('spr_city', 'spr_city.id = reestr_object.address_city')
			->joinLeftTable('spr_kind_of_activity', 'spr_kind_of_activity.id = reestr_subject.type_activity')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_object.address_city_type')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_object.address_street_type')
			->joinLeftTable('spr_city_zone', 'spr_city_zone.id = reestr_object.address_city_zone');
			
			
			if($params['id_reestr_subject'] > 0){
				$sql = $this->queryBuilder->where('reestr_object.id_reestr_subject', $params['id_reestr_subject']);
			}
			if($params['mf_region_sbj'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_region', $params['mf_region_sbj']);
			}
			if($params['mf_district_sbj'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_district', $params['mf_district_sbj']);
			}
			if($params['mf_city_sbj'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_city', $params['mf_city_sbj']);
			}
			if($params['mf_cityzone_sbj'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_city_zone', $params['mf_cityzone_sbj']);
			}
			if($params['mf_street_sbj'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_street', '%'.trim($params['mf_street_sbj']).'%', 'LIKE');
			}
			
			if($params['mf_region_sbj_post'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.post_address_region', $params['mf_region_sbj_post']);
			}
			if($params['mf_district_sbj_post'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.post_address_district', $params['mf_district_sbj_post']);
			}
			if($params['mf_city_sbj_post'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.post_address_city', $params['mf_city_sbj_post']);
			}
			if($params['mf_street_sbj_post'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.post_address_street', '%'.trim($params['mf_street_sbj_post']).'%', 'LIKE');
			}
			
			
			if($params['mf_branch_sbj'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.spr_branch', $params['mf_branch_sbj']);
			}
			if($params['mf_podrazdelenie_sbj'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.spr_podrazdelenie', $params['mf_podrazdelenie_sbj']);
			}
			if($params['mf_otdel_sbj'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.spr_otdel', $params['mf_otdel_sbj']);
			}
			
			
			if($params['mf_region_obj'] > 0){
				$sql = $this->queryBuilder->where('reestr_object.address_region', $params['mf_region_obj']);
			}
			if($params['mf_district_obj'] > 0){
				$sql = $this->queryBuilder->where('reestr_object.address_district', $params['mf_district_obj']);
			}
			if($params['mf_city_obj'] > 0){
				$sql = $this->queryBuilder->where('reestr_object.address_city', $params['mf_city_obj']);
			}
			if(strlen($params['mf_street_obj']) > 0){
				$sql = $this->queryBuilder->where('reestr_object.address_street', '%'.trim($params['mf_street_obj']).'%', 'LIKE');
			}
			if(strlen($params['mf_NameSbj']) > 0){
				$sql = $this->queryBuilder->where('reestr_subject.name', '%'.trim($params['mf_NameSbj']).'%', 'LIKE');
			}
			if(strlen($params['mf_NameObject']) > 0){
				$sql = $this->queryBuilder->where('reestr_object.name', '%'.trim($params['mf_NameObject']).'%', 'LIKE');
			}
			
			$sql = $this->queryBuilder->orderBy('reestr_object.name', 'ASC');
			
            $sql = $this->queryBuilder->sql();

        //echo $sql;
		return $this->db->query($sql, $this->queryBuilder->values);
		
	}
	
	
	public function setNewSbj($params)
	{
			//print_r($params);
		if(strlen($params['id_sbj'])>0){
			$sql = $this->queryBuilder->update('reestr_object')
			->set(['id_reestr_subject' => $params['NewSbjId']])
			->where('id_reestr_subject', $params['id_sbj'])
			->sql();
			
			return $this->db->query($sql, $this->queryBuilder->values);
		}else{
			
			$objects = new Objects($params['objects_id']);
			
			$objects->setId_reestr_subject($params['NewSbjId']);
			
			$objectsId = $objects->save();
		}
		
			
	}
	
	public function getObjsBySbjInsp($id_reestr_subject)
	{
		
		//print_r($params);
		  $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.name AS reestr_object_name, reestr_object.e_insp AS reestr_object_e_insp, reestr_object.t_insp AS reestr_object_t_insp, reestr_object.ti_insp AS reestr_object_ti_insp, reestr_object.g_insp AS reestr_object_g_insp, reestr_object.id_reestr_subject AS reestr_subject_id_reestr_subject, reestr_object.address_index, reestr_object.address_region, reestr_object.address_district, reestr_object.address_city, reestr_object.address_city_zone, reestr_object.address_street, reestr_object.address_building, reestr_object.address_flat, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, users_t.fio AS users_fio_t, users_ti.fio AS users_fio_ti, users_e.fio AS users_fio_e, users_g.fio AS users_fio_g, reestr_object.t_is, reestr_object.ti_is, reestr_object.gaz_is, reestr_object.is_dom, reestr_object.del_e, reestr_object.del_t, reestr_object.del_ti, reestr_object.del_g, inactive_e, inactive_g, inactive_t, inactive_ti, g_vid_dym_vstr, g_vid_dym_pr, g_vid_dym_koak, g_mat_dym, reestr_object.elektro_is, reestr_object.type_object, spr_branch_e.sokr_name as name_branch_e, spr_branch_t.sokr_name as name_branch_t, spr_branch_ti.sokr_name as name_branch_ti, spr_branch_g.sokr_name as name_branch_g')
            ->from('reestr_object')
			->joinLeftTable('spr_region', 'spr_region.id = reestr_object.address_region')
			->joinLeftTable('spr_district', 'spr_district.id = reestr_object.address_district')
			->joinLeftTable('spr_city', 'spr_city.id = reestr_object.address_city')
			->joinLeftTable('users as users_t', 'users_t.id = reestr_object.t_insp')
			->joinLeftTable('users as users_e', 'users_e.id = reestr_object.e_insp')
			->joinLeftTable('users as users_g', 'users_g.id = reestr_object.g_insp')
			->joinLeftTable('users as users_ti', 'users_ti.id = reestr_object.ti_insp')
			->joinLeftTable('spr_branch as spr_branch_e', 'users_e.spr_cod_branch= spr_branch_e.id')
			->joinLeftTable('spr_branch as spr_branch_t', 'users_t.spr_cod_branch= spr_branch_t.id')
			->joinLeftTable('spr_branch as spr_branch_ti', 'users_ti.spr_cod_branch= spr_branch_ti.id')
			->joinLeftTable('spr_branch as spr_branch_g', 'users_g.spr_cod_branch= spr_branch_g.id')
			->where('id_reestr_subject', $id_reestr_subject)
			->orderBy('reestr_object.name', 'ASC')			
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
	}
	
	public function setNewInsp($params)
	{
			//print_r($params);
		if(strlen($params['arr_obj'])>0){
			
			$arr_obj = explode(",", $params['arr_obj']);
		
			$sql = $this->queryBuilder->update('reestr_object');
			
				if($params['arm_gruppa'] == 1){
					$sql = $this->queryBuilder ->set(['t_insp' => $params['new_insp'], 'ti_insp' => $params['new_insp']]);
				}elseif($params['arm_gruppa'] == 2){
					$sql = $this->queryBuilder ->set(['g_insp' => $params['new_insp']]);
				}elseif($params['arm_gruppa'] == 3){	
					$sql = $this->queryBuilder ->set(['e_insp' => $params['new_insp']]);
				}
				$n=0;
			foreach($arr_obj as $item){
				if($n == 0){
					$sql = $this->queryBuilder->where('id', $item);
				}else{
					$sql = $this->queryBuilder->orWhere('id', $item);
				}
				$n++;		
			}
				
			$sql = $this->queryBuilder->sql();
				
		
			return $this->db->query($sql, $this->queryBuilder->values);
		}else{
			
			
		}
		
			
	}

	public function getNameTypeOtvG($id)
    {
        $sql = $this->queryBuilder->select('spr_otv_vibor.id AS spr_otv_vibor_id, spr_otv_vibor.name AS spr_otv_vibor_name')
            ->from('spr_otv_vibor')
			->where('spr_otv_vibor.id', $id)
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }	
	
	public function getPersInfoByID2_g($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.otv_g2 AS reestr_object_otv_g2, reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_object')
			->joinLeftTable('reestr_personal', 'reestr_personal.id = reestr_object.otv_g2')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_object.otv_g2', $id)
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function getPersInfoByID_g($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.otv_g3 AS reestr_object_otv_g3, reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_object')
			->joinLeftTable('reestr_personal', 'reestr_personal.id = reestr_object.otv_g3')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_object.otv_g3', $id)
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function getPersInfoByID1_g($id)
    {
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.otv_g1 AS reestr_object_otv_g1, reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_object')
			->joinLeftTable('reestr_personal', 'reestr_personal.id = reestr_object.otv_g1')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_object.otv_g1', $id)
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }




	public function getObjectByIdAllObjects($params)
    {

		
        $sql = $this->queryBuilder->select('reestr_object.id, reestr_object.name AS reestr_object_name, reestr_object.e_insp AS reestr_object_e_insp, reestr_object.t_insp AS reestr_object_t_insp, reestr_object.ti_insp AS reestr_object_ti_insp, reestr_object.g_insp AS reestr_object_g_insp, reestr_object.id_reestr_subject AS reestr_subject_id_reestr_subject, reestr_object.address_index, reestr_object.address_region, reestr_object.address_district, reestr_object.address_city, reestr_object.address_city_zone, reestr_object.address_street, reestr_object.address_building, reestr_object.address_flat, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, users_t.fio AS users_fio_t, users_ti.fio AS users_fio_ti, users_e.fio AS users_fio_e, users_g.fio AS users_fio_g, reestr_object.t_is, reestr_object.ti_is, reestr_object.gaz_is, reestr_object.is_dom, reestr_object.del_e, reestr_object.del_t, reestr_object.del_ti, reestr_object.del_g, inactive_e, inactive_g, inactive_t, inactive_ti, g_vid_dym_vstr, g_vid_dym_pr, g_vid_dym_koak, g_mat_dym, reestr_object.elektro_is, reestr_object.type_object, spr_podrazd_e.sokr_name as name_podrazd_e, spr_podrazd_t.sokr_name as name_podrazd_t, spr_podrazd_ti.sokr_name as name_podrazd_ti, spr_podrazd_g.sokr_name as name_podrazd_g, spr_branch_e.sokr_name as name_branch_e, spr_branch_t.sokr_name as name_branch_t, spr_branch_ti.sokr_name as name_branch_ti, spr_branch_g.sokr_name as name_branch_g, spr_branch_e.id as id_branch_e, spr_branch_t.id as id_branch_t, spr_branch_ti.id as id_branch_ti, spr_branch_g.id as id_branch_g, users_t.spr_cod_otd AS users_cod_otd_t, users_ti.spr_cod_otd AS users_cod_otd_ti, users_e.spr_cod_otd AS users_cod_otd_e, users_g.spr_cod_otd AS users_cod_otd_g, spr_type_city.sokr_name AS spr_type_city_sokr_name, spr_type_street.sokr_name AS spr_type_street_sokr_name, reestr_object.address_city_zone, spr_city_zone.name AS spr_city_zone_name, spr_city.key_region AS spr_city_key_region')
            ->from('reestr_object')
			->joinLeftTable('spr_region', 'spr_region.id = reestr_object.address_region')
			->joinLeftTable('spr_district', 'spr_district.id = reestr_object.address_district')
			->joinLeftTable('spr_city', 'spr_city.id = reestr_object.address_city')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_object.address_city_type')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_object.address_street_type')
			->joinLeftTable('spr_city_zone', 'spr_city_zone.id = reestr_object.address_city_zone')
			->joinLeftTable('users as users_t', 'users_t.id = reestr_object.t_insp')
			->joinLeftTable('users as users_e', 'users_e.id = reestr_object.e_insp')
			->joinLeftTable('users as users_g', 'users_g.id = reestr_object.g_insp')
			->joinLeftTable('users as users_ti', 'users_ti.id = reestr_object.ti_insp')
			->joinLeftTable('spr_podrazdelenie as spr_podrazd_e', 'users_e.spr_cod_podrazd= spr_podrazd_e.id')
			->joinLeftTable('spr_podrazdelenie as spr_podrazd_t', 'users_t.spr_cod_podrazd= spr_podrazd_t.id')
			->joinLeftTable('spr_podrazdelenie as spr_podrazd_ti', 'users_ti.spr_cod_podrazd= spr_podrazd_ti.id')
			->joinLeftTable('spr_podrazdelenie as spr_podrazd_g', 'users_g.spr_cod_podrazd= spr_podrazd_g.id')
			->joinLeftTable('spr_branch as spr_branch_e', 'users_e.spr_cod_branch= spr_branch_e.id')
			->joinLeftTable('spr_branch as spr_branch_t', 'users_t.spr_cod_branch= spr_branch_t.id')
			->joinLeftTable('spr_branch as spr_branch_ti', 'users_ti.spr_cod_branch= spr_branch_ti.id')
			->joinLeftTable('spr_branch as spr_branch_g', 'users_g.spr_cod_branch= spr_branch_g.id')
			->where('id_reestr_subject', $params['id_subject']);
			
			/*************************************** ФИЛЬТР***********************************************************/

					
					
					/*if($params['id_all_objects_napr'] == 0 && $params['id_all_objects'] == 0){ */  //*************************все/все*********************//
						
					/*}*/
					if($params['id_all_objects_napr'] == 0 && $params['id_all_objects'] == 1){   //*************************все/действующие*********************//
						$sql = $this->queryBuilder->blockWhere('reestr_object.elektro_is = 1  OR reestr_object.t_is = 1  OR reestr_object.ti_is = 1 OR reestr_object.gaz_is = 1');
						$sql = $this->queryBuilder->blockWhere('((reestr_object.inactive_e IS NULL OR reestr_object.inactive_e = 0) AND (reestr_object.del_e IS NULL OR reestr_object.del_e = 0)) AND ((reestr_object.inactive_t IS NULL OR reestr_object.inactive_t = 0) AND (reestr_object.del_t IS NULL OR reestr_object.del_t = 0)) AND ((reestr_object.inactive_ti IS NULL OR reestr_object.inactive_ti = 0) AND (reestr_object.del_ti IS NULL OR reestr_object.del_ti = 0)) AND ((reestr_object.inactive_g IS NULL OR reestr_object.inactive_g = 0) AND (reestr_object.del_g IS NULL OR reestr_object.del_g = 0))');						
					}					
					if($params['id_all_objects_napr'] == 0 && $params['id_all_objects'] == 2){   //*************************все/недействующие*********************//
						$sql = $this->queryBuilder->blockWhere('reestr_object.inactive_e = 1  OR reestr_object.inactive_t = 1  OR reestr_object.inactive_ti = 1 OR reestr_object.inactive_g = 1');
						$sql = $this->queryBuilder->blockWhere('(reestr_object.del_e = 1 OR (reestr_object.elektro_is IS NULL OR reestr_object.elektro_is = 0) OR (reestr_object.elektro_is = 1 AND reestr_object.inactive_e = 1)) AND (reestr_object.del_t = 1 OR (reestr_object.t_is IS NULL OR reestr_object.t_is = 0) OR (reestr_object.t_is = 1 AND reestr_object.inactive_t = 1)) AND (reestr_object.del_ti = 1 OR (reestr_object.ti_is IS NULL OR reestr_object.ti_is = 0) OR (reestr_object.ti_is = 1 AND reestr_object.inactive_ti = 1)) AND (reestr_object.del_g = 1 OR  (reestr_object.gaz_is IS NULL OR reestr_object.gaz_is = 0)  OR (reestr_object.gaz_is = 1 AND reestr_object.inactive_g = 1))');	
					}					
					if($params['id_all_objects_napr'] == 0 && $params['id_all_objects'] == 3){   //*************************все/помечены на удаление*********************//

						$sql = $this->queryBuilder->blockWhere('reestr_object.del_e = 1 OR reestr_object.elektro_is IS NULL OR reestr_object.elektro_is = 0');
						$sql = $this->queryBuilder->blockWhere('reestr_object.del_t = 1 OR reestr_object.t_is IS NULL OR reestr_object.t_is = 0');
						$sql = $this->queryBuilder->blockWhere('reestr_object.del_ti = 1 OR reestr_object.ti_is IS NULL OR reestr_object.ti_is = 0');
						$sql = $this->queryBuilder->blockWhere('reestr_object.del_g = 1 OR reestr_object.gaz_is IS NULL OR reestr_object.gaz_is = 0');

					}					
					
					/**************************************************************************************************************************************************/
					
					if($params['id_all_objects_napr'] == 1 && $params['id_all_objects'] == 0){   //*************************электро/все*********************//
						$sql = $this->queryBuilder->where('reestr_object.elektro_is', 1);
					}
					if($params['id_all_objects_napr'] == 1 && $params['id_all_objects'] == 1){   //*************************электро/действующие*********************//
						$sql = $this->queryBuilder->blockWhere('reestr_object.elektro_is = 1 AND (reestr_object.inactive_e IS NULL OR reestr_object.inactive_e = 0) AND (reestr_object.del_e IS NULL OR reestr_object.del_e = 0)');
					}					
					if($params['id_all_objects_napr'] == 1 && $params['id_all_objects'] == 2){   //*************************электро/недействующие*********************//
						$sql = $this->queryBuilder->where('reestr_object.inactive_e', '1');
						$sql = $this->queryBuilder->where('reestr_object.del_e', '1','!=');
					}					
					if($params['id_all_objects_napr'] == 1 && $params['id_all_objects'] == 3){   //*************************электро/помечены на удаление*********************//
						$sql = $this->queryBuilder->where('reestr_object.del_e', '1');	
					}					
					
					/**************************************************************************************************************************************************/
					
					if($params['id_all_objects_napr'] == 2 && $params['id_all_objects'] == 0){   //*************************тепло/все*********************//
							$sql = $this->queryBuilder->where('reestr_object.t_is', 1);
					}
					if($params['id_all_objects_napr'] == 2 && $params['id_all_objects'] == 1){   //*************************тепло/действующие*********************//
						$sql = $this->queryBuilder->blockWhere('reestr_object.t_is = 1 AND (reestr_object.inactive_t IS NULL OR reestr_object.inactive_t = 0) AND (reestr_object.del_t IS NULL OR reestr_object.del_t = 0)');							
					}					
					if($params['id_all_objects_napr'] == 2 && $params['id_all_objects'] == 2){   //*************************тепло/недействующие*********************//
						$sql = $this->queryBuilder->where('reestr_object.inactive_t', '1');
						$sql = $this->queryBuilder->where('reestr_object.del_t', '1','!=');						
					}					
					if($params['id_all_objects_napr'] == 2 && $params['id_all_objects'] == 3){   //*************************тепло/помечены на удаление*********************//
						$sql = $this->queryBuilder->where('reestr_object.del_t', '1');	
					}					
					
					/**************************************************************************************************************************************************/
					
					if($params['id_all_objects_napr'] == 3 && $params['id_all_objects'] == 0){   //*************************ТИ/все*********************//
						$sql = $this->queryBuilder->where('reestr_object.ti_is', 1);
					}
					if($params['id_all_objects_napr'] == 3 && $params['id_all_objects'] == 1){   //*************************ТИ/действующие*********************//
						$sql = $this->queryBuilder->blockWhere('reestr_object.ti_is = 1 AND (reestr_object.inactive_ti IS NULL OR reestr_object.inactive_ti = 0) AND (reestr_object.del_ti IS NULL OR reestr_object.del_ti = 0)');							
					}					
					if($params['id_all_objects_napr'] == 3 && $params['id_all_objects'] == 2){   //*************************ТИ/недействующие*********************//
						$sql = $this->queryBuilder->where('reestr_object.inactive_ti', '1');
						$sql = $this->queryBuilder->where('reestr_object.del_ti', '1','!=');						
					}					
					if($params['id_all_objects_napr'] == 3 && $params['id_all_objects'] == 3){   //*************************ТИ/помечены на удаление*********************//
						$sql = $this->queryBuilder->where('reestr_object.del_ti', '1');	
					}					
					
					/**************************************************************************************************************************************************/
					
					if($params['id_all_objects_napr'] == 4 && $params['id_all_objects'] == 0){   //*************************газ/все*********************//
							$sql = $this->queryBuilder->where('reestr_object.gaz_is', 1);
					}
					if($params['id_all_objects_napr'] == 4 && $params['id_all_objects'] == 1){   //*************************газ/действующие*********************//
							$sql = $this->queryBuilder->blockWhere('reestr_object.gaz_is = 1 AND (reestr_object.inactive_g IS NULL OR reestr_object.inactive_g = 0) AND (reestr_object.del_g IS NULL OR reestr_object.del_g = 0)');							
					}					
					if($params['id_all_objects_napr'] == 4 && $params['id_all_objects'] == 2){   //*************************газ/недействующие*********************//
						$sql = $this->queryBuilder->where('reestr_object.inactive_g', '1');
						$sql = $this->queryBuilder->where('reestr_object.del_g', '1','!=');
					}					
					if($params['id_all_objects_napr'] == 4 && $params['id_all_objects'] == 3){   //*************************газ/помечены на удаление*********************//
						$sql = $this->queryBuilder->where('reestr_object.del_g', '1');	
					}					
					

			$sql = $this->queryBuilder->orderBy('reestr_object.name', 'ASC')
			->orderBy('spr_region_name', 'ASC')
			->orderBy('spr_district_name', 'ASC')
			->orderBy('spr_city_name', 'ASC')
			->orderBy('reestr_object.address_street', 'ASC')
			->orderBy('reestr_object.address_building', 'ASC')
			->orderBy('reestr_object.address_flat', 'ASC')
            ->sql();		
		

			/*if($params['inspection_type'] > 0){
				if($params['inspection_type']==1){

					$sql = $this->queryBuilder->where('reestr_object.elektro_is', 1);
					$sql = $this->queryBuilder->parenthesesOpen();
					$sql = $this->queryBuilder->where('reestr_object.del_e', '1','!=');
					$sql = $this->queryBuilder->orWhereIsNull('reestr_object.del_e');
					$sql = $this->queryBuilder->parenthesesClose();
					
				}
				if($params['inspection_type']==2){
					
					$sql = $this->queryBuilder->where('reestr_object.t_is', 1);
					$sql = $this->queryBuilder->where('reestr_object.del_t', 1,'!=');
					$sql = $this->queryBuilder->orWhereIsNull('reestr_object.del_t');
					
					
				}
				if($params['inspection_type']==3){
									
					$sql = $this->queryBuilder->where('reestr_object.ti_is', 1);
					$sql = $this->queryBuilder->where('reestr_object.del_ti', 1,'!=');
					$sql = $this->queryBuilder->orWhereIsNull('reestr_object.del_ti');
					
				}
				if($params['inspection_type']==4){
					
					$sql = $this->queryBuilder->where('reestr_object.gaz_is', 1);
					$sql = $this->queryBuilder->where('reestr_object.del_g', 1,'!=');
					$sql = $this->queryBuilder->orWhereIsNull('reestr_object.del_g');
					
				}
			}*/
			
			
						
            /*$sql = $this->queryBuilder->groupBy('reestr_subject.id', 'ASC')
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();*/
///print_r($sql);
/// echo $sql;     
		return $this->db->query($sql, $this->queryBuilder->values);
		
	
	}



	
}