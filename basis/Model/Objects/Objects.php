<?php

namespace Basis\Model\Objects;

use Engine\Core\Database\ActiveRecord;

class objects
{
    use ActiveRecord;

    protected $table = 'reestr_object';

    public $id;
	public $id_reestr_subject;
	public $name;
	public $num_case_o;
	public $address_index;
	public $address_region;
	public $address_district;
	public $address_city;
	public $address_city_zone;
	public $address_street;
	public $address_street_type;
	public $address_city_type;
	public $address_building;
	public $address_flat;
	public $id_spr_admin;
	public $spr_branch;
	public $spr_podrazdelenie;
	public $spr_otdel;
	public $type_object;
	
	public $elektro_is;
	public $e_insp;
	public $e_district;
	public $e_subobj;
	public $e_subobj_subject;
	public $e_subobj_obj;
	public $e_subobj_power;
	public $e_armor;
	public $e_armor_crach;
	public $e_armor_tech;
	public $e_armor_time ;
	public $e_armor_date;
	public $e_cat_1;
	public $e_cat_1plus;
	public $e_cat_2;
	public $e_cat_3;
	public $e_flooding;
	//public $e_note;
	public $del_e;
	public $inactive_e;

	public $t_is;
	public $t_insp;
	public $t_armor;
	public $t_armor_crach;
	public $t_armor_crach_vapor;
	public $t_armor_tech;
	public $t_armor_tech_vapor;
	public $t_armor_time;
	public $t_armor_date;
	public $t_id_spr_ot_functions;
	public $t_id_spr_ot_cat;
	public $t_year;
	public $t_workload_heating;
	public $t_workload_gvs;
	public $t_workload_pov;
	public $t_workload_tech;
	public $t_workload_vapor;
	public $t_workload_percent;
	public $t_systemheat_place;
	public $t_systemheat_water;
	public $t_systemheat_dependent;
	public $t_systemheat_layout;
	public $t_systemheat_type_op;
	public $t_systemheat_mark_op;
	public $t_spr_id_ot_type_to;
	public $t_systemheat_mark_to;
	public $t_gvs_in;
	public $t_id_gvs_open;
	public $t_heat_source_own;
	public $del_t;
	public $t_count_itp;
	public $inactive_t;

	public $ti_is;
	public $ti_reestr;
	public $ti_name;
	public $ti_insp;
	public $ti_id_spr_ot_boiler_type;
	public $ti_year;
	public $ti_power;
	public $ti_dop_power;
	public $ti_id_spr_ot_type_fuel_1;
	public $ti_id_spr_ot_type_fuel_2;
	public $ti_out_power_ot;
	public $ti_out_power_gvs;
	public $ti_out_power_tech;
	public $ti_out_power_vent;
	public $del_ti;
	public $inactive_ti;
	
	public $gaz_is;
	public $g_date_initial_start;
	public $g_flue_naim_org_insp;
	public $g_flue_date_insp;
	public $g_flue_date_insp_next;
	public $g_insp;
	public $g_count_flat;
	public $g_count_entrance;
	public $g_count_p;
	public $g_count_v;
	public $g_count_o;
	public $g_id_spr_og_flue;
	public $g_id_spr_og_flue_mater;
	public $g_flue_size;
	public $g_id_spr_og_type_gaz;
	public $is_dom;
	public $g_flue_date_dog;
	public $g_flue_num_dog;
	public $g_flue_naim_org_dog;
	public $g_flue_date_to;
	public $g_flue_date_gto;
	public $g_flue_date_prto;	
	public $del_g;
	public $g_vid_dym_vstr;
	public $g_vid_dym_pr;
	public $g_vid_dym_koak;
	public $g_mat_dym;
	public $inactive_g;
	
	public $create_date;
	public $create_user;
	
