<?php

namespace Examination\Controller;
include $_SERVER['DOCUMENT_ROOT']."/ARM/basis/View/functions.php";
use Admin\Controller\AddressController;
use Admin\Controller\AdminController;
use Engine\Helper\Cookie;

class FilterController extends AdminController
{	
	
	public function count_items_for_pagination()
	{
		$params = $this->request->post;
		
		if(isset($params['mf_region_unp'])){ // mf_region_unp передается только в фильтре для поиска в юр. лицах
			$this->load->model('Unp');
			$arr_result = $this->model->unp->getUnpByFilter($params);
			
		}elseif(isset($params['mf_region_sbj'])){ // mf_region_sbj передается только в фильтре для поиска в объектах/потребителях
			$this->load->model('Subject');
			$arr_result = $this->model->subject->getSubjectsByFilter($params);
			
		}elseif(isset($params['mf_ip_firstname'])){ // 
			$this->load->model('Individual_persons');
			$arr_result = $this->model->individual_persons->getIndPersByFilter($params);
			
		}elseif(isset($params['mf_zurnal_pers'])){ // 
			$this->load->model('Test_book_e');
			$arr_result = $this->model->test_book_e->getBook_eFilter($params);
		
		}elseif(isset($params['mf_zurnal_pers_t'])){ // 
			$this->load->model('Test_book_t');
			$arr_result = $this->model->test_book_t->getBook_tFilter($params);
		
		}elseif(isset($params['mf_zurnal_pers_g'])){ // 
			$this->load->model('Test_book_g');
			$arr_result = $this->model->test_book_g->getBook_gFilter($params);
		}
		elseif(isset($params['mf_zurnal_personal'])){ // 
			$this->load->model('Personal');
			$arr_result = $this->model->personal->getPersonal_Filter($params);
		}		
		
		echo count($arr_result);
}
	

	
	public function mf_zurnal()
	{
		$params = $this->request->post;
		//$access_level = $this->data['access_level'];
		
		$this->load->model('Test_book_e');
		$arr_result = $this->model->test_book_e->getBook_eFilter($params);
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		
		$n = 1;
		if(count($arr_result) > 0){
			$str_result = '';
//print_r($arr_result);			
			foreach($arr_result as $arr_item){
				$str_result .= '<tr class="item-'.$arr_item['id'].'">';
				
					//$t1 = $arr_item['test_validity'];
					//$t2 = date('Y-m-d');
				
				//$str_result .='<tr class="item-'.$arr_item['id'].'" id="'.(strtotime($t1) < strtotime($t2) ?  "prosrok" : "").'">';
				
				
				//$str_result .='<td class="list_td">'.(++$offset).'</td>';
				$str_result .='<td class="list_td">'.$arr_item['id'].'</td>';
				$str_result .='<td class="list_td">'.date('d.m.Y',strtotime($arr_item['date'])).'</td>';
				
				$str_result .='<td>
							<a href="/ARM/basis/personal/edit/'.$arr_item['person_id'].'?mode=responsible_persons_info" target = "_blank" class="">
								<span><i class="icon-rp"></i>&nbsp
									'.$arr_item['person_name'].' ('.$arr_item['person_position'].')<br>
									<div class="str_podr_pers">
									('.$arr_item['branch_sokr_name'].', '.$arr_item['podrazd_sokr_name'].', '.$arr_item['otdel_sokr_name'].')
									</div>
								</span>
							</a>							
						</td>';			
				$str_result .='<td class="list_td">'.$arr_item['el_group'].'</td>';
				$str_result .='<td class="list_td">'.$arr_item['spr_test_reasons_elektro_name'].'</td>';
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
						$str_result .='<td class="list_td">
										<div class="tooltip" >
											<a href="/ARM/examination/zurnal/zurnal_e_edit/'.$arr_item['person_id'].'">
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
									</td>';
				

				$str_result .='</td>';
				$str_result .='</tr>';
			
			}
		}else{
			$str_result = 'По запросу данных нет';
		}
		
		echo $str_result;
		
		
		
	}
	
 


