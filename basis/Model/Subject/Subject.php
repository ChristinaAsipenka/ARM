<?php

namespace Basis\Model\Subject;

use Engine\Core\Database\ActiveRecord;

class subject
{
    use ActiveRecord;

    protected $table = 'reestr_subject';

    public $id;
    public $name;
	public $id_unp;
	public $id_unp_head;
	public $id_ind_pers;
	//public $name_up_energo;
	public $type_property;
	public $type_department;
	public $place_address_index;
	public $place_address_region;
	public $place_address_district ;
	public $place_address_city;
	public $place_address_city_zone;
	public $place_address_street;
	public $place_address_street_type;
	public $place_address_city_type;
	public $place_address_building;
	public $place_address_flat ;
	public $post_address_index;
	public $post_address_region;
	public $post_address_district ;
	public $post_address_city;
	public $post_address_city_zone;
	public $post_address_street;
	public $post_address_street_type;
	public $post_address_city_type;
	public $post_address_building;
	public $post_address_flat;
	
	public $fname_address_region;
	public $fname_address_district ;
	public $fname_address_city;
	
	public $custom_name;
	
	/*public $supply_name;
	public $supply_dog_num;
	public $supply_dog_date;
	
	public $supply_name_t;
	public $supply_dog_num_t;
	public $supply_dog_date_t;*/
	
	public $type_activity;
	public $shift_work;
	public $ruk_firstname;
	public $ruk_secondname;
	public $ruk_lastname;
	public $ruk_tel;
	public $gi_firstname;
	public $gi_secondname;
	public $gi_lastname;
	public $gi_tel;
	public $ge_firstname;
	public $ge_secondname;
	public $ge_lastname;
	public $ge_tel;
	public $otv_e;
	public $otv_t;
	public $otv_g;
	public $num_case_s;
	public $copy_postaddress;
	public $spr_branch;
	public $spr_podrazdelenie;
	public $spr_otdel;
	
	public $otv_type_e;
	public $otv_e1;
	public $otv_e2;
	public $otv_e3;
	public $order_num_e1;
	public $order_num_e2;
	public $order_num_e3;
	public $order_data_e1;
	public $order_data_e2;
	public $order_data_e3;
	public $dog_data_cont_e3;	
	public $dog_num_e3;
	public $dog_data_e3;
	public $ins_data_e;

	public $otv_type_t;
	public $otv_t1;
	public $otv_t2;
	public $otv_t3;
	public $order_num_t1;
	public $order_data_t1;
	public $order_num_t2;
	public $order_data_t2;
	public $order_num_t3;
	public $order_data_t3;	
	public $dog_num_t3;
	public $dog_data_t3;
	public $dog_data_cont_t3;
	public $ins_data_t;
	
	public $otv_type_g;
	public $otv_g1;
	public $order_num_g1;
	public $order_data_g1;
	public $dog_num_g1;
	public $dog_data_g1;
	
	public $create_date;
	public $create_user;
	
	public $sbj_note;
	public $email;
	
/////////////////////////////////////////
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
/////////////////////////////////////////
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = trim($name);
    }
/////////////////////////////////////////
    public function getId_unp()
    {
        return $this->id_unp;
    }
    public function setId_unp($id_unp)
    {
        $this->id_unp = $id_unp;
    }
   
   public function getId_ind_pers()
    {
        return $this->id_ind_pers;
    }
    public function setId_ind_pers($id_ind_pers)
    {
        $this->id_ind_pers = $id_ind_pers;
    }	
	/////////////////////////////////////////
    public function getId_unpHead()
    {
        return $this->id_unp_head;
    }
    public function setId_unpHead($id_unp_head)
    {
        $this->id_unp_head = $id_unp_head;
    }
/////////////////////////////////////////
    public function getType_property()
    {
        return $this->type_property;
    }
    public function setType_property($type_property)
    {
        $this->type_property = $type_property;
    }
