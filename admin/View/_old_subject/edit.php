<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            
			<!--------------Однотипное оформление верхней области страницы ------------------------------>
		<div class='top_of_page'> 	<!------ для всех страниц ------->
            <div class="page_title"> 	<!------ для всех страниц ------->
                <h5><span><i class="icon-subject"></i></span>&nbsp<?= $subject['name'] ?> <!--a href="#" onclick='modalWindow.openModal("openModalSubjectInfo"); subject.subjectInfo(<?= $subject['id']?>)'>(Потребитель: <?= $subject['name'] ?>)</a--></h5>
            </div>
			<div class ='nav_buttons'> <!------ для всех страниц -------> 
			<a href="/ARM/admin/objects/list/"></a>
			</div>
        </div>
			
			
            <div class="base_part">
           
                    <form id="formPage" mode="edit_subject" class="form">	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновная информация</legend>
										
											<!---------------------------Юридическое лицо--------------------------------------->
											<div class="form-group">
																							
												<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Юридическое лицо:</label>
												<div class="search-request">
													<input type="hidden" name="formUnpId" id="formUnpId" value="<?= $subject['id_unp'] ?>">
													<span id="name_unp"><?= '('.$unp['unp'].') '. $unp['name'] ?></span>
												</div>
												<div>
												<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button">Выбрать юр. лицо</button>
												</div>
											</div>
											
											<!---------------------------Наименование--------------------------------------->
											<div class="form-group">
												<label for = 'name_potr' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label>
												<textarea name = 'name_potr' id = 'name_potr' class='form-controls name_potr' cols="50" rows="1"><?= $subject['name'] ?></textarea>
											</div>
											<!---------------------------Номер дела--------------------------------------->
											<input type="hidden" name="subject_id" id="formSubjectId" value="<?= $subject['id'] ?>">
											
											<div class="form-group">
												<label for = 'num_case_new' class='label_subject'>Номер дела:</label>
												<input type='text' name = 'num_case_new' id = 'num_case_new' class='form-controls' disabled="" value="<?= $subject['id']?>">
											</div>

											<div class="form-group">
												<label for = 'num_case' class='label_subject'>Номер дела по старой нумерации:</label>
												<input type='text' name = 'num_case' id = 'num_case' class='form-controls' value="<?= $subject['num_case_s'] ?>">
											</div>
											
											<!---------------------------Вышестоящая организация--------------------------------------->
											<div class="form-group">
																							
												<label for = 'search' class='label_subject'>Вышестоящая организация:</label>
												<div class="search-request">
													<input type="hidden" name="formUnpHeadId" id="formUnpHeadId" value="<?= (isset($unp_head['unp'])? $subject['id_unp_head'] : '0') ?>">
													<span id="formUnpHead"><?= (isset($unp_head['unp'])? '('.$unp_head['unp'].') '. $unp_head['name'] : '' )?></span>
												</div>
												<div>
												<button onclick = "modalWindow.openModal('openModalUNP')" id='unp1'  class = "shine-button">Выбрать</button>
												</div>
												<div class="but_clear_div">
												<div class="tooltip"><button class = "btn_clear_fields" onclick="subject.clear_fields('formUnpHead')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
												</div>
											</div>
											<!---------------------------Подчиненность--------------------------------------->	
											<div class="form-group">
												<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Форма собственности:</label>
													<select class="form-controls" name="TypeProperty" id="TypeProperty" onchange='department.selectDepartment()'>
														<option value='0'>Выберите форму собственности</option>
													<?php foreach($properties as $property):?>
														<option value="<?=$property['id']?>"<?= ($property['id'] == $subject['type_property'] ? 'selected="selected"' : '');?>><?=$property['name']?></option>
													 <?php endforeach; ?>
													</select>
													<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_property'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
											</div>		
											<!---------------------- ведомственная принадлежность ----------------------------------------------->			
												<div class="form-group">
													<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Ведомственная принадлежность:</label>
													<select class="form-controls"  name="nameDepartment" id="nameDepartment">
														<option value='0'>Выберите ведомственную принадлежность</option>
															<?php if(isset($departments)){?>
																<?php foreach($departments as $department):?>
																	<option value=<?=$department['id']?> <?= ($department['id'] == $subject['type_department'] ? 'selected="selected"' : '');?>  ><?=$department['name_ved']?></option>
																<?php endforeach; ?>
															<?php }?>
													</select>
													<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_department'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
												</div>
										
											<div class="form-group">
												<label for="formTitle" class='label_subject'>Основной вид деятельности:</label>
													<select class="form-controls" name="type_activity" id="type_activity">
														<option value='0'>Выберите вид деятельности</option>
													<?php foreach($spr_kind_of_activity as $one_spr_kind_of_activity):?>
														<option value=<?=$one_spr_kind_of_activity['id']?> <?= ($one_spr_kind_of_activity['id'] == $subject['type_activity'] ? 'selected="selected"' : '');?>  ><?=$one_spr_kind_of_activity['name']?></option>
													 <?php endforeach; ?>
													</select>
													<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_kind_of_activity'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
											</div>											
											<div class="form-group">
												<label for="formTitle" class='label_subject'>Сменность работ:</label>
													<select class="form-controls" name="shift_work" id="shift_work">
														<option value='0'>Выберите сменность работ</option>
													<?php foreach($spr_shift_of_work as $one_spr_shift_of_work):?>
														<option value=<?=$one_spr_shift_of_work['id']?> <?= ($one_spr_shift_of_work['id'] == $subject['shift_work'] ? 'selected="selected"' : '');?>  ><?=$one_spr_shift_of_work['name']?></option>
													 <?php endforeach; ?>
													</select>
													<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_shift_of_work'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
											</div>										
										
										</fieldset>	
						
