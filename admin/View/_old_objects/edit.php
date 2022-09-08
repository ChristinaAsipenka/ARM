<?php $this->theme->header(); ?>

    <main>
        <div class="container">
		<!--------------Однотипное оформление верхней области страницы ------------------------------>
		<div class='top_of_page'> 	<!------ для всех страниц ------->
            <div class="page_title"> 	<!------ для всех страниц ------->
                <h5>Объект: <span><i class="icon-object"></i></span>&nbsp<?= $objects['name'] ?> </br><a href="#" onclick='modalWindow.openModal("openModalSubjectInfo"); subject.subjectInfo(<?= $subject['id']?>)'>Потребитель: <span><i class="icon-subject"></i></span>&nbsp<?= $subject['name'] ?> </a></h5>
            </div>
			<div class ='nav_buttons'> <!------ для всех страниц -------> 
			<a href="/ARM/admin/objects/list/<?= $objects['id_reestr_subject'] ?>" class="button_unp"><span><i class="icon-list"></i></span>Вернуться к списку объектов потребителя</a>
			</div>
        </div>
         
        <div class="base_part"> <!------ для всех страниц ------->
           
                    <form id="formPage" mode="edit_object" class="form">	


<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
						<div class="tabs">
							<input id="tab1" type="radio" name="tabs" checked>
							<label for="tab1" title="Вкладка 1"><span><i class="icon-info"></i></span>&nbspОсновная</label>
						 
							<input id="tab2" type="radio" name="tabs">
							<label for="tab2" title="Вкладка 2"><span><i class="icon-energy"></i></span>&nbspЭлектро</label>
						 
							<input id="tab3" type="radio" name="tabs">
							<label for="tab3" title="Вкладка 3"><span><i class="icon-teplo"></i></span>&nbspТепло</label>
						 
							<input id="tab4" type="radio" name="tabs">
							<label for="tab4" title="Вкладка 4"><span><i class="icon-ti"></i></span>&nbspТИ</label>
							
							<input id="tab5" type="radio" name="tabs">
							<label for="tab5" title="Вкладка 4"><span><i class="icon-fire"></i></span>&nbspГаз</label>
							<div class='tabs-section'>
<!------------------------------------------------------     ВКЛАДКА ОСНОВНАЯ  -------------------------------------------------------------------------->							
								<section id="content-tab1">
								<p class="p_gaz">Основная информация по объекту</p>
								<hr/>
											
											
											<div class="form-group">
												<label for = 'name_object' class="label_subject"><span class = "formTextRed">*</span>Наименование:</label>
												<textarea name = 'name_object' id = 'name_object' class='form-controls' cols="50" rows="1" placeholder="Наименование"><?= $objects['name'] ?></textarea>
											</div>										
											<div class="form-group">
												<label for = 'num_case_new' class="label_subject">Номер дела:</label>
												<input type='text' name = 'num_case_new' id = 'num_case_new' class='form-controls'  disabled="" value="<?= $subject['id'] ?>">
											</div>
											<div class="form-group">
												<input type="hidden" name="subject_id" id="subject_id" value="<?= $subject['id'] ?>">
												<input type="hidden" name="objects_id" id="formObjectId" value="<?= $objects['id'] ?>">
												<label for = 'num_case_o' class="label_subject">Номер дела по старой нумерации:</label>
												<input type='text' name = 'num_case_o' id = 'num_case_o' class='form-controls' value="<?= $objects['num_case_o'] ?>">
											</div>
											<?php /*Theme::block('address/addressBranch') */?>
											<?php Theme::block('address/addressObject') ?>	
											
											
											<!--div class="form-group">
													<label for="formTitle" class='label_subject'>Административный район:</label>
													<select class="form-controls" name="spr_admin" id="spr_admin">
														<option value='0'>Выберите административный район</option>
															<?php /*foreach($spr_admin as $one_spr_admin):?>
															<option value="<?=$one_spr_admin['id']?>"<?= ($one_spr_admin['id'] == $objects['id_spr_admin'] ? 'selected="selected"' : '');?>><?=$one_spr_admin['name']?></option>
																
															<?php endforeach; */?>
													</select>
													<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_admin'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
											</div-->	


								</section> 
