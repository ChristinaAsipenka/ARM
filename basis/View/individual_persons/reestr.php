<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-unp"></i></span><p>ЮЛ и ИП</p></div>
    <main>
        <div class="container">
			<div class="sticky_body">
			<div class='top_of_page'>
				<!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title">
					<h5>Реестр</h5>				
					<h3><span><i class="icon-unp">&nbsp</i></span>Физические лица</h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'>
						<a href="/ARM/basis/individual_persons/create/" class="button_unp <?php echo ($access_level == 6 ? 'disabled' : '')?>"><span><i class="icon-plus"></i></span>Новое физическое лицо</a>
						<a href="/ARM/basis/individual_persons/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск физ. лиц</a>
						<button class="button_filter" id='filterForIP'><span><i class="icon-filter"></i></span>Фильтр</button>
						<button onclick='report.indpersfilter(); preloaderStart()' class="button_unp"><span><i class="icon-game-controller"></i></span>в Excel</button>
				</div>		
						<div id='filter_parametrs_text'></div>
				
			</div>	
			
			<div class="flex nav_block">		
					
					<div id='main_block_filter'>
					
						<button id='close_filter'>&#215 </button>
						<div id='block_for_unp'>
						
							<div class="base_part">
							<form class="form" >
							
								<div id='filter_address_fact'>
									<h5>Параметры фильтра</h5><hr/>
								
									<input type='text' class="form-controls" placeholder='Введите фамилию' name='mf_ip_firstname' id='mf_ip_firstname' value='<?php  echo (isset($cookie_mf_ip_firstname) ? $cookie_mf_ip_firstname : '') ?>'></input>
									<input type='text' class="form-controls" placeholder='Введите имя' name='mf_ip_secondname' id='mf_ip_secondname' value='<?php  echo (isset($cookie_mf_ip_secondname) ? $cookie_mf_ip_secondname : '') ?>'></input>
									<input type='text' class="form-controls" placeholder='Введите отчество' name='mf_ip_lastname' id='mf_ip_lastname' value='<?php echo (isset($cookie_mf_ip_lastname) ? $cookie_mf_ip_lastname : '') ?>'></input>
									<input type='text' class="form-controls" placeholder='Введите ID номер (или фрагмент)' name='mf_ip_identification_number' id='mf_ip_identification_number' value='<?php  echo (isset($cookie_mf_ip_identification_number) ? $cookie_mf_ip_identification_number : '') ?>'></input>
									<hr/>
								</div>
							</form>	
							</div>
								<!--------- Блок фильтра для потребителя --------->	
								
								<div class ='nav_buttons'>
									<button class="button_filter" id='apply_filter_indpers'><span><i class="icon-check-ok"></i></span>Применить</button>
									<button class="button_filter" id='clear_filter_object' onclick="filterMain.clearFilter();"><span><i class="icon-clear"></i></span>Очистить</button>
									<div class='enter_r'>Выводить по <input type='number' name='num_items_on_page' id='num_items_on_page' value='50'></input></div>									
								</div>
								
						</div>					
					</div>
			</div>
			
		
			<div class='total_check'>
				Всего: <span id='count_unp'></span>
			</div>
			</div>
            <table class="main_table">
                <thead>
                <tr>
					<th width="">№<br/>п/п</th>	
               
                    <th width="">ФИО</th>
					<th width="">Количество<br/>потребителей</th>
				
					<th width="">Операции</th>
                </tr>
                </thead>
                <tbody>
				<tr>
					<td></td>
                         <td>Для отображения сведений введите параметры фильтра.</td>
			
					<td></td>
					<td></td>
                </tr>
                </tbody>
            </table>
			<hr/><ul id='pagination'>
	
			</ul>
        </div>
    </main>

<!--?php Theme::block('modal/SubjectInfo') ?-->
<!--?php Theme::block('modal/UnpInfo') ?-->
<?php $this->theme->footer(); ?>

<div id='filter_parametrs_text'></div>	