<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-subject"></i></span><p>Потребители</p></div>
    <main>
        <div class="container">
            <div class="top_of_page sticky_body">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Редактирование</h5>
					<h3><span><i class="icon-subject"></i></span>&nbsp<?= $subject['name'] ?> <!--a href="#" onclick='modalWindow.openModal("openModalSubjectInfo"); subject.subjectInfo(<?//= $subject['id']?>)'>(Потребитель: <?= $subject['name'] ?>)</a--></h3>
                </div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'>
					<a href="/ARM/basis/subject/list/" class="button_unp"><span><i class="icon-pin"></i></span>Мои потребители</a>
					<a href="/ARM/basis/subject/" class="button_unp"><span><i class="icon-magnifier"></i></span><i class='rp-r-os'>Поиск</i></a>
					
				</div>
            </div>
	
			
            <div class="base_part">
           
					<form id="formPage" mode="edit_subject" class="form" name="formPage">	
<!------------------------------------------------------------------------------------------------------------------------------------------>		
				
								<!---------------------------Юридическое лицо  или ФЛ закрепление--------------------------------------->	
									<fieldset class = "fieldset_potr">
										<legend class="legend_potr"><span><i class="icon-pin"></i></span>&nbspИнформация о проверяемом субъекте</legend>
											<div class="form-group">
												<div class="block w2-5">	
													<label for = 'search' class='label_subject'><span class = "formTextRed">*</span> Закреплён за:</label>
												</div>

												<div class="block w0-5">
													<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "btn_add vert_m6 display_none"><i class="icon-paper-clip tooltip"><span class = "tooltiptext">Перевыбрать<br>ЮЛ или ИП</span></i></button>
													<p><br></p>	
													<button onclick = "modalWindow.openModal('openModalIndPers')" id='ind_pers' class = "btn_add vert_m6 display_none"><i class="icon-paper-clip tooltip"><span class = "tooltiptext">Перевыбрать<br>физ.лицо</span></i></button>
												</div>
												<div class="block form-controls w8">
													<input type="hidden" name="formUnpId" id="formUnpId" value="<?= $subject['id_unp'] ?>">
													<input type="hidden" name="formIndPersId" id="formIndPersId" value="<?= $subject['id_ind_pers'] ?>">
													<span id="name_unp"><?= (isset($unp['unp']) ? '('.$unp['unp'].') '. $unp['name'] : $ind_pers['firstname'].' '.$ind_pers['secondname'].' '.$ind_pers['lastname']) ?></span>
												</div>
											</div>																															
									</fieldset>	
									
									<!---------------------------Наименование--------------------------------------->
									<fieldset class = "fieldset_potr OnOff">			
									<legend class="legend_potr"><span><i class="icon-subject"></i></span>&nbspНаименование</legend>
											
											<div class="form-group">
												<div class="block w3">
													<label for = 'name_potr' class='label_subject'><span class = "formTextRed"><br>*</span><i>&nbspНаименование:</i></label>
												</div>	
												<div class="block w5">
													<textarea name = 'name_potr' id = 'name_potr' class='form-controls name_potr' cols="50" rows="1" disabled><?= $subject['name'] ?></textarea>
												</div>
												<div class="block w2">
													<button onclick = "info.showInfo_01();" class = "btn_add"><i class="icon-question help"></i></button>
													<?php Theme::block('modal/infoRulesSbjName') ?>
												</div>												
											</div>	
											
											<div class="form-group">	
												<div class="block w3">
													<label class='label_subject'><i>&nbsp&nbsp&nbsp&#8226 населенный пункт:</i></label>
												</div>
												<div class="block w1-5">
													<button id='cityToName' class = "btn_add" onclick="subject.opn_addressForName()" disabled><i class="icon-plus"></i></button>
													<label class='label_subject'>добавить</label>
												</div>
												<div class='block w6'>
													<label class='font-size-11'>* применяется чтобы различать потребителей одного субъекта в разных регионах (районнах).</label>
												</div>
											</div>	
											
											<div class="form-group">
												<div class="block w3">
													<label class='label_subject'><i>&nbsp&nbsp&nbsp&#8226 произвольное наименование:</i></label>
												</div>
												<div class="block w1-5">
													<?php 
													if($subject['custom_name'] == 1){
														echo "<input type='checkbox' name = 'custom_name' id= 'custom_name' class='custom-checkbox' checked='checked' value='1' onclick='subject.custom_name(); subject.updSbj(".$subject['id'].")' disabled>";	
													}else{
														echo "<input type='checkbox' name = 'custom_name' id= 'custom_name' class='custom-checkbox'  value='0' onclick='subject.custom_name(); subject.updSbj(".$subject['id'].")' disabled>";
													}
													?>
													<label for = 'custom_name' class='label_subject'>разрешить</label>
												</div>
												<div class='block w6'>
													<label class='font-size-11'>* произвольное наименование разрешено в особых случаях! Смотри справку п.3.</label>
												</div>
											</div>
											<div id='addressForName'>
												<button class='btnHideBlock' onclick="subject.hideBlock()">&#215 </button>							
												<?php Theme::block('address/addressForName') ?>
											</div>
									</fieldset>	
									
								<!--------------Основная информация----------------------------->
									<fieldset class = "fieldset_potr">		
										<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновная информация</legend>	
											<!---------------------------Номер дела--------------------------------------->
											<input type="hidden" name="subject_id" id="formSubjectId" value="<?= $subject['id'] ?>">
											
											<div class="form-group">
												<div class="block w3">
													<label for = 'num_case_new' class='label_subject'>Номер дела:</label>
												</div>
												<input type='text' name = 'num_case_new' id = 'num_case_new' class='form-controls' disabled="" value="<?= $subject['id']?>">
											</div>

											<div class="form-group">
												<div class="block w3">
													<label for = 'num_case' class='label_subject'>Нумерация дела в филиале:</label>
												</div>
												<input type='text' name = 'num_case' id = 'num_case' class='form-controls' value="<?= $subject['num_case_s'] ?>">
											</div>
											
											<!---------------------------Подчиненность--------------------------------------->	
											<div class="form-group">
												<div class="block w3">
													<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Форма собственности:</label>
												</div>
												<select class="form-controls" name="TypeProperty" id="TypeProperty" onchange='department.selectDepartment()'>
													<option value='0'>Выберите форму собственности</option>
													<?php foreach($properties as $property):?>
														<option value="<?=$property['id']?>"<?= ($property['id'] == $subject['type_property'] ? 'selected="selected"' : '');?>><?=$property['name']?></option>
													 <?php endforeach; ?>
												</select>
													<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_property'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
											</div>		
											<!---------------------- ведомственная принадлежность ----------------------------------------------->			
											<div class="form-group">
												<div class="block w3">
													<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Ведомственная принадлежность:</label>
												</div>
												<select class="form-controls"  name="nameDepartment" id="nameDepartment">
													<option value='0'>Выберите ведомственную принадлежность</option>
														<?php if(isset($departments)){?>
															<?php foreach($departments as $department):?>
																<option value=<?=$department['id']?> <?= ($department['id'] == $subject['type_department'] ? 'selected="selected"' : '');?>  ><?=$department['name_ved']?></option>
															<?php endforeach; ?>
														<?php }?>
												</select>
													<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_department'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
											</div>
										
											<div class="form-group">
												<div class="block w3">
													<label for="formTitle" class='label_subject'>Основной вид деятельности:</label>
												</div>	
												<select class="form-controls" name="type_activity" id="type_activity">
													<option value='0'>Выберите вид деятельности</option>
													<?php foreach($spr_kind_of_activity as $one_spr_kind_of_activity):?>
														<option value=<?=$one_spr_kind_of_activity['id']?> <?= ($one_spr_kind_of_activity['id'] == $subject['type_activity'] ? 'selected="selected"' : '');?>  ><?=$one_spr_kind_of_activity['name']?></option>
													 <?php endforeach; ?>
												</select>
													<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_kind_of_activity'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
											</div>											
											<div class="form-group">
												<div class="block w3">
													<label for="formTitle" class='label_subject'>Сменность работ:</label>
												</div>	
												<select class="form-controls" name="shift_work" id="shift_work">
													<option value='0'>Выберите сменность работ</option>
													<?php foreach($spr_shift_of_work as $one_spr_shift_of_work):?>
														<option value=<?=$one_spr_shift_of_work['id']?> <?= ($one_spr_shift_of_work['id'] == $subject['shift_work'] ? 'selected="selected"' : '');?>  ><?=$one_spr_shift_of_work['name']?></option>
													 <?php endforeach; ?>
												</select>
													<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_shift_of_work'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
											</div>										
											
											<!---------------------------Вышестоящая организация--------------------------------------->
											<div class="form-group">
												<div class="block w2-5">											
													<label for = 'search' class='label_subject'>Вышестоящая организация: </label>
												</div>
												<div class="block w0-5">
													<button onclick = "modalWindow.openModal('openModalUNP')" id='unp1' class = "btn_add vert_m6"><i class="icon-paper-clip tooltip"><span class = "tooltiptext">Выбрать</span></i></button>
												</div>
												<div class="search-request block form-controls w6">
													<input type="hidden" name="formUnpHeadId" id="formUnpHeadId" value="<?= (isset($unp_head['unp'])? $subject['id_unp_head'] : '0') ?>">
													<span id="formUnpHead"><?= (isset($unp_head['unp'])? '('.$unp_head['unp'].') '. $unp_head['name'] : '' )?></span>
												</div>
												
												<!--div class="but_clear_div">
												<div class="tooltip"><button class = "btn_clear_fields" onclick="subject.clear_fields('formUnpHead')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
												</div-->
											</div>
											
									</fieldset>	
						
