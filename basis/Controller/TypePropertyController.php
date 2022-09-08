<?php

namespace Basis\Controller;

use Admin\Controller\AdminController;

class TypePropertyController extends AdminController
{
    public function listing()
    {
        $this->load->model('TypeProperty');

        $this->data['typeProperty'] = $this->model->typeProperty->getTypeProperty();

        $this->view->render('typeProperty/list', $this->data);
    }

   /* public function create()
    {
        $this->view->render('region/create');
    }*/

   /* public function edit($id)
    {
        $this->load->model('Region');

        $this->data['region'] = $this->model->region->getRegionData($id);

        $this->view->render('region/edit', $this->data);
    }*/

    /*public function add()
    {
        $this->load->model('Region');

        $params = $this->request->region;

        if (isset($params['region'])) {
            $regionId = $this->model->region->createRegion($params);
            echo $regionId;
        }
    }*/

  /*  public function update()
    {
        $this->load->model('Region');

        $params = $this->request->region;

        if (isset($params['region'])) {
            $regionId = $this->model->region->updateRegion($params);
            echo $regionId;
        }
    }*/
/********* Ф-ции формирования SELECTов **************/	
	public function SelectDepartment()
	{
		$strDepartment = "<option value='0'>Выберите ведомственную принадлежность</option>";
		$params = $this->request->post;
		
		$idTypeProperty = $params['idTypeProperty'];
		
		$this->load->model('Department');	
		$departments = $this->model->department->getDepartmentByTypeProperty($idTypeProperty);
		
		foreach($departments as $department){	
			$strDepartment .= "<option value='$department[id]'>$department[name_ved]</option>";
		};
		
		echo $strDepartment;	
	}
	
	
}