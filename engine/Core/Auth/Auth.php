<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie;

class Auth implements AuthInterface{
	
	protected $authorized = false;
	protected $hash_user;
////////////////////////////////////////////	
	public function authorized(){
		
		return $this->authorized;
		
	}
////////////////////////////////////////
	public function hashUser(){
		
		return Cookie::get('auth_hash');
		
	}	
////////////////////////////////////////
	public function authorize($user){
		
		
		Cookie::set('auth_hash', $user['hash']);
		Cookie::set('auth_authorized', true);
		Cookie::set('auth_login', $user['login']);
		Cookie::set('access_level', $user['access_level']);
		Cookie::set('inspection_type', $user['arm_gruppa']);
		Cookie::set('spr_cod_branch', $user['spr_cod_branch']);
		Cookie::set('spr_cod_otd', $user['spr_cod_otd']);
		Cookie::set('spr_cod_podrazd', $user['spr_cod_podrazd']);
		Cookie::set('podrazdelenie', $user['arm_gruppa']);
		Cookie::set('id_user', $user['id']);
		
		$this->authorized = true;
		$this->hash_user = $user;
		
	}
////////////////////////////////////////
	public function unAuthorize(){
		
		Cookie::delete('auth_authorized');
		Cookie::delete('auth_hash');
		Cookie::delete('auth_login');
		Cookie::delete('access_level');
		Cookie::delete('inspection_type');
		Cookie::delete('spr_cod_branch');
		Cookie::delete('spr_cod_otd');
		Cookie::delete('spr_cod_podrazd');
		Cookie::delete('podrazdelenie');
		Cookie::delete('id_user');
		
		/*$this->authorized = false;
		$this->user = null;*/
		
	}
////////////////////////////////////////
	public static function salt(){
		
		return (string) rand(10000000, 99999999);
		
	}	
///////////////////////////////////////
	public static function encryptPassword($password, $salt = ''){
		
		return hash('sha256', $password . $salt);
		
	}



	
	
}





?>