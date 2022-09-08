<div id="ModalOtv_th_instr" class="modalOtv_th_instr">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalOtv_th_instr')">x</button>
		<p class="p_og_flue">Ответственный за тепловое хозяйство</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Otv_th_instr'>
					<input type="hidden" name="id_otv_th_instr" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->

					<!--div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_instr' class='label_subject'>Ответственный: руководитель организации</label>
						</div>												
					</div-->		
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_instr_t' class='label_subject'><span class = "formTextRed">*</span>Дата инструктажа:</label>
						</div>
						<input type='date' name = 'otv_date_instr_t' id = 'otv_date_instr_t' class='form-controls'>
					</div>						
					
				
					
					
					
					
					
							<!---------------------------- скрытые поля -------------------------->
					<input type='hidden' name = 'id_row_osn_instr_t' id = 'id_row_osn_instr_t' class='form-controls' value="">			
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_otv_instr_t"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="subject.add_otv_th_instr()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalOtv_th_instr')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalOtv_th_instr_overlay" class='overlay'></div>
