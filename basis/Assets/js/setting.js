var setting = {
    ajaxMethod: 'POST',


    update: function() {
        var formData = $('#settingForm').serialize();
		/*console.log(formData);*/
		
        $.ajax({
            url: '/ARM/basis/admin/settings/update/',
            type: this.ajaxMethod,
            data: formData,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
            }
        });
    }
};