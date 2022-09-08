<div id="ModalObj_ot_heatnet" class="modalDialog_obj_ot_heatnet">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_heatnet')">x</button>
		<p class="p_og_flue">Тепловые сети</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	
			
			<form id='obj_ot_heatnet'>
				<input type="hidden" name="id_obj_ot_heatnet" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
				
						
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'heatnet_conect_point' class='label_subject'><span class = "formTextRed">*</span>Точка подключения:</label>
						</div>
						<input type='text' name = 'heatnet_conect_point' id = 'heatnet_conect_point' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'heatnet_end_point' class='label_subject'>Конечная точка:</label>
						</div>
						<input type='text' name = 'heatnet_end_point' id = 'heatnet_end_point' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'heatnet_year' class='label_subject'>Год ввода в эксплуатацию:</label>
						</div>
						<input type='number' name = 'heatnet_year' id = 'heatnet_year' class='form-controls' step="any" min='1950' max='2100'  value="">
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'heatnet_length' class='label_subject'>Длина участка, м.:</label>
						</div>
						<input type='number' name = 'heatnet_length' id = 'heatnet_length' class='form-controls'  step="any"  min='0'>
					</div>
					<div class="form-group">
						<div class="block w2-5">
							<label for="formTitle" class='label_subject'>Условный диаметр, мм.:</label>
						</div>
						<select class="form-controls" name="heatnet_diameter" id="heatnet_diameter">
							<option value='0'>Выберите условный диаметр</option>
								<?php foreach($spr_ot_heatnet_diametr_tubeCheck as $spr_ot_heatnet_diametr_tube):?>
									<option value=<?=$spr_ot_heatnet_diametr_tube['id']?>><?=$spr_ot_heatnet_diametr_tube['name']?></option>
								<?php endforeach; ?>
						</select>	
					</div>	
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'heatnet_count_tube' class='label_subject'>Количество труб, шт.:</label>
						</div>
						<input type='number' name = 'heatnet_count_tube' id = 'heatnet_count_tube' class='form-controls'  step="any"  min='0'>
					</div>					
						
					<div class="form-group">
						<div class="block w2-5">
							<label for="formTitle" class='label_subject'>Техническое исполнение:</label>
						</div>
						<select class="form-controls" name="heatnet_underground" id="heatnet_underground">
							<option value='0'>Выберите техническое исполнение</option>
								<?php foreach($spr_ot_heatnet_type_undergroundCheck as $heatnet_underground):?>
									<option value=<?=$heatnet_underground['id']?>><?=$heatnet_underground['name']?></option>
								<?php endforeach; ?>
						</select>	
					</div>					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'type_device' class='label_subject'>Тип трубы:</label>						
						</div>
						<select class="form-controls" name="type_isolation" id="type_isolation" onclick="object.ts_hide_show(this.value)">
							<option value='0'>Выберите тип трубы</option>
								<?php foreach($spr_ot_heatnet_type_isoCheck as $heatnet_type_iso):?>
									<option value=<?=$heatnet_type_iso['id']?>><?=$heatnet_type_iso['name']?></option>
								<?php endforeach; ?>
						</select>		
					</div>	
					
					<div id="ts_type_tube">
							<div class="form-group">
								<div class="block w2-5">								
									<label for = 'heatnet_type_isolation' class='label_subject'>Вид изоляции:</label>						
								</div>	
								<select class="form-controls" name="heatnet_type_isolation" id="heatnet_type_isolation">
									<option value='0'>Выберите вид изоляции</option>
										<?php foreach($spr_ot_type_izolCheck as $spr_ot_type_izol):?>
											<option value=<?=$spr_ot_type_izol['id']?>><?=$spr_ot_type_izol['name']?></option>
										<?php endforeach; ?>
								</select>			
							</div>
					</div>		
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'heatnet_prim' class='label_subject'>Примечание:</label>
						</div>
						<input type='text' name = 'heatnet_prim' id = 'heatnet_prim' class='form-controls'>
					</div>					
					
					
					
					
	<!----------------------------------------------------------------------------------------------------------------------------------------->					
								<div class="form-group">
									<p id="messenger_modal_heatnet"></p>
								</div>		
								
								
								<div class="group">
									<div class="group-button">
										<button type="submit" class="shine-button add_btn" onclick="object.add_ot_heatnet()">Добавить</button>
										<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_ot_heatnet')">Отмена</button>
									</div>
								</div>

			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_ot_heatnet_overlay" class='overlay'></div>
