<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-rp"></i></span><p>Отв.лица</p></div>
    <main>
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Редактирование</h5>
					<h3><span><i class="icon-rp">&nbsp</i></span><?= $personal['secondname']." ".$personal['firstname']." ".$personal['lastname'] ?></h3>
                </div>	
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/personal/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск ответственных лиц</a>
				</div>
            </div>    
				
		
            <div class="base_part">
           
                <form id="formPage" mode="edit_responsible_person" class="form">	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновная информация</legend>

											<input type="hidden" name="resp_pers_id" id="resp_pers_id" value="<?= $personal['id'] ?>">
											<!---------------------------Юридическое лицо--------------------------------------->
											<div class="form-group">
												<div class="block w1-5">											
													<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Наниматель:</label>
												</div>	
												<!--div class="block w2">
													<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button" disabled>Сменить ЮЛ или ИП</button>
												</div-->
												<div class="block w8 search-request">
													<input type="hidden" name="formUnpId" id="formUnpId" value="<?= $personal['id_reestr_unp'] ?>">
													<span id="name_unp"><?= '('.$unp['unp'].') '. $unp['name'] ?></span>
												</div>
											</div>											
											<!---------------------------ФИО ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_secondname' class='label_subject'><span class = "formTextRed">*</span>Фамилия:</label>
												</div>	
												<input type='text' name = 'resp_pers_secondname' id = 'resp_pers_secondname' class='form-controls'  value="<?= $personal['secondname'] ?>" disabled>
											</div>
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_firstname' class='label_subject'><span class = "formTextRed">*</span>Имя:</label>
												</div>
												<input type='text' name = 'resp_pers_firstname' id = 'resp_pers_firstname' class='form-controls'  value="<?= $personal['firstname'] ?>" disabled>
											</div>
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_lastname' class='label_subject'><span class = "formTextRed">*</span>Отчество:</label>
												</div>
												<input type='text' name = 'resp_pers_lastname' id = 'resp_pers_lastname' class='form-controls'  value="<?= $personal['lastname'] ?>" disabled>
											</div>
											<!---------------------------Должность ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w4">
													<label for = 'resp_pers_post' class='label_subject'><span class = "formTextRed">*</span>Полная должность с указанием места работы:</label>
												</div>
												<input type='text' name = 'resp_pers_post' id = 'resp_pers_post' class='form-controls' value="<?= $personal['post'] ?>" disabled>
													<button onclick='resp_pers.changePost();' class="shine-pers-button">Сменить должность</button>
												<div class="block w0-3">
													<button onclick = "info.showInfo_02();" class = "btn_add"><i class="icon-question help"></i></button>
													<?php Theme::block('modal/infoRulesRPpost') ?>
												</div>	
											</div>

											<!---------------------------Дата назначения на должность ответственного лица--------------------------------------->	
											<div class="form-group">
												<div class="block w3">
													<label for = 'resp_pers_post_data' class='label_subject'>Дата назначения на должность:</label>
												</div>
												<input type='date' name = 'resp_pers_post_data' id = 'resp_pers_post_data' class='form-controls'value="<?= $personal['post_data'] ?>" disabled>
											</div>										
											<!---------------------------Телефон ответственного лица--------------------------------------->		
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_tel' class='label_subject'>Телефон:</label>
												</div>
												<input type='text' name = 'resp_pers_tel' id = 'resp_pers_tel' class='form-controls' value="<?= $personal['tel'] ?>">
											</div>											
											<!---------------------------Email ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w1-5">
													<label for = 'resp_pers_email' class='label_subject'>E-mail:</label>
												</div>
												<input type='text' name = 'resp_pers_email' id = 'resp_pers_email' class='form-controls' value="<?= $personal['email'] ?>">
											</div>
										<!---------------------------Потребители ответственного лица--------------------------------------->
											<hr>
											
											<?php 

											if(count($subjects) > 0){
												echo '<b>Потребители ответственного лица</b>';
											
											?>
												<table class='objects_list'>
												<thead>
														<tr>
															<th width="30%">Направление деятельности</th>
															<th width="10%">Номер дела</th>
															<th width="50%">Региональный потребитель</th>
														</tr>
													</thead>
													<tbody>
													<?php 
													//print_r($subjects);
														foreach($subjects as $subject){
															echo "<tr>";
															echo "<td>".($subject['otv_e1'] == $personal['id'] || $subject['otv_e2'] == $personal['id'] || $subject['otv_e3'] == $personal['id'] ? "электро" : ($subject['otv_t1'] == $personal['id'] || $subject['otv_t2'] == $personal['id'] || $subject['otv_t3'] == $personal['id'] ? "тепло" : ($subject['otv_g1'] == $personal['id']  ? "газ" : '-')))."</td>";
															echo "<td>".(isset($subject['id'])? $subject['id'] : '')."</td>";
															echo "<td>".(isset($subject['name'])? $subject['name'] : '')."</td>";
															echo "</tr>";
														};?>													
													</tbody>
												</table>											

											<?php
											}?>	
											
										<!---------------------------История проверок знаний--------------------------------------->
											<br>
											<?php 

											if(count($personal_result) > 0){
												echo '<b>История проверок знаний</b>';
											
											?><br>				

												<table class='objects_list'>
												<thead>
														<tr>
															<th width="20%">Дата</th>
															<th width="20%">Результат</th>
															<th width="15%">Статус записи</th>
															<th width="15%">Направление деятельности</th>
															<th width="15%">Следующая проверка</th>															
														</tr>
													</thead>
													<tbody>
													<?php 
														foreach($personal_result as $result){
															echo "<tr>";
															echo "<td>".(isset($result['date'])? date('d.m.Y',strtotime($result['date'])) : '')."</td>";
															echo "<td>".(isset($result['test_result'])? $result['test_result'] : '')."</td>";
															echo "<td>".(isset($result['record_mode'])? $result['record_mode'] : '')."</td>";
															echo "<td>".(isset($result['spr_test_napr_name'])? $result['spr_test_napr_name'] : '')."</td>";
															echo "<td>".(isset($result['test_validity'])? date('d.m.Y',strtotime($result['test_validity'])) : '')."</td>";
															echo "</tr>";
														};?>													
													</tbody>
												</table>

											<?php }?>	
											
											
										</fieldset>	
				</form>		
				<div id="messenger"></div>
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="personal.update()">Сохранить</button>
					<a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button">Отмена</a>
				</div>
                 
  					<div class="page_title_footer">
						<h5></h5>
					</div>         

            </div>
        </div>
    </main>
	
<?php Theme::block('modal/modalSearchUnp') ?>	
<?php $this->theme->footer(); ?>