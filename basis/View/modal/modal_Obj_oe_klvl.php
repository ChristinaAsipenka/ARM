<div id="ModalObj_oe_klvl" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_klvl')">x</button>
		<p class="p_og_flue">Кабельные и воздушные линии</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	
			
		
			<form id='ModalForm_Obj_oe_klvl'>

					<input type="hidden" name="id_obj_oe_klvl" value="">

					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_type' class='label_subject'><span class = "formTextRed">*</span>Тип:</label>
						</div>	
						<select name = 'klvl_type' id = 'klvl_type' class='form-controls'>
							<option value='0'>Выберите тип линии</option>
						<?php foreach($spr_oe_klvl_type as $item_spr_oe_klvl_type){ ?>
							<option value='<?php echo $item_spr_oe_klvl_type['id']; ?>'><?php echo $item_spr_oe_klvl_type['name']; ?></option>
						<?php }?>
						</select>
						<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_oe_klvl_type'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_volt' class='label_subject'><span class = "formTextRed">*</span>Напряжение, кВ:</label>
						</div>
						<select name = 'klvl_volt' id = 'klvl_volt' class='form-controls'>
							<option value='0'>Выберите напряжение линии</option>
						<?php foreach($spr_oe_klvl_volt as $item_spr_oe_klvl_volt){ ?>
							<option value='<?php echo $item_spr_oe_klvl_volt['id']; ?>'><?php echo $item_spr_oe_klvl_volt['name']; ?></option>
						<?php }?>
						</select>
						<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_oe_klvl_volt'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_name' class='label_subject'><span class = "formTextRed">*</span>Наименование и номер линии:</label>
						</div>
						<input type='text' name = 'klvl_name' id = 'klvl_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_mark' class='label_subject'><span class = "formTextRed">*</span>Марка провода:</label>
						</div>	
						<input type='text' name = 'klvl_mark' id = 'klvl_mark' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_length' class='label_subject'><span class = "formTextRed">*</span>Длина, км:</label>
						</div>
						<input type='number' name = 'klvl_length' id = 'klvl_length' class='form-controls' step="any" min='0'>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_name_center ' class='label_subject'><span class = "formTextRed">*</span>Точка подключения:</label>
						</div>
						<input type='text' name = 'klvl_name_center' id = 'klvl_name_center' class='form-controls'>
					</div>					
					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_cat' class='label_subject'><span class = "formTextRed">*</span>Категория:</label>
						</div>	
						<select name = 'klvl_cat' id = 'klvl_cat' class='form-controls'>
							<option value='0'>Выберите категорию</option>
						<?php foreach($spr_oe_category_line as $item_spr_oe_category_line){ ?>
							<option value='<?php echo $item_spr_oe_category_line['id']; ?>'><?php echo $item_spr_oe_category_line['name']; ?></option>
						<?php }?>
						</select>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_year' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>	
						<input type='number' name = 'klvl_year' id = 'klvl_year' class='form-controls' step="any" min='1950' max='2100' value="">
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_srok' class='label_subject'>Срок службы, г.:</label>
						</div>
						<input type='number' name = 'klvl_srok' id = 'klvl_srok' class='form-controls' step="any" min='0'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'klvl_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>	
						<input type='date' name = 'klvl_next_srok' id = 'klvl_next_srok' class='form-controls'>
					</div>				
					
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
					
					<div class="form-group">
									<p id="messenger_modal_klvl"></p>
					</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_oe_klvl()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_oe_klvl')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_oe_klvl_overlay" class='overlay'></div>