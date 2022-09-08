<?php $this->theme->header(); ?>
<?php
function buttons_guides_operations($access_level, $edit_mode, $guide_data){ ?>
	<td class = "guides_operations">         
		<div class="menu-item-event">							
			<?php if(($access_level == 5 || $edit_mode == 1) && $access_level <> 6 ){?>
					<div class="tooltip">
						<button class="button-edit" onclick = "modalWindowGuides.openModalEdit('openModalGuides',<?= $guide_data['id'] ?>)">
						<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
						</button>
					</div>
			<?php }else{ ?>
					<div class="tooltip">
						<button class="button-edit no-edit"  disabled="disabled" onclick = "modalWindowGuides.openModalEdit('openModalGuides',<?= $guide_data['id'] ?>)">
						<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактирование запрещено</span>
						</button>
					</div>													
			<?php }?>
			<div class="tooltip">
				<button class="button-remove no-delete" onclick="guides.remove(<?= $guide_data['id'] ?>)" disabled="disabled">
					<i class="icon-trash icons"></i><span class = "tooltiptext">удаление запрещено</span>
				</button>
			</div>
		</div>
	</td>
<?php }; ?>

    <main>
        <div class="container">
	
				<?php 
					/////////// выводим наименвание справочника //////////////////////
					$guides_link = trim($_GET['guide']);
					
					$edit_mode = 0; // возможность редактирования справочника 0 - запрещено, 1 - разрешено;
					switch($guides_link){
						
						//электро
						case "spr_type_object": $name_table_spr = 'Справочник "Типы объекта"'; $edit_mode = 0; break;
						case "spr_oe_energy_type": $name_table_spr = 'Справочник "Виды энергии"'; $edit_mode = 0; break;
						case "spr_oe_klvl_volt": $name_table_spr = 'Справочник "Напряжение линий"'; $edit_mode = 0;  break;
						case "spr_oe_klvl_type": $name_table_spr = 'Справочник "Линии снабжения"'; $edit_mode = 0;  break;
						case "spr_oe_category_line": $name_table_spr = 'Справочник "Категории линий"'; $edit_mode = 0;  break;
						
						
						
						//тепло
						case "spr_ot_systemheat_water": $name_table_spr = 'Справочник "Виды отопления"'; $edit_mode = 0;  break;
						case "spr_oti_type_fuel": $name_table_spr = 'Справочник "Виды топлива котельной"'; $edit_mode = 0;  break;
						case "spr_ot_heatnet_type_underground": $name_table_spr = 'Справочник "Виды прокладки тепловых сетей"'; $edit_mode = 0;  break;
						case "spr_oti_type_fuel_rezerv": $name_table_spr = 'Справочник "Виды резервного топлива котельной"'; $edit_mode = 0;  break;
						case "spr_ot_type_to": $name_table_spr = 'Справочник "Виды теплообменника"'; $edit_mode = 0;  break;
						case "spr_ot_type_heat_source": $name_table_spr = 'Справочник "Источники теплоснабжения"'; $edit_mode = 0;  break;
						case "spr_ot_cat": $name_table_spr = 'Справочник "Категории надежности теплоснабжения"'; $edit_mode = 0;  break;
						case "spr_ot_gvs_in": $name_table_spr = 'Справочник "Места расположения теплообменника"'; $edit_mode =0;  break;
						case "spr_oti_boiler_type": $name_table_spr = 'Справочник "Назначение котельной"'; $edit_mode = 0;  break;
						case "spr_ot_gvs_open": $name_table_spr = 'Справочник "Типы схем присоединения ГВС"'; $edit_mode = 0;  break;
						case "spr_ot_systemheat_dependent": $name_table_spr = 'Справочник "Типы схем присоединения СО"'; $edit_mode = 0;  break;
						case "spr_ot_heatnet_type_iso": $name_table_spr = 'Справочник "Типы труб"'; $edit_mode = 0;  break;
						case "spr_ot_functions": $name_table_spr = 'Справочник "Функциональные назначения объекта"'; $edit_mode = 0;  break;
						case "spr_ot_type_izol": $name_table_spr = 'Справочник "Виды изоляций"'; $edit_mode = 0;  break;
						case "spr_ot_type_ot_pribor": $name_table_spr = 'Справочник "Виды отопительных приборов"'; $edit_mode = 0;  break;
						case "spr_ot_type_razvodka": $name_table_spr = 'Справочник "Виды разводки"'; $edit_mode = 0;  break;
						case "spr_ot_nazn_sar": $name_table_spr = 'Справочник "Назначения САР"'; $edit_mode = 0;  break;
						case "spr_ot_diametr_tube": $name_table_spr = 'Справочник "Условный диаметр труб"'; $edit_mode = 0;  break;
						
						
						
						
						
						//газ
						
						case "spr_og_type_gaz": $name_table_spr = 'Справочник "Виды газа"'; break;
						case "spr_og_flue": $name_table_spr = 'Справочник "Виды дымоходов"'; break;
						case "spr_og_flue_mater": $name_table_spr = 'Справочник "Материалы дымоходов"'; break;
						case "spr_og_device_type": $name_table_spr = 'Справочник "Типы газового оборудования"'; break;
						/*case "spr_og_to_gaz": $name_table_spr = "Справочник видов ТО газопроводов"; break;*/
						case "spr_og_obsl_go": $name_table_spr = 'Справочник "Вид обследования газового объекта"'; break;
						case "spr_og_accidents": $name_table_spr = 'Справочник "Вид аварии или НС"'; break;
						
						
						
						
						// потребители
						case "spr_type_property": $name_table_spr = 'Справочник "Формы собственности"'; $edit_mode = 0;  break;
						case "spr_department": $name_table_spr = 'Справочник "Виды ведомств"'; $edit_mode = 0;  break;
						case "spr_kind_of_activity": $name_table_spr = 'Справочник "Виды деятельности"'; $edit_mode = 0;  break;
						case "spr_shift_of_work": $name_table_spr = 'Справочник "Сменность работ"';   break;
						
						
						/*case "spr_branch": $name_table_spr = 'Справочник "филиалов"'; $edit_mode = 1;  break;
						case "spr_podrazdelenie": $name_table_spr = 'Справочник "подразделений"'; $edit_mode = 1;  break;
						case "spr_otdel": $name_table_spr = 'Справочник "отделов/РЭГИ"'; $edit_mode = 1;  break;*/
						
						
						// адрес
						case "spr_region": $name_table_spr = 'Справочник "Области"'; $edit_mode = 0;  break;
						case "spr_district": $name_table_spr = 'Справочник "Районы области"'; $edit_mode = 0;  break;
						case "spr_city": $name_table_spr = 'Справочник "Города"'; $edit_mode = 1;  break;
						case "spr_city_zone": $name_table_spr = 'Справочник "Районы города"'; $edit_mode = 0;  break;
						case "spr_type_city": $name_table_spr = 'Справочник "Типы населенных пунктов"'; $edit_mode = 0;  break;
						case "spr_type_street": $name_table_spr = 'Справочник "Адресные объекты"'; $edit_mode = 0;  break;
						/*case "spr_admin": $name_table_spr = 'Справочник "административных районов"'; $edit_mode = 1;  break;*/
						
						
						// системные
						case "spr_og_type_home": $name_table_spr = 'Справочник "Типы здания"'; break;
						case "spr_ot_podrazdel": $name_table_spr = 'Справочник "Тип подраздела по объекту"'; break;
						case "spr_units_power": $name_table_spr = 'Справочник "Конвертер мощности"'; break;
						
						// ответственные лица
						case "type_otv": $name_table_spr = 'Справочник "Тип ответственного лица"'; break;						
					}	
				
				?>
				
					<!---------------------- Заполняем таблицу справочника данными ------------------------------------------->
				<div class='top_of_page'>
					<div class="page_title"> 	
						<h5><?= $name_table_spr ?></h5>
					</div>
					
					
					<?php //if($guides_link == 4 || $access_level == 5){?>
						<?php if($access_level != 4 && $access_level != 5 && $edit_mode == 0){?>
							<div class="tooltip">
								<div class ='nav_buttons'> 
									<button onclick = "modalWindow.openModal('openModalGuides')" class="button_unp no-new" id="spr" disabled="disabled"><span><i class="icon-plus"></i></span>Новая запись</button>
									<span class = "tooltiptext">добавление запрещено</span>
								</div>	
							</div>	
						<?php }else{ ?>
							<div class="tooltip">
								<div class ='nav_buttons'> 
									<button onclick = "modalWindow.openModal('openModalGuides')" class="button_unp" id="spr"><span><i class="icon-plus"></i></span>Новая запись</button>
									<span class = "tooltiptext">добавление новой записи</span>
								</div>
							</div>	
						<?php } ?>
				

				
				</div>
				<div class="flex">		
					<div class='search_table'>
						<input type="text" class="form-control pull-right" id="search_table" placeholder="Поиск по справочнику">
					</div>
				</div>
     
			<div class="mobileTable_guides">
            <table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="spr_guides" name_table = <?= trim($_GET['guide'])?>>
                
			<!---------------------------------------- Вывод формы справочника в зависимости от выбранного --------------------------------------------------------------------------->
			
				<?php $guides_link = trim($_GET['guide']);
					switch($guides_link){                    
								

/////////////////////////////////////////////// справочник адресных объектов////////////////////////////////////
						case "spr_type_street": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="t2">Сокращенное наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name="type_street_name">
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
								<td name="type_street_sokr_name"><p><?= $guide_data['sokr_name'] ?></p></td>
								
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник типов населенных пунктов////////////////////////////////////
						case "spr_type_city": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="t2">Сокращенное наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name="type_city_name">
										<a href="#" class="grid">
												<?= $guide_data['name'] ?>
										</a>
									</td>
									<td name="type_city_sokr_name"><p><?= $guide_data['sokr_name'] ?></p></td>
									
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник форм собственности////////////////////////////////////
						case "spr_type_property": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='type_property_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;								

/////////////////////////////////////////////// справочник сменности работ////////////////////////////////////
						case "spr_shift_of_work": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='shift_of_work_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник видов теплообменника////////////////////////////////////
						case "spr_ot_type_to": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_type_to_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник источников теплоснабжения////////////////////////////////////
						case "spr_ot_type_heat_source": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_type_heat_source_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник систем отопления////////////////////////////////////
						case "spr_ot_systemheat_water": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_systemheat_water_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник типов схем присоединения системы отопления////////////////////////////////////
						case "spr_ot_systemheat_dependent": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_systemheat_dependent_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>	</td>
									
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник типов тепловой изоляции////////////////////////////////////
						case "spr_ot_heatnet_type_underground": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_heatnet_type_underground_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник типов схем присоединения  горячего водоснабжения////////////////////////////////////
						case "spr_ot_gvs_open": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_gvs_open_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник мест расположения теплообменника////////////////////////////////////
						case "spr_ot_gvs_in": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_gvs_in_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>	</td>
									
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник назначений котельной////////////////////////////////////
						case "spr_oti_boiler_type": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='oti_boiler_type_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>	</td>
									
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник видов изоляций////////////////////////////////////
						case "spr_ot_type_izol": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_izol_type_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник условных диаметров труб////////////////////////////////////
						case "spr_ot_diametr_tube": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='diametr_tube_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;								
/////////////////////////////////////////////// справочник видов отопительных приборов////////////////////////////////////
						case "spr_ot_type_ot_pribor": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_pribor_type_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник видов разводки////////////////////////////////////
						case "spr_ot_type_razvodka": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_razvodka_type_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;	


/////////////////////////////////////////////// справочник назначений САР////////////////////////////////////
						case "spr_ot_nazn_sar": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_nazn_sar_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;								
/////////////////////////////////////////////// справочник типов зданий////////////////////////////////////
						case "spr_og_type_home": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='og_type_home_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник видов энергии////////////////////////////////////
						case "spr_oe_energy_type": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='oe_energy_type_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник категории линий////////////////////////////////////
						case "spr_oe_category_line": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='cat_line_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник типов объекта////////////////////////////////////
						case "spr_type_object": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='type_object_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;								
/////////////////////////////////////////////// справочник видов деятельности////////////////////////////////////
						case "spr_kind_of_activity": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='kind_of_activity_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник типов тепловой изоляции////////////////////////////////////
						case "spr_ot_heatnet_type_iso": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_heatnet_type_iso_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник функциональных назначений объекта////////////////////////////////////
						case "spr_ot_functions": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_functions_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник категорий  надежности теплоснабжения////////////////////////////////////
						case "spr_ot_cat": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='ot_cat_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник видов топлива котельной////////////////////////////////////
						case "spr_oti_type_fuel": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='oti_type_fuel_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник видов топлива котельной////////////////////////////////////
						case "spr_oti_type_fuel_rezerv": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='oti_type_fuel_rezerv_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник видов газа////////////////////////////////////
						case "spr_og_type_gaz": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='og_type_gaz_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник материалов дымоходов////////////////////////////////////
						case "spr_og_flue_mater": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='og_flue_mater_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник видов дымоходов////////////////////////////////////
						case "spr_og_flue": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='og_flue_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник типов газового оборудования////////////////////////////////////
						case "spr_og_device_type": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='og_device_type_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник видов ТО газопроводов////////////////////////////////////
						/*case "spr_og_to_gaz": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="t5"></th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='og_to_gaz_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
											<td class = "guides_operations">         
												<div class="menu-item-event">							
													<?php if($access_level == 4 || $access_level == 5){?>
														<div class="tooltip">
															<button class="button-edit" onclick = "modalWindowGuides.openModalEdit('openModalGuides',<?= $guide_data['id'] ?>)">
																<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
															</button>
														</div>
													<?php }else{ ?>
														<div class="tooltip">
															<button class="button-edit no-edit"  disabled="disabled" onclick = "modalWindowGuides.openModalEdit('openModalGuides',<?= $guide_data['id'] ?>)">
																<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактирование запрещено</span>
															</button>
														</div>													
													<?php }?>
													<div class="tooltip">
														<button class="button-remove no-delete" onclick="guides.remove(<?= $guide_data['id'] ?>)" disabled="disabled">
															<i class="icon-trash icons"></i><span class = "tooltiptext">удаление запрещено</span>
														</button>
													</div>
							
												</div>
											</td>
									
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;*/
/////////////////////////////////////////////// справочник видов обследования газового объекта////////////////////////////////////
						case "spr_og_obsl_go": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='og_obsl_go_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник видов аварий или НС////////////////////////////////////
						case "spr_og_accidents": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='og_accidents_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;								
/////////////////////////////////////////////// справочник напряжения линий////////////////////////////////////
						case "spr_oe_klvl_volt": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='oe_klvl_volt_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник линий снабжения////////////////////////////////////
						case "spr_oe_klvl_type": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="t2">Сокращенное наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='oe_klvl_type_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
								<td name='oe_klvl_type_sokr_name'>
									<p><?= $guide_data['name_short'] ?></p>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник областей////////////////////////////////////
						case "spr_region": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='region_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник районов областей////////////////////////////////////
						case "spr_district": ?>				
				
								<thead>
								<tr>
									<th class="t2">Район</th>
									<th class="t2">Область</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								
						
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name='district_name'>
										<a href="#" class="grid">
												<?= $guide_data['name'] ?>
										</a>
									</td>
									
									<td name='region_by_district_name' type_reg_district=<?=$guide_data['spr_region_id']?>>
										<p><?= $guide_data['spr_region_name'] ?><p>
									</td>									
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник административных районов////////////////////////////////////
						case "spr_admin": ?>				
				
								<thead>
								<tr>
									<th class="t2">Район</th>
									<th class="t2">Область</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
															
								
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name='admin_name'>
										<a href="#" class="grid">
												<?= $guide_data['name'] ?>
										</a>
									</td>
									
									<td name='region_by_admin_name' type_reg_admin=<?=$guide_data['spr_region_id']?>>
										<p><?= $guide_data['spr_region_name'] ?><p>
									</td>									
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;


/////////////////////////////////////////////// справочник филиалов////////////////////////////////////
						case "spr_branch": ?>				
				
								<thead>
								<tr>
									<th class="t2">Наименование</th>
									<th class="t2">Адрес</th>
									<th class="t2">Код тел.</th>
									<th class="t2">Телефон</th>
									<th class="t2">Факс</th>
									<th class="t2">E-mail</th>
									<th class="t2">Сокращенное наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name='branch_name'>
										<a href="#" class="grid">
												<?= $guide_data['name'] ?>
										</a>
									</td>
									<td name='branch_adress'>
										<p><?= $guide_data['adress'] ?><p>
									</td>											
									<td name='branch_phone_cod'>
										<p><?= $guide_data['phone_cod'] ?><p>
									</td>														
									<td name='branch_phone'>
										<p><?= $guide_data['phone'] ?><p>
									</td>														
									<td name='branch_fax'>
										<p><?= $guide_data['fax'] ?><p>
									</td>														
									<td name='branch_email'>
										<p><?= $guide_data['email'] ?><p>
									</td>
									<td name='branch_sokr_name'>
										<p><?= $guide_data['sokr_name'] ?><p>
									</td>										
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>	
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник ведомств////////////////////////////////////
						case "spr_department": ?>				
				
								<thead>
								<tr>
									<th class="t2">Наименование ведомства</th>
									<th class="t2">Форма собственности</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
															
															
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name='department_name'>
										<a href="#" class="grid">
												<?= $guide_data['name_ved'] ?>
										</a>
									</td>
									
									<td name='type_property_by_department_name' type_department=<?=$guide_data['spr_type_property_id']?>>
										<p><?= $guide_data['spr_type_property_name'] ?><p>
									</td>									
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник подразделов по объекту////////////////////////////////////
						case "spr_ot_podrazdel": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="t2">Разделы и таблицы для заполнения</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name="podrazdel_name">
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
								<td name="podrazdel_table"><p><?= $guide_data['name_razdel'] ?></p></td>
								
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;
/////////////////////////////////////////////// справочник подразделов по объекту////////////////////////////////////
						case "spr_units_power": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="t2">Значение</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name="units_power_name">
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
								<td name="units_power_value"><p><?= $guide_data['ratio'] ?></p></td>
								
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;	
/////////////////////////////////////////////// справочник типов ответственного лица////////////////////////////////////
						case "type_otv": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name="type_otv_name">
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
								</td>
								
									<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;									
/////////////////////////////////////////////// справочник городов////////////////////////////////////
						case "spr_city": ?>				
				
								<thead>
								<tr>
									<th class="t2">Наименование</th>
									<th class="t2">Область</th>
									<th class="t2">Район</th>
									<!--th class="t2">Является областным</th>
									<th class="t2">Является районным</th>
									<th class="t2">Является административным районом</th-->
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
															
						
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name='city_name'>
										<a href="#" class="grid">
												<?= $guide_data['name'] ?>
										</a>
									</td>
									
									<td name='region_by_city' regionNameFact=<?= $guide_data['spr_region_id'] ?>>
										<p><?= $guide_data['spr_region_name'] ?></p>
									</td>									
									<td name='district_by_city' districtNameFact=<?= $guide_data['spr_district_id'] ?>>
										<p><?= $guide_data['spr_district_name'] ?></p>
									</td>												
									<!--td name='is_region' key_region=<?//= $guide_data['key_region'] ?>>
										<p><?php //echo ($guide_data['key_region'] == 1 ? 'да' : 'нет') ?></p>
									</td>												
									<td name='is_district' key_district=<?//= $guide_data['key_district'] ?>>
										<p><?php //echo ($guide_data['key_district'] == 1 ? 'да' : 'нет')?></p>
									</td>												
									<td name='is_admin' key_admin=<?//= $guide_data['key_admin'] ?>>
										<p><?php// echo ($guide_data['key_admin'] == 1 ? 'да' : 'нет')?></p>
									</td-->												
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник районов города////////////////////////////////////
						case "spr_city_zone": ?>				
				
								<thead>
								<tr>
									<th class="t2">Наименование</th>
									<th class="t2">Область</th>
									<th class="t2">Район</th>
									<th class="t2">Город</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
																			
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name='city_zone_name'>
										<a href="#" class="grid">
												<?= $guide_data['name'] ?>
										</a>
									</td>
									
									<td name='region_by_city_zone' region_city_zone=<?= $guide_data['spr_region_id'] ?>>
										<p><?= $guide_data['spr_region_name'] ?><p>
									</td>									
									<td name='district_by_city_zone' district_city_zone=<?= $guide_data['spr_district_id'] ?>>
										<p><?= $guide_data['spr_district_name'] ?><p>
									</td>												
									<td name='city_by_city_zone' city_city_zone=<?= $guide_data['spr_city_id'] ?>>
										<p><?= $guide_data['spr_city_name'] ?><p>
									</td>												
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
									</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник отделов/РЭГИ////////////////////////////////////
						case "spr_otdel": ?>				
				
								<thead>
								<tr>
									<th class="t2">Наименование</th>
									<th class="t2">Филиал</th>
									<th class="t2">Подразделение</th>
									<th class="t2">Адрес</th>
									<th class="t2">Код тел.</th>
									<th class="t2">Телефон</th>
									<th class="t2">Факс</th>
									<th class="t2">E-mail</th>
									<th class="t2">Сокращенное наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
					
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name='otdel_name'>
										<a href="#" class="grid">
												<?= $guide_data['name_otdel'] ?>
										</a>
									</td>
									<td name='branch_by_otdel' type_branch_otdel=<?=$guide_data['spr_branch_id']?>>
										<p><?= $guide_data['spr_branch_name'] ?><p>
									</td>	
									<td name='podrazd_by_otdel' type_podrazd_otdel=<?=$guide_data['spr_podrazdelenie_id']?>>
										<p><?= $guide_data['spr_podrazdelenie_name_podrazd'] ?><p>
									</td>
									<td name='otdel_adress'>
										<p><?= $guide_data['adress'] ?><p>
									</td>											
									<td name='otdel_phone_cod'>
										<p><?= $guide_data['phone_cod'] ?><p>
									</td>														
									<td name='otdel_phone'>
										<p><?= $guide_data['phone'] ?><p>
									</td>														
									<td name='otdel_fax'>
										<p><?= $guide_data['fax'] ?><p>
									</td>														
									<td name='otdel_email'>
										<p><?= $guide_data['email'] ?><p>
									</td>
									<td name='otdel_sokr_name'>
										<p><?= $guide_data['sokr_name'] ?><p>
									</td>										
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;

/////////////////////////////////////////////// справочник МрО///////////////////////////////////
						case "spr_podrazdelenie": ?>				
				
								<thead>
								<tr>
									<th class="t2">Наименование</th>
									<th class="t2">Филиал</th>
									<th class="t2">Адрес</th>
									<th class="t2">Код тел.</th>
									<th class="t2">Телефон</th>
									<th class="t2">Факс</th>
									<th class="t2">E-mail</th>
									<th class="t2">Сокращенное наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
				
								<?php foreach($guides_data as $guide_data): ?>
									<tr class="item-<?= $guide_data['id'] ?>">
									<td name='podrazdelenie_name'>
										<a href="#" class="grid">
												<?= $guide_data['name_podrazd'] ?>
										</a>
									</td>
									<td name='branch_by_podrazdelenie' type_branch_podrazdelenie=<?=$guide_data['spr_branch_id']?>>
										<p><?= $guide_data['spr_branch_name'] ?><p>
									</td>	
									<td name='podrazdelenie_adress'>
										<p><?= $guide_data['adress'] ?><p>
									</td>											
									<td name='podrazdelenie_phone_cod'>
										<p><?= $guide_data['phone_cod'] ?><p>
									</td>														
									<td name='podrazdelenie_phone'>
										<p><?= $guide_data['phone'] ?><p>
									</td>														
									<td name='podrazdelenie_fax'>
										<p><?= $guide_data['fax'] ?><p>
									</td>														
									<td name='podrazdelenie_email'>
										<p><?= $guide_data['email'] ?><p>
									</td>
									<td name='podrazdelenie_sokr_name'>
										<p><?= $guide_data['sokr_name'] ?><p>
									</td>										
										<?php buttons_guides_operations($access_level, $edit_mode, $guide_data); ?>
								</tr>	
								
								<?php 
								endforeach;
								 echo "</tbody>";
								break;?>

				<?php	} ?>

          
            </table>
			</div>
        </div>
    </main>



<?php Theme::block('modal/modal_Guides') ?>

<?php $this->theme->footer(); ?>

