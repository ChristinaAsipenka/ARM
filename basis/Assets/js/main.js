var main = {
    ajaxMethod: 'POST',
	
	create_url: function(attr_spr) {
		event.preventDefault();
		params = attr_spr;

			$.ajax({
                    type: "POST",
                    url: '/ARM/basis/guides/list/',
                    data: { params: params },
                    success: function(data)
                    
					{
                       //console.log(data);
			// Добавление/формирование новой записи в справочнике типы ведомств по кнопке плюс на вкладке потребителей   			   
						   result =  $.parseJSON(data);
							switch(attr_spr){
							case 'spr_department':
								str_option = '<option value="0">Выберите фому собственности</option>';
									$.each(result,function(ind, val){
										if(ind === 'type_property'){
											$.each(val,function(ind1, val1){
												//console.log(val1);
												str_option = str_option + '<option value="'+val1['id']+'">'+val1['name']+'</option>';
											});
										}
									});
								$("select#type_by_department").html(str_option);	
								break;
			// Добавление/формирование новой записи в справочнике районы области по кнопке плюс на вкладке потребителей 				
							case 'spr_district':
								str_option = '<option value="0">Выберите область</option>';
									$.each(result,function(ind, val){
										if(ind === 'region_data'){
											$.each(val,function(ind1, val1){
												str_option = str_option + '<option value="'+val1['id']+'">'+val1['name']+'</option>';
											});
										}
									});
								$("select#region_by_district").html(str_option);	
								break;							
			// Добавление/формирование новой записи в справочнике городов по кнопке плюс на вкладке потребителей 				
							case 'spr_city':
								str_option = '<option value="0">Выберите область</option>';
									$.each(result,function(ind, val){
										if(ind === 'region_data'){
											$.each(val,function(ind1, val1){
												str_option = str_option + '<option value="'+val1['id']+'">'+val1['name']+'</option>';
											});
										}
									});
								$("select#formRegionSpr").html(str_option);	
								break;								
			// Добавление/формирование новой записи в справочнике районов городов по кнопке плюс на вкладке потребителей 				
							case 'spr_city_zone':
								str_option = '<option value="0">Выберите область</option>';
									$.each(result,function(ind, val){
										if(ind === 'region_data'){
											$.each(val,function(ind1, val1){
												str_option = str_option + '<option value="'+val1['id']+'">'+val1['name']+'</option>';
											});
										}
									});
								$("select#formRegionFact").html(str_option);	
								break;							
			// Добавление/формирование новой записи в справочнике административные район по кнопке плюс на вкладке потребителей 				
							case 'spr_admin':
								str_option = '<option value="0">Выберите область</option>';
									$.each(result,function(ind, val){
										if(ind === 'region_data'){
											$.each(val,function(ind1, val1){
												str_option = str_option + '<option value="'+val1['id']+'">'+val1['name']+'</option>';
											});
										}
									});
								$("select#region_by_admin").html(str_option);	
								break;							
			// Добавление/формирование новой записи в справочнике МрО по кнопке плюс на вкладке потребителей   			   
							case 'spr_podrazdelenie':
								str_option = '<option value="0">Выберите филиал</option>';
									$.each(result,function(ind, val){
										if(ind === 'branch_data'){
											$.each(val,function(ind1, val1){
												//console.log(val1);
												str_option = str_option + '<option value="'+val1['id']+'">'+val1['name']+'</option>';
											});
										}
									});
								$("select#podrazdelenie_branch").html(str_option);	
								break;							
			// Добавление/формирование новой записи в справочнике отделов по кнопке плюс на вкладке потребителей   			   
							case 'spr_otdel':
								str_option = '<option value="0">Выберите филиал</option>';
									$.each(result,function(ind, val){
										if(ind === 'branch_data'){
											$.each(val,function(ind1, val1){
												//console.log(val1);
												str_option = str_option + '<option value="'+val1['id']+'">'+val1['name']+'</option>';
											});
										}
									});
								$("select#formBranchObject").html(str_option);	
								break;						
							
							
							

							}
                    }
				
				
				
				
				
				});
		           
				   
				   $.ajax({
                    type: "POST",
                    url: '/ARM/basis/View/modal/modal_Guides.php',
                    data: { params: params },
                    success: function(data)
                    {
                       //console.log(data);
					   $("div[class='modalDialog_guidesfromSubject']").html(data);
					   $("div#openModalGuides").css({'display': 'block'});
						
                    }
				});
	
	}
};	
/********************************************** живой поиск ****************************************************************************/		
		$("#search_table").keyup(function(){
		_this = this;
   
			$.each($(".main_table tbody tr"), function() {
		
			if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
			   
			   $(this).hide();
			} else {

				$(this).show(); 
			}
		
			});
		 });
		
		
		$("#search_table").keyup(function(){
		_this = this;		
			$.each($(".cwdtable tbody tr"), function() {
		
			if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
			   
			   $(this).hide();
			} else {

				$(this).show(); 
			}
		
			});		
		
		
		
    });
	
	$(document).ready(function() {
	  
	 /* $("a[target='_blank']").click(function(){
		
		preloaderEnd();
		
	  });*/
		
	  
	  $(window).scroll(function() {    
		var scroll = $(window).scrollTop();

		if (scroll >= 30) {
		  $("#masthead").addClass("scrolled");
		} else {
		  $("#masthead").removeClass("scrolled");
		}

	  });
	  
	  
	  $(window).load(function() {    

		
		$("a").attr("onclick","preloaderStart()");
		$("a[target='_blank']").attr("onclick","");
		$("a[target='new_blank']").attr("onclick","");
		$("a[class='accordion-titulo']").attr("onclick","");
		$("a[class='download_doc']").attr("onclick","");
		
		
			var tech = window.location.search.replace( '?', '').split('=').pop();; 
			if(tech == 'subject_info'){
				$(".page_title h5").html("!!! <span class='rp-p-o'>Просмотр информации о</span> в защищенном режиме !!!");
				$(".page_title h5").addClass("h5info");
				$("#formPage select").prop('disabled', true);
				$("#formPage input").prop('disabled', true);
				$("#formPage textarea").prop('disabled', true);
				$("#formPage button").css({'display': 'none'});
				//$("#formPage a").css({'pointer-events': 'none'});
				$(".w4").css({'width': '0'});
				$(".nav_buttons").css({'display': 'none'});
				$(".page_title_footer").css({'display': 'block'});
				$(".page_title_footer h5").addClass("h5info_footer");
				$(".page_title_footer h5").html("!!! <span class='rp-p-o'>Просмотр информации о</span> в защищенном режиме !!!");
				$(".OnOff").css({'display': 'none'});
			}else if(tech == 'object_info'){
				$(".page_title h5").html("!!! Просмотр информации об объекте в защищенном режиме !!!");
				$(".page_title h5").addClass("h5info");
				$(".page_title_footer").css({'display': 'block'});
				$(".page_title_footer h5").addClass("h5info_footer");
				$(".page_title_footer h5").html("!!! Просмотр информации об объекте в защищенном режиме !!!");
				$("#formPage select").prop('disabled', true);
				$("#formPage input").prop('disabled', true);
				$("#formPage textarea").prop('disabled', true);
				$("#formPage button").css({'display': 'none'});
				/*$("#formPage a").css({'pointer-events': 'none'});*/
				$(".nav_buttons").css({'display': 'none'});
				$(".calc_units").css({'display': 'none'});
				$('#formPage input[id="tab1"]').prop('disabled', false);
				$('#formPage input[id="tab2"]').prop('disabled', false);
				$('#formPage input[id="tab3"]').prop('disabled', false);
				$('#formPage input[id="tab4"]').prop('disabled', false);
				$('#formPage input[id="tab5"]').prop('disabled', false);
				$('#uzel_teplo input').prop('disabled', false);
			}else if(tech == 'unp_info'){
				$(".page_title h5").html("!!! Просмотр информации об юридическом лице и ИП в защищенном режиме !!!");
				$(".page_title h5").addClass("h5info");
				$(".page_title_footer").css({'display': 'block'});
				$(".page_title_footer h5").addClass("h5info_footer");
				$(".page_title_footer h5").html("!!! Просмотр информации об юридическом лице и ИП в защищенном режиме !!!");
				$("#formPage select").prop('disabled', true);
				$("#formPage input").prop('disabled', true);
				$("#formPage textarea").prop('disabled', true);
				$("#formPage button").css({'display': 'none'});
				/*$("#formPage a").css({'pointer-events': 'none'});*/
				$(".nav_buttons").css({'display': 'none'});
				$(".calc_units").css({'display': 'none'});
				$('#formPage input[id="tab1"]').prop('disabled', false);
				$('#formPage input[id="tab2"]').prop('disabled', false);
				$('#formPage input[id="tab3"]').prop('disabled', false);
				$('#formPage input[id="tab4"]').prop('disabled', false);
				$('#formPage input[id="tab5"]').prop('disabled', false);
				$('#uzel_teplo input').prop('disabled', false);
			}else if(tech == 'individual_persons_info'){
				$(".page_title h5").html("!!! Просмотр информации о физическом лице в защищенном режиме !!!");
				$(".page_title h5").addClass("h5info");
				$(".page_title_footer").css({'display': 'block'});
				$(".page_title_footer h5").addClass("h5info_footer");
				$(".page_title_footer h5").html("!!! Просмотр информации о физическом лице в защищенном режиме !!!");
				$("#formPage select").prop('disabled', true);
				$("#formPage input").prop('disabled', true);
				$("#formPage textarea").prop('disabled', true);
				$("#formPage button").css({'display': 'none'});
				/*$("#formPage a").css({'pointer-events': 'none'});*/
				$(".nav_buttons").css({'display': 'none'});
				$(".calc_units").css({'display': 'none'});
				$('#formPage input[id="tab1"]').prop('disabled', false);
				$('#formPage input[id="tab2"]').prop('disabled', false);
				$('#formPage input[id="tab3"]').prop('disabled', false);
				$('#formPage input[id="tab4"]').prop('disabled', false);
				$('#formPage input[id="tab5"]').prop('disabled', false);
				$('#uzel_teplo input').prop('disabled', false);
			}else if(tech == 'responsible_persons_info'){
				$(".page_title h5").html("!!! Просмотр информации об ответственном лице в защищенном режиме !!!");
				$(".page_title h5").addClass("h5info");
				$(".page_title_footer").css({'display': 'block'});
				$(".page_title_footer h5").addClass("h5info_footer");
				$(".page_title_footer h5").html("!!! Просмотр информации об ответственном лице в защищенном режиме !!!");
				$("#formPage select").prop('disabled', true);
				$("#formPage input").prop('disabled', true);
				$("#formPage textarea").prop('disabled', true);
				$("#formPage button").css({'display': 'none'});
				/*$("#formPage a").css({'pointer-events': 'none'});*/
				$(".nav_buttons").css({'display': 'none'});
				$(".calc_units").css({'display': 'none'});
				$('#formPage input[id="tab1"]').prop('disabled', false);
				$('#formPage input[id="tab2"]').prop('disabled', false);
				$('#formPage input[id="tab3"]').prop('disabled', false);
				$('#formPage input[id="tab4"]').prop('disabled', false);
				$('#formPage input[id="tab5"]').prop('disabled', false);
				$('#uzel_teplo input').prop('disabled', false);
			}






			
			
			
	  });	
	  

  $(".accordion-titulo").click(function(e){
           
        e.preventDefault();
    
        var contenido=$(this).next(".accordion-content");

        if(contenido.css("display")=="none"){ //open		
          contenido.slideDown(250);			
          $(this).addClass("open");
        }
        else{ //close		
          contenido.slideUp(250);
          $(this).removeClass("open");	
        }

      });	  
	  
	  
	  
});

function preloaderStart(){

		document.body.insertAdjacentHTML("beforeBegin",'<div class="preloader"><div class="preloader__row"><div class="preloader__item"></div><div class="preloader__item"></div></div></div>');
		preloader();

}

function preloader(){

		document.body.classList.add('loaded_hiding');
		window.setTimeout(function () {
		document.body.classList.add('loaded');
		document.body.classList.remove('loaded_hiding');    
		}, 500);

}

function preloaderEnd(){

		let elem = document.querySelector('.preloader');
		elem.remove();
}



