<?php

namespace Examination\Model\Responsible_persons;

use Engine\Model;

class Responsible_personsRepository extends Model
{

    public function getResponsible_persons()
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
    public function getResponsiblePersonsData($id)
    {
        $resppers = new Responsible_persons($id);

        return $resppers->findOne();
    }


    public function createResponsible_persons($params)
    {

        $resppers = new Responsible_persons;
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


    public function updateResponsible_persons($params)
    {
        if (isset($params['resp_pers_id'])) {
            $resppers = new Responsible_persons($params['resp_pers_id']);
			if(strlen($params['id_reestr_unp']) > 0){
				$resppers->setId_reestr_unp($params['id_reestr_unp']);
			}
			if(strlen($params['firstname']) > 0){
				$resppers->setFirstname($params['firstname']);
			}
			if(strlen($params['secondname']) > 0){
				$resppers->setSecondname($params['secondname']);
			}
			if(strlen($params['lastname']) > 0){
				$resppers->setLastname($params['lastname']);
			}
			if(strlen($params['tel']) > 0){
				$resppers->setTel($params['tel']);
			}
			if(strlen($params['email']) > 0){
				$resppers->setEmail($params['email']);
			}
			if(strlen($params['post']) > 0){
				$resppers->setPost($params['post']);
			}
			if(strlen($params['post_data']) > 0){
				$resppers->setPost_data($params['post_data']);
			}
            $resppersId = $resppers->save();
        }
		
		print_r($params);
    }
	
	
	public function getResponsible_personsList($id)
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
        $sql = $this->queryBuilder->select('reestr_personal.id, reestr_personal.id_reestr_unp, reestr_personal.firstname, reestr_personal.secondname, reestr_personal.lastname, reestr_personal.post, reestr_personal.post_data, reestr_personal.tel, reestr_personal.email, reestr_unp.name_short AS reestr_unp_name_short, reestr_unp.unp AS reestr_unp_unp, reestr_unp.id AS reestr_unp_id')
            ->from('reestr_personal')
			->joinTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_personal.firstname', '%'.trim($params).'%', 'LIKE')
			->orWhere('reestr_personal.secondname', '%'.trim($params).'%', 'LIKE')
			->orWhere('reestr_personal.lastname', '%'.trim($params).'%', 'LIKE')
			->groupBy('reestr_personal.id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getResponsible_by_secondname($params)
    {
        $sql = $this->queryBuilder->select('reestr_personal.id, reestr_personal.id_reestr_unp, reestr_personal.firstname, reestr_personal.secondname, reestr_personal.lastname, reestr_personal.post, reestr_personal.post_data, reestr_personal.tel, reestr_personal.email, reestr_unp.name_short AS reestr_unp_name_short, reestr_unp.unp AS reestr_unp_unp')
            ->from('reestr_personal')
			->joinTable('reestr_unp', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->where('reestr_personal.secondname', '%'.trim($params).'%', 'LIKE')
			->groupBy('reestr_personal.secondname', 'ASC')
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
	
	public function edit_post_e($id)
	{
		$sql = $this->queryBuilder->update('test_book_e')
			->set(['test_book_e.record_mode' => 'недействующая'])
			->where('test_book_e.person_id', $id)
			->sql();
		$sql = $this->queryBuilder->sql();
		
		return $this->db->query($sql, $this->queryBuilder->values);
	}
	
	public function edit_post_t($id)
	{
		$sql = $this->queryBuilder->update('test_book_t')
			->set(['test_book_t.record_mode' => 'недействующая'])
			->where('test_book_t.person_id', $id)
			->sql();
		$sql = $this->queryBuilder->sql();
		
		return $this->db->query($sql, $this->queryBuilder->values);
	}	
	
	public function edit_post_g($id)
	{
		$sql = $this->queryBuilder->update('test_book_g')
			->set(['test_book_g.record_mode' => 'недействующая'])
			->where('test_book_g.person_id', $id)
			->sql();
		$sql = $this->queryBuilder->sql();
		
		return $this->db->query($sql, $this->queryBuilder->values);
	}		
	
}