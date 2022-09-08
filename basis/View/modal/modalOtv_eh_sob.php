<div id="ModalOtv_eh_sob" class="modalOtv_eh_sob">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalOtv_eh_sob')">x</button>
		<p class="p_og_flue">Ответственный за электрохозяйство</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Otv_eh_sob'>
					<input type="hidden" name="id_otv_eh_sob" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
								
										
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_rezim' class='label_subject'><span class = "formTextRed">*</span>Ответственный:</label>
						</div>
						<select class="form-controls" name="otv_eh_osn_sob" id="otv_eh_osn_sob" onchange="subject.otv_insert_info(this.value)">

						</select>						
					</div>
					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_number_pr_sob' class='label_subject'><span class = "formTextRed">*</span>Номер приказа:</label>
						</div>
							<input type='text' name = 'otv_number_pr_sob' id = 'otv_number_pr_sob' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_pr_sob' class='label_subject'><span class = "formTextRed">*</span>Дата приказа:</label>
						</div>
						<input type='date' name = 'otv_date_pr_sob' id = 'otv_date_pr_sob' class='form-controls'>
					</div>						

								<!---------------------------- скрытые поля -------------------------->
					<input type='hidden' name = 'id_row_osn_sob' id = 'id_row_osn_sob' class='form-controls' value="">
					<input type='hidden' name = 'id_otv_eh_osn_sob' id = 'id_otv_eh_osn_sob' class='form-controls' value="">			
					<input type='hidden' name = 'otv_eh_osn_sob_secondname' id = 'otv_eh_osn_sob_secondname' class='form-controls' value="">			
					<input type='hidden' name = 'otv_eh_osn_sob_firstname' id = 'otv_eh_osn_sob_firstname' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_sob_lastname' id = 'otv_eh_osn_sob_lastname' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_sob_dolg' id = 'otv_eh_osn_sob_dolg' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_sob_unp_name' id = 'otv_eh_osn_sob_unp_name' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_sob_el_group' id = 'otv_eh_osn_sob_el_group' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_sob_test_validity' id = 'otv_eh_osn_sob_test_validity' class='form-controls' value="">
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_otv_sob"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="subject.add_otv_eh_sob()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalOtv_eh_sob')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalOtv_eh_sob_overlay" class='overlay'></div>
