<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-subject"></i></span><p>Потребители</p></div>
   <?php Theme::block('preloader/preloader') ?>
   <main>
        <div class="container">
			<div class='sticky_body'>
            <div class="top_of_page"> <!------ для всех страниц ------->
				<!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title">
					<h5>Реестр</h5>				
					<h3><span><i class="icon-subject">&nbsp</i></span><i class='rp1'>Региональные потребители (</i>)</h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'>
					<a href="/ARM/basis/subject/create/" class="button_unp <?php echo (($access_level < 3)? '' : 'disabled');?>"><span><i class="icon-plus"></i></span><i class='rp-i-os'>Новый</i></a>
					<a href="/ARM/basis/subject/list/" class="button_unp"><span><i class="icon-pin"></i></span>Мои потребители</a>
					<a href="/ARM/basis/subject/" class="button_unp"><span><i class="icon-magnifier"></i></span><i class='rp-r-os'>Поиск</i></a>
					<button class="button_filter" id='filterForSubject'><span><i class="icon-filter"></i></span>Фильтр</button>
					<button onclick='report.subjectFilter(); preloaderStart()' class="button_unp"><span><i class="icon-game-controller"></i></span>в Excel</button>
				</div>	
					<div id='filter_parametrs_text'></div>
								
			</div>
			
			<div class="flex nav_block">
			<div id='main_block_filter'>
				<button id='close_filter'>&#215 </button>
				
				<div id='block_for_subject'>
					
					<!-- Фактический адрес -->
					<div class="base_part">
						<h5>Параметры фильтра</h5><hr/>
						<div id='filter_address_fact'>
							<input type='text' placeholder='Номер дела в филиале' name='formNumCaseOld' id='formNumCaseOld' class="form-controls" value='<?php echo (isset($cookie_formNumCaseOld) ? $cookie_formNumCaseOld : '')?>'></input>
							<h3>Фактический адрес</h3>
							<br>
							<select id='formRegionFact' onchange="address.selectDistrict('Fact')" class="form-controls">
								<option value=0>Выберите область</option>
								<?php foreach($regions as $region):?>
									<option value=<?=$region['id']?> <?php echo (isset($cookie_formRegionFact) ? ($cookie_formRegionFact == $region['id'] ? 'selected' : '') : '') ?>><?=$region['name']?></option>
								<?php endforeach; ?>
							</select>
					
							<select id='formDistrictFact' onchange="address.selectCity('Fact')" class="form-controls">
								<option value=0>Выберите район</option>
								<?php
									if(isset($fltr_DistrictFact)){
										foreach($fltr_DistrictFact as $item_fltr_DistrictFact){
											echo '<option value='.$item_fltr_DistrictFact['id'].' '.(isset($cookie_formDistrictFact) ? ($cookie_formDistrictFact == $item_fltr_DistrictFact['id'] ? 'selected' : '') : '').'>'.$item_fltr_DistrictFact['name'].'</option>';
										}
									}
								?>
							</select>
					
							<select id='formCityFact' onchange="address.selectCityZone('Fact')" class="form-controls">
								<option value=0>Выберите населенный пункт</option>
								<?php
									if(isset($fltr_CityFact)){
										foreach($fltr_CityFact as $item_fltr_CityFact){
											echo '<option value='.$item_fltr_CityFact['id'].' '.(isset($cookie_formCityFact) ? ($cookie_formCityFact == $item_fltr_CityFact['id'] ? 'selected' : '') : '').'>'.$item_fltr_CityFact['name'].'</option>';
										}
									}
								?>
							</select>
						
							<select id='formCityZoneFact' class="form-controls">
								<option value=0>Выберите район города</option>
								<?php
									if(isset($fltr_CityZoneFact)){
										foreach($fltr_CityZoneFact as $item_fltr_CityZoneFact){
											echo '<option value='.$item_fltr_CityZoneFact['id'].' '.(isset($cookie_formCityZoneFact) ? ($cookie_formCityZoneFact == $item_fltr_CityZoneFact['id'] ? 'selected' : '') : '').'>'.$item_fltr_CityZoneFact['name'].'</option>';
										}
									}
								?>
							</select>
								
							<input type='text' placeholder='Введите улицу' name='formStreetFact' id='formStreetFact' class="form-controls" value='<?php echo (isset($cookie_formStreetFact) ? $cookie_formStreetFact : '')?>'></input>
							<hr/>
						</div>
					</div>
	
					<div class="base_part">
					<!-- Почтовый адрес ( нужен только у потребителя)-->
						<div id='filter_address_post'>
							
							<h3>Почтовый адрес потребителя</h3>
							<br>
							<select id='formRegionPost' onchange='address.selectDistrict("Post")' class="form-controls">
								<option value='0'>Выберите область</option>
								<?php foreach($regions as $region):?>
									<option value=<?=$region['id']?> <?php echo (isset($cookie_formRegionPost) ? ($cookie_formRegionPost == $region['id'] ? 'selected' : '') : '') ?>><?=$region['name']?></option>
								<?php endforeach; ?>
							</select>
				
							<select id='formDistrictPost' onchange='address.selectCity("Post")' class="form-controls">
								<option value='0'>Выберите район</option>
								<?php
									if(isset($fltr_DistrictPost)){
										foreach($fltr_DistrictPost as $item_fltr_DistrictPost){
											echo '<option value='.$item_fltr_DistrictPost['id'].' '.(isset($cookie_formDistrictPost) ? ($cookie_formDistrictPost == $item_fltr_DistrictPost['id'] ? 'selected' : '') : '').'>'.$item_fltr_DistrictPost['name'].'</option>';
										}
									}
								?>
							</select>
				
							<select id='formCityPost' class="form-controls">
								<option value='0'>Выберите город</option>
								<?php
									if(isset($fltr_CityPost)){
										foreach($fltr_CityPost as $item_fltr_CityPost){
											echo '<option value='.$item_fltr_CityPost['id'].' '.(isset($cookie_formCityPost) ? ($cookie_formCityPost == $item_fltr_CityPost['id'] ? 'selected' : '') : '').'>'.$item_fltr_CityPost['name'].'</option>';
										}
									}
								?>
							</select>
							
							<input type='text' placeholder='Введите улицу' id="formStreetPost" name="formStreetPost" class="form-controls" value='<?php echo (isset($cookie_formStreetPost) ? $cookie_formStreetPost : '')?>'></input>
							<hr/>
						</div>
					</div>
					
					<div class="base_part">
					<!-- Почтовый адрес Закрепление потребителя за структурным подразделением -->
						<div id='filter_address_post'>
							
							<h3>Закрепление потребителя за структурным подразделением</h3>
							<br>
							<select id='formBranchObject' onchange='address.selectPodrazdelenie("Object")' class="form-controls">
								<option value='0'>Выберите филиал</option>
								<?php foreach($branchs as $branch):?>
									<option value=<?=$branch['id']?> <?php echo (isset($cookie_formBranchObject) ? ($cookie_formBranchObject == $region['id'] ? 'selected' : '') : '') ?>><?=$branch['sokr_name']?></option>
								<?php endforeach; ?>
							</select>
				
							<select id='formPodrazdelenieObject' onchange='address.selectOtdel("Object"), object.usersList()' class="form-controls">
								<option value='0'>Выберите МРО</option>
								<?php
									if(isset($fltr_Podrazdelenie)){
										foreach($fltr_Podrazdelenie as $item_fltr_Podrazdelenie){
											echo '<option value='.$item_fltr_Podrazdelenie['id'].' '.(isset($cookie_formPodrazdelenieObject) ? ($cookie_formPodrazdelenieObject == $item_fltr_Podrazdelenie['id'] ? 'selected' : '') : '').'>'.$item_fltr_Podrazdelenie['sokr_name'].'</option>';
										}
									}
								?>
							</select>
				
							<select id='formOtdelObject' class="form-controls">
								<option value='0'>Выберите РЭГИ</option>
								<?php
									if(isset($fltr_Otdel)){
										foreach($fltr_Otdel as $item_fltr_Otdel){
											echo '<option value='.$item_fltr_Otdel['id'].' '.(isset($cookie_formOtdelObject) ? ($cookie_formOtdelObject == $item_fltr_Otdel['id'] ? 'selected' : '') : '').'>'.$item_fltr_Otdel['sokr_name'].'</option>';
										}
									}
								?>
							</select>
							<input type='text' placeholder='Введите фамилию инспектора' id="formUser" name="formUser" class="form-controls" value='<?php echo (isset($cookie_formUser) ? $cookie_formUser : '')?>'></input>
							<hr/>
						</div>
					</div>
					
				</div>
				
				<!--------- Блок фильтра для объекта --------->	
				<div id='block_for_object'>
					<div class="base_part">
					<!-- Фактический адрес объекта -->
						<div id='filter_address_object'>
							
							<h3>Адрес объекта</h3>
							<br>
							<select id='formRegionObject' onchange='address.selectDistrict("Object")' class="form-controls">
								<option value='0'>Выберите область</option>
								<?php foreach($regions as $region):?>
									<option value=<?=$region['id']?>  <?php echo (isset($cookie_formRegionObject) ? ($cookie_formRegionObject == $region['id'] ? 'selected' : '') : '') ?>><?=$region['name']?></option>
								<?php endforeach; ?>
							</select>
				
							<select id='formDistrictObject' onchange='address.selectCity("Object")' class="form-controls">
								<option value='0'>Выберите район</option>
								<?php
									if(isset($fltr_DistrictObject)){
										foreach($fltr_DistrictObject as $item_fltr_DistrictObject){
											echo '<option value='.$item_fltr_DistrictObject['id'].' '.(isset($cookie_formDistrictObject) ? ($cookie_formDistrictObject == $item_fltr_DistrictObject['id'] ? 'selected' : '') : '').'>'.$item_fltr_DistrictObject['name'].'</option>';
										}
									}
								?>
							</select>
				
							<select id='formCityObject' class="form-controls">
								<option value='0'>Выберите город</option>
								<?php
									if(isset($fltr_CityObject)){
										foreach($fltr_CityObject as $item_fltr_CityObject){
											echo '<option value='.$item_fltr_CityObject['id'].' '.(isset($cookie_formCityObject) ? ($cookie_formCityObject == $item_fltr_CityObject['id'] ? 'selected' : '') : '').'>'.$item_fltr_CityObject['name'].'</option>';
										}
									}
								?>
							</select>
				
							<input type='text' placeholder='Введите улицу' id="formStreetObject" class="form-controls" value='<?php echo (isset($cookie_formStreetObject) ? $cookie_formStreetObject : '')?>'></input>
							<hr/>
						</div>
					</div>
					<div class="base_part">
					<h3>Наименование (фрагмент) потребителя, объекта</h3>
					<br>
						<input type='text' placeholder='Наименование потребителя (фрагмент)' id="formNameSbj" name="formNameSbj" class="form-controls" value='<?php echo (isset($cookie_formNameSbj) ? $cookie_formNameSbj : '')?>'></input>
						<input type='text' placeholder='Наименование объекта (фрагмент)' id="formNameObject" name="formNameObject" class="form-controls" value='<?php echo (isset($cookie_formNameObject) ? $cookie_formNameObject : '')?>'></input>
							<hr/>
					</div>
				</div>
				
				<div class ='nav_buttons'>
					<button class="button_filter" id='apply_filter_object'><span><i class="icon-check-ok"></i></span>Применить</button>
					<button class="button_filter" id='clear_filter_object' onclick="filterMain.clearFilter();"><span><i class="icon-clear"></i></span>Очистить</button>
					<div class='enter_r'>Выводить по <input type='number' name='num_items_on_page' id='num_items_on_page' value='100'></input></div>									
				</div>
				
			</div>	
			</div>
		

			<div class='total_check'>
				Всего: <span id='count_sbj'></span>
			</div>
			</div>

            <table class="main_table">
                <thead>
                <tr>
					<th width="4%">№<br/>п/п</th>
					<th width="6%" class='case_number'>Номер<br/>дела</th>
                    <th width="66%"><span class='rp-r-o'>Наименование</span></th>
					<th width="6%">Просмотр<br/>объектов</th>
					<th width="10%">К объектам<br>(всего)</th>
					<th width="8%">Операции</th>
					
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
			<hr/><ul id='pagination'></ul>

        </div>
		<?php 
			//print_r($_COOKIE);
		?>
    </main>


<!--?php Theme::block('modal/SubjectInfo')?-->
<!--?php Theme::block('modal/ObjectsInfo')?-->
<?php $this->theme->footer(); ?>

<script>
  preloader();
</script>