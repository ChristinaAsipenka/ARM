<div id="ModalObj_ot_heatnet" class="modalDialog_obj_ot_heatnet">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_heatnet')">x</button>
		
		<p class="p_og_flue">Тепловые сети</p>
			<form id='obj_ot_heatnet'>
				<input type="hidden" name="id_obj_ot_heatnet" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
				
					
					
					<!--div class="form-group">
						<label for="formTitle" class='label_subject'>Принадлежность:</label>
						<select class="form-control" name="type_obj_heatnet" id="type_obj_heatnet">
							<option value='0'>Выберите принадлежность</option>
								<?php// foreach($spr_ot_heatnet_type_objCheck as $type_obj_heatnet):?>
									<option value=<?//=$type_obj_heatnet['id']?>><?//=$type_obj_heatnet['name']?></option>
								<?php// endforeach; ?>
						</select>
					</div-->	
					<div class="form-group">
						<label for = 'heatnet_conect_point' class='label_subject'>Точка подключения:</label>
						<input type='text' name = 'heatnet_conect_point' id = 'heatnet_conect_point' class='form-control'>
					</div>
					
					<div class="form-group">
						<label for = 'heatnet_length' class='label_subject'>Длина участка, м.:</label>
						<input type='number' name = 'heatnet_length' id = 'heatnet_length' class='form-control'  step="any"  min='0'>
					</div>
					<div class="form-group">
						<label for = 'heatnet_diameter' class='label_subject'>Условный диаметр, мм.:</label>
						<input type='number' name = 'heatnet_diameter' id = 'heatnet_diameter' class='form-control'  step="any"  min='0'>
					</div>	
					<div class="form-group">
						<label for = 'heatnet_count_tube' class='label_subject'>Количество труб, шт.:</label>
						<input type='number' name = 'heatnet_count_tube' id = 'heatnet_count_tube' class='form-control'  step="any"  min='0'>
					</div>					
						
					<div class="form-group">
						<label for="formTitle" class='label_subject'>Техническое исполнение:</label>
						<select class="form-control" name="heatnet_underground" id="heatnet_underground">
							<option value='0'>Выберите техническое исполнение</option>
								<?php foreach($spr_ot_heatnet_type_undergroundCheck as $heatnet_underground):?>
									<option value=<?=$heatnet_underground['id']?>><?=$heatnet_underground['name']?></option>
								<?php endforeach; ?>
						</select>
					<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_heatnet_type_underground'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>		
					</div>					
					<div class="form-group">
							<label for = 'type_device' class='label_subject'>Тип трубы:</label>						
								<select class="form-control" name="type_isolation" id="type_isolation">
								<option value='0'>Выберите тип трубы</option>
									<?php foreach($spr_ot_heatnet_type_isoCheck as $heatnet_type_iso):?>
										<option value=<?=$heatnet_type_iso['id']?>><?=$heatnet_type_iso['name']?></option>
									<?php endforeach; ?>
								</select>
								
						<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_heatnet_type_iso'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>			
					</div>	
					
					
					<div class="form-group">
							<label for = 'heatnet_type_isolation' class='label_subject'>Вид изоляции:</label>						
								<select class="form-control" name="heatnet_type_isolation" id="heatnet_type_isolation">
								<option value='0'>Выберите вид изоляции</option>
									<?php foreach($spr_ot_type_izolCheck as $spr_ot_type_izol):?>
										<option value=<?=$spr_ot_type_izol['id']?>><?=$spr_ot_type_izol['name']?></option>
									<?php endforeach; ?>
								</select>
								
						<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_type_izol'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>			
					</div>					
					
					
					
					
					
					
					<!--div class="form-group">
						<label for = 'heatnet_type_isolation' class='label_subject'>Вид изоляции:</label>
						<input type='text' name = 'heatnet_type_isolation' id = 'heatnet_type_isolation' class='form-control'>
					</div-->
								
								
								
								<div class="group">
									<div class="group-button">
										<button type="submit" class="btn btn-primary add_btn" onclick="object.add_ot_heatnet()">Добавить</button>
										<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('ModalObj_ot_heatnet')">Отмена</button>
									</div>
								</div>

			</form>


	</div>
</div>
<div id="ModalObj_ot_heatnet_overlay" class='overlay'></div>