<!---------------------------------------------------------------------------------------Фактический адрес------------------------------------------------------>							
												
											<?php Theme::block('address/addressBranch') ?>
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
												<p class = "ruk_info">Руководитель организации</p>
												<div class="form-group">
													<div class="ruk_div">
														<label for = 'dir_fam' class='label_subject'>Фамилия:</label>
														<input type='text' name = 'dir_fam' id = 'dir_fam' class='form-controls' value="<?= $subject['ruk_firstname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'dir_name' class='label_subject'>Имя:</label>
														<input type='text' name = 'dir_name' id = 'dir_name' class='form-controls' value="<?= $subject['ruk_secondname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'dir_otch' class='label_subject'>Отчество:</label>
														<input type='text' name = 'dir_otch' id = 'dir_otch' class='form-controls' value="<?= $subject['ruk_lastname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'dir_tel' class='label_subject'>Телефон:</label>
														<input type='text' name = 'dir_tel' id = 'dir_tel' class='form-controls' value="<?= $subject['ruk_tel'] ?>">
													</div>
												</div>
												<p class = "ruk_info">Главный инженер</p>
												<div class="form-group">
													<div class="ruk_div">
														<label for = 'ing_fam' class='label_subject'>Фамилия:</label>
														<input type='text' name = 'ing_fam' id = 'ing_fam' class='form-controls' value="<?= $subject['gi_firstname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'ing_name' class='label_subject'>Имя:</label>
														<input type='text' name = 'ing_name' id = 'ing_name' class='form-controls' value="<?= $subject['gi_secondname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'ing_otch' class='label_subject'>Отчество:</label>
														<input type='text' name = 'ing_otch' id = 'ing_otch' class='form-controls' value="<?= $subject['gi_lastname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'ing_tel' class='label_subject'>Телефон:</label>
														<input type='text' name = 'ing_tel' id = 'ing_tel' class='form-controls' value="<?= $subject['gi_tel'] ?>">
													</div>
												</div>
												<p class = "ruk_info">Главный энергетик</p>
												<div class="form-group">
													<div class="ruk_div">
														<label for = 'en_fam' class='label_subject'>Фамилия:</label>
														<input type='text' name = 'en_fam' id = 'en_fam' class='form-controls' value="<?= $subject['ge_firstname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'en_name' class='label_subject'>Имя:</label>
														<input type='text' name = 'en_name' id = 'en_name' class='form-controls' value="<?= $subject['ge_secondname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'en_otch' class='label_subject'>Отчество:</label>
														<input type='text' name = 'en_otch' id = 'en_otch' class='form-controls' value="<?= $subject['ge_lastname'] ?>">
													</div>
													<div class="ruk_div">
														<label for = 'en_tel' class='label_subject'>Телефон:</label>
														<input type='text' name = 'en_tel' id = 'en_tel' class='form-controls' value="<?= $subject['ge_tel'] ?>">
													</div>
												</div>

											</fieldset>	