<!---------------------------------------------------------------------------------------Фактический адрес------------------------------------------------------>							
										<fieldset hidden>
											<?php Theme::block('address/addressBranch') ?>
										</fieldset>
											<?php Theme::block('address/addressFact') ?>						
									
<!---------------------------------------------------------------------------------------Почтовый адрес------------------------------------------------------>							
											<div class="checkbox">	
												<?php 
													if($subject['copy_postaddress'] == 1){
														echo "<input type='checkbox' name = 'e_copy_postaddress' id= 'e_copy_postaddress' class='custom-checkbox' checked='checked' value='1' onclick='subject.e_copy_postaddress()'>";	
													}else{
														echo "<input type='checkbox' name = 'e_copy_postaddress' id= 'e_copy_postaddress' class='custom-checkbox'  value='0' onclick='subject.e_copy_postaddress()'>";
													}
												?>
												<label for="e_copy_postaddress" class='label_subject'>почтовый адрес не совпадает с фактическим</label>
											</div>

												
												<?php Theme::block('address/addressPost') ?>
																	
																
<!------------------------------------------------------Руководители--------------------------------------------------------------------->						
								<fieldset class = "fieldset_potr">
											<legend class="legend_potr"><span><i class="icon-user"></i></span>&nbspРуководство</legend>
											<!---------------------- Заключен договор с ----------------------------------------------->
											<div class="form-group">
												<div class="block w3-5">
													<label class='label_subject'></label>
												</div>
												<div class="block w0-2"></div>
												<div class="block w2">
													<label class='label_subject'>Фамилия</label>	
												</div>
												<div class="block w0-2"></div>
												<div class="block w2">
													<label class='label_subject'>Имя</label>													
												</div>
												<div class="block w2">
													<label class='label_subject'>Отчество</label>
												</div>
												<div class="block w1">
													<label class='label_subject'>Телефон</label>
												</div>
											</div>
											<div class="form-group">
												<div class="block w3">
													<p class = "ruk_info">Руководитель организации</p>
												</div>													
												<div class="ruk_div block w2">														
													<input type='text' name = 'dir_fam' id = 'dir_fam' class='form-controls' value="<?= $subject['ruk_firstname'] ?>">
												</div>
												<div class="ruk_div block w2">														
													<input type='text' name = 'dir_name' id = 'dir_name' class='form-controls' value="<?= $subject['ruk_secondname'] ?>">
												</div>
												<div class="ruk_div block w2">														
													<input type='text' name = 'dir_otch' id = 'dir_otch' class='form-controls' value="<?= $subject['ruk_lastname'] ?>">
												</div>
												<div class="ruk_div block w2">														
													<input type='text' name = 'dir_tel' id = 'dir_tel' class='form-controls' value="<?= $subject['ruk_tel'] ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="block w3">
													<p class = "ruk_info">Главный инженер</p>
												</div>	
												<div class="ruk_div block w2">
													<input type='text' name = 'ing_fam' id = 'ing_fam' class='form-controls' value="<?= $subject['gi_firstname'] ?>">
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'ing_name' id = 'ing_name' class='form-controls' value="<?= $subject['gi_secondname'] ?>">
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'ing_otch' id = 'ing_otch' class='form-controls' value="<?= $subject['gi_lastname'] ?>">
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'ing_tel' id = 'ing_tel' class='form-controls' value="<?= $subject['gi_tel'] ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="block w3">
													<p class = "ruk_info">Главный энергетик</p>
												</div>	
												<div class="ruk_div block w2">
													<input type='text' name = 'en_fam' id = 'en_fam' class='form-controls' value="<?= $subject['ge_firstname'] ?>">
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'en_name' id = 'en_name' class='form-controls' value="<?= $subject['ge_secondname'] ?>">
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'en_otch' id = 'en_otch' class='form-controls' value="<?= $subject['ge_lastname'] ?>">
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'en_tel' id = 'en_tel' class='form-controls' value="<?= $subject['ge_tel'] ?>">
												</div>
											</div>

								</fieldset>								
					

