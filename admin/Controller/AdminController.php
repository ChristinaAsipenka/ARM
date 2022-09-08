<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use Engine\Helper\Cookie;
class AdminController extends Controller
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var array
     */
    public $data = [];

    /**
     * AdminController constructor.
     * @param \Engine\DI\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() == null) {
            header('Location: /ARM/admin/login/');
            exit;
        }
		$this->getUserData();
        // Load global language
        $this->load->language('dashboard/menu');
    }

    /**
     * Check Auth
     */
    public function checkAuthorization()
    {
		return $this->auth->hashUser();
    }

    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /ARM/admin/login/');
        exit;
    }
	
	public function getUserData()
	{
		//*** данные авторизированного пользователя
		$this->data['access_level'] = Cookie::get('access_level');
		
		$this->data['auth_login'] = Cookie::get('auth_login');
		
		$this->data['inspection_type'] = Cookie::get('inspection_type');
		
		$this->data['spr_cod_branch'] = Cookie::get('spr_cod_branch');
		
		$this->data['spr_cod_otd'] = Cookie::get('spr_cod_otd');
		
		$this->data['spr_cod_podrazd'] = Cookie::get('spr_cod_podrazd');
		
		$this->data['podrazdelenie'] = Cookie::get('podrazdelenie');
		
		$this->data['id_user'] = Cookie::get('id_user');
	}
}