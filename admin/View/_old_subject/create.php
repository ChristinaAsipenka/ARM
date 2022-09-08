<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3><span><i class="icon-subject"></i></span>&nbspРегистрация нового поднадзорного потребителя</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage" mode="new_subject" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновная информация</legend>
											
											
											<!---------------------------Юридическое лицо--------------------------------------->
											<div class="form-group">
																							
												<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Юридическое лицо:</label>
												<div class="search-request">
													<input type="hidden" name="formUnpId" id="formUnpId" value="<?php echo(isset($unp_head)? $unp_head['id']:'')?>">
													<span id="name_unp"><?php echo(isset($unp_head)? $unp_head['name']:'')?></span>
												</div>
												<div>
												<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button">Выбрать юр. лицо</button>
												</div>
											</div>
																						
											<!---------------------------Наименование--------------------------------------->
											<div class="form-group">
												<label for = 'name_potr' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label>
												<textarea name = 'name_potr' id = 'name_potr' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование"><?php echo(isset($unp_head)? $unp_head['name']:'')?></textarea>
											</div>
											<!---------------------------Номер дела по старой нумерации--------------------------------------->
											<div class="form-group">
												<label for = 'num_case' class='label_subject'>Номер дела по старой нумерации:</label>
												<input type='text' name = 'num_case' id = 'num_case' class='form-controls'>
											</div>
											
											<!---------------------------Вышестоящая организация--------------------------------------->
											<div class="form-group">
																							
												<label for = 'search' class='label_subject'>Вышестоящая организация:</label>
												<div class="search-request">
													<input type="hidden" name="formUnpHeadId" id="formUnpHeadId" value="0">
													<span id="formUnpHead"></span>
												</div>
												<div>
												<button onclick = "modalWindow.openModal('openModalUNP')" id='unp1' class = "shine-button">Выбрать</button>
												</div>
												<div class="but_clear_div">
												<div class="tooltip"><button class = "btn_clear_fields" onclick="subject.clear_fields('formUnpHead')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div>
												</div>
												
											</div>
											<!---------------------------Подчиненность--------------------------------------->	
											<div class="form-group">
												<label for="formTitle"  class='label_subject'><span class = "formTextRed">*</span>Форма собственности:</label>
													<select class="form-controls" name="TypeProperty" id="TypeProperty" onchange='department.selectDepartment()'>
														<option value='0'>Выберите форму собственности</option>
													<?php foreach($properties as $property):?>
														<option value=<?=$property['id']?>><?=$property['name']?></option>
													 <?php endforeach; ?>
													</select>
													<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_property'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
											</div>		
											<!---------------------- ведомственная принадлежность ----------------------------------------------->			
												<div class="form-group">
													<label for="formTitle"  class='label_subject'><span class = "formTextRed">*</span>Ведомственная принадлежность:</label>
													<select class="form-controls"  name="nameDepartment" id="nameDepartment">
														<option value='0'>Выберите ведомственную принадлежность</option>
													</select>
													<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_department'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
												</div>
										
											<div class="form-group">
												<label for="formTitle" class='label_subject'>Основной вид деятельности:</label>
													<select class="form-controls" name="type_activity" id="type_activity">
														<option value='0'>Выберите вид деятельности</option>
													<?php foreach($spr_kind_of_activity as $one_spr_kind_of_activity):?>
														<option value=<?=$one_spr_kind_of_activity['id']?>><?=$one_spr_kind_of_activity['name']?></option>
													 <?php endforeach; ?>
													</select>
													<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_kind_of_activity'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
											</div>											
											<div class="form-group" class='label_subject'>
												<label for="formTitle" class='label_subject'>Сменность работ:</label>
													<select class="form-controls" name="shift_work" id="shift_work">
														<option value='0'>Выберите сменность работ</option>
													<?php foreach($spr_shift_of_work as $one_spr_shift_of_work):?>
														<option value=<?=$one_spr_shift_of_work['id']?>><?=$one_spr_shift_of_work['name']?></option>
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
												<input type='checkbox' name = 'e_copy_postaddress' id = 'e_copy_postaddress' class='custom-checkbox' value="0" onclick="subject.e_copy_postaddress()">
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
														<input type='text' name = 'dir_fam' id = 'dir_fam' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'dir_name' class='label_subject'>Имя:</label>
														<input type='text' name = 'dir_name' id = 'dir_name' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'dir_otch' class='label_subject'>Отчество:</label>
														<input type='text' name = 'dir_otch' id = 'dir_otch' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'dir_tel' class='label_subject'>Телефон:</label>
														<input type='text' name = 'dir_tel' id = 'dir_tel' class='form-controls'>
													</div>
												</div>
												<p class = "ruk_info">Главный инженер</p>
												<div class="form-group">
													<div class="ruk_div">
														<label for = 'ing_fam' class='label_subject'>Фамилия:</label>
														<input type='text' name = 'ing_fam' id = 'ing_fam' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'ing_name' class='label_subject'>Имя:</label>
														<input type='text' name = 'ing_name' id = 'ing_name' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'ing_otch' class='label_subject'>Отчество:</label>
														<input type='text' name = 'ing_otch' id = 'ing_otch' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'ing_tel' class='label_subject'>Телефон:</label>
														<input type='text' name = 'ing_tel' id = 'ing_tel' class='form-controls'>
													</div>
												</div>
												<p class = "ruk_info">Главный энергетик</p>
												<div class="form-group">
													<div class="ruk_div">
														<label for = 'en_fam' class='label_subject'>Фамилия:</label>
														<input type='text' name = 'en_fam' id = 'en_fam' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'en_name' class='label_subject'>Имя:</label>
														<input type='text' name = 'en_name' id = 'en_name' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'en_otch' class='label_subject'>Отчество:</label>
														<input type='text' name = 'en_otch' id = 'en_otch' class='form-controls'>
													</div>
													<div class="ruk_div">
														<label for = 'en_tel' class='label_subject'>Телефон:</label>
														<input type='text' name = 'en_tel' id = 'en_tel' class='form-controls'>
													</div>
												</div>

											</fieldset>		
						
