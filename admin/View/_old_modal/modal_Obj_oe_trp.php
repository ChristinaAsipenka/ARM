<div id="ModalObj_oe_trp" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_trp')">x</button>
		
		<p class="p_og_flue">Трансформаторные и распределительные подстанции</p>
			<form id='ModalForm_Obj_oe_trp'>
					<input type="hidden" name="id_obj_oe_trp" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<div class="form-group">
						<label for = 'trp_name' class='label_subject'>Наименование:</label>
						<input type='text' name = 'trp_name' id = 'trp_name' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'trp_id_type' class='label_subject'>Тип трансформатора:</label>
						<input type='text' name = 'trp_id_type' id = 'trp_id_type' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'trp_power' class='label_subject'>Мощность, кВА:</label>
						<input type='number' name = 'trp_power' id = 'trp_power' class='form-control' step="any"  min='0'>
					</div>
					<div class="form-group">
						<label for = 'trp_volt' class='label_subject'>Высокое напряжение, кВ:</label>
						<input type='number' name = 'trp_volt' id = 'trp_volt' class='form-control' step="any">
					</div>
					<div class="form-group">
						<label for = 'trp_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						<input type='text' name = 'trp_year_begin' id = 'trp_year_begin' class='form-control'>
					</div>

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="btn btn-primary add_btn" onclick="object.add_obj_oe_trp()">Добавить</button>
							<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_oe_trp')">Отмена</button>
						</div>
					</div>

			</form>


	</div>
</div>
<div id="ModalObj_oe_trp_overlay" class='overlay'></div>