<!--------------------------------------------------Ответственные лица------------------------------------------------------>				
										
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-people"></i></span>&nbspОтветственные лица</legend>

													<!--input type="hidden" name="id_reestr_unp_e" id="id_reestr_unp_e" value="<?//= $subject['ge_tel'] ?>"-->
													
													<input type="hidden" name="otv_type_e" id="otv_type_e" value="<?= $subject['otv_type_e'] ?>">
													<input type="hidden" name="otv_e1_id" id="otv_e1_id" value="<?= $subject['otv_e1'] ?>">
													<input type="hidden" name="otv_e2_id" id="otv_e2_id" value="<?= $subject['otv_e2'] ?>">
													<input type="hidden" name="order_num_e1" id="order_num_e1" value="<?= $subject['order_num_e1'] ?>">
													<input type="hidden" name="order_data_e1" id="order_data_e1" value="<?= $subject['order_data_e1'] ?>">
													<input type="hidden" name="order_num_e2" id="order_num_e2" value="<?= $subject['order_num_e2'] ?>">
													<input type="hidden" name="order_data_e2" id="order_data_e2" value="<?= $subject['order_data_e2'] ?>">
													<input type="hidden" name="dog_num_e" id="dog_num_e" value="<?= $subject['dog_num_e'] ?>">
													<input type="hidden" name="dog_data_e" id="dog_data_e" value="<?= $subject['dog_data_e'] ?>">
													<input type="hidden" name="instr_data_e" id="instr_data_e" value="<?= $subject['ins_data_e'] ?>">


											
											
											<div class="form-group">											
													<label for = '' class='label_subject'>за электрохозяйство:</label>
	<?php// print_r($resp_subject_e1);?>						<div>
															
														<?php foreach($resp_subject_e1 as $subject_e):?>
																<p id="otv_e1" class = "span_otv_info"><?= (($subject_e['reestr_subject_otv_e1']) > 0 ? $subject_e['reestr_otv_secondname'].' '.$subject_e['reestr_otv_firstname'].' '.$subject_e['reestr_otv_lastname'].' ('.$subject_e['reestr_unp_name_short'].', '.$subject_e['reestr_otv_post'].') '  : '') ?></p>
														<?php endforeach; ?>
														<?php foreach($resp_subject_e2 as $subject_e2):?>
																<p id="otv_e2" class = "span_otv_info"><?= (($subject_e2['reestr_subject_otv_e2']) > 0 ? $subject_e2['reestr_otv_secondname'].' '.$subject_e2['reestr_otv_firstname'].' '.$subject_e2['reestr_otv_lastname'].' ('.$subject_e2['reestr_unp_name_short'].', '.$subject_e2['reestr_otv_post'].') '  : '') ?></p>
														<?php endforeach; ?>																														
														</div>							
													<p class='label_subject'></p>
													<div>
													<button onclick = "modalWindow.openModal('openModalRespPers')" id='e' class = "shine-button">Прикрепить/сменить</button>
													</div>
													<div class="tooltip"><a class = "btn_add_fields" href="/ARM/admin/responsible_persons/create/"><i class="icon-plus"></i><span class = "tooltiptext">Добавить ответственное лицо</span></a></div>
											</div>
											<div class="form-group">
											
													<input type="hidden" name="otv_type_t" id="otv_type_t" value="<?= $subject['otv_type_t'] ?>">
													<input type="hidden" name="otv_t_id" id="otv_t_id" value="<?= $subject['otv_t1'] ?>">
													<input type="hidden" name="order_num_t" id="order_num_t" value="<?= $subject['order_num_t1'] ?>">
													<input type="hidden" name="order_data_t" id="order_data_t" value="<?= $subject['order_data_t1'] ?>">
													<input type="hidden" name="dog_num_t" id="dog_num_t" value="<?= $subject['dog_num_t1'] ?>">
													<input type="hidden" name="dog_data_t" id="dog_data_t" value="<?= $subject['dog_data_t1'] ?>">											
													
													<label for = '' class='label_subject'>за тепловое хозяйство:</label>
													<div>
														<?php foreach($resp_subject_t as $subject_t):?>
																<p id="otv_t" class = "span_otv_info"><?= (($subject_t['reestr_subject_otv_t1']) > 0 ? $subject_t['reestr_otv_secondname'].' '.$subject_t['reestr_otv_firstname'].' '.$subject_t['reestr_otv_lastname'].' ('.$subject_t['reestr_unp_name_short'].', '.$subject_t['reestr_otv_post'].') '  : '') ?></p>
														<?php endforeach; ?>													
													</div>
													<p class='label_subject'></p>
													<div>
													<button onclick = "modalWindow.openModal('openModalRespPers')" id='t' class = "shine-button">Прикрепить/сменить</button>
													</div>
													<div class="tooltip"><a class = "btn_add_fields" href="/ARM/admin/responsible_persons/create/"><i class="icon-plus"></i><span class = "tooltiptext">Добавить ответственное лицо</span></a></div>
											</div>
											<div class="form-group">
													<input type="hidden" name="otv_type_g" id="otv_type_g" value="<?= $subject['otv_type_g'] ?>">
													<input type="hidden" name="otv_g_id" id="otv_g_id" value="<?= $subject['otv_g1'] ?>">
													<input type="hidden" name="order_num_g" id="order_num_g" value="<?= $subject['order_num_g1'] ?>">
													<input type="hidden" name="order_data_g" id="order_data_g" value="<?= $subject['order_data_g1'] ?>">
													<input type="hidden" name="dog_num_g" id="dog_num_g" value="<?= $subject['dog_num_g1'] ?>">
													<input type="hidden" name="dog_data_g" id="dog_data_g" value="<?= $subject['dog_data_g1'] ?>">
													
													<label for = '' class='label_subject'>за газовое хозяйство:</label>
													<div>
														<?php foreach($resp_subject_g as $subject_g):?>
																<p id="otv_g" class = "span_otv_info"><?= (($subject_g['reestr_subject_otv_g1']) > 0 ? $subject_g['reestr_otv_secondname'].' '.$subject_g['reestr_otv_firstname'].' '.$subject_g['reestr_otv_lastname'].' ('.$subject_g['reestr_unp_name_short'].', '.$subject_g['reestr_otv_post'].') '  : '') ?></p>
														<?php endforeach; ?>													
													</div>
													<p class='label_subject'></p>
													<div>
													<button onclick = "modalWindow.openModal('openModalRespPers')" id='g' class = "shine-button">Прикрепить/сменить</button>
													</div>
													<div class="tooltip"><a class = "btn_add_fields" href="/ARM/admin/responsible_persons/create/"><i class="icon-plus"></i><span class = "tooltiptext">Добавить ответственное лицо</span></a></div>													
											</div>
										
										</fieldset>		
