<?php

namespace Examination\Model\Test_book_t;

use Engine\Model;

class Test_book_tRepository extends Model
{

    public function getBook_t()
    {
		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);	
		
        $sql = $this->queryBuilder->select('test_book_t.id, test_book_t.date, test_book_t.test_reasons_t, test_book_t.person_name, test_book_t.person_position, test_book_t.test_result, test_book_t.person_id, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.test_validity, test_book_t.doc_number, test_book_t.branch_id, test_book_t.podrazd_id, test_book_t.otdel_id, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_t')
			->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_t.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_t.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_t.otdel_id')			
            ->orderBy('id', 'DESC')
            ->sql();

        $queryResult = $this->db->query($sql);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
    }


    public function getBook_tData($id)
    {
        $book_t = new Book_t($id);

        return $book_t ->findOne();
    }


    public function getBook_tRecord($id)
    {
		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);	
		
        $sql = $this->queryBuilder->select('test_book_t.id, test_book_t.date, test_book_t.test_reasons_t, test_book_t.person_name, test_book_t.person_position, test_book_t.test_result, test_book_t.person_id, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.member_1, test_book_t.member_2, test_book_t.member_3, test_book_t.member_1_position, test_book_t.member_2_position, test_book_t.member_3_position, test_book_t.doc_name, test_book_t.doc_number, test_book_t.test_validity, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_t')
			->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_t.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_t.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_t.otdel_id')
			->where('test_book_t.person_id', $id)
            ->orderBy('id', 'DESC')
			->LIMIT(1)
            ->sql();
        $queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;

    }
     public function getBook_tRecord_History($id)
    {
		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
        $sql = $this->queryBuilder->select('test_book_t.id, test_book_t.date, test_book_t.test_reasons_t, test_book_t.person_name, test_book_t.person_position, test_book_t.test_result, test_book_t.person_id, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.member_1, test_book_t.member_2, test_book_t.member_3, test_book_t.member_1_position, test_book_t.member_2_position, test_book_t.member_3_position, test_book_t.doc_name, test_book_t.doc_number, test_book_t.test_validity, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_t')
			->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_t.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_t.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_t.otdel_id')
			->where('test_book_t.person_id', $id)
			->blockWhere('test_book_t.id != (SELECT MAX(test_book_t.id) FROM test_book_t WHERE test_book_t.person_id = '.$id.')')		
            ->orderBy('id', 'DESC')
            ->sql();

		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;	

    }	
 
 	public function getBook_tFilter($params)
	{
		
//print_r($params);		
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_pers_t'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg_t'];
		$mf_insp = $params['mf_zurnal_insp_t'];
		$mf_zurnal_branch = $params['mf_zurnal_branch_t'];
		$mf_zurnal_podrazdelenie = $params['mf_zurnal_podrazdelenie_t'];
		$mf_zurnal_otdel = $params['mf_zurnal_otdel_t'];
		$mf_zurnal_num_doc = $params['mf_zurnal_num_doc_t'];
		$mf_zurnal_date_doc = $params['mf_zurnal_date_doc_t'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot_t'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do_t'];
		$mf_zurnal_fio_member = $params['mf_zurnal_fio_member_t'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];

		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		$sql = $this->queryBuilder->select('test_book_t.id, test_book_t.date, test_book_t.test_reasons_t, test_book_t.person_name, test_book_t.person_position, test_book_t.creator_fio, test_book_t.test_result, test_book_t.person_id, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.branch_id, test_book_t.podrazd_id, test_book_t.otdel_id, test_book_t.doc_name, test_book_t.doc_number, test_book_t.date, test_book_t.member_1, test_book_t.member_2, test_book_t.member_3, test_book_t.test_validity, spr_branch.sokr_name AS branch_sokr_name, spr_podrazdelenie.sokr_name AS podrazd_sokr_name, spr_otdel.sokr_name AS otdel_sokr_name')
        


		->from('test_book_t')
			->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_t.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_t.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_t.otdel_id');
			
			if(strlen($params['mf_zurnal_pers_t']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg_t']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_insp_t']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.creator_fio', '%'.trim($mf_insp).'%', 'LIKE');
			}
			if($params['mf_zurnal_branch_t'] > 0){
				$sql = $this->queryBuilder->where('test_book_t. branch_id ', $params['mf_zurnal_branch_t']);
			}	
			if($params['mf_zurnal_podrazdelenie_t'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.podrazd_id', $params['mf_zurnal_podrazdelenie_t']);
			}
			if($params['mf_zurnal_otdel_t'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.otdel_id', $params['mf_zurnal_otdel_t']);
			}				
			if($params['mf_zurnal_num_doc_t'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.doc_number', $params['mf_zurnal_num_doc_t']);
			}
			if($params['mf_zurnal_date_doc_t'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_t']);
			}
			
			
			if($params['mf_zurnal_date_doc_ot_t'] > 0 && strlen($params['mf_zurnal_date_doc_do_t']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_ot_t'],'>=');
			}
			if($params['mf_zurnal_date_doc_do_t'] > 0 && strlen($params['mf_zurnal_date_doc_ot_t']) == 0){
				$sql = $this->queryBuilder->where('test_book_t.date', $params['mf_zurnal_date_doc_do_t'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot_t'] > 0 && $params['mf_zurnal_date_doc_do_t'] > 0){
				$sql = $this->queryBuilder->blockWhere("test_book_t.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if(strlen($params['mf_zurnal_fio_member_t']) > 0){
				$sql = $this->queryBuilder->where('test_book_t.member_1', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
				$sql = $this->queryBuilder->orWhere('test_book_t.member_2', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
				$sql = $this->queryBuilder->orWhere('test_book_t.member_3', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
			}
			
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_t.test_validity', date('Y-m-d'),'<');
			}

            $sql = $this->queryBuilder->orderBy('test_book_t.id', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
		
//echo $sql;
	
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_t_id', 'test_book_t');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
		
		
		
	}
	
	
public function getZurnalByMainPage($params)
	{
		
		//print_r($params);
		$id_record = $params['zurnal_record'];

		$sql = $this->queryBuilder->createIndex('test_book_t_id', 'test_book_t', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		$sql = $this->queryBuilder->select('test_book_t.id, test_book_t.date, test_book_t.test_reasons_t, test_book_t.person_name, test_book_t.person_position, test_book_t.creator_fio, test_book_t.test_result, test_book_t.person_id, spr_test_reasons_teplo.id AS spr_test_reasons_teplo_id, spr_test_reasons_teplo.name AS spr_test_reasons_teplo_name, test_book_t.branch_id, test_book_t.podrazd_id, test_book_t.otdel_id, test_book_t.doc_name, test_book_t.doc_number, test_book_t.date, test_book_t.member_1, test_book_t.member_2, test_book_t.member_3, spr_branch.id AS spr_branch_id, spr_branch.name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.name_podrazd AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.name_otdel AS otdel_name, test_book_t.test_validity, test_book_t.member_1_position, test_book_t.member_2_position, test_book_t.member_3_position, test_book_t.themes, reestr_unp.name AS unp_name, test_book_t.test_validity, spr_branch.sokr_name AS branch_sokr_name, spr_podrazdelenie.sokr_name AS podrazd_sokr_name, spr_otdel.sokr_name AS otdel_sokr_name')
            ->from('test_book_t')
			->joinLeftTable('spr_test_reasons_teplo', 'spr_test_reasons_teplo.id = test_book_t.test_reasons_t')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_t.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_t.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_t.otdel_id')
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
	
	}	
 
	public function createBook_t($params)
    {
		$sql = $this->queryBuilder->update('test_book_t')
					->set(['record_mode' => 'недействующая'])
					->where('person_id', $params['id_otv'])
					->sql();
			
		$this->db->query($sql, $this->queryBuilder->values);
		
		
        $book_t  = new Test_book_t;
		//print_r($params);
        $book_t ->setDoc_name($params['doc_name']);
		//$book_t ->setDoc_number($params['doc_number']);
		$book_t ->setDate($params['date']);
		$book_t ->setDate_curr($params['date_curr']);
		$book_t ->setCreator_id($params['creator_id']);
		$book_t ->setCreator_fio($params['creator_fio']);
		$book_t ->setPerson_id($params['id_otv']);
		$book_t ->setPerson_name($params['person_name']);
		$book_t ->setPerson_position($params['resp_pers_post']);
		$book_t ->setRecord_source($params['record_source']);
		$book_t ->setTest_result($params['test_result']);
		$book_t ->setRecord_mode($params['record_mode']);
		$book_t ->setTest_validity($params['test_validity']);
		$book_t ->setBranch_id($params['branch_id']);
		$book_t ->setOtdel_id($params['otdel_id']);
		$book_t ->setPodrazd_id($params['podrazd_id']);
		$book_t ->setBranch_full_name($params['branch_full_name']);
		$book_t ->setMember_1_id($params['member_1_id']);
		$book_t ->setMember_1($params['member_1']);
		$book_t ->setMember_1_position($params['member_1_position']);
		$book_t ->setMember_2_id($params['member_2_id']);
		$book_t ->setMember_2($params['member_2']);
		$book_t ->setMember_2_position($params['member_2_position']);
		$book_t ->setMember_3_id($params['member_3_id']);
		$book_t ->setMember_3($params['member_3']);
		$book_t ->setMember_3_position($params['member_3_position']);
		$book_t ->setTest_reasons_t($params['test_reasons_teplo']);
		$book_t ->setThemes($params['themes']);
		$book_t	->setActivity_line($params['test_napr']);
		

		$book_tId = $book_t ->save();
		
		$book_t = new Test_book_t($book_tId);
		
		$book_t->setDoc_number($book_tId); 
		$book_t->save();

        return $book_tId;
    }


    public function updateBook_t($params)
    {
        if (isset($params['book_tID'])) {
			
		
            $book_t  = new Test_book_t($params['book_tID']);
			$book_t ->setDoc_number($params['book_tID']);
			if(isset($params['record_mode'])){
				$book_t ->setRecord_mode($params['record_mode']);
			}
				$book_t ->setTest_result($params['test_result']);
				$book_t ->setTest_result_resume($params['test_result_resume']);
				$book_t ->setTest_result_resume2($params['test_result_resume2']);
				
			if(isset($params['test_validity'])){
				$book_t ->setTest_validity($params['test_validity']);
			}
			
            $book_t ->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('test_book_t')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
 
}