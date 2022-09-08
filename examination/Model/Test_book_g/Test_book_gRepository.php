<?php

namespace Examination\Model\Test_book_g;

use Engine\Model;

class Test_book_gRepository extends Model
{

    public function getBook_g()
    {
		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);	
		
        $sql = $this->queryBuilder->select('test_book_g.id, test_book_g.date, test_book_g.test_reasons_g, test_book_g.person_name, test_book_g.person_position, test_book_g.test_result, test_book_g.person_id, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.test_validity, test_book_g.doc_number, test_book_g.branch_id, test_book_g.podrazd_id, test_book_g.otdel_id, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_g')
			->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_g.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_g.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_g.otdel_id')			
            ->orderBy('id', 'DESC')
            ->sql();

        $queryResult = $this->db->query($sql);
		
		$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
    }


    public function getBook_gData($id)
    {
        $book_g = new Book_g($id);

        return $book_g ->findOne();
    }


    public function getBook_gRecord($id)
    {
		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);	
		
        $sql = $this->queryBuilder->select('test_book_g.id, test_book_g.date, test_book_g.test_reasons_g, test_book_g.person_name, test_book_g.person_position, test_book_g.test_result, test_book_g.person_id, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.member_1, test_book_g.member_2, test_book_g.member_3, test_book_g.member_1_position, test_book_g.member_2_position, test_book_g.member_3_position, test_book_g.doc_name, test_book_g.doc_number, test_book_g.test_validity, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_g')
			->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_g.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_g.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_g.otdel_id')
			->where('test_book_g.person_id', $id)
            ->orderBy('id', 'DESC')
			->LIMIT(1)
            ->sql();
        $queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;

    }
     public function getBook_gRecord_History($id)
    {
		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
        $sql = $this->queryBuilder->select('test_book_g.id, test_book_g.date, test_book_g.test_reasons_g, test_book_g.person_name, test_book_g.person_position, test_book_g.test_result, test_book_g.person_id, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.member_1, test_book_g.member_2, test_book_g.member_3, test_book_g.member_1_position, test_book_g.member_2_position, test_book_g.member_3_position, test_book_g.doc_name, test_book_g.doc_number, test_book_g.test_validity, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_g')
			->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_g.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_g.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_g.otdel_id')
			->where('test_book_g.person_id', $id)
			->blockWhere('test_book_g.id != (SELECT MAX(test_book_g.id) FROM test_book_g WHERE test_book_g.person_id = '.$id.')')		
            ->orderBy('id', 'DESC')
            ->sql();

		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_g_id', 'test_book_g');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;	

    }	
 
 	public function getBook_gFilter($params)
	{
		
		
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_pers_g'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg_g'];
		$mf_insp = $params['mf_zurnal_insp_g'];
		$mf_zurnal_branch = $params['mf_zurnal_branch_g'];
		$mf_zurnal_podrazdelenie = $params['mf_zurnal_podrazdelenie_g'];
		$mf_zurnal_otdel = $params['mf_zurnal_otdel_g'];
		$mf_zurnal_num_doc = $params['mf_zurnal_num_doc_g'];
		$mf_zurnal_date_doc = $params['mf_zurnal_date_doc_g'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot_g'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do_g'];
		$mf_zurnal_fio_member = $params['mf_zurnal_fio_member_g'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];

		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		$sql = $this->queryBuilder->select('test_book_g.id, test_book_g.date, test_book_g.test_reasons_g, test_book_g.person_name, test_book_g.person_position, test_book_g.creator_fio, test_book_g.test_result, test_book_g.person_id, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.branch_id, test_book_g.podrazd_id, test_book_g.otdel_id, test_book_g.doc_name, test_book_g.doc_number, test_book_g.date, test_book_g.member_1, test_book_g.member_2, test_book_g.member_3, test_book_g.test_validity, spr_branch.sokr_name AS branch_sokr_name, spr_podrazdelenie.sokr_name AS podrazd_sokr_name, spr_otdel.sokr_name AS otdel_sokr_name')
            ->from('test_book_g')
			->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_g.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_g.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_g.otdel_id');
			
			if(strlen($params['mf_zurnal_pers_g']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg_g']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_insp_g']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.creator_fio', '%'.trim($mf_insp).'%', 'LIKE');
			}
			if($params['mf_zurnal_branch_g'] > 0){
				$sql = $this->queryBuilder->where('test_book_g. branch_id ', $params['mf_zurnal_branch_g']);
			}	
			if($params['mf_zurnal_podrazdelenie_g'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.podrazd_id', $params['mf_zurnal_podrazdelenie_g']);
			}
			if($params['mf_zurnal_otdel_g'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.otdel_id', $params['mf_zurnal_otdel_g']);
			}				
			if($params['mf_zurnal_num_doc_g'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.doc_number', $params['mf_zurnal_num_doc_g']);
			}
			if($params['mf_zurnal_date_doc_g'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_g']);
			}
			
			
			if($params['mf_zurnal_date_doc_ot_g'] > 0 && strlen($params['mf_zurnal_date_doc_do_g']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_ot_g'],'>=');
			}
			if($params['mf_zurnal_date_doc_do_g'] > 0 && strlen($params['mf_zurnal_date_doc_ot_g']) == 0){
				$sql = $this->queryBuilder->where('test_book_g.date', $params['mf_zurnal_date_doc_do_g'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot_g'] > 0 && $params['mf_zurnal_date_doc_do_g'] > 0){
				//$sql = $this->queryBuilder->where('test_book_t.date', " '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do' ", 'BETWEEN');
				$sql = $this->queryBuilder->blockWhere("test_book_g.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if(strlen($params['mf_zurnal_fio_member_g']) > 0){
				$sql = $this->queryBuilder->where('test_book_g.member_1', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
				$sql = $this->queryBuilder->orWhere('test_book_g.member_2', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
				$sql = $this->queryBuilder->orWhere('test_book_g.member_3', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
			}
			
			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_g.test_validity', date('Y-m-d'),'<');
			}

            $sql = $this->queryBuilder->orderBy('test_book_g.id', 'DESC');
			
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
	
	
public function getZurnalByMainPage($params)
	{
		
		//print_r($params);
		$id_record = $params['zurnal_record'];

		$sql = $this->queryBuilder->createIndex('test_book_g_id', 'test_book_g', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		$sql = $this->queryBuilder->select('test_book_g.id, test_book_g.date, test_book_g.test_reasons_g, test_book_g.person_name, test_book_g.person_position, test_book_g.creator_fio, test_book_g.test_result, test_book_g.person_id, spr_test_reasons_gaz.id AS spr_test_reasons_gaz_id, spr_test_reasons_gaz.name AS spr_test_reasons_gaz_name, test_book_g.branch_id, test_book_g.podrazd_id, test_book_g.otdel_id, test_book_g.doc_name, test_book_g.doc_number, test_book_g.date, test_book_g.member_1, test_book_g.member_2, test_book_g.member_3, spr_branch.id AS spr_branch_id, spr_branch.name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.name_podrazd AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.name_otdel AS otdel_name, test_book_g.test_validity, test_book_g.member_1_position, test_book_g.member_2_position, test_book_g.member_3_position, test_book_g.themes, reestr_unp.name AS unp_name, test_book_g.test_validity, spr_branch.sokr_name AS branch_sokr_name, spr_podrazdelenie.sokr_name AS podrazd_sokr_name, spr_otdel.sokr_name AS otdel_sokr_name')
            ->from('test_book_g')
			->joinLeftTable('spr_test_reasons_gaz', 'spr_test_reasons_gaz.id = test_book_g.test_reasons_g')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_g.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_g.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_g.otdel_id')
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
 
	public function createBook_g($params)
    {
		$sql = $this->queryBuilder->update('test_book_g')
					->set(['record_mode' => 'недействующая'])
					->where('person_id', $params['id_otv'])
					->sql();
			
		$this->db->query($sql, $this->queryBuilder->values);
		
		
        $book_g  = new Test_book_t;
	//	print_r($params);
        $book_g ->setDoc_name($params['doc_name']);
		//$book_t ->setDoc_number($params['doc_number']);
		$book_g ->setDate($params['date']);
		$book_g ->setCreator_id($params['creator_id']);
		$book_g ->setCreator_fio($params['creator_fio']);
		$book_g ->setPerson_id($params['id_otv']);
		$book_g ->setPerson_name($params['person_name']);
		$book_g ->setPerson_position($params['resp_pers_post']);
		$book_g ->setRecord_source($params['record_source']);
		$book_g ->setTest_result($params['test_result']);
		$book_g ->setRecord_mode($params['record_mode']);
		$book_g ->setTest_validity($params['test_validity']);
		$book_g ->setBranch_id($params['branch_id']);
		$book_g ->setOtdel_id($params['otdel_id']);
		$book_g ->setPodrazd_id($params['podrazd_id']);
		$book_g ->setBranch_full_name($params['branch_full_name']);
		$book_g ->setMember_1_id($params['member_1_id']);
		$book_g ->setMember_1($params['member_1']);
		$book_g ->setMember_1_position($params['member_1_position']);
		$book_g ->setMember_2_id($params['member_2_id']);
		$book_g ->setMember_2($params['member_2']);
		$book_g ->setMember_2_position($params['member_2_position']);
		$book_g ->setMember_3_id($params['member_3_id']);
		$book_g ->setMember_3($params['member_3']);
		$book_g ->setMember_3_position($params['member_3_position']);
		$book_g ->setTest_reasons_t($params['test_reasons_gaz']);
		$book_g ->setThemes($params['themes']);
		

		$book_gId = $book_g ->save();

        return $book_gId;
    }


    public function updateBook_g($params)
    {
        if (isset($params['book_gID'])) {
			
		
            $book_g  = new Test_book_g($params['book_gID']);
			$book_g ->setDoc_number($params['book_gID']);
			if(isset($params['record_mode'])){
				$book_g ->setRecord_mode($params['record_mode']);
			}
				$book_g ->setTest_result($params['test_result']);
				$book_g ->setTest_result_resume($params['test_result_resume']);
				$book_g ->setTest_result_resume2($params['test_result_resume2']);
				
			if(isset($params['test_validity'])){
				$book_g ->setTest_validity($params['test_validity']);
			}
			
            $book_g ->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('test_book_g')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
 
}