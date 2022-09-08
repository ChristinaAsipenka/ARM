var address = {

	ajaxMethod: 'POST',
	
	selectDistrict: function(addressType, val){

		var addStrNext ='';
		var addStr = '';
		
		var formData = new FormData();
		 
		 if(addressType === 'Fact'){
			addStr = 'Fact'; 
			addStrNext = 'Post'; 
		 }	
		 if(addressType === 'Post'){
			addStr = 'Post'; 
			//addStrNext = 'Fact'; 
		 }
		 if(addressType === 'Object'){
			addStr = 'Object'; 
		addStrNext ='';
		 }
		 
		if (val == undefined){
			
			val = false;
				if($('#formRegion' + addStr).val() > 0){
				param = $('#formRegion' + addStr).val();
				}else{
				param = $('#openModalGuides #formRegion' + addStr).val();
				}
		}else{
			param = val;
		} 
		 
 
		formData.append('idRegion', param);
		
		$('#formDistrict' + addStr).val(0);
		$('#formCity' + addStr).val(0);
		$('#formCityZone' + addStr).val(0);

		$.ajax({
            url: '/ARM/address/selectdistrict/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
				
				if($('#formRegion' + addStr).val() > 0){
					$('#formDistrict' + addStr).html(result);
				}else{
					$('#openModalGuides #formDistrict' + addStr).html(result);
				}
				

				if($('#e_copy_postaddress').val() != 1){
					$('#formRegion' + addStrNext + ' option[value="'+$('#formRegion' + addStr).val()+'"]').prop('selected', true);
					$('#formDistrict' + addStrNext).html(result);
				}
				
            }
        });
	},
	
	selectCity: function(addressType, val){
		
		if(val == undefined){
			val = false;
				if($('#formDistrict' + addStr).val() > 0){
					param = $('#formDistrict' + addStr).val();
				}else{
					param = $('#openModalGuides #formDistrict' + addStr).val();
				}
		}
		
		var addStrNext ='';
		var addStr = '';
		
		 if(addressType === 'Fact'){
			addStr = 'Fact'; 
			addStrNext = 'Post'; 
		 }	
		 if(addressType === 'Post'){
			addStr = 'Post'; 
		//	addStrNext = 'Fact';
		 }
		 if(addressType === 'Object'){
			addStr = 'Object';
			addStrNext ='';			
		 }
		
		
		var formData = new FormData();
		
				if($('#formDistrict' + addStr).val() > 0){
					formData.append('idDistrict', $('#formDistrict' + addStr).val());
				}else{
					formData.append('idDistrict', $('#openModalGuides #formDistrict' + addStr).val());
				}		

		$('#formCity' + addStr).val(0);
		$('#formCityZone' + addStr).val(0);
		$.ajax({
            url: '/ARM/address/selectcity/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
               
				if($('#formDistrict' + addStr).val() > 0){
					$('#formCity' + addStr).html(result);
				}else{
					$('#openModalGuides #formCity' + addStr).html(result);
				}

				
			if($('#e_copy_postaddress').val() != 1){
				$('#formDistrict' + addStrNext + ' option[value="'+$('#formDistrict' + addStr).val()+'"]').prop('selected', true);
				$('#formCity' + addStrNext).html(result);
			}
				
			}
        });
	},
	selectCityZone: function(addressType, val){
		
		if (val == undefined) val = false;
		var addStrNext ='';
		var addStr = '';
		 if(addressType === 'Fact'){
			addStr = 'Fact'; 
			addStrNext = 'Post'; 
		 }	
		 if(addressType === 'Post'){
			addStr = 'Post'; 
		 }
		 if(addressType === 'Object'){
			addStr = 'Object'; 
		 }
		
		var formData = new FormData();
		   
		formData.append('idCity', $('#formCity' + addStr).val());
		
		$('#formCityZone' + addStr).val(0);
		$.ajax({
            url: '/ARM/address/selectcityzone/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
				$('#formCityZone' + addStr).html(result);
             if($('#e_copy_postaddress').val() != 1){
				$('#formCity' + addStrNext + ' option[value="'+$('#formCity' + addStr).val()+'"]').prop('selected', true);
               $('#formCityZone' + addStrNext).html(result);
            }
            }
        });
	},
	
	
	selectPodrazdelenie: function(addressType){
		var addStr = '';
		var formData = new FormData();
		 
		 if(addressType === 'Object'){
			addStr = 'Object'; 
		 }
		 
				if($('#formBranch' + addStr).val() > 0){
				param = $('#formBranch' + addStr).val();
				}else{
				param = $('#openModalGuides #formBranch' + addStr).val();
				} 
		 
		//console.log(param);
		formData.append('idBranch', param);

		$('#formPodrazdelenie' + addStr).val(0);
		$('#formOtdel' + addStr).val(0);
		
		$.ajax({
            url: '/ARM/address/selectpodrazdelenie/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
          //      console.log(result);
              // $('#formPodrazdelenie' + addStr).html(result);
			   
			   
				if($('#formBranch' + addStr).val() > 0){
					$('#formPodrazdelenie' + addStr).html(result);
				}else{
					$('#openModalGuides #formPodrazdelenie' + addStr).html(result);
				}
			   
			   
			   
            }
        });
	},
	selectOtdel: function(addressType){
		var addStr = '';
		var formData = new FormData();
		 
		 if(addressType === 'Object'){
			addStr = 'Object'; 
		 }
		 
		formData.append('idPodrazdelenie', $('#formPodrazdelenie' + addStr).val());

		$('#formOtdel' + addStr).val(0);
		
		$.ajax({
            url: '/ARM/address/selectotdel/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
               // console.log(result);
               $('#formOtdel' + addStr).html(result);
            }
        });
	},


	selectStreet: function(){

		$('#formStreetPost').val($('#formStreetFact').val());

	},


	selectBuilding: function(){

		$('#formBuildingPost').val($('#formBuildingFact').val());

	},

	selectFlat: function(){

		$('#formFlatPost').val($('#formFlatFact').val());

	},

	selectIndex: function(){

		$('#formIndexPost').val($('#formIndexFact').val());

	},

	selectcityZoneName: function(){

		cityzone = $('#formCityZoneFact').val();
		$('#formCityZonePost option[value="'+cityzone+'"]').prop('selected', true);

	}	

	
}