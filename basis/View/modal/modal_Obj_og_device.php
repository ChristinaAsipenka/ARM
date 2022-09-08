<div id="ModalObj_og_device" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_og_device')">x</button>
		<p class="p_og_flue">Газоиспользующее оборудование</p>
		
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='obj_og_device'>

					<div class="form-group">
						<div class="block w2-5">
							<label for = 'type_device' class='label_subject'><span class = "formTextRed">*</span>Тип оборудования:</label>
						</div>
						<input type="hidden" name="id_obj_og_device" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
						<select class="form-controls" name="device_type" id="device_type">
							<option value='0'>Выберите тип оборудования</option>
								<?php foreach($spr_og_device_typeCheck as $one_spr_og_device_type):?>
									<option value=<?=$one_spr_og_device_type['id']?>><?=$one_spr_og_device_type['name']?></option>
								<?php endforeach; ?>
						</select>


					<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_og_device_type'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->


							
					</div>	
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'count_device' class='label_subject'>Количество, шт.:</label>
						</div>
						<input type='number' name = 'device_counts' id = 'device_counts' class='form-controls' step="any"  min='0'>
					</div>
					
								<div class="form-group">
									<p id="messenger_modal_device"></p>
								</div>
					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_type_device()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_og_device')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_og_device_overlay" class='overlay'></div>
