var calc_units = {
	
	
	show: function(){

		$('#calc_units').show();

	},
	
	
	hide: function(){

		$('#calc_units').hide();
		
		$("input[name='units_GK']").val('');
		$("input[name='units_KV']").val('');
		$("input[name='units_GDz']").val('');

	}
	
	
};

$(window).ready(function(){


	
		
		$( "#units_GK" ).bind( "input", function() {
			var sum1 = parseFloat($("#units_GK").val());
				if (isNaN(sum1)) { sum1 = 0;}
					$('#units_KV').val(Number(sum1*1163));
					x = new BigNumber(sum1);
					y = x.multipliedBy(4.1868);
					$('#units_GDz').val(y);
				});
		
		
		$( "#units_KV" ).bind( "input", function() {
			
				if (isNaN(parseFloat($("#units_KV").val()))) { 
					var kv = new BigNumber(0);
				}else{
					var kv = new BigNumber(parseFloat($("#units_KV").val()));
				}
				
					var gk = new BigNumber(kv.dividedBy(1163));
					$('#units_GK').val(gk);
					y = kv.multipliedBy(0.0036);
					$('#units_GDz').val(y);
				});		
	
		$( "#units_GDz" ).bind( "input", function() {
				
				if (isNaN(parseFloat($("#units_GDz").val()))) { 
					var gd = new BigNumber(0);
				}else{
					var gd = new BigNumber(parseFloat($("#units_GDz").val()));
				}
				
				
					var gk = new BigNumber(gd.dividedBy(4.1868));
					$('#units_GK').val(gk);
					y = gd.dividedBy(0.0036);
					$('#units_KV').val(y);
				});	

});	
