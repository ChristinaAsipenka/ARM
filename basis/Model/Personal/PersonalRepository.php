<?php

namespace Basis\Model\Personal;

use Engine\Model;

class PersonalRepository extends Model
{

    public function getPersonal()
    {
        $sql = $this->queryBuilder->select()
            ->from('reestr_personal')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('reestr_personal')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	


/*****************************************************************************************/
    public function getPersonalData($id)
    {
        $resppers = new Personal($id);

        return $resppers->findOne();
    }


    public function createPersonal($params)
    {

        $resppers = new Personal;
        $resppers->setId_reestr_unp($params['id_reestr_unp']);
        $resppers->setFirstname($params['firstname']);
		$resppers->setSecondname($params['secondname']);
		$resppers->setLastname($params['lastname']);
		$resppers->setTel($params['tel']);
		$resppers->setEmail($params['email']);
		$resppers->setPost($params['post']);
		$resppers->setPost_data($params['post_data']);
		$resppersId = $resppers->save();

        return $resppersId;
    }


    public function updatePersonal($params)
    {
        if (isset($params['resp_pers_id'])) {
            $resppers = new Personal($params['resp_pers_id']);
			$resppers->setId_reestr_unp($params['id_reestr_unp']);
			$resppers->setFirstname($params['firstname']);
			$resppers->setSecondname($params['secondname']);
			$resppers->setLastname($params['lastname']);
			$resppers->setTel($params['tel']);
			$resppers->setEmail($params['email']);
			$resppers->setPost($params['post']);
			$resppers->setPost_data($params['post_data']);
            $resppers->save();
        }
    }
	
	
	public function getPersonalList($id)
    {
        $sql = $this->queryBuilder->select('reestr_personal.id, reestr_personal.id_reestr_unp, reestr_personal.firstname, reestr_personal.secondname, reestr_personal.lastname, reestr_personal.post, reestr_personal.post_data, reestr_personal.tel, reestr_personal.email, reestr_unp.name_short AS reestr_unp_name_short, COUNT(DISTINCT sbjotv_e.id) as sbjotv_e, COUNT(DISTINCT sbjotv_e1.id) as sbjotv_e1, COUNT(DISTINCT sbjotv_e2.id) as sbjotv_e2, COUNT(DISTINCT sbjotv_t.id) as sbjotv_t, COUNT(DISTINCT sbjotv_t1.id) as sbjotv_t1, COUNT(DISTINCT sbjotv_g.id) as sbjotv_g, COUNT(DISTINCT sbjotv_g1.id) as sbjotv_g1')
            ->from('reestr_personal')
			->joinTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->joinLeftTable('reestr_subject AS sbjotv_e',  'sbjotv_e.otv_e = reestr_personal.id' )
			->joinLeftTable('reestr_subject AS sbjotv_e1', 'sbjotv_e1.otv_e1 = reestr_personal.id')
			->joinLeftTable('reestr_subject AS sbjotv_e2', 'sbjotv_e2.otv_e2 = reestr_personal.id')
			->joinLeftTable('reestr_subject AS sbjotv_t',  'sbjotv_t.otv_t = reestr_personal.id' )
			->joinLeftTable('reestr_subject AS sbjotv_t1', 'sbjotv_t1.otv_t1 = reestr_personal.id')
			->joinLeftTable('reestr_subject AS sbjotv_g',  'sbjotv_g.otv_g = reestr_personal.id' )
			->joinLeftTable('reestr_subject AS sbjotv_g1', 'sbjotv_g1.otv_g1 = reestr_personal.id')
			->where('id_reestr_unp', $id)
			->groupBy('reestr_personal.id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

	
	public function getResponsible_by_params($params)
    {
        $sql = $this->queryBuilder->select('reestr_personal.id, reestr_personal.id_reestr_unp, reestr_personal.firstname, reestr_personal.secondname, reestr_personal.lastname, reestr_personal.post, reestr_personal.post_data, reestr_personal.tel, reestr_personal.email, reestr_unp.name_short AS reestr_unp_name_short, reestr_unp.unp AS reestr_unp_unp')
            ->from('reestr_personal')
			->joinTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_personal.firstname', '%'.trim($params).'%', 'LIKE')
			->orWhere('reestr_personal.secondname', '%'.trim($params).'%', 'LIKE')
			->orWhere('reestr_personal.lastname', '%'.trim($params).'%', 'LIKE')
			->groupBy('reestr_personal.id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

	
	public function getSpr_sob_otvList($id)
    {

		$sql = $this->queryBuilder->select('reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_personal')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('id_reestr_unp', $id)
            ->sql();	

        return $this->db->query($sql, $this->queryBuilder->values);
    }	
	
	public function getOtv_fio_sobList($id)
    {

		$sql = $this->queryBuilder->select('reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_personal')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('id_reestr_unp', $id)
            ->sql();	

        return $this->db->query($sql, $this->queryBuilder->values);
    }	

	public function getOtv_InfoList($id)
    {

		$sql = $this->queryBuilder->select('reestr_personal.id AS reestr_personal_id, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short, test_book_e.el_group AS test_book_e_el_group, test_book_e.test_validity AS test_book_e_test_validity, test_book_e.id AS test_book_e_id')
            ->from('reestr_personal')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->joinLeftTable('test_book_e', 'test_book_e.person_id = reestr_personal.id')
			->where('reestr_personal.id', $id)
			->orderBy('test_book_e.id', 'DESC')
			->LIMIT(1)
            ->sql();	

        return $this->db->query($sql, $this->queryBuilder->values);
    }	

	public function getPersonalResultTest($id)
    {

		$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.date, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, test_book_e.activity_line, test_book_e.person_id, spr_test_napr.id AS spr_test_napr_id, spr_test_napr.name AS spr_test_napr_name')
            ->from('test_book_e')
			->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line')
			->where('test_book_e.person_id', $id)
			->union_all('select test_book_g.id, test_book_g.date, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, test_book_g.activity_line, test_book_g.person_id, spr_test_napr.id AS spr_test_napr_id, spr_test_napr.name AS spr_test_napr_name from test_book_g LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_g.activity_line WHERE test_book_g.person_id= '.$id)
			->union_all('select test_book_t.id, test_book_t.date, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, test_book_t.activity_line, test_book_t.person_id, spr_test_napr.id AS spr_test_napr_id, spr_test_napr.name AS spr_test_napr_name from test_book_t  LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_t.activity_line WHERE test_book_t.person_id= '.$id)
			->orderBy('date', 'DESC')
            ->sql();	

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	
	public function getPersonalDataSrokByUser($id_user, $arm_group)
    {
			

			if($arm_group == 3){
				
				
				
				$sql = $this->queryBuilder->select('reestr_object.id AS reestr_object_id, reestr_object.id_reestr_subject AS id_reestr_subject, t_b_e.id, t_b_e.person_name, t_b_e.date, t_b_e.person_id, t_b_e.person_position, t_b_e.test_result, t_b_e.test_validity, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, t_b_e.record_mode, t_b_e.activity_line, spr_test_napr.name AS napr_name')
				->from('reestr_object')
				->joinLeftTable('reestr_subject', 'reestr_object.id_reestr_subject = reestr_subject.id')
				->joinLeftTable('test_book_e AS t_b_e', 'reestr_subject.otv_e1 = t_b_e.person_id || reestr_subject.otv_e2 = t_b_e.person_id || reestr_subject.otv_e3 = t_b_e.person_id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = t_b_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = t_b_e.activity_line')
				->where('reestr_object.e_insp', $id_user)
				->blockWhere('(reestr_subject.otv_e1 is not null AND reestr_subject.otv_e1 <> 0) OR (reestr_subject.otv_e2 is not null AND reestr_subject.otv_e2 <> 0) OR (reestr_subject.otv_e3 is not null AND reestr_subject.otv_e3 <> 0)')				
				->blockWhere('t_b_e.id =  (SELECT MAX(test_book_e.id) FROM test_book_e WHERE reestr_subject.otv_e1 = test_book_e.person_id || reestr_subject.otv_e2 = test_book_e.person_id || reestr_subject.otv_e3 = test_book_e.person_id)')
				->groupBy('reestr_subject.id', 'DESC')	
				
				->orderBy('date', 'DESC')

				->sql();
			
			}elseif($arm_group == 1){

				$sql = $this->queryBuilder->select('reestr_object.id AS reestr_object_id, reestr_object.id_reestr_subject AS id_reestr_subject, t_b_t.id, t_b_t.person_name, t_b_t.date, t_b_t.person_id, t_b_t.person_position, t_b_t.test_result, t_b_t.test_validity, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, t_b_t.record_mode, t_b_t.activity_line, spr_test_napr.name AS napr_name')
				->from('reestr_object')
				->joinLeftTable('reestr_subject', 'reestr_object.id_reestr_subject = reestr_subject.id')
				->joinLeftTable('test_book_t AS t_b_t', 'reestr_subject.otv_t1 = t_b_t.person_id || reestr_subject.otv_t2 = t_b_t.person_id || reestr_subject.otv_t3 = t_b_t.person_id')
				->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = t_b_t.test_reasons_t')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = t_b_t.activity_line')
				->blockWhere('reestr_object.t_insp ='.$id_user.' || reestr_object.ti_insp ='.$id_user)
				->blockWhere('(reestr_subject.otv_t1 is not null AND reestr_subject.otv_t1 <> 0) OR (reestr_subject.otv_t2 is not null AND reestr_subject.otv_t2 <> 0) OR (reestr_subject.otv_t3 is not null AND reestr_subject.otv_t3 <> 0)')				
				->blockWhere('t_b_t.id =  (SELECT MAX(test_book_t.id) FROM test_book_t WHERE reestr_subject.otv_t1 = test_book_t.person_id || reestr_subject.otv_t2 = test_book_t.person_id || reestr_subject.otv_t3 = test_book_t.person_id)')
				->groupBy('reestr_subject.id', 'DESC')	
				->orderBy('date', 'DESC')
				->sql();


			}elseif($arm_group == 2){

				$sql = $this->queryBuilder->select('reestr_object.id AS reestr_object_id, reestr_object.id_reestr_subject AS id_reestr_subject, t_b_g.id, t_b_g.person_name, t_b_g.date, t_b_g.person_id, t_b_g.person_position, t_b_g.test_result, t_b_g.test_validity, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, t_b_g.record_mode, t_b_g.activity_line, spr_test_napr.name AS napr_name')
				->from('reestr_object')
				->joinLeftTable('test_book_g AS t_b_g', 'reestr_object.otv_g1 = t_b_g.person_id || reestr_object.otv_g2 = t_b_g.person_id || reestr_object.otv_g3 = t_b_g.person_id')
				->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = t_b_g.test_reasons_g')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = t_b_g.activity_line')
				->where('reestr_object.g_insp',$id_user)
				->blockWhere('(reestr_object.otv_g1 is not null AND reestr_object.otv_g1 <> 0) OR (reestr_object.otv_g2 is not null AND reestr_object.otv_g2 <> 0) OR (reestr_object.otv_g3 is not null AND reestr_object.otv_g3 <> 0)')				
				->blockWhere('t_b_g.id =  (SELECT MAX(test_book_g.id) FROM test_book_g WHERE reestr_object.otv_g1 = test_book_g.person_id || reestr_object.otv_g2 = test_book_g.person_id || reestr_object.otv_g3 = test_book_g.person_id)')
				->groupBy('reestr_object.id', 'DESC')	
				->orderBy('date', 'DESC')
				->sql();


			}

        return $this->db->query($sql, $this->queryBuilder->values);
    }	
	
	public function getPersonalDataSrokByGroup($spr_otdel)
    {	
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.date, test_book_e.person_id, test_book_e.person_position, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_e')
				->joinLeftTable('test_book_e AS e2', 'test_book_e.person_id = e2.person_id AND test_book_e.id < e2.id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line')
				->where('test_book_e.otdel_id', $spr_otdel)
				->blockWhere('e2.person_id is null')
				->union_all('select test_book_t.id, test_book_t.person_name, test_book_t.date, test_book_t.person_id, test_book_t.person_position, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.activity_line, spr_test_napr.name AS napr_name FROM test_book_t  LEFT JOIN test_book_t AS t2 ON test_book_t.person_id = t2.person_id AND test_book_t.id < t2.id LEFT JOIN spr_test_reasons_teplo ON spr_test_reasons_teplo.id = test_book_t.test_reasons_t LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_t.activity_line WHERE test_book_t.otdel_id = '.$spr_otdel.' AND (t2.person_id is null )')
				->union_all('select test_book_g.id, test_book_g.person_name, test_book_g.date, test_book_g.person_id, test_book_g.person_position, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.activity_line, spr_test_napr.name AS napr_name FROM test_book_g  LEFT JOIN test_book_g AS g2 ON test_book_g.person_id = g2.person_id AND test_book_g.id < g2.id LEFT JOIN spr_test_reasons_gaz ON spr_test_reasons_gaz.id = test_book_g.test_reasons_g LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_g.activity_line WHERE test_book_g.otdel_id = '.$spr_otdel.' AND (g2.person_id is null )')
				->groupBy('id', 'DESC')	
				->orderBy('date', 'DESC')

				->sql();
//echo $sql;
			return $this->db->query($sql, $this->queryBuilder->values);
    }	


	public function getPersonalDataSrokByMro($spr_podrazdelenie)
	
	
    {
	
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.date, test_book_e.person_id, test_book_e.person_position, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_e')
				->joinLeftTable('test_book_e AS e2', 'test_book_e.person_id = e2.person_id AND test_book_e.id < e2.id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line')
				->where('test_book_e.podrazd_id', $spr_podrazdelenie)
				->blockWhere('e2.person_id is null')
				->union_all('select test_book_t.id, test_book_t.person_name, test_book_t.date, test_book_t.person_id, test_book_t.person_position, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.activity_line, spr_test_napr.name AS napr_name FROM test_book_t  LEFT JOIN test_book_t AS t2 ON test_book_t.person_id = t2.person_id AND test_book_t.id < t2.id LEFT JOIN spr_test_reasons_teplo ON spr_test_reasons_teplo.id = test_book_t.test_reasons_t LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_t.activity_line WHERE test_book_t.podrazd_id = '.$spr_podrazdelenie.' AND (t2.person_id is null )')
				->union_all('select test_book_g.id, test_book_g.person_name, test_book_g.date, test_book_g.person_id, test_book_g.person_position, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.activity_line, spr_test_napr.name AS napr_name FROM test_book_g  LEFT JOIN test_book_g AS g2 ON test_book_g.person_id = g2.person_id AND test_book_g.id < g2.id LEFT JOIN spr_test_reasons_gaz ON spr_test_reasons_gaz.id = test_book_g.test_reasons_g LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_g.activity_line WHERE test_book_g.podrazd_id = '.$spr_podrazdelenie.' AND (g2.person_id is null )')
				->groupBy('id', 'DESC')	
				->orderBy('date', 'DESC')

				->sql();
//echo $sql;
			return $this->db->query($sql, $this->queryBuilder->values);
    }	

	public function getPersonalDataSrokByBranch($spr_branch)
	
	
    {
	
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.date, test_book_e.person_id, test_book_e.person_position, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_e')
				->joinLeftTable('test_book_e AS e2', 'test_book_e.person_id = e2.person_id AND test_book_e.id < e2.id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line')
				->where('test_book_e.branch_id', $spr_branch)
				->blockWhere('e2.person_id is null')
				->union_all('select test_book_t.id, test_book_t.person_name, test_book_t.date, test_book_t.person_id, test_book_t.person_position, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.activity_line, spr_test_napr.name AS napr_name FROM test_book_t  LEFT JOIN test_book_t AS t2 ON test_book_t.person_id = t2.person_id AND test_book_t.id < t2.id LEFT JOIN spr_test_reasons_teplo ON spr_test_reasons_teplo.id = test_book_t.test_reasons_t LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_t.activity_line WHERE test_book_t.branch_id = '.$spr_branch.' AND (t2.person_id is null )')
				->union_all('select test_book_g.id, test_book_g.person_name, test_book_g.date, test_book_g.person_id, test_book_g.person_position, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.activity_line, spr_test_napr.name AS napr_name FROM test_book_g  LEFT JOIN test_book_g AS g2 ON test_book_g.person_id = g2.person_id AND test_book_g.id < g2.id LEFT JOIN spr_test_reasons_gaz ON spr_test_reasons_gaz.id = test_book_g.test_reasons_g LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_g.activity_line WHERE test_book_g.branch_id = '.$spr_branch.' AND (g2.person_id is null )')
				->groupBy('id', 'DESC')	
				->orderBy('date', 'DESC')

				->sql();
//echo $sql;
			return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function getPersonalDataSrok()
	
	
    {
	
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.date, test_book_e.person_id, test_book_e.person_position, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_e')
				->joinLeftTable('test_book_e AS e2', 'test_book_e.person_id = e2.person_id AND test_book_e.id < e2.id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line')
				->blockWhere('e2.person_id is null')
				->union_all('select test_book_t.id, test_book_t.person_name, test_book_t.date, test_book_t.person_id, test_book_t.person_position, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.activity_line, spr_test_napr.name AS napr_name FROM test_book_t  LEFT JOIN test_book_t AS t2 ON test_book_t.person_id = t2.person_id AND test_book_t.id < t2.id LEFT JOIN spr_test_reasons_teplo ON spr_test_reasons_teplo.id = test_book_t.test_reasons_t LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_t.activity_line WHERE t2.person_id is null ')
				->union_all('select test_book_g.id, test_book_g.person_name, test_book_g.date, test_book_g.person_id, test_book_g.person_position, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.activity_line, spr_test_napr.name AS napr_name FROM test_book_g  LEFT JOIN test_book_g AS g2 ON test_book_g.person_id = g2.person_id AND test_book_g.id < g2.id LEFT JOIN spr_test_reasons_gaz ON spr_test_reasons_gaz.id = test_book_g.test_reasons_g LEFT JOIN spr_test_napr ON spr_test_napr.id = test_book_g.activity_line WHERE g2.person_id is null')
				->groupBy('id', 'DESC')	
				->orderBy('date', 'DESC')

				->sql();

			return $this->db->query($sql, $this->queryBuilder->values);
    }

/**************************************** ФИЛЬТР ПРОВЕРКИ ЗНАНИЙ УАРАВЛЕНИЕ (склеивается из трех запросов по электро, тепло, газ)******************************************/
	public function getPersonal_Filter_E($params)
	{
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];	
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		
		

		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.date, test_book_e.person_id, test_book_e.person_position, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_e')
				->joinLeftTable('test_book_e AS e2', 'test_book_e.person_id = e2.person_id AND test_book_e.id < e2.id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line');
			
			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_e.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_e.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}			
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', date('Y-m-d'),'<');
			}
			$sql = $this->queryBuilder->blockWhere('e2.person_id is null');
			$sql = $this->queryBuilder->groupBy('id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}
	
	
	
	public function getPersonal_Filter_T($params)
	{
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_t.id, test_book_t.person_name, test_book_t.date, test_book_t.person_id, test_book_t.person_position, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_t')
				->joinLeftTable('test_book_t AS t2', 'test_book_t.person_id = t2.person_id AND test_book_t.id < t2.id')
				->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_t.activity_line');
			
			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}			
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', date('Y-m-d'),'<');
			}
			$sql = $this->queryBuilder->blockWhere('t2.person_id is null');
			$sql = $this->queryBuilder->groupBy('id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}

	public function getPersonal_Filter_G($params)
	{
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_g.id, test_book_g.person_name, test_book_g.date, test_book_g.person_id, test_book_g.person_position, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_g')
				->joinLeftTable('test_book_g AS g2', 'test_book_g.person_id = g2.person_id AND test_book_g.id < g2.id')
				->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_g.activity_line');
			
			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_g.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_g.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}			
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', date('Y-m-d'),'<');
			}
			$sql = $this->queryBuilder->blockWhere('g2.person_id is null');
			$sql = $this->queryBuilder->groupBy('id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}
/**************************************** ФИЛЬТР ПРОВЕРКИ ЗНАНИЙ ИНСПЕКТОРА (газ)******************************************/
	public function getPersonal_Filter_GInsp($params, $id_user)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('reestr_object.id AS reestr_object_id, reestr_object.id_reestr_subject AS id_reestr_subject, t_b_g.id, t_b_g.person_name, t_b_g.date, t_b_g.person_id, t_b_g.person_position, t_b_g.test_result, t_b_g.test_validity, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, t_b_g.record_mode, t_b_g.activity_line, spr_test_napr.name AS napr_name')
				->from('reestr_object')
				->joinLeftTable('test_book_g AS t_b_g', 'reestr_object.otv_g1 = t_b_g.person_id || reestr_object.otv_g2 = t_b_g.person_id || reestr_object.otv_g3 = t_b_g.person_id')
				->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = t_b_g.test_reasons_g')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = t_b_g.activity_line');

			
			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}			
			
			$sql = $this->queryBuilder->blockWhere('reestr_object.g_insp='.$id_user);
			$sql = $this->queryBuilder->blockWhere('(reestr_object.otv_g1 is not null AND reestr_object.otv_g1 <> 0) OR (reestr_object.otv_g2 is not null AND reestr_object.otv_g2 <> 0) OR (reestr_object.otv_g3 is not null AND reestr_object.otv_g3 <> 0)');				
			$sql = $this->queryBuilder->blockWhere('t_b_g.id =  (SELECT MAX(test_book_g.id) FROM test_book_g WHERE reestr_object.otv_g1 = test_book_g.person_id || reestr_object.otv_g2 = test_book_g.person_id || reestr_object.otv_g3 = test_book_g.person_id)');
			$sql = $this->queryBuilder->groupBy('reestr_object.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}
/**************************************** ФИЛЬТР ПРОВЕРКИ ЗНАНИЙ ИНСПЕКТОРА (электро)******************************************/
	public function getPersonal_Filter_EInsp($params, $id_user)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('reestr_object.id AS reestr_object_id, reestr_object.id_reestr_subject AS id_reestr_subject, t_b_e.id, t_b_e.person_name, t_b_e.date, t_b_e.person_id, t_b_e.person_position, t_b_e.test_result, t_b_e.test_validity, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, t_b_e.record_mode, t_b_e.activity_line, spr_test_napr.name AS napr_name')
				->from('reestr_object')
				->joinLeftTable('reestr_subject', 'reestr_object.id_reestr_subject = reestr_subject.id')
				->joinLeftTable('test_book_e AS t_b_e', 'reestr_subject.otv_e1 = t_b_e.person_id || reestr_subject.otv_e2 = t_b_e.person_id || reestr_subject.otv_e3 = t_b_e.person_id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = t_b_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = t_b_e.activity_line');


			
			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_validity', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}			
			
			$sql = $this->queryBuilder->blockWhere('reestr_object.e_insp='.$id_user);
			$sql = $this->queryBuilder->blockWhere('(reestr_subject.otv_e1 is not null AND reestr_subject.otv_e1 <> 0) OR (reestr_subject.otv_e2 is not null AND reestr_subject.otv_e2 <> 0) OR (reestr_subject.otv_e3 is not null AND reestr_subject.otv_e3 <> 0)');				
			$sql = $this->queryBuilder->blockWhere('t_b_e.id =  (SELECT MAX(test_book_e.id) FROM test_book_e WHERE reestr_subject.otv_e1 = test_book_e.person_id || reestr_subject.otv_e2 = test_book_e.person_id || reestr_subject.otv_e3 = test_book_e.person_id)');
			$sql = $this->queryBuilder->groupBy('reestr_subject.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}

/**************************************** ФИЛЬТР ПРОВЕРКИ ЗНАНИЙ ИНСПЕКТОРА (тепло)******************************************/
	public function getPersonal_Filter_TInsp($params, $id_user)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('reestr_object.id AS reestr_object_id, reestr_object.id_reestr_subject AS id_reestr_subject, t_b_t.id, t_b_t.person_name, t_b_t.date, t_b_t.person_id, t_b_t.person_position, t_b_t.test_result, t_b_t.test_validity, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, t_b_t.record_mode, t_b_t.activity_line, spr_test_napr.name AS napr_name')
				->from('reestr_object')
				->joinLeftTable('reestr_subject', 'reestr_object.id_reestr_subject = reestr_subject.id')
				->joinLeftTable('test_book_t AS t_b_t', 'reestr_subject.otv_t1 = t_b_t.person_id || reestr_subject.otv_t2 = t_b_t.person_id || reestr_subject.otv_t3 = t_b_t.person_id')
				->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = t_b_t.test_reasons_t')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = t_b_t.activity_line');


			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}			
			
			$sql = $this->queryBuilder->blockWhere('reestr_object.t_insp ='.$id_user.' || reestr_object.ti_insp ='.$id_user);
			$sql = $this->queryBuilder->blockWhere('(reestr_subject.otv_t1 is not null AND reestr_subject.otv_t1 <> 0) OR (reestr_subject.otv_t2 is not null AND reestr_subject.otv_t2 <> 0) OR (reestr_subject.otv_t3 is not null AND reestr_subject.otv_t3 <> 0)');				
			$sql = $this->queryBuilder->blockWhere('t_b_t.id =  (SELECT MAX(test_book_t.id) FROM test_book_t WHERE reestr_subject.otv_t1 = test_book_t.person_id || reestr_subject.otv_t2 = test_book_t.person_id || reestr_subject.otv_t3 = test_book_t.person_id)');
			$sql = $this->queryBuilder->groupBy('reestr_subject.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}
/**************************************** ФИЛЬТР ПРОВЕРКИ ЗНАНИЙ НАЧАЛЬНИКА ГРУППЫ/РЭГИ (складывается из трех запросов по тепло/электро/газ)******************************************/
	public function getPersonal_Filter_EGroup($params, $spr_cod_otd)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.date, test_book_e.person_id, test_book_e.person_position, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_e')
				->joinLeftTable('test_book_e AS e2', 'test_book_e.person_id = e2.person_id AND test_book_e.id < e2.id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_e.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', date('Y-m-d'),'<');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_e.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}

			$sql = $this->queryBuilder->blockWhere('test_book_e.otdel_id ='.$spr_cod_otd);
			$sql = $this->queryBuilder->blockWhere('e2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_e.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_e.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
		
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}

	public function getPersonal_Filter_TGroup($params, $spr_cod_otd)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_t.id, test_book_t.person_name, test_book_t.date, test_book_t.person_id, test_book_t.person_position, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_t')
				->joinLeftTable('test_book_t AS t2', 'test_book_t.person_id = t2.person_id AND test_book_t.id < t2.id')
				->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_t.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}
			
			$sql = $this->queryBuilder->blockWhere('test_book_t.otdel_id ='.$spr_cod_otd);
			$sql = $this->queryBuilder->blockWhere('t2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_t.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_t.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}


	public function getPersonal_Filter_GGroup($params, $spr_cod_otd)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_g.id, test_book_g.person_name, test_book_g.date, test_book_g.person_id, test_book_g.person_position, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_g')
				->joinLeftTable('test_book_g AS g2', 'test_book_g.person_id = g2.person_id AND test_book_g.id < g2.id')
				->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_g.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_g.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_g.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}

			$sql = $this->queryBuilder->blockWhere('test_book_g.otdel_id ='.$spr_cod_otd);
			$sql = $this->queryBuilder->blockWhere('g2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_g.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_g.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}

/**************************************** ФИЛЬТР ПРОВЕРКИ ЗНАНИЙ НАЧАЛЬНИКА МРО (складывается из трех запросов по тепло/электро/газ)******************************************/
	public function getPersonal_Filter_EMro($params, $spr_cod_podrazd)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.date, test_book_e.person_id, test_book_e.person_position, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_e')
				->joinLeftTable('test_book_e AS e2', 'test_book_e.person_id = e2.person_id AND test_book_e.id < e2.id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_e.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', date('Y-m-d'),'<');
			}


			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_e.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}

