<div id="ModalObj_og_device" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_og_device')">x</button>
		
		<p class="p_og_flue">Газоиспользующее оборудование</p>
			<form id='obj_og_device'>

					<div class="form-group">
						<label for = 'type_device' class='label_subject'>Тип оборудования:</label>
							<input type="hidden" name="id_obj_og_device" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
							<select class="form-control" name="device_type" id="device_type">
							<option value='0'>Выберите тип оборудования</option>
								<?php foreach($spr_og_device_typeCheck as $one_spr_og_device_type):?>
									<option value=<?=$one_spr_og_device_type['id']?>><?=$one_spr_og_device_type['name']?></option>
								<?php endforeach; ?>
							</select>


					<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_device_type'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>


							
					</div>	
					<div class="form-group">
						<label for = 'count_device' class='label_subject'>Количество, шт.:</label>
						<input type='number' name = 'device_counts' id = 'device_counts' class='form-control' step="any"  min='0'>
					</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="btn btn-primary add_btn" onclick="object.add_type_device()">Добавить</button>
							<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_og_device')">Отмена</button>
						</div>
					</div>

			</form>


	</div>
</div>
<div id="ModalObj_og_device_overlay" class='overlay'></div>
