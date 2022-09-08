<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-rp"></i></span><p>Отв.лица</p></div>
    <main>
        <div class="container">		
			<div class='top_of_page'> 
				<!--------------------------------- Информация о странице --------------------------------->
				<div class="page_title">
					<h5>Поиск</h5>				
					<h3><span><i class="icon-rp">&nbsp</i></span>База данных ответственных лиц</h3>
				</div>
				<!--------------------------------- Кнопки навигации ВЕРХНИЕ --------------------------------->
				<div class ='nav_buttons'> 
					<a href="/ARM/basis/personal/create/" class="button_unp  <?php echo (($access_level < 3)? '' : 'disabled');?>" ><span><i class="icon-plus"></i></span>Новое ответственное лицо</a>
					
				</div>
			</div>
	
			<br>
			<div class='base_part'>
			
                <div class="search-request">
                    <input id="search" class='field_search form-control' placeholder=" Фамилия, УНП, наименование полное или краткое ..." searchdata = "personal">
						<button class='clear_field'>×</button>
					</input>
	
					<ul id='pre-result'></ul>
                </div>
				<div id='search_result'>
				</div>
         
           </div>
		   <br><br><br><br>
           <p>* найдите по фамилии или по ЮЛ за которым закреплен сотрудник</p>
        </div>
    </main>

<!--?php Theme::block('modal/SubjectInfo') ?-->
<?php $this->theme->footer(); ?>