<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-rp"></i></span><p>Журнал</p></div>
    <main>
        <div class="container">
			<div class="sticky_body">
				<div class='top_of_page'>
					<!--------------------------------- Информация о странице --------------------------------->
					<div class="page_title">
						<h5>Журнал прохождения тестирования</h5>

						<h3><a href="/ARM/basis/personal/edit/<?= $resp_pers_t['id'] ?>?mode=responsible_persons_info" target = "_blank"><span><i class="icon-rp"></i></span>&nbsp <?php echo $resp_pers_t['secondname']." ".$resp_pers_t['firstname']." ".$resp_pers_t['lastname']." (".$resp_pers_t['post'].")"?></a></h3>
					</div>
					<div class ='nav_buttons'> 
						<a href="/ARM/examination/zurnal/zurnal_t/"><button class="button_filter" ><span><i class="icon-list"></i></span>Реестр ОЛТ</button></a>				
						<div class='search_table absolute_r'>
							<input type="text" class="form-control pull-right" id="search_table" placeholder="Поиск по таблице">
						</div>
					</div>					
				</div>
			</div>

					<div class="tek_sost">
						<h5>Текущее состояние</h5>
					</div>
			<table class="main_table">
                <thead>
					<tr>
						<!--th width="4%">№<br/>п/п</th-->
						<th width="4%">№<br/>записи</th>
						<th width="10%">Документ</span></th>
						<th width="10%">Причина</th>
						<th width="10%">Результат</th>
						<th width="10%">Следующая проверка знаний</th>
						<th width="30%">Структурное подразделение/<br>члены комиссии</th>
						<th width="10%">Операции</th>
					</tr>
                </thead>
                
				<tbody>
					<?php 

					if(count($test_book_t) > 0){
					$n = 1; // номер по порядку

					foreach($test_book_t as $zurnal):

					?>
					<?php if($zurnal['test_result'] == 'не сдан' || $zurnal['test_result'] == 'не завершен'){  ?>
						<tr class="item-<?= $zurnal['id'] ?>" id="prosrok">
					<?php }else if($zurnal['test_result'] == 'сдан'){?>
						<tr class="item-<?= $zurnal['id'] ?>" id="srok_ok">
					<?php }?>
					<!--tr class="item-<?//= $zurnal['id'] ?>"-->
						
						<!--td class="list_td"><?//= $n++ ?></td-->
						<td class="list_td"><?= $zurnal['id'] ?></td>
						<td class="list_td"><?= $zurnal['doc_name']." № ".$zurnal['doc_number']." от ". date('d.m.Y',strtotime($zurnal['date'])) ?></td>
						<td class="list_td"><?= $zurnal['spr_test_reasons_teplo_name'] ?></td>	
						<?php if($zurnal['test_result'] == 'не завершен'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-close'></i><span class = 'tooltiptext'>не завершен</span></div></td>
						<?php } ?>
						<?php if($zurnal['test_result'] == 'сдан'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>сдан</span></div></td>
						<?php } ?>					
						<?php if($zurnal['test_result'] == 'не сдан'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-minus'></i><span class = 'tooltiptext'>не сдан</span></div></td>
						<?php } ?>
						<td class="list_td"><?= date('d.m.Y',strtotime($zurnal['test_validity'])) ?></td>
						<td class="list_td"><?= $zurnal['branch_name'].", ".$zurnal['podrazd_name'].", ".$zurnal['otdel_name']." / " ?><br>
											<?= $zurnal['member_1'].", ".$zurnal['member_2'].", ".$zurnal['member_3'] ?></td>	
						<td class="list_td">
							<div class="tooltip">
								<button class="button-operations" onclick="report_zurnal.zurnalMain_t(<?= $zurnal['id'] ?>)">
									<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
								</button>
							</div>							
						</td>
					
					</tr>
					<?php endforeach; 
					?>
                </tbody>
            </table>
			<?php }else{
						echo ' </tbody></table>';
						echo '<p id="text_info">Записи отсутсвуют.</p>';					

				} ?>
			
			
					<br><br><div class="tek_sost">
						<h5>История проверки знаний</h5>
					</div><br>
					
			<table class="main_table">

				<tbody>
					 
					<?php 
//print_r($test_book_e_history);
					if(count($test_book_t_history) > 0){
					$n = 1; // номер по порядку

					foreach($test_book_t_history as $zurnal_history):

					?>
					
					<tr class="item-<?= $zurnal_history['id'] ?>">
						<td class="list_td"><?= $zurnal_history['id'] ?></td>
						<!--td class="list_td"><?//= $n++ ?></td-->
						<td class="list_td"><?= $zurnal_history['doc_name']." № ".$zurnal_history['doc_number']." от ".date('d.m.Y',strtotime($zurnal_history['date'])) ?></td>
						<td class="list_td"><?= $zurnal_history['spr_test_reasons_teplo_name'] ?></td>
						<?php if($zurnal_history['test_result'] == 'не завершен'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-close'></i><span class = 'tooltiptext'>не завершен</span></div></td>
						<?php } ?>
						<?php if($zurnal_history['test_result'] == 'сдан'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-check'></i><span class = 'tooltiptext'>сдан</span></div></td>
						<?php } ?>					
						<?php if($zurnal_history['test_result'] == 'не сдан'){ ?>
							<td class="list_td"><div class='tooltip'><i class='icon-minus'></i><span class = 'tooltiptext'>не сдан</span></div></td>
						<?php } ?>
						<td class="list_td"><?= date('d.m.Y',strtotime($zurnal_history['test_validity'])) ?></td>
						<td class="list_td"><?= $zurnal['branch_name'].", ".$zurnal['podrazd_name'].", ".$zurnal['otdel_name']." / " ?><br>
											<?= $zurnal['member_1'].", ".$zurnal['member_2'].", ".$zurnal['member_3'] ?></td>
					
						<td class="list_td">
							<div class="tooltip">
								<button class="button-operations" onclick="report_zurnal.zurnalMain_t(<?= $zurnal_history['id'] ?>)">
									<i class="icon-docs"></i><span class = "tooltiptext">протокол</span>
								</button>
							</div>							
						</td>
					
					
					</tr>
					<?php endforeach; 
					?>
                </tbody>
            </table>
			<?php }else{
						echo ' </tbody></table>';
						echo '<p id="text_info">Записи отсутсвуют.</p>';					

				} ?>


	

		</div>

	</main>		
				
			
<?php $this->theme->footer(); ?>

<div id='filter_parametrs_text'></div>	