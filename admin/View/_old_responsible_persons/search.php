<?php $this->theme->header(); ?>

    <main>
        <div class="container">
			<div class='top_of_page'> 	<!------ для всех страниц ------->
				
				<div class="page_title"> 	<!------ для всех страниц ------->
					<h5>Ответственные лица</h5>
				</div>
				<div class ='nav_buttons'> <!------ для всех страниц -------> 
					<a href="/ARM/admin/responsible_persons/create/" class="button_unp"><span><i class="icon-plus"></i></span>Новая запись</a>
				</div>
			</div>
			
	
			
			<div class='base_part'>
                <div class="search-request">
                    <input id="search" class='field_search form-control' placeholder="УНП, Наименование полное, Краткое наименование..." searchdata = "responsible_persons"><button class='clear_field'>×</button>
					</input>
					<ul id='pre-result'></ul>
                </div>
				<div id='search_result'>
				</div>
         
           </div>
           
        </div>
    </main>

<?php //Theme::block('modal/SubjectInfo') ?>
<?php $this->theme->footer(); ?>