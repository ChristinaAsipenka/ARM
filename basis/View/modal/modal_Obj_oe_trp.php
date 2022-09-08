<div id="ModalObj_oe_trp" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_trp')">x</button>
		<p class="p_og_flue">Трансформаторные и распределительные подстанции</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	
			
			<form id='ModalForm_Obj_oe_trp'>
					<input type="hidden" name="id_obj_oe_trp" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'trp_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label>
						</div>
						<input type='text' name = 'trp_name' id = 'trp_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'trp_id_type' class='label_subject'><span class = "formTextRed">*</span>Тип трансформатора:</label>
						</div>
						<input type='text' name = 'trp_id_type' id = 'trp_id_type' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'trp_power' class='label_subject'><span class = "formTextRed">*</span>Мощность, кВА:</label>
						</div>	
						<input type='number' name = 'trp_power' id = 'trp_power' class='form-controls' step="0.1"  min='0'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'trp_volt' class='label_subject'><span class = "formTextRed">*</span>Высокое напряжение, кВ:</label>
						</div>
						<input type='number' name = 'trp_volt' id = 'trp_volt' class='form-controls' step="0.1" min='0'>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'trp_cat' class='label_subject'><span class = "formTextRed">*</span>Категория:</label>
						</div>
						<select name = 'trp_cat' id = 'trp_cat' class='form-controls'>
							<option value='0'>Выберите категорию</option>
						<?php foreach($spr_oe_category_line as $item_spr_trp_category_line){ ?>
							<option value='<?php echo $item_spr_trp_category_line['id']; ?>'><?php echo $item_spr_trp_category_line['name']; ?></option>
						<?php }?>
						</select>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'trp_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>
						<input type='number' name = 'trp_year_begin' id = 'trp_year_begin' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'trp_srok' class='label_subject'>Срок службы, г.:</label>
						</div>	
						<input type='number' name = 'trp_srok' id = 'trp_srok' class='form-controls' step="any" min='0'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'trp_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>	
						<input type='date' name = 'trp_next_srok' id = 'trp_next_srok' class='form-controls'>
					</div>						

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_trp"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_oe_trp()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_oe_trp')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_oe_trp_overlay" class='overlay'></div>
