<div id="ModalObj_ot_personal_sar" class="modalDialog_obj_ot_personal_sar">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_personal_sar')">x</button>
		
		<p class="p_og_flue">САР</p>
			<form id='obj_ot_personal_sar'>
					<input type="hidden" name="id_obj_ot_personal_sar" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<!--div class="form-group">
						<label for = 'obj_ot_personal_device' class='label_subject'>Типы приборов учета</label>
						<input type='text' name = 'tp_device' id = 'tp_device' class='form-control'>
					</div>	
					<div class="form-group">
						<label for = 'tp_count_device' class='label_subject'>Количество ПУ, шт.</label>
						<input type='number' name = 'tp_count_device' id = 'tp_count_device' class='form-control' step="any"  min='0'>
					</div-->					
					<div class="form-group">
						<label for = 'sar_sar' class='label_subject'>Тип САР</label>
						<input type='text' name = 'sar_sar' id = 'sar_sar' class='form-control'>
					</div>


					<div class="form-group">
						<label for = 'nazn_sar' class='label_subject'>Назначение САР:</label>
						<select name = 'nazn_sar' id = 'nazn_sar' class='form-control'>
							<option value='0'>Выберите назначение</option>
						<?php foreach($spr_ot_nazn_sar as $item_spr_ot_nazn_sar){ ?>
							<option value='<?php echo $item_spr_ot_nazn_sar['id']; ?>'><?php echo $item_spr_ot_nazn_sar['name']; ?></option>
						<?php }?>
						</select>
						<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_nazn_sar'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
					</div>




					
					<div class="form-group">
						<label for = 'sar_count_sar' class='label_subject'>Количество САР, шт.</label>
						<input type='number' name = 'sar_count_sar' id = 'sar_count_sar' class='form-control'  step="any"  min='0'>
					</div>					

			
								<div class="group">
									<div class="group-button">
										<button type="submit" class="btn btn-primary add_btn" onclick="object.add_ot_personal_sar()">Добавить</button>
										<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_ot_personal_sar')">Отмена</button>
									</div>
								</div>
			</form>


	</div>
</div>
<div id="ModalObj_ot_personal_sar_overlay" class='overlay'></div>
