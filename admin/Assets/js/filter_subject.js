$(window).ready(function() {

	$('#fs_fio').change(function(){
		
		var formData = new FormData();
	    formData.append('id_user', $(this).val());
		formData.append('spr_otdel', $('#fs_otdel').val());
		console.log($(this).val());
	
		$.ajax({
				url: '/ARM/filter/filterlist/',
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
				}
			});
			
		
	});
	
	$('#fs_otdel').change(function(){
		var formData = new FormData();
	    formData.append('spr_otdel', $(this).val());
		formData.append('spr_cod_podrazd', $('#fs_podrazdelenie').val());
		//console.log($(this).val());
	
		$.ajax({
				url: '/ARM/filter/users/',
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
				url: '/ARM/filter/filterlist/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					console.log(result);
	
					$('.main_table tbody').html(result);
					//$('#fs_fio').html(result);
					$('#allSubjects').html($('.main_table tbody tr').length);
				}
			});	
			
			
		
	});
	
	$('#fs_podrazdelenie').change(function(){
		var formData = new FormData();
	    formData.append('spr_cod_podrazd', $(this).val());
		formData.append('spr_cod_branch', $('#fs_branch').val());
		//console.log($(this).val());
	
		$.ajax({
				url: '/ARM/filter/otdels/',
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
				url: '/ARM/filter/filterlist/',
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
				}
			});	
			
			
		
	});
	
	$('#fs_branch').change(function(){
		var formData = new FormData();
	    formData.append('spr_cod_branch', $(this).val());
		
		//console.log($(this).val());
	
		$.ajax({
				url: '/ARM/filter/podrazd/',
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
				url: '/ARM/filter/filterlist/',
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
				}
			});	
			
			
		
	});

})