<!--------------------------------------------------Ответственные лица------------------------------------------------------>				
										
										<fieldset class = "fieldset_potr">
											<legend class="legend_potr"><span><i class="icon-people"></i></span>&nbspОтветственные лица</legend>

																			<!-------------------ЭЛЕКТРОХОЗЯЙСТВО------------------->
													<div id="container-main">											
													<div class="accordion-container">
														<a href="#" class="accordion-titulo"><div><p id = "otv_l_count"><span></span>&nbspза электрохозяйство (<?= (isset($name_type_otv[0]['spr_otv_vibor_name']) ? $name_type_otv[0]['spr_otv_vibor_name'] : 'нет')?>)</p></div><span class="toggle-icon"></span></a>
														<div class="accordion-content">	
																
															
															<div class="form-group">
																<div class="block w2-5">
																	<label for="formTitle" class='label_subject'>Тип ответственного:</label>
																</div>
																	<select class="form-controls" name="otv_type_e" id="otv_type_e"  onclick="subject.type_otv_hide_show(this.value)">
																		<option value='0'>Выберите тип ответственного:</option>
																			<?php foreach($spr_otv_vibor as $type_otv):?>																				
																				<option value="<?=$type_otv['id']?>"<?= ($type_otv['id'] == $subject['otv_type_e'] ? 'selected="selected"' : '');?>><?=$type_otv['name']?></option>
																			<?php endforeach; ?>
																	</select>
															</div>												

															<div class="otv_l_eh_sob">
																<p class="p_gaz">Ответственные за электрохозяйство</p><br>												
																<p>(1-Основной, 2-Заместитель)</p><br>	
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_eh_sob">
																		<thead>
																				<tr>
																					<th class="t3"></th>
																					<th class="t3">ФИО</th>
																					<th class="t3">Должность/ЮЛ или ИП</th>
																					<th class="t3">Приказ о назначении номер/дата</th>
																					<th class="t3">Договор номер/дата/срок</th>
																					<th class="t3">Группа по ЭБ/срок</th>
																					<th class="t5">Операции</th>
																				</tr>																
																		</thead>
																		<tbody>	
												
																						<?php 
																				//print_r($person_info_e1);
																								echo "<tr id_otv_eh_osn_sob='1'>";
																									echo "<td width='5%' name='otv_num_eh_osn_sob'>1</td>";
																									echo "<td width='30%' name='otv_fio_eh_osn_sob'>".(count($person_info_e1) != 0 ? $person_info_e1[0]['reestr_personal_secondname']." ".$person_info_e1[0]['reestr_personal_firstname']." ".$person_info_e1[0]['reestr_personal_lastname']: '')."</td>";
																									echo "<td width='30%' name='otv_dolg_sub_eh_osn_sob'>".(count($person_info_e1) != 0 ? $person_info_e1[0]['reestr_personal_post']." / ".$person_info_e1[0]['reestr_unp_name_short'] : '')."</td>";
																									echo "<td width='10%' name='otv_pr_eh_osn_sob'>".(isset($subject['order_num_e1'])? '№  '.$subject['order_num_e1'].' / '.date('d.m.Y',strtotime($subject['order_data_e1'])) : "") ."</td>";																									
																									//echo "<td width='10%' name='otv_pr_eh_osn_sob'>№ ".$subject['order_num_e1']." / ".date('d.m.Y',strtotime($subject['order_data_e1']))."</td>";	
																									echo "<td width='10%' name='otv_dog_eh_osn_sob'>-</td>";
																									echo "<td width='10%' name='otv_group_eh_osn_sob'>".(isset($person_info_e1[0]['el_group'])? $person_info_e1[0]['el_group'].' группа/до '.date('d.m.Y',strtotime($person_info_e1[0]['test_book_e_test_validity'])): "")."</td>";
																									echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_eh_sob'), subject.insert_row(1)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																									echo "</tr>";
																				//print_r($person_info_e2);
																								echo "<tr id_otv_eh_osn_sob='2'>";
																									echo "<td width='5%' name='otv_num_eh_zam_sob'>2</td>";
																									echo "<td width='30%' name='otv_fio_eh_zam_sob'>".(count($person_info_e2) != 0 ? $person_info_e2[0]['reestr_personal_secondname']." ".$person_info_e2[0]['reestr_personal_firstname']." ".$person_info_e2[0]['reestr_personal_lastname'] : '')."</td>";
																									echo "<td width='30%' name='otv_dolg_sub_zam_osn_sob'>".(count($person_info_e2) != 0 ? $person_info_e2[0]['reestr_personal_post']." / ".$person_info_e2[0]['reestr_unp_name_short'] : '')."</td>";
																									echo "<td width='10%' name='otv_pr_eh_zam_sob'>".(isset($subject['order_num_e2'])? '№  '.$subject['order_num_e2'].' / '.date('d.m.Y',strtotime($subject['order_data_e2'])) : "") ."</td>";
																									
																									//echo "<td width='10%' name='otv_pr_eh_zam_sob'>№ ".$subject['order_num_e2']." / ".date('d.m.Y',strtotime($subject['order_data_e2']))."</td>";
																									echo "<td width='10%' name='otv_dog_eh_zam_sob'>-</td>";
																									echo "<td width='10%' name='otv_group_eh_zam_sob'>".(isset($person_info_e2[0]['el_group'])? $person_info_e2[0]['el_group'].' группа/до '.date('d.m.Y',strtotime($person_info_e2[0]['test_book_e_test_validity'])): "")."</td>";
																									echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_eh_sob'), subject.insert_row(2)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																									echo "</tr>";													
																						?>
																																	
																		</tbody>
																	
																	</table>
																</div>	
																	<input type="hidden" class='label_subject' id = "otv_e1_sob" name="otv_e1_sob" value="<?= $subject['otv_e1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e1_sob_num_pr" name="otv_e1_sob_num_pr" value="<?= $subject['order_num_e1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e1_sob_date_pr" name="otv_e1_sob_date_pr" value="<?= $subject['order_data_e1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e2_sob" name="otv_e2_sob" value="<?= $subject['otv_e2'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e2_sob_num_pr" name="otv_e2_sob_num_pr" value="<?= $subject['order_num_e2'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e2_sob_date_pr" name="otv_e2_sob_date_pr" value="<?= $subject['order_data_e2'] ?>">											
															</div>														
																														
																
															<div class="otv_l_eh_st">	
																<p class="p_gaz">Ответственные за электрохозяйство</p><br>
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_eh_st">
																		<thead>
																			<tr>
																				<th class="t3"></th>
																				<th class="t3">ФИО</th>
																				<th class="t3">Должность/ЮЛ или ИП</th>
																				<th class="t3">Приказ о назначении номер/дата</th>
																				<th class="t3">Договор номер/дата/срок</th>
																				<th class="t3">Группа по ЭБ/срок</th>
																				<th class="t5">Операции</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php
																					//print_r($person_info_e3);	
																						echo "<tr id_otv_eh_osn_st='3'>";
																						echo "<td width='5%' name='otv_num_eh_osn_st'>1</td>";
																						echo "<td width='30%' name='otv_fio_eh_osn_st'>".(count($person_info_e3) != 0 ? $person_info_e3[0]['reestr_personal_secondname']." ".$person_info_e3[0]['reestr_personal_firstname']." ".$person_info_e3[0]['reestr_personal_lastname'] : '')."</td>";
																						echo "<td width='30%' name='otv_dolg_sub_eh_osn_st'>".(count($person_info_e3) != 0 ? $person_info_e3[0]['reestr_personal_post']." / ".$person_info_e3[0]['reestr_unp_name_short'] : '')."</td>";
																						echo "<td width='10%' name='otv_pr_eh_osn_st'>".(isset($subject['order_num_e3'])? '№  '.$subject['order_num_e3'].' / '.date('d.m.Y',strtotime($subject['order_data_e3'])) : "") ."</td>";
																						echo "<td width='10%' name='otv_dog_eh_osn_st'>".(isset($subject['dog_num_e3'])? '№  '.$subject['dog_num_e3'].' от '.date('d.m.Y',strtotime($subject['dog_data_e3'])).' до '.date('d.m.Y',strtotime($subject['dog_data_cont_e3'])) : "") ."</td>";								
																						//echo "<td width='10%' name='otv_pr_eh_osn_st'>№ ".$subject['order_num_e3']." / ".date('d.m.Y',strtotime($subject['order_data_e3']))."</td>";
																						//echo "<td width='10%' name='otv_dog_eh_osn_st'>№ ".$subject['dog_num_e3']."  от ".date('d.m.Y',strtotime($subject['dog_data_e3']))."  до ".date('d.m.Y',strtotime($subject['dog_data_cont_e3']))."</td>";
																						echo "<td width='10%' name='otv_group_eh_osn_st'>".(isset($person_info_e3[0]['el_group'])? $person_info_e3[0]['el_group'].' группа/до '.date('d.m.Y',strtotime($person_info_e3[0]['test_book_e_test_validity'])): "")."</td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_eh_st'), subject.insert_row_st(3)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";												
																			?>
																			

																		</tbody>
																	</table>	
																</div>
																	<input type="hidden" class='label_subject' id = "otv_e_st" name="otv_e_st" value="<?= $subject['otv_e3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e_st_num_pr" name="otv_e_st_num_pr" value="<?= $subject['order_num_e3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e_st_date_pr" name="otv_e_st_date_pr" value="<?= $subject['order_data_e3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e_st_num_dog" name="otv_e_st_num_dog" value="<?= $subject['dog_num_e3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e_st_date_dog" name="otv_e_st_date_dog" value="<?= $subject['dog_data_e3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_e_st_date_dog_cont" name="otv_e_st_date_dog_cont" value="<?= $subject['dog_data_cont_e3'] ?>">
															</div>											
														
															<div class="otv_l_eh_instr">	
																<p class="p_gaz">Ответственные за электрохозяйство</p><br>
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_eh_instr">
																		<thead>
																			<tr>
																				<th class="t3"></th>
																				<th class="t3">Ответственный</th>
																				<th class="t5">Операции</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																					echo "<tr id_otv_eh_instr='4'>";
																						echo "<td width='5%' name='otv_num_eh_instr'>1</td>";
																						echo "<td width='30%' name='otv_fio_eh_osn_instr'>".(isset($subject['ins_data_e']) ? 'Руководитель организации по инструктажу от  '.date('d.m.Y',strtotime($subject['ins_data_e'])) : '')."</td>";
																						//echo "<td width='30%' name='otv_fio_eh_osn_instr'>Руководитель организации по инструктажу от ".date('d.m.Y',strtotime($subject['ins_data_e']))."</td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_eh_instr'), subject.insert_row_instr(4)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";

																
																			?>
																			

																		</tbody>
																	</table>	
																</div>
																<input type="hidden" class='label_subject' id = "data_instr_dir" name="data_instr_dir" value="<?= $subject['ins_data_e'] ?>">	
															</div>											

														</div>
													</div>
												</div>


																					<!-------------------ТЕПЛОВОЕ ХОЗЯЙСТВО------------------->
													<div id="container-main">											
													<div class="accordion-container">
														<a href="#" class="accordion-titulo"><div><p id = "otv_l_count"><span></span>&nbspза тепловое хозяйство (<?= (isset($name_type_otv_t[0]['spr_otv_vibor_name']) ? $name_type_otv_t[0]['spr_otv_vibor_name'] : 'нет')?>)</p></div><span class="toggle-icon"></span></a>
														<div class="accordion-content">	
																
															
															<div class="form-group">
																<div class="block w2-5">
																	<label for="formTitle" class='label_subject'>Тип ответственного:</label>
																</div>
																	<select class="form-controls" name="otv_type_t" id="otv_type_t"  onclick="subject.type_otv_hide_show_t(this.value)">
																		<option value='0'>Выберите тип ответственного:</option>
																			<?php foreach($spr_otv_vibor as $type_otv):?>
																			<?php if($type_otv['id'] != 3){?>
																				<option value="<?=$type_otv['id']?>"<?= ($type_otv['id'] == $subject['otv_type_t'] ? 'selected="selected"' : '');?>><?=$type_otv['name']?></option>
																			<?php } ?>
																			<?php endforeach; ?>
																	</select>
															</div>												

															<div class="otv_l_th_sob">
																<p class="p_gaz">Ответственные за тепловое хозяйство</p><br>												
																<p>(1-Основной, 2-Заместитель)</p><br>	
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_th_sob">
																		<thead>
																				<tr>
																					<th class="t3"></th>
																					<th class="t3">ФИО</th>
																					<th class="t3">Должность/ЮЛ или ИП</th>
																					<th class="t3">Приказ о назначении номер/дата</th>
																					<th class="t3">Договор номер/дата/срок</th>
																					<!--th class="t3">Группа по ЭБ/срок</th-->
																					<th class="t5">Операции</th>
																				</tr>																
																		</thead>
																		<tbody>	
												
																						<?php 
																				
																								echo "<tr id_otv_th_osn_sob='5'>";
																									echo "<td width='5%' name='otv_num_th_osn_sob'>1</td>";
																									echo "<td width='30%' name='otv_fio_th_osn_sob'>".(count($person_info_t1) != 0 ? $person_info_t1[0]['reestr_personal_secondname']." ".$person_info_t1[0]['reestr_personal_firstname']." ".$person_info_t1[0]['reestr_personal_lastname']: '')."</td>";
																									echo "<td width='30%' name='otv_dolg_sub_th_osn_sob'>".(count($person_info_t1) != 0 ? $person_info_t1[0]['reestr_personal_post']." / ".$person_info_t1[0]['reestr_unp_name_short'] : '')."</td>";
																									echo "<td width='10%' name='otv_pr_th_osn_sob'>".(isset($subject['order_num_t1'])? '№  '.$subject['order_num_t1'].' / '.date('d.m.Y',strtotime($subject['order_data_t1'])) : "") ."</td>";																									
																									//echo "<td width='10%' name='otv_pr_eh_osn_sob'>№ ".$subject['order_num_e1']." / ".date('d.m.Y',strtotime($subject['order_data_e1']))."</td>";	
																									echo "<td width='10%' name='otv_dog_th_osn_sob'>-</td>";
																									//echo "<td width='10%' name='otv_group_th_osn_sob'>-</td>";
																									echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_th_sob'), subject.insert_row_t(5)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																									echo "</tr>";

																								echo "<tr id_otv_th_osn_sob='6'>";
																									echo "<td width='5%' name='otv_num_th_zam_sob'>2</td>";
																									echo "<td width='30%' name='otv_fio_th_zam_sob'>".(count($person_info_t2) != 0 ? $person_info_t2[0]['reestr_personal_secondname']." ".$person_info_t2[0]['reestr_personal_firstname']." ".$person_info_t2[0]['reestr_personal_lastname'] : '')."</td>";
																									echo "<td width='30%' name='otv_dolg_sub_zam_t_osn_sob'>".(count($person_info_t2) != 0 ? $person_info_t2[0]['reestr_personal_post']." / ".$person_info_t2[0]['reestr_unp_name_short'] : '')."</td>";
																									echo "<td width='10%' name='otv_pr_th_zam_sob'>".(isset($subject['order_num_t2'])? '№  '.$subject['order_num_t2'].' / '.date('d.m.Y',strtotime($subject['order_data_t2'])) : "") ."</td>";
																									
																									//echo "<td width='10%' name='otv_pr_eh_zam_sob'>№ ".$subject['order_num_e2']." / ".date('d.m.Y',strtotime($subject['order_data_e2']))."</td>";
																									echo "<td width='10%' name='otv_dog_th_zam_sob'>-</td>";
																									//echo "<td width='10%' name='otv_group_th_zam_sob'>-</td>";
																									echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_th_sob'), subject.insert_row_t(6)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																									echo "</tr>";													
																						?>
																																	
																		</tbody>
																	
																	</table>
																</div>	
																	<input type="hidden" class='label_subject' id = "otv_t1_sob" name="otv_t1_sob" value="<?= $subject['otv_t1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t1_sob_num_pr" name="otv_t1_sob_num_pr" value="<?= $subject['order_num_t1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t1_sob_date_pr" name="otv_t1_sob_date_pr" value="<?= $subject['order_data_t1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t2_sob" name="otv_t2_sob" value="<?= $subject['otv_t2'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t2_sob_num_pr" name="otv_t2_sob_num_pr" value="<?= $subject['order_num_t2'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t2_sob_date_pr" name="otv_t2_sob_date_pr" value="<?= $subject['order_data_t2'] ?>">											
															</div>														
																														
																
															<div class="otv_l_th_st">	
																<p class="p_gaz">Ответственные за тепловое хозяйство</p><br>
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_th_st">
																		<thead>
																			<tr>
																				<th class="t3"></th>
																				<th class="t3">ФИО</th>
																				<th class="t3">Должность/ЮЛ или ИП</th>
																				<th class="t3">Приказ о назначении номер/дата</th>
																				<th class="t3">Договор номер/дата/срок</th>
																				<!--th class="t3">Группа по ЭБ/срок</th-->
																				<th class="t5">Операции</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php
																						echo "<tr id_otv_th_osn_st='7'>";
																						echo "<td width='5%' name='otv_num_th_osn_st'>1</td>";
																						echo "<td width='30%' name='otv_fio_th_osn_st'>".(count($person_info_t3) != 0 ? $person_info_t3[0]['reestr_personal_secondname']." ".$person_info_t3[0]['reestr_personal_firstname']." ".$person_info_t3[0]['reestr_personal_lastname'] : '')."</td>";
																						echo "<td width='30%' name='otv_dolg_sub_th_osn_st'>".(count($person_info_t3) != 0 ? $person_info_t3[0]['reestr_personal_post']." / ".$person_info_t3[0]['reestr_unp_name_short'] : '')."</td>";
																						echo "<td width='10%' name='otv_pr_th_osn_st'>".(isset($subject['order_num_t3'])? '№  '.$subject['order_num_t3'].' / '.date('d.m.Y',strtotime($subject['order_data_t3'])) : "") ."</td>";
																						echo "<td width='10%' name='otv_dog_th_osn_st'>".(isset($subject['dog_num_t3'])? '№  '.$subject['dog_num_t3'].' от '.date('d.m.Y',strtotime($subject['dog_data_t3'])).' до '.date('d.m.Y',strtotime($subject['dog_data_cont_t3'])) : "") ."</td>";								
																						//echo "<td width='10%' name='otv_pr_eh_osn_st'>№ ".$subject['order_num_e3']." / ".date('d.m.Y',strtotime($subject['order_data_e3']))."</td>";
																						//echo "<td width='10%' name='otv_dog_eh_osn_st'>№ ".$subject['dog_num_e3']."  от ".date('d.m.Y',strtotime($subject['dog_data_e3']))."  до ".date('d.m.Y',strtotime($subject['dog_data_cont_e3']))."</td>";
																						//echo "<td width='10%' name='otv_group_th_osn_st'>-</td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_th_st'), subject.insert_row_st_t(7)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";												
																			?>
																			

																		</tbody>
																	</table>	
																</div>
																	<input type="hidden" class='label_subject' id = "otv_t_st" name="otv_t_st" value="<?= $subject['otv_t3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t_st_num_pr" name="otv_t_st_num_pr" value="<?= $subject['order_num_t3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t_st_date_pr" name="otv_t_st_date_pr" value="<?= $subject['order_data_t3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t_st_num_dog" name="otv_t_st_num_dog" value="<?= $subject['dog_num_t3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t_st_date_dog" name="otv_t_st_date_dog" value="<?= $subject['dog_data_t3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_t_st_date_dog_cont" name="otv_t_st_date_dog_cont" value="<?= $subject['dog_data_cont_t3'] ?>">
															</div>											
														
															<div class="otv_l_th_instr">	
																<p class="p_gaz">Ответственные за тепловое хозяйство</p><br>
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_th_instr">
																		<thead>
																			<tr>
																				<th class="t3"></th>
																				<th class="t3">Ответственный</th>
																				<th class="t5">Операции</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																					echo "<tr id_otv_th_instr='8'>";
																						echo "<td width='5%' name='otv_num_th_instr'>1</td>";
																						
																						echo "<td width='30%' name='otv_fio_th_osn_instr'>".(isset($subject['ins_data_t']) ? 'Руководитель организации по инструктажу от  '.date('d.m.Y',strtotime($subject['ins_data_t'])) : '')."</td>";
																						//echo "<td width='30%' name='otv_fio_th_osn_instr'>Руководитель организации по инструктажу от ".date('d.m.Y',strtotime($subject['ins_data_t']))."</td>";
																						echo "<td width='5%'><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_th_instr'), subject.insert_row_instr_t(8)\"><i class='icon-fixed-width icon-pencil'></i></button></div></div></td>";
																						//\"obj_oe_ek\",".$obj_oe_ek['id']."
																			?>
																			

																		</tbody>
																	</table>	
																</div>
																<input type="hidden" class='label_subject' id = "data_instr_dir_t" name="data_instr_dir_t" value="<?= $subject['ins_data_t'] ?>">	
															</div>											

														</div>
													</div>
												</div>
										
										</fieldset>	
									
