<?php

namespace Basis\Controller;

//use Admin\Controller\AddressController;
use Admin\Controller\AdminController;

class ReportController extends AdminController
{	
	public function report_subject_filter()
    {
		$params = $this->request->post;

		$this->load->model('Subject');
		$arr_result = $this->data['subject'] = $this->model->subject->getSubjectsByMainPage($params);

		
		if(count($arr_result) > 0){
			$str_result = '';
			$this->load->model('Report');
			$this->model->report->filter_subject_list($arr_result,$params);

		}else{

		}
	  

	 echo 'sub.xls';
	}

/*****************************************************************************************************************/
	public function report_letter_filter()
    {
		$params = $this->request->post;		
		//print_r($params);
		

		$access_level = $this->data['access_level'];
		$spr_cod_branch = $this->data['spr_cod_branch'];
		$inspection_type = $this->data['inspection_type'];
		$spr_cod_otd = $this->data['spr_cod_otd'];
		$spr_cod_podrazd = $this->data['spr_cod_podrazd'];
		$podrazdelenie = $this->data['podrazdelenie'];
		$id_user = $this->data['id_user'];
		
		
		
		$this->load->model('Personal');
				if(strlen($spr_cod_branch) > 0 && $access_level == 5 || $access_level == 6){ /** если пользователь управления филиала **/
					$this->load->model('Personal');
					$arr_result_e = $this->model->personal->getPersonal_Filter_E($params);
					$arr_result_t = $this->model->personal->getPersonal_Filter_T($params);
					$arr_result_g = $this->model->personal->getPersonal_Filter_G($params);
					$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);			
				
				}elseif(strlen($id_user) > 0 && $access_level == 1){  /** если пользователь инспектор **/
					$this->load->model('Personal');
					if($podrazdelenie == 1){
						$arr_result = $this->model->personal->getPersonal_Filter_TInsp($params, $id_user);
					}elseif($podrazdelenie == 2){
						$arr_result = $this->model->personal->getPersonal_Filter_GInsp($params, $id_user);
					}elseif($podrazdelenie == 3){
						$arr_result = $this->model->personal->getPersonal_Filter_EInsp($params, $id_user);
					}
				}elseif(strlen($spr_cod_otd) > 0 && $access_level == 2){
					$this->load->model('Personal');
					$arr_result_e = $this->model->personal->getPersonal_Filter_EGroup($params, $spr_cod_otd);
					$arr_result_t = $this->model->personal->getPersonal_Filter_TGroup($params, $spr_cod_otd);
					$arr_result_g = $this->model->personal->getPersonal_Filter_GGroup($params, $spr_cod_otd);
					$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);				
				}elseif(strlen($spr_cod_podrazd) > 0 && $access_level == 3){
					$this->load->model('Personal');
					$arr_result_e = $this->model->personal->getPersonal_Filter_EMro($params, $spr_cod_podrazd);
					$arr_result_t = $this->model->personal->getPersonal_Filter_TMro($params, $spr_cod_podrazd);
					$arr_result_g = $this->model->personal->getPersonal_Filter_GMro($params, $spr_cod_podrazd);
					$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);						
				}elseif(strlen($spr_cod_branch) > 0 && $access_level == 4){
					$this->load->model('Personal');
					$arr_result_e = $this->model->personal->getPersonal_Filter_EBranch($params, $spr_cod_branch);
					$arr_result_t = $this->model->personal->getPersonal_Filter_TBranch($params, $spr_cod_branch);
					$arr_result_g = $this->model->personal->getPersonal_Filter_GBranch($params, $spr_cod_branch);
					$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);						
				}
		
		
	//	$arr_result = $this->data['personal'] = $this->model->personal->getSubjectsByMainPage($params);

		
		if(count($arr_result) > 0){
			$str_result = '';
			$this->load->model('Report');
			$this->model->report->filter_letter_list($arr_result,$params);

		}else{

		}
	  

	 echo 'personal.xls';
	}
/*****************************************************************************************************************/

	public function report_unp_filter()
    {
		$params = $this->request->post;

		$this->load->model('Unp');
		$arr_result = $this->data['unp'] = $this->model->unp->getUnpByMainPage($params);

		
		if(count($arr_result) > 0){
			$str_result = '';
			$this->load->model('Report');
			$this->model->report->filter_unp_list($arr_result,$params);

		}else{

		}
	  

	 echo 'unp.xls';
	}


/*****************************************************************************************************************/

	public function report_indpers_filter()
    {
		$params = $this->request->post;

		$this->load->model('Individual_persons');
		$arr_result = $this->data['indpers'] = $this->model->individual_persons->getIndPersByMainPage($params);

		
		if(count($arr_result) > 0){
			$str_result = '';
			$this->load->model('Report');
			$this->model->report->filter_indpers_list($arr_result,$params);

		}else{

		}
	  

	 echo 'indpers.xls';
	}

/********************************************** письмо о несоблюдении сроков *******************************************************************/
	public function letter_srok()
    {
		$params = $this->request->post;
		//print_r($params);
		
		$this->load->model('Personal');
		$arr_result = $this->data['test_srok'] = $this->model->personal->getLetterBySrok($params);

		
		if(count($arr_result) > 0){
			$str_result = '';
			$this->load->model('Report');
			$this->model->report->letter_srok($arr_result,$params);
		}else{

		}
	  

	 echo 'srok.xls';
	}






	
}