<?php

namespace Examination\Model\Subject;

use Engine\Model;

class SubjectRepository extends Model
{

    public function getSubject()
    {
        $sql = $this->queryBuilder->select('reestr_subject.id AS id, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, reestr_object.id AS object_id, reestr_object.name AS object_name, users_e.id AS users_e_id, users_e.name AS users_e_name, users_t.id AS users_t_id, users_t.name AS users_t_name, users_g.id AS users_g_id, users_g.name AS users_g_name, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, COUNT(DISTINCT reestr_object.id) AS count_objects, reestr_subject.id_unp AS id_unp')
            ->from('reestr_subject')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('users as users_e', 'users_e.id = reestr_object.e_insp')
			->joinLeftTable('users as users_t', 'users_t.id = reestr_object.t_insp')
			->joinLeftTable('users as users_g', 'users_g.id = reestr_object.g_insp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->groupBy('reestr_subject.id', 'ASC')
            ->orderBy('reestr_subject.name', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSubjectByUnp($id)
    {
       
	   $sql = $this->queryBuilder->select('reestr_subject.id AS id, reestr_subject.name AS name, reestr_subject.id_unp AS id_unp, reestr_subject.id_ind_pers AS id_ind_pers, reestr_subject.num_case_s AS num_case_s, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, COUNT(DISTINCT reestr_object.id) AS count_objects, spr_city.name AS fname')
            ->from('reestr_subject')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('spr_city', 'reestr_subject.fname_address_city= spr_city.id')
			->where('reestr_subject.id_unp', $id)
			->groupBy('reestr_subject.id', 'ASC')
            ->orderBy('reestr_subject.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function getSubjectByIndPers($id)
    {
       
	   $sql = $this->queryBuilder->select('reestr_subject.id AS id, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, COUNT(DISTINCT reestr_object.id) AS count_objects, spr_city.name AS fname')
            ->from('reestr_subject')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('spr_city', 'reestr_subject.fname_address_city= spr_city.id')
			->where('reestr_subject.id_ind_pers', $id)
			->groupBy('reestr_subject.id', 'ASC')
            ->orderBy('reestr_subject.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
// список потребителей закрепленных за ответственным лицом	
	public function getSubjectByOtv($id)
    {
       
	   $sql = $this->queryBuilder->select('reestr_subject.id AS id, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, COUNT(DISTINCT reestr_object.id) AS count_objects, spr_city.name AS fname')
            ->from('reestr_subject')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('spr_city', 'reestr_subject.fname_address_city= spr_city.id')
			->where('reestr_subject.otv_e', $id)
			->orWhere('reestr_subject.otv_e1', $id)
			->orWhere('reestr_subject.otv_e2', $id)
			->orWhere('reestr_subject.otv_t', $id)
			->orWhere('reestr_subject.otv_t1', $id)
			->orWhere('reestr_subject.otv_g', $id)
			->orWhere('reestr_subject.otv_g1', $id)
			->groupBy('reestr_subject.id', 'ASC')
            ->orderBy('reestr_subject.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getSubjectByFullName($name)
    {
        $sql = $this->queryBuilder->select()
            ->from('reestr_subject')
            ->where('name', trim($name), 'LIKE')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	//убрали spr_otdel
	public function getSubjectByFullNameAndOtdel($name)
    {
        $sql = $this->queryBuilder->select()
            ->from('reestr_subject')
            ->whereReplace('name', trim($name), 'LIKE')
            //->where('spr_otdel', $spr_otdel)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

/** Потребители заданного филиала */	
	public function getSubjectByBranch($spr_branch)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id AS id, COUNT(reestr_object.id) AS count_objects, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, reestr_object.id AS object_id, reestr_object.name AS object_name, users_e.id AS users_e_id, users_e.name AS users_e_name, users_t.id AS users_t_id, users_t.name AS users_t_name, users_g.id AS users_g_id, users_g.name AS users_g_name, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, reestr_subject.id_unp AS id_unp, reestr_subject.id_ind_pers AS id_ind_pers')
            ->from('reestr_subject')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('users as users_e', 'users_e.id = reestr_object.e_insp')
			->joinLeftTable('users as users_t', 'users_t.id = reestr_object.t_insp')
			->joinLeftTable('users as users_g', 'users_g.id = reestr_object.g_insp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->where('users_e.spr_cod_branch', $spr_branch)
			->orWhere('users_t.spr_cod_branch', $spr_branch)
			->orWhere('users_g.spr_cod_branch', $spr_branch)
            ->groupBy('reestr_subject.id', 'ASC')
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

/** Потребители заданного МРО */	
	public function getSubjectByMro($spr_podrazdelenie)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id AS id, COUNT(reestr_object.id) AS count_objects, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, reestr_object.id AS object_id, reestr_object.name AS object_name, users_e.id AS users_e_id, users_e.name AS users_e_name, users_t.id AS users_t_id, users_t.name AS users_t_name, users_g.id AS users_g_id, users_g.name AS users_g_name, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, reestr_subject.id_unp AS id_unp, reestr_subject.id_ind_pers AS id_ind_pers')
            ->from('reestr_subject')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('users as users_e', 'users_e.id = reestr_object.e_insp')
			->joinLeftTable('users as users_t', 'users_t.id = reestr_object.t_insp')
			->joinLeftTable('users as users_g', 'users_g.id = reestr_object.g_insp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->where('users_e.spr_cod_podrazd', $spr_podrazdelenie)
			->orWhere('users_t.spr_cod_podrazd', $spr_podrazdelenie)
			->orWhere('users_g.spr_cod_podrazd', $spr_podrazdelenie)
            ->groupBy('reestr_subject.id', 'ASC')
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	/** Потребители заданной группы */	
	public function getSubjectByGroup($spr_otdel)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id AS id, COUNT(reestr_object.id) AS count_objects, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, reestr_object.id AS object_id, reestr_object.name AS object_name, users_e.id AS users_e_id, users_e.name AS users_e_name, users_t.id AS users_t_id, users_t.name AS users_t_name, users_g.id AS users_g_id, users_g.name AS users_g_name, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, reestr_subject.id_unp AS id_unp, reestr_subject.id_ind_pers AS id_ind_pers')
            ->from('reestr_subject')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('users as users_e', 'users_e.id = reestr_object.e_insp')
			->joinLeftTable('users as users_t', 'users_t.id = reestr_object.t_insp')
			->joinLeftTable('users as users_g', 'users_g.id = reestr_object.g_insp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->where('users_e.spr_cod_otd', $spr_otdel)
			->orWhere('users_t.spr_cod_otd', $spr_otdel)
			->orWhere('users_g.spr_cod_otd', $spr_otdel)
			->groupBy('reestr_subject.id', 'ASC')
            ->orderBy('reestr_subject.name', 'ASC')
            ->sql();
//echo $sql;
        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	/** Потребители заданного пользователя */	
	public function getSubjectByUser($id_user)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id AS id, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, COUNT(reestr_object.id) AS count_objects, reestr_object.id AS object_id, reestr_object.name AS object_name, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, reestr_subject.id_unp AS id_unp, reestr_subject.id_ind_pers AS id_ind_pers')
            ->from('reestr_subject')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->where('reestr_object.e_insp', $id_user)
			->orWhere('reestr_object.t_insp', $id_user)
			->orWhere('reestr_object.ti_insp', $id_user)
			->orWhere('reestr_object.g_insp', $id_user)
			
            ->groupBy('reestr_subject.id', 'ASC')
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('reestr_subject')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}





    public function getSubjectData($id)
    {
        $subject = new Subject($id);

        return $subject->findOne();
    }

	public function getSubjectByName($name, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_subject.id, reestr_subject.name AS reestr_subject_name, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.id_ind_pers AS reestr_subject_id_ind_pers, reestr_subject.place_address_index, reestr_subject.place_address_region, reestr_subject.place_address_district, reestr_subject.place_address_city, reestr_subject.place_address_city_zone, reestr_subject.place_address_street, reestr_subject.place_address_building, reestr_subject.place_address_flat, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name')
            ->from('reestr_subject reestr_subject')
			->joinLeftTable('spr_region spr_region', 'spr_region.id = reestr_subject.place_address_region')
			->joinLeftTable('spr_district spr_district', 'spr_district.id = reestr_subject.place_address_district')
			->joinLeftTable('spr_city spr_city', 'spr_city.id = reestr_subject.place_address_city')
			->where('reestr_subject.name', '%'.trim($name).'%', 'LIKE')
            ->orderBy('reestr_subject.name', 'ASC')
			->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getSubjectByNameSource($name, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_subject.id, reestr_subject.name AS reestr_subject_name, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.id_ind_pers AS reestr_subject_id_ind_pers, reestr_subject.place_address_index, reestr_subject.place_address_region, reestr_subject.place_address_district, reestr_subject.place_address_city, reestr_subject.place_address_city_zone, reestr_subject.place_address_street, reestr_subject.place_address_building, reestr_subject.place_address_flat, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, reestr_object.id AS reestr_object_id, reestr_object.id_reestr_subject AS reestr_object_id_reestr_subject, reestr_object.name AS reestr_object_name, reestr_object.ti_is AS reestr_object_ti_is, reestr_object.ti_name AS reestr_object_ti_name, reestr_object.e_subobj_power AS reestr_object_e_subobj_power')
            ->from('reestr_subject reestr_subject')
			->joinLeftTable('spr_region spr_region', 'spr_region.id = reestr_subject.place_address_region')
			->joinLeftTable('spr_district spr_district', 'spr_district.id = reestr_subject.place_address_district')
			->joinLeftTable('spr_city spr_city', 'spr_city.id = reestr_subject.place_address_city')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->where('reestr_subject.name', '%'.trim($name).'%', 'LIKE')
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }












	public function getRespSubjectE1($id)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.id_ind_pers AS reestr_subject_id_ind_pers, reestr_subject.name AS reestr_subject_name, reestr_subject.otv_e1 AS reestr_subject_otv_e1, reestr_subject.otv_type_e AS reestr_subject_otv_type_e, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.otv_e2 AS reestr_subject_otv_e2, reestr_subject.otv_type_t AS reestr_subject_otv_type_t, reestr_subject.otv_t1 AS reestr_subject_otv_t1, reestr_subject.otv_type_g AS reestr_subject_otv_type_g, reestr_subject.otv_g1 AS reestr_subject_otv_g1, reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_subject reestr_subject')
			->joinLeftTable('reestr_personal', 'reestr_personal.id = reestr_subject.otv_e1')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_subject.id', $id)
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }
	public function getRespSubjectE2($id)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.id_ind_pers AS reestr_subject_id_ind_pers, reestr_subject.name AS reestr_subject_name, reestr_subject.otv_e1 AS reestr_subject_otv_e1, reestr_subject.otv_type_e AS reestr_subject_otv_type_e, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.otv_e2 AS reestr_subject_otv_e2, reestr_subject.otv_type_t AS reestr_subject_otv_type_t, reestr_subject.otv_t1 AS reestr_subject_otv_t1, reestr_subject.otv_type_g AS reestr_subject_otv_type_g, reestr_subject.otv_g1 AS reestr_subject_otv_g1, reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_subject reestr_subject')
			->joinLeftTable('reestr_personal', 'reestr_personal.id = reestr_subject.otv_e2')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_subject.id', $id)
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }
	public function getRespSubjectT($id)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.id_ind_pers AS reestr_subject_id_ind_pers, reestr_subject.name AS reestr_subject_name, reestr_subject.otv_e1 AS reestr_subject_otv_e1, reestr_subject.otv_type_e AS reestr_subject_otv_type_e, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.otv_e2 AS reestr_subject_otv_e2, reestr_subject.otv_type_t AS reestr_subject_otv_type_t, reestr_subject.otv_t1 AS reestr_subject_otv_t1, reestr_subject.otv_type_g AS reestr_subject_otv_type_g, reestr_subject.otv_g1 AS reestr_subject_otv_g1, reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_subject reestr_subject')
			->joinLeftTable('reestr_personal', 'reestr_personal.id = reestr_subject.otv_t1')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_subject.id', $id)
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }
	public function getRespSubjectG($id)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.id_ind_pers AS reestr_subject_id_ind_pers, reestr_subject.name AS reestr_subject_name, reestr_subject.otv_e1 AS reestr_subject_otv_e1, reestr_subject.otv_type_e AS reestr_subject_otv_type_e, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.otv_e2 AS reestr_subject_otv_e2, reestr_subject.otv_type_t AS reestr_subject_otv_type_t, reestr_subject.otv_t1 AS reestr_subject_otv_t1, reestr_subject.otv_type_g AS reestr_subject_otv_type_g, reestr_subject.otv_g1 AS reestr_subject_otv_g1, reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_subject reestr_subject')
			->joinLeftTable('reestr_personal', 'reestr_personal.id = reestr_subject.otv_g1')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_subject.id', $id)
			->orderBy('reestr_subject.name', 'ASC')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }









    public function createSubject($params)
    {
		
        $subject = new Subject;
//print_r($params);
		if(strlen($params['id_unp'])>0){
			$subject->setId_unp($params['id_unp']);
		}
		if(strlen($params['id_unp_head'])>0){
			$subject->setId_unpHead($params['id_unp_head']);
		}		
		if(strlen($params['id_ind_pers'])>0){
			$subject->setId_ind_pers($params['id_ind_pers']);
		}		
		if(isset($params['name'])){
		//if(isset($params['name']) && strlen($params['name'])>0){
			$subject->setName($params['name']);
		}
		if(isset($params['custom_name'])){
			$subject->setCustom_name($params['custom_name']);
		}		
		if(strlen($params['type_property'])>0){
			$subject->setType_property($params['type_property']);
		}	
		if(strlen($params['type_department'])>0){
			$subject->setType_department($params['type_department']);
		}
		if(strlen($params['place_address_index'])>0){
			$subject->setPlace_address_index($params['place_address_index']);
		}
		if(strlen($params['place_address_region'])>0){
			$subject->setPlace_address_region($params['place_address_region']);
		}
		if(strlen($params['place_address_district'])>0){
			$subject->setPlace_address_district($params['place_address_district']);
		}
		if(strlen($params['place_address_city'])>0){
			$subject->setPlace_address_city($params['place_address_city']);
		}
		if(strlen($params['place_address_city_zone'])>0){
			$subject->setPlace_address_city_zone($params['place_address_city_zone']);
		}
		if(strlen($params['place_address_street'])>0){
			$subject->setPlace_address_street($params['place_address_street']);
		}
		if(strlen($params['place_address_street_type'])>0){
			$subject->setPlace_address_street_type($params['place_address_street_type']);
		}
		if(strlen($params['place_address_city_type'])>0){
			$subject->setPlace_address_city_type($params['place_address_city_type']);
		}
		if(strlen($params['place_address_building'])>0){
			$subject->setPlace_address_building($params['place_address_building']);
		}
		if(strlen($params['place_address_flat'])>0){
			$subject->setPlace_address_flat($params['place_address_flat']);
		}
		
		if(isset($params['fname_address_region'])){
			if(strlen($params['fname_address_region'])>0){
				$subject->setFname_address_region($params['fname_address_region']);
			}
			if(strlen($params['fname_address_district'])>0){
				$subject->setFname_address_district($params['fname_address_district']);
			}
			if(strlen($params['fname_address_city'])>0){
				$subject->setFname_address_city($params['fname_address_city']);
			}
		}
		
		if(strlen($params['copy_postaddress'])>0){
			$subject->setCopy_postaddress($params['copy_postaddress']);
		}

		if(strlen($params['post_address_index'])>0){
			$subject->setPost_address_index($params['post_address_index']);
		}
		if(strlen($params['post_address_region'])>0){
			$subject->setPost_address_region($params['post_address_region']);
		}		
		if(strlen($params['post_address_district'])>0){
			$subject->setPost_address_district($params['post_address_district']);
		}
		if(strlen($params['post_address_city'])>0){
			$subject->setPost_address_city($params['post_address_city']);
		}		
		if(strlen($params['post_address_city_zone'])>0){
			$subject->setPost_address_city_zone($params['post_address_city_zone']);
		}
		if(strlen($params['post_address_street'])>0){
			$subject->setPost_address_street($params['post_address_street']);
		}
		if(strlen($params['post_address_street_type'])>0){
			$subject->setPost_address_street_type($params['post_address_street_type']);
		}
		if(strlen($params['post_address_city_type'])>0){
			$subject->setPost_address_city_type($params['post_address_city_type']);
		}
		if(strlen($params['post_address_building'])>0){
			$subject->setPost_address_building($params['post_address_building']);
		}
		if(strlen($params['post_address_flat'])>0){
			$subject->setPost_address_flat($params['post_address_flat']);
		}	
		if(strlen($params['type_activity'])>0){
			$subject->setType_activity($params['type_activity']);
		}
		if(strlen($params['shift_work'])>0){
			$subject->setShift_work($params['shift_work']);
		}
		
		if(strlen($params['supply_name'])>0){
			$subject->setSupply_name($params['supply_name']);
		}
		if(strlen($params['supply_dog_num'])>0){
			$subject->setSupply_dog_num($params['supply_dog_num']);
		}
		if(strlen($params['supply_dog_date'])>0){
			$subject->setSupply_dog_date($params['supply_dog_date']);
		}
		
		if(strlen($params['supply_name_t'])>0){
			$subject->setSupply_name_t($params['supply_name_t']);
		}
		if(strlen($params['supply_dog_num_t'])>0){
			$subject->setSupply_dog_num_t($params['supply_dog_num_t']);
		}
		if(strlen($params['supply_dog_date_t'])>0){
			$subject->setSupply_dog_date_t($params['supply_dog_date_t']);
		}
		
		if(strlen($params['ruk_firstname'])>0){
			$subject->setRuk_firstname($params['ruk_firstname']);
		}		
		if(strlen($params['ruk_secondname'])>0){
			$subject->setRuk_secondname($params['ruk_secondname']);
		}		
		if(strlen($params['ruk_lastname'])>0){
			$subject->setRuk_lastname($params['ruk_lastname']);
		}
		if(strlen($params['ruk_tel'])>0){
			$subject->setRuk_tel($params['ruk_tel']);
		}
		if(strlen($params['gi_firstname'])>0){
			$subject->setGi_firstname($params['gi_firstname']);
		}
		if(strlen($params['gi_secondname'])>0){
			$subject->setGi_secondname($params['gi_secondname']);
		}
		if(strlen($params['gi_lastname'])>0){
			$subject->setGi_lastname($params['gi_lastname']);
		}
		if(strlen($params['gi_tel'])>0){
			$subject->setGi_tel($params['gi_tel']);
		}

		
		if(strlen($params['ge_firstname'])>0){
			$subject->setGe_firstname($params['ge_firstname']);
		}
		if(strlen($params['ge_secondname'])>0){
			$subject->setGe_secondname($params['ge_secondname']);
		}
		if(strlen($params['ge_lastname'])>0){
			$subject->setGe_lastname($params['ge_lastname']);
		}
		if(strlen($params['ge_tel'])>0){
			$subject->setGe_tel($params['ge_tel']);
		}		
		if(strlen($params['num_case_s'])>0){
			$subject->setNum_case_s($params['num_case_s']);
		}			
		

		if(strlen($params['spr_branch'])>0){
			$subject->setSpr_branch($params['spr_branch']);
		}
		if(strlen($params['spr_podrazdelenie'])>0){
			$subject->setSpr_podrazdelenie($params['spr_podrazdelenie']);
		}
		if(strlen($params['spr_otdel'])>0){
			$subject->setSpr_otdel($params['spr_otdel']);
		}
		if(strlen($params['otv_type_e'])>0){
			$subject->setOtv_type_e($params['otv_type_e']);
		}
		if(strlen($params['otv_e1'])>0){
			$subject->setOtv_e1($params['otv_e1']);
		}
		if(strlen($params['otv_e2'])>0){
			$subject->setOtv_e2($params['otv_e2']);
		}
		if(strlen($params['order_num_e1'])>0){
			$subject->setOrder_num_e1($params['order_num_e1']);
		}
		if(strlen($params['order_num_e2'])>0){
			$subject->setOrder_num_e2($params['order_num_e2']);
		}		
		if(strlen($params['order_data_e1'])>0){
			$subject->setOrder_data_e1($params['order_data_e1']);
		}
		if(strlen($params['order_data_e2'])>0){
			$subject->setOrder_data_e2($params['order_data_e2']);
		}
		if(strlen($params['dog_num_e'])>0){
			$subject->setDog_num_e($params['dog_num_e']);
		}		
		if(strlen($params['dog_data_e'])>0){
			$subject->setDog_data_e($params['dog_data_e']);
		}		
		if(strlen($params['ins_data_e'])>0){
			$subject->setIns_data_e($params['ins_data_e']);
		}		
		if(strlen($params['otv_type_t'])>0){
			$subject->setOtv_type_t($params['otv_type_t']);
		}
		if(strlen($params['otv_t'])>0){
			$subject->setOtv_t1($params['otv_t']);
		}
		if(strlen($params['order_num_t'])>0){
			$subject->setOrder_num_t1($params['order_num_t']);
		}
		if(strlen($params['order_data_t'])>0){
			$subject->setOrder_data_t1($params['order_data_t']);
		}
		if(strlen($params['dog_num_t'])>0){
			$subject->setDog_num_t1($params['dog_num_t']);
		}		
		if(strlen($params['dog_data_t'])>0){
			$subject->setDog_data_t1($params['dog_data_t']);
		}
		if(strlen($params['otv_type_g'])>0){
			$subject->setOtv_type_g($params['otv_type_g']);
		}
		if(strlen($params['otv_g'])>0){
			$subject->setOtv_g1($params['otv_g']);
		}
		if(strlen($params['order_num_g'])>0){
			$subject->setOrder_num_g1($params['order_num_g']);
		}
		if(strlen($params['order_data_g'])>0){
			$subject->setOrder_data_g1($params['order_data_g']);
		}
		if(strlen($params['dog_num_g'])>0){
			$subject->setDog_num_g1($params['dog_num_g']);
		}		
		if(strlen($params['dog_data_g'])>0){
			$subject->setDog_data_g1($params['dog_data_g']);
		}
		
		$subject->setCreate_date();
		
		$subject->setCreate_user($params['id_user']);



		$subjectId = $subject->save();

      return $subjectId;
    }


    public function updateSubject($params)
    {

//print_r($params);
        if (isset($params['subject_id'])) {
					$subject = new Subject($params['subject_id']);	
					
				if(isset($params['id_unp'])){
					$subject->setId_unp($params['id_unp']);
				}
				if(isset($params['id_unp_head'])){
					$subject->setId_unpHead($params['id_unp_head']);
				}		
				if(isset($params['id_ind_pers'])){
					$subject->setId_ind_pers($params['id_ind_pers']);
				}	
				if(isset($params['name'])){		
				//if(strlen($params['name'])>0){
					$subject->setName($params['name']);
				}	
				if(isset($params['custom_name'])){
					$subject->setCustom_name($params['custom_name']);
				}
				if(isset($params['type_property'])){
					$subject->setType_property($params['type_property']);
				}	
				if(isset($params['type_department'])){
					$subject->setType_department($params['type_department']);
				}
				if(isset($params['place_address_index'])){
					$subject->setPlace_address_index($params['place_address_index']);
				}
				if(isset($params['place_address_region'])){
					$subject->setPlace_address_region($params['place_address_region']);
				}
				if(isset($params['place_address_district'])){
					$subject->setPlace_address_district($params['place_address_district']);
				}
				if(isset($params['place_address_city'])){
					$subject->setPlace_address_city($params['place_address_city']);
				}
				if(isset($params['place_address_city_zone'])){
					$subject->setPlace_address_city_zone($params['place_address_city_zone']);
				}
				if(isset($params['place_address_street'])){
					$subject->setPlace_address_street($params['place_address_street']);
				}
				if(isset($params['place_address_street_type'])){
					$subject->setPlace_address_street_type($params['place_address_street_type']);
				}
				if(isset($params['place_address_city_type'])){
					$subject->setPlace_address_city_type($params['place_address_city_type']);
				}
				if(isset($params['place_address_building'])){
					$subject->setPlace_address_building($params['place_address_building']);
				}
				if(isset($params['place_address_flat'])){
					$subject->setPlace_address_flat($params['place_address_flat']);
				}
				if(isset($params['copy_postaddress'])){
					$subject->setCopy_postaddress($params['copy_postaddress']);
				}

				if(isset($params['post_address_index'])){
					$subject->setPost_address_index($params['post_address_index']);
				}
				if(isset($params['post_address_region'])){
					$subject->setPost_address_region($params['post_address_region']);
				}		
				if(isset($params['post_address_district'])){
					$subject->setPost_address_district($params['post_address_district']);
				}
				if(isset($params['post_address_city'])){
					$subject->setPost_address_city($params['post_address_city']);
				}		
				if(isset($params['post_address_city_zone'])){
					$subject->setPost_address_city_zone($params['post_address_city_zone']);
				}
				if(isset($params['post_address_street'])){
					$subject->setPost_address_street($params['post_address_street']);
				}
				if(isset($params['post_address_street_type'])){
					$subject->setPost_address_street_type($params['post_address_street_type']);
				}
				if(isset($params['post_address_city_type'])){
					$subject->setPost_address_city_type($params['post_address_city_type']);
				}
				if(isset($params['post_address_building'])){
					$subject->setPost_address_building($params['post_address_building']);
				}
				if(isset($params['post_address_flat'])){
					$subject->setPost_address_flat($params['post_address_flat']);
				}

				if(isset($params['fname_address_region'])){
					$subject->setFname_address_region($params['fname_address_region']);
				}
				if(isset($params['fname_address_district'])){
					$subject->setFname_address_district($params['fname_address_district']);
				}
				if(isset($params['fname_address_city'])){
					$subject->setFname_address_city($params['fname_address_city']);
				}
				
				if(isset($params['type_activity'])){
					$subject->setType_activity($params['type_activity']);
				}
				if(isset($params['shift_work'])){
					$subject->setShift_work($params['shift_work']);
				}
				
				if(isset($params['supply_name'])){
					$subject->setSupply_name($params['supply_name']);
				}
				if(isset($params['supply_dog_num'])){
					$subject->setSupply_dog_num($params['supply_dog_num']);
				}
				if(isset($params['supply_dog_date'])){
					$subject->setSupply_dog_date($params['supply_dog_date']);
				}
				
				if(isset($params['supply_name_t'])){
					$subject->setSupply_name_t($params['supply_name_t']);
				}
				if(isset($params['supply_dog_num_t'])){
					$subject->setSupply_dog_num_t($params['supply_dog_num_t']);
				}
				if(isset($params['supply_dog_date_t'])){
					$subject->setSupply_dog_date_t($params['supply_dog_date_t']);
				}
				
				if(isset($params['ruk_firstname'])){
					$subject->setRuk_firstname($params['ruk_firstname']);
				}		
				if(isset($params['ruk_secondname'])){
					$subject->setRuk_secondname($params['ruk_secondname']);
				}		
				if(isset($params['ruk_lastname'])){
					$subject->setRuk_lastname($params['ruk_lastname']);
				}
				if(isset($params['ruk_tel'])){
					$subject->setRuk_tel($params['ruk_tel']);
				}
				if(isset($params['gi_firstname'])){
					$subject->setGi_firstname($params['gi_firstname']);
				}
				if(isset($params['gi_secondname'])){
					$subject->setGi_secondname($params['gi_secondname']);
				}
				if(isset($params['gi_lastname'])){
					$subject->setGi_lastname($params['gi_lastname']);
				}
				if(isset($params['gi_tel'])){
					$subject->setGi_tel($params['gi_tel']);
				}

				
				if(isset($params['ge_firstname'])){
					$subject->setGe_firstname($params['ge_firstname']);
				}
				if(isset($params['ge_secondname'])){
					$subject->setGe_secondname($params['ge_secondname']);
				}
				if(isset($params['ge_lastname'])){
					$subject->setGe_lastname($params['ge_lastname']);
				}
				if(isset($params['ge_tel'])){
					$subject->setGe_tel($params['ge_tel']);
				}		
				if(isset($params['num_case_s'])){
					$subject->setNum_case_s($params['num_case_s']);
				}

				if(isset($params['spr_branch'])){
					$subject->setSpr_branch($params['spr_branch']);
				}
				if(isset($params['spr_podrazdelenie'])){
					$subject->setSpr_podrazdelenie($params['spr_podrazdelenie']);
				}
				if(isset($params['spr_otdel'])){
					$subject->setSpr_otdel($params['spr_otdel']);
				}				
				if(isset($params['otv_type_e'])){
					$subject->setOtv_type_e($params['otv_type_e']);
				}
				if(isset($params['otv_e1'])){
					$subject->setOtv_e1($params['otv_e1']);
				}
				if(isset($params['otv_e2'])){
					$subject->setOtv_e2($params['otv_e2']);
				}
				if(isset($params['order_num_e1'])){
					$subject->setOrder_num_e1($params['order_num_e1']);
				}
				if(isset($params['order_num_e2'])){
					$subject->setOrder_num_e2($params['order_num_e2']);
				}		
				if(isset($params['order_data_e1'])){
					$subject->setOrder_data_e1($params['order_data_e1']);
				}
				if(isset($params['order_data_e2'])){
					$subject->setOrder_data_e2($params['order_data_e2']);
				}
				if(isset($params['dog_num_e'])){
					$subject->setDog_num_e($params['dog_num_e']);
				}		
				if(isset($params['dog_data_e'])){
					$subject->setDog_data_e($params['dog_data_e']);
				}		
				if(isset($params['ins_data_e'])){
					$subject->setIns_data_e($params['ins_data_e']);
				}		
				if(isset($params['otv_type_t'])){
					$subject->setOtv_type_t($params['otv_type_t']);
				}
				if(isset($params['otv_t'])){
					$subject->setOtv_t1($params['otv_t']);
				}
				if(isset($params['order_num_t'])){
					$subject->setOrder_num_t1($params['order_num_t']);
				}
				if(isset($params['order_data_t'])){
					$subject->setOrder_data_t1($params['order_data_t']);
				}
				if(isset($params['dog_num_t'])){
					$subject->setDog_num_t1($params['dog_num_t']);
				}		
				if(isset($params['dog_data_t'])){
					$subject->setDog_data_t1($params['dog_data_t']);
				}
				if(isset($params['otv_type_g'])){
					$subject->setOtv_type_g($params['otv_type_g']);
				}
				if(isset($params['otv_g'])){
					$subject->setOtv_g1($params['otv_g']);
				}
				if(isset($params['order_num_g'])){
					$subject->setOrder_num_g1($params['order_num_g']);
				}
				if(isset($params['order_data_g'])){
					$subject->setOrder_data_g1($params['order_data_g']);
				}
				if(isset($params['dog_num_g'])){
					$subject->setDog_num_g1($params['dog_num_g']);
				}		
				if(isset($params['dog_data_g'])){
					$subject->setDog_data_g1($params['dog_data_g']);
				}

				$subject->save();
        }
    }
	
	public function getSubjectsByFilter($params)
	{
		//print_r($params);
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		
		
		$sql = $this->queryBuilder->select('reestr_subject.id AS id, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, reestr_subject.spr_otdel AS spr_otdel, reestr_subject.spr_branch AS spr_branch, reestr_subject.spr_podrazdelenie AS spr_podrazdelenie, reestr_object.id AS object_id, count(reestr_object.id) AS count_object_id, reestr_object.name AS object_name, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, spr_region.name AS object_address_region, spr_district.name as object_address_district, spr_city.name as object_address_city, address_street AS object_address_street, address_building AS object_address_building, address_flat AS object_address_flat, num_case_o AS object_num_case_o, reestr_object.e_insp AS e_insp, reestr_object.t_insp AS t_insp, reestr_object.ti_insp AS ti_insp, reestr_object.g_insp AS g_insp, reestr_subject.id_unp AS id_unp, reestr_subject.id_ind_pers AS id_ind_pers')
            ->from('reestr_subject')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('spr_region', 'spr_region.id = reestr_object.address_region')
			->joinLeftTable('spr_district', 'spr_district.id = reestr_object.address_district')
			->joinLeftTable('spr_city', 'spr_city.id = reestr_object.address_city')
						
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			
			/*->joinLeftTable('spr_region', 'spr_region.id = reestr_subject.post_address_region')
			->joinLeftTable('spr_district', 'spr_district.id = reestr_subject.post_address_district')
			->joinLeftTable('spr_city', 'spr_city.id = reestr_subject.post_address_city')*/
			
			->joinLeftTable('spr_kind_of_activity', 'spr_kind_of_activity.id = reestr_subject.type_activity');
			
			
			
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
			if(strlen($params['mf_street_sbj']) > 0){
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
			if(strlen($params['mf_street_sbj_post']) > 0){
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
			$sql = $this->queryBuilder->groupBy('reestr_subject.id');
			$sql = $this->queryBuilder->orderBy('reestr_subject.name', 'ASC');

			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
			/*->orderBy('reestr_subject.name', 'ASC')*/
			
            $sql = $this->queryBuilder->sql();

        //echo $sql;
		return $this->db->query($sql, $this->queryBuilder->values);
	}
	
	public function renameSbj($params)
	{
		$sql = $this->queryBuilder->update('reestr_subject')
			->set(['reestr_subject.name' => $params['name']])
			->where('id', $params['id'])
			->where('custom_name', 1, '<>')
			->sql();
		
		$sql = $this->queryBuilder->sql();
		
		return $this->db->query($sql, $this->queryBuilder->values);
	}
	
	
	
	
	
	public function getSubjectsByMainPage($params)
	{

//print_r($params);
        $sql = $this->queryBuilder->select('reestr_subject.id AS id, COUNT(reestr_object.id) AS count_objects, reestr_subject.name AS name, reestr_subject.num_case_s AS num_case_s, reestr_subject.post_address_region AS post_address_region, reestr_subject.post_address_district AS post_address_district, reestr_subject.post_address_city AS post_address_city, reestr_subject.post_address_city_zone AS post_address_city_zone, reestr_subject.post_address_street AS post_address_street, reestr_subject.place_address_region AS place_address_region, reestr_subject.place_address_district  AS place_address_district, reestr_subject. place_address_city  AS  place_address_city , reestr_subject.place_address_city_zone AS place_address_city_zone, reestr_subject.place_address_street AS place_address_street, reestr_object.id AS object_id, reestr_object.name AS object_name, users_e.id AS users_e_id, users_e.name AS users_e_name, users_t.id AS users_t_id, users_t.name AS users_t_name, users_g.id AS users_g_id, users_g.name AS users_g_name, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, reestr_subject.id_unp AS id_unp, reestr_subject.id_ind_pers AS id_ind_pers')
        


		->from('reestr_subject')
			->joinLeftTable('reestr_object', 'reestr_subject.id = reestr_object.id_reestr_subject')
			->joinLeftTable('users as users_e', 'users_e.id = reestr_object.e_insp')
			->joinLeftTable('users as users_t', 'users_t.id = reestr_object.t_insp')
			->joinLeftTable('users as users_g', 'users_g.id = reestr_object.g_insp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->joinLeftTable('spr_region', 'spr_region.id = reestr_object.address_region')
			->joinLeftTable('spr_district', 'spr_district.id = reestr_object.address_district')
			->joinLeftTable('spr_city', 'spr_city.id = reestr_object.address_city');
						
			
			if(isset($params['id_user']) && $params['id_user'] > 0){
				$sql = $this->queryBuilder->where('reestr_object.e_insp', $params['id_user']);
				$sql = $this->queryBuilder->orWhere('reestr_object.t_insp', $params['id_user']);
				$sql = $this->queryBuilder->orWhere('reestr_object.ti_insp', $params['id_user']);
				$sql = $this->queryBuilder->orWhere('reestr_object.g_insp', $params['id_user']);
			}
			else if(isset($params['spr_otdel']) && $params['spr_otdel'] > 0){
				$sql = $this->queryBuilder->where('users_e.spr_cod_otd', $params['spr_otdel']);
				$sql = $this->queryBuilder->orWhere('users_t.spr_cod_otd', $params['spr_otdel']);
				$sql = $this->queryBuilder->orWhere('users_g.spr_cod_otd', $params['spr_otdel']);
			}
			else if(isset($params['spr_cod_podrazd']) && $params['spr_cod_podrazd'] > 0){
				$sql = $this->queryBuilder->where('users_e.spr_cod_podrazd', $params['spr_cod_podrazd']);
				$sql = $this->queryBuilder->orWhere('users_t.spr_cod_podrazd', $params['spr_cod_podrazd']);
				$sql = $this->queryBuilder->orWhere('users_g.spr_cod_podrazd', $params['spr_cod_podrazd']);
			}
			else if(isset($params['spr_cod_branch']) && $params['spr_cod_branch'] > 0){
				$sql = $this->queryBuilder->where('users_e.spr_cod_branch', $params['spr_cod_branch']);
				$sql = $this->queryBuilder->orWhere('users_t.spr_cod_branch', $params['spr_cod_branch']);
				$sql = $this->queryBuilder->orWhere('users_g.spr_cod_branch', $params['spr_cod_branch']);
			}



			//Фактический адрес
			if(isset($params['formRegionFact']) && $params['formRegionFact'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_region', $params['formRegionFact']);
			}
			if(isset($params['formDistrictFact']) && $params['formDistrictFact'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_district', $params['formDistrictFact']);
			}
			if(isset($params['formCityFact']) && $params['formCityFact'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_city', $params['formCityFact']);
			}
			if(isset($params['formCityZoneFact']) && $params['formCityZoneFact'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_city_zone', $params['formCityZoneFact']);
			}
			if(isset($params['formStreetFact']) && strlen($params['formStreetFact']) > 0){
				$sql = $this->queryBuilder->where('reestr_subject.place_address_street', '%'.trim($params['formStreetFact']).'%', 'LIKE');
			}
			
			//Почтовый адрес потребителя
			if(isset($params['formRegionPost']) && $params['formRegionPost'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.post_address_region', $params['formRegionPost']);
			}
			if(isset($params['formDistrictPost']) && $params['formDistrictPost'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.post_address_district', $params['formDistrictPost']);
			}
			if(isset($params['formCityPost']) && $params['formCityPost'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.post_address_city', $params['formCityPost']);
			}
			if(isset($params['formStreetPost']) && strlen($params['formStreetPost']) > 0){
				$sql = $this->queryBuilder->where('reestr_subject.post_address_street', '%'.trim($params['formStreetPost']).'%', 'LIKE');
			}

			//Закрепление потребителя за структурным подразделением
			if(isset($params['formBranchObject']) && $params['formBranchObject'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.spr_branch', $params['formBranchObject']);
			}
			if(isset($params['formPodrazdelenieObject']) && $params['formPodrazdelenieObject'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.spr_podrazdelenie', $params['formPodrazdelenieObject']);
			}
			if(isset($params['formOtdelObject']) && $params['formOtdelObject'] > 0){
				$sql = $this->queryBuilder->where('reestr_subject.spr_otdel', $params['formOtdelObject']);
			}

			//Адрес объекта
			if(isset($params['formRegionObject']) && $params['formRegionObject'] > 0){
				$sql = $this->queryBuilder->where('reestr_object.address_region', $params['formRegionObject']);
			}
			if(isset($params['formDistrictObject']) && $params['formDistrictObject'] > 0){
				$sql = $this->queryBuilder->where('reestr_object.address_district', $params['formDistrictObject']);
			}
			if(isset($params['formCityObject']) && $params['formCityObject'] > 0){
				$sql = $this->queryBuilder->where('reestr_object.address_city', $params['formCityObject']);
			}
			if(isset($params['formStreetObject']) && strlen($params['formStreetObject']) > 0){
				$sql = $this->queryBuilder->where('reestr_object.address_street', '%'.trim($params['formStreetObject']).'%', 'LIKE');
			}			



			$sql = $this->queryBuilder->groupBy('reestr_subject.id', 'ASC');
			$sql = $this->queryBuilder->orderBy('reestr_subject.name', 'ASC');

			
            $sql = $this->queryBuilder->sql();

        //echo $sql;
		return $this->db->query($sql, $this->queryBuilder->values);
	}	
	
	
	
	
	
	
	
	
	
	
}