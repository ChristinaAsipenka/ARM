<div id="ModalObj_ot_prit_vent" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_prit_vent')">x</button>
		<p class="p_og_flue">Система приточной вентиляции и воздушного отопления</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Obj_ot_prit_vent'>
					<input type="hidden" name="id_obj_ot_prit_vent" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vent_name' class='label_subject'><span class = "formTextRed">*</span>Марка /наименование калорифера:</label>
						</div>
						<input type='text' name = 'vent_name' id = 'vent_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vent_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>
						<input type='number' name = 'vent_year_begin' id = 'vent_year_begin' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vent_srok' class='label_subject'>Срок службы, г.:</label>
						</div>
						<input type='number' name = 'vent_srok' id = 'vent_srok' class='form-controls' step="any" min='0'>
					</div>	
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vent_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>
						<input type='date' name = 'vent_next_srok' id = 'vent_next_srok' class='form-controls'>
					</div>
					
					
					
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_prit_vent"></p>
								</div>	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_ot_prit_vent()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_ot_prit_vent')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalObj_ot_prit_vent_overlay" class='overlay'></div>
