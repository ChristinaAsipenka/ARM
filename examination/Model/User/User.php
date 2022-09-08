<?php

namespace Examination\Model\User;

use Engine\Core\Database\ActiveRecord;

 class User
{
    use ActiveRecord;


    protected $table = 'users';


	public $id;
	public $filter_spr;
	public $fio;
	public $login;
	public $password;
	public $name;
	public $fam;
	public $otch;
	public $dolgnost;
	public $spr_cod_branch;
	public $spr_cod_otd;
	public $spr_cod_podrazd;
	public $podrazdelenie;
	public $photo;
	public $email;
	public $phone;
	public $mobile_phone;
	public $ip_phone;
	public $ip_phone_otd;
	public $rup_phone;
	public $branch_phone;
	public $is_spr;
	public $tab_num;
	public $date_reg;
	public $date_unreg;
	public $hash;
/*********************************************************/
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
/*********************************************************/	
    public function getFilter_spr()
    {
        return $this->filter_spr;
    }
    public function setFilter_spr($filter_spr)
    {
        $this->filter_spr = $filter_spr;
    }

/********************************************************/
    public function getFio()
    {
        return $this->fio;
    }
    public function setFio($fio)
    {
        $this->fio = $fio;
    }
/*******************************************************/
    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }
/*********************************************************/
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
/************************************************************/
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
/************************************************************/
    public function getFam()
    {
        return $this->fam;
    }
    public function setFam($fam)
    {
        $this->fam = $fam;
    }
/************************************************************/
    public function getOtch()
    {
        return $this->otch;
    }
    public function setOtch($otch)
    {
        $this->otch = $otch;
    }
/************************************************************/
    public function getDolgnost()
    {
        return $this->dolgnost;
    }
    public function setDolgnost($dolgnost)
    {
        $this->dolgnost = $dolgnost;
    }
/************************************************************/
    public function getSpr_cod_branch()
    {
        return $this->spr_cod_branch;
    }
    public function setSpr_cod_branch($spr_cod_branch)
    {
        $this->spr_cod_branch = $spr_cod_branch;
    }
/************************************************************/
    public function getSpr_cod_otd()
    {
        return $this->spr_cod_otd;
    }
    public function setSpr_cod_otd($spr_cod_otd)
    {
        $this->spr_cod_otd = $spr_cod_otd;
    }
/************************************************************/
    public function getSpr_cod_podrazd()
    {
        return $this->spr_cod_podrazd;
    }
    public function setSpr_cod_podrazd($spr_cod_podrazd)
    {
        $this->spr_cod_podrazd = $spr_cod_podrazd;
    }
/************************************************************/
    public function getPodrazdelenie()
    {
        return $this->podrazdelenie;
    }
    public function setPodrazdelenie($podrazdelenie)
    {
        $this->podrazdelenie = $podrazdelenie;
    }
/************************************************************/
    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
/************************************************************/
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
/************************************************************/
	public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
/************************************************************/
	public function getMobile_phone()
    {
        return $this->mobile_phone;
    }
    public function setMobile_phone($mobile_phone)
    {
        $this->mobile_phone = $mobile_phone;
    }
/************************************************************/
	public function getIp_phone()
    {
        return $this->ip_phone;
    }
    public function setIp_phone($ip_phone)
    {
        $this->ip_phone = $ip_phone;
    }
/************************************************************/
	public function getIp_phone_otd()
    {
        return $this->ip_phone_otd;
    }
    public function setIp_phone_otd($ip_phone_otd)
    {
        $this->ip_phone_otd = $ip_phone_otd;
    }
/************************************************************/
	public function getRup_phone()
    {
        return $this->rup_phone;
    }
    public function setRup_phone($rup_phone)
    {
        $this->rup_phone = $rup_phone;
    }
/************************************************************/
	public function getBranch_phone()
    {
        return $this->branch_phone;
    }
    public function setBranch_phone($branch_phone)
    {
        $this->branch_phone = $branch_phone;
    }
/************************************************************/
	public function getIs_spr()
    {
        return $this->is_spr;
    }
    public function setIs_spr($is_spr)
    {
        $this->is_spr = $is_spr;
    }
/************************************************************/
	public function getTab_num()
    {
        return $this->tab_num;
    }
    public function setTab_num($tab_num)
    {
        $this->tab_num = $tab_num;
    }
/************************************************************/
    public function getDateReg()
    {
        return $this->date_reg;
    }
    public function setDateReg($date_reg)
    {
        $this->date_reg = $date_reg;
    } 
/************************************************************/
    public function getDateunReg()
    {
        return $this->date_unreg;
    }
    public function setDateunReg($date_unreg)
    {
        $this->date_unreg = $date_unreg;
    } 
/************************************************************/
    public function getHash()
    {
        return $this->hash;
    }
    public function setHash($hash)
    {
        $this->hash = $hash;
    }
/**************************************************************/









 




} 