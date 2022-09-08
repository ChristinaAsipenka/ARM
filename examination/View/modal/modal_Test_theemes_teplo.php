<div id="ModalTest_theemes_teplo" class="modalDialog_test_theemes_teplo">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalTest_theemes_teplo')">x</button>
		<p class="p_og_flue">Настройка количества вопросов в билете</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>			
		
		<form id='count_test_q_t'>
		
			<input type="hidden" name="id_test_theemes_teplo" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->

			
			<div class="form-group">
				<div class="block w1">
					<label for = 'water_year' class='label_subject'>Тема:</label>
				</div>
				<input type='text' name = 'teplo_name_themes' id = 'teplo_name_themes' class='form-controls w4' value="" disabled>
			</div>
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>Количество вопросов:</label>
				</div>
				<input type='number' name = 'teplo_count_g' id = 'teplo_count_g' class='form-controls w0-5' step="any" min='0' value="">
			</div>			
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="guides.add_test_question_teplo()">Сохранить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalTest_theemes_teplo')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>


	</div>
</div>
<div id="ModalTest_theemes_teplo_overlay" class='overlay'></div>