<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-unp"></i></span><p>ЮЛ и ИП</p></div>
    <main>
        <div class="container">
            <div class="top_of_page sticky_body">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Редактирование</h5>
					<h3><span><i class="icon-unp">&nbsp</i></span><?= $unp['name']." (УНП : " . $unp['unp'] .")" ?></h3>
                </div>	
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/unp/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск ЮЛ или ИП</a>
					<a href='http://www.portal.nalog.gov.by/grp/' target='_blank' class="button_unp"><span><i class="icon-action-redo"></i></span>Портал Государственного реестра плательщиков</a>
				</div>
            </div>
			
            <div class="base_part">
                
                <form id="formPage" class="form" mode="edit_unp">
				
					<fieldset class = "fieldset_potr">
					<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновная информация</legend>
						
						<input type="hidden" name="unp_id" id="formUnpId" value="<?= $unp['id'] ?>">	<!--скрытый input-->
						<div class="block w7-5">
							
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>УНП:</label>
								</div>
								<div class="block w2-5">
									<input type="text" name="unp" class="form-controls" id="formUNP" value="<?= $unp['unp'] ?>" maxlength = '9' disabled>
								</div>

								<div class="block w2-5">
									
									
								</div>
							</div>						
				
							<!--div class="block w7">
								<span id='search_result_unp'></span>
							</div>
							<hr/><br/-->	
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Наименование:</label>
								</div>
								<div class="block w5">
									<textarea name="unpName" class="form-controls name_unp" id="formName" cols="50" rows="1" placeholder="Наименование" disabled><?= $unp['name'] ?></textarea>
								</div>
								<div class="base_part" id='renameUnp'>
									<h5>Переименование юридечского лица или ИП</h5><hr/>
									<br>
									<h3><b>УНП: </b><span id='nm_unp'></span></h3>
									<h3><b>Полное наименование: </b><textarea id='nm_full_name' name='nm_full_name' cols="50" rows="1" class="form-controls"<?php echo ($access_level == 5 || $access_level == 4 ? : 'disabled')?> ></textarea></h3>
									<h3><b>Краткое наименование: </b><textarea id='nm_short_name' name='nm_short_name' cols="50" rows="1" class="form-controls" <?php echo ($access_level == 5 || $access_level == 4 ? : 'disabled')?> ></textarea></h3>
									<br/><hr/>
									<div class ='nav_buttons'>
										<button class="button_filter" id='setUnpNewName'><span><i class="icon-check-ok"></i></span>Применить</button>
										<button class="button_filter" id='renameClose'><span><i class="icon-reload"></i></span>Отмена</button>	
									</div>
								</div>
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Краткое наименование:</label>
								</div>
								<div class="block w5">
									<textarea name="shortName" class="form-controls name_unp" id="formShortName"  cols="50" rows="1" placeholder="Краткое наименование" disabled><?= $unp['name_short'] ?></textarea> 
								</div>
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formLiquidated" class="label-control"><span class = "formTextRed">*</span>Статус:</label>
								</div>
								<div class="block w5">
									<select class="form-controls" name="liquidated" id="formLiquidated">
										<option value='0' <?= ($unp['liquidated'] == 0 ? 'selected="selected"' : '');?>>Действующий</option>
										<option value='1' <?= ($unp['liquidated'] == 1 ? 'selected="selected"' : '');?>>Ликвидирован</option>
										<option value='2' <?= ($unp['liquidated'] == 2 ? 'selected="selected"' : '');?>>В состоянии ликвидации</option>
									</select>
								</div>
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Индекс:</label>
								</div>
								<div class="block w5">
									<input type="text" name="index" class="form-controls" id="formIndex" value="<?= $unp['address_index'] ?>" maxlength = '6'>
								</div>
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Область:</label>
								</div>
								<div class="block w5">
									<select class="form-controls" name="regionName" id="formRegion" onchange='address.selectDistrict()'>
										<option value='0'>Выберите область</option>
										<?php foreach($regions as $region):?>
											<option value=<?=$region['id']?> <?= ($region['id'] == $unp['address_region'] ? 'selected="selected"' : '');?>  ><?=$region['name']?></option>
										<?php endforeach; ?>
									</select>
									<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_region'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
								</div>
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Район:</label>
								</div>
								<div class="block w5">
									<select class="form-controls"  name="districtName" id="formDistrict" onchange='address.selectCity()'>
										<option value='0'>Выберите район</option>
										<?php foreach($districts as $district):?>
											<option value=<?=$district['id']?> <?= ($district['id'] == $unp['address_district'] ? 'selected="selected"' : '');?>  ><?=$district['name']?></option>
										<?php endforeach; ?>
									</select>
									<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_district'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
								</div>
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control">Населенный пункт:</label>
								</div>
								<div class="block w3-5">			
									<select class="form-controls form-small" name="spr_type_city" id="spr_type_city">
										<option value='0'>---</option>
											<?php 
											foreach($spr_type_city as $one_spr_type_city):?>
												<option value="<?=$one_spr_type_city['id']?>"<?= ($one_spr_type_city['id'] == $unp['address_city_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_city['name']?></option>					
											<?php endforeach; ?>	
									</select>
									<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
		
									<select class="form-controls"  name="cityName" id="formCity"  onchange='address.selectCityZone()'>
										<option value='0'>Выберите город</option>
										<?php foreach($cities as $city):?>
											<option value=<?=$city['id']?> <?= ($city['id'] == $unp['address_city'] ? 'selected="selected"' : '');?>  ><?=$city['name']?></option>
										<?php endforeach; ?>
									</select>
									<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись в справочник</span></button></div>								
								</div>
									<select class="form-controls"  name="cityZoneName" id="formCityZone">
										<option value='0'>Выберите район города</option>
										<?php foreach($citiesZone as $cityZone):?>
											<option value=<?=$cityZone['id']?> <?= ($cityZone['id'] == $unp['address_city_zone'] ? 'selected="selected"' : '');?>  ><?=$cityZone['name']?></option>
										<?php endforeach; ?>
									</select>
									<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city_zone'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->							
								
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control">Улица и прочее:</label>
								</div>
								<div class="block w5">
									<select class="form-controls form-small" name="spr_type_street" id="spr_type_street">
										<option value='0'>---</option>
											<?php 
											foreach($spr_type_street as $one_spr_type_street):?>
												<option value="<?=$one_spr_type_street['id']?>"<?= ($one_spr_type_street['id'] == $unp['address_street_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_street['name']?></option>					
											<?php endforeach; ?>	
									</select>
									<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_street'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
									<input type="text" name="streetName" class="form-controls" id="formStreet" value="<?= $unp['address_street'] ?>">
								</div>
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control">Дом/строение/корпус:</label>
								</div>
								<div class="block w5">
									<input type="text" name="buildingNumber" class="form-controls" id="formBuilding" value="<?= $unp['address_building'] ?>">
								</div>
							</div>
						
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control">Квартира/офис и пр:</label>
								</div>
								<div class="block w5">
									<input type="text" name="flatNumber" class="form-controls" id="formFlat" value="<?= $unp['address_flat'] ?>">
								</div>
							</div>
						</div>
						
						<div class="block w4">
						
							<fieldset class = "fieldset_potr">
							<legend class="legend_potr">&nbspДанные с портала ГРП </legend>
							
								<div class="block w3-5">
									<span id='search_result_unp' class='checkUnp_info'></span>
									<button id='portal' class = "shine-button vert_m3">Отправить запрос на портал ГРП </button>
								</div>
								<div class="block w3-5">
								<div class='unp_right_part'>
									<p id='portal_message'></p>
									<p>УНП: <span id='portal_unp'></span></p>
									<p>Наименование: <span id='portal_name'></span></p>
									<p>Краткое наименование: <span id='portal_short_name'></span></p>
									<p>Состояние: <span id='portal_sost' cod_sost=''></span></p>
									<p>Инспекция МНС: <span id='portal_mns'></span></p>
									<p>Адрес: <span id='portal_address'></span></p>
									<p><br></p>
									<span id='portal_id_spr_region'></span>
									<span id='portal_address_street'></span>
									<span id='portal_address_building'></span>
									<span id='portal_address_flat'></span>
									<span id='portal_address_cod_city'></span>
									<span id='portal_address_id_spr_district'></span>
									
									<button id='half_fill_form' class="shine-button">Изменить адрес и статус</button>
									
								</div>
								</div>
							</fieldset>
							
							<div class="form-group">
								<div class="block w0-3"></div>
								<button id='new_name_unp' class = "shine-button vert_m3" disabled>Переименовать</button>	
							</div>	

						</div>	
						
					</fieldset>
					
				</form>
                
				<div id="messenger"></div>
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="unp.update('continue')">Сохранить</button>
					<button type="submit" class="shine-button" onclick="unp.update('cancel')">Сохранить и закрыть</button>
					<button type="submit" class="shine-button" onclick="unp.update('new_subject')">Сохранить и создать потребителя</button>
					<button type="submit" class="shine-button" onclick="unp.update('new_person')">Сохранить и создать ответственного</button>
					<!--a href="/ARM/basis/unp/" class="submit_cancel"><button type="submit" class="btn btn-primary">Отмена</button></a-->
					<a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button">Отмена</a>
				</div>	
					<div class="page_title_footer">
						<h5></h5>
					</div>
				
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>
<script src="/ARM/basis/Assets/js/checkUnp.js"></script>

<?php Theme::block('modal/modal_GuidesfromSubject') ?>