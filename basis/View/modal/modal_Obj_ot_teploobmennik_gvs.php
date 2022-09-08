<div id="ModalObj_ot_teploobmennik_gvs" class="modalDialog_obj_ot_teploobmennik_gvs">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_teploobmennik_gvs')">x</button>
		<p class="p_og_flue">Теплообменники</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Obj_ot_teploobmennik_gvs'>
					<input type="hidden" name="id_obj_ot_teploobmennik_gvs" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'gvs' class='label_subject'><span class = "formTextRed">*</span>Вид теплообменника:</label>
						</div>
						<select name = 'gvs' id = 'gvs' class='form-controls'>
							<option value='0'>Выберите вид теплообменника</option>
						<?php foreach($spr_ot_type_toCheck as $item_spr_teploobmennik_gvs_vid){ ?>
							<option value='<?php echo $item_spr_teploobmennik_gvs_vid['id']; ?>'><?php echo $item_spr_teploobmennik_gvs_vid['name']; ?></option>
						<?php }?>
						</select>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'gvs_name' class='label_subject'><span class = "formTextRed">*</span>Марка/наименование:</label>
						</div>
						<input type='text' name = 'gvs_name' id = 'gvs_name' class='form-controls'>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'gvs_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>
						<input type='number' name = 'gvs_year_begin' id = 'gvs_year_begin' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'gvs_srok' class='label_subject'>Срок службы, г.:</label>
						</div>
						<input type='number' name = 'gvs_srok' id = 'gvs_srok' class='form-controls' step="any" min='0'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'gvs_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>
						<input type='date' name = 'gvs_next_srok' id = 'gvs_next_srok' class='form-controls'>
					</div>						

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_teploobmennik_gvs"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_ot_teploobmennik_gvs()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_ot_teploobmennik_gvs')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalObj_ot_teploobmennik_gvs_overlay" class='overlay'></div>
