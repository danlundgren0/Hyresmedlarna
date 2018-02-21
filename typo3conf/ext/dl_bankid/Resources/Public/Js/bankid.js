/*var DanLBankId = DanLBankId || {};
var DanLAction = DanLAction || {};
DanLBankId.ajax = {
	fetch: function(params){
		return $.ajax({
			type: 'GET',
			url: '/?type=666',
			data: { command: params.command, arguments: params.arguments, L: params.syslanguage },
			dataType: 'json',
		});
	}
}
DanLAction.command = {
    trySign: function() {
        DanLBankId.ajax.fetch({
            command: 'trySign',
            arguments: {
                mess: 'Hej'
            }
        }).done(function(data, textStatus, jqXHR) {
            if(data && data.data) {
            	console.log('data');
            	console.log(data);
            }
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            console.log('tryRegisterEmail failed: ' + textStatus);
        });
        
    },
}
$(function() { 
   DanLAction.command.trySign();
});
*/