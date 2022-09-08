


<div id="openModalGuides" class="modalDialog_guides">
	
	
	
	
	
	
	<div class="modal_go">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalGuides')">x</button>
	
		<p class="p_og_flue">Внесение изменений в справочник</p>
		<fieldset class = "fieldset_potr">
		<legend class="legend_potr"><span><i class="icon-check"></i></span>&nbsp Запись справочника </legend>	

		
		<?php 
		
		
		if(isset($_POST['params'])){
			$guides_link = $_POST['params'];
			$guides_place = 1;
			echo '<input type="hidden" name="guides_place" id ="guides_place" value="1">';
			//GuidesController::listing();
			
		}else{
			$guides_link = trim($_GET['guide']);
			echo '<input type="hidden" name="guides_place" id ="guides_place" value="2">';
		}

			switch($guides_link){

				///////////////////////////// Справочник темы теста электро/////////////////////////////////////////////				
	case "spr_test_theme_elektro": ?>
					<input type="hidden" name="id_test_theme" id ="hidElem" value="">
				
					<div class="form-group">
						<div class="block w2"><label for = 'razdel_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'razdel_name' id = 'razdel_name' class='form-controls'>
					</div>					

					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_test_theme_elektro()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			

				///////////////////////////// Справочник темы теста тепло/////////////////////////////////////////////				
	case "spr_test_theme_teplo": ?>
					<input type="hidden" name="id_test_theme" id ="hidElem" value="">
				
					<div class="form-group">
						<div class="block w2"><label for = 'razdel_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'razdel_name' id = 'razdel_name' class='form-controls'>
					</div>					

					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_test_theme_teplo()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
				///////////////////////////// Справочник темы теста газ/////////////////////////////////////////////				
	case "spr_test_theme_gaz": ?>
					<input type="hidden" name="id_test_theme" id ="hidElem" value="">
				
					<div class="form-group">
						<div class="block w2"><label for = 'razdel_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'razdel_name' id = 'razdel_name' class='form-controls'>
					</div>					

					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_test_theme_gaz()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;					
			///////////////////////////// Справочник направления деятельности/////////////////////////////////////////////
	case "spr_test_napr": ?>
					<input type="hidden" name="id_test_napr" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'napr_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'napr_name' id = 'napr_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_test_napr()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;	
			///////////////////////////// Справочник группы электробезопасности/////////////////////////////////////////////
	case "spr_test_group": ?>
					<input type="hidden" name="id_test_group" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'group_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'group_name' id = 'group_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_test_group()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
		///////////////////////////// Справочник виды теста/////////////////////////////////////////////
	case "spr_test_vid": ?>
					<input type="hidden" name="id_test_vid" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'vid_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'vid_name' id = 'vid_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_test_vid()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
	case "spr_otv": ?>
					<input type="hidden" name="id_resp_pers" id ="hidElem" value="">
					
					<div class="form-group">
						<div class="block w1-5">											
							<label for = 'search' class='label_subject'><span class = "formTextRed">*</span>Закрепить<br>за ЮЛ или ИП:</label>
						</div>	
						<div class="block w1-5">
							<button onclick = "modalWindow.openModal('openModalUNP')" id='unp2' class = "shine-button">Выбрать ЮЛ или ИП</button>
						</div>
						<div class="block w1-5 search-request">
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
						<div class="block w3">
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
							<button type="submit" class="shine-button add_btn" onclick="guides.add_test_vid()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					
					
					<?php break;?>

			
			<?php } ?>


		</fieldset>
	</div>
</div>
<div id="openModalGuides_overlay" class='overlay'></div>