<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <!--div class="row">
                <div class="col page-title">
                    <h5 class="zag">
                        Реестр потребителей
                    </h5>
				</div>
			</div-->	
				
				<div class='top_of_page'>
					<div class="page_title"> 	<!------ для всех страниц ------->
						<h5>Мои потребители</h5>
						<p>* вывод потребителей с закрепленными объектами по выбранному структурному подразделению / инспектору</p>
					</div>
					
				</div>
				<div class="flex">		
					
					<div class='search_table'>
						<input type="text" class="form-control pull-right" id="search_table" placeholder="Поиск по реестру">
					</div>
					&nbsp
					<div class ='nav_buttons'> <!------ для всех страниц -------> 
					<?php if($inspection_type == 3 && $access_level < 3){?>
						<a href="/ARM/admin/subject/create/" class="button_unp"><span><i class="icon-plus"></i></span>Новая запись</a>
					<?php }?>
					
						<a href=""<button onclick='report.subjectFilter();' class="button_unp"><span><i class="icon-printer"></i></span>Печать</button></a>
					</div>
				</div>

	
     <div class="flex filter_block">
		<select id='fs_branch' <?php echo ($access_level > 4 ? '' : 'disabled') ;?>>
			<option value='0'>Выберите филиал</option>
			<?php
			
				foreach($branch as $one_branch)
				{
					echo '<option value="'.$one_branch['id'].'" '.($one_branch['id'] == $spr_cod_branch ?  'selected' : '').'>'.$one_branch['sokr_name'].'</option>';
				}
			?>
		</select>&nbsp
		<select id='fs_podrazdelenie' <?php echo ($access_level > 3 ? '' : 'disabled') ;?>>
			<option value='0'>Выберите МРО</option>
			<?php
			
				foreach($podrazdelenie as $one_podrazdelenie)
				{
					echo '<option value="'.$one_podrazdelenie['id'].'" '.($one_podrazdelenie['id'] == $spr_cod_podrazd ?  'selected' : '').'>'.$one_podrazdelenie['sokr_name'].'</option>';
				}
			?>
		</select>&nbsp
		<select id='fs_otdel' <?php echo ($access_level > 2 ? '' : 'disabled') ;?>>
			<option value='0'>Выберите РЭГИ</option>
			<?php
			
				foreach($otdel as $one_otdel)
				{
					echo '<option value="'.$one_otdel['id'].'" '.($access_level > 2 ? : ($one_otdel['id'] == $spr_cod_otd ?  'selected' : '')).'>'.$one_otdel['sokr_name'].'</option>';
				}
			?>
		</select>&nbsp
		<select id='fs_fio'  <?php echo ($access_level > 1 ? '' : 'disabled') ;?>>
			<option value='0'>Выберите инспектора</option>
			<?php
				if(isset($user)){
					foreach($user as $one_user)
					{
						echo '<option value="'.$one_user['id'].'" '.($access_level > 1 ? : ($one_user['id'] == $id_user ?  'selected' : '')).'>'.$one_user['fio'].'</option>';
					}
				}
			?>
		</select>&nbsp
			<p>Всего: <span id="allSubjects"></span></p> 
	 </div>
<br>
            <table class="main_table">
                <thead>
                <tr>
                    <th class='case_number'>Номер <br/> дела</th>
                    <th>Наименование<br/>(закрепление)</th>
					<th>Объекты<br/>(кол-во) </th>
					<th>Операции</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($subject as $one_subject): ?>
                <tr class="item-<?= $one_subject['id'] ?>">
                    <td><?= $one_subject['id'] ?></td>
                    <td>
					
                        <a href="#"  onclick = "modalWindow.openModal('openModalSubjectInfo'); subject.subjectInfo(<?= $one_subject['id'] ?>) " class="grid"><span><i class="icon-subject"></i>&nbsp
                            <?= $one_subject['name'] .(strlen($one_subject['spr_branch_name'])>0 ?'<p class="sbj_podr"> ( '.$one_subject['spr_branch_name'] .' / '.$one_subject['spr_name_podrazd'] .' / '.$one_subject['spr_name_otdel'] .' )</p>':'')?>
                        </a>
                    </td>
					
					<td class="list_td">
					    <!--div class="menu-item-event"-->
							<div class="tooltip">
							
								<a href="/ARM/admin/objects/list/<?= $one_subject['id'] ?>"><button class="button-list">
									<i class="icon-object icons">&nbsp(<?= $one_subject['count_objects'];?>)</i><span class = "tooltiptext">перейти к объектам</span>
								</button></a>
							</div>							
	
						<!--/div-->
					</td>
					<td class="list_td">
					    <!--div class="menu-item-event"-->
						
						
						
								<div class="tooltip"><a href="/ARM/admin/subject/edit/<?= $one_subject['id'] ?>"><button class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
								</button></a></div>
							
							
								<div class="tooltip"><button class="button-remove" onclick="subject.remove(<?= $one_subject['id'] ?>)">
									<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
								</button></div>
							
	
						<!--/div-->
					</td>
					
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>



<?php Theme::block('modal/SubjectInfo') ?>
<?php Theme::block('modal/ObjectsInfo') ?>
<?php $this->theme->footer(); ?>