<!--------------------------------------------------Договор с энергоснабжающей организацией------------------------------------------------------>				
											
										<!--fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-doc"></i></span>&nbspДоговор на элекроснабжение</legend>
											<!---------------------- Заключен договор с ----------------------------------------------->
											<!--div class="form-group">
												<div class="block w2">
													<label for = 'dogovor_name' class='label_subject'>Наименование:</label>
												</div>
												<textarea name = 'dogovor_name' id = 'dogovor_name' class='form-controls' cols="50" rows="1"><?//= $subject['supply_name'] ?></textarea>
											</div>
											<!---------------------- Номер договора и дата ----------------------------------------------->
											<!--div class="form-group">
												<div>
													<div class="block w2">
														<label for = 'dogovor_num' class='label_subject'>Номер договора:</label>
													</div>	
													<input type='text' name = 'dogovor_num' id = 'dogovor_num' class='form-controls' value="<?//= $subject['supply_dog_num'] ?>">
												</div>
												<div>
													<label for = 'dogovor_date' class='label_subject'>Дата договора:</label>
													<input type='date' name = 'dogovor_date' id = 'dogovor_date' class='form-controls' value="<?//= $subject['supply_dog_date'] ?>">
												</div>
											</div>


										</fieldset-->	
<!--------------------------------------------------Договор с теплоснабжающей организацией------------------------------------------------------>				
											
										<!--fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-doc"></i></span>&nbspДоговор теплоснабжения</legend>
											<!---------------------- Заключен договор с ----------------------------------------------->
											<!--div class="form-group">
												<div class="block w2">
													<label for = 'dogovor_name_t' class='label_subject'>Наименование:</label>
												</div>	
												
												<textarea name = 'dogovor_name_t' id = 'dogovor_name_t' class='form-controls' cols="50" rows="1"><?//= $subject['supply_name_t'] ?></textarea>
											</div>
											<!---------------------- Номер договора и дата ----------------------------------------------->
											<!--div class="form-group">
												<div>
													<div class="block w2">
														<label for = 'dogovor_num_t' class='label_subject'>Номер договора:</label>
													</div>	
													<input type='text' name = 'dogovor_num_t' id = 'dogovor_num_t' class='form-controls' value="<?//= $subject['supply_dog_num_t'] ?>">
												</div>
												<div>
													<label for = 'dogovor_date_t' class='label_subject'>Дата договора:</label>
													<input type='date' name = 'dogovor_date_t' id = 'dogovor_date_t' class='form-controls' value="<?//= $subject['supply_dog_date_t'] ?>">
												</div>
											</div>


										</fieldset-->	




