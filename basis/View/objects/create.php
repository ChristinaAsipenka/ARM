<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-object"></i></span><p>Объекты</p></div>

    <main>
        <div class="container">
			<div class="top_of_page sticky_body">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Регистрация</h5>
					<h3><span><i class="icon-object"></i></span>&nbspНовый объект</h3>
					<!--h3><span><i class="icon-object">&nbsp</i></span><i class='rp-r-os'>Новый объект</i>: <a href="/ARM/basis/subject/edit/<?= $subject['id'] ?>?mode=subject_info" target = "_blank"><?= $subject['name'] ?> </a></h3-->
                </div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/objects/list/<?= $subject['id'] ?>" class="button_unp"><span><i class="icon-list"></i></span><i class='rp-r-os'>Список объектов</i></a>
					<a href="/ARM/basis/subject/list/" class="button_unp"><span><i class="icon-pin"></i></span>Мои потребители</i></a>
					<a href="/ARM/basis/subject/" class="button_unp"><span><i class="icon-magnifier"></i></span><i class='rp-r-os'>Поиск</i></a>
				</div>
            </div>
			
            <div class="base_part"> <!------ для всех страниц ------->
              
                <form id="formPage" mode="new_object" class='form'>	
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
										<label for = 'name_object' class="label_subject"><span class = "formTextRed">*</span>Наименование объекта:</label>
									</div>	
									<div class="block w6">
										<textarea name = 'name_object' id = 'name_object' class='form-controls' cols="50" rows="1" placeholder="Наименование"></textarea>
									</div>
								</div>
											
								<input type="hidden" name="subject_id" id="subject_id" value="<?= $subject['id'] ?>">
								<input type="hidden" name="objects_id" id="formObjectId" value="">
											<!--div class="form-group">
												<label for = 't_spr_ot_functions' class='label_subject'>Функциональное назначение:</label>
													<input type="hidden" name="t_spr_ot_functions_id" id="t_spr_ot_functions_id" value="">
													<input type='text' name = 't_spr_ot_functions' id = 't_spr_ot_functions' class='form-controls'>
													<button onclick = "modalWindow.openModal('openModalSpr_ot_functions')">...</button>
													<!--div class="tooltip"><button class = "btn_clear_fields" onclick="object.clear_fields('t_spr_ot_functions')"><i class="icon-close"></i><span class = "tooltiptext">Очистить поле</span></button></div-->
													<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_functions'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
											<!--/div-->
											
								<div class="form-group">
									<div class="block w2-5">
										<label for="formTitle" class='label_subject'>Функциональное назначение:</label>
									</div>	
									<div class="block w8">
									<select class="form-controls" name="t_spr_ot_functions_id" id="t_spr_ot_functions_id">
										<option value='0'>Выберите функциональное назначение</option>
										<?php foreach($spr_kind_of_activity as $kind_of_activity):?>
											<option value=<?=$kind_of_activity['id']?>><?=$kind_of_activity['name']?></option>
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
										<option value='0'>Выберите тип объекта</option>
										<?php foreach($spr_type_objectCheck as $spr_o_type_object):?>
											<option value=<?=$spr_o_type_object['id']?>><?=$spr_o_type_object['name']?></option>
										<?php endforeach; ?>
									</select>
									</div>
								</div>	
								
								<div class="form-group">
									<div class="block w2-5">
										<label for = 'num_case_o' class="label_subject">Номер объекта:</label>
									</div>	
									<div class="block w2-5">
										<input type='text' name = 'num_case_o' id = 'num_case_o' class='form-controls'>
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
											echo "<input type='checkbox' name = 'elektro_is' id= 'elektro_is' class='custom-checkbox'  value='0' onclick='object.is_elektro()'>";
										?>											
										<label for = 'elektro_is' class='label_subject'>Объект электроснабжения</label>
									</div>
								</div>									
									
									
								<div id = "elektro_section">
									<div class="form-group">
										<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Закрепленный инспектор:</label>
										<select class="form-controls" name="e_insp" id="e_insp" <?php echo ($access_level == 1 ? 'disabled': '')?>>
											<option value='0'>Выберите инспектора</option>
												<?php foreach($usersElectro as $user):?>
													<option value=<?=$user['id']?>  <?php echo ($user['id'] == $id_user ? 'selected="selected"': '')?> ><?=$user['fio']?></option>
												<?php endforeach; ?>
										</select>
									</div>

									<br>
									<div class="formTextRed">
										<label class='label_subject'>Для продолжения внесения информации об объекте сохраните его!</label>
									</div>									
								</div>	
									
							</section> 
