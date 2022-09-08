<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-test"></i></span><p>Проверка знаний</p></div>
    <main>
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Проверка знаний</h5>
					<h3><span><i class="icon-check-ok">&nbsp</i></span>Тестирование</h3>
					
                </div>
            </div>
					
            <div class="base_part">
               
                <form id="formPage" mode="new_testing" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
										
						<div class="form-group">					
							
							<div class="block w9">	
								<!---------------------------Направление деятельности--------------------------------------->	
								<div class="form-group">
									<div class="block w3">
										<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Выберите тест:</label>
									</div>
									<div class="block w5">	
										<select class="form-controls" name="test_napr" id="test_napr" onchange="test.group_hide_show(this.value)">
											<option value='0'>выберите направление деятельности</option>
											<?php foreach($spr_test_napr as $test_napr):?>
											<option value=<?=$test_napr['id']?>><?=$test_napr['name']?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>																					
									
								<!---------------------------Группа электробезопасности--------------------------------------->	
								<div class="form-group">
									<div group_block = "elektro">	
										<div class="block w3">
											<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Группа электробезопасности:</label>
										</div>	
										<div class="block w5">	
											<select class="form-controls" name="test_group" id="test_group" onchange="test.group_electro_start(this.value)">
												<option value='0'>выберите</option>
												<?php foreach($spr_test_group as $test_group):?>
												<option value=<?=$test_group['id']?>><?=$test_group['name']?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>		
								</div>
							</div>	
							
							<div class="block w3">		
								<!---------------------------Вид запуска теста--------------------------------------->	
								<fieldset class="fieldset_box">
									<label for="formTitle" class='label_subject'>Вид запуска теста:</label>
											
									<select class="form-controls" name="test_vid" id="test_vid">
										<?php foreach($spr_test_vid as $test_vid):?>
											<option value=<?=$test_vid['id']?> <?=($test_vid['id'] == 2 ? 'selected' : '')?>><?=$test_vid['name']?></option>
										<?php endforeach; ?>
									</select>
											
								</fieldset>																	
							</div>	
						</div>	
				