/////////////////////////////////////////
    public function getType_department()
    {
        return $this->type_department;
    }
    public function setType_department($type_department)
    {
        $this->type_department = $type_department;
    }	
 /////////////////////////////////////////
    public function getPlace_address_index()
    {
        return $this->place_address_index;
    }
    public function setPlace_address_index($place_address_index)
    {
        $this->place_address_index = $place_address_index;
    }
 /////////////////////////////////////////
    public function getPlace_address_region()
    {
        return $this->place_address_region;
    }
    public function setPlace_address_region($place_address_region)
    {
        $this->place_address_region = $place_address_region;
    }	
 /////////////////////////////////////////
    public function getPlace_address_district()
    {
        return $this->place_address_district;
    }
    public function setPlace_address_district($place_address_district)
    {
        $this->place_address_district = $place_address_district;
    }	
 /////////////////////////////////////////
    public function getPlace_address_city()
    {
        return $this->place_address_city;
    }
    public function setPlace_address_city($place_address_city)
    {
        $this->place_address_city = $place_address_city;
    }	
 /////////////////////////////////////////
    public function getPlace_address_city_zone()
    {
        return $this->place_address_city_zone;
    }
    public function setPlace_address_city_zone($place_address_city_zone)
    {
        $this->place_address_city_zone = $place_address_city_zone;
    }	
 /////////////////////////////////////////
    public function getPlace_address_street()
    {
        return $this->place_address_street;
    }
    public function setPlace_address_street($place_address_street)
    {
        $this->place_address_street = $place_address_street;
    }
 /////////////////////////////////////////
    public function getPlace_address_street_type()
    {
        return $this->place_address_street_type;
    }
    public function setPlace_address_street_type($place_address_street_type)
    {
        $this->place_address_street_type = $place_address_street_type;
    }
 /////////////////////////////////////////
    public function getPlace_address_city_type()
    {
        return $this->place_address_city_type;
    }
    public function setPlace_address_city_type($place_address_city_type)
    {
        $this->place_address_city_type = $place_address_city_type;
    }	
 /////////////////////////////////////////
    public function getPlace_address_building()
    {
        return $this->place_address_building;
    }
    public function setPlace_address_building($place_address_building)
    {
        $this->place_address_building = $place_address_building;
    }		
 /////////////////////////////////////////
    public function getPlace_address_flat()
    {
        return $this->place_address_flat;
    }
    public function setPlace_address_flat($place_address_flat)
    {
        $this->place_address_flat = $place_address_flat;
    }	
 /////////////////////////////////////////
    public function getPost_address_index()
    {
        return $this->post_address_index;
    }
    public function setPost_address_index($post_address_index)
    {
        $this->post_address_index = $post_address_index;
    }
 /////////////////////////////////////////
    public function getPost_address_region()
    {
        return $this->post_address_region;
    }
    public function setPost_address_region($post_address_region)
    {
        $this->post_address_region = $post_address_region;
    }	
 /////////////////////////////////////////
    public function getPost_address_district()
    {
        return $this->post_address_district;
    }
    public function setPost_address_district($post_address_district)
    {
        $this->post_address_district = $post_address_district;
    }	
 /////////////////////////////////////////
    public function getPost_address_city()
    {
        return $this->post_address_city;
    }
    public function setPost_address_city($post_address_city)
    {
        $this->post_address_city = $post_address_city;
    }	
 /////////////////////////////////////////
    public function getPost_address_city_zone()
    {
        return $this->post_address_city_zone;
    }
    public function setPost_address_city_zone($post_address_city_zone)
    {
        $this->post_address_city_zone = $post_address_city_zone;
    }	
 /////////////////////////////////////////
    public function getPost_address_street()
    {
        return $this->post_address_street;
    }
    public function setPost_address_street($post_address_street)
    {
        $this->post_address_street = $post_address_street;
    }
 /////////////////////////////////////////
    public function getPost_address_street_type()
    {
        return $this->post_address_street_type;
    }
    public function setPost_address_street_type($post_address_street_type)
    {
        $this->post_address_street_type = $post_address_street_type;
    }
 /////////////////////////////////////////
    public function getPost_address_city_type()
    {
        return $this->post_address_city_type;
    }
    public function setPost_address_city_type($post_address_city_type)
    {
        $this->post_address_city_type = $post_address_city_type;
    }	
 /////////////////////////////////////////
    public function getPost_address_building()
    {
        return $this->post_address_building;
    }
    public function setPost_address_building($post_address_building)
    {
        $this->post_address_building = $post_address_building;
    }		
 /////////////////////////////////////////
    public function getPost_address_flat()
    {
        return $this->post_address_flat;
    }
    public function setPost_address_flat($post_address_flat)
    {
        $this->post_address_flat = $post_address_flat;
    }		
	
	 /////////////////////////////////////////
    public function getFname_address_region()
    {
        return $this->fname_address_region;
    }
    public function setFname_address_region($fname_address_region)
    {
        $this->fname_address_region = $fname_address_region;
    }	
 /////////////////////////////////////////
    public function getFname_address_district()
    {
        return $this->fname_address_district;
    }
    public function setFname_address_district($fname_address_district)
    {
        $this->fname_address_district = $fname_address_district;
    }	
 /////////////////////////////////////////
    public function getFname_address_city()
    {
        return $this->fname_address_city;
    }
    public function setFname_address_city($fname_address_city)
    {
        $this->fname_address_city = $fname_address_city;
	}
 /////////////////////////////////////////
   /* public function getSupply_name()
    {
        return $this->supply_name;
    }
    public function setSupply_name($supply_name)
    {
        $this->supply_name = $supply_name;
    }	
 /////////////////////////////////////////
    public function getSupply_dog_num()
    {
        return $this->supply_dog_num;
    }
    public function setSupply_dog_num($supply_dog_num)
    {
        $this->supply_dog_num = $supply_dog_num;
    }	
 /////////////////////////////////////////
    public function getSupply_dog_date()
    {
        return $this->supply_dog_date;
    }
    public function setSupply_dog_date($supply_dog_date)
    {
        $this->supply_dog_date = $supply_dog_date==NULL ? NULL : $supply_dog_date;
    }
	
 /////////////////////////////////////////
    public function getSupply_name_t()
    {
        return $this->supply_name_t;
    }
    public function setSupply_name_t($supply_name_t)
    {
        $this->supply_name_t = $supply_name_t;
    }	
 /////////////////////////////////////////
    public function getSupply_dog_num_t()
    {
        return $this->supply_dog_num_t;
    }
    public function setSupply_dog_num_t($supply_dog_num_t)
    {
        $this->supply_dog_num_t = $supply_dog_num_t;
    }	
 /////////////////////////////////////////
    public function getSupply_dog_date_t()
    {
        return $this->supply_dog_date_t;
    }
    public function setSupply_dog_date_t($supply_dog_date_t)
    {
        $this->supply_dog_date_t = $supply_dog_date_t==NULL ? NULL : $supply_dog_date_t;
    }	*/
 /////////////////////////////////////////
    public function getType_activity()
    {
        return $this->type_activity;
    }
    public function setType_activity($type_activity)
    {
        $this->type_activity = $type_activity;
    }	
 /////////////////////////////////////////
    public function getShift_work()
    {
        return $this->shift_work;
    }
    public function setShift_work($shift_work)
    {
        $this->shift_work = $shift_work;
    }	
 /////////////////////////////////////////
    public function getRuk_firstname()
    {
        return $this->ruk_firstname;
    }
    public function setRuk_firstname($ruk_firstname)
    {
        $this->ruk_firstname = $ruk_firstname;
    }	
 /////////////////////////////////////////
    public function getRuk_secondname()
    {
        return $this->ruk_secondname;
    }
    public function setRuk_secondname($ruk_secondname)
    {
        $this->ruk_secondname = $ruk_secondname;
    }	
 /////////////////////////////////////////
    public function getRuk_lastname()
    {
        return $this->ruk_lastname;
    }
    public function setRuk_lastname($ruk_lastname)
    {
        $this->ruk_lastname = $ruk_lastname;
    }		
 /////////////////////////////////////////
    public function getRuk_tel()
    {
        return $this->ruk_tel;
    }
    public function setRuk_tel($ruk_tel)
    {
        $this->ruk_tel = $ruk_tel;
    }		
 /////////////////////////////////////////
    public function getGi_firstname()
    {
        return $this->gi_firstname;
    }
    public function setGi_firstname($gi_firstname)
    {
        $this->gi_firstname = $gi_firstname;
    }	
 /////////////////////////////////////////
    public function getGi_secondname()
    {
        return $this->gi_secondname;
    }
    public function setGi_secondname($gi_secondname)
    {
        $this->gi_secondname = $gi_secondname;
    }	
 /////////////////////////////////////////
    public function getGi_lastname()
    {
        return $this->gi_lastname;
    }
    public function setGi_lastname($gi_lastname)
    {
        $this->gi_lastname = $gi_lastname;
    }		
 /////////////////////////////////////////
    public function getGi_tel()
    {
        return $this->gi_tel;
    }
    public function setGi_tel($gi_tel)
    {
        $this->gi_tel = $gi_tel;
    }			
	 /////////////////////////////////////////
    public function getGe_firstname()
    {
        return $this->ge_firstname;
    }
    public function setGe_firstname($ge_firstname)
    {
        $this->ge_firstname = $ge_firstname;
    }	
 /////////////////////////////////////////
    public function getGe_secondname()
    {
        return $this->ge_secondname;
    }
    public function setGe_secondname($ge_secondname)
    {
        $this->ge_secondname = $ge_secondname;
    }	
 /////////////////////////////////////////
    public function getGe_lastname()
    {
        return $this->ge_lastname;
    }
    public function setGe_lastname($ge_lastname)
    {
        $this->ge_lastname = $ge_lastname;
    }		
 /////////////////////////////////////////
    public function getGe_tel()
    {
        return $this->ge_tel;
    }
    public function setGe_tel($ge_tel)
    {
        $this->ge_tel = $ge_tel;
    }
 /////////////////////////////////////////
    public function getOtv_e()
    {
        return $this->otv_e;
    }
    public function setOtv_e($otv_e)
    {
        $this->otv_e = $otv_e;
    }		
 /////////////////////////////////////////
    public function getOtv_t()
    {
        return $this->otv_t;
    }
    public function setOtv_t($otv_t)
    {
        $this->otv_t = $otv_t;
    }	
 /////////////////////////////////////////
    public function getOtv_g()
    {
        return $this->otv_g;
    }
    public function setOtv_g($otv_g)
    {
        $this->otv_g = $otv_g;
    }	
 /////////////////////////////////////////
    public function getNum_case_s()
    {
        return $this->num_case_s;
    }
    public function setNum_case_s($num_case_s)
    {
        $this->num_case_s = $num_case_s;
    }		
