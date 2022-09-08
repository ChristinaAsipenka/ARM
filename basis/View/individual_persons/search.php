<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-person"></i></span><p>Физ.лица</p></div>
    <main>
        <div class="container">
			<div class="sticky_body">
			<div class='top_of_page'> 
				<!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title">
					<h5>Поиск</h5>				
					<h3><span><i class="icon-person">&nbsp</i></span>База данных физических лиц</h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/individual_persons/create/" class="button_unp  <?php echo ($access_level == 6 ? 'disabled' : '')?>"><span><i class="icon-plus"></i></span>Новое физическое лицо</a>
					<a href="/ARM/basis/individual_persons/reestr/" class="button_unp"><span><i class="icon-list"></i></span>Реестр физ. лиц</a>	
				</div>
			</div>
			
		
			<div class='base_part'>
                <div class="search-request">
                    <input id="search" class='field_search form-control' placeholder="Фамилия..." searchdata = "individual_persons"><button class='clear_field'>×</button>
					</input>
					<ul id='pre-result'></ul>
                </div>

         
			</div>
			</div>
		   	<div class='search_request_modal_answer'> 	
				<div id='search_result'></div>
			</div>
        </div>
    </main>


<?php $this->theme->footer(); ?>