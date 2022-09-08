<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;
use Engine\Core\Database\QueryBuilder;
use Engine\Helper\Cookie;

class LoginController extends Controller {

	protected $auth;




///////////////////////////////////////////////
	public function __construct(DI $di){
		
		parent::__construct($di);
		
		$this->auth = new Auth();
		
		
		if($this->auth->hashUser() !== null){
			
			header('Location: /ARM/admin/');
			exit;
			
		}
		
		
		
		
	}
//////////////////////////////////////////////	
	public function form(){
		
		$this->view->render('login');
		
	}

////////////////////////////////////////////
	public function preAuth(){
	
		$params = $this->request->post;
		//echo 'hello';
		//print_r($params);
		$queryBuilder = new QueryBuilder();
		
		$sql = $queryBuilder
				->select('id, filter_spr, fio, login')
				->from('users')
				->where('login', '%'.trim($params['referal']).'%', 'LIKE')
				->groupBy('login')
				->sql();
				
		$query = $this->db->query($sql, $queryBuilder->values);
		
		$stranswer = '';
		
		if(!empty($query)){
		
			foreach($query as $item){
				$stranswer	.='<li>'.$item["login"].'</li>';
			}
		}
		echo $stranswer;
	}
	
////////////////////////////////////////////
	public function authAdmin(){
		
		$params = $this->request->post;
		
		$queryBuilder = new QueryBuilder();
		
		$sql = $queryBuilder
				->select('users.id, users.filter_spr, users.fio, users.login, users.password, users.name, users.fam, users.otch, users.dolgnost, users.spr_cod_branch, users.spr_cod_otd, users.spr_cod_podrazd, users.podrazdelenie, users.photo, users.email, users.phone, users.mobile_phone, users.ip_phone, users.ip_phone_otd, users.rup_phone, users.branch_phone, users.is_spr, users.tab_num, users.date_reg, users.date_unreg, users.hash, rules.id_user, rules.admin, rules.spr_admin, rules.arm_prioritet, rules.arm_gruppa, rules.cod_branch, rules.inc_prioritet, rules.access_level')
				->from('users')
				->joinTable('rules', 'users.id=rules.id_user')
				->where('login', $params['login'])
				->where('password', $params['password'])
				->limit(1)
				->sql();
				
		
		/*echo $sql;*/
		$query = $this->db->query($sql, $queryBuilder->values);
		
		/*$query = $this->db->query('		
			SELECT users.id, users.filter_spr, users.fio, users.login, users.password, users.name, users.fam, users.otch, users.dolgnost, users.spr_cod_branch, users.spr_cod_otd, users.spr_cod_podrazd, users.podrazdelenie, users.photo, users.email, users.phone, users.mobile_phone, users.ip_phone, users.ip_phone_otd, users.rup_phone, users.branch_phone, users.is_spr, users.tab_num, users.date_reg, users.date_unreg, users.hash, rules.id_user, rules.admin, rules.spr_admin, rules.arm_prioritet, rules.arm_gruppa, rules.cod_branch, rules.inc_prioritet 
			FROM `users`
			JOIN `rules` ON users.id=rules.id_user
			WHERE login = "' . $params['login'] . '"
			AND password = "' . $params['password'] . '"
			LIMIT 1 
		');*/

		if(!empty($query)){
			

			$user = $query[0];
			
			//Cookie::set('auth_authorized', true);
			//Cookie::set('auth_user_name', $user['login']);
			
	
				if($user['id'] > 0){
					
					
					$hash = md5($user['id'] . $user['login'] . $user['password'] . $this->auth->salt());
				
					$sql = $queryBuilder
						->update('users')
						->set(['hash' => $hash])
						->where('id', $user['id'])
						->sql();
		
					$this->db->execute($sql, $queryBuilder->values);
					
					
					
					
					/*$this->db->execute('
						UPDATE `users`
						SET hash = "' . $hash . '"
						WHERE id=' . $user['id'] . '
					
					
					');*/
					/*echo $sql;*/
					
					$user['hash'] = $hash;
					$this->auth->authorize($user);
					
					header('Location: /ARM/admin/login/');
					exit;
					
					
					
				}
				header('Location: /ARM/admin/login/');
					exit;
		}
		
			echo 'Incoorect login or password';	
	}	
	
}

?>