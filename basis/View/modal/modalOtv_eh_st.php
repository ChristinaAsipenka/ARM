<div id="ModalOtv_eh_st" class="modalOtv_eh_st">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalOtv_eh_st')">x</button>
		<p class="p_og_flue">Ответственный за электрохозяйство</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Otv_eh_st'>
					<input type="hidden" name="id_otv_eh_st" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
								
										
					<!--div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_rezim' class='label_subject'><span class = "formTextRed">*</span>Ответственный:</label>
						</div>
						<select class="form-controls" name="otv_eh_osn_sob" id="otv_eh_osn_sob" onchange="subject.otv_insert_info(this.value)">

						</select>						
					</div-->
					<div class="form-group">																				
						<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Ответственное лицо:</label>
							<div class="search-request">
								<input type="hidden" name="formUnpOtvId" id="formUnpOtvId" value="">
								<span id="name_otv_stor"></span>
							</div>
							<button onclick = "modalWindow.openModal('openModalUNP')" id='unp_resp' class="shine-button">Выбрать из реестра юридических лиц и ИП</button>
					</div>
					<input type="hidden" class='label_subject' id = "id_stor_otv" value=""></p>					
					<p class="otv_stor_p" id = "stor_otv"></p>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_number_pr_st' class='label_subject'><span class = "formTextRed">*</span>Номер приказа:</label>
						</div>
							<input type='text' name = 'otv_number_pr_st' id = 'otv_number_pr_st' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_pr_st' class='label_subject'><span class = "formTextRed">*</span>Дата приказа:</label>
						</div>
						<input type='date' name = 'otv_date_pr_st' id = 'otv_date_pr_st' class='form-controls'>
					</div>						
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_number_dog_st' class='label_subject'><span class = "formTextRed">*</span>Номер договора:</label>
						</div>
							<input type='text' name = 'otv_number_dog_st' id = 'otv_number_dog_st' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_dog_st' class='label_subject'><span class = "formTextRed">*</span>Дата договора:</label>
						</div>
						<input type='date' name = 'otv_date_dog_st' id = 'otv_date_dog_st' class='form-controls'>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_dog_continue_st' class='label_subject'><span class = "formTextRed">*</span>Дата действия договора:</label>
						</div>
						<input type='date' name = 'otv_date_dog_continue_st' id = 'otv_date_dog_continue_st' class='form-controls'>
					</div>					
					
					
					
					
					
								<!---------------------------- скрытые поля -------------------------->
					<input type='hidden' name = 'id_row_osn_st' id = 'id_row_osn_st' class='form-controls' value="">
					<input type='hidden' name = 'id_otv_eh_osn_st' id = 'id_otv_eh_osn_st' class='form-controls' value="">			
					<input type='hidden' name = 'otv_eh_osn_st_secondname' id = 'otv_eh_osn_st_secondname' class='form-controls' value="">			
					<input type='hidden' name = 'otv_eh_osn_st_firstname' id = 'otv_eh_osn_st_firstname' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_st_lastname' id = 'otv_eh_osn_st_lastname' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_st_dolg' id = 'otv_eh_osn_st_dolg' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_st_unp_name' id = 'otv_eh_osn_st_unp_name' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_st_el_group' id = 'otv_eh_osn_st_el_group' class='form-controls' value="">
					<input type='hidden' name = 'otv_eh_osn_st_test_validity' id = 'otv_eh_osn_st_test_validity' class='form-controls' value="">
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_otv_st"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="subject.add_otv_eh_st()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalOtv_eh_st')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalOtv_eh_st_overlay" class='overlay'></div>
