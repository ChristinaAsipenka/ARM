<div id="ModalBoiler_water" class="modalDialog_boiler_water">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalBoiler_water')">x</button>
		
		<p class="p_og_flue">Водогрейный котел</p>
<form id='boiler_water'>
		
			<input type="hidden" name="id_boiler_water" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
			<div class="form-group">
				<label for = 'water_type' class='label_subject'>Наименование/марка:</label>
				<input type='text' name = 'water_type' id = 'water_type' class='form-control'>
			</div>	
			<div class="form-group">
				<label for = 'water_year' class='label_subject'>Год ввода в эксплуатацию:</label>
				<input type='text' name = 'water_year' id = 'water_year' class='form-control'>
			</div>
			<div class="form-group">
				<label for = 'water_power' class='label_subject'>Мощность, Гкал/ч:</label>
				<input type='number' name = 'water_power' id = 'water_power' class='form-control' min='0' step="any">
			</div>


						<div class="group">
							<div class="group-button">
								<button type="submit" class="btn btn-primary add_btn" onclick="object.add_boiler_water()">Добавить</button>
								<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalBoiler_water')">Отмена</button>
							</div>
						</div>



</form>


	</div>
</div>
<div id="ModalBoiler_water_overlay" class='overlay'></div>