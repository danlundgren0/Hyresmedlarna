var DanLBankId = DanLBankId || {};
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
    verifyPersonalNumber: function() {
        var input = $(this).val();
        var format = 'DEFAULT';        
        if (input.length < 1) { return; }
        
        var res = formator.personalid(input, format);
        if(res) {
            console.log('Valid');
            console.log(res);
            $(this).closest('.tx-dl-emailregistration').find('button').attr('data-status','enabled');
            $(this).closest('.tx-dl-emailregistration').find('[data-status="enabled"]').off();
            //$(this).closest('.tx-dl-emailregistration').find('[data-status="enabled"]').on('click', DanL.EmailReg.tryRegisterEmail);
        }
        else {
            console.log('NOT Valid');
            console.log(res);
            $(this).closest('.tx-dl-emailregistration').find('button').attr('data-status','disabled');
            //$('[data-status="disabled"]').off();    
        }
    }
}
$(function() {
    $('[data-action="validate-pn"]').on('input', DanLAction.command.verifyPersonalNumber);
   //DanLAction.command.trySign();
});