/////////////////////////////////////////
    public function getCopy_postaddress()
    {
        return $this->copy_postaddress;
    }
    public function setCopy_postaddress($copy_postaddress)
    {
        $this->copy_postaddress = $copy_postaddress;
    }	
	
	/////////////////////////////////////////
	public function getSpr_branch()
	{
		return $this->spr_branch;
	}
	public function setSpr_branch($spr_branch)
	{
		$this->spr_branch = $spr_branch;
	}
/////////////////////////////////////////
	public function getSpr_podrazdelenie()
	{
		return $this->spr_podrazdelenie;
	}
	public function setSpr_podrazdelenie($spr_podrazdelenie)
	{
		$this->spr_podrazdelenie = $spr_podrazdelenie;
	}
/////////////////////////////////////////
	public function getSpr_otdel()
	{
		return $this->spr_otdel;
	}
	public function setSpr_otdel($spr_otdel)
	{
		$this->spr_otdel = $spr_otdel;
	}
/////////////////////////////////////////
	public function getOtv_type_e()
	{
		return $this->otv_type_e;
	}
	public function setOtv_type_e($otv_type_e)
	{
		$this->otv_type_e = $otv_type_e;
	}	
/////////////////////////////////////////
	public function getOtv_e1()
	{
		return $this->otv_e1;
	}
	public function setOtv_e1($otv_e1)
	{
		$this->otv_e1 = $otv_e1;
	}
