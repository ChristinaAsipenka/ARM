<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use Engine\Helper\Cookie;

class AccountController extends AdminController
{
    public function account()
    {
       

		$this->auth = new Auth();

      //  $this->data['pages'] = $this->model->page->getPages();
	  $this->data['user'] = Cookie::get('auth_user_name');

       	$this->view->render('account/account', $this->data);
    }

   /* public function create()
    {
        $this->view->render('pages/create');
    }

    public function edit($id)
    {
        $this->load->model('Page');

        $this->data['page'] = $this->model->page->getPageData($id);

        $this->view->render('pages/edit', $this->data);
    }

    public function add()
    {
        $this->load->model('Page');

        $params = $this->request->post;

        if (isset($params['title'])) {
            $pageId = $this->model->page->createPage($params);
            echo $pageId;
        }
    }

    public function update()
    {
        $this->load->model('Page');
//print_r($this->request);
        $params = $this->request->post;

        if (isset($params['title'])) {
            $pageId = $this->model->page->updatePage($params);
            echo $pageId;
        }
    }*/
}