<!------------------------------------------------------     ВКЛАДКА ТЕПЛО  -------------------------------------------------------------------------->									
							<section id="content-tab3">
								<p class="p_gaz">Информация по объекту тепловой энергии</p>
								<hr/>	
								
								<div class="form-group">
									<div class="checkbox">
										<input type='checkbox' name = 't_is' id = 't_is' class='custom-checkbox' value="" onclick="object.is_teplo()">
										<label for = 't_is' class='label_subject'>Объект теплопотребления</label>
									</div>
								</div>
	
								<div id = "t_is">
									<div class="form-group">
										<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Закрепленный инспектор:</label>
										<select class="form-controls" name="Insp_t" id="Insp_t" onchange='object.changeInsp()' <?php echo ($access_level == 1 ? 'disabled': '')?>>
											<option value='0'>Выберите инспектора</option>
												<?php foreach($usersTeplo as $user):?>
													<option value=<?=$user['id']?> <?php echo ($user['id'] == $id_user ? 'selected="selected"': '')?>><?=$user['fio']?></option>
												<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
											<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Категория надежности теплоснабжения:</label>
										<select class="form-controls" name="t_spr_ot_cat" id="t_spr_ot_cat">
											<option value='0'>Выберите категорию</option>
												<?php foreach($spr_ot_catCheck as $ot_cat_n):?>
													<option value="<?=$ot_cat_n['id']?>"><?=$ot_cat_n['name']?></option>
												<?php endforeach; ?>
										</select>
									</div>									


									<br>
									<div class="formTextRed">
										<label class='label_subject'>Для продолжения внесения информации об объекте сохраните его!</label>
									</div>
								</div>
							</section> 
								
<!------------------------------------------------------------------------------------------------------------------------------------------------->								
<!------------------------------------------------------     ВКЛАДКА ТИ  -------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------->	
								
							<section id="content-tab4">
								<p class="p_gaz">Информация по теплоисточнику</p>
								<hr/>	
								
								<div class="form-group">
									<div class="checkbox">
										<input type='checkbox' name = 'ti_is' id= 'ti_is' class='custom-checkbox'  value='0' onclick='object.is_teplo_source()'>
										<label for = 'ti_is' class='label_subject'>Теплоисточник</label>
									</div>
								</div>
								
								<div id = "ti_section">
									<div class="form-group">
										<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Закрепленный инспектор:</label>
										<select class="form-controls" name="Insp_ti" id="Insp_ti" <?php echo ($access_level == 1 ? 'disabled': '')?>>
											<option value='0'>Выберите инспектора</option>
												<?php foreach($usersTeplo as $user):?>
													<option value=<?=$user['id']?> <?php echo ($user['id'] == $id_user ? 'selected="selected"': '')?>><?=$user['fio']?></option>
												<?php endforeach; ?>
										</select>
									</div>
									
									<div class="form-group">
												<label for = 'ti_name' class='label_object'><span class = "formTextRed">*</span>Наименование теплоисточника:</label>
												<textarea name = 'ti_name' id = 'ti_name' class='form-controls' cols="50" rows="1" placeholder="Наименование"><?php /* $objects['ti_name']*/ ?></textarea>
									</div>	

									<br>
									<div class="formTextRed">
										<label class='label_subject'>Для продолжения внесения информации о теплоисточнике сохраните его!</label>
									</div>									
								</div>
							</section>
								
