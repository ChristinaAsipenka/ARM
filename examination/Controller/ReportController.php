<?php

namespace Examination\Controller;

//use Admin\Controller\AddressController;
use Admin\Controller\AdminController;

class ReportController extends AdminController
{	
	
	public function report_zurnal_main_filter_e()
    {
		$params = $this->request->post;

		$this->load->model('Test_book_e');
		$arr_result = $this->data['test_book_e'] = $this->model->test_book_e->getZurnalByMainPage($params);

		
		if(count($arr_result) > 0){
			$str_result = '';
			$this->load->model('Report');
			$this->model->report->ZurnalByMainPage_e($arr_result,$params);

		}else{

		}
	  

	 echo 'protokol.xls';
	}


	public function report_zurnal_main_filter_t()
    {
		$params = $this->request->post;

		$this->load->model('Test_book_t');
		$arr_result = $this->data['test_book_t'] = $this->model->test_book_t->getZurnalByMainPage($params);

		
		if(count($arr_result) > 0){
			$str_result = '';
			$this->load->model('Report');
			$this->model->report->ZurnalByMainPage_t($arr_result,$params);

		}else{

		}
	  

	 echo 'protokol.xls';
	}


	public function report_zurnal_main_filter_g()
    {
		$params = $this->request->post;

		$this->load->model('Test_book_g');
		$arr_result = $this->data['test_book_g'] = $this->model->test_book_g->getZurnalByMainPage($params);

		
		if(count($arr_result) > 0){
			$str_result = '';
			$this->load->model('Report');
			$this->model->report->ZurnalByMainPage_g($arr_result,$params);

		}else{

		}
	  

	 echo 'protokol.xls';
	}







	
}