<?php

namespace Examination\Controller;

use Admin\Controller\AdminController;

class SearchController extends AdminController
{
    public function search()
    {


		$params = $this->request->post;


		$searchString = trim($params['searchString']);   // строка поиска
		$searchMode = trim($params['fullSearch']); 		//для строки-подсказки (0) или полный поиск (1)
		$searchData = trim($params['searchData']); 		// область поиска
		$sbobj = isset($params['sbobj']) ? trim($params['sbobj']) : 0; 		// для субабонентов (1) или источников(0)
		


		$preResult = '';
		$this->load->model('Search');
		/**** Поиск в реестре УНП ****/
		
		//print_r($searchData);
	if($searchData == 'responsible_person_fio'){
			
			$this->load->model('responsible_persons');
			
			$pre_result_rp = $this->model->responsible_persons->getResponsible_by_params($searchString);

			
			if(isset($pre_result_rp)){
				
				if(count($pre_result_rp) > 0) {
						$preResult = ($searchMode ==0 ? $this->model->search->pre_search_result($pre_result_rp, $preResult, 'rp_fio') : $this->model->search->full_search_result_responsible_persons($pre_result_rp, $preResult));	
				}
			} 

		}else if($searchData == 'unp'){
			
			$this->load->model('Unp');
			
			$pre_result_unp = $this->model->unp->getUnpByParams($searchString);
			$pre_result_name = $this->model->unp->getUnpByName($searchString);
			
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
		}else if($searchData == 'userFioAndPosition'){
			
			$this->load->model('User');
			
			$pre_result_user = $this->model->user->getUsersForCommission($searchString);
			
			$preResult = $this->model->search->pre_search_result($pre_result_user, $preResult, 'fio');
			
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