<?php

namespace Examination\Controller;

use Admin\Controller\AdminController;


class ErrorController extends AdminController{
	
//////////////////////////////////////////////	
	public function page404(){
		
		//echo '404 Page';
		header('Location: /ARM/404.php');
	}

	
}

?>