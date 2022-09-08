<?php namespace Basis\Controller;

use Admin\Controller\AdminController;

class RemoveController extends AdminController
{
public function removeItem()
    {

        $params = $this->request->post;

        $this->load->model('Unp');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->unp->removeItems($params['item_id']);
            echo $removeItem;
        }
    }
}
?>