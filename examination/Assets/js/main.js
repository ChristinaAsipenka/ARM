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
	
		$("#search_table_qe").keyup(function(){
		_this = this;		
			$.each($(".questions_electro tbody tr"), function() {
		
			if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
			   
			   $(this).hide();
			} else {

				$(this).show(); 
			}
		
			});		
		
		
		
    });
	
		$("#search_table_gt").keyup(function(){
		_this = this;		
			$.each($(".questions_teplo tbody tr"), function() {
		
			if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
			   
			   $(this).hide();
			} else {

				$(this).show(); 
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

// Accordion
/*
$("body").on('click', function(e){
		//console.log(e.target)
		
		if (e.target.getAttribute('class') == 'accordion-titulo') {
			var el = e.target;
			var contenido = el.parents('#container-main').find(".accordion-content");
			
			console.log(el)

			if(contenido.css("display")=="none"){ //open		
			  contenido.slideDown(250);			
			  $(this).addClass("open");
			}
			else{ //close		
			  contenido.slideUp(250);
			  $(this).removeClass("open");	
			}
		}

});	

*/