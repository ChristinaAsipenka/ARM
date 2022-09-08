


<div id="openModalRespPerson" class="modalDialog_guides">
	
	
	
	
	
	
	<div class="modal_go">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalRespPerson')">x</button>
	
		<p class="p_og_flue">Добавление нового лица</p>
		<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Новая запись</legend>	

					<input type="hidden" name="id_resp_pers" id ="hidElem" value="">
					
					<div class="form-group">
						<div class="block w1-5">											
							<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Закрепить<br>за ЮЛ или ИП:</label>
						</div>	
						
						<div class="block w1-5">
							<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button">Выбрать ЮЛ или ИП</button>
						</div>
						</div>	
					
					<div class="form-group">
						<div class="block w5 search-request">
							<input type="hidden" name="formUnpId" id="formUnpId" value="<?php echo(isset($unp_head)? $unp_head['id']:'')?>">
								<span id="name_unp"><?php echo(isset($unp_head)? $unp_head['name']:'')?></span>
						</div>
						
					</div>	
					
					<div class="form-group">
						<div class="block w1-5">
							<label for = 'resp_pers_secondname' class='label_subject'><span class = "formTextRed">*</span>Фамилия:</label>
						</div>
						<input type='text' name = 'resp_pers_secondname' id = 'resp_pers_secondname' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w1-5">
							<label for = 'resp_pers_firstname' class='label_subject'><span class = "formTextRed">*</span>Имя:</label>
						</div>
						<input type='text' name = 'resp_pers_firstname' id = 'resp_pers_firstname' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w1-5">
							<label for = 'resp_pers_lastname' class='label_subject'><span class = "formTextRed">*</span>Отчество:</label>
						</div>
						<input type='text' name = 'resp_pers_lastname' id = 'resp_pers_lastname' class='form-controls'>
					</div>
					<!---------------------------Должность ответственного лица--------------------------------------->
					<div class="form-group">
						<div class="block w1-5">	
							<label for = 'resp_pers_post' class='label_subject'><span class = "formTextRed">*</span>Должность:</label>
						</div>
						<input type='text' name = 'resp_pers_post' id = 'resp_pers_post' class='form-controls'>
					</div>
					<!---------------------------Дата назначения на должность ответственного лица--------------------------------------->	
					<div class="form-group">
						<div class="block w1-5">
							<label for = 'resp_pers_post_data' class='label_subject'><span class = "formTextRed">*</span>Дата назначения на должность:</label>
						</div>
						<input type='date' name = 'resp_pers_post_data' id = 'resp_pers_post_data' class='form-controls'>
					</div>										
					<!---------------------------Телефон ответственного лица--------------------------------------->		
					<div class="form-group">
						<div class="block w1-5">
							<label for = 'resp_pers_tel' class='label_subject'>Телефон:</label>
						</div>
					<input type='text' name = 'resp_pers_tel' id = 'resp_pers_tel' class='form-controls'>
					</div>											
					<!---------------------------Email ответственного лица--------------------------------------->
					<div class="form-group">
						<div class="block w1-5">	
							<label for = 'resp_pers_email' class='label_subject'>E-mail:</label>
						</div>
						<input type='text' name = 'resp_pers_email' id = 'resp_pers_email' class='form-controls'>
					</div>					


					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="resp_pers.add()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalRespPerson')">Отмена</button>
						</div>
					</div>

		</fieldset>
	</div>
</div>
<div id="openModalRespPerson_overlay" class='overlay'></div>