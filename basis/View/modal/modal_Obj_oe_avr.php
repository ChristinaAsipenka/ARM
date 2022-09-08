<div id="ModalObj_oe_avr" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_avr')">x</button>
		<p class="p_og_flue">Наличие АВР</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Obj_oe_avr'>
					<input type="hidden" name="id_obj_oe_avr" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'place' class='label_subject'><span class = "formTextRed">*</span>Место установки:</label>
						</div>	
						<input type='text' name = 'avr_place' id = 'avr_place' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'power' class='label_subject'><span class = "formTextRed">*</span>Напряжение, кВ:</label>
						</div>
						<input type='number' name = 'avr_power' id = 'avr_power' class='form-controls' step="0.1"  min='0'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'time' class='label_subject'>Время срабатывания, секунд:</label>
						</div>	
						<input type='number' name = 'avr_time' id = 'avr_time' class='form-controls' step="any" min='0'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'date' class='label_subject'>Дата последней проверки срабатывания:</label>
						</div>	
						<input type='date' name = 'avr_date' id = 'avr_date' class='form-controls'>
					</div>
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_avr"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_oe_avr()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_oe_avr')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_oe_avr_overlay" class='overlay'></div>
