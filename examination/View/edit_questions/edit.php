<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-question"></i></span><p>Настройка</p></div>
    <main>
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Настройка вопросов</h5>
					<h3><span><i class="icon-rp">&nbsp</i></span>Редактирование вопросов</h3>
                </div>
            </div>
			
			
<!---------------------------------------------------------------редактирование вопросов в тесте у лиц ответственных за электрохозяйство------------------------------------------------------------------->			
			<div class="accordion-container">
				<a href="#" class="accordion-titulo"><div><p> - редактирование вопросов в тесте у лиц ответственных за электрохозяйство</p></div><span class="toggle-icon"></span></a>
											
					<div class="accordion-content">			
			

							<div class="top_of_page">         
								<div class ='nav_buttons'> 
									<button onclick='modalWindow.openModalEdit("ModalQuestion_elekto")' class="button_unp"><span><i class="icon-plus"></i></span>Добавить вопрос</button>
									<div class='search_table'>
										<input type="text" class="form-control pull-right" id="search_table_qe" placeholder="Поиск по таблице">
									</div>
								</div>	



							</div>
							<div class="block w1-5">
								<label class='label_subject'>Выберите тему:</label>
							</div>
							<form class="form" >
								<div class="flex filter_block">					
										<select class="form-controls" name="themes_el" id="themes_el"  onchange="test.select_by_themes()">
											<option value='0'>Все темы</option>
												<?php foreach($themeses as $themes):?>
														<option value=<?=$themes['id']?>><?=$themes['name']?></option>
												 <?php endforeach; ?>
										</select>

								</div>
								<div class="total_check"><p id = "count_theme">Всего: <?= (count($test_questions_elektro)> 0 ? count($test_questions_elektro) : '0')  ?> шт.</p></div><span class="toggle-icon"></span>
							</form>	


							<div class="base_part">
								<form id="formPage" mode="edit" class='form'>		
																<div class="mobileTable">									
																		<table class="cwdtable questions_electro" cellspacing="0" cellpadding="1" border="1" id = "edit_q_elektro">
																			<thead>
																				<tr>
																					<th width='10%'	class="t3">ID вопроса</th>
																					<th width='80%'	class="t3">Текст вопроса</th>
																					<th width='10%'	class="t3">Операции</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php


																					foreach($test_questions_elektro as $questions_elektro){
																					echo "<tr id_question_elekto='".$questions_elektro['id']."' id_themes_elekto='".$questions_elektro['id_theme']."'>";
																					echo "<td width='10%' name='id_question_elektro'>".$questions_elektro['id']."</td>";
																					echo "<td width='80%' name='name_question_elektro'>".$questions_elektro['question']."</td>";																	

																					echo "<td width='10%'><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEditQuestions('ModalQuestion_elekto',".$questions_elektro['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div></div></td></tr>";
																					}
																				?>
																			</tbody>					
																		</table>
																</div>
																	
																		
								</form>
							</div>


		
			
					</div>
			</div>			
<!---------------------------------------------------------------редактирование вопросов в тесте у лиц ответственных за тепловое хозяйство------------------------------------------------------------------->			
			<div class="accordion-container">
				<a href="#" class="accordion-titulo"><div><p> - редактирование вопросов в тесте у лиц ответственных за тепловое хозяйство</p></div><span class="toggle-icon"></span></a>
											
					<div class="accordion-content">			
			


							<div class="top_of_page">         
								<div class ='nav_buttons'> 
									<button onclick='modalWindow.openModal("ModalQuestion_teplo")' class="button_unp"><span><i class="icon-plus"></i></span>Добавить вопрос</button>
									<div class='search_table'>
										<input type="text" class="form-control pull-right" id="search_table_gt" placeholder="Поиск по таблице">
									</div>
								</div>	



							</div>
							<div class="block w1-5">
								<label class='label_subject'>Выберите тему:</label>
							</div>
							<form class="form" >
								<div class="flex filter_block">					
										<select class="form-controls" name="themes_tep" id="themes_tep"  onchange="test.select_by_themes_t()">
											<option value='0'>Все темы</option>
												<?php foreach($themeses_t as $themes):?>
														<option value=<?=$themes['id']?>><?=$themes['name']?></option>
												 <?php endforeach; ?>
										</select>

								</div>
								<div class="total_check"><p id = "count_theme_t">Всего: <?= (count($test_questions_teplo)> 0 ? count($test_questions_teplo) : '0')  ?> шт.</p></div><span class="toggle-icon"></span>
							</form>	


							<div class="base_part">
								<form id="formPage" mode="edit" class='form'>		
																<div class="mobileTable">									
																		<table class="cwdtable questions_teplo" cellspacing="0" cellpadding="1" border="1" id = "edit_q_teplo">
																			<thead>
																				<tr>
																					<th width='10%'	class="t3">ID вопроса</th>
																					<th width='80%'	class="t3">Текст вопроса</th>
																					<th width='10%'	class="t3">Операции</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php


																					foreach($test_questions_teplo as $questions_teplo){
																					echo "<tr id_question_teplo='".$questions_teplo['id']."' id_themes_teplo='".$questions_teplo['id_theme']."'>";
																					echo "<td width='10%' name='id_question_teplo'>".$questions_teplo['id']."</td>";
																					echo "<td width='80%' name='name_question_teplo'>".$questions_teplo['question']."</td>";																	

																					echo "<td width='10%'><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEditQuestionsTeplo('ModalQuestion_teplo',".$questions_teplo['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div></div></td></tr>";
																					}
																				?>
																			</tbody>					
																		</table>
																</div>
																	
																		
								</form>
							</div>




		
			
					</div>
			</div>			
			
			
			
			

			
					

    </main>

<?php Theme::block('modal/modal_Question_elekto') ?>
<?php Theme::block('modal/modal_Question_teplo') ?>

<?php $this->theme->footer(); ?>