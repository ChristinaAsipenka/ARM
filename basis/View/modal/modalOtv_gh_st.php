<div id="ModalOtv_gh_st" class="modalOtv_gh_st">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalOtv_gh_st')">x</button>
		<p class="p_og_flue">Ответственный за газовое хозяйство</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Otv_gh_st'>
					<input type="hidden" name="id_otv_gh_st" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
								
										

					<div class="form-group">																				
						<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Ответственное лицо:</label>
							<div class="search-request">
								<input type="hidden" name="formUnpOtvId" id="formUnpOtvId" value="">
								<span id="name_otv_stor_g"></span>
							</div>
							<button onclick = "modalWindow.openModal('openModalUNP')" id='unp_resp_g' class="shine-button">Выбрать из реестра юридических лиц и ИП</button>
					</div>
					<input type="hidden" class='label_subject' id = "id_stor_otv_g" name="id_stor_otv_g" value=""></p>					
					<p class="otv_stor_p_g" id = "stor_otv_g"></p>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_number_pr_st_g' class='label_subject'><span class = "formTextRed">*</span>Номер приказа:</label>
						</div>
							<input type='text' name = 'otv_number_pr_st_g' id = 'otv_number_pr_st_g' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_pr_st_g' class='label_subject'><span class = "formTextRed">*</span>Дата приказа:</label>
						</div>
						<input type='date' name = 'otv_date_pr_st_g' id = 'otv_date_pr_st_g' class='form-controls'>
					</div>						
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_number_dog_st_g' class='label_subject'><span class = "formTextRed">*</span>Номер договора:</label>
						</div>
							<input type='text' name = 'otv_number_dog_st_g' id = 'otv_number_dog_st_g' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_dog_st_g' class='label_subject'><span class = "formTextRed">*</span>Дата договора:</label>
						</div>
						<input type='date' name = 'otv_date_dog_st_g' id = 'otv_date_dog_st_g' class='form-controls'>
					</div>
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_dog_continue_st_g' class='label_subject'><span class = "formTextRed">*</span>Дата действия договора:</label>
						</div>
						<input type='date' name = 'otv_date_dog_continue_st_g' id = 'otv_date_dog_continue_st_g' class='form-controls'>
					</div>					
					
					
					
					
					
								<!---------------------------- скрытые поля -------------------------->
					<input type='hidden' name = 'id_row_osn_st_g' id = 'id_row_osn_st_g' class='form-controls' value="">
					<input type='hidden' name = 'id_otv_gh_osn_st' id = 'id_otv_gh_osn_st' class='form-controls' value="">			
					<input type='hidden' name = 'otv_gh_osn_st_secondname' id = 'otv_gh_osn_st_secondname' class='form-controls' value="">			
					<input type='hidden' name = 'otv_gh_osn_st_firstname' id = 'otv_gh_osn_st_firstname' class='form-controls' value="">
					<input type='hidden' name = 'otv_gh_osn_st_lastname' id = 'otv_gh_osn_st_lastname' class='form-controls' value="">
					<input type='hidden' name = 'otv_gh_osn_st_dolg' id = 'otv_gh_osn_st_dolg' class='form-controls' value="">
					<input type='hidden' name = 'otv_gh_osn_st_unp_name' id = 'otv_gh_osn_st_unp_name' class='form-controls' value="">
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_otv_st_g"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_otv_gh_st()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalOtv_gh_st')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalOtv_gh_st_overlay" class='overlay'></div>
