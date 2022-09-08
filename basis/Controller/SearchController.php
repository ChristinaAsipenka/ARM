<?php

namespace Basis\Controller;

use Admin\Controller\AdminController;

class SearchController extends AdminController
{
    public function search()
    {


		$params = $this->request->post;
		$pre_result_name = [];

		$searchString = trim($params['searchString']);   // строка поиска
		$searchMode = trim($params['fullSearch']); 		//для строки-подсказки (0) или полный поиск (1)
		$searchData = trim($params['searchData']); 		// область поиска
		$sbobj = isset($params['sbobj']) ? trim($params['sbobj']) : 0; 		// для субабонентов (1) или источников(0)
		


		$preResult = '';
		$this->load->model('Search');
		/**** Поиск в реестре УНП ****/
		
		//print_r($searchData);
		if($searchData == 'unp'){
			
			$this->load->model('Unp');
			
			//$pre_result_unp = $this->model->unp->getUnpByParams($searchString, $params);

			if($searchMode == 1){
				$pre_result_unp = $this->model->unp->getUnpByParams($searchString, $params);
			}else if($searchMode == 0 || $searchMode == 2){
				$pre_result_unp = $this->model->unp->getUnpByParamsShort($searchString, $params);
			}

			
			if($searchMode == 1){
				$pre_result_name = $this->model->unp->getUnpByName($searchString, $params);
			}else if($searchMode == 0){
				$pre_result_name = $this->model->unp->getUnpByNameShort($searchString, $params);
			}	
			
	//print_r($pre_result_name);
				
			if(isset($pre_result_unp) or isset($pre_result_name)){
				
				if(count($pre_result_unp) > 0) {
			
					if($searchMode ==2){ // для проверки уникальности УНП при создании и редактировании
						$preResult = $this->model->search->pre_search_result_check($pre_result_unp, $preResult, 'unp');
					}else{
						$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_unp, $preResult, 'unp') : $this->model->search->full_search_result_unp($pre_result_unp, $preResult));
					}
					
				}
				if(count($pre_result_name) > 0) {
					
					$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_name, $preResult, 'reestr_unp_name') : $this->model->search->full_search_result_unp($pre_result_name, $preResult));
					
				}

			}
		}else if($searchData == 'subject'){
			
			
			
			$this->load->model('Subject');
			
			$pre_result_name = $this->model->subject->getSubjectByName($searchString);
			
		
			if(isset($pre_result_name)){
				
				if(count($pre_result_name) > 0) {
					
					$preResult .= ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_name, $preResult, 'reestr_subject_name') : $this->model->search->full_search_result_subject($pre_result_name, $preResult));
					
				}

			}
			
		}else if($searchData == 'object'){
					
			//echo $sbobj;
			$this->load->model('Subject');
			
			$pre_result_name = $this->model->subject->getSubjectByNameSource($searchString);
			
		
			if(isset($pre_result_name)){
			
				if(count($pre_result_name) > 0) {
					
					$preResult .= ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_name, $preResult, 'reestr_subject_name') : $this->model->search->full_search_result_subjectSource($pre_result_name, $preResult, $sbobj));
					
				}

			}
			
		}else if($searchData == 'personal'){
			
			$this->load->model('Unp');
			
			$pre_result_unp = $this->model->unp->getUnpByParams($searchString, $params);
			$pre_result_name = $this->model->unp->getUnpByName($searchString, $params);
			$pre_result_resp = $this->model->unp->getUnpByFirstName($searchString);


			
			if(isset($pre_result_unp)){
				
				if(count($pre_result_unp) > 0) {
						$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_unp, $preResult, 'unp') : $this->model->search->full_search_result_responsible_persons($pre_result_unp, $preResult));	
				}
			}
			if(isset($pre_result_resp)){			
				if(count($pre_result_resp) > 0) {
					$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_resp, $preResult, 'secondname') : $this->model->search->full_search_result_responsible_persons_secondname($pre_result_resp, $preResult));
				}
			}
//print_r($pre_result_resp);
//echo $preResult;				
			if(isset($pre_result_name)){
		
				if(count($pre_result_name) > 0) {
					$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_name, $preResult, 'reestr_unp_name') : $this->model->search->full_search_result_responsible_persons($pre_result_name, $preResult));
				}
			}
			


	
		}else if($searchData == 'personal_fio'){
			
			$this->load->model('personal');
			
			$pre_result_rp = $this->model->personal->getResponsible_by_params($searchString);

			
			if(isset($pre_result_rp)){
				
				if(count($pre_result_rp) > 0) {
						$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_rp, $preResult, 'rp_fio') : $this->model->search->full_search_result_responsible_persons($pre_result_rp, $preResult));	
				}
			} 
			
			


	
		}else if($searchData == 'ResrPersByUnp'){
			
			$this->load->model('Unp');
			
			$pre_result_unp = $this->model->unp->getRespByParams($searchString);
			$pre_result_name = $this->model->unp->getRespByName($searchString);
			

			if(isset($pre_result_unp) or isset($pre_result_name)){
				
				if(count($pre_result_unp) > 0) {
						$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_unp, $preResult, 'unp') : $this->model->search->full_search_result_otv($pre_result_unp, $preResult));	
				}

				if(count($pre_result_name) > 0) {
					$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_name, $preResult, 'reestr_unp_name') : $this->model->search->full_search_result_otv($pre_result_name, $preResult));
				}

			}
		}else if($searchData == 'individual_persons'){
		//print_r("Hello");
			$this->load->model('Individual_persons');
			
			$pre_result_ind_pers = $this->model->individual_persons->getIndPersByFirstName($searchString);
			

			
					if(isset($pre_result_ind_pers)){
		
							$preResult .= ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_ind_pers, $preResult, 'firstname') : $this->model->search->full_search_result_individual_persons($pre_result_ind_pers, $preResult));
					
					}
		}
		
		echo $preResult;

    }
	
	public function searchSubjectsUnp($id_unp)
    {
		$this->load->model('Unp');
		$pre_result_subjects = $this->model->unp->getSubjectByUnp($id_unp);
		return $pre_result_subjects;
	}
	

}