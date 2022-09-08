<?php

namespace Basis\Controller;

use Admin\Controller\AddressController;
use Admin\Controller\AdminController;


class ObjectsController extends AdminController
{
	public function search()
    {
		
        $this->view->render('objects/search', $this->data);
    }
	
    public function listing($id)
    {
        $this->load->model('Objects');

        $this->data['objects'] = $this->model->objects->getObjectsList($id);
		
		$this->load->model('Subject');
		
		$this->data['subject'] = $this->model->subject->getSubjectData($id);
		
		/*$this->getUserData();*/
		//*******************************************
		

        $this->view->render('objects/list', $this->data);
    }
	
	public function createEmpty(){
		
		$params = $this->request->post;
		
		//print_r($params);
		
		$this->load->model('Objects');
		
		$objectsId = $this->model->objects->createObjects($params);
		
		echo $objectsId;
		
	}

    public function create($subject_id)
    {
		/*$this->getUserData();*/
		
        /*$this->load->model('Objects');		
		$this->data['objects'] = $this->model->objects->getNewObjects();*/
		
		$this->load->model('Subject');
		$this->data['subject'] = $this->model->subject->getSubjectData($subject_id);
		
		$this->load->model('TypeProperty');		
		$this->data['properties'] = $this->model->typeProperty->getTypeProperty();
		
		$this->load->model('User');		
		$this->data['users'] = $this->model->user->getUsers();
			
	/*	$this->data['usersTeplo'] = $this->model->user->getUsersByPodrazd($this->data['spr_cod_podrazd'], 1);
		
		$this->data['usersGaz'] = $this->model->user->getUsersByPodrazd($this->data['spr_cod_podrazd'], 2);
	
		$this->data['usersElectro'] = $this->model->user->getUsersByPodrazd($this->data['spr_cod_podrazd'], 3);*/
		
		$this->data['usersTeplo'] = $this->model->user->getUsersByOtdel($this->data['spr_cod_otd']);
		
		$this->data['usersGaz'] = $this->model->user->getUsersByOtdel($this->data['spr_cod_otd']);
	
		$this->data['usersElectro'] = $this->model->user->getUsersByOtdel($this->data['spr_cod_otd']);
		/**** Область (Region) ****/
		$this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegion();		
		
		$this->load->model('Spr_og_flue');
		$this->data['spr_vidCheckDym'] = $this->model->spr_og_flue->getSPR_VidDym();

		$this->load->model('Spr_kind_of_activity');
		$this->data['spr_kind_of_activity'] = $this->model->spr_kind_of_activity->getSpr_kind_of_activity();
		
		$this->load->model('Spr_flue_mater');
		$this->data['spr_flue_materCheck'] = $this->model->spr_flue_mater->getSpr_flue_mater();
		
		$this->load->model('Spr_ot_functions');
		$this->data['spr_ot_functionsCheck'] = $this->model->spr_ot_functions->getSpr_ot_functions();	
		
		$this->load->model('Spr_type_object');
		$this->data['spr_type_objectCheck'] = $this->model->spr_type_object->getSpr_type_object();		

		$this->load->model('Spr_ot_cat');
		$this->data['spr_ot_catCheck'] = $this->model->spr_ot_cat->getSpr_ot_cat();		

		$this->load->model('Spr_type_home');
		$this->data['spr_type_homeCheck'] = $this->model->spr_type_home->getSpr_type_home();
		
		$this->load->model('Spr_ot_type_heat_source');
		$this->data['spr_ot_type_heat_source_ownCheck'] = $this->model->spr_ot_type_heat_source->getSpr_ot_type_heat_source();
		
		$this->load->model('Spr_admin');
		$this->data['spr_adminCheck'] = $this->model->spr_admin->getSpr_admin();		
		
		$this->load->model('Spr_type_gaz');
		$this->data['spr_type_gazCheck'] = $this->model->spr_type_gaz->getSpr_type_gaz();
		
		$this->load->model('Spr_units_power');
		$this->data['spr_units_powerCheck'] = $this->model->spr_units_power->getSpr_units_power();
		
		$this->load->model('Spr_oti_boiler_type');
		$this->data['spr_oti_boiler_typeCheck'] = $this->model->spr_oti_boiler_type->getSpr_oti_boiler_type();		
		
		$this->load->model('Spr_oti_type_fuel');
		$this->data['spr_oti_type_fuelCheck'] = $this->model->spr_oti_type_fuel->getSpr_oti_type_fuel();
		
		$this->load->model('Spr_oti_type_fuel_rezerv');
		$this->data['spr_oti_type_fuel_rezervCheck'] = $this->model->spr_oti_type_fuel_rezerv->getSpr_oti_type_fuel_rezerv();

		$this->load->model('Obj_oti_boiler_water');
		$this->data['obj_oti_boiler_water'] = $this->model->obj_oti_boiler_water->getObj_oti_boiler_water();
		/*$this->data['obj_oti_boiler_waters_sum'] = $this->model->obj_oti_boiler_water->getObj_oti_boiler_water_sumById($this->data['objects']['id']);*/

		
		$this->load->model('Obj_oti_boiler_vapor');
		$this->data['obj_oti_boiler_vapor'] = $this->model->obj_oti_boiler_vapor->getObj_oti_boiler_vapor();
	/*	$this->data['obj_oti_boiler_vapor_sum'] = $this->model->obj_oti_boiler_vapor->getObj_oti_boiler_vapor_sumById($this->data['objects']['id']);*/
		
		$this->load->model('Obj_ot_personal_tp');
		$this->data['obj_ot_personal_tp'] = $this->model->obj_ot_personal_tp->getObj_ot_personal_tp();
		
		$this->load->model('Mkm_object_t_ti');
		$this->data['mkm_object_t_ti'] = $this->model->mkm_object_t_ti->getMkm_object_t_ti();
		
		$this->load->model('Tabs');
		$this->data['mkm_teplo_uzel'] = $this->model->tabs->getTabs();
		
		$this->load->model('Spr_ot_systemheat_water');
		$this->data['spr_ot_systemheat_waterCheck'] = $this->model->spr_ot_systemheat_water->getSpr_ot_systemheat_water();
		
		
		$this->load->model('Spr_ot_type_razvodka');
		$this->data['spr_ot_type_razvodkaCheck'] = $this->model->spr_ot_type_razvodka->getSpr_ot_type_razvodka();
		
		
		$this->load->model('Spr_ot_type_ot_pribor');
		$this->data['spr_ot_type_ot_priborCheck'] = $this->model->spr_ot_type_ot_pribor->getSpr_ot_type_ot_pribor();		
		
		$this->load->model('Spr_ot_type_izol');
		$this->data['spr_ot_type_izolCheck'] = $this->model->spr_ot_type_izol->getSpr_ot_type_izol();		
		
		
		
		
		
		$this->load->model('Spr_ot_systemheat_dependent');
		$this->data['spr_ot_systemheat_dependentCheck'] = $this->model->spr_ot_systemheat_dependent->getSpr_ot_systemheat_dependent();
		
		$this->load->model('Spr_ot_type_to');
		$this->data['spr_ot_type_toCheck'] = $this->model->spr_ot_type_to->getSpr_ot_type_to();	

		$this->load->model('Spr_ot_heatnet_type_iso');
		$this->data['spr_ot_heatnet_type_isoCheck'] = $this->model->spr_ot_heatnet_type_iso->getSpr_ot_heatnet_type_iso();
		
		$this->load->model('Spr_ot_heatnet_type_obj');
		$this->data['spr_ot_heatnet_type_objCheck'] = $this->model->spr_ot_heatnet_type_obj->getSpr_ot_heatnet_type_obj();

		$this->load->model('Spr_ot_gvs_open');
		$this->data['spr_ot_gvs_openCheck'] = $this->model->spr_ot_gvs_open->getSpr_ot_gvs_open();
		
		$this->load->model('Spr_type_street');
		$this->data['spr_type_street'] = $this->model->spr_type_street->getSpr_type_street();
		
		$this->load->model('Spr_type_city');
		$this->data['spr_type_city'] = $this->model->spr_type_city->getSpr_type_city();
		

		$this->load->model('Spr_ot_gvs_in');
		$this->data['spr_ot_gvs_inCheck'] = $this->model->spr_ot_gvs_in->getSpr_ot_gvs_in();				

		$this->load->model('Spr_ot_heatnet_type_underground');
		$this->data['spr_ot_heatnet_type_undergroundCheck'] = $this->model->spr_ot_heatnet_type_underground->getSpr_ot_heatnet_type_underground();

		$this->load->model('spr_oe_klvl_type');
		$this->data['spr_oe_klvl_type'] = $this->model->spr_oe_klvl_type->getSpr_oe_klvl_type();
		
		$this->load->model('Spr_shift_of_work');
		$this->data['spr_shift_of_work'] = $this->model->spr_shift_of_work->getSpr_shift_of_work();		

		$this->load->model('spr_oe_klvl_volt');
		$this->data['spr_oe_klvl_volt'] = $this->model->spr_oe_klvl_volt->getSpr_oe_klvl_volt();	

		$this->load->model('spr_oe_category_line');
		$this->data['spr_oe_category_line'] = $this->model->spr_oe_category_line->getSpr_oe_category_line();
		
		
		$this->load->model('Spr_og_device_type');
		$this->data['spr_og_device_typeCheck'] = $this->model->spr_og_device_type->getSpr_og_device_type();			

		$this->load->model('Obj_og_device');
		$this->data['obj_og_device'] = $this->model->obj_og_device->getObj_og_device();
		
		$this->load->model('Obj_ot_heatnet');
		$this->data['obj_ot_heatnet'] = $this->model->obj_ot_heatnet->getObj_ot_heatnet();
		
		$this->load->model('Obj_ot_heatnet_t');
		$this->data['obj_ot_heatnet_t'] = $this->model->obj_ot_heatnet_t->getObj_ot_heatnet_t();		
		
		$this->load->model('spr_oe_energy_type');
		$this->data['spr_oe_energy_type'] = $this->model->spr_oe_energy_type->getSpr_oe_energy_type();
		
		/*$this->load->model('Obj_oe_klvl');
		$this->data['obj_oe_klvls'] = $this->model->obj_oe_klvl->getObj_oe_klvlById($this->data['objects']['id']);
		$this->data['obj_oe_klvl'] = $this->model->obj_oe_klvl->getObj_oe_klvl();*/
		
	/******************** В соответствии с данными авторизованного пользователя (AdminController.php) **************************/	
		/****  Филиал ****/
		$this->load->model('Branch');		
		$this->data['branchs'] = $this->model->branch->getBranch();	
	
		/*****  МРО  *****/
		$this->load->model('Podrazdelenie');	
		$this->data['podrazdelenies'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($this->data['spr_cod_branch']);		
		/**** Отделы (Otdel) ****/
		$this->load->model('Otdel');	
		$this->data['otdels'] = $this->model->otdel->getOtdelByPodrazdelenie($this->data['spr_cod_podrazd']);

/******************** В соответствии с данными адреса потребителя **************************/

		/**** Район (District) ****/
		$this->load->model('District');	
		$this->data['districts'] = $this->model->district->getDistrictByRegion($this->data['subject']['place_address_region']);
		/**** Город (City) ****/
		$this->load->model('City');	
		$this->data['cities'] = $this->model->city->getCityByDistrict($this->data['subject']['place_address_district']);
		/**** Район города (CityZone) ****/
		$this->load->model('CityZone');	
		$this->data['citiesZone'] = $this->model->cityZone->getCityZoneByCity($this->data['subject']['place_address_city']);		
		
		$this->view->render('objects/create', $this->data);
    }

    public function edit($id)
    {
        $this->load->model('Objects');
        $this->data['objects'] = $this->model->objects->getObjectsData($id);

		$this->load->model('Subject');
		
		$this->data['subject'] = $this->model->subject->getSubjectData($this->data['objects']['id_reestr_subject']);
		$this->data['e_subobj_subject'] = $this->model->subject->getSubjectData($this->data['objects']['e_subobj_subject']);
		$this->data['e_subobj_obj'] = $this->model->objects->getObjectsData($this->data['objects']['e_subobj_obj']);
		
		/**** Подключенные субабоненты ****/
		
		//$this->data['subobj_subject'] = $this->model->subject->getSubjectData($this->data['objects']['e_subobj_subject']);
		$this->data['subobj_data'] = $this->model->objects->getSubobjectData($id);
		
		
		/**** Инспектора (Users) ****/
		$this->load->model('User');	
		$this->data['users'] = $this->model->user->getUsers();		
		
		$this->data['usersTeplo'] = $this->model->user->getUsersByOtdel($this->data['spr_cod_otd']);
		
		$this->data['usersGaz'] = $this->model->user->getUsersByOtdel($this->data['spr_cod_otd']);
	
		$this->data['usersElectro'] = $this->model->user->getUsersByOtdel($this->data['spr_cod_otd']);
		
		/************************************************************************************************/
		$this->data['userTeplo'] = $this->model->user->getUserById($this->data['objects']['t_insp']);
		
		$this->data['userTI'] = $this->model->user->getUserById($this->data['objects']['ti_insp']);
		
		$this->data['userGaz'] = $this->model->user->getUserById($this->data['objects']['g_insp']);
	
		$this->data['userElectro'] = $this->model->user->getUserById($this->data['objects']['e_insp']);
		
		/************************************************************************************************/
		
		$this->load->model('Branch');		
		$this->data['branchs'] = $this->model->branch->getBranch();
		
		/**** Область (Region) ****/
		$this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegion();
		$this->data['regionsPost'] = $this->model->region->getRegion();
		
		/**** Район (District) ****/
		$this->load->model('District');	
		$this->data['districts'] = $this->model->district->getDistrictByRegion($this->data['objects']['address_region']);
		/**** Город (City) ****/
		$this->load->model('City');	
		$this->data['cities'] = $this->model->city->getCityByDistrict($this->data['objects']['address_district']);
		/**** Район города (CityZone) ****/
		$this->load->model('CityZone');	
		$this->data['citiesZone'] = $this->model->cityZone->getCityZoneByCity($this->data['objects']['address_city']);
		/**** Подразделение (Podrazdelenie) ****/
		$this->load->model('Podrazdelenie');	
		$this->data['podrazdelenies'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($this->data['objects']['spr_branch']);		
		/**** Отделы (Otdel) ****/
		$this->load->model('Otdel');	
		$this->data['otdels'] = $this->model->otdel->getOtdelByPodrazdelenie($this->data['objects']['spr_podrazdelenie']);			
		/************obj_og_device *********************/
		$this->load->model('Obj_og_device');	
		$this->data['obj_og_devices'] = $this->model->obj_og_device->getObj_og_deviceById($this->data['objects']['id']);
		
		
		$this->load->model('Obj_og_obsl');		
		$this->data['obj_og_obsl'] = $this->model->obj_og_obsl->getObj_og_obslById($this->data['objects']['id']);

		$this->load->model('Obj_og_accidents');		
		$this->data['obj_og_accidents'] = $this->model->obj_og_accidents->getObj_og_accidentsById($this->data['objects']['id']);		

		$this->load->model('Spr_og_obsl_go');
		$this->data['spr_og_obsl_goCheck'] = $this->model->spr_og_obsl_go->getSpr_og_obsl_go();
		
		$this->load->model('Spr_og_accidents');
		$this->data['spr_og_accidentsCheck'] = $this->model->spr_og_accidents->getSpr_og_accidents();		
		/***********************************************/
		$this->load->model('Spr_kind_of_activity');
		$this->data['spr_kind_of_activity'] = $this->model->spr_kind_of_activity->getSpr_kind_of_activity();		
		
		$this->load->model('Spr_oti_type_fuel');
		$this->data['spr_oti_type_fuelCheck'] = $this->model->spr_oti_type_fuel->getSpr_oti_type_fuel();
		$this->data['spr_oti_type_fuel'] = $this->model->spr_oti_type_fuel->getSpr_oti_type_fuelData($this->data['objects']['ti_id_spr_ot_type_fuel_1']);
		
		$this->load->model('Spr_oti_type_fuel_rezerv');
		$this->data['spr_oti_type_fuel_rezervCheck'] = $this->model->spr_oti_type_fuel_rezerv->getSpr_oti_type_fuel_rezerv();
		$this->data['spr_oti_type_fuel_rezerv'] = $this->model->spr_oti_type_fuel_rezerv->getSpr_oti_type_fuel_rezervData($this->data['objects']['ti_id_spr_ot_type_fuel_2']);
		
		$this->load->model('Spr_oti_boiler_type');
		$this->data['spr_oti_boiler_typeCheck'] = $this->model->spr_oti_boiler_type->getSpr_oti_boiler_type();	
		$this->data['spr_oti_boiler_type'] = $this->model->spr_oti_boiler_type->getSpr_oti_boiler_typeData($this->data['objects']['ti_id_spr_ot_boiler_type']);
				
		$this->load->model('Spr_ot_gvs_open');
		$this->data['spr_ot_gvs_openCheck'] = $this->model->spr_ot_gvs_open->getSpr_ot_gvs_open();	
		$this->data['spr_ot_gvs_open'] = $this->model->spr_ot_gvs_open->getSpr_ot_gvs_openData($this->data['objects']['t_id_gvs_open']);
		

		$this->load->model('Spr_type_street');
		$this->data['spr_type_street'] = $this->model->spr_type_street->getSpr_type_street();
		
		$this->load->model('Spr_type_city');
		$this->data['spr_type_city'] = $this->model->spr_type_city->getSpr_type_city();
				
				
		$this->load->model('Spr_ot_gvs_in');
		$this->data['spr_ot_gvs_inCheck'] = $this->model->spr_ot_gvs_in->getSpr_ot_gvs_in();	
		$this->data['spr_ot_gvs_in'] = $this->model->spr_ot_gvs_in->getSpr_ot_gvs_inData($this->data['objects']['t_gvs_in']);
			
		$this->load->model('Spr_type_home');
		$this->data['spr_type_home'] = $this->model->spr_type_home->getSpr_type_home($this->data['objects']['is_dom']);
		
		/*$this->load->model('Spr_og_to_gaz');
		$this->data['spr_vid_to'] = $this->model->spr_og_to_gaz->getSpr_og_to_gaz($this->data['objects']['g_flue_vid_to']);*/
		
		$this->load->model('Spr_ot_type_heat_source');
		$this->data['spr_ot_type_heat_source'] = $this->model->spr_ot_type_heat_source->getSpr_ot_type_heat_source($this->data['objects']['t_heat_source_own']);
		
		$this->load->model('Spr_admin');
		$this->data['spr_admin'] = $this->model->spr_admin->getSpr_admin($this->data['objects']['id_spr_admin']);
		
		$this->load->model('Spr_og_flue');
		$this->data['spr_vidDym'] = $this->model->spr_og_flue->getSPR_VidDymData($this->data['objects']['g_id_spr_og_flue']);
		$this->data['spr_vidCheckDym'] = $this->model->spr_og_flue->getSPR_VidDym();

		$this->load->model('Spr_ot_functions');
		$this->data['spr_ot_functionsCheck'] = $this->model->spr_ot_functions->getSpr_ot_functions();
		$this->data['spr_ot_functions'] = $this->model->spr_ot_functions->getSpr_ot_functions($this->data['objects']['t_id_spr_ot_functions']);


		$this->load->model('Spr_type_object');
		$this->data['spr_type_objectCheck'] = $this->model->spr_type_object->getSpr_type_object();
		$this->data['spr_type_object'] = $this->model->spr_type_object->getSpr_type_object($this->data['objects']['type_object']);
		
		$this->load->model('Spr_ot_cat');
		$this->data['spr_ot_catCheck'] = $this->model->spr_ot_cat->getSpr_ot_cat();
		$this->data['spr_ot_cat'] = $this->model->spr_ot_cat->getSpr_ot_catData($this->data['objects']['t_id_spr_ot_cat']);
		
		$this->load->model('Spr_flue_mater');
		$this->data['spr_flue_mater'] = $this->model->spr_flue_mater->getSpr_flue_materData($this->data['objects']['g_id_spr_og_flue_mater']);
		$this->data['spr_flue_materCheck'] = $this->model->spr_flue_mater->getSpr_flue_mater();
		
		$this->load->model('Spr_ot_heatnet_type_iso');
		$this->data['spr_ot_heatnet_type_isoCheck'] = $this->model->spr_ot_heatnet_type_iso->getSpr_ot_heatnet_type_iso();


		$this->load->model('Spr_ot_type_izol');
		$this->data['spr_ot_type_izolCheck'] = $this->model->spr_ot_type_izol->getSpr_ot_type_izol();
		

		$this->load->model('Spr_ot_heatnet_type_obj');
		$this->data['spr_ot_heatnet_type_objCheck'] = $this->model->spr_ot_heatnet_type_obj->getSpr_ot_heatnet_type_obj();
		
		$this->load->model('Spr_ot_heatnet_type_underground');
		$this->data['spr_ot_heatnet_type_undergroundCheck'] = $this->model->spr_ot_heatnet_type_underground->getSpr_ot_heatnet_type_underground();	

		$this->load->model('Spr_ot_diametr_tube');
		$this->data['spr_ot_heatnet_diametr_tubeCheck'] = $this->model->spr_ot_diametr_tube->getSpr_ot_diametr_tube();		
	
		$this->load->model('Spr_type_gaz');
		$this->data['spr_type_gaz'] = $this->model->spr_type_gaz->getSpr_type_gazData($this->data['objects']['g_id_spr_og_type_gaz']);
		$this->data['spr_type_gazCheck'] = $this->model->spr_type_gaz->getSpr_type_gaz();
		
		
		$this->load->model('Spr_units_power');
		/*$this->data['spr_units_power'] = $this->model->spr_units_power->getSpr_units_powerData($this->data['objects']['g_id_spr_og_type_gaz']);*/
		$this->data['spr_units_powerCheck'] = $this->model->spr_units_power->getSpr_units_power();
		

		$this->load->model('Spr_og_device_type');
		$this->data['spr_og_device_typeCheck'] = $this->model->spr_og_device_type->getSpr_og_device_type();	
		
		$this->load->model('Spr_ot_systemheat_water');
		$this->data['spr_ot_systemheat_waterCheck'] = $this->model->spr_ot_systemheat_water->getSpr_ot_systemheat_water();
		$this->data['spr_ot_systemheat_water'] = $this->model->spr_ot_systemheat_water->getSpr_ot_systemheat_waterData($this->data['objects']['t_systemheat_water']);
		
		
		$this->data['name_type_otv_g'] = $this->model->objects->getNameTypeOtvG($this->data['objects']['otv_type_g']);
		$this->load->model('Spr_otv_vibor');
		$this->data['spr_otv_vibor'] = $this->model->spr_otv_vibor->getSpr_otv_vibor();
		
		$this->data['person_info_g3'] = $this->model->objects->getPersInfoByID_g($this->data['objects']['otv_g3']);
		$this->data['person_info_g1'] = $this->model->objects->getPersInfoByID1_g($this->data['objects']['otv_g1']);
		$this->data['person_info_g2'] = $this->model->objects->getPersInfoByID2_g($this->data['objects']['otv_g2']);
		
		
		$this->load->model('Spr_ot_type_razvodka');
		$this->data['spr_ot_type_razvodkaCheck'] = $this->model->spr_ot_type_razvodka->getSpr_ot_type_razvodka();
		$this->data['spr_ot_type_razvodka'] = $this->model->spr_ot_type_razvodka->getSpr_ot_type_razvodkaData($this->data['objects']['t_systemheat_layout']);
		
		
		$this->load->model('Spr_ot_type_ot_pribor');
		$this->data['spr_ot_type_ot_priborCheck'] = $this->model->spr_ot_type_ot_pribor->getSpr_ot_type_ot_pribor();		
		$this->data['spr_ot_type_ot_pribor'] = $this->model->spr_ot_type_ot_pribor->getSpr_ot_type_ot_priborData($this->data['objects']['t_systemheat_type_op']);
		

		$this->load->model('Obj_ot_personal_sar');
		$this->data['obj_ot_personal_sars'] = $this->model->obj_ot_personal_sar->getObj_ot_personal_sarById($this->data['objects']['id']);
		$this->data['obj_ot_personal_sar'] = $this->model->obj_ot_personal_sar->getObj_ot_personal_sar();
		


		$this->load->model('Spr_ot_nazn_sar');
		/*$this->data['obj_ot_personal_sars'] = $this->model->spr_ot_nazn_sar->getObj_ot_personal_sarById($this->data['objects']['id']);*/
		$this->data['spr_ot_nazn_sar'] = $this->model->spr_ot_nazn_sar->getSpr_ot_nazn_sar();


		
		$this->load->model('Spr_ot_systemheat_dependent');
		$this->data['spr_ot_systemheat_dependentCheck'] = $this->model->spr_ot_systemheat_dependent->getSpr_ot_systemheat_dependent();
		$this->data['spr_ot_systemheat_dependent'] = $this->model->spr_ot_systemheat_dependent->getSpr_ot_systemheat_dependentData($this->data['objects']['t_systemheat_dependent']);		

		$this->load->model('Obj_og_device');
		$this->data['obj_og_device'] = $this->model->obj_og_device->getObj_og_device();	
		
		$this->load->model('Obj_ot_heatnet');
		$this->data['obj_ot_heatnet'] = $this->model->obj_ot_heatnet->getObj_ot_heatnet();
		$this->data['obj_ot_heatnets'] = $this->model->obj_ot_heatnet->getObj_ot_heatnetById($this->data['objects']['id']);
		
		
		
		$this->load->model('Obj_ot_tepl_kot');
		$this->data['obj_ot_tepl_kot'] = $this->model->obj_ot_tepl_kot->getObj_ot_tepl_kot();
		$this->data['obj_ot_tepl_kots'] = $this->model->obj_ot_tepl_kot->getObj_ot_tepl_kotById($this->data['objects']['id']);
		
		
		$this->load->model('Obj_ot_heatnet_t');
		$this->data['obj_ot_heatnet_t'] = $this->model->obj_ot_heatnet_t->getObj_ot_heatnet_t();
		$this->data['obj_ot_heatnet_ts'] = $this->model->obj_ot_heatnet_t->getObj_ot_heatnet_tById($this->data['objects']['id']);		

		$this->load->model('Obj_oti_boiler_water');
		$this->data['obj_oti_boiler_waters'] = $this->model->obj_oti_boiler_water->getObj_oti_boiler_waterById($this->data['objects']['id']);
		$this->data['obj_oti_boiler_water'] = $this->model->obj_oti_boiler_water->getObj_oti_boiler_water();
		$this->data['obj_oti_boiler_waters_sum'] = $this->model->obj_oti_boiler_water->getObj_oti_boiler_water_sumById($this->data['objects']['id']);
		$this->data['obj_oti_boiler_waters_sum_kotl'] = $this->model->obj_oti_boiler_water->getObj_oti_boiler_water_sum_kotlById($this->data['objects']['id']);

		$this->load->model('Obj_oti_boiler_vapor');
		/*$this->data['obj_oti_boiler_vapors_counts'] = $this->model->obj_oti_boiler_vapor->getObj_oti_boiler_vapor_sum($this->data['objects']['id']);*/
		
		$this->data['obj_oti_boiler_vapors'] = $this->model->obj_oti_boiler_vapor->getObj_oti_boiler_vaporById($this->data['objects']['id']);
		$this->data['obj_oti_boiler_vapor'] = $this->model->obj_oti_boiler_vapor->getObj_oti_boiler_vapor();
		$this->data['obj_oti_boiler_vapor_sum'] = $this->model->obj_oti_boiler_vapor->getObj_oti_boiler_vapor_sumById($this->data['objects']['id']);
		$this->data['obj_oti_boiler_vapor_sum_kotl'] = $this->model->obj_oti_boiler_vapor->getObj_oti_boiler_vapor_sum_kotlById($this->data['objects']['id']);
		
		$this->load->model('Obj_ot_personal_tp');
		$this->data['obj_ot_personal_tps'] = $this->model->obj_ot_personal_tp->getObj_ot_personal_tpById($this->data['objects']['id']);
		$this->data['obj_ot_personal_tp'] = $this->model->obj_ot_personal_tp->getObj_ot_personal_tp();		
		
		$this->load->model('Mkm_object_t_ti');
		$this->data['mkm_object_t_tis'] = $this->model->mkm_object_t_ti->getMkm_object_t_tiById($this->data['objects']['id']);	
		$this->data['mkm_object_t_ti_tis'] = $this->model->mkm_object_t_ti->getMkm_object_t_tiByIdTI($this->data['objects']['id']);	
		$this->data['mkm_object_t_ti'] = $this->model->mkm_object_t_ti->getMkm_object_t_ti();	

		$this->load->model('Tabs');
		$this->data['mkm_teplo_uzelCheck'] = $this->model->tabs->getTabsById($this->data['objects']['id']);
		$this->data['mkm_teplo_uzel'] = $this->model->tabs->getTabs();		
		
		$this->load->model('Spr_ot_type_to');
		$this->data['spr_ot_type_toCheck'] = $this->model->spr_ot_type_to->getSpr_ot_type_to();
		$this->data['spr_ot_type_to'] = $this->model->spr_ot_type_to->getSpr_ot_type_toData($this->data['objects']['t_spr_id_ot_type_to']);
		
		$this->load->model('Spr_ot_uzel_block');
		$this->data['spr_ot_uzel_blockCheck'] = $this->model->spr_ot_uzel_block->getSpr_ot_uzel_block();
		/*$this->data['spr_ot_uzel_block'] = $this->model->spr_ot_uzel_block->getSpr_ot_uzel_blockData($this->data['objects']['t_spr_id_ot_type_to']);*/
		
// Вкладка ЭЛЕКТРО
		$this->load->model('spr_oe_klvl_type');
		$this->data['spr_oe_klvl_type'] = $this->model->spr_oe_klvl_type->getSpr_oe_klvl_type();

		$this->load->model('Spr_shift_of_work');
		$this->data['spr_shift_of_work'] = $this->model->spr_shift_of_work->getSpr_shift_of_work();
		
		$this->load->model('spr_oe_klvl_volt');
		$this->data['spr_oe_klvl_volt'] = $this->model->spr_oe_klvl_volt->getSpr_oe_klvl_volt();

		$this->load->model('spr_oe_category_line');
		$this->data['spr_oe_category_line'] = $this->model->spr_oe_category_line->getSpr_oe_category_line();		

		$this->load->model('spr_oe_energy_type');
		$this->data['spr_oe_energy_type'] = $this->model->spr_oe_energy_type->getSpr_oe_energy_type();

		$this->load->model('Obj_oe_avr');
		$this->data['obj_oe_avrs'] = $this->model->obj_oe_avr->getObj_oe_avrById($this->data['objects']['id']);
		$this->data['obj_oe_avr'] = $this->model->obj_oe_avr->getObj_oe_avr();
		
		$this->load->model('Obj_oe_aie');
		$this->data['obj_oe_aies'] = $this->model->obj_oe_aie->getObj_oe_aieById($this->data['objects']['id']);
		$this->data['obj_oe_aie'] = $this->model->obj_oe_aie->getObj_oe_aie();
		
		$this->load->model('Obj_ot_prit_vent');
		$this->data['obj_ot_prit_vents'] = $this->model->obj_ot_prit_vent->getObj_ot_prit_ventById($this->data['objects']['id']);
		$this->data['obj_ot_prit_vent'] = $this->model->obj_ot_prit_vent->getObj_ot_prit_vent();
		
		$this->load->model('obj_oe_trp');
		$this->data['obj_oe_trps'] = $this->model->obj_oe_trp->getobj_oe_trpById($this->data['objects']['id']);
		$this->data['obj_oe_trp'] = $this->model->obj_oe_trp->getobj_oe_trp();
		
		$this->load->model('obj_ot_teploobmennik_gvs');
		$this->data['obj_ot_teploobmennik_gvss'] = $this->model->obj_ot_teploobmennik_gvs->getObj_ot_teploobmennik_gvsById($this->data['objects']['id']);
		$this->data['obj_ot_teploobmennik_gvs'] = $this->model->obj_ot_teploobmennik_gvs->getObj_ot_teploobmennik_gvs();

		$this->load->model('obj_ot_teploobmennik_so');
		$this->data['obj_ot_teploobmennik_sos'] = $this->model->obj_ot_teploobmennik_so->getObj_ot_teploobmennik_soById($this->data['objects']['id']);
		$this->data['obj_ot_teploobmennik_so'] = $this->model->obj_ot_teploobmennik_so->getObj_ot_teploobmennik_so();
		
		$this->load->model('Obj_oe_klvl');
		$this->data['obj_oe_klvls'] = $this->model->obj_oe_klvl->getObj_oe_klvlById($this->data['objects']['id']);
		$this->data['obj_oe_klvl'] = $this->model->obj_oe_klvl->getObj_oe_klvl();
		
		$this->load->model('Obj_oe_block');
		$this->data['obj_oe_blocks'] = $this->model->obj_oe_block->getObj_oe_blockById($this->data['objects']['id']);
		$this->data['obj_oe_block'] = $this->model->obj_oe_block->getObj_oe_block();
		
		$this->load->model('Obj_oe_vvd');
		$this->data['obj_oe_vvds'] = $this->model->obj_oe_vvd->getObj_oe_vvdById($this->data['objects']['id']);
		$this->data['obj_oe_vvd'] = $this->model->obj_oe_vvd->getObj_oe_vvd();
		
		$this->load->model('Obj_oe_ek');
		$this->data['obj_oe_eks'] = $this->model->obj_oe_ek->getObj_oe_ekById($this->data['objects']['id']);
		$this->data['obj_oe_ek'] = $this->model->obj_oe_ek->getObj_oe_ek();
		
		$this->load->model('Obj_oe_ku');
		$this->data['obj_oe_kus'] = $this->model->obj_oe_ku->getObj_oe_kuById($this->data['objects']['id']);
		$this->data['obj_oe_ku'] = $this->model->obj_oe_ku->getObj_oe_ku();
///////////////////////////
        $this->view->render('objects/edit', $this->data);
    }
	public function info($id)
    {

        $this->load->model('Objects');
        $this->data['objects'] = $this->model->objects->getObjectsData($id);
		
		
		$this->load->model('Subject');
		$this->data['subject'] = $this->model->subject->getSubjectData($this->data['objects']['id_reestr_subject']);
		$this->data['e_subobj_subject'] = $this->model->subject->getSubjectData($this->data['objects']['e_subobj_subject']);
		$this->data['e_subobj_obj'] = $this->model->objects->getObjectsData($this->data['objects']['e_subobj_obj']);
		$this->data['subobj_data'] = $this->model->objects->getSubobjectData($id);
	
		$this->load->model('Obj_oe_avr');
		$this->data['obj_oe_avrs'] = $this->model->obj_oe_avr->getObj_oe_avrById($this->data['objects']['id']);
		$this->load->model('Obj_oe_aie');
		$this->data['obj_oe_aies'] = $this->model->obj_oe_aie->getObj_oe_aieById($this->data['objects']['id']);
		$this->load->model('Obj_ot_prit_vent');
		$this->data['obj_ot_prit_vents'] = $this->model->obj_ot_prit_vent->getObj_ot_prit_ventById($this->data['objects']['id']);
		$this->load->model('obj_oe_trp');
		$this->data['obj_oe_trps'] = $this->model->obj_oe_trp->getobj_oe_trpById($this->data['objects']['id']);
		$this->load->model('obj_ot_teploobmennik_gvs');
		$this->data['obj_ot_teploobmennik_gvss'] = $this->model->obj_ot_teploobmennik_gvs->getObj_ot_teploobmennik_gvsById($this->data['objects']['id']);
		$this->load->model('obj_ot_tepl_kot');
		$this->data['obj_ot_tepl_kots'] = $this->model->obj_ot_tepl_kot->getObj_ot_tepl_kotById($this->data['objects']['id']);		
		$this->load->model('obj_ot_teploobmennik_so');
		$this->data['obj_ot_teploobmennik_sos'] = $this->model->obj_ot_teploobmennik_so->getObj_ot_teploobmennik_soById($this->data['objects']['id']);
		$this->load->model('Obj_oe_klvl');
		$this->data['obj_oe_klvls'] = $this->model->obj_oe_klvl->getObj_oe_klvlById($this->data['objects']['id']);
		$this->load->model('Obj_oe_block');
		$this->data['obj_oe_blocks'] = $this->model->obj_oe_block->getObj_oe_blockById($this->data['objects']['id']);
		$this->load->model('Obj_oe_vvd');
		$this->data['obj_oe_vvds'] = $this->model->obj_oe_vvd->getObj_oe_vvdById($this->data['objects']['id']);
		$this->load->model('Obj_oe_ek');
		$this->data['obj_oe_eks'] = $this->model->obj_oe_ek->getObj_oe_ekById($this->data['objects']['id']);
		$this->load->model('Obj_oe_ku');
		$this->data['obj_oe_kus'] = $this->model->obj_oe_ku->getObj_oe_kuById($this->data['objects']['id']);		
		$this->load->model('Spr_kind_of_activity');
		$this->data['spr_ot_functions'] = $this->model->spr_kind_of_activity->getSpr_kind_of_activityData($this->data['objects']['t_id_spr_ot_functions']);	
		
		
		$this->load->model('Spr_type_object');
		$this->data['spr_type_objects'] = $this->model->spr_type_object->getSpr_type_objectData($this->data['objects']['type_object']);
		
		
		
		
		$this->load->model('Spr_ot_cat');
		$this->data['spr_ot_cat'] = $this->model->spr_ot_cat->getSpr_ot_catData($this->data['objects']['t_id_spr_ot_cat']);	
		$this->load->model('Spr_ot_systemheat_water');
		$this->data['spr_ot_systemheat_water'] = $this->model->spr_ot_systemheat_water->getSpr_ot_systemheat_waterData($this->data['objects']['t_systemheat_water']);
		$this->load->model('Spr_ot_systemheat_dependent');
		$this->data['spr_ot_systemheat_dependent'] = $this->model->spr_ot_systemheat_dependent->getSpr_ot_systemheat_dependentData($this->data['objects']['t_systemheat_dependent']);
		$this->load->model('Spr_ot_type_to');
		$this->data['spr_ot_type_to'] = $this->model->spr_ot_type_to->getSpr_ot_type_toData($this->data['objects']['t_spr_id_ot_type_to']);
		$this->load->model('Obj_ot_personal_tp');
		$this->data['obj_ot_personal_tps'] = $this->model->obj_ot_personal_tp->getObj_ot_personal_tpById($this->data['objects']['id']);
		$this->load->model('Obj_ot_personal_sar');
		$this->data['obj_ot_personal_sars'] = $this->model->obj_ot_personal_sar->getObj_ot_personal_sarById($this->data['objects']['id']);		
		$this->load->model('Spr_ot_gvs_open');
		$this->data['spr_ot_gvs_open'] = $this->model->spr_ot_gvs_open->getSpr_ot_gvs_openData($this->data['objects']['t_gvs_open']);
		$this->load->model('Spr_ot_gvs_in');	
		$this->data['spr_ot_gvs_in'] = $this->model->spr_ot_gvs_in->getSpr_ot_gvs_inData($this->data['objects']['t_gvs_in']);		
		$this->load->model('Spr_type_city');
		$this->data['spr_type_city'] = $this->model->spr_type_city->getSpr_type_city();
		$this->load->model('Spr_ot_type_heat_source');
		$this->data['spr_ot_type_heat_source'] = $this->model->spr_ot_type_heat_source->getSpr_ot_type_heat_sourceData($this->data['objects']['t_heat_source_own']);		

		$this->load->model('Spr_ot_type_razvodka');
		$this->data['spr_ot_type_razvodka'] = $this->model->spr_ot_type_razvodka->getSpr_ot_type_razvodkaData($this->data['objects']['t_systemheat_layout']);
		$this->load->model('Spr_ot_type_ot_pribor');		
		$this->data['spr_ot_type_ot_pribor'] = $this->model->spr_ot_type_ot_pribor->getSpr_ot_type_ot_priborData($this->data['objects']['t_systemheat_type_op']);
		
		
		
		$this->load->model('Spr_ot_type_izol');
		$this->data['spr_ot_type_izol'] = $this->model->spr_ot_type_izol->getSpr_ot_type_izolData($this->data['objects']['t_systemheat_type_op']);
		
		
		
		$this->load->model('Spr_oti_boiler_type');
		$this->data['spr_oti_boiler_type'] = $this->model->spr_oti_boiler_type->getSpr_oti_boiler_typeData($this->data['objects']['ti_id_spr_ot_boiler_type']);
		$this->load->model('Spr_oti_type_fuel');
		$this->data['spr_oti_type_fuel'] = $this->model->spr_oti_type_fuel->getSpr_oti_type_fuelData($this->data['objects']['ti_id_spr_ot_type_fuel_1']);
		$this->load->model('Spr_oti_type_fuel_rezerv');
		$this->data['spr_oti_type_fuel_rezerv'] = $this->model->spr_oti_type_fuel_rezerv->getSpr_oti_type_fuel_rezervData($this->data['objects']['ti_id_spr_ot_type_fuel_2']);
		$this->load->model('Obj_oti_boiler_water');
		$this->data['obj_oti_boiler_waters'] = $this->model->obj_oti_boiler_water->getObj_oti_boiler_waterById($this->data['objects']['id']);
		$this->load->model('Obj_oti_boiler_vapor');
		$this->data['obj_oti_boiler_vapors'] = $this->model->obj_oti_boiler_vapor->getObj_oti_boiler_vaporById($this->data['objects']['id']);
		$this->load->model('Obj_ot_heatnet');
		$this->data['obj_ot_heatnets'] = $this->model->obj_ot_heatnet->getObj_ot_heatnetById($this->data['objects']['id']);
		
		
		$this->load->model('Spr_type_home');
		$this->data['spr_type_home'] = $this->model->spr_type_home->getSpr_type_homeData($this->data['objects']['is_dom']);
		$this->load->model('Spr_og_flue');
		$this->data['spr_vidDym'] = $this->model->spr_og_flue->getSPR_VidDymData($this->data['objects']['g_id_spr_og_flue']);
		$this->load->model('Spr_flue_mater');
		$this->data['spr_flue_mater'] = $this->model->spr_flue_mater->getSpr_flue_materData($this->data['objects']['g_id_spr_og_flue_mater']);
		$this->load->model('Spr_type_gaz');
		$this->data['spr_type_gaz'] = $this->model->spr_type_gaz->getSpr_type_gazData($this->data['objects']['g_id_spr_og_type_gaz']);
		$this->load->model('Obj_ot_heatnet');
		$this->data['obj_ot_heatnets'] = $this->model->obj_ot_heatnet->getObj_ot_heatnetById($this->data['objects']['id']);
		$this->load->model('Obj_ot_heatnet_t');
		$this->data['obj_ot_heatnet_ts'] = $this->model->obj_ot_heatnet_t->getObj_ot_heatnet_tById($this->data['objects']['id']);		
		$this->load->model('Obj_og_device');	
		$this->data['obj_og_devices'] = $this->model->obj_og_device->getObj_og_deviceById($this->data['objects']['id']);		
		/*$this->load->model('Spr_og_to_gaz');
		$this->data['spr_og_to_gaz'] = $this->model->spr_og_to_gaz->getSpr_og_to_gazData($this->data['objects']['g_flue_vid_to']);	*/	

		$this->load->model('Obj_og_obsl');	
		$this->data['obj_og_obsls'] = $this->model->obj_og_obsl->getObj_og_obslById($this->data['objects']['id']);		
		$this->load->model('Obj_og_accidents');	
		$this->data['obj_og_accident_ns'] = $this->model->obj_og_accidents->getObj_og_accidentsById($this->data['objects']['id']);

		$this->load->model('Mkm_object_t_ti');
		$this->data['mkm_object_t_tis'] = $this->model->mkm_object_t_ti->getMkm_object_t_tiById($this->data['objects']['id']);
		$this->data['mkm_object_t_ti_tis'] = $this->model->mkm_object_t_ti->getMkm_object_t_tiByIdTI($this->data['objects']['id']);	
		
		$this->load->model('Tabs');
		$this->data['mkm_teplo_uzels'] = $this->model->tabs->getTabsById($this->data['objects']['id']);
	
		
		
		
		
		/**** Область (Region) ****/
		$this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegionData($this->data['objects']['address_region']);

		/**** Район (District) ****/
		$this->load->model('District');	
		$this->data['districts'] = $this->model->district->getDistrictData($this->data['objects']['address_district']);
		/**** Город (City) ****/
		$this->load->model('City');	
		$this->data['cities'] = $this->model->city->getCityData($this->data['objects']['address_city']);
		/**** Район города (CityZone) ****/
		$this->load->model('CityZone');	
		$this->data['citiesZone'] = $this->model->cityZone->getCityZoneData($this->data['objects']['address_city_zone']);
		/**** Инспектора (Users) ****/
		$this->load->model('User');	
		$this->data['users'] = $this->model->user->getUsers();		
		$this->data['usersElectro'] = $this->model->user->getUserElektroId($this->data['objects']['e_insp']);
		$this->data['usersTeplo'] = $this->model->user->getUserTeploId($this->data['objects']['t_insp']);
		$this->data['usersTi'] = $this->model->user->getUserTiId($this->data['objects']['ti_insp']);
		$this->data['usersGaz'] = $this->model->user->getUserGazId($this->data['objects']['g_insp']);
		
		$this->load->model('Spr_admin');
		$this->data['adm_r'] = $this->model->spr_admin->getSpr_adminData($this->data['objects']['id_spr_admin']);
		
		$this->load->model('Branch');		
		$this->data['br'] = $this->model->branch->getBranchData($this->data['objects']['spr_branch']);

		$this->load->model('Podrazdelenie');	
		$this->data['podr'] = $this->model->podrazdelenie->getPodrazdelenieData($this->data['objects']['spr_podrazdelenie']);		

		$this->load->model('Otdel');	
		$this->data['otd'] = $this->model->otdel->getOtdelData($this->data['objects']['spr_otdel']);			

	  echo json_encode($this->data);
    }
    public function add()
    {
        $this->load->model('Objects');

        $params = $this->request->post;
//print_r($params);

        if (isset($params['name'])) {
            $objectsId = $this->model->objects->createObjects($params);
           // echo '$objectsId '.$objectsId;
			
        }
		if($objectsId > 0){
			
			if(isset($params['ids_boiler_water']) && count($params['ids_boiler_water'])>0){	

				$this->load->model('Obj_oti_boiler_water');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_boiler_water'] as $id_boiler_water){
				
					$params['obj_oti_boiler_water_id'] = $id_boiler_water;
					
					$this->model->obj_oti_boiler_water->updateObj_oti_boiler_water($params);
				}
			}
	
			
			if(isset($params['ids_boiler_vapor']) && count($params['ids_boiler_vapor'])>0){	

				$this->load->model('Obj_oti_boiler_vapor');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_boiler_vapor'] as $id_boiler_vapor){
				
					$params['obj_oti_boiler_vapor_id'] = $id_boiler_vapor;
					
					$this->model->obj_oti_boiler_vapor->updateObj_oti_boiler_vapor($params);
				}
			}
		
			
			if(isset($params['ids_obj_og_device']) && count($params['ids_obj_og_device'])>0){	

				$this->load->model('obj_og_device');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_og_device'] as $id_device_obj_og){
				
					$params['obj_og_device_id'] = $id_device_obj_og;
					
					$this->model->obj_og_device->updateObj_og_device($params);
				}
			}
		
			
			if(isset($params['ids_ot_heatnet']) && count($params['ids_ot_heatnet'])>0){	

				$this->load->model('obj_ot_heatnet');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_ot_heatnet'] as $id_device_ot_heatnet){
				
					$params['obj_ot_heatnet_id'] = $id_device_ot_heatnet;
					
					$this->model->obj_ot_heatnet->updateObj_ot_heatnet($params);
				}
			}
		
