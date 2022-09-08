<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-unp"></i></span><p>ЮЛ и ИП</p></div>
<main>
    <div class="container">
		<div class='sticky_body'>
			<div class='top_of_page'> 
				<!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title">
					<h5>Поиск</h5>				
					<h3><span><i class="icon-unp">&nbsp</i></span>База данных юридических лиц и ИП</h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/unp/create/" class="button_unp <?php echo ($access_level == 6 ? 'disabled' : '')?>" ><span><i class="icon-plus"></i></span>Новое ЮЛ или ИП</a>
					<a href="/ARM/basis/unp/list/" class="button_unp"><span><i class="icon-list"></i></span>Реестр ЮЛ и ИП</a>	
				</div>
			</div>
			<div class='base_part'>
                <div class="search-request">
                    <input id="search" class='field_search form-control' placeholder="УНП, наименование полное или краткое..." searchdata = "unp"><button class='clear_field'>×</button>
					<!--a href="/ARM/basis/unp/list/" class='btn_eye'></a-->
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
<!---?php Theme::block('modal/SubjectInfo') ?-->
<!--?php Theme::block('modal/ObjectsInfo') ?-->
<!--?php Theme::block('modal/UnpInfo') ?-->
<?php $this->theme->footer(); ?>