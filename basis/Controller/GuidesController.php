<?php

namespace Basis\Controller;

use Admin\Controller\AdminController;

class GuidesController extends AdminController
{

    public function listing()
    {
		//$guides_link = trim($_GET['guide']);
		if(isset($_GET['guide'])){
			$guides_link = trim($_GET['guide']);
			$flag = 1;
		}else{
			$guides_link = $_POST['params'];
			$flag = 2;
		}
		switch($guides_link){
				
				/***** Справочник филиалов **********/
				case "spr_branch":
					   $this->load->model('Branch');
					   $this->data['guides_data'] = $this->model->branch->getBranch();
					  
					break;
				/***** Справочник областей **********/			
				case "spr_region":
					   $this->load->model('Region');
					   $this->data['guides_data'] = $this->model->region->getRegion();
					 
					break;
				/***** Справочник городов **********/			
				case "spr_city":
					   $this->load->model('City');
					   $this->data['guides_data'] = $this->model->city->getCityListGuides();
					   $this->load->model('Region');
					   $this->data['region_data'] = $this->model->region->getRegion();					   
					   $this->load->model('District');
					   $this->data['district_data'] = $this->model->district->getDistrictList();					   
					 
					break;
				/***** Справочник районов областей **********/			
				case "spr_district":
					   $this->load->model('District');
					   $this->data['guides_data'] = $this->model->district->getDistrictListGuides();
					   $this->load->model('Region');
					   $this->data['region_data'] = $this->model->region->getRegion();					   
					
					break;
				/***** Справочник районов города **********/			
				case "spr_city_zone":
					   $this->load->model('CityZone');
					   $this->data['guides_data'] = $this->model->cityZone->getCityZoneListGuides();
					   $this->load->model('District');
					   $this->data['district_data'] = $this->model->district->getDistrictList();
					   $this->load->model('Region');
					   $this->data['region_data'] = $this->model->region->getRegion();					   
					   $this->load->model('City');
					   $this->data['city_data'] = $this->model->city->getCityList();
						
						
					break;
				/***** Справочник административных районов **********/			
				case "spr_admin":
					   $this->load->model('Spr_admin');
					   $this->data['guides_data'] = $this->model->spr_admin->getSpr_adminGuides();
					   $this->load->model('Region');
					   $this->data['region_data'] = $this->model->region->getRegion();					   
					  
					break;
				/***** Справочник линий снабжения **********/			
				case "spr_oe_klvl_type":
					   $this->load->model('Spr_oe_klvl_type');
					   $this->data['guides_data'] = $this->model->spr_oe_klvl_type->getSpr_oe_klvl_type();
					 
					break;
				/***** Справочник напряжений линий  **********/			
				case "spr_oe_klvl_volt":
					   $this->load->model('spr_oe_klvl_volt');
					   $this->data['guides_data'] = $this->model->spr_oe_klvl_volt->getSpr_oe_klvl_volt();
					 
					break;
				/***** Справочник напряжений линий  **********/			
				case "spr_oe_category_line":
					   $this->load->model('spr_oe_category_line');
					   $this->data['guides_data'] = $this->model->spr_oe_category_line->getSpr_oe_category_line();
					 
					break;	
				/***** Справочник напряжений линий  **********/			
				case "spr_type_object":
					   $this->load->model('spr_type_object');
					   $this->data['guides_data'] = $this->model->spr_type_object->getSpr_type_object();
					 
					break;					
				/***** Справочник типов газового оборудования  **********/			
				case "spr_og_device_type":
					   $this->load->model('Spr_og_device_type');
					   $this->data['guides_data'] = $this->model->spr_og_device_type->getSpr_og_device_type();
					 
					break;
				/***** Справочник видов дымоходов  **********/			
				case "spr_og_flue":
					   $this->load->model('Spr_og_flue');
					   $this->data['guides_data'] = $this->model->spr_og_flue->getSPR_VidDym();
					 
					break;
				/***** Справочник материалов дымоходов  **********/			
				case "spr_og_flue_mater":
					   $this->load->model('Spr_flue_mater');
					   $this->data['guides_data'] = $this->model->spr_flue_mater->getSpr_flue_mater();
					  
					break;					
				/***** Справочник видов газа  **********/			
				case "spr_og_type_gaz":
					   $this->load->model('Spr_type_gaz');
					   $this->data['guides_data'] = $this->model->spr_type_gaz->getSpr_type_gaz();
					  
					break;
				/***** Справочник видов ТО газа  **********/			
				case "spr_og_to_gaz":
					   $this->load->model('Spr_og_to_gaz');
					   $this->data['guides_data'] = $this->model->spr_og_to_gaz->getSpr_og_to_gaz();
					  
					break;
				/***** Справочник видов обследования газового объекта  **********/			
				case "spr_og_obsl_go":
					   $this->load->model('Spr_og_obsl_go');
					   $this->data['guides_data'] = $this->model->spr_og_obsl_go->getSpr_og_obsl_go();
					  
					break;
				/***** Справочник видов аврий или НС  **********/			
				case "spr_og_accidents":
					   $this->load->model('Spr_og_accidents');
					   $this->data['guides_data'] = $this->model->spr_og_accidents->getSpr_og_accidents();
					  
					break;	
				/***** Справочник видов топлива котельной  **********/			
				case "spr_oti_type_fuel":
					   $this->load->model('Spr_oti_type_fuel');
					   $this->data['guides_data'] = $this->model->spr_oti_type_fuel->getSpr_oti_type_fuel();
					
					break;
				/***** Справочник видов резервного топлива котельной  **********/			
				case "spr_oti_type_fuel_rezerv":
					   $this->load->model('Spr_oti_type_fuel_rezerv');
					   $this->data['guides_data'] = $this->model->spr_oti_type_fuel_rezerv->getSpr_oti_type_fuel_rezerv();
					 
					break;					
				/***** Справочник категорий надежности теплоснабжения  **********/			
				case "spr_ot_cat":
					   $this->load->model('Spr_ot_cat');
					   $this->data['guides_data'] = $this->model->spr_ot_cat->getSpr_ot_cat();
					
					break;					
				/***** Справочник функциональных назначений объекта  **********/			
				case "spr_ot_functions":
					   $this->load->model('Spr_ot_functions');
					   $this->data['guides_data'] = $this->model->spr_ot_functions->getSpr_ot_functions();
					
					break;
				/***** Справочник типов тепловой изоляции  **********/			
				case "spr_ot_heatnet_type_iso":
					   $this->load->model('Spr_ot_heatnet_type_iso');
					   $this->data['guides_data'] = $this->model->spr_ot_heatnet_type_iso->getSpr_ot_heatnet_type_iso();
					
					break;
				/***** Справочник ведомств  **********/			
				case "spr_department":
					   $this->load->model('Department');
					   $this->data['guides_data'] = $this->model->department->getDepartmentGuides();
					   $this->load->model('TypeProperty');
					   $this->data['type_property'] = $this->model->typeProperty->getTypeProperty();
						
					break;
				/***** Справочник видов деятельности  **********/			
				case "spr_kind_of_activity":
					   $this->load->model('Spr_kind_of_activity');
					   $this->data['guides_data'] = $this->model->spr_kind_of_activity->getSpr_kind_of_activity();
				
					break;
				/***** Справочник видов энергии  **********/			
				case "spr_oe_energy_type":
					   $this->load->model('spr_oe_energy_type');
					   $this->data['guides_data'] = $this->model->spr_oe_energy_type->getSpr_oe_energy_type();
					
					break;
				/***** Справочник типов здания  **********/			
				case "spr_og_type_home":
					   $this->load->model('Spr_type_home');
					   $this->data['guides_data'] = $this->model->spr_type_home->getSpr_type_home();
					
					break;
				/***** Справочник отделов/РЭГИ  **********/			
				case "spr_otdel":
					   $this->load->model('Otdel');
					   $this->data['guides_data'] = $this->model->otdel->getOtdelListGuides();
					   $this->load->model('Branch');
					   $this->data['branch_data'] = $this->model->branch->getBranch();
					   $this->load->model('Podrazdelenie');
					   $this->data['podrazd_data'] = $this->model->podrazdelenie->getPodrazdelenieList();
					   
					
					break;
				/***** Справочник назначений котельной  **********/			
				case "spr_oti_boiler_type":
					   $this->load->model('Spr_oti_boiler_type');
					   $this->data['guides_data'] = $this->model->spr_oti_boiler_type->getSpr_oti_boiler_type();
					
					break;
				/***** Справочник видов изоляции  **********/			
				case "spr_ot_type_izol":
					   $this->load->model('Spr_ot_type_izol');
					   $this->data['guides_data'] = $this->model->spr_ot_type_izol->getSpr_ot_type_izol();
					
					break;	
				/***** Справочник диаметров труб  **********/			
				case "spr_ot_diametr_tube":
					   $this->load->model('Spr_ot_diametr_tube');
					   $this->data['guides_data'] = $this->model->spr_ot_diametr_tube->getSpr_ot_diametr_tube();
					
					break;						
				/***** Справочник видов отопительных приборов  **********/			
				case "spr_ot_type_ot_pribor":
					   $this->load->model('Spr_ot_type_ot_pribor');
					   $this->data['guides_data'] = $this->model->spr_ot_type_ot_pribor->getSpr_ot_type_ot_pribor();
					
					break;
				/***** Справочник видов разводки  **********/			
				case "spr_ot_type_razvodka":
					   $this->load->model('Spr_ot_type_razvodka');
					   $this->data['guides_data'] = $this->model->spr_ot_type_razvodka->getspr_ot_type_razvodka();
				
					break;	
				/***** Справочник назначений САР  **********/			
				case "spr_ot_nazn_sar":
					   $this->load->model('Spr_ot_nazn_sar');
					   $this->data['guides_data'] = $this->model->spr_ot_nazn_sar->getSpr_ot_nazn_sar();
				
					break;					
				/***** Справочник мест расположения теплообменника  **********/			
				case "spr_ot_gvs_in":
					   $this->load->model('Spr_ot_gvs_in');
					   $this->data['guides_data'] = $this->model->spr_ot_gvs_in->getSpr_ot_gvs_in();
					  
					break;
				/***** Справочник типов схем присоединения систем отопления  **********/			
				case "spr_ot_gvs_open":
					   $this->load->model('Spr_ot_gvs_open');
					   $this->data['guides_data'] = $this->model->spr_ot_gvs_open->getSpr_ot_gvs_open();
					
					break;
				/***** Справочник типов тепловой изоляции  **********/			
				case "spr_ot_heatnet_type_underground":
					   $this->load->model('Spr_ot_heatnet_type_underground');
					   $this->data['guides_data'] = $this->model->spr_ot_heatnet_type_underground->getSpr_ot_heatnet_type_underground();
					 
					break;
				/***** Справочник типов схем присоединения  **********/			
				case "spr_ot_systemheat_dependent":
					   $this->load->model('Spr_ot_systemheat_dependent');
					   $this->data['guides_data'] = $this->model->spr_ot_systemheat_dependent->getSpr_ot_systemheat_dependent();
					
					break;
				/***** Справочник систем отопления  **********/			
				case "spr_ot_systemheat_water":
					   $this->load->model('Spr_ot_systemheat_water');
					   $this->data['guides_data'] = $this->model->spr_ot_systemheat_water->getSpr_ot_systemheat_water();
					  
					break;
				/***** Справочник источников теплоснабжения  **********/			
				case "spr_ot_type_heat_source":
					   $this->load->model('Spr_ot_type_heat_source');
					   $this->data['guides_data'] = $this->model->spr_ot_type_heat_source->getSpr_ot_type_heat_source();
					
					break;
				/***** Справочник видов теплообменника  **********/			
				case "spr_ot_type_to":
					   $this->load->model('Spr_ot_type_to');
					   $this->data['guides_data'] = $this->model->spr_ot_type_to->getSpr_ot_type_to();
					 
					break;
				/***** Справочник подразделений  **********/			
				case "spr_podrazdelenie":
					   $this->load->model('Podrazdelenie');
					   $this->data['guides_data'] = $this->model->podrazdelenie->getPodrazdelenieListGuides();
					   $this->load->model('Branch');
					   $this->data['branch_data'] = $this->model->branch->getBranch();					   
					 
					break;
				/***** Справочник сменности работ  **********/			
				case "spr_shift_of_work":
					   $this->load->model('Spr_shift_of_work');
					   $this->data['guides_data'] = $this->model->spr_shift_of_work->getSpr_shift_of_work();
					
					break;
				/***** Справочник типов населенных пунктов  **********/			
				case "spr_type_city":
					   $this->load->model('Spr_type_city');
					   $this->data['guides_data'] = $this->model->spr_type_city->getSpr_type_city();
					 
					break;
				/***** Справочник форм собственности  **********/			
				case "spr_type_property":
					   $this->load->model('TypeProperty');
					   $this->data['guides_data'] = $this->model->typeProperty->getTypeProperty();
					
					break;
				/***** Справочник адресных объектов  **********/			
				case "spr_type_street":
					   $this->load->model('Spr_type_street');
					   $this->data['guides_data'] = $this->model->spr_type_street->getSpr_type_street();
					 
					break;
				/***** Справочник адресных объектов  **********/			
				case "spr_ot_podrazdel":
					   $this->load->model('Spr_ot_uzel_block');
					   $this->data['guides_data'] = $this->model->spr_ot_uzel_block->getSpr_ot_uzel_block();
					 
					break;	
				/***** Справочник конвертера мощности  **********/			
				case "spr_units_power":
					   $this->load->model('Spr_units_power');
					   $this->data['guides_data'] = $this->model->spr_units_power->getSpr_units_power();
					 
					break;	
				/***** Справочник типов ответственного  **********/			
				case "type_otv":
					   $this->load->model('Spr_otv_vibor');
					   $this->data['guides_data'] = $this->model->spr_otv_vibor->getSpr_otv_vibor();
					 
					break;					

		}
		if($flag == 2){
			echo json_encode($this->data);	
			//print_r($this->data);	
		}else{
			$this->view->render('guides/list', $this->data);
		}
	}