/////////////////////////////////////////
	public function getOtv_e2()
	{
		return $this->otv_e2;
	}
	public function setOtv_e2($otv_e2)
	{
		$this->otv_e2 = $otv_e2;
	}
/////////////////////////////////////////
	public function getOtv_e3()
	{
		return $this->otv_e3;
	}
	public function setOtv_e3($otv_e3)
	{
		$this->otv_e3 = $otv_e3;
	}	
/////////////////////////////////////////
	public function getOrder_num_e1()
	{
		return $this->order_num_e1;
	}
	public function setOrder_num_e1($order_num_e1)
	{
		$this->order_num_e1 = $order_num_e1;
	}
/////////////////////////////////////////
	public function getOrder_num_e2()
	{
		return $this->order_num_e2;
	}
	public function setOrder_num_e2($order_num_e2)
	{
		$this->order_num_e2 = $order_num_e2;
	}
/////////////////////////////////////////
	public function getOrder_num_e3()
	{
		return $this->order_num_e3;
	}
	public function setOrder_num_e3($order_num_e3)
	{
		$this->order_num_e3 = $order_num_e3;
	}	
/////////////////////////////////////////
	public function getOrder_data_e1()
	{
		return $this->order_data_e1;
	}
	public function setOrder_data_e1($order_data_e1)
	{
		$this->order_data_e1 = $order_data_e1;
	}
