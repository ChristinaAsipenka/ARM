<div id="ModalObj_oe_ek" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_ek')">x</button>
		<p class="p_og_flue">Электрокотельные, другое электронагревательное оборудование</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	
			
			<form id='ModalForm_Obj_oe_ek'>

					<input type="hidden" name="id_obj_oe_ek" value="">

					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_place' class='label_subject'><span class = "formTextRed">*</span>Место установки:</label>
						</div>
						<input type='text' name = 'ek_place' id = 'ek_place' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_name' class='label_subject'><span class = "formTextRed">*</span>Тип электронагревателя:</label>
						</div>
						<input type='text' name = 'ek_name' id = 'ek_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_count' class='label_subject'><span class = "formTextRed">*</span>Количество:</label>
						</div>
						<input type='number' name = 'ek_count' id = 'ek_count' class='form-controls' step="any"  min='0'>
					</div>						
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_nazn' class='label_subject'><span class = "formTextRed">*</span>Назначение:</label>
						</div>
						<input type='text' name = 'ek_nazn' id = 'ek_nazn' class='form-controls'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_power' class='label_subject'><span class = "formTextRed">*</span>Мощность, кВт:</label>
						</div>
						<input type='number' name = 'ek_power' id = 'ek_power' class='form-controls' step="0.1"  min='0'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_date_vid' class='label_subject'>Дата выдачи разрешения:</label>
						</div>
						<input type='date' name = 'ek_date_vid' id = 'ek_date_vid' class='form-controls'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_rezim' class='label_subject'>Режим работы:</label>
						</div>
						<select name = 'ek_rezim' id = 'ek_rezim' class='form-controls'>
							<option value='0'>Выберите режим работы</option>
						<?php foreach($spr_shift_of_work as $item_spr_oe_rezim_work){ ?>
							<option value='<?php echo $item_spr_oe_rezim_work['id']; ?>'><?php echo $item_spr_oe_rezim_work['name']; ?></option>
						<?php }?>
						</select>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label class='label_subject'>Наличие:</label>
						</div>	
						
						<div>						
							<div class="form-group">	
								<input type='checkbox' name = 'block_is_avt' id = 'block_is_avt' class='custom-checkbox' value="" onclick="object.block_is_avt()">
								<label for="block_is_avt" class='label_subject'>автоматики</label>
							</div>					
							<div class="form-group">	
								<input type='checkbox' name = 'block_is_pu' id = 'block_is_pu' class='custom-checkbox' value="" onclick="object.block_is_pu()">
								<label for="block_is_pu" class='label_subject'>прибора учета</label>
							</div>	
							<div class="form-group">
								<input type='checkbox' name = 'block_is_ak' id = 'block_is_ak' class='custom-checkbox' value="" onclick="object.block_is_ak()">
								<label for="block_is_ak" class='label_subject'>аккумуляции(емк)</label>
							</div>
						</div>
					</div>	
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>
						<input type='number' name = 'ek_year_begin' id = 'ek_year_begin' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_srok' class='label_subject'>Срок службы, г.:</label>
						</div>
						<input type='number' name = 'ek_srok' id = 'ek_srok' class='form-controls' step="any" min='0'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>
						<input type='date' name = 'ek_next_srok' id = 'ek_next_srok' class='form-controls'>
					</div>						

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_ek"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_oe_ek()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_oe_ek')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>

<div id="ModalObj_oe_ek_overlay" class='overlay'></div>