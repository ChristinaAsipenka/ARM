$(window).ready(function() {
	
	
		$('#fs_inspection_type').change(function(){
		var formData = new FormData();
	    formData.append('spr_cod_branch', $('#fs_branch').val());
		formData.append('spr_cod_podrazd', $('#fs_podrazdelenie').val());
		formData.append('spr_otdel', $('#fs_otdel').val());
		formData.append('id_user', $('#fs_fio').val());
		formData.append('inspection_type', $('#fs_inspection_type').val());

		preloaderStart();
		preloader();
		
		$.ajax({
				url: '/ARM/basis/filter/inspection_type/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
//console.log(result);
					$('.main_table tbody').html(result);
					$('#allSubjects').html($('.main_table tbody tr').length);
				preloaderEnd();	
				}
			});
		
		
	});

	$('#fs_fio').change(function(){
		
		var formData = new FormData();
	    formData.append('id_user', $('#fs_fio').val());
		formData.append('spr_otdel', $('#fs_otdel').val());
		formData.append('arm_group', $('#fs_fio option:selected').attr('arm_gruppa'));
		//console.log($(this).val());
		
		preloaderStart();
		preloader();
		//preloaderEnd();
		

		$.ajax({
				url: '/ARM/basis/filter/filterlist/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				//console.log(result);	
					$('.main_table tbody').html(result);
					$('#allSubjects').html($('.main_table tbody tr').length);
					
					var objects = $('.main_table tbody tr');
					sum_obj_el =0;
					sum_obj_t =0;
					sum_obj_ti =0;
					sum_obj_gaz =0;
					
					
					
					$.each(objects,function(ind, val){
						
					
						if(val.attributes.length > 0){
							obj_el = parseInt(val.attributes['sum_objects_el'].value);
							obj_t = parseInt(val.attributes['sum_objects_t'].value);
							obj_ti = parseInt(val.attributes['sum_objects_ti'].value);
							obj_gaz = parseInt(val.attributes['sum_objects_gaz'].value);
							
							if (isNaN(obj_el)) { obj_el = 0;}
							if (isNaN(obj_t)) { obj_t = 0;}
							if (isNaN(obj_ti)) { obj_ti = 0;}
							if (isNaN(obj_gaz)) { obj_gaz = 0;}
							
							sum_obj_el 	+= obj_el;
							sum_obj_t 	+= obj_t;
							sum_obj_ti 	+= obj_ti;
							sum_obj_gaz += obj_gaz;
						
						}	
					})
					
					
	
					$('#sum_objects_el').html(sum_obj_el);
					$('#sum_objects_t').html(sum_obj_t);
					$('#sum_objects_ti').html(sum_obj_ti);
					$('#sum_objects_gaz').html(sum_obj_gaz);
					
				preloaderEnd();		
				}
			});

	});
	
		
	$('#fs_otdel').change(function(){
		var formData = new FormData();
	    formData.append('spr_otdel', $(this).val());
		formData.append('spr_cod_podrazd', $('#fs_podrazdelenie').val());
		//console.log($(this).val());
		preloaderStart();
		preloader();	
		$.ajax({
				url: '/ARM/basis/filter/users/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				
	
					//$('.main_table tbody').html(result);
					$('#fs_fio').html(result);
				}
			});
		$.ajax({
				url: '/ARM/basis/filter/filterlist/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log(result);
	
					$('.main_table tbody').html(result);
					//$('#fs_fio').html(result);
					$('#allSubjects').html($('.main_table tbody tr').length);
					
					$('#text_info').html('');
					
					var objects = $('.main_table tbody tr');
					sum_obj_el =0;
					sum_obj_t =0;
					sum_obj_ti =0;
					sum_obj_gaz =0;
					
					$.each(objects,function(ind, val){
					if(val.attributes.length > 0){
						obj_el = parseInt(val.attributes['sum_objects_el'].value);
						obj_t = parseInt(val.attributes['sum_objects_t'].value);
						obj_ti = parseInt(val.attributes['sum_objects_ti'].value);
						obj_gaz = parseInt(val.attributes['sum_objects_gaz'].value);
						
						if (isNaN(obj_el)) { obj_el = 0;}
						if (isNaN(obj_t)) { obj_t = 0;}
						if (isNaN(obj_ti)) { obj_ti = 0;}
						if (isNaN(obj_gaz)) { obj_gaz = 0;}
						
						sum_obj_el 	+= obj_el;
						sum_obj_t 	+= obj_t;
						sum_obj_ti 	+= obj_ti;
						sum_obj_gaz += obj_gaz;
					}
						
					})
	
					$('#sum_objects_el').html(sum_obj_el);
					$('#sum_objects_t').html(sum_obj_t);
					$('#sum_objects_ti').html(sum_obj_ti);
					$('#sum_objects_gaz').html(sum_obj_gaz);
					preloaderEnd();	
				}
			});	
	
		
	});
	
	$('#fs_podrazdelenie').change(function(){
		var formData = new FormData();
	    formData.append('spr_cod_podrazd', $(this).val());
		formData.append('spr_cod_branch', $('#fs_branch').val());
		//console.log($(this).val());
		preloaderStart();
		preloader();	
		$.ajax({
				url: '/ARM/basis/filter/otdels/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
			
	
					//$('.main_table tbody').html(result);
					$('#fs_otdel').html(result);
					$("#fs_fio option[value='0']").prop('selected',true);
				}
			});
		$.ajax({
				url: '/ARM/basis/filter/filterlist/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
	
					$('.main_table tbody').html(result);
			
					$('#allSubjects').html($('.main_table tbody tr').length);
					
					$('#text_info').html('');
					
					var objects = $('.main_table tbody tr');
					sum_obj_el =0;
					sum_obj_t =0;
					sum_obj_ti =0;
					sum_obj_gaz =0;
					
					$.each(objects,function(ind, val){
					if(val.attributes.length > 0){
						obj_el = parseInt(val.attributes['sum_objects_el'].value);
						obj_t = parseInt(val.attributes['sum_objects_t'].value);
						obj_ti = parseInt(val.attributes['sum_objects_ti'].value);
						obj_gaz = parseInt(val.attributes['sum_objects_gaz'].value);
						
						if (isNaN(obj_el)) { obj_el = 0;}
						if (isNaN(obj_t)) { obj_t = 0;}
						if (isNaN(obj_ti)) { obj_ti = 0;}
						if (isNaN(obj_gaz)) { obj_gaz = 0;}
						
						sum_obj_el 	+= obj_el;
						sum_obj_t 	+= obj_t;
						sum_obj_ti 	+= obj_ti;
						sum_obj_gaz += obj_gaz;
					}
						
					})
	
					$('#sum_objects_el').html(sum_obj_el);
					$('#sum_objects_t').html(sum_obj_t);
					$('#sum_objects_ti').html(sum_obj_ti);
					$('#sum_objects_gaz').html(sum_obj_gaz);
				preloaderEnd();	
				}
			});	
			

	});
	
	$('#fs_branch').change(function(){
		var formData = new FormData();
	    formData.append('spr_cod_branch', $(this).val());
		
		//console.log($(this).val());
		preloaderStart();
		preloader();	
		$.ajax({
				url: '/ARM/basis/filter/podrazd/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){

					$('#fs_podrazdelenie').html(result);
				}
			});
		$.ajax({
				url: '/ARM/basis/filter/filterlist/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				
	
					$('.main_table tbody').html(result);
			
					$('#allSubjects').html($('.main_table tbody tr').length);
					
					$('#text_info').html('');
					
					var objects = $('.main_table tbody tr');
					sum_obj_el =0;
					sum_obj_t =0;
					sum_obj_ti =0;
					sum_obj_gaz =0;
					
					
					
					$.each(objects,function(ind, val){
				if(val.attributes.length > 0){
						obj_el = parseInt(val.attributes['sum_objects_el'].value);
						obj_t = parseInt(val.attributes['sum_objects_t'].value);
						obj_ti = parseInt(val.attributes['sum_objects_ti'].value);
						obj_gaz = parseInt(val.attributes['sum_objects_gaz'].value);
						
						if (isNaN(obj_el)) { obj_el = 0;}
						if (isNaN(obj_t)) { obj_t = 0;}
						if (isNaN(obj_ti)) { obj_ti = 0;}
						if (isNaN(obj_gaz)) { obj_gaz = 0;}
						
						sum_obj_el 	+= obj_el;
						sum_obj_t 	+= obj_t;
						sum_obj_ti 	+= obj_ti;
						sum_obj_gaz += obj_gaz;
					}
						
					})
	
					$('#sum_objects_el').html(sum_obj_el);
					$('#sum_objects_t').html(sum_obj_t);
					$('#sum_objects_ti').html(sum_obj_ti);
					$('#sum_objects_gaz').html(sum_obj_gaz);
				preloaderEnd();	
				}
			
			
			});	
			
		//window.setTimeout(preloaderEnd, 2500);	
		
	});
	
	
