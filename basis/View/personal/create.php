<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-rp"></i></span><p>Персонал</p></div>
    <main>
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Регистрация</h5>
					<h3><span><i class="icon-rp">&nbsp</i></span>Новый персонал</h3>
                </div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/personal/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск персонала</a>
				</div>
            </div>
					
            <div class="base_part">
               
                <form id="formPage" mode="new_responsible_person" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
										<fieldset class = "fieldset_potr">
												<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновная информация</legend>

											<!---------------------------Юридическое лицо--------------------------------------->

											<div class="form-group">
												<div class="block w1-5">	
													<label for = 'search' class='label_subject'><span class = "formTextRed">*</span> Наниматель:</label>
												</div>
												<div class="block w0-5">
													<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "btn_add vert_m6"><i class="icon-paper-clip"></i></button>
												</div>
												<div class="block w8">
													<input type="hidden" name="formUnpId" id="formUnpId" value="<?php echo(isset($unp_head)? $unp_head['id']:'')?>">
													<span id="name_unp" class='label_subject'><?php echo(isset($unp_head)? $unp_head['name']:'')?>&#9668 выберите нанимателя</span>
												</div>

											</div>

											<!---------------------------ФИО ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_secondname' class='label_subject'><span class = "formTextRed">*</span> Фамилия:</label>
												</div>
												<input type='text' name = 'resp_pers_secondname' id = 'resp_pers_secondname' class='form-controls'>
												<!--div class='block w6'>
													<label class='font-size-11'>*  вниматильно вводите данные, в дальнейшем изменение ФИО будет недступно.</label>
												</div-->
											</div>
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_firstname' class='label_subject'><span class = "formTextRed">*</span> Имя:</label>
												</div>
												<input type='text' name = 'resp_pers_firstname' id = 'resp_pers_firstname' class='form-controls'>
											</div>
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_lastname' class='label_subject'><span class = "formTextRed">*</span> Отчество:</label>
												</div>
												<input type='text' name = 'resp_pers_lastname' id = 'resp_pers_lastname' class='form-controls'>
											</div>
											<!---------------------------Должность ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w4">	
													<label for = 'resp_pers_post' class='label_subject'><span class = "formTextRed">*</span> Полная должность с указанием места работы:</label>
												</div>
												<input type='text' name = 'resp_pers_post' id = 'resp_pers_post' class='form-controls w4'>
												<div class="block w0-3">
													<button onclick = "info.showInfo_02();" class = "btn_add"><i class="icon-question help"></i></button>
													<?php Theme::block('modal/infoRulesRPpost') ?>
												</div>
											</div>
											<!---------------------------Дата назначения на должность ответственного лица--------------------------------------->	
											<div class="form-group">
												<div class="block w4">
													<label for = 'resp_pers_post_data' class='label_subject'>Дата назначения на должность:</label>
												</div>
												<input type='date' name = 'resp_pers_post_data' id = 'resp_pers_post_data' class='form-controls'>
												<div class='block w3'>
													<label class='font-size-11'>* применяется для расчёта стажа работы</label>
												</div>
											</div>										
											<!---------------------------Телефон ответственного лица--------------------------------------->		
											<div class="form-group">
												<div class="block w2">
													<label for = 'resp_pers_tel' class='label_subject'>Телефон:</label>
												</div>
												<input type='text' name = 'resp_pers_tel' id = 'resp_pers_tel' class='form-controls'>
											</div>											
											<!---------------------------Email ответственного лица--------------------------------------->
											<div class="form-group">
												<div class="block w2">	
													<label for = 'resp_pers_email' class='label_subject'>E-mail:</label>
												</div>
												<input type='text' name = 'resp_pers_email' id = 'resp_pers_email' class='form-controls'>
											</div>											
										</fieldset>	
						
				</form>
				<div id="messenger"></div>
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="personal.add()">Сохранить</button>
					<a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button">Отмена</a>
				</div>
										                 
											
              

            </div>
        </div>
    </main>

<?php Theme::block('modal/modalSearchUnp') ?>
<?php $this->theme->footer(); ?>