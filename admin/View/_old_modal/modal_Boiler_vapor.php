<div id="ModalBoiler_vapor" class="modalDialog_boiler_vapor">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalBoiler_vapor')">x</button>
		
		<p class="p_og_flue">Паровой котел</p>
		<form id='boiler_vapor'>
			<input type="hidden" name="id_boiler_vapor" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
			<div class="form-group">
				<label for = 'vapor_type' class='label_subject'>Наименование/марка:</label>
				<input type='text' name = 'vapor_type' id = 'vapor_type' class='form-control'>
			</div>	
			<div class="form-group">
				<label for = 'vapor_year' class='label_subject'>Год ввода в эксплуатацию:</label>
				<input type='text' name = 'vapor_year' id = 'vapor_year' class='form-control'>
			</div>
			<div class="form-group">
				<label for = 'vapor_power' class='label_subject'>Мощность, т/ч:</label>
				<input type='number' name = 'vapor_power' id = 'vapor_power' class='form-control' min='0' step="any">
			</div>


						<div class="group">
							<div class="group-button">
								<button type="submit" class="btn btn-primary add_btn" onclick="object.add_boiler_vapor()">Добавить</button>
								<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalBoiler_vapor')">Отмена</button>
							</div>
						</div>



		</form>


	</div>
</div>
<div id="ModalBoiler_vapor_overlay" class='overlay'></div>