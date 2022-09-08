<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-subject"></i></span><p>Потребители</p></div>
    <main>
        <div class="container">
			<div class="top_of_page sticky_body">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Регистрация</h5>
					<h3><span><i class="icon-subject">&nbsp</i></span><i class='rp-i-o'>Новый</i></h3>
                </div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/subject/list/" class="button_unp"><span><i class="icon-pin"></i></span>Мои потребители</a>
					<a href="/ARM/basis/subject/" class="button_unp"><span><i class="icon-magnifier"></i></span><i class='rp-r-os'>Поиск</i></a>
					
				</div>
            </div>
			
            <div class="base_part">
                
                <form id="formPage" mode="new_subject" class='form'  name="formPage">	
<!--------------------------------------------------------------------------------------------------->		
				
								<!---------------------------Юридическое лицо  или ФЛ закрепление--------------------------------------->
									<fieldset class = "fieldset_potr">								
										<legend class="legend_potr"><span><i class="icon-pin"></i></span>&nbspИнформация о проверяемом субъекте</legend>
											<div class="form-group">
												<div class="block w1-3">	
													<label for = 'search' class='label_subject'><span class = "formTextRed">*</span> Закрепить за:</label>
												</div>
												<div class="block w1-2">
													<label class='label_subject'>&#8226 ЮЛ или ИП</label>
													<p><br></p>
													<label class='label_subject'>&#8226 физ. лицом</label>
												</div>
												<div class="block w0-5">
													<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "btn_add vert_m6"><i class="icon-paper-clip tooltip"><span class = "tooltiptext">Выбрать<br>ЮЛ или ИП</span></i></button>
													<p><br></p>	
													<button onclick = "modalWindow.openModal('openModalIndPers')" id='ind_pers' class = "btn_add vert_m6"><i class="icon-paper-clip tooltip"><span class = "tooltiptext">Выбрать<br>физ.лицо</span></i></button>
												</div>
												<div class="block form-controls w8">
													<input type="hidden" name="formUnpId" id="formUnpId" value="<?php echo(isset($unp_head)? $unp_head['id']:'')?>">
													<input type="hidden" name="formIndPersId" id="formIndPersId">
													<span id="name_unp" class='label_subject'><?php echo(isset($unp_head)? $unp_head['name']:'')?>&#9668 выберите за кем будет закреплен новый региональный потребитель</span>
												</div>
											</div>
									</fieldset>
								
								<!---------------------------Наименование--------------------------------------->
								<fieldset class = "fieldset_potr">			
									<legend class="legend_potr"><span><i class="icon-subject"></i></span>&nbspНаименование регионального потребителя</legend>
											
											<div class="form-group">
												<div class="block w3">
													<label for = 'name_potr' class='label_subject'><span class = "formTextRed"><br>*</span><i>&nbspНаименование:</i></label>
												</div>	
												<div class="block w5">
													<textarea name = 'name_potr' id = 'name_potr' class='form-controls name_potr' cols="50" rows="1" placeholder="будет создано автоматически после выбора субъекта" disabled><?php echo(isset($unp_head)? $unp_head['name']:'')?></textarea>
												</div>
												<div class="block w2">
													<button onclick = "info.showInfo_01();" class = "btn_add"><i class="icon-question help"></i></button>
													<!--button class = "shine-button help" onclick="info.showInfo_01();"><i class="icon-question"></i></button-->
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
													<input type='checkbox' name = 'custom_name' id= 'custom_name' class='custom-checkbox'  value='0' onclick='subject.custom_name()' disabled>
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
											<!---------------------------Номер дела --------------------------------------->
											<div class="form-group">
												<div class="block w3">
													<label class='label_subject'>Номер дела:</label>
												</div>
												<input type='text' class='form-controls' disabled="" value="будет присвоен автоматически">
											</div>
											<div class="form-group">
												<div class="block w3">
													<label for = 'num_case' class='label_subject'>Нумерация дела в филиале:</label>
												</div>	
												<input type='text' name = 'num_case' id = 'num_case' class='form-controls'>
											</div>

											<!---------------------------Подчиненность--------------------------------------->	
											<div class="form-group">
												<div class="block w3">
													<label for="formTitle"  class='label_subject'><span class = "formTextRed">*</span>&nbspФорма собственности:</label>
												</div>	
												<select class="form-controls" name="TypeProperty" id="TypeProperty" onchange='department.selectDepartment()'>
														<option value='0'>Выберите форму собственности</option>
													<?php foreach($properties as $property):?>
														<option value=<?=$property['id']?>><?=$property['name']?></option>
													 <?php endforeach; ?>
												</select>
													<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_property'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
											</div>		
											<!---------------------- ведомственная принадлежность ----------------------------------------------->			
											<div class="form-group">
												<div class="block w3">
													<label for="formTitle"  class='label_subject'><span class = "formTextRed">*</span>&nbspВедомственная принадлежность:</label>
												</div>	
												<select class="form-controls"  name="nameDepartment" id="nameDepartment">
													<option value='0'>Выберите ведомственную принадлежность</option>
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
														<option value=<?=$one_spr_kind_of_activity['id']?>><?=$one_spr_kind_of_activity['name']?></option>
													 <?php endforeach; ?>
												</select>
													<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_kind_of_activity'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
											</div>											
											
											<div class="form-group" class='label_subject'>
												<div class="block w3">
													<label for="formTitle" class='label_subject'>Сменность работ:</label>
												</div>	
												<select class="form-controls" name="shift_work" id="shift_work">
													<option value='0'>Выберите сменность работ</option>
													<?php foreach($spr_shift_of_work as $one_spr_shift_of_work):?>
														<option value=<?=$one_spr_shift_of_work['id']?>><?=$one_spr_shift_of_work['name']?></option>
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
													<input type="hidden" name="formUnpHeadId" id="formUnpHeadId" value="0">
													<span id="formUnpHead"></span>
												</div>
												
												<!--div class="but_clear_div">
												<div class="tooltip"><button class = "btn_clear_fields" onclick="subject.clear_fields('formUnpHead')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
												</div-->
												
											</div>
										
								</fieldset>	
						
