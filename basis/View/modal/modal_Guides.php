


<div id="openModalGuides" class="modalDialog_guides">
	
	
	
	
	
	
	<div class="modal_go">
		<button title="закрыть" class="close" onclick = "modalWindowGuides.closeModal('openModalGuides')">x</button>
	
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

				///////////////////////////// Справочник адресных объектов /////////////////////////////////////////////				
	case "spr_type_street": ?>
					<input type="hidden" name="id_type_street" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'type_street_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>	
						<input type='text' name = 'type_street_name' id = 'type_street_name' class='form-controls' required>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'type_street_sokr_name' class='label_subject'><span class = "formTextRed">*</span>Сокращенное наименование:</label></div>
						<input type='text' name = 'type_street_sokr_name' id = 'type_street_sokr_name' class='form-controls' required>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_type_street()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break; 
				
				///////////////////////////// Справочник форм собственности /////////////////////////////////////////////				
	case "spr_type_property": ?>
					<input type="hidden" name="id_type_property" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'type_property_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'type_property_name' id = 'type_property_name' class="form-controls" required>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_type_property()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break; 

				///////////////////////////// Справочник типов населенных пунктов /////////////////////////////////////////////				
	case "spr_type_city": ?>
					<input type="hidden" name="id_type_city" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'type_city_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'type_city_name' id = 'type_city_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'type_city_sokr_name' class='label_subject'><span class = "formTextRed">*</span>Сокращенное наименование:</label></div>
						<input type='text' name = 'type_city_sokr_name' id = 'type_city_sokr_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_type_city()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break; 
				///////////////////////////// Справочник сменности работ /////////////////////////////////////////////				
	case "spr_shift_of_work": ?>
					<input type="hidden" name="id_shift_of_work" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'shift_of_work_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'shift_of_work_name' id = 'shift_of_work_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_shift_of_work()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
				///////////////////////////// Справочник видов теплообменника /////////////////////////////////////////////				
	case "spr_ot_type_to": ?>
					<input type="hidden" name="id_ot_type_to" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_type_to_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_type_to_name' id = 'ot_type_to_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_type_to()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;		
				///////////////////////////// Справочник источников теплоснабжения /////////////////////////////////////////////				
	case "spr_ot_type_heat_source": ?>
					<input type="hidden" name="id_ot_type_heat_source" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_type_heat_source_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_type_heat_source_name' id = 'ot_type_heat_source_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_type_heat_source()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
				///////////////////////////// Справочник систем отопления /////////////////////////////////////////////				
	case "spr_ot_systemheat_water": ?>
					<input type="hidden" name="id_ot_systemheat_water" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_systemheat_water_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_systemheat_water_name' id = 'ot_systemheat_water_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_systemheat_water()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник типов схем присоединения системы отопления /////////////////////////////////////////////				
	case "spr_ot_systemheat_dependent": ?>
					<input type="hidden" name="id_ot_systemheat_dependent" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_systemheat_dependent_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_systemheat_dependent_name' id = 'ot_systemheat_dependent_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_systemheat_dependent()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
				///////////////////////////// Справочник типов тепловой изоляции /////////////////////////////////////////////				
	case "spr_ot_heatnet_type_underground": ?>
					<input type="hidden" name="id_ot_heatnet_type_underground" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_heatnet_type_underground_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_heatnet_type_underground_name' id = 'ot_heatnet_type_underground_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_heatnet_type_underground()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
				///////////////////////////// Справочник типов схем присоединения  горячего водоснабжения /////////////////////////////////////////////				
	case "spr_ot_gvs_open": ?>
					<input type="hidden" name="id_ot_gvs_open" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_gvs_open_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_gvs_open_name' id = 'ot_gvs_open_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_gvs_open()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;		
				///////////////////////////// Справочник мест расположения теплообменника /////////////////////////////////////////////				
	case "spr_ot_gvs_in": ?>
					<input type="hidden" name="id_ot_gvs_in" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_gvs_in_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_gvs_in_name' id = 'ot_gvs_in_name' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_gvs_in()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник назначений котельной /////////////////////////////////////////////				
				case "spr_oti_boiler_type": ?>
					<input type="hidden" name="id_oti_boiler_type" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'oti_boiler_type_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'oti_boiler_type_name' id = 'oti_boiler_type_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_oti_boiler_type()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;	

				///////////////////////////// Справочник видов изоляции /////////////////////////////////////////////				
				case "spr_ot_type_izol": ?>
					<input type="hidden" name="id_ot_type_izol" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_izol_type_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_izol_type_name' id = 'ot_izol_type_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_type_izol()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;

				///////////////////////////// Справочник видов отопительных приборов /////////////////////////////////////////////				
				case "spr_ot_type_ot_pribor": ?>
					<input type="hidden" name="id_ot_type_ot_pribor" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_pribor_type_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_pribor_type_name' id = 'ot_pribor_type_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_type_ot_pribor()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;



				///////////////////////////// Справочник видов разводки /////////////////////////////////////////////				
				case "spr_ot_type_razvodka": ?>
					<input type="hidden" name="id_ot_type_razvodka" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_razvodka_type_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_razvodka_type_name' id = 'ot_razvodka_type_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_type_razvodka()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;

				///////////////////////////// Справочник назаначений САР /////////////////////////////////////////////				
				case "spr_ot_nazn_sar": ?>
					<input type="hidden" name="id_ot_nazn_sar" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_nazn_sar_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_nazn_sar_name' id = 'ot_nazn_sar_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_nazn_sar()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;

				///////////////////////////// Справочник  типов зданий /////////////////////////////////////////////				
	case "spr_og_type_home": ?>
					<input type="hidden" name="id_og_type_home" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'og_type_home_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'og_type_home_name' id = 'og_type_home_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_og_type_home()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
				///////////////////////////// Справочник  ТО газопроводов/////////////////////////////////////////////				
	case "spr_og_to_gaz": ?>
					<input type="hidden" name="id_og_to_gaz" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'og_to_gaz_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'og_to_gaz_name' id = 'og_to_gaz_name' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_og_to_gaz()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
				///////////////////////////// Справочник  обследований газового объекта/////////////////////////////////////////////				
	case "spr_og_obsl_go": ?>
					<input type="hidden" name="id_og_obsl_go" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'og_obsl_go_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'og_obsl_go_name' id = 'og_obsl_go_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_og_obsl_go()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
				///////////////////////////// Справочник  аварий или НС /////////////////////////////////////////////				
	case "spr_og_accidents": ?>
					<input type="hidden" name="id_og_accidents" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'og_accidents_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'og_accidents_name' id = 'og_accidents_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_og_accidents()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;					
				///////////////////////////// Справочник  видов энергии /////////////////////////////////////////////				
	case "spr_oe_energy_type": ?>
					<input type="hidden" name="id_oe_energy_type" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'oe_energy_type_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'oe_energy_type_name' id = 'oe_energy_type_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_oe_energy_type()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник  видов деятельности /////////////////////////////////////////////				
	case "spr_kind_of_activity": ?>
					<input type="hidden" name="id_kind_of_activity" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'kind_of_activity_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'kind_of_activity_name' id = 'kind_of_activity_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_kind_of_activity()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;	
				///////////////////////////// Справочник  категории линий /////////////////////////////////////////////				
	case "spr_oe_category_line": ?>
					<input type="hidden" name="id_cat_line" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'cat_line_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'cat_line_name' id = 'cat_line_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_category_line()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
				///////////////////////////// Справочник условный диаметр труб /////////////////////////////////////////////				
	case "spr_ot_diametr_tube": ?>
					<input type="hidden" name="id_diametr_tube" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'diametr_tube_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'diametr_tube_name' id = 'diametr_tube_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_diametr_tube()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;	
				///////////////////////////// Справочник тип объекта /////////////////////////////////////////////				
	case "spr_type_object": ?>
					<input type="hidden" name="id_type_object" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'type_object_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'type_object_name' id = 'type_object_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_type_object()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;					
				///////////////////////////// Справочник  видов тепловой изоляции /////////////////////////////////////////////				
	case "spr_ot_heatnet_type_iso": ?>
					<input type="hidden" name="id_ot_heatnet_type_iso" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_heatnet_type_iso_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_heatnet_type_iso_name' id = 'ot_heatnet_type_iso_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_heatnet_type_iso()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник функциональных назначений объекта /////////////////////////////////////////////				
	case "spr_ot_functions": ?>
					<input type="hidden" name="id_ot_functions" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_functions_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_functions_name' id = 'ot_functions_name' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_functions()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник категорий  надежности теплоснабжения /////////////////////////////////////////////				
	case "spr_ot_cat": ?>
					<input type="hidden" name="id_ot_functions" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'ot_cat_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'ot_cat_name' id = 'ot_cat_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_ot_cat()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник видов топлива котельной /////////////////////////////////////////////				
	case "spr_oti_type_fuel": ?>
					<input type="hidden" name="id_oti_type_fuel" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'oti_type_fuel_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'oti_type_fuel_name' id = 'oti_type_fuel_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_oti_type_fuel()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
									///////////////////////////// Справочник видов резервного топлива котельной /////////////////////////////////////////////				
	case "spr_oti_type_fuel_rezerv": ?>
					<input type="hidden" name="id_oti_type_fuel_rezerv" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'oti_type_fuel_name_rezerv' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'oti_type_fuel_name_rezerv' id = 'oti_type_fuel_name_rezerv' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_oti_type_fuel_rezerv()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
					
				///////////////////////////// Справочник видов газа /////////////////////////////////////////////				
	case "spr_og_type_gaz": ?>
					<input type="hidden" name="id_og_type_gaz" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'og_type_gaz_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'og_type_gaz_name' id = 'og_type_gaz_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_og_type_gaz()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
				///////////////////////////// Справочник материалов дымоходов /////////////////////////////////////////////				
	case "spr_og_flue_mater": ?>
					<input type="hidden" name="id_og_flue_mater" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'og_flue_mater_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'og_flue_mater_name' id = 'og_flue_mater_name' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_og_flue_mater()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник видов дымоходов /////////////////////////////////////////////				
	case "spr_og_flue": ?>
					<input type="hidden" name="id_og_flue" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'og_flue_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'og_flue_name' id = 'og_flue_name' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_og_flue()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник типов газового оборудования /////////////////////////////////////////////				
	case "spr_og_device_type": ?>
					<input type="hidden" name="id_og_device_type" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'og_device_type_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'og_device_type_name' id = 'og_device_type_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_og_device_type()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
				///////////////////////////// Справочник напряжения линий /////////////////////////////////////////////				
	case "spr_oe_klvl_volt": ?>
					<input type="hidden" name="id_oe_klvl_volt" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'oe_klvl_volt_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'oe_klvl_volt_name' id = 'oe_klvl_volt_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_oe_klvl_volt()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
				///////////////////////////// Справочник линий снабжения /////////////////////////////////////////////				
	case "spr_oe_klvl_type": ?>
					<input type="hidden" name="id_oe_klvl_type" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'oe_klvl_type_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'oe_klvl_type_name' id = 'oe_klvl_type_name' class='form-controls'>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'oe_klvl_type_sokr_name' class='label_subject'><span class = "formTextRed">*</span>Сокращенное наименование:</label></div>
						<input type='text' name = 'oe_klvl_type_sokr_name' id = 'oe_klvl_type_sokr_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_oe_klvl_type()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;		
				///////////////////////////// Справочник областей /////////////////////////////////////////////				
	case "spr_region": ?>
					<input type="hidden" name="id_region" id ="hidElem"  value="">
					<div class="form-group">
						<div class="block w2"><label for = 'region_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'region_name' id = 'region_name' class='form-controls'>
					</div>	
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_region()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник районов областей /////////////////////////////////////////////				
	case "spr_district": ?>
					<input type="hidden" name="id_district" id ="hidElem" value="">
					
					<div class="form-group">
						<div class="block w2"><label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Область:</label></div>
							<select class="form-controls" name="region_by_district" id="region_by_district">
								<option value='0'>Выберите область</option>
									<?php foreach($region_data as $reg_data):?>
										<option value=<?=$reg_data['id']?>><?=$reg_data['name']?></option>
									<?php endforeach; ?>
							</select>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'district_name' class='label_subject'><span class = "formTextRed">*</span>Наименование района:</label></div>
						<input type='text' name = 'district_name' id = 'district_name' class='form-controls'>
					</div>	
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_district()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник административных районов /////////////////////////////////////////////				
	case "spr_admin": ?>
					<input type="hidden" name="id_admin" id ="hidElem"  value="">
					
					<div class="form-group">
						<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Область:</label>
							<select class="form-controls modals" name="region_by_admin" id="region_by_admin">
								<option value='0'>Выберите область</option>
									<?php foreach($region_data as $reg_data):?>
										<option value=<?=$reg_data['id']?>><?=$reg_data['name']?></option>
									<?php endforeach; ?>
							</select>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'admin_name' class='label_subject'><span class = "formTextRed">*</span>Наименование района:</label></div>
						<input type='text' name = 'admin_name' id = 'admin_name' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_admin()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
				///////////////////////////// Справочник  филиалов/////////////////////////////////////////////				
	case "spr_branch": ?>
					<input type="hidden" name="id_branch" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'branch_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'branch_name' id = 'branch_name' class='form-controls modal'>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'branch_adress' class='label_subject'><span class = "formTextRed">*</span>Адрес:</label></div>
						<input type='text' name = 'branch_adress' id = 'branch_adress' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'branch_phone_cod' class='label_subject'><span class = "formTextRed">*</span>Код тел:</label></div>
						<input type='text' name = 'branch_phone_cod' id = 'branch_phone_cod' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'branch_phone' class='label_subject'><span class = "formTextRed">*</span>Телефон:</label></div>
						<input type='text' name = 'branch_phone' id = 'branch_phone' class='form-controls modal'>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'branch_fax' class='label_subject'><span class = "formTextRed">*</span>Факс:</label></div>
						<input type='text' name = 'branch_fax' id = 'branch_fax' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'branch_email' class='label_subject'><span class = "formTextRed">*</span>E-mail:</label></div>
						<input type='text' name = 'branch_email' id = 'branch_email' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'branch_sokr_name' class='label_subject'><span class = "formTextRed">*</span>Сокращенное наименование:</label></div>
						<input type='text' name = 'branch_sokr_name' id = 'branch_sokr_name' class='form-controls modal'>
					</div>	
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_branch()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник ведомств /////////////////////////////////////////////				
	case "spr_department": ?>
					<input type="hidden" name="id_department" id ="hidElem" value="">
					
					<div class="form-group">
						<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Форма собственности:</label>
							<select class="form-controls" name="type_by_department" id="type_by_department">
								<option value='0'>Выберите форму собственности</option>
									<?php foreach($type_property as $type_properties):?>
										<option value=<?=$type_properties['id']?>><?=$type_properties['name']?></option>
									<?php endforeach; ?>
							</select>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'department_name' class='label_subject'><span class = "formTextRed">*</span>Наименование ведомства:</label></div>
						<input type='text' name = 'department_name' id = 'department_name' class='form-controls'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_department()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;




				///////////////////////////// Справочник подразделов по объекту /////////////////////////////////////////////				
	case "spr_ot_podrazdel": ?>
					<input type="hidden" name="id_podrazdel" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdel_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'podrazdel_name' id = 'podrazdel_name' class='form-controls' required>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdel_table' class='label_subject'><span class = "formTextRed">*</span>Разделы и таблицы для заполнения:</label></div>
						<input type='text' name = 'podrazdel_table' id = 'podrazdel_table' class='form-controls' required>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_podrazdel()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
				///////////////////////////// Справочник конвертера мощности /////////////////////////////////////////////				
	case "spr_units_power": ?>
					<input type="hidden" name="id_units_power" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'units_power_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'units_power_name' id = 'units_power_name' class='form-controls' required>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'units_power_value' class='label_subject'><span class = "formTextRed">*</span>Значение:</label></div>
						<input type='text' name = 'units_power_value' id = 'units_power_value' class='form-controls' required>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_units_power()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;
				///////////////////////////// Справочник типов ответственного лица /////////////////////////////////////////////				
	case "type_otv": ?>
					<input type="hidden" name="id_type_otv" id ="hidElem" value="">
					<div class="form-group">
						<div class="block w2"><label for = 'type_otv_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'type_otv_name' id = 'type_otv_name' class='form-controls' required>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_type_otv()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;					
				///////////////////////////// Справочник городов /////////////////////////////////////////////				
	case "spr_city": ?>
					<input type="hidden" name="id_city" id ="hidElem"  value="">
					
					<div class="form-group">
						<div class="block w2"><label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Область:</label></div>
							<select class="form-controls" name="regionNameSpr" id="formRegionSpr" onchange='address.selectDistrict("Spr")'>
								<option value='0'>Выберите область</option>
									<?php foreach($region_data as $region_dates):?>
										<option value=<?=$region_dates['id']?>><?=$region_dates['name']?></option>
									<?php endforeach; ?>
							</select>
					</div>
					<div class="form-group">
						<div class="block w2"><label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Район:</label></div>
						<select class="form-controls"  name="districtNameSpr" id="formDistrictSpr" onchange='address.selectCity("Spr")'>
							<option value='0'>Выберите район</option>
								<?php foreach($district_data as $district_dates):?>
										<option value=<?=$district_dates['id']?> cod_region = <?=$district_dates['id_spr_region']?> style="display: none"><?=$district_dates['name']?></option>
								<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<div class="block w2"><label for = 'city_name' class='label_subject'><span class = "formTextRed">*</span>Наименование города:</label></div>
						<input type='text' name = 'city_name' id = 'city_name' class='form-controls'>
					</div>

					<!--div class="form-group">	
						<div class="block w2">
							<label class='label_subject'>Является:</label>
						</div>
						<div class="block w3">
							<div class="checkbox">	
								<input type='checkbox' name = 'is_region' id = 'is_region' class='custom-checkbox' value="" onclick="guides.is_region()">
								<label for="is_region" class='label_subject'>областным</label>
							</div>
							<div class="checkbox">	
								<input type='checkbox' name = 'is_district' id = 'is_district' class='custom-checkbox' value="" onclick="guides.is_district()">
								<label for="is_district" class='label_subject'>районным</label>
							</div>
							<div class="checkbox">	
								<input type='checkbox' name = 'is_admin' id = 'is_admin' class='custom-checkbox' value="" onclick="guides.is_admin()">
								<label for="is_admin" class='label_subject'>административным районом</label>
							</div>
						</div>	
					</div-->	
					
					<div class="form-group">
						<p id="messenger_modal"></p>
					</div>				
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_city()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
			
				///////////////////////////// Справочник районов городов /////////////////////////////////////////////				
	case "spr_city_zone": ?>
					<input type="hidden" name="id_city_zone" id ="hidElem"  value="">
					
					<div class="form-group">
						<div class="block w2"><label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Область:</label></div>
							<select class="form-controls" name="regionNameFact" id="formRegionFact"  onchange='address.selectDistrict("Fact")'>
								<option value='0'>Выберите область</option>
									<?php foreach($region_data as $region_dates):?>
										<option value=<?=$region_dates['id']?>><?=$region_dates['name']?></option>
									<?php endforeach; ?>
							</select>
					</div>
					<div class="form-group">
						<div class="block w2"><label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Район:</label></div>
						<select class="form-controls"  name="districtNameFact" id="formDistrictFact" onchange='address.selectCity("Fact")'>
							<option value='0'>Выберите район</option>
								<?php foreach($district_data as $district_dates):?>
										<option value=<?=$district_dates['id']?> cod_region = <?=$district_dates['id_spr_region']?> style="display: none"><?=$district_dates['name']?></option>
								<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<div class="block w2"><label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Город:</label></div>
						<select class="form-controls"  name="cityNameFact" id="formCityFact" onchange='address.selectCityZone("Fact")'>
							<option value='0'>Выберите город</option>
								<?php /*foreach($city_data as $city_dates):?>
										<option value=<?=$city_dates['id']?> cod_district = <?=$city_dates['id_spr_district']?> style="display: none"><?=$city_dates['name']?></option>
								<?php endforeach; */?>							
						</select>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'city_zone_name' class='label_subject'><span class = "formTextRed">*</span>Наименование района:</label></div>
						<input type='text' name = 'city_zone_name' id = 'city_zone_name' class='form-controls'>
					</div>

					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_city_zone()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;				
			
			
				///////////////////////////// Справочник отделов/РЭГИ/////////////////////////////////////////////				
	case "spr_otdel": ?>
					<input type="hidden" name="id_otdel" id ="hidElem"  value="">
					<div class="form-group">
						<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Филиал:</label>
							<select class="form-controls" name="branchNameObject" id="formBranchObject" onchange='address.selectPodrazdelenie("Object")'>
								<option value='0'>Выберите филиал</option>
									<?php foreach($branch_data as $branch_dates):?>
										<option value=<?=$branch_dates['id']?>><?=$branch_dates['name']?></option>
									<?php endforeach; ?>
							</select>
					</div>
					<div class="form-group">
						<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Подразделение:</label>
						<select class="form-controls"  name="podrazdelenieNameObject" id="formPodrazdelenieObject">
							<option value='0'>Выберите подразделение</option>
								<?php foreach($podrazd_data as $podrazd_dates):?>
										<option value=<?=$podrazd_dates['id']?> cod_branch = <?=$podrazd_dates['cod_branch']?> style="display: none"><?=$podrazd_dates['name_podrazd']?></option>
								<?php endforeach; ?>							
						</select>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'otdel_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'otdel_name' id = 'otdel_name' class='form-controls modal'>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'otdel_adress' class='label_subject'><span class = "formTextRed">*</span>Адрес:</label></div>
						<input type='text' name = 'otdel_adress' id = 'otdel_adress' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'otdel_phone_cod' class='label_subject'><span class = "formTextRed">*</span>Код тел:</label></div>
						<input type='text' name = 'otdel_phone_cod' id = 'otdel_phone_cod' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'otdel_phone' class='label_subject'><span class = "formTextRed">*</span>Телефон:</label></div>
						<input type='text' name = 'otdel_phone' id = 'otdel_phone' class='form-controls modal'>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'otdel_fax' class='label_subject'><span class = "formTextRed">*</span>Факс:</label></div>
						<input type='text' name = 'otdel_fax' id = 'otdel_fax' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'otdel_email' class='label_subject'><span class = "formTextRed">*</span>E-mail:</label></div>
						<input type='text' name = 'otdel_email' id = 'otdel_email' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'otdel_sokr_name' class='label_subject'><span class = "formTextRed">*</span>Сокращенное наименование:</label></div>
						<input type='text' name = 'otdel_sokr_name' id = 'otdel_sokr_name' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_otdel()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;			
				///////////////////////////// Справочник МрО/////////////////////////////////////////////				
	case "spr_podrazdelenie": ?>
					<input type="hidden" name="id_podrazdelenie" id ="hidElem"  value="">
					<div class="form-group">
						<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Филиал:</label>
							<select class="form-controls" name="podrazdelenie_branch" id="podrazdelenie_branch">
								<option value='0'>Выберите филиал</option>
									<?php foreach($branch_data as $branch_dates):?>
										<option value=<?=$branch_dates['id']?>><?=$branch_dates['name']?></option>
									<?php endforeach; ?>
							</select>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdelenie_name' class='label_subject'><span class = "formTextRed">*</span>Наименование:</label></div>
						<input type='text' name = 'podrazdelenie_name' id = 'podrazdelenie_name' class='form-controls modal'>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdelenie_adress' class='label_subject'><span class = "formTextRed">*</span>Адрес:</label></div>
						<input type='text' name = 'podrazdelenie_adress' id = 'podrazdelenie_adress' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdelenie_phone_cod' class='label_subject'><span class = "formTextRed">*</span>Код тел:</label></div>
						<input type='text' name = 'podrazdelenie_phone_cod' id = 'podrazdelenie_phone_cod' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdelenie_phone' class='label_subject'><span class = "formTextRed">*</span>Телефон:</label></div>
						<input type='text' name = 'podrazdelenie_phone' id = 'podrazdelenie_phone' class='form-controls modal'>
					</div>
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdelenie_fax' class='label_subject'><span class = "formTextRed">*</span>Факс:</label></div>
						<input type='text' name = 'podrazdelenie_fax' id = 'podrazdelenie_fax' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdelenie_email' class='label_subject'><span class = "formTextRed">*</span>E-mail:</label></div>
						<input type='text' name = 'podrazdelenie_email' id = 'podrazdelenie_email' class='form-controls modal'>
					</div>					
					<div class="form-group">
						<div class="block w2"><label for = 'podrazdelenie_sokr_name' class='label_subject'><span class = "formTextRed">*</span>Сокращенное наименование:</label></div>
						<input type='text' name = 'podrazdelenie_sokr_name' id = 'podrazdelenie_sokr_name' class='form-controls modal'>
					</div>
					<div class="form-group">
							<p id="messenger_modal"></p>
					</div>					
					<div class="group">
						<div class="group-button">
							<button type="submit" class="shine-button add_btn" onclick="guides.add_podrazdelenie()">Добавить</button>
							<button type="submit" class="shine-button" onclick = "modalWindow.closeModal('openModalGuides')">Отмена</button>
						</div>
					</div>
					<?php break;?>			

			
			<?php } ?>


		</fieldset>
	</div>
</div>
<div id="openModalGuides_overlay" class='overlay'></div>