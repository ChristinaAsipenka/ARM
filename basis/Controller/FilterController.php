<?php

namespace Basis\Controller;
include $_SERVER['DOCUMENT_ROOT']."/ARM/basis/View/functions.php";
use Admin\Controller\AddressController;
use Admin\Controller\AdminController;
use Engine\Helper\Cookie;

class FilterController extends AdminController
{




	
    public function filterlist()
    {
		
		$params = $this->request->post;
	//print_r($params);
		$arr_result = [];
		$access_level = $this->data['access_level'];
		
		$id_user = (isset($params['id_user']) ? $params['id_user'] : '');
		
		$spr_otdel = (isset($params['spr_otdel']) ? $params['spr_otdel'] : '');
		
		$spr_cod_podrazd = (isset($params['spr_cod_podrazd']) ? $params['spr_cod_podrazd'] : '');
		
		$spr_cod_branch = (isset($params['spr_cod_branch']) ? $params['spr_cod_branch'] : '');
		
		$inspection_type = $this->data['inspection_type'];
		
		$arm_group = (isset($params['arm_group']) ? $params['arm_group'] : '');
	
        $this->load->model('Subject');
		
		if($id_user > 0){ /** если пользователь инспектор **/
			
			if($arm_group > 0){
				$arr_result = $this->model->subject->getSubjectByUser($id_user, $arm_group);
			}
				
			
		}elseif($spr_otdel > 0){ /** если пользователь начальник группы **/
			$arr_result = $this->model->subject->getSubjectByGroup($spr_otdel);
	
		}elseif($spr_cod_podrazd > 0){ /** если пользователь начальник МРО **/
				$arr_result = $this->model->subject->getSubjectByMro($spr_cod_podrazd);
				
				
		}elseif($spr_cod_branch > 0){ /** если пользователь представитель АУ **/
			$arr_result = $this->model->subject->getSubjectByBranch($spr_cod_branch);
	
		}/*else{
			$arr_result = $this->model->subject->getSubject();
		}*/
		
		$subject_all_objs = $this->model->subject->getSubjectCount(); // все потребители со всеми объектами

		if(count($arr_result) > 0){
			$str_result = '';
			$n = 1; // номер по порядку
			foreach($arr_result as $arr_item){
				
				$key = array_search($arr_item['id'], array_column($subject_all_objs, 'id'));
				
				
				$str_result .= '<tr class="item-'.$arr_item['id'].'" sum_objects_el="'.$arr_item['sum_objects_el'].'" sum_objects_t="'.$arr_item['sum_objects_t'].'" sum_objects_ti="'.$arr_item['sum_objects_ti'].'" sum_objects_gaz="'.$arr_item['sum_objects_gaz'].'"><td class="list_td">'.$n++.'</td><td>'.$arr_item['id'].'</td>';
				//$str_result .='<td>'.( $arr_item['id_unp'] > 0 ?'<i class="icon-subject"></i>':'<i class="icon-person"></i>').'&nbsp<a href="/ARM/basis/subject/edit/'.$arr_item['id'].'?mode=subject_info" target = "_blank" >'.$arr_item['name'].'</a>';
				
				$str_result .='<td><i class="icon-subject"></i>'.( $arr_item['id_unp'] > 0 ? '' : ' ФЛ: ').'&nbsp<a href="/ARM/basis/subject/edit/'.$arr_item['id'].'?mode=subject_info" target = "_blank" ><span>'.$arr_item['name'].'</span></a>';
				
				//$str_result .=(strlen($arr_item['spr_branch_name']) > 0 ? '<p class="sbj_podr"> ( '.$arr_item['spr_branch_name'] .' / '.$arr_item['spr_name_podrazd'] .' / '.$arr_item['spr_name_otdel'] .' )</p>' : '');
				$str_result .='</td>';
				$str_result .='<td class="list_td"><div class="tooltip"><a href="/ARM/basis/objects/list/'.$arr_item['id'].'"><button class="button-list"><i class="icon-object icons"> '.$arr_item['count_objects'].'/'.$subject_all_objs[$key]['count_objects'].'</i><span class = "tooltiptext">перейти к объектам</span></button></a></div></td>';
				//$str_result .='<td class="list_td"><div class="tooltip"><a href="/ARM/basis/objects/list/'.$arr_item['id'].'"><button class="button-list"><i class="icon-object icons">'.$subject_all_objs[$key]['count_objects'].'</i><span class = "tooltiptext">перейти к объектам</span></button></a></div></td>';
				$str_result .='<td class="list_td">';
				
				if($access_level == 2){ // редактирование доступно только начальникам РЭГИ в рамках своего подразделения. 
					$str_result .=	'<div class="tooltip">
											<a href="/ARM/basis/subject/edit/'.$arr_item['id'].'">
											<button class="button-edit"><i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
											</button>
											</a>
										</div>';
					}
										
				$str_result .=	'<div class="tooltip">
											<button class="button-operations" onclick="modalWindow.openModal(\'openNewInspector\'); modalWindow.findObjs('.$arr_item['id'].')">
												<i class="icon-fixed-width icon-credit-card"></i><span class = "tooltiptext">передать другому инспектору</span>
											</button>
										</div>
										
										<div class="tooltip">
											<button class="button-operations" onclick="modalWindow.openModal(\'openNewSubject\'); modalWindow.setId_sbj('.$arr_item['id'].')">
												<i class="icon-fixed-width icon-crop"></i><span class = "tooltiptext">передать другому потребителю</span>
											</button>
										</div>
										<!--div class="tooltip">
											<button class="button-remove '.($arr_item['count_objects'] >0 && $subject_all_objs[$key]['count_objects'] >0 ? 'no-delete' : '').'" onclick="subject.remove('.$arr_item['id'].')" '.($arr_item['count_objects'] >0 && $subject_all_objs[$key]['count_objects'] >0 ? 'disabled' : '').'>
											<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
											</button>
										</div-->
							  </td>
							</tr>';
			
			}
		}else{
				$str_result = '';	

			
			
		}
	  
	  echo $str_result;
    }
	
	
	public function usersbyotdel()
    {
		$params = $this->request->post;
		$spr_otdel = $params['spr_otdel'];
		$this->load->model('User');		
		$arr_result = $this->model->user->getUsersByOtdel($spr_otdel);
		
		if(count($arr_result) > 0){
			$str_result = '<option>Выберите инспектора</option>';
			foreach($arr_result as $arr_item){
				$str_result .= '<option value="'.$arr_item['id'].'"  arm_gruppa = "'.$arr_item['arm_gruppa'].'">'.$arr_item['fio'].''.($arr_item['arm_gruppa'] == 1 ?  ' (тепло)' : ($arr_item['arm_gruppa'] == 3 ?  ' (электро)' : ($arr_item['arm_gruppa'] == 2 ?  ' (газ)' : ' (нет прав)'))).'</option>';
			
			}
		}else{
			$str_result = '<option>Выберите инспектора</option>';
		}
		
		echo $str_result;
		
	}

