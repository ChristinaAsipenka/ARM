<div id="ModalTest_wrong_answer" class="modalDialog_test_wrong_answer">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalTest_wrong_answer')">x</button>
		<p class="p_og_flue">Настройка допустимого количества неправильных ответов</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>			
		
		<form id='count_test_wrong_a'>
		
			<input type="hidden" name="id_test_wrong_answer" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->

			

			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для II группы по ЭБ:</label>
				</div>
				<input type='number' name = 'answer_count_wrong_a2' id = 'answer_count_wrong_a2' class='form-controls w0-5' step="any" min='0' value="">
			</div>
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для III группы по ЭБ:</label>
				</div>
				<input type='number' name = 'answer_count_wrong_a3' id = 'answer_count_wrong_a3' class='form-controls w0-5' step="any" min='0' value="">
			</div>	
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для IV группы по ЭБ:</label>
				</div>
				<input type='number' name = 'answer_count_wrong_a4' id = 'answer_count_wrong_a4' class='form-controls w0-5' step="any" min='0' value="">
			</div>	
			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>для V группы по ЭБ:</label>
				</div>
				<input type='number' name = 'answer_count_wrong_a5' id = 'answer_count_wrong_a5' class='form-controls w0-5' step="any" min='0' value="">
			</div>			
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="guides.add_test_wrong_answer()">Сохранить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalTest_wrong_answer')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>


	</div>
</div>
<div id="ModalTest_wrong_answer_overlay" class='overlay'></div>