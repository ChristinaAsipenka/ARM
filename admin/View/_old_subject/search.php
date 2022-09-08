<?php $this->theme->header(); ?>

    <main>
        <div class="container">
			<div class='top_of_page'> 	<!------ для всех страниц ------->
				
				<div class="page_title"> 	<!------ для всех страниц ------->
					<h5><span><i class="icon-subject"></i></span>&nbspРеестр потребителей</h5>
				</div>
				<div class ='nav_buttons'> <!------ для всех страниц -------> 
					<!--a href='/ARM/admin/subject/create/'>Добавить нового потребителя</a>
					<a href='/ARM/admin/subject/list/'>Список потребителей</a-->
					<?php if($inspection_type == 3 && $access_level < 3){?>
						<a href="/ARM/admin/subject/create/" class="button_unp"><span><i class="icon-plus"></i></span>Новая запись</a>
					<?php }?>
					<a href="/ARM/admin/subject/list/" class="button_unp"><span><i class="icon-list"></i></span>Мои потребители</a>
					<a href="/ARM/admin/filter/"><button class="button_filter" ><span><i class="icon-filter"></i></span>Фильтр</button></a>
				</div>
			</div>
			
	
			
			<div class='base_part'>
                <div class="search-request">
                    <input id="search" class='field_search form-control' placeholder="Наименование полное, Краткое наименование..." searchdata = "subject"><button class='clear_field'>×</button>
					
					 <!--a href="/ARM/admin/subject/list/" class='btn_eye'></a-->
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
<?php $this->theme->footer(); ?>