	public function add_type_street()
    {

        $this->load->model('Spr_type_street');

        $params = $this->request->post;
		
		$str_type_street = '';
	
		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_type_streetId = $this->model->spr_type_street->updateSpr_type_street($params);

		}else{
            $spr_type_streetId = $this->model->spr_type_street->createSpr_type_street($params);
            

			if($spr_type_streetId != 0){
				
				if($params['guides_place']== 2){
				$str_type_street ="<tr class = 'item-$spr_type_streetId'>";
				$str_type_street .="<td name='type_street_name'>".$params['name']."</td>";
				$str_type_street .="<td name='type_street_sokr_name'>".$params['sokr_name']."</td>";
				$str_type_street .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_type_streetId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_type_streetId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_type_street = "<option value='$spr_type_streetId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_type_street;
        }
    }

	public function add_podrazdel()
    {

        $this->load->model('Spr_ot_uzel_block');

        $params = $this->request->post;
		
		$str_podrazdel = '';
	

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_podrazdelId = $this->model->spr_ot_uzel_block->updateSpr_ot_uzel_block($params);

		}else{
            $spr_podrazdelId = $this->model->spr_ot_uzel_block->createSpr_ot_uzel_block($params);
            

			if($spr_podrazdelId != 0){
				
				if($params['guides_place']== 2){
				$str_podrazdel ="<tr class = 'item-$spr_podrazdelId'>";
				$str_podrazdel .="<td name='podrazdel_name'>".$params['name']."</td>";
				$str_podrazdel .="<td name='podrazdel_table'>".$params['podrazdel_table']."</td>";
				$str_podrazdel .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_podrazdelId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_podrazdelId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_podrazdel = "<option value='$spr_podrazdelId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_podrazdel;
        }
    }	


	public function add_units_power()
    {

        $this->load->model('Spr_units_power');

        $params = $this->request->post;
		
		$str_units_power = '';
	

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_units_powerId = $this->model->spr_units_power->updateSpr_units_power($params);

		}else{
            $spr_units_powerId = $this->model->spr_units_power->createSpr_units_power($params);
            

			if($spr_units_powerId != 0){
				
				if($params['guides_place']== 2){
				$str_units_power ="<tr class = 'item-$spr_units_powerId'>";
				$str_units_power .="<td name='units_power_name'>".$params['name']."</td>";
				$str_units_power .="<td name='units_power_value'>".$params['ratio']."</td>";
				$str_units_power .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_units_powerId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_units_powerId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_units_power = "<option value='$spr_units_powerId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_units_power;
        }
    }

	public function add_type_otv()
    {

        $this->load->model('Spr_otv_vibor');

        $params = $this->request->post;
		
		$str_type_otv = '';
	

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_type_otvId = $this->model->spr_otv_vibor->updateSpr_otv_vibor($params);

		}else{
            $spr_type_otvId = $this->model->spr_otv_vibor->createSpr_otv_vibor($params);
            

			if($spr_type_otvId != 0){
				
				if($params['guides_place']== 2){
				$str_type_otv ="<tr class = 'item-$spr_type_otvId'>";
				$str_type_otv .="<td name='type_otv_name'>".$params['name']."</td>";
				$str_type_otv .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_type_otvId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_type_otvId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_type_otv = "<option value='$spr_type_otvId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_type_otv;
        }
    }

	
	public function add_type_property()
    {


        $this->load->model('TypeProperty');

        $params = $this->request->post;
		
		$str_type_property = '';
	
//print_r($params);	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$typePropertyId = $this->model->typeProperty->updateTypeProperty($params);
		
		
		}else{
            $typePropertyId = $this->model->typeProperty->createTypeProperty($params);
            

			if($typePropertyId != 0){
				
					if($params['guides_place']== 2){
					$str_type_property ="<tr class = 'item-$typePropertyId'>";
					$str_type_property .="<td name='type_property_name'>".$params['name']."</td>";
					$str_type_property .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$typePropertyId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($typePropertyId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";	
					}else{
					$str_type_property = "<option value='$typePropertyId'>".$params['name']."</option>";	
					}
			}
			echo $str_type_property;
        }
    }	
	
	
	
	
	public function add_type_city()
    {

        $this->load->model('Spr_type_city');

        $params = $this->request->post;
		
		$str_type_street = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_type_cityId = $this->model->spr_type_city->updateSpr_type_city($params);
		
		
		}else{
            $spr_type_cityId = $this->model->spr_type_city->createSpr_type_city($params);
            

			if($spr_type_cityId != 0){
				
				
				if($params['guides_place']== 2){
				$str_type_street ="<tr class = 'item-$spr_type_cityId'>";
				$str_type_street .="<td name='type_city_name'>".$params['name']."</td>";
				$str_type_street .="<td name='type_city_sokr_name'>".$params['sokr_name']."</td>";
				$str_type_street .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_type_cityId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_type_cityId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_type_street = "<option value='$spr_type_cityId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_type_street;
        }
    }	
	
	public function add_shift_of_work()
    {

        $this->load->model('Spr_shift_of_work');

        $params = $this->request->post;
		
		$str_shift_of_work = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_shift_of_workId = $this->model->spr_shift_of_work->updateSpr_shift_of_work($params);
		
		
		}else{
            $spr_shift_of_workId = $this->model->spr_shift_of_work->createSpr_shift_of_work($params);
            

			if($spr_shift_of_workId != 0){
				
				if($params['guides_place']== 2){
				$str_shift_of_work ="<tr class = 'item-$spr_shift_of_workId'>";
				$str_shift_of_work .="<td name='shift_of_work_name'>".$params['name']."</td>";
				$str_shift_of_work .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_shift_of_workId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_shift_of_workId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_shift_of_work = "<option value='$spr_shift_of_workId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_shift_of_work;
        }
    }


	public function add_ot_type_to()
    {

        $this->load->model('Spr_ot_type_to');

        $params = $this->request->post;
		
		$str_ot_type_to = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_type_toId = $this->model->spr_ot_type_to->updateSpr_ot_type_to($params);
		
		
		}else{
            $spr_ot_type_toId = $this->model->spr_ot_type_to->createSpr_ot_type_to($params);
            

			if($spr_ot_type_toId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_type_to ="<tr class = 'item-$spr_ot_type_toId'>";
				$str_ot_type_to .="<td name='ot_type_to_name'>".$params['name']."</td>";
				$str_ot_type_to .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_type_toId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_type_toId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_type_to ="<tr ot_type_to = 'ot_type_to-$spr_ot_type_toId' onclick='modalWindow.checkSpr_ot_type_to($spr_ot_type_toId)'>";
				$str_ot_type_to .="<td name='ot_type_to_name'>".$params['name']."</td>";
				$str_ot_type_to .="</tr>";
				}
			
			
			
			}
			echo $str_ot_type_to;
        }
    }


	public function add_ot_type_heat_source()
    {

        $this->load->model('Spr_ot_type_heat_source');

        $params = $this->request->post;
		
		$str_ot_type_heat_source = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_type_heat_sourceId = $this->model->spr_ot_type_heat_source->updateSpr_ot_type_heat_source($params);
		
		
		}else{
            $spr_ot_type_heat_sourceId = $this->model->spr_ot_type_heat_source->createSpr_ot_type_heat_source($params);
            

			if($spr_ot_type_heat_sourceId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_type_heat_source ="<tr class = 'item-$spr_ot_type_heat_sourceId'>";
				$str_ot_type_heat_source .="<td name='ot_type_heat_source_name'>".$params['name']."</td>";
				$str_ot_type_heat_source .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_type_heat_sourceId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_type_heat_sourceId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_type_heat_source = "<option value='$spr_ot_type_heat_sourceId'>".$params['name']."</option>";	
				}			
			
			
			}
			echo $str_ot_type_heat_source;
        }
    }


	public function add_ot_systemheat_water()
    {

        $this->load->model('Spr_ot_systemheat_water');

        $params = $this->request->post;
		
		$str_ot_systemheat_water = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_systemheat_waterId = $this->model->spr_ot_systemheat_water->updateSpr_ot_systemheat_water($params);
		
		
		}else{
            $spr_ot_systemheat_waterId = $this->model->spr_ot_systemheat_water->createSpr_ot_systemheat_water($params);
            

			if($spr_ot_systemheat_waterId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_systemheat_water ="<tr class = 'item-$spr_ot_systemheat_waterId'>";
				$str_ot_systemheat_water .="<td name='ot_systemheat_water_name'>".$params['name']."</td>";
				$str_ot_systemheat_water .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_systemheat_waterId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_systemheat_waterId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_systemheat_water ="<tr systemheat_water = 'systemheat_water-$spr_ot_systemheat_waterId' onclick='modalWindow.checkSpr_ot_systemheat_water($spr_ot_systemheat_waterId)'>";
				$str_ot_systemheat_water .="<td name='ot_systemheat_water_name'>".$params['name']."</td>";	
				$str_ot_systemheat_water .="</tr>";	
				}				
			}
			echo $str_ot_systemheat_water;
        }
    }


