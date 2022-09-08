<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-person"></i></span><p>Физ.лица</p></div>
    <main>
        <div class="container">
		    <div class="top_of_page sticky_body">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Регистрация</h5>
					<h3><span><i class="icon-person">&nbsp</i></span>Новое физическое лицо</h3>
                </div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/individual_persons/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск физических лиц</a>
				</div>
            </div>

            
			<div class="base_part">
                
                <form id="formPage" mode="new_individual_person" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
						<fieldset class = "fieldset_potr">
							<legend class="legend_potr"><span><i class="icon-info"></i></span>&nbspОсновная информация</legend>

							<!---------------------------ФИО ответственного лица--------------------------------------->
							<div class="form-group">
							<div class="block w1">
								<label for = 'ind_pers_firstname' class='label_subject'><span class = "formTextRed">*</span>Фамилия:</label>
							</div>	
								<input type='text' name = 'ind_pers_firstname' id = 'ind_pers_firstname' class='form-controls'>
							</div>
							<div class="form-group">
							<div class="block w1">
								<label for = 'ind_pers_secondname' class='label_subject'><span class = "formTextRed">*</span>Имя:</label>
							</div>	
								<input type='text' name = 'ind_pers_secondname' id = 'ind_pers_secondname' class='form-controls'>
							</div>
							<div class="form-group">
							<div class="block w1">
								<label for = 'ind_pers_lastname' class='label_subject'><span class = "formTextRed">*</span>Отчество:</label>
							</div>
								<input type='text' name = 'ind_pers_lastname' id = 'ind_pers_lastname' class='form-controls'>
							</div>
							<!---------------------------Идентификационный номер--------------------------------------->
							<div class="form-group">
							<div class="">
								<label for = 'ind_pers_identification_number' class='label_subject'><span class = "formTextRed">*</span>Идентификационный №:</label>
							</div>
								<input type='text' name = 'ind_pers_identification_number' id = 'ind_pers_identification_number' class='form-controls'>
							</div>
						</fieldset>	
						
				</form>
				<div id="messenger"></div>
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="ind_pers.add()">Сохранить</button>
					<a href="javascript: (history.length == 1 ? close() : history.back())" class="shine-button">Отмена</a>
				</div>									
                

            </div>
        </div>
    </main>

<?php Theme::block('modal/modalSearchUnp') ?>
<?php $this->theme->footer(); ?>