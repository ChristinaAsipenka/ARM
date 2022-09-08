<div id="ModalQuestion_teplo" class="modalQuestion_teplo">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalQuestion_teplo')">x</button>
		<p class="p_og_flue">Редактирование вопроса</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>			
		
		<form id='edit_test_q_teplo'>
		
			<input type="hidden" name="id_test_q_teplo" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->

			

				<div class="form-group">
						<div class="block w3">
							<label for="formTitle" class='label_subject'>Тема:</label>
								<div class="block w6">
									<select class="form-controls" name="name_theme_question_teplo" id="name_theme_question_teplo">
										<option value='0'>Выберите тему</option>
											<?php foreach($themeses_t as $themes):?>
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
									<textarea name = 'name_question_teplo' id = 'name_question_teplo' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_question=''></textarea>
								</div>			
					</div>			
				</div>		
				<div class="form-group">
					<div class="block w3">										
						<label for = 'name_potr' class='label_subject'>Ответ №1:</label>
								<div class="block w6">
								<input type="radio" id="true_question_t1" name="true_answer_t" value="1">
									<textarea name = 'name_a1_teplo' id = 'name_a1_teplo' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_answer=''></textarea>
								</div>			
					</div>			
				</div>						
				<div class="form-group">
					<div class="block w3">
						<label for = 'name_potr' class='label_subject'>Ответ №2:</label>
								<div class="block w6">
									<input type="radio" id="true_question_t2" name="true_answer_t" value="2">
									<textarea name = 'name_a2_teplo' id = 'name_a2_teplo' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_answer=''></textarea>
								</div>			
					</div>			
				</div>						
				<div class="form-group">
					<div class="block w3">
						<label for = 'name_potr' class='label_subject'>Ответ №3:</label>
								<div class="block w6">
									<input type="radio" id="true_question_t3" name="true_answer_t" value="3">
									<textarea name = 'name_a3_teplo' id = 'name_a3_teplo' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_answer=''></textarea>
								</div>			
					</div>			
				</div>						
				<div class="form-group">
					<div class="block w3">
						<label for = 'name_potr' class='label_subject'>Ответ №4:</label>
								<div class="block w6">
									<input type="radio" id="true_question_t4" name="true_answer_t" value="4">
									<textarea name = 'name_a4_teplo' id = 'name_a4_teplo' class='form-controls name_potr' cols="50" rows="1" placeholder="Наименование" id_answer=''></textarea>
								</div>			
					</div>			
				</div>						
						
						
						
						
						
						
						
						
						
						
						
								<div class="form-group">
									<p id="messenger_modal_q_tep"></p>
								</div>						
						
						
						
						
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="test.add_test_answer_teplo()">Сохранить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalQuestion_teplo')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>


	</div>
</div>
<div id="ModalQuestion_teplo_overlay" class='overlay'></div>