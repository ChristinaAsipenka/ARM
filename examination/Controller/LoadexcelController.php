<?php

namespace Examination\Controller;

use Admin\Controller\AdminController;


class LoadexcelController extends AdminController{
	
//////////////////////////////////////////////	
	public function MainForm(){
		
		$this->view->render('loadexcel/mainform', $this->data);
	}

	
}

?>