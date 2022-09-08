<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-test"></i></span><p>тестирование</p></div>
    <main>
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Тестирование</h5>
					<h3><span><i class="icon-paper-clip">&nbsp</i></span>Ввод результата</h3>
                </div>
            </div>
					
            <div class="base_part">
               
                <form id="formPage" mode="enter_result" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
										<fieldset class = "fieldset_potr">
											<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspИнформация о лице прошедшем проверку знаний в другой организации</legend>

											<div class="form-group">
												<div class="block w2-5">
													<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Тип записи:</label>
												</div>	
												<select class="form-controls" name="record_source" id="record_source"  onchange="test.group_hide_show(this.value)">
													<option value='1'>ручной ввод наша ПЗ</option>
													<option value='2'>автоматизированный ввод наша ПЗ</option>
													
												</select>
										</div>	
									
									
									<!---------------------------Ответственное лицо--------------------------------------->	
										<div class="form-group">
											 
												<div class="block w2-5">
													<label></label>
												</div>
												
												<button class='shine-button' onclick='test.ShowSearchWindow()'>Выбрать</button>
												<input type='hidden' value='' name='id_rp' id='id_rp'>
												
												<div class='searchWindow'>
													<button class="btnHideBlock" onclick="test.hideSearchBlock()">× </button>
													<div class="search-request search-request_rp">	
														<input id="search" class='field_search form-control' placeholder="Фамилия..." searchdata = "responsible_person_fio">
														</input>
														<button class='clear_field'>×</button>
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
										
										<fieldset class = "">
											

											<input type="hidden" name="resp_pers_id" id="resp_pers_id" value="">
											<!---------------------------Юридическое лицо--------------------------------------->
											<div class="form-group">
												<div class="block w1-5">											
													<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Закреплён<br>за ЮЛ или ИП:</label>
												</div>	
												
												<div class="block w8 search-request">
													<input type="hidden" name="formUnpId" id="formUnpId" value="">
													<span id="name_unp"></span>
												</div>
												<div class="block w2">
													<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button test_chose_unp">Выбрать ЮЛ или ИП</button>
												</div>
											</div>											
											<!---------------------------ФИО ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_secondname' class='label_subject'><span class = "formTextRed">*</span>Фамилия:</label>
												</div>	
												<input type='text' name = 'resp_pers_secondname' id = 'resp_pers_secondname' class='form-controls'  value="" disabled>
											</div>
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_firstname' class='label_subject'><span class = "formTextRed">*</span>Имя:</label>
												</div>
												<input type='text' name = 'resp_pers_firstname' id = 'resp_pers_firstname' class='form-controls'  value="" disabled>
											</div>
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_lastname' class='label_subject'><span class = "formTextRed">*</span>Отчество:</label>
												</div>
												<input type='text' name = 'resp_pers_lastname' id = 'resp_pers_lastname' class='form-controls'  value="" disabled>
											</div>
											<!---------------------------Должность ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w1-5">
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
												<div class="block w1-5">
													<label for = 'resp_pers_tel' class='label_subject'>Телефон:</label>
												</div>
												<input type='text' name = 'resp_pers_tel' id = 'resp_pers_tel' class='form-controls' value="">
											</div>											
											<!---------------------------Email ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_email' class='label_subject'>E-mail:</label>
												</div>
												<input type='text' name = 'resp_pers_email' id = 'resp_pers_email' class='form-controls' value="">
											</div>
										<!---------------------------Потребители ответственного лица--------------------------------------->
											<!--hr-->
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
										<!---------------------------Направление деятельности--------------------------------------->	
										<hr>
										<div class="form-group">
											<div class="block w2-5">
												<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Направление деятельности:</label>
											</div>	
											<select class="form-controls" name="test_napr" id="test_napr"  onchange="test.group_hide_show(this.value)">
												<option value='0'>Выберите направление деятельности</option>
												<?php foreach($spr_test_napr as $test_napr):?>
													<option value=<?=$test_napr['id']?>><?=$test_napr['name']?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<!---------------------------Группа электробезопасности--------------------------------------->	
										<div group_block = "elektro">
											<div class="form-group">
												<div class="block w2-5">
													<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Группа электробезопасности:</label>
												</div>	
												<select class="form-controls" name="test_group" id="test_group">
													<option value='0'>Выберите группу электробезопасности:</option>
													<?php foreach($spr_test_group as $test_group):?>
														<option value=<?=$test_group['id']?>><?=$test_group['name']?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<!--------------------------- Причина проведения тестирования --------------------------------------->
											<div class="form-group">
													<div class="block w2-5">
														<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Причины проведения тестирования:</label>
													</div>	
													<select class="form-controls" name="test_reasons_el" id="test_reasons_el">
														<option value='0'>Выберите причину проведения</option>
														<?php foreach($spr_test_reasons_elektro as $test_reasons):?>
															<option value=<?=$test_reasons['id']?>><?=$test_reasons['name']?></option>
														<?php endforeach; ?>
													</select>
											</div>
											<!--------------------------- Дата предыдущей проверки --------------------------------------->
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'experience_position' class='label_subject'>Дата предыдущей проверки:</label>
												</div>
												<input type='date' name = 'test_date_old' id = 'test_date_old' class='form-controls' value="">
											</div>
												<!--------------------------- Стаж по группе --------------------------------------->
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'experience_position' class='label_subject'>Стаж работы:</label>
												</div>
												<input type='text' name = 'experience_position' id = 'experience_position' class='form-controls' value="">
											</div>
										</div>

										<div class = "test_teplo_enter">
												<div class="form-group">
													<div class="block w2-5">
														<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Причины проведения тестирования:</label>
													</div>	
													<select class="form-controls" name="test_reasons" id="test_reasons">
														<option value='0'>Выберите причину проведения</option>
														<?php foreach($spr_test_reasons_teplo as $test_reasons):?>
															<option value=<?=$test_reasons['id']?>><?=$test_reasons['name']?></option>
														<?php endforeach; ?>
													</select>
												</div>

												<div class="form-group">
													<div class="block w2-5">
														<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Темы:</label>
													</div>	
													<textarea name='themes_teplo' id='themes_teplo' col='50' row='20'></textarea>
												</div>	
												<br><hr/>
										</div>										
										<br>
										<hr>
										<!--------------------------- Срок на который выдано свидетельство --------------------------------------->	
										<fieldset class = "">									
											<div class="form-group">
												<div class="block w2-5">
													<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Срок действия проверки знаний:</label>
												</div>	
												<select class="form-controls" name="test_validity" id="test_validity">
													<option value='0'>Выберите срок</option>
													<?php foreach($spr_test_validity as $test_validity):?>
														<option value=<?=$test_validity['years']?>><?=$test_validity['name']?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</fieldset>	
										<hr>
										<!---------------------------Подразделение--------------------------------------->	

										<?php Theme::block('common_bloks/addressBranch') ?>
										<hr>
										<!---------------------------Комиссия--------------------------------------->	
										<fieldset class = "">
											<legend class="legend_potr"><span>Комиссия</span></legend>	
											<div class='commission_member'>
												<label>Председатель комиссии</label>
												<div class='search_block'>
													<input type='text' name = 'member_1' id = 'member_1' class='form-controls search' value="" searchdata='userFioAndPosition'></input>
													<ul class='pre-result'></ul>
												</div>
												<span  id = 'member_1_position' class='user_position'></span>
												
												<input type='hidden' name = 'member_1_id' id = 'member_1_id' class='user_id' value="">
											</div>
											
											<div class='commission_member'>
												<label>Член комиссии</label>
												<div class='search_block'>
													<input type='text' name = 'member_2' id = 'member_2' class='form-controls search' value="" searchdata='userFioAndPosition'></input>
													<ul class='pre-result'></ul>
												</div>
												<span  id = 'member_2_position' class='user_position'></span>
												
												<input type='hidden' name = 'member_2_id' id = 'member_2_id' class='user_id' value="">
											</div>
											
											<div class='commission_member'>
												<label>Член комиссии</label>
												<div class='search_block'>
													<input type='text' name = 'member_3' id = 'member_3' class='form-controls search' value="" searchdata='userFioAndPosition'></input>
													<ul class='pre-result'></ul>
												</div>
												<span id = 'member_3_position' class='user_position'></span>
												
												<input type='hidden' name = 'member_3_id' id = 'member_3_id' class='user_id' value="">
											</div>
											<hr>
											<!---------------------------Дата проведения и результат теста--------------------------------------->	
											
											<div class="form-group">
												<div class="block w2-5">
													<label for = '' class='label_subject'><span class = "formTextRed">*</span>Дата проведения:</label>
												</div>
												<input type='date' name = 'date_test' id = 'date_test' class='form-controls'>
											</div>
											
											<div class="form-group">
												<div class="block w2-5">
													<label for = '' class='label_subject'><span class = "formTextRed">*</span>Результат теста:</label>
												</div>
												<select class="form-controls" name="test_result" id="test_result"  onchange="">
													<option value='1' selected>сдан</option>
													<option value='2'>не сдан</option>
													
												</select>
											</div>
											
											
											
											
										
									
										</fieldset>
										
										
										
										
										
										<!--
										<div class="form-group">
											<div class="block w2-5">
												<label for = 'otv_num_sv' class='label_subject'><span class = "formTextRed">*</span>Номер свидетельства:</label>
											</div>
												<input type='text' name = 'otv_num_sv' id = 'otv_num_sv' class='form-controls'>
										</div>
										<div class="form-group">
											<div class="block w2-5">
												<label for = 'otv_date_sv' class='label_subject'><span class = "formTextRed">*</span>Дата выдачи:</label>
											</div>
											<input type='date' name = 'otv_date_sv' id = 'otv_date_sv' class='form-controls'>
										</div>	
										<div class="form-group">
											<div class="block w2-5">
												<label for = 'otv_num_pr' class='label_subject'><span class = "formTextRed">*</span>Номер протокола:</label>
											</div>
												<input type='text' name = 'otv_num_pr' id = 'otv_num_pr' class='form-controls'>
										</div>											
										<div class="form-group">
											<div class="block w2-5">
												<label for = 'otv_date_pr' class='label_subject'><span class = "formTextRed">*</span>Дата протокола:</label>
											</div>
											<input type='date' name = 'otv_date_pr' id = 'otv_date_pr' class='form-controls'>
										</div>												
										<div class="form-group">
											<div class="block w2-5">
												<label for = 'otv_name_org' class="label_subject"><span class = "formTextRed">*</span>Наименование организации проводящей ПЗ:</label>
											</div>	
											<textarea name = 'otv_name_org' id = 'otv_name_org' class='form-controls' cols="50" rows="1" placeholder="Наименование"></textarea>
										</div>											
											
											-->
											
											
																
										</fieldset>	
						
				</form>
				<div id="messenger"></div>
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="test.add_result()">Сохранить</button>
					<a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button">Отмена</a>
					<button type="submit" class="shine-button" id='print_protocol' onclick="" disabled='disabled'>Печать протокола</button>
				</div>
										                 
											
              

            </div>
        </div>
    </main>

<?php Theme::block('modal/modalSearchUnp') ?>

<?php $this->theme->footer(); ?>