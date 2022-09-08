<div id="ModalBoiler_vapor" class="modalDialog_boiler_vapor">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalBoiler_vapor')">x</button>
		<p class="p_og_flue">Паровой котел</p>
		
	<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	
		
		<form id='boiler_vapor'>
			<input type="hidden" name="id_boiler_vapor" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'vapor_type' class='label_subject'><span class = "formTextRed">*</span>Наименование /марка:</label>
				</div>
				<input type='text' name = 'vapor_type' id = 'vapor_type' class='form-controls'>
			</div>	
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'vapor_year' class='label_subject'><span class = "formTextRed">*</span>Год ввода в эксплуатацию:</label>
				</div>
				<input type='number' name = 'vapor_year' id = 'vapor_year' class='form-controls' maxlength = '4' step="any" min='1950' max='2100'  value="">
			</div>
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'vapor_counts' class='label_subject'><span class = "formTextRed">*</span>Количество, шт.:</label>
				</div>
				<input type='number' name = 'vapor_counts' id = 'vapor_counts' class='form-controls'  step="any"  min='0'>
			</div>			
			
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'vapor_type_osn_fuel' class='label_subject'><span class = "formTextRed">*</span>Основное топливо:</label>						
				</div>	
				<select class="form-controls" name="vapor_type_osn_fuel" id="vapor_type_osn_fuel">
					<option value='0'>Выберите основное топливо</option>
						<?php foreach($spr_oti_type_fuelCheck as $spr_oti_type_fuel):?>
							<option value=<?=$spr_oti_type_fuel['id']?>><?=$spr_oti_type_fuel['name']?></option>
						<?php endforeach; ?>
				</select>			
			</div>			
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'vapor_type_rezerv_fuel' class='label_subject'><span class = "formTextRed">*</span>Резервное топливо:</label>						
				</div>
				<select class="form-controls" name="vapor_type_rezerv_fuel" id="vapor_type_rezerv_fuel">
					<option value='0'>Выберите резервное топливо</option>
						<?php foreach($spr_oti_type_fuel_rezervCheck as $spr_oti_type_fuel_rezerv):?>
							<option value=<?=$spr_oti_type_fuel_rezerv['id']?>><?=$spr_oti_type_fuel_rezerv['name']?></option>
						<?php endforeach; ?>
				</select>			
			</div>			
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'vapor_perfomance' class='label_subject'><span class = "formTextRed">*</span>Производительность, т/ч:</label>
				</div>
				<input type='number' name = 'vapor_perfomance' id = 'vapor_perfomance' class='form-controls'  step="0.1"  min='0'>
			</div>			
			<div class="form-group">
				<div class="block w2-5">
					<label for = 'vapor_power' class='label_subject'>Мощность, кВт:</label>
				</div>
				<input type='number' name = 'vapor_power' id = 'vapor_power' class='form-controls'  step="0.1"  min='0'>
			</div>


								<div class="form-group">
									<p id="messenger_modal_vapor"></p>
								</div>
						<div class="group">
							<div class="group-button">
								<button type="submit" class="shine-button add_btn" onclick="object.add_boiler_vapor()">Добавить</button>
								<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalBoiler_vapor')">Отмена</button>
							</div>
						</div>



		</form>
	</fieldset>

	</div>
</div>
<div id="ModalBoiler_vapor_overlay" class='overlay'></div>