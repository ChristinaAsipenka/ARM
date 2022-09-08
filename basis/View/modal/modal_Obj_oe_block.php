<div id="ModalObj_oe_block" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_block')">x</button>
		<p class="p_og_flue">Блок-станции собственной генерации</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	
			
			<form id='ModalForm_Obj_oe_block'>

					<input type="hidden" name="id_obj_oe_block" value="">

					
					<div class="form-group">
						<div class="block w2">
							<label for = 'block_name' class='label_subject'><span class = "formTextRed">*</span>Наименование/марка:</label>
						</div>
						<input type='text' name = 'block_name' id = 'block_name' class='form-controls'>
					</div>
					
					<div class="form-group">
						<div class="block w2">
							<label for = 'block_power' class='label_subject'><span class = "formTextRed">*</span>Мощность, кВт:</label>
						</div>
						<input type='number' name = 'block_power' id = 'block_power' class='form-controls' step="0.1"  min='0'>
					</div>
					<div class="form-group">
						<div class="block w2">
							<label for = 'energy_type' class='label_subject'><span class = "formTextRed">*</span>Тип:</label>
						</div>
						<select name = 'energy_type' id = 'energy_type' class='form-controls'>
							<option value='0'>Выберите тип используемой энергии</option>
						<?php foreach($spr_oe_energy_type as $item_spr_oe_energy_type){ ?>
							<option value='<?php echo $item_spr_oe_energy_type['id']; ?>'><?php echo $item_spr_oe_energy_type['name']; ?></option>
						<?php }?>
						</select>
						<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_oe_energy_type'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
					</div>
					
					<div class="form-group">
						<div class="block w2">	
							<label class='label_subject'>Возможность работы: </label>
						</div>
						<input type='checkbox' name = 'block_add_load' id = 'block_add_load' class='custom-checkbox' value="" onclick="object.block_add_load()">
						<label for="block_add_load" class='label_subject'>на выделенную нагрузку</label>
					</div>
					

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_block"></p>
								</div>	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_oe_block()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_oe_block')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>

<div id="ModalObj_oe_block_overlay" class='overlay'></div>