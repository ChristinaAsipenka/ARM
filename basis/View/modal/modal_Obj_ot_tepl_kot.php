<div id="ModalObj_ot_tepl_kot" class="modalDialog_obj_ot_tepl_kot">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_tepl_kot')">x</button>
		<p class="p_og_flue">Теплообменник котельной</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Obj_ot_tepl_kot'>
					<input type="hidden" name="id_obj_ot_tepl_kot" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'gvs' class='label_subject'><span class = "formTextRed">*</span>Вид теплообменника:</label>
						</div>
						<select name = 'tepl_kot' id = 'tepl_kot' class='form-controls'>
							<option value='0'>Выберите вид теплообменника</option>
						<?php foreach($spr_ot_type_toCheck as $item_spr_teploobmennik_gvs_vid){ ?>
							<option value='<?php echo $item_spr_teploobmennik_gvs_vid['id']; ?>'><?php echo $item_spr_teploobmennik_gvs_vid['name']; ?></option>
						<?php }?>
						</select>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'kot_name' class='label_subject'><span class = "formTextRed">*</span>Марка/наименование:</label>
						</div>
						<input type='text' name = 'kot_name' id = 'kot_name' class='form-controls'>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'kot_year_begin' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>
						<input type='number' name = 'kot_year_begin' id = 'kot_year_begin' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'kot_srok' class='label_subject'>Срок службы, г.:</label>
						</div>
						<input type='number' name = 'kot_srok' id = 'kot_srok' class='form-controls' step="any" min='0'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'kot_next_srok' class='label_subject'>Продление cрока службы:</label>
						</div>
						<input type='date' name = 'kot_next_srok' id = 'kot_next_srok' class='form-controls'>
					</div>						

	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_teploobmennik_kot"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_obj_ot_tepl_kot()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_ot_tepl_kot')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalObj_ot_tepl_kot_overlay" class='overlay'></div>
