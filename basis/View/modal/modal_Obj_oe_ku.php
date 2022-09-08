<div id="ModalObj_oe_ku" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_ku')">x</button>
		<p class="p_og_flue">Компенсирующие устройства</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	
			
			<form id='ModalForm_Obj_oe_ku'>

					<input type="hidden" name="id_obj_oe_ku" value="">

					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_place' class='label_subject'><span class = "formTextRed">*</span>Место установки:</label>
						</div>	
						<input type='text' name = 'ku_place' id = 'ku_place' class='form-controls'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_name' class='label_subject'><span class = "formTextRed">*</span>Наименование устройства:</label>
						</div>	
						<input type='text' name = 'ku_name' id = 'ku_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_voltage' class='label_subject'><span class = "formTextRed">*</span>Напряжение, кВ:</label>
						</div>	
						<input type='number' name = 'ku_voltage' id = 'ku_voltage' class='form-controls' step="0.1"  min='0'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_count' class='label_subject'><span class = "formTextRed">*</span>Количество:</label>
						</div>	
						<input type='number' name = 'ku_count' id = 'ku_count' class='form-controls' step="any"  min='0'>
					</div>						
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_power' class='label_subject'><span class = "formTextRed">*</span>Мощность, кВАр:</label>
						</div>	
						<input type='number' name = 'ku_power' id = 'ku_power' class='form-controls' step="0.1"  min='0'>
					</div>				
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_count_ar' class='label_subject'><span class = "formTextRed">*</span>Кол-во с автоматическим регулированием:</label>
						</div>	
						<input type='number' name = 'ku_count_ar' id = 'ku_count_ar' class='form-controls' step="any"  min='0'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_max_ar' class='label_subject'><span class = "formTextRed">*</span>Макс. значение автоматически регулируемой мощности, кВАр:</label>
						</div>	
						<input type='number' name = 'ku_max_ar' id = 'ku_max_ar' class='form-controls' step="any"  min='0'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>	
						<input type='number' name = 'ku_year_begin' id = 'ku_year_begin' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_srok' class='label_subject'>Срок службы, г.:</label>
						</div>	
						<input type='number' name = 'ku_srok' id = 'ku_srok' class='form-controls' step="any" min='0'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ku_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>	
						<input type='date' name = 'ku_next_srok' id = 'ku_next_srok' class='form-controls'>
					</div>	
					

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_ku"></p>
								</div>
	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_oe_ku()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_oe_ku')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>

<div id="ModalObj_oe_ku_overlay" class='overlay'></div>