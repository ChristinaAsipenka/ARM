<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-list"></i></span><p>Журнал ПЗ</p></div>
    <main>
        <div class="container">
			<div class="sticky_body">
				<div class='top_of_page'>
					<!--------------------------------- Информация о странице --------------------------------->
					<div class="page_title">
						<h5>Реестр ПЗ</h5>				
						<h3><span><i class="icon-unp">&nbsp</i></span>Журнал прохождения тестирования ОЛ</h3>
					</div>
					<div class ='nav_buttons'> 
						<button class="button_filter" id='filterForZurnal'><span><i class="icon-filter"></i></span>Фильтр</button>				
						<button onclick='report.print_filter_srok(); preloaderStart()' class="button_unp"><span><i class="icon-game-controller"></i></span>в Excel</button>	
						<div class='search_table absolute_r'>
							<input type="text" class="form-control pull-right" id="search_table" placeholder="Поиск по таблице">
						</div>
					</div>
					<div id='filter_parametrs_text'></div>					
				</div>
			
					<!--------------------------------- Фильтр --------------------------------->
				<div class="flex nav_block">		
					
					<div id='main_block_filter'>
					
						<button id='close_filter'>&#215 </button>
						<div id='block_for_unp'>
						
							<div class="base_part">
							<form class="form" >
								<!-- ответственное лицо -->
									
									<div id='filter_address_fact'>
										<h5>Параметры фильтра</h5><hr/>
										<h3>Ответственное лицо (фрагмент)</h3>
										<br>
										<input type='text' placeholder='Введите ФИО ответственного' id="zurnal_pers" name="zurnal_pers" class="form-controls" value='<?php echo (isset($cookie_formUser) ? $cookie_formUser : '')?>'></input>
										<input type='text' placeholder='Введите должность' id="zurnal_pers_dolg" name="zurnal_pers_dolg" class="form-controls" value='<?php echo (isset($cookie_formUser) ? $cookie_formUser : '')?>'></input>
										<hr/>
									</div>
								<!-- результат теста -->
									<div id='filter_address_post'>
									<h3>Контроль за сроками проверки знаний</h3>
									<br>
										<input type='checkbox' id="pz_prosrok" name="pz_prosrok" class="custom-checkbox" value='0' onclick="test.is_prosroch()"></input>
										<label for = 'pz_prosrok' class='label_subject'>истек срок проверки знаний</label>
									</div>	
								<hr/>								
								<!--------- Проверка знаний за период --------->								
									<div id='filter_address_fact'>
										<h3>Проверка знаний за период</h3>
										<br>
											<label for = 'zurnal_date_doc_ot' class='label_subject'>от:</label>
											<input type='date' placeholder='Введите дату' id="zurnal_date_doc_ot" name="zurnal_date_doc_ot" class="form-controls" value=''></input>	
											<label for = 'zurnal_date_doc_do' class='label_subject'>до:</label>	
											<input type='date' placeholder='Введите дату' id="zurnal_date_doc_do" name="zurnal_date_doc_do" class="form-controls" value=''></input>
										<hr/>
									</div>
								<!--------- Проверка знаний за период --------->								
									<div id='filter_address_fact'>
										<h3>Истекает срок проверки знаний в период</h3>
										<br>
											<label for = 'zurnal_date_srok_doc_ot' class='label_subject'>от:</label>
											<input type='date' placeholder='Введите дату' id="zurnal_date_srok_doc_ot" name="zurnal_date_srok_doc_ot" class="form-controls" value=''></input>	
											<label for = 'zurnal_date_srok_doc_do' class='label_subject'>до:</label>	
											<input type='date' placeholder='Введите дату' id="zurnal_date_srok_doc_do" name="zurnal_date_srok_doc_do" class="form-controls" value=''></input>
										<hr/>
									</div>										
								<!--структурное подразделение -->
									<!--div id='filter_address_post'>
										
										<h3>Структурное подразделение в котором выполнялась проверка знаний</h3>
										<br>
										<select id='formBranchObject' onchange='address.selectPodrazdelenie("Object")' class="form-controls">
											<option value='0'>Выберите филиал</option>
											<//?php foreach($branchs as $branch):?>
												<option value=<//?=$branch['id']?> <//?php echo (isset($cookie_formBranchObject) ? ($cookie_formBranchObject == $region['id'] ? 'selected' : '') : '') ?>><//?=$branch['sokr_name']?></option>
											<//?php endforeach; ?>
										</select>

										<select id='formPodrazdelenieObject' onchange='address.selectOtdel("Object")' class="form-controls">
											<option value='0'>Выберите МРО</option>
											<//?php
												if(isset($fltr_Podrazdelenie)){
													foreach($fltr_Podrazdelenie as $item_fltr_Podrazdelenie){
														echo '<option value='.$item_fltr_Podrazdelenie['id'].' '.(isset($cookie_formPodrazdelenieObject) ? ($cookie_formPodrazdelenieObject == $item_fltr_Podrazdelenie['id'] ? 'selected' : '') : '').'>'.$item_fltr_Podrazdelenie['sokr_name'].'</option>';
													}
												}
											?>
										</select>
							
										<select id='formOtdelObject' class="form-controls">
											<option value='0'>Выберите РЭГИ</option>
											<//?php
												if(isset($fltr_Otdel)){
													foreach($fltr_Otdel as $item_fltr_Otdel){
														echo '<option value='.$item_fltr_Otdel['id'].' '.(isset($cookie_formOtdelObject) ? ($cookie_formOtdelObject == $item_fltr_Otdel['id'] ? 'selected' : '') : '').'>'.$item_fltr_Otdel['sokr_name'].'</option>';
													}
												}
											?>
										</select>
										<input type='text' placeholder='Введите фамилию инспектора' id="zurnal_insp" name="zurnal_insp" class="form-controls" value='<//?php echo (isset($cookie_formUser) ? $cookie_formUser : '')?>'></input>
										<hr/>
									</div-->
								<!--------- Подтверждающий документ --------->	
									<!--div id='filter_address_fact'>
										<h3>Подтверждающий документ (№, дата)</h3>
										<br>
										<input type='text' placeholder='Введите номер документа' id="zurnal_num_doc" name="zurnal_num_doc" class="form-controls" value=''></input>
										<input type='date' placeholder='Введите дату документа' id="zurnal_date_doc" name="zurnal_date_doc" class="form-controls" value=''></input>
										<hr/>
									</div-->							
								<!--------- Член комиссии --------->	
									<!--div id='filter_address_fact'>
										<h3>Член комиссии</h3>
										<br>
										<input type='text' placeholder='Введите фамилию' id="zurnal_fio_member" name="zurnal_fio_member" class="form-controls" value=''></input>
										<hr/>
									</div-->							
							
							</form>	
							</div>
								<!--------- Блок фильтра для потребителя --------->	
								
								<div class ='nav_buttons'>
									<button class="button_filter" id='apply_filter_personal'><span><i class="icon-check-ok"></i></span>Применить</button>
									<button class="button_filter" id='clear_filter_object' onclick="filterMain.clearFilter();"><span><i class="icon-clear"></i></span>Очистить</button>
									<div class='enter_r'>Выводить по <input type='number' name='num_items_on_page' id='num_items_on_page' value='100'></input></div>									
								</div>
								
						</div>					
					</div>
				</div>			
			
			<div class='total_check'>
				Всего: <span id='count_record_personal'></span>
			</div>
			</div>




					

