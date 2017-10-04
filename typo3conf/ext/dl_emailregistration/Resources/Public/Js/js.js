DanL.EmailReg = {
    validateEmail: function() {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        if(pattern.test($(this).val())) {
            $(this).closest('.tx-dl-emailregistration').find('button').attr('data-status','enabled');
            $(this).closest('.tx-dl-emailregistration').find('[data-status="enabled"]').off();
            $(this).closest('.tx-dl-emailregistration').find('[data-status="enabled"]').on('click', DanL.EmailReg.tryRegisterEmail);
        }
        else {
        	$(this).closest('.tx-dl-emailregistration').find('button').attr('data-status','disabled');
        	$('[data-status="disabled"]').off();	
        }
    },
    tryRegisterEmail: function() {
        var alertsContainer = $(this).closest('.sendmail');
        var type = $(this).attr('data-type');
        var status = $(this).attr('data-status');
        var email = $(this).closest('.tx-dl-emailregistration').find('input').val();
        DanL.ajax.fetch({
            command: 'registerEmail',
            arguments: {
                type: type,
                status: status,
                email: email
            }
        }).done(function(data, textStatus, jqXHR) {
            if(data && data.data) {
                switch(data.data['success']) {
                    case -1:
                        DanL.EmailReg.emailSomethingWentWrong(alertsContainer, data.data['message']);
                        break;
                    case 0:
                        DanL.EmailReg.emailExists(alertsContainer, data.data['message']);
                        break;
                    case 1:
                        DanL.EmailReg.emailRegisteredOk(alertsContainer, data.data['message']);
                        break;
                    default:
                        break;
                }
            }
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            console.log('tryRegisterEmail failed: ' + textStatus);
        });
        
    },
    emailExists: function(alertsContainer, mess) {
        var alertOkEl = $(alertsContainer).find('.reg-ok');
        var alertErrorEl = $(alertsContainer).find('.reg-error');
        if(!$(alertOkEl).hasClass('hide')) {
            $(alertOkEl).addClass('hide');
        }
        $(alertErrorEl).find('span').html(mess);
        $(alertErrorEl).removeClass('hide');
    },
    emailRegisteredOk: function(alertsContainer, mess) {
        var alertOkEl = $(alertsContainer).find('.reg-ok');
        var alertErrorEl = $(alertsContainer).find('.reg-error');
        if(!$(alertErrorEl).hasClass('hide')) {
            $(alertErrorEl).addClass('hide');
        }
        $(alertOkEl).find('span').html(mess);
        $(alertOkEl).removeClass('hide');
    },
    emailSomethingWentWrong: function(alertsContainer, mess) {
        var alertOkEl = $(alertsContainer).find('.reg-ok');
        var alertErrorEl = $(alertsContainer).find('.reg-error');
        if(!$(alertOkEl).hasClass('hide')) {
            $(alertOkEl).addClass('hide');
        }
        $(alertErrorEl).find('span').html(mess);
        $(alertErrorEl).removeClass('hide');
    },
}
$(function() { 
    $('[data-action="validate"]').on('input', DanL.EmailReg.validateEmail);    
});