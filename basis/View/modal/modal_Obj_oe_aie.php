<div id="ModalObj_oe_aie" class="modalDialog_obj_og_device">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_oe_aie')">x</button>
		<p class="p_og_flue">Автономные источники электроснабжения</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
		
			<form id='ModalForm_Obj_oe_aie'>
					<input type="hidden" name="id_obj_oe_aie" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_name' class='label_subject'><span class = "formTextRed">*</span>Наименование/марка:</label>
						</div>
						<input type='text' name = 'aie_name' id = 'aie_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_place' class='label_subject'><span class = "formTextRed">*</span>Место установки:</label>
						</div>
						<input type='text' name = 'aie_place' id = 'aie_place' class='form-controls'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_type' class='label_subject'><span class = "formTextRed">*</span>Тип:</label>
						</div>
						<input type='text' name = 'aie_type' id = 'aie_type' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_power' class='label_subject'><span class = "formTextRed">*</span>Напряжение, кВ:</label>
						</div>
						<input type='number' name = 'aie_power' id = 'aie_power' class='form-controls'  step="0.1"  min='0'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_mosch' class='label_subject'><span class = "formTextRed">*</span>Мощность, кВт:</label>
						</div>
						<input type='number' name = 'aie_mosch' id = 'aie_mosch' class='form-controls'  step="0.1"  min='0'>
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_pitanie' class='label_subject'><span class = "formTextRed">*</span>Питаемые электроприемники:</label>
						</div>
						<input type='text' name = 'aie_pitanie' id = 'aie_pitanie' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_date_last' class='label_subject'>Дата последнего техобслуживания:</label>
						</div>
						<input type='date' name = 'aie_date_last' id = 'aie_date_last' class='form-controls'>
					</div>										
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_factory' class='label_subject'>Завод-изготовитель:</label>
						</div>
						<input type='text' name = 'aie_factory' id = 'aie_factory' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>
						<input type='number' name = 'aie_year_begin' id = 'aie_year_begin' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_srok' class='label_subject'>Срок службы, г.:</label>
						</div>
						<input type='number' name = 'aie_srok' id = 'aie_srok' class='form-controls' step="any" min='0'>
					</div>	
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'aie_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>	
						<input type='date' name = 'aie_next_srok' id = 'aie_next_srok' class='form-controls'>
					</div>
					
					
					
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_aie"></p>
								</div>	
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_oe_aie()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_oe_aie')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_oe_aie_overlay" class='overlay'></div>
