<?php $this->theme->header(); ?>
<?php $this->theme->functions(); ?>
<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-object"></i></span><p>Объекты</p></div>

    <main>
        <div class="container">
			<div class='sticky_body'>
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5><i class='rp-r-o'>Список объектов</i></h5>
					<h3><a href="/ARM/basis/subject/edit/<?= $subject['id'] ?>?mode=subject_info" target = "_blank"><span><i class="icon-subject"></i></span>&nbsp<?= $subject['name'] ?>
						</a></h3>
                </div>	
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<?php// if($inspection_type == 3 && $access_level < 3){?>
						<a href="/ARM/basis/objects/create/<?= $subject['id'] ?>" class="button_unp <?php echo (($access_level < 3)? '' : 'disabled');?>" ><span><i class="icon-plus"></i></span>Новый объект</a>
					<?php //}?>
					<a href="/ARM/basis/subject/list/" class="button_unp"><span><i class="icon-pin"></i></span>Мои потребители</i></a>
					<a href="/ARM/basis/subject/" class="button_unp"><span><i class="icon-magnifier"></i></span><i class='rp-r-os'>Поиск</i></a>
					<a href="/ARM/basis/filter/"><button class="button_filter" ><span><i class="icon-list"></i></span><i class='rp-r-ms'>Реестр</i></button></a>
					<div class='search_table absolute_r'>
						<input type="text" class="form-control pull-right" id="search_table" placeholder="Поиск по таблице">
					</div>
				</div>
            </div> 
			
												<div>
													<input type="hidden" name="formSubjectId" id="formSubjectId" value="<?= $subject['id'] ?>">
												</div>

				<div class="flex filter_block">
					<div class="tooltip">
						<a href="/ARM/basis/objects/list/<?= $subject['id'] ?>"><i class="icon-filter button-operations">&nbsp </i><span class = "tooltiptext">сброс фильтра</span></a>
					</div>
					<select id='fo_all_objects_napr' class="form-controls w2">
						<option value='0'>по направлению (все)</option>
						<option value='1'>объекты элекроснабжения</option>
						<option value='2'>объекты теплопотребления</option>
						<option value='3'>теплоисточники</option>
						<option value='4'>объекты газопотребления</option>
					</select>
				
				
					<select id='fo_all_objects' class="form-controls w2">
						<option value='0'>по учёту (все)</option>
						<option value='1'>действующие</option>
						<option value='2'>недействующие</option>
						<option value='3'>помечены для удаления</option>				
					</select>				
				
				
				
				</div>

				<!--div class="flex filter_block">
					<div class="tooltip">
						<a href="/ARM/basis/objects/list/<?//= $subject['id'] ?>"><i class="icon-filter button-operations">&nbsp </i><span class = "tooltiptext">сброс фильтра</span></a>
					</div>

				</div-->


			<div class='total_check'>
				Всего: <span id="Obj_all"><?php echo count($objects);?></span>
			</div>
			</div>

            <table class="main_table last">
                <thead>
                <tr>
					<th width="4%">№<br/>п/п</th>
                    <th width="80%">Наименование объекта (адрес)</th>
					<th width="2%"><div class='tooltip'><i class='icon-energy'></i>	<span class = 'tooltiptext'>Сведения по объекту электрической энергии</span></div></th>					
					<th width="2%"><div class='tooltip'><i class='icon-teplo'></i>	<span class = 'tooltiptext'>Сведения по объекту тепловой энергии</span></div></th>					
					<th width="2%"><div class='tooltip'><i class='icon-ti'></i>		<span class = 'tooltiptext'>Сведения по теплоисточнику</span></div></th>					
					<th width="2%"><div class='tooltip'><i class='icon-fire'></i>	<span class = 'tooltiptext'>Сведения по объекту газового надзора</span></div></th>
					<th width="8%">Операции</th>
					
                </tr>
                </thead>
				<?php if (count($objects)<>0) { ?>
                <tbody>
				<?php 
					$n = 1; // номер по порядку
					$count_e=0;
					$count_t=0;
					$count_ti=0;
					$count_g=0;
				?>
				
				<?php foreach($objects as $one_objects):

				//print_r($one_objects);
					if($one_objects['elektro_is'] > 0 && $one_objects['del_e'] == 0 && $one_objects['inactive_e'] == 0){ $count_e +=1;};
					if($one_objects['t_is'] > 0 && $one_objects['del_t'] == 0 && $one_objects['inactive_t'] == 0){$count_t +=1;};
					if($one_objects['ti_is'] > 0 && $one_objects['del_ti'] == 0 && $one_objects['inactive_ti'] == 0){$count_ti +=1;};
					if($one_objects['gaz_is'] > 0 && $one_objects['del_g'] == 0 && $one_objects['inactive_g'] == 0){$count_g +=1;};
				?>
				<tr class="item-<?= $one_objects['id'] ?>">
                    <td class="list_td">
						<?= $n++ ?>
					</td>
					
					<td>
                        <!--a href="/ARM/basis/objects/edit/<?//= $one_objects['id'] ?>?mode=object_info" class="grid" target = "_blank"><span><i class="icon-object"></i>&nbsp
                            <?//= $one_objects['reestr_object_name'] . "  (" .  (strlen($one_objects['address_index'])>0 ? $one_objects['address_index'] : "")
															            //   .  (strlen($one_objects['spr_region_name'])>0 ? ", ".$one_objects['spr_region_name'] : "") 
																		//   .  (strlen($one_objects['spr_district_name'])>0 ? ", ".$one_objects['spr_district_name'] : "") 
																		//   .  (strlen($one_objects['spr_city_name'])>0 ? ", ".$one_objects['spr_city_name'] : "") 
																		//   .  (strlen($one_objects['address_street'])>0 ? ", ".$one_objects['address_street'] : "")
																		//   .  (strlen($one_objects['address_building'])>0 ? "-".$one_objects['address_building'] : "")
																		//   .  (strlen($one_objects['address_flat'])>0 ? "-".$one_objects['address_flat'] : "")																		  
															// . ")"?>
	
                        </a-->
                        <a href="/ARM/basis/objects/edit/<?= $one_objects['id'] ?>?mode=object_info" class="grid" target = "_blank"><span><i class="icon-object"></i>&nbsp
                            <?= $one_objects['reestr_object_name'] . "  (" . function_address([$one_objects['address_index'],$one_objects['spr_region_name'],$one_objects['spr_district_name'],$one_objects['spr_type_city_sokr_name'],$one_objects['spr_city_name'],$one_objects['spr_type_street_sokr_name'],$one_objects['address_street'],$one_objects['address_building'],$one_objects['address_flat'],$one_objects['spr_city_zone_name'],$one_objects['spr_city_key_region'],0,0]) . ")"?>
	
                        </a>	

                    </td>
					

					<!-------------Электро--------------->
						<?php if($one_objects['elektro_is'] > 0 && $one_objects['del_e'] == 0 && $one_objects['inactive_e'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>есть объект электро- снабжения</span></div></td>
						<?php } ?>
						<?php if($one_objects['elektro_is'] > 0 && $one_objects['inactive_e'] > 0 && $one_objects['del_e'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-inactive'></i><span class = 'tooltiptext'>недействующий объект</span></div></td>
						<?php } ?>					
						<?php if($one_objects['elektro_is'] > 0 && $one_objects['del_e'] > 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-close'></i><span class = 'tooltiptext'>объект помечен на удаление</span></div></td>
						<?php } ?>					
						<?php if($one_objects['elektro_is'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет объекта электро- снабжения</span></div></td>
						<?php } ?>						

					<!-------------Тепло--------------->
						<?php if($one_objects['t_is'] > 0 && $one_objects['del_t'] == 0 && $one_objects['inactive_t'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>есть объект тепло- потребления</span></div></td>
						<?php } ?>
						<?php if($one_objects['t_is'] > 0 && $one_objects['inactive_t'] > 0 && $one_objects['del_t'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-inactive'></i><span class = 'tooltiptext'>недействующий объект</span></div></td>
						<?php } ?>					
						<?php if($one_objects['t_is'] > 0 && $one_objects['del_t'] > 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-close'></i><span class = 'tooltiptext'>объект помечен на удаление</span></div></td>
						<?php } ?>					
						<?php if($one_objects['t_is'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет объекта тепло- потребления</span></div></td>
						<?php } ?>					
					
					<!-------------ТИ--------------->
						<?php if($one_objects['ti_is'] > 0 && $one_objects['del_ti'] == 0 && $one_objects['inactive_ti'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>есть теплоисточник</span></div></td>
						<?php } ?>
						<?php if($one_objects['ti_is'] > 0 && $one_objects['inactive_ti'] > 0 && $one_objects['del_ti'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-inactive'></i><span class = 'tooltiptext'>недействующий объект</span></div></td>
						<?php } ?>					
						<?php if($one_objects['ti_is'] > 0 && $one_objects['del_ti'] > 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-close'></i><span class = 'tooltiptext'>объект помечен на удаление</span></div></td>
						<?php } ?>					
						<?php if($one_objects['ti_is'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет теплоисточника</span></div></td>
						<?php } ?>						
					
					<!-------------Газ--------------->
						<?php if($one_objects['gaz_is'] > 0 && $one_objects['del_g'] == 0 && $one_objects['inactive_g'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>есть объект газо- потребления</span></div></td>
						<?php } ?>
						<?php if($one_objects['gaz_is'] > 0 && $one_objects['inactive_g'] > 0 && $one_objects['del_g'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-inactive'></i><span class = 'tooltiptext'>недействующий объект</span></div></td>
						<?php } ?>					
						<?php if($one_objects['gaz_is'] > 0 && $one_objects['del_g'] > 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-close'></i><span class = 'tooltiptext'>объект помечен на удаление</span></div></td>
						<?php } ?>					
						<?php if($one_objects['gaz_is'] == 0){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет объекта газо- потребления</span></div></td>
						<?php } ?>						

					
					<td class="list_td">
										
					<?php 
					$operation_mode = 0; // редактирование запрещено по умолчанию
					
					// если инспектор (1)
					if($access_level == 1){
			
						if($id_user == $one_objects['reestr_object_e_insp'] || $id_user == $one_objects['reestr_object_t_insp'] || $id_user == $one_objects['reestr_object_ti_insp'] || $id_user == $one_objects['reestr_object_g_insp']){
							$operation_mode = 1;
						}
						
						if($spr_cod_branch == $one_objects['id_branch_e'] || $spr_cod_branch == $one_objects['id_branch_t']|| $spr_cod_branch == $one_objects['id_branch_ti']||$spr_cod_branch == $one_objects['id_branch_g']){
							// если это тепло
							if($inspection_type == 1){
								if($one_objects['t_is'] <> 1 && $one_objects['ti_is'] <> 1){
							
									$operation_mode = 1;
								}
	
							}
							// если это электро
							if($inspection_type == 3){
								if($one_objects['elektro_is'] <> 1){
								
									$operation_mode = 1;
								}
							
							}
							// если это газ 
							if($inspection_type == 2){
								if($one_objects['gaz_is'] <> 1 ){
								
									$operation_mode = 1;
								}
							}
						}
						
						
						
						
					};
					// если начальник группы(2)
					if($access_level == 2 ){
						// начальники групп могут редактировать объекты только своего подразделения либо объекты, никому не назначенные в рамках своего филиала;
						// проверяем филиал
						if($spr_cod_branch == $one_objects['id_branch_e'] || $spr_cod_branch == $one_objects['id_branch_t']|| $spr_cod_branch == $one_objects['id_branch_ti']||$spr_cod_branch == $one_objects['id_branch_g']){
							// если это тепло
							if($inspection_type == 1){
								if($spr_cod_otd == $one_objects['users_cod_otd_t'] || $one_objects['t_is'] <> 1){
							
									$operation_mode = 1;
								}
							
							// если это теплоисточник
							
								/*if(($spr_cod_otd == $one_objects['users_cod_otd_ti'] && $spr_cod_otd == $one_objects['users_cod_otd_e'])|| ($one_objects['ti_is'] <> 1 && $one_objects['elektro_is'] <> 1)){
								
									$operation_mode = 1;
								}*/
							}
							// если это электро
							if($inspection_type == 3){
								if($spr_cod_otd == $one_objects['users_cod_otd_e'] || $one_objects['elektro_is'] <> 1){
								
									$operation_mode = 1;
								}
							
							}
							// если это газ 
							if($inspection_type == 2){
								if($spr_cod_otd == $one_objects['users_cod_otd_g']|| $one_objects['gaz_is'] <> 1 ){
								
									$operation_mode = 1;
								}
							}
						}
					}
					
					
					
					
					if($operation_mode == 1){ 
						
					
					?>
					
					    <!--div class="menu-item-event"   
								<a href="/ARM/basis/subject/" class="button_unp">
								<span><i class="icon-magnifier"></i></span>
								<i class='rp-r-os'>Поиск</i></a>
						-->
							
								<div class="tooltip">
									<a href="/ARM/basis/objects/edit/<?= $one_objects['id'] ?>" class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i>
									<span class = "tooltiptext">редактировать</span>
								</a></div>
								
								<div class="tooltip">
									<button class="button-operations" onclick="modalWindow.openModal('openNewSubject'); modalWindow.setId_obj(<?= $one_objects['id'] ?>)" <?php echo ($access_level == 2 ? '' : 'disabled="disabled"')?>>
										<i class="icon-fixed-width icon-crop"></i><span class = "tooltiptext"><?php echo ($access_level == 2 ? 'передать другому потребителю' : 'действие невозможно')?></span>
									</button>
								</div>
								
								<?php if($access_level == 2 && ($one_objects['del_e'] >0 || $one_objects['elektro_is'] == null || $one_objects['elektro_is'] ==0) && ($one_objects['del_t'] > 0 || ($one_objects['t_is'] == null || $one_objects['t_is'] ==0))&& ($one_objects['del_ti'] > 0 || ($one_objects['ti_is'] == null || $one_objects['ti_is'] ==0)) && ($one_objects['del_g'] > 0 || ($one_objects['gaz_is'] == null || $one_objects['gaz_is'] ==0))){?>
								<div class="tooltip"><button class="button-remove" onclick="object.remove(<?= $one_objects['id'] ?>)">
									<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
								</button></div>
								<?php }else{ ?>
									<div class="tooltip"><button class="button-remove no-delete" onclick="object.remove(<?= $one_objects['id'] ?>)" disabled="disabled">
									<i class="icon-trash icons"></i><span class = "tooltiptext">удалить невозможно</span>
									
								</button></div>
								
								<?php } ?>
						<!--/div-->
						
					<?php }?>
						
					</td>
					
                </tr>
                <?php endforeach; ?>
				<tr>
					<td></td>
                    <td></td>
					<td><div class='tooltip'><i><?php echo $count_e?></i>	<span class = 'tooltiptext'>Кол-во объектов электрической энергии</span></div></td>					
					<td><div class='tooltip'><i><?php echo $count_t?></i>	<span class = 'tooltiptext'>Кол-во объектов тепловой энергии</span></div></td>					
					<td><div class='tooltip'><i><?php echo $count_ti?></i>	<span class = 'tooltiptext'>Кол-во теплоисточников</span></div></td>					
					<td><div class='tooltip'><i><?php echo $count_g?></i>	<span class = 'tooltiptext'>Кол-во объектов газового надзора</span></div></td>
					<td></td>
                </tr>
				<?php }else{ ?>
						 <tr><td></td><td>У потребителя отсутствуют объекты.</td><td></td><td></td><td></td><td></td><td></td></tr>
				<?php } ?>				
                </tbody>
				
            </table>
	
			

        </div>
    </main>


<!--?php Theme::block('modal/SubjectInfo') ?-->
<!--?php Theme::block('modal/ObjectsInfo') ?-->
<?php Theme::block('modal/NewSubject') ?>
<?php $this->theme->footer(); ?>