/////////////////////////////////////////
	public function getOrder_data_e2()
	{
		return $this->order_data_e2;
	}
	public function setOrder_data_e2($order_data_e2)
	{
		$this->order_data_e2 = $order_data_e2;
	}
/////////////////////////////////////////
	public function getOrder_data_e3()
	{
		return $this->order_data_e3;
	}
	public function setOrder_data_e3($order_data_e3)
	{
		$this->order_data_e3 = $order_data_e3;
	}
/////////////////////////////////////////
	public function getDog_data_cont_e3()
	{
		return $this->dog_data_cont_e3;
	}
	public function setDog_data_cont_e3($dog_data_cont_e3)
	{
		$this->dog_data_cont_e3 = $dog_data_cont_e3;
	}	
/////////////////////////////////////////
	public function getDog_num_e3()
	{
		return $this->dog_num_e3;
	}
	public function setDog_num_e3($dog_num_e3)
	{
		$this->dog_num_e3 = $dog_num_e3;
	}
/////////////////////////////////////////
	public function getDog_data_e3()
	{
		return $this->dog_data_e3;
	}
	public function setDog_data_e3($dog_data_e3)
	{
		$this->dog_data_e3 = $dog_data_e3;
	}
/////////////////////////////////////////
	public function getIns_data_e()
	{
		return $this->ins_data_e;
	}
	public function setIns_data_e($ins_data_e)
	{
		
		$this->ins_data_e = $ins_data_e;
	}		
/////////////////////////////////////////
	public function getOtv_type_t()
	{
		return $this->otv_type_t;
	}
	public function setOtv_type_t($otv_type_t)
	{
		$this->otv_type_t = $otv_type_t;
	}
/////////////////////////////////////////
	public function getOtv_t1()
	{
		return $this->otv_t1;
	}
	public function setOtv_t1($otv_t1)
	{
		$this->otv_t1 = $otv_t1;
	}
/////////////////////////////////////////
	public function getOtv_t2()
	{
		return $this->otv_t2;
	}
	public function setOtv_t2($otv_t2)
	{
		$this->otv_t2 = $otv_t2;
	}
/////////////////////////////////////////
	public function getOtv_t3()
	{
		return $this->otv_t3;
	}
	public function setOtv_t3($otv_t3)
	{
		$this->otv_t3 = $otv_t3;
	}	
/////////////////////////////////////////
	public function getOrder_num_t1()
	{
		return $this->order_num_t1;
	}
	public function setOrder_num_t1($order_num_t1)
	{
		$this->order_num_t1 = $order_num_t1;
	}
/////////////////////////////////////////
	public function getOrder_data_t1()
	{
		return $this->order_data_t1;
	}
	public function setOrder_data_t1($order_data_t1)
	{
		$this->order_data_t1 = $order_data_t1;
	}