<!------------------------------------------------------------------------------------------------------------------------------------------------->								
<!------------------------------------------------------     ВКЛАДКА ГАЗ  -------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------->								
							
							<section id="content-tab5">
									
								<p class="p_gaz">Информация по газовому надзору</p>
								<hr/>
	
								<div class="form-group">
									<div class="checkbox">
										<input type='checkbox' name = 'gaz_is' id= 'gaz_is' class='custom-checkbox'  value='' onclick='object.is_gaz()'>
										<label for = 'gaz_is' class='label_subject'>Объект газопотребления</label>
									</div>
								</div>
								
								<div id = "gaz_section">
									<div class="form-group">
										<label for="formTitle" class='label_subject'>Закрепленный инспектор:</label>
										<select class="form-controls" name="Insp_gaz" id="Insp_gaz" <?php echo ($access_level == 1 ? 'disabled': '')?>>
											<option value='0'>Выберите инспектора</option>
												<?php foreach($usersGaz as $user):?>
													<option value=<?=$user['id']?> <?php echo ($user['id'] == $id_user ? 'selected="selected"': '')?> ><?=$user['fio']?></option>
												<?php endforeach; ?>
										</select>
									</div>
									
									<br>
									<div class="formTextRed">
										<label class='label_subject'>Для продолжения внесения информации об объекте сохраните его!</label>
									</div>
								</div>
							</section> 
							
						</div>
					</div>

						
                </form>
				<div id="messenger"></div>
				
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="object.add('continue')">Сохранить</button>
					<button type="submit" class="shine-button" onclick="object.add('cancel')">Сохранить и закрыть</button>
					<a href="javascript:history.back()" class="shine-button" onclick="object.cancel()">Отмена</a>	
				</div>

            </div>
        </div>
    </main>
	
	<!--------------------------------- Конвертер --------------------------------->
	<!--div class = "tooltip"><div class='calc_units' onclick="calc_units.show()"><span class="tooltiptext">Конвертер</span></div></div>
	<div id="calc_units">
		<div class="head_calc">
			<p>Конвертер мощности</p>
		</div>
		<button id='close_calc' onclick="calc_units.hide()">&#215 </button>
		<div>
			<label for = 'units_GK' class="label_units">Гкал/ч:</label>
			<input type='text' name = 'units_GK' id = 'units_GK' class='form-controls'>
		</div>
		<div>
			<label for = 'units_KV' class="label_units">кВт:</label>
			<input type='text' name = 'units_KV' id = 'units_KV' class='form-controls'>
		</div>
		<div>	
			<label for = 'units_GDz' class="label_units">ГДж/ч:</label>
			<input type='text' name = 'units_GDz' id = 'units_GDz' class='form-controls'>
		</div>
	</div-->
	
<!--?php Theme::block('modal/SubjectInfo')?-->
<!--?php Theme::block('modal/ObjectsInfo')?-->
<?php /*Theme::block('modal/modalSearchUnp') */?>	
<?php /*Theme::block('modal/modalSearchSubject') ?>		
<?php Theme::block('modal/modal_Obj_ot_heatnet') ?>
<?php Theme::block('modal/modal_Obj_ot_heatnet_t') ?>
<?php Theme::block('modal/modal_Obj_ot_personal_tp') ?>
<?php Theme::block('modal/modal_Obj_ot_personal_sar') ?>
<?php Theme::block('modal/modal_Obj_og_device') ?>	
<?php Theme::block('modal/modal_Spr_ot_gvs_open') ?>
<?php Theme::block('modal/modal_Spr_ot_gvs_in') ?>	
<?php Theme::block('modal/modal_Spr_ot_type_to') ?>		
<?php Theme::block('modal/modal_Spr_ot_systemheat_dependent') ?>	
<?php Theme::block('modal/modal_Spr_ot_systemheat_water') ?>
<?php Theme::block('modal/modal_Spr_ot_systemheat_layout') ?>
<?php Theme::block('modal/modal_Spr_t_systemheat_type_op') ?>
<?php Theme::block('modal/modal_Spr_ot_functions') ?>
<?php Theme::block('modal/modal_Spr_ot_cat') ?>	
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
<?php Theme::block('modal/modal_Obj_oe_ku') */?>
<?php Theme::block('modal/modal_GuidesfromSubject') ?>
<?php $this->theme->footer(); ?>


<script src="/ARM/basis/Assets/js/checkObject.js"></script>
