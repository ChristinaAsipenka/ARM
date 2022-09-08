<?php $this->theme->header(); ?>

    <main>
        <div class="container">
				<div class='top_of_page'>
					<div class="page_title"> 	<!------ для всех страниц ------->
						<h5>Список юридических лиц</h5>
						<p>(Всего:<span id='count_unp'><?php echo count($unp);?></span>)</p>
					</div>
					
					
				</div>
				
				<div class="flex nav_block">		
					<!--div class='search_table'>
						<input type="text" class="form-control pull-right" id="search_table" placeholder="Поиск по реестру">
					</div-->
					&nbsp
					<div class ='nav_buttons'>
						<!--a href="/ARM/admin/unp/create/" class="button_unp"><span><i class="icon-plus"></i></span>Новая запись</a-->
						<button class="button_filter" id='filterForUnp'><span><i class="icon-filter"></i></span>Фильтр</button>
					
					</div>
					<div id='main_block_filter'>
<button id='close_filter'>&#215 </button>
	<div id='block_for_unp'>
		<div class="base_part">
			<!-- Фактический адрес -->
			<div id='filter_address_fact'>
				<h6>Адрес</h6>
					<select id='formRegion' onchange="address.selectDistrict()">
						<option value=0>Выберите область</option>
						<?php foreach($regions as $region):?>
										<option value=<?=$region['id']?>><?=$region['name']?></option>
						<?php endforeach; ?>
						
					</select>
					
					<select id='formDistrict' onchange="address.selectCity()">
						<option value=0>Выберите район</option>
					</select>
					
					<select id='formCity' onchange="address.selectCityZone()">
						<option value=0>Выберите населенный пункт</option>
					</select>
					<select id='formCityZone'>
						<option value=0>Выберите район города</option>
					</select>
					<input type='text' placeholder='Введите улицу' name='street_unp' id='street_unp'></input>
			</div>
		</div>
		
		
	<label>Выводить по</label>
	<input type='number' name='num_items_on_page' id='num_items_on_page' value='25'></input>	
	</div>
<!--------- Блок фильтра для потребителя --------->		
	<button id='clear_filter_object' onclick="filterMain.clearFilter();">Очистить</button>
	<button id='apply_filter'>Применить</button>
</div>
				</div>
			
			


            <table class="main_table">
                <thead>
                <tr>

                    <th>УНП</th>
                    <th>Наименование</th>
					<th>Потребители<br/>(кол-во) </th>
					<th>Ответственные лица<br/>(кол-во) </th>
					<th>Операции</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
			<hr/><ul id='pagination'>
	
			</ul>
        </div>
    </main>

<?php Theme::block('modal/SubjectInfo') ?>
<?php Theme::block('modal/UnpInfo') ?>
<?php $this->theme->footer(); ?>