<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="top_of_page"> <!------ для всех страниц ------->
                <div class="page-title">

					<div class="page_title"> 	<!------ для всех страниц ------->
						<h5>
							Объекты потребителя: 
							<a href="" onclick='modalWindow.openModal("openModalSubjectInfo"); subject.subjectInfo(<?= $subject['id']?>)'><span><i class="icon-subject"></i></span>&nbsp<?= $subject['name'] ?>
							</a>
						</h5>
					</div>
					<div class ='nav_buttons'> <!------ для всех страниц -------> 
					<?php if($inspection_type == 3 && $access_level < 3){?>
						<a href="/ARM/admin/objects/create/<?= $subject['id'] ?>" class="button_unp"><span><i class="icon-plus"></i></span>Новая запись</a>
					<?php }?>
						<a href="/ARM/admin/subject/" class="button_unp"><span><i class="icon-magnifier-add"></i></span>Вернуться к поиску</a>
						
					</div>
				</div>
			</div>
			<div class="base_part"> <!------ для всех страниц ------->
				<!--div class="flex">		
					<div class='search_table'>
						<input type="text" class="form-control pull-right" id="search_table" placeholder="Поиск по реестру">
					</div>

				</div-->
     

            <table class="main_table">
                <thead>
                <tr>
                    <th class="list-name">Наименование (адрес)</th>
					<th>	<i class="icon-energy"></i>		</th>
					<th>	<i class="icon-teplo"></i>		</th>
					<th>	<i class="icon-ti"></i>			</th>
					<th>	<i class="icon-fire"></i>		</th>
					<th>Операции</th>
					
                </tr>
                </thead>
                <tbody>
              
			   <?php foreach($objects as $one_objects): ?>
                <tr class="item-<?= $one_objects['id'] ?>">
                    <td>
                        <a href="#"  onclick = "modalWindow.openModal('openModalObjectsInfo'); object.objectInfo(<?= $one_objects['id'] ?>) " class="grid"><span><i class="icon-object"></i>&nbsp
                            <?= $one_objects['reestr_object_name'] . "  (" .  (strlen($one_objects['address_index'])>0 ? $one_objects['address_index'] : "")
															               .  (strlen($one_objects['spr_region_name'])>0 ? ", ".$one_objects['spr_region_name'] : "") 
																		   .  (strlen($one_objects['spr_district_name'])>0 ? ", ".$one_objects['spr_district_name'] : "") 
																		   .  (strlen($one_objects['spr_city_name'])>0 ? ", ".$one_objects['spr_city_name'] : "") 
																		   .  (strlen($one_objects['address_street'])>0 ? ", ".$one_objects['address_street'] : "")
																		   .  (strlen($one_objects['address_building'])>0 ? "-".$one_objects['address_building'] : "")
																		   .  (strlen($one_objects['address_flat'])>0 ? "-".$one_objects['address_flat'] : "")																		  
															 . ")"?>
							
							
							
							
							
                        </a>
                    </td>
					
					<td class="list_td"><div class="tooltip"><i class="icon-check"></i><span class = "tooltiptext">объект электрической энергии</span></div></td>
					<td class="list_td"><?= $one_objects['t_is'] > 0 ? "<div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>объект тепловой энергии</span></div>" : "<div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет</span></div>"?></td>
					<td class="list_td"><?= $one_objects['ti_is'] > 0 ? "<div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>теплоисточник</span></div>" : "<div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет</span></div>"?></td>
					<td class="list_td"><?= $one_objects['is_dom'] > 0 ? "<div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>объект газового надзора</span></div>" : "<div class='tooltip'><i class='icon-ban'></i><span class = 'tooltiptext'>нет</span></div>"?></td>

					
			
						
					
					
					
					<td class="list_td">
										
					<?php if(($access_level == 2 || $id_user == $one_objects['reestr_object_e_insp'] || $id_user == $one_objects['reestr_object_t_insp'] || $id_user == $one_objects['reestr_object_ti_insp'] || $id_user == $one_objects['reestr_object_g_insp']) && $spr_cod_branch == $subject['spr_branch']){ // корректировать информацию могут только инспектора(1) и начальники груп(2)?>
					
					    <!--div class="menu-item-event"-->
							
								<div class="tooltip"><a href="/ARM/admin/objects/edit/<?= $one_objects['id'] ?>" class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
								</a></div>
								<?php if($access_level == 2 && $one_objects['del_e'] >0 && ($one_objects['del_t'] > 0 || ($one_objects['t_is'] == null || $one_objects['t_is'] ==0))&& ($one_objects['del_ti'] > 0 || ($one_objects['ti_is'] == null || $one_objects['ti_is'] ==0)) && ($one_objects['del_g'] > 0 || ($one_objects['is_dom'] == null || $one_objects['is_dom'] ==0))){?>
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
                </tbody>
            </table>
			</div>
        </div>
    </main>


<?php Theme::block('modal/SubjectInfo') ?>
<?php Theme::block('modal/ObjectsInfo') ?>
<?php $this->theme->footer(); ?>

