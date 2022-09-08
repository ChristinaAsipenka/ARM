<?php $this->theme->header(); ?>

    <main>
        <div class="container">
			<div class='top_of_page'> 	<!------ для всех страниц ------->
				<div class="page_title"> 	<!------ для всех страниц ------->
					<h5><span><i class="icon-unp"></i></span>&nbspРеестр юридических лиц</h5>
				</div>
				<div class ='nav_buttons'> <!------ для всех страниц -------> 
					<!--a href='/ARM/admin/unp/create/'>Добавить новый</a-->
					<a href="/ARM/admin/unp/create/" class="button_unp"><span><i class="icon-plus"></i></span>Новая запись</a>
					<a href="/ARM/admin/unp/list/" class="button_unp"><span><i class="icon-list"></i></span>Фильтр</a>
					
					
				</div>
				

				
				
				
			</div>
			<div class='base_part'>
                <div class="search-request">
                    <input id="search" class='field_search form-control' placeholder="УНП, Наименование полное, Краткое наименование..." searchdata = "unp"><button class='clear_field'>×</button>
					<!--a href="/ARM/admin/unp/list/" class='btn_eye'></a-->
					</input>
					<ul id='pre-result'></ul>
                </div>
				<div id='search_result'>
				</div>
         
           </div>
        </div>
    </main>
<?php Theme::block('modal/SubjectInfo') ?>
<?php Theme::block('modal/ObjectsInfo') ?>
<?php Theme::block('modal/UnpInfo') ?>
<?php $this->theme->footer(); ?>