<!----------------------------------------------------------------------------------------------------------------------->				
				
							<fieldset class = "fieldset_rp">
								<legend class="legend_potr"><span><i class="icon-user"></i></span>&nbspИнформация о лице проходящем проверку знаний</legend>
								
								<!---------------------------Ответственное лицо--------------------------------------->	
										<div class="form-group">
											 
											<div class="block w2-5">
												<label></label>
											</div>

											<input type='hidden' value='' name='id_rp' id='id_rp'>
											
											<div class='_searchWindow'>
													<div class="search-request search-request_rp">	
														<input id="search" class='field_search form-control' placeholder="Фамилия..." searchdata = "responsible_person_fio" autocomplete="off">
														</input>
														<button class='clear_field' type="button">×</button>
														<ul id='pre-result'></ul>
													</div>
												<div id="search_result"></div>
											</div>

											<div class="tooltip m-top10">
												<button class = "btn_add_fields" onclick="test.createNewRP()">
													<i class="icon-plus"></i>
													<span class = "tooltiptext">Добавить новое лицо</span>
												</button>
											</div>

										</div>
																				
										<fieldset class = "block_info_rp" id="hidden_main_info">
											

											<input type="hidden" name="resp_pers_id" id="resp_pers_id" value="">
											<!---------------------------Юридическое лицо--------------------------------------->
											<div class="form-group">
												<div class="block w2">											
													<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Закреплён<br>за ЮЛ или ИП:</label>
												</div>	
												
												<div class="block w7 search-request">
													<input type="hidden" name="formUnpId" id="formUnpId" value="">
													<span id="name_unp"></span>
												</div>
												<div class="block w2">
													<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button test_chose_unp">Выбрать ЮЛ или ИП</button>
												</div>
											</div>											
											<!---------------------------ФИО ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_secondname' class='label_subject'><span class = "formTextRed">*</span>Фамилия:</label>
												</div>	
												<input type='text' name = 'resp_pers_secondname' id = 'resp_pers_secondname' class='form-controls'  value="" disabled>
											</div>
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_firstname' class='label_subject'><span class = "formTextRed">*</span>Имя:</label>
												</div>
												<input type='text' name = 'resp_pers_firstname' id = 'resp_pers_firstname' class='form-controls'  value="" disabled>
											</div>
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_lastname' class='label_subject'><span class = "formTextRed">*</span>Отчество:</label>
												</div>
												<input type='text' name = 'resp_pers_lastname' id = 'resp_pers_lastname' class='form-controls'  value="" disabled>
											</div>
											<!---------------------------Должность ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_post' class='label_subject'><span class = "formTextRed">*</span>Должность:</label>
												</div>
												<input type='text' name = 'resp_pers_post' id = 'resp_pers_post' class='form-controls' value="" disabled>
												<button onclick='resp_pers.changePost();'>Сменить должность</button>
											</div>
											<!---------------------------Дата назначения на должность ответственного лица--------------------------------------->	
											<div class="form-group">
												<div class="block w3">
													<label for = 'resp_pers_post_data' class='label_subject'><span class = "formTextRed">*</span>Дата назначения на должность:</label>
												</div>
												<input type='date' name = 'resp_pers_post_data' id = 'resp_pers_post_data' class='form-controls' value="" disabled>
											</div>										
											<!---------------------------Телефон ответственного лица--------------------------------------->		
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_tel' class='label_subject'>Телефон:</label>
												</div>
												<input type='text' name = 'resp_pers_tel' id = 'resp_pers_tel' class='form-controls' value="">
											</div>											
											<!---------------------------Email ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_email' class='label_subject'>E-mail:</label>
												</div>
												<input type='text' name = 'resp_pers_email' id = 'resp_pers_email' class='form-controls' value="">
											</div>
										<!---------------------------Потребители ответственного лица--------------------------------------->
											<hr>
											<div id='sbj_list'>
											</div>
											<?php 
											/*if(count($subjects) > 0){
												echo '<b>Потребители ответственного лица</b>';
											foreach($subjects as $subject) {?>
												<p class='sbj_list'>- <?php echo $subject['name'];?></p>
											<?php }
											
											}*/?>	
											<div class="group">
												<div class="group-button">
													<button type="submit" class="shine-button add_btn test_create_rp" onclick="resp_pers.add()">Добавить</button>
													<button type="submit" class="shine-button add_btn test_update_rp" onclick="resp_pers.update()">Сохранить</button>
													<!--button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalRespPerson')">Отмена</button-->
												</div>
											</div>
										</fieldset>	
										
							</fieldset>
										
										<!---------------------------Место проведения и комиссия--------------------------------------->
										<fieldset class = "fieldset_rp">
											<legend class="legend_potr"><span><i class="icon-map"></i></span>&nbspМесто проведения и комиссия</legend>
											<?php Theme::block('common_bloks/addressBranch') ?>
										
											<div class='commission_member'>
												<div class="block w2">
													<label>Председатель комиссии</label>
												</div>	
												<div class='search_block'>
													<input type='text' name = 'member_1' id = 'member_1' class='form-controls search' value="" searchdata='userFioAndPosition'></input>
													<ul class='pre-result'></ul>
												</div>
												<span  id = 'member_1_position' class='user_position'></span>
												<span  id = 'member_1_podrazd' class='user_podrazd'></span>
												
												<input type='hidden' name = 'member_1_id' id = 'member_1_id' class='user_id' value="">
											</div>
											
											<div class='commission_member'>
												<div class="block w2">
													<label>Член комиссии</label>
												</div>	
												<div class='search_block'>
													<input type='text' name = 'member_2' id = 'member_2' class='form-controls search' value="" searchdata='userFioAndPosition'></input>
													<ul class='pre-result'></ul>
												</div>
												<span  id = 'member_2_position' class='user_position'></span>
												<span  id = 'member_2_podrazd' class='user_podrazd'></span>
												
												<input type='hidden' name = 'member_2_id' id = 'member_2_id' class='user_id' value="">
											</div>
											
											<div class='commission_member'>
												<div class="block w2">
													<label>Член комиссии</label>
												</div>	
												<div class='search_block'>
													<input type='text' name = 'member_3' id = 'member_3' class='form-controls search' value="" searchdata='userFioAndPosition'></input>
													<ul class='pre-result'></ul>
												</div>
												<span id = 'member_3_position' class='user_position'></span>
												<span  id = 'member_3_podrazd' class='user_podrazd'></span>
												
												<input type='hidden' name = 'member_3_id' id = 'member_3_id' class='user_id' value="">
											</div>
										</fieldset>
										
	<!--------------------------- Дополнительная информация --------------------------------------->
							<fieldset class = "fieldset_rp">
								<legend class="legend_potr"><span>Дополнительная информация</span></legend>											
											
								<!--------------------------- Срок на который выдано свидетельство --------------------------------------->																
								<div class="form-group">
									<div class="block w2">
										<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Срок:</label>
									</div>	
									<select class="form-controls" name="test_validity" id="test_validity">
										<option value='0'>Выберите срок</option>
											<?php foreach($spr_test_validity as $test_validity):?>
												<option value=<?=$test_validity['years']?>><?=$test_validity['name']?></option>
											<?php endforeach; ?>
									</select>
								</div>
									
									
								<!----------------- ЭЛКЕТРО ---------------------------->
								<div class = "test_el">
									<!--------------------------- Причина проведения тестирования электро--------------------------------------->
									<div class="form-group">
										<div class="block w2">
											<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Причины проведения тестирования:</label>
										</div>	
										<select class="form-controls" name="test_reasons_el" id="test_reasons_el">
											<option value='0'>Выберите причину</option>
												<?php foreach($spr_test_reasons_elektro as $test_reasons):?>
													<option value=<?=$test_reasons['id']?>><?=$test_reasons['name']?></option>
												<?php endforeach; ?>
										</select>
									</div>
											
											<!--------------------------- Стаж по группе --------------------------------------->
												<!--div class="form-group">
													<div class="block w2">
														<label for = 'experience_group' class='label_subject'>Стаж по группе:</label>
													</div>
													<input type='number' name = 'experience_group' id = 'experience_group' class='form-controls' value="">
												</div-->

									<!--------------------------- Дата предыдущей проверки --------------------------------------->
									<div class="form-group">
										<div class="block w2">
											<label for = 'experience_position' class='label_subject'>Дата предыдущей проверки:</label>
										</div>
										<input type='date' name = 'test_date_old' id = 'test_date_old' class='form-controls' value="">
									</div>
									
									<!--------------------------- Стаж работы --------------------------------------->
									<div class="form-group">
										<div class="block w2">
											<label for = 'experience_position' class='label_subject'>Стаж работы:</label>
										</div>
										<input type='number' name = 'experience_position' id = 'experience_position' class='form-controls' value="" min='0' max='80'>
									</div>
											
								</div>
										
										
								<!----------------- ТЕПЛО ---------------------------->
								<div class = "test_teplo fieldset_rp">
									<!--------------------------- Причина проведения тестирования тепло--------------------------------------->
									<div class="form-group">
										<div class="block w2">
											<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Причины проведения тестирования тепло:</label>
										</div>	
										<select class="form-controls" name="test_reasons_teplo" id="test_reasons_teplo">
											<option value='0'>Выберите причину</option>
												<?php foreach($spr_test_reasons_teplo as $test_reasons):?>
													<option value=<?=$test_reasons['id']?>><?=$test_reasons['name']?></option>
												<?php endforeach; ?>
										</select>
									</div>
								</div>
							</fieldset>
										
						
				</form>
				<div id="messenger"></div>
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button btn_start_test" onclick="test.start_test()" disabled>Начать</button>
					<!--a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button">Отмена</a-->
				</div>
										                 
											
              

            </div>
        </div>
    </main>

<?php Theme::block('modal/modalRespPerson') ?>
<?php Theme::block('modal/modalSearchUnp') ?>


<?php $this->theme->footer(); ?>