			if(isset($params['ids_ot_heatnet_t']) && count($params['ids_ot_heatnet_t'])>0){	

				$this->load->model('obj_ot_heatnet_t');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_ot_heatnet_t'] as $id_device_ot_heatnet){
				
					$params['obj_ot_heatnet_t_id'] = $id_device_ot_heatnet;
					
					$this->model->obj_ot_heatnet_t->updateObj_ot_heatnet_t($params);
				}
			}

			
			if(isset($params['ids_obj_oe_avr']) && count($params['ids_obj_oe_avr'])>0){	

				$this->load->model('obj_oe_avr');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_oe_avr'] as $id_obj_oe_avr){
				
					$params['id_obj_oe_avr'] = $id_obj_oe_avr;
					
					$this->model->obj_oe_avr->updateObj_oe_avr($params);
				}
			}
			
			if(isset($params['ids_obj_oe_aie']) && count($params['ids_obj_oe_aie'])>0){	

				$this->load->model('obj_oe_aie');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_oe_aie'] as $id_obj_oe_aie){
				
					$params['id_obj_oe_aie'] = $id_obj_oe_aie;
					
					$this->model->obj_oe_aie->updateObj_oe_aie($params);
				}
			}
			if(isset($params['ids_obj_ot_prit_vent']) && count($params['ids_obj_ot_prit_vent'])>0){	

				$this->load->model('obj_ot_prit_vent');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_ot_prit_vent'] as $id_obj_ot_prit_vent){
				
					$params['id_obj_ot_prit_vent'] = $id_obj_ot_prit_vent;
					
					$this->model->obj_ot_prit_vent->updateObj_ot_prit_vent($params);
				}
			}
			
			if(isset($params['ids_obj_oe_trp']) && count($params['ids_obj_oe_trp'])>0){	

				$this->load->model('obj_oe_trp');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_oe_trp'] as $id_obj_oe_trp){
				
					$params['id_obj_oe_trp'] = $id_obj_oe_trp;
					
					$this->model->obj_oe_trp->updateObj_oe_trp($params);
				}
			}
			if(isset($params['ids_obj_ot_teploobmennik_gvs']) && count($params['ids_obj_ot_teploobmennik_gvs'])>0){	

				$this->load->model('obj_ot_teploobmennik_gvs');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_ot_teploobmennik_gvs'] as $id_obj_ot_teploobmennik_gvs){
				
					$params['id_obj_ot_teploobmennik_gvs'] = $id_obj_ot_teploobmennik_gvs;
					
					$this->model->obj_ot_teploobmennik_gvs->updateObj_ot_teploobmennik_gvs($params);
				}
			}
			if(isset($params['ids_obj_ot_tepl_kot']) && count($params['ids_obj_ot_tepl_kot'])>0){	

				$this->load->model('obj_ot_tepl_kot');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_ot_tepl_kot'] as $id_obj_ot_tepl_kot){
				
					$params['id_obj_ot_tepl_kot'] = $id_obj_ot_tepl_kot;
					
					$this->model->obj_ot_tepl_kot->updateObj_ot_tepl_kot($params);
				}
			}			
			if(isset($params['ids_obj_ot_teploobmennik_so']) && count($params['ids_obj_ot_teploobmennik_so'])>0){	

				$this->load->model('obj_ot_teploobmennik_so');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_ot_teploobmennik_so'] as $id_obj_ot_teploobmennik_so){
				
					$params['id_obj_ot_teploobmennik_so'] = $id_obj_ot_teploobmennik_so;
					
					$this->model->obj_ot_teploobmennik_so->updateObj_ot_teploobmennik_so($params);
				}
			}			
			if(isset($params['ids_obj_oe_klvl']) && count($params['ids_obj_oe_klvl'])>0){	

				$this->load->model('obj_oe_klvl');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_oe_klvl'] as $id_obj_oe_klvl){
				
					$params['id_obj_oe_klvl'] = $id_obj_oe_klvl;
					
					$this->model->obj_oe_klvl->updateObj_oe_klvl($params);
				}
			}
			
			if(isset($params['ids_obj_oe_block']) && count($params['ids_obj_oe_block'])>0){	

				$this->load->model('obj_oe_block');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_oe_block'] as $id_obj_oe_block){
				
					$params['id_obj_oe_block'] = $id_obj_oe_block;
					
					$this->model->obj_oe_block->updateObj_oe_block($params);
				}
			}
			if(isset($params['ids_obj_oe_vvd']) && count($params['ids_obj_oe_vvd'])>0){	

				$this->load->model('obj_oe_vvd');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_oe_vvd'] as $id_obj_oe_vvd){
				
					$params['id_obj_oe_vvd'] = $id_obj_oe_vvd;
					
					$this->model->obj_oe_vvd->updateObj_oe_vvd($params);
				}
			}	
			if(isset($params['ids_obj_oe_ek']) && count($params['ids_obj_oe_ek'])>0){	

				$this->load->model('obj_oe_ek');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_oe_ek'] as $id_obj_oe_ek){
				
					$params['id_obj_oe_ek'] = $id_obj_oe_ek;
					
					$this->model->obj_oe_ek->updateObj_oe_ek($params);
				}
			}	
			if(isset($params['ids_obj_oe_ku']) && count($params['ids_obj_oe_ku'])>0){	

				$this->load->model('obj_oe_ku');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_oe_ku'] as $id_obj_oe_ku){
				
					$params['id_obj_oe_ku'] = $id_obj_oe_ku;
					
					$this->model->obj_oe_ku->updateObj_oe_ku($params);
				}
			}			
			if(isset($params['ids_obj_ot_personal_tp']) && count($params['ids_obj_ot_personal_tp'])>0){	

				$this->load->model('obj_ot_personal_tp');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_ot_personal_tp'] as $id_obj_ot_personal_tp){
				
					$params['obj_ot_personal_tp_id'] = $id_obj_ot_personal_tp;
					
					$this->model->obj_ot_personal_tp->updateObj_ot_personal_tp($params);
				}
			}

			if(isset($params['ids_obj_ot_personal_sar']) && count($params['ids_obj_ot_personal_sar'])>0){	

				$this->load->model('obj_ot_personal_sar');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_ot_personal_sar'] as $id_obj_ot_personal_sar){
				
					$params['obj_ot_personal_sar_id'] = $id_obj_ot_personal_sar;
					
					$this->model->obj_ot_personal_sar->updateObj_ot_personal_sar($params);
				}
			}			
			
			if(isset($params['ids_obj_ot_heat_source']) && count($params['ids_obj_ot_heat_source'])>0){	
			
			
				$this->load->model('mkm_object_t_ti');
				$params['id_reestr_object_t'] = $objectsId;
				
				foreach($params['ids_obj_ot_heat_source'] as $id_obj_ot_heat_source){
				
					$params['obj_ot_heat_source_id'] = $id_obj_ot_heat_source;
					
					$this->model->mkm_object_t_ti->updateMkm_object_t_ti($params);
				}
			}
			if(isset($params['ids_obj_og_obsl']) && count($params['ids_obj_og_obsl'])>0){	

				$this->load->model('obj_og_obsl');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_og_obsl'] as $id_obj_og_obsl){
				
					$params['obj_og_obsl_id'] = $id_obj_og_obsl;
					
					$this->model->obj_og_obsl->updateObj_og_obsl($params);
				}
			}
			if(isset($params['ids_obj_og_accidents']) && count($params['ids_obj_og_accidents'])>0){	

				$this->load->model('obj_og_accidents');
				$params['id_reestr_object'] = $objectsId;
				
				foreach($params['ids_obj_og_accidents'] as $id_obj_og_accidents){
				
					$params['obj_og_accidents_id'] = $id_obj_og_accidents;
					
					$this->model->obj_og_accidents->updateObj_og_accidents($params);
				}
			}
			
		}
		
     echo $objectsId;
	
	}
	
	
	public function add_boiler_water()
    {

        $this->load->model('Obj_oti_boiler_water');

        $params = $this->request->post;
		
		$str_boiler = '';
//print_r($params);			
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oti_boiler_waterId = $this->model->obj_oti_boiler_water->updateObj_oti_boiler_waterInfo($params);
		

		}else{
            $obj_oti_boiler_waterId = $this->model->obj_oti_boiler_water->createBoiler_water($params);
           

			if($obj_oti_boiler_waterId != 0){
				
				$str_boiler ="<tr id_boiler_water='$obj_oti_boiler_waterId'>";
				$str_boiler .="<td name='type'>".$params['type']."</td>";
				$str_boiler .="<td name='year'>".$params['year']."</td>";
				$str_boiler .="<td name='counts'>".$params['counts']."</td>";
				$str_boiler .= "<td type_osn_fuel = '".$params['type_osn_fuel']."'>".$params['name_osn_fuel']."</td>";
				$str_boiler .= "<td type_rezerv_fuel = '".$params['type_rezerv_fuel']."'>".$params['name_rezerv_fuel']."</td>";
				$str_boiler .="<td name='power'>".$params['power']."</td>";
				$str_boiler .="<td><div class='menu-item-event'><div><button class='button-edit'   onclick = \"modalWindow.openModalEdit('ModalBoiler_water',$obj_oti_boiler_waterId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"boiler_water\",$obj_oti_boiler_waterId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_boiler;
        }
    }


	public function add_obj_ot_tepl_kot()
    {

        $this->load->model('Obj_ot_tepl_kot');

        $params = $this->request->post;
		
		$str_tepl_kot = '';

//print_r($params);			

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_tepl_kotId = $this->model->obj_ot_tepl_kot->updateObj_ot_tepl_kotInfo($params);
		

		}else{
            $obj_ot_tepl_kotId = $this->model->obj_ot_tepl_kot->createObj_ot_tepl_kot($params);
           

			if($obj_ot_tepl_kotId != 0){
				
				
				
				$str_tepl_kot ="<tr id_obj_ot_tepl_kot='$obj_ot_tepl_kotId'>";
				$str_tepl_kot .="<td tepl_kot='".$params['teploobm']."'>".$params['teploobm_name']."</td>";
				$str_tepl_kot .="<td name='name'>".$params['name']."</td>";
				$str_tepl_kot .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_tepl_kot .="<td name='srok'>".$params['srok']."</td>";
				$str_tepl_kot .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";
				$str_tepl_kot .="<td><div class='menu-item-event'><div><button class='button-edit'   onclick = \"modalWindow.openModalEdit('ModalObj_ot_tepl_kot',$obj_ot_tepl_kotId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_tepl_kot\",$obj_ot_tepl_kotId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_tepl_kot;
        }
    }



	public function add_boiler_vapor()
    {

        $this->load->model('Obj_oti_boiler_vapor');

        $params = $this->request->post;
//print_r($params);		
		$str_boiler = '';
				
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oti_boiler_vaporId = $this->model->obj_oti_boiler_vapor->updateObj_oti_boiler_vaporInfo($params);
		
		
		}else{
            $obj_oti_boiler_vaporId = $this->model->obj_oti_boiler_vapor->createBoiler_vapor($params);
            
       /* }
		
        if (isset($params['type'])) {
            $obj_oti_boiler_vaporId = $this->model->obj_oti_boiler_vapor->createBoiler_vapor($params);*/
            
			
			if($obj_oti_boiler_vaporId != 0){
				
				$str_boiler ="<tr id_boiler_vapor='$obj_oti_boiler_vaporId'>";
				$str_boiler .="<td name='type'>".$params['type']."</td>";
				$str_boiler .="<td name='year'>".$params['year']."</td>";
				$str_boiler .="<td name='counts'>".$params['counts']."</td>";
				$str_boiler .= "<td vapor_type_osn_fuel = '".$params['vapor_type_osn_fuel']."'>".$params['vapor_name_osn_fuel']."</td>";
				$str_boiler .= "<td vapor_type_rezerv_fuel = '".$params['vapor_type_rezerv_fuel']."'>".$params['vapor_name_rezerv_fuel']."</td>";				
				$str_boiler .="<td name='perfomance'>".$params['perfomance']."</td>";
				$str_boiler .="<td name='power'>".$params['power']."</td>";
				$str_boiler .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindow.openModalEdit('ModalBoiler_vapor',$obj_oti_boiler_vaporId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"boiler_vapor\",$obj_oti_boiler_vaporId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_boiler;
        }
    }	
	
	public function add_og_device()
    {

        $this->load->model('Obj_og_device');

        $params = $this->request->post;
		
		$str_device = '';
		
		//print_r($params);
        if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_og_deviceId = $this->model->obj_og_device->updateObj_og_deviceInfo($params);
		
		
		}else{
            $obj_og_deviceId = $this->model->obj_og_device->createDevice_obj_og($params);
            
        }
		//echo $obj_og_deviceId;
		if($obj_og_deviceId != 0){
				
				$str_device = "<tr id_obj_og_device='$obj_og_deviceId'>";
				$str_device .= "<td device_type='".$params['type']."'>".$params['type_device']."</td>";
				$str_device .="<td name='counts'>".$params['counts']."</td>";
				$str_device .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_og_device', $obj_og_deviceId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_og_device\",$obj_og_deviceId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_device;
    }
	
	
	public function add_og_obsl()
    {

        $this->load->model('Obj_og_obsl');

        $params = $this->request->post;
		
		$str_obsl = '';
		

        if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_og_obslId = $this->model->obj_og_obsl->updateObj_og_obslInfo($params);
		
		
		}else{
            $obj_og_obslId = $this->model->obj_og_obsl->createObj_og_obsl($params);
            
        }
		//echo $obj_og_deviceId;
		if($obj_og_obslId != 0){
				
				$str_obsl = "<tr id_obj_og_obsl='$obj_og_obslId'>";
				$str_obsl .="<td name='date'>".date('d.m.Y',strtotime($params['date_obsl']))."</td>";
				$str_obsl .= "<td obsl_type='".$params['type_obsl']."'>".$params['type_obsl_text']."</td>";
				$str_obsl .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_og_obsl', $obj_og_obslId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_og_obsl\",$obj_og_obslId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_obsl;
    }	
	

	public function add_og_accidents()
    {

        $this->load->model('Obj_og_accidents');

        $params = $this->request->post;
		
		$str_accidents = '';
		
		//print_r($params);
        if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_og_accidentsId = $this->model->obj_og_accidents->updateObj_og_accidentsInfo($params);
		
		
		}else{
            $obj_og_accidentsId = $this->model->obj_og_accidents->createObj_og_accidents($params);
            
        }
		//echo $obj_og_deviceId;
		if($obj_og_accidentsId != 0){
				
				$str_accidents = "<tr id_obj_og_accidents='$obj_og_accidentsId'>";
				$str_accidents .="<td name='date'>".date('d.m.Y',strtotime($params['date_accidents']))."</td>";
				$str_accidents .= "<td accidents_type='".$params['type_accidents']."'>".$params['type_accidents_text']."</td>";
				$str_accidents .="<td name='character'>".$params['character_accidents']."</td>";
				$str_accidents .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_og_accidents', $obj_og_accidentsId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_og_accidents\",$obj_og_accidentsId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_accidents;
    }

	
	public function add_ot_heatnet()
    {

        $this->load->model('Obj_ot_heatnet');

        $params = $this->request->post;
		
		//print_r($params);
		
		$str_device = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_heatnetId = $this->model->obj_ot_heatnet->updateObj_ot_heatnetInfo($params);
		
		
		}else{
            $obj_ot_heatnetId = $this->model->obj_ot_heatnet->createDevice_ot_heatnet($params);

		   
			if($obj_ot_heatnetId != 0){
				
				$str_device ="<tr id_obj_ot_heatnet='$obj_ot_heatnetId'>";
				$str_device .= "<td name='conect_point'>".$params['conect_point']."</td>";
				$str_device .= "<td name='end_point'>".$params['end_point']."</td>";
				$str_device .= "<td name='year'>".$params['year']."</td>";
				$str_device .= "<td name='length'>".$params['length']."</td>";
				$str_device .= "<td heatnet_diameter = '".$params['diameter']."'>".$params['diameter_name']."</td>";
				$str_device .= "<td name='count_tube'>".$params['count_tube']."</td>";
				$str_device .= "<td heatnet_underground = '".$params['underground']."'>".$params['underground_name']."</td>";
				$str_device .= "<td type_isolation='".$params['type_isolation']."'>".$params['isolation_name']."</td>";
				//$str_device .= "<td heatnet_type_isolation='".$params['heatnet_type_isolation']."'>".$params['heatnet_type_isolation_name']."</td>";
				$str_device .= "<td heatnet_type_isolation='".$params['heatnet_type_isolation']."'>".($params['heatnet_type_isolation'] == 0 ? '' : $params['heatnet_type_isolation_name'])."</td>";
				$str_device .= "<td name='prim'>".$params['prim']."</td>";
				$str_device .= "<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_ot_heatnet', $obj_ot_heatnetId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_heatnet\",$obj_ot_heatnetId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_device;
        }
    }

	public function add_ot_heatnet_t()
    {

        $this->load->model('Obj_ot_heatnet_t');

        $params = $this->request->post;
		
		print_r($params);
		
		$str_device = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_heatnet_tId = $this->model->obj_ot_heatnet_t->updateObj_ot_heatnet_tInfo($params);
		
		
		}else{
            $obj_ot_heatnet_tId = $this->model->obj_ot_heatnet_t->createDevice_ot_heatnet_t($params);

		   
			if($obj_ot_heatnet_tId != 0){
				
				$str_device ="<tr id_obj_ot_heatnet_t='$obj_ot_heatnet_tId'>";
				$str_device .= "<td name='conect_point'>".$params['conect_point']."</td>";
				$str_device .= "<td name='end_point'>".$params['end_point']."</td>";
				$str_device .= "<td name='year'>".$params['year']."</td>";
				$str_device .= "<td name='length'>".$params['length']."</td>";
				$str_device .= "<td t_heatnet_diameter = '".$params['diameter']."'>".$params['diameter_name']."</td>";
				$str_device .= "<td name='count_tube'>".$params['count_tube']."</td>";
				$str_device .= "<td t_heatnet_underground = '".$params['underground']."'>".$params['underground_name']."</td>";
				$str_device .= "<td teplo_type_isolation='".$params['type_isolation']."'>".$params['isolation_name']."</td>";
				//$str_device .= "<td heatnet_type_isolation='".$params['heatnet_type_isolation']."'>".$params['heatnet_type_isolation_name']."</td>";
				$str_device .= "<td t_heatnet_type_isolation='".$params['heatnet_type_isolation']."'>".($params['heatnet_type_isolation'] == 0 ? '' : $params['heatnet_type_isolation_name'])."</td>";
				$str_device .= "<td name='prim'>".$params['prim']."</td>";
				$str_device .= "<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_ot_heatnet_t', $obj_ot_heatnet_tId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_heatnet_t\",$obj_ot_heatnet_tId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_device;
        }
    }
	public function add_ot_personal_tp()
    {

        $this->load->model('Obj_ot_personal_tp');

        $params = $this->request->post;
		
			
		$str_device = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_personal_tpId = $this->model->obj_ot_personal_tp->updateObj_ot_personal_tpInfo($params);
		
		
		}else{
            $obj_ot_personal_tpId = $this->model->obj_ot_personal_tp->createOt_personal_tp($params);
            
 
			if($obj_ot_personal_tpId != 0){
				
				$str_device ="<tr id_obj_ot_personal_tp='$obj_ot_personal_tpId'>";
				$str_device .="<td name='device'>".$params['device']."</td>";
				$str_device .="<td nazn_tp_ot='nazn_tp_ot'>".($params['nazn_tp_ot'] == 1 ? 'да' : 'нет')."</td>";
				$str_device .="<td nazn_tp_gvs='nazn_tp_gvs'>".($params['nazn_tp_gvs'] == 1 ? 'да' : 'нет')."</td>";
				$str_device .="<td nazn_tp_tn='nazn_tp_tn'>".($params['nazn_tp_tn'] == 1 ? 'да' : 'нет')."</td>";
				$str_device .="<td nazn_tp_vent='nazn_tp_vent'>".($params['nazn_tp_vent'] == 1 ? 'да' : 'нет')."</td>";				
				/*$str_device .="<td name='sar'>".$params['sar']."</td>";
				$str_device .="<td name='count_sar'>".$params['count_sar']."</td>";*/
				$str_device .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_ot_personal_tp', $obj_ot_personal_tpId, '".$params['id_table']."')\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_personal_tp\",$obj_ot_personal_tpId,\"".$params['id_table']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_device;
        }
    }



	public function add_ot_personal_sar()
    {

        $this->load->model('Obj_ot_personal_sar');

        $params = $this->request->post;
		
	
		$str_device = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_personal_sarId = $this->model->obj_ot_personal_sar->updateObj_ot_personal_sarInfo($params);
		
		
		}else{
            $obj_ot_personal_sarId = $this->model->obj_ot_personal_sar->createOt_personal_sar($params);
            
		   
			if($obj_ot_personal_sarId != 0){
				
				$str_device ="<tr id_obj_ot_personal_sar='$obj_ot_personal_sarId'>";
				$str_device .="<td name='sar'>".$params['sar']."</td>";				
				$str_device .="<td nazn_sar_ot='nazn_sar_ot'>".($params['nazn_sar_ot'] == 1 ? 'да' : 'нет')."</td>";
				$str_device .="<td nazn_sar_gvs='nazn_sar_gvs'>".($params['nazn_sar_gvs'] == 1 ? 'да' : 'нет')."</td>";
				$str_device .="<td nazn_sar_tn='nazn_sar_tn'>".($params['nazn_sar_tn'] == 1 ? 'да' : 'нет')."</td>";
				$str_device .="<td nazn_sar_vent='nazn_sar_vent'>".($params['nazn_sar_vent'] == 1 ? 'да' : 'нет')."</td>";
				$str_device .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_ot_personal_sar', $obj_ot_personal_sarId, '".$params['id_table']."')\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_personal_sar\",$obj_ot_personal_sarId,\"".$params['id_table']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_device;
        }
    }


	
	public function add_ot_heat_source()
    {
		
		$this->load->model('Mkm_object_t_ti');
        $params = $this->request->post;
		$str_device = '';
		
			$this->load->model('Subject');
//print_r($params);

			$arr_sbj = $this->model->subject->getSubjectData($params['id_reestr_subject']);	
			$params['id_unp_sbj_ti'] = $arr_sbj['id_unp'];


			$arr_sbj = $this->model->subject->getSubjectData($params['id_reestr_subject_own']);
			$params['id_unp_sbj_own'] = $arr_sbj['id_unp'];
			
	
	
		/*if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_heat_sourceId = $this->model->mkm_object_t_ti->updateMkm_object_t_tiInfo($params);
		echo 'upd';
		
		}else{*/
            $obj_ot_heat_sourceId = $this->model->mkm_object_t_ti->createOt_mkm_object_t_ti($params);
			//echo 'new';
 
	//	}
//echo $obj_ot_heat_sourceId;	
	
		if($obj_ot_heat_sourceId != 0){
			
			
			
				$str_device ="<tr id_mkm_object_t_ti='$obj_ot_heat_sourceId'>";
				$str_device .= "<td>".($params['id_unp_sbj_ti'] == $params['id_unp_sbj_own'] ? 'Собственный: ' : 'Сторонний: ')."</td>";
				$str_device .="<td name='name_object'>".$params['name_obj_source']."</td><td><div class='menu-item-event'><div><button class='button-remove' onclick='object.removeTableItem(\"mkm_object_t_ti\",$obj_ot_heat_sourceId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				
			}
			
			
			echo $str_device;
       	
		
		
    }	
	
	
	public function add_obj_oe_avr()
    {

        $this->load->model('obj_oe_avr');

        $params = $this->request->post;
		
		
		$str_avr = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oe_avrId = $this->model->obj_oe_avr->updateObj_oe_avrInfo($params);
		
		
		}else{
            $obj_oe_avrId = $this->model->obj_oe_avr->createObj_oe_avr($params);
            
       /* }

		
        if (isset($params['place'])) {
            $obj_oe_avrId = $this->model->obj_oe_avr->createObj_oe_avr($params);*/
           
		   
			if($obj_oe_avrId != 0){
				
				$str_avr ="<tr id_obj_oe_avr='$obj_oe_avrId'>";
				$str_avr .="<td name='place'>".$params['place']."</td>";
				$str_avr .="<td name='power'>".$params['power']."</td>";
				$str_avr .="<td name='time'>".$params['time']."</td>";
				$str_avr .="<td name='date'>".(strlen($params['date']) > 0 ? date('d.m.Y',strtotime($params['date'])) : '')."</td>";
				$str_avr .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_avr', $obj_oe_avrId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_avr\",$obj_oe_avrId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_avr;
			//echo $obj_oe_avrId ;
        }
    }
	
	public function add_obj_oe_aie()
    {

        $this->load->model('obj_oe_aie');

        $params = $this->request->post;
		
		//print_r($params);
		
		$str_aie = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oe_aieId = $this->model->obj_oe_aie->updateObj_oe_aieInfo($params);
		
		
		}else{
            $obj_oe_aieId = $this->model->obj_oe_aie->createObj_oe_aie($params);
            
        /*}


		
        if (isset($params['name'])) {
            $obj_oe_aieId = $this->model->obj_oe_aie->createObj_oe_aie($params);*/
           

		   
			if($obj_oe_aieId != 0){
				
				$str_aie ="<tr id_obj_oe_aie='$obj_oe_aieId'>";
				$str_aie .="<td name='name'>".$params['name']."</td>";
				$str_aie .="<td name='place'>".$params['place']."</td>";
				$str_aie .="<td name='type'>".$params['type']."</td>";
				$str_aie .="<td name='power'>".$params['power']."</td>";
				$str_aie .="<td name='mosch'>".$params['mosch']."</td>";
				$str_aie .="<td name='pitanie'>".$params['pitanie']."</td>";
				$str_aie .="<td name='date_last'>".(strlen($params['date_last']) > 0 ? date('d.m.Y',strtotime($params['date_last'])) : '')."</td>";
				$str_aie .="<td name='factory'>".$params['factory']."</td>";
				$str_aie .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_aie .="<td name='srok'>".$params['srok']."</td>";
				$str_aie .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";

				$str_aie .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_aie', $obj_oe_aieId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_aie\",$obj_oe_aieId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_aie;
		
        }
    }
	
	public function add_obj_oe_trp()
    {

        $this->load->model('obj_oe_trp');

        $params = $this->request->post;
		
		print_r($params);
		
		$str_tp = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oe_trpId = $this->model->obj_oe_trp->updateObj_oe_trpInfo($params);
		
		
		}else{
            $obj_oe_trpId = $this->model->obj_oe_trp->createObj_oe_trp($params);
            

		   
			if($obj_oe_trpId != 0){
				
				$str_tp ="<tr id_obj_oe_trp='$obj_oe_trpId'>";
				$str_tp .="<td name='name'>".$params['name']."</td>";
				$str_tp .="<td name='id_type'>".$params['id_type']."</td>";
				$str_tp .="<td name='power'>".$params['power']."</td>";
				$str_tp .="<td name='volt'>".$params['volt']."</td>";
				$str_tp .="<td name='category' trp_cat='".$params['category']."'>".$params['category_name']."</td>";
				$str_tp .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_tp .="<td name='srok'>".$params['srok']."</td>";
				$str_tp .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";
				
				
				$str_tp .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_trp',$obj_oe_trpId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_trp\",$obj_oe_trpId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_tp;
			//echo $obj_oe_trpId;
		
        }
    }
	
	public function add_obj_oe_klvl()
    {

        $this->load->model('obj_oe_klvl');

        $params = $this->request->post;
	
	print_r($params);	
		$str_klvl = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oe_klvlId = $this->model->obj_oe_klvl->updateObj_oe_klvlInfo($params);
		
		
		}else{
            $obj_oe_klvlId = $this->model->obj_oe_klvl->createObj_oe_klvl($params);
            
       /* }


		
        if (isset($params['name'])) {
            $obj_oe_klvlId = $this->model->obj_oe_klvl->createObj_oe_klvl($params);*/
           

		   
			if($obj_oe_klvlId != 0){
				
				$str_klvl ="<tr id_obj_oe_klvl='$obj_oe_klvlId'>";
				$str_klvl .="<td name='type' klvl_type='".$params['type']."'>".$params['type_name']."</td>";
				$str_klvl .="<td name='volt' klvl_volt='".$params['volt']."'>".$params['volt_name']."</td>";
				$str_klvl .="<td name='name'>".$params['name']."</td>";
				$str_klvl .="<td name='mark'>".$params['mark']."</td>";
				$str_klvl .="<td name='length'>".$params['length']."</td>";
				$str_klvl .="<td name='name_center'>".$params['name_center']."</td>";
				$str_klvl .="<td name='category' klvl_cat='".$params['category']."'>".$params['category_name']."</td>";
				$str_klvl .="<td name='year'>".$params['year']."</td>";
				$str_klvl .="<td name='srok'>".$params['srok']."</td>";
				$str_klvl .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";

				
				$str_klvl .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_klvl', $obj_oe_klvlId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_klvl\",$obj_oe_klvlId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_klvl;
			//echo $obj_oe_klvlId;
		
        }
    }
	
	public function add_obj_oe_block()
    {
		$this->load->model('obj_oe_block');

        $params = $this->request->post;
		
		$str_block = '';
		
//print_r($params);
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oe_blockId = $this->model->obj_oe_block->updateObj_oe_blockInfo($params);
		
		
		}else{
            $obj_oe_blockId = $this->model->obj_oe_block->createObj_oe_block($params);
            
        /*}

		
        if (isset($params['name'])) {
            $obj_oe_blockId = $this->model->obj_oe_block->createObj_oe_block($params);*/
           

		   
			if($obj_oe_blockId != 0){
				
				$str_block ="<tr id_obj_oe_block='$obj_oe_blockId'>";
				$str_block .="<td name='name'>".$params['name']."</td>";
				$str_block .="<td name='power'>".$params['power']."</td>";
				$str_block .="<td energy_type ='".$params['type']."'>".$params['type_name']."</td>";
				$str_block .="<td add_load='add_load'>".($params['add_load'] == 1 ? 'да' : 'нет')."</td>";
				$str_block .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_block', $obj_oe_blockId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_block\",$obj_oe_blockId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_block;
			//echo $obj_oe_klvlId;
		
        }
    }
	
	public function add_obj_oe_vvd()
    {

        $this->load->model('obj_oe_vvd');

        $params = $this->request->post;
		
		//print_r($params);
		
		$str_vvd = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oe_vvdId = $this->model->obj_oe_vvd->updateObj_oe_vvdInfo($params);
		
		
		}else{
            $obj_oe_vvdId = $this->model->obj_oe_vvd->createObj_oe_vvd($params);
            
       /* }


		
        if (isset($params['name'])) {
            $obj_oe_klvlId = $this->model->obj_oe_klvl->createObj_oe_klvl($params);*/
           

		   
			if($obj_oe_vvdId != 0){
				
				$str_vvd ="<tr id_obj_oe_vvd='$obj_oe_vvdId'>";
				$str_vvd .="<td name='name'>".$params['name']."</td>";
				$str_vvd .="<td name='count'>".$params['count']."</td>";
				$str_vvd .="<td name='power'>".$params['power']."</td>";
				$str_vvd .="<td name='voltage'>".$params['voltage']."</td>";
				$str_vvd .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_vvd .="<td name='srok'>".$params['srok']."</td>";
				$str_vvd .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";				
				

				$str_vvd .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_vvd', $obj_oe_vvdId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_vvd\",$obj_oe_vvdId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_vvd;
			//echo $obj_oe_vvdId;
		
        }
    }	
	public function add_obj_oe_ek()
    {

        $this->load->model('obj_oe_ek');

        $params = $this->request->post;
		
		print_r($params);
		
		$str_ek = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oe_ekId = $this->model->obj_oe_ek->updateObj_oe_ekInfo($params);
		
		
		}else{
            $obj_oe_ekId = $this->model->obj_oe_ek->createObj_oe_ek($params);
            
		   
			if($obj_oe_ekId != 0){
				
				$str_ek ="<tr id_obj_oe_ek='$obj_oe_ekId'>";
				$str_ek .="<td name='place'>".$params['place']."</td>";
				$str_ek .="<td name='name'>".$params['name']."</td>";
				$str_ek .="<td name='count'>".$params['count']."</td>";
				$str_ek .="<td name='nazn'>".$params['nazn']."</td>";
				$str_ek .="<td name='power'>".$params['power']."</td>";
				$str_ek .="<td name='date_vid'>".(strlen($params['date_vid']) > 0 ? date('d.m.Y',strtotime($params['date_vid'])) : '')."</td>";
				/*$str_ek .="<td ek_rezim='ek_rezim'>".$params['rezim']."</td>";*/
				
				$str_ek .="<td ek_rezim='".$params['rezim']."'>".$params['rezim_name']."</td>";
				
				
				$str_ek .="<td is_avt='is_avt'>".($params['is_avt'] == 1 ? 'да' : 'нет')."</td>";
				$str_ek .="<td is_pu='is_pu'>".($params['is_pu'] == 1 ? 'да' : 'нет')."</td>";
				$str_ek .="<td is_ak='is_ak'>".($params['is_ak'] == 1 ? 'да' : 'нет')."</td>";
				$str_ek .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_ek .="<td name='srok'>".$params['srok']."</td>";
				$str_ek .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";	

				$str_ek .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_ek', $obj_oe_ekId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_ek\",$obj_oe_ekId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_ek;
		
        }
    }
	
	
	public function add_obj_oe_ku()
    {

        $this->load->model('obj_oe_ku');

        $params = $this->request->post;
		
		//print_r($params);
		
		$str_ku = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_oe_kuId = $this->model->obj_oe_ku->updateObj_oe_kuInfo($params);
		
		
		}else{
            $obj_oe_kuId = $this->model->obj_oe_ku->createObj_oe_ku($params);
            
       /* }


		
        if (isset($params['name'])) {
            $obj_oe_klvlId = $this->model->obj_oe_klvl->createObj_oe_klvl($params);*/
           

		   
			if($obj_oe_kuId != 0){
				
				$str_ku ="<tr id_obj_oe_ku='$obj_oe_kuId'>";
				$str_ku .="<td name='place'>".$params['place']."</td>";
				$str_ku .="<td name='name'>".$params['name']."</td>";
				$str_ku .="<td name='voltage'>".$params['voltage']."</td>";
				$str_ku .="<td name='count'>".$params['count']."</td>";
				$str_ku .="<td name='power'>".$params['power']."</td>";
				$str_ku .="<td name='count_ar'>".$params['count_ar']."</td>";
				$str_ku .="<td name='max_ar'>".$params['max_ar']."</td>";
				$str_ku .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_ku .="<td name='srok'>".$params['srok']."</td>";
				$str_ku .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";				
				

				$str_ku .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_ku', $obj_oe_kuId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_ku\",$obj_oe_kuId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_ku;
			//echo $obj_oe_vvdId;
		
        }
    }

	public function add_obj_ot_prit_vent()
    {

        $this->load->model('obj_ot_prit_vent');

        $params = $this->request->post;
		
		//print_r($params);
		
		$str_pv = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_prit_ventId = $this->model->obj_ot_prit_vent->updateObj_ot_prit_ventInfo($params);
		
		
		}else{
            $obj_ot_prit_ventId = $this->model->obj_ot_prit_vent->createObj_ot_prit_vent($params);
            
		   
			if($obj_ot_prit_ventId != 0){
				
				$str_pv ="<tr id_obj_ot_prit_vent='$obj_ot_prit_ventId'>";
				$str_pv .="<td name='name'>".$params['name']."</td>";
				$str_pv .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_pv .="<td name='srok'>".$params['srok']."</td>";
				$str_pv .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";	

				$str_pv .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_ot_prit_vent', $obj_ot_prit_ventId, '".$params['id_table']."')\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_prit_vent\",$obj_ot_prit_ventId,\"".$params['id_table']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_pv;
		
        }
    }


	public function add_obj_ot_teploobmennik_gvs()
    {

        $this->load->model('obj_ot_teploobmennik_gvs');

        $params = $this->request->post;
		
		//print_r($params);
		
		$str_teploobmennik_gvs = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_teploobmennik_gvsId = $this->model->obj_ot_teploobmennik_gvs->updateObj_ot_teploobmennik_gvsInfo($params);
		
		
		}else{
            $obj_ot_teploobmennik_gvsId = $this->model->obj_ot_teploobmennik_gvs->createObj_ot_teploobmennik_gvs($params);
            

		   
			if($obj_ot_teploobmennik_gvsId != 0){
				
				$str_teploobmennik_gvs ="<tr id_obj_ot_teploobmennik_gvs='$obj_ot_teploobmennik_gvsId'>";
				$str_teploobmennik_gvs .="<td gvs='".$params['teploobm']."'>".$params['teploobm_name']."</td>";
				$str_teploobmennik_gvs .="<td name='name'>".$params['name']."</td>";
				$str_teploobmennik_gvs .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_teploobmennik_gvs .="<td name='srok'>".$params['srok']."</td>";
				$str_teploobmennik_gvs .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";
				
				
				$str_teploobmennik_gvs .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_ot_teploobmennik_gvs',$obj_ot_teploobmennik_gvsId, '".$params['id_table']."')\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_teploobmennik_gvs\",$obj_ot_teploobmennik_gvsId,\"".$params['id_table']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_teploobmennik_gvs;
			//echo $obj_oe_trpId;
		
        }
    }	
	public function add_obj_ot_teploobmennik_so()
    {

        $this->load->model('obj_ot_teploobmennik_so');

        $params = $this->request->post;
		
		//print_r($params);
		
		$str_teploobmennik_so = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$obj_ot_teploobmennik_soId = $this->model->obj_ot_teploobmennik_so->updateObj_ot_teploobmennik_soInfo($params);
		
		
		}else{
            $obj_ot_teploobmennik_soId = $this->model->obj_ot_teploobmennik_so->createObj_ot_teploobmennik_so($params);
            

		   
			if($obj_ot_teploobmennik_soId != 0){
				
				$str_teploobmennik_so ="<tr id_obj_ot_teploobmennik_so='$obj_ot_teploobmennik_soId'>";
				$str_teploobmennik_so .="<td so='".$params['teploobm']."'>".$params['teploobm_name']."</td>";
				$str_teploobmennik_so .="<td name='name'>".$params['name']."</td>";
				$str_teploobmennik_so .="<td name='year_begin'>".$params['year_begin']."</td>";
				$str_teploobmennik_so .="<td name='srok'>".$params['srok']."</td>";
				$str_teploobmennik_so .="<td name='next_srok'>".(strlen($params['next_srok']) > 0 ? date('d.m.Y',strtotime($params['next_srok'])) : '')."</td>";
				
				
				$str_teploobmennik_so .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_ot_teploobmennik_so',$obj_ot_teploobmennik_soId,'".$params['id_table']."')\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_teploobmennik_so\",$obj_ot_teploobmennik_soId,\"".$params['id_table']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
			}
			echo $str_teploobmennik_so;
			//echo $obj_oe_trpId;
		
        }
    }	
    public function update()
    {
        $this->load->model('Objects');

        $params = $this->request->post;

		//print_r($params);

        if (isset($params['objects_id'])) {
            $objectsId = $this->model->objects->updateObjects($params);
			echo $objectsId;
		
        }
	
    }
	
	public function removeItem()
    {

        $params = $this->request->post;

        $this->load->model('Objects');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->objects->removeItems($params['item_id']);

				$this->load->model('obj_oe_avr');
				$this->model->obj_oe_avr->removeItemsByObj($params['item_id']);

				$this->load->model('obj_oe_aie');
				$this->model->obj_oe_aie->removeItemsByObj($params['item_id']);

				$this->load->model('obj_ot_prit_vent');
				$this->model->obj_ot_prit_vent->removeItemsByObj($params['item_id']);

				$this->load->model('obj_oe_trp');
				$this->model->obj_oe_trp->removeItemsByObj($params['item_id']);

				$this->load->model('obj_ot_teploobmennik_gvs');
				$this->model->obj_ot_teploobmennik_gvs->removeItemsByObj($params['item_id']);
				
				$this->load->model('obj_ot_tepl_kot');
				$this->model->obj_ot_tepl_kot->removeItemsByObj($params['item_id']);				
				
				$this->load->model('obj_ot_teploobmennik_so');
				$this->model->obj_ot_teploobmennik_so->removeItemsByObj($params['item_id']);

				$this->load->model('obj_oe_klvl');
				$this->model->obj_oe_klvl->removeItemsByObj($params['item_id']);

				$this->load->model('obj_oe_block');
				$this->model->obj_oe_block->removeItemsByObj($params['item_id']);
				
				$this->load->model('obj_oe_vvd');
				$this->model->obj_oe_vvd->removeItemsByObj($params['item_id']);
				
				$this->load->model('obj_oe_ek');
				$this->model->obj_oe_ek->removeItemsByObj($params['item_id']);

				$this->load->model('obj_oe_ku');
				$this->model->obj_oe_ku->removeItemsByObj($params['item_id']);
				
				$this->load->model('obj_ot_heatnet_t');
				$this->model->obj_ot_heatnet_t->removeItemsByObj($params['item_id']);

				$this->load->model('obj_ot_personal_tp');
				$this->model->obj_ot_personal_tp->removeItemsByObj($params['item_id']);
				
				$this->load->model('obj_ot_personal_sar');
				$this->model->obj_ot_personal_sar->removeItemsByObj($params['item_id']);

				$this->load->model('obj_oti_boiler_water');
				$this->model->obj_oti_boiler_water->removeItemsByObj($params['item_id']);

				$this->load->model('obj_oti_boiler_vapor');
				$this->model->obj_oti_boiler_vapor->removeItemsByObj($params['item_id']);

				$this->load->model('obj_ot_heatnet');
				$this->model->obj_ot_heatnet->removeItemsByObj($params['item_id']);
				
				$this->load->model('obj_ot_heatnet_t');
				$this->model->obj_ot_heatnet_t->removeItemsByObj($params['item_id']);

				$this->load->model('obj_og_device');
				$this->model->obj_og_device->removeItemsByObj($params['item_id']);

				$this->load->model('mkm_object_t_ti');
				$this->model->mkm_object_t_ti->removeItemsByObj($params['item_id']);
				
				$this->load->model('tabs');
				$this->model->tabs->removeItemsByObj($params['item_id']);

				$this->load->model('obj_og_accidents');
				$this->model->obj_og_accidents->removeItemsByObj($params['item_id']);

				$this->load->model('obj_og_obsl');
				$this->model->obj_og_obsl->removeItemsByObj($params['item_id']);
		
        }
    }
