<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-list"></i></span><p>Журнал ОЛЭ</p></div>
    <main>
        <div class="container">
			<div class="sticky_body">
				<div class='top_of_page'>
					<!--------------------------------- Информация о странице --------------------------------->
					<div class="page_title">
						<h5>Реестр ОЛЭ</h5>				
						<h3><span><i class="icon-unp">&nbsp</i></span>Журнал прохождения тестирования ответственных лиц за электрохозяйство</h3>
					</div>
					<div class ='nav_buttons'> 
						<button class="button_filter" id='filterForZurnal_e'><span><i class="icon-filter"></i></span>Фильтр</button>				
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
											<input type='date' placeholder='Введите дату документа' id="zurnal_date_doc_ot" name="zurnal_date_doc_ot" class="form-controls" value=''></input>	
											<label for = 'zurnal_date_doc_do' class='label_subject'>до:</label>	
											<input type='date' placeholder='Введите дату документа' id="zurnal_date_doc_do" name="zurnal_date_doc_do" class="form-controls" value=''></input>
										<hr/>
									</div>			
								<!--структурное подразделение -->
									<div id='filter_address_post'>
										
										<h3>Структурное подразделение в котором выполнялась проверка знаний</h3>
										<br>
										<select id='formBranchObject' onchange='address.selectPodrazdelenie("Object")' class="form-controls">
											<option value='0'>Выберите филиал</option>
											<?php foreach($branchs as $branch):?>
												<option value=<?=$branch['id']?> <?php echo (isset($cookie_formBranchObject) ? ($cookie_formBranchObject == $region['id'] ? 'selected' : '') : '') ?>><?=$branch['sokr_name']?></option>
											<?php endforeach; ?>
										</select>
							
										<!--select id='formPodrazdelenieObject' onchange='address.selectOtdel("Object"), object.usersList()' class="form-controls"-->
										<select id='formPodrazdelenieObject' onchange='address.selectOtdel("Object")' class="form-controls">
											<option value='0'>Выберите МРО</option>
											<?php
												if(isset($fltr_Podrazdelenie)){
													foreach($fltr_Podrazdelenie as $item_fltr_Podrazdelenie){
														echo '<option value='.$item_fltr_Podrazdelenie['id'].' '.(isset($cookie_formPodrazdelenieObject) ? ($cookie_formPodrazdelenieObject == $item_fltr_Podrazdelenie['id'] ? 'selected' : '') : '').'>'.$item_fltr_Podrazdelenie['sokr_name'].'</option>';
													}
												}
											?>
										</select>
							
										<select id='formOtdelObject' class="form-controls">
											<option value='0'>Выберите РЭГИ</option>
											<?php
												if(isset($fltr_Otdel)){
													foreach($fltr_Otdel as $item_fltr_Otdel){
														echo '<option value='.$item_fltr_Otdel['id'].' '.(isset($cookie_formOtdelObject) ? ($cookie_formOtdelObject == $item_fltr_Otdel['id'] ? 'selected' : '') : '').'>'.$item_fltr_Otdel['sokr_name'].'</option>';
													}
												}
											?>
										</select>
										<input type='text' placeholder='Введите фамилию инспектора' id="zurnal_insp" name="zurnal_insp" class="form-controls" value='<?php echo (isset($cookie_formUser) ? $cookie_formUser : '')?>'></input>
										<hr/>
									</div>
								<!--------- Подтверждающий документ --------->	
									<div id='filter_address_fact'>
										<h3>Подтверждающий документ (№, дата)</h3>
										<br>
										<input type='text' placeholder='Введите номер документа' id="zurnal_num_doc" name="zurnal_num_doc" class="form-controls" value=''></input>
										<input type='date' placeholder='Введите дату документа' id="zurnal_date_doc" name="zurnal_date_doc" class="form-controls" value=''></input>
										<hr/>
									</div>							
								<!--------- Член комиссии --------->	
									<div id='filter_address_fact'>
										<h3>Член комиссии</h3>
										<br>
										<input type='text' placeholder='Введите фамилию' id="zurnal_fio_member" name="zurnal_fio_member" class="form-controls" value=''></input>
										<hr/>
									</div>							
							
							</form>	
							</div>
								<!--------- Блок фильтра для потребителя --------->	
								
								<div class ='nav_buttons'>
									<button class="button_filter" id='apply_filter_e'><span><i class="icon-check-ok"></i></span>Применить</button>
									<button class="button_filter" id='clear_filter_object' onclick="filterMain.clearFilter();"><span><i class="icon-clear"></i></span>Очистить</button>
									<div class='enter_r'>Выводить по <input type='number' name='num_items_on_page' id='num_items_on_page' value='100'></input></div>									
								</div>
								
						</div>					
					</div>
				</div>			
			
			<div class='total_check'>
				Всего: <span id='count_record_e'></span>
			</div>
			</div>




					

