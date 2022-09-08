<div id="ModalTest_theemes" class="modalDialog_test_theemes">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalTest_theemes')">x</button>
		<p class="p_og_flue">Настройка количества вопросов в билете</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>			
		
		<form id='count_test_q'>
		
			<input type="hidden" name="id_test_theemes" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->

			
			<div class="form-group">
				<div class="block w1">
					<label for = 'water_year' class='label_subject'>Тема:</label>
				</div>
				<input type='text' name = 'theemes_name_themes' id = 'theemes_name_themes' class='form-controls w4' value="" disabled>
			</div>
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для II группы по ЭБ:</label>
				</div>
				<input type='number' name = 'theemes_count_g2' id = 'theemes_count_g2' class='form-controls w0-5' step="any" min='0' value="">
			</div>
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для III группы по ЭБ:</label>
				</div>
				<input type='number' name = 'theemes_count_g3' id = 'theemes_count_g3' class='form-controls w0-5' step="any" min='0' value="">
			</div>	
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для IV группы по ЭБ:</label>
				</div>
				<input type='number' name = 'theemes_count_g4' id = 'theemes_count_g4' class='form-controls w0-5' step="any" min='0' value="">
			</div>	
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для V группы по ЭБ:</label>
				</div>
				<input type='number' name = 'theemes_count_g5' id = 'theemes_count_g5' class='form-controls w0-5' step="any" min='0' value="">
			</div>			
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="guides.add_test_question()">Сохранить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalTest_theemes')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>


	</div>
</div>
<div id="ModalTest_theemes_overlay" class='overlay'></div>