/// ф-ции лоя модального окна припередаче потребителя другому инспектору	
$('#fm_otdel').change(function(){
		var formData = new FormData();
	    formData.append('spr_otdel', $(this).val());
		formData.append('spr_cod_podrazd', $('#fm_podrazdelenie').val());
		//console.log($(this).val());
	
		$.ajax({
				url: '/ARM/basis/filter/users/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				
	
					//$('.main_table tbody').html(result);
					$('#fm_fio').html(result);
				}
			});
	
			
			
		
	});
	
	$('#fm_podrazdelenie').change(function(){
		var formData = new FormData();
	    formData.append('spr_cod_podrazd', $(this).val());
		formData.append('spr_cod_branch', $('#fm_branch').val());
		//console.log($(this).val());
	
		$.ajax({
				url: '/ARM/basis/filter/otdels/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
			
	
					//$('.main_table tbody').html(result);
					$('#fm_otdel').html(result);
					$("#fm_fio option[value='0']").prop('selected',true);
				}
			});
		
			
			
		
	});
	
	$('#fm_branch').change(function(){
		var formData = new FormData();
	    formData.append('spr_cod_branch', $(this).val());
		
		//console.log($(this).val());
	
		$.ajax({
				url: '/ARM/basis/filter/podrazd/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){

					$('#fm_podrazdelenie').html(result);
				}
			});
		
			
		
	});
	

	
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