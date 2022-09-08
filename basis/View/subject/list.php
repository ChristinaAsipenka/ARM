<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-pin"></i></span><p>Потребители</p></div>
	
		
   
   <main>
        <div class="container">
			<div class='sticky_body'> 		
			<div class='top_of_page'> 
				<!--------------------------------- Информация о странице МОИ Потребители--------------------------------->
				<div class="page_title">
					<h5><span>Мои потребители</span></h5>	
										
					<h3><span><i class="icon-subject">&nbsp</i></span><span class='rp-r-m'>Список</span> по выбранному инспектору (структурному подразделению)</h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/subject/create/" class="button_unp <?php echo (($access_level < 3)? '' : 'disabled');?>"><span><i class="icon-plus"></i></span><i class='rp-i-os'>Новый</i></a>	
					<a href="/ARM/basis/subject/" class="button_unp"><span><i class="icon-magnifier"></i></span><i class='rp-r-os'>Поиск</i></a>
					<a href="/ARM/basis/filter/"><button class="button_filter" ><span><i class="icon-list"></i></span><i class='rp-r-ms'>Реестр</i></button></a>
					<button onclick='report.subjectFilterMain(); preloaderStart()' class="button_unp"><span><i class="icon-game-controller"></i></span>в Excel</button>				
					<div class='search_table absolute_r'>
						<input type="text" class="form-control pull-right" id="search_table" placeholder="Поиск по таблице">
					</div>
				</div>
			</div>

			<form class="form" >
			<div class="flex filter_block">
				<div class="tooltip">
					<a href="/ARM/basis/subject/list/"><i class="icon-filter button-operations">&nbsp </i><span class = "tooltiptext">сброс фильтра</span></a>
				</div>
				<select id='fs_branch' <?php echo ($access_level > 4 ? '' : 'disabled') ;?> class="form-controls w2">
					<option value='0'>Выберите филиал</option>
					<?php
					foreach($branch as $one_branch){
						if($access_level == 5 || $access_level == 6){
							echo '<option value="'.$one_branch['id'].'">'.$one_branch['sokr_name'].'</option>';
						}else{
							echo '<option value="'.$one_branch['id'].'" '.($one_branch['id'] == $spr_cod_branch ?  'selected' : '').'>'.$one_branch['sokr_name'].'</option>';
						}
					}
					?>
				</select>

				<select id='fs_podrazdelenie' <?php echo ($access_level > 3 ? '' : 'disabled') ;?> class="form-controls w2">
					<option value='0'>Выберите МРО</option>
					<?php
					foreach($podrazdelenie as $one_podrazdelenie){
						if($access_level == 5 || $access_level == 6){
							//echo '<option value="'.$one_podrazdelenie['id'].'">'.$one_podrazdelenie['sokr_name'].'</option>';
						}else{
							echo '<option value="'.$one_podrazdelenie['id'].'" '.($one_podrazdelenie['id'] == $spr_cod_podrazd ?  'selected' : '').'>'.$one_podrazdelenie['sokr_name'].'</option>';
						}							
					}
					?>
				</select>
				
				<select id='fs_otdel' <?php echo ($access_level > 2 ? '' : 'disabled') ;?> class="form-controls w2">
					<option value='0'>Выберите РЭГИ</option>
					<?php
					foreach($otdel as $one_otdel){
						if($access_level == 5 || $access_level == 6){
							//echo '<option value="'.$one_otdel['id'].'">'.$one_otdel['sokr_name'].'</option>';
						}else{
							echo '<option value="'.$one_otdel['id'].'" '.($access_level > 2 ? : ($one_otdel['id'] == $spr_cod_otd ?  'selected' : '')).'>'.$one_otdel['sokr_name'].'</option>';
						}						
					}
					?>
				</select>
				
				<select id='fs_fio'  <?php echo ($access_level > 1 ? '' : 'disabled') ;?> class="form-controls w2">
					<option value='0'>Выберите инспектора</option>
					<?php
					if(isset($user)){
						foreach($user as $one_user){
								echo '<option value="'.$one_user['id'].'" '.(($access_level == 1 && $one_user['id'] == $id_user) ?  'selected' : '').' arm_gruppa = "'.$one_user['arm_gruppa'].'">'.$one_user['fio'].''.($one_user['arm_gruppa'] == 1 ?  ' (тепло)' : ($one_user['arm_gruppa'] == 3 ?  ' (электро)' : ($one_user['arm_gruppa'] == 2 ?  ' (газ)' : ' (нет прав)'))).'</option>';
						}
					}
					?>
				</select>
				
				<div class="absolute_r">
					<!--select id='fs_inspection_type' class="form-controls w2">
						<option value='0'>фильтр по объектам (все)</option>
						<option value='1'>с объектами элекроснабжения</option>
						<option value='2'>с объектами теплоснабжения</option>
						<option value='3'>с теплоисточниками</option>
						<option value='4'>с объектами газового надзора</option>					
					</select-->
					<!--div class="tooltip">
						<p class="label_enter font-size-11" style="padding-top: 6px;">000/0000</p>
						<span class = "tooltiptext">кол-во объектов (моих/всего)</span>
					</div-->
					