<!---------------------------------------------------------------------------------------Фактический адрес------------------------------------------------------>							
												
								<fieldset hidden>											<?php Theme::block('address/addressBranch') ?>
								</fieldset>
											<?php Theme::block('address/addressFact') ?>						
									
<!---------------------------------------------------------------------------------------Почтовый адрес------------------------------------------------------>							
											<div class="checkbox">	
												<input type='checkbox' name = 'e_copy_postaddress' id = 'e_copy_postaddress' class='custom-checkbox' value="0" onclick="subject.e_copy_postaddress()">
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
													<input type='text' name = 'dir_fam' id = 'dir_fam' class='form-controls'>
												</div>
												<div class="ruk_div block w2">														
													<input type='text' name = 'dir_name' id = 'dir_name' class='form-controls'>
												</div>
												<div class="ruk_div block w2">														
													<input type='text' name = 'dir_otch' id = 'dir_otch' class='form-controls'>
												</div>
												<div class="ruk_div block w2">														
													<input type='text' name = 'dir_tel' id = 'dir_tel' class='form-controls'>
												</div>
											</div>
											<div class="form-group">
												<div class="block w3">
													<p class = "ruk_info">Главный инженер</p>
												</div>	
												<div class="ruk_div block w2">
													<input type='text' name = 'ing_fam' id = 'ing_fam' class='form-controls'>
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'ing_name' id = 'ing_name' class='form-controls'>
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'ing_otch' id = 'ing_otch' class='form-controls'>
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'ing_tel' id = 'ing_tel' class='form-controls'>
												</div>
											</div>
											<div class="form-group">
												<div class="block w3">
													<p class = "ruk_info">Главный энергетик</p>
												</div>	
												<div class="ruk_div block w2">
													<input type='text' name = 'en_fam' id = 'en_fam' class='form-controls'>
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'en_name' id = 'en_name' class='form-controls'>
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'en_otch' id = 'en_otch' class='form-controls'>
												</div>
												<div class="ruk_div block w2">
													<input type='text' name = 'en_tel' id = 'en_tel' class='form-controls'>
												</div>
											</div>

								</fieldset>		
						
