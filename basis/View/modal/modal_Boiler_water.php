<div id="ModalBoiler_water" class="modalDialog_boiler_water">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalBoiler_water')">x</button>
		<p class="p_og_flue">Водогрейный котел</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>			
		
		<form id='boiler_water'>
		
			<input type="hidden" name="id_boiler_water" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'water_type' class='label_subject'><span class = "formTextRed">*</span>Наименование /марка:</label>
				</div>
				<input type='text' name = 'water_type' id = 'water_type' class='form-controls'>
			</div>	
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'water_year' class='label_subject'><span class = "formTextRed">*</span>Год ввода в эксплуатацию:</label>
				</div>
				<input type='number' name = 'water_year' id = 'water_year' class='form-controls' maxlength = '4' step="any" min='1950' max='2100'  value="">
			</div>
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'water_counts' class='label_subject'><span class = "formTextRed">*</span>Количество, шт.:</label>
				</div>
				<input type='number' name = 'water_counts' id = 'water_counts' class='form-controls'  step="any"  min='0'>
			</div>			
			
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'type_osn_fuel' class='label_subject'><span class = "formTextRed">*</span>Основное топливо:</label>						
				</div>	
				<select class="form-controls" name="type_osn_fuel" id="type_osn_fuel">
					<option value='0'>Выберите основное топливо</option>
						<?php foreach($spr_oti_type_fuelCheck as $spr_oti_type_fuel):?>
							<option value=<?=$spr_oti_type_fuel['id']?>><?=$spr_oti_type_fuel['name']?></option>
						<?php endforeach; ?>
				</select>			
			</div>
						
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'type_rezerv_fuel' class='label_subject'><span class = "formTextRed">*</span>Резервное топливо:</label>						
				</div>	
				<select class="form-controls" name="type_rezerv_fuel" id="type_rezerv_fuel">
					<option value='0'>Выберите резервное топливо</option>
						<?php foreach($spr_oti_type_fuel_rezervCheck as $spr_oti_type_fuel_rezerv):?>
							<option value=<?=$spr_oti_type_fuel_rezerv['id']?>><?=$spr_oti_type_fuel_rezerv['name']?></option>
						<?php endforeach; ?>
				</select>			
			</div>			
			
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'water_power' class='label_subject'><span class = "formTextRed">*</span>Мощность, кВт:</label>
				</div>
				<input type='number' name = 'water_power' id = 'water_power' class='form-controls' step="0.1"  min='0'>
			</div>


								<div class="form-group">
									<p id="messenger_modal_water"></p>
								</div>
			
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="object.add_boiler_water()">Добавить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalBoiler_water')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>


	</div>
</div>
<div id="ModalBoiler_water_overlay" class='overlay'></div>