<!-----------------------------------------Кол-во объектов по направлениям деятельности------------------------------------------------------------------>					
					<div class="tooltip w3">
						<p class="label_enter font-size-12" style="padding-top: 6px;">
							<i class="icon-energy"> <span id='sum_objects_el'></span>, </i>
							<i class="icon-teplo"> <span id='sum_objects_t'></span>, </i>
							<i class="icon-ti"> <span id='sum_objects_ti'></span>, </i>
							<i class="icon-fire"> <span id='sum_objects_gaz'></span>.</i>
							<span class = "tooltiptext">Кол-во объектов по направлениям деятельности: электро, тепло, ТИ, газ.</span>
						</p>
					</div>
<!--------------------------------------------------------------------------------------------------->						
				</div>
			</div>
			</form>	
			

			<div class='total_check'>
					<!--span>эл. объекты	 <span id='sum_objects_el'></span></span>
					<span>тепло объекты <span id='sum_objects_t'></span></span>
					<span>ТИ объекты	<span id='sum_objects_ti'></span></span>
					<span>газ объекты	 <span id='sum_objects_gaz'></span></span-->
			<span>Всего: <span id="allSubjects"></span></span>
			
			</div>
			
			</div>
			
            <table class="main_table">
                <thead>
					<tr>
						<th width="4%">№<br/>п/п</th>
						<th width="6%" class='case_number'>Номер <br/> дела</th>
						<th width="70%"><span class='rp-r-o'>Наименование</span></th>
						<th width="10%">К объектам<br/><span class='font-size-11'>(моих/всего)</span></th>
						<th width="10%">Операции</th>
					</tr>
                </thead>
                
				<tbody>
					<?php 

					if(count($subject) > 0){
					$n = 1; // номер по порядку

					foreach($subject as $one_subject):
						$key = array_search($one_subject['id'], array_column($subject_all_objs, 'id'));
					?>
					<tr class="item-<?= $one_subject['id'] ?>" sum_objects_el="<?=$one_subject['sum_objects_el'] ?>" sum_objects_t="<?=$one_subject['sum_objects_t'] ?>" sum_objects_ti="<?=$one_subject['sum_objects_ti'] ?>" sum_objects_gaz="<?=$one_subject['sum_objects_gaz'] ?>">
						
						<td class="list_td"><?= $n++ ?></td>
						<!--td><?= $one_subject['num_case_s'] ?></td-->
						<td><?= $one_subject['id'] ?></td>
						<td>
							<!--a href="#"  onclick = "modalWindow.openModal('openModalSubjectInfo'); subject.subjectInfo(<?//= $one_subject['id'] ?>) " class="grid"><span><?php// echo ($one_subject['id_unp']>0?'<i class="icon-subject"></i>' : '<i class="icon-person"></i>');?>&nbsp
								<?php //echo $one_subject['name']/* .(strlen($one_subject['spr_branch_name'])>0 ?'<p class="sbj_podr"> ( '.$one_subject['spr_branch_name'] .' / '.$one_subject['spr_name_podrazd'] .' / '.$one_subject['spr_name_otdel'] .' )</p>':'')*/?>
							</a-->
							
							
							<a href="/ARM/basis/subject/edit/<?= $one_subject['id'] ?>?mode=subject_info" target = "_blank" class="grid" id="subj_info">
								<span><i class="icon-subject"></i>&nbsp
								<?php 
									echo ($one_subject['id_unp']>0 ? '' : 'ФЛ: '); 
									echo $one_subject['name'];
								?>
								</span>
							</a>							
							
							
							
						</td>
						<td class="list_td">
							<div class="tooltip">
								<a href="/ARM/basis/objects/list/<?= $one_subject['id'] ?>">
									<button class="button-list">
										<!--i class="icon-object icons">&nbsp<?php //echo $subject_all_objs[$key]['count_objects']?></i-->
										<i class="icon-object icons">&nbsp<?php echo $one_subject['count_objects'].'/'.$subject_all_objs[$key]['count_objects'];?></i>
										<!--i class="icon-object icons">&nbspперейти</i-->
										<span class = "tooltiptext">перейти к списку объектов</span></span>
									</button>
								</a>
							</div>							
						</td>
						<td class="list_td">
											
							<div class="tooltip" >
								<a href="/ARM/basis/subject/edit/<?= $one_subject['id'] ?>"  class='<?php echo (($access_level < 3)? '' : 'no-edit');?>'>
									<button class="button-edit">
										<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
									</button>
								</a>
							</div>
								
							<div class="tooltip">
								<button class="button-operations" onclick="modalWindow.openModal('openNewInspector'); modalWindow.findObjs(<?= $one_subject['id'] ?>)" <?php echo ($access_level == 2 ? '' : 'disabled="disabled"')?>>
									<i class="icon-fixed-width icon-credit-card"></i><span class = "tooltiptext"><?php echo ($access_level == 2 ? 'передать другому инспектору' : 'действие невозможно')?></span>
								</button>
							</div>
								
							<div class="tooltip">
								<button class="button-operations" onclick="modalWindow.openModal('openNewSubject'); modalWindow.setId_sbj(<?= $one_subject['id'] ?>)" <?php echo ($access_level == 2 ? '' : 'disabled="disabled"')?>>
									<i class="icon-fixed-width icon-crop"></i><span class = "tooltiptext"><?php echo ($access_level == 2 ? 'передать другому потребителю' : 'действие невозможно')?></span>
								</button>
							</div>

							
							<!--div class="tooltip">
								<button class="button-operations" onclick = "info.showObjInfoGlobal(<?//= $one_subject['id'] ?>);"><i class="icon-fixed-width icon-info"></i><span class = "tooltiptext"><?php //echo 'информация об объектах'?></span></button>
								<?php //Theme::block('modal/infoObjGlobal') ?>
							</div-->							


							<!--div class="tooltip">
								<button class="button-operations" onclick="modalWindow.openModal('openInfoObj'); modalWindow.infoObjs(<?//=// $one_subject['id'] ?>)" <?php// echo ($access_level == 2 ? '' : 'disabled="disabled"')?>>
									<i class="icon-fixed-width icon-info"></i><span class = "tooltiptext"><?php //echo 'информация об объектах'?></span>
								</button>
							</div-->


							<!--div class="tooltip">
								<button class="button-remove <?php //echo ($one_subject['count_objects'] >0 && $subject_all_objs[$key]['count_objects'] >0 ? 'no-delete' : '')?>" onclick="subject.remove(<?//= $one_subject['id'] ?>)" <?php //echo ($one_subject['count_objects'] >0 && $subject_all_objs[$key]['count_objects'] >0 ? 'disabled' : '')?>>
									<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
								</button>
							</div-->
							
	
						<!--/div-->
						</td>
				
					</tr>
					<?php endforeach; 
					?>
                </tbody>
            </table>
			<?php }else{
						echo ' </tbody></table>';
						echo '<p id="text_info">Потребители отсутсвуют.</p>';					

				} ?>
			
			
			<hr/>
        </div>
    </main>



<?php Theme::block('modal/NewSubject') ?>
<?php Theme::block('modal/NewInspector') ?>
<?php $this->theme->footer(); ?>

