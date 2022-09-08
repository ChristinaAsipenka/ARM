<?php

namespace Basis\Controller;

use Admin\Controller\AdminController;

class AddressController extends AdminController
{
    public function listing()
    {
        $this->load->model('Region');

        $this->data['region'] = $this->model->region->getRegion();

        $this->view->render('region/list', $this->data);
    }

    public function create()
    {
        $this->view->render('region/create');
    }

    public function edit($id)
    {
        $this->load->model('Region');

        $this->data['region'] = $this->model->region->getRegionData($id);

        $this->view->render('region/edit', $this->data);
    }

    public function add()
    {
        $this->load->model('Region');

        $params = $this->request->region;

        if (isset($params['region'])) {
            $regionId = $this->model->region->createRegion($params);
            echo $regionId;
        }
    }

    public function update()
    {
        $this->load->model('Region');

        $params = $this->request->region;

        if (isset($params['region'])) {
            $regionId = $this->model->region->updateRegion($params);
            echo $regionId;
        }
    }
/********* Ф-ции формирования SELECTов **************/	
	public function SelectDistrict()
	{
		$strDistrict = "<option qq='1' value='0'>Выберите район</option>";
		$params = $this->request->post;	
		$idRegion = $params['idRegion'];
		$this->load->model('District');	
		$districts = $this->model->district->getDistrictByRegion($idRegion);
		
		foreach($districts as $district){	
			$strDistrict .= "<option value='$district[id]'>$district[name]</option>";
		};
		
		echo $strDistrict;
		
	}
	
	public function SelectCity()
	{
		
		$strCity = "<option qq='2' value='0'>Выберите город</option>";
		$params = $this->request->post;
		$idDistrict = $params['idDistrict'];
		
		$this->load->model('City');	
		$cities = $this->model->city->getCityByDistrict($idDistrict);
		
		foreach($cities as $city){	
			$strCity .= "<option value='$city[id]'>$city[name]</option>";
		};
		
		echo $strCity;
	
	}
	
	public function SelectCityZone()
	{
		
		$strCityZone = "<option qq='3' value='0'>Выберите район города</option>";
		$params = $this->request->post;
		$idCity = $params['idCity'];
		$this->load->model('CityZone');	
		$citiesZone = $this->model->cityZone->getCityZoneByCity($idCity);
		
		foreach($citiesZone as $cityzone){	
			$strCityZone .= "<option value='$cityzone[id]'>$cityzone[name]</option>";
		};
		
		echo $strCityZone;
		
		
		
	}
	
	
	public function selectpodrazdelenie()
	{
		$strPodrazdelenie = "<option qq='1' value='0'>Выберите МРО</option>";
		$params = $this->request->post;
		$idBranch = $params['idBranch'];
	//	echo $idBranch;
		$this->load->model('Podrazdelenie');	
		$podrazdelenies = $this->model->podrazdelenie->getPodrazdelenieByRegion($idBranch);
		
		foreach($podrazdelenies as $podrazdelenie){	
			$strPodrazdelenie .= "<option value='$podrazdelenie[id]'>$podrazdelenie[sokr_name]</option>";
		};
		
		echo $strPodrazdelenie;
		
	}
	
	public function selectotdel()
	{
		$strOtdel = "<option qq='1' value='0'>Выберите РЭГИ</option>";
		$params = $this->request->post;
		$idPodrazdelenie = $params['idPodrazdelenie'];
		//echo $idPodrazdelenie;
		$this->load->model('Otdel');	
		$otdels = $this->model->otdel->getOtdelByPodrazdelenie($idPodrazdelenie);
		
		foreach($otdels as $otdel){	
			$strOtdel .= "<option value='$otdel[id]'>$otdel[sokr_name]</option>";
		};
		
		echo $strOtdel;
		
	}	
}