<!--------------------------------------------------Договор с энергоснабжающей организацией------------------------------------------------------>				
											
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-doc"></i></span>&nbspДоговор на энергоснабжение с энергоснабжающей организацией</legend>
											<!---------------------- Заключен договор с ----------------------------------------------->
											<div class="form-group">
												<label for = 'dogovor_name' class='label_subject'>Наименование:</label>
												
												<textarea name = 'dogovor_name' id = 'dogovor_name' class='form-controls' cols="50" rows="1"><?= $subject['supply_name'] ?></textarea>
											</div>
											<!---------------------- Номер договора и дата ----------------------------------------------->
											<div class="form-group">
												<div>
													<label for = 'dogovor_num' class='label_subject'>Номер договора:</label>
													<input type='text' name = 'dogovor_num' id = 'dogovor_num' class='form-controls' value="<?= $subject['supply_dog_num'] ?>">
												</div>
												<div>
													<label for = 'dogovor_date' class='label_subject'>Дата договора:</label>
													<input type='date' name = 'dogovor_date' id = 'dogovor_date' class='form-controls' value="<?= $subject['supply_dog_date'] ?>">
												</div>
											</div>


										</fieldset>											
<!------------------------------------------------------Закрепленные инспектора--------------------------------------------------------------------->						
											<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-object"></i></span>&nbspОбъекты потребителя и закрепленные за ними инспектора</legend>
												<!---------------------- Заключен договор с ----------------------------------------------->
												<table class='objects_list'>
												<thead>
														<tr>
															<th>Наименование</th>
															<th>Инспектор электро</th>
															<th>Инспектор тепло</th>
															<th>Инспектор ТИ</th>
															<th>Инспектор газ</th>
															
														</tr>
													</thead>
													<tbody>
													<?php 
														foreach($objects as $object){
															echo "<tr>";
															echo "<td><a href='#' class='card_href'  onclick=\"modalWindow.openModal('openModalObjectsInfo'); object.objectInfo(".$object['id'].")\">".$object['reestr_object_name']."</a></td>";
															
															echo "<td>".(isset($object['users_fio_e'])? $object['users_fio_e'] : "не закреплен") ."</td>";
															echo "<td>".(isset($object['users_fio_t'])? $object['users_fio_t'] : "не закреплен") ."</td>";
															echo "<td>".(isset($object['users_fio_ti'])? $object['users_fio_ti'] : "не закреплен") ."</td>";
															echo "<td>".(isset($object['users_fio_g'])? $object['users_fio_g'] : "не закреплен") ."</td>";
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
															<th>Наименование</th>
															<th>Мощность аварийной брони (кВт)</th>
															<th>Мощность технологической брони (кВт)</th>
															<th>Время завершения технологического процесса</th>
															<th>Дата составления акта</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														foreach($objects_bron as $object){
															echo "<tr>";
															echo "<td><a href='#' class='card_href'  onclick=\"modalWindow.openModal('openModalObjectsInfo'); object.objectInfo(".$object['id'].")\">".$object['reestr_object_name']."</a></td>";
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
															<th>Наименование</th>
															<th>Нагрузка аварийной брони (Гкал/ч)</th>
															<th>Нагрузка аварийной брони (т/ч)</th>
															<th>Нагрузка технологической брони (Гкал/ч)</th>
															<th>Нагрузка технологической брони (т/ч)</th>
															<th>Время завершения технологического процесса (ч.)</th>
															<th>Дата составления акта</th>
														</tr>
													</thead>
													<tbody>
													<?php
														//print_r($objects_bron_teplo);
														foreach($objects_bron_teplo as $object){
															echo "<tr>";
															echo "<td><a href='#' class='card_href'  onclick=\"modalWindow.openModal('openModalObjectsInfo'); object.objectInfo(".$object['id'].")\">".$object['reestr_object_name']."</a></td>";
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
						
														<div class="group">
															<div class="group-button">
																<button type="submit" class="btn btn-primary" onclick="subject.update('cancel')">Сохранить и закрыть</button>
																<button type="submit" class="btn btn-primary" onclick="subject.update('continue')">Сохранить и продолжить</button>
																
																<?php if($inspection_type == 3 && $access_level < 3){?>
																	<button type="submit" class="btn btn-primary" onclick="subject.update('new_object')">Создать объект</button>
																<?php }?>
																<!--a href="/ARM/admin/subject/" class="submit_cancel"><button class="btn btn-primary">Отмена</button></a-->
																<a href="javascript:history.back()" class="submit_cancel btn-primary">Отмена</a>
															</div>
														</div>	
						
                    </form>
											<div id="messenger"></div>
            

            </div>
        </div>
    </main>
<?php Theme::block('modal/modalSearchRespPers') ?>
<?php Theme::block('modal/modalSearchUnp') ?>
<?php Theme::block('modal/modal_GuidesfromSubject') ?>
<?php Theme::block('modal/ObjectsInfo') ?>	




<?php $this->theme->footer(); ?>