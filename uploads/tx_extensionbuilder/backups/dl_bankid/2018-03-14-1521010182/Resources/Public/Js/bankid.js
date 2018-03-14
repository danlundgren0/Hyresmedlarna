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
                pn: 'Hej'
            }
        }).done(function(data, textStatus, jqXHR) {
            if(data && data.data && data.data.response && data.data.response['orderRef'] && data.data.response['orderRef'].length>0) {
                console.log(data.data.response['orderRef']);
                console.log(data.data.response['orderRef'].length);
            	console.log('data');
            	console.log(data);
                DanLAction.command.tryLogin(data.data.response['orderRef']);
            }
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            console.log('trySign failed: ' + textStatus);
        });
        
    },
    tryLogin: function(or) {
        var success = false;
        var i=0;
        DanLBankId.ajax.fetch({
            command: 'tryLogin',
            arguments: {
                or: or
            }
        }).done(function(data, textStatus, jqXHR) {
            if(data && data.data && data.data.response && !data.data.response['errorCode']) {
                if(data.data.response['status'].length>0 && data.data.response['status']=='pending') {
                    setTimeout( DanLAction.command.tryLogin, 3000, or);
                }
                console.log('data');
                console.log(data);
            }
            else {
                console.log('login failed');   
            }
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            console.log('trySign failed: ' + textStatus);
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
            $(this).closest('.tx-dl-bankid').find('button').attr('data-status','enabled');
            $(this).closest('.tx-dl-bankid').find('[data-status="enabled"]').off();
            $(this).closest('.tx-dl-bankid').find('[data-status="enabled"]').on('click', DanLAction.command.trySign);
        }
        else {
            console.log('NOT Valid');
            console.log(res);
            $(this).closest('.tx-dl-bankid').find('button').attr('data-status','disabled');
            $('[data-status="disabled"]').off();    
        }
    }
}
$(function() {
    $('[data-action="validate-pn"]').on('input', DanLAction.command.verifyPersonalNumber);
   //DanLAction.command.trySign();
});
