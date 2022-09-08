<?php

namespace Basis\Controller;

use Admin\Controller\AddressController;
use Admin\Controller\AdminController;
use Engine\Helper\Cookie;

class Individual_personsController extends AdminController
{
	public function search()
    {
        $this->view->render('individual_persons/search', $this->data);
    }
	
    public function listing($id)
    {
        $this->load->model('Individual_persons');
        $this->data['individual_persons'] = $this->model->individual_persons->getIndividual_personsList($id);
		
		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($id);
		
		

        $this->view->render('individual_persons/list', $this->data);
    }
	
		
    public function create($id_unp = null)
    {
	
			/*if($id_unp > 0){
			$this->load->model('Unp');
			$this->data['unp_head'] = $this->model->unp->getUnpData($id_unp);

			};*/
	
	
	
	
		$this->view->render('individual_persons/create', $this->data);
    }
	
	public function reestr()
    {
	
			/*if($id_unp > 0){
			$this->load->model('Unp');
			$this->data['unp_head'] = $this->model->unp->getUnpData($id_unp);

			};*/
	
		$this->data['cookie_mf_ip_firstname']= Cookie::get('mf_ip_firstname');
		$this->data['cookie_mf_ip_secondname']= Cookie::get('mf_ip_secondname');
		$this->data['cookie_mf_ip_lastname']= Cookie::get('mf_ip_lastname');
		$this->data['cookie_mf_ip_identification_number']= Cookie::get('mf_ip_identification_number');
	
	
		$this->view->render('individual_persons/reestr', $this->data);
    }

    public function edit($id)
    {
        $this->load->model('individual_persons');
        $this->data['individual_persons'] = $this->model->individual_persons->getIndividual_personsData($id);
		
		$this->load->model('subject');
		$this->data['subjects'] = $this->model->subject->getSubjectByIndPers($id);
		/*$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['responsible_persons']['id_reestr_unp']);*/
		
        $this->view->render('individual_persons/edit', $this->data);
    }
	public function info($id)
    {


        $this->load->model('Individual_persons');
        $this->data['individual_persons'] = $this->model->individual_persons->getIndividual_personsData($id);
		
		/*$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['responsible_persons']['id_reestr_unp']);*/
		
		/*$this->load->model('Subject');
        $this->data['subject'] = $this->model->subject->getSubjectData($id);
		/****** Вышестоящая организация ****************/
		/*$this->load->model('Unp');
		$this->data['unp_head'] = $this->model->unp->getUnpData($this->data['subject']['id_unp_head']);
		/****** Юр лицо **********/
		/*$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['subject']['id_unp']);

		$this->load->model('Objects');
		$this->data['objects'] = $this->model->objects->getObjectsList($this->data['subject']['id']);
		$this->data['objects_bron'] = $this->model->objects->getObjectsListBron($this->data['subject']['id']);
		$this->data['objects_bron_teplo'] = $this->model->objects->getObjectsListBronTeplo($this->data['subject']['id']);*/
		

	  echo json_encode($this->data);
    }
    public function add()
    {
        $this->load->model('Individual_persons');

        $params = $this->request->post;
//print_r($params);
       /* if (isset($params['id_reestr_unp'])) {*/
            $indpersId = $this->model->individual_persons->createIndividual_persons($params);
            echo '$indpersId '.$indpersId;
        /*}*/
    }

    public function update()
    {
        $this->load->model('Individual_persons');
        $params = $this->request->post;

		
        if (isset($params['ind_pers_id'])) {
            $indpersId = $this->model->individual_persons->updateIndividual_persons($params);
			echo $indpersId;
        }
		
		$this->load->model('Subject');
		$arr_sbj = $this->model->subject->getSubjectByIndPers($params['ind_pers_id']);
	
		foreach($arr_sbj as $one_sbj){
				
				$sbj_arr['id'] = $one_sbj['id'];
				
				$add_str = '';
				
				if(strlen($one_sbj['fname']) > 0){
					
					$add_str = ' ('.$one_sbj['fname'].')';
					
				}
				
				$sbj_arr['name'] = $params['firstname'].' '.$params['secondname'].' '.$params['lastname'].$add_str;
				
				$this->model->subject->renameSbj($sbj_arr);
			}
		
    }
	
	public function removeItem()
    {

        $params = $this->request->post;

        $this->load->model('Individual_persons');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->individual_persons->removeItems($params['item_id']);
            echo $removeItem;
        }
    }
	
	public function findSbj()
	{
		$answ = 0;
		
		$params = $this->request->post;
		
		$this->load->model('Subject');
		$arr_sbj = $this->model->subject->getSubjectByIndPers($params['item_id']);
		
		//$this->load->model('Responsible_persons');
       // $arr_resp  = $this->model->responsible_persons->getResponsible_personsList($params['item_id']);
		
		if(count($arr_sbj)>0){
			$answ = 1;
		}
		
		echo $answ;
	}
	
	/*public function ListPers()
    {

        $params = $this->request->post;

        $this->load->model('Responsible_persons');

        if (isset($params['unp_otv_id']) && strlen($params['unp_otv_id']) > 0) {
            $listpers = $this->model->responsible_persons->getSpr_sob_otvList($params['unp_otv_id']);
        }
		
		$strOtv = "<option qq='1' value='0'>Выберите ответственное лицо</option>";
		foreach($listpers as $listper){	
			$strOtv .= "<option value='$listper[reestr_personal_id]'>$listper[reestr_personal_secondname] $listper[reestr_personal_firstname] $listper[reestr_personal_lastname] ($listper[reestr_unp_name_short], $listper[reestr_personal_post])</option>";
		};
		
		echo $strOtv;
		
		
    }*/
	
	
	
}