/////////////////////////////////////////
	public function getOrder_num_t2()
	{
		return $this->order_num_t2;
	}
	public function setOrder_num_t2($order_num_t2)
	{
		$this->order_num_t2 = $order_num_t2;
	}
/////////////////////////////////////////
	public function getOrder_data_t2()
	{
		return $this->order_data_t2;
	}
	public function setOrder_data_t2($order_data_t2)
	{
		$this->order_data_t2 = $order_data_t2;
	}
/////////////////////////////////////////
	public function getOrder_num_t3()
	{
		return $this->order_num_t3;
	}
	public function setOrder_num_t3($order_num_t3)
	{
		$this->order_num_t3 = $order_num_t3;
	}
/////////////////////////////////////////
	public function getOrder_data_t3()
	{
		return $this->order_data_t3;
	}
	public function setOrder_data_t3($order_data_t3)
	{
		$this->order_data_t3 = $order_data_t3;
	}	
/////////////////////////////////////////
	public function getDog_num_t3()
	{
		return $this->dog_num_t3;
	}
	public function setDog_num_t3($dog_num_t3)
	{
		$this->dog_num_t3 = $dog_num_t3;
	}	
/////////////////////////////////////////
	public function getDog_data_cont_t3()
	{
		return $this->dog_data_cont_t3;
	}
	public function setDog_data_cont_t3($dog_data_cont_t3)
	{
		$this->dog_data_cont_t3 = $dog_data_cont_t3;
	}	
/////////////////////////////////////////
	public function getDog_data_t3()
	{
		return $this->dog_data_t3;
	}
	public function setDog_data_t3($dog_data_t3)
	{
		$this->dog_data_t3 = $dog_data_t3;
	}	
/////////////////////////////////////////
	public function getIns_data_t()
	{
		return $this->ins_data_t;
	}
	public function setIns_data_t($ins_data_t)
	{
		
		$this->ins_data_t = $ins_data_t;
	}	
	
/////////////////////////////////////////
	public function getOtv_type_g()
	{
		return $this->otv_type_g;
	}
	public function setOtv_type_g($otv_type_g)
	{
		$this->otv_type_g = $otv_type_g;
	}
/////////////////////////////////////////
	public function getOtv_g1()
	{
		return $this->otv_g1;
	}
	public function setOtv_g1($otv_g1)
	{
		$this->otv_g1 = $otv_g1;
	}
/////////////////////////////////////////
	public function getOrder_num_g1()
	{
		return $this->order_num_g1;
	}
	public function setOrder_num_g1($order_num_g1)
	{
		$this->order_num_g1 = $order_num_g1;
	}
/////////////////////////////////////////
	public function getOrder_data_g1()
	{
		return $this->order_data_g1;
	}
	public function setOrder_data_g1($order_data_g1)
	{
		$this->order_data_g1 = $order_data_g1;
	}
/////////////////////////////////////////
	public function getDog_num_g1()
	{
		return $this->dog_num_g1;
	}
	public function setDog_num_g1($dog_num_g1)
	{
		$this->dog_num_g1 = $dog_num_g1;
	}	
/////////////////////////////////////////
	public function getDog_data_g1()
	{
		return $this->dog_data_g1;
	}
	public function setDog_data_g1($dog_data_g1)
	{
		$this->dog_data_g1 = $dog_data_g1;
	}	
	
	
	////////////////////////////////////////		
	public function getCreate_date()
	{
		return $this->create_date;
	}
	public function setCreate_date()
	{
		$this->create_date = date('Y-m-d');
	}
									
	////////////////////////////////////////		
	public function getCreate_user()
	{
		return $this->create_user;
	}
	public function setCreate_user($create_user)
	{
		$this->create_user = $create_user;
	}
	
	////////////////////////////////////////		
	public function getCustom_name()
	{
		return $this->custom_name;
	}
	public function setCustom_name($custom_name)
	{
		$this->custom_name = $custom_name;
	}
	
	////////////////////////////////////////		
	public function getSbj_note()
	{
		return $this->sbj_note;
	}
	public function setSbj_note($sbj_note)
	{
		$this->sbj_note = $sbj_note;
	}
	////////////////////////////////////////		
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	
	
	
	
	
	
	
	
	
	
}