	public function mf_zurnal_t()
	{
		$params = $this->request->post;
		
		$this->load->model('Test_book_t');
		$arr_result = $this->model->test_book_t->getBook_tFilter($params);
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		
		$n = 1;

		if(count($arr_result) > 0){
			$str_result = '';
			
			foreach($arr_result as $arr_item){
				

				$str_result .= '<tr class="item-'.$arr_item['id'].'">';
				$str_result .='<td class="list_td">'.$arr_item['id'].'</td>';
				$str_result .='<td class="list_td">'.date('d.m.Y',strtotime($arr_item['date'])).'</td>';
				
				$str_result .='<td>
							<a href="/ARM/basis/personal/edit/'.$arr_item['person_id'].'?mode=responsible_persons_info" target = "_blank" class="">
								<span><i class="icon-rp"></i>&nbsp
									'.$arr_item['person_name'].' ('.$arr_item['person_position'].')<br>
									<div class="str_podr_pers">
									('.$arr_item['branch_sokr_name'].', '.$arr_item['podrazd_sokr_name'].', '.$arr_item['otdel_sokr_name'].')
									</div>
								</span>
							</a>							
						</td>';			
				$str_result .='<td class="list_td">'.$arr_item['spr_test_reasons_teplo_name'].'</td>';
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
						$str_result .='<td class="list_td">
										<div class="tooltip" >
											<a href="/ARM/examination/zurnal/zurnal_t_edit/'.$arr_item['person_id'].'">
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
									</td>';
				

				$str_result .='</td>';
				$str_result .='</tr>';
			
			}
		}else{
			$str_result = 'По запросу данных нет';
		}
		
		echo $str_result;
		
		
		
	}


	public function mf_zurnal_g()
	{
		$params = $this->request->post;
	
		
		$this->load->model('Test_book_g');
		$arr_result = $this->model->test_book_g->getBook_gFilter($params);
		
		if(isset($params['mf_num_page']) && isset($params['mf_num_items'])){
			
			$num_page = ($params['mf_num_page'] > 1 ? $params['mf_num_page'] : 1);
			$limit = $params['mf_num_items'];
			$offset = ($num_page - 1)*$limit;
		}
		
		
		$n = 1;
		if(count($arr_result) > 0){
			$str_result = '';
			
			foreach($arr_result as $arr_item){
												
				$str_result .= '<tr class="item-'.$arr_item['id'].'">';
				$str_result .='<td class="list_td">'.$arr_item['id'].'</td>';
				$str_result .='<td class="list_td">'.date('d.m.Y',strtotime($arr_item['date'])).'</td>';
				
				$str_result .='<td>
							<a href="/ARM/basis/personal/edit/'.$arr_item['person_id'].'?mode=responsible_persons_info" target = "_blank" class="">
								<span><i class="icon-rp"></i>&nbsp
									'.$arr_item['person_name'].' ('.$arr_item['person_position'].')<br>
									<div class="str_podr_pers">
									('.$arr_item['branch_sokr_name'].', '.$arr_item['podrazd_sokr_name'].', '.$arr_item['otdel_sokr_name'].')
									</div>
								</span>
							</a>							
						</td>';			
				$str_result .='<td class="list_td">'.$arr_item['spr_test_reasons_gaz_name'].'</td>';
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
						$str_result .='<td class="list_td">
										<div class="tooltip" >
											<a href="/ARM/examination/zurnal/zurnal_g_edit/'.$arr_item['person_id'].'">
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
									</td>';
				

				$str_result .='</td>';
				$str_result .='</tr>';
			
			}
		}else{
			$str_result = 'По запросу данных нет';
		}
		
		echo $str_result;
		
		
		
	}


 
}