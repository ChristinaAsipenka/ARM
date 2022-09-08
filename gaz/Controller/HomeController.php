<?php

namespace Gaz\Controller;

use Engine\Controller;
use Admin\Controller\AdminController;

class HomeController extends Controller{
	
/////////////////////////////////////////////////
	public function index(){
		
		
		$this->load->language('dashboard/menu');
		
		$this->view->render('index');
		
	}
////////////////////////////////////////////////	
	public function news($id){
		
		echo $id;
		
	}
















	
}

?>