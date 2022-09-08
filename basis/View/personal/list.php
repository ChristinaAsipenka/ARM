<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-rp"></i></span><p>Отв.лица</p></div>
    <main>
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Список ответственных лиц ЮЛ или ИП:</h5>
					<h3><a href="/ARM/basis/unp/edit/<?= $unp['id'] ?>?mode=unp_info" target = "_blank"><span><i class="icon-unp"></i></span>&nbsp<?= $unp['name_short'] ?></a></h3>
                </div>	
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/personal/create/<?= $unp['id']?>" class="button_unp  <?php echo (($access_level < 3)? '' : 'disabled');?>"><span><i class="icon-plus"></i></span>Новое ответственное лицо</a>
					<a href="/ARM/basis/personal/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск ответственных лиц</a>
				</div>
            </div>  
            


			<div class='total_check'>
				Всего: <span><?php echo count($personal);?></span>
			</div>
            <table class="main_table">
                <thead>
                <tr>
					<th width="4%">№<br/> п/п</th>
                    <th class="list-name-otv" width="90%">Ответственные лица: ФИО (должность)</th>
					<th width="6%">Операции</th>
                </tr>
                </thead>
                <tbody>
					
			   <?php 
		
			   if(count($personal) > 0){
				   $n = 1; // номер по порядку
			   foreach($personal as $one_responsible_persons): 
			 
			   
			   ?>
			   
                <tr class="item-<?= $one_responsible_persons['id'] ?>">
					<td class="list_td"><?= $n++ ?></td>
                    <td> 
                        <a href="/ARM/basis/personal/edit/<?= $one_responsible_persons['id'] ?>?mode=personal_info" target = "_blank" class="grid">

							<span><i class="icon-rp"></i></span>
                            <?= (strlen($one_responsible_persons['secondname'])>0 ? $one_responsible_persons['secondname'] : "")
								." ".(strlen($one_responsible_persons['firstname'])>0 ? $one_responsible_persons['firstname'] : "")
								." ".(strlen($one_responsible_persons['lastname'])>0 ? $one_responsible_persons['lastname'] : "")
								." (".(strlen($one_responsible_persons['post'])>0 ? $one_responsible_persons['post'] : ""). ")"
							?>							
							
							
							
                        </a>
                    </td>
					
					<td>
							
					
					    <!--div class="menu-item-event"-->
						
						<?php
						$is_sbj = 0;
						
							if(($one_responsible_persons['sbjotv_e'] > 0 || $one_responsible_persons['sbjotv_e1'] > 0 || $one_responsible_persons['sbjotv_e2'] > 0 || $one_responsible_persons['sbjotv_t'] > 0 || $one_responsible_persons['sbjotv_t1'] > 0 || $one_responsible_persons['sbjotv_g'] > 0 || $one_responsible_persons['sbjotv_g1'] > 0) || $access_level > 2){
								$is_sbj = 1; // у ответственного лица есть потребители и удаление не возможно
							}
						?>
							
								<div class="tooltip"><a href="/ARM/basis/personal/edit/<?= $one_responsible_persons['id'] ?>" class="button-edit <?php echo ($access_level == 2 || $access_level == 1 ? '' : 'no-edit')?>">
									<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
								</a></div>

								<div class="tooltip"><button class="button-remove <?php echo ($is_sbj == 1 ? 'no-delete': '');?>" onclick="resp_pers.remove(<?= $one_responsible_persons['id'] ?>)"  <?php echo ($is_sbj == 1 ? 'disabled': '');?>>
									<i class="icon-trash icons"></i><span class = "tooltiptext"><?php echo ($is_sbj == 1 ? 'удаление невозможно': 'удалить');?></span>
								</button></div>

						<!--/div-->
						
				
						
					</td>
					
                </tr>
                <?php endforeach; 
			   }else{
				   echo '<tr><td></td><td>У выбранного ЮЛ или ИП отсутствуют ответственные лица.</td><td></td></tr>';
			   }
				
				?>
                </tbody>
            </table><hr/>

        </div>
    </main>

<!--?php Theme::block('modal/UnpInfo') ?-->
<!--?php Theme::block('modal/SubjectInfo') ?-->
<!--?php Theme::block('modal/ObjectsInfo') ?-->
<!--?php Theme::block('modal/RespPersInfo') ?-->
<?php $this->theme->footer(); ?>