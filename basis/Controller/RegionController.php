<?php

namespace Basis\Controller;

use Admin\Controller\AdminController;

class RegionController extends AdminController
{
    public function listing()
    {
        $this->load->model('Region');

        $this->data['region'] = $this->model->region->getRegion();

        $this->view->render('region/list', $this->data);
    }

    public function create()
    {
        $this->view->render('region/create');
    }

    public function edit($id)
    {
        $this->load->model('Region');

        $this->data['region'] = $this->model->region->getRegionData($id);

        $this->view->render('region/edit', $this->data);
    }

    public function add()
    {
        $this->load->model('Region');

        $params = $this->request->region;

        if (isset($params['region'])) {
            $regionId = $this->model->region->createRegion($params);
            echo $regionId;
        }
    }

    public function update()
    {
        $this->load->model('Region');

        $params = $this->request->region;

        if (isset($params['region'])) {
            $regionId = $this->model->region->updateRegion($params);
            echo $regionId;
        }
    }
}