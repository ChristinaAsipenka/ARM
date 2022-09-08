
<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3><span><i class="icon-unp"></i></span>&nbspРегистрация нового юридического лица</h3>
					
                </div>
				<div class='check_unp_link'>
				<a href='http://www.portal.nalog.gov.by/grp/' target='_blank'>Ссылка на сайт Государственного реестра плательщиков</a>
				</div>
            </div>
            <div class="row">
                <div>
					
						<form id="formPage" class="form" mode="new_unp">
							
							<fieldset class = "fieldset_potr">
							<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновные информация</legend>
							
							<div class="form-group">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>УНП:</label>
								<div class='check_unp'>
								<input type="text" name="unp" class="form-controls" id="formUNP"  maxlength = '9' searchdata="unp">
								<button id='checkUNPinBASIS' class = "shine-button">Проверить в базе</button>
								<button id='portal' disabled class =''>Проверить на портале</button>
								<!--input type="text" name="unp" class="form-controls" id="formUNP1"  maxlength = '9' searchdata="unp"-->
								<!--ul id='pre-result'></ul-->
								</div>
								<span id='search_result_unp'></span>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Наименование:</label>
							   
								<textarea name="unpName" class="form-controls name_unp" id="formName" cols="50" rows="1" placeholder="Наименование" disabled></textarea>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Краткое наименование:</label>
								<textarea name="shortName" class="form-controls name_unp" id="formShortName"  cols="50" rows="1" placeholder="Краткое наименование" disabled></textarea> 
							</div>
							<div class="form-group">
                            <label for="formLiquidated" class="label-control"><span class = "formTextRed">*</span>Статус:</label>
                           
							<select class="form-controls" name="liquidated" id="formLiquidated" disabled>
								<option value='0'>Действующий</option>
								<option value='1'>Ликвидирован</option>
								<option value='2'>В состоянии ликвидации</option>
							</select>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Индекс:</label>
								<input type="text" name="index" class="form-controls" id="formIndex" maxlength = '6' disabled>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Область:</label>
									<select class="form-controls" name="regionName" id="formRegion" onchange='address.selectDistrict()' disabled>
										<option value='0'>Выберите область</option>
									<?php foreach($regions as $region):?>
										<option value=<?=$region['id']?>><?=$region['name']?></option>
									 <?php endforeach; ?>
									</select>
									<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_region'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Район:</label>
								<select class="form-controls"  name="districtName" id="formDistrict" onchange='address.selectCity()' disabled>
									<option value='0'>Выберите район</option>
								</select>
								<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_district'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Город/населенный пункт:</label>
									<select class="form-controls" name="spr_type_city" id="spr_type_city" disabled>
										<option value='0'>---</option>
											<?php 
											foreach($spr_type_cityCheck as $spr_type_city):?>
													<option value=<?=$spr_type_city['id']?>><?=$spr_type_city['name']?></option>
											<?php endforeach; ?>
									</select>
									<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_city'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
									<select class="form-controls"  name="cityName" id="formCity"  onchange='address.selectCityZone()' disabled>
										<option value='0'>Выберите город</option>
									</select>
									<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control">Район города:</label>
								<select class="form-controls"  name="cityZoneName" id="formCityZone" disabled>
									<option value='0'>Выберите район города</option>
								</select>
								<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city_zone'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>								
							</div>

							<div class="form-group">
								<label for="formTitle" class="label-control">Улица/проспект:</label>	
								<select class="form-controls" name="spr_type_street" id="spr_type_street" disabled>
									<option value='0'>---</option>
										<?php 
										foreach($spr_type_streetCheck as $spr_type_street):?>
												<option value=<?=$spr_type_street['id']?>><?=$spr_type_street['name']?></option>
										<?php endforeach; ?>
								</select>
								<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_street'); modalWindow.openModal('openModalGuidesFromSubject')" disabled><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
								<input type="text" name="streetName" class="form-controls" id="formStreet" disabled>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control">Дом/строение/корпус:</label>
								<input type="text" name="buildingNumber" class="form-controls" id="formBuilding" disabled>
							</div>
							<div class="form-group">
								<label for="formTitle" class="label-control">Квартира/офис:</label>
								<input type="text" name="flatNumber" class="form-controls" id="formFlat" disabled>
							</div>
						</fieldset>
						<div class='unp_right_part'>
							<p id='portal_message'></p>
							<p>УНП: <span id='portal_unp'></span></p>
							<p>Наименование: <span id='portal_name'></span></p>
							<p>Краткое наименование: <span id='portal_short_name'></span></p>
							<p>Состояние: <span id='portal_sost' cod_sost=''></span></p>
							<p>Инспекция МНС: <span id='portal_mns'></span></p>
							<p>Адрес: <span id='portal_address'></span></p>
							<span id='portal_id_spr_region'></span>
							<span id='portal_address_street'></span>
							<span id='portal_address_building'></span>
							<span id='portal_address_flat'></span>
							<span id='portal_address_cod_city'></span>
							<span id='portal_address_id_spr_district'></span>
						
							<button id='fill_form'>Заполнить данные формы</button>
						</div>
						</form>
					
					
                </div>
						<div class="group">
							<div class="group-button">
								<button type="submit" class="btn btn-primary unp_bttn_add" onclick="unp.add('cancel')">Сохранить и закрыть</button>
								<button type="submit" class="btn btn-primary unp_bttn_upd" onclick="unp.add('continue')">Сохранить и продолжить</button>
								<button type="submit" class="btn btn-primary unp_bttn_sbj" onclick="unp.add('new_subject')">Создать потребителя</button>
								<button type="submit" class="btn btn-primary unp_bttn_prsn" onclick="unp.add('new_person')">Создать ответственного</button>
								<!--a href="/ARM/admin/unp/" class="submit_cancel"><button type="submit" class="btn btn-primary">Отмена</button></a-->
								<a href="javascript:history.back()" class="submit_cancel btn-primary">Отмена</a>
							</div>
						</div>
						<div id="messenger"></div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>
<script src="/ARM/admin/Assets/js/checkUnp.js"></script>

<?php Theme::block('modal/modal_GuidesfromSubject') ?>