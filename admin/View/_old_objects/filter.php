<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="top_of_page"> <!------ для всех страниц ------->

					<div class="page_title"> 	<!------ для всех страниц ------->
						<h5>Фильтр:</h5>
					</div>
					<div class ='nav_buttons'> <!------ для всех страниц -------> 
					<button class="button_filter" id='filterForSubject'><span><i class="icon-filter"></i></span>Фильтр</button>
					<div id='filter_parametrs_text'></div>	
					</div>
				
			</div>
			
	<div id='main_block_filter'>
	<button id='close_filter'>&#215 </button>
	<div id='block_for_subject'>
		<!-- Фактический адрес -->
		<div class="base_part_filter">
			<div id='filter_address_fact'>
				<h6>Фактический адрес</h6>
					<select id='formRegionFact' onchange="address.selectDistrict('Fact')">
						<option value=0>Выберите область</option>
						<?php foreach($regions as $region):?>
							<option value=<?=$region['id']?>><?=$region['name']?></option>
						<?php endforeach; ?>
						
					</select>
					
					<select id='formDistrictFact' onchange="address.selectCity('Fact')">
						<option value=0>Выберите район</option>
					</select>
					
					<select id='formCityFact' onchange="address.selectCityZone('Fact')">
						<option value=0>Выберите населенный пункт</option>
					</select>
					<select id='formCityZoneFact'>
						<option value=0>Выберите район города</option>
					</select>
					<input type='text' placeholder='Введите улицу' name='formStreetFact' id='formStreetFact'></input>
			</div>
		</div>
	
		<div class="base_part_filter">
			<!-- Почтовый адрес ( нужен только у потребителя)-->
			<div id='filter_address_post'>
				<h6>Почтовый адрес потребителя</h6>
				<select id='formRegionPost' onchange='address.selectDistrict("Post")'>
					<option value='0'>Выберите область</option>
					<?php foreach($regions as $region):?>
						<option value=<?=$region['id']?>><?=$region['name']?></option>
					<?php endforeach; ?>
				</select>
				
				<select id='formDistrictPost' onchange='address.selectCity("Post")'>
					<option value='0'>Выберите район</option>
				</select>
				
				
				<select id='formCityPost'>
					<option value='0'>Выберите город</option>
				</select>
				<input type='text' placeholder='Введите улицу' id="formStreetPost"></input>
			</div>
		</div>
		<div class="base_part_filter">
			<!-- Почтовый адрес Закрепление потребителя за структурным подразделением -->
			<div id='filter_address_post'>
				<h6>Закрепление потребителя за структурным подразделением</h6>
				<select id='formBranchObject' onchange='address.selectPodrazdelenie("Object")'>
					<option value='0'>Выберите филиал</option>
					<?php foreach($branchs as $branch):?>
						<option value=<?=$branch['id']?> ><?=$branch['sokr_name']?></option>
					<?php endforeach; ?>
				</select>
				
				<select id='formPodrazdelenieObject' onchange='address.selectOtdel("Object"), object.usersList()'>
					<option value='0'>Выберите МРО</option>
				</select>
				
				<select id='formOtdelObject'>
					<option value='0'>Выберите РЭГИ</option>
				</select>
				
			</div>
		</div>
	</div>
<!--------- Блок фильтра для объекта --------->	
	<div id='block_for_object'>
		<div class="base_part_filter">
			<!-- Фактический адрес объекта -->
			<div id='filter_address_object'>
				<h6>Адрес объекта</h6>
				<select id='formRegionObject' onchange='address.selectDistrict("Object")'>
					<option value='0'>Выберите область</option>
					<?php foreach($regions as $region):?>
						<option value=<?=$region['id']?>><?=$region['name']?></option>
					<?php endforeach; ?>
				</select>
				
				<select id='formDistrictObject' onchange='address.selectCity("Object")'>
					<option value='0'>Выберите район</option>
				</select>
				
				<select id='formCityObject'>
					<option value='0'>Выберите город</option>
				</select>
				<input type='text' placeholder='Введите улицу' id="formStreetObject"></input>
			</div>
		</div>
	</div>
	<label>Выводить по</label>
	<input type='number' name='num_items_on_page' id='num_items_on_page' value='25'></input>
	<button id='clear_filter_object' onclick="filterMain.clearFilter();">Очистить</button>
	<button id='apply_filter_object' >Применить</button>
</div>	
		
			<div class="base_part"> <!------ для всех страниц ------->
				
			

			<p>Всего потребителей: <span id='count_sbj'></span></p>
			<!--p>Всего объектов: <span id='count_obj'></span></p-->
            <table class="main_table">
                <thead>
                <tr>
                   <th class='case_number'>Номер <br/> дела</th>
                    <th>Наименование<br/>(закрепление)</th>
					<th>Просмотр<br/>объектов</th>
					<th>Объекты<br/>(кол-во) </th>
					<th>Операции</th>
					
                </tr>
                </thead>
                <tbody>
              
                </tbody>
            </table>
			<hr/><ul id='pagination'></ul>
			</div>
        </div>
    </main>


<?php Theme::block('modal/SubjectInfo') ?>
<?php Theme::block('modal/ObjectsInfo') ?>
<?php $this->theme->footer(); ?>

