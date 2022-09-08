<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>Регистрация нового ответственного лица</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage" mode="new_responsible_person" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr">Основная информация:</legend>

											<!---------------------------Юридическое лицо--------------------------------------->
											<div class="form-group">
																							
												<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Юридическое лицо:</label>
												<div class="search-request">
													<input type="hidden" name="formUnpId" id="formUnpId" value="<?php echo(isset($unp_head)? $unp_head['id']:'')?>">
													<span id="name_unp"><?php echo(isset($unp_head)? $unp_head['name']:'')?></span>
												</div>
												<div>
												<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button">Выбор</button>
												</div>
											</div>

											<!---------------------------ФИО ответственного лица--------------------------------------->
											<div class="form-group">
												<label for = 'resp_pers_secondname' class='label_subject'><span class = "formTextRed">*</span>Фамилия:</label>
												<input type='text' name = 'resp_pers_secondname' id = 'resp_pers_secondname' class='form-controls'>
											</div>
											<div class="form-group">
												<label for = 'resp_pers_firstname' class='label_subject'><span class = "formTextRed">*</span>Имя:</label>
												<input type='text' name = 'resp_pers_firstname' id = 'resp_pers_firstname' class='form-controls'>
											</div>
											<div class="form-group">
												<label for = 'resp_pers_lastname' class='label_subject'><span class = "formTextRed">*</span>Отчество:</label>
												<input type='text' name = 'resp_pers_lastname' id = 'resp_pers_lastname' class='form-controls'>
											</div>
											<!---------------------------Должность ответственного лица--------------------------------------->
											<div class="form-group">
												<label for = 'resp_pers_post' class='label_subject'><span class = "formTextRed">*</span>Должность:</label>
												<input type='text' name = 'resp_pers_post' id = 'resp_pers_post' class='form-controls'>
											</div>
											<!---------------------------Дата назначения на должность ответственного лица--------------------------------------->	
											<div class="form-group">
												<label for = 'resp_pers_post_data' class='label_subject'><span class = "formTextRed">*</span>Дата назначения на должность:</label>
												<input type='date' name = 'resp_pers_post_data' id = 'resp_pers_post_data' class='form-controls'>
											</div>										
											<!---------------------------Телефон ответственного лица--------------------------------------->		
											<div class="form-group">
												<label for = 'resp_pers_tel' class='label_subject'>Телефон:</label>
												<input type='text' name = 'resp_pers_tel' id = 'resp_pers_tel' class='form-controls'>
											</div>											
											<!---------------------------Email ответственного лица--------------------------------------->
											<div class="form-group">
												<label for = 'resp_pers_email' class='label_subject'>E-mail:</label>
												<input type='text' name = 'resp_pers_email' id = 'resp_pers_email' class='form-controls'>
											</div>											
										</fieldset>	
						
					  </form>
											<!---------------------------Кнопки действий для сохранения и отмены записи--------------------------------------->
														<div class="group">
															<div class="group-button">
																<button type="submit" class="btn btn-primary" onclick="resp_pers.add()">Сохранить</button>
																<!--a href="/ARM/admin/responsible_persons/" class="submit_cancel"><button type="submit" class="btn btn-primary">Отмена</button></a-->
																<a href="javascript:history.back()" class="submit_cancel btn-primary">Отмена</a>
															</div>
														</div>	
						
                  
											<div id="messenger"></div>
                </div>

            </div>
        </div>
    </main>

<?php Theme::block('modal/modalSearchUnp') ?>
<?php $this->theme->footer(); ?>