	public function otdelbypodrazd()
    {
		$params = $this->request->post;
		$spr_podrazdelenie = $params['spr_cod_podrazd'];
		$this->load->model('Otdel');		
		$arr_result = $this->data['otdel'] = $this->model->otdel->getOtdelByPodrazdelenie($spr_podrazdelenie);
		
		if(count($arr_result) > 0){
			$str_result = '<option>Выберите РЭГИ</option>';
			foreach($arr_result as $arr_item){
				$str_result .= '<option value="'.$arr_item['id'].'">'.$arr_item['sokr_name'].'</option>';
			
			}
		}else{
			$str_result = '<option>Выберите РЭГИ</option>';
		}
		
		echo $str_result;
		
	}
	
	public function podrazdbybranch()
    {
		$params = $this->request->post;
		$spr_branch = $params['spr_cod_branch'];
		$this->load->model('Podrazdelenie');		
		$arr_result = $this->data['podrazdelenie'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($spr_branch);
		
		if(count($arr_result) > 0){
			$str_result = '<option>Выберите МРО</option>';
			foreach($arr_result as $arr_item){
				$str_result .= '<option value="'.$arr_item['id'].'">'.$arr_item['sokr_name'].'</option>';
			
			}
		}else{
			$str_result = '<option>Выберите МРО</option>';
		}
		
		echo $str_result;
		
	}

	public function inspection_type()
	{
		$params = $this->request->post;
		$access_level = $this->data['access_level'];
		$this->load->model('Subject');
		print_r($params);
		$arr_result = $this->model->subject->getSubjectByInspectionType($params);
		
		$subject_all_objs = $this->model->subject->getSubject(); // все потребители со всеми объектами
		
		if(count($arr_result) > 0){
			$str_result = '';
			$n = 1; // номер по порядку
			foreach($arr_result as $arr_item){
				
				$key = array_search($arr_item['id'], array_column($subject_all_objs, 'id'));
				
				
				$str_result .= '<tr class="item-'.$arr_item['id'].'"><td class="list_td">'.$n++.'</td><td>'.$arr_item['id'].'</td>';
				$str_result .='<td>'.( $arr_item['id_unp'] > 0 ?'<i class="icon-subject"></i>':'<i class="icon-person"></i>').'&nbsp<a href="/ARM/basis/subject/edit/'.$arr_item['id'].'?mode=subject_info" target = "_blank" >'.$arr_item['name'].'</a>';
				//$str_result .=(strlen($arr_item['spr_branch_name']) > 0 ? '<p class="sbj_podr"> ( '.$arr_item['spr_branch_name'] .' / '.$arr_item['spr_name_podrazd'] .' / '.$arr_item['spr_name_otdel'] .' )</p>' : '');
				$str_result .='</td>';
				$str_result .='<td class="list_td"><div class="tooltip"><a href="/ARM/basis/objects/list/'.$arr_item['id'].'"><button class="button-list"><i class="icon-object icons"> '.$arr_item['count_objects'].'/'.$subject_all_objs[$key]['count_objects'].'</i><span class = "tooltiptext">перейти к объектам</span></button></a></div></td>';
				$str_result .='<td class="list_td">';
				
				if($access_level == 2){ // редактирование доступно только начальникам РЭГИ в рамках своего подразделения. 
					$str_result .=	'<div class="tooltip">
											<a href="/ARM/basis/subject/edit/'.$arr_item['id'].'">
											<button class="button-edit"><i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
											</button>
											</a>
										</div>';
					}
										
				$str_result .=	'<div class="tooltip">
											<button class="button-operations" onclick="modalWindow.openModal(\'openNewInspector\'); modalWindow.findObjs('.$arr_item['id'].')">
												<i class="icon-fixed-width icon-credit-card"></i><span class = "tooltiptext">передать другому инспектору</span>
											</button>
										</div>
										
										<div class="tooltip">
											<button class="button-operations" onclick="modalWindow.openModal(\'openNewSubject\'); modalWindow.setId_sbj('.$arr_item['id'].')">
												<i class="icon-fixed-width icon-crop"></i><span class = "tooltiptext">передать другому потребителю</span>
											</button>
										</div>
										<!--div class="tooltip">
											<button class="button-remove '.($arr_item['count_objects'] >0 && $subject_all_objs[$key]['count_objects'] >0 ? 'no-delete' : '').'" onclick="subject.remove('.$arr_item['id'].')" '.($arr_item['count_objects'] >0 && $subject_all_objs[$key]['count_objects'] >0 ? 'disabled' : '').'>
											<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
											</button>
										</div-->
							  </td>
							</tr>';
			
			}
		}else{
			$str_result = '<tr><td></td><td></td><td>Потребители не найдены</td><td></td><td></td><td></td></tr>';
		}
	  
	  echo $str_result;
		
		
		
	}
	public function mf_unp()
	{
		$params = $this->request->post;
		$access_level = $this->data['access_level'];
		
		//print_r($params);
		$this->load->model('Unp');
		
		$arr_result = $this->model->unp->getUnpByFilter($params);
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		
		
		if(count($arr_result) > 0){
			$str_result = '';
			foreach($arr_result as $arr_item){
				$str_result .= '<tr class="item-'.$arr_item['id'].'">';
				$str_result .='<td class="list_td">'.(++$offset).'</td>';
				
				$str_result .='<td><a href="/ARM/basis/unp/edit/'.$arr_item['id'].'?mode=unp_info" target = "_blank">'.$arr_item['unp'].'</a></td>';
				
				//$str_result .='<td onclick="modalWindow.openModal(\'openModalUnpInfo\'); unp.unpInfo('.$arr_item['id'].') ">'.$arr_item['unp'].'</td>';
				

				
				
				$str_result .='<td><a href="/ARM/basis/unp/edit/'.$arr_item['id'].'?mode=unp_info" target = "_blank"><span><i class="icon-unp">&nbsp</i></span>'.$arr_item['name'].'</a></td>';
				$str_result .='<td class="list_td"><div class="tooltip"><a href="/ARM/basis/unp/list_subject/'.$arr_item['id'].'"><button class="button-list"><i class="icon-subject icons"> '.$arr_item['count_subject'].'</i><span class = "tooltiptext">перейти к списку потребителей</span></button></a></div></td>';
				$str_result .='<td class="list_td"><div class="tooltip"><a href="/ARM/basis/personal/list/'.$arr_item['id'].'"><button class="button-list"><i class="icon-people icons"> '.$arr_item['count_otv'].'</i><span class = "tooltiptext">перейти к списку ответственных лиц</span></button></a></div></td>';
				$str_result .='<td class="list_td">';
				
				if($access_level <> 6){
					$str_result .='<div class="tooltip">
								<a href="/ARM/basis/unp/edit/'.$arr_item['id'].'" target="_blank"><button class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
								</button></a>
							</div>
							<div class="tooltip">
								<button class="button-remove '.($arr_item['count_subject'] > 0 || $arr_item['count_otv'] >0 ? 'no-delete' : '').'" onclick="unp.remove('.$arr_item['id'].')"'.($arr_item['count_subject'] > 0 || $arr_item['count_otv'] >0 ? 'disabled' : '').'>
									<i class="icon-trash icons"></i><span class = "tooltiptext">'.($arr_item['count_subject']> 0 ? 'удалить невозможно' : 'удалить').'</span>
								</button>
							</div>';
					}

				$str_result .='</td>';
				$str_result .='</tr>';
			
			}
		}else{
			$str_result = 'По запросу данных нет';
		}
		
		echo $str_result;
		
	}
	
	public function count_items_for_pagination()
	{
		$params = $this->request->post;
		
		$access_level = $this->data['access_level'];
		$spr_cod_branch = $this->data['spr_cod_branch'];
		$inspection_type = $this->data['inspection_type'];
		$spr_cod_otd = $this->data['spr_cod_otd'];
		$spr_cod_podrazd = $this->data['spr_cod_podrazd'];
		$podrazdelenie = $this->data['podrazdelenie'];
		$id_user = $this->data['id_user'];		
		
	
		if(isset($params['mf_region_unp'])){ // mf_region_unp передается только в фильтре для поиска в юр. лицах
		
			$this->load->model('Unp');
			$arr_result = $this->model->unp->getUnpByFilter($params);
			
		}elseif(isset($params['mf_region_sbj'])){ // mf_region_sbj передается только в фильтре для поиска в объектах/потребителях
			$this->load->model('Subject');
		
			$arr_result = $this->model->subject->getSubjectsByFilter($params);
			
		}elseif(isset($params['mf_ip_firstname'])){ // 
			$this->load->model('Individual_persons');
		
			$arr_result = $this->model->individual_persons->getIndPersByFilter($params);
		
		}elseif(isset($params['mf_zurnal_personal'])){ // 
				if(strlen($spr_cod_branch) > 0 && $access_level == 5 || $access_level == 6){ /** если пользователь управления филиала **/
					$this->load->model('Personal');
					$arr_result_e = $this->model->personal->getPersonal_Filter_E($params);
					$arr_result_t = $this->model->personal->getPersonal_Filter_T($params);
					$arr_result_g = $this->model->personal->getPersonal_Filter_G($params);
					$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);			
				
				}elseif(strlen($id_user) > 0 && $access_level == 1){  /** если пользователь инспектор **/
					$this->load->model('Personal');
					if($podrazdelenie == 1){
						$arr_result = $this->model->personal->getPersonal_Filter_TInsp($params, $id_user);
					}elseif($podrazdelenie == 2){
						$arr_result = $this->model->personal->getPersonal_Filter_GInsp($params, $id_user);
					}elseif($podrazdelenie == 3){
						$arr_result = $this->model->personal->getPersonal_Filter_EInsp($params, $id_user);
					}
				}elseif(strlen($spr_cod_otd) > 0 && $access_level == 2){
					$this->load->model('Personal');
					$arr_result_e = $this->model->personal->getPersonal_Filter_EGroup($params, $spr_cod_otd);
					$arr_result_t = $this->model->personal->getPersonal_Filter_TGroup($params, $spr_cod_otd);
					$arr_result_g = $this->model->personal->getPersonal_Filter_GGroup($params, $spr_cod_otd);
					$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);				
				}elseif(strlen($spr_cod_podrazd) > 0 && $access_level == 3){
					$this->load->model('Personal');
					$arr_result_e = $this->model->personal->getPersonal_Filter_EMro($params, $spr_cod_podrazd);
					$arr_result_t = $this->model->personal->getPersonal_Filter_TMro($params, $spr_cod_podrazd);
					$arr_result_g = $this->model->personal->getPersonal_Filter_GMro($params, $spr_cod_podrazd);
					$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);						
				}elseif(strlen($spr_cod_branch) > 0 && $access_level == 4){
					$this->load->model('Personal');
					$arr_result_e = $this->model->personal->getPersonal_Filter_EBranch($params, $spr_cod_branch);
					$arr_result_t = $this->model->personal->getPersonal_Filter_TBranch($params, $spr_cod_branch);
					$arr_result_g = $this->model->personal->getPersonal_Filter_GBranch($params, $spr_cod_branch);
					$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);						
				}
		}
		
		
		echo count($arr_result);
}
	
	public function mf_object_page()
	{
		$this->load->model('Region');		
		$this->data['regions'] = $this->model->region->getRegion();
		
		$this->load->model('Branch');		
		$this->data['branchs'] = $this->model->branch->getBranch();	
		
		$this->data['cookie_formNumCaseOld']	= Cookie::get('formNumCaseOld');
		
		$this->data['cookie_formRegionFact']	= Cookie::get('formRegionFact');
		$this->data['cookie_formDistrictFact']= Cookie::get('formDistrictFact');
		$this->data['cookie_formCityFact'] = Cookie::get('formCityFact');
		$this->data['cookie_formCityZoneFact']= Cookie::get('formCityZoneFact');
		
		$this->data['cookie_formStreetFact']= Cookie::get('formStreetFact');
		
		$this->data['cookie_formRegionPost'] = Cookie::get('formRegionPost');
		$this->data['cookie_formDistrictPost'] = Cookie::get('formDistrictPost');
		$this->data['cookie_formCityPost'] 	 = Cookie::get('formCityPost');
		$this->data['cookie_formStreetPost']  = Cookie::get('formStreetPost');
		
		$this->data['cookie_formBranchObject'] = Cookie::get('formBranchObject');
		$this->data['cookie_formPodrazdelenieObject'] = Cookie::get('formPodrazdelenieObject');
		$this->data['cookie_formOtdelObject'] 	= Cookie::get('formOtdelObject');
		$this->data['cookie_formUser'] 	= Cookie::get('formUser');
		
		$this->data['cookie_formRegionObject'] = Cookie::get('formRegionObject');
		$this->data['cookie_formDistrictObject']= Cookie::get('formDistrictObject');
		$this->data['cookie_formCityObject'] 	= Cookie::get('formCityObject');
		$this->data['cookie_formStreetObject']	= Cookie::get('formStreetObject');
		
		$this->data['cookie_mf_num_page']	= Cookie::get('mf_num_page');
		$this->data['cookie_mf_num_items']	= Cookie::get('mf_num_items');
		
		$this->data['cookie_formNameSbj']	= Cookie::get('mf_NameSbj');
		$this->data['cookie_formNameObject']= Cookie::get('mf_NameObject');
		
		/*** массивы для фильтра  ***/
		/*** блок фактический адрес  ***/
		if($this->data['cookie_formRegionFact'] > 0){
			$this->load->model('District');	
			$this->data['fltr_DistrictFact'] = $this->model->district->getDistrictByRegion($this->data['cookie_formRegionFact']);
		}
		
		if($this->data['cookie_formDistrictFact'] > 0){
			$this->load->model('City');	
			$this->data['fltr_CityFact'] = $this->model->city->getCityByDistrict($this->data['cookie_formDistrictFact']);
		}
		
		if($this->data['cookie_formCityFact'] > 0){
			$this->load->model('CityZone');	
			$this->data['fltr_CityZoneFact'] = $this->model->cityZone->getCityZoneByCity($this->data['cookie_formCityFact']);
		}
		
		/*** блок почтовый адрес  ***/
		if($this->data['cookie_formRegionPost'] > 0){
			$this->load->model('District');	
			$this->data['fltr_DistrictPost'] = $this->model->district->getDistrictByRegion($this->data['cookie_formRegionPost']);
		}
		
		if($this->data['cookie_formDistrictPost'] > 0){
			$this->load->model('City');	
			$this->data['fltr_CityPost'] = $this->model->city->getCityByDistrict($this->data['cookie_formDistrictPost']);
		}
		
		/*** блок адрес объекта ***/
		if($this->data['cookie_formRegionObject'] > 0){
			$this->load->model('District');	
			$this->data['fltr_DistrictObject'] = $this->model->district->getDistrictByRegion($this->data['cookie_formRegionObject']);
		}
		
		if($this->data['cookie_formDistrictObject'] > 0){
			$this->load->model('City');	
			$this->data['fltr_CityObject'] = $this->model->city->getCityByDistrict($this->data['cookie_formDistrictObject']);
		}
		
		/*** блок закрепления потребителя ***/
		if($this->data['cookie_formBranchObject'] > 0){
			$this->load->model('Podrazdelenie');	
			$this->data['fltr_Podrazdelenie'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($this->data['cookie_formBranchObject']);
		}
		
		if($this->data['cookie_formPodrazdelenieObject'] > 0){
			$this->load->model('Otdel');	
			$this->data['fltr_Otdel'] = $this->model->otdel->getOtdelByPodrazdelenie($this->data['cookie_formPodrazdelenieObject']);
		}
		
		/*******************************/
		$this->view->render('objects/filter', $this->data);
	}
	
	public function mf_object()
	{
		$params = $this->request->post;
		
		$this->load->model('Objects');
		
		$arr_result = $this->model->objects->getObjectsByFilter($params);
		
		/*if(count($arr_result) > 0){
			$str_result = '';
			foreach($arr_result as $arr_item){
				$str_result .= '<tr class="item-'.$arr_item['id'].'">';
				$str_result .='<td onclick="modalWindow.openModal(\'openModalSubjectInfo\'); subject.subjectInfo('.$arr_item['id'].') ">'.$arr_item['id'].'</td>';
				$str_result .='<td onclick="modalWindow.openModal(\'openModalSubjectInfo\'); subject.subjectInfo('.$arr_item['id'].') "><span><i class="icon-unp"></i></span>'.$arr_item['name'].'<p class="sbj_podr"> ( '.$arr_item['spr_branch_name'] .' / '.$arr_item['spr_name_podrazd'] .' / '.$arr_item['spr_name_otdel'] .' ) </p></td>';
				$str_result .='<td><div><a href="/ARM/basis/objects/list/'.$arr_item['id'].'"><button class="button-list"><i class="icon-object icons"></i></button></a></div></td>';
				$str_result .='<td>
					    <div class="menu-item-event">
							<div>
								<a href="/ARM/basis/subject/edit/'.$arr_item['id'].'" target="_blank"><button class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i>
								</button></a>
							</div>
							<div>
								<button class="button-remove" onclick="subject.remove('.$arr_item['id'].')">
									<i class="icon-trash icons"></i>
								</button>
							</div>
	
						</div>
					</td>';
				$str_result .='</tr>';
			
			}
		}else{
			$str_result = 'По запросу данных нет';
		}*/
		
		//echo $str_result;
		print_r($arr_result);
	}
	
	public function mf_subject()
	{
		
		$params = $this->request->post;
		
		$this->load->model('Subject');
		
		$arr_result = $this->model->subject->getSubjectsByFilter($params);
		$subject_all_objs = $this->model->subject->getSubject(); // все потребители со всеми объектами
		
		$access_level = $this->data['access_level'];
		$spr_cod_branch = $this->data['spr_cod_branch'];
		$inspection_type = $this->data['inspection_type'];
		$spr_cod_otd = $this->data['spr_cod_otd'];
		$spr_cod_podrazd = $this->data['spr_cod_podrazd'];
		$podrazdelenie = $this->data['podrazdelenie'];
		$id_user = $this->data['id_user'];

		
		if(count($arr_result) > 0){
			
			$str_result = '';
			$curr_id = 0;
			$flag = 1;
			$block_obj = '';
			$icon_obj = '<div class="tooltip"><i class="icon-ban"></i><span class = "tooltiptext">нет объектов</span></div>';
			$count_obj = 0;
			
			if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
				$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
				$limit = $params['mf_num_items'];
				$offset = ($num_page - 1)*$limit;
			}
			
		
			foreach($arr_result as $arr_item){
				
			$key = array_search($arr_item['id'], array_column($subject_all_objs, 'id'));
				//echo $arr_item['object_name'];
				if($curr_id <> $arr_item['id']){
					
					if($flag == 2){
						if($count_obj > 0){
							$block_obj .='</div>';
							$str_result	= str_replace('***mask***',$block_obj, $str_result);
							
						}else{
							$str_result	= str_replace('***mask***','', $str_result);
						}
						$str_result	= str_replace('***iconObj***',$icon_obj, $str_result);
						//$str_result	= str_replace('***countObj***',$count_obj, $str_result);
						$count_obj = 0;
						$block_obj = '';
						$icon_obj = '<div class="tooltip"><i class="icon-ban"></i><span class = "tooltiptext">нет объектов</span></div>';
					}
					$flag = 1;
			
					$str_result .='<tr class="item-'.$arr_item['id'].'">';
					$str_result .='<td class="list_td">'.(++$offset).'</td>';
					//$str_result .='<td><a href="/ARM/basis/subject/edit/'.$arr_item['id'].'?mode=subject_info" target = "_blank" >'.$arr_item['num_case_s'].'</a></td>';
					$str_result .='<td><a href="/ARM/basis/subject/edit/'.$arr_item['id'].'?mode=subject_info" target = "_blank" >'.$arr_item['id'].'</a></td>';
					$str_result .='<td><a href="/ARM/basis/subject/edit/'.$arr_item['id'].'?mode=subject_info" target = "_blank"><span>'.( $arr_item['id_unp'] > 0 ?'<i class="icon-subject"></i>':'<i class="icon-person"></i>').'&nbsp</span>'.$arr_item['name'].'</a> <!--p class="sbj_podr"> ( '.$arr_item['spr_branch_name'] .' / '.$arr_item['spr_name_podrazd'] .' / '.$arr_item['spr_name_otdel'] .' ) </p-->***mask***</td>';
					$str_result .='<td class="list_td">***iconObj***</td>';
					$str_result .='<td class="list_td"><div class="tooltip"><a href="/ARM/basis/objects/list/'.$arr_item['id'].'" target="_blank"><button class="button-list"><i class="icon-object icons"> '.$subject_all_objs[$key]['count_objects'] .'</i><span class = "tooltiptext">перейти к объектам</span></button></a></div></td>';
					
					
					$str_result .='<td class="list_td">';
								
					//if((($access_level == 2 || $access_level == 1) && $spr_cod_otd == $arr_item['spr_otdel']) || ($access_level == 4 && $spr_cod_branch == $arr_item['spr_branch']) || ($access_level == 3 && $spr_cod_podrazd == $arr_item['spr_podrazdelenie'])){  12.03.2022 - решили убрать зависимость от закрепленного подразделения. если нет объектов корректировать и удалять может 1 и 2 уровень доступа
						
					if(($access_level == 2 || $access_level == 1) && ($arr_item['count_object_id'] ==0  && $subject_all_objs[$key]['count_objects'] ==0 )){
						
						$str_result .='<div class="tooltip">
											<a href="/ARM/basis/subject/edit/'.$arr_item['id'].'" target="_blank"><button class="button-edit">
												<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
											</button></a>
										</div>
									
								<!--div class="tooltip">
									<button class="button-operations" onclick="modalWindow.openModal(\"openNewInspector\"); modalWindow.findObjs('.$arr_item['id'].')" >
										<i class="icon-fixed-width icon-credit-card"></i><span class = "tooltiptext">передать другому инспектору</span>
									</button>
								</div>
								
								<div class="tooltip">
									<button class="button-operations" onclick="modalWindow.openModal(\"openNewSubject\"); modalWindow.setId_sbj('. $arr_item['id'] .')"  '.($access_level == 2 ? '' : 'disabled="disabled"').'>
										<i class="icon-fixed-width icon-crop"></i><span class = "tooltiptext">'. ($access_level == 2 ? "передать другому потребителю" : "действие невозможно").'</span>
									</button>
								</div-->
									
									<div class="tooltip">
										<button class="button-remove" onclick="subject.remove('.$arr_item['id'].')">
											<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
										</button>
									</div>';						

					}			
								
								/*'<div class="tooltip">
									<a href="/ARM/basis/subject/edit/'.$arr_item['id'].'" target="_blank"><button class="button-edit">
										<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
									</button></a>
								</div>
								<div class="tooltip">
									<button class="button-remove" onclick="subject.remove('.$arr_item['id'].')">
										<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
									</button>
								</div>'*/
		
					$str_result .='</td>';
					
					
					
					$str_result .='</tr>';
					
					if(strlen($arr_item['object_id']) > 0){
						
						$this->load->model('Objects');
						$params['id_reestr_subject'] = $arr_item['id'];
						$arr_result_obj = $this->model->objects->getObjectsByFilter($params);
						//print_r($arr_result_obj);
						
						$block_obj ='<div class="block_obj" block_obj="'.$arr_item['id'].'">';
						$icon_obj ='<div class="open_block_obj tooltip" for_block_obj="'.$arr_item['id'].'" onclick="filterMain.open_block_obj('.$arr_item['id'].')"><i class="icon-eye"></i><span class = "tooltiptext">развернуть</span></div>';
						
						foreach($arr_result_obj as $arr_result_obj_item){
						
						/*$block_obj .= '<a href="/ARM/basis/objects/edit/'.$arr_result_obj_item['reestr_object_id'].'?mode=object_info" target = "_blank"><i class="icon-object">&nbsp</i>'.$arr_result_obj_item['reestr_object_name'].' ('.$arr_result_obj_item['spr_region_name'].', '.$arr_result_obj_item['spr_district_name'].', '.$arr_result_obj_item['spr_city_name'].', '.$arr_result_obj_item['address_street'].', '.$arr_result_obj_item['address_building'].', '.$arr_result_obj_item['address_flat'].') '.'</a>';*/		
						
						$block_obj .= '<a href="/ARM/basis/objects/edit/'.$arr_result_obj_item['reestr_object_id'].'?mode=object_info" target = "_blank"><i class="icon-object">&nbsp</i>'.$arr_result_obj_item['reestr_object_name'].' ('. function_address([$arr_result_obj_item['address_index'],$arr_result_obj_item['spr_region_name'],$arr_result_obj_item['spr_district_name'],$arr_result_obj_item['spr_type_city_sokr_name'],$arr_result_obj_item['spr_city_name'],$arr_result_obj_item['spr_type_street_sokr_name'],$arr_result_obj_item['address_street'],$arr_result_obj_item['address_building'],$arr_result_obj_item['address_flat'],$arr_result_obj_item['spr_city_zone_name'],$arr_result_obj_item['spr_city_key_region'],0,0]).')</a>';
						

						
						
						
						
						
						}
						$count_obj++;
					
					}
					
					$flag = 2;
					
				}else{
					/*$block_obj .= '<p onclick="modalWindow.openModal(\'openModalObjectsInfo\'); object.objectInfo('.$arr_item['object_id'].') " ><i class="icon-object">&nbsp</i>'.$arr_item['object_name'].' ('.$arr_item['object_address_region'].', '.$arr_item['object_address_district'].', '.$arr_item['object_address_city'].', '.$arr_item['object_address_building'].', '.$arr_item['object_address_flat'].') '.'</p>';
					$flag = 2;*/
					//$curr_id = $arr_item['id'];
					//$count_obj++;
				}	
				
				$curr_id = $arr_item['id'];
				
					
				
				
			
			}
			if($count_obj > 0){
							$block_obj .='</div>';
							$str_result	= str_replace('***mask***',$block_obj, $str_result);
						}else{
							$str_result	= str_replace('***mask***','', $str_result);

						}
			$str_result	= str_replace('***iconObj***',$icon_obj, $str_result);			
			//$str_result	= str_replace('***countObj***',$count_obj, $str_result);
		}else{
			$str_result = '<tr><td></td><td></td><td>Потребители не найдены</td><td></td><td></td><td></td></tr>';
		}
		
		echo $str_result;
		//print_r($arr_result);
	}
	
	public function SetCookieFilter()
	{
		
	}
	
	public function mf_indpers()
	{
		$params = $this->request->post;
		$access_level = $this->data['access_level'];
		
		$this->load->model('Individual_persons');
		$arr_result = $this->model->individual_persons->getIndPersByFilter($params);
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		
		
		if(count($arr_result) > 0){
			$str_result = '';
			foreach($arr_result as $arr_item){
				$str_result .= '<tr class="item-'.$arr_item['id'].'">';
				$str_result .='<td class="list_td">'.(++$offset).'</td>';
				$str_result .='<td><a href="/ARM/basis/individual_persons/edit/'.$arr_item['id'].'?mode=individual_persons_info" target="_blank">'.$arr_item['firstname'].' ' .$arr_item['secondname'].' ' .$arr_item['lastname'].' (ID: '.$arr_item['identification_number'].')'.'</a></td>';
			
				//$str_result .='<td class="list_td"><div class="tooltip"><a href="/ARM/basis/unp/list_subject/'.$arr_item['id'].'"><button class="button-list"><i class="icon-subject icons"> '.$arr_item['count_subject'].'</i><span class = "tooltiptext">перейти к списку потребителей</span></button></a></div></td>';
				$str_result .='<td class="list_td"><div class="tooltip"><!--a href="/ARM/basis/personal/list/'.$arr_item['id'].'"--><button class="button-list"><i class="icon-subject icons"> '.$arr_item['col_sbjs'].'</i><span class = "tooltiptext">количество потребителей</span></button><!--/a--></div></td>';
				$str_result .='<td class="list_td">';
				
				if($access_level <> 6){
					$str_result .='<div class="tooltip">
								<a href="/ARM/basis/individual_persons/edit/'.$arr_item['id'].'" target="_blank"><button class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
								</button></a>
							</div>
							<div class="tooltip">
								<button class="button-remove '.($arr_item['col_sbjs'] == 0 ? '':'no-delete').'" onclick="unp.remove('.$arr_item['id'].')" '.($arr_item['col_sbjs'] == 0 ? '':'disabled').'>
									<i class="icon-trash icons"></i><span class = "tooltiptext">'.($arr_item['col_sbjs'] == 0 ? 'удалить':'удалить невозможно').'</span>
								</button>
							</div>';
					}

				$str_result .='</td>';
				$str_result .='</tr>';
			
			}
		}else{
			$str_result = 'По запросу данных нет';
		}
		
		echo $str_result;
		
		
		
	}
	
    public function filterlistobjects()
    {
		
		$params = $this->request->post;
		
		$id_user = $_COOKIE['id_user'];
		$access_level = $_COOKIE['access_level'];
		$spr_cod_branch = $_COOKIE['spr_cod_branch'];
		$inspection_type = $_COOKIE['inspection_type'];
		$spr_otdel = $_COOKIE['spr_cod_otd'];
	
	//print_r($params);
		
		$arr_result2 = [];
		$id_all_objects = (isset($params['id_all_objects']) ? $params['id_all_objects'] : '');
		$id_subject = (isset($params['id_subject']) ? $params['id_subject'] : '');
		
		//if($id_all_objects > 0){ 
			$this->load->model('Objects');
			$arr_result2 = $this->model->objects->getObjectByIdAllObjects($params);
		///}
	
		if(count($arr_result2) > 0){
			
			$str_result = '';
			$n = 1;	
			$count_e=0;
			$count_t=0;
			$count_ti=0;
			$count_g=0;
			
			foreach($arr_result2 as $arr_item){	
			
					if($arr_item['elektro_is'] > 0 && $arr_item['del_e'] == 0 && $arr_item['inactive_e'] == 0){ $count_e +=1;};
					if($arr_item['t_is'] > 0 && $arr_item['del_t'] == 0 && $arr_item['inactive_t'] == 0){$count_t +=1;};
					if($arr_item['ti_is'] > 0 && $arr_item['del_ti'] == 0 && $arr_item['inactive_ti'] == 0){$count_ti +=1;};
					if($arr_item['gaz_is'] > 0 && $arr_item['del_g'] == 0 && $arr_item['inactive_g'] == 0){$count_g +=1;};
			
		
					$str_result .= '<tr class="item-'.$arr_item['id'].'">';
					$str_result .='<td class="list_td">'.$n++.'</td>';	
					$str_result .='<td><a href="/ARM/basis/objects/edit/'.$arr_item['id'].'?mode=object_info" class="grid" target = "_blank"><span><i class="icon-object"></i>&nbsp
                            '.$arr_item['reestr_object_name']/*.' ('.(strlen($arr_item['address_index'])>0 ? $arr_item['address_index'] : "")
																  .(strlen($arr_item['spr_region_name'])>0 ? ", ".$arr_item['spr_region_name'] : "")
																  .(strlen($arr_item['spr_district_name'])>0 ? ", ".$arr_item['spr_district_name'] : "")
																  .(strlen($arr_item['spr_city_name'])>0 ? ", ".$arr_item['spr_city_name'] : "")
																  .(strlen($arr_item['address_street'])>0 ? ", ".$arr_item['address_street'] : "")
																  .(strlen($arr_item['address_building'])>0 ? "-".$arr_item['address_building'] : "")
																  .(strlen($arr_item['address_flat'])>0 ? "-".$arr_item['address_flat'] : "").')'.'</a></td>';*/
							
																. "  (" . function_address([$arr_item['address_index'],$arr_item['spr_region_name'],$arr_item['spr_district_name'],$arr_item['spr_type_city_sokr_name'],$arr_item['spr_city_name'],$arr_item['spr_type_street_sokr_name'],$arr_item['address_street'],$arr_item['address_building'],$arr_item['address_flat'],$arr_item['spr_city_zone_name'],$arr_item['spr_city_key_region'],0,0]) . ")".'</a></td>';
							
				//-------------Электро---------------//							
					 if($arr_item['elektro_is'] > 0 && $arr_item['del_e'] == 0 && $arr_item['inactive_e'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-check"></i><span class = "tooltiptext">есть объект электро- снабжения</span></div></td>';
					 }; 
					 if($arr_item['elektro_is'] > 0 && $arr_item['inactive_e'] > 0 && $arr_item['del_e'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-inactive"></i><span class = "tooltiptext">недействующий объект</span></div></td>';
					 }; 					
					 if($arr_item['elektro_is'] > 0 && $arr_item['del_e'] > 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-close"></i><span class = "tooltiptext">объект помечен на удаление</span></div></td>';
					 };					
					 if($arr_item['elektro_is'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-ban"></i><span class = "tooltiptext">нет объекта электро- снабжения</span></div></td>';
					 }; 
				//-------------Тепло---------------//
					if($arr_item['t_is'] > 0 && $arr_item['del_t'] == 0 && $arr_item['inactive_t'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-check"></i><span class = "tooltiptext">есть объект тепло- потребления</span></div></td>';
					}; 
					if($arr_item['t_is'] > 0 && $arr_item['inactive_t'] > 0 && $arr_item['del_t'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-inactive"></i><span class = "tooltiptext">недействующий объект</span></div></td>';
					}; 					
					if($arr_item['t_is'] > 0 && $arr_item['del_t'] > 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-close"></i><span class = "tooltiptext">объект помечен на удаление</span></div></td>';
					}; 					
					if($arr_item['t_is'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-ban"></i><span class = "tooltiptext">нет объекта тепло- потребления</span></div></td>';
					}; 	
				//-------------ТИ---------------//
					if($arr_item['ti_is'] > 0 && $arr_item['del_ti'] == 0 && $arr_item['inactive_ti'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-check"></i><span class = "tooltiptext">есть теплоисточник</span></div></td>';
					}; 
					if($arr_item['ti_is'] > 0 && $arr_item['inactive_ti'] > 0 && $arr_item['del_ti'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-inactive"></i><span class = "tooltiptext">недействующий объект</span></div></td>';
					}; 					
					if($arr_item['ti_is'] > 0 && $arr_item['del_ti'] > 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-close"></i><span class = "tooltiptext">объект помечен на удаление</span></div></td>';
					}; 					
					if($arr_item['ti_is'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-ban"></i><span class = "tooltiptext">нет теплоисточника</span></div></td>';
					}; 				
				//-------------Газ---------------//
					if($arr_item['gaz_is'] > 0 && $arr_item['del_g'] == 0 && $arr_item['inactive_g'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-check"></i><span class = "tooltiptext">есть объект газо- потребления</span></div></td>';
					}; 
					if($arr_item['gaz_is'] > 0 && $arr_item['inactive_g'] > 0 && $arr_item['del_g'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-inactive"></i><span class = "tooltiptext">недействующий объект</span></div></td>';
					};					
					if($arr_item['gaz_is'] > 0 && $arr_item['del_g'] > 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-close"></i><span class = "tooltiptext">объект помечен на удаление</span></div></td>';
					}; 					
					if($arr_item['gaz_is'] == 0){ 
						$str_result .= '<td class="list_td"><div class="tooltip"><i class="icon-ban"></i><span class = "tooltiptext">нет объекта газо- потребления</span></div></td>';
					}; 				
				
				//$str_result .='<td class="list_td">';
				
						$operation_mode = 0; // редактирование запрещено по умолчанию
							// если инспектор (1)
							if($access_level == 1){
								if($id_user == $arr_item['reestr_object_e_insp'] || $id_user == $arr_item['reestr_object_t_insp'] || $id_user == $arr_item['reestr_object_ti_insp'] || $id_user == $arr_item['reestr_object_g_insp']){
									$operation_mode = 1;
								}
								if($spr_cod_branch == $arr_item['id_branch_e'] || $spr_cod_branch == $arr_item['id_branch_t']|| $spr_cod_branch == $arr_item['id_branch_ti']||$spr_cod_branch == $arr_item['id_branch_g']){
									// если это тепло
									if($inspection_type == 1){
										if($arr_item['t_is'] <> 1 && $arr_item['ti_is'] <> 1){
											$operation_mode = 1;
										}
									}
									// если это электро
									if($inspection_type == 3){
										if($arr_item['elektro_is'] <> 1){
											$operation_mode = 1;
										}
									}
									// если это газ 
									if($inspection_type == 2){
										if($arr_item['gaz_is'] <> 1 ){
											$operation_mode = 1;
										}
									}
								}	
							};				
							// если начальник группы(2)
							if($access_level == 2 ){
								// начальники групп могут редактировать объекты только своего подразделения либо объекты, никому не назначенные в рамках своего филиала;
								// проверяем филиал
								if($spr_cod_branch == $arr_item['id_branch_e'] || $spr_cod_branch == $arr_item['id_branch_t']|| $spr_cod_branch == $arr_item['id_branch_ti']||$spr_cod_branch == $arr_item['id_branch_g']){
									// если это тепло
									if($inspection_type == 1){
										if($spr_otdel == $arr_item['users_cod_otd_t'] || $arr_item['t_is'] <> 1){
											$operation_mode = 1;
										}
									}
									// если это электро
									if($inspection_type == 3){
										if($spr_otdel == $arr_item['users_cod_otd_e'] || $arr_item['elektro_is'] <> 1){
											$operation_mode = 1;
										}
									}
									// если это газ 
									if($inspection_type == 2){
										if($spr_otdel == $arr_item['users_cod_otd_g']|| $arr_item['gaz_is'] <> 1 ){
											$operation_mode = 1;
										}
									}
								}
							};				

							if($operation_mode == 1){ 
									$str_result .='<td class="list_td"><div class="tooltip">
											<a href="/ARM/basis/objects/edit/'.$arr_item['id'].'" class="button-edit">
											<i class="icon-fixed-width icon-pencil"></i>
											<span class = "tooltiptext">редактировать</span>
											</a></div>
											<div class="tooltip">
												<button class="button-operations" onclick="modalWindow.openModal(\'openNewSubject\'); modalWindow.setId_obj('.$arr_item['id'].')" '.($access_level == 2 ? '' : 'disabled="disabled"').'>
												<i class="icon-fixed-width icon-crop"></i><span class = "tooltiptext">'.($access_level == 2 ? "передать другому потребителю" : "действие невозможно").'</span>
												</button>
											</div>
											'.(($access_level == 2 && ($arr_item['del_e'] >0 || $arr_item['elektro_is'] == null || $arr_item['elektro_is'] ==0) && ($arr_item['del_t'] > 0 || ($arr_item['t_is'] == null || $arr_item['t_is'] ==0))&& ($arr_item['del_ti'] > 0 || ($arr_item['ti_is'] == null || $arr_item['ti_is'] ==0)) && ($arr_item['del_g'] > 0 || ($arr_item['gaz_is'] == null || $arr_item['gaz_is'] ==0))) ? '<div class="tooltip"><button class="button-remove" onclick="object.remove('.$arr_item['id'].')"><i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span></button></div>' : '<div class="tooltip"><button class="button-remove no-delete" onclick="object.remove('.$arr_item['id'].')" disabled="disabled"><i class="icon-trash icons"></i><span class = "tooltiptext">удалить невозможно</span>').'
										</td>';	
							};				
				$str_result .='</tr>';
		
			}
					$str_result .='<tr>';
					$str_result .='<td></td>';
                    $str_result .='<td></td>';
					$str_result .='<td><div class="tooltip"><i>'.$count_e.'</i>	<span class = "tooltiptext">Кол-во объектов электрической энергии</span></div></td>';					
					$str_result .='<td><div class="tooltip"><i>'.$count_t.'</i>	<span class = "tooltiptext">Кол-во объектов тепловой энергии</span></div></td>'	;				
					$str_result .='<td><div class="tooltip"><i>'.$count_ti.'</i>	<span class = "tooltiptext">Кол-во теплоисточников</span></div></td>';					
					$str_result .='<td><div class="tooltip"><i>'.$count_g.'</i>	<span class = "tooltiptext">Кол-во объектов газового надзора</span></div></td>';
					$str_result .='<td></td>';
					$str_result .='</tr>';
		}else{
				$str_result = '';	
		}

	  echo $str_result;		

    }
	
	public function mf_zurnal()
	{
		$params = $this->request->post;

		//print_r($params);		
		$access_level = $this->data['access_level'];
		$spr_cod_branch = $this->data['spr_cod_branch'];
		$inspection_type = $this->data['inspection_type'];
		$spr_cod_otd = $this->data['spr_cod_otd'];
		$spr_cod_podrazd = $this->data['spr_cod_podrazd'];
		$podrazdelenie = $this->data['podrazdelenie'];
		$id_user = $this->data['id_user'];
		
		
		if(strlen($spr_cod_branch) > 0 && $access_level == 5 || $access_level == 6){ /** если пользователь управления филиала **/
			$this->load->model('Personal');
			$arr_result_e = $this->model->personal->getPersonal_Filter_E($params);
			$arr_result_t = $this->model->personal->getPersonal_Filter_T($params);
			$arr_result_g = $this->model->personal->getPersonal_Filter_G($params);
			$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);			
		
		}elseif(strlen($id_user) > 0 && $access_level == 1){  /** если пользователь инспектор **/
			$this->load->model('Personal');
			if($podrazdelenie == 1){
				$arr_result = $this->model->personal->getPersonal_Filter_TInsp($params, $id_user);
			}elseif($podrazdelenie == 2){
				$arr_result = $this->model->personal->getPersonal_Filter_GInsp($params, $id_user);
			}elseif($podrazdelenie == 3){
				$arr_result = $this->model->personal->getPersonal_Filter_EInsp($params, $id_user);
			}
		}elseif(strlen($spr_cod_otd) > 0 && $access_level == 2){
				$this->load->model('Personal');
				$arr_result_e = $this->model->personal->getPersonal_Filter_EGroup($params, $spr_cod_otd);
				$arr_result_t = $this->model->personal->getPersonal_Filter_TGroup($params, $spr_cod_otd);
				$arr_result_g = $this->model->personal->getPersonal_Filter_GGroup($params, $spr_cod_otd);
				$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);				
		}elseif(strlen($spr_cod_podrazd) > 0 && $access_level == 3){
				$this->load->model('Personal');
				$arr_result_e = $this->model->personal->getPersonal_Filter_EMro($params, $spr_cod_podrazd);
				$arr_result_t = $this->model->personal->getPersonal_Filter_TMro($params, $spr_cod_podrazd);
				$arr_result_g = $this->model->personal->getPersonal_Filter_GMro($params, $spr_cod_podrazd);
				$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);						
		}elseif(strlen($spr_cod_branch) > 0 && $access_level == 4){
				$this->load->model('Personal');
				$arr_result_e = $this->model->personal->getPersonal_Filter_EBranch($params, $spr_cod_branch);
				$arr_result_t = $this->model->personal->getPersonal_Filter_TBranch($params, $spr_cod_branch);
				$arr_result_g = $this->model->personal->getPersonal_Filter_GBranch($params, $spr_cod_branch);
				$arr_result = array_merge($arr_result_e, $arr_result_t, $arr_result_g);						
		}		
		
		
	
	
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		
		$n = 1;
		if(count($arr_result) > 0){
			$str_result = '';		
			foreach($arr_result as $arr_item){
				//$str_result .= '<tr class="item-'.$arr_item['id'].'">';
				
					$t1 = $arr_item['test_validity'];
					$t2 = date('Y-m-d');

				$str_result .='<tr class="item-'.$arr_item['id'].'" id="'.(strtotime($t1) < strtotime($t2) ?  "prosrok" : "").'">';
				
				
				//$str_result .='<td class="list_td">'.(++$offset).'</td>';
				//$str_result .='<td class="list_td">'.$arr_item['id'].'</td>';
				$str_result .='<td class="list_td">'.date('d.m.Y',strtotime($arr_item['date'])).'</td>';
				
				$str_result .='<td>
							<a href="/ARM/basis/personal/edit/'.$arr_item['person_id'].'?mode=responsible_persons_info" target = "_blank" class="">
								<span><i class="icon-rp"></i>&nbsp
									'.$arr_item['person_name'].' ('.$arr_item['person_position'].')
								</span>
							</a>							
						</td>';			
				$str_result .='<td class="list_td">'.$arr_item['napr_name'].'</td>';
				$str_result .='<td class="list_td">'.$arr_item['record_mode'].'</td>';
	
					
					if(isset($arr_item['spr_test_reasons_elektro_name'])){ 
						$str_result .='<td class="list_td">'.$arr_item['spr_test_reasons_elektro_name'].'</td>';
					} 
					if(isset($arr_item['spr_test_reasons_teplo_name'])){ 
						$str_result .='<td class="list_td">'.$arr_item['spr_test_reasons_teplo_name'].'</td>';
					} 
					if(isset($arr_item['spr_test_reasons_gaz_name'])){ 
						$str_result .='<td class="list_td">'.$arr_item['spr_test_reasons_gaz_name'].'</td>';
					} 					
					

					if($arr_item['test_result'] == 'не завершен'){ 
							$str_result .='<td class="list_td"><div class="tooltip"><i class="icon-close"></i><span class = "tooltiptext">не завершен</span></div></td>';
						} 
					if($arr_item['test_result'] == 'сдан'){ 
							$str_result .='<td class="list_td"><div class="tooltip"><i class="icon-check"></i><span class = "tooltiptext">сдан</span></div></td>';
					} 					
					if($arr_item['test_result'] == 'не сдан'){ 
							$str_result .='<td class="list_td"><div class="tooltip"><i class="icon-minus"></i><span class = "tooltiptext">не сдан</span></div></td>';
					} 
				
				$str_result .='<td class="list_td">'.date('d.m.Y',strtotime($arr_item['test_validity'])).'</td>';
						
						if($arr_item['activity_line'] == 1){
							$str_result .='<td class="list_td">
											<div class="tooltip" >
													<a href="/ARM/examination/zurnal/zurnal_e_edit/'.$arr_item['person_id'].'" target="_blank">
														<button class="button-edit">
															<i class="icon-eye"></i><span class = "tooltiptext">просмотр истории</span>
														</button>
													</a>																						
											</div>	
											<div class="tooltip">
												<button class="button-operations" onclick="report_zurnal.zurnalMain_e('.$arr_item['id'].')">
													<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
												</button>
											</div>
											<div class="tooltip" >
												<button class="button-envelope '.(strtotime($t1) < strtotime($t2) ? '' : 'display_none').'" onclick="report.letter_srok('.$arr_item['id'].','.$arr_item['activity_line'].')" >
												<i class="icon-envelope"></i><span class = "tooltiptext">письмо о несоблюдении сроков</span>
												</button>
											</div>
										</td>';							
						}elseif($arr_item['activity_line'] == 2){
							$str_result .='<td class="list_td">
											<div class="tooltip" >
													<a href="/ARM/examination/zurnal/zurnal_t_edit/'.$arr_item['person_id'].'" target="_blank">
														<button class="button-edit">
															<i class="icon-eye"></i><span class = "tooltiptext">просмотр истории</span>
														</button>
													</a>																						
											</div>	
											<div class="tooltip">
												<button class="button-operations" onclick="report_zurnal.zurnalMain_t('.$arr_item['id'].')">
													<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
												</button>
											</div>
											<div class="tooltip" >
												<button class="button-envelope '.(strtotime($t1) < strtotime($t2) ? '' : 'display_none').'" onclick="report.letter_srok('.$arr_item['id'].','.$arr_item['activity_line'].')" >
												<i class="icon-envelope"></i><span class = "tooltiptext">письмо о несоблюдении сроков</span>
												</button>
											</div>											
										</td>';							
						}elseif($arr_item['activity_line'] == 3){
							$str_result .='<td class="list_td">
											<div class="tooltip" >
													<a href="/ARM/examination/zurnal/zurnal_g_edit/'.$arr_item['person_id'].'" target="_blank">
														<button class="button-edit">
															<i class="icon-eye"></i><span class = "tooltiptext">просмотр истории</span>
														</button>
													</a>																						
											</div>	
											<div class="tooltip">
												<button class="button-operations" onclick="report_zurnal.zurnalMain_g('.$arr_item['id'].')">
													<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
												</button>
											</div>
											<div class="tooltip" >
												<button class="button-envelope '.(strtotime($t1) < strtotime($t2) ? '' : 'display_none').'" onclick="report.letter_srok('.$arr_item['id'].','.$arr_item['activity_line'].')" >
												<i class="icon-envelope"></i><span class = "tooltiptext">письмо о несоблюдении сроков</span>
												</button>
											</div>											
										</td>';							
						}


				$str_result .='</td>';
				$str_result .='</tr>';
			
			}
		}else{
			$str_result = 'По запросу данных нет';
		}
		
		echo $str_result;
		
		
		
	}	
	
	
}