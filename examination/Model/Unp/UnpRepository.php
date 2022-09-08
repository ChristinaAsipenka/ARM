<?php

namespace Examination\Model\Unp;

use Engine\Model;

class UnpRepository extends Model
{

    public function getUnp()
    {
        $sql = $this->queryBuilder->select('reestr_unp.id AS id, reestr_unp.unp, reestr_unp.name AS reestr_unp_name, reestr_unp.name_short, reestr_unp.address_index, reestr_unp.address_region, reestr_unp.address_district, reestr_unp.address_city, reestr_unp.address_city_zone, reestr_unp.address_street, reestr_unp.address_building, reestr_unp.address_flat, reestr_unp.address_portal, reestr_unp.liquidated, reestr_unp.address_city_type, reestr_unp.address_street_type, COUNT(DISTINCT reestr_personal.id) AS count_otv, reestr_personal.id AS reestr_personal_id, COUNT(DISTINCT reestr_subject.id) AS count_subject, reestr_subject.id AS reestr_subject_id')
            ->from('reestr_unp')
			->joinLeftTable('reestr_personal', 'reestr_personal.id_reestr_unp = reestr_unp.id')
			->joinLeftTable('reestr_subject', 'reestr_subject.id_unp = reestr_unp.id')
			->groupBy('reestr_unp.id', 'ASC')
            ->orderBy('reestr_unp.name', 'ASC')
            ->sql();
        return $this->db->query($sql);
    }
	
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('reestr_unp')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
	
/**** Функции для поиска в реестре по УНП, краткому и полному наименованию   ****/
	public function getUnpByParams($strSearch, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_unp.id, reestr_unp.unp , reestr_unp.name AS reestr_unp_name, reestr_unp.name_short, reestr_unp.address_index, reestr_unp.address_region, reestr_unp.address_district, reestr_unp.address_city, reestr_unp.address_city_zone , reestr_unp.address_street, reestr_unp.address_building, reestr_unp.address_flat, reestr_unp.address_portal, reestr_unp.liquidated, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, reestr_subject.id AS reestr_subject_id, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.name AS reestr_subject_name, spr_type_city.sokr_name AS spr_type_city_name, spr_type_street.sokr_name AS spr_type_street_name, reestr_unp.address_city_type, reestr_unp.address_street_type, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, reestr_personal.id as reestr_personal_id, COUNT(DISTINCT reestr_subject.id) as count_p')
            ->from('reestr_unp reestr_unp')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_unp.address_city_type')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_unp.address_street_type')
			->joinLeftTable('spr_region spr_region', 'spr_region.id = reestr_unp.address_region')
			->joinLeftTable('spr_district spr_district', 'spr_district.id = reestr_unp.address_district')
			->joinLeftTable('spr_city spr_city', 'spr_city.id = reestr_unp.address_city')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_unp.id = reestr_subject.id_unp')
			->joinLeftTable('reestr_personal reestr_personal', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->where('reestr_unp.unp', '%'.trim($strSearch).'%', 'LIKE')
			->groupBy('reestr_unp.id', 'ASC')
            ->orderBy('reestr_unp.name', 'ASC')
            ->sql();
		return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getUnpByName($name, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_unp.id, reestr_unp.unp , reestr_unp.name AS reestr_unp_name, reestr_unp.name_short, reestr_unp.address_index, reestr_unp.address_region, reestr_unp.address_district, reestr_unp.address_city, reestr_unp.address_city_zone , reestr_unp.address_street, reestr_unp.address_building, reestr_unp.address_flat, reestr_unp.address_portal, reestr_unp.liquidated, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, reestr_subject.id AS reestr_subject_id,reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.name AS reestr_subject_name, spr_type_city.sokr_name AS spr_type_city_name, spr_type_street.sokr_name AS spr_type_street_name, reestr_unp.address_city_type, reestr_unp.address_street_type, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel, reestr_personal.id as reestr_personal_id, COUNT(DISTINCT reestr_subject.id) as count_p')
            ->from('reestr_unp reestr_unp')
			->joinLeftTable('spr_region spr_region', 'spr_region.id = reestr_unp.address_region')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_unp.address_city_type')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_unp.address_street_type')
			->joinLeftTable('spr_district spr_district', 'spr_district.id = reestr_unp.address_district')
			->joinLeftTable('spr_city spr_city', 'spr_city.id = reestr_unp.address_city')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_unp.id = reestr_subject.id_unp')
			->joinLeftTable('reestr_personal reestr_personal', 'reestr_unp.id = reestr_personal.id_reestr_unp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->where('reestr_unp.name', '%'.trim($name).'%', 'LIKE')
			->orWhere('reestr_unp.name_short', '%'.trim($name).'%', 'LIKE')
			->groupBy('reestr_unp.id', 'ASC')
            ->orderBy('reestr_unp.name', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getUnpByFirstName($name, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_personal.id, reestr_personal.firstname, reestr_personal.secondname, reestr_personal.lastname, reestr_personal.post, reestr_personal.id_reestr_unp, reestr_personal.post_data, reestr_personal.tel, reestr_personal.email')
            ->from('reestr_personal')
			->where('reestr_personal.secondname', '%'.trim($name).'%', 'LIKE')
            ->groupBy('reestr_personal.id', 'ASC')
			->orderBy('reestr_personal.secondname', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }	
	
/**** Функции для поиска ответственых лиц в реестре по УНП, краткому и полному наименованию   ****/

	public function getRespByParams($strSearch, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_unp.id, reestr_unp.unp , reestr_unp.name AS reestr_unp_name, reestr_unp.name_short, reestr_unp.address_index, reestr_unp.address_region, reestr_unp.address_district, reestr_unp.address_city, reestr_unp.address_city_zone , reestr_unp.address_street, reestr_unp.address_building, reestr_unp.address_flat, reestr_unp.address_portal, reestr_unp.liquidated, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, reestr_subject.id AS reestr_subject_id, reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.name AS reestr_subject_name, spr_type_city.sokr_name AS spr_type_city_name, spr_type_street.sokr_name AS spr_type_street_name, reestr_unp.address_city_type, reestr_unp.address_street_type, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.id AS reestr_personal_id, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.id AS reestr_personal_id, reestr_personal.post AS reestr_personal_post, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel')
            ->from('reestr_unp reestr_unp')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_unp.address_city_type')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_unp.address_street_type')
			->joinLeftTable('spr_region spr_region', 'spr_region.id = reestr_unp.address_region')
			->joinLeftTable('spr_district spr_district', 'spr_district.id = reestr_unp.address_district')
			->joinLeftTable('spr_city spr_city', 'spr_city.id = reestr_unp.address_city')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_unp.id = reestr_subject.id_unp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->joinLeftTable('reestr_personal', 'reestr_personal.id_reestr_unp = reestr_unp.id')
			->where('reestr_unp.unp', '%'.trim($strSearch).'%', 'LIKE')
           // ->groupBy('reestr_unp.unp')
			->groupBy('reestr_personal.id')
			->orderBy('reestr_unp.name', 'ASC')
			
            ->sql();
			
		return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getRespByName($name, $params =[])
    {
        $sql = $this->queryBuilder->select('reestr_unp.id, reestr_unp.unp , reestr_unp.name AS reestr_unp_name, reestr_unp.name_short, reestr_unp.address_index, reestr_unp.address_region, reestr_unp.address_district, reestr_unp.address_city, reestr_unp.address_city_zone , reestr_unp.address_street, reestr_unp.address_building, reestr_unp.address_flat, reestr_unp.address_portal, reestr_unp.liquidated, spr_region.name AS spr_region_name, spr_district.name AS spr_district_name, spr_city.name AS spr_city_name, reestr_subject.id AS reestr_subject_id,reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.name AS reestr_subject_name, spr_type_city.sokr_name AS spr_type_city_name, spr_type_street.sokr_name AS spr_type_street_name, reestr_unp.address_city_type, reestr_unp.address_street_type, reestr_personal.id_reestr_unp AS reestr_personal_id_reestr_unp, reestr_personal.id AS reestr_personal_id, reestr_personal.firstname AS reestr_personal_firstname, reestr_personal.secondname AS reestr_personal_secondname, reestr_personal.lastname AS reestr_personal_lastname, reestr_personal.id AS reestr_personal_id, reestr_personal.post AS reestr_personal_post, spr_branch.sokr_name AS spr_branch_name, spr_podrazdelenie.sokr_name AS spr_name_podrazd, spr_otdel.sokr_name AS spr_name_otdel')
            ->from('reestr_unp reestr_unp')
			->joinLeftTable('spr_region spr_region', 'spr_region.id = reestr_unp.address_region')
			->joinLeftTable('spr_type_city', 'spr_type_city.id = reestr_unp.address_city_type')
			->joinLeftTable('spr_type_street', 'spr_type_street.id = reestr_unp.address_street_type')
			->joinLeftTable('spr_district spr_district', 'spr_district.id = reestr_unp.address_district')
			->joinLeftTable('spr_city spr_city', 'spr_city.id = reestr_unp.address_city')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_unp.id = reestr_subject.id_unp')
			->joinLeftTable('spr_branch as spr_branch', 'spr_branch.id = reestr_subject.spr_branch')
			->joinLeftTable('spr_podrazdelenie as spr_podrazdelenie', 'spr_podrazdelenie.id = reestr_subject.spr_podrazdelenie')
			->joinLeftTable('spr_otdel as spr_otdel', 'spr_otdel.id = reestr_subject.spr_otdel')
			->joinLeftTable('reestr_personal', 'reestr_personal.id_reestr_unp = reestr_unp.id')
			->where('reestr_unp.name', '%'.trim($name).'%', 'LIKE')
			->orWhere('reestr_unp.name_short', '%'.trim($name).'%', 'LIKE')
          // ->groupBy('reestr_unp.unp')
		   ->groupBy('reestr_personal.id')
		   ->orderBy('reestr_unp.name', 'ASC')
			
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }



/*****************************************************************************************/
    public function getUnpData($id)
    {
        $unp = new Unp($id);

        return $unp->findOne();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createUnp($params)
    {

        $unp = new Unp;
        $unp->setUnp($params['unp']);
        $unp->setName($params['name']);
		$unp->setName_short($params['name_short']);
		$unp->setAddress_index($params['address_index']);
		$unp->setAddress_region($params['address_region']);
		$unp->setAddress_district($params['address_district']);
		$unp->setAddress_city($params['address_city']);
		$unp->setAddress_city_zone($params['address_city_zone']);
		$unp->setAddress_street($params['address_street']);
		$unp->setAddress_street_type($params['address_street_type']);
		$unp->setAddress_city_type($params['address_city_type']);
		$unp->setAddress_building($params['address_building']);
		$unp->setAddress_flat($params['address_flat']);
		$unp->setAddress_portal($params['address_portal']);
		$unp->setLiquidated($params['liquidated']);


		$unpId = $unp->save();

        return $unpId;
    }


    public function updateUnp($params)
    {
		//print_r($params);
        if (isset($params['unp_id'])) {
            $unp = new Unp($params['unp_id']);
			$unp->setUnp($params['unp']);
			$unp->setName($params['name']);
			$unp->setName_short($params['name_short']);
			$unp->setAddress_index($params['address_index']);
			$unp->setAddress_region($params['address_region']);
			$unp->setAddress_district($params['address_district']);
			$unp->setAddress_city($params['address_city']);
			$unp->setAddress_city_zone($params['address_city_zone']);
			$unp->setAddress_street($params['address_street']);
			$unp->setAddress_street_type($params['address_street_type']);
			$unp->setAddress_city_type($params['address_city_type']);
			$unp->setAddress_building($params['address_building']);
			$unp->setAddress_flat($params['address_flat']);
			$unp->setAddress_portal($params['address_portal']);
			$unp->setLiquidated($params['liquidated']);
            $unp->save();
        }
    }
	
	
	public function getSubjectByUnp($itemId)
    {
        $sql = $this->queryBuilder->select('reestr_subject.id_unp AS reestr_subject_id_unp, reestr_subject.name AS reestr_subject_name, reestr_unp.id AS reestr_unp_id')
            ->from('reestr_subject')
			->where('reestr_subject_id_unp', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

	 public function getPortalUnpData($unp)
    {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
		$unpData = trim($unp);	
		$url = 'http://www.portal.nalog.gov.by/grp/getData?unp='.$unpData.'&charset=UTF-8&type=json';

		curl_setopt($ch, CURLOPT_URL, $url);
		$response = curl_exec($ch);
		$data_arr = json_decode($response,true);
		//print_r($data_arr);
		$DataFromPortal = array();
		if(!empty($data_arr)){
		foreach($data_arr as $data){
			//if(strcasecmp($data['CKODSOST'], '1') == 0){
			//	echo $data["VUNP"].'  '.$data['VNAIMK'].'<br/>'; 
			$VUNP = trim($data["VUNP"]); 
			$VNAIMP = $data["VNAIMP"]; 
			$VNAIMK = $data['VNAIMK']; 
			$VPADRES = $data['VPADRES'];
			$DREG = $data['DREG'];
			$NMNS = $data['NMNS']; 
			$VMNS = $data['VMNS'];
			$CKODSOST = $data['CKODSOST']; 
			$VKODS = $data['VKODS'];
			$DLIKV = $data['DLIKV']; 
			$VLIKV = $data['VLIKV'];
			
			$addr_arr = explode(',', $VPADRES);
			//print_r($addr_arr);
			//echo '<br/>';
			$obl = '';
			$disrt = '';
			$city = '';
			$build = '';
			$street = '';
			$flat = '';
			foreach($addr_arr as $addr_item){
				
				
					if(stristr($addr_item, 'обл.') != FALSE){
						$obl = trim(str_replace('обл.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'р-н') != FALSE){
						$disrt = trim(str_replace('р-н', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'г.') != FALSE || stristr($addr_item, 'г ') != FALSE ){
						$city = trim(str_replace('г.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'г ') != FALSE ){
						$city = trim(str_replace('г ', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'пос.') != FALSE){
						$city = trim(str_replace('пос.', '',trim($addr_item)));
					}
					// агрогородок
					if(stristr($addr_item, 'аг.') != FALSE){
						$city = trim(str_replace('аг.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'гп.') != FALSE){
						$city = trim(str_replace('гп.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'ул.') != FALSE){
						$street = trim(str_replace('ул.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'пр.') != FALSE){
						$street = trim(str_replace('пр.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'пер.') != FALSE){
						$street = trim(str_replace('пер.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'б-р.') != FALSE){
						$street = trim(str_replace('б-р.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'д.') != FALSE){
						$some_str = trim(str_replace('д.', '',trim($addr_item)));
						
						//if(strcmp(gettype($some_str[0]),'string') == 0){
						if(strlen($some_str) > 3 ){	
							
							$city = $some_str;
						}else{
							$build =$some_str;
						}
					}
					
					if(stristr($addr_item, 'кв.') != FALSE){
						$flat = trim(str_replace('кв.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'ком.') != FALSE){
						$flat = trim(str_replace('ком.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'оф.') != FALSE){
						$flat = trim(str_replace('оф.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'офис') != FALSE){
						$flat = trim(str_replace('офис', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'каб.') != FALSE){
						$flat = trim(str_replace('каб.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'пом.') != FALSE){
						$flat = trim(str_replace('пом.', '',trim($addr_item)));
					}
					
					
					//// если без известных префиксов, то это скорее всего здание
					
					if(stristr($addr_item, 'корп.') == FALSE && stristr($addr_item, 'корп.') == FALSE && stristr($addr_item, 'д.') == FALSE && stristr($addr_item, 'г.') == FALSE && stristr($addr_item, 'обл.') == FALSE && stristr($addr_item, 'с/с.') == FALSE && stristr($addr_item, 'аг.') == FALSE  && stristr($addr_item, 'пер.') == FALSE && stristr($addr_item, 'пр.') == FALSE && stristr($addr_item, 'ком.') == FALSE && stristr($addr_item, 'к.') == FALSE  && stristr($addr_item, 'каб.') == FALSE  && stristr($addr_item, 'пом.') == FALSE  && stristr($addr_item, 'б-р.') == FALSE  && stristr($addr_item, 'офис') == FALSE && stristr($addr_item, 'этаж') == FALSE && stristr($addr_item, 'гп.') == FALSE && stristr($addr_item, 'р-н') == FALSE && stristr($addr_item, 'пос.') == FALSE && stristr($addr_item, 'с/с') == FALSE && stristr($addr_item, 'ул.') == FALSE){
						$build = trim($addr_item);
					}
					
					if(stristr($addr_item, 'корп.') != FALSE || stristr($addr_item, 'к.') != FALSE){
						$build .= ' '. trim($addr_item);
					}

			}
			$DataFromPortal['unp'] = $VUNP;
			$DataFromPortal['name'] = $VNAIMP;
			$DataFromPortal['name_short'] = $VNAIMK;
			$DataFromPortal['liquidated'] = $CKODSOST;
			$DataFromPortal['vmns'] = $VMNS;
			/// адрес
			$DataFromPortal['address_portal'] = $VPADRES;
			
			$DataFromPortal['address_region'] = $obl;
			$DataFromPortal['address_district'] = $disrt;
			$DataFromPortal['address_city'] = $city;
			
			$DataFromPortal['address_flat'] = $flat;
			$DataFromPortal['address_building'] = $build;
			$DataFromPortal['address_street'] = $street;
			}
			}
		
		curl_close($ch);
		
		//print_r($DataFromPortal);
		return $DataFromPortal;
	}
	
	public function getUnpByFilter($params)
	{
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		$sql = $this->queryBuilder->select('reestr_unp.id, reestr_unp.unp , reestr_unp.name, COUNT(DISTINCT reestr_personal.id) AS count_otv, COUNT(DISTINCT reestr_subject.id) AS count_subject')
            ->from('reestr_unp')
			->joinLeftTable('reestr_subject reestr_subject', 'reestr_unp.id = reestr_subject.id_unp')
			->joinLeftTable('reestr_personal', 'reestr_unp.id = reestr_personal.id_reestr_unp');
			if($params['mf_region_unp'] > 0){
				$sql = $this->queryBuilder->where('address_region', $params['mf_region_unp']);	
			}
			if($params['mf_district_unp'] > 0){
				$sql = $this->queryBuilder->where('address_district', $params['mf_district_unp']);	
			}
			if($params['mf_city_unp'] > 0){
			
				$sql = $this->queryBuilder->where('address_city', $params['mf_city_unp']);	
			}
			if($params['mf_cityzone_unp'] > 0){
				$sql = $this->queryBuilder->where('address_city_zone', $params['mf_cityzone_unp'])	;
			}
			if(strlen($params['mf_street_unp']) > 0){
				$sql = $this->queryBuilder->where('address_street', '%'.$params['mf_street_unp'].'%','LIKE');	
			}
			
			$sql = $this->queryBuilder->groupBy('reestr_unp.id');
			$sql = $this->queryBuilder->orderBy('reestr_unp.name', 'ASC');
		
			
			if(isset($params['mf_num_page'])){
				$sql = $this->queryBuilder->limit($limit);
				$sql = $this->queryBuilder->offset($offset);
			}
			
			$sql = $this->queryBuilder->sql();
	//echo $sql;
        return $this->db->query($sql, $this->queryBuilder->values);
	}
	
	public function renameUnp($params)
	{
		
		//print_r($params);
		if (isset($params['unp_id'])) {
			$unp = new Unp($params['unp_id']);
			$unp->setName($params['name']);
			$unp->setName_short($params['name_short']);
			$unp->save();
			
		}
		
	}



	public function getUnpByMainPage($params)
	{


        
        $sql = $this->queryBuilder->select('reestr_unp.id AS id, reestr_unp.unp AS unp, reestr_unp.name AS name, reestr_unp.name_short AS name_short, reestr_unp.address_index AS address_index, reestr_unp.address_region AS address_region, reestr_unp.address_district AS address_district, reestr_unp.address_city_type AS address_city_type, reestr_unp.address_city AS address_city, reestr_unp.address_city_zone AS address_city_zone, reestr_unp.address_street  AS address_street, reestr_unp.address_street_type AS address_street_type, reestr_unp.address_building  AS address_building, reestr_unp.address_flat  AS  address_flat')

		->from('reestr_unp');		

			//Адрес
			if(isset($params['formRegion']) && $params['formRegion'] > 0){
				$sql = $this->queryBuilder->where('reestr_unp.address_region', $params['formRegion']);
			}
			if(isset($params['formDistrict']) && $params['formDistrict'] > 0){
				$sql = $this->queryBuilder->where('reestr_unp.address_district', $params['formDistrict']);
			}
			if(isset($params['formCity']) && $params['formCity'] > 0){
				$sql = $this->queryBuilder->where('reestr_unp.address_city', $params['formCity']);
			}
			if(isset($params['formCityZone']) && $params['formCityZone'] > 0){
				$sql = $this->queryBuilder->where('reestr_unp.address_city_zone', $params['formCityZone']);
			}
			if(isset($params['street_unp']) && strlen($params['street_unp']) > 0){
				$sql = $this->queryBuilder->where('reestr_unp.address_street', '%'.trim($params['street_unp']).'%', 'LIKE');
			}			



			$sql = $this->queryBuilder->groupBy('reestr_unp.id', 'ASC');
			$sql = $this->queryBuilder->orderBy('reestr_unp.name', 'ASC');

			
            $sql = $this->queryBuilder->sql();

        //echo $sql;
		return $this->db->query($sql, $this->queryBuilder->values);
	}

	
	
}