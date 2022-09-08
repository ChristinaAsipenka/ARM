<div id="ModalObj_ot_heatnet_t" class="modalDialog_obj_ot_heatnet_t">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_heatnet_t')">x</button>
		
		<p class="p_og_flue">Тепловые сети</p>
			<form id='obj_ot_heatnet_t'>
			<input type="hidden" name="id_obj_ot_heatnet_t" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					

					
					<!--div class="form-group">
						<label for="formTitle" class='label_subject'>Принадлежность:</label>
						<select class="form-control" name="type_obj_heatnet_t" id="type_obj_heatnet_t">
							<option value='0'>Выберите принадлежность</option>
								<?php //foreach($spr_ot_heatnet_type_objCheck as $type_obj_heatnet):?>
									<option value=<?//=$type_obj_heatnet['id']?>><?//=$type_obj_heatnet['name']?></option>
								<?php //endforeach; ?>
						</select>
					</div-->	
					
					<div class="form-group">
						<label for = 't_conect_point' class='label_subject'>Точка подключения:</label>
						<input type='text' name = 't_conect_point' id = 't_conect_point' class='form-control'>
					</div>
					
					<div class="form-group">
						<label for = 't_length' class='label_subject'>Длина участка, м.:</label>
						<input type='number' name = 't_length' id = 't_length' class='form-control'  step="any"  min='0'>
					</div>
					<div class="form-group">
						<label for = 't_diameter' class='label_subject'>Условный диаметр, мм.:</label>
						<input type='number' name = 't_diameter' id = 't_diameter' class='form-control'  step="any"  min='0'>
					</div>	
					<div class="form-group">
						<label for = 't_count_tube_t' class='label_subject'>Количество труб, шт.:</label>
						<input type='number' name = 't_count_tube' id = 't_count_tube' class='form-control'  step="any"  min='0'>
					</div>					
						
					<div class="form-group">
						<label for="formTitle" class='label_subject'>Техническое исполнение:</label>
						<select class="form-control" name="t_underground" id="t_underground">
							<option value='0'>Выберите техническое исполнение</option>
								<?php foreach($spr_ot_heatnet_type_undergroundCheck as $heatnet_underground):?>
									<option value=<?=$heatnet_underground['id']?>><?=$heatnet_underground['name']?></option>
								<?php endforeach; ?>
						</select>
					<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_heatnet_type_underground'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>	
					</div>					
					<div class="form-group">
						<label for = 'type_device' class='label_subject'>Тип трубы:</label>						
							<select class="form-control" name="type_isolation_iso" id="type_isolation_iso">
							<option value='0'>Выберите тип трубы</option>
								<?php foreach($spr_ot_heatnet_type_isoCheck as $heatnet_type_iso):?>
									<option value=<?=$heatnet_type_iso['id']?>><?=$heatnet_type_iso['name']?></option>
								<?php endforeach; ?>
							</select>
					<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_heatnet_type_iso'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>		
							
							
					</div>	
					
					
					<div class="form-group">
							<label for = 't_type_isolation' class='label_subject'>Вид изоляции:</label>						
								<select class="form-control" name="t_type_isolation" id="t_type_isolation">
								<option value='0'>Выберите вид изоляции</option>
									<?php foreach($spr_ot_type_izolCheck as $spr_ot_type_izol):?>
										<option value=<?=$spr_ot_type_izol['id']?>><?=$spr_ot_type_izol['name']?></option>
									<?php endforeach; ?>
								</select>
								
						<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_type_izol'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>			
					</div>					
					
					
					
					
					
					
					
					
					
					
					
					<!--div class="form-group">
						<label for = 't_type_isolation' class='label_subject'>Вид изоляции:</label>
						<input type='text' name = 't_type_isolation' id = 't_type_isolation' class='form-control'>
					</div-->
								
								
								
								<div class="group">
									<div class="group-button">
										<button type="submit" class="btn btn-primary add_btn" onclick="object.add_ot_heatnet_t()">Добавить</button>
										<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_ot_heatnet_t')">Отмена</button>
									</div>
								</div>

			</form>


	</div>
</div>
<div id="ModalObj_ot_heatnet_t_overlay" class='overlay'></div>
	