<!--------------------------------------------------Ответственные лица------------------------------------------------------>				
											
								<fieldset class = "fieldset_potr">
											<legend class="legend_potr"><span><i class="icon-people"></i></span>&nbspОтветственные лица</legend>

															<!-------------------ЭЛЕКТРОХОЗЯЙСТВО------------------->
										<div id="container-main">											
										<div class="accordion-container">
											<a href="#" class="accordion-titulo"><div><p id = "otv_l_count"><span></span>&nbspза электрохозяйство</p></div><span class="toggle-icon"></span></a>
											<div class="accordion-content">	
													
												
												<div class="form-group">
													<div class="block w2-5">
														<label for="formTitle" class='label_subject'>Тип ответственного:</label>
													</div>
														<select class="form-controls" name="otv_type_e" id="otv_type_e"  onclick="subject.type_otv_hide_show(this.value)">
															<option value='0'>Выберите тип ответственного:</option>
																<?php foreach($spr_otv_vibor as $type_otv):?>
																	<option value=<?=$type_otv['id']?>><?=$type_otv['name']?></option>
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
																					echo "<tr id_otv_eh_osn_sob='1'>";
																						echo "<td width='5%' name='otv_num_eh_osn_sob'>1</td>";
																						echo "<td width='30%' name='otv_fio_eh_osn_sob'></td>";
																						echo "<td width='30%' name='otv_dolg_sub_eh_osn_sob'></td>";
																						echo "<td width='10%' name='otv_pr_eh_osn_sob'></td>";
																						echo "<td width='10%' name='otv_dog_eh_osn_sob'></td>";
																						echo "<td width='10%' name='otv_group_eh_osn_sob'></td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_eh_sob'), subject.insert_row(1)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																						echo "</tr>";

																					echo "<tr id_otv_eh_osn_sob='2'>";
																						echo "<td width='5%' name='otv_num_eh_zam_sob'>2</td>";
																						echo "<td width='30%' name='otv_fio_eh_zam_sob'></td>";
																						echo "<td width='30%' name='otv_dolg_sub_zam_osn_sob'></td>";
																						echo "<td width='10%' name='otv_pr_eh_zam_sob'></td>";
																						echo "<td width='10%' name='otv_dog_eh_zam_sob'></td>";
																						echo "<td width='10%' name='otv_group_eh_zam_sob'></td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_eh_sob'), subject.insert_row(2)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																						echo "</tr>";													
																			?>
																														
															</tbody>
														
														</table>
													</div>	
														<input type="hidden" class='label_subject' id = "otv_e1_sob" name="otv_e1_sob" value="">
														<input type="hidden" class='label_subject' id = "otv_e1_sob_num_pr" name="otv_e1_sob_num_pr" value="">
														<input type="hidden" class='label_subject' id = "otv_e1_sob_date_pr" name="otv_e1_sob_date_pr" value="">
														<input type="hidden" class='label_subject' id = "otv_e2_sob" name="otv_e2_sob" value="">
														<input type="hidden" class='label_subject' id = "otv_e2_sob_num_pr" name="otv_e2_sob_num_pr" value="">
														<input type="hidden" class='label_subject' id = "otv_e2_sob_date_pr" name="otv_e2_sob_date_pr" value="">															
															
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
																			echo "<tr id_otv_eh_osn_st='3'>";
																			echo "<td width='5%' name='otv_num_eh_osn_st'>1</td>";
																			echo "<td width='30%' name='otv_fio_eh_osn_st'></td>";
																			echo "<td width='30%' name='otv_dolg_sub_eh_osn_st'></td>";
																			echo "<td width='10%' name='otv_pr_eh_osn_st'></td>";
																			echo "<td width='10%' name='otv_dog_eh_osn_st'></td>";
																			echo "<td width='10%' name='otv_group_eh_osn_st'></td>";
																			echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_eh_st'), subject.insert_row_st(3)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";												
																?>
																

															</tbody>
														</table>	
													</div>
													<input type="hidden" class='label_subject' id = "otv_e_st" name="otv_e_st" value="">
													<input type="hidden" class='label_subject' id = "otv_e_st_num_pr" name="otv_e_st_num_pr" value="">
													<input type="hidden" class='label_subject' id = "otv_e_st_date_pr" name="otv_e_st_date_pr" value="">
													<input type="hidden" class='label_subject' id = "otv_e_st_num_dog" name="otv_e_st_num_dog" value="">
													<input type="hidden" class='label_subject' id = "otv_e_st_date_dog" name="otv_e_st_date_dog" value="">
													<input type="hidden" class='label_subject' id = "otv_e_st_date_dog_cont" name="otv_e_st_date_dog_cont" value="">
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
																			echo "<td width='30%' name='otv_fio_eh_osn_instr'></td>";
																			echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_eh_instr'), subject.insert_row_instr(4)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";

													
																?>
																

															</tbody>
														</table>	
													</div>
													<input type="hidden" class='label_subject' id = "data_instr_dir" name="data_instr_dir" value="">	
												</div>											
											
											</div>
										</div>
									</div>
										

																		<!-------------------Ответственные лица------------------->
										<div id="container-main">											
										<div class="accordion-container">
											<a href="#" class="accordion-titulo"><div><p id = "otv_l_count"><span></span>&nbspза тепловое хозяйство</p></div><span class="toggle-icon"></span></a>
											<div class="accordion-content">	
													
												
												<div class="form-group">
													<div class="block w2-5">
														<label for="formTitle" class='label_subject'>Тип ответственного:</label>
													</div>
														<select class="form-controls" name="otv_type_t" id="otv_type_t"  onclick="subject.type_otv_hide_show_t(this.value)">
															<option value='0'>Выберите тип ответственного:</option>
																<?php foreach($spr_otv_vibor as $type_otv):?>
																	<option value=<?=$type_otv['id']?>><?=$type_otv['name']?></option>
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
																						echo "<td width='30%' name='otv_fio_th_osn_sob'></td>";
																						echo "<td width='30%' name='otv_dolg_sub_th_osn_sob'></td>";
																						echo "<td width='10%' name='otv_pr_th_osn_sob'></td>";
																						echo "<td width='10%' name='otv_dog_th_osn_sob'></td>";
																						//echo "<td width='10%' name='otv_group_th_osn_sob'></td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_th_sob'), subject.insert_row_t(5)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																						echo "</tr>";

																					echo "<tr id_otv_th_osn_sob='6'>";
																						echo "<td width='5%' name='otv_num_th_zam_sob'>2</td>";
																						echo "<td width='30%' name='otv_fio_th_zam_sob'></td>";
																						echo "<td width='30%' name='otv_dolg_sub_zam_t_osn_sob'></td>";
																						echo "<td width='10%' name='otv_pr_th_zam_sob'></td>";
																						echo "<td width='10%' name='otv_dog_th_zam_sob'></td>";
																						//echo "<td width='10%' name='otv_group_th_zam_sob'></td>";
																						echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_th_sob'), subject.insert_row_t(6)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";																			
																						echo "</tr>";													
																			?>
																														
															</tbody>
														
														</table>
													</div>	
														<input type="hidden" class='label_subject' id = "otv_t1_sob" name="otv_t1_sob" value="">
														<input type="hidden" class='label_subject' id = "otv_t1_sob_num_pr" name="otv_t1_sob_num_pr" value="">
														<input type="hidden" class='label_subject' id = "otv_t1_sob_date_pr" name="otv_t1_sob_date_pr" value="">
														<input type="hidden" class='label_subject' id = "otv_t2_sob" name="otv_t2_sob" value="">
														<input type="hidden" class='label_subject' id = "otv_t2_sob_num_pr" name="otv_t2_sob_num_pr" value="">
														<input type="hidden" class='label_subject' id = "otv_t2_sob_date_pr" name="otv_t2_sob_date_pr" value="">															
															
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
																			echo "<td width='30%' name='otv_fio_th_osn_st'></td>";
																			echo "<td width='30%' name='otv_dolg_sub_th_osn_st'></td>";
																			echo "<td width='10%' name='otv_pr_th_osn_st'></td>";
																			echo "<td width='10%' name='otv_dog_th_osn_st'></td>";
																			//echo "<td width='10%' name='otv_group_th_osn_st'></td>";
																			echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_th_st'), subject.insert_row_st_t(7)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";												
																?>
																

															</tbody>
														</table>	
													</div>
													<input type="hidden" class='label_subject' id = "otv_t_st" name="otv_t_st" value="">
													<input type="hidden" class='label_subject' id = "otv_t_st_num_pr" name="otv_t_st_num_pr" value="">
													<input type="hidden" class='label_subject' id = "otv_t_st_date_pr" name="otv_t_st_date_pr" value="">
													<input type="hidden" class='label_subject' id = "otv_t_st_num_dog" name="otv_t_st_num_dog" value="">
													<input type="hidden" class='label_subject' id = "otv_t_st_date_dog" name="otv_t_st_date_dog" value="">
													<input type="hidden" class='label_subject' id = "otv_t_st_date_dog_cont" name="otv_t_st_date_dog_cont" value="">
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
																			echo "<td width='30%' name='otv_fio_th_osn_instr'></td>";
																			echo "<td width='5%'><div class='menu-item-event'><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalOtv_th_instr'), subject.insert_row_instr_t(8)\"><i class='icon-fixed-width icon-pencil'></i></button></div></td>";

													
																?>
																

															</tbody>
														</table>	
													</div>
													<input type="hidden" class='label_subject' id = "data_instr_dir_t" name="data_instr_dir_t" value="">	
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
											
												<textarea name = 'dogovor_name' id = 'dogovor_name' class='form-controls' cols="50" rows="1"></textarea>
											</div>
											<!---------------------- Номер договора и дата ----------------------------------------------->
											<!--div class="form-group">
												<div>
													<div class="block w2">
														<label for = 'dogovor_num' class='label_subject'>Номер договора:</label>
													</div>	
													<input type='text' name = 'dogovor_num' id = 'dogovor_num' class='form-controls'>
												</div>
												<div>
													<label for = 'dogovor_date' class='label_subject'>Дата договора:</label>
													<input type='date' name = 'dogovor_date' id = 'dogovor_date' class='form-controls'>
												</div>
											</div>


								</fieldset>	
