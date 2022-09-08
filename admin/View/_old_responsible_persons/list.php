<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="top_of_page"> <!------ для всех страниц ------->
                <div class="page-title">

					<div class="page_title"> 	<!------ для всех страниц ------->
						<h5>
							Ответственные лица юридического лица: 
							<a href="" onclick='modalWindow.openModal("openModalUnpInfo"); unp.unpInfo(<?= $unp['id']?>)'><?= $unp['name_short'] ?></a>
						</h5>
					</div>
					<div class ='nav_buttons'> <!------ для всех страниц -------> 
						<a href="/ARM/admin/responsible_persons/create/<?= $unp['id']?>" class="button_unp"><span><i class="icon-plus"></i></span>Новая запись</a>
						<a href="/ARM/admin/responsible_persons/" class="button_unp"><span><i class="icon-magnifier-add"></i></span>Вернуться к поиску</a>
						
					</div>
				</div>
			</div>
			<div class="base_part"> <!------ для всех страниц ------->
            <table class="main_table">
                <thead>
                <tr>
                    <th class="list-name-otv">Ответственные лица</th>
					<th>Операции</th>
                </tr>
                </thead>
                <tbody>
        
			   <?php foreach($responsible_persons as $one_responsible_persons): ?>
                <tr class="item-<?= $one_responsible_persons['id'] ?>">
                    <td>
                        <a href="#"  onclick = "modalWindow.openModal('openModalRespPersInfo'); resp_pers.RespPersInfo(<?= $one_responsible_persons['id'] ?>) " class="grid">

							
                            <?= (strlen($one_responsible_persons['secondname'])>0 ? $one_responsible_persons['secondname'] : "")
								." ".(strlen($one_responsible_persons['firstname'])>0 ? $one_responsible_persons['firstname'] : "")
								." ".(strlen($one_responsible_persons['lastname'])>0 ? $one_responsible_persons['lastname'] : "")
								." (".(strlen($one_responsible_persons['post'])>0 ? $one_responsible_persons['post'] : ""). ")"
							?>							
							
							
							
                        </a>
                    </td>
					
					<td>
										
					
					    <!--div class="menu-item-event"-->
							
								<div class="tooltip"><a href="/ARM/admin/responsible_persons/edit/<?= $one_responsible_persons['id'] ?>" class="button-edit">
									<i class="icon-fixed-width icon-pencil"></i><span class = "tooltiptext">редактировать</span>
								</a></div>

								<div class="tooltip"><button class="button-remove" onclick="resp_pers.remove(<?= $one_responsible_persons['id'] ?>)">
									<i class="icon-trash icons"></i><span class = "tooltiptext">удалить</span>
								</button></div>

						<!--/div-->
						
				
						
					</td>
					
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
			</div>
        </div>
    </main>

<?php Theme::block('modal/UnpInfo') ?>
<?php Theme::block('modal/SubjectInfo') ?>
<?php Theme::block('modal/ObjectsInfo') ?>
<?php Theme::block('modal/RespPersInfo') ?>
<?php $this->theme->footer(); ?>