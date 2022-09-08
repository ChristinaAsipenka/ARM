$(document).ready(function(){
	$('.rp_result').click(function(){
		$('input#id_rp').val($(this).attr('id_rp'));
		id_rp = $(this).attr('id_rp');
		
		var sbj_list = `
			<div id="container-main">
				<div class="accordion-container">
					<div type="button" class="accordion-titulo">
						&nbsp;за электрохозяйство (собственный)
						<span class="toggle-icon"></span>
					</div>
				</div>
			</div>
		`;
		
		$.ajax({
            url: '/ARM/examination/responsible_persons/info/'+id_rp,
            type: 'POST',
			//  data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			data = $.parseJSON(result);
			
			//console.log(data);
			
			$('input#resp_pers_id').val(id_rp);
			$('span#name_unp').text(data['unp']['unp']+' '+data['unp']['name_short']);
			$('input#formUnpId').val(data['unp']['id']);
			//$('button.btnHideBlock').hide();
			
			$('button.test_update_rp').css('display','block');	
			
			$('input[name=resp_pers_secondname]').val(data['responsible_persons']['secondname']);
			$('input[name=resp_pers_firstname]').val(data['responsible_persons']['firstname']);
			$('input[name=resp_pers_lastname]').val(data['responsible_persons']['lastname']);
			$('input[name=resp_pers_post]').val(data['responsible_persons']['post']);
			$('input[name=resp_pers_post_data]').val(data['responsible_persons']['post_data']);
			$('input[name=resp_pers_tel]').val(data['responsible_persons']['tel']);
			$('input[name=resp_pers_email]').val(data['responsible_persons']['email']);
			
			
			post_year = parseInt(data['responsible_persons']['post_data'].slice(0, 4));
			post_month = parseInt(data['responsible_persons']['post_data'].slice(5, 7));
			post_day = parseInt(data['responsible_persons']['post_data'].slice(8, 10));
					
			cur_date = new Date();
			
			
			if(post_month > (cur_date.getMonth()+1) || ((cur_date.getMonth()+1) == post_month && post_day > cur_date.getUTCDate()) ){
			
				res_year = cur_date.getFullYear() - post_year - 1;
			}else{
				
				res_year = cur_date.getFullYear() - post_year;
			}
			
			$('input[name=experience_position]').val(res_year);
			
			$.each(data['subjects'], function(i,val){
				//sbj_list = sbj_list + '<p> - '+val['name']+'</p>';
				
				sbj_list = sbj_list + '<div class="accordion-content"><p> - '+val['name']+'</p></div>';
			})
			
			$('#sbj_list').html(sbj_list);
			
			$('#hidden_main_info').show();
		
            }
			
			
        });
		
		
		
	/*	$('input#resp_pers_id').val($(this).attr('id_rp'));
		$('span#name_unp').text($(this).find('span').html());
		//$('button.btnHideBlock').hide();
		
		$('button.test_update_rp').css('display','block');	
		
		$('input[name=resp_pers_secondname]').val($(this).attr('resp_pers_secondname'));
		$('input[name=resp_pers_firstname]').val($(this).attr('resp_pers_firstname'));
		$('input[name=resp_pers_lastname]').val($(this).attr('resp_pers_lastname'));
		$('input[name=resp_pers_post]').val($(this).attr('resp_pers_post'));
		$('input[name=resp_pers_post_data]').val($(this).attr('resp_pers_post_data'));
		$('input[name=resp_pers_tel]').val($(this).attr('resp_pers_tel'));
		$('input[name=resp_pers_email]').val($(this).attr('resp_pers_email'));*/
		
		$('.searchWindow').fadeOut();
		
		$('#search_result').html('');
		$("#search").val('');
	})
	
})