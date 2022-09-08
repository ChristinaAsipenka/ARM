<div id="ModalObj_ot_personal_sar" class="modalDialog_obj_ot_personal_sar">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalObj_ot_personal_sar')">x</button>
		<p class="p_og_flue">САР</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>	
			
			<form id='obj_ot_personal_sars'>
					<input type="hidden" name="id_obj_ot_personal_sar" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'sar_sar' class='label_subject'><span class = "formTextRed">*</span>Марка/наименование</label>
						</div>	
						<input type='text' name = 'sar_sar' id = 'sar_sar' class='form-controls'>
					</div>
					
	
					<div class="nazn_sar_block">
						<div class="form-group">
							<div class="block w2-5">
								<label for = 'nazn_sar' class='label_subject'><span class = "formTextRed">*</span>Назначение:</label>
							</div>	
						</div>
							<div>
								<div class="form-group">
									<input type='checkbox' name = 'block_nazn_sar_ot' id = 'block_nazn_sar_ot' class='custom-checkbox' value="" onclick="object.block_nazn_sar_ot()">
									<label for="block_nazn_sar_ot" class='label_subject' id='label_block_nazn_sar_ot'>отопление</label>
								</div>					
								<div class="form-group">
									<input type='checkbox' name = 'block_nazn_sar_gvs' id = 'block_nazn_sar_gvs' class='custom-checkbox' value="" onclick="object.block_nazn_sar_gvs()">
									<label for="block_nazn_sar_gvs" class='label_subject' id='label_block_nazn_sar_gvs'>ГВС</label>
								</div>
								<div class="form-group">
									<input type='checkbox' name = 'block_nazn_sar_tn' id = 'block_nazn_sar_tn' class='custom-checkbox' value="" onclick="object.block_nazn_sar_tn()">
									<label for="block_nazn_sar_tn" class='label_subject' id='label_block_nazn_sar_tn'>технологические нужды</label>
								</div>
								<div class="form-group">
									<input type='checkbox' name = 'block_nazn_sar_vent' id = 'block_nazn_sar_vent' class='custom-checkbox' value="" onclick="object.block_nazn_sar_vent()">
									<label for="block_nazn_sar_vent" class='label_subject' id='label_block_nazn_sar_vent'>вентиляция</label>
								</div>
							</div>
					</div>
					
				
								<div class="form-group">
									<p id="messenger_modal_sar"></p>
								</div>
								<div class="group">
									<div class="group-button">
										<button type="submit" class="shine-button add_btn" onclick="object.add_ot_personal_sar()">Добавить</button>
										<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalObj_ot_personal_sar')">Отмена</button>
									</div>
								</div>
			</form>
		</fieldset>

	</div>
</div>
<div id="ModalObj_ot_personal_sar_overlay" class='overlay'></div>
