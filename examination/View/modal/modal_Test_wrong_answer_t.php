<div id="ModalTest_wrong_answer_t" class="modalDialog_test_wrong_answer_t">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalTest_wrong_answer_t')">x</button>
		<p class="p_og_flue">Настройка допустимого количества неправильных ответов</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>			
		
		<form id='count_test_wrong_a_t'>
		
			<input type="hidden" name="id_test_wrong_answer_t" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->

			

			<div class="form-group">
				<div class="block w2">
					<label for = 'water_year' class='label_subject'>Количество:</label>
				</div>
				<input type='number' name = 't_count_wrong_a_t' id = 't_count_wrong_a_t' class='form-controls w0-5' step="any" min='0' value="">
			</div>
				
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="guides.add_test_wrong_answer_t()">Сохранить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalTest_wrong_answer_t')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>


	</div>
</div>
<div id="ModalTest_wrong_answer_t_overlay" class='overlay'></div>