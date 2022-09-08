<div id="ModalOtv_gh_sob" class="modalOtv_gh_sob">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalOtv_gh_sob')">x</button>
		<p class="p_og_flue">Ответственный за газовое хозяйство</p>
		
		<fieldset class = "fieldset_potr">
			<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись таблицы</legend>
			
			<form id='ModalForm_Otv_gh_sob'>
					<input type="hidden" name="id_otv_gh_sob" value=""> <!-- поле используется для корректировки, помещается значение корректируемой строки таблицы -->
								
										
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'ek_rezim' class='label_subject'><span class = "formTextRed">*</span>Ответственный:</label>
						</div>
						<select class="form-controls" name="otv_gh_osn_sob" id="otv_gh_osn_sob" onchange="object.otv_insert_info_g(this.value)">

						</select>						
					</div>
					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_number_pr_sob_g' class='label_subject'><span class = "formTextRed">*</span>Номер приказа:</label>
						</div>
							<input type='text' name = 'otv_number_pr_sob_g' id = 'otv_number_pr_sob_g' class='form-controls'>
					</div>					
					
					<div class="form-group">
						<div class="block w2-5">
							<label for = 'otv_date_pr_sob_g' class='label_subject'><span class = "formTextRed">*</span>Дата приказа:</label>
						</div>
						<input type='date' name = 'otv_date_pr_sob_g' id = 'otv_date_pr_sob_g' class='form-controls'>
					</div>						

								<!---------------------------- скрытые поля -------------------------->
					<input type='hidden' name = 'id_row_osn_sob_g' id = 'id_row_osn_sob_g' class='form-controls' value="">
					<input type='hidden' name = 'id_otv_gh_osn_sob' id = 'id_otv_gh_osn_sob' class='form-controls' value="">			
					<input type='hidden' name = 'otv_gh_osn_sob_secondname' id = 'otv_gh_osn_sob_secondname' class='form-controls' value="">			
					<input type='hidden' name = 'otv_gh_osn_sob_firstname' id = 'otv_gh_osn_sob_firstname' class='form-controls' value="">
					<input type='hidden' name = 'otv_gh_osn_sob_lastname' id = 'otv_gh_osn_sob_lastname' class='form-controls' value="">
					<input type='hidden' name = 'otv_gh_osn_sob_dolg' id = 'otv_gh_osn_sob_dolg' class='form-controls' value="">
					<input type='hidden' name = 'otv_gh_osn_sob_unp_name' id = 'otv_gh_osn_sob_unp_name' class='form-controls' value="">
	<!----------------------------------------------------------------------------------------------------------------------------------------->	
								<div class="form-group">
									<p id="messenger_modal_otv_sob_g"></p>
								</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="object.add_otv_gh_sob()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('ModalOtv_gh_sob')">Отмена</button>
						</div>
					</div>

			</form>
		</fieldset>


	</div>
</div>
<div id="ModalOtv_gh_sob_overlay" class='overlay'></div>