<!---------------------------------------------------------------------------------------------------------------------------->												
										<fieldset class = "fieldset_potr">
											<legend class="legend_potr"><span><i class="icon-note"></i></span>&nbspДополнительная информация</legend>
											<div class="form-group">
												<div class="block w3">
													<label for = 'email' class='label_subject'>E-mail:</label>
												</div>	
												<input type='text' name = 'email' id = 'email' class='form-controls'  value='<?= $subject['email'] ?>'>
											</div>
											<div class="form-group">
												<div class="block w3">
													<label for = 'sbj_note' class='label_subject'>Примечание:</label>
												</div>	
											
												<textarea name = 'sbj_note' id = 'sbj_note' class='form-controls' cols="50" rows="1"><?= $subject['sbj_note']?></textarea>
											</div>
										<!------------------------------------------------Договора теплоснабжения----------------------------------------------->							
										<div id="container-main">											
										<div class="accordion-container">
											<a href="#" class="accordion-titulo"><div><p id = "teplo_dog"><span><i class="icon-doc"></i></span>&nbspДоговора теплоснабжения (<?= (count($subj_dogs)>0 ? count($subj_dogs) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
											<div class="accordion-content">	
												<div class="mobileTable">
													<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="subj_dog">
														<thead>
															<tr>
																<th class="t3">Наименование</th>
																<th class="t3">Номер договора</th>
																<th class="t3">Дата договора</th>
																<th class="t5">Операции</th>
															</tr>
														</thead>
														<tbody>
															<?php 																																									
															foreach($subj_dogs as $one_subj_dog){
																
																echo '<tr id_subj_dog="'.$one_subj_dog['id'].'">';
																echo "<td name='name'>".$one_subj_dog['name']."</td>";
																echo "<td name='number'>".$one_subj_dog['number']."</td>";
																echo "<td name='date_dog'>".(strlen($one_subj_dog['date_dog']) > 0 ? date('d.m.Y',strtotime($one_subj_dog['date_dog'])) : '')."</td>";
																echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalSubj_dog\','.$one_subj_dog['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="subject.removeTableItem(\'subj_dog\','.$one_subj_dog['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
															};?>
														</tbody>
													</table>	
												</div>
												<div>
													<button onclick = "modalWindow.openModal('ModalSubj_dog')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
											</div>
										</div>
										</div>	
											
										</fieldset>											
<!------------------------------------------------------Закрепленные инспектора--------------------------------------------------------------------->						
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-object"></i></span>&nbsp <i class='rp1'>Объекты</i>&nbsp и закрепленные за ними инспектора</legend>
												<!---------------------- Заключен договор с ----------------------------------------------->
												<table class='objects_list'>
												<thead>
														<tr>
															<th width="40%">Наименование объекта</th>
															<th width="15%">Инспектор электро</th>
															<th width="15%">Инспектор тепло</th>
															<th width="15%">Инспектор ТИ</th>
															<th width="15%">Инспектор газ</th>
															
														</tr>
													</thead>
													<tbody>
													<?php 
														foreach($objects as $object){
															echo "<tr>";
															echo "<td><a href='/ARM/basis/objects/edit/".$object['id']."?mode=object_info' target = '_blank' class='card_href'>".$object['reestr_object_name']."</a></td>";
															
															
															echo "<td>".(isset($object['users_fio_e'])? $object['users_fio_e'] : "<div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет объекта электро- снабжения</span></div>") ."</td>";
															echo "<td>".(isset($object['users_fio_t'])? $object['users_fio_t'] : "<div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет объекта тепло- потребления</span></div>") ."</td>";
															echo "<td>".(isset($object['users_fio_ti'])? $object['users_fio_ti'] : "<div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет теплоисточника</span></div>") ."</td>";
															echo "<td>".(isset($object['users_fio_g'])? $object['users_fio_g'] : "<div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет объекта газо- потребления</span></div>") ."</td>";
															echo "</tr>";
														};?>	
													</tbody>
												</table>
										</fieldset>							
<!------------------------------------------------------Сведения о режиме электропотребления--------------------------------------------------------------------->						
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-energy"></i></span>&nbspСведения о режиме электропотребления</legend>
												<!---------------------- Заключен договор с ----------------------------------------------->
												<table class='bron_list'>
												<thead>
														<tr>
															<th width="40%">Наименование объекта</th>
															<th width="20%">Мощность аварийной брони (кВт)</th>
															<th width="20%">Мощность технологической брони (кВт)</th>
															<th width="10%">Время завершения тех. процесса (ч.)</th>
															<th width="10%">Дата составления акта</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														foreach($objects_bron as $object){
															echo "<tr>";
															echo "<td><a href='/ARM/basis/objects/edit/".$object['id']."?mode=object_info' target = '_blank' class='card_href'>".$object['reestr_object_name']."</a></td>";
															echo "<td>".(isset($object['e_armor_crach'])? $object['e_armor_crach'] : "-") ."</td>";
															echo "<td>".(isset($object['e_armor_tech'])? $object['e_armor_tech'] : "-") ."</td>";
															echo "<td>".(isset($object['e_armor_time'])? $object['e_armor_time'] : "-") ."</td>";
															echo "<td>".(isset($object['e_armor_date'])? date("d.m.Y", strtotime($object['e_armor_date'])) : "-") ."</td>";
															echo "</tr>";
														};?>	
													</tbody>
												</table>
										</fieldset>						
<!------------------------------------------------------Аварийная и технологическая броня теплоснабжения--------------------------------------------------------------------->						
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-teplo"></i></span>&nbspАварийная и технологическая броня теплоснабжения</legend>
												<!---------------------- Заключен договор с ----------------------------------------------->
												<table class='bron_list_teplo'>
												<thead>
														<tr>
															<th width="40%">Наименование объекта</th>
															<th width="10%">Нагрузка аварийной брони (Гкал/ч)</th>
															<th width="10%">Нагрузка аварийной брони (т/ч)</th>
															<th width="10%">Нагрузка тех. брони (Гкал/ч)</th>
															<th width="10%">Нагрузка тех. брони (т/ч)</th>
															<th width="10%">Время завершения тех. процесса (ч.)</th>
															<th width="10%">Дата составления акта</th>
														</tr>
													</thead>
													<tbody>
													<?php
														//print_r($objects_bron_teplo);
														foreach($objects_bron_teplo as $object){
															echo "<tr>";
															echo "<td><a href='/ARM/basis/objects/edit/".$object['id']."?mode=object_info' target = '_blank' class='card_href'>".$object['reestr_object_name']."</a></td>";
															echo "<td>".(isset($object['t_armor_crach'])? $object['t_armor_crach'] : "-") ."</td>";
															echo "<td>".(isset($object['t_armor_crach_vapor'])? $object['t_armor_crach_vapor'] : "-") ."</td>";
															echo "<td>".(isset($object['t_armor_tech'])? $object['t_armor_tech'] : "-") ."</td>";
															echo "<td>".(isset($object['t_armor_tech_vapor'])? $object['t_armor_tech_vapor'] : "-") ."</td>";
															echo "<td>".(isset($object['t_armor_time'])? $object['t_armor_time'] : "-") ."</td>";
															echo "<td>".(isset($object['t_armor_date'])? date("d.m.Y", strtotime($object['t_armor_date'])) : "-") ."</td>";
															echo "</tr>";
													};?>	
													</tbody>
												</table>
										</fieldset>	

									<fieldset class = "fieldset_potr">
										<legend class="legend_potr"><span><i class="icon-tag"></i></span>&nbsp Особые отметки</legend>
										<div class="form-group">
											<p>Региональный потребитель создан пользователем <span><?php echo $create_user['fio']; ?> </span> Дата создания: <span><?php echo date('d.m.Y',strtotime($subject['create_date'])); ?></span></p>
										</div>
										<div class="form-group">
											
										</div>
									</fieldset>										
											
                    </form>
					<div id="messenger"></div>
					<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
					<div class="nav_buttons">
						<button type="submit" class="shine-button" onclick="subject.update('continue')">Сохранить</button>
						<button type="submit" class="shine-button" onclick="subject.update('cancel')">Сохранить и закрыть</button>
						<!--	<button type="submit" class="shine-button" onclick="subject.add('new_object')">Создать объект</button> -->
						<a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button" >Отмена</a>	
					</div>
            
					<div class="page_title_footer">
						<h5></h5>
					</div>
            </div>
        </div>
    </main>
<?php Theme::block('modal/modalOtv_eh_sob') ?>
<?php Theme::block('modal/modalOtv_eh_st') ?>
<?php Theme::block('modal/modalOtv_eh_instr') ?>
<?php Theme::block('modal/modalOtv_th_sob') ?>
<?php Theme::block('modal/modalOtv_th_st') ?>
<?php Theme::block('modal/modalOtv_th_instr') ?>	
<?php Theme::block('modal/modalSearchRespPers') ?>
<?php Theme::block('modal/modalSearchUnp') ?>
<?php Theme::block('modal/modalSearchIndPers') ?>
<?php Theme::block('modal/modal_GuidesfromSubject') ?>
<!--?php Theme::block('modal/ObjectsInfo') ?-->	
<?php Theme::block('modal/modal_Subj_dog') ?>



<?php $this->theme->footer(); ?>