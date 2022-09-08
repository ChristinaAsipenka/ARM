  <?php

namespace Cms\Controller;


class ErrorController extends CmsController{
	
//////////////////////////////////////////////	
	public function page404(){
		
		//echo '404 Page';
		header('Location: /ARM/404.php');
		
	}

	
}

?>