<!--------------------------------------------------Ответственные лица------------------------------------------------------>				
											
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-people"></i></span>&nbspОтветственные лица</legend>

											<div>											
													<input type="hidden" name="otv_type_e" id="otv_type_e" value="">
													<input type="hidden" name="otv_e1_id" id="otv_e1_id" value="">
													<input type="hidden" name="otv_e2_id" id="otv_e2_id" value="">
													<input type="hidden" name="id_reestr_unp_e" id="id_reestr_unp_e" value="">
													<input type="hidden" name="order_num_e1" id="order_num_e1" value="">
													<input type="hidden" name="order_data_e1" id="order_data_e1" value="">
													<input type="hidden" name="order_num_e2" id="order_num_e2" value="">
													<input type="hidden" name="order_data_e2" id="order_data_e2" value="">
													<input type="hidden" name="dog_num_e" id="dog_num_e" value="">
													<input type="hidden" name="dog_data_e" id="dog_data_e" value="">
													<input type="hidden" name="instr_data_e" id="instr_data_e" value="">
													

											
											<div class="form-group">
													<label for = '' class='label_subject'>за электрохозяйство:</label>
														<div>
															<p id="otv_e1" class = "span_otv_info"></p>
															<p id="otv_e2" class = "span_otv_info"></p>
														</div>
													<div>
													<button onclick = "modalWindow.openModal('openModalRespPers')" id='e' class = "shine-button">Прикрепить/сменить</button>
													</div>
													<div class="tooltip"><a class = "btn_add_fields" href="/ARM/admin/responsible_persons/create/"><i class="icon-plus"></i><span class = "tooltiptext">Добавить ответственное лицо</span></a></div>
											</div>
											
											
											<div class="form-group">
													<input type="hidden" name="otv_type_t" id="otv_type_t" value="">
													<input type="hidden" name="otv_t_id" id="otv_t_id" value="">
													<input type="hidden" name="order_num_t" id="order_num_t" value="">
													<input type="hidden" name="order_data_t" id="order_data_t" value="">
													<input type="hidden" name="dog_num_t" id="dog_num_t" value="">
													<input type="hidden" name="dog_data_t" id="dog_data_t" value="">													
													<label for = '' class='label_subject'>за тепловое хозяйство:</label>
													<span id="otv_t" class = "span_otv_info"></span>
													<div>
													<button onclick = "modalWindow.openModal('openModalRespPers')" id='t' class = "shine-button">Прикрепить/сменить</button>
													</div>
													<div class="tooltip"><a class = "btn_add_fields" href="/ARM/admin/responsible_persons/create/"><i class="icon-plus"></i><span class = "tooltiptext">Добавить ответственное лицо</span></a></div>
											</div>
											<div class="form-group">
													<input type="hidden" name="otv_type_g" id="otv_type_g" value="">
													<input type="hidden" name="otv_g_id" id="otv_g_id" value="">
													<input type="hidden" name="order_num_g" id="order_num_g" value="">
													<input type="hidden" name="order_data_g" id="order_data_g" value="">
													<input type="hidden" name="dog_num_g" id="dog_num_g" value="">
													<input type="hidden" name="dog_data_g" id="dog_data_g" value="">
													<!--label for = '' class='label_subject'>за безопасную эксплуатацию объектов газораспределительной системы и газопотребления:</label-->
													<label for = '' class='label_subject'>за газовое хозяйство:</label>
													<span id="otv_g" class = "span_otv_info"></span>
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
											
												<textarea name = 'dogovor_name' id = 'dogovor_name' class='form-controls' cols="50" rows="1"></textarea>
											</div>
											<!---------------------- Номер договора и дата ----------------------------------------------->
											<div class="form-group">
												<div>
													<label for = 'dogovor_num' class='label_subject'>Номер договора:</label>
													<input type='text' name = 'dogovor_num' id = 'dogovor_num' class='form-controls'>
												</div>
												<div>
													<label for = 'dogovor_date' class='label_subject'>Дата договора:</label>
													<input type='date' name = 'dogovor_date' id = 'dogovor_date' class='form-controls'>
												</div>
											</div>


										</fieldset>												
<!------------------------------------------------------Закрепленные инспектора--------------------------------------------------------------------->						
																	
						
									</form>
						
														<div class="group">
															<div class="group-button">
																<button type="submit" class="btn btn-primary" onclick="subject.add('cancel')">Сохранить и закрыть</button>
																
																<button type="submit" class="btn btn-primary" onclick="subject.add('continue')">Сохранить и продолжить</button>
																<?php if($inspection_type == 3 && $access_level < 3){?>
																	<button type="submit" class="btn btn-primary" onclick="subject.add('new_object')">Создать объект</button>
																<?php }?>
																<!--a href="/ARM/admin/subject/" class="submit_cancel"><button type="submit" class="btn btn-primary">Отмена</button></a-->
																<a href="javascript:history.back()" class="submit_cancel btn-primary">Отмена</a>
															</div>
														</div>	
						
                    
											<div id="messenger"></div>
                </div>

            </div>
        </div>
    </main>



<?php Theme::block('modal/modalSearchRespPers') ?>	
<?php Theme::block('modal/modalSearchUnp') ?>
<?php Theme::block('modal/modal_GuidesfromSubject') ?>

<?php $this->theme->footer(); ?>