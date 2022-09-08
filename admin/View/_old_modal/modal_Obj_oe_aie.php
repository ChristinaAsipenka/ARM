<div id="ModalObj_oe_aie" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_aie')">x</button>
		
		<p class="p_og_flue">Автономные источники электроснабжения</p>
			<form id='ModalForm_Obj_oe_aie'>
					<input type="hidden" name="id_obj_oe_aie" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<div class="form-group">
						<label for = 'aie_name' class='label_subject'>Наименование/марка:</label>
						<input type='text' name = 'aie_name' id = 'aie_name' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'aie_type' class='label_subject'>Тип:</label>
						<input type='text' name = 'aie_type' id = 'aie_type' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'aie_power' class='label_subject'>Мощность, кВт:</label>
						<input type='number' name = 'aie_power' id = 'aie_power' class='form-control' step="any"  min='0'>
					</div>
					<div class="form-group">
						<label for = 'aie_factory' class='label_subject'>Завод-изготовитель:</label>
						<input type='text' name = 'aie_factory' id = 'aie_factory' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'aie_year' class='label_subject'>Год выпуска:</label>
						<input type='text' name = 'aie_year' id = 'aie_year' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'aie_date_last' class='label_subject'>Дата последнего техобслуживания:</label>
						<input type='date' name = 'aie_date_last' id = 'aie_date_last' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'aie_place' class='label_subject'>Место установки:</label>
						<input type='text' name = 'aie_place' id = 'aie_place' class='form-control'>
					</div>
					
					
					
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="btn btn-primary add_btn" onclick="object.add_obj_oe_aie()">Добавить</button>
							<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_oe_aie')">Отмена</button>
						</div>
					</div>

			</form>


	</div>
</div>
<div id="ModalObj_oe_aie_overlay" class='overlay'></div>
