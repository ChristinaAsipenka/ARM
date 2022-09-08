<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-unp"></i></span><p>ЮЛ и ИП</p></div>
    <main>
        <div class="container">
            <div class="top_of_page sticky_body"> 
                <!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title">
                    <h5>Регистрация</h5>
					<h3><span><i class="icon-unp">&nbsp</i></span>Новое юридическое лицо или ИП</h3>
                </div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/unp/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск ЮЛ или ИП</a>
					<a href='http://www.portal.nalog.gov.by/grp/' target='_blank' class="button_unp"><span><i class="icon-action-redo"></i></span>Портал Государственного реестра плательщиков</a>
				</div>
				<!--<div class='check_unp_link'>
					<a href='http://www.portal.nalog.gov.by/grp/' target='_blank'>Ссылка на сайт Государственного реестра плательщиков</a>
				</div>-->
            </div>
            
			<div class="base_part">
					
				<form id="formPage" class="form" mode="new_unp">
							
					<fieldset class = "fieldset_potr">
					<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновные информация</legend>
		 												
						<div class="block w7-5">
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>УНП:</label>
								</div>
								<!--div class="block w0-5">
									<button id='checkUNPinBASIS' class = "btn_add vert_m6" disabled><i class="icon-action-redo"></i></button>
								</div-->
								<div class="block w2-5">
									<input type="text" name="unp" class="form-controls" id="formUNP"  maxlength = '9' searchdata="unp" value="введите УНП">
								</div>

								<div class="block w2-5">
										
								</div>
							</div>
												
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Наименование:</label>
								</div>
								<div class="block w5">
									<textarea name="unpName" class="form-controls name_unp" id="formName" cols="50" rows="1" placeholder="Наименование" disabled></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="block w2">
									<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Краткое наименование:</label>
								</div>
								<div class="block w5">
									<textarea name="shortName" class="form-controls name_unp" id="formShortName"  cols="50" rows="1" placeholder="Краткое наименование" disabled></textarea> 
								</div>
							</div>
							
							<div class="form-group">
							<div class="block w2">
							<label for="formLiquidated" class="label-control"><span class = "formTextRed">*</span>Статус:</label>
							</div>
							<div class="block w5">
							<select class="form-controls" name="liquidated" id="formLiquidated" disabled>
								<option value='0'>Действующий</option>
								<option value='1'>Ликвидирован</option>
								<option value='2'>В состоянии ликвидации</option>
							</select>
							</div></div>
							
							<div class="form-group">
							<div class="block w2">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Индекс:</label>
								</div>
							<div class="block w5">
								<input type="text" name="index" class="form-controls" id="formIndex" maxlength = '6' value='xxxxxx' disabled>
							</div></div>
							
							<div class="form-group">
							<div class="block w2">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Область:</label>
								</div>
							<div class="block w5">
									<select class="form-controls" name="regionName" id="formRegion" onchange='address.selectDistrict()' disabled>
										<option value='0'>Выберите область</option>
									<?php foreach($regions as $region):?>
										<option value=<?=$region['id']?>><?=$region['name']?></option>
									 <?php endforeach; ?>
									</select>
									<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_region'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
							</div></div>
							
							<div class="form-group">
							<div class="block w2">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Район:</label>
								</div>
							<div class="block w5">
								<select class="form-controls"  name="districtName" id="formDistrict" onchange='address.selectCity()' disabled>
									<option value='0'>Выберите район</option>
								</select>
								<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_district'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
							</div></div>
							
							<div class="form-group">
							<div class="block w2">
								<label for="formTitle" class="label-control">Населенный пункт:</label>
							</div>
							<div class="block w3-5">
									<select class="form-controls form-small" name="spr_type_city" id="spr_type_city" disabled>
										<option value='0'>---</option>
											<?php 
											foreach($spr_type_cityCheck as $spr_type_city):?>
													<option value=<?=$spr_type_city['id']?>  <?php echo ($spr_type_city['id'] == 1 ? "selected" : ''); ?>><?=$spr_type_city['name']?></option>
											<?php endforeach; ?>
									</select>
									<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_city'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
									
									<select class="form-controls"  name="cityName" id="formCity"  onchange='address.selectCityZone()' disabled>
										<option value='0'>Выберите город</option>
									</select>
									
										<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись в справочник</span></button></div>
							</div>
								<select class="form-controls"  name="cityZoneName" id="formCityZone" disabled>
									<option value='0'>Выберите район города</option>
								</select>
								<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city_zone'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->								
							</div>

							<div class="form-group">
							<div class="block w2">
								<label for="formTitle" class="label-control">Улица и прочее:</label>	
								</div>
							<div class="block w5">
								<select class="form-controls form-small" name="spr_type_street" id="spr_type_street" disabled>
									<option value='0'>---</option>
										<?php 
										foreach($spr_type_streetCheck as $spr_type_street):?>
												<option value=<?=$spr_type_street['id']?> <?php echo ($spr_type_street['id'] == 14 ? "selected" : ''); ?>><?=$spr_type_street['name']?></option>
										<?php endforeach; ?>
								</select>
								<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_street'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->

								<input type="text" name="streetName" class="form-controls" id="formStreet" disabled>
							</div></div>
							
							<div class="form-group">
							<div class="block w2">
								<label for="formTitle" class="label-control">Дом/строение/корпус:</label>
								</div>
							<div class="block w5">
								<input type="text" name="buildingNumber" class="form-controls" id="formBuilding" disabled>
							</div></div>
							
							<div class="form-group">
							<div class="block w2">
								<label for="formTitle" class="label-control">Квартира/офис и пр.:</label>
								</div>
							<div class="block w5">
								<input type="text" name="flatNumber" class="form-controls" id="formFlat" disabled>
							</div>
							</div>

						</div>
					
						<div class="block w4">
							<fieldset class = "fieldset_potr">
							<legend class="legend_potr">&nbspРезультаты запросов </legend>
							
								<div class="block w3-5">
									<span id='search_result_unp' class='checkUnp_info'>Для проверки данных<br>введите в поле УНП девятизначное число</span>
									<hr>
									<button id='portal' class ='shine-button vert3' disabled>Отправить запрос на портал ГРП</button>
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
									<button id='fill_form' class="shine-button">&#9668&#9668&#9668 Перенести полученную информацию в форму</button>
								</div>
								</div>
							</fieldset>
						</div>	
						
					</fieldset>
						

				</form>		
                
				<div id="messenger"></div>
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="unp.add('continue')">Сохранить</button>
					<button type="submit" class="shine-button" onclick="unp.add('cancel')">Сохранить и закрыть</button>
					<button type="submit" class="shine-button" <?php echo (($access_level < 3)? '' : 'disabled');?> onclick="unp.add('new_subject')"><i class='rp1'>Сохранить и создать</i></button>
					<button type="submit" class="shine-button" onclick="unp.add('new_person')">Сохранить и создать ОЛ</button>
					<!--a href="/ARM/basis/unp/" class="submit_cancel"><button type="submit" class="btn btn-primary">Отмена</button></a-->
					<a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button" >Отмена</a>	
				</div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>
<script src="/ARM/basis/Assets/js/checkUnp.js"></script>

<?php Theme::block('modal/modal_GuidesfromSubject') ?>