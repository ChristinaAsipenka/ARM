<?php $this->theme->header(); ?>

    <main>
        <div class="container">		
					
            <div class="top_of_page"> <!------ для всех страниц ------->
                <div class="page-title">					
					
					<div class="page_title"> 	<!------ для всех страниц ------->
						<h5>
							Потребители юридического лица: 
							<a href="" onclick='modalWindow.openModal("openModalUnpInfo"); unp.unpInfo(<?= $unp['id']?>)'><span><i class="icon-unp"></i></span>&nbsp<?= $unp['name'] ?>
							</a>
						</h5>
					</div>
					<div class ='nav_buttons'> <!------ для всех страниц ------->
				
						<?php if($inspection_type == 3 && $access_level < 3){?>
							<a href="/ARM/admin/subject/create/<?= $unp['id']?>" class="button_unp"><span><i class="icon-plus"></i></span>Новая запись</a>
						<?php }?>
							<a href="/ARM/admin/subject/" class="button_unp"><span><i class="icon-magnifier-add"></i></span>Вернуться к поиску</a>
						
					</div>
				</div>
			</div>	
			<br>
            <table class="main_table">
                <thead>
                <tr>
                    <!--th class='case_number'>Номер <br/> дела</th-->
                    <th>Наименование<br/>(закрепление)</th>
					<th>Объекты<br/>(кол-во) </th>
					<th>Операции</th>
                </tr>
                </thead>
                <tbody>

				<?php foreach($subject as $one_subject): ?>
                <tr class="item-<?= $one_subject['id'] ?>">
                
                    <td>
					
                        <a href="#"  onclick = "modalWindow.openModal('openModalSubjectInfo'); subject.subjectInfo(<?= $one_subject['id'] ?>) " class="grid"><span><i class="icon-subject"></i>&nbsp
                            <?= $one_subject['name'] .(strlen($one_subject['spr_branch_name'])>0 ?'<p class="sbj_podr"> ( '.$one_subject['spr_branch_name'] .' / '.$one_subject['spr_name_podrazd'] .' / '.$one_subject['spr_name_otdel'] .' )</p>':'')?>
                        </a>
                    </td>
					
					<td class="list_td">
							<div class="tooltip">
							
								<a href="/ARM/admin/objects/list/<?= $one_subject['id'] ?>"><button class="button-list">
									<i class="icon-object icons">&nbsp(<?= $one_subject['count_objects'];?>)</i><span class = "tooltiptext">перейти к объектам</span>
								</button></a>
							</div>							
	
					</td>
					<td class="list_td">

						
							<div class="tooltip">
						
								<a href="/ARM/admin/subject/edit/<?= $one_subject['id'] ?>"><button class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
								</button></a>
							</div>
							<div class="tooltip">
								<button class="button-remove" onclick="subject.remove(<?= $one_subject['id'] ?>)">
									<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
								</button>
							</div>
	

					</td>
					
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>


<?php Theme::block('modal/UnpInfo') ?>
<?php Theme::block('modal/SubjectInfo') ?>
<?php Theme::block('modal/ObjectsInfo') ?>
<?php $this->theme->footer(); ?>