	public $otv_type_g;
	public $otv_g1;
	public $otv_g2;
	public $otv_g3;
	public $order_num_g1;
	public $order_num_g2;
	public $order_num_g3;
	public $order_data_g1;
	public $order_data_g2;
	public $order_data_g3;
	public $dog_data_cont_g3;	
	public $dog_num_g3;
	public $dog_data_g3;
	public $ins_data_g;
///// ОСНОВНАЯ ИНФОРМАЦИЯ/////	
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
								public function getId_reestr_subject()
								{
									return $this->id_reestr_subject;
								}
								public function setId_reestr_subject($id_reestr_subject)
								{
									$this->id_reestr_subject = $id_reestr_subject;
								}
							/////////////////////////////////////////
								public function getName()
								{
									return $this->name;
								}
								public function setName($name)
								{
									$this->name = $name;
								}
							/////////////////////////////////////////
								public function getNum_case_o()
								{
									return $this->num_case_o;
								}
								public function setNum_case_o($num_case_o)
								{
									$this->num_case_o = $num_case_o;
								}	
							/////////////////////////////////////////
								public function getAddress_index()
								{
									return $this->address_index;
								}
								public function setAddress_index($address_index)
								{
									$this->address_index = $address_index;
								}
							 /////////////////////////////////////////
								public function getAddress_region()
								{
									return $this->address_region;
								}
								public function setAddress_region($address_region)
								{
									$this->address_region = $address_region;
								}	
							 /////////////////////////////////////////
								public function getAddress_district()
								{
									return $this->address_district;
								}
								public function setAddress_district($address_district)
								{
									$this->address_district = $address_district;
								}	
							 /////////////////////////////////////////
								public function getAddress_city()
								{
									return $this->address_city;
								}
								public function setAddress_city($address_city)
								{
									$this->address_city = $address_city;
								}	
							 /////////////////////////////////////////
								public function getAddress_city_zone()
								{
									return $this->address_city_zone;
								}
								public function setAddress_city_zone($address_city_zone)
								{
									$this->address_city_zone = $address_city_zone;
								}	
							 /////////////////////////////////////////
								public function getAddress_street()
								{
									return $this->address_street;
								}
								public function setAddress_street($address_street)
								{
									$this->address_street = $address_street;
								}
							 /////////////////////////////////////////
								public function getAddress_street_type()
								{
									return $this->address_street_type;
								}
								public function setAddress_street_type($address_street_type)
								{
								
									$this->address_street_type = $address_street_type;
								}
							 /////////////////////////////////////////
								public function getAddress_city_type()
								{
									return $this->address_city_type;
								}
								public function setAddress_city_type($address_city_type)
								{
									$this->address_city_type = $address_city_type;
								}								
							 /////////////////////////////////////////
								public function getAddress_building()
								{
									return $this->address_building;
								}
								public function setAddress_building($address_building)
								{
									$this->address_building = $address_building;
								}		
							 /////////////////////////////////////////
								public function getAddress_flat()
								{
									return $this->address_flat;
								}
								public function setAddress_flat($address_flat)
								{
									$this->address_flat = $address_flat;
								}
							 /////////////////////////////////////////
								public function getId_spr_admin()
								{
									return $this->id_spr_admin;
								}
								public function setId_spr_admin($id_spr_admin)
								{
									$this->id_spr_admin = $id_spr_admin;
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
								public function getType_object()
								{
									return $this->type_object;
								}
								public function setType_object($type_object)
								{
									$this->type_object = $type_object;
								}								
//////////    ЭЛЕКТРО  /////////
	/////////////////////////////////////////
		public function getElektro_is()
		{
			return $this->elektro_is;
		}
		public function setElektro_is($elektro_is)
		{
			$this->elektro_is = $elektro_is;
		}
	/////////////////////////////////////////
		public function getE_insp()
		{
			return $this->e_insp;
		}
		public function setE_insp($e_insp)
		{
			$this->e_insp = $e_insp;
		}
		/////////////////////////////////////////
		public function getE_district()
		{
			return $this->e_district;
		}
		public function setE_district($e_district)
		{
			$this->e_district = $e_district;
		}
		/////////////////////////////////////////
		public function getE_subobj()
		{
			return $this->e_subobj;
		}
		public function setE_subobj($e_subobj)
		{
			$this->e_subobj = $e_subobj;
		}
		/////////////////////////////////////////
		public function getE_subobj_subject()
		{
			return $this->e_subobj_subject;
		}
		public function setE_subobj_subject($e_subobj_subject)
		{
			$this->e_subobj_subject = $e_subobj_subject;
		}
		/////////////////////////////////////////
		public function getE_subobj_obj()
		{
			return $this->e_subobj_obj;
		}
		public function setE_subobj_obj($e_subobj_obj)
		{
			$this->e_subobj_obj = $e_subobj_obj;
		}
		/////////////////////////////////////////
		public function getE_subobj_power()
		{
			return $this->e_subobj_power;
		}
		public function setE_subobj_power($e_subobj_power)
		{
			$this->e_subobj_power = $e_subobj_power;
		}
		/////////////////////////////////////////
		public function getE_armor()
		{
			return $this->e_armor;
		}
		public function setE_armor($e_armor)
		{
			$this->e_armor = $e_armor;
		}
		/////////////////////////////////////////
		public function getE_armor_crach()
		{
			return $this->e_armor_crach;
		}
		public function setE_armor_crach($e_armor_crach)
		{
			$this->e_armor_crach = $e_armor_crach;
		}
		/////////////////////////////////////////
		public function getE_armor_tech()
		{
			return $this->e_armor_tech;
		}
		public function setE_armor_tech($e_armor_tech)
		{
			$this->e_armor_tech = $e_armor_tech;
		}
		/////////////////////////////////////////
		public function getE_armor_time()
		{
			return $this->e_armor_time;
		}
		public function setE_armor_time($e_armor_time)
		{
			$this->e_armor_time = $e_armor_time;
		}
		/////////////////////////////////////////
		public function getE_armor_date()
		{
			return $this->e_armor_date;
		}
		public function setE_armor_date($e_armor_date)
		{
			$this->e_armor_date = $e_armor_date;
		}
		/////////////////////////////////////////
		public function getE_cat_1()
		{
			return $this->e_cat_1;
		}
		public function setE_cat_1($e_cat_1)
		{
			$this->e_cat_1 = $e_cat_1;
		}
		/////////////////////////////////////////
		public function getE_cat_1plus()
		{
			return $this->e_cat_1plus;
		}
		public function setE_cat_1plus($e_cat_1plus)
		{
			$this->e_cat_1plus = $e_cat_1plus;
		}
		/////////////////////////////////////////
		public function getE_cat_2()
		{
			return $this->e_cat_2;
		}
		public function setE_cat_2($e_cat_2)
		{
			$this->e_cat_2 = $e_cat_2;
		}
		/////////////////////////////////////////
		public function getE_cat_3()
		{
			return $this->e_cat_3;
		}
		public function setE_cat_3($e_cat_3)
		{
			$this->e_cat_3 = $e_cat_3;
		}
		/////////////////////////////////////////
		public function getE_flooding()
		{
			return $this->e_flooding;
		}
		public function setE_flooding($e_flooding)
		{
			$this->e_flooding = $e_flooding;
		}
		/////////////////////////////////////////
		/*public function getE_note()
		{
			return $this->e_note;
		}
		public function setE_note($e_note)
		{
			$this->e_note= $e_note;
		}*/
		/////////////////////////////////////////
		public function getDel_e()
		{
			return $this->del_e;
		}
		public function setDel_e($del_e)
		{
			$this->del_e = $del_e;
		}
		/////////////////////////////////////////		
		public function getInactive_e()
		{
			return $this->inactive_e;
		}
		public function setInactive_e($inactive_e)
		{
			$this->inactive_e = $inactive_e;
		}		
//////////    ТЕПЛО    /////////
							  /////////////////////////////////////////
								public function getT_insp()
								{
									return $this->t_insp;
								}
								public function setT_insp($t_insp)
								{
									$this->t_insp = $t_insp;
								}
							  /////////////////////////////////////////
								public function getT_is()
								{
									return $this->t_is;
								}
								public function setT_is($t_is)
								{
									$this->t_is = $t_is;
								}								
							  /////////////////////////////////////////
								public function getT_armor()
								{
									return $this->t_armor;
								}
								public function setT_armor($t_armor)
								{
									$this->t_armor = $t_armor;
								}
							  /////////////////////////////////////////
								public function getT_armor_crach()
								{
									return $this->t_armor_crach;
								}
								public function setT_armor_crach($t_armor_crach)
								{
									$this->t_armor_crach = $t_armor_crach;
								}
							  /////////////////////////////////////////
								public function getT_armor_crach_vapor()
								{
									return $this->t_armor_crach_vapor;
								}
								public function setT_armor_crach_vapor($t_armor_crach_vapor)
								{
									$this->t_armor_crach_vapor = $t_armor_crach_vapor;
								}
							  /////////////////////////////////////////
								public function getT_armor_tech()
								{
									return $this->t_armor_tech;
								}
								public function setT_armor_tech($t_armor_tech)
								{
									$this->t_armor_tech = $t_armor_tech;
								}
							  /////////////////////////////////////////
								public function getT_armor_tech_vapor()
								{
									return $this->t_armor_tech_vapor;
								}
								public function setT_armor_tech_vapor($t_armor_tech_vapor)
								{
									$this->t_armor_tech_vapor = $t_armor_tech_vapor;
								}
							  /////////////////////////////////////////
								public function getT_armor_time()
								{
									return $this->t_armor_time;
								}
								public function setT_armor_time($t_armor_time)
								{
									$this->t_armor_time = $t_armor_time;
								}
							  /////////////////////////////////////////
								public function getT_armor_date()
								{
									return $this->t_armor_date;
								}
								public function setT_armor_date($t_armor_date)
								{
									$this->t_armor_date = $t_armor_date;
								}
							  /////////////////////////////////////////
								public function getT_id_spr_ot_functions()
								{
									return $this->t_id_spr_ot_functions;
								}
								public function setT_id_spr_ot_functions($t_id_spr_ot_functions)
								{
									$this->t_id_spr_ot_functions = $t_id_spr_ot_functions;
								}
							  /////////////////////////////////////////
								public function getT_id_spr_ot_cat()
								{
									return $this->t_id_spr_ot_cat;
								}
								public function setT_id_spr_ot_cat($t_id_spr_ot_cat)
								{
									$this->t_id_spr_ot_cat = $t_id_spr_ot_cat;
								}
							  /////////////////////////////////////////
								public function getT_id_gvs_open()
								{
									return $this->t_id_gvs_open;
								}
								public function setT_id_gvs_open($t_id_gvs_open)
								{
									$this->t_id_gvs_open = $t_id_gvs_open;
								}								
							  /////////////////////////////////////////
								public function getT_year()
								{
									return $this->t_year;
								}
								public function setT_year($t_year)
								{
									$this->t_year = $t_year;
								}
							  /////////////////////////////////////////
								public function getT_workload_heating()
								{
									return $this->t_workload_heating;
								}
								public function setT_workload_heating($t_workload_heating)
								{
									$this->t_workload_heating = $t_workload_heating;
								}
							  /////////////////////////////////////////
								public function getT_workload_gvs()
								{
									return $this->t_workload_gvs;
								}
								public function setT_workload_gvs($t_workload_gvs)
								{
									$this->t_workload_gvs = $t_workload_gvs;
								}
							  /////////////////////////////////////////
								public function getT_workload_pov()
								{
									return $this->t_workload_pov;
								}
								public function setT_workload_pov($t_workload_pov)
								{
									$this->t_workload_pov = $t_workload_pov;
								}
							  /////////////////////////////////////////
								public function getT_workload_tech()
								{
									return $this->t_workload_tech;
								}
								public function setT_workload_tech($t_workload_tech)
								{
									$this->t_workload_tech = $t_workload_tech;
								}
							  /////////////////////////////////////////
								public function getT_workload_vapor()
								{
									return $this->t_workload_vapor;
								}
								public function setT_workload_vapor($t_workload_vapor)
								{
									$this->t_workload_vapor = $t_workload_vapor;
								}	
							  /////////////////////////////////////////
								public function getT_workload_percent()
								{
									return $this->t_workload_percent;
								}
								public function setT_workload_percent($t_workload_percent)
								{
									$this->t_workload_percent = $t_workload_percent;
								}
							  /////////////////////////////////////////
								public function getT_systemheat_place()
								{
									return $this->t_systemheat_place;
								}
								public function setT_systemheat_place($t_systemheat_place)
								{
									$this->t_systemheat_place = $t_systemheat_place;
								}
							  /////////////////////////////////////////
								public function getT_systemheat_water()
								{
									return $this->t_systemheat_water;
								}
								public function setT_systemheat_water($t_systemheat_water)
								{
									$this->t_systemheat_water = $t_systemheat_water;
								}
							  /////////////////////////////////////////
								public function getT_systemheat_dependent()
								{
									return $this->t_systemheat_dependent;
								}
								public function setT_systemheat_dependent($t_systemheat_dependent)
								{
									$this->t_systemheat_dependent = $t_systemheat_dependent;
								}
							  /////////////////////////////////////////
								public function getT_systemheat_layout()
								{
									return $this->t_systemheat_layout;
								}
								public function setT_systemheat_layout($t_systemheat_layout)
								{
									$this->t_systemheat_layout = $t_systemheat_layout;
								}	
							  /////////////////////////////////////////
								public function getT_systemheat_type_op()
								{
									return $this->t_systemheat_type_op;
								}
								public function setT_systemheat_type_op($t_systemheat_type_op)
								{
									$this->t_systemheat_type_op = $t_systemheat_type_op;
								}	
							  /////////////////////////////////////////
								public function getT_systemheat_mark_op()
								{
									return $this->t_systemheat_mark_op;
								}
								public function setT_systemheat_mark_op($t_systemheat_mark_op)
								{
									$this->t_systemheat_mark_op = $t_systemheat_mark_op;
								}	
							  /////////////////////////////////////////
								public function getT_spr_id_ot_type_to()
								{
									return $this->t_spr_id_ot_type_to;
								}
								public function setT_spr_id_ot_type_to($t_spr_id_ot_type_to)
								{
									$this->t_spr_id_ot_type_to = $t_spr_id_ot_type_to;
								}
							  /////////////////////////////////////////
								public function getT_systemheat_mark_to()
								{
									return $this->t_systemheat_mark_to;
								}
								public function setT_systemheat_mark_to($t_systemheat_mark_to)
								{
									$this->t_systemheat_mark_to = $t_systemheat_mark_to;
								}
							  /////////////////////////////////////////
								public function getT_gvs_in()
								{
									return $this->t_gvs_in;
								}
								public function setT_gvs_in($t_gvs_in)
								{
									$this->t_gvs_in = $t_gvs_in;
								}
							  /////////////////////////////////////////
								public function getT_heat_source_own()
								{
									return $this->t_heat_source_own;
								}
								public function setT_heat_source_own($t_heat_source_own)
								{
									$this->t_heat_source_own = $t_heat_source_own;
								}
								/////////////////////////////////////////
								public function getDel_t()
								{
									return $this->del_t;
								}
								public function setDel_t($del_t)
								{
									$this->del_t = $del_t;
								}
									  /////////////////////////////////////////
								public function getT_count_itp()
								{
									return $this->t_count_itp;
								}
								public function setT_count_itp($t_count_itp)
								{
									$this->t_count_itp = $t_count_itp;
								}
										/////////////////////////////////////////		
								public function getInactive_t()
								{
									return $this->inactive_t;
								}
								public function setInactive_t($inactive_t)
								{
									$this->inactive_t = $inactive_t;
								}
///////     ГАЗ    /////////////
								public function getG_flue_date_dog()
								{
									return $this->g_flue_date_dog;
								}
								public function setG_flue_date_dog($g_flue_date_dog)
								{
									$this->g_flue_date_dog = $g_flue_date_dog;
								}								
								/////////////////////////////////////////
								public function getG_flue_num_dog()
								{
									return $this->g_flue_num_dog;
								}
								public function setG_flue_num_dog($g_flue_num_dog)
								{
									$this->g_flue_num_dog = $g_flue_num_dog;
								}								
								/////////////////////////////////////////
								public function getG_flue_naim_org_dog()
								{
									return $this->g_flue_naim_org_dog;
								}
								public function setG_flue_naim_org_dog($g_flue_naim_org_dog)
								{
									$this->g_flue_naim_org_dog = $g_flue_naim_org_dog;
								}								
								/////////////////////////////////////////	
								public function getG_flue_date_to()
								{
									return $this->g_flue_date_to;
								}
								public function setG_flue_date_to($g_flue_date_to)
								{
									$this->g_flue_date_to = $g_flue_date_to;
								}								
								/////////////////////////////////////////
								public function getG_flue_date_gto()
								{
									return $this->g_flue_date_gto;
								}
								public function setG_flue_date_gto($g_flue_date_gto)
								{
									$this->g_flue_date_gto = $g_flue_date_gto;
								}
								/////////////////////////////////////////
								public function getG_flue_date_prto()
								{
									return $this->g_flue_date_prto;
								}
								public function setG_flue_date_prto($g_flue_date_prto)
								{
									$this->g_flue_date_prto = $g_flue_date_prto;
								}								
								/////////////////////////////////////////								

								public function getGaz_is()
								{
									return $this->gaz_is;
								}
								public function setGaz_is($gaz_is)
								{
									$this->gaz_is = $gaz_is;
								}
						/////////////////////////////////////////
								public function getG_date_initial_start()
								{
									return $this->g_date_initial_start;
								}
								public function setG_date_initial_start($g_date_initial_start)
								{
									$this->g_date_initial_start = $g_date_initial_start;
								}
						/////////////////////////////////////////


								public function getG_flue_naim_org_insp()
								{
									return $this->g_flue_naim_org_insp;
								}
								public function setG_flue_naim_org_insp($g_flue_naim_org_insp)
								{
									$this->g_flue_naim_org_insp = $g_flue_naim_org_insp;
								}	
						/////////////////////////////////////////
								public function getG_flue_date_insp()
								{
									return $this->g_flue_date_insp;
								}
								public function setG_flue_date_insp($g_flue_date_insp)
								{
									$this->g_flue_date_insp = $g_flue_date_insp;
								}
						/////////////////////////////////////////
								public function getG_flue_date_insp_next()
								{
									return $this->g_flue_date_insp_next;
								}
								public function setG_flue_date_insp_next($g_flue_date_insp_next)
								{
									$this->g_flue_date_insp_next = $g_flue_date_insp_next;
								}
						/////////////////////////////////////////



								public function getG_insp()
								{
									return $this->g_insp;
								}
								public function setG_insp($g_insp)
								{
									$this->g_insp = $g_insp;
								}	
							  /////////////////////////////////////////
								public function getG_count_flat()
								{
									return $this->g_count_flat;
								}
								public function setG_count_flat($g_count_flat)
								{
									$this->g_count_flat = $g_count_flat;
								}
							  /////////////////////////////////////////
								public function getG_count_entrance()
								{
									return $this->g_count_entrance;
								}
								public function setG_count_entrance($g_count_entrance)
								{
									$this->g_count_entrance = $g_count_entrance;
								}
							  /////////////////////////////////////////
								public function getG_count_p()
								{
									return $this->g_count_p;
								}
								public function setG_count_p($g_count_p)
								{
									$this->g_count_p = $g_count_p;
								}
							  /////////////////////////////////////////
								public function getG_count_v()
								{
									return $this->g_count_v;
								}
								public function setG_count_v($g_count_v)
								{
									$this->g_count_v = $g_count_v;
								}
							  /////////////////////////////////////////
								public function getG_count_o()
								{
									return $this->g_count_o;
								}
								public function setG_count_o($g_count_o)
								{
									$this->g_count_o = $g_count_o;
								}
							  /////////////////////////////////////////
								public function getG_id_spr_og_flue()
								{
									return $this->g_id_spr_og_flue;
								}
								public function setG_id_spr_og_flue($g_id_spr_og_flue)
								{
									$this->g_id_spr_og_flue = $g_id_spr_og_flue;
								}
							  /////////////////////////////////////////
								public function getG_id_spr_og_flue_mater()
								{
									return $this->g_id_spr_og_flue_mater;
								}
								public function setG_id_spr_og_flue_mater($g_id_spr_og_flue_mater)
								{
									$this->g_id_spr_og_flue_mater = $g_id_spr_og_flue_mater;
								}
							  /////////////////////////////////////////
								public function getG_flue_size()
								{
									return $this->g_flue_size;
								}
								public function setG_flue_size($g_flue_size)
								{
									$this->g_flue_size = $g_flue_size;
								}
							  /////////////////////////////////////////
								public function getG_id_spr_og_type_gaz()
								{
									return $this->g_id_spr_og_type_gaz;
								}
								public function setG_id_spr_og_type_gaz($g_id_spr_og_type_gaz)
								{
									$this->g_id_spr_og_type_gaz = $g_id_spr_og_type_gaz;
								}
							  /////////////////////////////////////////
								public function getIs_dom()
								{
									return $this->is_dom;
								}
								public function setIs_dom($is_dom)
								{
									$this->is_dom = $is_dom;
								}
								/////////////////////////////////////////
								public function getDel_g()
								{
									return $this->del_g;
								}
								public function setDel_g($del_g)
								{
									$this->del_g = $del_g;
								}
								/////////////////////////////////////////
								public function getG_vid_dym_vstr()
								{
									return $this->g_vid_dym_vstr;
								}
								public function setG_vid_dym_vstr($g_vid_dym_vstr)
								{
									$this->g_vid_dym_vstr = $g_vid_dym_vstr;
								} 
								/////////////////////////////////////////
								public function getG_vid_dym_pr()
								{
									return $this->g_vid_dym_pr;
								}
								public function setG_vid_dym_pr($g_vid_dym_pr)
								{
									$this->g_vid_dym_pr = $g_vid_dym_pr;
								} 
								/////////////////////////////////////////
								public function getG_vid_dym_koak()
								{
									return $this->g_vid_dym_koak;
								}
								public function setG_vid_dym_koak($g_vid_dym_koak)
								{
									$this->g_vid_dym_koak = $g_vid_dym_koak;
								} 	
								/////////////////////////////////////////
								public function getG_mat_dym()
								{
									return $this->g_mat_dym;
								}
								public function setG_mat_dym($g_mat_dym)
								{
									$this->g_mat_dym = $g_mat_dym;
								} 
										/////////////////////////////////////////		
								public function getInactive_g()
								{
									return $this->inactive_g;
								}
								public function setInactive_g($inactive_g)
								{
									$this->inactive_g = $inactive_g;
								}								
///////     ТЕПЛОИСТОЧНИКИ  ////////
/////////////////////////////////////////
								public function getTi_is()
								{
									return $this->ti_is;
								}
								public function setTi_is($ti_is)
								{
									$this->ti_is = $ti_is;
								}
								/////////////////////////////////////////
								public function getTi_reestr()
								{
									return $this->ti_reestr;
								}
								public function setTi_reestr($ti_reestr)
								{
									$this->ti_reestr = $ti_reestr;
								}
								/////////////////////////////////////////
								public function getTi_name()
								{
									return $this->ti_name;
								}
								public function setTi_name($ti_name)
								{
									$this->ti_name = $ti_name;
								}

								 /////////////////////////////////////////
									public function getTi_insp()
									{
										return $this->ti_insp;
									}
									public function setTi_insp($ti_insp)
									{
										$this->ti_insp = $ti_insp;
									}	
								  /////////////////////////////////////////
									public function getTi_id_spr_ot_boiler_type()
									{
										return $this->ti_id_spr_ot_boiler_type;
									}
									public function setTi_id_spr_ot_boiler_type($ti_id_spr_ot_boiler_type)
									{
										$this->ti_id_spr_ot_boiler_type = $ti_id_spr_ot_boiler_type;
									}	
								  /////////////////////////////////////////
									public function getTi_year()
									{
										return $this->ti_year;
									}
									public function setTi_year($ti_year)
									{
										$this->ti_year = $ti_year;
									}	
								  /////////////////////////////////////////
									public function getTi_power()
									{
										return $this->ti_power;
									}
									public function setTi_power($ti_power)
									{
										$this->ti_power = $ti_power;
									}
								  /////////////////////////////////////////
									public function getTi_dop_power()
									{
										return $this->ti_dop_power;
									}
									public function setTi_dop_power($ti_dop_power)
									{
										$this->ti_dop_power = $ti_dop_power;
									}										
								  /////////////////////////////////////////
									public function getTi_id_spr_ot_type_fuel_1()
									{
										return $this->ti_id_spr_ot_type_fuel_1;
									}
									public function setTi_id_spr_ot_type_fuel_1($ti_id_spr_ot_type_fuel_1)
									{
										$this->ti_id_spr_ot_type_fuel_1 = $ti_id_spr_ot_type_fuel_1;
									}	
								  /////////////////////////////////////////
									public function getTi_id_spr_ot_type_fuel_2()
									{
										return $this->ti_id_spr_ot_type_fuel_2;
									}
									public function setTi_id_spr_ot_type_fuel_2($ti_id_spr_ot_type_fuel_2)
									{
										$this->ti_id_spr_ot_type_fuel_2 = $ti_id_spr_ot_type_fuel_2;
									}	
								  /////////////////////////////////////////
									public function getTi_out_power_ot()
									{
										return $this->ti_out_power_ot;
									}
									public function setTi_out_power_ot($ti_out_power_ot)
									{
										$this->ti_out_power_ot = $ti_out_power_ot;
									}	
								  /////////////////////////////////////////
									public function getTi_out_power_gvs()
									{
										return $this->ti_out_power_gvs;
									}
									public function setTi_out_power_gvs($ti_out_power_gvs)
									{
										$this->ti_out_power_gvs = $ti_out_power_gvs;
									}	
								  /////////////////////////////////////////
									public function getTi_out_power_tech()
									{
										return $this->ti_out_power_tech;
									}
									public function setTi_out_power_tech($ti_out_power_tech)
									{
										$this->ti_out_power_tech = $ti_out_power_tech;
									}	
								  /////////////////////////////////////////
									public function getTi_out_power_vent()
									{
										return $this->ti_out_power_vent;
									}
									public function setTi_out_power_vent($ti_out_power_vent)
									{
										$this->ti_out_power_vent = $ti_out_power_vent;
									}
									/////////////////////////////////////////
										public function getDel_ti()
										{
											return $this->del_ti;
										}
										public function setDel_ti($del_ti)
										{
											$this->del_ti = $del_ti;
										}									
										/////////////////////////////////////////		
									public function getInactive_ti()
									{
										return $this->inactive_ti;
									}
									public function setInactive_ti($inactive_ti)
									{
										$this->inactive_ti = $inactive_ti;
									}
									
									////////////////////////////////////////		
									public function getCreate_date()
									{
										return $this->create_date;
									}
									public function setCreate_date($create_date)
									{
										$this->create_date = $create_date;
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
									public function getOtv_g2()
									{
										return $this->otv_g2;
									}
									public function setOtv_g2($otv_g2)
									{
										$this->otv_g2 = $otv_g2;
									}
								/////////////////////////////////////////
									public function getOtv_g3()
									{
										return $this->otv_g3;
									}
									public function setOtv_g3($otv_g3)
									{
										$this->otv_g3 = $otv_g3;
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
									public function getOrder_num_g2()
									{
										return $this->order_num_g2;
									}
									public function setOrder_num_g2($order_num_g2)
									{
										$this->order_num_g2 = $order_num_g2;
									}
								/////////////////////////////////////////
									public function getOrder_num_g3()
									{
										return $this->order_num_g3;
									}
									public function setOrder_num_g3($order_num_g3)
									{
										$this->order_num_g3 = $order_num_g3;
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
									public function getOrder_data_g2()
									{
										return $this->order_data_g2;
									}
									public function setOrder_data_g2($order_data_g2)
									{
										$this->order_data_g2 = $order_data_g2;
									}
								/////////////////////////////////////////
									public function getOrder_data_g3()
									{
										return $this->order_data_g3;
									}
									public function setOrder_data_g3($order_data_g3)
									{
										$this->order_data_g3 = $order_data_g3;
									}
								/////////////////////////////////////////
									public function getDog_data_cont_g3()
									{
										return $this->dog_data_cont_g3;
									}
									public function setDog_data_cont_g3($dog_data_cont_g3)
									{
										$this->dog_data_cont_g3 = $dog_data_cont_g3;
									}	
								/////////////////////////////////////////
									public function getDog_num_g3()
									{
										return $this->dog_num_g3;
									}
									public function setDog_num_g3($dog_num_g3)
									{
										$this->dog_num_g3 = $dog_num_g3;
									}
								/////////////////////////////////////////
									public function getDog_data_g3()
									{
										return $this->dog_data_g3;
									}
									public function setDog_data_g3($dog_data_g3)
									{
										$this->dog_data_g3 = $dog_data_g3;
									}
								/////////////////////////////////////////
									public function getIns_data_g()
									{
										return $this->ins_data_g;
									}
									public function setIns_data_g($ins_data_g)
									{
										
										$this->ins_data_g = $ins_data_g;
									}										

	
}