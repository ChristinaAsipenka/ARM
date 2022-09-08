<div id="ModalObj_og_accidents" class="modalDialog_obj_og_accidents">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_og_accidents')">x</button>
		<p class="p_og_flue">Авария или НС</p>
		
				
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='og_accidents'>

					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'accidents_date' class='label_subject'><span class = "formTextRed">*</span>Дата:</label>
						</div>	
						<input type='date' name = 'accidents_date' id = 'accidents_date' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'type_accidents' class='label_subject'><span class = "formTextRed">*</span>Вид аварии или НС:</label>
						</div>	
						<input type="hidden" name="id_obj_og_accidents" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
						<select class="form-controls" name="accidents_type" id="accidents_type">
							<option value='0'>Выберите вид аварии или НС</option>
								<?php foreach($spr_og_accidentsCheck as $spr_og_accidents):?>
									<option value=<?=$spr_og_accidents['id']?>><?=$spr_og_accidents['name']?></option>
								<?php endforeach; ?>
						</select>	
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'accidents_character' class='label_subject'><span class = "formTextRed">*</span>Характер:</label>
						</div>
						<input type='text' name = 'accidents_character' id = 'accidents_character' class='form-controls'>
					</div>	
					
								<div class="form-group">
									<p id="messenger_modal_accidents"></p>
								</div>
					
					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_og_accidents()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_og_accidents')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_og_accidents_overlay" class='overlay'></div>