<?php //print_r($test_book_e);?>
			
			<table class="main_table">
                <thead>
					<tr>
						<!--th width="4%">№<br/>п/п.</th-->
						<th width="5%">Дата прохождения</span></th>
						<th width="35%">ФИО<br/></th>
						<th width="10%">Направление деятельности<br/></th>
						<th width="10%">Статус записи<br/></th>
						<th width="10%">Причина<br/></th>
						<th width="10%">Результат</th>
						<th width="10%">Следующая проверка знаний</th>
						<th width="20%">Операции</th>
					</tr>
                </thead>
                
				<tbody>
				<?php 

					if(count($personal_srok) > 0){
					$n = 1; // номер по порядку
//print_r($personal_srok);
					foreach($personal_srok as $srok):
					?>
	
					
					<?php	$t1 = $srok['test_validity'];
							$t2 = date('Y-m-d');?>

					<tr class="item-<?= $srok['id'] ?>" id="<?= (strtotime($t1) < strtotime($t2) ?  'prosrok' : '')?>">
						<!--td class="list_td"><//?= $srok['id'] ?></td-->
						<td class="list_td"><?= date('d.m.Y',strtotime($srok['date'])) ?></td>
						<td>
							<a href="/ARM/basis/personal/edit/<?= $srok['person_id'] ?>?mode=responsible_persons_info" target = "_blank" class="">
								<span><i class="icon-rp"></i>&nbsp
								<?php 
									echo $srok['person_name']." (".$srok['person_position'].")"; ?><br>
									<!--div class="str_podr_pers">
									<//?php echo " (".$srok['person_name'].", ".$srok['person_position'].")";?>
									</div-->
								</span>
							</a>							
						</td>
						<td class="list_td"><?= $srok['napr_name'] ?></td>
						<td class="list_td"><?= $srok['record_mode'] ?></td>
						<?php if(isset($srok['spr_test_reasons_elektro_name'])){ ?>
							<td class="list_td"><?= $srok['spr_test_reasons_elektro_name'] ?></td>
						<?php } ?>
						<?php if(isset($srok['spr_test_reasons_teplo_name'])){ ?>
							<td class="list_td"><?= $srok['spr_test_reasons_teplo_name'] ?></td>
						<?php } ?>
						<?php if(isset($srok['spr_test_reasons_gaz_name'])){ ?>
							<td class="list_td"><?= $srok['spr_test_reasons_gaz_name'] ?></td>
						<?php } ?>
						
						<?php if($srok['test_result'] == 'не завершен'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-close'></i><span class = 'tooltiptext'>не завершен</span></div></td>
						<?php } ?>
						<?php if($srok['test_result'] == 'сдан'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>сдан</span></div></td>
						<?php } ?>					
						<?php if($srok['test_result'] == 'не сдан'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-minus'></i><span class = 'tooltiptext'>не сдан</span></div></td>
						<?php } ?>					

						<td class="list_td"><?= date('d.m.Y',strtotime($srok['test_validity'])) ?></td>
						
						<td class="list_td">
							<div class="tooltip" >
								<?php if($srok['activity_line'] == 1){?>
									<a href="/ARM/examination/zurnal/zurnal_e_edit/<?= $srok['person_id'] ?>" target="_blank">
										<button class="button-edit">
											<i class="icon-eye"></i><span class = "tooltiptext">просмотр истории</span>
										</button>
									</a>								
								<?php }elseif($srok['activity_line'] == 2){ ?>								
									<a href="/ARM/examination/zurnal/zurnal_t_edit/<?= $srok['person_id'] ?>" target="_blank">
										<button class="button-edit">
											<i class="icon-eye"></i><span class = "tooltiptext">просмотр истории</span>
										</button>
									</a>								
								<?php }elseif($srok['activity_line'] == 3){ ?>								
									<a href="/ARM/examination/zurnal/zurnal_g_edit/<?= $srok['person_id'] ?>" target="_blank">
										<button class="button-edit">
											<i class="icon-eye"></i><span class = "tooltiptext">просмотр истории</span>
										</button>
									</a>								
								<?php }?>															
							</div>
							<div class="tooltip">
								<?php if($srok['activity_line'] == 1){?>
									<button class="button-operations" onclick="report_zurnal.zurnalMain_e(<?= $srok['id'] ?>)">
									<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
									</button>								
								<?php }elseif($srok['activity_line'] == 2){ ?>
									<button class="button-operations" onclick="report_zurnal.zurnalMain_t(<?= $srok['id'] ?>)">
									<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
									</button>									
								<?php }elseif($srok['activity_line'] == 3){ ?>
									<button class="button-operations" onclick="report_zurnal.zurnalMain_g(<?= $srok['id'] ?>)">
									<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
									</button>								
								<?php }?>
							</div>	
							<div class="tooltip" >
									<button class="button-envelope <?php echo (strtotime($t1) < strtotime($t2) ? '' : 'display_none')?>" onclick="report.letter_srok(<?= $srok['id']?>,<?=$srok['activity_line']?>)" >
									<i class="icon-envelope"></i><span class = "tooltiptext">письмо о несоблюдении сроков</span>
									</button>
							</div>
						</td>
				
					</tr>
					<?php endforeach; 
					?>
                </tbody>
            </table>
				<?php }else{
						echo ' </tbody></table>';
						echo '<p id="text_info">Записи отсутсвуют.</p>';					

				} ?>


			<hr/><ul id='pagination'></ul>
	

		</div>

	</main>		
				
			
<?php $this->theme->footer(); ?>

<div id='filter_parametrs_text'></div>	