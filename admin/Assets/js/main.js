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