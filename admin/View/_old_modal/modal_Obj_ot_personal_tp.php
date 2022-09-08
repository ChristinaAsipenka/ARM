<div id="ModalObj_ot_personal_tp" class="modalDialog_obj_ot_personal_tp">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_personal_tp')">x</button>
		
		<p class="p_og_flue">ИТП</p>
			<form id='obj_ot_personal_tp'>
					<input type="hidden" name="id_obj_ot_personal_tp" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<div class="form-group">
						<label for = 'obj_ot_personal_device' class='label_subject'>Типы приборов учета</label>
						<input type='text' name = 'tp_device' id = 'tp_device' class='form-control'>
					</div>	
					<div class="form-group">
						<label for = 'tp_count_device' class='label_subject'>Количество ПУ, шт.</label>
						<input type='number' name = 'tp_count_device' id = 'tp_count_device' class='form-control' step="any"  min='0'>
					</div>					
					<!--div class="form-group">
						<label for = 'tp_sar' class='label_subject'>Тип САР</label>
						<input type='text' name = 'tp_sar' id = 'tp_sar' class='form-control'>
					</div>					
					<div class="form-group">
						<label for = 'tp_count_sar' class='label_subject'>Количество САР, шт.</label>
						<input type='number' name = 'tp_count_sar' id = 'tp_count_sar' class='form-control'  step="any"  min='0'>
					</div-->					

			
								<div class="group">
									<div class="group-button">
										<button type="submit" class="btn btn-primary add_btn" onclick="object.add_ot_personal_tp()">Добавить</button>
										<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_ot_personal_tp')">Отмена</button>
									</div>
								</div>
			</form>


	</div>
</div>
<div id="ModalObj_ot_personal_tp_overlay" class='overlay'></div>
