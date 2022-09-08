<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-subject"></i></span><p>Потребители</p></div>
    <main>
        <div class="container">	
			<div class='sticky_body'>		
			<div class='top_of_page'> 
				<!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title">
					<h5>Поиск</h5>				
					<h3><span><i class="icon-subject">&nbsp</i></span><i class='rp-r-m'>База данных</i></h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/subject/create/" class="button_unp <?php echo (($access_level < 3)? '' : 'disabled');?>"><span><i class="icon-plus"></i></span><i class='rp-i-os'>Новый</i></a>
					<a href="/ARM/basis/subject/list/" class="button_unp"><span><i class="icon-pin"></i></span>Мои потребители</a>
					<a href="/ARM/basis/filter/"><button class="button_filter" ><span><i class="icon-list"></i></span><i class='rp-r-ms'>Реестр</i></button></a>
					
				</div>
			</div>
	
			
			<div class='base_part'>
                <div class="search-request">
                    <input id="search" class='field_search form-control' placeholder="Наименование полное, Краткое наименование..." searchdata = "subject"><button class='clear_field'>×</button>
					
					 <!--a href="/ARM/basis/subject/list/" class='btn_eye'></a-->
					</input>
					<ul id='pre-result'></ul>
			   </div>
				
			</div>
			</div>
			<div class='search_request_modal_answer'> 
				<div id='search_result'></div>
			</div>	
			<br><br><br><br>
			<p>*Поиск потребителей и их подразделений. Для вывода списка объектов найдите потребителя за которым они закреплены.</p>
        </div>
    </main>

<!--?php Theme::block('modal/SubjectInfo') ?-->
<!--?php Theme::block('modal/ObjectsInfo') ?-->
<?php $this->theme->footer(); ?>