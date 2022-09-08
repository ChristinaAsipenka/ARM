<div id="ModalTest_attempt" class="modalDialog_test_attempt">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalTest_attempt')">x</button>
		<p class="p_og_flue">Настройка количества попыток</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>			
		
		<form id='count_test_attempt'>
		
			<input type="hidden" name="id_test_attempt" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->

			

			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для II группы по ЭБ:</label>
				</div>
				<input type='number' name = 'attempt_count_attempt_a2' id = 'attempt_count_attempt_a2' class='form-controls w0-5' step="any" min='0' value="">
			</div>
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для III группы по ЭБ:</label>
				</div>
				<input type='number' name = 'attempt_count_attempt_a3' id = 'attempt_count_attempt_a3' class='form-controls w0-5' step="any" min='0' value="">
			</div>	
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для IV группы по ЭБ:</label>
				</div>
				<input type='number' name = 'attempt_count_attempt_a4' id = 'attempt_count_attempt_a4' class='form-controls w0-5' step="any" min='0' value="">
			</div>	
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для V группы по ЭБ:</label>
				</div>
				<input type='number' name = 'attempt_count_attempt_a5' id = 'attempt_count_attempt_a5' class='form-controls w0-5' step="any" min='0' value="">
			</div>			
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="guides.add_test_attempt()">Сохранить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalTest_attempt')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>


	</div>
</div>
<div id="ModalTest_attempt_overlay" class='overlay'></div>