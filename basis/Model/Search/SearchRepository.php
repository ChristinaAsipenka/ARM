<?php
//	include $_SERVER['DOCUMENT_ROOT']."/function/fun_address.php"; // $_SERVER['DOCUMENT_ROOT'] - указывает корневую директорию сайта


namespace Basis\Model\Search;
include $_SERVER['DOCUMENT_ROOT']."/ARM/basis/View/functions.php";
use Engine\Model;

class SearchRepository extends Model
{
    public function pre_search_result($work_array, $preResultStr, $search_field)
    {
		//echo $search_field;

		if(count($work_array) > 0) {
			$current_id = 0;
			$current_name = '';
			$current_subject_name = '';
			$current_ind_pers_name = '';
			$current_ind_pers_fam = '';
			$current_rp_fio = '';
				//print_r($work_array);
				foreach($work_array as $item_array){
					
					//print_r($item_array);
					//if(($current_id != $item_array['id'])||($current_name != $item_array['reestr_unp_name'])){
						if($search_field =='reestr_unp_name'){
							
							if($current_name != $item_array['reestr_unp_name']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								
								$current_name = $item_array['reestr_unp_name'];
							}
						}else if($search_field =='unp'){
							if($current_id != $item_array['unp']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								$current_id = $item_array['unp'];
								
							}
						}else if($search_field =='reestr_subject_name'){
							if($current_subject_name != $item_array['reestr_subject_name']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								$current_subject_name = $item_array['reestr_subject_name'];
								
							}
						}else if($search_field =='firstname'){
							if($current_ind_pers_name != $item_array['firstname']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								$current_ind_pers_name = $item_array['firstname'];
								
							}						
						
						}
						else if($search_field =='secondname'){
							if($current_ind_pers_fam != $item_array['secondname']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								$current_ind_pers_fam = $item_array['secondname'];
								
							}						
						
						}else if($search_field =='rp_fio'){
							if($current_rp_fio != $item_array['firstname']){
								$preResultStr .= "<li id_rp='$item_array[id]'>$item_array[secondname] $item_array[firstname] $item_array[lastname] ($item_array[reestr_unp_unp] $item_array[reestr_unp_name_short] )</li>";
								$current_rp_fio = $item_array['secondname'];
								
							}						
						
						}							
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
						$preResultStr .= "<p><div class='block w2'>Краткое наименование: </div><span class=''>$item_array[name_short]</span></p></br>";
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
						/*$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div> <span address_index='$item_array[address_index]'>$item_array[address_index]</span>, <span address_region='$item_array[address_region]'>$item_array[spr_region_name]</span>, <span address_district='$item_array[address_district]'>$item_array[spr_district_name] р-н</span>, <span address_city_type='$item_array[address_city_type]'>$item_array[spr_type_city_name]</span> <span address_city='$item_array[address_city]'>$item_array[spr_city_name]</span>, <span address_street_type='$item_array[address_street_type]'> $item_array[spr_type_street_name]</span> <span address_street='$item_array[address_street]'>$item_array[address_street]</span>  <span address_building='$item_array[address_building]'>$item_array[address_building]</span>, <span address_flat='$item_array[address_flat]'>$item_array[address_flat]</span></p>";*/
						$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div> ".function_address([$item_array['address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['address_street'],$item_array['address_building'],$item_array['address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],1,0])."</p>";
						
						
						//---------------------------------------------------------------
						$preResultStr .= "<p><div class='block w1'><b>УНП: </b></div><span class='classUnp'>$item_array[unp]</span></p>";
						$preResultStr .= "<p><div class='block w1'><b>Статус: </b></div><span class=''>".($item_array['liquidated'] == 0 ? 'Действующий': ($item_array['liquidated'] == 1 ? 'Ликвидирован' : 'В стадии ликвидации'))."</span></p>";
						$preResultStr .= "<div class='block w2-5'><b>Количество потребителей:</b></div><span class=''>$item_array[count_p]</span></div></a>";
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
							$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div>".function_address([$item_array['address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['address_street'],$item_array['address_building'],$item_array['address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],1,0])."</p>";
							$preResultStr .= "<p><div class='block w1'><b>УНП: </b></div><span class='classUnp'>$item_array[unp]</span></p>";
							$preResultStr .= "<p><div class='block w1'><b>Статус: </b></div><span class=''>".($item_array['liquidated'] == 0 ? 'Действующий': ($item_array['liquidated'] == 1 ? 'Ликвидирован' : 'В стадии ликвидации'))."</span></p>";
							$preResultStr .= "<div class='block w2-5'><b>Количество потребителей:</b></div><span class=''>$item_array[count_p]</span></div></a>";
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

	public function full_search_result_subject($work_array, $preResultStr)
    {
		

		if(count($work_array) > 0) {
			$preResultStr = "<script src='/ARM/basis/Assets/js/js-modalSearch.js'></script>";
				foreach($work_array as $item_array){
					$preResultStr .= "<div class='result_html' id_subject='$item_array[id]'> 
									    <div class='btn_panel'>
												<!--div class='tooltip'><a href='/ARM/basis/subject/edit/$item_array[id]'><button class='button-edit'>
													<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
												</button></a></div>
												<div class='tooltip'><button class='button-remove' onclick='subject.remove($item_array[id])'>
													<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
												</button></div-->
												<a href='/ARM/basis/subject/edit/$item_array[id]?mode=subject_info' target = '_blank' class='tooltip'><i class='icon-fixed-width icon-eye'></i><span class = 'tooltiptext'>Просмотр полной информации</span></a>
									    </div>";
									
					$preResultStr .= "<div><p><b>Наименование: </b><span class='className'>	<i class='icon-fixed-width icon-subject'></i>&nbsp$item_array[reestr_subject_name]</span></p>";
					/*$preResultStr .= "<p><b>Адрес:</b> $item_array[place_address_index], $item_array[spr_region_name], $item_array[spr_district_name] р-н, $item_array[spr_city_name],   $item_array[place_address_street]  $item_array[place_address_building],  $item_array[place_address_flat]</p></div>";*/
					$preResultStr .= "<p><b>Адрес:</b> ".function_address([$item_array['place_address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['place_address_street'],$item_array['place_address_building'],$item_array['place_address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],0,0])."</p></div>";
					$preResultStr .= "<br><a href='/ARM/basis/objects/list/$item_array[id]' class='button-list'>&nbsp<i class='icon-fixed-width icon-object'></i>&nbspК объектам&nbsp</a>";

					$preResultStr .= "</div>";
				};
			}
		return $preResultStr;

    }



	public function full_search_result_responsible_persons($work_array, $preResultStr)
    {
		

		if(count($work_array) > 0) {
			if(strlen($preResultStr)==0){
				$preResultStr .= "<script src='/ARM/basis/Assets/js/js-modalSearch.js'></script>";
			}
				$current_id = 0;
				$flag = 1;				
		
				foreach($work_array as $item_array){
					
					
					if($flag == 1){
					
								$preResultStr .= "<div class='result_html' id_resp_pers='$item_array[id]'>"; 
								/*$preResultStr .= "<div class='btn_panel'>
													<div class='tooltip'><a href='/ARM/basis/unp/edit/$item_array[id]'><button class='button-edit'>
														<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
														</button></a></div>
															<div class='tooltip'><button class='button-remove' onclick='unp.remove($item_array[id])'>
															<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
														</button>
													</div>
												</div>";
								*/				
								$preResultStr .= "<a href='/ARM/basis/unp/edit/".$item_array['id']."?mode=unp_info' target = '_blank'><p><b><span><i class='icon-unp'>&nbsp</i></span><span class='className'>$item_array[reestr_unp_name]</span></b></p></br>";
								$preResultStr .= "<p>Краткое наименование: $item_array[name_short]</p>";
								/*$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div><span address_index='$item_array[address_index]'>$item_array[address_index]</span>, <span address_region='$item_array[address_region]'>$item_array[spr_region_name]</span>, <span address_district='$item_array[address_district]'>$item_array[spr_district_name] р-н</span>, <span address_city_type='$item_array[address_city_type]'>$item_array[spr_type_city_name]</span> <span address_city='$item_array[address_city]'>$item_array[spr_city_name]</span>, <span address_street_type='$item_array[address_street_type]'> $item_array[spr_type_street_name]</span> <span address_street='$item_array[address_street]'>$item_array[address_street]</span>  <span address_building='$item_array[address_building]'>$item_array[address_building]</span>, <span address_flat='$item_array[address_flat]'>$item_array[address_flat]</span></p>";*/
								$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div>".function_address([$item_array['address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['address_street'],$item_array['address_building'],$item_array['address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],0,0])."</p>";
								$preResultStr .= "<p><div class='block w1'><b>УНП: </b></div><span class='classUnp'>$item_array[unp]</span></p>";
								$preResultStr .= "<p><div class='block w1'><b>Статус: </b></div><span class=''>".($item_array['liquidated'] == 0 ? 'Действующий': ($item_array['liquidated'] == 1 ? 'Ликвидирован' : 'В стадии ликвидации'))."</span></p><a>";
								$preResultStr .= "<a href='/ARM/basis/personal/list/$item_array[id]' class='btn btn-primary-ob'>Список ответственных лиц</a>";
								$preResultStr .= "</div>";
								$current_id = $item_array['id'];
								$flag = 2;
					}else{
					
					
								if($current_id == $item_array['id']){	
									$current_id = $item_array['id'];
								}else{
								$flag = 1;

								$preResultStr .= "<div class='result_html' id_resp_pers='$item_array[id]'>"; 
								/*$preResultStr .= "<div class='btn_panel'>
													<div class='tooltip'><a href='/ARM/basis/unp/edit/$item_array[id]'><button class='button-edit'>
														<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
														</button></a></div>
															<div class='tooltip'><button class='button-remove' onclick='unp.remove($item_array[id])'>
															<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
														</button>
													</div>
												</div>";
								*/	
								$preResultStr .= "<a href='/ARM/basis/unp/edit/".$item_array['id']."?mode=unp_info' target = '_blank'><p><b><span><i class='icon-unp'>&nbsp</i></span><span class='className'>$item_array[reestr_unp_name]</span></b></p></br>";
								$preResultStr .= "<p>Краткое наименование: $item_array[name_short]</p>";
								/*$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div><span address_index='$item_array[address_index]'>$item_array[address_index]</span>, <span address_region='$item_array[address_region]'>$item_array[spr_region_name]</span>, <span address_district='$item_array[address_district]'>$item_array[spr_district_name] р-н</span>, <span address_city_type='$item_array[address_city_type]'>$item_array[spr_type_city_name]</span> <span address_city='$item_array[address_city]'>$item_array[spr_city_name]</span>, <span address_street_type='$item_array[address_street_type]'> $item_array[spr_type_street_name]</span> <span address_street='$item_array[address_street]'>$item_array[address_street]</span>  <span address_building='$item_array[address_building]'>$item_array[address_building]</span>, <span address_flat='$item_array[address_flat]'>$item_array[address_flat]</span></p>";*/
								$preResultStr .= "<p><div class='block w1'><b>Адрес:</b></div>".function_address([$item_array['address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['address_street'],$item_array['address_building'],$item_array['address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],0,0])."</p>";
								$preResultStr .= "<p><div class='block w1'><b>УНП: </b></div><span class='classUnp'>$item_array[unp]</span></p>";
								$preResultStr .= "<p><div class='block w1'><b>Статус: </b></div><span class=''>".($item_array['liquidated'] == 0 ? 'Действующий': ($item_array['liquidated'] == 1 ? 'Ликвидирован' : 'В стадии ликвидации'))."</span></p></a>";
								$preResultStr .= "<a href='/ARM/basis/personal/list/$item_array[id]' class='btn btn-primary-ob'>Список ответственных лиц</a>";
								$preResultStr .= "</div>";
								$current_id = $item_array['id'];
								$flag = 2;						
								}

					};
					
				};	
					
		}
		return $preResultStr;
	}


	public function full_search_result_otv($work_array, $preResultStr)
    {
		

		if(count($work_array) > 0) {
			$preResultStr = "<script src='/ARM/basis/Assets/js/js-modalSearch.js'></script>";
				$current_id = 0;
				$flag = 1;
		//print_r($work_array);		
				foreach($work_array as $item_array){
					if($flag == 1){

						$preResultStr .= "<div class='result_html' id_unp='$item_array[id]'> 
												<!--div class='btn_panel'>
														<div class='tooltip'><a href='/ARM/basis/unp/edit/$item_array[id]'>
															<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
														</a></div>
														<div class='tooltip'><button class='button-remove' onclick='unp.remove($item_array[id])'>
															<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
														</button></div>
												</div-->";
							
							
						$preResultStr .= "<p><b>УНП: </b><span class='classUnp'>$item_array[unp]</span></p><p><b>Наименование: </b><span class='className'>$item_array[reestr_unp_name]</span></p>";
						$preResultStr .= "<p><b>Краткое наименование: </b>$item_array[name_short]</p>";
						/*$preResultStr .= "<p><b>Адрес:</b> <span address_index='$item_array[address_index]'>$item_array[address_index]</span>, <span address_region='$item_array[address_region]'>$item_array[spr_region_name]</span>, <span address_district='$item_array[address_district]'>$item_array[spr_district_name] р-н</span>, <span address_city_type='$item_array[address_city_type]'>$item_array[spr_type_city_name]</span> <span address_city='$item_array[address_city]'>$item_array[spr_city_name]</span>, <span address_street_type='$item_array[address_street_type]'> $item_array[spr_type_street_name]</span> <span address_street='$item_array[address_street]'>$item_array[address_street]</span>  <span address_building='$item_array[address_building]'>$item_array[address_building]</span>, <span address_flat='$item_array[address_flat]'>$item_array[address_flat]</span></p>";*/
						$preResultStr .= "<p><b>Адрес: </b>".function_address([$item_array['address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['address_street'],$item_array['address_building'],$item_array['address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],0,0])."</p>";
						$preResultStr .= "</br><p><b>Список ответственных лиц привязанных к этому УНП: </b>***mask***</p>";
						$preResultStr .= "</div>";
						$str_subjects = "<p id_rersp = '$item_array[reestr_personal_id]' onclick='personal.check_otv($item_array[reestr_personal_id]), subject.otv_insert_info($item_array[reestr_personal_id])' class='card_href'>$item_array[reestr_personal_secondname] $item_array[reestr_personal_firstname] $item_array[reestr_personal_lastname] ($item_array[name_short], $item_array[reestr_personal_post])</p>";
						$current_id = $item_array['id'];
						$flag = 2;
						
						
					}else{
						if($current_id == $item_array['id']){	
							$str_subjects .= "<p id_rersp = '$item_array[reestr_personal_id]' onclick='personal.check_otv($item_array[reestr_personal_id]), subject.otv_insert_info($item_array[reestr_personal_id])' class='card_href'>$item_array[reestr_personal_secondname] $item_array[reestr_personal_firstname] $item_array[reestr_personal_lastname] ($item_array[name_short], $item_array[reestr_personal_post])</p>";
							$current_id = $item_array['id'];
						}else{
						$flag = 1;
						
						$preResultStr = str_replace('***mask***',$str_subjects, $preResultStr);
						$str_subjects = "";

						
						$preResultStr .= "<div class='result_html' id_unp='$item_array[id]'> 
												<!--div class='btn_panel'>
														<div class='tooltip'><a href='/ARM/basis/unp/edit/$item_array[id]'>
															<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
														</a></div>
														<div class='tooltip'><button class='button-remove' onclick='unp.remove($item_array[id])'>
															<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
														</button></div>
												</div-->";
							
							
						$preResultStr .= "<p><b>УНП: </b><span class='classUnp'>$item_array[unp]</span></p><p><b>Наименование: </b><span class='className'>$item_array[reestr_unp_name]</span></p>";
						$preResultStr .= "<p><b>Краткое наименование: </b>$item_array[name_short]</p>";
						/*$preResultStr .= "<p><b>Адрес:</b> <span address_index='$item_array[address_index]'>$item_array[address_index]</span>, <span address_region='$item_array[address_region]'>$item_array[spr_region_name]</span>, <span address_district='$item_array[address_district]'>$item_array[spr_district_name] р-н</span>, <span address_city_type='$item_array[address_city_type]'>$item_array[spr_type_city_name]</span> <span address_city='$item_array[address_city]'>$item_array[spr_city_name]</span>, <span address_street_type='$item_array[address_street_type]'> $item_array[spr_type_street_name]</span> <span address_street='$item_array[address_street]'>$item_array[address_street]</span>  <span address_building='$item_array[address_building]'>$item_array[address_building]</span>, <span address_flat='$item_array[address_flat]'>$item_array[address_flat]</span></p>";*/
						$preResultStr .= "<p><b>Адрес:</b>".function_address([$item_array['address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['address_street'],$item_array['address_building'],$item_array['address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],0,0])."</p>";
						$preResultStr .= "</br><p><b>Список ответственных лиц привязанных к этому УНП: </b>***mask***</p>";
		
						$preResultStr .= "</div>";
						$current_id = $item_array['id'];
						$str_subjects .= "<p id_rersp = '$item_array[reestr_personal_id]' onclick='personal.check_otv($item_array[reestr_personal_id]), subject.otv_insert_info($item_array[reestr_personal_id])' class='card_href'>$item_array[reestr_personal_secondname] $item_array[reestr_personal_firstname] $item_array[reestr_personal_lastname] ($item_array[name_short], $item_array[reestr_personal_post])</p>";
						$flag = 2;						
						}
						
					
					
					};
				};
				$preResultStr = str_replace('***mask***',$str_subjects, $preResultStr);
				
			}
		return $preResultStr;

    }

	
					

	
	public function full_search_result_subjectSource($work_array, $preResultStr, $sbobj)
    {

		if(count($work_array) > 0) {
			$preResultStr = "<script src='/ARM/basis/Assets/js/js-modalSearch.js'></script>";
			$str_objects = "";	
			$current_id = 0;
			$flag = 1;
//print_r($work_array);					
			foreach($work_array as $item_array){
			
		
				if(($item_array['reestr_object_ti_is']) == 1 || $sbobj==1){	  ////// по наличию признака теплоисточника во вкладке ТИ  ($sbobj==1-субабоненты, $sbobj==0 - теплоисточники)
			
					if($flag == 1){
				
						$preResultStr .= "<div class='result_html' id_subject='$item_array[id]'> 
											<!--div class='btn_panel'>
													<div class='tooltip'><a href='/ARM/basis/subject/edit/$item_array[id]'><button class='button-edit'>
														<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
													</button></a></div>
													<div class='tooltip'><button class='button-remove' onclick='subject.remove($item_array[id])'>
														<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
													</button></div>
											</div-->";
						$preResultStr .= "<div><p><b>Наименование: </b><span class='className'>	$item_array[reestr_subject_name]</span></p>";
						$preResultStr .= "<p><b>Адрес:</b> ".function_address([$item_array['place_address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['place_address_street'],$item_array['place_address_building'],$item_array['place_address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],0,0])."</p></div>";
						
						$preResultStr .= "</br><p><b>Список объектов: </b><span class='className'>***mask***</span></p>";
						$preResultStr .= "</div>";
						//$flag = 2;
	
						if($item_array['reestr_object_id'] > 0){
							$str_objects .= "<p tabindex='1' class='card_href' object_source_ti=".($item_array['reestr_object_id'] == '' ? 0 : $item_array['reestr_object_id'])."  onclick = 'object.add_heat_source(".($item_array['reestr_object_id'] == '' ? 0 : $item_array['reestr_object_id']).",$item_array[id],".($item_array['reestr_object_e_subobj_power'] == '' ? 0 : $item_array['reestr_object_e_subobj_power']).")'><span>$item_array[reestr_object_name]".(strlen($item_array['reestr_object_ti_name'])>0 ? "  (ТИ: $item_array[reestr_object_ti_name])": '')." ($item_array[reestr_subject_name])</span></p>";
						}
						$current_id = $item_array['id'];
						$flag = 2;					
					}else{
						
						if($current_id == $item_array['id']){
							
							if($item_array['reestr_object_id'] > 0){				
								$str_objects .= "<p tabindex='1' class='card_href' object_source_ti=".($item_array['reestr_object_id'] == '' ? 0 : $item_array['reestr_object_id'])."  onclick = 'object.add_heat_source(".($item_array['reestr_object_id'] == '' ? 0 : $item_array['reestr_object_id']).",$item_array[id],".($item_array['reestr_object_e_subobj_power'] == '' ? 0 : $item_array['reestr_object_e_subobj_power']).")'><span>$item_array[reestr_object_name]".(strlen($item_array['reestr_object_ti_name'])>0 ? "  (ТИ: $item_array[reestr_object_ti_name])": '')."  ($item_array[reestr_subject_name])</span></p>";
							}
							$current_id = $item_array['id'];
						
						}else{

							if(strlen($str_objects) == 0){
								if($sbobj==1){
									$str_objects = '<p>У заданного потребителя нет объектов</p>';
								}else{
									$str_objects = '<p>У заданного потребителя нет типлоисточников</p>';
								}
								
							}

						
							$preResultStr = str_replace('***mask***',$str_objects, $preResultStr);
							
							
							$str_objects = "";
					
							$preResultStr .= "<div class='result_html' id_subject='$item_array[id]'> 
												<!--div class='btn_panel'>
														<div class='tooltip'><a href='/ARM/basis/subject/edit/$item_array[id]'><button class='button-edit'>
															<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
														</button></a></div>
														<div class='tooltip'><button class='button-remove' onclick='subject.remove($item_array[id])'>
															<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
														</button></div>
												</div-->";
							$preResultStr .= "<div><p><b>Наименование: </b><span class='className'>	$item_array[reestr_subject_name]</span></p>";
							$preResultStr .= "<p><b>Адрес:</b> ".function_address([$item_array['place_address_index'],$item_array['spr_region_name'],$item_array['spr_district_name'],$item_array['spr_type_city_sokr_name'],$item_array['spr_city_name'],$item_array['spr_type_street_sokr_name'],$item_array['place_address_street'],$item_array['place_address_building'],$item_array['place_address_flat'],$item_array['spr_city_zone_name'],$item_array['spr_city_key_region'],0,0])."</p></div>";
							$preResultStr .= "</br><p><b>Список объектов: </b><span class='className'>***mask***</span></p>";					
							$preResultStr .= "</div>";
							
							$current_id = $item_array['id'];
							if($item_array['reestr_object_id'] > 0){
								$str_objects = "<p tabindex='1' class='card_href' object_source_ti=".($item_array['reestr_object_id'] == '' ? 0 : $item_array['reestr_object_id'])." onclick = 'object.add_heat_source(".($item_array['reestr_object_id'] == '' ? 0 : $item_array['reestr_object_id']).",$item_array[id],".($item_array['reestr_object_e_subobj_power'] == '' ? 0 : $item_array['reestr_object_e_subobj_power']).")'><span>$item_array[reestr_object_name]".(strlen($item_array['reestr_object_ti_name'])>0 ? "  (ТИ: $item_array[reestr_object_ti_name])": '')."  ($item_array[reestr_subject_name])</span></p>";
							}
							$flag = 2;						
						}

					};
					
				};
			};

				if(strlen($str_objects) == 0){
					if($sbobj==1){
						$str_objects = '<p>У заданного потребителя нет объектов</p>';
					}else{
						$str_objects = '<p>У заданного потребителя нет типлоисточников</p>';
					}
					
				}
				
				
				$preResultStr = str_replace('***mask***',$str_objects, $preResultStr);
		}
		return $preResultStr;

    }	

	public function full_search_result_individual_persons($work_array, $preResultStr)
    {
	

		if(count($work_array) > 0) {
			$preResultStr = "<script src='/ARM/basis/Assets/js/js-modalSearch.js'></script>";
				$current_id = 0;
				$flag = 1;				
	
				foreach($work_array as $item_array){
					
					
					/*if($flag == 1){*/
					
					$preResultStr .= "<div class='result_html' id_ind_pers='$item_array[id]'> ";
					
					if($_COOKIE['access_level'] == 2 || $_COOKIE['access_level']  == 1){
					$preResultStr .="<div class='btn_panel'>
										<div class='tooltip'><a href='/ARM/basis/individual_persons/edit/$item_array[id]'><button class='button-edit'>
											<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
														</button></a>
										</div>";
														
										
						$preResultStr .= "<div class='tooltip'><button class='button-remove' onclick='ind_pers.remove($item_array[id])' ".($item_array['col_sbjs'] == 0 ? '':'disabled').">
															<i class='icon-trash icons'></i><span class = 'tooltiptext'>".($item_array['col_sbjs'] == 0 ? 'удалить':'удалить невозможно')."</span>
														</button></div>
												</div>";
												
					}	
												
								/*$preResultStr .= "<p><b>УНП: </b><span class='classUnp'>$item_array[unp]</span></p><p><b>Наименование: </b><span class='className'>$item_array[reestr_unp_name]</span></p>";
								$preResultStr .= "<p><b>Краткое наименование: </b>$item_array[name_short]</p>";*/
								$preResultStr .= "<a href='/ARM/basis/individual_persons/edit/".$item_array['id']."?mode=individual_persons_info' target = '_blank'><p class='ind_pers_search_p'><b class='ind_pers_search'>ФИО:</b> <span class='firstname' firstname='$item_array[firstname]'>$item_array[firstname]</span> <span  class='secondname' secondname='$item_array[secondname]'>$item_array[secondname]</span> <span class='lastname' lastname='$item_array[lastname]'>$item_array[lastname]</span></p>";
								$preResultStr .= "<p class='ind_pers_search_p'><b class='ind_pers_search'>Идентификационный номер паспорта: </b>$item_array[identification_number]</p></a>";
								/*$preResultStr .= "<a href='/ARM/basis/responsible_persons/list/$item_array[id]' class='btn btn-primary-ob'>Ответственные лица</a>";*/
								$preResultStr .= "</div>";
								/*$current_id = $item_array['id'];
								$flag = 2;*/
					/*}else{*/
					
					
								/*if($current_id == $item_array['id']){	
									$current_id = $item_array['id'];
								}else{
								$flag = 1;

								$preResultStr .= "<div class='result_html' id_resp_pers='$item_array[id]'> 
													<div class='btn_panel'>
															<div class='tooltip'><a href='/ARM/basis/unp/edit/$item_array[id]'><button class='button-edit'>
																<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
															</button></a></div>
															<div class='tooltip'><button class='button-remove' onclick='unp.remove($item_array[id])'>
																<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
															</button></div>
													</div>";
									$preResultStr .= "<p><b>УНП: </b><span class='classUnp'>$item_array[unp]</span></p><p><b>Наименование: </b><span class='className'>$item_array[reestr_unp_name]</span></p>";
									$preResultStr .= "<p><b>Краткое наименование: </b>$item_array[name_short]</p>";
									$preResultStr .= "<p><b>Адрес:</b> <span address_index='$item_array[address_index]'>$item_array[address_index]</span>, <span address_region='$item_array[address_region]'>$item_array[spr_region_name]</span>, <span address_district='$item_array[address_district]'>$item_array[spr_district_name] р-н</span>, <span address_city_type='$item_array[address_city_type]'>$item_array[spr_type_city_name]</span> <span address_city='$item_array[address_city]'>$item_array[spr_city_name]</span>, <span address_street_type='$item_array[address_street_type]'> $item_array[spr_type_street_name]</span> <span address_street='$item_array[address_street]'>$item_array[address_street]</span>  <span address_building='$item_array[address_building]'>$item_array[address_building]</span>, <span address_flat='$item_array[address_flat]'>$item_array[address_flat]</span></p>";
									$preResultStr .= "<a href='/ARM/basis/responsible_persons/list/$item_array[id]' class='btn btn-primary-ob'>Ответственные лица</a>";
				
								$preResultStr .= "</div>";
								$current_id = $item_array['id'];
								$flag = 2;						
								}*/

					/*};*/
					
				};	
					
		}
		return $preResultStr;
	}	




	public function full_search_result_responsible_persons_secondname($work_array, $preResultStr)
    {
		

		if(count($work_array) > 0) {
		
			if(strlen($preResultStr)==0){
				$preResultStr .= "<script src='/ARM/basis/Assets/js/js-modalSearch.js'></script>";
			}
				$current_id = 0;
				$flag = 1;				
		
				foreach($work_array as $item_array){
					
							$preResultStr .= "<div class='result_html pers_second' id_resp_pers='$item_array[id]'> ";
							if($_COOKIE['access_level'] == 2 || $_COOKIE['access_level']  == 1){
								$preResultStr .= "<div class='btn_panel'>
							 			<div class='tooltip'><a href='/ARM/basis/personal/edit/$item_array[id]'><button class='button-edit'>
															<i class='icon-fixed-width icon-pencil'></i><span class = 'tooltiptext'>редактировать</span>
														</button></a></div>
														<div class='tooltip'><button class='button-remove' onclick='resp_pers.remove($item_array[id])'>
															<i class='icon-trash icons'></i><span class = 'tooltiptext'>удалить</span>
														</button></div>
												</div>";
								}				
												
							$preResultStr .= "<a href='/ARM/basis/personal/edit/".$item_array['id']."?mode=personal_info' target = '_blank'><p><b class='ind_pers_search'>ФИО:</b> <span  class='secondname' secondname='$item_array[secondname]'>$item_array[secondname]</span> <span class='firstname' firstname='$item_array[firstname]'>$item_array[firstname]</span> <span class='lastname' lastname='$item_array[lastname]'>$item_array[lastname]</span></p>";
							$preResultStr .= "<p><b class='ind_pers_search'>Должность: </b>$item_array[post]</p>";
							$preResultStr .= "<p><b class='ind_pers_search'>Дата назначения на должность: </b>".date('d.m.Y',strtotime($item_array['post_data']))."</p>";
							$preResultStr .= "<p><b class='ind_pers_search'>Телефон: </b>$item_array[tel]</p>";
							$preResultStr .= "<p><b class='ind_pers_search'>E-mail: </b>$item_array[email]</p></a>";
							$preResultStr .= "</div>";
	
				};	
					
		}
		return $preResultStr;
	}



	
	
}

function fun_address($ar){

	foreach ($ar as $key => $value) {
		$ar[$key]=trim($ar[$key]," \t\n\r\0\x0B");					// удаляем пробелы вначале и конце 	
		$ar[$key]=str_replace('  ',' ',$ar[$key]); 					// заменяем два пробела на один
	}

	$znak=".";   //последняя точка в адресе 
	
	if ($ar['on_ct_z']==0) 	{$ar['ct_z']=null;} 	 										// не выводим аргумент ['ct_z'] 
	if (($ar['ct_z']!=null) and ($ar['ct_keyr']==1))	{$ar['ct_z']="(".$ar['ct_z']." район)".$znak; 	$znak=", "; }										// аргумент ['ct_z'] с точкой а следующие с запятой
	
	if ($ar['flt']==null) 	{} 														else {	$ar['flt']=$ar['flt'].$znak;	$znak=", ";	} 					// аргумент ['flt'] с точкой а следующие с запятой					
	if ($ar['bld']==null) 	{$ar['bld']="номер дома неизвестен".$znak;	$znak=", ";}else {	$ar['bld']=$ar['bld'].$znak;	$znak=", ";	} 					// аргумент ['bld'] с точкой а следующие с запятой
	if ($ar['st']==null) 	{$ar['st']="улица неизвестна".$znak;	$znak=", ";} 	else {	$ar['st']=$ar['st_t'].trim($ar['st']).$znak;	$znak=", ";	}	// аргумент ['st'] добавляем тип ['st_t'] и  с точкой а следующие с запятой

	if ($ar['ct']==null) 	{
		if ($ar['ct_keyr']==1) {
			$ar['rgn']=null; 																// если областной область не выводим
			$ar['dst']=null;																// если областной район не выводим
			$ar['ct']=$ar['ct_t'].$ar['ct'].$znak;					 
			$znak=", ";																		// аргумент ['ct'] с точкой а следующие с запятой
		} else {
			$ar['ct']=$ar['ct_t'].$ar['ct'].$znak;	$znak=", ";	
		}
	}
	
	if ($ar['dst']==null) {} else {	$ar['dst']=$ar['dst']." район".$znak;	$znak=", ";	} 	// аргумент ['dst'] с точкой а следующие с запятой
	if ($ar['rgn']==null) {} else {	$ar['rgn']=$ar['rgn'].$znak;	$znak=", ";	} 			// аргумент ['rgn'] с точкой а следующие с запятой
	
	if ($ar['ind']==null) {} else {	$ar['ind']=$ar['ind'].$znak;	$znak=", ";	} 			// аргумент ['ind'] с точкой а следующие с запятой	
	if ($ar['on_ind']==0) {$ar['ind']=null;} 	  else { } 									// не выводим аргумент ['ind'] 
		
	$text=	$ar['ind'].$ar['rgn'].$ar['dst'].$ar['ct'].$ar['st'].$ar['bld'].$ar['flt'].$ar['ct_z'];		//сбор строки адреса
	if (mb_strlen($text)==0) {$text="-";}
	return $text;						
}