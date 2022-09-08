<?php

namespace Basis\Controller;

use Basis\Controller\AddressController;
use Admin\Controller\AdminController;
use Engine\Helper\Cookie;

class TabsController extends AdminController
{	


    public function create()
    {			

	 $this->load->model('Tabs');

     $params = $this->request->post;
	 
		//print_r($params);


        if (isset($params['name_vkladka'])) {
            $tabId = $this->model->tabs->createTabs($params);
            echo $tabId;
        }
    }

	public function update()
    {
		$this->load->model('Tabs');

		$params = $this->request->post;
		if(isset($params['id'])){
		
			if (isset($params['id_uzel_block'])) {
				$this->model->tabs->updateTabs($params);
				
			}
		}
		echo $params['id'];
		
	}
	public function delete()
    {
	
		$params = $this->request->post;
		if (isset($params['tab_id']) && strlen($params['tab_id']) > 0) {
		
			$this->load->model('tabs');
			$this->model->tabs->removeItems($params['tab_id']);
			
			$this->load->model('obj_ot_teploobmennik_gvs');
			$this->model->obj_ot_teploobmennik_gvs->removeItemsByTab($params['tab_id']);
					
			$this->load->model('obj_ot_teploobmennik_so');
			$this->model->obj_ot_teploobmennik_so->removeItemsByTab($params['tab_id']);
			
			$this->load->model('obj_ot_prit_vent');
			$this->model->obj_ot_prit_vent->removeItemsByTab($params['tab_id']);
			
			$this->load->model('obj_ot_personal_tp');
			$this->model->obj_ot_personal_tp->removeItemsByTab($params['tab_id']);
			
			$this->load->model('obj_ot_personal_sar');
			$this->model->obj_ot_personal_sar->removeItemsByTab($params['tab_id']);
		}
	}
}