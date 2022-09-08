<?php

namespace Examination\Model\Search;

use Engine\Model;

class SearchRepository extends Model
{
    public function pre_search_result($work_array, $preResultStr, $search_field)
    {
		//echo $search_field;

		if(count($work_array) > 0) {
			$current_id = 0;
			$current_name = '';
			$current_rp_fio = '';
				//print_r($work_array);
				foreach($work_array as $item_array){
					
					if($search_field =='rp_fio'){
							if($current_rp_fio != $item_array['firstname']){
								$preResultStr .= "<li>$item_array[secondname]</li>";
								$current_rp_fio = $item_array['secondname'];
								
							}						
						
						}else if($search_field =='reestr_unp_name'){
							if($current_name != $item_array['reestr_unp_name']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								
								$current_name = $item_array['reestr_unp_name'];
							}
						}else if($search_field =='unp'){
							if($current_id != $item_array['unp']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								$current_id = $item_array['unp'];
								
							}
						}else if($search_field =='fio'){
							if($current_id != $item_array['id']){
								$preResultStr .= "<li dolgnost='$item_array[dolgnost]' podrazd='($item_array[spr_branch_sokr_name], $item_array[spr_podrazdelenie_sokr_name], $item_array[spr_otdel_sokr_name])' user_id='$item_array[id]' >$item_array[$search_field]</li>";
								$current_id = $item_array['id'];
								
							}
						}							
				};
			}
		return $preResultStr;

    }	
	
	public function full_search_result_responsible_persons($work_array, $preResult)
	{
		if(count($work_array) > 0) {
			
			$preResultStr = "<script src='/ARM/examination/Assets/js/js-modalSearch.js'></script>";
			
				foreach($work_array as $item_array){
					$preResultStr .= "<p class='rp_result' id_rp='$item_array[id]' id_unp='$item_array[reestr_unp_id]'> $item_array[secondname] $item_array[firstname] $item_array[lastname] (<span>$item_array[reestr_unp_unp] $item_array[reestr_unp_name_short]</span>)</p>";
				};
			}
		return $preResultStr;
	}
	
	public function pre_search_result_check($work_array, $preResultStr, $search_field)
    {
		//echo $search_field;
		if(count($work_array) > 0) {
			$current_id = 0;
			$current_name = '';
			$current_subject_name = '';
				foreach($work_array as $item_array){
					$preResultStr .= "<p class = 'checkUnp_error'>Запись найдена в ПО 'Базис':   ($item_array[unp]) $item_array[reestr_unp_name]</p>";	
				};
			}
		return $preResultStr;

    }
	
