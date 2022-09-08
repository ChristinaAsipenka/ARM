<?php

namespace Examination\Controller;

use Basis\Controller\AddressController;
use Admin\Controller\AdminController;
use Engine\Helper\Cookie;

class UnpController extends AdminController
{	
	public function search()
    {
       // $this->load->model('Unp');

        //$this->data['unp'] = $this->model->unp->getUnp();
	
        $this->view->render('unp/search', $this->data);
    }
    public function listing()
    {
		$this->load->model('Region');		
		
		$this->data['regions'] = $this->model->region->getRegion();
		
        $this->load->model('Unp'); // для первоначального подсчета количества записей в базе
		
		// куки для фильтра УНП
		$this->data['cookie_formRegion']	= Cookie::get('formRegion');
		$this->data['cookie_formDistrict']= Cookie::get('formDistrict');
		$this->data['cookie_formCity'] = Cookie::get('formCity');
		$this->data['cookie_formCityZone']= Cookie::get('formCityZone');
		
		$this->data['cookie_formStreet']= Cookie::get('formStreet');
		
		/*** массивы для фильтра  ***/
	
		if($this->data['cookie_formRegion'] > 0){
			$this->load->model('District');	
			$this->data['fltr_District'] = $this->model->district->getDistrictByRegion($this->data['cookie_formRegion']);
		}
		
		if($this->data['cookie_formDistrict'] > 0){
			$this->load->model('City');	
			$this->data['fltr_City'] = $this->model->city->getCityByDistrict($this->data['cookie_formDistrict']);
		}
		
		if($this->data['cookie_formCity'] > 0){
			$this->load->model('CityZone');	
			$this->data['fltr_CityZone'] = $this->model->cityZone->getCityZoneByCity($this->data['cookie_formCity']);
		}
		///*************************************************************************
        $this->data['unp'] = $this->model->unp->getUnp();

        $this->view->render('unp/list', $this->data);
    }

    public function create()
    {
        $this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegion();
		
		
		$this->load->model('Spr_type_street');
		$this->data['spr_type_streetCheck'] = $this->model->spr_type_street->getSpr_type_street();		

		$this->load->model('Spr_type_city');
		$this->data['spr_type_cityCheck'] = $this->model->spr_type_city->getSpr_type_city();			
		
		$this->view->render('unp/create', $this->data);
		

		
		
		
    }

	

    public function edit($id)
    {
        $this->load->model('Unp');

        $this->data['unp'] = $this->model->unp->getUnpData($id);
		
		/**** Область (Region) ****/
		$this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegion();
		
		/**** Район (District) ****/
		$this->load->model('District');	
		$this->data['districts'] = $this->model->district->getDistrictByRegion($this->data['unp']['address_region']);
		
		/**** Город (City) ****/
		$this->load->model('City');	
		$this->data['cities'] = $this->model->city->getCityByDistrict($this->data['unp']['address_district']);

		/**** Район города (CityZone) ****/
		$this->load->model('CityZone');	
		$this->data['citiesZone'] = $this->model->cityZone->getCityZoneByCity($this->data['unp']['address_city']);
		
		$this->load->model('Spr_type_street');
		$this->data['spr_type_street'] = $this->model->spr_type_street->getSpr_type_street();

		$this->load->model('Spr_type_city');
		$this->data['spr_type_city'] = $this->model->spr_type_city->getSpr_type_city();		

        $this->view->render('unp/edit', $this->data);
    }


    public function info($id)
    {
        $this->load->model('Unp');

        $this->data['unp'] = $this->model->unp->getUnpData($id);
		
		/**** Область (Region) ****/
		$this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegionData($this->data['unp']['address_region']);
		
		/**** Район (District) ****/
		$this->load->model('District');	
		$this->data['districts'] = $this->model->district->getDistrictData($this->data['unp']['address_district']);
		
		/**** Город (City) ****/
		$this->load->model('City');	
		$this->data['cities'] = $this->model->city->getCityData($this->data['unp']['address_city']);

		/**** Район города (CityZone) ****/
		$this->load->model('CityZone');	
		$this->data['citiesZone'] = $this->model->cityZone->getCityZoneData($this->data['unp']['address_city_zone']);
		
		$this->load->model('Spr_type_street');
		$this->data['spr_type_street'] = $this->model->spr_type_street->getSpr_type_streetData($this->data['unp']['address_street_type']);
		
		$this->load->model('Spr_type_city');
		$this->data['spr_type_city'] = $this->model->spr_type_city->getSpr_type_cityData($this->data['unp']['address_city_type']);		

       echo json_encode($this->data);
    }


    public function add()
    {
        $this->load->model('Unp');

        $params = $this->request->post;

        if (isset($params['unp'])) {
            $unpId = $this->model->unp->createUnp($params);
            echo $unpId;
        }
    }

