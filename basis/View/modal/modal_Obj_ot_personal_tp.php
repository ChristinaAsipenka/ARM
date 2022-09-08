<div id="ModalObj_ot_personal_tp" class="modalDialog_obj_ot_personal_tp">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_personal_tp')">x</button>
		<p class="p_og_flue">Прибор учета</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='obj_ot_personal_tps'>
					<input type="hidden" name="id_obj_ot_personal_tp" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'obj_ot_personal_device' class='label_subject'><span class = "formTextRed">*</span>Марка/наименование</label>
						</div>
						<input type='text' name = 'tp_device' id = 'tp_device' class='form-controls'>
					</div>	
					
					<div class="nazn_tp_block">
						<div class="form-group">
							<div class="block w2-5">
								<label for = 'nazn_tp' class='label_subject'><span class = "formTextRed">*</span>Назначение:</label>
							</div>	
						</div>
						
							<!--select name = 'nazn_sar' id = 'nazn_sar' class='form-control'>
								<option value='0'>Выберите назначение</option>
							<?php //foreach($spr_ot_nazn_sar as $item_spr_ot_nazn_sar){ ?>
								<option value='<?php// echo $item_spr_ot_nazn_sar['id']; ?>'><?php //echo $item_spr_ot_nazn_sar['name']; ?></option>
							<?php// }?>
							</select>
							<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_ot_nazn_sar'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
							<div>
								<div class="form-group">
									<input type='checkbox' name = 'block_nazn_tp_ot' id = 'block_nazn_tp_ot' class='custom-checkbox' value="" onclick="object.block_nazn_tp_ot()">
									<label for="block_nazn_tp_ot" class='label_subject' id = 'label_block_nazn_tp_ot'>отопление</label>
								</div>					
								<div class="form-group">
									<input type='checkbox' name = 'block_nazn_tp_gvs' id = 'block_nazn_tp_gvs' class='custom-checkbox' value="" onclick="object.block_nazn_tp_gvs()">
									<label for="block_nazn_tp_gvs" class='label_subject' id = 'label_block_nazn_tp_gvs'>ГВС</label>
								</div>
								<div class="form-group">
									<input type='checkbox' name = 'block_nazn_tp_tn' id = 'block_nazn_tp_tn' class='custom-checkbox' value="" onclick="object.block_nazn_tp_tn()">
									<label for="block_nazn_tp_tn" class='label_subject' id = 'label_block_nazn_tp_tn'>технологические нужды</label>
								</div>
								<div class="form-group">
									<input type='checkbox' name = 'block_nazn_tp_vent' id = 'block_nazn_tp_vent' class='custom-checkbox' value="" onclick="object.block_nazn_tp_vent()">
									<label for="block_nazn_tp_vent" class='label_subject' id = 'label_block_nazn_tp_vent'>вентиляция</label>
								</div>
							</div>
					</div>				

								<div class="form-group">
									<p id="messenger_modal_tp"></p>
								</div>
								<div class="group">
									<div class="group-button">
										<button type="submit" class="shine-button add_btn" onclick="object.add_ot_personal_tp()">Добавить</button>
										<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_ot_personal_tp')">Отмена</button>
									</div>
								</div>
			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_ot_personal_tp_overlay" class='overlay'></div>
