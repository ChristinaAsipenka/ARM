
var subject = {
    ajaxMethod: 'POST',

    add: function(param) {
		event.preventDefault();
		$("#address_post_block").css({"display":"block"});
        var formData = new FormData();

        /*formData.append('name_up', $('#search').val());*/
		formData.append('name', $('#name_potr').val());
		formData.append('id_unp_head', $('#formUnpHeadId').val());
		formData.append('id_unp', $('#formUnpId').val());
		formData.append('type_property', $('#TypeProperty').val());
		formData.append('type_department', $('#nameDepartment').val());
		formData.append('place_address_index', $('#formIndexFact').val());
		formData.append('place_address_region', $('#formRegionFact').val());
		formData.append('place_address_district', $('#formDistrictFact').val());
		formData.append('place_address_city', $('#formCityFact').val());
		formData.append('place_address_city_zone', $('#formCityZoneFact').val());
		formData.append('place_address_street', $('#formStreetFact').val());
		formData.append('place_address_street_type', $('#spr_type_street_place').val());
		formData.append('place_address_city_type', $('#spr_type_city_place').val());
		formData.append('place_address_building', $('#formBuildingFact').val());
		formData.append('place_address_flat', $('#formFlatFact').val());
		formData.append('copy_postaddress', $('#e_copy_postaddress').val());
		formData.append('post_address_index', $('#formIndexPost').val());
		formData.append('post_address_region', $('#formRegionPost').val());
		formData.append('post_address_district', $('#formDistrictPost').val());
		formData.append('post_address_city', $('#formCityPost').val());
		formData.append('post_address_city_zone', $('#formCityZonePost').val());
		formData.append('post_address_street', $('#formStreetPost').val());
		formData.append('post_address_street_type', $('#spr_type_street_post').val());
		formData.append('post_address_city_type', $('#spr_type_city_post').val());
		formData.append('post_address_building', $('#formBuildingPost').val());
		formData.append('post_address_flat', $('#formFlatPost').val());
		formData.append('type_activity', $('#type_activity').val());
		formData.append('shift_work', $('#shift_work').val());
		
		formData.append('supply_name', $('#dogovor_name').val());
		formData.append('supply_dog_num', $('#dogovor_num').val());
		formData.append('supply_dog_date', $('#dogovor_date').val());
		formData.append('ruk_firstname', $('#dir_fam').val());
		formData.append('ruk_secondname', $('#dir_name').val());
		formData.append('ruk_lastname', $('#dir_otch').val());
		formData.append('ruk_tel', $('#dir_tel').val());
		formData.append('gi_firstname', $('#ing_fam').val());
		formData.append('gi_secondname', $('#ing_name').val());
		formData.append('gi_lastname', $('#ing_otch').val());
		formData.append('gi_tel', $('#ing_tel').val());
		formData.append('ge_firstname', $('#en_fam').val());
		formData.append('ge_secondname', $('#en_name').val());
		formData.append('ge_lastname', $('#en_otch').val());	
		formData.append('ge_tel', $('#en_tel').val());
		formData.append('num_case_s', $('#num_case').val());

		formData.append('spr_branch', $('#formBranchObject').val());
		formData.append('spr_podrazdelenie', $('#formPodrazdelenieObject').val());
		formData.append('spr_otdel', $('#formOtdelObject').val());
		
		formData.append('otv_type_e', $('#otv_type_e').val());
		formData.append('otv_e1', $('#otv_e1_id').val());
		formData.append('otv_e2', $('#otv_e2_id').val());
		formData.append('order_num_e1', $('#order_num_e1').val());
		formData.append('order_num_e2', $('#order_num_e2').val());
		formData.append('order_data_e1', $('#order_data_e1').val());
		formData.append('order_data_e2', $('#order_data_e2').val());
		formData.append('dog_num_e', $('#dog_num_e').val());
		formData.append('dog_data_e', $('#dog_data_e').val());
		formData.append('ins_data_e', $('#instr_data_e').val());
		
		
		formData.append('otv_type_t', $('#otv_type_t').val());
		formData.append('otv_t', $('#otv_t_id').val());
		formData.append('order_num_t', $('#order_num_t').val());
		formData.append('order_data_t', $('#order_data_t').val());
		formData.append('dog_num_t', $('#dog_num_t').val());
		formData.append('dog_data_t', $('#dog_data_t').val());


		formData.append('otv_type_g', $('#otv_type_g').val());
		formData.append('otv_g', $('#otv_g_id').val());
		formData.append('order_num_g', $('#order_num_g').val());
		formData.append('order_data_g', $('#order_data_g').val());
		formData.append('dog_num_g', $('#dog_num_g').val());
		formData.append('dog_data_g', $('#dog_data_g').val());

		error = subject.checkFields();

	if(error == 0){		
      $.ajax({
            url: '/ARM/subject/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
		
			 // console.log(result);
			  if(result === "0"){
				err_text += "<p>Потребитель с таким наименованием уже существует в базе</p>"
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false; 
			  }else{
				if(param == 'cancel'){
					window.location = '/ARM/subject/list/';
				}else if(param == 'continue'){
					 //  console.log(result);
					alert('Данные сохранены');
					window.location = '/ARM/subject/edit/'+result;
				}else if(param == 'new_object'){
					alert('Данные сохранены');
					window.location = '/ARM/objects/create/'+result;
				}
			  }
			  
            }
        });
	}else{
				var err_text = "";
				if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>"
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false;
	};	
    },

    update: function(param) {
		event.preventDefault();
		$("#address_post_block").css({"display":"block"});
        var formData = new FormData();

        formData.append('subject_id', $('#formSubjectId').val());
		formData.append('id_unp_head', $('#formUnpHeadId').val());
		formData.append('id_unp', $('#formUnpId').val());
		formData.append('name', $('#name_potr').val());
		formData.append('type_property', $('#TypeProperty').val());
		formData.append('type_department', $('#nameDepartment').val());
		formData.append('place_address_index', $('#formIndexFact').val());
		formData.append('place_address_region', $('#formRegionFact').val());
		formData.append('place_address_district', $('#formDistrictFact').val());
		formData.append('place_address_city_type', $('#spr_type_city_place').val());
		formData.append('place_address_city', $('#formCityFact').val());
		formData.append('place_address_city_zone', $('#formCityZoneFact').val());
		formData.append('place_address_street', $('#formStreetFact').val());
		formData.append('place_address_street_type', $('#spr_type_street_place').val());
		formData.append('place_address_building', $('#formBuildingFact').val());
		formData.append('place_address_flat', $('#formFlatFact').val());
		
		formData.append('copy_postaddress', $('#e_copy_postaddress').val());
		
		formData.append('post_address_index', $('#formIndexPost').val());
		formData.append('post_address_region', $('#formRegionPost').val());
		formData.append('post_address_district', $('#formDistrictPost').val());
		formData.append('post_address_city', $('#formCityPost').val());
		formData.append('post_address_city_zone', $('#formCityZonePost').val());
		formData.append('post_address_street', $('#formStreetPost').val());
		formData.append('post_address_street_type', $('#spr_type_street_post').val());
		formData.append('post_address_city_type', $('#spr_type_city_post').val());
		formData.append('post_address_building', $('#formBuildingPost').val());
		formData.append('post_address_flat', $('#formFlatPost').val());
		formData.append('type_activity', $('#type_activity').val());
		formData.append('shift_work', $('#shift_work').val());
		
		
		formData.append('supply_name', $('#dogovor_name').val());
		formData.append('supply_dog_num', $('#dogovor_num').val());
		formData.append('supply_dog_date', $('#dogovor_date').val());
		formData.append('ruk_firstname', $('#dir_fam').val());
		formData.append('ruk_secondname', $('#dir_name').val());
		formData.append('ruk_lastname', $('#dir_otch').val());
		formData.append('ruk_tel', $('#dir_tel').val());
		formData.append('gi_firstname', $('#ing_fam').val());
		formData.append('gi_secondname', $('#ing_name').val());
		formData.append('gi_lastname', $('#ing_otch').val());
		formData.append('gi_tel', $('#ing_tel').val());
		formData.append('ge_firstname', $('#en_fam').val());
		formData.append('ge_secondname', $('#en_name').val());
		formData.append('ge_lastname', $('#en_otch').val());	
		formData.append('ge_tel', $('#en_tel').val());
		/*formData.append('otv_e', $('#Insp_elektro').val());
		formData.append('otv_t', $('#Insp_teplo').val());
		formData.append('otv_g', $('#Insp_gaz').val());*/
		formData.append('num_case_s', $('#num_case').val());

		formData.append('spr_branch', $('#formBranchObject').val());
		formData.append('spr_podrazdelenie', $('#formPodrazdelenieObject').val());
		formData.append('spr_otdel', $('#formOtdelObject').val());
		
		
		formData.append('otv_type_e', $('#otv_type_e').val());
		formData.append('otv_e1', $('#otv_e1_id').val());
		formData.append('otv_e2', $('#otv_e2_id').val());
		formData.append('order_num_e1', $('#order_num_e1').val());
		formData.append('order_num_e2', $('#order_num_e2').val());
		formData.append('order_data_e1', $('#order_data_e1').val());
		formData.append('order_data_e2', $('#order_data_e2').val());
		formData.append('dog_num_e', $('#dog_num_e').val());
		formData.append('dog_data_e', $('#dog_data_e').val());
		formData.append('ins_data_e', $('#instr_data_e').val());
		
		
		formData.append('otv_type_t', $('#otv_type_t').val());
		formData.append('otv_t', $('#otv_t_id').val());
		formData.append('order_num_t', $('#order_num_t').val());
		formData.append('order_data_t', $('#order_data_t').val());
		formData.append('dog_num_t', $('#dog_num_t').val());
		formData.append('dog_data_t', $('#dog_data_t').val());


		formData.append('otv_type_g', $('#otv_type_g').val());
		formData.append('otv_g', $('#otv_g_id').val());
		formData.append('order_num_g', $('#order_num_g').val());
		formData.append('order_data_g', $('#order_data_g').val());
		formData.append('dog_num_g', $('#dog_num_g').val());
		formData.append('dog_data_g', $('#dog_data_g').val());
		
		
		error = subject.checkFields();

		if(error == 0){		

			$.ajax({
				url: '/ARM/subject/update/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log(result);
				 if(result === "0"){
					err_text += "<p>Потребитель с таким наименованием уже существует в базе</p>"
					$('#messenger').hide().fadeIn(500).html(err_text);
					return false; 
				  }else{
						if(param == 'cancel'){
							//window.location = '/ARM/subject/list/';
							window.history.back();
						}else if(param == 'continue'){
						 //  console.log(result);
							alert('Данные сохранены');
							window.location = '/ARM/subject/edit/'+$('#formSubjectId').val();
						}else if(param == 'new_object'){
							alert('Данные сохранены');
							window.location = '/ARM/objects/create/'+$('#formSubjectId').val();
						}
					}
				}
			});
		}else{
				var err_text = "";
				if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>"
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false;
		};	
    },
	
	checkFields: function(){
		if($("#formPage").attr("mode") == "new_subject" || $("#formPage").attr("mode") == "edit_subject"){
			var fields = ["name_potr", "TypeProperty", "nameDepartment", "formUnpId"];
		}
	
		var error = 0; // флаг заполнения обязательных полей

		 $(".form").find(":input").each(function(){ // проверяем каждое поле формы
			 for(var i = 0; i < fields.length; i++){  // проходимся в цикле по массиву обязательных полей
				if($(this).attr("name") == fields[i]){	// если проверяемое поле есть в списке обязательных
				
					if(!$.trim( $(this).val() ) ){      // если поле не заполнено
						 $(this).addClass("formError");
						 error = 1;
					}else{
						 $(this).removeClass("formError");
					}	
				}
				
			 }
		});
		$(".form").find("select").each(function(){ // проверяем каждое поле формы
	
			 for(var i = 0; i < fields.length; i++){  // проходимся в цикле по массиву обязательных полей
				if($(this).attr("name") == fields[i]){	// если проверяемое поле есть в списке обязательных
					if( $(this).val() == 0 ){      // если поле не заполнено
						 $(this).addClass("formError");
						 error = 1;
					}else{
						 $(this).removeClass("formError");
					}	
				}
			 }
			 
		});
		return error ;
	},
	
	

	remove: function(itemId) {
       
	    if(!confirm('Вы действительно хотите удалить данного потребителя?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('item_id', itemId);
	  
	    if (itemId < 1) {
            return false;
        }
	  
	  
	  
			$.ajax({
				url: '/ARM/subject/removeItem/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log(result);
					$('.item-' + itemId).remove();
				}
			});
	


	},
	
	subjectInfo: function(subjectId){
		
		var formData = new FormData();
		formData.append('subject_id', subjectId);
		
		$.ajax({
				url: '/ARM/subject/info/'+subjectId,
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log(result);
					data = $.parseJSON(result);
					//
					//Номер дела
					$('#delo_new').html(data['subject']['id']);
					//Номер дела по старой нумерации
					$('#delo').html($(data['subject']['num_case_s']).length > 0 ? data['subject']['num_case_s'] : "-");
					
					$('#name_subj').html(data['subject']['name']);
					//Юридическое лицо
					$('#id_unp').html(data['unp'] != null ? '('+data['unp']['unp']+') '+ data['unp']['name']: "");
					//Вышестоящая организация:
					$('#id_unp_head').html(data['unp_head'] != null ? '('+data['unp_head']['unp']+') '+data['unp_head']['name'] : "-");
					//Форма собственности
					$('#property').html(data['properties']['name']);
					//Ведомственная принадлежность
					$('#department').html(data['departments']['name_ved']);
					
					//Основной вид деятельности
					$('#unp_type_act').html((!(data['spr_kind_of_activity']) ? '-' : data['spr_kind_of_activity']['name']));
					//Сменность работ
					$('#unp_shift_work').html(!data['spr_shift_of_work'] ? '-' : data['spr_shift_of_work']['name']);
					//Наименование
					$('#id_unp_name_main').html(data['subject']['name']);					
					
					//Закрепление потребителя
					$('#unp_zakrep').html((data['subject']['spr_branch'] > 0 ? data['branches']['sokr_name']+", " : "")+(data['subject']['spr_podrazdelenie'] > 0 ? data['podrazdelenieses']['sokr_name']+", ": "")+(data['subject']['spr_otdel'] > 0 ? data['otdelses']['sokr_name']: ""));
					

					
					//Фактический адрес
					$('#place_adress').html(((data['subject']['place_address_index']).length > 0 ? data['subject']['place_address_index']+", " : "")+(data['regions'] != null ? data['regions']['name']+", " : "")+(data['districts'] != null ? data['districts']['name']+" р-н, " : "")+(data['spr_type_city'] != null ? data['spr_type_city']['name'] : "")+(data['cities'] != null ? data['cities']['name']+", " : "")+(data['citiesZone'] != null ? data['citiesZone']['name']+", " : "")+((data['subject']['place_address_street']).length > 0 ? data['subject']['place_address_street'] : "")+((data['subject']['place_address_building']).length > 0 ? "-"+data['subject']['place_address_building'] : "")+((data['subject']['place_address_flat']).length > 0 ? "-"+data['subject']['place_address_flat'] : ""));					
					
					//Почтовый адрес
					$('#post_adress').html(((data['subject']['post_address_index']).length > 0 ? data['subject']['post_address_index']+", " : "")+(data['regionsPost'] != null ? data['regionsPost']['name']+", " : "")+(data['districtsPost'] != null ? data['districtsPost']['name']+" р-н, " : "")+(data['citiesPost'] != null ? data['citiesPost']['name']+", " : "")+(data['citiesZonePost'] != null ? data['citiesZonePost']['name']+", " : "")+((data['subject']['post_address_street']).length > 0 ? data['subject']['post_address_street'] : "")+((data['subject']['post_address_building']).length > 0 ? "-"+data['subject']['post_address_building'] : "")+((data['subject']['post_address_flat']).length > 0 ? "-"+data['subject']['post_address_flat'] : ""));
					
					//Договор с энергоснабжающей организацией электрической энергии
					$('#supply_dog').html((!(data['subject']['supply_name']) ? "-" : data['subject']['supply_name'])+(!(data['subject']['supply_dog_num']) ? "" : " (№ "+data['subject']['supply_dog_num'])+(data['subject']['supply_dog_date']!= null ? " от "+data['subject']['supply_dog_date'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1")+")": ""));
					
					//Руководитель организации
					$('#ruk').html(((data['subject']['ruk_firstname']).length > 0  ? data['subject']['ruk_firstname'] : "-") +" "+data['subject']['ruk_secondname'] +" "+data['subject']['ruk_lastname'] +((data['subject']['ruk_tel']).length > 0 ? " (тел.: "+data['subject']['ruk_tel']+")" : ""));
					

					//Главный инженер
					$('#gi').html(((data['subject']['gi_firstname']).length > 0  ? data['subject']['gi_firstname'] : "-") +" "+data['subject']['gi_secondname'] +" "+data['subject']['gi_lastname'] +((data['subject']['gi_tel']).length > 0 ? " (тел.: "+data['subject']['gi_tel']+")" : ""));					
					
					//Главный энергетик
					$('#ge').html(((data['subject']['ge_firstname']).length > 0  ? data['subject']['ge_firstname'] : "-") +" "+data['subject']['ge_secondname'] +" "+data['subject']['ge_lastname'] +((data['subject']['ge_tel']).length > 0 ? " (тел.: "+data['subject']['ge_tel']+")" : ""));	

					//Ответственный за электрохозяйство
					$('#resp_o_e').html((data['subject']['otv_e1'] > 0 && data['subject']['otv_e1'] != null) ? data['resp_e']['secondname'] +" "+data['resp_e']['firstname'] +" "+data['resp_e']['lastname'] + " ("+data['resp_e']['ruk_tel']+", "+data['resp_e']['post']+")" : " - ");
					//Ответственный за электрохозяйство(заместитель):
					$('#resp_o_e_zam').html(data['subject']['otv_e2'] > 0 ? data['resp_e_zam']['secondname'] +" "+data['resp_e_zam']['firstname'] +" "+data['resp_e_zam']['lastname'] + " ("+data['resp_e_zam']['ruk_tel']+", "+data['resp_e_zam']['post']+")" : " - ");
					//Ответственный за тепловое хозяйство:
					$('#resp_o_t').html(data['subject']['otv_t1'] > 0 ? data['resp_t']['secondname'] +" "+data['resp_t']['firstname'] +" "+data['resp_t']['lastname'] + " ("+data['resp_t']['ruk_tel']+", "+data['resp_t']['post']+")" : " - ");
					//Ответственный за газовое хозяйство:
					$('#resp_o_g').html(data['subject']['otv_g1'] > 0 ? data['resp_g']['secondname'] +" "+data['resp_g']['firstname'] +" "+data['resp_g']['lastname'] + " ("+data['resp_g']['ruk_tel']+", "+data['resp_g']['post']+")" : " - ");





					//
					/*$('#insp_t').html(data['usersTeplo'] != null ? data['usersTeplo']['fio'] : "");
					$('#insp_e').html(data['usersElectro'] != null ? data['usersElectro']['fio'] : "");
					$('#insp_g').html(data['usersGaz'] != null ? data['usersGaz']['fio'] : "");*/
					
					//Объекты потребителя и закрепленные за ними инспектора
					str_table_insp = '';
					$.each(data['objects'], function(i,val){
						
						str_table_insp =str_table_insp+"<tr><td onclick=\"modalWindow.openModal('openModalObjectsInfo'); object.objectInfo("+val['id']+")\" class='card_href'>"+ (val['reestr_object_name'] != null ? val['reestr_object_name'] : 'не закреплен') +"</td><td>"+(val['users_fio_e'] != null ? val['users_fio_e'] : 'не закреплен')+"</td><td>"+(val['users_fio_t'] != null ? val['users_fio_t'] : 'не закреплен')+"</td><td>"+(val['users_fio_ti'] != null ? val['users_fio_ti'] : 'не закреплен')+"</td><td>"+(val['users_fio_g'] != null ? val['users_fio_g'] : 'не закреплен')+"</td></tr>";
					})
					$(".objects_list tbody").html(str_table_insp);
					
					
					//Сведения о режиме электропотребления
					str_table_bron = '';
					$.each(data['objects_bron'], function(i,val){						
						
						str_table_bron =str_table_bron+"<tr><td onclick=\"modalWindow.openModal('openModalObjectsInfo'); object.objectInfo("+val['id']+")\" class='card_href'>"+ (val['reestr_object_name'] != null ? val['reestr_object_name'] : '-')+"</td><td>"+(val['e_armor_crach'] != null ? val['e_armor_crach'] : '-') +"</td><td>"+(val['e_armor_tech'] != null ? val['e_armor_tech'] : '-')+"</td><td>"+(val['e_armor_time'] != null ? val['e_armor_time'] : '-')+"</td><td>"+(val['e_armor_date']!= null ? val['e_armor_date'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '-')+"</td></tr>"
					})
					$(".bron_list tbody").html(str_table_bron);					
					
					//Аварийная и технологическая броня теплоснабжения
					str_table_bron_teplo = '';
					$.each(data['objects_bron_teplo'], function(i,val){
						
						str_table_bron_teplo =str_table_bron_teplo+"<tr><td onclick=\"modalWindow.openModal('openModalObjectsInfo'); object.objectInfo("+val['id']+")\" class='card_href'>"+ (val['reestr_object_name'] != null ? val['reestr_object_name'] : '-')+"</td><td>"+(val['t_armor_crach'] != null ? val['t_armor_crach'] : '-') +"</td><td>"+(val['t_armor_crach_vapor'] != null ? val['t_armor_crach_vapor'] : '-')+"</td><td>"+(val['t_armor_tech'] != null ? val['t_armor_tech'] : '-')+"</td><td>"+(val['t_armor_tech_vapor'] != null ? val['t_armor_tech_vapor'] : '-')+"</td><td>"+(val['t_armor_time'] != null ? val['t_armor_time'] : '-')+"</td><td>"+(val['t_armor_date']!= null ? val['t_armor_date'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '-')+"</td></tr>"
					})
					$(".bron_list_teplo tbody").html(str_table_bron_teplo);						
					
					
				}
			});
		
	},
	e_copy_postaddress: function(){

		index = $('#formIndexFact').val();
		region = $('#formRegionFact').val();
		
		district = $('#formDistrictFact').val();
		city = $('#formCityFact').val();
		cityzone = $('#formCityZoneFact').val();
		street = $('#formStreetFact').val();
		home = $('#formBuildingFact').val();
		flat = $('#formFlatFact').val();
		

		if($("input[name='e_copy_postaddress']").prop('checked')){
			$("input[name='e_copy_postaddress']").prop('value', 1);
			$("#address_post_block").css({"display":"block"});
		/*	$("input[name='indexPost']").val('');
			$("select[name='regionNamePost'] option[value='0']").prop('selected', true);
			$("select[name='districtNamePost'] option[value='0']").prop('selected', true);
			$("select[name='cityNamePost'] option[value='0']").prop('selected', true);
			$("select[name='cityZoneNamePost'] option[value='0']").prop('selected', true);
			$("input[name='streetNamePost']").val('');
			$("input[name='buildingNumberPost']").val('');
			$("input[name='flatNumberPost']").val('');*/
			$('input[id="formIndexPost"]').prop('disabled', false);
			$('select[id="formRegionPost"]').prop('disabled', false);
			$('select[id="formDistrictPost"]').prop('disabled', false);
			$('select[id="spr_type_city_post"]').prop('disabled', false);
			$('select[id="formCityPost"]').prop('disabled', false);
			$('select[id="formCityZonePost"]').prop('disabled', false);
			$('select[id="spr_type_street_post"]').prop('disabled', false);
			$('input[id="formStreetPost"]').prop('disabled', false);
			$('input[id="formBuildingPost"]').prop('disabled', false);
			$('input[id="formFlatPost"]').prop('disabled', false);			
			$('div[class="tooltip_post"]').css({'display': 'block'});
		
		}else{	
			$("input[name='e_copy_postaddress']").prop('value', 0);
			$("#address_post_block").css({"display":"none"});	
			$('input[id="formIndexPost"]').prop('disabled', true);
			$('select[id="formRegionPost"]').prop('disabled', true);
			$('select[id="formDistrictPost"]').prop('disabled', true);
			$('select[id="spr_type_city_post"]').prop('disabled', true);
			$('select[id="formCityPost"]').prop('disabled', true);
			$('select[id="formCityZonePost"]').prop('disabled', true);
			$('select[id="spr_type_street_post"]').prop('disabled', true);
			$('input[id="formStreetPost"]').prop('disabled', true);
			$('input[id="formBuildingPost"]').prop('disabled', true);
			$('input[id="formFlatPost"]').prop('disabled', true);
			$('div[class="tooltip_post"]').css({'display': 'none'});	
		}
	
		
	},
	
	/*prevPageEdit: function(){
		$('button.btn btn-primary').attr('page','list');
		//$("").attr('page','list');
console.log("here");

	},*/

	pause: function(ms){
		var date = new Date();
		var curDate = null;
		do{curDate = new Date();}
		while(curDate-date < ms);
	},
	clear_fields: function(inputId) {
		event.preventDefault();
		inputNameID = inputId+'Id';
		inputName = inputId;
		$("input[name='"+inputNameID+"']").val(0);
		$("input[name='"+inputName+"']").val(' ');
		$("#"+inputName+"").text('');
		$("textarea[name='"+inputName+"']").val('');
		
	},
	
	create_url: function(attr_spr) {
		event.preventDefault();
		params = attr_spr;

			$.ajax({
                    type: "POST",
                    url: '/ARM/guides/list/',
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
								$("select#formRegionFact").html(str_option);	
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
                    url: '/ARM/View/modal/modal_Guides.php',
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
$(window).ready(function() {
	$('#name_potr').change(function(){
		$(this).val($(this).val().replace(/\s+/g,' '));
	})
});
$(window).load(function() {


/*******************************Скрываем/открываем поля почтового адреса в зависимости от того стоит ли галочка почтовый адрес не совпадает с фактическим******************************/
	if($("#e_copy_postaddress").val() == 0){
		$('input[id="formIndexPost"]').prop('disabled', true);
		$('select[id="formRegionPost"]').prop('disabled', true);
		$('select[id="formDistrictPost"]').prop('disabled', true);
		$('select[id="spr_type_city_post"]').prop('disabled', true);
		$('select[id="formCityPost"]').prop('disabled', true);
		$('select[id="formCityZonePost"]').prop('disabled', true);
		$('select[id="spr_type_street_post"]').prop('disabled', true);
		$('input[id="formStreetPost"]').prop('disabled', true);
		$('input[id="formBuildingPost"]').prop('disabled', true);
		$('input[id="formFlatPost"]').prop('disabled', true);
		$('div[class="tooltip_post"]').css({'display': 'none'});
	}else{
		$('input[id="formIndexPost"]').prop('disabled', false);
		$('select[id="formRegionPost"]').prop('disabled', false);
		$('select[id="formDistrictPost"]').prop('disabled', false);
		$('select[id="spr_type_city_post"]').prop('disabled', false);
		$('select[id="formCityPost"]').prop('disabled', false);
		$('select[id="formCityZonePost"]').prop('disabled', false);
		$('select[id="spr_type_street_post"]').prop('disabled', false);
		$('input[id="formStreetPost"]').prop('disabled', false);
		$('input[id="formBuildingPost"]').prop('disabled', false);
		$('input[id="formFlatPost"]').prop('disabled', false);
		$('div[class="tooltip_post"]').css({'display': 'block'});
	}

	$('#allSubjects').html($('.main_table tbody tr').length);
});	