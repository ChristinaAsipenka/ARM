<?php

namespace Basis\Controller;

use Basis\Controller\AddressController;
use Basis\Controller\LogController;
use Admin\Controller\AdminController;

class InformationController extends AdminController
{
	public function info()
    {
 
        $this->view->render('information/info', $this->data);
    }

	public function docs()
    {
 
        $this->view->render('information/docs', $this->data);
    }
   
}