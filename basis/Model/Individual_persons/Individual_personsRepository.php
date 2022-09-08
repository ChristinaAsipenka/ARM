<?php

namespace Basis\Model\Individual_persons;

use Engine\Model;

class Individual_personsRepository extends Model
{

    public function getIndividual_persons()
    {
        $sql = $this->queryBuilder->select()
            ->from('reestr_individual')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('reestr_individual')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	


/*****************************************************************************************/
    public function getIndividual_personsData($id)
    {
        $ind_pers = new Individual_persons($id);

        return $ind_pers->findOne();
    }


    public function createIndividual_persons($params)
    {

        $ind_pers = new Individual_persons;
        $ind_pers->setFirstname($params['firstname']);
		$ind_pers->setSecondname($params['secondname']);
		$ind_pers->setLastname($params['lastname']);
		$ind_pers->setIdentification_number($params['identification_number']);
		$ind_persId = $ind_pers->save();

        return $ind_persId;
    }


    public function updateIndividual_persons($params)
    {
        if (isset($params['ind_pers_id'])) {
            $ind_pers = new Individual_persons($params['ind_pers_id']);
			$ind_pers->setFirstname($params['firstname']);
			$ind_pers->setSecondname($params['secondname']);
			$ind_pers->setLastname($params['lastname']);
			$ind_pers->setIdentification_number($params['identification_number']);
            $ind_pers->save();
        }
    }
	
	
	/*public function getIndividual_personsList($id)
    {
        $sql = $this->queryBuilder->select('reestr_individual.id, reestr_individual.firstname, reestr_individual.secondname, reestr_individual.lastname, reestr_individual.identification_number')
            ->from('reestr_individual')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_individual.id_reestr_unp')
			->where('id_reestr_unp', $id)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }*/

	
	/*public function getSpr_sob_otvList($id)
    {

		$sql = $this->queryBuilder->select('reestr_individual.id AS reestr_personal_id, reestr_individual.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_individual.secondname AS reestr_personal_secondname, reestr_individual.firstname AS reestr_personal_firstname, reestr_individual.lastname AS reestr_personal_lastname, reestr_individual.post AS reestr_personal_post, reestr_unp.id AS reestr_unp_id, reestr_unp.name_short AS reestr_unp_name_short')
            ->from('reestr_individual')
			->joinLeftTable('reestr_unp', 'reestr_unp.id = reestr_individual.id_reestr_unp')
			->where('id_reestr_unp', $id)
            ->sql();	

        return $this->db->query($sql, $this->queryBuilder->values);
    }	*/
	public function getIndPersByFirstName($name, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_individual.id, reestr_individual.firstname, reestr_individual.secondname, reestr_individual.lastname, reestr_individual.identification_number, COUNT(reestr_subject.id) as col_sbjs')
            ->from('reestr_individual')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_individual.id = reestr_subject.id_ind_pers')
			/*->joinLeftTable('spr_region spr_region', 'spr_region.id = reestr_unp.address_region')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_unp.address_city_type')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_unp.address_street_type')
			->joinLeftTable('spr_district spr_district', 'spr_district.id = reestr_unp.address_district')
			->joinLeftTable('spr_city spr_city', 'spr_city.id = reestr_unp.address_city')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_unp.id = reestr_subject.id_unp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')*/
			->where('reestr_individual.firstname', '%'.trim($name).'%', 'LIKE')
			/*->orWhere('reestr_unp.name_short', '%'.trim($name).'%', 'LIKE')*/
			->groupBy('reestr_individual.id', 'ASC')
            ->orderBy('reestr_individual.firstname', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }	
	
	public function getIndPersByFilter($params)
	{
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$firstname = $params['mf_ip_firstname'];
		$secondname = $params['mf_ip_secondname'];
		$lastname = $params['mf_ip_lastname'];
		$identification_number = $params['mf_ip_identification_number'];
		//print_r($params);
		$sql = $this->queryBuilder->select('reestr_individual.id, reestr_individual.firstname, reestr_individual.secondname, reestr_individual.lastname, reestr_individual.identification_number, COUNT(reestr_subject.id) as col_sbjs')
            ->from('reestr_individual')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_individual.id = reestr_subject.id_ind_pers');
			/*->joinLeftTable('spr_region spr_region', 'spr_region.id = reestr_unp.address_region')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_unp.address_city_type')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_unp.address_street_type')
			->joinLeftTable('spr_district spr_district', 'spr_district.id = reestr_unp.address_district')
			->joinLeftTable('spr_city spr_city', 'spr_city.id = reestr_unp.address_city')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_unp.id = reestr_subject.id_unp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')*/
			
			if(strlen($params['mf_ip_firstname']) > 0){
				$sql = $this->queryBuilder->where('reestr_individual.firstname', '%'.trim($firstname).'%', 'LIKE');
			}
			
			if(strlen($params['mf_ip_secondname']) > 0){
				$sql = $this->queryBuilder->where('reestr_individual.secondname', '%'.trim($secondname).'%', 'LIKE');
			}
			
			if(strlen($params['mf_ip_lastname']) > 0){
				$sql = $this->queryBuilder->where('reestr_individual.lastname', '%'.trim($lastname).'%', 'LIKE');
			}
			
			if(strlen($params['mf_ip_identification_number']) > 0){
				$sql = $this->queryBuilder->where('reestr_individual.identification_number', '%'.trim($identification_number).'%', 'LIKE');
			}

			$sql = $this->queryBuilder->groupBy('reestr_individual.id', 'ASC');
            $sql = $this->queryBuilder->orderBy('reestr_individual.firstname', 'ASC');
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
            $sql = $this->queryBuilder->sql();
		//echo $sql;
		return $this->db->query($sql, $this->queryBuilder->values);
	}
	



	public function getIndPersByMainPage($params)
	{


        
        $sql = $this->queryBuilder->select('reestr_individual.id AS id, reestr_individual.firstname AS firstname , reestr_individual.secondname AS secondname, reestr_individual.lastname AS lastname, reestr_individual.identification_number AS identification_number')

		->from('reestr_individual');		

			//Адрес
			if(isset($params['mf_ip_firstname']) && strlen($params['mf_ip_firstname']) > 0){
				$sql = $this->queryBuilder->where('reestr_individual.firstname', '%'.trim($params['mf_ip_firstname']).'%', 'LIKE');
			}			
			if(isset($params['mf_ip_secondname']) && strlen($params['mf_ip_secondname']) > 0){
				$sql = $this->queryBuilder->where('reestr_individual.secondname', '%'.trim($params['mf_ip_secondname']).'%', 'LIKE');
			}
			if(isset($params['mf_ip_lastname']) && strlen($params['mf_ip_lastname']) > 0){
				$sql = $this->queryBuilder->where('reestr_individual.lastname', '%'.trim($params['mf_ip_lastname']).'%', 'LIKE');
			}
			if(isset($params['mf_ip_identification_number']) && strlen($params['mf_ip_identification_number']) > 0){
				$sql = $this->queryBuilder->where('reestr_individual.identification_number', '%'.trim($params['mf_ip_identification_number']).'%', 'LIKE');
			}


			$sql = $this->queryBuilder->groupBy('reestr_individual.id', 'ASC');
			$sql = $this->queryBuilder->orderBy('reestr_individual.firstname', 'ASC');

			
            $sql = $this->queryBuilder->sql();

 
		return $this->db->query($sql, $this->queryBuilder->values);
	}









	
	
}