	public function add_ot_systemheat_dependent()
    {

        $this->load->model('Spr_ot_systemheat_dependent');

        $params = $this->request->post;
		
		$str_ot_systemheat_dependent = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_systemheat_dependentId = $this->model->spr_ot_systemheat_dependent->updateSpr_ot_systemheat_dependent($params);
		
		
		}else{
            $spr_ot_systemheat_dependentId = $this->model->spr_ot_systemheat_dependent->createSpr_ot_systemheat_dependent($params);
            

			if($spr_ot_systemheat_dependentId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_systemheat_dependent ="<tr class = 'item-$spr_ot_systemheat_dependentId'>";
				$str_ot_systemheat_dependent .="<td name='ot_systemheat_dependent_name'>".$params['name']."</td>";
				$str_ot_systemheat_dependent .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_systemheat_dependentId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_systemheat_dependentId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_systemheat_dependent ="<tr systemheat_dependent = 'systemheat_dependent-$spr_ot_systemheat_dependentId' onclick='modalWindow.checkSpr_ot_systemheat_dependent($spr_ot_systemheat_dependentId)'>";
				$str_ot_systemheat_dependent .="<td name='ot_systemheat_dependent_name'>".$params['name']."</td>";		
				$str_ot_systemheat_dependent .="</tr>";		
				}
			}
			echo $str_ot_systemheat_dependent;
        }
    }

	public function add_ot_heatnet_type_underground()
    {

        $this->load->model('Spr_ot_heatnet_type_underground');

        $params = $this->request->post;
		
		$str_ot_heatnet_type_underground = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_heatnet_type_undergroundId = $this->model->spr_ot_heatnet_type_underground->updateSpr_ot_heatnet_type_underground($params);
		
		
		}else{
            $spr_ot_heatnet_type_undergroundId = $this->model->spr_ot_heatnet_type_underground->createSpr_ot_heatnet_type_underground($params);
            

			if($spr_ot_heatnet_type_undergroundId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_heatnet_type_underground ="<tr class = 'item-$spr_ot_heatnet_type_undergroundId'>";
				$str_ot_heatnet_type_underground .="<td name='ot_heatnet_type_underground_name'>".$params['name']."</td>";
				$str_ot_heatnet_type_underground .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_heatnet_type_undergroundId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_heatnet_type_undergroundId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_heatnet_type_underground = "<option value='$spr_ot_heatnet_type_undergroundId'>".$params['name']."</option>";	
				}
			}
			echo $str_ot_heatnet_type_underground;
        }
    }


	public function add_ot_gvs_open()
    {

        $this->load->model('Spr_ot_gvs_open');

        $params = $this->request->post;
		
		$str_ot_gvs_open = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_gvs_openId = $this->model->spr_ot_gvs_open->updateSpr_ot_gvs_open($params);
		
		
		}else{
            $spr_ot_gvs_openId = $this->model->spr_ot_gvs_open->createSpr_ot_gvs_open($params);
            

			if($spr_ot_gvs_openId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_gvs_open ="<tr class = 'item-$spr_ot_gvs_openId'>";
				$str_ot_gvs_open .="<td name='ot_gvs_open_name'>".$params['name']."</td>";
				$str_ot_gvs_open .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_gvs_openId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_gvs_openId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_gvs_open ="<tr ot_gvs_open = 'ot_gvs_open-$spr_ot_gvs_openId' onclick='modalWindow.checkSpr_ot_gvs_open($spr_ot_gvs_openId)'>";
				$str_ot_gvs_open .="<td name='ot_gvs_open_name'>".$params['name']."</td>";	
				$str_ot_gvs_open .="</tr>";	
				}
			}
			echo $str_ot_gvs_open;
        }
    }	
	
	public function add_ot_gvs_in()
    {

        $this->load->model('Spr_ot_gvs_in');

        $params = $this->request->post;
		
		$str_ot_gvs_in = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_gvs_inId = $this->model->spr_ot_gvs_in->updateSpr_ot_gvs_in($params);
		
		
		}else{
            $spr_ot_gvs_inId = $this->model->spr_ot_gvs_in->createSpr_ot_gvs_in($params);
            

			if($spr_ot_gvs_inId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_gvs_in ="<tr class = 'item-$spr_ot_gvs_inId'>";
				$str_ot_gvs_in .="<td name='ot_gvs_in_name'>".$params['name']."</td>";
				$str_ot_gvs_in .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_gvs_inId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_gvs_inId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_gvs_in ="<tr ot_gvs_in = 'ot_gvs_in-$spr_ot_gvs_inId' onclick='modalWindow.checkSpr_ot_gvs_in($spr_ot_gvs_inId)'>";
				$str_ot_gvs_in .="<td name='ot_gvs_in_name'>".$params['name']."</td>";	
				$str_ot_gvs_in .="</tr>";	
				}
			}
			echo $str_ot_gvs_in;
        }
    }


	public function add_oti_boiler_type()
    {

        $this->load->model('Spr_oti_boiler_type');

        $params = $this->request->post;
		
		$str_oti_boiler_type = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_oti_boiler_typeId = $this->model->spr_oti_boiler_type->updateSpr_oti_boiler_type($params);
		
		
		}else{
            $spr_oti_boiler_typeId = $this->model->spr_oti_boiler_type->createSpr_oti_boiler_type($params);
            

			if($spr_oti_boiler_typeId != 0){
				
				if($params['guides_place']== 2){
				$str_oti_boiler_type ="<tr class = 'item-$spr_oti_boiler_typeId'>";
				$str_oti_boiler_type .="<td name='oti_boiler_type_name'>".$params['name']."</td>";
				$str_oti_boiler_type .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_oti_boiler_typeId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_oti_boiler_typeId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_oti_boiler_type ="<tr oti_boiler = 'oti_boiler-$spr_oti_boiler_typeId' onclick='modalWindow.checkSpr_oti_boiler_type($spr_oti_boiler_typeId)'>";
				$str_oti_boiler_type .="<td name='oti_boiler_type_name'>".$params['name']."</td>";	
				$str_oti_boiler_type .="</tr>";	
				}
			}
			echo $str_oti_boiler_type;
        }
    }










	public function add_ot_type_izol()
    {

        $this->load->model('Spr_ot_type_izol');

        $params = $this->request->post;
		
		$str_ot_type_izol = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_type_izolId = $this->model->spr_ot_type_izol->updateSpr_ot_type_izol($params);
		
		
		}else{
            $spr_ot_type_izolId = $this->model->spr_ot_type_izol->createSpr_ot_type_izol($params);
            

			if($spr_ot_type_izolId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_type_izol ="<tr class = 'item-$spr_ot_type_izolId'>";
				$str_ot_type_izol .="<td name='ot_izol_type_name'>".$params['name']."</td>";
				$str_ot_type_izol .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_type_izolId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_type_izolId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				/*$str_ot_type_izol ="<tr ot_type_izol = 'ot_type_izol-$spr_ot_type_izolId' onclick='modalWindow.checkSpr_ot_type_izol($spr_ot_type_izolId)'>";
				$str_ot_type_izol .="<td name='ot_izol_type_name'>".$params['name']."</td>";*/	
				
				
				$str_ot_type_izol = "<option value='$spr_ot_type_izolId'>".$params['name']."</option>";
				
				}
			}
			echo $str_ot_type_izol;
        }
    }

	public function add_ot_type_ot_pribor()
    {

        $this->load->model('Spr_ot_type_ot_pribor');

        $params = $this->request->post;
		
		$str_ot_type_ot_pribor = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_type_ot_priborId = $this->model->spr_ot_type_ot_pribor->updateSpr_ot_type_ot_pribor($params);
		
		
		}else{
            $spr_ot_type_ot_priborId = $this->model->spr_ot_type_ot_pribor->createSpr_ot_type_ot_pribor($params);
            

			if($spr_ot_type_ot_priborId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_type_ot_pribor ="<tr class = 'item-$spr_ot_type_ot_priborId'>";
				$str_ot_type_ot_pribor .="<td name='ot_pribor_type_name'>".$params['name']."</td>";
				$str_ot_type_ot_pribor .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_type_ot_priborId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_type_ot_priborId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_type_ot_pribor ="<tr ot_type_ot_pribor = 'ot_type_ot_pribor-$spr_ot_type_ot_priborId' onclick='modalWindow.checkSpr_ot_type_ot_pribor($spr_ot_type_ot_priborId)'>";
				$str_ot_type_ot_pribor .="<td name='ot_pribor_type_name'>".$params['name']."</td>";	
				$str_ot_type_ot_pribor .="</tr>";	
				}
			}
			echo $str_ot_type_ot_pribor;
        }
    }

	public function add_ot_type_razvodka()
    {

        $this->load->model('Spr_ot_type_razvodka');

        $params = $this->request->post;
		
		$str_ot_type_razvodka = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_type_razvodkaId = $this->model->spr_ot_type_razvodka->updateSpr_ot_type_razvodka($params);
		
		
		}else{
            $spr_ot_type_razvodkaId = $this->model->spr_ot_type_razvodka->createSpr_ot_type_razvodka($params);
            

			if($spr_ot_type_razvodkaId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_type_razvodka ="<tr class = 'item-$spr_ot_type_razvodkaId'>";
				$str_ot_type_razvodka .="<td name='ot_razvodka_type_name'>".$params['name']."</td>";
				$str_ot_type_razvodka .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_type_razvodkaId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_type_razvodkaId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_type_razvodka ="<tr ot_type_razvodka = 'ot_type_razvodka-$spr_ot_type_razvodkaId' onclick='modalWindow.checkSpr_ot_systemheat_layout($spr_ot_type_razvodkaId)'>";
				$str_ot_type_razvodka .="<td name='ot_razvodka_type_name'>".$params['name']."</td>";	
				$str_ot_type_razvodka .="</tr>";	
				}
			}
			echo $str_ot_type_razvodka;
        }
    }



	public function add_ot_nazn_sar()
    {

        $this->load->model('Spr_ot_nazn_sar');

        $params = $this->request->post;
		
		$str_ot_nazn_sar = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$str_ot_nazn_sarId = $this->model->spr_ot_nazn_sar->updateObj_ot_personal_sar($params);
		
		
		}else{
            $str_ot_nazn_sarId = $this->model->spr_ot_nazn_sar->createSpr_ot_nazn_sar($params);
            

			if($str_ot_nazn_sarId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_nazn_sar ="<tr class = 'item-$str_ot_nazn_sarId'>";
				$str_ot_nazn_sar .="<td name='ot_nazn_sar_name'>".$params['name']."</td>";
				$str_ot_nazn_sar .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$str_ot_nazn_sarId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($str_ot_nazn_sarId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				/*$str_ot_nazn_sar ="<tr ot_nazn_sar = 'ot_nazn_sar-$str_ot_nazn_sarId' onclick='modalWindow.checkSpr_ot_nazn_sar($str_ot_nazn_sarId)'>";
				$str_ot_nazn_sar .="<td name='ot_nazn_sar_name'>".$params['name']."</td>";*/

				$str_ot_nazn_sar = "<option value='$str_ot_nazn_sarId'>".$params['name']."</option>";
				
				}
			}
			echo $str_ot_nazn_sar;
        }
    }

	public function add_og_type_home()
    {

        $this->load->model('Spr_type_home');

        $params = $this->request->post;
		
		$str_og_type_home = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_type_homeId = $this->model->spr_type_home->updateSpr_type_home($params);
		
		
		}else{
            $spr_type_homeId = $this->model->spr_type_home->createSpr_type_home($params);
            

			if($spr_type_homeId != 0){
				
				if($params['guides_place']== 2){
				$str_og_type_home ="<tr class = 'item-$spr_type_homeId'>";
				$str_og_type_home .="<td name='og_type_home_name'>".$params['name']."</td>";
				$str_og_type_home .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_type_homeId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_type_homeId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_og_type_home = "<option value='$spr_type_homeId'>".$params['name']."</option>";	
				}
			}
			echo $str_og_type_home;
        }
    }

	public function add_oe_energy_type()
    {

        $this->load->model('Spr_oe_energy_type');

        $params = $this->request->post;
		
		$str_oe_energy_type = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_oe_energy_typeId = $this->model->spr_oe_energy_type->updateSpr_oe_energy_type($params);
		
		
		}else{
            $spr_oe_energy_typeId = $this->model->spr_oe_energy_type->createSpr_oe_energy_type($params);
            

			if($spr_oe_energy_typeId != 0){
				
				if($params['guides_place']== 2){
				$str_oe_energy_type ="<tr class = 'item-$spr_oe_energy_typeId'>";
				$str_oe_energy_type .="<td name='oe_energy_type_name'>".$params['name']."</td>";
				$str_oe_energy_type .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_oe_energy_typeId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_oe_energy_typeId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_oe_energy_type = "<option value='$spr_oe_energy_typeId'>".$params['name']."</option>";	
				}
			}
			echo $str_oe_energy_type;
        }
    }


	public function add_kind_of_activity()
    {

        $this->load->model('Spr_kind_of_activity');

        $params = $this->request->post;
		
		$str_kind_of_activity = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_kind_of_activityId = $this->model->spr_kind_of_activity->updateSpr_kind_of_activity($params);
		
		
		}else{
            $spr_kind_of_activityId = $this->model->spr_kind_of_activity->createSpr_kind_of_activity($params);
            

			if($spr_kind_of_activityId != 0){
				
					if($params['guides_place']== 2){
					$str_kind_of_activity ="<tr class = 'item-$spr_kind_of_activityId'>";
					$str_kind_of_activity .="<td name='kind_of_activity_name'>".$params['name']."</td>";
					$str_kind_of_activity .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_kind_of_activityId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_kind_of_activityId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";	
					}else{
					$str_kind_of_activity = "<option value='$spr_kind_of_activityId'>".$params['name']."</option>";	
					}

			}
			echo $str_kind_of_activity;
        }
    }	

	public function add_category_line()
    {

        $this->load->model('Spr_oe_category_line');

        $params = $this->request->post;
		
		$str_category_line = '';
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_category_lineId = $this->model->spr_oe_category_line->updateSpr_oe_category_line($params);
		
		
		}else{
            $spr_category_lineId = $this->model->spr_oe_category_line->createSpr_oe_category_line($params);
            

			if($spr_category_lineId != 0){
				
					if($params['guides_place']== 2){
					$str_category_line ="<tr class = 'item-$spr_category_lineId'>";
					$str_category_line .="<td name='cat_line_name'>".$params['name']."</td>";
					$str_category_line .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_category_lineId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_category_lineId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";	
					}else{
					$str_category_line = "<option value='$spr_category_lineId'>".$params['name']."</option>";	
					}

			}
			echo $str_category_line;
        }
    }
	
	public function add_diametr_tube()
    {

        $this->load->model('Spr_ot_diametr_tube');

        $params = $this->request->post;
//print_r($params);		
		$str_diametr_tube = '';
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_diametr_tubeId = $this->model->spr_ot_diametr_tube->updateSpr_ot_diametr_tube($params);
		
		
		}else{
            $spr_ot_diametr_tubeId = $this->model->spr_ot_diametr_tube->createSpr_ot_diametr_tube($params);
            

			if($spr_ot_diametr_tubeId != 0){
				
					if($params['guides_place']== 2){
					$str_diametr_tube ="<tr class = 'item-$spr_ot_diametr_tubeId'>";
					$str_diametr_tube .="<td name='diametr_tube_name'>".$params['name']."</td>";
					$str_diametr_tube .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_diametr_tubeId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_diametr_tubeId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";	
					}else{
					$str_diametr_tube = "<option value='$spr_ot_diametr_tubeId'>".$params['name']."</option>";	
					}

			}
			echo $str_diametr_tube;
        }
    }	

	public function add_type_object()
    {

        $this->load->model('Spr_type_object');

        $params = $this->request->post;
//print_r($params);		
		$str_type_object = '';
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_type_objectId = $this->model->spr_type_object->updateSpr_type_object($params);
		
		
		}else{
            $spr_type_objectId = $this->model->spr_type_object->createSpr_type_object($params);
            

			if($spr_type_objectId != 0){
				
					if($params['guides_place']== 2){
					$str_type_object ="<tr class = 'item-$spr_type_objectId'>";
					$str_type_object .="<td name='type_object_name'>".$params['name']."</td>";
					$str_type_object .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_type_objectId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_type_objectId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";	
					}else{
					$str_type_object = "<option value='$spr_type_objectId'>".$params['name']."</option>";	
					}

			}
			echo $str_type_object;
        }
    }
	
	public function add_ot_heatnet_type_iso()
    {

        $this->load->model('Spr_ot_heatnet_type_iso');

        $params = $this->request->post;
		
		$str_ot_heatnet_type_iso = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_heatnet_type_isoId = $this->model->spr_ot_heatnet_type_iso->updateSpr_ot_heatnet_type_iso($params);
		
		
		}else{
            $spr_ot_heatnet_type_isoId = $this->model->spr_ot_heatnet_type_iso->createSpr_ot_heatnet_type_iso($params);
            

			if($spr_ot_heatnet_type_isoId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_heatnet_type_iso ="<tr class = 'item-$spr_ot_heatnet_type_isoId'>";
				$str_ot_heatnet_type_iso .="<td name='ot_heatnet_type_iso_name'>".$params['name']."</td>";
				$str_ot_heatnet_type_iso .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_heatnet_type_isoId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_heatnet_type_isoId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_heatnet_type_iso = "<option value='$spr_ot_heatnet_type_isoId'>".$params['name']."</option>";	
				}
			}
			echo $str_ot_heatnet_type_iso;
        }
    }	
	
	
	public function add_ot_functions()
    {

        $this->load->model('Spr_ot_functions');

        $params = $this->request->post;
		
		$str_ot_functions = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_functionsId = $this->model->spr_ot_functions->updateSpr_ot_functions($params);
		
		
		}else{
            $spr_ot_functionsId = $this->model->spr_ot_functions->createSpr_ot_functions($params);
            

			if($spr_ot_functionsId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_functions ="<tr class = 'item-$spr_ot_functionsId'>";
				$str_ot_functions .="<td name='ot_functions_name'>".$params['name']."</td>";
				$str_ot_functions .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_functionsId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_functionsId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_functions ="<tr ot_functions = 'ot_functions-$spr_ot_functionsId' onclick='modalWindow.checkSpr_ot_functions($spr_ot_functionsId)'>";
				$str_ot_functions .="<td name='ot_functions_name'>".$params['name']."</td>";	
				$str_ot_functions .="</tr>";	
				}
			}
			echo $str_ot_functions;
        }
    }	
	
	
	
	public function add_ot_cat()
    {

        $this->load->model('Spr_ot_cat');

        $params = $this->request->post;
		
		$str_ot_cat = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_ot_catId = $this->model->spr_ot_cat->updateSpr_ot_cat($params);
		
		
		}else{
            $spr_ot_catId = $this->model->spr_ot_cat->createSpr_ot_cat($params);
            

			if($spr_ot_catId != 0){
				
				if($params['guides_place']== 2){
				$str_ot_cat ="<tr class = 'item-$spr_ot_catId'>";
				$str_ot_cat .="<td name='ot_cat_name'>".$params['name']."</td>";
				$str_ot_cat .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_ot_catId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_ot_catId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_ot_cat ="<tr ot_cat = 'ot_cat-$spr_ot_catId' onclick='modalWindow.checkSpr_ot_cat($spr_ot_catId)'>";
				$str_ot_cat .="<td name='ot_cat_name'>".$params['name']."</td>";
				$str_ot_cat .="</tr>";
				}
			}
			echo $str_ot_cat;
        }
    }	
	
	public function add_oti_type_fuel()
    {

        $this->load->model('Spr_oti_type_fuel');

        $params = $this->request->post;
		
		$str_oti_type_fuel = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_oti_type_fuelId = $this->model->spr_oti_type_fuel->updateSpr_oti_type_fuel($params);
		
		
		}else{
            $spr_oti_type_fuelId = $this->model->spr_oti_type_fuel->createSpr_oti_type_fuel($params);
            

			if($spr_oti_type_fuelId != 0){
				
				if($params['guides_place']== 2){
				$str_oti_type_fuel ="<tr class = 'item-$spr_oti_type_fuelId'>";
				$str_oti_type_fuel .="<td name='oti_type_fuel_name'>".$params['name']."</td>";
				$str_oti_type_fuel .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_oti_type_fuelId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_oti_type_fuelId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_oti_type_fuel ="<tr oti_type_fuel = 'oti_type_fuel-$spr_oti_type_fuelId' onclick='modalWindow.checkSpr_oti_type_fuel($spr_oti_type_fuelId)'>";
				$str_oti_type_fuel .="<td name='oti_type_fuel_name'>".$params['name']."</td>";	
				$str_oti_type_fuel .="</tr>";	
				}
			}
			echo $str_oti_type_fuel;
        }
    }	


	public function add_oti_type_fuel_rezerv()
    {

        $this->load->model('Spr_oti_type_fuel_rezerv');

        $params = $this->request->post;
		
		$str_oti_type_fuel_rezerv = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_oti_type_fuel_rezervId = $this->model->spr_oti_type_fuel_rezerv->updateSpr_oti_type_fuel_rezerv($params);
		
		
		}else{
            $spr_oti_type_fuel_rezervId = $this->model->spr_oti_type_fuel_rezerv->createSpr_oti_type_fuel_rezerv($params);
            

			if($spr_oti_type_fuel_rezervId != 0){
				
				if($params['guides_place']== 2){
				$str_oti_type_fuel_rezerv ="<tr class = 'item-$spr_oti_type_fuel_rezervId'>";
				$str_oti_type_fuel_rezerv .="<td name='oti_type_fuel_rezerv_name'>".$params['name']."</td>";
				$str_oti_type_fuel_rezerv .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_oti_type_fuel_rezervId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_oti_type_fuel_rezervId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_oti_type_fuel_rezerv ="<tr oti_type_fuel_rezerv = 'oti_type_fuel_rezerv-$spr_oti_type_fuel_rezervId' onclick='modalWindow.checkSpr_oti_type_fuel_rezerv($spr_oti_type_fuel_rezervId)'>";
				$str_oti_type_fuel_rezerv .="<td name='oti_type_fuel_rezerv_name'>".$params['name']."</td>";	
				$str_oti_type_fuel_rezerv .="</tr>";	
				}
			}
			echo $str_oti_type_fuel_rezerv;
        }
    }	
	
	public function add_og_type_gaz()
    {

        $this->load->model('Spr_type_gaz');

        $params = $this->request->post;
		
		$str_type_gaz = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_type_gazId = $this->model->spr_type_gaz->updateSpr_type_gaz($params);
		
		
		}else{
            $spr_type_gazId = $this->model->spr_type_gaz->createSpr_type_gaz($params);
            

			if($spr_type_gazId != 0){
				
				if($params['guides_place']== 2){
					$str_type_gaz ="<tr class = 'item-$spr_type_gazId'>";
					$str_type_gaz .="<td name='og_type_gaz_name'>".$params['name']."</td>";
					$str_type_gaz .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_type_gazId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_type_gazId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
					$str_type_gaz ="<tr type_gaz = 'type_gaz-$spr_type_gazId' onclick='modalWindow.checkSpr_type_gaz($spr_type_gazId)'>";
					$str_type_gaz .="<td name='og_type_gaz_name'>".$params['name']."</td>";
					$str_type_gaz .="</tr>";
				}
			}
			echo $str_type_gaz;
        }
    }	



	public function add_og_to_gaz()
    {

        $this->load->model('Spr_og_to_gaz');

        $params = $this->request->post;
		
		$str_type_gaz = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_to_gazId = $this->model->spr_og_to_gaz->updateSpr_og_to_gaz($params);
		
		
		}else{
            $spr_to_gazId = $this->model->spr_og_to_gaz->createSpr_og_to_gaz($params);
            

			if($spr_to_gazId != 0){
				
				if($params['guides_place']== 2){
				$str_type_gaz ="<tr class = 'item-$spr_to_gazId'>";
				$str_type_gaz .="<td name='og_to_gaz_name'>".$params['name']."</td>";
				$str_type_gaz .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_to_gazId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_to_gazId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_type_gaz ="<tr to_gaz = 'to_gaz-$spr_to_gazId' onclick='modalWindow.checkSpr_to_gaz($spr_to_gazId)'>";
				$str_type_gaz .="<td name='og_to_gaz_name'>".$params['name']."</td>";
				$str_type_gaz .="</tr>";
				}
			}
			echo $str_type_gaz;
        }
    }

	public function add_og_obsl_go()
    {

        $this->load->model('Spr_og_obsl_go');

        $params = $this->request->post;
		
		$str_obsl_go = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_obsl_goId = $this->model->spr_og_obsl_go->updateSpr_og_obsl_go($params);
		
		
		}else{
            $spr_obsl_goId = $this->model->spr_og_obsl_go->createSpr_og_obsl_go($params);
            

			if($spr_obsl_goId != 0){
				
				if($params['guides_place']== 2){
				$str_obsl_go ="<tr class = 'item-$spr_obsl_goId'>";
				$str_obsl_go .="<td name='og_obsl_go_name'>".$params['name']."</td>";
				$str_obsl_go .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_obsl_goId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_obsl_goId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_obsl_go ="<tr obsl_go = 'obsl_go-$spr_obsl_goId' onclick='modalWindow.checkSpr_obsl_go($spr_obsl_goId)'>";
				$str_obsl_go .="<td name='og_obsl_go_name'>".$params['name']."</td>";
				$str_obsl_go .="</tr>";
				}
			}
			echo $str_obsl_go;
        }
    }



	public function add_og_accidents()
    {

        $this->load->model('Spr_og_accidents');

        $params = $this->request->post;
		
		$str_go_accidents = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_go_accidentsId = $this->model->spr_og_accidents->updateSpr_og_accidents($params);
		
		
		}else{
            $spr_go_accidentsId = $this->model->spr_og_accidents->createSpr_og_accidents($params);
            

			if($spr_go_accidentsId != 0){
				
				if($params['guides_place']== 2){
				$str_go_accidents ="<tr class = 'item-$spr_go_accidentsId'>";
				$str_go_accidents .="<td name='og_accidents_name'>".$params['name']."</td>";
				$str_go_accidents .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_go_accidentsId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_go_accidentsId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_go_accidents ="<tr go_accidents = 'go_accidents-$spr_go_accidentsId' onclick='modalWindow.checkSpr_go_accidents($spr_go_accidentsId)'>";
				$str_go_accidents .="<td name='og_accidents_name'>".$params['name']."</td>";
				$str_go_accidents .="</tr>";
				}
			}
			echo $str_go_accidents;
        }
    }

	
	public function add_og_flue_mater()
    {

        $this->load->model('Spr_flue_mater');

        $params = $this->request->post;
		
		$og_flue_mater = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_flue_materId = $this->model->spr_flue_mater->updateSpr_flue_mater($params);
		
		
		}else{
            $spr_flue_materId = $this->model->spr_flue_mater->createSpr_flue_mater($params);
            

			if($spr_flue_materId != 0){
				
				if($params['guides_place']== 2){
				$og_flue_mater ="<tr class = 'item-$spr_flue_materId'>";
				$og_flue_mater .="<td name='og_flue_mater_name'>".$params['name']."</td>";
				$og_flue_mater .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_flue_materId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_flue_materId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$og_flue_mater ="<tr flue_mater = 'flue_mater-$spr_flue_materId' onclick='modalWindow.checkSpr_flue_mater($spr_flue_materId)'>";
				$og_flue_mater .="<td name='og_flue_mater_name'>".$params['name']."</td>";	
				$og_flue_mater .="</tr>";	
				}
			}
			echo $og_flue_mater;
        }
    }	
	
	
	
	public function add_og_flue()
    {

        $this->load->model('Spr_og_flue');

        $params = $this->request->post;
		
		$og_flue = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_vidDymId = $this->model->spr_og_flue->updateSPR_VidDym($params);
		
		
		}else{
            $spr_vidDymId = $this->model->spr_og_flue->createSPR_VidDym($params);
            

			if($spr_vidDymId != 0){
				
				if($params['guides_place']== 2){
				$og_flue ="<tr class = 'item-$spr_vidDymId'>";
				$og_flue .="<td name='og_flue_name'>".$params['name']."</td>";
				$og_flue .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_vidDymId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_vidDymId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$og_flue ="<tr og_flue = 'og_flue-$spr_vidDymId' onclick='modalWindow.checkSpr_og_flue($spr_vidDymId)'>";
				$og_flue .="<td name='og_flue_name'>".$params['name']."</td>";				
				$og_flue .="</tr>";				
				}
			}
			echo $og_flue;
        }
    }	
	
	
	public function add_og_device_type()
    {

        $this->load->model('Spr_og_device_type');

        $params = $this->request->post;
		
		$og_device_type = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_og_device_typeId = $this->model->spr_og_device_type->updateSpr_og_device_type($params);
		
		
		}else{
            $spr_og_device_typeId = $this->model->spr_og_device_type->createSpr_og_device_type($params);
            

			if($spr_og_device_typeId != 0){
				
				if($params['guides_place']== 2){
				$og_device_type ="<tr class = 'item-$spr_og_device_typeId'>";
				$og_device_type .="<td name='og_device_type_name'>".$params['name']."</td>";
				$og_device_type .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_og_device_typeId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_og_device_typeId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$og_device_type = "<option value='$spr_og_device_typeId'>".$params['name']."</option>";	
				}
			}
			echo $og_device_type;
        }
    }	
	
	
	public function add_oe_klvl_volt()
    {

        $this->load->model('Spr_oe_klvl_volt');

        $params = $this->request->post;
		
		$oe_klvl_volt = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_oe_klvl_voltId = $this->model->spr_oe_klvl_volt->updateSpr_oe_klvl_volt($params);
		
		
		}else{
            $spr_oe_klvl_voltId = $this->model->spr_oe_klvl_volt->createSpr_oe_klvl_volt($params);
            

			if($spr_oe_klvl_voltId != 0){
				
				if($params['guides_place']== 2){
				$oe_klvl_volt ="<tr class = 'item-$spr_oe_klvl_voltId'>";
				$oe_klvl_volt .="<td name='oe_klvl_volt_name'>".$params['name']."</td>";
				$oe_klvl_volt .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_oe_klvl_voltId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_oe_klvl_voltId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$oe_klvl_volt = "<option value='$spr_oe_klvl_voltId'>".$params['name']."</option>";	
				}
			}
			echo $oe_klvl_volt;
        }
    }	
	
	public function add_oe_klvl_type()
    {

        $this->load->model('Spr_oe_klvl_type');

        $params = $this->request->post;
		
		$oe_klvl_type = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_oe_klvl_typeId = $this->model->spr_oe_klvl_type->updateSpr_oe_klvl_type($params);
		
		
		}else{
            $spr_oe_klvl_typeId = $this->model->spr_oe_klvl_type->createSpr_oe_klvl_type($params);
            

			if($spr_oe_klvl_typeId != 0){
				
				if($params['guides_place']== 2){
				$oe_klvl_type ="<tr class = 'item-$spr_oe_klvl_typeId'>";
				$oe_klvl_type .="<td name='oe_klvl_type_name'>".$params['name']."</td>";
				$oe_klvl_type .="<td name='oe_klvl_type_sokr_name'>".$params['sokr_name']."</td>";
				$oe_klvl_type .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_oe_klvl_typeId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_oe_klvl_typeId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$oe_klvl_type = "<option value='$spr_oe_klvl_typeId'>".$params['name']."</option>";	
				}
			}
			echo $oe_klvl_type;
        }
    }	
	
	public function add_region()
    {

        $this->load->model('Region');

        $params = $this->request->post;
		
		$region = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$regionId = $this->model->region->updateRegion($params);
		
		
		}else{
            $regionId = $this->model->region->createRegion($params);
            

			if($regionId != 0){
				
				if($params['guides_place']== 2){
				$region ="<tr class = 'item-$regionId'>";
				$region .="<td name='region_name'>".$params['name']."</td>";
				$region .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$regionId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($regionId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$region = "<option value='$regionId'>".$params['name']."</option>";	
				}
			}
			echo $region;
        }
    }	
	
	
	public function add_district()
    {

        $this->load->model('District');

        $params = $this->request->post;
		
		$districts = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$districtId = $this->model->district->updateDistrict($params);
		
		
		}else{
            $districtId = $this->model->district->createDistrict($params);
            

			if($districtId != 0){
				
				if($params['guides_place']== 2){
				$districts ="<tr class = 'item-$districtId'>";
				$districts .="<td name='district_name'>".$params['name']."</td>";
				$districts .="<td name='region_by_district_name' type_reg_district='".$params['idSprRegion']."'>".$params['reg_name']."</td>";
				$districts .="<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$districtId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($districtId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$districts = "<option value='$districtId'>".$params['name']."</option>";	
				}
			}
			echo $districts;
        }
    }	
	
	public function add_admin()
    {

        $this->load->model('Spr_admin');

        $params = $this->request->post;
		
		$spr_admins = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_adminId = $this->model->spr_admin->updateSpr_admin($params);
		
		
		}else{
            $spr_adminId = $this->model->spr_admin->createSpr_admin($params);
            

			if($spr_adminId != 0){
				
				if($params['guides_place']== 2){
				$spr_admins ="<tr class = 'item-$spr_adminId'>";
				$spr_admins .="<td name='admin_name'>".$params['name']."</td>";
				$spr_admins .="<td name='region_by_admin_name' type_reg_admin= '".$params['idSprRegion']."'>".$params['reg_name']."</td>";
				$spr_admins .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_adminId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_adminId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$spr_admins = "<option value='$spr_adminId'>".$params['name']."</option>";	
				}
			}
			echo $spr_admins;
        }
    }	


	public function add_adminBycity()
    {

        $this->load->model('Spr_admin');
        $params = $this->request->post;	


		if (strlen($params['id']) == 0){
			$spr_adminId = $this->model->spr_admin->createSpr_adminByCity($params);
		}
    }


	public function add_regionBycity()
    {

        $this->load->model('Region');
        $params = $this->request->post;	
		if (strlen($params['id']) == 0){
			$spr_adminId = $this->model->region->createSpr_regionByCity($params);
		}
    }
	
	
	public function add_districtBycity()
    {

        $this->load->model('District');
        $params = $this->request->post;	

		if (strlen($params['id']) == 0){
			$spr_adminId = $this->model->district->createSpr_districtByCity($params);
		}
    }	

	public function add_adminBydistrict()
    {

        $this->load->model('Spr_admin');
        $params = $this->request->post;	
		if (strlen($params['id']) == 0){
			$spr_adminId = $this->model->spr_admin->createSpr_adminByDistrict($params);
		}
    }


	public function add_branch()
    {

        $this->load->model('Branch');

        $params = $this->request->post;
		
		$spr_branch = '';
	

	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$branchId = $this->model->branch->updateBranch($params);
		
		
		}else{
            $branchId = $this->model->branch->createBranch($params);
            

			if($branchId != 0){
				
				if($params['guides_place']== 2){
				$spr_branch ="<tr class = 'item-$branchId'>";
				$spr_branch .="<td name='branch_name'>".$params['name']."</td>";
				$spr_branch .="<td name='branch_adress'>".$params['branch_adress']."</td>";
				$spr_branch .="<td name='branch_phone_cod'>".$params['branch_phone_cod']."</td>";
				$spr_branch .="<td name='branch_phone'>".$params['branch_phone']."</td>";
				$spr_branch .="<td name='branch_fax'>".$params['branch_fax']."</td>";
				$spr_branch .="<td name='branch_email'>".$params['branch_email']."</td>";
				$spr_branch .="<td name='branch_sokr_name'>".$params['branch_sokr_name']."</td>";

				$spr_branch .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$branchId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($branchId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$spr_branch = "<option value='$branchId'>".$params['name']."</option>";	
				}
			}
			echo $spr_branch;
        }
    }	
	
	
	public function add_department()
    {

        $this->load->model('Department');

        $params = $this->request->post;
		
		$spr_department = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$departmentId = $this->model->department->updateDepartment($params);
		
		
		}else{
            $departmentId = $this->model->department->createDepartment($params);
            


			if($departmentId != 0){
				if($params['guides_place']== 2){
				$spr_department ="<tr class = 'item-$departmentId'>";
				$spr_department .="<td name='department_name'>".$params['name']."</td>";
				$spr_department .="<td name='type_property_by_department_name' type_department='".$params['idSprDepartment']."'>".$params['type_prop_name']."</td>";
				$spr_department .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$departmentId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($departmentId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$spr_department = "<option value='$departmentId'>".$params['name']."</option>";	
				}
			}
			echo $spr_department;
        }
    }	
	
	
	public function add_city()
    {

        $this->load->model('City');

        $params = $this->request->post;
		
		$spr_city = '';
		$cityId = 0;
//print_r($params);
		if(isset($params['id']) && strlen($params['id']) > 0) {
			$cityId = $this->model->city->updateCity($params);
		
		
		}else{
			
			$check_city = $this->model->city->getCityDataByName($params['name']);
			//print_r($check_city);
			if($check_city[0]['id_spr_district'] != $params['id_spr_district']){
				$cityId = $this->model->city->createCityGuides($params);
            }

//print_r($cityId);
			if($cityId != 0){
				if($params['guides_place']== 2){
				$spr_city ="<tr class = 'item-$cityId'>";
				$spr_city .="<td name='city_name'>".$params['name']."</td>";
				$spr_city .="<td name='region_by_city' regionNameFact='".$params['id_spr_region']."'>".$params['region_by_city']."</td>";
				$spr_city .="<td name='district_by_city' districtNameFact='".$params['id_spr_district']."'>".$params['district_by_city']."</td>";
			/*	$spr_city .="<td name='is_region' key_region='".$params['key_region']."'>".($params['key_region'] == 1 ? 'да' : 'нет')."</td>";
				$spr_city .="<td name='is_district' key_district='".$params['key_district']."'>".($params['key_district'] == 1 ? 'да' : 'нет')."</td>";
				$spr_city .="<td name='is_admin' key_admin='".$params['key_admin']."'>".($params['key_admin'] == 1 ? 'да' : 'нет')."</td>";*/
				
				$spr_city .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$cityId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($cityId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$spr_city = "<option value='$cityId'>".$params['name']."</option>";	
				}
			}
			echo $spr_city;
        }
    }	
	
	
	public function add_city_zone()
    {

        $this->load->model('CityZone');

        $params = $this->request->post;
		
		$spr_city_zone = '';
	
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$cityZoneId = $this->model->cityZone->updateCityZone($params);
		
		
		}else{
            $cityZoneId = $this->model->cityZone->createCityZone($params);
            


			if($cityZoneId != 0){
				if($params['guides_place']== 2){
				$spr_city_zone ="<tr class = 'item-$cityZoneId'>";
				$spr_city_zone .="<td name='city_zone_name'>".$params['name']."</td>";
				$spr_city_zone .="<td name='region_by_city_zone' region_city_zone='".$params['id_spr_region']."'>".$params['region_by_city_zone']."</td>";
				$spr_city_zone .="<td name='district_by_city_zone' district_city_zone='".$params['id_spr_district']."'>".$params['district_by_city_zone']."</td>";
				$spr_city_zone .="<td name='city_by_city_zone' city_city_zone='".$params['id_spr_city']."'>".$params['city_by_city_zone']."</td>";

				
				$spr_city_zone .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$cityZoneId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($cityZoneId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$spr_city_zone = "<option value='$cityZoneId'>".$params['name']."</option>";	
				}
			}
			echo $spr_city_zone;
        }
    }	
	
	
	public function add_otdel()
    {

        $this->load->model('Otdel');

        $params = $this->request->post;
		
		$spr_otdel = '';
//print_r($params);	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$this->model->otdel->updateOtdel($params);
		
		
		}else{
            $otdelId = $this->model->otdel->createOtdel($params);
            

			if($otdelId != 0){
				if($params['guides_place']== 2){
				$spr_otdel ="<tr class = 'item-$otdelId'>";
				$spr_otdel .="<td name='otdel_name'>".$params['otdel_name']."</td>";
				$spr_otdel .="<td name='branch_by_otdel' type_branch_otdel='".$params['id_spr_branch']."'>".$params['branch_name']."</td>";
				$spr_otdel .="<td name='podrazd_by_otdel' type_podrazd_otdel='".$params['id_spr_podrazd']."'>".$params['podrazd_name']."</td>";
				$spr_otdel .="<td name='otdel_adress'>".$params['otdel_adress']."</td>";
				$spr_otdel .="<td name='otdel_phone_cod'>".$params['otdel_phone_cod']."</td>";
				$spr_otdel .="<td name='otdel_phone'>".$params['otdel_phone']."</td>";
				$spr_otdel .="<td name='otdel_fax'>".$params['otdel_fax']."</td>";
				$spr_otdel .="<td name='otdel_email'>".$params['otdel_email']."</td>";
				$spr_otdel .="<td name='otdel_sokr_name'>".$params['otdel_sokr_name']."</td>";

				$spr_otdel .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$otdelId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($otdelId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$spr_otdel = "<option value='$otdelId'>".$params['otdel_name']."</option>";	
				}
			}
			echo $spr_otdel;
        }
    }	
	
	
	public function add_podrazdelenie()
    {

        $this->load->model('Podrazdelenie');

        $params = $this->request->post;
		
		$spr_podrazdelenie = '';
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$this->model->podrazdelenie->updatePodrazdelenie($params);
		
		
		}else{
            $podrazdelenieId = $this->model->podrazdelenie->createPodrazdelenie($params);
            
 
			if($podrazdelenieId != 0){
				if($params['guides_place']== 2){
				$spr_podrazdelenie ="<tr class = 'item-$podrazdelenieId'>";
				$spr_podrazdelenie .="<td name='podrazdelenie_name'>".$params['podrazdelenie_name']."</td>";
				$spr_podrazdelenie .="<td name='branch_by_podrazdelenie' type_branch_podrazdelenie='".$params['id_spr_branch']."'>".$params['branch_name']."</td>";
				$spr_podrazdelenie .="<td name='podrazdelenie_adress'>".$params['podrazdelenie_adress']."</td>";
				$spr_podrazdelenie .="<td name='podrazdelenie_phone_cod'>".$params['podrazdelenie_phone_cod']."</td>";
				$spr_podrazdelenie .="<td name='podrazdelenie_phone'>".$params['podrazdelenie_phone']."</td>";
				$spr_podrazdelenie .="<td name='podrazdelenie_fax'>".$params['podrazdelenie_fax']."</td>";
				$spr_podrazdelenie .="<td name='podrazdelenie_email'>".$params['podrazdelenie_email']."</td>";
				$spr_podrazdelenie .="<td name='podrazdelenie_sokr_name'>".$params['podrazdelenie_sokr_name']."</td>";

				$spr_podrazdelenie .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$podrazdelenieId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($podrazdelenieId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$spr_podrazdelenie = "<option value='$podrazdelenieId'>".$params['podrazdelenie_name']."</option>";	
				}
			}
			echo $spr_podrazdelenie;
        }
    }	
	
	
	
	
	
	
	
	
	
	
	public function removeItem()
    {
		$params = $this->request->post;
  		$guides_links = $params['name_table'];
		
		switch($guides_links){

				/***** Справочник филиалов **********/
				case "spr_branch":
						$params = $this->request->post;
						$this->load->model('Branch');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->branch->removeItems($params['item_id']);
							}
					break;
				/***** Справочник областей **********/			
				case "spr_region":
						$params = $this->request->post;
						$this->load->model('Region');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->region->removeItems($params['item_id']);
							}
					break;
				/***** Справочник городов **********/			
				case "spr_city":
						$params = $this->request->post;
						$this->load->model('City');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->city->removeItems($params['item_id']);
							}
					break;
				/***** Справочник районов областей **********/			
				case "spr_district":
						$params = $this->request->post;
						$this->load->model('District');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->district->removeItems($params['item_id']);
							}
					break;
				/***** Справочник районов города **********/			
				case "spr_city_zone":
						$params = $this->request->post;
						$this->load->model('CityZone');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->cityZone->removeItems($params['item_id']);
							}
					break;
				/***** Справочник административных районов **********/			
				case "spr_admin":
						$params = $this->request->post;
						$this->load->model('Spr_admin');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_admin->removeItems($params['item_id']);
							}
					break;
				/***** Справочник линий снабжения **********/			
				case "spr_oe_klvl_type":
						$params = $this->request->post;
						$this->load->model('Spr_oe_klvl_type');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_oe_klvl_type->removeItems($params['item_id']);
							}
					break;
				/***** Справочник напряжений линий  **********/			
				case "spr_oe_klvl_volt":
						$params = $this->request->post;
						$this->load->model('Spr_oe_klvl_volt');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_oe_klvl_volt->removeItems($params['item_id']);
							}
					break;
				/***** Справочник типов газового оборудования  **********/			
				case "spr_og_device_type":
						$params = $this->request->post;
						$this->load->model('Spr_og_device_type');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_og_device_type->removeItems($params['item_id']);
							}
					break;
				/***** Справочник видов дымоходов  **********/			
				case "spr_og_flue":
						$params = $this->request->post;
						$this->load->model('Spr_og_flue');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_og_flue->removeItems($params['item_id']);
							}
					break;
				/***** Справочник материалов дымоходов  **********/			
				case "spr_og_flue_mater":
						$params = $this->request->post;
						$this->load->model('Spr_flue_mater');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_flue_mater->removeItems($params['item_id']);
							}
					break;					
				/***** Справочник видов газа  **********/			
				case "spr_og_type_gaz":
						$params = $this->request->post;
						$this->load->model('Spr_type_gaz');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_type_gaz->removeItems($params['item_id']);
							}
					break;	
				/***** Справочник видов газа  **********/			
				case "spr_og_to_gaz":
						$params = $this->request->post;
						$this->load->model('Spr_og_to_gaz');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_og_to_gaz->removeItems($params['item_id']);
							}
					break;
				/***** Справочник видов газа  **********/			
				case "spr_og_obsl_go":
						$params = $this->request->post;
						$this->load->model('Spr_og_obsl_go');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_og_obsl_go->removeItems($params['item_id']);
							}
					break;					
				/***** Справочник видов газа  **********/			
				case "spr_og_accidents":
						$params = $this->request->post;
						$this->load->model('Spr_og_accidents');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_og_accidents->removeItems($params['item_id']);
							}
					break;
				/***** Справочник видов топлива котельной  **********/			
				case "spr_oti_type_fuel":
						$params = $this->request->post;
						$this->load->model('Spr_oti_type_fuel');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_oti_type_fuel->removeItems($params['item_id']);
							}
					break;					
				/***** Справочник категорий надежности теплоснабжения  **********/			
				case "spr_ot_cat":
						$params = $this->request->post;
						$this->load->model('Spr_ot_cat');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_cat->removeItems($params['item_id']);
							}
					break;					
				/***** Справочник функциональных назначений объекта  **********/			
				case "spr_ot_functions":
						$params = $this->request->post;
						$this->load->model('Spr_ot_functions');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_functions->removeItems($params['item_id']);
							}
					break;
				/***** Справочник типов тепловой изоляции  **********/			
				case "spr_ot_heatnet_type_iso":
						$params = $this->request->post;
						$this->load->model('Spr_ot_heatnet_type_iso');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_heatnet_type_iso->removeItems($params['item_id']);
							}
					break;
				/***** Справочник ведомств  **********/			
				case "spr_department":
						$params = $this->request->post;
						$this->load->model('Department');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->department->removeItems($params['item_id']);
							}
					break;
				/***** Справочник видов деятельности  **********/			
				case "spr_kind_of_activity":
						$params = $this->request->post;
						$this->load->model('Spr_kind_of_activity');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_kind_of_activity->removeItems($params['item_id']);
							}
					break;
				/***** Справочник видов деятельности  **********/			
				case "spr_oe_category_line":
						$params = $this->request->post;
						$this->load->model('Spr_oe_category_line');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_oe_category_line->removeItems($params['item_id']);
							}
					break;					
				/***** Справочник видов энергии  **********/			
				case "spr_oe_energy_type":
						$params = $this->request->post;
						$this->load->model('Spr_oe_energy_type');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_oe_energy_type->removeItems($params['item_id']);
							}
					break;
				/***** Справочник условных диаметров труб  **********/			
				case "spr_ot_diametr_tube":
						$params = $this->request->post;
						$this->load->model('Spr_ot_diametr_tube');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_diametr_tube->removeItems($params['item_id']);
							}
					break;	
				/***** Справочник условных диаметров труб  **********/			
				case "spr_type_object":
						$params = $this->request->post;
						$this->load->model('Spr_type_object');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_type_object->removeItems($params['item_id']);
							}
					break;						
				/***** Справочник типов здания  **********/			
				case "spr_og_type_home":
						$params = $this->request->post;
						$this->load->model('Spr_type_home');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_type_home->removeItems($params['item_id']);
							}
					break;
				/***** Справочник отделов/РЭГИ  **********/			
				case "spr_otdel":
						$params = $this->request->post;
						$this->load->model('Otdel');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->otdel->removeItems($params['item_id']);
							}
					break;
				/***** Справочник назначений котельной  **********/			
				case "spr_oti_boiler_type":
						$params = $this->request->post;
						$this->load->model('Spr_oti_boiler_type');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_oti_boiler_type->removeItems($params['item_id']);
							}
					break;
					
					
				/***** Справочник видов изоляции  **********/			
				case "spr_ot_type_izol":
						$params = $this->request->post;
						$this->load->model('Spr_ot_type_izol');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_type_izol->removeItems($params['item_id']);
							}
					break;
				/***** Справочник иаметры труб  **********/			
				case "spr_ot_diametr_tube":
						$params = $this->request->post;
						$this->load->model('Spr_ot_diametr_tube');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_diametr_tube->removeItems($params['item_id']);
							}
					break;					
				/***** справочник видов отопительных приборов  **********/			
				case "spr_ot_type_ot_pribor":
						$params = $this->request->post;
						$this->load->model('Spr_ot_type_ot_pribor');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_type_ot_pribor->removeItems($params['item_id']);
							}
					break;					
				/***** справочник справочник видов разводки  **********/			
				case "spr_ot_type_razvodka":
						$params = $this->request->post;
						$this->load->model('Spr_ot_type_razvodka');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_type_razvodka->removeItems($params['item_id']);
							}
					break;					
					
				/***** справочник назначений САР  **********/			
				case "spr_ot_nazn_sar":
						$params = $this->request->post;
						$this->load->model('Spr_ot_nazn_sar');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_nazn_sar->removeItems($params['item_id']);
							}
					break;					
					
				/***** Справочник мест расположения теплообменника  **********/			
				case "spr_ot_gvs_in":
						$params = $this->request->post;
						$this->load->model('Spr_ot_gvs_in');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_gvs_in->removeItems($params['item_id']);
							}
					break;
				/***** Справочник типов схем присоединения систем отопления  **********/			
				case "spr_ot_gvs_open":
						$params = $this->request->post;
						$this->load->model('Spr_ot_gvs_open');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_gvs_open->removeItems($params['item_id']);
							}
					break;
				/***** Справочник типов тепловой изоляции  **********/			
				case "spr_ot_heatnet_type_underground":
						$params = $this->request->post;
						$this->load->model('Spr_ot_heatnet_type_underground');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_heatnet_type_underground->removeItems($params['item_id']);
							}
					break;
				/***** Справочник типов схем присоединения  **********/			
				case "spr_ot_systemheat_dependent":
						$params = $this->request->post;
						$this->load->model('Spr_ot_systemheat_dependent');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_systemheat_dependent->removeItems($params['item_id']);
							}
					break;
				/***** Справочник систем отопления  **********/			
				case "spr_ot_systemheat_water":
						$params = $this->request->post;
						$this->load->model('Spr_ot_systemheat_water');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_systemheat_water->removeItems($params['item_id']);
							}
					break;
				/***** Справочник источников теплоснабжения  **********/			
				case "spr_ot_type_heat_source":
						$params = $this->request->post;
						$this->load->model('Spr_ot_type_heat_source');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_type_heat_source->removeItems($params['item_id']);
							}
					break;
				/***** Справочник видов теплообменника  **********/			
				case "spr_ot_type_to":
						$params = $this->request->post;
						$this->load->model('Spr_ot_type_to');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_type_to->removeItems($params['item_id']);
							}
					break;
				/***** Справочник подразделений  **********/			
				case "spr_podrazdelenie":
						$params = $this->request->post;
						$this->load->model('Podrazdelenie');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->podrazdelenie->removeItems($params['item_id']);
							}
					break;
				/***** Справочник сменности работ  **********/			
				case "spr_shift_of_work":
						$params = $this->request->post;
						$this->load->model('Spr_shift_of_work');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_shift_of_work->removeItems($params['item_id']);
							}
					break;
				/***** Справочник типов населенных пунктов  **********/			
				case "spr_type_city":
						$params = $this->request->post;
						$this->load->model('Spr_type_city');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_type_city->removeItems($params['item_id']);
							}
					break;
				/***** Справочник форм собственности  **********/			
				case "spr_type_property":
						$params = $this->request->post;
						$this->load->model('TypeProperty');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->typeProperty->removeItems($params['item_id']);
							}
					break;
				/***** Справочник адресных объектов  **********/			
				case "spr_type_street":
						$params = $this->request->post;
						$this->load->model('Spr_type_street');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_type_street->removeItems($params['item_id']);
							}
					break;     
				/***** Справочник подразделов по объекту  **********/			
				case "spr_ot_podrazdel":
						$params = $this->request->post;
						$this->load->model('Spr_ot_uzel_block');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_ot_uzel_block->removeItems($params['item_id']);
							}
					break; 	
				/***** Справочник конвертера мощности  **********/			
				case "spr_units_power":
						$params = $this->request->post;
						$this->load->model('Spr_units_power');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_units_power->removeItems($params['item_id']);
							}
					break; 	
				/***** Справочник типов ответственного  **********/			
				case "type_otv":
						$params = $this->request->post;
						$this->load->model('Spr_otv_vibor');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_otv_vibor->removeItems($params['item_id']);
							}
					break;					

		}
	}

	
	





	
}