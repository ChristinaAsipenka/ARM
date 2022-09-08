<?php $this->theme->header(); ?>
<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-object"></i></span><p>Объекты</p></div>

    <main>
        <div class="container">
			<div class="top_of_page sticky_body">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title ">
                    <h5>Редактирование</h5>
					<h3 ><span><i class="icon-object"></i></span>&nbsp<?= $objects['name'] ?>
						<!--a href="/ARM/basis/subject/edit/<?= $subject['id'] ?>?mode=subject_info" target = "_blank"> ( <span><i class="icon-subject"></i></span>&nbsp<?= $subject['name'] ?>) </a-->
					</h3>
                </div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/objects/list/<?= $objects['id_reestr_subject'] ?>" class="button_unp"><span><i class="icon-list"></i></span><i class='rp-r-os'>Список объектов</i></a>
					<a href="/ARM/basis/subject/list/" class="button_unp"><span><i class="icon-pin"></i></span>Мои потребители</a>
					<a href="/ARM/basis/subject/" class="button_unp"><span><i class="icon-magnifier"></i></span><i class='rp-r-os'>Поиск</i></a>
				</div>
            </div>
		
			<div class="base_part"> <!------ для всех страниц ------->
           
                <form id="formPage" mode="edit_object" class="form">	

<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
					<div class="tabs">

						<input id="tab1" type="radio" name="tabs" checked>
						<label for="tab1" title="Основная"><span><i class="icon-info"></i></span>&nbspОсновная</label>
						 
						<input id="tab2" type="radio" name="tabs">
						<label for="tab2" title="Электро"><span><i class="icon-energy"></i></span>&nbspЭлектро</label>
						 
						<input id="tab3" type="radio" name="tabs">
						<label for="tab3" title="Тепло"><span><i class="icon-teplo"></i></span>&nbspТепло</label>
						 
						<input id="tab4" type="radio" name="tabs">
						<label for="tab4" title="ТИ"><span><i class="icon-ti"></i></span>&nbspТИ</label>
							
						<input id="tab5" type="radio" name="tabs">
						<label for="tab5" title="Газ"><span><i class="icon-fire"></i></span>&nbspГаз</label>

						<div class='tabs-section'>
						<?php //print_r($userElectro);?>
						
<!------------------------------------------------------     ВКЛАДКА ОСНОВНАЯ  -------------------------------------------------------------------------->							
							<section id="content-tab1">
								<p class="p_gaz">Основная информация по объекту</p>
								<hr/>
								
								<div class="form-group">
									<div class="block w2-5">
										Региональный потребитель:
									</div>
									<div class="block w8 vert_m6">		
										<h3><a href="/ARM/basis/subject/edit/<?= $subject['id'] ?>?mode=subject_info" target = "_blank" > <span><i class="icon-subject"></i></span>&nbsp<?= $subject['name'] ?> </a></h3>
									</div>	
								</div>										

								<div class="form-group">
								
									<div class="block w2-5">
										<label for = 'name_object' class="label_subject"><span class = "formTextRed">*</span> Наименование:</label>
									</div>
									<div class="block w6">		
										<textarea name = 'name_object' id = 'name_object' class='form-controls' cols="50" rows="1" placeholder="Наименование"><?= $objects['name'] ?></textarea>
									</div>	
									<?php if ($objects['name']=="!!! Начальный объект !!!") {
										echo "<div class='block w2-5'>
											<label class='font-size-11'>* этот объект создан автоматически <br> введите его правильное наименование.</label>
										</div>";	
									}?>	
								</div>		

								<input type="hidden" name="subject_id" id="subject_id" value="<?= $subject['id'] ?>">
								<input type="hidden" name="objects_id" id="formObjectId" value="<?= $objects['id'] ?>">								
								<input type="hidden" name="unp_id" id="formUnpId" value="<?= $subject['id_unp'] ?>">
											
								<div class="form-group">
									<div class="block w2-5">
										<label for="formTitle" class='label_subject'>Функциональное назначение:</label>
									</div>	
									<div class="block w8">
									<select class="form-controls" name="t_spr_ot_functions_id" id="t_spr_ot_functions_id">
										<option value='0'>Выберите функциональное назначение:</option>
										<?php foreach($spr_kind_of_activity as $kind_of_activity):?>
											<option value="<?=$kind_of_activity['id']?>"<?= ($kind_of_activity['id'] == $objects['t_id_spr_ot_functions'] ? 'selected="selected"' : '');?>><?=$kind_of_activity['name']?></option>
										<?php endforeach; ?>
									</select>
									</div>
								</div>	
								
								<div class="form-group">
									<div class="block w2-5">
										<label for="formTitle" class='label_subject'>Тип объекта:</label>
									</div>	
									<div class="block w5">
									<select class="form-controls" name="o_spr_type_object" id="o_spr_type_object">
										<option value='0'>Выберите тип объекта:</option>
										<?php foreach($spr_type_object as $o_type_object):?>
											<option value="<?=$o_type_object['id']?>"<?= ($o_type_object['id'] == $objects['type_object'] ? 'selected="selected"' : '');?>><?=$o_type_object['name']?></option>
										<?php endforeach; ?>
									</select>
									</div>
								</div>	
								
								<div class="form-group">
									<div class="block w2-5">
										<label for = 'num_case_o' class="label_subject">Номер объекта:</label>
									</div>	
									<div class="block w2-5">
										<input type='text' name = 'num_case_o' id = 'num_case_o' class='form-controls' value="<?= $objects['num_case_o'] ?>">
									</div>	
									<div class="block w4">
										<label class="label_subject font-size-11">* заполняется инспекторами газового надзора</label>
									</div>	
								</div>
								
								<?php Theme::block('address/addressObject') ?>	
											
							</section> 
