var menu = {
    listItems: $('#listItems'),

    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();
        var menuName = $('#menuName').val();

        formData.append('name', menuName);

        if (menuName.length < 1) {
            return false;
        }

        $.ajax({
            url: '/ARM/admin/setting/ajaxMenuAdd/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                if (result > 0) {
                    location.reload();
                }
            }
        });
    },
    addItem: function(menuId) {
        var formData = new FormData();

        formData.append('menu_id', menuId);
	
        if (menuId < 1) {
            return false;
        }

        var _this = this;
        $.ajax({
            url: '/ARM/admin/setting/ajaxMenuAddItem/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                if (result) {
			//	console.log(result);
				_this.listItems.append(result);
                }
            }
        });
    },
	
	
	 updateItem: function(itemId, field, element) {
        var formData = new FormData();

        formData.append('item_id', itemId);
        formData.append('field', field);
        formData.append('value', $(element).val());

        if (itemId < 1) {
            return false;
        }

        var _this = this;
        $.ajax({
            url: '/ARM/admin/setting/ajaxMenuUpdateItem/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                if (result) {

                }
            }
        });
    },
	
	
    removeItem: function(itemId) {

        if(!confirm('Вы действительно хотите удалить данного потребителя?')) {
            return false;
        }

        var formData = new FormData();

        formData.append('item_id', itemId);

        if (itemId < 1) {
            return false;
        }

        $.ajax({
            url: '/ARM/admin/setting/ajaxMenuRemoveItem/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                $('.menu-item-' + itemId).remove();
            }
        });
    }
};