<div id="ModalObj_oe_klvl" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_klvl')">x</button>
		
		<p class="p_og_flue">Кабельные и воздушные линии</p>
			<form id='ModalForm_Obj_oe_klvl'>

					<input type="hidden" name="id_obj_oe_klvl" value="">

					
					
					<div class="form-group">
						<label for = 'klvl_type' class='label_subject'>Тип:</label>
						<select name = 'klvl_type' id = 'klvl_type' class='form-control'>
							<option value='0'>Выберите тип линии</option>
						<?php foreach($spr_oe_klvl_type as $item_spr_oe_klvl_type){ ?>
							<option value='<?php echo $item_spr_oe_klvl_type['id']; ?>'><?php echo $item_spr_oe_klvl_type['name']; ?></option>
						<?php }?>
						</select>
						<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_oe_klvl_type'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
					</div>
					<div class="form-group">
						<label for = 'klvl_volt' class='label_subject'>Напряжение, кВ:</label>
						<select name = 'klvl_volt' id = 'klvl_volt' class='form-control'>
							<option value='0'>Выберите напряжение линии</option>
						<?php foreach($spr_oe_klvl_volt as $item_spr_oe_klvl_volt){ ?>
							<option value='<?php echo $item_spr_oe_klvl_volt['id']; ?>'><?php echo $item_spr_oe_klvl_volt['name']; ?></option>
						<?php }?>
						</select>
						<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_oe_klvl_volt'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
					</div>
					
					<div class="form-group">
						<label for = 'klvl_name' class='label_subject'>Наименование и номер линии:</label>
						<input type='text' name = 'klvl_name' id = 'klvl_name' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'klvl_mark' class='label_subject'>Марка провода:</label>
						<input type='text' name = 'klvl_mark' id = 'klvl_mark' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'klvl_length' class='label_subject'>Длина, км:</label>
						<input type='number' name = 'klvl_length' id = 'klvl_length' class='form-control' step="any" min='0'>
					</div>
					<div class="form-group">
						<label for = 'klvl_name_center ' class='label_subject'>Точка подключения:</label>
						<input type='text' name = 'klvl_name_center' id = 'klvl_name_center' class='form-control'>
					</div>
					<div class="form-group">
						<label for = 'klvl_year' class='label_subject'>Год ввода в эксплуатацию:</label>
						<input type='text' name = 'klvl_year' id = 'klvl_year' class='form-control'>
					</div>

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="btn btn-primary add_btn" onclick="object.add_obj_oe_klvl()">Добавить</button>
							<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_oe_klvl')">Отмена</button>
						</div>
					</div>

			</form>


	</div>
</div>
<div id="ModalObj_oe_klvl_overlay" class='overlay'></div>