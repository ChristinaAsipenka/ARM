<?php

namespace Basis\Controller;

use Basis\Controller\AddressController;
use Basis\Controller\LogController;
use Admin\Controller\AdminController;
use Engine\Helper\Cookie;

class SubjectController extends AdminController
{
	public function search()
    {
 
        $this->view->render('subject/search', $this->data);
    }
	
    public function listing()
    {
	
		
		$id_user = $this->data['id_user'];
		
		$spr_otdel = $this->data['spr_cod_otd'];
		
		$spr_podrazdelenie = $this->data['spr_cod_podrazd'];
		
		$spr_branch = $this->data['spr_cod_branch'];
		
		$access_level = $this->data['access_level'];
		
		$inspection_type = $this->data['inspection_type'];
		
		$arm_group = $this->data['inspection_type'];


	   $this->load->model('Subject');
	 		

		if(strlen($spr_branch) > 0 && $access_level == 5 || $access_level == 6){ /** если пользователь из аппарата управления **/
			$this->data['subject'] = $this->model->subject->getSubjectByMro($spr_podrazdelenie);
			//$this->data['subject'] = $this->model->subject->getSubject();
		}elseif(strlen($spr_branch) > 0 && $access_level == 4){ /** если пользователь управления филиала **/
			$this->data['subject'] = $this->model->subject->getSubjectByBranch($spr_branch);

		}elseif(strlen($spr_podrazdelenie) > 0 && $access_level == 3){ /** если пользователь начальник МрО, инженер МрО, зам.нач МрО**/
			$this->data['subject'] = $this->model->subject->getSubjectByMro($spr_podrazdelenie);

		}elseif(strlen($spr_otdel) > 0 && $access_level == 2){ /** если пользователь начальник группы или начальник РЭГИ**/
			$this->data['subject'] = $this->model->subject->getSubjectByGroup($spr_otdel);
			
		}elseif(strlen($id_user) > 0 && $access_level == 1){/** если пользователь инспектор **/
			$this->data['subject'] = $this->model->subject->getSubjectByUser($id_user, $arm_group);

		}
			$this->data['subject_all_objs'] = $this->model->subject->getSubjectCount();
		
		
		
		$this->load->model('Branch');		
		$this->data['branch'] = $this->model->branch->getBranch();
		
		if($access_level >= 4){
			$this->load->model('Podrazdelenie');		
			$this->data['podrazdelenie'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($spr_branch);
			$this->load->model('Otdel');		
			$this->data['otdel'] = $this->model->otdel->getOtdelByPodrazdelenie($spr_podrazdelenie);
		}
		if($access_level == 3){
			$this->load->model('Podrazdelenie');		
			$this->data['podrazdelenie'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($spr_branch);
			$this->load->model('Otdel');		
			$this->data['otdel'] = $this->model->otdel->getOtdelByPodrazdelenie($spr_podrazdelenie);
		}
		
		if($access_level == 2){
			$this->load->model('Podrazdelenie');		
			$this->data['podrazdelenie'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($spr_branch);
			$this->load->model('Otdel');		
			$this->data['otdel'] = $this->model->otdel->getOtdelByPodrazdelenie($spr_podrazdelenie);
			$this->load->model('User');		
			$this->data['user'] = $this->model->user->getUsersByOtdel($spr_otdel);
		}
		
		if($access_level == 1){
			$this->load->model('Podrazdelenie');		
			$this->data['podrazdelenie'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($spr_branch);
			$this->load->model('Otdel');		
			$this->data['otdel'] = $this->model->otdel->getOtdelByPodrazdelenie($spr_podrazdelenie);
			$this->load->model('User');		
			$this->data['user'] = $this->model->user->getUsersByOtdel($spr_otdel);
		}
   $this->view->render('subject/list', $this->data);     
    }


    public function listing_subject($id)
    {
		
		//$params = $this->request->post;
	
		$id_user = $this->data['id_user'];
		
		$spr_otdel = $this->data['spr_cod_otd'];
		
		$spr_podrazdelenie = $this->data['spr_cod_podrazd'];
		
		$spr_branch = $this->data['spr_cod_branch'];
		
		$access_level = $this->data['access_level'];
		
  		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($id);     



	   $this->load->model('Subject');
		$this->data['subject'] = $this->model->subject->getSubjectByUnp($id);

		$this->load->model('Branch');		
		$this->data['branch'] = $this->model->branch->getBranch();
		
		$this->load->model('Podrazdelenie');		
		$this->data['podrazdelenie'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($spr_branch);
		$this->load->model('Otdel');		
		$this->data['otdel'] = $this->model->otdel->getOtdelByPodrazdelenie($spr_podrazdelenie);
		$this->load->model('User');		
		$this->data['user'] = $this->model->user->getUsersByOtdel($spr_otdel);

        $this->view->render('unp/list_subject', $this->data);
    }

	
	
    public function create($id_unp = null)
    {
		
		if($id_unp > 0){
			//echo $id_unp;
			$this->load->model('Unp');
			$this->data['unp_head'] = $this->model->unp->getUnpData($id_unp);
			
			$this->load->model('District');	
			$this->data['districts'] = $this->model->district->getDistrictByRegion($this->data['unp_head']['address_region']);
			$this->data['districtsPost'] = $this->model->district->getDistrictByRegion($this->data['unp_head']['address_region']);
			
			$this->load->model('City');	
			$this->data['cities'] = $this->model->city->getCityByDistrict($this->data['unp_head']['address_district']);
			$this->data['citiesPost'] = $this->model->city->getCityByDistrict($this->data['unp_head']['address_district']);
			
			$this->load->model('CityZone');	
			$this->data['citiesZone'] = $this->model->cityZone->getCityZoneByCity($this->data['unp_head']['address_city']);
			
		};
		
        $this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegion();
		
		$this->load->model('TypeProperty');		
		$this->data['properties'] = $this->model->typeProperty->getTypeProperty();		
		
		$this->load->model('User');		
		$this->data['users'] = $this->model->user->getUsers();
		$this->data['usersElectro'] = $this->model->user->getUsersElektro();
		$this->data['usersTeplo'] = $this->model->user->getUsersTeplo();
		$this->data['usersGaz'] = $this->model->user->getUsersGaz();
		
		
		$this->load->model('Spr_type_street');
		$this->data['spr_type_street'] = $this->model->spr_type_street->getSpr_type_street();
		
		$this->load->model('Spr_type_city');
		$this->data['spr_type_city'] = $this->model->spr_type_city->getSpr_type_city();		
		
		$this->load->model('Spr_shift_of_work');
		$this->data['spr_shift_of_work'] = $this->model->spr_shift_of_work->getSpr_shift_of_work();
		
		$this->load->model('Spr_kind_of_activity');
		$this->data['spr_kind_of_activity'] = $this->model->spr_kind_of_activity->getSpr_kind_of_activity();

		$this->load->model('Spr_otv_vibor');
		$this->data['spr_otv_vibor'] = $this->model->spr_otv_vibor->getSpr_otv_vibor();

		/*$this->load->model('Personal');
		$this->data['spr_otv_fio_eh_osn_sob'] = $this->model->personal->getOtv_fio_sobList();*/
/****  Филиал ****/
		$this->load->model('Branch');		
		$this->data['branchs'] = $this->model->branch->getBranch();	
	
		/*****  МРО  *****/
		$this->load->model('Podrazdelenie');	
		$this->data['podrazdelenies'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($this->data['spr_cod_branch']);		
		/**** Отделы (Otdel) ****/
		$this->load->model('Otdel');	
		$this->data['otdels'] = $this->model->otdel->getOtdelByPodrazdelenie($this->data['spr_cod_podrazd']);

		$this->load->model('Subj_dog');
		$this->data['subj_dog'] = $this->model->subj_dog->getSubj_dog();
		//$this->data['subj_dogs'] = $this->model->subj_dog->getSubj_dogById($this->data['subject']['id']);		
		
		
		
		$this->view->render('subject/create', $this->data);
    }

    public function edit($id)
    {
        $this->load->model('Subject');

        $this->data['subject'] = $this->model->subject->getSubjectData($id);
		$this->data['resp_subject_e1'] = $this->model->subject->getRespSubjectE1($id);
		$this->data['resp_subject_e2'] = $this->model->subject->getRespSubjectE2($id);
		$this->data['resp_subject_t'] = $this->model->subject->getRespSubjectT($id);
		$this->data['resp_subject_g'] = $this->model->subject->getRespSubjectG($id);
		
		
		$this->data['person_info_e3'] = $this->model->subject->getPersInfoByID($this->data['subject']['otv_e3']);
		$this->data['person_info_e1'] = $this->model->subject->getPersInfoByID1($this->data['subject']['otv_e1']);
		$this->data['person_info_e2'] = $this->model->subject->getPersInfoByID2($this->data['subject']['otv_e2']);
		
		$this->data['person_info_t3'] = $this->model->subject->getPersInfoByID_t($this->data['subject']['otv_t3']);
		$this->data['person_info_t1'] = $this->model->subject->getPersInfoByID1_t($this->data['subject']['otv_t1']);
		$this->data['person_info_t2'] = $this->model->subject->getPersInfoByID2_t($this->data['subject']['otv_t2']);
		
		$this->data['name_type_otv'] = $this->model->subject->getNameTypeOtv($this->data['subject']['otv_type_e']);
		$this->data['name_type_otv_t'] = $this->model->subject->getNameTypeOtvT($this->data['subject']['otv_type_t']);
		//print_r($this->data['subject']);
		/****** Вышестоящая организация ****************/
		$this->load->model('Unp');
		$this->data['unp_head'] = $this->model->unp->getUnpData($this->data['subject']['id_unp_head']);
		
		/****** Юр лицо ****************/
		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['subject']['id_unp']);
		
		/****** Физ. лицо ****************/
		$this->load->model('Individual_persons');
		$this->data['ind_pers'] = $this->model->individual_persons->getIndividual_personsData($this->data['subject']['id_ind_pers']);		
		
		/******  ****************/
		$this->load->model('TypeProperty');		
		$this->data['properties'] = $this->model->typeProperty->getTypeProperty();
		
		$this->load->model('Department');		
		$this->data['departments'] = $this->model->department->getDepartmentByTypeProperty($this->data['subject']['type_property']);
		
		/**** Инспектора (Users) ****/
		$this->load->model('User');	
		$this->data['users'] = $this->model->user->getUsers();		
		$this->data['usersElectro'] = $this->model->user->getUsersElektro();
		$this->data['usersTeplo'] = $this->model->user->getUsersTeplo();
		$this->data['usersGaz'] = $this->model->user->getUsersGaz();
		
		$this->data['create_user'] = $this->model->user->getUserById($this->data['subject']['create_user']); // пользователь создавший потребителя
		
		
		/**** Область (Region) ****/
		$this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegion();
		$this->data['regionsPost'] = $this->model->region->getRegion();
		
		/**** Район (District) ****/
		$this->load->model('District');	
		$this->data['districts'] = $this->model->district->getDistrictByRegion($this->data['subject']['place_address_region']);
		$this->data['districtsPost'] = $this->model->district->getDistrictByRegion($this->data['subject']['post_address_region']);
		
		if($this->data['subject']['fname_address_region'] > 0){
			$this->data['districtsFname'] = $this->model->district->getDistrictByRegion($this->data['subject']['fname_address_region']);
		}else{
			$this->data['districtsFname'] = $this->model->district->getDistrictByRegion($this->data['unp']['address_region']);
		}
		
		/**** Город (City) ****/
		$this->load->model('City');	
		$this->data['cities'] = $this->model->city->getCityByDistrict($this->data['subject']['place_address_district']);
		$this->data['citiesPost'] = $this->model->city->getCityByDistrict($this->data['subject']['post_address_district']);
		
		if($this->data['subject']['fname_address_district'] > 0){
			$this->data['citiesFname'] = $this->model->city->getCityByDistrict($this->data['subject']['fname_address_district']);
		}else{
			$this->data['citiesFname'] = $this->model->city->getCityByDistrict($this->data['unp']['address_district']);
		}
		
		/**** Район города (CityZone) ****/
		$this->load->model('CityZone');	
		$this->data['citiesZone'] = $this->model->cityZone->getCityZoneByCity($this->data['subject']['place_address_city']);
		$this->data['citiesZonePost'] = $this->model->cityZone->getCityZoneByCity($this->data['subject']['post_address_city']);
		
		$this->load->model('Objects');
		$this->data['objects'] = $this->model->objects->getObjectsList($this->data['subject']['id']);
		$this->data['objects_bron'] = $this->model->objects->getObjectsListBron($this->data['subject']['id']);
		$this->data['objects_bron_teplo'] = $this->model->objects->getObjectsListBronTeplo($this->data['subject']['id']);
				
		$this->load->model('Spr_type_street');
		$this->data['spr_type_street'] = $this->model->spr_type_street->getSpr_type_street();
		
		$this->load->model('Spr_type_city');
		$this->data['spr_type_city'] = $this->model->spr_type_city->getSpr_type_city();		

		$this->load->model('Spr_shift_of_work');
		$this->data['spr_shift_of_work'] = $this->model->spr_shift_of_work->getSpr_shift_of_work();
		
		$this->load->model('Spr_kind_of_activity');
		$this->data['spr_kind_of_activity'] = $this->model->spr_kind_of_activity->getSpr_kind_of_activity();

		$this->load->model('Spr_otv_vibor');
		$this->data['spr_otv_vibor'] = $this->model->spr_otv_vibor->getSpr_otv_vibor();

		$this->load->model('Branch');		
		$this->data['branchs'] = $this->model->branch->getBranch();
/**** Подразделение (Podrazdelenie) ****/
		$this->load->model('Podrazdelenie');	
		$this->data['podrazdelenies'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($this->data['subject']['spr_branch']);		
		/**** Отделы (Otdel) ****/
		$this->load->model('Otdel');	
		$this->data['otdels'] = $this->model->otdel->getOtdelByPodrazdelenie($this->data['subject']['spr_podrazdelenie']);	

		$this->load->model('Subj_dog');
		$this->data['subj_dog'] = $this->model->subj_dog->getSubj_dog();
		$this->data['subj_dogs'] = $this->model->subj_dog->getSubj_dogById($this->data['subject']['id']);


		
        $this->view->render('subject/edit', $this->data);
    }
	public function info($id)
    {

		$this->load->model('Subject');
        $this->data['subject'] = $this->model->subject->getSubjectData($id);
		/****** Вышестоящая организация ****************/
		$this->load->model('Unp');
		$this->data['unp_head'] = $this->model->unp->getUnpData($this->data['subject']['id_unp_head']);
		/****** Юр лицо **********/
		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['subject']['id_unp']);
		
		
		$this->load->model('Personal');
		$this->data['resp_e'] = $this->model->personal->getPersonalData($this->data['subject']['otv_e1']);		
		$this->data['resp_e_zam'] = $this->model->personal->getPersonalData($this->data['subject']['otv_e2']);
		$this->data['resp_t'] = $this->model->personal->getPersonalData($this->data['subject']['otv_t1']);
		$this->data['resp_g'] = $this->model->personal->getPersonalData($this->data['subject']['otv_g1']);
		
		$this->load->model('TypeProperty');		
		$this->data['properties'] = $this->model->typeProperty->getTypePropertyData($this->data['subject']['type_property']);
		
		$this->load->model('Department');		
		$this->data['departments'] = $this->model->department->getDepartmentData($this->data['subject']['type_department']);
		
		/**** Инспектора (Users) ****/
		$this->load->model('User');	
		$this->data['users'] = $this->model->user->getUsers();		
		$this->data['usersElectro'] = $this->model->user->getUsersElektro();
		$this->data['usersTeplo'] = $this->model->user->getUsersTeplo();
		$this->data['usersGaz'] = $this->model->user->getUsersGaz();
		
		/**** Область (Region) ****/
		$this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegionData($this->data['subject']['place_address_region']);
		$this->data['regionsPost'] = $this->model->region->getRegionData($this->data['subject']['post_address_region']);
		
		/**** Район (District) ****/
		$this->load->model('District');	
		$this->data['districts'] = $this->model->district->getDistrictData($this->data['subject']['place_address_district']);
		$this->data['districtsPost'] = $this->model->district->getDistrictData($this->data['subject']['post_address_district']);
		/**** Город (City) ****/
		$this->load->model('City');	
		$this->data['cities'] = $this->model->city->getCityData($this->data['subject']['place_address_city']);
		$this->data['citiesPost'] = $this->model->city->getCityData($this->data['subject']['post_address_city']);
		/**** Район города (CityZone) ****/
		$this->load->model('CityZone');	
		$this->data['citiesZone'] = $this->model->cityZone->getCityZoneData($this->data['subject']['place_address_city_zone']);
		$this->data['citiesZonePost'] = $this->model->cityZone->getCityZoneData($this->data['subject']['post_address_city_zone']);
		/**** Инспектора (Users) ****/
	
		$this->load->model('Objects');
		$this->data['objects'] = $this->model->objects->getObjectsList($this->data['subject']['id']);
		$this->data['objects_bron'] = $this->model->objects->getObjectsListBron($this->data['subject']['id']);
		$this->data['objects_bron_teplo'] = $this->model->objects->getObjectsListBronTeplo($this->data['subject']['id']);
		
		$this->load->model('Spr_type_city');
		$this->data['spr_type_city'] = $this->model->spr_type_city->getSpr_type_cityData($this->data['subject']['id']);
		$this->load->model('Spr_type_street');
		$this->data['spr_type_street'] = $this->model->spr_type_street->getSpr_type_streetData($this->data['subject']['id']);		

		$this->load->model('Spr_shift_of_work');
		$this->data['spr_shift_of_work'] = $this->model->spr_shift_of_work->getSpr_shift_of_workData($this->data['subject']['shift_work']);
		$this->load->model('Spr_kind_of_activity');
		$this->data['spr_kind_of_activity'] = $this->model->spr_kind_of_activity->getSpr_kind_of_activityData($this->data['subject']['type_activity']);
	
		$this->load->model('Spr_otv_vibor');
		$this->data['spr_otv_vibor'] = $this->model->spr_otv_vibor->getSpr_otv_vibor();
		/**** Филиал (Branch) ****/		
		$this->load->model('Branch');		
		$this->data['branchs'] = $this->model->branch->getBranch();
		$this->data['branches'] = $this->model->branch->getBranchData($this->data['subject']['spr_branch']);
		/**** Подразделение (Podrazdelenie) ****/
		$this->load->model('Podrazdelenie');	
		$this->data['podrazdelenies'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($this->data['subject']['spr_branch']);	
		$this->data['podrazdelenieses'] = $this->model->podrazdelenie->getPodrazdelenieData($this->data['subject']['spr_podrazdelenie']);		
		/**** Отделы (Otdel) ****/
		$this->load->model('Otdel');	
		$this->data['otdels'] = $this->model->otdel->getOtdelByPodrazdelenie($this->data['subject']['spr_podrazdelenie']);
		$this->data['otdelses'] = $this->model->otdel->getOtdelData($this->data['subject']['spr_otdel']);
		
		$this->load->model('Subj_dog');
		$this->data['subj_dog'] = $this->model->subj_dog->getSubj_dog();
		$this->data['subj_dogs'] = $this->model->subj_dog->getSubj_dogById($this->data['objects']['id']);
		
	  echo json_encode($this->data);
    }
	
		
	
	
	
    public function add()
    {
  
		$this->load->model('Subject');

        $params = $this->request->post;

//print_r($params);
        if (isset($params['name'])) {
			
			$checkSubject = $this->model->subject->getSubjectByFullNameAndOtdel(str_replace(' ','',$params['name']));
			
			$subjectId = 0;
			if(count($checkSubject) == 0){
				
				$subjectId = $this->model->subject->createSubject($params);
				
			}
			
			if($subjectId > 0){
				LogController::createLogFile('subjects', $subjectId);
			}
			
//print_r($subjectId);			
		if($subjectId > 0){
			
			if(isset($params['ids_subj_dog']) && count($params['ids_subj_dog'])>0){	

				$this->load->model('Subj_dog');
				$params['id_subject'] = $subjectId;
				
				foreach($params['ids_subj_dog'] as $id_subj_dog){
				
					$params['id_subj_dog'] = $id_subj_dog;
					
					$this->model->subj_dog->updateSubj_dog($params);
				}
			}			
		}	
			
			
            echo $subjectId;
          
        }
    }

    public function update()
    {
        $this->load->model('Subject');
		$subjectId = 0;
		$err = 1;
        $params = $this->request->post;
	//print_r($params);
	
		if(isset($params['name'])){
			$checkSubject = $this->model->subject->getSubjectByFullNameAndOtdel(str_replace(' ','',$params['name']));
		}
		
			//print_r($checkSubject);
			
        if (isset($params['subject_id'])) {
			
			if(!empty($checkSubject)){ 
			
				if($params['subject_id'] == $checkSubject[0]['id'])  {
			
					$subjectId = $this->model->subject->updateSubject($params);
					
				//	LogController::addInLogFile('subjects', $params['subject_id'], $params);
				}else{
					
					$err = 0; // Потребитель с таким наименованием уже существует
					
				}	
				
			}else{
			
				$subjectId = $this->model->subject->updateSubject($params);
					
				
			}
			
			LogController::addInLogFile('subjects', $params['subject_id'], $params);
        }
		echo $err;
    }
	
	public function removeItem()
    {

        $params = $this->request->post;

        $this->load->model('Subject');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->subject->removeItems($params['item_id']);
            echo $removeItem;
        }
    }
	
	public function add_subj_dog()
    {

        $this->load->model('Subj_dog');

        $params = $this->request->post;
		
		$str_subj_dog = '';
			

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$subj_dogId = $this->model->subj_dog->updateSubj_dogInfo($params);
		

		}else{
            $subj_dogId = $this->model->subj_dog->createSubj_dog($params);
           

			if($subj_dogId != 0){
				
				
				
				$str_subj_dog ="<tr id_subj_dog='$subj_dogId'>";
				$str_subj_dog .="<td name='name'>".$params['name']."</td>";
				$str_subj_dog .="<td name='number'>".$params['number']."</td>";
				$str_subj_dog .="<td name='date_dog'>".(strlen($params['date_dog']) > 0 ? date('d.m.Y',strtotime($params['date_dog'])) : '')."</td>";
				$str_subj_dog .="<td><div class='menu-item-event'><div><button class='button-edit'   onclick = \"modalWindow.openModalEdit('ModalSubj_dog',$subj_dogId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='subject.removeTableItem(\"subj_dog\",$subj_dogId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_subj_dog;
        }
    }
	
public function removeObjTableRow()
    {

        $params = $this->request->post;

		switch($params['table_name']){
			case 'subj_dog':
				$this->load->model('Subj_dog');
				$this->model->subj_dog->removeItems($params['item_id']);
			break;

			default:
		}


        /*$this->load->model('Objects');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->objects->removeItems($params['item_id']);
            echo $removeItem;
        }*/
    }

	public function getUnpforOtv()
		{
			$params = $this->request->post;
			//print_r($params);
			$this->load->model('Personal');
			$spr_otv_fio_eh_osn_sob = $this->model->personal->getOtv_fio_sobList($params['id_unp']);			
			echo json_encode($spr_otv_fio_eh_osn_sob);
		}

	public function insertInfoOtv()
		{

			$params = $this->request->post;

			$this->load->model('Personal');
			$spr_otv_info = $this->model->personal->getOtv_InfoList($params['id_otv']);			
						
			echo json_encode($spr_otv_info);

		}

	public function add_otv_eh_sob()
    {

        $this->load->model('Subject');

        $params = $this->request->post;
		
		$str_subj_otv_e = '';
			
    }
    
	public function add_otv_th_sob()
    {

        $this->load->model('Subject');

        $params = $this->request->post;
		
		$str_subj_otv_t = '';
			
    }


	
	
}