<!------------------------------------------------------     ВКЛАДКА ЭЛЕКТРО  -------------------------------------------------------------------------->									
								<section id="content-tab2">
								<p class="p_gaz">Информация по объекту электрической энергии</p>
								<hr/>
									<div class="form-group">
										<label for="formTitle" class='label_subject'>Закрепленный инспектор:</label>
										<select class="form-controls" name="e_insp" id="e_insp">
											<option value='0'>Выберите инспектора</option>
												<?php foreach($usersElectro as $user):?>
													<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['e_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
												<?php endforeach; ?>
										</select>
									</div>									
									<hr/>
									<p class="p_gaz">Информация о надежности электроснабжения:</p>
									<div class="form-group">
										<p class='label_subject'>Установленная мощность, кВт: <span id='sum_power'></span></p>
										
									</div>
									<div class="form-group">
										<label for = 'e_cat_1 ' class='label_subject'>Мощность эл.приемника 1 категории, кВт:</label>
										<input type='number' name = 'e_cat_1 ' id = 'e_cat_1' class='form-controls' value="<?= $objects['e_cat_1'] ?>" step="any" min='0'>	
									</div>
									
									<div class="form-group">
										<label for = 'e_cat_1plus ' class='label_subject'>Мощность эл.приемника 1 особой категории, кВт (входит в том числе в 1 кат.):</label>
										<input type='number' name = 'e_cat_1plus ' id = 'e_cat_1plus' class='form-controls' value="<?= $objects['e_cat_1plus'] ?>" step="any" min='0'>	
									</div>
									
									<div class="form-group">
										<label for = 'e_cat_2 ' class='label_subject'>Мощность эл.приемника 2 категории, кВт:</label>
										<input type='number' name = 'e_cat_2 ' id = 'e_cat_2' class='form-controls' value="<?= $objects['e_cat_2'] ?>" step="any" min='0'>	
									</div>
									
									<div class="form-group">
										<label for = 'e_cat_3 ' class='label_subject'>Мощность эл.приемника 3 категории, кВт:</label>
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
										<label for = 'e_armor_crach' class='label_subject'>Мощность аварийной брони, кВт:</label>
										<input type='number' name = 'e_armor_crach' id = 'e_armor_crach' class='form-controls' value="<?= $objects['e_armor_crach'] ?>" min='0' step="any">	
									</div>
									
									<div class="form-group">
										<label for = 'e_armor_tech ' class='label_subject'>Мощность технологической брони, кВт:</label>
										<input type='number' name = 'e_armor_tech' id = 'e_armor_tech' class='form-controls' value="<?= $objects['e_armor_tech'] ?>" min='0' step="any">	
									</div>
									
									<div class="form-group">
										<label for = 'e_armor_time ' class='label_subject'>Время завершения технологического процесса, ч.:</label>
										<input type='number' name = 'e_armor_time' id = 'e_armor_time' class='form-controls' value="<?= $objects['e_armor_time'] ?>" min='0' step="any">	
									</div>
									
									<div class="form-group">
										<label for = 'e_armor_date ' class='label_subject'>Дата составления акта:</label>
										<input type='date' name = 'e_armor_date' id = 'e_armor_date' class='form-controls' value="<?= $objects['e_armor_date'] ?>">	
									</div>
									</div>
									<hr>									
									
									
									<?php
									if(count($subobj_data) > 0){
									?>
									<p class="p_gaz">Сведения о субабонентах:</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1">
												<thead>
													<tr>
														<th class="t2">Место</th>
														<th class="t4">Мощность установленная(разрешенная), кВт</th>
														<th class="t4">Категорийность надежности</th>
														<th class="t4">Профиль работ</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													
													foreach($subobj_data as $item_subobj_data){
														
														echo "<tr>";
														echo "<td>".$item_subobj_data['reestr_object_name']." (".$item_subobj_data['reestr_subject_name'].") ";
														if(strlen($item_subobj_data['spr_region_name']) > 0){
														echo "<span class='font-size-11'>".$item_subobj_data['address_index'].", ".$item_subobj_data['spr_region_name'].", ".$item_subobj_data['spr_district_name']." р-н, ".$item_subobj_data['spr_city_name'].", ".$item_subobj_data['address_street'].", д.".$item_subobj_data['address_building'].", пом.".$item_subobj_data['address_flat']."</span>";
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
									<hr>
									<?php }?>
									
									
									<div class="checkbox">	
										<?php 
											if($objects['e_subobj'] == 1){
												echo "<input type='checkbox' name = 'e_subobj' id= 'e_subobj' class='custom-checkbox' checked='checked' value='1' onclick='object.e_subobj()'>";	
											}else{
												echo "<input type='checkbox' name = 'e_subobj' id= 'e_subobj' class='custom-checkbox'  value='0' onclick='object.e_subobj()'>";
											}
										?>
										<label for="e_subobj" class='label_subject'>Является субабонентом потребителя</label>
									</div>
									<div id = "subobj_subject_hidden">
										<div class="form-group">
											
											<input type="hidden" name="e_subobj_subject_id" id="e_subobj_subject_id" value="<?= (strlen($objects['e_subobj_subject'])>0 ? $e_subobj_subject['id'] : '')?>">
											<input type="hidden" name="e_subobj_obj_id" id="e_subobj_obj_id" value="<?= (strlen($objects['e_subobj_obj'])>0 ? $objects['e_subobj_obj'] : '')?>">
											
											<textarea name = 'e_subobj_subject' id = 'e_subobj_subject' class='form-controls'  cols="50" rows="1"><?= (strlen($objects['e_subobj_subject'])>0 ? $e_subobj_obj['name'] .'('.$e_subobj_subject['name'].')' : '')?></textarea>
										
											<button onclick = "modalWindow.openModal('openModalSubject')" id='sbobj'>...</button>
											<button class = "btn_clear_fields" onclick="object.clear_fields('e_subobj_subject')"><i class="icon-close"></i></button>
										</div>

										<div class="form-group">
											<p class='label_subject'>Разрешенная субабоненту мощность соответствует установленной для данного объекта.</p>
									
										</div>
									</div>
									<hr/>

									<p class="p_gaz">Кабельные и воздушные линии</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_klvl">
												<thead>
													<tr>
														<th class="t2">Тип</th>
														<th class="t4">Напряжение линии, кВ</th>
														<th class="t4">Название и номер линии</th>
														<th class="t4">Марка провода</th>
														<th class="t4">Длина, км</th>
														<th class="t4">Точка подключения</th>
														<th class="t4">Год ввода в эксплуатацию</th>
														<th class="t5"></th>
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
														echo "<td name='year'>".$obj_oe_klvl['year']."</td>";
														echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_klvl',".$obj_oe_klvl['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_klvl\",".$obj_oe_klvl['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
													};?>
												</tbody>
											</table>
										
									</div>
									<button onclick = "modalWindow.openModal('ModalObj_oe_klvl')"  class='add_button'>Добавить элемент</button>	
									<hr/>

									
									<div class = "resut_row_table"><div><p class="p_gaz">Транформаторные и распределительные подстанции</p></div><div><p class="numrow" id = "numrow_trps">Всего: <?= (count($obj_oe_trps)>0 ? count($obj_oe_trps) : '0')  ?> шт.</p></div></div>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_trp">
												<thead>
													<tr>
														<th class="t4">Наименование</th>
														<th class="t4">Тип трансформатора</th>
														<th class="t4">Мощность, кВА</th>
														<th class="t4">Высокое напряжение, кВ</th>
														<th class="t4">Год ввода в эксплуатацию</th>
														
														<th class="t5"></th>
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
														echo "<td name='year_begin'>".$obj_oe_trp['year_begin']."</td>";
														echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_trp',".$obj_oe_trp['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_trp\",".$obj_oe_trp['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
													};?>
												</tbody>
											</table>
										
									</div>
									<button onclick = "modalWindow.openModal('ModalObj_oe_trp')"  class='add_button'>Добавить элемент</button>	
									<hr/>


									<div class = "resut_row_table"><div><p class="p_gaz">АВР</p></div><div><p class="numrow" id = "numrow_avrs">Всего: <?= (count($obj_oe_avrs)>0 ? count($obj_oe_avrs) : '0')  ?> шт.</p></div></div>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_avr">
												<thead>
													<tr>
														<th class="t4">Место установки</th>
														<th class="t4">Напряжение, кВ</th>
														<th class="t4">Время срабатывания, секунд</th>
														<th class="t4">Дата последней проверки срабатывания</th>
														<th class="t5"></th>
													</tr>
												</thead>
												<tbody>
												<?php 

													foreach($obj_oe_avrs as $obj_oe_avr){
														echo "<tr id_obj_oe_avr='".$obj_oe_avr['id']."'>";
														echo "<td name='place'>".$obj_oe_avr['place']."</td>";
														echo "<td name='power'>".$obj_oe_avr['power']."</td>";
														echo "<td name='time'>".$obj_oe_avr['time']."</td>";
														echo "<td name='date'>".date('d.m.Y',strtotime($obj_oe_avr['date']))."</td>";
														echo "<td><div class='menu-item-event'><div><button class='button-edit'  onclick = \"modalWindow.openModalEdit('ModalObj_oe_avr',".$obj_oe_avr['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_avr\",".$obj_oe_avr['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
													};?>	
												</tbody>
											</table>
											
									</div>
									<button onclick = "modalWindow.openModal('ModalObj_oe_avr')"  class='add_button'>Добавить элемент</button>
									<hr/>
									
									<p class="p_gaz">Автономные источники электроснабжения</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_aie">
												<thead>
													<tr>
														<th class="t4">Наименование / марка</th>
														<th class="t4">Тип</th>
														<th class="t4">Напряжение, кВ</th>
														
														<th class="t4">Завод изготовитель</th>
														<th class="t4">Год выпуска</th>
														<th class="t4">Дата последнего тех.обслуживания</th>
														<th class="t4">Место установки</th>
														<th class="t5"></th>
													</tr>
												</thead>
												<tbody>
													<?php 
													foreach($obj_oe_aies as $obj_oe_aie){
														echo "<tr id_obj_oe_aie='".$obj_oe_aie['id']."'>";
														echo "<td name='name'>".$obj_oe_aie['name']."</td>";
														echo "<td name='type'>".$obj_oe_aie['type']."</td>";
														echo "<td name='power'>".$obj_oe_aie['power']."</td>";
														echo "<td name='factory'>".$obj_oe_aie['factory']."</td>";
														echo "<td name='year'>".$obj_oe_aie['year']."</td>";
														echo "<td name='date_last'>".date('d.m.Y',strtotime($obj_oe_aie['date_last']))."</td>";
														echo "<td name='place'>".$obj_oe_aie['place']."</td>";
														echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalObj_oe_aie',".$obj_oe_aie['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_oe_aie\",".$obj_oe_aie['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
													};?>
												</tbody>
											</table>
									</div>
									<button onclick = "modalWindow.openModal('ModalObj_oe_aie')"  class='add_button'>Добавить элемент</button>
									<hr/>
									
									
									<p class="p_gaz">Блок-станции/собственной генерации</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_block">
												<thead>
													<tr>
														<th class="t2">Наименование</th>
														<th class="t4">Мощность, кВт</th>
														<th class="t4">Вид используемой энергии</th>
														<th class="t4">Возможность работы на выделенную нагрузку</th>
														<th class="t5"></th>
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
									<button onclick = "modalWindow.openModal('ModalObj_oe_block')"  class='add_button'>Добавить элемент</button>	
									<hr/>
									<div class="form-group">
										<label for = 'e_district' class='label_subject'>Район электрических сетей:</label>
										<input type='text' name = 'e_district' id = 'e_district' class='form-controls' value="<?= $objects['e_district'] ?>">	
									</div>
									<div class="checkbox">	
									
										<?php 
											if($objects['e_flooding'] == 1){
												echo "<input type='checkbox' name = 'e_flooding' id= 'e_flooding' class='custom-checkbox' checked='checked' value='1' onclick='object.e_flooding()'>";	
											}else{
												echo "<input type='checkbox' name = 'e_flooding' id= 'e_flooding' class='custom-checkbox'  value='0' onclick='object.e_flooding()'>";
											}
										?>
										
										<label for="e_flooding" class='label_subject'>Находится в зоне подтопления паводковыми водами</label>
									</div>
									
									<hr/>
									<div class="form-group">
										<label for='del_e'>Удалить объект электрической энергии</label>
										<input type='checkbox' name='del_e' id='del_e' <?php echo ($objects['del_e'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
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
														echo "<input type='checkbox' name = 't_is' id= 't_is' class='custom-checkbox' checked='checked' value='1' onclick='object.is_teplo()'>";	
													}else{
														echo "<input type='checkbox' name = 't_is' id= 't_is' class='custom-checkbox'  value='0' onclick='object.is_teplo()'>";
													}
												?>											
												<label for = 't_is' class='label_subject'>Объект тепловой энергии</label>
										</div>
									</div>									
									
								<div id = "t_is">	
								<hr/>
									<div class="form-group">
										<label for="formTitle" class='label_subject'>Закрепленный инспектор:</label>
										<select class="form-controls" name="Insp_t" id="Insp_t" onchange='object.changeInsp()'>
											<option value='0'>Выберите инспектора</option>
												<?php foreach($usersTeplo as $user):?>
													<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['t_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
												<?php endforeach; ?>
										</select>
									</div>
									<hr/>
									<div class="form-group">
										<label for = 't_spr_ot_functions' class='label_subject'>Функциональное назначение:</label>
											<input type="hidden" name="t_spr_ot_functions_id" id="t_spr_ot_functions_id" value="<?= (strlen($objects['t_id_spr_ot_functions'])>0 ? $spr_ot_functions['id'] : '')?>">
											<input type='text' name = 't_spr_ot_functions' id = 't_spr_ot_functions' class='form-controls' value="<?= (strlen($objects['t_id_spr_ot_functions'])>0 ? $spr_ot_functions['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_ot_functions')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_spr_ot_functions')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_functions'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>
									<div class="form-group">
										<label for = 't_spr_ot_functions' class='label_subject'>Категория надежности теплоснабжения:</label>
											<input type="hidden" name="t_spr_ot_cat_id" id="t_spr_ot_cat_id" value="<?= (strlen($objects['t_id_spr_ot_cat'])>0 ? $spr_ot_cat['id'] : '')?>">
											<input type='text' name = 't_spr_ot_cat' id = 't_spr_ot_cat' class='form-controls' value="<?= (strlen($objects['t_id_spr_ot_cat'])>0 ? $spr_ot_cat['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_ot_cat')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_spr_ot_cat')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_cat'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>

									<div class="form-group">
										<label for = 't_year' class='label_subject'>Год ввода в эксплуатацию:</label>
										<input type='text' name = 't_year' id = 't_year' class='form-controls' value="<?= $objects['t_year'] ?>">
									</div>
									<hr/>

									<p class="p_gaz">Источники теплоснабжения</p>
									<!--div class="form-group">
										<label for="t_heat_source_own" class='label_subject'>Источники теплоснабжения:</label>
										<select class="form-controls" name="t_heat_source_own" id="t_heat_source_own" onclick="object.heat_source_show(this.value)">
											<option value='0'>Выберите тип источника</option>
												<?php /*foreach($spr_ot_type_heat_source as $type_heat_source):?>
													<option value="<?=$type_heat_source['id']?>"<?= ($type_heat_source['id'] == $objects['t_heat_source_own'] ? 'selected="selected"' : '');?>><?=$type_heat_source['name']?></option>
												<?php endforeach; */?>
										</select>
										<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_type_heat_source'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div-->
									<div class="form-group">
										<div class="heat_source_hide_group">									
												<table class='objects_list_outside' id = "mkm_object_t_ti">
													<thead>
														<tr>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<?php
															foreach($mkm_object_t_tis as $mkm_object_t_ti){
																//print_r($mkm_object_t_ti);
															echo "<tr id_mkm_object_t_ti='".$mkm_object_t_ti['id']."'>";
															echo "<td>".($mkm_object_t_ti['id_unp_sbj_own'] == $mkm_object_t_ti['id_unp_sbj_ti'] ? "Собственный ТИ " : "Сторонний ТИ ").(strlen($mkm_object_t_ti['ti_name'])>0 ? "$mkm_object_t_ti[ti_name]: &nbsp": ':&nbsp')."</td>";
															echo "<td name='name_object'>".$mkm_object_t_ti['name']." (".$mkm_object_t_ti['reestr_subject_name'].")</td>";
															echo '<td><div class="menu-item-event"><div><button class="button-remove" onclick="object.removeTableItem(\'mkm_object_t_ti\','.$mkm_object_t_ti['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
															}
														?>
													</tbody>					
												</table>
												<button onclick = "modalWindow.openModal('openModalHeatSource')">Добавить объект</button>
										</div>
									</div>
									<hr/>
									
									<div>
										<p class="p_gaz">Тепловые сети объекта</p>
									</div>	
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_heatnet_t">
												<thead>
													<tr>
														<!--th class="t2">Принадлежность</th-->
														<th class="t3">Точка подключения</th>
														<th class="t3">Длина участка, м.</th>
														<th class="t3">Условный диаметр, мм.</th>
														<th class="t3">Кол-во труб, шт.</th>
														<th class="t3">Техническое исполнение</th>
														<th class="t3">Тип трубы</th>
														<th class="t3">Вид изоляции</th>
														<th class="t5"></th>
													</tr>
												</thead>
												<tbody>
													<?php 

//print_r($obj_ot_heatnet_ts);													
													foreach($obj_ot_heatnet_ts as $one_obj_ot_heatnet){
														
														echo '<tr id_obj_ot_heatnet_t="'.$one_obj_ot_heatnet['id'].'">';
														//echo '<td type_obj_heatnet_t="'.$one_obj_ot_heatnet['type_obj'].'">'.$one_obj_ot_heatnet['name_type'].'</td>';
														echo '<td name="conect_point">'.$one_obj_ot_heatnet['conect_point'].'</td>';
														echo '<td name="length">'.$one_obj_ot_heatnet['length'].'</td>';
														echo '<td name="diameter">'.$one_obj_ot_heatnet['diameter'].'</td>';
														echo '<td name="count_tube">'.$one_obj_ot_heatnet['count_tube'].'</td>';
														echo '<td t_underground="'.$one_obj_ot_heatnet['underground'].'" >'.$one_obj_ot_heatnet['name_underground'].'</td>';
														echo '<td type_isolation_iso="'.$one_obj_ot_heatnet['isolation'].'">'.$one_obj_ot_heatnet['name_iso'].'</td>';
														echo '<td t_type_isolation="'.$one_obj_ot_heatnet['type_isolation'].'">'.$one_obj_ot_heatnet['name_izol'].'</td>';
														echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalObj_ot_heatnet_t\','.$one_obj_ot_heatnet['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'obj_ot_heatnet_t\','.$one_obj_ot_heatnet['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
													};?>
													

												</tbody>
											</table>	
										</div>
										<div>
											<button onclick = "modalWindow.openModal('ModalObj_ot_heatnet_t')"  class='add_button'>Добавить элемент</button>
										</div>
									<hr/>
				
				
									<p class="p_gaz">Индивидуальный тепловой пункт</p>
									<p class="p_gaz">Приборы учета</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_personal_tp">
												<thead>
													<tr>
														<th class="t4">Типы ПУ</th>
														<th class="t4">Кол-во ПУ, шт.</th>
														<!--th class="t4">Тип САР</th>
														<th class="t4">Кол-во САР, шт.</th-->
														<th class="t5"></th>
													</tr>
												</thead>
												<tbody>
												<?php 
													foreach($obj_ot_personal_tps as $obj_ot_personal_tp){
														echo "<tr id_obj_ot_personal_tp='".$obj_ot_personal_tp['id']."'>";
														echo "<td name='device'>".$obj_ot_personal_tp['device']."</td>";
														echo "<td name='count_device'>".$obj_ot_personal_tp['count_device']."</td>";
														/*echo "<td name='sar'>".$obj_ot_personal_tp['sar']."</td>";
														echo "<td name='count_sar'>".$obj_ot_personal_tp['count_sar']."</td>";*/
														echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_ot_personal_tp\",".$obj_ot_personal_tp['id'].")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_personal_tp\",".$obj_ot_personal_tp['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
													};?>													
												</tbody>
											</table>
											
									</div>
									<button onclick = "modalWindow.openModal('ModalObj_ot_personal_tp')"  class='add_button'>Добавить элемент</button>	
	
									<hr/>
									<p class="p_gaz">Системы автоматического регулирования</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_personal_sar">
												<thead>
													<tr>
														<!--th class="t4">Типы приборов учета</th>
														<th class="t4">Кол-во ПУ, шт.</th-->
														<th class="t4">Тип САР</th>
														<th class="t4">Назначение САР</th>
														<th class="t4">Кол-во САР, шт.</th>
														<th class="t5"></th>
													</tr>
												</thead>
												<tbody>
												<?php 
												
													foreach($obj_ot_personal_sars as $obj_ot_personal_sar){
														echo "<tr id_obj_ot_personal_sar='".$obj_ot_personal_sar['id']."'>";
														echo "<td name='sar'>".$obj_ot_personal_sar['sar']."</td>";
														echo '<td nazn_sar="'.$obj_ot_personal_sar['nazn_sar'].'">'.$obj_ot_personal_sar['spr_ot_nazn_sar_name'].'</td>';
														echo "<td name='count_sar'>".$obj_ot_personal_sar['count_sar']."</td>";
														echo "<td><div class='menu-item-event'><div><button class='button-edit' onclick = 'modalWindow.openModalEdit(\"ModalObj_ot_personal_sar\",".$obj_ot_personal_sar['id'].")'><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='object.removeTableItem(\"obj_ot_personal_sar\",".$obj_ot_personal_sar['id'].")'><i class='icon-trash icons'></i></button></div></div></td></tr>";
													};?>													
												</tbody>
											</table>
											
									</div>
									<button onclick = "modalWindow.openModal('ModalObj_ot_personal_sar')"  class='add_button'>Добавить элемент</button>										

									<hr/>

									
									<p class="p_gaz">Система отопления</p>
									<div class="form-group">
										<label for = 't_systemheat_place' class='label_subject'>Место присоединения:</label>
										<input type='text' name = 't_systemheat_place' id = 't_systemheat_place' class='form-controls' value="<?= $objects['t_systemheat_place'] ?>">
									</div>
									<div class="form-group">
										<label for = 't_systemheat_water' class='label_subject'>Тип:</label>
											<input type="hidden" name="t_systemheat_water_id" id="t_systemheat_water_id" value="<?= (strlen($objects['t_systemheat_water'])>0 ? $spr_ot_systemheat_water['id'] : '')?>">
											<input type='text' name = 't_systemheat_water' id = 't_systemheat_water' class='form-controls' value="<?= (strlen($objects['t_systemheat_water'])>0 ? $spr_ot_systemheat_water['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_ot_systemheat_water')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_systemheat_water')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_systemheat_water'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>
									
									
									
									<div class="form-group">
										<label for = 't_systemheat_layout' class='label_subject'>Разводка:</label>
											<input type="hidden" name="t_systemheat_layout_id" id="t_systemheat_layout_id" value="<?= (strlen($objects['t_systemheat_layout'])>0 ? $spr_ot_type_razvodka['id'] : '')?>">
											<input type='text' name = 't_systemheat_layout' id = 't_systemheat_layout' class='form-controls' value="<?= (strlen($objects['t_systemheat_layout'])>0 ? $spr_ot_type_razvodka['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_ot_systemheat_layout')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_systemheat_layout')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_type_razvodka'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>								
									
									
									
									<div class="form-group">
										<label for = 't_systemheat_type_op' class='label_subject'>Вид отопительных приборов:</label>
											<input type="hidden" name="t_systemheat_type_op_id" id="t_systemheat_type_op_id" value="<?= (strlen($objects['t_systemheat_type_op'])>0 ? $spr_ot_type_ot_pribor['id'] : '')?>">
											<input type='text' name = 't_systemheat_type_op' id = 't_systemheat_type_op' class='form-controls' value="<?= (strlen($objects['t_systemheat_type_op'])>0 ? $spr_ot_type_ot_pribor['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_t_systemheat_type_op')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_systemheat_type_op')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_type_ot_pribor'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>									
									
									
									
									<div class="form-group">
										<label for = 't_systemheat_mark_op' class='label_subject'>Марка отопительных приборов:</label>
										<input type='text' name = 't_systemheat_mark_op' id = 't_systemheat_mark_op' class='form-controls' value="<?= $objects['t_systemheat_mark_op'] ?>">
									</div>
									<div class="form-group">
										<label for = 't_systemheat_dependent' class='label_subject'>Схема присоединения:</label>
											<input type="hidden" name="t_systemheat_dependent_id" id="t_systemheat_dependent_id" value="<?= (strlen($objects['t_systemheat_dependent'])>0 ? $spr_ot_systemheat_dependent['id'] : '')?>">
											<input type='text' name = 't_systemheat_dependent' id = 't_systemheat_dependent' class='form-controls' value="<?= (strlen($objects['t_systemheat_dependent'])>0 ? $spr_ot_systemheat_dependent['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_ot_systemheat_dependent')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_systemheat_dependent')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_systemheat_dependent'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>									
								<div id="sp">	
									<div class="form-group">
										<label for = 't_spr_ot_type_to' class='label_subject'>Вид теплообменника:</label>
											<input type="hidden" name="t_spr_ot_type_to_id" id="t_spr_ot_type_to_id" value="<?= (strlen($objects['t_spr_id_ot_type_to'])>0 ? $spr_ot_type_to['id'] : '')?>">
											<input type='text' name = 't_spr_ot_type_to' id = 't_spr_ot_type_to' class='form-controls' value="<?= (strlen($objects['t_spr_id_ot_type_to'])>0 ? $spr_ot_type_to['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_ot_type_to')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_spr_ot_type_to')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_type_to'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>
									<div class="form-group">
										<label for = 't_systemheat_mark_to' class='label_subject'>Марка теплообменника:</label>
										<input type='text' name = 't_systemheat_mark_to' id = 't_systemheat_mark_to' class='form-controls' value="<?= $objects['t_systemheat_mark_to'] ?>">
									</div>
								</div>
								<hr/>
								
								
								<p class="p_gaz">Горячее водоснабжение</p>
									<div class="form-group">
										<label for = 't_gvs_open' class='label_subject'>Тип схемы:</label>
											<input type="hidden" name="t_gvs_open_id" id="t_gvs_open_id" value="<?= (strlen($objects['t_gvs_open'])>0 ? $spr_ot_gvs_open['id'] : '')?>">
											<input type='text' name = 't_gvs_open' id = 't_gvs_open' class='form-controls' value="<?= (strlen($objects['t_gvs_open'])>0 ? $spr_ot_gvs_open['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_ot_gvs_open')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_gvs_open')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_gvs_open'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>
								<div id="ot">
																			
									<div class="form-group">
										<label for = 't_gvs_connect' class='label_subject'>Место присоединения:</label>
										<input type='text' name = 't_gvs_connect' id = 't_gvs_connect' class='form-controls' value="<?= $objects['t_gvs_connect'] ?>">
									</div>						
									<div class="form-group">
										<label for = 't_gvs_type' class='label_subject'>Вид теплообменника:</label>
										<input type='text' name = 't_gvs_type' id = 't_gvs_type' class='form-controls' value="<?= $objects['t_gvs_type'] ?>">
									</div>								
									<div class="form-group">
										<label for = 't_gvs_mark' class='label_subject'>Марка теплообменника:</label>
										<input type='text' name = 't_gvs_mark' id = 't_gvs_mark' class='form-controls' value="<?= $objects['t_gvs_mark'] ?>">
									</div>										
								</div>
								<hr/>

								<p class="p_gaz">Приточная вентиляция</p>
									<div class="form-group">
										<label for = 't_forced_vent_place' class='label_subject'>Место присоединения:</label>
										<input type='text' name = 't_forced_vent_place' id = 't_forced_vent_place' class='form-controls' value="<?= $objects['t_forced_vent_place'] ?>">
									</div>								
									<div class="form-group">
										<label for = 't_forced_vent_count' class='label_subject'>Количество вентиляционных систем, шт.:</label>
										<input type='text' name = 't_forced_vent_count' id = 't_forced_vent_count' class='form-controls' value="<?= $objects['t_forced_vent_count'] ?>">
									</div>
								<hr/>
									
								
									
								<p class="p_gaz">Нагрузки</p>
									<div class="form-group">
										<label class='label_subject'>Общая нагрузка, Гкал/ч: </label><p class='label_subject' id="sum_workload"></p>
									</div>
									<div class="form-group">
										<label for = 't_workload_heating' class='label_subject'>Нагрузка на отопление, Гкал/ч:</label>
										<input type='number' name = 't_workload_heating' id = 't_workload_heating' class='form-controls' value="<?= ($objects['t_workload_heating']>0 ? $objects['t_workload_heating'] : '') ?>">
									</div>
									<div class="form-group">
										<label for = 't_workload_gvs' class='label_subject'>Нагрузка на ГВС, Гкал/ч:</label>
										<input type='number' name = 't_workload_gvs' id = 't_workload_gvs' class='form-controls' value="<?= ($objects['t_workload_gvs']>0 ? $objects['t_workload_gvs'] : '') ?>">
									</div>									
									<div class="form-group">
										<label for = 't_workload_pov' class='label_subject'>Нагрузка на приточно-отопительную вентиляцию, Гкал/ч:</label>
										<input type='number' name = 't_workload_pov' id = 't_workload_pov' class='form-controls' value="<?= ($objects['t_workload_pov']>0 ? $objects['t_workload_pov'] : '') ?>">
									</div>									
									<div class="form-group">
										<label for = 't_workload_tech' class='label_subject'>Технологическая нагрузка, Гкал/ч:</label>
										<input type='number' name = 't_workload_tech' id = 't_workload_tech' class='form-controls' value="<?= ($objects['t_workload_tech']>0 ? $objects['t_workload_tech'] : '') ?>">
									</div>																		
									<div class="form-group">
										<label for = 't_workload_vapor' class='label_subject'>В паре, т/ч:</label>
										<input type='number' name = 't_workload_vapor' id = 't_workload_vapor' class='form-controls' value="<?= $objects['t_workload_vapor'] ?>">
									</div>										
									<div class="form-group">
										<label for = 't_workload_percent' class='label_subject'>Процент возврата конденсата, %:</label>
										<input type='number' name = 't_workload_percent' id = 't_workload_percent' class='form-controls' value="<?= $objects['t_workload_percent'] ?>">
									</div>
								<hr/>

									
									
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
												<label for = 't_armor_crach' class='label_object'>Нагрузка аварийной брони, Гкал/ч:</label>
												<input type='text' name = 't_armor_crach' id = 't_armor_crach' class='form-controls' value="<?= $objects['t_armor_crach'] ?>">
											</div>
											<div class="form-group">
												<label for = 't_armor_crach_vapor' class='label_object'>Нагрузка аварийной брони, т/ч:</label>
												<input type='text' name = 't_armor_crach_vapor' id = 't_armor_crach_vapor' class='form-controls' value="<?= $objects['t_armor_crach_vapor'] ?>">
											</div>
											<div class="form-group">
												<label for = 't_armor_tech ' class='label_object'>Нагрузка технологической брони, Гкал/ч:</label>
												<input type='text' name = 't_armor_tech' id = 't_armor_tech' class='form-controls' value="<?= $objects['t_armor_tech'] ?>">
											</div>
											<div class="form-group">
												<label for = 't_armor_tech_vapor ' class='label_object'>Нагрузка технологической брони, т/ч:</label>
												<input type='text' name = 't_armor_tech_vapor' id = 't_armor_tech_vapor' class='form-controls' value="<?= $objects['t_armor_tech_vapor'] ?>">
											</div>
											<div class="form-group">
												<label for = 't_armor_time ' class='label_object'>Время завершения технологического процесса, ч.:</label>
												<input type='text' name = 't_armor_time' id = 't_armor_time' class='form-controls' value="<?= $objects['t_armor_time'] ?>">
											</div>
											<div class="form-group">
												<label for = 't_armor_date' class='label_subject'>Дата составления акта:</label>
												<input type='date' name = 't_armor_date' id = 't_armor_date' class='form-controls' value="<?= $objects['t_armor_date'] ?>">
											</div>

									</div>
									
									<hr/>
								
									<div class="form-group">
										<label for='del_t'>Удалить объект тепловой энергии</label>
										<input type='checkbox' name='del_t' id='del_t' <?php echo ($objects['del_t'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
									</div>

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
														echo "<input type='checkbox' name = 'ti_is' id= 'ti_is' class='custom-checkbox' checked='checked' value='1' onclick='object.is_teplo_source()'>";	
													}else{
														echo "<input type='checkbox' name = 'ti_is' id= 'ti_is' class='custom-checkbox'  value='0' onclick='object.is_teplo_source()'>";
													}
												?>											
												<label for = 'ti_is' class='label_subject'>Теплоисточник</label>
										</div>
									</div>
									
									
									<div id = "ti_section">
									<hr/>
									<div class="form-group">
										<label for="formTitle" class='label_subject'>Закрепленный инспектор:</label>
										<select class="form-controls" name="Insp_ti" id="Insp_ti">
											<option value='0'>Выберите инспектора</option>
												<?php foreach($usersTeplo as $user):?>
													<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['ti_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
												<?php endforeach; ?>
										</select>
									</div>
									<hr/>
									<div class="form-group">
												<label for = 'ti_name' class='label_object'><span class = "formTextRed">*</span>Наименование теплоисточника:</label>
												<textarea name = 'ti_name' id = 'ti_name' class='form-controls' cols="50" rows="1" placeholder="Наименование"><?= $objects['ti_name'] ?></textarea>
									</div>
									<div class="form-group">
										<div class="checkbox">
											<?php 
												if($objects['ti_reestr'] == 1){
													echo "<input type='checkbox' name = 'ti_reestr' id= 'ti_reestr' class='custom-checkbox' checked='checked' value='1' onclick='object.ti_reestr()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_reestr' id= 'ti_reestr' class='custom-checkbox'  value='0' onclick='object.ti_reestr()'>";
												}
											?>											
											<label for = 'ti_reestr' class='label_subject'>Включить в реестр ТИ</label>
										</div>
									</div>

									
									


									<div class="form-group">
										<label for = 'oti_boiler' class='label_subject'>Назначение котельной:</label>
											<input type="hidden" name="oti_boiler_id" id="oti_boiler_id" value="<?= (strlen($objects['ti_id_spr_ot_boiler_type'])>0 ? $spr_oti_boiler_type['id'] : '')?>">
											<input type='text' name = 'oti_boiler' id = 'oti_boiler' class='form-controls' value="<?= (strlen($objects['ti_id_spr_ot_boiler_type'])>0 ? $spr_oti_boiler_type['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_oti_boiler_type')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('oti_boiler')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_oti_boiler_type'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>

									<div class="form-group">
										<label for = 'ti_year' class='label_subject'>Год ввода в эксплуатацию:</label>
											<input type='text' name = 'ti_year' id = 'ti_year' class='form-controls' value="<?= $objects['ti_year'] ?>">
									</div>
								
									<div class="form-group">
										<label for = 'ti_power' class='label_subject'>Установленная мощность котельной, Гкал/ч:</label>
											<input type='text' name = 'ti_power' id = 'ti_power' class='form-controls' value="<?= $objects['ti_power'] ?>">
									</div>

									<div class="form-group">
										<label for = 'oti_type_fuel' class='label_subject'>Вид основного топлива:</label>
											<input type="hidden" name="oti_type_fuel_id" id="oti_type_fuel_id" value="<?= (strlen($objects['ti_id_spr_ot_type_fuel_1'])>0 ? $spr_oti_type_fuel['id'] : '')?>">
											<input type='text' name = 'oti_type_fuel' id = 'oti_type_fuel' class='form-controls' value="<?= (strlen($objects['ti_id_spr_ot_type_fuel_1'])>0 ? $spr_oti_type_fuel['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_oti_type_fuel')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('oti_type_fuel')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_oti_type_fuel'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>

									<div class="form-group">
										<label for = 'oti_type_fuel_rezerv' class='label_subject'>Вид резервного топлива:</label>
											<input type="hidden" name="oti_type_fuel_rezerv_id" id="oti_type_fuel_rezerv_id" value="<?= (strlen($objects['ti_id_spr_ot_type_fuel_2'])>0 ? $spr_oti_type_fuel_rezerv['id'] : '')?>">
											<input type='text' name = 'oti_type_fuel_rezerv' id = 'oti_type_fuel_rezerv' class='form-controls' value="<?= (strlen($objects['ti_id_spr_ot_type_fuel_2'])>0 ? $spr_oti_type_fuel_rezerv['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_oti_type_fuel_rezerv')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('oti_type_fuel_rezerv')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_oti_type_fuel_rezerv'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>
									<hr/>
									
									<div>
										<p class="p_gaz">Водогрейные котлы</p>
									</div>	
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="boiler_water">
												<thead>
													<tr>
														<th class="t2">Наименование/Марка</th>
														<th class="t4">Год ввода в эксплуатацию</th>
														<th class="t4">Мощность, Гкал/ч</th>
														<th class="t5"></th>
													</tr>
												</thead>
												<tbody>
													<?php 
													foreach($obj_oti_boiler_waters as $oti_boiler_water){
														echo '<tr id_boiler_water="'.$oti_boiler_water['id'].'">';
														echo '<td name="type">'.$oti_boiler_water['type'].'</td>';
														echo '<td name="year">'.$oti_boiler_water['year'].'</td>';
														echo '<td name="power">'.$oti_boiler_water['power'].'</td>';
														echo '<td><div class="menu-item-event"><div><button class="button-edit"  onclick = "modalWindow.openModalEdit(\'ModalBoiler_water\','.$oti_boiler_water['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'boiler_water\','.$oti_boiler_water['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
													};?>
													

												</tbody>
											</table>	
										</div>
									<div>
											<button onclick = "modalWindow.openModal('ModalBoiler_water')"  class='add_button'>Добавить элемент</button>
									</div>	
									<hr/>
									
									<div>
										<p class="p_gaz">Паровые котлы</p>
									</div>	
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="boiler_vapor">
												<thead>
													<tr>
														<th class="t2">Наименование/Марка</th>
														<th class="t4">Год ввода в эксплуатацию</th>
														<th class="t4">Производительность, т/ч</th>
														<th class="t5"></th>
													</tr>
												</thead>
												<tbody>
													<?php 
													foreach($obj_oti_boiler_vapors as $oti_boiler_vapor){
														echo '<tr id_boiler_vapor="'.$oti_boiler_vapor['id'].'">';
														echo '<td name="type">'.$oti_boiler_vapor['type'].'</td>';
														echo '<td name="year">'.$oti_boiler_vapor['year'].'</td>';
														echo '<td name="power">'.$oti_boiler_vapor['power'].'</td>';
														echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalBoiler_vapor\','.$oti_boiler_vapor['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'boiler_vapor\','.$oti_boiler_vapor['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
													};?>
													

												</tbody>
											</table>	
										</div>
										<div>
											<button onclick = "modalWindow.openModal('ModalBoiler_vapor')" class='add_button'>Добавить элемент</button>
										</div>
									<hr/>
									
									<p class="p_gaz">Вид отпускаемой тепловой энергии</p>
									<div class="checkbox">
											<?php 
												if($objects['ti_out_power_ot'] == 1){
													echo "<input type='checkbox' name = 'ti_out_power_ot' id= 'ti_out_power_ot' class='custom-checkbox' checked='checked' value='1' onclick='object.power_ot()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_out_power_ot' id= 'ti_out_power_ot' class='custom-checkbox'  value='0' onclick='object.power_ot()'>";
												}
											?>
											<label for = 'ti_out_power_ot' class='label_subject'>на отопление</label>
									</div>
									<div class="checkbox">
											<?php 
												if($objects['ti_out_power_gvs'] == 1){
													echo "<input type='checkbox' name = 'ti_out_power_gvs' id= 'ti_out_power_gvs' class='custom-checkbox' checked='checked' value='1' onclick='object.power_gvs()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_out_power_gvs' id= 'ti_out_power_gvs' class='custom-checkbox'  value='0' onclick='object.power_gvs()'>";
												}
											?>											
											<label for = 'ti_out_power_gvs' class='label_subject'>на ГВС</label>
									</div>
									<div class="checkbox">
											<?php 
												if($objects['ti_out_power_tech'] == 1){
													echo "<input type='checkbox' name = 'ti_out_power_tech' id= 'ti_out_power_tech' class='custom-checkbox' checked='checked' value='1' onclick='object.power_tech()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_out_power_tech' id= 'ti_out_power_tech' class='custom-checkbox'  value='0' onclick='object.power_tech()'>";
												}
											?>											
											<label for = 'ti_out_power_tech' class='label_subject'>на технологические нужды</label>
									</div>
									<div class="checkbox">
											<?php 
												if($objects['ti_out_power_vent'] == 1){
													echo "<input type='checkbox' name = 'ti_out_power_vent' id= 'ti_out_power_vent' class='custom-checkbox' checked='checked' value='1' onclick='object.power_vent()'>";	
												}else{
													echo "<input type='checkbox' name = 'ti_out_power_vent' id= 'ti_out_power_vent' class='custom-checkbox'  value='0' onclick='object.power_vent()'>";
												}
											?>												
											<label for = 'ti_out_power_vent' class='label_subject'>на вентиляцию</label>
									</div>
									<hr/>
									
									<div>
										<p class="p_gaz">Тепловые сети на балансе теплоисточника</p>
									</div>	
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_heatnet">
												<thead>
													<tr>
														<!--th class="t2">Принадлежность</th-->
														<th class="t3">Точка подключения</th>
														<th class="t3">Длина участка, м.</th>
														<th class="t3">Условный диаметр, мм.</th>
														<th class="t3">Кол-во труб, шт.</th>
														<th class="t3">Техническое исполнение</th>
														<th class="t3">Тип трубы</th>
														<th class="t3">Вид изоляции</th>
														<th class="t5"></th>
													</tr>
												</thead>
												<tbody>
													<?php 																										
													foreach($obj_ot_heatnets as $one_obj_ot_heatnet){
														
														echo '<tr id_obj_ot_heatnet="'.$one_obj_ot_heatnet['id'].'">';
														//echo '<td type_obj_heatnet="'.$one_obj_ot_heatnet['type_obj'].'">'.$one_obj_ot_heatnet['name_type'].'</td>';
														echo '<td name="conect_point">'.$one_obj_ot_heatnet['conect_point'].'</td>';
														echo '<td name="length">'.$one_obj_ot_heatnet['length'].'</td>';
														echo '<td name="diameter">'.$one_obj_ot_heatnet['diameter'].'</td>';
														echo '<td name="count_tube">'.$one_obj_ot_heatnet['count_tube'].'</td>';
														echo '<td heatnet_underground="'.$one_obj_ot_heatnet['underground'].'" >'.$one_obj_ot_heatnet['name_underground'].'</td>';
														echo '<td type_isolation="'.$one_obj_ot_heatnet['isolation'].'">'.$one_obj_ot_heatnet['name_iso'].'</td>';
														echo '<td heatnet_type_isolation="'.$one_obj_ot_heatnet['type_isolation'].'">'.$one_obj_ot_heatnet['name_izol'].'</td>';
														echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalObj_ot_heatnet\','.$one_obj_ot_heatnet['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="object.removeTableItem(\'obj_ot_heatnet\','.$one_obj_ot_heatnet['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
													};?>
													

												</tbody>
											</table>	
										</div>
										<div>
											<button onclick = "modalWindow.openModal('ModalObj_ot_heatnet')"  class='add_button'>Добавить элемент</button>
										</div>
										<hr/>
										<div>
											<p class="p_gaz">Подключенные объекты</p>
										</div>
										<div>
											
											<?php
											foreach($mkm_object_t_ti_tis as $mkm_object_t_ti_ti){
															
													echo "<p id_mkm_object_t_ti='".$mkm_object_t_ti_ti['id']."'>";
													echo "<span>".($mkm_object_t_ti_ti['id_unp_sbj_own'] == $mkm_object_t_ti_ti['id_unp_sbj_ti'] ? "Собственный объект: " : "Сторонний объект: ")."</span>";
													echo "<span name='name_object'>".$mkm_object_t_ti_ti['name']." (".$mkm_object_t_ti_ti['reestr_subject_name'].")</span>";
													echo '</p>';
											}
											?>
										</div>
										<hr/>
										<div class="form-group">
											<label for='del_ti'>Удалить теплоисточник</label>
											<input type='checkbox' name='del_ti' id='del_ti' <?php echo ($objects['del_ti'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
										</div>
									</div>
									
									
								</section>
<!------------------------------------------------------     ВКЛАДКА ГАЗ  -------------------------------------------------------------------------->									
								<section id="content-tab5">
									<p class="p_gaz">Информация по газовому надзору</p>
									<hr/>
									<div class="form-group">
										<label for="formTitle" class='label_subject'>Закрепленный инспектор:</label>
										<select class="form-controls" name="Insp_gaz" id="Insp_gaz">
											<option value='0'>Выберите инспектора</option>
												<?php foreach($usersGaz as $user):?>
													<option value="<?=$user['id']?>"<?= ($user['id'] == $objects['g_insp'] ? 'selected="selected"' : '');?>><?=$user['fio']?></option>
												<?php endforeach; ?>
										</select>
									</div>
									<hr/>


									<div class="form-group">
										<label for="formTitle" class='label_subject'>Тип здания:</label>
										<select class="form-controls" name="type_home" id="type_home" onclick="object.og_hide_show(this.value)">
											<option value='0'>Выберите тип здания</option>
												<?php foreach($spr_type_home as $type_home):?>
													<option value="<?=$type_home['id']?>"<?= ($type_home['id'] == $objects['is_dom'] ? 'selected="selected"' : '');?>><?=$type_home['name']?></option>
												<?php endforeach; ?>
										</select>
										<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_type_home'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>

									<div class="form-group" id="m">
										<label for = 'count_flat' class='label_subject m'>Количество квартир, шт.:</label>
											<input type='hidden' name = 'count_flat' id = 'count_flat' class='form-controls' value="<?= $objects['g_count_flat'] ?>">
									</div>									
									<div class="form-group" id="m">
										<label for = 'count_pod' class='label_subject m'>Количество подъездов, шт:</label>
											<input type='hidden' name = 'count_pod' id = 'count_pod' class='form-controls' value="<?= $objects['g_count_entrance'] ?>">
											
									</div>
																		

									<div id="mop">
									<hr/>
										<p class="p_gaz">Установленное газоиспользующее оборудование</p>
									</div>	
									
									
										<div class="mobileTable" id="mot">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_og_device">
												<thead>
													<tr>
														<th class="t2">Тип</th>
														<th class="t3">Количество, шт.</th>
														<th class="t5"></th>
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
										<div id="mop">
											<button onclick = "modalWindow.openModal('ModalObj_og_device')"  class='add_button'>Добавить элемент</button>
										</div>
									<div class="form-group" id="mot">
										<hr/>
									</div>	
							
									<div class="form-group" id="mo">
										<label for = 'og_flue' class='label_subject'>Вид дымохода:</label>
									
											<input type="hidden" name="og_flue_id" id="og_flue_id" value="<?= (strlen($objects['g_id_spr_og_flue'])>0 ? $spr_vidDym['id'] : '')?>">
											<input type='text' name = 'og_flue' id = 'og_flue' class='form-controls' value="<?= (strlen($objects['g_id_spr_og_flue'])>0 ? $spr_vidDym['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_og_flue')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('og_flue')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_flue'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>
									<div class="form-group" id="mo">
										<label for = 'flue_mater' class='label_subject'>Материал дымохода:</label>
											<input type="hidden" name="flue_mater_id" id="flue_mater_id" value="<?= (strlen($objects['g_id_spr_og_flue_mater'])>0 ? $spr_flue_mater['id'] : '')?>">
											<input type='text' name = 'flue_mater' id = 'flue_mater' class='form-controls' value="<?= (strlen($objects['g_id_spr_og_flue_mater'])>0 ? $spr_flue_mater['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_flue_mater')">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('flue_mater')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_flue_mater'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>								
									<div class="form-group" id="mo">
										<label for = 'flue_size' class='label_subject'>Размер сечения дымохода, мм.:</label>
											<input type='text' name = 'flue_size' id = 'flue_size' class='form-controls' value="<?= $objects['g_flue_size'] ?>">
									</div>
									<div class="form-group" id="o">
										<label for = 'type_gaz' class='label_subject o'>Вид газа:</label>
											<input type="hidden" name="type_gaz_id" id="type_gaz_id" value="<?= (strlen($objects['g_id_spr_og_type_gaz'])>0 ? $spr_type_gaz['id'] : '')?>">
											<input type='hidden' name = 'type_gaz' id = 'type_gaz' class='form-controls' value="<?= (strlen($objects['g_id_spr_og_type_gaz'])>0 ? $spr_type_gaz['name'] : '')?>">
											<button onclick = "modalWindow.openModal('openModalSpr_type_gaz')" class="button_o">...</button>
											<div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('type_gaz')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
											<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_type_gaz'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									</div>
									
									<hr/>
									<div class="form-group">
										<label for='del_g'>Удалить объект газового надзора</label>
										<input type='checkbox' name='del_g' id='del_g' <?php echo ($objects['del_g'] == 1 ? "checked='checked' value='1'" : "value='0'" );?>></input>
									</div>
								</section> 	
							<!--------конец секции вкладок------------->
						</div>	  
				
														<div class="group">
															<div class="group-button">
																<button type="submit" class="btn btn-primary" onclick="object.update('cancel')">Сохранить и закрыть</button>
																<button type="submit" class="btn btn-primary" onclick="object.update('continue')">Сохранить и продолжить</button>
																<!--a href="/ARM/admin/objects/list/<?//= $subject['id'] ?>" class="submit_cancel"><button type="submit" class="btn btn-primary">Отмена</button></a-->
																<a href="javascript:history.back()" class="submit_cancel btn-primary" onclick="object.cancel()">Отмена</a>
															</div>
														</div>	
						
                    </form>
											<div id="messenger"></div>
            </div>
        </div>
    </main>
<?php Theme::block('modal/modalSearchSubject') ?>	
<?php Theme::block('modal/modal_Spr_ot_functions') ?>
<?php Theme::block('modal/modal_Spr_ot_cat') ?>	
<?php Theme::block('modal/modal_Obj_ot_heatnet') ?>	
<?php Theme::block('modal/modal_Obj_ot_heatnet_t') ?>	
<?php Theme::block('modal/modal_Obj_og_device') ?>
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
<?php Theme::block('modal/modalSearchUnp') ?>
<?php Theme::block('modal/modal_Obj_oe_avr') ?>
<?php Theme::block('modal/modal_Obj_oe_aie') ?>
<?php Theme::block('modal/modal_Obj_oe_trp') ?>
<?php Theme::block('modal/modal_Obj_oe_klvl') ?>
<?php Theme::block('modal/modal_Obj_oe_block') ?>
<?php Theme::block('modal/SubjectInfo') ?>
<?php Theme::block('modal/modal_GuidesfromSubject') ?>
<?php $this->theme->footer(); ?>

<script src="/ARM/admin/Assets/js/checkObject.js"></script>