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
						
						case "spr_test_vid": $name_table_spr = 'Справочник "Вид теста"'; $edit_mode = 0; break;
						case "spr_test_napr": $name_table_spr = 'Справочник "Направление деятельности"'; $edit_mode = 0; break;
						case "spr_test_group": $name_table_spr = 'Справочник "Группы электробезопасности"'; $edit_mode = 0; break;
						
						case "spr_test_theme_elektro": $name_table_spr = 'Справочник "Темы (электро)"'; $edit_mode = 0; break;
						case "spr_test_theme_teplo": $name_table_spr = 'Справочник "Темы (тепло)"'; $edit_mode = 0; break;
						case "spr_test_theme_gaz": $name_table_spr = 'Справочник "Темы (газ)"'; $edit_mode = 0; break;
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
								

/////////////////////////////////////////////// справочник тем теста электриков////////////////////////////////////
						case "spr_test_theme_elektro": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='razdel_name'>
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
/////////////////////////////////////////////// справочник тем теста тепловиков////////////////////////////////////
						case "spr_test_theme_teplo": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='razdel_name'>
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
/////////////////////////////////////////////// справочник тем теста газовиков////////////////////////////////////
						case "spr_test_theme_gaz": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='razdel_name'>
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
///////////////////////////////////////////// справочник направления деятельности////////////////////////////////////
						case "spr_test_napr": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='napr_name'>
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
///////////////////////////////////////////// справочник групп электробезопасности////////////////////////////////////
						case "spr_test_group": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='group_name'>
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
///////////////////////////////////////////// справочник вид теста////////////////////////////////////
						case "spr_test_vid": ?>				
				
								<thead>
								<tr>
									
									<th class="t2">Наименование</th>
									<th class="buttons_operations">Операции</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($guides_data as $guide_data): ?>
								<tr class="item-<?= $guide_data['id'] ?>">
								<td name='vid_name'>
									<a href="#" class="grid">
											<?= $guide_data['name'] ?>
									</a>
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

