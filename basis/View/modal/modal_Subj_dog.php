<div id="ModalSubj_dog" class="modalSubj_dog">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalSubj_dog')">x</button>
		<p class="p_og_flue">Договор теплоснабжения</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Subj_dog'>
					<input type="hidden" name="id_subj_dog" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
								
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'dog_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label>
						</div>
						<input type='text' name = 'dog_name' id = 'dog_name' class='form-controls'>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'dog_number' class='label_subject'><span class = "formTextRed">*</span>Номер договора:</label>
						</div>
						<input type='text' name = 'dog_number' id = 'dog_number' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'dog_date_dog' class='label_subject'><span class = "formTextRed">*</span>Дата договора:</label>
						</div>
						<input type='date' name = 'dog_date_dog' id = 'dog_date_dog' class='form-controls'>
					</div>						

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_subj_dog"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="subject.add_subj_dog()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalSubj_dog')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalSubj_dog_overlay" class='overlay'></div>