<?php //print_r($test_book_e);?>
			
			<table class="main_table">
                <thead>
					<tr>
						<th width="4%">№<br/>п/п.</th>
						<th width="10%">Дата прохождения</span></th>
						<th width="50%">ФИО<br/></th>
						<th width="10%">Группа<br/></th>
						<th width="10%">Причина<br/></th>
						<th width="10%">Результат</th>
						<th width="10%">Следующая проверка знаний</th>
						<th width="10%">Операции</th>
					</tr>
                </thead>
                
				<tbody>
					<?php 

					if(count($test_book_e) > 0){
					$n = 1; // номер по порядку

					foreach($test_book_e as $zurnal):

									////$t1 = $zurnal['test_validity'];
									//$t2 = date('Y-m-d');
					?>
					<!--tr class="item-<?//= $zurnal['id'] ?>" id="<?//= (strtotime($t1) < strtotime($t2) ?  'prosrok' : '')?>"-->
					<tr class="item-<?= $zurnal['id'] ?>" >	

						<td class="list_td"><?= $zurnal['id'] ?></td>
						<td class="list_td"><?= date('d.m.Y',strtotime($zurnal['date'])) ?></td>
						<td>
							<a href="/ARM/basis/personal/edit/<?= $zurnal['person_id'] ?>?mode=responsible_persons_info" target = "_blank" class="">
								<span><i class="icon-rp"></i>&nbsp
								<?php 
									echo $zurnal['person_name']." (".$zurnal['person_position'].")"; ?><br>
									<div class="str_podr_pers">
									<?php echo " (".$zurnal['branch_name'].", ".$zurnal['podrazd_name'].", ".$zurnal['otdel_name'].")";?>
									</div>
								</span>
							</a>							
						</td>
						<td class="list_td"><?= $zurnal['el_group'] ?></td>
						<td class="list_td"><?= $zurnal['spr_test_reasons_elektro_name'] ?></td>
						
						
						<?php if($zurnal['test_result'] == 'не завершен'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-close'></i><span class = 'tooltiptext'>не завершен</span></div></td>
						<?php } ?>
						<?php if($zurnal['test_result'] == 'сдан'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>сдан</span></div></td>
						<?php } ?>					
						<?php if($zurnal['test_result'] == 'не сдан'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-minus'></i><span class = 'tooltiptext'>не сдан</span></div></td>
						<?php } ?>					

						<td class="list_td"><?= date('d.m.Y',strtotime($zurnal['test_validity'])) ?></td>
						
						<td class="list_td">
							<div class="tooltip" >
								<a href="/ARM/examination/zurnal/zurnal_e_edit/<?= $zurnal['person_id'] ?>">
									<button class="button-edit">
										<i class="icon-eye"></i><span class = "tooltiptext">просмотр истории</span>
									</button>
								</a>
							</div>
							<div class="tooltip">
								<button class="button-operations" onclick="report_zurnal.zurnalMain_e(<?= $zurnal['id'] ?>)">
									<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
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