<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3><span><i class="icon-unp"></i></span>&nbsp<?= $unp['name']." (УНП : " . $unp['unp'] .")" ?></h3>
                </div>
				<div class='check_unp_link'>
					<a href='http://www.portal.nalog.gov.by/grp/' target='_blank'>Ссылка на сайт Государственного реестра плательщиков</a>
				</div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage" class="form" mode="edit_unp">
						<fieldset class = "fieldset_potr">
						<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновная информация</legend>
						
                        <input type="hidden" name="unp_id" id="formUnpId" value="<?= $unp['id'] ?>">
						<div class="form-group">
                            <label for="formTitle" class="label-control"><span class = "formTextRed">*</span>УНП:</label>
							<div class='check_unp'>
                            <input type="text" name="unp" class="form-controls" id="formUNP" value="<?= $unp['unp'] ?>" maxlength = '9' disabled>
							<!--button id='checkUNPinBASIS'>Проверить в базе</button-->
							<button id='portal' class = "shine-button">Проверить на портале</button>
							<!--ul id='pre-result'></ul-->
							</div>
							<span id='search_result_unp'></span>
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Наименование:</label>
							<textarea name="unpName" class="form-controls name_unp" id="formName" cols="50" rows="1" placeholder="Наименование"><?= $unp['name'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Краткое наименование:</label>
							<textarea name="shortName" class="form-controls name_unp" id="formShortName"  cols="50" rows="1" placeholder="Краткое наименование"><?= $unp['name_short'] ?></textarea> 
                        </div>
						<div class="form-group">
                            <label for="formLiquidated" class="label-control"><span class = "formTextRed">*</span>Статус:</label>
                           
							<select class="form-controls" name="liquidated" id="formLiquidated">
								<option value='0' <?= ($unp['liquidated'] == 0 ? 'selected="selected"' : '');?>>Действующий</option>
								<option value='1' <?= ($unp['liquidated'] == 1 ? 'selected="selected"' : '');?>>Ликвидирован</option>
								<option value='2' <?= ($unp['liquidated'] == 2 ? 'selected="selected"' : '');?>>В состоянии ликвидации</option>
							</select>
							
							
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Индекс:</label>
                            <input type="text" name="index" class="form-controls" id="formIndex" value="<?= $unp['address_index'] ?>" maxlength = '6'>
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Область:</label>
							
							<select class="form-controls" name="regionName" id="formRegion" onchange='address.selectDistrict()'>
								<option value='0'>Выберите область</option>
							<?php foreach($regions as $region):?>
								<option value=<?=$region['id']?> <?= ($region['id'] == $unp['address_region'] ? 'selected="selected"' : '');?>  ><?=$region['name']?></option>
							 <?php endforeach; ?>
							</select>
							<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_region'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Район:</label>
							
							<select class="form-controls"  name="districtName" id="formDistrict" onchange='address.selectCity()'>
								<option value='0'>Выберите район</option>
							<?php foreach($districts as $district):?>
								<option value=<?=$district['id']?> <?= ($district['id'] == $unp['address_district'] ? 'selected="selected"' : '');?>  ><?=$district['name']?></option>
							 <?php endforeach; ?>
							</select>
							<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_district'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control"><span class = "formTextRed">*</span>Город/населенный пункт:</label>
                            			
								<select class="form-controls" name="spr_type_city" id="spr_type_city">
									<option value='0'>---</option>
										<?php 
										foreach($spr_type_city as $one_spr_type_city):?>
											<option value="<?=$one_spr_type_city['id']?>"<?= ($one_spr_type_city['id'] == $unp['address_city_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_city['name']?></option>					
										<?php endforeach; ?>	
								</select>
								<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
										
								<select class="form-controls"  name="cityName" id="formCity"  onchange='address.selectCityZone()'>
									<option value='0'>Выберите город</option>
								<?php foreach($cities as $city):?>
									<option value=<?=$city['id']?> <?= ($city['id'] == $unp['address_city'] ? 'selected="selected"' : '');?>  ><?=$city['name']?></option>
								 <?php endforeach; ?>
								</select>
								<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>								
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control">Район города:</label>
							<select class="form-controls"  name="cityZoneName" id="formCityZone">
								<option value='0'>Выберите район города</option>
							<?php foreach($citiesZone as $cityZone):?>
								<option value=<?=$cityZone['id']?> <?= ($cityZone['id'] == $unp['address_city_zone'] ? 'selected="selected"' : '');?>  ><?=$cityZone['name']?></option>
							 <?php endforeach; ?>
							</select>
								<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city_zone'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>							
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control">Улица/проспект/корпус:</label>

								<select class="form-controls" name="spr_type_street" id="spr_type_street">
									<option value='0'>---</option>
										<?php 
										foreach($spr_type_street as $one_spr_type_street):?>
											<option value="<?=$one_spr_type_street['id']?>"<?= ($one_spr_type_street['id'] == $unp['address_street_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_street['name']?></option>					
										<?php endforeach; ?>	
								</select>
								<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_street'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
							<input type="text" name="streetName" class="form-controls" id="formStreet" value="<?= $unp['address_street'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control">Дом/строение:</label>
                            <input type="text" name="buildingNumber" class="form-controls" id="formBuilding" value="<?= $unp['address_building'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle" class="label-control">Квартира/офис:</label>
                            <input type="text" name="flatNumber" class="form-controls" id="formFlat" value="<?= $unp['address_flat'] ?>">
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
						
							<!--button id='fill_form'>Заполнить данные формы</button-->
						</div>
					</form>
                </div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="btn btn-primary" onclick="unp.update('cancel')">Сохранить и закрыть</button>
							<button type="submit" class="btn btn-primary" onclick="unp.update('continue')">Сохранить и продолжить</button>
							<button type="submit" class="btn btn-primary" onclick="unp.update('new_subject')">Создать потребителя</button>
							<button type="submit" class="btn btn-primary" onclick="unp.update('new_person')">Создать ответственного</button>
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