<!------------------------------------------------------     ВКЛАДКА ЭЛЕКТРО  -------------------------------------------------------------------------->									
							<section id="content-tab2">
								<p class="p_gaz">Информация по объекту электрической энергии</p>
								<hr/>
								
								
								<div class="form-group">
									<div class="checkbox">
										<?php 
											if($objects['elektro_is'] == 1){
												echo "<input type='checkbox' name = 'elektro_is' id= 'elektro_is' class='custom-checkbox' checked='checked' value='1' onclick='object.is_elektro()' disabled>";	
											}else{
												echo "<input type='checkbox' name = 'elektro_is' id= 'elektro_is' class='custom-checkbox'  value='0' onclick='object.is_elektro()'>";
											}
										?>											
										<label for = 'elektro_is' class='label_subject'>Объект электроснабжения</label>
									</div>
								</div>								

								<div id = "elektro_section">

										<div class="form-group">
											<div class="block w4">	
												<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Закрепленный инспектор:</label>
											</div>
									
										
											
											
											<select class="form-controls" name="e_insp" id="e_insp" <?php echo ($access_level == 2 ? '' : 'disabled')?>>
											<?php
											if(empty($userElectro)){
											
											?>
											
											
												<option value='0'>Выберите инспектора</option>
													<?php foreach($usersElectro as $user):?>
														<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['e_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
													<?php endforeach; 
											}else{
												if($spr_cod_otd <> $userElectro['spr_cod_otd']){
														
														echo "<option value=".$userElectro['id']." selected='selected'>".$userElectro['fio']."</option>";
													}else{
														foreach($usersElectro as $user){?>
															<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['e_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
														<?php }; 
													}
												 } 
												 ?>		
											</select>
											
											
											
										</div>									
								
								
									
									<hr/>
									<p class="p_gaz">Информация о надежности электроснабжения:</p>
									<div class="form-group">
										<div class="block w4">
											<p class='label_subject'>Установленная мощность, кВт: </p>
										</div>
										<p class='label_enter'><span id='sum_power'></span></p>
									</div>
									<div class="form-group">
										<div class="block w4">
											<label for = 'e_cat_1 ' class='label_subject'>Мощность эл.приемника 1 категории, кВт:</label>
										</div>	
										<input type='number' name = 'e_cat_1 ' id = 'e_cat_1' class='form-controls' value="<?= $objects['e_cat_1'] ?>" step="any" min='0'>	
									</div>
									
									<div class="form-group">
										<div class="block w4">
											<label for = 'e_cat_1plus ' class='label_subject'>Мощность эл.приемника 1 особой категории, кВт:</label>
										</div>	
										<input type='number' name = 'e_cat_1plus ' id = 'e_cat_1plus' class='form-controls' value="<?= $objects['e_cat_1plus'] ?>" step="any" min='0'>	
										<label class='label_subject'> (входит в том числе в 1 категорию)</label>
									</div>
									
									<div class="form-group">
										<div class="block w4">
											<label for = 'e_cat_2 ' class='label_subject'>Мощность эл.приемника 2 категории, кВт:</label>
										</div>	
										<input type='number' name = 'e_cat_2 ' id = 'e_cat_2' class='form-controls' value="<?= $objects['e_cat_2'] ?>" step="any" min='0'>	
									</div>
									
									<div class="form-group">
										<div class="block w4">
											<label for = 'e_cat_3 ' class='label_subject'>Мощность эл.приемника 3 категории, кВт:</label>
										</div>	
										<input type='number' name = 'e_cat_3 ' id = 'e_cat_3' class='form-controls' value="<?= $objects['e_cat_3'] ?>" step="any" min='0'>	
									</div>
									
									<hr/>									
									
<!------------------------------------------------------     Бронь  -------------------------------------------------------------------------->	
									<p class="p_gaz">Сведения о режиме электропотребления:</p>
									<div class="checkbox">	
									
										<?php 
											if($objects['e_armor'] == 1){
												echo "<input type='checkbox' name = 'e_armor' id= 'e_armor' class='custom-checkbox' checked='checked' value='1' onclick='object.e_armor()'>";	
											}else{
												echo "<input type='checkbox' name = 'e_armor' id= 'e_armor' class='custom-checkbox'  value='0' onclick='object.e_armor()'>";
											}
										?>
										
										<label for="e_armor" class='label_subject'>Наличие брони</label>
									</div>
									<div id = "bron_hidden">									
									<div class="form-group">
										<div class="block w4">
											<label for = 'e_armor_crach' class='label_subject'>Мощность аварийной брони, кВт:</label>
										</div>
										<input type='number' name = 'e_armor_crach' id = 'e_armor_crach' class='form-controls' value="<?= $objects['e_armor_crach'] ?>" min='0' step="any">	
									</div>
									
									<div class="form-group">
										<div class="block w4">
											<label for = 'e_armor_tech ' class='label_subject'>Мощность технологической брони, кВт:</label>
										</div>	
										<input type='number' name = 'e_armor_tech' id = 'e_armor_tech' class='form-controls' value="<?= $objects['e_armor_tech'] ?>" min='0' step="any">	
									</div>
									
									<div class="form-group">
										<div class="block w4">
											<label for = 'e_armor_time ' class='label_subject'>Время завершения <br>технологического процесса, ч.:</label>
										</div>
										<input type='number' name = 'e_armor_time' id = 'e_armor_time' class='form-controls' value="<?= $objects['e_armor_time'] ?>" min='0' step="any">	
									</div>
									
									<div class="form-group">
										<div class="block w4">
											<label for = 'e_armor_date ' class='label_subject'>Дата составления акта:</label>
										</div>	
										<input type='date' name = 'e_armor_date' id = 'e_armor_date' class='form-controls' value="<?= $objects['e_armor_date'] ?>">	
									</div>
									</div>
									<hr>									
									
<!------------------------------------------------------    Перечень субабонентов  -------------------------------------------------------------------------->										
									<?php
									if(count($subobj_data) > 0){
									?>
									<p class="p_gaz">Сведения о субабонентах:</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1">
												<thead>
													<tr>
														<th width="70%" class="t2">Место</th>
														<th width="10%" class="t4">Мощность установленная (разрешенная), кВт</th>
														<th width="10%" class="t4">Категорийность надежности</th>
														<th width="10%" class="t4">Профиль работ</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													
													foreach($subobj_data as $item_subobj_data){
														
														echo "<tr>";
														echo "<td><span><i class='icon-object'></i></span>&nbsp".$item_subobj_data['reestr_object_name']." <br>(".$item_subobj_data['reestr_subject_name'].") ";
														if(strlen($item_subobj_data['spr_region_name']) > 0){
														echo "<span class='font-size-11'><br>".$item_subobj_data['address_index'].", ".$item_subobj_data['spr_region_name'].", ".$item_subobj_data['spr_district_name']." р-н, ".$item_subobj_data['spr_city_name'].", ".$item_subobj_data['address_street'].", д.".$item_subobj_data['address_building'].", пом.".$item_subobj_data['address_flat']."</span>";
														}
														echo "</td>";
														echo "<td>".$item_subobj_data['reestr_object_e_subobj_power']."</td>";
														/** Ячейка категорийность надежности **/
														echo "<td>";
															if($item_subobj_data['reestr_object_e_cat_1plus'] > 0){
																echo " 1 особая";
															}elseif($item_subobj_data['reestr_object_e_cat_1'] > 0){
																echo " 1 категория";
															}elseif($item_subobj_data['reestr_object_e_cat_2'] > 0){
																echo " 2 категория";
															}elseif($item_subobj_data['reestr_object_e_cat_3'] > 0){
																echo " 3 категория";
															}else{
																echo "-";
															}
														echo "</td>";
														/** END OF Ячейка категорийность надежности **/
														echo "<td>".$item_subobj_data['spr_kind_of_activity_name']."</td>";
														echo "</tr>";
													};?>
												</tbody>
											</table>
										
									</div>
									<p>Таблица фомируется из объектов которые являются субабонетами потребителя у выбранного объекта.</p>
									<hr>
									<?php }else{?>
										<p class="p_gaz">Сведения о субабонентах:</p>
										<p>Cубабонеты отсутствуют (сведения о субабонентах формируются автоматически).</p>
										<hr>
									<?php }?>
									
									
<!------------------------------------------------------     Субабонент  -------------------------------------------------------------------------->									
									<div class="checkbox">	
										<?php 
											if($objects['e_subobj'] == 1){
												echo "<input type='checkbox' name = 'e_subobj' id= 'e_subobj' class='custom-checkbox' checked='checked' value='1' onclick='object.e_subobj()'>";	
											}else{
												echo "<input type='checkbox' name = 'e_subobj' id= 'e_subobj' class='custom-checkbox'  value='0' onclick='object.e_subobj()'>";
											}
										?>
										<label for="e_subobj" class='label_subject'>Является субабонентом </label>
									</div>
									
									<div id = "subobj_subject_hidden">
										<div class="form-group">

											<input type="hidden" name="e_subobj_subject_id" id="e_subobj_subject_id" value="<?= ($objects['e_subobj_subject']>0 ? $e_subobj_subject['id'] : 0)?>">
											<input type="hidden" name="e_subobj_obj_id" id="e_subobj_obj_id" value="<?= ($objects['e_subobj_obj']>0 ? $objects['e_subobj_obj'] : 0)?>">

											<div class="block w3">
												<label for="e_subobj" class='label_subject'>Абонет <i class='rp-r-os'>(объект</i>):</label>
											</div>
										
											<textarea name = 'e_subobj_subject' id = 'e_subobj_subject' class='form-controls'  cols="50" rows="1" disabled><?= ($objects['e_subobj_subject']>0 ? $e_subobj_obj['name'] .'('.$e_subobj_subject['name'].')' : '')?></textarea>
											<button onclick = "modalWindow.openModal('openModalSubject')" id='sbobj' class='shine-button'>Выбрать</button>
											<button class = "btn_clear_fields" onclick="object.clear_fields('e_subobj_subject')"><i class="icon-trash"></i></button>
										</div>
										
										<div class="form-group">
											
												<p class="label_subject">Разрешенная субабоненту мощность </p>
											<p name="razr_subobj_power" id="razr_subobj_power" class="label_enter"><?= (isset($e_subobj_obj['e_subobj_power']) ? $e_subobj_obj['e_subobj_power'] : '-')?></p>
											<p class="label_subject">&nbsp кВт (соответствует установленной мощности объекта абонента).</p>
										</div>	
									
									</div>
									<hr/>
<!------------------------------------------------------     КВЛ -------------------------------------------------------------------------->	
									<div id="container-main">											
											
											<div class="accordion-container">
											
												<a href="#" class="accordion-titulo"><div><p id = "numrow_klvl">Кабельные и воздушные линии (<?= (count($obj_oe_klvls)>0 ? count($obj_oe_klvls) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
												<div class="accordion-content">
												
													<div class="mobileTable">
															<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_klvl">
																<thead>
																	<tr>
																		<th class="t4">Тип</th>
																		<th class="t4">Напря- жение линии, кВ</th>
																		<th class="t4">Название и номер линии</th>
																		<th class="t4">Марка провода</th>
																		<th class="t4">Длина, км</th>
																		<th class="t4">Точка подключения</th>
																		<th class="t4">Категория</th>
																		<th class="t4">Год ввода в эксплуа- тацию</th>
																		<th class="t4">Срок службы, г.</th>
																		<th class="t4">Продление cрока службы</th>
																		<th class="t5">Операции</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	foreach($obj_oe_klvls as $obj_oe_klvl){
																		//print_r($obj_oe_klvl);
																		echo "<tr id_obj_oe_klvl='".$obj_oe_klvl['id']."'>";
																		echo "<td name='type' klvl_type='".$obj_oe_klvl['type']."'>".$obj_oe_klvl['spr_oe_klvl_type_name']."</td>";
																		echo "<td name='volt' klvl_volt='".$obj_oe_klvl['volt']."'>".$obj_oe_klvl['spr_oe_klvl_volt_name']."</td>";
																		echo "<td name='name'>".$obj_oe_klvl['name']."</td>";
																		echo "<td name='mark'>".$obj_oe_klvl['mark']."</td>";
																		echo "<td name='length'>".$obj_oe_klvl['length']."</td>";
																		echo "<td name='name_center'>".$obj_oe_klvl['name_center']."</td>";
																		echo "<td name='category' klvl_cat='".$obj_oe_klvl['category']."'>".$obj_oe_klvl['spr_oe_category_line_name']."</td>";
																		echo "<td name='year'>".$obj_oe_klvl['year']."</td>";
																		echo "<td name='srok'>".$obj_oe_klvl['srok']."</td>";
																		echo "<td name='next_srok'>".(strlen($obj_oe_klvl['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_oe_klvl['next_srok'])) : '')."</td>";

																		echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_klvl',".$obj_oe_klvl['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_klvl\",".$obj_oe_klvl['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																	};?>
																</tbody>
															</table>
														
													</div>
													<button onclick = "modalWindow.openModal('ModalObj_oe_klvl')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												
											</div>									
										
<!------------------------------------------------------     ТРП  -------------------------------------------------------------------------->											
											<div class="accordion-container">
											
												<a href="#" class="accordion-titulo"><div><p id = "numrow_trps">Трансформаторные и распределительные подстанции (<?= (count($obj_oe_trps)>0 ? count($obj_oe_trps) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
												<div class="accordion-content">
													<div class = "resut_row_table"><div><p class="p_gaz"></p></div></div>
														<div class="mobileTable">
																<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_trp">
																	<thead>
																		<tr>
																			<th class="t4">Наименование</th>
																			<th class="t4">Тип трансформатора</th>
																			<th class="t4">Мощность, кВА</th>
																			<th class="t4">Высокое напряжение, кВ</th>
																			<th class="t4">Категория</th>
																			<th class="t4">Год ввода в эксплуа- тацию</th>
																			<th class="t4">Срок службы, г.</th>
																			<th class="t4">Продление cрока службы</th>																			
																			<th class="t5">Операции</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php 
																		foreach($obj_oe_trps as $obj_oe_trp){
																			echo "<tr id_obj_oe_trp='".$obj_oe_trp['id']."'>";
																			echo "<td name='name'>".$obj_oe_trp['name']."</td>";
																			echo "<td name='id_type'>".$obj_oe_trp['id_type']."</td>";
																			echo "<td name='power'>".$obj_oe_trp['power']."</td>";
																			echo "<td name='volt'>".$obj_oe_trp['volt']."</td>";
																			echo "<td name='category' trp_cat='".$obj_oe_trp['category']."'>".$obj_oe_trp['spr_trp_category_line_name']."</td>";
																			echo "<td name='year_begin'>".$obj_oe_trp['year_begin']."</td>";
																			echo "<td name='srok'>".$obj_oe_trp['srok']."</td>";
																			echo "<td name='next_srok'>".(strlen($obj_oe_trp['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_oe_trp['next_srok'])) : '')."</td>";

																			echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_trp',".$obj_oe_trp['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_trp\",".$obj_oe_trp['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																		};?>
																	</tbody>
																</table>
															
														</div>
														<button onclick = "modalWindow.openModal('ModalObj_oe_trp')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												
											</div>										
										
										
<!------------------------------------------------------     АВР  -------------------------------------------------------------------------->											
											<div class="accordion-container">
											
												<a href="#" class="accordion-titulo"><div><p id = "numrow_avr">АВР (<?= (count($obj_oe_avrs)>0 ? count($obj_oe_avrs) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
												<div class="accordion-content">
													<div class = "resut_row_table"><div><p class="p_gaz"></p></div></div>
													<div class="mobileTable">
															<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_avr">
																<thead>
																	<tr>
																		<th class="t4">Место установки</th>
																		<th class="t4">Напряжение, кВ</th>
																		<th class="t4">Время срабатывания, секунд</th>
																		<th class="t4">Дата последней проверки срабатывания</th>
																		<th class="t5">Операции</th>
																	</tr>
																</thead>
																<tbody>
																<?php 

																	foreach($obj_oe_avrs as $obj_oe_avr){
																		echo "<tr id_obj_oe_avr='".$obj_oe_avr['id']."'>";
																		echo "<td name='place'>".$obj_oe_avr['place']."</td>";
																		echo "<td name='power'>".$obj_oe_avr['power']."</td>";
																		echo "<td name='time'>".$obj_oe_avr['time']."</td>";
																		echo "<td name='date'>".(strlen($obj_oe_avr['date']) > 0 ? date('d.m.Y',strtotime($obj_oe_avr['date'])) : '')."</td>";
																		echo "<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindow.openModalEdit('ModalObj_oe_avr',".$obj_oe_avr['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_avr\",".$obj_oe_avr['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																	};?>	
																</tbody>
															</table>
															
													</div>
													<button onclick = "modalWindow.openModal('ModalObj_oe_avr')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												
											</div>										
										
<!------------------------------------------------------     АИЭ  -------------------------------------------------------------------------->											
											<div class="accordion-container">
											
												<a href="#" class="accordion-titulo"><div><p id = "numrow_aie">Автономные источники электроснабжения (<?= (count($obj_oe_aies)>0 ? count($obj_oe_aies) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
												<div class="accordion-content">
														<div class="mobileTable">
																<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_aie">
																	<thead>
																		<tr>
																			<th class="t4">Наименование / марка</th>
																			<th class="t4">Место установки</th>
																			<th class="t4">Тип</th>
																			<th class="t4">Напря- жение, кВ</th>
																			<th class="t4">Мощ- ность, кВт</th>
																			<th class="t4">Питаемые электро- приемники</th>
																			<th class="t4">Дата последнего ТО</th>
																			<th class="t4">Завод изготовитель</th>
																			<th class="t4">Год ввода в эксплуа- тацию</th>
																			<th class="t4">Срок службы, г.</th>
																			<th class="t4">Продление cрока службы</th>
																			<th class="t5">Операции</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php 
																		foreach($obj_oe_aies as $obj_oe_aie){
																			echo "<tr id_obj_oe_aie='".$obj_oe_aie['id']."'>";
																			echo "<td name='name'>".$obj_oe_aie['name']."</td>";
																			echo "<td name='place'>".$obj_oe_aie['place']."</td>";
																			echo "<td name='type'>".$obj_oe_aie['type']."</td>";
																			echo "<td name='power'>".$obj_oe_aie['power']."</td>";
																			echo "<td name='mosch'>".$obj_oe_aie['mosch']."</td>";
																			echo "<td name='pitanie'>".$obj_oe_aie['pitanie']."</td>";
																			echo "<td name='date_last'>".(strlen($obj_oe_aie['date_last']) > 0 ? date('d.m.Y',strtotime($obj_oe_aie['date_last'])) : '')."</td>";
																			echo "<td name='factory'>".$obj_oe_aie['factory']."</td>";
																			echo "<td name='year_begin'>".$obj_oe_aie['year_begin']."</td>";
																			echo "<td name='srok'>".$obj_oe_aie['srok']."</td>";
																			echo "<td name='next_srok'>".(strlen($obj_oe_aie['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_oe_aie['next_srok'])) : '')."</td>";																			
																			echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_aie',".$obj_oe_aie['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_aie\",".$obj_oe_aie['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																		};?>
																	</tbody>
																</table>
														</div>
														<button onclick = "modalWindow.openModal('ModalObj_oe_aie')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												
											</div>		
											
<!------------------------------------------------------     Блок станции  -------------------------------------------------------------------------->											
											<div class="accordion-container">
											
												<a href="#" class="accordion-titulo"><div><p id = "numrow_block">Блок-станции/собственной генерации (<?= (count($obj_oe_blocks)>0 ? count($obj_oe_blocks) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
												<div class="accordion-content">
													<div class="mobileTable">
															<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_block">
																<thead>
																	<tr>
																		<th class="t4">Наименование</th>
																		<th class="t4">Мощность, кВт</th>
																		<th class="t4">Вид используемой энергии</th>
																		<th class="t4">Возможность работы на выделенную нагрузку</th>
																		<th class="t5">Операции</th>
																	</tr>
																</thead>
																<tbody>
																<?php 
																	foreach($obj_oe_blocks as $obj_oe_block){
																		echo "<tr id_obj_oe_block='".$obj_oe_block['id']."'>";
																		echo "<td name='name'>".$obj_oe_block['name']."</td>";
																		echo "<td name='power'>".$obj_oe_block['power']."</td>";
																		echo "<td energy_type ='".$obj_oe_block['spr_oe_energy_type_id']."'>".$obj_oe_block['spr_oe_energy_type_name']."</td>";
																		echo "<td add_load='add_load'>".($obj_oe_block['add_load'] == 1 ? 'да' : 'нет')."</td>";
																		echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_oe_block\",".$obj_oe_block['id'].")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_block\",".$obj_oe_block['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																	};?>	
																</tbody>
															</table>
														
													</div>
													<button onclick = "modalWindow.openModal('ModalObj_oe_block')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												
											</div>

<!------------------------------------------------------     ВД  -------------------------------------------------------------------------->												
											<div class="accordion-container">
											
												<a href="#" class="accordion-titulo"><div><p id = "numrow_vvd">Высоковольтные двигатели, в т.ч. синхронные (<?= (count($obj_oe_vvds)>0 ? count($obj_oe_vvds) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
												<div class="accordion-content">
													<div class="mobileTable">
															<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_vvd">
																<thead>
																	<tr>
																			<th class="t4">Наименование</th>
																			<th class="t4">Количество</th>
																			<th class="t4">Мощность, кВт</th>
																			<th class="t4">Напряжение, кВ</th>
																			<th class="t4">Год ввода в эксплуа- тацию</th>
																			<th class="t4">Срок службы, г.</th>
																			<th class="t4">Продление cрока службы</th>
																			<th class="t5">Операции</th>
																	</tr>
																</thead>
																<tbody>
																<?php 
																	foreach($obj_oe_vvds as $obj_oe_vvd){
																		echo "<tr id_obj_oe_vvd='".$obj_oe_vvd['id']."'>";
																		echo "<td name='name'>".$obj_oe_vvd['name']."</td>";
																		echo "<td name='count'>".$obj_oe_vvd['vvd_count']."</td>";
																		echo "<td name='power'>".$obj_oe_vvd['power']."</td>";
																		echo "<td name='voltage'>".$obj_oe_vvd['voltage']."</td>";
																		echo "<td name='year_begin'>".$obj_oe_vvd['year_begin']."</td>";
																		echo "<td name='srok'>".$obj_oe_vvd['srok']."</td>";
																		echo "<td name='next_srok'>".(strlen($obj_oe_vvd['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_oe_vvd['next_srok'])) : '')."</td>";

																		echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_oe_vvd\",".$obj_oe_vvd['id'].")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_vvd\",".$obj_oe_vvd['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																	};?>	
																</tbody>
															</table>
														
													</div>
													<button onclick = "modalWindow.openModal('ModalObj_oe_vvd')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												
											</div>
											
<!------------------------------------------------------     Электрокотельные  -------------------------------------------------------------------------->												
											<div class="accordion-container">
											
												<a href="#" class="accordion-titulo"><div><p id = "numrow_ek">Электрокотельные, другое электронагревательное оборудование (<?= (count($obj_oe_eks)>0 ? count($obj_oe_eks) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
												<div class="accordion-content">
													<div class="mobileTable">
															<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_ek">
																<thead>
																	<tr>
																			<th class="t4">Место установки</th>
																			<th class="t4">Тип электро- нагревателя</th>
																			<th class="t4">Кол-во</th>
																			<th class="t4">Назначение</th>
																			<th class="t4">Мощ- ность, кВт</th>
																			<th class="t4">Дата выдачи разрешения</th>
																			<th class="t4">Режим работы</th>
																			<th class="t4">Наличие автоматики</th>
																			<th class="t4">Наличие прибора учета</th>
																			<th class="t4">Наличие аккумуляции (емк)</th>
																			<th class="t4">Год ввода в эксплуа- тацию</th>
																			<th class="t4">Срок службы, г.</th>
																			<th class="t4">Продление cрока службы</th>
																			<th class="t5">Операции</th>
																	</tr>
																</thead>
																<tbody>
																<?php 
																	foreach($obj_oe_eks as $obj_oe_ek){
																		echo "<tr id_obj_oe_ek='".$obj_oe_ek['id']."'>";
																		echo "<td name='place'>".$obj_oe_ek['place']."</td>";
																		echo "<td name='name'>".$obj_oe_ek['name']."</td>";
																		echo "<td name='count'>".$obj_oe_ek['ek_count']."</td>";
																		echo "<td name='nazn'>".$obj_oe_ek['nazn']."</td>";
																		echo "<td name='power'>".$obj_oe_ek['power']."</td>";
																		echo "<td name='date_vid'>".(strlen($obj_oe_ek['date_vid']) > 0 ? date('d.m.Y',strtotime($obj_oe_ek['date_vid'])) : '')."</td>";
																		echo "<td ek_rezim='".$obj_oe_ek['rezim']."'>".($obj_oe_ek['rezim'] > 0 ? $obj_oe_ek['rezim_name'] : '')."</td>";
																		echo "<td is_avt='is_avt'>".($obj_oe_ek['is_avt'] == 1 ? 'да' : 'нет')."</td>";
																		echo "<td is_pu='is_pu'>".($obj_oe_ek['is_pu'] == 1 ? 'да' : 'нет')."</td>";
																		echo "<td is_ak='is_ak'>".($obj_oe_ek['is_ak'] == 1 ? 'да' : 'нет')."</td>";
																		echo "<td name='year_begin'>".$obj_oe_ek['year_begin']."</td>";
																		echo "<td name='srok'>".$obj_oe_ek['srok']."</td>";
																		echo "<td name='next_srok'>".(strlen($obj_oe_ek['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_oe_ek['next_srok'])) : '')."</td>";
																		
																		echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_oe_ek\",".$obj_oe_ek['id'].")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_ek\",".$obj_oe_ek['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																	};?>	
																</tbody>
															</table>
														
													</div>
													<button onclick = "modalWindow.openModal('ModalObj_oe_ek')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												
											</div>
											
<!------------------------------------------------------     Компенсирующие  -------------------------------------------------------------------------->	
											<div class="accordion-container">
											
												<a href="#" class="accordion-titulo"><div><p id = "numrow_ku">Компенсирующие устройства (<?= (count($obj_oe_kus)>0 ? count($obj_oe_kus) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
												<div class="accordion-content">
													<div class="mobileTable">
															<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_ku">
																<thead>
																	<tr>
																			<th class="t4">Место установки</th>
																			<th class="t4">Наименование устройства</th>
																			<th class="t4">Напря- жение, кВ</th>
																			<th class="t4">Кол-во</th>
																			<th class="t4">Мощ- ность, кВАр</th>
																			<th class="t4">Кол-во с автома- тическим регули- рованием</th>
																			<th class="t4">Макс. значение автоматически регулируемой мощности, кВАр</th>
																			<th class="t4">Год ввода в эксплуа- тацию</th>
																			<th class="t4">Срок службы, г.</th>
																			<th class="t4">Продление cрока службы</th>
																			<th class="t5">Операции</th>
																	</tr>
																</thead>
																<tbody>
																<?php 
																	foreach($obj_oe_kus as $obj_oe_ku){
																		echo "<tr id_obj_oe_ku='".$obj_oe_ku['id']."'>";
																		echo "<td name='place'>".$obj_oe_ku['place']."</td>";
																		echo "<td name='name'>".$obj_oe_ku['name']."</td>";
																		echo "<td name='voltage'>".$obj_oe_ku['voltage']."</td>";
																		echo "<td name='count'>".$obj_oe_ku['ku_count']."</td>";
																		echo "<td name='power'>".$obj_oe_ku['power']."</td>";
																		echo "<td name='count_ar'>".$obj_oe_ku['count_ar']."</td>";
																		echo "<td name='max_ar'>".$obj_oe_ku['max_ar']."</td>";
																		echo "<td name='year_begin'>".$obj_oe_ku['year_begin']."</td>";
																		echo "<td name='srok'>".$obj_oe_ku['srok']."</td>";
																		echo "<td name='next_srok'>".(strlen($obj_oe_ku['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_oe_ku['next_srok'])) : '')."</td>";
																		echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_oe_ku\",".$obj_oe_ku['id'].")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_ku\",".$obj_oe_ku['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																	};?>	
																</tbody>
															</table>
														
													</div>
													<button onclick = "modalWindow.openModal('ModalObj_oe_ku')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												
											</div>
									
									
										
									</div>
									
<!------------------------------------------------------     прочее  -------------------------------------------------------------------------->									
									<div class="form-group">
										<div class="block w2-5">
											<label for = 'e_district' class='label_subject'>Район электрических сетей:</label>
										</div>	
										<textarea name = 'e_district' id = 'e_district' class='form-controls'  cols="50" rows="1" placeholder="Район электрических сетей"><?= $objects['e_district'] ?></textarea>
										
									</div>
									<div class="checkbox">	
										<div class="block w2-5">
											<label class='label_subject'>Находится в зоне:</label>	
										</div>
										<?php 
											if($objects['e_flooding'] == 1){
												echo "<input type='checkbox' name = 'e_flooding' id= 'e_flooding' class='custom-checkbox' checked='checked' value='1' onclick='object.e_flooding()'>";	
											}else{
												echo "<input type='checkbox' name = 'e_flooding' id= 'e_flooding' class='custom-checkbox'  value='0' onclick='object.e_flooding()'>";
											}
										?>
										
										<label for="e_flooding" class='label_subject'>подтопления паводковыми водами</label>
									</div>
									
									<!--div class="form-group">
										<div class="block w2-5">
											<label for = 'e_note' class='label_subject'>Примечание:</label>
										</div>	
										<textarea name = 'e_note' id = 'e_note' class='form-controls'  cols="50" rows="1" placeholder="Примечание"><?= $objects['e_note'] ?></textarea>
										
									</div-->
									
								<fieldset class = "fieldset_potr">
									<legend class="legend_potr"><span><i class="icon-tag"></i></span>&nbsp Особые отметки объекта электрической энергии</legend>
									<div class="form-group">
										<input type='checkbox' class="custom-checkbox" name='inactive_e' id='inactive_e' <?php echo ($objects['inactive_e'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
										<label for='inactive_e'>отметить как недействующий</label>
									</div>									
									<div class="form-group">
										<input type='checkbox' class="custom-checkbox" name='del_e' id='del_e' <?php echo ($objects['del_e'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
										<label for='del_e'>отметить для удаления</label>
									</div>
								</fieldset>	
								
								</div>
							</section> 
<!------------------------------------------------------     ВКЛАДКА ТЕПЛО  -------------------------------------------------------------------------->									
							<section id="content-tab3">
								<p class="p_gaz">Информация по объекту тепловой энергии</p>
								<hr/>
								
								<div class="form-group">
									<div class="checkbox">
										<?php 
											if($objects['t_is'] == 1){
												echo "<input type='checkbox' name = 't_is' id= 't_is' class='custom-checkbox' checked='checked' value='1' onclick='object.is_teplo()'  disabled>";	
											}else{
												echo "<input type='checkbox' name = 't_is' id= 't_is' class='custom-checkbox'  value='0' onclick='object.is_teplo()'>";
											}
										?>											
										<label for = 't_is' class='label_subject'>Объект теплопотребления</label>
									</div>
								</div>									
									
								<div id = "t_is">							

									<div class="form-group">
											<div class="block w4">	
												<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Закрепленный инспектор:</label>
											</div>

											<select  class="form-controls" name="Insp_t" id="Insp_t" onchange='object.changeInsp()' <?php echo ($access_level == 2 ? '' : 'disabled')?>>
												
													<?php 
													
													
													if(empty($userTeplo)){
													
														echo "<option value='0'>Выберите инспектора</option>";
														foreach($usersTeplo as $user){?>
															<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['t_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
														<?php };
													
													}else{
														if($spr_cod_otd <> $userTeplo['spr_cod_otd']){
														
														echo "<option value=".$userTeplo['id']." selected='selected'>".$userTeplo['fio']."</option>";
													 } else{
														 foreach($usersTeplo as $user){?>
															<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['t_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
														<?php };
													 }
													 
													}
													?>
											</select>
											
											
									</div>	
																		
<!------------------------------------------------------     Информация о теплоснабжении  -------------------------------------------------------------------------->	
									
									<div class="form-group">
									<div class="block w4">
										<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Категория надежности теплоснабжения:</label>
									</div>	
										<select class="form-controls" name="t_spr_ot_cat" id="t_spr_ot_cat">
											<option value='0'>Выберите категорию</option>
												<?php foreach($spr_ot_catCheck as $ot_cat_n):?>
													<option value="<?=$ot_cat_n['id']?>"<?= ($ot_cat_n['id'] == $objects['t_id_spr_ot_cat'] ? 'selected="selected"' : '');?>><?=$ot_cat_n['name']?></option>
												<?php endforeach; ?>
										</select>
									</div>	
								
									<hr/>


									
<!------------------------------------------------------     Источники теплоснабжения  -------------------------------------------------------------------------->										

									<div class="accordion-container">
									
											<a href="#" class="accordion-titulo"><div><p id = "numrow_ist_teplo">Источники теплоснабжения (<?= (count($mkm_object_t_tis)>0 ? count($mkm_object_t_tis) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
											
											<div class="accordion-content">												
												
													<div>
														<p class="p_gaz">Источники теплоснабжения</p><br>
													</div>												
												
												<div class="mobileTable">									
														<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id = "mkm_object_t_ti">
															<thead>
																<tr>
																	<th class="t3">Форма</th>
																	<th class="t3"><i class='rp-i-os'>Объект (</i>)</th>
																	<th class="t3">Операции</th>
																</tr>
															</thead>
															<tbody>
																<?php

																	foreach($mkm_object_t_tis as $mkm_object_t_ti){
																	echo "<tr id_mkm_object_t_ti='".$mkm_object_t_ti['id']."'>";
																	echo "<td>".($mkm_object_t_ti['id_unp_sbj_own'] == $mkm_object_t_ti['id_unp_sbj_ti'] ? "Собственный ТИ " : "Сторонний ТИ ").(strlen($mkm_object_t_ti['ti_name'])>0 ? "$mkm_object_t_ti[ti_name] &nbsp": '&nbsp')."</td>";
																	echo "<td name='name_object'>".$mkm_object_t_ti['name']." (".$mkm_object_t_ti['reestr_subject_name'].")</td>";
																	echo '<td><div class="menu-item-event"><div><button class="button-remove" onclick="object.removeTableItem(\'mkm_object_t_ti\','.$mkm_object_t_ti['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
																	}
																?>
															</tbody>					
														</table>

												</div>
													<div>
														<button class="shine-button" onclick = "modalWindow.openModal('openModalHeatSource')">Добавить объект</button>
													</div>
											<hr/>	
											</div>
											
									</div>					

<!------------------------------------------------------     Тепловые сети  тепло-------------------------------------------------------------------------->									
							<div class="accordion-container">
								
								<a href="#" class="accordion-titulo"><div><p id = "numrow_heatnet_ts">Тепловые сети на балансе теплобъекта (<?= (count($obj_ot_heatnet_ts)>0 ? count($obj_ot_heatnet_ts) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
								
								<div class="accordion-content">
										<div>
											<p class="p_gaz">Тепловые сети на балансе теплобъекта</p><br>
										</div>	
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_heatnet_t">
												<thead>
													<tr>
														<th class="t3">Точка подключения</th>
														<th class="t3">Конечная точка</th>
														<th class="t3">Год ввода в эксплуа- тацию</th>
														<th class="t3">Длина участка, м.</th>
														<th class="t3">Условный диаметр, мм.</th>
														<th class="t3">Кол-во труб, шт.</th>
														<th class="t3">Техническое исполнение</th>
														<th class="t3">Тип трубы</th>
														<th class="t3">Вид изоляции</th>
														<th class="t3">Примечание</th>
														<th class="t5">Операции</th>
													</tr>
												</thead>
												<tbody>
													<?php 																										
													foreach($obj_ot_heatnet_ts as $one_obj_ot_heatnet_t){
														
														echo '<tr id_obj_ot_heatnet_t="'.$one_obj_ot_heatnet_t['id'].'">';
														echo '<td name="conect_point">'.$one_obj_ot_heatnet_t['conect_point'].'</td>';
														echo '<td name="end_point">'.$one_obj_ot_heatnet_t['end_point'].'</td>';
														echo '<td name="year">'.$one_obj_ot_heatnet_t['year'].'</td>';
														echo '<td name="length">'.$one_obj_ot_heatnet_t['length'].'</td>';
														echo '<td t_heatnet_diameter="'.$one_obj_ot_heatnet_t['diameter'].'" >'.$one_obj_ot_heatnet_t['diameter_name'].'</td>';
														echo '<td name="count_tube">'.$one_obj_ot_heatnet_t['count_tube'].'</td>';
														echo '<td t_heatnet_underground="'.$one_obj_ot_heatnet_t['underground'].'" >'.$one_obj_ot_heatnet_t['name_underground'].'</td>';
														echo '<td teplo_type_isolation="'.$one_obj_ot_heatnet_t['isolation'].'">'.$one_obj_ot_heatnet_t['name_iso'].'</td>';
														echo '<td t_heatnet_type_isolation="'.$one_obj_ot_heatnet_t['type_isolation'].'">'.($one_obj_ot_heatnet_t['type_isolation'] == 0 ? '' : $one_obj_ot_heatnet_t['name_izol']).'</td>';
														echo '<td name="prim">'.$one_obj_ot_heatnet_t['prim'].'</td>';														
														echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalObj_ot_heatnet_t\','.$one_obj_ot_heatnet_t['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'obj_ot_heatnet_t\','.$one_obj_ot_heatnet_t['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
													};?>
													

												</tbody>
											</table>	
										</div>
										<div>
											<button onclick = "modalWindow.openModal('ModalObj_ot_heatnet_t')"  class='shine-button'>Добавить запись в таблицу</button>
										</div>
									<hr/>	
								</div>
							</div>										
							
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------    Информация об узлах объекта (ИТП и прочих) --------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
				<!--p class="p_gaz">Информация о ИТП и прочих узлах объекта</p-->
				
				<fieldset class = "fieldset_potr">
					<legend class="legend_potr"><span><i class="icon-organization"></i></span>&nbsp Информация об узлах объекта (ИТП и прочих)</legend>
								  
								  
								  <div id="dc1" class="ui-widget">
								  		<div class="block w3">
											<label for = 'tabLabel' class="label_subject">Введите наименование узла:</label>
										</div>	
										<input type='text' name = 'tabLabel' id = 'tabLabel' class='form-controls'>
										<button id="add_uzel" class='shine-button'>Добавить узел (вкладку)</button>
										<!--button id="remove_uzel" class='add_button'>Удалить активную вкладку</button-->
								  </div>
								  
								  
								  
								  
								  <div class="tabs_teplo" id="uzel_teplo">
									<?php 
										foreach($mkm_teplo_uzelCheck as $one_mkm_teplo_uzel){?>
										
										<input type='radio' name='uzel' id='<?= 'uzel-'.$one_mkm_teplo_uzel['id']?>' checked onclick ='myTabs.showContent("<?= $one_mkm_teplo_uzel['id']?>")' ><label for='<?= 'uzel-'.$one_mkm_teplo_uzel['id']?>'><?= $one_mkm_teplo_uzel['name_vkladka']?></label>
									
									<?php	
									}
									?>
								  </div>
								  
						
									<div id="empty_content" <?php echo (count($mkm_teplo_uzelCheck) == 0? '': 'style="display: none;"')?>><p class="t_uzel">! Узлы не созданы !</p></div>
					
									<div id="main_content">
									<?php 
										foreach($mkm_teplo_uzelCheck as $one_mkm_teplo_uzel){?>
									<div id="<?= 'content-'.$one_mkm_teplo_uzel['id'];?>" class="uzel_content">
									
									
									
									
									<!--button class="shine-button float-right" onclick="myTabs.delTab(<?= $one_mkm_teplo_uzel['id'];?>)">Удалить вкладку</button-->
									<div class='btn_panel'>
										<div class='tooltip'>
											<button class="button-remove float-right" onclick="myTabs.delTab(<?= $one_mkm_teplo_uzel['id'];?>)">
												<i class='icon-trash icons'></i>
												<span class = 'tooltiptext'>Удалить узел (вкладку)</span>
											</button>
										</div>
									</div>
									
									
									
										<div class="uzel_razdel">	
												<div class="form-group">
													<div class="block w3">
														<label for="formTitle" class='label_subject'>Узел объекта тепловой энергии:</label>
													</div>
														<select class="form-controls" name="t_spr_uzel_block" id="<?= 't_spr_uzel_block-'.$one_mkm_teplo_uzel['id'];?>"  onchange="object.uzel_hide_show(this.value, <?= $one_mkm_teplo_uzel['id'];?>); myTabs.updStr(<?= $one_mkm_teplo_uzel['id'];?>)">
															<option value='0'>Выберите тип узла</option>

																<?php 

																foreach($spr_ot_uzel_blockCheck as $spr_ot_uzel_block):?>
																	<option value="<?=$spr_ot_uzel_block['id']?>"<?= ($spr_ot_uzel_block['id'] == $one_mkm_teplo_uzel['id_uzel_block'] ? 'selected="selected"' : '');?>><?=$spr_ot_uzel_block['name']?></option>
																<?php endforeach; ?>
														</select>

												</div>
										</div>
										<div class="uzel_name">
											<div class="form-group">
												<div class="block w3">
													<label for = 'name_uzel' class="label_subject">Информация об узле:</label>
												</div>	
												<textarea name = 'name_uzel' id = '<?= 'name_uzel-'.$one_mkm_teplo_uzel['id'];?>' class='form-controls' cols="50" rows="1" placeholder="Наименование и прочее" onchange="myTabs.updStr(<?= $one_mkm_teplo_uzel['id'];?>)"><?= $one_mkm_teplo_uzel['info'] ?></textarea>
											</div>
										</div>	

										<!--------------------Блок ПУ---------------------------->
										
										<div class="uzel_pu" id='<?= 'uzel_pu-'.$one_mkm_teplo_uzel['id'];?>'>
											<div class="container-main">											
												<div class="accordion-container">
													<div id = "<?= 'numrow_pu-'.$one_mkm_teplo_uzel['id'];?>" class="accordion-titulo-tab" onclick='myTabs.showContentTable("<?= 'uzel_pu-'.$one_mkm_teplo_uzel['id'];?>")'><p>Приборы учета (<span class='count_pu'></span> шт.)<span class="toggle-icon"></span>
														</p></div>
														<div class="accordion-content">	
															<div class="mobileTable">
																<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="<?= 'obj_ot_personal_tp-'.$one_mkm_teplo_uzel['id'];?>">
																	<thead>
																		<tr>
																			<th class="t4">Марка / наименование</th>
																			<th class="t4">Назначение, отопление</th>
																			<th class="t4">Назначение, <br>ГВС</th>
																			<th class="t4">Назначение, технологические нужды</th>
																			<th class="t4">Назначение, вентиляция</th>
																			<th class="t5">Операции</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		
																					foreach($obj_ot_personal_tps as $obj_ot_personal_tp){
																						if($obj_ot_personal_tp['id_table'] == 'obj_ot_personal_tp-'.$one_mkm_teplo_uzel['id'] ){
																							echo "<tr id_obj_ot_personal_tp='".$obj_ot_personal_tp['id']."'>";
																							echo "<td name='device'>".$obj_ot_personal_tp['device']."</td>";
																							echo "<td nazn_tp_ot='nazn_tp_ot'>".($obj_ot_personal_tp['nazn_tp_ot'] == 1 ? 'да' : 'нет')."</td>";
																							echo "<td nazn_tp_gvs='nazn_tp_gvs'>".($obj_ot_personal_tp['nazn_tp_gvs'] == 1 ? 'да' : 'нет')."</td>";
																							echo "<td nazn_tp_tn='nazn_tp_tn'>".($obj_ot_personal_tp['nazn_tp_tn'] == 1 ? 'да' : 'нет')."</td>";
																							echo "<td nazn_tp_vent='nazn_tp_vent'>".($obj_ot_personal_tp['nazn_tp_vent'] == 1 ? 'да' : 'нет')."</td>";
																							echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_ot_personal_tp\",".$obj_ot_personal_tp['id'].", ".'"obj_ot_personal_tp-'.$one_mkm_teplo_uzel['id']."\")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_personal_tp\",".$obj_ot_personal_tp['id'].", \"obj_ot_personal_tp-".$one_mkm_teplo_uzel['id']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																						
																						}
																						
																					};?>													
																				</tbody>
																			</table>
																			
																	</div>
																	<button class="shine-button" onclick = "modalWindow.openModal('ModalObj_ot_personal_tp','<?php echo trim('obj_ot_personal_tp-'.$one_mkm_teplo_uzel['id']);?>')"  class='shine-button'>Добавить запись в таблицу</button>
																	<hr/>
															
															</div>
														</div>
											</div>											
											</div>
									
											<!--------------------Блок САР---------------------------->									
									
											<div class="uzel_sar" id='<?= 'uzel_sar-'.$one_mkm_teplo_uzel['id'];?>'>
											<div class="container-main">											
														<div class="accordion-container">
															<div  id = "<?= 'numrow_sar-'.$one_mkm_teplo_uzel['id'];?>" class="accordion-titulo-tab"  onclick='myTabs.showContentTable("<?= 'uzel_sar-'.$one_mkm_teplo_uzel['id'];?>")'><p>Системы автоматического регулирования (<span class='count_sar'></span> шт.)<span class="toggle-icon"></span></p></div>
															<div class="accordion-content">	
					
																	<div class="mobileTable">
																			<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="<?= 'obj_ot_personal_sar-'.$one_mkm_teplo_uzel['id'];?>">
																				<thead>
																					<tr>
																						<th class="t4">Марка / наименование</th>
																						<th class="t4">Назначение, отопление</th>
																						<th class="t4">Назначение, ГВС</th>
																						<th class="t4">Назначение, технологические нужды</th>
																						<th class="t4">Назначение, вентиляция</th>
																						<th class="t5">Операции</th>
																					</tr>
																				</thead>
																				<tbody>
																				<?php 
																		
																					foreach($obj_ot_personal_sars as $obj_ot_personal_sar){
																					
																						if($obj_ot_personal_sar['id_table'] == 'obj_ot_personal_sar-'.$one_mkm_teplo_uzel['id'] ){
																					
																						echo "<tr id_obj_ot_personal_sar='".$obj_ot_personal_sar['id']."'>";
																						echo "<td name='sar'>".$obj_ot_personal_sar['sar']."</td>";
																						echo "<td nazn_sar_ot='nazn_sar_ot'>".($obj_ot_personal_sar['nazn_sar_ot'] == 1 ? 'да' : 'нет')."</td>";
																						echo "<td nazn_sar_gvs='nazn_sar_gvs'>".($obj_ot_personal_sar['nazn_sar_gvs'] == 1 ? 'да' : 'нет')."</td>";
																						echo "<td nazn_sar_tn='nazn_sar_tn'>".($obj_ot_personal_sar['nazn_sar_tn'] == 1 ? 'да' : 'нет')."</td>";
																						echo "<td nazn_sar_vent='nazn_sar_vent'>".($obj_ot_personal_sar['nazn_sar_vent'] == 1 ? 'да' : 'нет')."</td>";
																						echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_ot_personal_sar\",".$obj_ot_personal_sar['id'].", ".'"obj_ot_personal_sar-'.$one_mkm_teplo_uzel['id']."\")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_personal_sar\",".$obj_ot_personal_sar['id'].", \"obj_ot_personal_sar-".$one_mkm_teplo_uzel['id']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																						}		
																					
																					};?>													
																				</tbody>
																			</table>
																			
																	</div>
																	<button  class="shine-button" onclick = "modalWindow.openModal('ModalObj_ot_personal_sar','<?php echo trim('obj_ot_personal_sar-'.$one_mkm_teplo_uzel['id']);?>')"  class='shine-button'>Добавить запись в таблицу</button>										

																	<hr/>
															
															</div>
														</div>
											</div>											
											</div>										
									
											<!--------------------Блок системы отопления---------------------------->
												<div class="uzel_so" id='<?= 'uzel_so-'.$one_mkm_teplo_uzel['id'];?>'>
												<div class="container-main">											
														<div class="accordion-container">
															<div><p id = "<?= 'numrow_t_so-'.$one_mkm_teplo_uzel['id'];?>" class="accordion-titulo-tab"  onclick='myTabs.showContentTable("<?= 'uzel_so-'.$one_mkm_teplo_uzel['id'];?>")'>Система отопления (<span class='so_form'></span> шт.), теплообменники (<span class='count_so'></span> шт.)<span class="toggle-icon"></span></p></div>
															<div class="accordion-content">														
																		<div class="form-group">
																			<div class="block w2-5">
																				<label for="formTitle" class='label_subject'>Тип:</label>
																			</div>
																			<select class="form-controls" name="t_systemheat_water" id="<?= 't_systemheat_water-'.$one_mkm_teplo_uzel['id'];?>" onchange="myTabs.updStr(<?= $one_mkm_teplo_uzel['id'];?>)">
																				<option value='0'>Выберите тип:</option>
																					<?php foreach($spr_ot_systemheat_waterCheck as $spr_ot_systemheat_water):?>
																						<option value="<?=$spr_ot_systemheat_water['id']?>"<?= ($spr_ot_systemheat_water['id'] == $one_mkm_teplo_uzel['id_systemheat_water'] ? 'selected="selected"' : '');?>><?=$spr_ot_systemheat_water['name']?></option>
																					<?php endforeach; ?>
																			</select>
																		</div>									
																		<div class="form-group">
																			<div class="block w2-5">
																				<label for="formTitle" class='label_subject'>Вид отопительных приборов:</label>
																			</div>
																			<select class="form-controls" name="t_systemheat_type_op" id="<?= 't_systemheat_type_op-'.$one_mkm_teplo_uzel['id'];?>" onchange="myTabs.updStr(<?= $one_mkm_teplo_uzel['id'];?>)">
																				<option value='0'>Выберите вид отопительного прибора:</option>
																					<?php foreach($spr_ot_type_ot_priborCheck as $spr_ot_type_ot_pribor):?>
																						<option value="<?=$spr_ot_type_ot_pribor['id']?>"<?= ($spr_ot_type_ot_pribor['id'] == $one_mkm_teplo_uzel['id_systemheat_type_op'] ? 'selected="selected"' : '');?>><?=$spr_ot_type_ot_pribor['name']?></option>
																					<?php endforeach; ?>
																			</select>
																		</div>										
																		<div class="form-group">
																			<div class="block w2-5">
																				<label for="formTitle" class='label_subject'>Схема присоединения:</label>
																			</div>
																			<select class="form-controls" name="t_systemheat_dependent" id="<?= 't_systemheat_dependent-'.$one_mkm_teplo_uzel['id'];?>"   onclick="object.teploobmennik_os_hide_show(this.value, '<?= 'uzel_so-'.$one_mkm_teplo_uzel['id'];?>')" onchange="myTabs.updStr(<?= $one_mkm_teplo_uzel['id'];?>)">
																				<option value='0'>Выберите схему присоединения:</option>
																					<?php foreach($spr_ot_systemheat_dependentCheck as $spr_ot_systemheat_dependent):?>
																						<option value="<?=$spr_ot_systemheat_dependent['id']?>"<?= ($spr_ot_systemheat_dependent['id'] == $one_mkm_teplo_uzel['id_systemheat_dependent'] ? 'selected="selected"' : '');?>><?=$spr_ot_systemheat_dependent['name']?></option>
																					<?php endforeach; ?>
																			</select>
																		</div>												
																	<br>
																	<div class="teploobmennik_so">
																			<p class="p_gaz">Теплообменники СО</p><br>
																			<div class="mobileTable">
																					<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="<?= 'obj_ot_teploobmennik_so-'.$one_mkm_teplo_uzel['id'];?>">
																						<thead>
																							<tr>
																								<th class="t4">Вид теплообменника</th>
																								<th class="t4">Марка / наименование</th>
																								<th class="t4">Год ввода в эксплуа- тацию</th>
																								<th class="t4">Срок службы</th>
																								<th class="t4">Продление эксплуатации</th>
																								<th class="t5">Операции</th>
																							</tr>
																						</thead>
																						<tbody>
																						<?php 
																							foreach($obj_ot_teploobmennik_sos as $obj_ot_teploobmennik_so){
																							
																								if($obj_ot_teploobmennik_so['id_table'] == 'obj_ot_teploobmennik_so-'.$one_mkm_teplo_uzel['id'] ){
																								echo "<tr id_obj_ot_teploobmennik_so='".$obj_ot_teploobmennik_so['id']."'>";
																								echo '<td so="'.$obj_ot_teploobmennik_so['teploobm'].'" >'.$obj_ot_teploobmennik_so['spr_ot_type_to_name'].'</td>';
																								echo "<td name='name'>".$obj_ot_teploobmennik_so['name']."</td>";
																								echo "<td name='year_begin'>".$obj_ot_teploobmennik_so['year_begin']."</td>";
																								echo "<td name='srok'>".$obj_ot_teploobmennik_so['srok']."</td>";
																								echo "<td name='next_srok'>".(strlen($obj_ot_teploobmennik_so['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_ot_teploobmennik_so['next_srok'])) : '')."</td>";
																								echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_ot_teploobmennik_so\",".$obj_ot_teploobmennik_so['id'].", ".'"obj_ot_teploobmennik_so-'.$one_mkm_teplo_uzel['id']."\")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_teploobmennik_so\",".$obj_ot_teploobmennik_so['id'].", \"obj_ot_teploobmennik_so-".$one_mkm_teplo_uzel['id']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																								}
																							};?>													
																						</tbody>
																					</table>
																					
																			</div>
																			<button  class="shine-button" onclick = "modalWindow.openModal('ModalObj_ot_teploobmennik_so','<?php echo trim('obj_ot_teploobmennik_so-'.$one_mkm_teplo_uzel['id']);?>')"  class='shine-button'>Добавить запись в таблицу</button>																			
																			
																	<hr/>
															
															</div>
														</div>
												</div>
												</div>												
											</div>		

											<!--------------------Блок горячее водоснабжение ---------------------------->
												<div class="uzel_gvs" id='<?= 'uzel_gvs-'.$one_mkm_teplo_uzel['id'];?>'>
												<div class="container-main">											
														<div class="accordion-container">
															<div><p id = "<?= 'numrow_t_gvs-'.$one_mkm_teplo_uzel['id'];?>" class="accordion-titulo-tab" onclick='myTabs.showContentTable("<?= 'uzel_gvs-'.$one_mkm_teplo_uzel['id'];?>")'>Горячее водоснабжение (<span class='gvs_form'></span> шт.), теплообменники (<span class='count_gvs'></span> шт.)<span class="toggle-icon"></span></p></div>
															<div class="accordion-content">														
													
													
																	<!--p class="p_gaz">Горячее водоснабжение</p-->
																	<div class="form-group">
																		<div class="block w2-5">
																			<label for="formTitle" class='label_subject'>Тип схемы:</label>
																		</div>
																		<select class="form-controls" name="t_gvs_open" id="<?= 't_gvs_open-'.$one_mkm_teplo_uzel['id'];?>"  onclick="object.teploobmennik_gvs_hide_show(this.value,'<?= 'uzel_gvs-'.$one_mkm_teplo_uzel['id'];?>')" onchange="myTabs.updStr(<?= $one_mkm_teplo_uzel['id'];?>)">
																			<option value='0'>Выберите тип схемы:</option>
																				<?php foreach($spr_ot_gvs_openCheck as $spr_ot_gvs_open):?>
																					<option value="<?=$spr_ot_gvs_open['id']?>"<?= ($spr_ot_gvs_open['id'] == $one_mkm_teplo_uzel['id_gvs_open'] ? 'selected="selected"' : '');?>><?=$spr_ot_gvs_open['name']?></option>
																				<?php endforeach; ?>
																		</select>
																	</div>											
											
																	<div class="teploobmennik_gvs">

																			<p class="p_gaz">Теплообменники ГВС</p><br>
																			<div class="mobileTable">
																					<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="<?= 'obj_ot_teploobmennik_gvs-'.$one_mkm_teplo_uzel['id'];?>">
																						<thead>
																							<tr>
																								<th class="t4">Вид теплообменника</th>
																								<th class="t4">Марка / наименование</th>
																								<th class="t4">Год ввода в эксплуа- тацию</th>
																								<th class="t4">Срок службы</th>
																								<th class="t4">Продление эксплуатации</th>
																								<th class="t5">Операции</th>
																							</tr>
																						</thead>
																						<tbody>
																						<?php 
																							foreach($obj_ot_teploobmennik_gvss as $obj_ot_teploobmennik_gvs){
																								if($obj_ot_teploobmennik_gvs['id_table'] == 'obj_ot_teploobmennik_gvs-'.$one_mkm_teplo_uzel['id'] ){
																								echo "<tr id_obj_ot_teploobmennik_gvs='".$obj_ot_teploobmennik_gvs['id']."'>";
																								echo '<td gvs="'.$obj_ot_teploobmennik_gvs['teploobm'].'" >'.$obj_ot_teploobmennik_gvs['spr_ot_type_to_name'].'</td>';
																								echo "<td name='name'>".$obj_ot_teploobmennik_gvs['name']."</td>";
																								echo "<td name='year_begin'>".$obj_ot_teploobmennik_gvs['year_begin']."</td>";
																								echo "<td name='srok'>".$obj_ot_teploobmennik_gvs['srok']."</td>";
																								echo "<td name='next_srok'>".(strlen($obj_ot_teploobmennik_gvs['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_ot_teploobmennik_gvs['next_srok'])) : '')."</td>";
																								echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_ot_teploobmennik_gvs\",".$obj_ot_teploobmennik_gvs['id'].", ".'"obj_ot_teploobmennik_gvs-'.$one_mkm_teplo_uzel['id']."\")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_teploobmennik_gvs\",".$obj_ot_teploobmennik_gvs['id'].", \"obj_ot_teploobmennik_gvs-".$one_mkm_teplo_uzel['id']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																								}
																							};?>													
																						</tbody>
																					</table>
																					
																			</div>
																			<button  class="shine-button" onclick = "modalWindow.openModal('ModalObj_ot_teploobmennik_gvs','<?php echo trim('obj_ot_teploobmennik_gvs-'.$one_mkm_teplo_uzel['id']);?>')"  class='shine-button'>Добавить запись в таблицу</button>
																			<hr/>												
																	</div>
																
															
															</div>
														</div>
												</div>
												</div>
											
												<!--------------------Блок системы приточной вентиляции и воздушного отопления---------------------------->	
											<div class="uzel_system" id='<?= 'uzel_system-'.$one_mkm_teplo_uzel['id'];?>'>
											<div class="container-main">											
														<div class="accordion-container">
															<div><p id = "<?= 'numrow_t_system-'.$one_mkm_teplo_uzel['id'];?>" class="accordion-titulo-tab"  onclick='myTabs.showContentTable("<?= 'uzel_system-'.$one_mkm_teplo_uzel['id'];?>")'>Системы приточной вентиляции и воздушного отопления (<span class='count_system'></span> шт.)<span class="toggle-icon"></span></p></div>
															<div class="accordion-content">	

																	<div class="mobileTable">
																			<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="<?= 'obj_ot_prit_vent-'.$one_mkm_teplo_uzel['id'];?>">
																				<thead>
																					<tr>
																						<th class="t4">Марка / наименование калорифера</th>
																						<th class="t4">Год ввода в эксплуа- тацию</th>
																						<th class="t4">Срок службы</th>
																						<th class="t4">Продление эксплуатации</th>
																						<th class="t5">Операции</th>
																					</tr>
																				</thead>
																				<tbody>
																				<?php 
																		
																					foreach($obj_ot_prit_vents as $obj_ot_prit_vent){
																						if($obj_ot_prit_vent['id_table'] == 'obj_ot_prit_vent-'.$one_mkm_teplo_uzel['id'] ){
																						echo "<tr id_obj_ot_prit_vent='".$obj_ot_prit_vent['id']."'>";
																						echo "<td name='name'>".$obj_ot_prit_vent['name']."</td>";
																						echo "<td name='year_begin'>".$obj_ot_prit_vent['year_begin']."</td>";
																						echo "<td name='srok'>".$obj_ot_prit_vent['srok']."</td>";
																						echo "<td name='next_srok'>".(strlen($obj_ot_prit_vent['next_srok']) > 0 ? date('d.m.Y',strtotime($obj_ot_prit_vent['next_srok'])) : '')."</td>";
																						echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_ot_prit_vent\",".$obj_ot_prit_vent['id'].", ".'"obj_ot_prit_vent-'.$one_mkm_teplo_uzel['id']."\")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_prit_vent\",".$obj_ot_prit_vent['id'].", \"obj_ot_prit_vent-".$one_mkm_teplo_uzel['id']."\")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
																						}
																					};?>													
																				</tbody>
																			</table>
																			
																	</div>
																	<button class="shine-button" onclick = "modalWindow.openModal('ModalObj_ot_prit_vent','<?php echo trim('obj_ot_prit_vent-'.$one_mkm_teplo_uzel['id']);?>')"  class='shine-button'>Добавить запись в таблицу</button>									
																<hr/>
															
															</div>
														</div>
											</div>											
											</div>



												
									</div>
									<?php	
									}
									?>
									
									<!----------------------------------------------------------------------------------------------------------------------------->
									<!--------------------------------------------- Шаблон вкладки----------------------------------------------------------------->
									<!----------------------------------------------------------------------------------------------------------------------------->
									
									<div id="content-1" class="uzel_content">
									
									<!--button class="shine-button float-right shine-button-del" onclick="myTabs.delTab()">Удалить вкладку</button-->
									<div class='btn_panel'>
										<div class='tooltip'>
											<button class="button-remove float-right shine-button-del" onclick="myTabs.delTab()">
												<i class='icon-trash icons'></i>
												<span class = 'tooltiptext'>Удалить узел (вкладку)</span>
											</button>
										</div>
									</div>
									
											<!--p class="t_uzel">Информация отсутствует</p-->
											<!-------------------------------------------------Выбор раздела объекта тепловой энергии------------------------------------------------------------------------------->
											<div class="uzel_razdel">	
												<div class="form-group">
													<div class="block w3">
														<label for="formTitle" class='label_subject'>Узел объекта тепловой энергии:</label>
													</div>	
														<select class="form-controls" name="t_spr_uzel_block" id="t_spr_uzel_block"  onclick="" onchange="">
															<option value='0'>Выберите тип узла</option>

																<?php foreach($spr_ot_uzel_blockCheck as $spr_ot_uzel_block):?>
																	<option value="<?=$spr_ot_uzel_block['id']?>"><?=$spr_ot_uzel_block['name']?></option>
																<?php endforeach; ?>
														</select>
												</div>
											</div>	
											<!-------------------------------------------------Блок наименования и прочей информации------------------------------------------------------------------------------->
											<div class="uzel_name">
												<div class="form-group">
													<div class="block w3">
														<label for = 'name_uzel' class="label_subject">Информация об узле:</label>
													</div>	
													<textarea name = 'name_uzel' id = 'name_uzel' class='form-controls' cols="50" rows="1" placeholder="Наименование и прочее" onchange=""></textarea>
												</div>
											</div>	
											<!-------------------------------------------------Блок ПУ------------------------------------------------------------------------------->
											
											<div class="uzel_pu" id=''>
											<div class="container-main">											
														<div class="accordion-container">
															<div id = "numrow_pu" class="accordion-titulo-tab" onclick='myTabs.showContentTable()'><p>Приборы учета (<span class='count_pu'>0</span> шт.)<span class="toggle-icon"></span>
															</p></div>
															<div class="accordion-content">	

																	<div class="mobileTable">
																			<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_personal_tp">
																				<thead>
																					<tr>
																						<th class="t4">Марка / наименование</th>
																						<th class="t4">Назначение, отопление</th>
																						<th class="t4">Назначение, ГВС</th>
																						<th class="t4">Назначение, технологические нужды</th>
																						<th class="t4">Назначение, вентиляция</th>

																						<th class="t5">Операции</th>
																					</tr>
																				</thead>
																				<tbody>													
																				</tbody>
																			</table>
																			
																	</div>
																	<button class="btn_pu" onclick = ""  class='shine-button'>Добавить запись в таблицу</button>
																	<hr/>
															
															</div>
														</div>
											</div>											
											</div>
											
											<!-------------------------------------------------Блок САР------------------------------------------------------------------------------->											
											<div class="uzel_sar" id=''>
											<div class="container-main">											
														<div class="accordion-container">
															<div  id = "numrow_sar" class="accordion-titulo-tab"><p>Системы автоматического регулирования (<span class='count_sar'>0</span> шт.)<span class="toggle-icon"></span></p></div>
															<div class="accordion-content">	
					
																	<div class="mobileTable">
																			<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_personal_sar">
																				<thead>
																					<tr>
																						<th class="t4">Марка / наименование</th>
																						<th class="t4">Назначение, отопление</th>
																						<th class="t4">Назначение, ГВС</th>
																						<th class="t4">Назначение, технологические нужды</th>
																						<th class="t4">Назначение, вентиляция</th>
																						<th class="t5">Операции</th>
																					</tr>
																				</thead>
																				<tbody>													
																				</tbody>
																			</table>
																			
																	</div>
																	<button  class="btn_sar" onclick = ""  class='shine-button'>Добавить запись в таблицу</button>										

																	<hr/>
															
															</div>
														</div>
											</div>											
											</div>	
											
											<!-------------------------------------------------Блок Системы отопления------------------------------------------------------------------------------->							
											<div class="uzel_so" id=''>
												<div class="container-main">											
														<div class="accordion-container">
															<div><p id = "numrow_t_so" class="accordion-titulo-tab">Система отопления (<span class='so_form'>0</span> шт.), теплообменники (<span class='count_so'>0</span> шт.)<span class="toggle-icon"></span></p></div>
															<div class="accordion-content">														
																		<div class="form-group">
																			<label for="formTitle" class='label_subject'>Тип:</label>
																			<select class="form-controls" name="t_systemheat_water" id="t_systemheat_water" onchange="">
																				<option value='0'>Выберите тип:</option>
																					<?php foreach($spr_ot_systemheat_waterCheck as $spr_ot_systemheat_water):?>
																						<option value="<?=$spr_ot_systemheat_water['id']?>"><?=$spr_ot_systemheat_water['name']?></option>
																					<?php endforeach; ?>
																			</select>
																		</div>									
																		<div class="form-group">
																			<label for="formTitle" class='label_subject'>Вид отопительных приборов:</label>
																			<select class="form-controls" name="t_systemheat_type_op" id="t_systemheat_type_op" onchange="">
																				<option value='0'>Выберите вид отопительного прибора:</option>
																					<?php foreach($spr_ot_type_ot_priborCheck as $spr_ot_type_ot_pribor):?>
																						<option value="<?=$spr_ot_type_ot_pribor['id']?>"><?=$spr_ot_type_ot_pribor['name']?></option>
																					<?php endforeach; ?>
																			</select>
																		</div>										
																		<div class="form-group">
																			<label for="formTitle" class='label_subject'>Схема присоединения:</label>
																			<select class="form-controls" name="t_systemheat_dependent" id="t_systemheat_dependent"   onclick="object.teploobmennik_os_hide_show(this.value)" onchange="">
																				<option value='0'>Выберите схему присоединения:</option>
																					<?php foreach($spr_ot_systemheat_dependentCheck as $spr_ot_systemheat_dependent):?>
																						<option value="<?=$spr_ot_systemheat_dependent['id']?>"><?=$spr_ot_systemheat_dependent['name']?></option>
																					<?php endforeach; ?>
																			</select>
																		</div>												
																	<br>
																	<div class="teploobmennik_so">
																			<p class="p_gaz">Теплообменники СО</p><br>
																			<div class="mobileTable">
																					<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_teploobmennik_so">
																						<thead>
																							<tr>
																								<th class="t4">Вид теплообменника</th>
																								<th class="t4">Марка / наименование</th>
																								<th class="t4">Год ввода в эксплуа- тацию</th>
																								<th class="t4">Срок службы</th>
																								<th class="t4">Продление эксплуатации</th>
																								<th class="t5">Операции</th>
																							</tr>
																						</thead>
																						<tbody>												
																						</tbody>
																					</table>
																					
																			</div>
																			<button  class="btn_so" onclick = ""  class='shine-button'>Добавить запись в таблицу</button>																			
																			
																	<hr/>
															
															</div>
														</div>
												</div>
												</div>												
											</div>												
											<!-------------------------------------------------Блок горячее водоснабжение----------------------------------------------->											
											<div class="uzel_gvs" id=''>
												<div class="container-main">											
														<div class="accordion-container">
															<div><p id = "numrow_t_gvs" class="accordion-titulo-tab">Горячее водоснабжение (<span class='gvs_form'>0</span> шт.), теплообменники (<span class='count_gvs'>0</span> шт.)<span class="toggle-icon"></span></p></div>
															<div class="accordion-content">														
													
													
																	<!--p class="p_gaz">Горячее водоснабжение</p-->
																	<div class="form-group">
																		<label for="formTitle" class='label_subject'>Тип схемы:</label>
																		<select class="form-controls" name="t_gvs_open" id="t_gvs_open"  onclick="object.teploobmennik_gvs_hide_show(this.value)" onchange="">
																			<option value='0'>Выберите тип схемы:</option>
																				<?php foreach($spr_ot_gvs_openCheck as $spr_ot_gvs_open):?>
																					<option value="<?=$spr_ot_gvs_open['id']?>"<?= ($spr_ot_gvs_open['id'] == $objects['t_id_gvs_open'] ? 'selected="selected"' : '');?>><?=$spr_ot_gvs_open['name']?></option>
																				<?php endforeach; ?>
																		</select>
																	</div>											
											
																	<div class="teploobmennik_gvs">

																			<p class="p_gaz">Теплообменники ГВС</p><br>
																			<div class="mobileTable">
																					<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_teploobmennik_gvs">
																						<thead>
																							<tr>
																								<th class="t4">Вид теплообменника</th>
																								<th class="t4">Марка / наименование</th>
																								<th class="t4">Год ввода в эксплуа- тацию</th>
																								<th class="t4">Срок службы</th>
																								<th class="t4">Продление эксплуатации</th>
																								<th class="t5">Операции</th>
																							</tr>
																						</thead>
																						<tbody>													
																						</tbody>
																					</table>
																					
																			</div>
																			<button  class="btn_gvs" onclick = ""  class='shine-button'>Добавить запись в таблицу</button>
																			<hr/>												
																	</div>
																
															
															</div>
														</div>
												</div>
												</div>											

												<!-------------------------------------------------Блок системы приточной вентиляции и воздушного отопления----------------------------------------------->												
											<div class="uzel_system" id=''>
											<div class="container-main">											
														<div class="accordion-container">
															<div><p id = "numrow_t_system" class="accordion-titulo-tab">Системы приточной вентиляции и воздушного отопления (<span class='count_system'>0</span> шт.)<span class="toggle-icon"></span></p></div>
															<div class="accordion-content">	

																	<div class="mobileTable">
																			<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_prit_vent">
																				<thead>
																					<tr>
																						<th class="t4">Марка / наименование калорифера</th>
																						<th class="t4">Год ввода в эксплуа- тацию</th>
																						<th class="t4">Срок службы</th>
																						<th class="t4">Продление эксплуатации</th>
																						<th class="t5">Операции</th>
																					</tr>
																				</thead>
																				<tbody>
																				</tbody>
																			</table>
																			
																	</div>
																	<button class="btn_system" onclick = ""  class='shine-button'>Добавить запись в таблицу</button>									
																<hr/>
															
															</div>
														</div>
											</div>											
											</div>											
											

									</div>
                                </div>
				</fieldset>	
				
<!------------------------------------------------------     Нагрузки  -------------------------------------------------------------------------->	
							<hr/>	
								<p class="p_gaz">Нагрузки</p>
									<div class="form-group">
										<div class="block w5">
											<label class='label_subject'>Общая нагрузка, Гкал/ч: </label>
										</div>
										<p class='label_enter' id="sum_workload"></p>
									</div>
									
									<!--div class="form-group">
										<label for = 't_workload_heating' class='label_subject'>Нагрузка на отопление, Гкал/ч:</label>
										<input type='number' name = 't_workload_heating' id = 't_workload_heating' class='form-controls' value="<?= ($objects['t_workload_heating']>0 ? $objects['t_workload_heating'] : '') ?>">
									</div-->

									<div class="form-group">
										<div class="block w5">
											<label for = 't_workload_heating' class='label_subject'>Нагрузка на отопление, Гкал/ч:</label>
										</div>
										<input type='number' name = 't_workload_heating' id = 't_workload_heating' class='form-controls' value="<?= ($objects['t_workload_heating']>0 ? $objects['t_workload_heating'] : '') ?>" min='0'>
									</div>
									
									
									<div class="form-group">
										<div class="block w5">
											<label for = 't_workload_gvs' class='label_subject'>Нагрузка на ГВС, Гкал/ч:</label>
										</div>
										<input type='number' name = 't_workload_gvs' id = 't_workload_gvs' class='form-controls' value="<?= ($objects['t_workload_gvs']>0 ? $objects['t_workload_gvs'] : '') ?>" min='0'>
									</div>									
									<div class="form-group">
										<div class="block w5">
											<label for = 't_workload_pov' class='label_subject'>Нагрузка на приточно-отопительную вентиляцию, Гкал/ч:</label>
										</div>
										<input type='number' name = 't_workload_pov' id = 't_workload_pov' class='form-controls' value="<?= ($objects['t_workload_pov']>0 ? $objects['t_workload_pov'] : '') ?>" min='0'>
									</div>									
									<div class="form-group">
										<div class="block w5">
											<label for = 't_workload_tech' class='label_subject'>Технологическая нагрузка, Гкал/ч:</label>
										</div>
										<input type='number' name = 't_workload_tech' id = 't_workload_tech' class='form-controls' value="<?= ($objects['t_workload_tech']>0 ? $objects['t_workload_tech'] : '') ?>" min='0'>
									</div>																		
									<div class="form-group">
										<div class="block w5">
											<label for = 't_workload_vapor' class='label_subject'>В паре, т/ч:</label>
										</div>
										<input type='number' name = 't_workload_vapor' id = 't_workload_vapor' class='form-controls' value="<?= $objects['t_workload_vapor'] ?>" min='0'>
									</div>										
									<div class="form-group">
										<div class="block w5">
											<label for = 't_workload_percent' class='label_subject'>Процент возврата конденсата, %:</label>
										</div>
										<input type='number' name = 't_workload_percent' id = 't_workload_percent' class='form-controls' value="<?= $objects['t_workload_percent'] ?>" min='0'>
									</div>
								<hr/>

									
<!------------------------------------------------------     Броня  -------------------------------------------------------------------------->										
								<p class="p_gaz">Аварийная и технологическая броня теплоснабжения</p>									
									<div class="form-group">
										<div class="checkbox">
												<?php 
													if($objects['t_armor'] == 1){
														echo "<input type='checkbox' name = 'is_bron' id= 'is_bron' class='custom-checkbox' checked='checked' value='1' onclick='object.is_bron()'>";	
													}else{
														echo "<input type='checkbox' name = 'is_bron' id= 'is_bron' class='custom-checkbox'  value='0' onclick='object.is_bron()'>";
													}
												?>											
												<label for = 'is_bron' class='label_subject'>Наличие брони</label>
										</div>
									</div>
									
									<div id="is_armor">
											<div class="form-group">
												<div class="block w10">
													<label class='label_object'>Для перевода единиц измерения воспользуйтесь конвертером!</label>
												</div>	
											</div>	
											<div class="form-group">
												<div class="block w4">
													<label class='label_object'>Нагрузка аварийной брони:</label>
												</div>
												<div class="block w3">
													<label for = 't_armor_crach' class='label_object'>Гкал/ч:</label>
													<input type='number' name = 't_armor_crach' id = 't_armor_crach' class='form-controls' value="<?= $objects['t_armor_crach'] ?>" min='0'>
												</div>
												<div class="block w3">
													<label for = 't_armor_crach_vapor' class='label_object'>т/ч:</label>	
													<input type='number' name = 't_armor_crach_vapor' id = 't_armor_crach_vapor' class='form-controls' value="<?= $objects['t_armor_crach_vapor'] ?>" min='0'>
												</div>
											</div>	
											<div class="form-group">
												<div class="block w4">
													<label class='label_object'>Нагрузка технологической брони:</label>
												</div>
												<div class="block w3">
													<label for = 't_armor_tech ' class='label_object'>Гкал/ч:</label>
													<input type='number' name = 't_armor_tech' id = 't_armor_tech' class='form-controls' value="<?= $objects['t_armor_tech'] ?>" min='0'>
												</div>
												<div class="block w3">
													<label for = 't_armor_tech_vapor ' class='label_object'>т/ч:</label>
													<input type='number' name = 't_armor_tech_vapor' id = 't_armor_tech_vapor' class='form-controls' value="<?= $objects['t_armor_tech_vapor'] ?>" min='0'>
												</div>
											</div>
										
											<div class="form-group">
												<div class="block w5">
													<label for = 't_armor_time ' class='label_object'>Время завершения технологического процесса, ч.:</label>
												</div>
												<input type='number' name = 't_armor_time' id = 't_armor_time' class='form-controls' value="<?= $objects['t_armor_time'] ?>" min='0'>
											</div>
											<div class="form-group">
												<div class="block w5">
													<label for = 't_armor_date' class='label_subject'>Дата составления акта:</label>
												</div>
												<input type='date' name = 't_armor_date' id = 't_armor_date' class='form-controls' value="<?= $objects['t_armor_date'] ?>">
											</div>

									</div>
									<hr/>								
<!------------------------------------------------------------------------------------------------------------->									
								<fieldset class = "fieldset_potr">
									<legend class="legend_potr"><span><i class="icon-tag"></i></span>&nbsp Особые отметки объекта тепловой энергии</legend>
									<div class="form-group">
										<input type='checkbox' name='inactive_t' id='inactive_t'  class='custom-checkbox' <?php echo ($objects['inactive_t'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
										<label for='inactive_t'  class='label_subject'>отметить как недействующий</label>
									</div>								
									<div class="form-group">
										<input type='checkbox' name='del_t' id='del_t'  class='custom-checkbox' <?php echo ($objects['del_t'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
										<label for='del_t'  class='label_subject'>отметить для удаления</label>
									</div>
								</fieldset>
								
								</div>						
							</section> 
<!------------------------------------------------------     ВКЛАДКА ТИ  -------------------------------------------------------------------------->									
							<section id="content-tab4">
									<p class="p_gaz">Информация по теплоисточнику</p>
									<hr/>
									<div class="form-group">
										<div class="checkbox">
												<?php 
													if($objects['ti_is'] == 1){
														echo "<input type='checkbox' name = 'ti_is' id= 'ti_is' class='custom-checkbox' checked='checked' value='1' onclick='object.is_teplo_source()'  disabled>";	
													}else{
														echo "<input type='checkbox' name = 'ti_is' id= 'ti_is' class='custom-checkbox'  value='0' onclick='object.is_teplo_source()'>";
													}
												?>											
												<label for = 'ti_is' class='label_subject'>Теплоисточник</label>
										</div>
									</div>
									
									
									<div id = "ti_section">
									
										
											<div class="form-group">
												<div class="block w4">
													<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Закрепленный инспектор:</label>
												</div>
													<?php // Выводим ФИО закрепленного инспектора в случае если информацию просматривают из другого отдела
												/*if(!empty($userTI)){
													
													if($spr_cod_otd <> $userTI['spr_cod_otd']){?>
														
														<p><?php echo $userTI['fio'];?></p>
													
												<?php }
												
												}else{*/?>
												
												
												<select class="form-controls" name="Insp_ti" id="Insp_ti" <?php echo ($access_level == 2 ? '' : 'disabled')?> >
													
														
													
														<?php 
													
														if(empty($userTI)){
															
															echo "<option value='0'>Выберите инспектора</option>";
														foreach($usersTeplo as $user):?>
															<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['ti_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
														<?php endforeach; 
														}else{
															if($spr_cod_otd <> $userTI['spr_cod_otd']){
														
															echo "<option value=".$userTI['id']." selected=\"selected\">".$userTI['fio']."</option>";
															
															}else{
																foreach($usersTeplo as $user):
															echo "<option value=".$user['id']." ". ($user['id'] == $objects['ti_insp'] ? 'selected="selected"' : '').">".$user['fio']."</option>";
															
														endforeach;
															}
														 } ?>
														
														
												</select>
									
											</div>
								


										<!--div class="form-group">
											<div class="block w4">	
												<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Закрепленный инспектор:</label>
											</div>
									
											
											<select class="form-controls" name="e_insp" id="e_insp" <?php echo ($access_level == 2 ? '' : disabled)?>>
												<option value='0'>Выберите инспектора</option>
													<?php foreach($usersElectro as $user):?>
														<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['e_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
													<?php endforeach; ?>
											</select>
											
											
										</div-->	






										
									
									<div class="form-group">
										<div class="block w4">
											<label for = 'ti_name' class='label_object'><span class = "formTextRed">*</span>Наименование теплоисточника:</label>
										</div>	
										<textarea name = 'ti_name' id = 'ti_name' class='form-controls' cols="50" rows="1" placeholder="Наименование"><?= $objects['ti_name'] ?></textarea>
									</div>
									<hr/>
									
<!------------------------------------------------------- Инфо --------------------------------------------->									
									<div class="form-group">
										<div class="block w4">
											<label class='label_subject'>Теплоисточник учавствует в ОЗП: </label>
										</div>
										<div class="checkbox">
											<?php 
												if($objects['ti_reestr'] == 1){
													echo "<input type='checkbox' name = 'ti_reestr' id= 'ti_reestr' class='custom-checkbox' checked='checked' value='1' onclick='object.ti_reestr()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_reestr' id= 'ti_reestr' class='custom-checkbox'  value='0' onclick='object.ti_reestr()'>";
												}
											?>											
											<label for = 'ti_reestr' class='label_subject'>включить в график</label>
										</div>
									</div>

									<div class="form-group">
										<div class="block w4">
											<label for = 'ti_year' class='label_subject'>Год ввода в эксплуатацию:</label>
										</div>	
										<input type='number' name = 'ti_year' id = 'ti_year' class='form-controls'  step="any" min='1950' max='2100'  value="<?= ($objects['ti_year']>0 ? $objects['ti_year'] : "") ?>">
									</div>
									
									<div class="form-group">
										<div class="block w4">
											<label for="formTitle" class='label_subject'>Назначение котельной:</label>
										</div>	
										<select class="form-controls" name="oti_boiler" id="oti_boiler">
											<option value='0'>Выберите назначение котельной:</option>
												<?php foreach($spr_oti_boiler_typeCheck as $spr_oti_boiler_type):?>
													<option value="<?=$spr_oti_boiler_type['id']?>"<?= ($spr_oti_boiler_type['id'] == $objects['ti_id_spr_ot_boiler_type'] ? 'selected="selected"' : '');?>><?=$spr_oti_boiler_type['name']?></option>
												<?php endforeach; ?>
										</select>
									</div>
									
									<!--div class="form-group">
										<label for = 'ti_power' class='label_subject'>Установленная мощность котельной, кВт:</label>
											<input type='text' name = 'ti_power' id = 'ti_power' class='form-controls' value="<?//= ($objects['ti_power']>0 ? $objects['ti_power'] : '') ?>" disabled>
									</div-->
									<div class="form-group">
										<div class="block w4">
											<label class='label_subject'>Установленная мощность котельной, кВт: </label>
										</div>
										<p class='label_enter' id="ti_power" name = 'ti_power'></p>
										<div class="block w4">
											<label for = 'ti_dop_power' class='label_subject'>, в том числе дополнительные мощности, кВт:</label>
										</div>	
										<input type='number' name = 'ti_dop_power' id = 'ti_dop_power' class='form-controls' step="0.1"  min='0' value="<?= ($objects['ti_dop_power']>0 ? $objects['ti_dop_power'] : "") ?>">
									</div>
									<div class="form-group">
										<label class='font-size-11'>* установленная мощность рассчитывается автоматически как сумма мощностей водогрейных и паровых котлов плюс дополнительная мощность.</label>					
									</div>									
										<div class="form-group">
											<input type='hidden' id ="sum_power_kot_water" class='form-controls' value="">
										</div>	
										<div class="form-group">
											<input type='hidden' id ="sum_power_kot_vapor"  class='form-controls' value="">
										</div>	
							
									
									

									
<!------------------------------------------------------- Водогрейные котлы --------------------------------------------->									
									<div id="container-main">											
											
										<div class="accordion-container">
											<!--a href="#" class="accordion-titulo"><div><p id = "numrow_water">Водогрейные котлы (<?//= (count($obj_oti_boiler_waters)>0 ? count($obj_oti_boiler_waters) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a!-->
											<a href="#" class="accordion-titulo"><div><p id = "numrow_water">Водогрейные котлы (<?= (($obj_oti_boiler_waters_sum_kotl[0]['sum_kot_water'])>0 ? $obj_oti_boiler_waters_sum_kotl[0]['sum_kot_water'] : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
											<div class="accordion-content">										
														<div class="mobileTable">
															<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="boiler_water">
																<thead>
																	<tr>
																		<th class="t2">Наименование /марка</th>
																		<th class="t4">Год ввода в эксплуа- тацию</th>
																		<th class="t4">Кол-во, шт.</th>
																		<th class="t4">Основное топливо</th>
																		<th class="t4">Резервное топливо</th>
																		<th class="t4">Мощность, кВт</th>
																		<th class="t5">Операции</th>
																	</tr>
																</thead>
																<tbody>					
																	<?php 
																	foreach($obj_oti_boiler_waters as $oti_boiler_water){
																		echo '<tr id_boiler_water="'.$oti_boiler_water['id'].'">';
																		echo '<td name="type">'.$oti_boiler_water['type'].'</td>';
																		echo '<td name="year">'.$oti_boiler_water['year'].'</td>';
																		echo '<td name="counts">'.$oti_boiler_water['counts'].'</td>';
																		echo '<td type_osn_fuel="'.$oti_boiler_water['type_osn_fuel'].'" >'.$oti_boiler_water['name_osn_fuel'].'</td>';
																		echo '<td type_rezerv_fuel="'.$oti_boiler_water['type_rezerv_fuel'].'" >'.$oti_boiler_water['name_rezerv_fuel'].'</td>';
																		echo '<td name="power">'.$oti_boiler_water['power'].'</td>';
																		echo '<td><div class="menu-item-event"><div><button class="button-edit"  onclick = "modalWindow.openModalEdit(\'ModalBoiler_water\','.$oti_boiler_water['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'boiler_water\','.$oti_boiler_water['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
																	};?>
																	

																</tbody>
															</table>	
														</div>
													<div>
															<button onclick = "modalWindow.openModal('ModalBoiler_water')"  class='shine-button'>Добавить запись в таблицу</button>
													</div>	
													<hr/>
											</div>		
										</div>
<!------------------------------------------------------- Паровые котлы --------------------------------------------->										
										<div class="accordion-container">

											<!--a href="#" class="accordion-titulo"><div><p id = "numrow_vapor">Паровые котлы (<?= (count($obj_oti_boiler_vapors)>0 ? count($obj_oti_boiler_vapors) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a-->
											<a href="#" class="accordion-titulo"><div><p id = "numrow_vapor">Паровые котлы (<?= (($obj_oti_boiler_vapor_sum_kotl[0]['sum_kot_water'])>0 ? $obj_oti_boiler_vapor_sum_kotl[0]['sum_kot_water'] : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>											
											<div class="accordion-content">										
												<div class="mobileTable">
														<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="boiler_vapor">
															<thead>
																<tr>
																	<th class="t2">Наименование /марка</th>
																	<th class="t4">Год ввода в эксплуа- тацию</th>
																	<th class="t4">Кол-во, шт.</th>
																	<th class="t4">Основное топливо</th>
																	<th class="t4">Резервное топливо</th>
																	<th class="t4">Производи- тельность, т/ч</th>
																	<th class="t4">Мощность, кВт</th>
																	<th class="t5">Операции</th>
																</tr>
															</thead>
															<tbody>			
																<?php 
																
																foreach($obj_oti_boiler_vapors as $oti_boiler_vapor){
																	echo '<tr id_boiler_vapor="'.$oti_boiler_vapor['id'].'">';
																	echo '<td name="type">'.$oti_boiler_vapor['type'].'</td>';
																	echo '<td name="year">'.$oti_boiler_vapor['year'].'</td>';
																	echo '<td name="counts">'.$oti_boiler_vapor['counts'].'</td>';
																	echo '<td vapor_type_osn_fuel="'.$oti_boiler_vapor['vapor_type_osn_fuel'].'" >'.$oti_boiler_vapor['name_osn_fuel'].'</td>';
																	echo '<td vapor_type_rezerv_fuel="'.$oti_boiler_vapor['vapor_type_rezerv_fuel'].'" >'.$oti_boiler_vapor['name_rezerv_fuel'].'</td>';
																	echo '<td name="perfomance">'.$oti_boiler_vapor['perfomance'].'</td>';
																	echo '<td name="power">'.$oti_boiler_vapor['power'].'</td>';
																	echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalBoiler_vapor\','.$oti_boiler_vapor['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'boiler_vapor\','.$oti_boiler_vapor['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
																};?>
																

															</tbody>
														</table>	
													</div>
													<div>
														<button onclick = "modalWindow.openModal('ModalBoiler_vapor')" class='shine-button'>Добавить запись в таблицу</button>
													</div>
											</div>		
										</div>											
									</div>
									
									
<!------------------------------------------------------- Тепловые сети ТИ--------------------------------------------->										
									
								<div id="container-main">											
											
										<div class="accordion-container">
									
											<a href="#" class="accordion-titulo"><div><p id = "numrow_heatnet">Тепловые сети на балансе теплоисточника (<?= (count($obj_ot_heatnets)>0 ? count($obj_ot_heatnets) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
											<div class="accordion-content">	
	
												<div class="mobileTable">
													<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_heatnet">
														<thead>
															<tr>
																<th class="t3">Точка подключения</th>
																<th class="t3">Конечная точка</th>
																<th class="t3">Год ввода в эксплуа- тацию</th>
																<th class="t3">Длина участка, м.</th>
																<th class="t3">Условный диаметр, мм.</th>
																<th class="t3">Кол-во труб, шт.</th>
																<th class="t3">Техническое исполнение</th>
																<th class="t3">Тип трубы</th>
																<th class="t3">Вид изоляции</th>
																<th class="t3">Примечание</th>
																<th class="t5">Операции</th>
															</tr>
														</thead>
														<tbody>
															<?php 																										
															foreach($obj_ot_heatnets as $one_obj_ot_heatnet){
																
																echo '<tr id_obj_ot_heatnet="'.$one_obj_ot_heatnet['id'].'">';
																echo '<td name="conect_point">'.$one_obj_ot_heatnet['conect_point'].'</td>';
																echo '<td name="end_point">'.$one_obj_ot_heatnet['end_point'].'</td>';
																echo '<td name="year">'.$one_obj_ot_heatnet['year'].'</td>';
																echo '<td name="length">'.$one_obj_ot_heatnet['length'].'</td>';
																echo '<td heatnet_diameter="'.$one_obj_ot_heatnet['diameter'].'" >'.$one_obj_ot_heatnet['diameter_name'].'</td>';
																echo '<td name="count_tube">'.$one_obj_ot_heatnet['count_tube'].'</td>';
																echo '<td heatnet_underground="'.$one_obj_ot_heatnet['underground'].'" >'.$one_obj_ot_heatnet['name_underground'].'</td>';
																echo '<td type_isolation="'.$one_obj_ot_heatnet['isolation'].'">'.$one_obj_ot_heatnet['name_iso'].'</td>';
																echo '<td heatnet_type_isolation="'.$one_obj_ot_heatnet['type_isolation'].'">'.($one_obj_ot_heatnet['type_isolation'] == 0 ? '' : $one_obj_ot_heatnet['name_izol']).'</td>';
																echo '<td name="prim">'.$one_obj_ot_heatnet['prim'].'</td>';														
																echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalObj_ot_heatnet\','.$one_obj_ot_heatnet['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'obj_ot_heatnet\','.$one_obj_ot_heatnet['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
															};?>
															

														</tbody>
													</table>	
												</div>
												<div>
													<button onclick = "modalWindow.openModal('ModalObj_ot_heatnet')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												</div>
											</div>
										</div>
										
										
										
<!-------------------------------------------------Теплообменники котельной----------------------------------------------->											
										<div id="container-main">											
											
										<div class="accordion-container">
									
											<a href="#" class="accordion-titulo"><div><p id = "numrow_tepl_kot">Теплообменники котельной (<?= (count($obj_ot_tepl_kots)>0 ? count($obj_ot_tepl_kots) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
											<div class="accordion-content">	
	
												<div class="mobileTable">
													<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_tepl_kot">
														<thead>
															<tr>
																<th class="t3">Вид теплообменника</th>
																<th class="t3">Марка/наименование</th>
																<th class="t3">Год ввода в эксплуа- тацию</th>
																<th class="t3">Срок службы</th>
																<th class="t3">Продление эксплуатации</th>
																<th class="t5">Операции</th>
															</tr>
														</thead>
														<tbody>
															<?php 																										
															foreach($obj_ot_tepl_kots as $one_obj_ot_tepl_kot){
																
																echo '<tr id_obj_ot_tepl_kot="'.$one_obj_ot_tepl_kot['id'].'">';
																echo '<td tepl_kot="'.$one_obj_ot_tepl_kot['teploobm'].'" >'.$one_obj_ot_tepl_kot['spr_ot_type_to_name'].'</td>';
																echo "<td name='name'>".$one_obj_ot_tepl_kot['name']."</td>";
																echo "<td name='year_begin'>".$one_obj_ot_tepl_kot['year_begin']."</td>";
																echo "<td name='srok'>".$one_obj_ot_tepl_kot['srok']."</td>";
																echo "<td name='next_srok'>".(strlen($one_obj_ot_tepl_kot['next_srok']) > 0 ? date('d.m.Y',strtotime($one_obj_ot_tepl_kot['next_srok'])) : '')."</td>";
																echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalObj_ot_tepl_kot\','.$one_obj_ot_tepl_kot['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'obj_ot_tepl_kot\','.$one_obj_ot_tepl_kot['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
															};?>
															

														</tbody>
													</table>	
												</div>
												<div>
													<button onclick = "modalWindow.openModal('ModalObj_ot_tepl_kot')"  class='shine-button'>Добавить запись в таблицу</button>
												</div>
												</div>
											</div>
										</div>										
<!------------------------------------------------------- Вид отпускаемой тепловой энергии--------------------------------------------->										
									<hr/>
								
									<p class="p_gaz">Вид отпускаемой тепловой энергии</p>
									<div class="form-group">
									<div class="checkbox">
										<div class="block w2-5">
											<?php 
												if($objects['ti_out_power_ot'] == 1){
													echo "<input type='checkbox' name = 'ti_out_power_ot' id= 'ti_out_power_ot' class='custom-checkbox' checked='checked' value='1' onclick='object.power_ot()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_out_power_ot' id= 'ti_out_power_ot' class='custom-checkbox'  value='0' onclick='object.power_ot()'>";
												}
											?>
											<label for = 'ti_out_power_ot' class='label_subject'>на отопление</label>
										</div>
										<div class="block w2">
											<?php 
												if($objects['ti_out_power_gvs'] == 1){
													echo "<input type='checkbox' name = 'ti_out_power_gvs' id= 'ti_out_power_gvs' class='custom-checkbox' checked='checked' value='1' onclick='object.power_gvs()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_out_power_gvs' id= 'ti_out_power_gvs' class='custom-checkbox'  value='0' onclick='object.power_gvs()'>";
												}
											?>											
											<label for = 'ti_out_power_gvs' class='label_subject'>на ГВС</label>
										</div>
										<div class="block w4">
											<?php 
												if($objects['ti_out_power_tech'] == 1){
													echo "<input type='checkbox' name = 'ti_out_power_tech' id= 'ti_out_power_tech' class='custom-checkbox' checked='checked' value='1' onclick='object.power_tech()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_out_power_tech' id= 'ti_out_power_tech' class='custom-checkbox'  value='0' onclick='object.power_tech()'>";
												}
											?>											
											<label for = 'ti_out_power_tech' class='label_subject'>на технологические нужды</label>
										</div>
										<div class="block w2-5">
											<?php 
												if($objects['ti_out_power_vent'] == 1){
													echo "<input type='checkbox' name = 'ti_out_power_vent' id= 'ti_out_power_vent' class='custom-checkbox' checked='checked' value='1' onclick='object.power_vent()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_out_power_vent' id= 'ti_out_power_vent' class='custom-checkbox'  value='0' onclick='object.power_vent()'>";
												}
											?>												
											<label for = 'ti_out_power_vent' class='label_subject'>на вентиляцию</label>
										</div>
									</div>	
									</div>
									<hr/>											
<!------------------------------------------------------- Подключенные объекты --------------------------------------------->											
										
										<div>
											<p class="p_gaz">Подключенные объекты</p>
										</div>
										<div>
											<?php
											if (count($mkm_object_t_ti_tis)>0){
												foreach($mkm_object_t_ti_tis as $mkm_object_t_ti_ti){
															
													echo "<div class='form-group'><div class='block w2'><p id_mkm_object_t_ti='".$mkm_object_t_ti_ti['id']."'>";
													echo "<span>".($mkm_object_t_ti_ti['id_unp_sbj_own'] == $mkm_object_t_ti_ti['id_unp_sbj_ti'] ? "Собственный объект: " : "Сторонний объект: ")."</span></p></div>";
													echo "<div class='block w9'>".($mkm_object_t_ti_ti['id_unp_sbj_own'] == $mkm_object_t_ti_ti['id_unp_sbj_ti'] 
													? "<span name='name_object'>".$mkm_object_t_ti_ti['name']
													:"<span name='name_object'>".$mkm_object_t_ti_ti['name']."<span class='font-size-11'>&nbsp(<span><i class='icon-subject'></i></span>&nbsp".$mkm_object_t_ti_ti['reestr_subject_name'].")")."</span></span></div>";
													//	echo "<span name='name_object'>".$mkm_object_t_ti_ti['name']." (".$mkm_object_t_ti_ti['reestr_subject_name'].")</span>";
													echo '</div>';
												}
											}else{
												echo "<div class='form-group'><p>Подключенные объекты отсутствуют или не введены.</p></div>";
											}	
											?>
										</div>
									<hr/>	
<!------------------------------------------------------- Особые отметки --------------------------------------------->											
									<fieldset class = "fieldset_potr">
										<legend class="legend_potr"><span><i class="icon-tag"></i></span>&nbsp Особые отметки теплоисточника</legend>
										<div class="form-group">
											<input type='checkbox' name='inactive_ti' id='inactive_ti'  class='custom-checkbox' <?php echo ($objects['inactive_ti'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
											<label for='inactive_ti'  class='label_subject'>отметить как недействующий</label>
										</div>
										<div class="form-group">
											<input type='checkbox' name='del_ti' id='del_ti'  class='custom-checkbox' <?php echo ($objects['del_ti'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
											<label for='del_ti'  class='label_subject'>отметить для удаления</label>
										</div>
									</fieldset>
								
								</div>						
							</section>
<!-----------------------------------------------------     ВКЛАДКА ГАЗ  -------------------------------------------------------------------------->									
							<section id="content-tab5">
									<p class="p_gaz">Информация по газовому надзору</p>
									<hr/>
									<div class="form-group">
										<div class="checkbox">
												<?php 
													if($objects['gaz_is'] == 1){
														echo "<input type='checkbox' name = 'gaz_is' id= 'gaz_is' class='custom-checkbox' checked='checked' value='1' onclick='object.is_gaz()'  disabled>";	
													}else{
														echo "<input type='checkbox' name = 'gaz_is' id= 'gaz_is' class='custom-checkbox'  value='0' onclick='object.is_gaz()'>";
													}
												?>											
												<label for = 'gaz_is' class='label_subject'>Объект газопотребления</label>
										</div>
									</div>
									
									
								<div id = "gaz_section">
												
												<div class="form-group">	
													<div class="block w3">
													<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Закрепленный инспектор:</label>
												</div>
												
												
												<select class="form-controls" name="Insp_gaz" id="Insp_gaz"  <?php echo ($access_level == 2 ? '' : 'disabled')?> >
												<?php // Выводим ФИО закрепленного инспектора в случае если информацию просматривают из другого отдела
												if(empty($userGaz)){
												?>
													<option value='0'>Выберите инспектора</option>
														<?php foreach($usersGaz as $user):?>
															<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['g_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
														<?php endforeach; ?>
												<?php }else{
													
													if($spr_cod_otd <> $userGaz['spr_cod_otd']){
														
														echo "<option value=".$userGaz['id']." selected='selected'>".$userGaz['fio']."</option>";
													 }else{
														 foreach($usersGaz as $user):?>
															<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['g_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
														<?php endforeach; 
													 }
												}
												?>
												
												
												</select>
												
											</div>

									
									<div class="form-group">
										<div class="block w3">
											<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Тип здания:</label>
										</div>
										<select class="form-controls" name="type_home" id="type_home" onclick="object.og_hide_show(this.value)">
											<option value='0'>Выберите тип здания</option>
												<?php foreach($spr_type_home as $type_home):?>
													<option value="<?=$type_home['id']?>"<?= ($type_home['id'] == $objects['is_dom'] ? 'selected="selected"' : '');?>><?=$type_home['name']?></option>
												<?php endforeach; ?>
										</select>
										<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_type_home'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
									</div>
									
									
									<div gaz_block = "m">
										<hr/>
										<p class="p_gaz">Сведения о многоквартирном жилом доме</p>
										<div class="form-group">
											<div class="block w3">
												<label for = 'count_flat' class='label_subject m'>Количество квартир, шт.:</label>
											</div>	
											<input type='number' name = 'count_flat' id = 'count_flat' class='form-controls' value="<?= $objects['g_count_flat'] ?>" min='0'>
										</div>									
										<div class="form-group">
											<div class="block w3">
												<label for = 'count_pod' class='label_subject m'>Количество подъездов, шт:</label>
											</div>	
											<input type='number' name = 'count_pod' id = 'count_pod' class='form-controls' value="<?= $objects['g_count_entrance'] ?>" min='0'>
										</div>
									</div>									

									<div gaz_block = "mod">
											<hr/>
											<p class="p_gaz">Сведения о газификации</p>
	
											<div class="form-group">
												<div class="block w3">
													<label for="formTitle" class='label_subject'>Вид газа:</label>
												</div>	
												<select class="form-controls" name="type_gaz" id="type_gaz">
													<option value='0'>Выберите вид газа</option>
														<?php foreach($spr_type_gazCheck as $type_gaz):?>
															<option value="<?=$type_gaz['id']?>"<?= ($type_gaz['id'] == $objects['g_id_spr_og_type_gaz'] ? 'selected="selected"' : '');?>><?=$type_gaz['name']?></option>
														<?php endforeach; ?>
												</select>

											</div>										

										<div class="form-group">
											<div class="block w3">
												<label for='g_date_initial_start' class='label_subject'>Дата первичного пуска газа</label>
											</div>	
											<input type='date' class='form-controls' name='g_date_initial_start' id='g_date_initial_start' value='<?php echo $objects['g_date_initial_start'];?>' >
										</div>									
									</div>
									
									<div gaz_block = "mod">
										<!--------------Установленное газоиспользующее оборудование-->

											<div class="accordion-container">
									
												<a href="#" class="accordion-titulo"><div><p id = "numrow_ust_go">Установленное газоиспользующее оборудование (<?= (count($obj_og_devices)>0 ? count($obj_og_devices) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
											
													<div class="accordion-content">
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_og_device">
																		<thead>
																			<tr>
																				<th class="t2">Тип</th>
																				<th class="t3">Количество, шт.</th>
																				<th class="t5">Операции</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																			foreach($obj_og_devices as $one_obj_og_device){
																				echo '<tr id_obj_og_device="'.$one_obj_og_device['id'].'">';
																				echo '<td device_type="'.$one_obj_og_device['type'].'">'.$one_obj_og_device['name'].'</td>';
																				echo '<td name="counts">'.$one_obj_og_device['counts'].'</td>';
																				echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalObj_og_device\','.$one_obj_og_device['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'obj_og_device\','.$one_obj_og_device['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
																			};?>
																			

																		</tbody>
																	</table>	
																</div>	
																<div>
																	<button onclick = "modalWindow.openModal('ModalObj_og_device')"  class='shine-button'>Добавить запись в таблицу</button>
																</div>
													</div>			
											</div>
											
									</div>
							
										<!-------------------------------------------------------- Раздел о техническом обслуживании газопроводов ----------------------------------------->
									<div gaz_block = "mod">
										<hr/>
											<p class="p_gaz">О техническом обслуживании газопроводов</p>
											<div class="form-group">
												<div class="block w3">
													<label for='g_flue_date_dog' class='label_subject'>Дата договора:</label>
												</div>
												<input type='date' name='g_flue_date_dog'  class='form-controls' id='g_flue_date_dog' value='<?php echo $objects['g_flue_date_dog'];?>' >
											</div>
											<div class="form-group">
												<div class="block w3">
													<label for = 'g_flue_num_dog' class='label_subject'>Номер договора:</label>
												</div>
												<input type='text' name = 'g_flue_num_dog' id = 'g_flue_num_dog' class='form-controls' value="<?= $objects['g_flue_num_dog'] ?>">
											</div>
											<div class="form-group">
												<div class="block w3">
													<label for='g_flue_naim_org_dog'  class='label_subject'>Наименование обслуживающей организации:</label>
												</div>
												<textarea name = 'g_flue_naim_org_dog' id = 'g_flue_naim_org_dog' class='form-controls' cols="50" rows="1" placeholder="Наименование"><?= $objects['g_flue_naim_org_dog'] ?></textarea>
											</div>
									</div>		
											<!--div class="form-group">
											<label for="g_flue_vid_to" class='label_subject'>Вид ТО:</label>
												<select class="form-controls" name="g_flue_vid_to" id="g_flue_vid_to">
													<option value='0'>Выберите вид ТО</option>
														<?php// foreach($spr_vid_to as $vid_to):?>
															<option value="<?//=$vid_to['id']?>"<?//= ($vid_to['id'] == $objects['g_flue_vid_to'] ? 'selected="selected"' : '');?>><?//=$vid_to['name']?></option>
														<?php// endforeach; ?>
												</select>
											</div-->											
										<div gaz_block = "mod">
											<div class="form-group">
												<div class="block w3">
													<label for='g_flue_date_to' class='label_subject'>Дата проведения ПТО:</label>
												</div>
												<input type='date' name='g_flue_date_to'  class='form-controls' id='g_flue_date_to' value='<?php echo $objects['g_flue_date_to'];?>' >
											</div>
										</div>
										<div gaz_block = "m">	
											<div class="form-group">
												<div class="block w3">
													<label for='g_flue_date_gto' class='label_subject'>Дата проведения ГТО:</label>
												</div>
												<input type='date' name='g_flue_date_gto'  class='form-controls' id='g_flue_date_gto' value='<?php echo $objects['g_flue_date_gto'];?>' >
											</div>
										</div>
										<div gaz_block = "d">										
											<div class="form-group">
												<div class="block w3">
													<label for='g_flue_date_prto' class='label_subject'>Дата проведения ПрТО:</label>
												</div>
												<input type='date' name='g_flue_date_prto'  class='form-controls' id='g_flue_date_prto' value='<?php echo $objects['g_flue_date_prto'];?>' >
											</div>
										</div>
										
										<!--div gaz_block = "m">										
											<div class="form-group">
												<label for='g_flue_date_prto' class='label_subject'>eeeeee:</label>
												<input type="number" min="1900" max="2100" step="1" value="2000" class='form-controls' >
											</div>
										</div-->																
							<!-------------------------------------------------------- Раздел о техническом состоянии дымовых и вентиляционных каналов ------------------------------------------------------------>
								<div  gaz_block = "mo">
									<hr/>
										<p class="p_gaz">О техническом состоянии дымовых и вентиляционных каналов</p>
										<div class="form-group">
											<!--label for = 'og_flue' class='label_subject'>Вид дымохода:</label>
										
												<input type="hidden" name="og_flue_id" id="og_flue_id" value="<?//= (strlen($objects['g_id_spr_og_flue'])>0 ? $spr_vidDym['id'] : '')?>">
												<input type='text' name = 'og_flue' id = 'og_flue' class='form-controls' value="<?//= (strlen($objects['g_id_spr_og_flue'])>0 ? $spr_vidDym['name'] : '')?>">
												<button onclick = "modalWindow.openModal('openModalSpr_og_flue')">...</button>
												<!--div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('og_flue')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
												<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_flue'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
										</div>
	
									<div class="form-group">
										<div class="lab_check">
											<div class="block w3">
												<label for = 'og_flue' class='label_subject'>Виды используемых дымоходов:</label>
											</div>	
										</div>
										<div>
											<div class="checkbox">
													<?php 
														if($objects['g_vid_dym_vstr'] == 1){
															echo "<input type='checkbox' name = 'g_vid_dym_vstr' id= 'g_vid_dym_vstr' class='custom-checkbox' checked='checked' value='1' onclick=''>";	
														}else{
															echo "<input type='checkbox' name = 'g_vid_dym_vstr' id= 'g_vid_dym_vstr' class='custom-checkbox'  value='0' onclick=''>";
														}
													?>											
													<label for = 'g_vid_dym_vstr' class='label_subject'>встроенный (внутри капитальных стен)</label>
											</div>
											<div class="checkbox">
													<?php 
														if($objects['g_vid_dym_pr'] == 1){
															echo "<input type='checkbox' name = 'g_vid_dym_pr' id= 'g_vid_dym_pr' class='custom-checkbox' checked='checked' value='1' onclick=''>";	
														}else{
															echo "<input type='checkbox' name = 'g_vid_dym_pr' id= 'g_vid_dym_pr' class='custom-checkbox'  value='0' onclick=''>";
														}
													?>											
													<label for = 'g_vid_dym_pr' class='label_subject'>приставной</label>
											</div>
											<div class="checkbox">
													<?php 
														if($objects['g_vid_dym_koak'] == 1){
															echo "<input type='checkbox' name = 'g_vid_dym_koak' id= 'g_vid_dym_koak' class='custom-checkbox' checked='checked' value='1' onclick=''>";	
														}else{
															echo "<input type='checkbox' name = 'g_vid_dym_koak' id= 'g_vid_dym_koak' class='custom-checkbox'  value='0' onclick=''>";
														}
													?>											
													<label for = 'g_vid_dym_koak' class='label_subject'>коаксиальный</label>
											</div>	
											<div class="checkbox">
													<?php 
														if($objects['g_mat_dym'] == 1){
															echo "<input type='checkbox' name = 'g_mat_dym' id= 'g_mat_dym' class='custom-checkbox' checked='checked' value='1' onclick=''>";	
														}else{
															echo "<input type='checkbox' name = 'g_mat_dym' id= 'g_mat_dym' class='custom-checkbox'  value='0' onclick=''>";
														}
													?>											
													<label for = 'g_mat_dym' class='label_subject'>в исполнении дымоходов применяется кирпич</label>
											</div>	
										</div>											
									</div>
										
										

										<!--div class="form-group">
											<label for = 'flue_mater' class='label_subject'>Материал дымохода:</label>
												<input type="hidden" name="flue_mater_id" id="flue_mater_id" value="<?//= (isset($objects['g_id_spr_og_flue_mater'])? (($objects['g_id_spr_og_flue_mater'])>0 ? $spr_flue_mater['id'] : ''): '')?>">
												<input type='text' name = 'flue_mater' id = 'flue_mater' class='form-controls' value="<?//= (($objects['g_id_spr_og_flue_mater'])>0 ? $spr_flue_mater['name'] : '')?>">
												<button onclick = "modalWindow.openModal('openModalSpr_flue_mater')">...</button>
												<!--div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('flue_mater')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
												<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_flue_mater'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
										<!--/div-->								
										<div class="form-group">
											<div class="block w3">
												<label for = 'flue_size' class='label_subject'>Размер сечения дымохода, мм.:</label>
											</div>
											<input type='text' name = 'flue_size' id = 'flue_size' class='form-controls' value="<?= $objects['g_flue_size'] ?>">
										</div>
										<div class="form-group">
											<div class="block w3">
												<label for='g_flue_naim_org_insp'  class='label_subject'>Наименование организации, проводившей проверку</label>
											</div>
											<textarea name = 'g_flue_naim_org_insp' id = 'g_flue_naim_org_insp' class='form-controls' cols="50" rows="1" placeholder="Наименование"><?= $objects['g_flue_naim_org_insp'] ?></textarea>
										</div>
										<div class="form-group">
											<div class="block w3">
												<label for='g_flue_date_insp' class='label_subject'>Дата проверки</label>
											</div>
											<input type='date' name='g_flue_date_insp'  class='form-controls' id='g_flue_date_insp' value='<?php echo $objects['g_flue_date_insp'];?>' >
										</div>
										<div class="form-group">
											<div class="block w3">
												<label for='g_flue_date_insp_next' class='label_subject'>Дата следующий проверки, не позднее:</label>
											</div>
											<input type='date' name='g_flue_date_insp_next'  class='form-controls' id='g_flue_date_insp_next' value='<?php echo $objects['g_flue_date_insp_next'];?>' >
											<button  class = "shine-button" onclick="object.date_insp_next()">Рассчитать</button>
											<div class="block w2-5">
												<label class="font-size-11">* расчет является рекомендованным, <br> дату можно установить вручную.</label>
											</div>
										</div>
								</div>	
									<!-------------------------------------------------------- Раздел об обследовании объекта ------------------------------------------------------------>
									<div gaz_block = "mod">	
										<hr/>	
											<div class="accordion-container">
									
												<a href="#" class="accordion-titulo"><div><p id = "numrow_sv_oo">Сведения об обследовании объекта (<?= (count($obj_og_obsl)>0 ? count($obj_og_obsl) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
											
													<div class="accordion-content">											

																	<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_og_obsl">
																		<thead>
																			<tr>
																				<th class="t2">Дата</th>
																				<th class="t3">Вид</th>
																				<th class="t5">Операции</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																			foreach($obj_og_obsl as $one_obj_og_obsl){
																				echo '<tr id_obj_og_obsl="'.$one_obj_og_obsl['id'].'">';
																				echo '<td name="date">'.date('d.m.Y',strtotime($one_obj_og_obsl['date_obsl'])).'</td>';
																				echo '<td obsl_type="'.$one_obj_og_obsl['type_obsl'].'">'.$one_obj_og_obsl['name'].'</td>';
																				echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalObj_og_obsl\','.$one_obj_og_obsl['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'obj_og_obsl\','.$one_obj_og_obsl['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
																			};?>
																			

																		</tbody>
																	</table>	
																	</div>	
						
															<div>
																<button onclick = "modalWindow.openModal('ModalObj_og_obsl')"  class='shine-button'>Добавить запись в таблицу</button>
															</div>
													</div>				
											</div>															
										
									</div>	
									<!-------------------------------------------------------- Раздел об авариях и НС -------------------------------------------------------------------->
									<div gaz_block = "mod">
										
											<div class="accordion-container">
									
												<a href="#" class="accordion-titulo"><div><p id = "numrow_sv_ans">Сведения об авариях и НС (<?= (count($obj_og_accidents)>0 ? count($obj_og_accidents) : '0')  ?> шт.)</p></div><span class="toggle-icon"></span></a>
											
													<div class="accordion-content">												
											
																<div class="mobileTable">
																<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_og_accidents">
																	<thead>
																		<tr>
																			<th class="t2">Дата</th>
																			<th class="t3">Вид</th>
																			<th class="t3">Характер</th>
																			<th class="t5">Операции</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php 
																		foreach($obj_og_accidents as $one_obj_og_accidents){
																			echo '<tr id_obj_og_accidents="'.$one_obj_og_accidents['id'].'">';
																			echo '<td name="date">'.date('d.m.Y',strtotime($one_obj_og_accidents['date_accidents'])).'</td>';
																			echo '<td accidents_type="'.$one_obj_og_accidents['type_accidents'].'">'.$one_obj_og_accidents['name'].'</td>';
																			echo '<td name="character">'.$one_obj_og_accidents['character_accidents'].'</td>';
																			echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalObj_og_accidents\','.$one_obj_og_accidents['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'obj_og_accidents\','.$one_obj_og_accidents['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
																		};?>
																		

																	</tbody>
																</table>	
																</div>	
																<div>
																	<button onclick = "modalWindow.openModal('ModalObj_og_accidents')"  class='shine-button'>Добавить запись в таблицу</button>
																</div>	
													</div>	
											</div>		
										<hr/>
									</div>	


										<!--------------------------------------------------Ответственные лица------------------------------------------------------>				
									<div gaz_block = "d">	
										<fieldset class = "fieldset_potr">
											<legend class="legend_potr"><span><i class="icon-people"></i></span>&nbspОтветственные лица</legend>							


												<div id="container-main">											
													<div class="accordion-container">
														<a href="#" class="accordion-titulo"><div><p id = "otv_l_count"><span></span>&nbspза газовое хозяйство (<?= (isset($name_type_otv_g[0]['spr_otv_vibor_name']) ? $name_type_otv_g[0]['spr_otv_vibor_name'] : 'нет')?>)</p></div><span class="toggle-icon"></span></a>
														<div class="accordion-content">	
																
															
															<div class="form-group">
																<div class="block w2-5">
																	<label for="formTitle" class='label_subject'>Тип ответственного:</label>
																</div>
																	<select class="form-controls" name="otv_type_g" id="otv_type_g"  onclick="object.type_otv_hide_show_g(this.value)">
																		<option value='0'>Выберите тип ответственного:</option>
																			<?php foreach($spr_otv_vibor as $type_otv):?>
																			<?php if($type_otv['id'] != 3){?>
																				<option value="<?=$type_otv['id']?>"<?= ($type_otv['id'] == $objects['otv_type_g'] ? 'selected="selected"' : '');?>><?=$type_otv['name']?></option>
																			<?php }?>
																			<?php endforeach; ?>
																	</select>
															</div>												

															<div class="otv_l_gh_sob">
																<p class="p_gaz">Ответственные за газовое хозяйство</p><br>													
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_gh_sob">
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
																				
																								echo "<tr id_otv_gh_osn_sob='1'>";
																									echo "<td width='5%' name='otv_num_gh_osn_sob'>1</td>";
																									echo "<td width='30%' name='otv_fio_gh_osn_sob'>".(count($person_info_g1) != 0 ? $person_info_g1[0]['reestr_personal_secondname']." ".$person_info_g1[0]['reestr_personal_firstname']." ".$person_info_g1[0]['reestr_personal_lastname']: '')."</td>";
																									echo "<td width='30%' name='otv_dolg_sub_gh_osn_sob'>".(count($person_info_g1) != 0 ? $person_info_g1[0]['reestr_personal_post']." / ".$person_info_g1[0]['reestr_unp_name_short'] : '')."</td>";
																									echo "<td width='10%' name='otv_pr_gh_osn_sob'>".(isset($objects['order_num_g1'])? '№  '.$objects['order_num_g1'].' / '.date('d.m.Y',strtotime($objects['order_data_g1'])) : "") ."</td>";																									
																									//echo "<td width='10%' name='otv_pr_eh_osn_sob'>№ ".$objects['order_num_e1']." / ".date('d.m.Y',strtotime($objects['order_data_e1']))."</td>";	
																									echo "<td width='10%' name='otv_dog_gh_osn_sob'>-</td>";
																									//echo "<td width='10%' name='otv_group_gh_osn_sob'></td>";
																									echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_gh_sob'), object.insert_row_g(1)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																									echo "</tr>";

																								//echo "<tr id_otv_gh_osn_sob='2'>";
																								//	echo "<td width='5%' name='otv_num_gh_zam_sob'>2</td>";
																								//	echo "<td width='30%' name='otv_fio_gh_zam_sob'>".(count($person_info_g2) != 0 ? $person_info_g2[0]['reestr_personal_secondname']." ".$person_info_g2[0]['reestr_personal_firstname']." ".$person_info_g2[0]['reestr_personal_lastname'] : '')."</td>";
																								//	echo "<td width='30%' name='otv_dolg_sub_zam_g_osn_sob'>".(count($person_info_g2) != 0 ? $person_info_g2[0]['reestr_personal_post']." / ".$person_info_g2[0]['reestr_unp_name_short'] : '')."</td>";
																								//	echo "<td width='10%' name='otv_pr_gh_zam_sob'>".(isset($objects['order_num_g2'])? '№  '.$objects['order_num_g2'].' / '.date('d.m.Y',strtotime($objects['order_data_g2'])) : "") ."</td>";
																									
																									//echo "<td width='10%' name='otv_pr_eh_zam_sob'>№ ".$objects['order_num_e2']." / ".date('d.m.Y',strtotime($objects['order_data_e2']))."</td>";
																								//	echo "<td width='10%' name='otv_dog_gh_zam_sob'>-</td>";
																								//	echo "<td width='10%' name='otv_group_gh_zam_sob'></td>";
																								//	echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_gh_sob'), object.insert_row_g(2)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																								//	echo "</tr>";													
																						?>
																																	
																		</tbody>
																	
																	</table>
																</div>	
																	<input type="hidden" class='label_subject' id = "otv_g1_sob" name="otv_g1_sob" value="<?= $objects['otv_g1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g1_sob_num_pr" name="otv_g1_sob_num_pr" value="<?= $objects['order_num_g1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g1_sob_date_pr" name="otv_g1_sob_date_pr" value="<?= $objects['order_data_g1'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g2_sob" name="otv_g2_sob" value="<?= $objects['otv_g2'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g2_sob_num_pr" name="otv_g2_sob_num_pr" value="<?= $objects['order_num_g2'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g2_sob_date_pr" name="otv_g2_sob_date_pr" value="<?= $objects['order_data_g2'] ?>">											
															</div>														
																														
																
															<div class="otv_l_gh_st">	
																<p class="p_gaz">Ответственные за газовое хозяйство</p><br>
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_gh_st">
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
																						echo "<tr id_otv_gh_osn_st='3'>";
																						echo "<td width='5%' name='otv_num_gh_osn_st'>1</td>";
																						echo "<td width='30%' name='otv_fio_gh_osn_st'>".(count($person_info_g3) != 0 ? $person_info_g3[0]['reestr_personal_secondname']." ".$person_info_g3[0]['reestr_personal_firstname']." ".$person_info_g3[0]['reestr_personal_lastname'] : '')."</td>";
																						echo "<td width='30%' name='otv_dolg_sub_gh_osn_st'>".(count($person_info_g3) != 0 ? $person_info_g3[0]['reestr_personal_post']." / ".$person_info_g3[0]['reestr_unp_name_short'] : '')."</td>";
																						echo "<td width='10%' name='otv_pr_gh_osn_st'>".(isset($objects['order_num_g3'])? '№  '.$objects['order_num_g3'].' / '.date('d.m.Y',strtotime($objects['order_data_g3'])) : "") ."</td>";
																						echo "<td width='10%' name='otv_dog_gh_osn_st'>".(isset($objects['dog_num_g3'])? '№  '.$objects['dog_num_g3'].' от '.date('d.m.Y',strtotime($objects['dog_data_g3'])).' до '.date('d.m.Y',strtotime($objects['dog_data_cont_g3'])) : "") ."</td>";								
																						//echo "<td width='10%' name='otv_pr_eh_osn_st'>№ ".$objects['order_num_e3']." / ".date('d.m.Y',strtotime($objects['order_data_e3']))."</td>";
																						//echo "<td width='10%' name='otv_dog_eh_osn_st'>№ ".$objects['dog_num_e3']."  от ".date('d.m.Y',strtotime($objects['dog_data_e3']))."  до ".date('d.m.Y',strtotime($objects['dog_data_cont_e3']))."</td>";
																						//echo "<td width='10%' name='otv_group_gh_osn_st'></td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_gh_st'), object.insert_row_st_g(3)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";												
																			?>
																			

																		</tbody>
																	</table>	
																</div>
																	<input type="hidden" class='label_subject' id = "otv_g_st" name="otv_g_st" value="<?= $objects['otv_g3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g_st_num_pr" name="otv_g_st_num_pr" value="<?= $objects['order_num_g3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g_st_date_pr" name="otv_g_st_date_pr" value="<?= $objects['order_data_g3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g_st_num_dog" name="otv_g_st_num_dog" value="<?= $objects['dog_num_g3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g_st_date_dog" name="otv_g_st_date_dog" value="<?= $objects['dog_data_g3'] ?>">
																	<input type="hidden" class='label_subject' id = "otv_g_st_date_dog_cont" name="otv_g_st_date_dog_cont" value="<?= $objects['dog_data_cont_g3'] ?>">
															</div>											
														
															<div class="otv_l_gh_instr">	
																<p class="p_gaz">Ответственные за газовое хозяйство</p><br>
																<div class="mobileTable">
																	<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="otv_l_gh_instr">
																		<thead>
																			<tr>
																				<th class="t3"></th>
																				<th class="t3">Ответственный</th>
																				<th class="t5">Операции</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																					echo "<tr id_otv_gh_instr='4'>";
																						echo "<td width='5%' name='otv_num_gh_instr'>1</td>";
																						echo "<td width='30%' name='otv_fio_gh_osn_instr'>".(isset($objects['ins_data_g']) ? 'Руководитель организации по инструктажу от  '.date('d.m.Y',strtotime($objects['ins_data_g'])) : '')."</td>";
																						//echo "<td width='30%' name='otv_fio_gh_osn_instr'>Руководитель организации по инструктажу от ".date('d.m.Y',strtotime($objects['ins_data_g']))."</td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_gh_instr'), object.insert_row_instr_g(4)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";
																			?>
																			

																		</tbody>
																	</table>	
																</div>
																<input type="hidden" class='label_subject' id = "data_instr_dir_g" name="data_instr_dir_g" value="<?= $objects['ins_data_g'] ?>">	
															</div>											

														</div>
													</div>
												</div>

										</fieldset>	
									
									</div>
									<fieldset class = "fieldset_potr">
										<legend class="legend_potr"><span><i class="icon-tag"></i></span>&nbsp Особые отметки объекта газового надзора</legend>
										<div class="form-group">
											<input type='checkbox' name='inactive_g' id='inactive_g' class='custom-checkbox' <?php echo ($objects['inactive_g'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>				
											<label for='inactive_g'>отметить как недействующий</label>
										</div>
										<div class="form-group">
											<input type='checkbox' name='del_g' id='del_g' class='custom-checkbox' <?php echo ($objects['del_g'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
											<label for='del_g'>отметить для удаления</label>
										</div>
									</fieldset>

								</div>						
							</section> 	
							<!--------конец секции вкладок------------->
						</div>	  
					</div>	
                </form>
				<div id="messenger"></div>
				
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="object.update('continue')">Сохранить</button>
					<button type="submit" class="shine-button" onclick="object.update('cancel')">Сохранить и закрыть</button>
					<a href="javascript:history.back()" class="shine-button" onclick="object.cancel()">Отмена</a>	
				</div>
				
				<div class="page_title_footer">
                    <h5></h5>
                </div>
				
            </div>
        </div>
    </main>
	
	<!--------------------------------- Конвертер --------------------------------->
	<div class = "tooltip"><div class='calc_units' onclick="calc_units.show()"><span class="tooltiptext">Конвертер</span></div></div>
	<div id="calc_units">
		<div class="head_calc">
			<p>Конвертер мощности</p>
		</div>
		<button id='close_calc' onclick="calc_units.hide()">&#215 </button>
		
		<div class="form-group">
			<div class="block w0-7">
				<label for = 'units_GK' class="label_units">Гкал/ч:</label>
			</div>
			<div class="block w2">
				<input type='text' name = 'units_GK' id = 'units_GK' class='form-controls'>
			</div>
		</div>
		<div class="form-group">
			<div class="block w0-7">
				<label for = 'units_KV' class="label_units">кВт:</label>
			</div>
			<div class="block w2">
				<input type='text' name = 'units_KV' id = 'units_KV' class='form-controls'>
			</div>
		</div>
		<div class="form-group">
			<div class="block w0-7">
				<label for = 'units_GDz' class="label_units">ГДж/ч:</label>
			</div>
			<div class="block w2">
				<input type='text' name = 'units_GDz' id = 'units_GDz' class='form-controls'>
			</div>
		</div>		
	</div>
	
	
<?php Theme::block('modal/modal_Spr_ot_functions') ?>
<?php Theme::block('modal/modal_Spr_ot_cat') ?>	
<?php Theme::block('modal/modal_Obj_ot_tepl_kot') ?>	
<?php Theme::block('modal/modal_Obj_ot_heatnet') ?>	
<?php Theme::block('modal/modal_Obj_ot_heatnet_t') ?>	
<?php Theme::block('modal/modal_Obj_og_device') ?>
<?php Theme::block('modal/modal_Obj_og_obsl') ?>
<?php Theme::block('modal/modal_Obj_og_accidents') ?>
<?php Theme::block('modal/modal_Obj_ot_personal_tp') ?>
<?php Theme::block('modal/modal_Obj_ot_personal_sar') ?>
<?php Theme::block('modal/modal_Spr_ot_gvs_open') ?>
<?php Theme::block('modal/modal_Spr_ot_gvs_in') ?>	
<?php Theme::block('modal/modal_Spr_ot_type_to') ?>		
<?php Theme::block('modal/modal_Spr_ot_systemheat_dependent') ?>	
<?php Theme::block('modal/modal_Spr_ot_systemheat_water') ?>
<?php Theme::block('modal/modal_Spr_ot_systemheat_layout') ?>	
<?php Theme::block('modal/modal_Spr_t_systemheat_type_op') ?>
<?php Theme::block('modal/modal_Boiler_water') ?>
<?php Theme::block('modal/modal_Boiler_vapor') ?>		
<?php Theme::block('modal/modal_Spr_oti_type_fuel_rezerv') ?>
<?php Theme::block('modal/modal_Spr_oti_type_fuel') ?>
<?php Theme::block('modal/modal_Spr_oti_boiler_type') ?>
<?php Theme::block('modal/modal_Spr_og_flue') ?>
<?php Theme::block('modal/modal_Spr_flue_mater') ?>
<?php Theme::block('modal/modal_Spr_type_gaz') ?>
<?php Theme::block('modal/modal_heat_source') ?>		

<?php Theme::block('modal/modal_Obj_oe_avr') ?>
<?php Theme::block('modal/modal_Obj_oe_aie') ?>
<?php Theme::block('modal/modal_Obj_oe_trp') ?>
<?php Theme::block('modal/modal_Obj_oe_klvl') ?>
<?php Theme::block('modal/modal_Obj_oe_block') ?>
<?php Theme::block('modal/modal_Obj_oe_vvd') ?>
<?php Theme::block('modal/modal_Obj_oe_ek') ?>
<?php Theme::block('modal/modal_Obj_oe_ku') ?>
<?php Theme::block('modal/modal_Obj_ot_prit_vent') ?>
<?php Theme::block('modal/modal_Obj_ot_teploobmennik_gvs') ?>
<?php Theme::block('modal/modal_Obj_ot_teploobmennik_so') ?>
<!--?php Theme::block('modal/SubjectInfo') ?-->
<?php Theme::block('modal/modal_GuidesfromSubject') ?>
<?php Theme::block('modal/modalOtv_gh_sob') ?>
<?php Theme::block('modal/modalOtv_gh_st') ?>
<?php Theme::block('modal/modalOtv_gh_instr') ?>
<?php 
if($_COOKIE['inspection_type'] == 2){
	Theme::block('modal/modalSearchUnp') ;
}else{
	Theme::block('modal/modalSearchSubject');
}
?>

<?php $this->theme->footer(); ?>

<script src="/ARM/basis/Assets/js/checkObject.js"></script>