			$sql = $this->queryBuilder->blockWhere('test_book_e.podrazd_id ='.$spr_cod_podrazd);
			$sql = $this->queryBuilder->blockWhere('e2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_e.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_e.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
		
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}


	public function getPersonal_Filter_TMro($params, $spr_cod_podrazd)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_t.id, test_book_t.person_name, test_book_t.date, test_book_t.person_id, test_book_t.person_position, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_t')
				->joinLeftTable('test_book_t AS t2', 'test_book_t.person_id = t2.person_id AND test_book_t.id < t2.id')
				->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_t.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}

			$sql = $this->queryBuilder->blockWhere('test_book_t.podrazd_id ='.$spr_cod_podrazd);
			$sql = $this->queryBuilder->blockWhere('t2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_t.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_t.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}

	public function getPersonal_Filter_GMro($params, $spr_cod_podrazd)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_g.id, test_book_g.person_name, test_book_g.date, test_book_g.person_id, test_book_g.person_position, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_g')
				->joinLeftTable('test_book_g AS g2', 'test_book_g.person_id = g2.person_id AND test_book_g.id < g2.id')
				->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_g.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_g.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_g.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}
			
			$sql = $this->queryBuilder->blockWhere('test_book_g.podrazd_id ='.$spr_cod_podrazd);
			$sql = $this->queryBuilder->blockWhere('g2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_g.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_g.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}


/**************************************** ФИЛЬТР ПРОВЕРКИ ЗНАНИЙ ИНЖЕНЕР УПРАВЛЕНИЯ (складывается из трех запросов по тепло/электро/газ)******************************************/
	public function getPersonal_Filter_EBranch($params, $spr_cod_branch)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.date, test_book_e.person_id, test_book_e.person_position, test_book_e.test_result, test_book_e.test_validity, test_book_e.record_mode, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_e')
				->joinLeftTable('test_book_e AS e2', 'test_book_e.person_id = e2.person_id AND test_book_e.id < e2.id')
				->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_e.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_e.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_e.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}

			$sql = $this->queryBuilder->blockWhere('test_book_e.branch_id ='.$spr_cod_branch);
			$sql = $this->queryBuilder->blockWhere('e2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_e.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_e.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
		
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}

	public function getPersonal_Filter_TBranch($params, $spr_cod_branch)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_t.id, test_book_t.person_name, test_book_t.date, test_book_t.person_id, test_book_t.person_position, test_book_t.test_result, test_book_t.test_validity, test_book_t.record_mode, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_t')
				->joinLeftTable('test_book_t AS t2', 'test_book_t.person_id = t2.person_id AND test_book_t.id < t2.id')
				->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_t.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}

			$sql = $this->queryBuilder->blockWhere('test_book_t.branch_id ='.$spr_cod_branch);
			$sql = $this->queryBuilder->blockWhere('t2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_t.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_t.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}

	public function getPersonal_Filter_GBranch($params, $spr_cod_branch)
	{

		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_personal'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];		
		$mf_zurnal_date_srok_doc_ot = $params['mf_zurnal_date_srok_doc_ot'];
		$mf_zurnal_date_srok_doc_do = $params['mf_zurnal_date_srok_doc_do'];		

		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
				$sql = $this->queryBuilder->select('test_book_g.id, test_book_g.person_name, test_book_g.date, test_book_g.person_id, test_book_g.person_position, test_book_g.test_result, test_book_g.test_validity, test_book_g.record_mode, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.activity_line, spr_test_napr.name AS napr_name')
				->from('test_book_g')
				->joinLeftTable('test_book_g AS g2', 'test_book_g.person_id = g2.person_id AND test_book_g.id < g2.id')
				->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
				->joinLeftTable('spr_test_napr', 'spr_test_napr.id = test_book_g.activity_line');



			if(strlen($params['mf_zurnal_personal']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_g.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', date('Y-m-d'),'<');
			}

			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && strlen($params['mf_zurnal_date_srok_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', $params['mf_zurnal_date_srok_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_srok_doc_do'] > 0 && strlen($params['mf_zurnal_date_srok_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', $params['mf_zurnal_date_srok_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_srok_doc_ot'] > 0 && $params['mf_zurnal_date_srok_doc_do'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_g.test_validity BETWEEN '$mf_zurnal_date_srok_doc_ot' AND '$mf_zurnal_date_srok_doc_do'");
			}

			$sql = $this->queryBuilder->blockWhere('test_book_g.branch_id ='.$spr_cod_branch);
			$sql = $this->queryBuilder->blockWhere('g2.person_id is null');				
			$sql = $this->queryBuilder->groupBy('test_book_g.id', 'DESC');	
			$sql = $this->queryBuilder->orderBy('test_book_g.date', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
	
	}

	public function getLetterBySrok($params)
	{


		$id_record = $params['zurnal_record'];
		$id_napr = $params['zurnal_napr'];

		
		if($id_napr == 1){
				$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
				$sql = $this->queryBuilder->sql();
				$this->db->query($sql);			
				$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.person_name, test_book_e.person_position, test_book_e.person_id, test_book_e.date, test_book_e.test_validity, reestr_unp.name AS unp_name, test_book_e.test_validity')
					->from('test_book_e')
					->joinLeftTable('reestr_personal', 'reestr_personal.id = test_book_e.person_id')
					->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
					->where('test_book_e.id', $id_record)
					->orderBy('test_book_e.id', 'DESC')
					->sql();								
				$queryResult = $this->db->query($sql, $this->queryBuilder->values);
				$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
				$sql = $this->queryBuilder->sql();
				$this->db->query($sql);		
				return $queryResult;				
		
		}elseif($id_napr == 2){
				$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
				$sql = $this->queryBuilder->sql();
				$this->db->query($sql);			
				$sql = $this->queryBuilder->select('test_book_t.id, test_book_t.person_name, test_book_t.person_position, test_book_t.person_id, test_book_t.date, test_book_t.test_validity, reestr_unp.name AS unp_name, test_book_t.test_validity')
					->from('test_book_t')
					->joinLeftTable('reestr_personal', 'reestr_personal.id = test_book_t.person_id')
					->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
					->where('test_book_t.id', $id_record)
					->orderBy('test_book_t.id', 'DESC')
					->sql();								
				$queryResult = $this->db->query($sql, $this->queryBuilder->values);
				$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
				$sql = $this->queryBuilder->sql();
				$this->db->query($sql);		
				return $queryResult;			
		
		}elseif($id_napr == 3){
				$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
				$sql = $this->queryBuilder->sql();
				$this->db->query($sql);			
				$sql = $this->queryBuilder->select('test_book_g.id, test_book_g.person_name, test_book_g.person_position, test_book_g.person_id, test_book_g.date, test_book_g.test_validity, reestr_unp.name AS unp_name, test_book_g.test_validity')
					->from('test_book_g')
					->joinLeftTable('reestr_personal', 'reestr_personal.id = test_book_g.person_id')
					->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
					->where('test_book_g.id', $id_record)
					->orderBy('test_book_g.id', 'DESC')
					->sql();								
				$queryResult = $this->db->query($sql, $this->queryBuilder->values);
				$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
				$sql = $this->queryBuilder->sql();
				$this->db->query($sql);		
				return $queryResult;			
		}
		
		
		

	}
	
}