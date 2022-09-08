<?php

namespace Examination\Model\Test_book_e;

use Engine\Model;

class Test_book_eRepository extends Model
{

    public function getBook_e()
    {
		
		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);
		
		
        $sql = $this->queryBuilder->select('test_book_e.id, test_book_e.date, test_book_e.test_reasons_e, test_book_e.person_name, test_book_e.person_position, test_book_e.test_result, test_book_e.el_group, test_book_e.person_id, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.test_validity, test_book_e.doc_number, test_book_e.branch_id, test_book_e.podrazd_id, test_book_e.otdel_id, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_e')
			->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_e.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_e.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_e.otdel_id')
            ->orderBy('id', 'DESC')
            ->sql();
			
        $queryResult = $this->db->query($sql);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;			

    }


    public function getBook_eData($id)
    {
        $book_e = new Test_book_e($id);

        return $book_e->findOne();
    }

    public function getBook_eRecord($id)
    {
		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
        $sql = $this->queryBuilder->select('test_book_e.id, test_book_e.date, test_book_e.test_reasons_e, test_book_e.person_name, test_book_e.person_position, test_book_e.test_result, test_book_e.el_group, test_book_e.person_id, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.member_1, test_book_e.member_2, test_book_e.member_3, test_book_e.member_1_position, test_book_e.member_2_position, test_book_e.member_3_position, test_book_e.doc_name, test_book_e.doc_number, test_book_e.test_validity, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_e')
			->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_e.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_e.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_e.otdel_id')
			->where('test_book_e.person_id', $id)
            ->orderBy('id', 'DESC')
			->LIMIT(1)
            ->sql();
			
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;	

    }	
    public function getBook_eRecord_History($id)
    {
		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
        $sql = $this->queryBuilder->select('test_book_e.id, test_book_e.date, test_book_e.test_reasons_e, test_book_e.person_name, test_book_e.person_position, test_book_e.test_result, test_book_e.el_group, test_book_e.person_id, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.member_1, test_book_e.member_2, test_book_e.member_3, test_book_e.member_1_position, test_book_e.member_2_position, test_book_e.member_3_position, test_book_e.doc_name, test_book_e.doc_number, test_book_e.test_validity, spr_branch.id AS spr_branch_id, spr_branch.sokr_name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.sokr_name AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.sokr_name AS otdel_name')
            ->from('test_book_e')
			->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_e.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_e.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_e.otdel_id')
			->where('test_book_e.person_id', $id)
			->blockWhere('test_book_e.id != (SELECT MAX(test_book_e.id) FROM test_book_e WHERE test_book_e.person_id = '.$id.')')		
            ->orderBy('id', 'DESC')
            ->sql();
	
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;	

    }	


	public function getBook_eFilter($params)
	{
		
		//print_r($params);
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$mf_user = $params['mf_zurnal_pers'];
		$mf_user_dolg = $params['mf_zurnal_pers_dolg'];
		$mf_insp = $params['mf_zurnal_insp'];
		$mf_zurnal_branch = $params['mf_zurnal_branch'];
		$mf_zurnal_podrazdelenie = $params['mf_zurnal_podrazdelenie'];
		$mf_zurnal_otdel = $params['mf_zurnal_otdel'];
		$mf_zurnal_num_doc = $params['mf_zurnal_num_doc'];
		$mf_zurnal_date_doc = $params['mf_zurnal_date_doc'];
		$mf_zurnal_date_doc_ot = $params['mf_zurnal_date_doc_ot'];
		$mf_zurnal_date_doc_do = $params['mf_zurnal_date_doc_do'];
		$mf_zurnal_fio_member = $params['mf_zurnal_fio_member'];
		$mf_zurnal_srok_istek = $params['mf_zurnal_srok_istek'];

		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.date, test_book_e.test_reasons_e, test_book_e.person_name, test_book_e.person_position, test_book_e.creator_fio, test_book_e.test_result, test_book_e.el_group, test_book_e.person_id, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.branch_id, test_book_e.podrazd_id, test_book_e.otdel_id, test_book_e.doc_name, test_book_e.doc_number, test_book_e.date, test_book_e.member_1, test_book_e.member_2, test_book_e.member_3, test_book_e.test_validity, spr_branch.sokr_name AS branch_sokr_name, spr_podrazdelenie.sokr_name AS podrazd_sokr_name, spr_otdel.sokr_name AS otdel_sokr_name')
            ->from('test_book_e')
			->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_e.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_e.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_e.otdel_id');
			
			if(strlen($params['mf_zurnal_pers']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_name', '%'.trim($mf_user).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_pers_dolg']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.person_position', '%'.trim($mf_user_dolg).'%', 'LIKE');
			}
			if(strlen($params['mf_zurnal_insp']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.creator_fio', '%'.trim($mf_insp).'%', 'LIKE');
			}
			if($params['mf_zurnal_branch'] > 0){
				$sql = $this->queryBuilder->where('test_book_e. branch_id ', $params['mf_zurnal_branch']);
			}	
			if($params['mf_zurnal_podrazdelenie'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.podrazd_id', $params['mf_zurnal_podrazdelenie']);
			}
			if($params['mf_zurnal_otdel'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.otdel_id', $params['mf_zurnal_otdel']);
			}				
			if($params['mf_zurnal_num_doc'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.doc_number', $params['mf_zurnal_num_doc']);
			}
			if($params['mf_zurnal_date_doc'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc']);
			}
			
			
			if($params['mf_zurnal_date_doc_ot'] > 0 && strlen($params['mf_zurnal_date_doc_do']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_ot'],'>=');
			}
			if($params['mf_zurnal_date_doc_do'] > 0 && strlen($params['mf_zurnal_date_doc_ot']) == 0){
				$sql = $this->queryBuilder->where('test_book_e.date', $params['mf_zurnal_date_doc_do'],'<=');
			}
			if($params['mf_zurnal_date_doc_ot'] > 0 && $params['mf_zurnal_date_doc_do'] > 0){
				//$sql = $this->queryBuilder->where('test_book_e.date', " '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do' ", 'BETWEEN');
				$sql = $this->queryBuilder->blockWhere("test_book_e.date BETWEEN '$mf_zurnal_date_doc_ot' AND '$mf_zurnal_date_doc_do'");
			}
			if(strlen($params['mf_zurnal_fio_member']) > 0){
				$sql = $this->queryBuilder->where('test_book_e.member_1', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
				$sql = $this->queryBuilder->orWhere('test_book_e.member_2', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
				$sql = $this->queryBuilder->orWhere('test_book_e.member_3', '%'.trim($mf_zurnal_fio_member).'%', 'LIKE');
			}

			if($params['mf_zurnal_srok_istek'] > 0){
				$sql = $this->queryBuilder->where('test_book_e.test_validity', date('Y-m-d'),'<');
			}
			
            $sql = $this->queryBuilder->orderBy('test_book_e.id', 'DESC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
		
//echo $sql;
	
		$queryResult = $this->db->query($sql, $this->queryBuilder->values);
		
		$sql = $this->queryBuilder->dropIndex('test_book_e_id', 'test_book_e');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		return $queryResult;
		
		
		
	}	
	
	
	
public function getZurnalByMainPage($params)
	{
		
		//print_r($params);
		$id_record = $params['zurnal_record'];

		$sql = $this->queryBuilder->createIndex('test_book_e_id', 'test_book_e', 'id');
		$sql = $this->queryBuilder->sql();
		$this->db->query($sql);		
		
		$sql = $this->queryBuilder->select('test_book_e.id, test_book_e.date, test_book_e.test_reasons_e, test_book_e.person_name, test_book_e.person_position, test_book_e.creator_fio, test_book_e.test_result, test_book_e.el_group, test_book_e.person_id, spr_test_reasons_elektro.id AS spr_test_reasons_elektro_id, spr_test_reasons_elektro.name AS spr_test_reasons_elektro_name, test_book_e.branch_id, test_book_e.podrazd_id, test_book_e.otdel_id, test_book_e.doc_name, test_book_e.doc_number, test_book_e.date, test_book_e.member_1, test_book_e.member_2, test_book_e.member_3, spr_branch.id AS spr_branch_id, spr_branch.name AS branch_name, spr_podrazdelenie.id AS spr_podrazdelenie_id, spr_podrazdelenie.name_podrazd AS podrazd_name, spr_otdel.id AS spr_otdel_id, spr_otdel.name_otdel AS otdel_name, test_book_e.test_validity, test_book_e.member_1_position, test_book_e.member_2_position, test_book_e.member_3_position, reestr_unp.name AS unp_name, test_book_e.test_validity')
            ->from('test_book_e')
			->joinLeftTable('spr_test_reasons_elektro', 'spr_test_reasons_elektro.id = test_book_e.test_reasons_e')
			->joinLeftTable('spr_branch', 'spr_branch.id = test_book_e.branch_id')
			->joinLeftTable('spr_podrazdelenie', 'spr_podrazdelenie.id = test_book_e.podrazd_id')
			->joinLeftTable('spr_otdel', 'spr_otdel.id = test_book_e.otdel_id')
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
	
	}		
	
   /**
     * @param $params
     * @return mixed
     */
    public function createBook_e($params)
    {
		
	//	print_r($params);
		$sql = $this->queryBuilder->update('test_book_e')
					->set(['record_mode' => 'недействующая'])
					->where('person_id', $params['id_otv'])
					->sql();
			
		$this->db->query($sql, $this->queryBuilder->values);
	

	   $book_e = new Test_book_e;
		
        $book_e->setDoc_name($params['doc_name']);					//наименование документа 
		//$book_e->setDoc_number($params['doc_number']); 
		$book_e->setDate($params['date']);							// текущая дата
		$book_e->setDate_curr($params['date_curr']);						// дата проведения тестирования
		$book_e->setCreator_id($params['creator_id']);				// 	id запустившего тест 
		$book_e->setCreator_fio($params['creator_fio']);			//ФИО запустившего тест 
		$book_e->setPerson_id($params['id_otv']);					// 	id тестируемого 
		$book_e->setPerson_name($params['person_name']);	 		//ФИО тестируемого
		$book_e->setPerson_position($params['resp_pers_post']);		//Должность тестируемого 
		
		$book_e->setRecord_source($params['record_source']); 		//тест на ПЭВМ/ручной ввод 
		$book_e->setTest_result($params['test_result']); 			//результат теста
		$book_e->setRecord_mode($params['record_mode']);			//статус записи 
		$book_e->setTest_validity($params['test_validity']); 		//проверка на срок
		
		$book_e->setBranch_id($params['branch_id']); 				//id филиала, создавшего запись
		$book_e->setOtdel_id($params['otdel_id']);					// 	id отдела, создавшего запись 
		$book_e->setPodrazd_id($params['podrazd_id']); 				//id подразделения, создавшего запись 
		$book_e->setBranch_full_name($params['branch_full_name']); 	//полное наименование структурного подразделения, запустившего тест 	
		$book_e->setMember_1_id($params['member_1_id']);			//id председателя комиссии
		$book_e->setMember_1($params['member_1']);					//председатель комиссии 
		$book_e->setMember_1_position($params['member_1_position']);//должность председателя комиссии 
		$book_e->setMember_2_id($params['member_2_id']);
		$book_e->setMember_2($params['member_2']);
		$book_e->setMember_2_position($params['member_2_position']);
		$book_e->setMember_3_id($params['member_3_id']);
		$book_e->setMember_3($params['member_3']);
		$book_e->setMember_3_position($params['member_3_position']);
		
		$book_e->setTest_reasons_e($params['test_reasons_e']); 		//причина проведения тестирования 
		//$book_e->setTest_reasons_teplo($params['test_reasons']); 		//причина проведения тестирования 
		$book_e->setEl_group($params['test_group']);
		$book_e->setExperience_position($params['experience_position']);//стаж в должности 
		if($params['test_date_old'] > 0){
			$book_e->setTest_date_old($params['test_date_old']); //дата предыдущего подтверждения 
		}
		$book_e->setActivity_line($params['test_napr']);

		$book_eId = $book_e->save();
	// дозаписываем номер документа равны id записи в журнале	
		$book_e = new Test_book_e($book_eId);
		
		$book_e->setDoc_number($book_eId); 
		$book_e->save();
///echo $book_eId;
        return $book_eId;
    }


    public function updateBook_e($params)
    {
        if (isset($params['book_eID'])) {
            $book_e = new Test_book_e($params['book_eID']);
			$book_e->setDoc_number($params['book_eID']); 
			if(isset($params['record_mode'])){
				$book_e->setRecord_mode($params['record_mode']);
			}
			
			if(isset($params['test_validity'])){
				$book_e->setTest_validity($params['test_validity']);
			}
				$book_e ->setTest_result($params['test_result']);
				$book_e ->setTest_result_resume($params['test_result_resume']);
				$book_e ->setTest_result_resume2($params['test_result_resume2']);
			
				$book_e->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('test_book_e')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
}