// удаление строки из связанных таблиц	
	public function removeObjTableRow()
    {

        $params = $this->request->post;

		switch($params['table_name']){
			case 'obj_oe_avr':
				$this->load->model('obj_oe_avr');
				$this->model->obj_oe_avr->removeItems($params['item_id']);
			break;
			case 'obj_oe_aie':
				$this->load->model('obj_oe_aie');
				$this->model->obj_oe_aie->removeItems($params['item_id']);
			break;
			case 'obj_ot_prit_vent':
				$this->load->model('obj_ot_prit_vent');
				$this->model->obj_ot_prit_vent->removeItems($params['item_id']);
			break;			
			case 'obj_oe_trp':
				$this->load->model('obj_oe_trp');
				$this->model->obj_oe_trp->removeItems($params['item_id']);
			break;
			case 'obj_ot_teploobmennik_gvs':
				$this->load->model('obj_ot_teploobmennik_gvs');
				$this->model->obj_ot_teploobmennik_gvs->removeItems($params['item_id']);
			break;	
			case 'obj_ot_tepl_kot':
				$this->load->model('obj_ot_tepl_kot');
				$this->model->obj_ot_tepl_kot->removeItems($params['item_id']);
			break;			
			case 'obj_ot_teploobmennik_so':
				$this->load->model('obj_ot_teploobmennik_so');
				$this->model->obj_ot_teploobmennik_so->removeItems($params['item_id']);
			break;			
			case 'obj_oe_klvl':
				$this->load->model('obj_oe_klvl');
				$this->model->obj_oe_klvl->removeItems($params['item_id']);
			break;
			case 'obj_oe_block':
				$this->load->model('obj_oe_block');
				$this->model->obj_oe_block->removeItems($params['item_id']);
			break;
			case 'obj_oe_vvd':
				$this->load->model('obj_oe_vvd');
				$this->model->obj_oe_vvd->removeItems($params['item_id']);
			break;
			case 'obj_oe_ek':
				$this->load->model('obj_oe_ek');
				$this->model->obj_oe_ek->removeItems($params['item_id']);
			break;	
			case 'obj_oe_ku':
				$this->load->model('obj_oe_ku');
				$this->model->obj_oe_ku->removeItems($params['item_id']);
			break;			
			case 'obj_ot_heatnet_t':
				$this->load->model('obj_ot_heatnet_t');
				$this->model->obj_ot_heatnet_t->removeItems($params['item_id']);
			break;
			case 'obj_ot_personal_tp':
				$this->load->model('obj_ot_personal_tp');
				$this->model->obj_ot_personal_tp->removeItems($params['item_id']);
			break;
			case 'obj_ot_personal_sar':
				$this->load->model('obj_ot_personal_sar');
				$this->model->obj_ot_personal_sar->removeItems($params['item_id']);
			break;			
			case 'boiler_water':
				$this->load->model('obj_oti_boiler_water');
				$this->model->obj_oti_boiler_water->removeItems($params['item_id']);
			break;
			case 'boiler_vapor':
				$this->load->model('obj_oti_boiler_vapor');
				$this->model->obj_oti_boiler_vapor->removeItems($params['item_id']);
			break;
			case 'obj_ot_heatnet':
				$this->load->model('obj_ot_heatnet');
				$this->model->obj_ot_heatnet->removeItems($params['item_id']);
			break;
			case 'obj_ot_heatnet_t':
				$this->load->model('obj_ot_heatnet_t');
				$this->model->obj_ot_heatnet_t->removeItems($params['item_id']);
			break;			
			case 'obj_og_device':
				$this->load->model('obj_og_device');
				$this->model->obj_og_device->removeItems($params['item_id']);
			break;
			case 'mkm_object_t_ti':
				$this->load->model('mkm_object_t_ti');
				$this->model->mkm_object_t_ti->removeItems($params['item_id']);
			break;
			case 'tabs':
				$this->load->model('tabs');
				$this->model->tabs->removeItems($params['item_id']);
			break;			
			case 'obj_og_accidents':
				$this->load->model('obj_og_accidents');
				$this->model->obj_og_accidents->removeItems($params['item_id']);
			break;	
			case 'obj_og_obsl':
				$this->load->model('obj_og_obsl');
				$this->model->obj_og_obsl->removeItems($params['item_id']);
			break;				
			default:
		}


        /*$this->load->model('Objects');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->objects->removeItems($params['item_id']);
            echo $removeItem;
        }*/
    }