	public function full_search_result_unp($work_array, $preResultStr)
    {
		
	$access_level = $_COOKIE['access_level'];
	
		if(count($work_array) > 0) {
			$preResultStr = "<script src='/ARM/basis/Assets/js/js-modalSearch.js'></script>";
				$current_id = 0;
				$flag = 1;
				//$nomerpp=0;
				$spisok="<b>Список потребителей: </b>";
				//print_r($work_array);
				foreach($work_array as $item_array){
					/*$tt = searchSubjectsUnp($id_unp);*/
				//	print_r($item_array);
					
					if($flag == 1){

						$preResultStr .= "<div class='result_html' id_unp='$item_array[id]'> 
												<div class='btn_panel'>
													<div class='tooltip'>
														<button class='button-operations'>
															<a href='/ARM/basis/unp/list_subject/$item_array[id]'>
																<i class='icon-fixed-width icon-list'></i><span class = 'tooltiptext'>перейти к списку потребителей</span>
															</a>
														</button>
													</div>";
						if($access_level <> 6){							
						$preResultStr .=	"<div class='tooltip'>
												<button class='button-edit'>
													<a href='/ARM/basis/unp/edit/$item_array[id]'>
																<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
													</a>
												</button>
											</div>
											<div class='tooltip'>
												<button class='button-remove ".($item_array['reestr_subject_id'] > 0 ? 'no-delete' : '')."' onclick='unp.remove($item_array[id])'".($item_array['reestr_subject_id'] > 0 ? 'disabled' : '').">
												<i class='icon-trash icons'></i><span class = 'tooltiptext'>".($item_array['reestr_subject_id'] > 0 || $item_array['reestr_personal_id'] > 0? 'удалить невозможно' : 'удалить')."</span>
												</button>
											</div>";
						}							
						$preResultStr .="</div>";
							
						$preResultStr .= "<a  href='/ARM/basis/unp/edit/$item_array[id]?mode=unp_info' target = '_blank'><p><b><span><i class='icon-unp'>&nbsp</i></span><span class='className'>$item_array[reestr_unp_name]</span></b></p></br>";
						$preResultStr .= "<p>Краткое наименование: $item_array[name_short]</p>";
						/*/еще работаю адрес через функцию----------------------------
							$r_subject['ind']	= $item_array['address_index'];
							$r_subject['rgn']	= $item_array['spr_region_name'];
							$r_subject['dst']	= $item_array['spr_district_name'];
							$r_subject['ct_t']	= $item_array['spr_type_city_name'];
							$r_subject['ct']	= $item_array['spr_city_name'];
							$r_subject['ct_keyr']=1;
							$r_subject['ct_z']	= "центральный";
							$r_subject['st_t']	= $item_array['spr_type_street_name'];
							$r_subject['st']	= $item_array['address_street'];
							$r_subject['bld']	= $item_array['address_building'];
							$r_subject['flt']	= $item_array['address_flat'];
							$r_subject['on_ind']= 1;						//добавили в массив значение -- [11] вывод индекса
							$r_subject['on_ct_z']=1;					//добавили в массив значение -- [12] вывод района города
							$address_p=fun_address($r_subject);			//передаем массив в функцию для формирование строки адреса
						$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div>".$address_p."</p>";	*/
						$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div> <span address_index='$item_array[address_index]'>$item_array[address_index]</span>, <span address_region='$item_array[address_region]'>$item_array[spr_region_name]</span>, <span address_district='$item_array[address_district]'>$item_array[spr_district_name] р-н</span>, <span address_city_type='$item_array[address_city_type]'>$item_array[spr_type_city_name]</span> <span address_city='$item_array[address_city]'>$item_array[spr_city_name]</span>, <span address_street_type='$item_array[address_street_type]'> $item_array[spr_type_street_name]</span> <span address_street='$item_array[address_street]'>$item_array[address_street]</span>  <span address_building='$item_array[address_building]'>$item_array[address_building]</span>, <span address_flat='$item_array[address_flat]'>$item_array[address_flat]</span></p>";
						//---------------------------------------------------------------
						$preResultStr .= "<p><div class='block w1'><b>УНП: </b></div><span class='classUnp'>$item_array[unp]</span></p>";
						$preResultStr .= "<p><div class='block w1'><b>Статус: </b></div><span class='classUnp'>".($item_array['liquidated'] == 0 ? 'Действующий': ($item_array['liquidated'] == 1 ? 'Ликвидирован' : 'В стадии ликвидации'))."</span></p>";
						$preResultStr .= "<div class='block w2-5'><b>Количество потребителей:</b></div><span class='classUnp'>$item_array[count_p]</span></div></a>";
						$preResultStr .= "<p>***mask***</p>";
     					
						
						if(isset($item_array['reestr_subject_id'])){
							/*
							$str_subjects = "<b>Потребители и подразделения:</b>";
							$str_subjects .= "<p><a href='#' onclick=\"modalWindow.openModal('openModalSubjectInfo'); subject.subjectInfo($item_array[reestr_subject_id])\" class='card_href'>".$nomerpp++.". <i class='icon-fixed-width icon-subject'></i>&nbsp$item_array[reestr_subject_name]";
							//убрал закрепление $str_subjects .=(strlen($item_array['spr_branch_name']) > 0 ? "<p class='sbj_podr'> ( $item_array[spr_branch_name]  / $item_array[spr_name_podrazd]  / $item_array[spr_name_otdel]  )</p></a></p>" :"");
							$str_subjects .="</a></p>";
							*/
							//$nomerpp++;
							$str_subjects ="";
						}else{
							$str_subjects ="";
						}
						
						$current_id = $item_array['id'];
						$flag = 2;
						
						
					}else{
						if($current_id == $item_array['id']){
							/*							
							$str_subjects .= "<p><a href='#' onclick=\"modalWindow.openModal('openModalSubjectInfo'); subject.subjectInfo($item_array[reestr_subject_id])\" class='card_href'>".$nomerpp++.". <i class='icon-fixed-width icon-subject'></i>&nbsp$item_array[reestr_subject_name] ";
							//убрал закрепление $str_subjects .=(strlen($item_array['spr_branch_name']) > 0 ? "<p class='sbj_podr'> ( $item_array[spr_branch_name]  / $item_array[spr_name_podrazd]  / $item_array[spr_name_otdel]  )</p></a></p>" :"");
							$str_subjects .="</a></p>";
							*/
							//$nomerpp++;
						}else{
							$flag = 1;
							//$preResultStr .= "<div class='block w2-5'><b>Количество потребителей:</b></div><span class='classUnp'>".$nomerpp."</span></div>";
							//$nomerpp=0;
							$preResultStr = str_replace('***mask***',$str_subjects, $preResultStr);
							$str_subjects = "";

						
							$preResultStr .= "<div class='result_html' id_unp='$item_array[id]'> 
												<div class='btn_panel'>
													<div class='tooltip'>
														<button class='button-operations'>
															<a href='/ARM/basis/unp/list_subject/$item_array[id]'>
																<i class='icon-fixed-width icon-list'></i><span class = 'tooltiptext'>перейти к списку потребителей</span>
															</a>
														</button>
													</div>";
													
							if($access_level <> 6){
							$preResultStr .="<div class='tooltip'><button class='button-edit'>
														<a href='/ARM/basis/unp/edit/$item_array[id]'>
															<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
														</a>
													</button></div>
													<div class='tooltip'><button class='button-remove ".($item_array['reestr_subject_id'] > 0 ? 'no-delete' : '')."' onclick='unp.remove($item_array[id])' ".($item_array['reestr_subject_id'] > 0 ? 'disabled' : '').">
														<i class='icon-trash icons'></i><span class = 'tooltiptext'>".($item_array['reestr_subject_id'] > 0 ? 'удалить невозможно' : 'удалить')."</span>
													</button></div>";
							}	
							$preResultStr .="</div>";
							
							
							$preResultStr .= "<a  href='/ARM/basis/unp/edit/$item_array[id]?mode=unp_info' target = '_blank'><p><b><span><i class='icon-unp'>&nbsp</i></span><span class='className'>$item_array[reestr_unp_name]</span></b></p></br>";
							$preResultStr .= "<p>Краткое наименование: $item_array[name_short]</p>";
							$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div> <span address_index='$item_array[address_index]'>$item_array[address_index]</span>, <span address_region='$item_array[address_region]'>$item_array[spr_region_name]</span>, <span address_district='$item_array[address_district]'>$item_array[spr_district_name] р-н</span>, <span address_city_type='$item_array[address_city_type]'>$item_array[spr_type_city_name]</span> <span address_city='$item_array[address_city]'>$item_array[spr_city_name]</span>, <span address_street_type='$item_array[address_street_type]'> $item_array[spr_type_street_name]</span> <span address_street='$item_array[address_street]'>$item_array[address_street]</span>  <span address_building='$item_array[address_building]'>$item_array[address_building]</span>, <span address_flat='$item_array[address_flat]'>$item_array[address_flat]</span></p>";
							$preResultStr .= "<p><div class='block w1'><b>УНП: </b></div><span class='classUnp'>$item_array[unp]</span></p>";
							$preResultStr .= "<p><div class='block w1'><b>Статус: </b></div><span class='classUnp'>".($item_array['liquidated'] == 0 ? 'Действующий': ($item_array['liquidated'] == 1 ? 'Ликвидирован' : 'В стадии ликвидации'))."</span></p>";
							$preResultStr .= "<div class='block w2-5'><b>Количество потребителей:</b></div><span class='classUnp'>$item_array[count_p]</span></div></a>";
							$preResultStr .= "<p>***mask***</p>";
			
							
							$current_id = $item_array['id'];
							if(isset($item_array['reestr_subject_id'])){
								/*
								$str_subjects = "<b>Потребители и подразделения:</b>";
								$str_subjects .= "<p><a href='#' onclick=\"modalWindow.openModal('openModalSubjectInfo'); subject.subjectInfo($item_array[reestr_subject_id])\" class='card_href'>".$nomerpp++.". <i class='icon-fixed-width icon-subject'></i>&nbsp$item_array[reestr_subject_name] ";
								//убрал закрепление $str_subjects .=(strlen($item_array['spr_branch_name']) > 0 ? "<p class='sbj_podr'> ( $item_array[spr_branch_name]  / $item_array[spr_name_podrazd]  / $item_array[spr_name_otdel]  )</p></a></p>" :"");
								$str_subjects .="</a></p>";
								*/
								//$nomerpp++;	
								$str_subjects ="";								
							}else{
								$str_subjects="";
							}
							$flag = 2;						
						}
						
					
					
					};
				};
				//$preResultStr .= "<div class='block w2-5'><b>Количество потребителей:</b></div><span class='classUnp'>".$nomerpp."</span></div>";
				$preResultStr = str_replace('***mask***',$str_subjects, $preResultStr);
				
			}
		return $preResultStr;

    }
}	