<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-unp"></i></span><p>ЮЛ и ИП</p></div>

	
	<main>
        <div class="container">
			<div class='sticky_body'>
			<div class='top_of_page'>
				<!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title">
					<h5>Реестр</h5>				
					<h3><span><i class="icon-unp">&nbsp</i></span>Юридические лица и ИП</h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'>
						<a href="/ARM/basis/unp/create/" class="button_unp <?php echo ($access_level == 6 ? 'disabled' : '')?>"><span><i class="icon-plus"></i></span>Новое ЮЛ или ИП</a>
						<a href="/ARM/basis/unp/" class="button_unp"><span><i class="icon-magnifier"></i></span>Поиск ЮЛ или ИП</a>
						<button class="button_filter" id='filterForUnp'><span><i class="icon-filter"></i></span>Фильтр</button>
						<button onclick='report.unpfilter(); preloaderStart()' class="button_unp"><span><i class="icon-game-controller"></i></span>в Excel</button>
				</div>		
						<div id='filter_parametrs_text'></div>
				
			</div>	
			
			<div class="flex nav_block">		
					
					<div id='main_block_filter'>
					
						<button id='close_filter'>&#215 </button>
						<div id='block_for_unp'>
						
							<div class="base_part">
							<form class="form" >
								<!-- Фактический адрес -->
								<div id='filter_address_fact'>
									<h5>Параметры фильтра</h5><hr/>
									<h3>Адрес</h3>
									<br>
									<select id='formRegion' onchange="address.selectDistrict()" class="form-controls">
										<option value=0>Выберите область</option>
										<?php foreach($regions as $region):?>
											<option value=<?=$region['id']?> <?php echo (isset($cookie_formRegion) ? ($cookie_formRegion == $region['id'] ? 'selected' : '') : '') ?>><?=$region['name']?></option>
										<?php endforeach; ?>
									</select>
					
									<select id='formDistrict' onchange="address.selectCity()" class="form-controls">
										<option value=0>Выберите район</option>
										<?php
											if(isset($fltr_District)){
												foreach($fltr_District as $item_fltr_District){
													echo '<option value='.$item_fltr_District['id'].' '.(isset($cookie_formDistrict) ? ($cookie_formDistrict == $item_fltr_District['id'] ? 'selected' : '') : '').'>'.$item_fltr_District['name'].'</option>';
												}
											}
										?>
									</select>
					
									<select id='formCity' onchange="address.selectCityZone()" class="form-controls">
										<option value=0>Выберите населенный пункт</option>
										<?php
											if(isset($fltr_City)){
												foreach($fltr_City as $item_fltr_City){
													echo '<option value='.$item_fltr_City['id'].' '.(isset($cookie_formCity) ? ($cookie_formCity == $item_fltr_City['id'] ? 'selected' : '') : '').'>'.$item_fltr_City['name'].'</option>';
												}
											}
										?>
									</select>
					
									<select id='formCityZone' class="form-controls">
										<option value=0>Выберите район города</option>
										<?php
											if(isset($fltr_CityZone)){
												foreach($fltr_CityZone as $item_fltr_CityZone){
													echo '<option value='.$item_fltr_CityZone['id'].' '.(isset($cookie_formCityZone) ? ($cookie_formCityZone == $item_fltr_CityZone['id'] ? 'selected' : '') : '').'>'.$item_fltr_CityZone['name'].'</option>';
												}
											}
										?>
									</select>
									<input type='text' class="form-controls" placeholder='Введите улицу' name='street_unp' id='street_unp' value='<?php echo (isset($cookie_formStreet) ? $cookie_formStreet : '')?>'></input>
									<hr/>
								</div>
							</form>	
							</div>
								<!--------- Блок фильтра для потребителя --------->	
								
								<div class ='nav_buttons'>
									<button class="button_filter" id='apply_filter'><span><i class="icon-check-ok"></i></span>Применить</button>
									<button class="button_filter" id='clear_filter_object' onclick="filterMain.clearFilter();"><span><i class="icon-clear"></i></span>Очистить</button>
									<div class='enter_r'>Выводить по <input type='number' name='num_items_on_page' id='num_items_on_page' value='100'></input></div>									
								</div>
								
						</div>					
					</div>
			</div>
			
		
			<div class='total_check'>
				Всего: <span id='count_unp'><?php echo count($unp);?></span>
			</div>
			</div>
            <table class="main_table">
                <thead>
                <tr>
					<th width="4%">№<br/>п/п</th>	
                    <th width="8%">УНП</th>
                    <th width="70%">Наименование ЮЛ или ИП</th>
					<th width="6%"><i class='rp1'>Перейти к</i></th>
					<th width="6%">Перейти к ОЛ</th>
					<th width="6%">Операции</th>
                </tr>
                </thead>
                <tbody>
				<tr>
					<td></td>
                    <td></td>
                    <td>Для отображения сведений введите параметры фильтра.</td>
					<td></td>
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

