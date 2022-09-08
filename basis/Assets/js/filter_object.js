$(window).ready(function() {
	
		$('#fo_all_objects').change(function(){

			var formData = new FormData();
			formData.append('id_all_objects', $(this).val());
			formData.append('id_subject', $('#formSubjectId').val());
			formData.append('id_all_objects_napr', $('#fo_all_objects_napr').val());
			
			preloaderStart();
			preloader();	
			
			$.ajax({
					url: '/ARM/basis/filter/filterlistobjects/',
					type: 'POST',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
					
			console.log(result);
						$('.last tbody').html(result);
						$('#Obj_all').html($('.last tbody tr').length);
						/*$('#text_info').html('');*/
						
					preloaderEnd();	
					}

				});	
		});	

		$('#fo_all_objects_napr').change(function(){

			var formData = new FormData();
			formData.append('id_all_objects_napr', $(this).val());
			formData.append('id_subject', $('#formSubjectId').val());
			formData.append('id_all_objects', $('#fo_all_objects').val());
			
			preloaderStart();
			preloader();	
			
			$.ajax({
					url: '/ARM/basis/filter/filterlistobjects/',
					type: 'POST',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
					
			console.log(result);
						$('.last tbody').html(result);
						$('#Obj_all').html($('.last tbody tr').length);
						/*$('#text_info').html('');*/
						
					preloaderEnd();	
					}

				});	
		})	

	
})

function preloaderStart(){

		document.body.insertAdjacentHTML("beforeBegin",'<div class="preloader"><div class="preloader__row"><div class="preloader__item"></div><div class="preloader__item"></div></div></div>');
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