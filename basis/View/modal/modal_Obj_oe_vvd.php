<div id="ModalObj_oe_vvd" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_vvd')">x</button>
		<p class="p_og_flue">Высоковольтные двигатели, в т.ч. синхронные</p>

		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	

			<form id='ModalForm_Obj_oe_vvd'>

					<input type="hidden" name="id_obj_oe_vvd" value="">

					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vvd_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label>
						</div>
						<input type='text' name = 'vvd_name' id = 'vvd_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vvd_count' class='label_subject'><span class = "formTextRed">*</span>Количество:</label>
						</div>
						<input type='number' name = 'vvd_count' id = 'vvd_count' class='form-controls' step="any"  min='0'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vvd_power' class='label_subject'><span class = "formTextRed">*</span>Мощность, кВт:</label>
						</div>
						<input type='number' name = 'vvd_power' id = 'vvd_power' class='form-controls' step="0.1"  min='0'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vvd_voltage' class='label_subject'><span class = "formTextRed">*</span>Напряжение, кВ:</label>
						</div>
						<input type='number' name = 'vvd_voltage' id = 'vvd_voltage' class='form-controls' step="0.1"  min='0'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vvd_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>
						<input type='number' name = 'vvd_year_begin' id = 'vvd_year_begin' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vvd_srok' class='label_subject'>Срок службы, г.:</label>
						</div>
						<input type='number' name = 'vvd_srok' id = 'vvd_srok' class='form-controls' step="any" min='0'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'vvd_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>
						<input type='date' name = 'vvd_next_srok' id = 'vvd_next_srok' class='form-controls'>
					</div>	
					

	<!----------------------------------------------------------------------------------------------------------------------------------------->
								<div class="form-group">
									<p id="messenger_modal_vvd"></p>
								</div>	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_oe_vvd()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_oe_vvd')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>

<div id="ModalObj_oe_vvd_overlay" class='overlay'></div>