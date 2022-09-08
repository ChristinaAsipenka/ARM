<?php $this->theme->header(); ?>

    <main>
        <div class="container">
			<div class='top_of_page'> 	<!------ для всех страниц ------->
				<div class ='nav_buttons'> <!------ для всех страниц -------> 
					
				</div>
				<div class="page_title"> 	<!------ для всех страниц ------->
					<h5>Найдите потребителя для добавления ему нового объекта или просмотра имеющихся</h5>
				</div>

			</div>
			<div class='base_part'>
                <div class="search-request">
                    <input id="search" class='field_search form-control' placeholder="Наименование потребителя..." searchdata = "subject"><button class='clear_field'>×</button>
					
					 <!--a href="/ARM/admin/objects/create/" class='btn_new_object'></a-->
					</input>
					<ul id='pre-result'></ul>
			   </div>
				<div id='search_result'>
				</div>
			</div>
           
        </div>
    </main>

<?php $this->theme->footer(); ?>