    public function update()
    {
        $this->load->model('Unp');

        $params = $this->request->post;

        if (isset($params['unp_id'])) {
            $unpId = $this->model->unp->updateUnp($params);
			echo $unpId;
        }
		
    }
	
	public function renameUnp()
    {
        
		// переименовываем УНП и потребителей ,привязанных к нему
		$this->load->model('Unp');

        $params = $this->request->post;

        if (isset($params['unp_id'])) {
            $unpId = $this->model->unp->renameUnp($params);
			//echo $unpId;
			
			$this->load->model('Subject');
			$arr_sbj = $this->model->subject->getSubjectByUnp($params['unp_id']);
			
			foreach($arr_sbj as $one_sbj){
				
				$sbj_arr['id'] = $one_sbj['id'];
				
				$add_str = '';
				
				if(strlen($one_sbj['fname']) > 0){
					
					$add_str = ' ('.$one_sbj['fname'].')';
					
				}
				
				$sbj_arr['name'] = $params['name'].$add_str;
				
				$this->model->subject->renameSbj($sbj_arr);
			}
			
        }
		
    }
	
	public function removeItem()
    {

        $params = $this->request->post;

        $this->load->model('Unp');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->unp->removeItems($params['item_id']);
            echo $removeItem;
        }
    }
	
	public function getPortal()
    {
//echo 'here';
        $params = $this->request->post;
//print_r($params);
        $this->load->model('Unp');
		
		$DataFromPortal = $this->model->unp->getPortalUnpData($params['unp']);
	//	print_r($DataFromPortal);
		if(!empty($DataFromPortal)){
		/**** Город (City) ****/
		$this->load->model('City');	
		$arr_city = $this->model->city->getCityDataByName($DataFromPortal['address_city']);
		
		//print_r($arr_city);	
		foreach($arr_city as $item_city){	
			if(isset($item_city['id'])){
				$DataFromPortal['cod_city'] = $item_city['id'];
			}
			
			if(isset($item_city['id_spr_district'])){
				$DataFromPortal['id_spr_district'] = $item_city['id_spr_district'];
			}
		}
		
		if(isset($DataFromPortal['cod_city'])){
			$this->load->model('CityZone');
			$DataFromPortal['cityzone_arr'] = $this->model->cityZone->getCityZoneByCity($DataFromPortal['cod_city']);
		}
		
		if(strlen($DataFromPortal['address_district'])>0){
			$this->load->model('District');	
			$arr_distr = $this->model->district->getDistrictDataByName($DataFromPortal['address_district']);
			//	print_r($arr_distr);
			foreach($arr_distr as $item_distr){	
				if(isset($item_distr['id'])){
					$DataFromPortal['id_spr_district'] = $item_distr['id'];
				}
				
				if(isset($item_distr['id_spr_region'])){
					$DataFromPortal['id_spr_region'] = $item_distr['id_spr_region'];
				}
			}
		}elseif(isset($DataFromPortal['id_spr_district']) && $DataFromPortal['id_spr_district'] >0){
			$this->load->model('District');	
			$arr_distr = $this->model->district->getDistrictData($DataFromPortal['id_spr_district']);
			//print_r($arr_distr);
			
				if(isset($arr_distr['id_spr_region'])){
					$DataFromPortal['id_spr_region'] = $arr_distr['id_spr_region'];
				}
			
			
		}
		
		
		if(strlen($DataFromPortal['address_region'])>0){
			$this->load->model('Region');
			$arr_region = $this->model->region->getRegionDataByName($DataFromPortal['address_region'].'%');
			//print_r($arr_region);
			
			foreach($arr_region as $item_region){	
				if(isset($item_region['id'])){
					$DataFromPortal['id_spr_region'] = $item_region['id'];
				}
				
			}
		}
		
		if(isset($DataFromPortal['id_spr_region']) && $DataFromPortal['id_spr_region'] > 0){
			$this->load->model('District');		
			$DataFromPortal['district_arr'] = $this->model->district->getDistrictByRegion($DataFromPortal['id_spr_region']);
		};
		
		if(isset($DataFromPortal['id_spr_region']) && $DataFromPortal['id_spr_district'] >0){
			$this->load->model('City');		
			$DataFromPortal['city_arr'] = $this->model->city->getCityByDistrict($DataFromPortal['id_spr_district']);
		};
		
	
		
		
		
	}
		echo json_encode($DataFromPortal);
		//print_r($DataFromPortal);

        
    }
	
	
	public function findSbjAndRsp()
	{
		$answ = 0;
		
		$params = $this->request->post;
		
		$this->load->model('Subject');
		$arr_sbj = $this->model->subject->getSubjectByUnp($params['item_id']);
		
		$this->load->model('Responsible_persons');
        $arr_resp  = $this->model->responsible_persons->getResponsible_personsList($params['item_id']);
		
		if(count($arr_sbj)>0 or count($arr_resp)>0){
			$answ = 1;
		}
		
		echo $answ;
	}
}