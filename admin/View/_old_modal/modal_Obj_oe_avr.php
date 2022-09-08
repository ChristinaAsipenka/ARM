<div id="ModalObj_oe_avr" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_avr')">x</button>
		
		<p class="p_og_flue">Наличие АВР</p>
			<form id='ModalForm_Obj_oe_avr'>
					<input type="hidden" name="id_obj_oe_avr" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<div class="form-group">
						<label for = 'place' class='label_subject'>Место установки:</label>
						<input type='text' name = 'avr_place' id = 'avr_place' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'power' class='label_subject'>Напряжение, (в формате 000,00)кВ:</label>
						<input type='number' name = 'avr_power' id = 'avr_power' class='form-control' step="any"  min='0'>
					</div>
					<div class="form-group">
						<label for = 'time' class='label_subject'>Время срабатывания, секунд:</label>
						<input type='text' name = 'avr_time' id = 'avr_time' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'date' class='label_subject'>Дата последней проверки срабатывания:</label>
						<input type='date' name = 'avr_date' id = 'avr_date' class='form-control'>
					</div>
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="btn btn-primary add_btn" onclick="object.add_obj_oe_avr()">Добавить</button>
							<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_oe_avr')">Отмена</button>
						</div>
					</div>

			</form>


	</div>
</div>
<div id="ModalObj_oe_avr_overlay" class='overlay'></div>