/// отмена ввода информации по новому объекту
	public function cancel()
    {

        $params = $this->request->post;

	/// Удаляем предварительно сохраненные данные в подчиненных таблицах
	
			if(isset($params['ids_boiler_water']) && count($params['ids_boiler_water'])>0){	

				$this->load->model('Obj_oti_boiler_water');

				foreach($params['ids_boiler_water'] as $id_boiler_water){
				
					$this->model->obj_oti_boiler_water->deleteObj_oti_boiler_water_empty_object_id($id_boiler_water);
				}
			}
	
			
			if(isset($params['ids_boiler_vapor']) && count($params['ids_boiler_vapor'])>0){	

				$this->load->model('Obj_oti_boiler_vapor');

				foreach($params['ids_boiler_vapor'] as $id_boiler_vapor){

					$this->model->obj_oti_boiler_vapor->deleteObj_oti_boiler_vapor_empty_object_id($id_boiler_vapor);
				}
			}
		
			
			if(isset($params['ids_obj_og_device']) && count($params['ids_obj_og_device'])>0){	

				$this->load->model('obj_og_device');

				foreach($params['ids_obj_og_device'] as $id_device_obj_og){
	
					$this->model->obj_og_device->deleteObj_og_device_empty_object_id($id_device_obj_og);
				}
			}
		
			
			if(isset($params['ids_ot_heatnet']) && count($params['ids_ot_heatnet'])>0){	

				$this->load->model('obj_ot_heatnet');
					
				foreach($params['ids_ot_heatnet'] as $id_device_ot_heatnet){

					$this->model->obj_ot_heatnet->deleteObj_ot_heatnet_empty_object_id($id_device_ot_heatnet);
				}
			}
		
			if(isset($params['ids_ot_heatnet_t']) && count($params['ids_ot_heatnet_t'])>0){	

				$this->load->model('obj_ot_heatnet_t');
					
				foreach($params['ids_ot_heatnet_t'] as $id_device_ot_heatnet_t){

					$this->model->obj_ot_heatnet_t->deleteObj_ot_heatnet_t_empty_object_id($id_device_ot_heatnet_t);
				}
			}
			
			if(isset($params['ids_obj_oe_avr']) && count($params['ids_obj_oe_avr'])>0){	

				$this->load->model('obj_oe_avr');

				foreach($params['ids_obj_oe_avr'] as $id_obj_oe_avr){
					$this->model->obj_oe_avr->deleteObj_oe_avr_empty_object_id($id_obj_oe_avr);
				}
			}
			
			if(isset($params['ids_obj_oe_aie']) && count($params['ids_obj_oe_aie'])>0){	

				$this->load->model('obj_oe_aie');

				foreach($params['ids_obj_oe_aie'] as $id_obj_oe_aie){
					$this->model->obj_oe_aie->deleteObj_oe_aie_empty_object_id($id_obj_oe_aie);
				}
			}
			if(isset($params['ids_obj_ot_prit_vent']) && count($params['ids_obj_ot_prit_vent'])>0){	

				$this->load->model('obj_ot_prit_vent');

				foreach($params['ids_obj_ot_prit_vent'] as $id_obj_ot_prit_vent){
					$this->model->obj_ot_prit_vent->deleteObj_ot_prit_vent_aie_empty_object_id($id_obj_ot_prit_vent);
				}
			}			
			if(isset($params['ids_obj_oe_trp']) && count($params['ids_obj_oe_trp'])>0){	

				$this->load->model('obj_oe_trp');

				foreach($params['ids_obj_oe_trp'] as $id_obj_oe_trp){
					$this->model->obj_oe_trp->deleteobj_oe_trp_empty_object_id($id_obj_oe_trp);
				}
			}
			if(isset($params['ids_obj_ot_teploobmennik_gvs']) && count($params['ids_obj_ot_teploobmennik_gvs'])>0){	

				$this->load->model('obj_ot_teploobmennik_gvs');

				foreach($params['ids_obj_ot_teploobmennik_gvs'] as $id_obj_ot_teploobmennik_gvs){
					$this->model->obj_ot_teploobmennik_gvs->deleteobj_ot_teploobmennik_gvs_empty_object_id($id_obj_ot_teploobmennik_gvs);
				}
			}
			if(isset($params['ids_obj_ot_tepl_kot']) && count($params['ids_obj_ot_tepl_kot'])>0){	

				$this->load->model('obj_ot_tepl_kot');

				foreach($params['ids_obj_ot_tepl_kot'] as $id_obj_ot_tepl_kot){
					$this->model->obj_ot_tepl_kot->deleteobj_ot_tepl_kot_empty_object_id($id_obj_ot_tepl_kot);
				}
			}			
			if(isset($params['ids_obj_ot_teploobmennik_so']) && count($params['ids_obj_ot_teploobmennik_so'])>0){	

				$this->load->model('obj_ot_teploobmennik_so');

				foreach($params['ids_obj_ot_teploobmennik_so'] as $id_obj_ot_teploobmennik_so){
					$this->model->obj_ot_teploobmennik_so->deleteobj_ot_teploobmennik_so_empty_object_id($id_obj_ot_teploobmennik_so);
				}
			}			
			if(isset($params['ids_obj_oe_klvl']) && count($params['ids_obj_oe_klvl'])>0){	

				$this->load->model('obj_oe_klvl');

				foreach($params['ids_obj_oe_klvl'] as $id_obj_oe_klvl){
					$this->model->obj_oe_klvl->deleteObj_oe_klvl_empty_object_id($id_obj_oe_klvl);
				}
			}
			
			if(isset($params['ids_obj_oe_block']) && count($params['ids_obj_oe_block'])>0){	

				$this->load->model('obj_oe_block');

				foreach($params['ids_obj_oe_block'] as $id_obj_oe_block){
					$this->model->obj_oe_block->deleteObj_oe_block_empty_object_id($id_obj_oe_block);
				}
			}
			
			if(isset($params['ids_obj_oe_vvd']) && count($params['ids_obj_oe_vvd'])>0){	

				$this->load->model('obj_oe_vvd');

				foreach($params['ids_obj_oe_vvd'] as $id_obj_oe_vvd){
					$this->model->obj_oe_vvd->deleteObj_oe_vvd_empty_object_id($id_obj_oe_vvd);
				}
			}
			if(isset($params['ids_obj_oe_ek']) && count($params['ids_obj_oe_ek'])>0){	

				$this->load->model('obj_oe_ek');

				foreach($params['ids_obj_oe_ek'] as $id_obj_oe_ek){
					$this->model->obj_oe_ek->deleteObj_oe_ek_empty_object_id($id_obj_oe_ek);
				}
			}
			if(isset($params['ids_obj_oe_ku']) && count($params['ids_obj_oe_ku'])>0){	

				$this->load->model('obj_oe_ku');

				foreach($params['ids_obj_oe_ku'] as $id_obj_oe_ku){
					$this->model->obj_oe_ku->deleteObj_oe_ku_empty_object_id($id_obj_oe_ku);
				}
			}			
		
    }
	
	public function usersList()
	{
		// podrazdelenie - вид инспекции 1-тепло, 2 -газ , 3 - электро
		$params = $this->request->post;
		
		$this->load->model('User');
		$usersList = $this->model->user->getUsersByPodrazd($params['spr_cod_podrazd'],$params['podrazdelenie']);
		
		$strUser = "<option value='0'>Выберите инспектора</option>";
		foreach($usersList as $userList){	
			$strUser .= "<option value='$userList[id]'>$userList[fio]</option>";
		};
		
		echo $strUser;
		
		
	}
// ф-ция передачи объекта другому потребителю	
	public function newSbj()
	{
		$params = $this->request->post;
	
		$this->load->model('Objects');
		
		$this->model->objects->setNewSbj($params);
	}
	
	public function getObjsForTransfer()
	{
		$params = $this->request->post;
	
	//print_r($params);
	
		$this->load->model('Objects');
		
		$result = $this->model->objects->getObjsBySbjInsp($params['id_reestr_subject']);
		$str = '';
		foreach($result as $one_item){
			
			if($one_item['reestr_object_e_insp'] == $params['id_insp'] || $one_item['reestr_object_t_insp'] == $params['id_insp'] || $one_item['reestr_object_ti_insp'] == $params['id_insp']|| $one_item['reestr_object_g_insp'] == $params['id_insp']){
			$str .= '<input type="checkbox" name="item_obj_list" value="'.$one_item['id'].'" checked>'.$one_item['reestr_object_name'].'<br>';
			}
		}
		
		//print_r($result);
		echo $str;
	}
	
	
	public function newInsp()
	{
		$params = $this->request->post;
	//print_r($params);
		$this->load->model('Objects');
		
		$this->model->objects->setNewInsp($params);
	}
	
	
	
}