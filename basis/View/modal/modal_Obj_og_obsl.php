<div id="ModalObj_og_obsl" class="modalDialog_obj_og_obsl">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_og_obsl')">x</button>
		<p class="p_og_flue">Обследование объекта</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='og_obsl'>

					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'obsl_date' class='label_subject'><span class = "formTextRed">*</span>Дата обследования:</label>
						</div>
						<input type='date' name = 'obsl_date' id = 'obsl_date' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'type_obsl' class='label_subject'><span class = "formTextRed">*</span>Вид обследования:</label>
						</div>
						<input type="hidden" name="id_obj_og_obsl" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
						<select class="form-controls" name="obsl_type" id="obsl_type">
							<option value='0'>Выберите вид обследования</option>
								<?php foreach($spr_og_obsl_goCheck as $spr_og_obsl_go):?>
									<option value=<?=$spr_og_obsl_go['id']?>><?=$spr_og_obsl_go['name']?></option>
								<?php endforeach; ?>
						</select>	
					</div>	

					
								<div class="form-group">
									<p id="messenger_modal_obsl"></p>
								</div>
					
					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_og_obsl()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_og_obsl')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_og_obsl_overlay" class='overlay'></div>
