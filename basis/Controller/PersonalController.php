<?php

namespace Basis\Controller;

use Admin\Controller\AddressController;
use Admin\Controller\AdminController;

class PersonalController extends AdminController
{
	public function search()
    {
        $this->view->render('personal/search', $this->data);
    }
	
    public function listing($id)
    {
        $this->load->model('Personal');
        $this->data['personal'] = $this->model->personal->getPersonalList($id);
		
		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($id);
		

        $this->view->render('personal/list', $this->data);
    }
	
		
    public function create($id_unp = null)
    {
	
			if($id_unp > 0){
			$this->load->model('Unp');
			$this->data['unp_head'] = $this->model->unp->getUnpData($id_unp);

			};
	
	
	
	
		$this->view->render('personal/create', $this->data);
    }

    public function edit($id)
    {
        $this->load->model('Personal');
        $this->data['personal'] = $this->model->personal->getPersonalData($id);
		$this->data['personal_result'] = $this->model->personal->getPersonalResultTest($id);

		

		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['personal']['id_reestr_unp']);
		
		$this->load->model('subject');
		$this->data['subjects'] = $this->model->subject->getSubjectByOtv($id);
				
		
        $this->view->render('personal/edit', $this->data);
    }
	
	
    public function srok()
    {

		$id_user = $this->data['id_user'];
		$spr_otdel = $this->data['spr_cod_otd'];
		$spr_podrazdelenie = $this->data['spr_cod_podrazd'];
		$spr_branch = $this->data['spr_cod_branch'];
		$access_level = $this->data['access_level'];
		$inspection_type = $this->data['inspection_type'];
		$arm_group = $this->data['inspection_type'];
		
		
		$this->load->model('Personal');
		
		if(strlen($spr_otdel) > 0 && $access_level == 2){ /** если пользователь начальник группы или начальник РЭГИ**/
			$this->data['personal_srok'] = $this->model->personal->getPersonalDataSrokByGroup($spr_otdel);
		}elseif(strlen($id_user) > 0 && $access_level == 1){/** если пользователь инспектор **/
			$this->data['personal_srok'] = $this->model->personal->getPersonalDataSrokByUser($id_user, $arm_group);
		}elseif(strlen($spr_podrazdelenie) > 0 && $access_level == 3){ /** если пользователь начальник МрО, инженер МрО, зам.нач МрО**/
			$this->data['personal_srok'] = $this->model->personal->getPersonalDataSrokByMro($spr_podrazdelenie);
        }elseif(strlen($spr_branch) > 0 && $access_level == 4){ /** если пользователь управления филиала **/
			$this->data['personal_srok'] = $this->model->personal->getPersonalDataSrokByBranch($spr_branch);
		}elseif(strlen($spr_branch) > 0 && $access_level == 5 || $access_level == 6){ /** если пользователь управления филиала **/
			$this->data['personal_srok'] = $this->model->personal->getPersonalDataSrok();
		}		
		
        $this->view->render('personal/srok', $this->data);
    }	
	
	public function info($id)
    {


        $this->load->model('Personal');
        $this->data['personal'] = $this->model->personal->getPersonalData($id);
		
		$this->load->model('Unp');
		$this->data['unp'] = $this->model->unp->getUnpData($this->data['personal']['id_reestr_unp']);
		
		
		$this->load->model('subject');
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
        $this->load->model('Personal');

        $params = $this->request->post;


        if (isset($params['id_reestr_unp'])) {
            $resppersId = $this->model->personal->createPersonal($params);
            echo '$resppersId '.$resppersId;
        }
    }

    public function update()
    {
        $this->load->model('Personal');
        $params = $this->request->post;

		
        if (isset($params['resp_pers_id'])) {
            $resppersId = $this->model->personal->updatePersonal($params);
			echo $resppersId;
        }
		
    }
	
	public function removeItem()
    {

        $params = $this->request->post;

        $this->load->model('Personal');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->personal->removeItems($params['item_id']);
            echo $removeItem;
        }
    }
	
	public function findSbjAndRsp()
	{
		$answ = 0;
		
		$params = $this->request->post;
		
		$this->load->model('Subject');
		$arr_sbj = $this->model->subject->getSubjectByUnp($params['item_id']);
		
		$this->load->model('Personal');
        $arr_resp  = $this->model->personal->getPersonalList($params['item_id']);
		
		if(count($arr_sbj)>0 or count($arr_resp)>0){
			$answ = 1;
		}
		
		echo $answ;
	}
	
	public function ListPers()
    {

        $params = $this->request->post;

        $this->load->model('Personal');

        if (isset($params['unp_otv_id']) && strlen($params['unp_otv_id']) > 0) {
            $listpers = $this->model->personal->getSpr_sob_otvList($params['unp_otv_id']);
        }
		
		$strOtv = "<option qq='1' value='0'>Выберите ответственное лицо</option>";
		foreach($listpers as $listper){	
			$strOtv .= "<option value='$listper[reestr_personal_id]'>$listper[reestr_personal_secondname] $listper[reestr_personal_firstname] $listper[reestr_personal_lastname] ($listper[reestr_unp_name_short], $listper[reestr_personal_post])</option>";
		};
		
		echo $strOtv;
		
		
    }
	
	
	
}