
var subject = {
    ajaxMethod: 'POST',

    add: function(param) {
		event.preventDefault();
		$("#address_post_block").css({"display":"block"});
		
        formData = new FormData();

        /*formData.append('name_up', $('#search').val());*/
		formData.append('name', $('#name_potr').val());
		formData.append('id_unp_head', $('#formUnpHeadId').val());
		formData.append('id_unp', $('#formUnpId').val());
		formData.append('id_ind_pers', $('#formIndPersId').val());
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
		formData.append('custom_name', $('#custom_name').val());
		formData.append('sbj_note', $('#sbj_note').val());
		formData.append('email', $('#email').val());
		
		var strCity = '('+$('#formCityFname option:selected').text()+')';
	
		if($('#name_potr').val().indexOf(strCity) != -1){
			
		
			formData.append('fname_address_region', $('#formRegionFname').val());
			formData.append('fname_address_district', $('#formDistrictFname').val());
			formData.append('fname_address_city', $('#formCityFname').val());
		}
		
		formData.append('type_activity', $('#type_activity').val());
		formData.append('shift_work', $('#shift_work').val());
		
		/*formData.append('supply_name', $('#dogovor_name').val());
		formData.append('supply_dog_num', $('#dogovor_num').val());
		formData.append('supply_dog_date', $('#dogovor_date').val());
		
		formData.append('supply_name_t', $('#dogovor_name_t').val());
		formData.append('supply_dog_num_t', $('#dogovor_num_t').val());
		formData.append('supply_dog_date_t', $('#dogovor_date_t').val());*/
		
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
		
		/********** ответственные за электрохозяйство*********/
		
		formData.append('otv_type_e', $('#otv_type_e').val());
		
										/*** по инструктажу**/
		formData.append('ins_data_e', $('#data_instr_dir').val());
		
										/*** собственный**/
		formData.append('otv_e1', $('#otv_e1_sob').val());
		formData.append('otv_e2', $('#otv_e2_sob').val());
		formData.append('order_num_e1', $('#otv_e1_sob_num_pr').val());
		formData.append('order_num_e2', $('#otv_e2_sob_num_pr').val());
		formData.append('order_data_e1', $('#otv_e1_sob_date_pr').val());
		formData.append('order_data_e2', $('#otv_e2_sob_date_pr').val());		
		
										/*** сторонний**/
		formData.append('otv_e3', $('#otv_e_st').val());								
		formData.append('order_num_e3', $('#otv_e_st_num_pr').val());								
		formData.append('order_data_e3', $('#otv_e_st_date_pr').val());
		formData.append('dog_num_e3', $('#otv_e_st_num_dog').val());
		formData.append('dog_data_e3', $('#otv_e_st_date_dog').val());
		formData.append('dog_data_cont_e3', $('#otv_e_st_date_dog_cont').val());			
										
		/********** ответственные за тепловое хозяйство*********/
		formData.append('otv_type_t', $('#otv_type_t').val());								
										/*** по инструктажу**/								
		formData.append('ins_data_t', $('#data_instr_dir_t').val());								
										/*** собственный**/
										
		formData.append('otv_t1', $('#otv_t1_sob').val());
		formData.append('otv_t2', $('#otv_t2_sob').val());
		formData.append('order_num_t1', $('#otv_t1_sob_num_pr').val());
		formData.append('order_num_t2', $('#otv_t2_sob_num_pr').val());
		formData.append('order_data_t1', $('#otv_t1_sob_date_pr').val());
		formData.append('order_data_t2', $('#otv_t2_sob_date_pr').val());										
										
										/*** сторонний**/
		formData.append('otv_t3', $('#otv_t_st').val());								
		formData.append('order_num_t3', $('#otv_t_st_num_pr').val());								
		formData.append('order_data_t3', $('#otv_t_st_date_pr').val());
		formData.append('dog_num_t3', $('#otv_t_st_num_dog').val());
		formData.append('dog_data_t3', $('#otv_t_st_date_dog').val());
		formData.append('dog_data_cont_t3', $('#otv_t_st_date_dog_cont').val());
		
		
		/*

		formData.append('otv_type_g', $('#otv_type_g').val());
		formData.append('otv_g', $('#otv_g_id').val());
		formData.append('order_num_g', $('#order_num_g').val());
		formData.append('order_data_g', $('#order_data_g').val());
		formData.append('dog_num_g', $('#dog_num_g').val());
		formData.append('dog_data_g', $('#dog_data_g').val());*/
		
		formData.append('sbj_note', $('#sbj_note').val());
		
		formData.append('id_user', $.cookie('id_user'));

		objData = new FormData();
		//objData.append('spr_otdel', $('#formOtdelObject').val());
		objData.append('name', '!!! Начальный объект !!!');
		
		var inspect_type = $.cookie('podrazdelenie');
		//console.log(inspect_type);
		if(inspect_type == 1){
			objData.append('t_insp', $.cookie('id_user'));
			objData.append('t_is', 1);
		}
		
		if(inspect_type == 2){
			objData.append('g_insp', $.cookie('id_user'));
			objData.append('gaz_is', 1);
		}
		
		if(inspect_type == 3){
			objData.append('e_insp', $.cookie('id_user'));
			objData.append('elektro_is', 1);
		}
		
		objData.append('address_index', $('#formIndexFact').val());
		objData.append('address_region', $('#formRegionFact').val());
		objData.append('address_district', $('#formDistrictFact').val());
		objData.append('address_city', $('#formCityFact').val());
		objData.append('address_city_zone', $('#formCityZoneFact').val());
		objData.append('address_street', $('#formStreetFact').val());
		objData.append('address_street_type', $('#spr_type_street_place').val());
		objData.append('address_city_type', $('#spr_type_city_place').val());
		objData.append('address_building', $('#formBuildingFact').val());
		objData.append('address_flat', $('#formFlatFact').val());
		



		$('#subj_dog tbody tr').each(function() {
			formData.append('ids_subj_dog[]', $(this).attr('id_subj_dog'));
		});

		


		error = subject.checkFields();

	if(error == 0){		
      $.ajax({
            url: '/ARM/basis/subject/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
		 console.log(result);
			if(result === "0"){
					err_text += "<p>Потребитель с таким наименованием уже существует в базе</p>"
					$('#messenger').hide().fadeIn(500).html(err_text);
					return false; 
				  }else{
						objData.append('id_reestr_subject', result);
					
						/*if(param != 'cancel'){
							alert('Данные сохранены');
						}*/
						
						subject.createEmptyObj();
						//alert("Создается первый объект потребителя.\nВведите корректные данные в открывшейся вкладке");
						if(param == 'cancel'){
							//window.location = '/ARM/basis/subject/list/';
							$('#openNewObject button.close').attr('onclick','subject.modalNewObj_close("cancel")');
							$('#openNewObject a#first_obj').attr('onclick','subject.modalNewObj_close("cancel")');
						}else if(param == 'continue'){
							 //  console.log(result);
							$('#openNewObject button.close').attr('onclick','subject.modalNewObj_close("continue",'+result+')');
							$('#openNewObject a#first_obj').attr('onclick','subject.modalNewObj_close("continue",'+result+')');
							//window.location = '/ARM/basis/subject/edit/'+result;
						}/*else if(param == 'new_object'){
							
							window.location = '/ARM/basis/objects/create/'+result;
						}	*/			
						

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
	
	modalNewObj_close : function(param, idSbj){
		$('#openNewObject').fadeOut();
		$('#openNewObject_overlay').fadeOut();
		
		if (idSbj == undefined) idSbj = false;
		
		if(param == 'cancel'){
			window.location = '/ARM/basis/subject/list/';
		}else if(param == 'continue'){
			window.location = '/ARM/basis/subject/edit/'+idSbj;
		}
	},
	
	createEmptyObj: function(){
		
		
		
		$.ajax({
            url: '/ARM/basis/objects/addEmpty/',
            type: this.ajaxMethod,
            data: objData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(obj_id){
				//console.log(obj_id);
				
				/*id_obj =obj_id;
				console.log('1: '+id_obj);*/
				
			//	window.open('/ARM/basis/objects/edit/'+obj_id, '_blank', "width=1300,height=800");
				$('#new_sbj_name').html(formData.get('name'));	
				$('#first_obj').attr('href', '/ARM/basis/objects/edit/'+obj_id);
				$('#openNewObject').fadeIn();
				$('#openNewObject_overlay').fadeIn();
            }
        });
	
	
		return false;
		
	},

    update: function(param) {
		event.preventDefault();
		$("#address_post_block").css({"display":"block"});
        var formData = new FormData();

        formData.append('subject_id', $('#formSubjectId').val());
		
		if(oldData.get('formUnpHeadId') != $('#formUnpHeadId').val()){
			formData.append('id_unp_head', $('#formUnpHeadId').val());
		}
		if(oldData.get('formUnpId') != $('#formUnpId').val()){
			formData.append('id_unp', $('#formUnpId').val());
		}
		if(oldData.get('formIndPersId') != $('#formIndPersId').val()){
			formData.append('id_ind_pers', $('#formIndPersId').val());
		}
		if(oldData.get('name_potr') != $('#name_potr').val()){
			formData.append('name', $('#name_potr').val());
		}
		if(oldData.get('TypeProperty') != $('#TypeProperty').val()){
			formData.append('type_property', $('#TypeProperty').val());
		}
		if(oldData.get('nameDepartment') != $('#nameDepartment').val()){
			formData.append('type_department', $('#nameDepartment').val());
		}
		//if(oldData.get('custom_name') != $('#custom_name').val()){
			formData.append('custom_name', $('#custom_name').val());
		//}
		
		if(oldData.get('indexFact') != $('#formIndexFact').val()){
			formData.append('place_address_index', $('#formIndexFact').val());
		}
		if(oldData.get('regionNameFact') != $('#formRegionFact').val()){
			formData.append('place_address_region', $('#formRegionFact').val());
		}
		if(oldData.get('districtNameFact') != $('#formDistrictFact').val()){
			formData.append('place_address_district', $('#formDistrictFact').val());
		}
		if(oldData.get('spr_type_city_place') != $('#spr_type_city_place').val()){
			formData.append('place_address_city_type', $('#spr_type_city_place').val());
		}
		if(oldData.get('cityNameFact') != $('#formCityFact').val()){
			formData.append('place_address_city', $('#formCityFact').val());
		}
		if(oldData.get('cityZoneNameFact') != $('#formCityZoneFact').val()){
			formData.append('place_address_city_zone', $('#formCityZoneFact').val());
		}
		if(oldData.get('streetNameFact') != $('#formStreetFact').val()){
			formData.append('place_address_street', $('#formStreetFact').val());
		}
		
		if(oldData.get('spr_type_street_place') != $('#spr_type_street_place').val()){
			formData.append('place_address_street_type', $('#spr_type_street_place').val());
		}
		if(oldData.get('buildingNumberFact') != $('#formBuildingFact').val()){
			formData.append('place_address_building', $('#formBuildingFact').val());
		}
		if(oldData.get('flatNumberFact') != $('#formFlatFact').val()){
			formData.append('place_address_flat', $('#formFlatFact').val());
		}
		
		
		if(oldData.get('e_copy_postaddress') != $('#e_copy_postaddress').val()){
			formData.append('copy_postaddress', $('#e_copy_postaddress').val());
		}
		
		if(oldData.get('indexPost') != $('#formIndexPost').val()){
			formData.append('post_address_index', $('#formIndexPost').val());
		}
		if(oldData.get('regionNamePost') != $('#formRegionPost').val()){
			formData.append('post_address_region', $('#formRegionPost').val());
		}
		if(oldData.get('districtNamePost') != $('#formDistrictPost').val()){
			formData.append('post_address_district', $('#formDistrictPost').val());
		}
		if(oldData.get('cityNamePost') != $('#formCityPost').val()){
			formData.append('post_address_city', $('#formCityPost').val());
		}
		if(oldData.get('cityZoneNamePost') != $('#formCityZonePost').val()){
			formData.append('post_address_city_zone', $('#formCityZonePost').val());
		}
		if(oldData.get('streetNamePost') != $('#formStreetPost').val()){
			formData.append('post_address_street', $('#formStreetPost').val());
		}
		if(oldData.get('spr_type_street_post') != $('#spr_type_street_post').val()){
			formData.append('post_address_street_type', $('#spr_type_street_post').val());
		}
		if(oldData.get('spr_type_city_post') != $('#spr_type_city_post').val()){
			formData.append('post_address_city_type', $('#spr_type_city_post').val());
		}
		
		if(oldData.get('buildingNumberPost') != $('#formBuildingPost').val()){
			formData.append('post_address_building', $('#formBuildingPost').val());
		}
		if(oldData.get('flatNumberPost') != $('#formFlatPost').val()){
			formData.append('post_address_flat', $('#formFlatPost').val());
		}
		
		if(oldData.get('regionNameFname') != $('#formRegionFname').val()){
			formData.append('fname_address_region', $('#formRegionFname').val());
		}
		
		if(oldData.get('districtNameFname') != $('#formDistrictFname').val()){
			formData.append('fname_address_district', $('#formDistrictFname').val());
		}
		if(oldData.get('cityNameFname') != $('#formCityFname').val()){
			formData.append('fname_address_city', $('#formCityFname').val());
		}
		if(oldData.get('type_activity') != $('#type_activity').val()){
			formData.append('type_activity', $('#type_activity').val());
		}
		if(oldData.get('shift_work') != $('#shift_work').val()){
			formData.append('shift_work', $('#shift_work').val());
		}
		
		/*if(oldData.get('dogovor_name') != $('#dogovor_name').val()){
			formData.append('supply_name', $('#dogovor_name').val());
		}
		if(oldData.get('dogovor_num') != $('#dogovor_num').val()){
			formData.append('supply_dog_num', $('#dogovor_num').val());
		}
		if(oldData.get('dogovor_date') != $('#dogovor_date').val()){
			formData.append('supply_dog_date', $('#dogovor_date').val());
		}
		
		if(oldData.get('dogovor_name_t') != $('#dogovor_name_t').val()){
			formData.append('supply_name_t', $('#dogovor_name_t').val());
		}
		if(oldData.get('dogovor_num_t') != $('#dogovor_num_t').val()){
			formData.append('supply_dog_num_t', $('#dogovor_num_t').val());
		}
		if(oldData.get('dogovor_date_t') != $('#dogovor_date_t').val()){
			formData.append('supply_dog_date_t', $('#dogovor_date_t').val());
		}*/
		
		if(oldData.get('dir_fam') != $('#dir_fam').val()){
			formData.append('ruk_firstname', $('#dir_fam').val());
		}
		if(oldData.get('dir_name') != $('#dir_name').val()){
			formData.append('ruk_secondname', $('#dir_name').val());
		}
		if(oldData.get('dir_otch') != $('#dir_otch').val()){
			formData.append('ruk_lastname', $('#dir_otch').val());
		}
		if(oldData.get('dir_tel') != $('#dir_tel').val()){
			formData.append('ruk_tel', $('#dir_tel').val());
		}
		if(oldData.get('ing_fam') != $('#ing_fam').val()){
			formData.append('gi_firstname', $('#ing_fam').val());
		}
		if(oldData.get('ing_name') != $('#ing_name').val()){
			formData.append('gi_secondname', $('#ing_name').val());
		}
		if(oldData.get('ing_otch') != $('#ing_otch').val()){
			formData.append('gi_lastname', $('#ing_otch').val());
		}
		if(oldData.get('ing_tel') != $('#ing_tel').val()){
			formData.append('gi_tel', $('#ing_tel').val());
		}
		if(oldData.get('en_fam') != $('#en_fam').val()){
			formData.append('ge_firstname', $('#en_fam').val());
		}
		if(oldData.get('en_name') != $('#en_name').val()){
			formData.append('ge_secondname', $('#en_name').val());
		}
		if(oldData.get('en_otch') != $('#en_otch').val()){
			formData.append('ge_lastname', $('#en_otch').val());	
		}
		if(oldData.get('en_tel') != $('#en_tel').val()){
			formData.append('ge_tel', $('#en_tel').val());
		}
		/*formData.append('otv_e', $('#Insp_elektro').val());
		formData.append('otv_t', $('#Insp_teplo').val());
		formData.append('otv_g', $('#Insp_gaz').val());*/
		if(oldData.get('num_case') != $('#num_case').val()){
			formData.append('num_case_s', $('#num_case').val());
		}

		if(oldData.get('branchNameObject') != $('#formBranchObject').val()){
			formData.append('spr_branch', $('#formBranchObject').val());
		}
		if(oldData.get('podrazdelenieNameObject') != $('#formPodrazdelenieObject').val()){
			formData.append('spr_podrazdelenie', $('#formPodrazdelenieObject').val());
		}
	//	if(oldData.get('otdelNameObject') != $('#formOtdelObject').val()){
			formData.append('spr_otdel', $('#formOtdelObject').val());
		//}
	/************** ответственные лица **************/
		if(oldData.get('otv_type_e') != $('#otv_type_e').val()){
			formData.append('otv_type_e', $('#otv_type_e').val());
		}
	
								/******по инструктажу электро****/
		if(oldData.get('data_instr_dir') != $('#data_instr_dir').val()){
			formData.append('ins_data_e', $('#data_instr_dir').val());
		}		

								/******** сторонний  электро*********/
		
		if(oldData.get('otv_e_st') != $('#otv_e_st').val()){
			formData.append('otv_e3', $('#otv_e_st').val());
		}		
		if(oldData.get('otv_e_st_num_pr') != $('#otv_e_st_num_pr').val()){
			formData.append('order_num_e3', $('#otv_e_st_num_pr').val());
		}			
		if(oldData.get('otv_e_st_date_pr') != $('#otv_e_st_date_pr').val()){
			formData.append('order_data_e3', $('#otv_e_st_date_pr').val());
		}		
		if(oldData.get('otv_e_st_num_dog') != $('#otv_e_st_num_dog').val()){
			formData.append('dog_num_e3', $('#otv_e_st_num_dog').val());
		}		
		if(oldData.get('otv_e_st_date_dog') != $('#otv_e_st_date_dog').val()){
			formData.append('dog_data_e3', $('#otv_e_st_date_dog').val());
		}		
		if(oldData.get('otv_e_st_date_dog_cont') != $('#otv_e_st_date_dog_cont').val()){
			formData.append('dog_data_cont_e3', $('#otv_e_st_date_dog_cont').val());
		}			
		
								/********собственный электро*********/		
		if(oldData.get('otv_e1_sob') != $('#otv_e1_sob').val()){
			formData.append('otv_e1', $('#otv_e1_sob').val());
		}
		if(oldData.get('otv_e2_sob') != $('#otv_e2_sob').val()){
			formData.append('otv_e2', $('#otv_e2_sob').val());
		}
		if(oldData.get('otv_e1_sob_num_pr') != $('#otv_e1_sob_num_pr').val()){
			formData.append('order_num_e1', $('#otv_e1_sob_num_pr').val());
		}		
		if(oldData.get('otv_e2_sob_num_pr') != $('#otv_e2_sob_num_pr').val()){
			formData.append('order_num_e2', $('#otv_e2_sob_num_pr').val());
		}		
		if(oldData.get('otv_e1_sob_date_pr') != $('#otv_e1_sob_date_pr').val()){
			formData.append('order_data_e1', $('#otv_e1_sob_date_pr').val());
		}
		if(oldData.get('otv_e2_sob_date_pr') != $('#otv_e2_sob_date_pr').val()){
			formData.append('order_data_e2', $('#otv_e2_sob_date_pr').val());
		}
					/************ТЕПЛОВОЕ ХОЗЯЙСТВО************/
		if(oldData.get('otv_type_t') != $('#otv_type_t').val()){
			formData.append('otv_type_t', $('#otv_type_t').val());
		}								
								/********собственный*********/		
		if(oldData.get('otv_t1_sob') != $('#otv_t1_sob').val()){
			formData.append('otv_t1', $('#otv_t1_sob').val());
		}
		if(oldData.get('otv_t2_sob') != $('#otv_t2_sob').val()){
			formData.append('otv_t2', $('#otv_t2_sob').val());
		}
		if(oldData.get('otv_t1_sob_num_pr') != $('#otv_t1_sob_num_pr').val()){
			formData.append('order_num_t1', $('#otv_t1_sob_num_pr').val());
		}		
		if(oldData.get('otv_t2_sob_num_pr') != $('#otv_t2_sob_num_pr').val()){
			formData.append('order_num_t2', $('#otv_t2_sob_num_pr').val());
		}		
		if(oldData.get('otv_t1_sob_date_pr') != $('#otv_t1_sob_date_pr').val()){
			formData.append('order_data_t1', $('#otv_t1_sob_date_pr').val());
		}
		if(oldData.get('otv_t2_sob_date_pr') != $('#otv_t2_sob_date_pr').val()){
			formData.append('order_data_t2', $('#otv_t2_sob_date_pr').val());
		}					
								/******по инструктажу****/
		if(oldData.get('data_instr_dir_t') != $('#data_instr_dir_t').val()){
			formData.append('ins_data_t', $('#data_instr_dir_t').val());
		}					
								/******** сторонний *********/
		if(oldData.get('otv_t_st') != $('#otv_t_st').val()){
			formData.append('otv_t3', $('#otv_t_st').val());
		}		
		if(oldData.get('otv_t_st_num_pr') != $('#otv_t_st_num_pr').val()){
			formData.append('order_num_t3', $('#otv_t_st_num_pr').val());
		}			
		if(oldData.get('otv_t_st_date_pr') != $('#otv_t_st_date_pr').val()){
			formData.append('order_data_t3', $('#otv_t_st_date_pr').val());
		}		
		if(oldData.get('otv_t_st_num_dog') != $('#otv_t_st_num_dog').val()){
			formData.append('dog_num_t3', $('#otv_t_st_num_dog').val());
		}		
		if(oldData.get('otv_t_st_date_dog') != $('#otv_t_st_date_dog').val()){
			formData.append('dog_data_t3', $('#otv_t_st_date_dog').val());
		}		
		if(oldData.get('otv_t_st_date_dog_cont') != $('#otv_t_st_date_dog_cont').val()){
			formData.append('dog_data_cont_t3', $('#otv_t_st_date_dog_cont').val());
		}
		/*

		
		if(oldData.get('otv_type_g') != $('#otv_type_g').val()){
			formData.append('otv_type_g', $('#otv_type_g').val());
		}
		if(oldData.get('otv_g_id') != $('#otv_g_id').val()){
			formData.append('otv_g', $('#otv_g_id').val());
		}
		if(oldData.get('order_num_g') != $('#order_num_g').val()){
			formData.append('order_num_g', $('#order_num_g').val());
		}
		if(oldData.get('order_data_g') != $('#order_data_g').val()){
			formData.append('order_data_g', $('#order_data_g').val());
		}
		if(oldData.get('dog_num_g') != $('#dog_num_g').val()){
			formData.append('dog_num_g', $('#dog_num_g').val());
		}
		if(oldData.get('dog_data_g') != $('#dog_data_g').val()){
			formData.append('dog_data_g', $('#dog_data_g').val());
		}*/
		
		if(oldData.get('sbj_note') != $('#sbj_note').val()){
			formData.append('sbj_note', $('#sbj_note').val());
		}
		if(oldData.get('email') != $('#email').val()){
			formData.append('email', $('#email').val());
		}
	
		
		/*for (var value of oldData.values()) {
			console.log(value);
		}
		console.log(oldData.get('name_potr'));*/
		
		error = subject.checkFields();

		if(error == 0){		

			$.ajax({
				url: '/ARM/basis/subject/update/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					console.log(result);
				 if(result === "0"){
					err_text += "<p>Потребитель с таким наименованием уже существует в базе</p>"
					$('#messenger').hide().fadeIn(500).html(err_text);
					return false; 
				  }else{
						if(param == 'cancel'){

							if(window.history.length == 1){
								window.close();
								
							}else{
								if(document.referrer.indexOf('ARM/basis/subject/create/') != - 1){
									window.location = '/ARM/basis/subject/list/';
								}else{
									window.history.back();	
								}
							}
						}else if(param == 'continue'){
						 //  console.log(result);
							alert('Данные сохранены');
							window.location = '/ARM/basis/subject/edit/'+$('#formSubjectId').val();

						}else if(param == 'new_object'){
							alert('Данные сохранены');
							window.location = '/ARM/basis/objects/create/'+$('#formSubjectId').val();
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
				url: '/ARM/basis/subject/removeItem/',
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
	
	/*subjectInfo: function(subjectId){
		
		var formData = new FormData();
		formData.append('subject_id', subjectId);
		
		$.ajax({
				url: '/ARM/basis/subject/info/'+subjectId,
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
			/*		str_table_insp = '';
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
		
	},*/
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
	

	pause: function(ms){
		
		//var n = 0;
		var date = new Date();
		var curDate = null;
		do{curDate = new Date();
		
		}
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
	
	/*create_url: function(attr_spr) {
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
	
	},*/
	
	hideBlock: function(){
		event.preventDefault();
		$('#addressForName').hide();
	},
	opn_addressForName: function(){
		event.preventDefault();
		$('#addressForName').show();
	},
// добавляем к наименованию город	
	add_addressForName: function(){
		event.preventDefault();
		$('#addressForName').hide();
		
		//var FirstName = $('#name_potr').text().trim();
		
		var FirstName = '';
		var SecondName = '';
		
		if($("input[name='custom_name']").val() == 1){
				//console.log(1);
			FirstName = $("#name_potr").val();
		}else{
				//console.log(2);
			if($('#name_unp').text().indexOf('(') == 0){
				FirstName = $('#name_unp').text().slice(11).trim(); // у юр лиц обрубаем УНП в названии
			}else{
				FirstName = $('#name_unp').text().trim(); //у физ лиц берем полное наименование поднадзорного субъекта
			}
		}
		//console.log(FirstName);
		if($('#formCityFname option:selected').val() > 0){
			SecondName = ' ('+$('#formCityFname option:selected').text().trim()+')';
		}

		$('#name_potr').val(FirstName+SecondName);
		
			
		if(window.location.href.indexOf("subject/edit/") != -1){
			
			var formCityData = new FormData();
			formCityData.append('subject_id', $('#formSubjectId').val());
			formCityData.append('fname_address_region', $('#formRegionFname').val());
			formCityData.append('fname_address_district', $('#formDistrictFname').val());
			formCityData.append('fname_address_city', $('#formCityFname').val());
			
			$.ajax({
				url: '/ARM/basis/subject/update/',
				type: this.ajaxMethod,
				data: formCityData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					console.log(result);
					
				}
			});
			
		}

	},
	
	custom_name: function(){
		
		if($("input[name='custom_name']").prop('checked')){
			$("input[name='custom_name']").prop('value',1);
			$("textarea[name='name_potr']").prop('disabled', false);
		}else{
			$("input[name='custom_name']").prop('value',0);
			$("textarea[name='name_potr']").val($('#name_unp').text().slice(11).trim());
			$("textarea[name='name_potr']").prop('disabled', true);
			
			
		}
	},
	
	NewInsp: function(){
		
			var new_arm_gruppa = $('#fm_fio option:selected').attr('arm_gruppa');
			var old_arm_gruppa = $('#fs_fio option:selected').attr('arm_gruppa');
			
			var new_mro = $('#fm_podrazdelenie').val();
			var old_mro = $('#fs_podrazdelenie').val();
			
			if((new_arm_gruppa == old_arm_gruppa) && (new_mro == old_mro)){
				var list_obj = [];
				var formData = new FormData();

				$('#obj_list input[type=checkbox]:checked').each(function(){
					
					list_obj.push($(this).val())
					
				});
				
				formData.append('arr_obj', list_obj);
				
				
				formData.append('new_insp', $('#fm_fio').val());
				formData.append('arm_gruppa', new_arm_gruppa);
				
						preloaderStart();
						preloader();
				
				
				$.ajax({
					url: '/ARM/basis/objects/new_insp/',
					type: 'POST',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){		
				
					  //console.log(result);
					  
					 
					  $('#openNewInspector').fadeOut(300);
					  $('#openNewInspector_overlay').fadeOut(300);

					  //location.reload();
					  
					  var formData = new FormData();
						formData.append('id_user', $('#fs_fio').val());
						formData.append('spr_otdel', $('#fs_otdel').val());
						formData.append('arm_group', new_arm_gruppa);
						//console.log($(this).val());
					
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
									
								}
							});
					preloaderEnd();	
					}
				
			});
			
		}else{
			alert('МРО или тип инспекции не совпадает');
		}	
		//console.log(list_obj);
	},
	
	updSbj: function($idSbj){
		var formData = new FormData();
		formData.append('subject_id', $idSbj);
		formData.append('custom_name', $('#custom_name').val());
		 
		$.ajax({
				url: '/ARM/basis/subject/update/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log(result);
				}
			});

	},
	
	
	
	add_subj_dog: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_subj_dog"]').val();		
		var name = $('#dog_name').val();
		var number = $('#dog_number').val();	
		var date_dog = $('#dog_date_dog').val();		

				
		
		if(($('#dog_name').val()).length > 0 && ($('#dog_number').val()).length > 0 && ($('#dog_date_dog').val()).length > 0){		
			formData.append('id', id_edit);
			formData.append('id_subject', $('#formSubjectId').val());				
			formData.append('name', $('input[name="dog_name"]').val());
			formData.append('number', $('input[name="dog_number"]').val());
			formData.append('date_dog', $('input[name="dog_date_dog"]').val());		
	

			str_tbody_first = $("#subj_dog tbody").html()


      $.ajax({
            url: '/ARM/basis/subject/add_subj_dog/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){


				
				if(id_edit>0){				
							$("tr[id_subj_dog="+id_edit+"] td[name='name']").html(name);				
							$("tr[id_subj_dog="+id_edit+"] td[name='number']").html(number);	
							$("tr[id_subj_dog="+id_edit+"] td[name='date_dog']").html(date_dog.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));					
						
					}else{

						str_tbody =  str_tbody_first + result;

						  if((result).length > 0){  
							$("#subj_dog tbody").html(str_tbody); 
							
								
							
							
									var rowCount = $("#subj_dog tbody tr").length;	
									var text = 'Договора теплоснабжения (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#teplo_dog").html(text);							
							
							
							
							
							
						  }
					}  	
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_subj_dog').hide().fadeIn(500).html(err_text);
					if(($('#dog_name').val()).length == 0){
						$('#dog_name').addClass("formError");
					}else{
						$('#dog_name').removeClass("formError");
					}
					if(($('#dog_number').val()) == 0){
						$('#dog_number').addClass("formError");
					}else{
						$('#dog_number').removeClass("formError");
					}	
					if(($('#dog_date_dog').val()) == 0){
						$('#dog_date_dog').addClass("formError");
					}else{
						$('#dog_date_dog').removeClass("formError");
					}					
		}
		
		if(($('#dog_name').val()).length > 0 && ($('#dog_number').val()).length > 0 && ($('#dog_date_dog').val()).length > 0){
				$("input[name='id_subj_dog']").val('');
				$("input[name='dog_name']").val('');
				$("input[name='dog_number']").val('');
				$("input[name='dog_date_dog']").val('');
			  	
				$('#messenger_modal_subj_dog').html("");
				$('#dog_name').removeClass("formError");
				$('#dog_number').removeClass("formError");
				$('#dog_date_dog').removeClass("formError");
				
				$('#ModalSubj_dog').fadeOut(300);
				$('#ModalSubj_dog_overlay').fadeOut(300);				
		
		}
		
		
    },	
	
	removeTableItem: function(tableName,itemId, tableNameId) {
		event.preventDefault();
       
	    if(!confirm('Вы действительно хотите удалить данный объект?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('table_name', tableName);
	    formData.append('item_id', itemId);
	  
	
	  
	    if (itemId < 1) {
            return false;
        };
	//	tableNameId - ID таблиц на вкладках теплообъекта
		if (tableNameId == undefined){
			tableNameId = false;
		}else{
			work_id = tableNameId.split('-').pop();
		}
	  
			$.ajax({
				url: '/ARM/basis/subject/removeTableItem/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				//console.log(tableName);

					$('table#'+tableName+' tr[id_'+tableName+'="'+itemId+'"]').remove();
					
					if(tableNameId != false){
					
						$('table#'+tableNameId+' tr[id_'+tableName+'="'+itemId+'"]').remove();
					
					}

						if(tableName == 'subj_dog'){
								var rowCount = $("#subj_dog tbody tr").length;	
								var text = 'Договора теплоснабжения (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
								$("#teplo_dog").html(text);
						}

				}
			});
	


	},	
	
	type_otv_hide_show: function(value) {

		if(value == 1){
			$('div[class="otv_l_eh_sob"]').css({'display': 'block'});
			$('div[class="otv_l_eh_st"]').css({'display': 'none'});
			$('div[class="otv_l_eh_instr"]').css({'display': 'none'});
			event.preventDefault();
			var formData = new FormData();
			formData.append('id_unp', $('#formUnpId').val());			
					$.ajax({
						url: '/ARM/basis/subject/getUnpforOtv/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
									
							data = $.parseJSON(result);
							//console.log(data);
							fio_otv ="<option value= '0'>Выберите ответственное лицо</option>";
						
								$.each(data, function(i,val){							
									fio_otv =fio_otv+"<option value= "+val['reestr_personal_id']+">"+val['reestr_personal_secondname']+" "+val['reestr_personal_firstname']+" "+val['reestr_personal_lastname']+"</option>";								
								})
								$("#otv_eh_osn_sob").html(fio_otv);
		

						}
					});			
				
			
		}else if(value == 2){
			$('div[class="otv_l_eh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_eh_st"]').css({'display': 'block'});
			$('div[class="otv_l_eh_instr"]').css({'display': 'none'});
			
		}else if(value == 3){
			$('div[class="otv_l_eh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_eh_st"]').css({'display': 'none'});
			$('div[class="otv_l_eh_instr"]').css({'display': 'block'});
				/*var secondname_ruk = $('input[name="dir_fam"]').val();
				var firstname_ruk = $('input[name="dir_name"]').val();
				var lastname_ruk = $('input[name="dir_otch"]').val();

				if(($('input[name="dir_fam"]').val()).length > 0){
					$("tr[id_otv_eh_instr='4'] td[name='otv_fio_eh_osn_instr']").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
					$("#dir_instr").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
				}else{
					$("tr[id_otv_eh_instr='4'] td[name='otv_fio_eh_osn_instr']").html("не заполнено ФИО руководителя организации");
					$("#dir_instr").html("не заполнено ФИО руководителя организации");
				}*/
		}else{
			$('div[class="otv_l_eh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_eh_st"]').css({'display': 'none'});
			$('div[class="otv_l_eh_instr"]').css({'display': 'none'});		
		}
		
	},

	type_otv_hide_show_t: function(value) {

		if(value == 1){
			$('div[class="otv_l_th_sob"]').css({'display': 'block'});
			$('div[class="otv_l_th_st"]').css({'display': 'none'});
			$('div[class="otv_l_th_instr"]').css({'display': 'none'});
			event.preventDefault();
			var formData = new FormData();
			formData.append('id_unp', $('#formUnpId').val());			
					$.ajax({
						url: '/ARM/basis/subject/getUnpforOtv/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
									
							data = $.parseJSON(result);
							//console.log(data);
							fio_otv ="<option value= '0'>Выберите ответственное лицо</option>";
						
								$.each(data, function(i,val){							
									fio_otv =fio_otv+"<option value= "+val['reestr_personal_id']+">"+val['reestr_personal_secondname']+" "+val['reestr_personal_firstname']+" "+val['reestr_personal_lastname']+"</option>";								
								})
								$("#otv_th_osn_sob").html(fio_otv);
		

						}
					});			
				
			
		}else if(value == 2){
			$('div[class="otv_l_th_sob"]').css({'display': 'none'});
			$('div[class="otv_l_th_st"]').css({'display': 'block'});
			$('div[class="otv_l_th_instr"]').css({'display': 'none'});
			
		}else if(value == 3){
			$('div[class="otv_l_th_sob"]').css({'display': 'none'});
			$('div[class="otv_l_th_st"]').css({'display': 'none'});
			$('div[class="otv_l_th_instr"]').css({'display': 'block'});
				/*var secondname_ruk = $('input[name="dir_fam"]').val();
				var firstname_ruk = $('input[name="dir_name"]').val();
				var lastname_ruk = $('input[name="dir_otch"]').val();*/

				/*if(($('input[name="dir_fam"]').val()).length > 0){
					$("tr[id_otv_th_instr='8'] td[name='otv_fio_th_osn_instr']").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
					$("#dir_instr_t").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
				}else{
					$("tr[id_otv_th_instr='8'] td[name='otv_fio_th_osn_instr']").html("не заполнено ФИО руководителя организации");
					$("#dir_instr_t").html("не заполнено ФИО руководителя организации");
				}*/
				
		}else{
			$('div[class="otv_l_th_sob"]').css({'display': 'none'});
			$('div[class="otv_l_th_st"]').css({'display': 'none'});
			$('div[class="otv_l_th_instr"]').css({'display': 'none'});		
		}
		
	},	
	otv_insert_info: function(value) {
			event.preventDefault();
			var formData = new FormData();
			
			
			
		if($('#ModalOtv_eh_st').is(':visible') || $('#ModalOtv_eh_sob').is(':visible')){	
			
			var id_modal_sob = $('input[name="id_row_osn_sob"]').val();
			var id_modal_st = $('input[name="id_row_osn_st"]').val();
			
			
			formData.append('id_otv', value);
					$.ajax({
						url: '/ARM/basis/subject/insertInfoOtv/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
									
							data = $.parseJSON(result);
							//console.log(data);
							if(id_modal_sob == 1 || id_modal_sob == 2){
								$("#id_otv_eh_osn_sob").val(data[0]['reestr_personal_id']);
								$("#otv_eh_osn_sob_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_eh_osn_sob_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_eh_osn_sob_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_eh_osn_sob_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_eh_osn_sob_unp_name").val(data[0]['reestr_unp_name_short']);
								$("#otv_eh_osn_sob_el_group").val(data[0]['test_book_e_el_group']);
								$("#otv_eh_osn_sob_test_validity").val(data[0]['test_book_e_test_validity']);
							}
							if(id_modal_st == 3){
								$("#id_otv_eh_osn_st").val(data[0]['reestr_personal_id']);
								$("#otv_eh_osn_st_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_eh_osn_st_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_eh_osn_st_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_eh_osn_st_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_eh_osn_st_unp_name").val(data[0]['reestr_unp_name_short']);
								$("#otv_eh_osn_st_el_group").val(data[0]['test_book_e_el_group']);
								$("#otv_eh_osn_st_test_validity").val(data[0]['test_book_e_test_validity']);
							}							
						}
					});	
		};	

		if($('#ModalOtv_th_st').is(':visible') || $('#ModalOtv_th_sob').is(':visible')){
			
			var id_modal_sob = $('input[name="id_row_osn_sob_t"]').val();
			var id_modal_st = $('input[name="id_row_osn_st_t"]').val();
			
			
			formData.append('id_otv', value);
					$.ajax({
						url: '/ARM/basis/subject/insertInfoOtv/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
									
							data = $.parseJSON(result);
							//console.log(data);
							if(id_modal_sob == 5 || id_modal_sob == 6){
								$("#id_otv_th_osn_sob").val(data[0]['reestr_personal_id']);
								$("#otv_th_osn_sob_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_th_osn_sob_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_th_osn_sob_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_th_osn_sob_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_th_osn_sob_unp_name").val(data[0]['reestr_unp_name_short']);
							}
							if(id_modal_st == 7){
								$("#id_otv_th_osn_st").val(data[0]['reestr_personal_id']);
								$("#otv_th_osn_st_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_th_osn_st_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_th_osn_st_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_th_osn_st_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_th_osn_st_unp_name").val(data[0]['reestr_unp_name_short']);
							}							
						}
					});		

		};

		if($('#ModalOtv_gh_st').is(':visible') || $('#ModalOtv_gh_sob').is(':visible')){
			
			var id_modal_sob = $('input[name="id_row_osn_sob_g"]').val();
			var id_modal_st = $('input[name="id_row_osn_st_g"]').val();
			
			
			formData.append('id_otv', value);
					$.ajax({
						url: '/ARM/basis/subject/insertInfoOtv/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
									
							data = $.parseJSON(result);
							//console.log(data);
							if(id_modal_sob == 1 || id_modal_sob == 2){
								$("#id_otv_gh_osn_sob").val(data[0]['reestr_personal_id']);
								$("#otv_gh_osn_sob_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_gh_osn_sob_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_gh_osn_sob_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_gh_osn_sob_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_gh_osn_sob_unp_name").val(data[0]['reestr_unp_name_short']);
							}
							if(id_modal_st == 3){
								$("#id_otv_gh_osn_st").val(data[0]['reestr_personal_id']);
								$("#otv_gh_osn_st_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_gh_osn_st_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_gh_osn_st_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_gh_osn_st_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_gh_osn_st_unp_name").val(data[0]['reestr_unp_name_short']);
							}							
						}
					});		

		};		
		
	},
	otv_insert_info_t: function(value) {
			event.preventDefault();
			var formData = new FormData();
			
			var id_modal_sob = $('input[name="id_row_osn_sob_t"]').val();
			var id_modal_st = $('input[name="id_row_osn_st_t"]').val();
			
			
			formData.append('id_otv', value);
					$.ajax({
						url: '/ARM/basis/subject/insertInfoOtv/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
									
							data = $.parseJSON(result);
							//console.log(data);
							if(id_modal_sob == 5 || id_modal_sob == 6){
								$("#id_otv_th_osn_sob").val(data[0]['reestr_personal_id']);
								$("#otv_th_osn_sob_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_th_osn_sob_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_th_osn_sob_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_th_osn_sob_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_th_osn_sob_unp_name").val(data[0]['reestr_unp_name_short']);
							}
							if(id_modal_st == 7){
								$("#id_otv_th_osn_st").val(data[0]['reestr_personal_id']);
								$("#otv_th_osn_st_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_th_osn_st_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_th_osn_st_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_th_osn_st_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_th_osn_st_unp_name").val(data[0]['reestr_unp_name_short']);
							}							
						}
					});		
	},	
	insert_row: function(value) {	
		$('input[name="id_row_osn_sob"]').val(value);	

		var id_e1 = $('input[name="otv_e1_sob"]').val();
		var num_pr_e1 = $('input[name="otv_e1_sob_num_pr"]').val();
		var data_pr_e1 = $('input[name="otv_e1_sob_date_pr"]').val();

		var id_e2 = $('input[name="otv_e2_sob"]').val();
		var num_pr_e2 = $('input[name="otv_e2_sob_num_pr"]').val();
		var data_pr_e2 = $('input[name="otv_e2_sob_date_pr"]').val();
		
		var fio_e1 = $("tr[id_otv_eh_osn_sob='1'] td[name='otv_fio_eh_osn_sob']").text();
		var attr_e1 = $("tr[id_otv_eh_osn_sob='1'] td[name='otv_dolg_sub_eh_osn_sob']").text();

		var fio_e2 = $("tr[id_otv_eh_osn_sob='2'] td[name='otv_fio_eh_zam_sob']").text();
		var attr_e2 = $("tr[id_otv_eh_osn_sob='2'] td[name='otv_dolg_sub_zam_osn_sob']").text();
	
		if(value == 1){
			$("#otv_number_pr_sob").val(num_pr_e1);
			$("#otv_date_pr_sob").val(data_pr_e1);
			$('#otv_eh_osn_sob option[value='+id_e1+']').prop('selected', true);			
		}else if(value == 2){
			$("#otv_number_pr_sob").val(num_pr_e2);
			$("#otv_date_pr_sob").val(data_pr_e2);
			$('#otv_eh_osn_sob option[value='+id_e2+']').prop('selected', true);			
		}
	
	},
	insert_row_t: function(value) {	
		$('input[name="id_row_osn_sob_t"]').val(value);	

		var id_t1 = $('input[name="otv_t1_sob"]').val();
		var num_pr_t1 = $('input[name="otv_t1_sob_num_pr"]').val();
		var data_pr_t1 = $('input[name="otv_t1_sob_date_pr"]').val();

		var id_t2 = $('input[name="otv_t2_sob"]').val();
		var num_pr_t2 = $('input[name="otv_t2_sob_num_pr"]').val();
		var data_pr_t2 = $('input[name="otv_t2_sob_date_pr"]').val();
		
		var fio_t1 = $("tr[id_otv_th_osn_sob='5'] td[name='otv_fio_th_osn_sob']").text();
		var attr_t1 = $("tr[id_otv_th_osn_sob='5'] td[name='otv_dolg_sub_th_osn_sob']").text();

		var fio_t2 = $("tr[id_otv_th_osn_sob='6'] td[name='otv_fio_th_zam_sob']").text();
		var attr_t2 = $("tr[id_otv_th_osn_sob='6'] td[name='otv_dolg_sub_zam_t_osn_sob']").text();
	
		if(value == 5){
			$("#otv_number_pr_sob_t").val(num_pr_t1);
			$("#otv_date_pr_sob_t").val(data_pr_t1);
			$('#otv_th_osn_sob option[value='+id_t1+']').prop('selected', true);			
		}else if(value == 6){
			$("#otv_number_pr_sob_t").val(num_pr_t2);
			$("#otv_date_pr_sob_t").val(data_pr_t2);
			$('#otv_th_osn_sob option[value='+id_t2+']').prop('selected', true);			
		}
	
	},	
	insert_row_st: function(value) {	
		$('input[name="id_row_osn_st"]').val(value);

		var num_pr_e3 = $('input[name="otv_e_st_num_pr"]').val();
		var data_pr_e3 = $('input[name="otv_e_st_date_pr"]').val();
		var num_dog_e3 = $('input[name="otv_e_st_num_dog"]').val();
		var data_dog_e3 = $('input[name="otv_e_st_date_dog"]').val();
		var data_dog_cont_e3 = $('input[name="otv_e_st_date_dog_cont"]').val();
		var fio_e3 = $("tr[id_otv_eh_osn_st='3'] td[name='otv_fio_eh_osn_st']").text();
		var attr_e3 = $("tr[id_otv_eh_osn_st='3'] td[name='otv_dolg_sub_eh_osn_st']").text();
	
		$("#otv_number_pr_st").val(num_pr_e3);
		$("#otv_date_pr_st").val(data_pr_e3);
		$("#otv_number_dog_st").val(num_dog_e3);
		$("#otv_date_dog_st").val(data_dog_e3);
		$("#otv_date_dog_continue_st").val(data_dog_cont_e3);
		//console.log((attr_e3).length);
		$("#stor_otv").html(fio_e3+((attr_e3).length > 0 ? " ("+attr_e3+")" : ''));
	},	
	insert_row_st_t: function(value) {	
		$('input[name="id_row_osn_st_t"]').val(value);

		var num_pr_t3 = $('input[name="otv_t_st_num_pr"]').val();
		var data_pr_t3 = $('input[name="otv_t_st_date_pr"]').val();
		var num_dog_t3 = $('input[name="otv_t_st_num_dog"]').val();
		var data_dog_t3 = $('input[name="otv_t_st_date_dog"]').val();
		var data_dog_cont_t3 = $('input[name="otv_t_st_date_dog_cont"]').val();
		var fio_t3 = $("tr[id_otv_th_osn_st='7'] td[name='otv_fio_th_osn_st']").text();
		var attr_t3 = $("tr[id_otv_th_osn_st='7'] td[name='otv_dolg_sub_th_osn_st']").text();
	
		$("#otv_number_pr_st_t").val(num_pr_t3);
		$("#otv_date_pr_st_t").val(data_pr_t3);
		$("#otv_number_dog_st_t").val(num_dog_t3);
		$("#otv_date_dog_st_t").val(data_dog_t3);
		$("#otv_date_dog_continue_st_t").val(data_dog_cont_t3);

		$("#stor_otv_t").html(fio_t3+((attr_t3).length > 0 ? " ("+attr_t3+")" : ''));
	},	
	insert_row_instr: function(value) {	
		
		var date_dir_instr = $('input[name="data_instr_dir"]').val();
		var secondname_ruk = $('input[name="dir_fam"]').val();
		var firstname_ruk = $('input[name="dir_name"]').val();
		var lastname_ruk = $('input[name="dir_otch"]').val();
		
		$('input[name="id_row_osn_instr"]').val(value);	
		$('input[name="otv_date_instr"]').val(date_dir_instr);
		
				if(($('input[name="dir_fam"]').val()).length > 0){
					$("#dir_instr").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
				}else{
					$("#dir_instr").html("не заполнено ФИО руководителя организации");
				}		
	
	},	
	
	insert_row_instr_t: function(value) {	
		
		var date_dir_instr = $('input[name="data_instr_dir_t"]').val();
		var secondname_ruk = $('input[name="dir_fam"]').val();
		var firstname_ruk = $('input[name="dir_name"]').val();
		var lastname_ruk = $('input[name="dir_otch"]').val();
		
		$('input[name="id_row_osn_instr_t"]').val(value);	
		$('input[name="otv_date_instr_t"]').val(date_dir_instr);
		
				if(($('input[name="dir_fam"]').val()).length > 0){
					$("#dir_instr_t").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
				}else{
					$("#dir_instr_t").html("не заполнено ФИО руководителя организации");
				}		
	
	},	
	
	add_otv_eh_sob: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_otv_eh_osn_sob"]').val();		
		var secondname = $('#otv_eh_osn_sob_secondname').val();
		var firstname = $('#otv_eh_osn_sob_firstname').val();	
		var lastname = $('#otv_eh_osn_sob_lastname').val();		
		var dolgnost = $('#otv_eh_osn_sob_dolg').val();
		var unp_name = $('#otv_eh_osn_sob_unp_name').val();		
		var num_pr = $('#otv_number_pr_sob').val();
		var date_pr = $('#otv_date_pr_sob').val();
		var id_row = $('#id_row_osn_sob').val();
		var el_group = $('#otv_eh_osn_sob_el_group').val();
		var test_validity = $('#otv_eh_osn_sob_test_validity').val();

		if(($('#otv_eh_osn_sob').val()) > 0 && ($('#otv_number_pr_sob').val()).length > 0 && ($('#otv_date_pr_sob').val()).length > 0){		
			formData.append('otv_e1', id_edit);
			formData.append('id_unp', $('#formUnpId').val());				
			formData.append('secondname', $('input[name="otv_eh_osn_sob_secondname"]').val());
			formData.append('firstname', $('input[name="otv_eh_osn_sob_firstname"]').val());
			formData.append('lastname', $('input[name="otv_eh_osn_sob_lastname"]').val());		
			formData.append('dolgnost', $('input[name="otv_eh_osn_sob_dolg"]').val());
			formData.append('unp_name', $('input[name="otv_eh_osn_sob_unp_name"]').val());
			formData.append('order_num_e1', $('input[name="otv_number_pr_sob"]').val());
			formData.append('order_data_e1', $('input[name="otv_date_pr_sob"]').val());
			formData.append('el_group', $('input[name="otv_eh_osn_sob_el_group"]').val());
			formData.append('test_validity', $('input[name="otv_eh_osn_sob_test_validity"]').val());
			
	
			str_tbody_first = $("#otv_l_eh_sob tbody").html()


      $.ajax({
            url: '/ARM/basis/subject/add_otv_eh_sob/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

//console.log(result);
				
				
				/*if(id_edit>0){*/			
							
						if(id_row == 1){		
						console.log(el_group);
							$("tr[id_otv_eh_osn_sob='1'] td[name='otv_fio_eh_osn_sob']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_eh_osn_sob='1'] td[name='otv_dolg_sub_eh_osn_sob']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_eh_osn_sob='1'] td[name='otv_pr_eh_osn_sob']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							$("tr[id_otv_eh_osn_sob='1'] td[name='otv_group_eh_osn_sob']").html(el_group.length > 0 ? el_group+" группа/до "+test_validity.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
							$("#otv_e1_sob").val(id_edit);
							$("#otv_e1_sob_num_pr").val(num_pr);
							$("#otv_e1_sob_date_pr").val(date_pr);

						
						}else if(id_row == 2){
							
							$("tr[id_otv_eh_osn_sob='2'] td[name='otv_fio_eh_zam_sob']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_eh_osn_sob='2'] td[name='otv_dolg_sub_zam_osn_sob']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_eh_osn_sob='2'] td[name='otv_pr_eh_zam_sob']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));							
							$("tr[id_otv_eh_osn_sob='2'] td[name='otv_group_eh_zam_sob']").html(el_group.length > 0 ? el_group+" группа/до "+test_validity.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
							
							$("#otv_e2_sob").val(id_edit);
							$("#otv_e2_sob_num_pr").val(num_pr);
							$("#otv_e2_sob_date_pr").val(date_pr);
							
						}	
							
							/*$("tr[id_subj_dog="+id_edit+"] td[name='number']").html(number);	
							$("tr[id_subj_dog="+id_edit+"] td[name='date_dog']").html(date_dog.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));*/					
						
					/*}else{

						str_tbody =  str_tbody_first + result;

						  if((result).length > 0){  
							$("#otv_l_eh_sob tbody").html(str_tbody); 
							
								
							
							
									/*var rowCount = $("#subj_dog tbody tr").length;	
									var text = 'Договора теплоснабжения (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#teplo_dog").html(text);	*/						
							
							
							
							
							
						/*  }*/
				/*	} */ 	
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_sob').hide().fadeIn(500).html(err_text);
					if(($('#otv_eh_osn_sob').val()) == 0){
						$('#otv_eh_osn_sob').addClass("formError");
					}else{
						$('#otv_eh_osn_sob').removeClass("formError");
					}
					if(($('#otv_number_pr_sob').val()).length == 0){
						$('#otv_number_pr_sob').addClass("formError");
					}else{
						$('#otv_number_pr_sob').removeClass("formError");
					}	
					if(($('#otv_date_pr_sob').val()).length == 0){
						$('#otv_date_pr_sob').addClass("formError");
					}else{
						$('#otv_date_pr_sob').removeClass("formError");
					}					
		}
		
		if(($('#otv_eh_osn_sob').val()) > 0 && ($('#otv_number_pr_sob').val()).length > 0 && ($('#otv_date_pr_sob').val()).length > 0){
				$("input[name='id_otv_eh_sob']").val('');
				
				$("select[name='otv_eh_osn_sob']").val('');
				$("input[name='otv_number_pr_sob']").val('');
				$("input[name='otv_date_pr_sob']").val('');
				$("input[name='otv_eh_osn_sob_secondname']").val('');
				$("input[name='otv_eh_osn_sob_firstname']").val('');
				$("input[name='otv_eh_osn_sob_lastname']").val('');
				$("input[name='otv_eh_osn_sob_dolg']").val('');
				$("input[name='otv_eh_osn_sob_unp_name']").val('');
			  	
				$('#messenger_modal_otv_sob').html("");
				$('#otv_eh_osn_sob').removeClass("formError");
				$('#otv_number_pr_sob').removeClass("formError");
				$('#otv_date_pr_sob').removeClass("formError");
				
				$('#ModalOtv_eh_sob').fadeOut(300);
				$('#ModalOtv_eh_sob_overlay').fadeOut(300);				
		
		}
		
		
    },

	add_otv_th_sob: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_otv_th_osn_sob"]').val();		
		var secondname = $('#otv_th_osn_sob_secondname').val();
		var firstname = $('#otv_th_osn_sob_firstname').val();	
		var lastname = $('#otv_th_osn_sob_lastname').val();		
		var dolgnost = $('#otv_th_osn_sob_dolg').val();
		var unp_name = $('#otv_th_osn_sob_unp_name').val();		
		var num_pr = $('#otv_number_pr_sob_t').val();
		var date_pr = $('#otv_date_pr_sob_t').val();
		var id_row = $('#id_row_osn_sob_t').val();

		if(($('#otv_th_osn_sob').val()) > 0 && ($('#otv_number_pr_sob_t').val()).length > 0 && ($('#otv_date_pr_sob_t').val()).length > 0){		
			formData.append('otv_t1', id_edit);
			formData.append('id_unp', $('#formUnpId').val());				
			formData.append('secondname', $('input[name="otv_th_osn_sob_secondname"]').val());
			formData.append('firstname', $('input[name="otv_th_osn_sob_firstname"]').val());
			formData.append('lastname', $('input[name="otv_th_osn_sob_lastname"]').val());		
			formData.append('dolgnost', $('input[name="otv_th_osn_sob_dolg"]').val());
			formData.append('unp_name', $('input[name="otv_th_osn_sob_unp_name"]').val());
			formData.append('order_num_t1', $('input[name="otv_number_pr_sob_t"]').val());
			formData.append('order_data_t1', $('input[name="otv_date_pr_sob_t"]').val());
	
	
			str_tbody_first = $("#otv_l_th_sob tbody").html()


      $.ajax({
            url: '/ARM/basis/subject/add_otv_th_sob/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

//console.log(result);
				
				
				/*if(id_edit>0){*/			
							
						if(id_row == 5){		
						
							$("tr[id_otv_th_osn_sob='5'] td[name='otv_fio_th_osn_sob']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_th_osn_sob='5'] td[name='otv_dolg_sub_th_osn_sob']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_th_osn_sob='5'] td[name='otv_pr_th_osn_sob']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							
							$("#otv_t1_sob").val(id_edit);
							$("#otv_t1_sob_num_pr").val(num_pr);
							$("#otv_t1_sob_date_pr").val(date_pr);

						
						}else if(id_row == 6){
							
							$("tr[id_otv_th_osn_sob='6'] td[name='otv_fio_th_zam_sob']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_th_osn_sob='6'] td[name='otv_dolg_sub_zam_t_osn_sob']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_th_osn_sob='6'] td[name='otv_pr_th_zam_sob']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));							

							$("#otv_t2_sob").val(id_edit);
							$("#otv_t2_sob_num_pr").val(num_pr);
							$("#otv_t2_sob_date_pr").val(date_pr);
							
						}	
								
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_sob_t').hide().fadeIn(500).html(err_text);
					if(($('#otv_th_osn_sob').val()) == 0){
						$('#otv_th_osn_sob').addClass("formError");
					}else{
						$('#otv_th_osn_sob').removeClass("formError");
					}
					if(($('#otv_number_pr_sob_t').val()).length == 0){
						$('#otv_number_pr_sob_t').addClass("formError");
					}else{
						$('#otv_number_pr_sob_t').removeClass("formError");
					}	
					if(($('#otv_date_pr_sob_t').val()).length == 0){
						$('#otv_date_pr_sob_t').addClass("formError");
					}else{
						$('#otv_date_pr_sob_t').removeClass("formError");
					}					
		}
		
		if(($('#otv_th_osn_sob').val()) > 0 && ($('#otv_number_pr_sob_t').val()).length > 0 && ($('#otv_date_pr_sob_t').val()).length > 0){
				$("input[name='id_otv_th_sob']").val('');
				
				$("select[name='otv_th_osn_sob']").val('');
				$("input[name='otv_number_pr_sob_t']").val('');
				$("input[name='otv_date_pr_sob_t']").val('');
				$("input[name='otv_th_osn_sob_secondname']").val('');
				$("input[name='otv_th_osn_sob_firstname']").val('');
				$("input[name='otv_th_osn_sob_lastname']").val('');
				$("input[name='otv_th_osn_sob_dolg']").val('');
				$("input[name='otv_th_osn_sob_unp_name']").val('');
			  	
				$('#messenger_modal_otv_sob_t').html("");
				$('#otv_th_osn_sob').removeClass("formError");
				$('#otv_number_pr_sob_t').removeClass("formError");
				$('#otv_date_pr_sob_t').removeClass("formError");
				
				$('#ModalOtv_th_sob').fadeOut(300);
				$('#ModalOtv_th_sob_overlay').fadeOut(300);				
		
		}
		
		
    },

	add_otv_eh_st: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_otv_eh_osn_st"]').val();		
		var secondname = $('#otv_eh_osn_st_secondname').val();
		var firstname = $('#otv_eh_osn_st_firstname').val();	
		var lastname = $('#otv_eh_osn_st_lastname').val();		
		var dolgnost = $('#otv_eh_osn_st_dolg').val();
		var unp_name = $('#otv_eh_osn_st_unp_name').val();		
		var num_pr = $('#otv_number_pr_st').val();
		var date_pr = $('#otv_date_pr_st').val();
		var num_dog = $('#otv_number_dog_st').val();
		var date_dog = $('#otv_date_dog_st').val();		
		var date_cont_dog = $('#otv_date_dog_continue_st').val();
		var id_row = $('#id_row_osn_st').val();
		var el_group = $('#otv_eh_osn_st_el_group').val();
		var test_validity = $('#otv_eh_osn_st_test_validity').val();


		if(($('#id_stor_otv').val()).length > 0 && ($('#otv_number_pr_st').val()).length > 0 && ($('#otv_date_pr_st').val()).length > 0 && ($('#otv_number_dog_st').val()).length > 0 && ($('#otv_date_dog_st').val()).length > 0 && ($('#otv_date_dog_continue_st').val()).length > 0){		
			
			formData.append('otv_e1_st', id_edit);
			formData.append('id_unp', $('#formUnpId').val());				
			formData.append('secondname', $('input[name="otv_eh_osn_st_secondname"]').val());
			formData.append('firstname', $('input[name="otv_eh_osn_st_firstname"]').val());
			formData.append('lastname', $('input[name="otv_eh_osn_st_lastname"]').val());		
			formData.append('dolgnost', $('input[name="otv_eh_osn_st_dolg"]').val());
			formData.append('unp_name', $('input[name="otv_eh_osn_st_unp_name"]').val());
			formData.append('order_num_e1', $('input[name="otv_number_pr_st"]').val());
			formData.append('order_data_e1', $('input[name="otv_date_pr_st"]').val());
			formData.append('dog_num_e1', $('input[name="otv_number_dog_st"]').val());
			formData.append('dog_data_e1', $('input[name="otv_date_dog_st"]').val());	
			formData.append('dog_cont_data_e1', $('input[name="otv_date_dog_continue_st"]').val());
			formData.append('el_group', $('input[name="otv_eh_osn_st_el_group"]').val());
			formData.append('test_validity', $('input[name="otv_eh_osn_st_test_validity"]').val());
	
			str_tbody_first = $("#otv_l_eh_st tbody").html()


      $.ajax({
            url: '/ARM/basis/subject/add_otv_eh_st/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

//console.log(result);
						
							
						if(id_row == 3){		
						
							$("tr[id_otv_eh_osn_st='3'] td[name='otv_fio_eh_osn_st']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_eh_osn_st='3'] td[name='otv_dolg_sub_eh_osn_st']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_eh_osn_st='3'] td[name='otv_pr_eh_osn_st']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							$("tr[id_otv_eh_osn_st='3'] td[name='otv_dog_eh_osn_st']").html("№ "+num_dog+" от "+date_dog.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1")+" до "+date_cont_dog.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							$("tr[id_otv_eh_osn_st='3'] td[name='otv_group_eh_osn_st']").html(el_group.length > 0 ? el_group+" группа/до "+test_validity.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
							
							$("#otv_e_st").val(id_edit);
							$("#otv_e_st_num_pr").val(num_pr);
							$("#otv_e_st_date_pr").val(date_pr);
							$("#otv_e_st_num_dog").val(num_dog);
							$("#otv_e_st_date_dog").val(date_dog);
							$("#otv_e_st_date_dog_cont").val(date_cont_dog);
						}	
								
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_st').hide().fadeIn(500).html(err_text);
					if(($('#id_stor_otv').val()).length == 0){
						$('#id_stor_otv').addClass("formError");
					}else{
						$('#id_stor_otv').removeClass("formError");
					}
					if(($('#otv_number_pr_st').val()).length == 0){
						$('#otv_number_pr_st').addClass("formError");
					}else{
						$('#otv_number_pr_st').removeClass("formError");
					}	
					if(($('#otv_date_pr_st').val()).length == 0){
						$('#otv_date_pr_st').addClass("formError");
					}else{
						$('#otv_date_pr_st').removeClass("formError");
					}	
					if(($('#otv_number_dog_st').val()).length == 0){
						$('#otv_number_dog_st').addClass("formError");
					}else{
						$('#otv_number_dog_st').removeClass("formError");
					}	
					if(($('#otv_date_dog_st').val()).length == 0){
						$('#otv_date_dog_st').addClass("formError");
					}else{
						$('#otv_date_dog_st').removeClass("formError");
					}
					if(($('#otv_date_dog_continue_st').val()).length == 0){
						$('#otv_date_dog_continue_st').addClass("formError");
					}else{
						$('#otv_date_dog_continue_st').removeClass("formError");
					}					
		}
		
		if(($('#id_stor_otv').val()).length > 0 && ($('#otv_number_pr_st').val()).length > 0 && ($('#otv_date_pr_st').val()).length > 0 && ($('#otv_number_dog_st').val()).length > 0 && ($('#otv_date_dog_st').val()).length > 0 && ($('#otv_date_dog_continue_st').val()).length > 0){
				
				$("input[name='id_stor_otv']").val('');
				$("input[name='id_row_osn_st']").val('');
				$("input[name='otv_number_pr_st']").val('');
				$("input[name='otv_date_pr_st']").val('');
				$("input[name='otv_eh_osn_st_secondname']").val('');
				$("input[name='otv_eh_osn_st_firstname']").val('');
				$("input[name='otv_eh_osn_st_lastname']").val('');
				$("input[name='otv_eh_osn_st_dolg']").val('');
				$("input[name='otv_eh_osn_st_unp_name']").val('');
				$("input[name='otv_number_dog_st']").val('');
				$("input[name='otv_date_dog_st']").val('');
				$("input[name='otv_date_dog_continue_st']").val('');

			  	
				$('#messenger_modal_otv_st').html("");
				$('#otv_eh_osn_st').removeClass("formError");
				$('#otv_number_pr_st').removeClass("formError");
				$('#otv_date_pr_st').removeClass("formError");
				$('#otv_number_dog_st').removeClass("formError");
				$('#otv_date_dog_st').removeClass("formError");
				$('#otv_date_dog_continue_st').removeClass("formError");
				
				$('#ModalOtv_eh_st').fadeOut(300);
				$('#ModalOtv_eh_st_overlay').fadeOut(300);				
		
		}
		
		
    },

	add_otv_th_st: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_otv_th_osn_st"]').val();		
		var secondname = $('#otv_th_osn_st_secondname').val();
		var firstname = $('#otv_th_osn_st_firstname').val();	
		var lastname = $('#otv_th_osn_st_lastname').val();		
		var dolgnost = $('#otv_th_osn_st_dolg').val();
		var unp_name = $('#otv_th_osn_st_unp_name').val();		
		var num_pr = $('#otv_number_pr_st_t').val();
		var date_pr = $('#otv_date_pr_st_t').val();
		var num_dog = $('#otv_number_dog_st_t').val();
		var date_dog = $('#otv_date_dog_st_t').val();		
		var date_cont_dog = $('#otv_date_dog_continue_st_t').val();
		var id_row = $('#id_row_osn_st_t').val();


		if(($('#id_stor_otv_t').val()).length > 0 && ($('#otv_number_pr_st_t').val()).length > 0 && ($('#otv_date_pr_st_t').val()).length > 0 && ($('#otv_number_dog_st_t').val()).length > 0 && ($('#otv_date_dog_st_t').val()).length > 0 && ($('#otv_date_dog_continue_st_t').val()).length > 0){		
			
			formData.append('otv_t1_st', id_edit);
			formData.append('id_unp', $('#formUnpId').val());				
			formData.append('secondname', $('input[name="otv_th_osn_st_secondname"]').val());
			formData.append('firstname', $('input[name="otv_th_osn_st_firstname"]').val());
			formData.append('lastname', $('input[name="otv_th_osn_st_lastname"]').val());		
			formData.append('dolgnost', $('input[name="otv_th_osn_st_dolg"]').val());
			formData.append('unp_name', $('input[name="otv_th_osn_st_unp_name"]').val());
			formData.append('order_num_t3', $('input[name="otv_number_pr_st_t"]').val());
			formData.append('order_data_t3', $('input[name="otv_date_pr_st_t"]').val());
			formData.append('dog_num_t3', $('input[name="otv_number_dog_st_t"]').val());
			formData.append('dog_data_t3', $('input[name="otv_date_dog_st_t"]').val());	
			formData.append('dog_cont_data_t3', $('input[name="otv_date_dog_continue_st_t"]').val());
	
			str_tbody_first = $("#otv_l_th_st tbody").html()


      $.ajax({
            url: '/ARM/basis/subject/add_otv_th_st/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

//console.log(result);
						
							
						if(id_row == 7){		
						
							$("tr[id_otv_th_osn_st='7'] td[name='otv_fio_th_osn_st']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_th_osn_st='7'] td[name='otv_dolg_sub_th_osn_st']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_th_osn_st='7'] td[name='otv_pr_th_osn_st']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							$("tr[id_otv_th_osn_st='7'] td[name='otv_dog_th_osn_st']").html("№ "+num_dog+" от "+date_dog.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1")+" до "+date_cont_dog.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							
							
							$("#otv_t_st").val(id_edit);
							$("#otv_t_st_num_pr").val(num_pr);
							$("#otv_t_st_date_pr").val(date_pr);
							$("#otv_t_st_num_dog").val(num_dog);
							$("#otv_t_st_date_dog").val(date_dog);
							$("#otv_t_st_date_dog_cont").val(date_cont_dog);
						}	
								
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_st_t').hide().fadeIn(500).html(err_text);
					if(($('#id_stor_otv_t').val()).length == 0){
						$('#id_stor_otv_t').addClass("formError");
					}else{
						$('#id_stor_otv_t').removeClass("formError");
					}
					if(($('#otv_number_pr_st_t').val()).length == 0){
						$('#otv_number_pr_st_t').addClass("formError");
					}else{
						$('#otv_number_pr_st_t').removeClass("formError");
					}	
					if(($('#otv_date_pr_st_t').val()).length == 0){
						$('#otv_date_pr_st_t').addClass("formError");
					}else{
						$('#otv_date_pr_st_t').removeClass("formError");
					}	
					if(($('#otv_number_dog_st_t').val()).length == 0){
						$('#otv_number_dog_st_t').addClass("formError");
					}else{
						$('#otv_number_dog_st_t').removeClass("formError");
					}	
					if(($('#otv_date_dog_st_t').val()).length == 0){
						$('#otv_date_dog_st_t').addClass("formError");
					}else{
						$('#otv_date_dog_st_t').removeClass("formError");
					}
					if(($('#otv_date_dog_continue_st_t').val()).length == 0){
						$('#otv_date_dog_continue_st_t').addClass("formError");
					}else{
						$('#otv_date_dog_continue_st_t').removeClass("formError");
					}					
		}
		
		if(($('#id_stor_otv_t').val()).length > 0 && ($('#otv_number_pr_st_t').val()).length > 0 && ($('#otv_date_pr_st_t').val()).length > 0 && ($('#otv_number_dog_st_t').val()).length > 0 && ($('#otv_date_dog_st_t').val()).length > 0 && ($('#otv_date_dog_continue_st_t').val()).length > 0){
				
				$("input[name='id_stor_otv_t']").val('');
				$("input[name='id_row_osn_st_t']").val('');
				$("input[name='otv_number_pr_st_t']").val('');
				$("input[name='otv_date_pr_st_t']").val('');
				$("input[name='otv_th_osn_st_secondname']").val('');
				$("input[name='otv_th_osn_st_firstname']").val('');
				$("input[name='otv_th_osn_st_lastname']").val('');
				$("input[name='otv_th_osn_st_dolg']").val('');
				$("input[name='otv_th_osn_st_unp_name']").val('');
				$("input[name='otv_number_dog_st_t']").val('');
				$("input[name='otv_date_dog_st_t']").val('');
				$("input[name='otv_date_dog_continue_st_t']").val('');

			  	
				$('#messenger_modal_otv_st_t').html("");
				$('#otv_th_osn_st').removeClass("formError");
				$('#otv_number_pr_st_t').removeClass("formError");
				$('#otv_date_pr_st_t').removeClass("formError");
				$('#otv_number_dog_st_t').removeClass("formError");
				$('#otv_date_dog_st_t').removeClass("formError");
				$('#otv_date_dog_continue_st_t').removeClass("formError");
				
				$('#ModalOtv_th_st').fadeOut(300);
				$('#ModalOtv_th_st_overlay').fadeOut(300);				
		
		}
		
		
    },

	add_otv_eh_instr: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_row = $('#id_row_osn_instr').val();
		var dir_fio = $('#dir_instr').text();
		var date_instr = $('#otv_date_instr').val();



		if(($('#otv_date_instr').val()).length > 0){		
			/*formData.append('ins_data_e', $('input[name="otv_date_instr"]').val());	*/

			str_tbody_first = $("#otv_l_eh_instr tbody").html()


      $.ajax({
            url: '/ARM/basis/subject/add_otv_eh_instr/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

							$("tr[id_otv_eh_instr='4'] td[name='otv_fio_eh_osn_instr']").html("Руководитель организации по инструктажу от "+date_instr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));				
							$("#data_instr_dir").val(date_instr);
							
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_instr').hide().fadeIn(500).html(err_text);
					if(($('#otv_date_instr').val()).length == 0){
						$('#otv_date_instr').addClass("formError");
					}else{
						$('#otv_date_instr').removeClass("formError");
					}
					
		}
		
		if(($('#otv_date_instr').val()).length > 0 ){
				
				$("input[name='id_row_osn_instr']").val('');
				$("input[name='otv_date_instr']").val('');

				$('#messenger_modal_otv_instr').html("");
				$('#otv_date_instr').removeClass("formError");

				
				$('#ModalOtv_eh_instr').fadeOut(300);
				$('#ModalOtv_eh_instr_overlay').fadeOut(300);				
		
		}
		
		
    },	

	add_otv_th_instr: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_row = $('#id_row_osn_instr_t').val();
		var date_instr = $('#otv_date_instr_t').val();



		if(($('#otv_date_instr_t').val()).length > 0){		

			str_tbody_first = $("#otv_l_th_instr tbody").html()


      $.ajax({
            url: '/ARM/basis/subject/add_otv_th_instr/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

							$("tr[id_otv_th_instr='8'] td[name='otv_fio_th_osn_instr']").html("Руководитель организации по инструктажу от "+date_instr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));				
							$("#data_instr_dir_t").val(date_instr);
							
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_instr_t').hide().fadeIn(500).html(err_text);
					if(($('#otv_date_instr_t').val()).length == 0){
						$('#otv_date_instr_t').addClass("formError");
					}else{
						$('#otv_date_instr_t').removeClass("formError");
					}
					
		}
		
		if(($('#otv_date_instr_t').val()).length > 0 ){
				
				$("input[name='id_row_osn_instr_t']").val('');
				$("input[name='otv_date_instr_t']").val('');

				$('#messenger_modal_otv_instr_t').html("");
				$('#otv_date_instr_t').removeClass("formError");

				
				$('#ModalOtv_th_instr').fadeOut(300);
				$('#ModalOtv_th_instr_overlay').fadeOut(300);				
		
		}
		
		
    }
	
	
};
$(window).ready(function() {
	$('#name_potr').change(function(){
		$(this).val($(this).val().replace(/\s+/g,' '));
	})
	
	
	
	$("#wideView").click(function() {
		$(".main_wrapper").toggleClass("wide");
	});
	
	//$( "input[type=number]" ).keydown(function(e) {
	/*document.addEventListener('keydown', function(e){	
	/*if (e.keyCode == 116) {

			e.preventDefault(); 

			//alert(e.key + ', ' + e.keyCode);
		}
	});	*/

	/*if(performance.navigation.type == 1){
	   
		performance.navigation.type = 0;
		location.reload(true);
		return false;
		
	}*/
	
});

$(window).load(function() {
	
/*******************************Скрываем/открываем поля ответственных лиц******************************/
	if($("#otv_type_e").val() == 3){
			$('div[class="otv_l_eh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_eh_st"]').css({'display': 'none'});
			$('div[class="otv_l_eh_instr"]').css({'display': 'block'});
				var secondname_ruk = $('input[name="dir_fam"]').val();
				var firstname_ruk = $('input[name="dir_name"]').val();
				var lastname_ruk = $('input[name="dir_otch"]').val();

				/*if(($('input[name="dir_fam"]').val()).length > 0){
					$("tr[id_otv_eh_instr='4'] td[name='otv_fio_eh_osn_instr']").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
					//$("#dir_instr").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
				}else{
					$("tr[id_otv_eh_instr='4'] td[name='otv_fio_eh_osn_instr']").html("не заполнено ФИО руководителя организации");
					//$("#dir_instr").html("не заполнено ФИО руководителя организации");
				}*/		
	}
	if($("#otv_type_e").val() == 2){
			$('div[class="otv_l_eh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_eh_st"]').css({'display': 'block'});
			$('div[class="otv_l_eh_instr"]').css({'display': 'none'});	
	}	
	if($("#otv_type_e").val() == 1){
			$('div[class="otv_l_eh_sob"]').css({'display': 'block'});
			$('div[class="otv_l_eh_st"]').css({'display': 'none'});
			$('div[class="otv_l_eh_instr"]').css({'display': 'none'});


			/*event.preventDefault();*/
			var formData = new FormData();
			formData.append('id_unp', $('#formUnpId').val());

					$.ajax({
						url: '/ARM/basis/subject/getUnpforOtv/',
						type: 'POST',
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
							//console.log(result);		
							data = $.parseJSON(result);
							
							fio_otv ="<option value= '0'>Выберите ответственное лицо</option>";
						
								$.each(data, function(i,val){							
									fio_otv =fio_otv+"<option value= "+val['reestr_personal_id']+">"+val['reestr_personal_secondname']+" "+val['reestr_personal_firstname']+" "+val['reestr_personal_lastname']+"</option>";								
								})
								$("#otv_eh_osn_sob").html(fio_otv);
		

						}
					});			
						
	}	
	
	
	if($("#otv_type_t").val() == 3){
			$('div[class="otv_l_th_sob"]').css({'display': 'none'});
			$('div[class="otv_l_th_st"]').css({'display': 'none'});
			$('div[class="otv_l_th_instr"]').css({'display': 'block'});
				var secondname_ruk = $('input[name="dir_fam"]').val();
				var firstname_ruk = $('input[name="dir_name"]').val();
				var lastname_ruk = $('input[name="dir_otch"]').val();

				/*if(($('input[name="dir_fam"]').val()).length > 0){
					$("tr[id_otv_eh_instr='4'] td[name='otv_fio_eh_osn_instr']").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
					//$("#dir_instr").html(secondname_ruk+" "+firstname_ruk+" "+lastname_ruk);
				}else{
					$("tr[id_otv_eh_instr='4'] td[name='otv_fio_eh_osn_instr']").html("не заполнено ФИО руководителя организации");
					//$("#dir_instr").html("не заполнено ФИО руководителя организации");
				}*/		
	}
	if($("#otv_type_t").val() == 2){
			$('div[class="otv_l_th_sob"]').css({'display': 'none'});
			$('div[class="otv_l_th_st"]').css({'display': 'block'});
			$('div[class="otv_l_th_instr"]').css({'display': 'none'});	
	}	
	if($("#otv_type_t").val() == 1){
			$('div[class="otv_l_th_sob"]').css({'display': 'block'});
			$('div[class="otv_l_th_st"]').css({'display': 'none'});
			$('div[class="otv_l_th_instr"]').css({'display': 'none'});


			/*event.preventDefault();*/
			var formData = new FormData();
			formData.append('id_unp', $('#formUnpId').val());

					$.ajax({
						url: '/ARM/basis/subject/getUnpforOtv/',
						type: 'POST',
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
							//console.log(result);		
							data = $.parseJSON(result);
							
							fio_otv ="<option value= '0'>Выберите ответственное лицо</option>";
						
								$.each(data, function(i,val){							
									fio_otv =fio_otv+"<option value= "+val['reestr_personal_id']+">"+val['reestr_personal_secondname']+" "+val['reestr_personal_firstname']+" "+val['reestr_personal_lastname']+"</option>";								
								})
								$("#otv_th_osn_sob").html(fio_otv);
		

						}
					});			
						
	}		
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
	
		if($("input[name='custom_name']").val() == 1){
			
			$("textarea[name='name_potr']").prop('disabled', false);
		}else{
			
			$("textarea[name='name_potr']").prop('disabled', true);
		}
	// Кнопка "Добавить населенный пункт" активна если заполнено юр. лицо или физ. лицо	
		if($('#formUnpId').val() > 0 || $('#formIndPersId').val()>0){
			$('#cityToName').prop('disabled', false);
			$('#custom_name').prop('disabled', false);
		}
	if(window.location.href.indexOf("subject/edit") != -1){
		
		oldData = new FormData(formPage);
		
		/// отдельно добавляем информацию из полей disabled или display:none
		
		oldData.append('name_potr', $('#name_potr').val());
		oldData.append('indexPost', $('#formIndexPost').val());
		oldData.append('regionNamePost', $('#formRegionPost').val());
		oldData.append('districtNamePost', $('#formDistrictPost').val());
		oldData.append('cityNamePost', $('#formCityPost').val());
		oldData.append('cityZoneNamePost', $('#formCityZonePost').val());
		oldData.append('streetNamePost', $('#formStreetPost').val());	
		oldData.append('spr_type_street_post', $('#spr_type_street_post').val());	
		oldData.append('spr_type_city_post', $('#spr_type_city_post').val());		
		oldData.append('buildingNumberPost', $('#formBuildingPost').val());
		oldData.append('flatNumberPost', $('#formFlatPost').val());
		oldData.append('branchNameObject', $('#formBranchObject').val());
		oldData.append('podrazdelenieNameObject', $('#formPodrazdelenieObject').val());
		oldData.append('otdelNameObject', $('#formOtdelObject').val());
		oldData.append('e_copy_postaddress', $('#e_copy_postaddress').val());
		oldData.append('custom_name', $('#custom_name').val());
		oldData.append('email', $('#email').val());
		
		
		
		
	}
	
	/***** подсчет количества потребителей и объектов по напр. деятельности */

	$('#allSubjects').html($('.main_table tbody tr').length);
	
	
	if(window.location.href.indexOf("subject/list") != -1){
	
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
	}						
	
	/***********************************************************************/
	
	if(window.location.href.indexOf("subject/create") != -1){
		
		if($.cookie('access_level') > 2){
			$("#formPage select").prop('disabled', true);
			$("#formPage input").prop('disabled', true);
			$("#formPage textarea").prop('disabled', true);
			$("#formPage button").css({'display': 'none'});
			$("#formPage a").css({'pointer-events': 'none'});
			$(".w4").css({'width': '0'});
			//$(".nav_buttons").css({'display': 'none'});
		}
	}
	
	

	
	
});	