<!--------------------------------------------------Договор с теплоснабжающей организацией------------------------------------------------------>				
											
								<!--fieldset class = "fieldset_potr">
											<legend class="legend_potr"><span><i class="icon-doc"></i></span>&nbspДоговор теплоснабжения</legend>
											<!---------------------- Заключен договор с ----------------------------------------------->
											<!--div class="form-group">
												<div class="block w2">
													<label for = 'dogovor_name_t' class='label_subject'>Наименование:</label>
												</div>
												<textarea name = 'dogovor_name_t' id = 'dogovor_name_t' class='form-controls' cols="50" rows="1"></textarea>
											</div>
											<!---------------------- Номер договора и дата ----------------------------------------------->
											<!--div class="form-group">
												<div>
													<div class="block w2">
														<label for = 'dogovor_num_t' class='label_subject'>Номер договора:</label>
													</div>	
													<input type='text' name = 'dogovor_num_t' id = 'dogovor_num_t' class='form-controls'>
												</div>
												<div>
													<label for = 'dogovor_date_t' class='label_subject'>Дата договора:</label>
													<input type='date' name = 'dogovor_date_t' id = 'dogovor_date_t' class='form-controls'>
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
											<input type='text' name = 'email' id = 'email' class='form-controls'>
										</div>
										<div class="form-group">
											<div class="block w3">
												<label for = 'sbj_note' class='label_subject'>Примечание:</label>
											</div>	
											<textarea name = 'sbj_note' id = 'sbj_note' class='form-controls' cols="50" rows="1"></textarea>
										</div>
										
										<!------------------------------------------------Договора теплоснабжения----------------------------------------------->											
										<div id="container-main">											
										<div class="accordion-container">
											<a href="#" class="accordion-titulo"><div><p id = "teplo_dog"><span><i class="icon-doc"></i></span>&nbspДоговора теплоснабжения (0 шт.)</p></div><span class="toggle-icon"></span></a>
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
														/*	foreach($subj_dogs as $one_subj_dog){
																
																echo '<tr id_subj_dog="'.$one_subj_dog['id'].'">';
																echo "<td name='name'>".$one_subj_dog['name']."</td>";
																echo "<td name='number'>".$one_subj_dog['number']."</td>";
																echo "<td name='date_dog'>".(strlen($one_subj_dog['date_dog']) > 0 ? date('d.m.Y',strtotime($one_subj_dog['date_dog'])) : '')."</td>";
																echo '<td><div class="menu-item-event"><div><button class="button-edit" onclick = "modalWindow.openModalEdit(\'ModalSubj_dog\','.$one_subj_dog['id'].')"><i class="icon-fixed-width icon-pencil"></i></button></div><div><button class="button-remove" onclick="subject.removeTableItem(\'subj_dog\','.$one_subj_dog['id'].')"><i class="icon-trash icons"></i></button></div></div></td></tr>';
															};*/?>
															

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
																	
						
				</form>
						
																		
                    
				<div id="messenger"></div>
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="subject.add('continue')">Сохранить</button>
					<button type="submit" class="shine-button" onclick="subject.add('cancel')">Сохранить и закрыть</button>
					<!--	<button type="submit" class="shine-button" onclick="subject.add('new_object')">Создать объект</button> -->
					<a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button" >Отмена</a>	
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
<?php Theme::block('modal/modal_Subj_dog') ?>
<?php Theme::block('modal/NewObject') ?>

<?php $this->theme->footer(); ?>