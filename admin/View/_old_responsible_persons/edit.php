<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            
			<!--------------Однотипное оформление верхней области страницы ------------------------------>
		<div class='top_of_page'> 	<!------ для всех страниц ------->
            <div class="page_title"> 	<!------ для всех страниц ------->
                		<h5>
							Редактирование ответственного лица: <?= $responsible_persons['secondname']." ".$responsible_persons['firstname']." ".$responsible_persons['lastname'] ?>
							<!--a href="" onclick='modalWindow.openModal("openModalSubjectInfo"); subject.subjectInfo(<?//= $subject['id']?>)'><?//= $subject['name'] ?></a-->
						</h5>


            </div>
			<div class ='nav_buttons'> <!------ для всех страниц -------> 
			<a href="/ARM/admin/responsible_person/list/"></a>
			</div>
        </div>
			
			
            <div class="base_part">
           
                    <form id="formPage" mode="edit_responsible_person" class="form">	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr">Основная информация:</legend>

											<input type="hidden" name="resp_pers_id" id="resp_pers_id" value="<?= $responsible_persons['id'] ?>">
											<!---------------------------Юридическое лицо--------------------------------------->
											<div class="form-group">
																							
												<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Юридическое лицо:</label>
												<div class="search-request">
													<input type="hidden" name="formUnpId" id="formUnpId" value="<?= $responsible_persons['id_reestr_unp'] ?>">
													<span id="name_unp"><?= '('.$unp['unp'].') '. $unp['name'] ?></span>
												</div>
												<div>
												<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button">Выбор</button>
												</div>
											</div>											
											<!---------------------------ФИО ответственного лица--------------------------------------->
											<div class="form-group">
											<label for = 'resp_pers_secondname' class='label_subject'><span class = "formTextRed">*</span>Фамилия:</label>
												<input type='text' name = 'resp_pers_secondname' id = 'resp_pers_secondname' class='form-controls'  value="<?= $responsible_persons['secondname'] ?>">
											</div>
											<div class="form-group">
												<label for = 'resp_pers_firstname' class='label_subject'><span class = "formTextRed">*</span>Имя:</label>
												<input type='text' name = 'resp_pers_firstname' id = 'resp_pers_firstname' class='form-controls'  value="<?= $responsible_persons['firstname'] ?>">
											</div>
											<div class="form-group">
												<label for = 'resp_pers_lastname' class='label_subject'><span class = "formTextRed">*</span>Отчество:</label>
												<input type='text' name = 'resp_pers_lastname' id = 'resp_pers_lastname' class='form-controls'  value="<?= $responsible_persons['lastname'] ?>">
											</div>
											<!---------------------------Должность ответственного лица--------------------------------------->
											<div class="form-group">
												<label for = 'resp_pers_post' class='label_subject'><span class = "formTextRed">*</span>Должность:</label>
												<input type='text' name = 'resp_pers_post' id = 'resp_pers_post' class='form-controls' value="<?= $responsible_persons['post'] ?>">
											</div>
											<!---------------------------Дата назначения на должность ответственного лица--------------------------------------->	
											<div class="form-group">
												<label for = 'resp_pers_post_data' class='label_subject'><span class = "formTextRed">*</span>Дата назначения на должность:</label>
												<input type='date' name = 'resp_pers_post_data' id = 'resp_pers_post_data' class='form-controls'value="<?= $responsible_persons['post_data'] ?>">
											</div>										
											<!---------------------------Телефон ответственного лица--------------------------------------->		
											<div class="form-group">
												<label for = 'resp_pers_tel' class='label_subject'>Телефон:</label>
												<input type='text' name = 'resp_pers_tel' id = 'resp_pers_tel' class='form-controls' value="<?= $responsible_persons['tel'] ?>">
											</div>											
											<!---------------------------Email ответственного лица--------------------------------------->
											<div class="form-group">
												<label for = 'resp_pers_email' class='label_subject'>E-mail:</label>
												<input type='text' name = 'resp_pers_email' id = 'resp_pers_email' class='form-controls' value="<?= $responsible_persons['email'] ?>">
											</div>
											
											
										</fieldset>	
									</form>
														<div class="group">
															<div class="group-button">
																<button type="submit" class="btn btn-primary" onclick="resp_pers.update()">Сохранить</button>
																<!--a href="/ARM/admin/responsible_persons/list/<?//= $responsible_persons['id_reestr_unp'] ?>" class="submit_cancel"><button type="submit" class="btn btn-primary">Отмена</button></a-->
																<a href="javascript:history.back()" class="submit_cancel btn-primary">Отмена</a>
															</div>
														</div>	
						
                    
											<div id="messenger"></div>
            

            </div>
        </div>
    </main>
	
<?php Theme::block('modal/modalSearchUnp') ?>	
<?php $this->theme->footer(); ?>