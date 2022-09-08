<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-subject"></i></span><p>ЮЛ и ИП</p></div>
    <main>
        <div class="container">
			<div class='sticky_body'>		
            <div class="top_of_page"> 
				<!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title"> 
					<h5>Список<i class="rp-r-m"></i> ЮЛ или ИП:</h5>				
					<h3>
						<a href="/ARM/basis/unp/edit/<?= $unp['id'] ?>?mode=unp_info" target = "_blank"><span><i class="icon-unp"></i></span>&nbsp<?= $unp['name'] ?>
						</a>
					</h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 					
					<a href="/ARM/basis/subject/create/<?= $unp['id']?>" class="button_unp <?php echo (($access_level < 3)? '' : 'disabled');?>"><span><i class="icon-plus"></i></span>Новый потребитель</a>
					<a href="/ARM/basis/subject/" class="button_unp"><span><i class="icon-magnifier"></i></span><i class='rp-r-os'>Поиск</i></a>
					<a href="/ARM/basis/filter/"><button class="button_filter" ><span><i class="icon-list"></i></span><i class='rp-r-ms'>Реестр</i></button></a>
					<a href="/ARM/basis/unp/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск ЮЛ или ИП</a>
					<a href="/ARM/basis/unp/list/" class="button_unp"><span><i class="icon-list"></i></span>Реестр ЮЛ и ИП</a>
					
				</div>
			</div>	
			
			<div class='total_check'>
				Всего: <span><?php echo count($subject);?></span>
			</div>
			</div>
            <table class="main_table">
                <thead>
                <tr>
                    <th width="4">№<br/>п/п</th>
                    <th width="84%"><i class='rp-r-o'>Наименование</i></th>
					<th width="6%">К объектам<br/><span class='font-size-11'>(кол-во)</span></th>
					<th width="6%">Операции</th>
                </tr>
                </thead>
                <tbody>

				<?php
				if(count($subject) > 0){
				$n = 1; // номер по порядку
				foreach($subject as $one_subject): ?>
                <tr class="item-<?= $one_subject['id'] ?>">
					<td class="list_td"><?= $n++ ?></td>
                    <td>
					
                        <a href="/ARM/basis/subject/edit/<?= $one_subject['id'] ?>?mode=subject_info" target = "_blank" class="grid"><span><i class="icon-subject"></i>&nbsp
                            <?= $one_subject['name'] 
							//.(strlen($one_subject['spr_branch_name'])>0 ?'<p class="sbj_podr"> ( '.$one_subject['spr_branch_name'] .' / '.$one_subject['spr_name_podrazd'] .' / '.$one_subject['spr_name_otdel'] .' )</p>':'')
							?>
                        </a>
                    </td>
					
					<td class="list_td">
							<div class="tooltip">
							
								<a href="/ARM/basis/objects/list/<?= $one_subject['id'] ?>"><button class="button-list">
									<i class="icon-object icons"> <?= $one_subject['count_objects'];?></i><span class = "tooltiptext">перейти к объектам</span>
								</button></a>
							</div>							
	
					</td>
					<td class="list_td">

						
							<div class="tooltip">
						
								<a href="/ARM/basis/subject/edit/<?= $one_subject['id'] ?>"><button class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
								</button></a>
							</div>
							<?php if($one_subject['count_objects'] == 0){?>
							<div class="tooltip">
								<button class="button-remove" onclick="subject.remove(<?= $one_subject['id'] ?>)">
									<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
								</button>
							</div>
				<?php }?>

					</td>
					
                </tr>
                <?php endforeach;
				}else{
				   echo '<tr><td></td><td><i class="rp-i-m">У выбранного ЮЛ или ИП отсутствуют</i>.</td> <td></td> <td></td> </tr>';
				}
				
				?>
                </tbody>
            </table><hr/>
        </div>
    </main>


<!--?php Theme::block('modal/UnpInfo') ?-->
<!--?php Theme::block('modal/SubjectInfo') ?-->
<!--?php Theme::block('modal/ObjectsInfo') ?-->
<?php $this->theme->footer(); ?>

