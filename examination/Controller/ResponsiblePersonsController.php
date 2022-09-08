<?php

namespace Examination\Controller;

use Admin\Controller\AdminController;
use Basis\Controller\SubjectController;

class ResponsiblePersonsController extends AdminController
{
	public function search()
    {
        $this->view->render('responsible_persons/search', $this->data);
    }
	
    public function listing($id)
    {
        $this->load->model('Responsible_persons');
        $this->data['responsible_persons'] = $this->model->responsible_persons->getResponsible_personsList($id);
		
		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($id);
		

        $this->view->render('responsible_persons/list', $this->data);
    }
	
		
    public function create($id_unp = null)
    {
	
			if($id_unp > 0){
			$this->load->model('Unp');
			$this->data['unp_head'] = $this->model->unp->getUnpData($id_unp);

			};
	
	
	
	
		$this->view->render('responsible_persons/create', $this->data);
    }

    public function edit($id)
    {
        $this->load->model('Responsible_persons');
        $this->data['responsible_persons'] = $this->model->responsible_persons->getResponsiblePersonsData($id);
		

		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['responsible_persons']['id_reestr_unp']);
		
		$this->load->model('subject');
		$this->data['subjects'] = $this->model->subject->getSubjectByOtv($id);
		
        $this->view->render('responsible_persons/edit', $this->data);
    }
	public function info($id)
    {


        $this->load->model('Responsible_persons');
        $this->data['responsible_persons'] = $this->model->responsible_persons->getResponsiblePersonsData($id);
		
		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['responsible_persons']['id_reestr_unp']);
		
		
		$this->load->model('Subject');
		$this->data['subjects'] = $this->model->subject->getSubjectByOtv($id);
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
        $this->load->model('Responsible_persons');

        $params = $this->request->post;

        if (isset($params['id_reestr_unp'])) {
			if($params['resp_pers_id'] > 0){
			 $resppersId = $this->model->responsible_persons->updateResponsible_persons($params);	
			}else{
            $resppersId = $this->model->responsible_persons->createResponsible_persons($params);
			}
            echo $resppersId;
        }
    }

    public function update()
    {
        $this->load->model('Responsible_persons');
        $params = $this->request->post;

		
        if (isset($params['resp_pers_id'])) {
            $resppersId = $this->model->responsible_persons->updateResponsible_persons($params);
			
        }
		echo $resppersId;
    }
	
	public function removeItem()
    {

        $params = $this->request->post;

        $this->load->model('Responsible_persons');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->responsible_persons->removeItems($params['item_id']);
            echo $removeItem;
        }
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
	
	public function ListPers()
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
		
		
    }
	
	public function edit_post_e()
    {
        $params = $this->request->post;
        $this->load->model('Responsible_persons');
        if (isset($params['resp_pers_id'])) {
            $resppers = $this->model->responsible_persons->edit_post_e($params['resp_pers_id']);
            echo $resppers;
        }
    }
	public function edit_post_t()
    {

        $params = $this->request->post;
        $this->load->model('Responsible_persons');
        if (isset($params['resp_pers_id'])) {
            $resppers = $this->model->responsible_persons->edit_post_t($params['resp_pers_id']);
            echo $resppers;
        }
    }
	public function edit_post_g()
    {

        $params = $this->request->post;
        $this->load->model('Responsible_persons');
        if (isset($params['resp_pers_id'])) {
            $resppers = $this->model->responsible_persons->edit_post_g($params['resp_pers_id']);
            echo $resppers;
        }
    }	
	
}