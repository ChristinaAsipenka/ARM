<div id="ModalQuestion_elekto" class="modalQuestion_elekto">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalQuestion_elekto')">x</button>
		<p class="p_og_flue">Редактирование вопроса</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>			
		
		<form id='edit_test_q_elektro'>
		
			<input type="hidden" name="id_test_q_elektro" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->

			

				<div class="form-group">
						<div class="block w3">
							<label for="formTitle" class='label_subject'>Тема:</label>
								<div class="block w6">
									<select class="form-controls" name="name_theme_question_elektro" id="name_theme_question_elektro">
										<option value='0'>Выберите тему</option>
											<?php foreach($themeses as $themes):?>
												<option value=<?=$themes['id']?>><?=$themes['name']?></option>
											<?php endforeach; ?>
									</select>
								</div>
						</div>	
				</div>
				
				
				<div class="form-group">
					<div class="block w3">
						<label for = 'name_potr' class='label_subject'>Наименование вопроса:</label>
								<div class="block w6">
									<textarea name = 'name_question_elektro' id = 'name_question_elektro' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_question=''></textarea>
								</div>			
					</div>			
				</div>		
				<div class="form-group">
					<div class="block w3">										
						<label for = 'name_potr' class='label_subject'>Ответ №1:</label>
								<div class="block w6">
								<input type="radio" id="true_question1" name="true_answer" value="1">
									<textarea name = 'name_a1_electro' id = 'name_a1_electro' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_answer=''></textarea>
								</div>			
					</div>			
				</div>						
				<div class="form-group">
					<div class="block w3">
						<label for = 'name_potr' class='label_subject'>Ответ №2:</label>
								<div class="block w6">
									<input type="radio" id="true_question2" name="true_answer" value="2">
									<textarea name = 'name_a2_electro' id = 'name_a2_electro' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_answer=''></textarea>
								</div>			
					</div>			
				</div>						
				<div class="form-group">
					<div class="block w3">
						<label for = 'name_potr' class='label_subject'>Ответ №3:</label>
								<div class="block w6">
									<input type="radio" id="true_question3" name="true_answer" value="3">
									<textarea name = 'name_a3_electro' id = 'name_a3_electro' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_answer=''></textarea>
								</div>			
					</div>			
				</div>						
				<div class="form-group">
					<div class="block w3">
						<label for = 'name_potr' class='label_subject'>Ответ №4:</label>
								<div class="block w6">
									<input type="radio" id="true_question4" name="true_answer" value="4">
									<textarea name = 'name_a4_electro' id = 'name_a4_electro' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_answer=''></textarea>
								</div>			
					</div>			
				</div>						
						
						
						
						
						
						
						
						
						
								<div class="form-group">
									<p id="messenger_modal_q_e"></p>
								</div>							
						
						
						
						
						
						
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="test.add_test_answer()">Сохранить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalQuestion_elekto')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>


	</div>
</div>
<div id="ModalQuestion_elekto_overlay" class='overlay'></div>