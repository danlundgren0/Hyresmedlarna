var DanLBankId = DanLBankId || {};
var DanLAction = DanLAction || {};
var allFieldsValid = false;
var personalNumberIsValid = false;
var emailIsValid = false;
var pwValid = false;
var firstName = false;
var lastName = false;
var streetAddress = false;
var city = false;
var telephone = false;
var zip = false;
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
                    console.log('Status: '+data.data.response['status']);
                    setTimeout( DanLAction.command.tryLogin, 3000, or);
                }
                else if(data.data.response['status'].length>0 && data.data.response['status']=='complete') {
                    $('#bi_name').val(data.data.response.completionData.user['name']);
                    console.log('Status: '+data.data.response['status']);
                    console.log('BEFORE Form submit');
                    $('#reg-form').submit();                    
                    console.log('AFTER Form submit');
                }
                console.log('data');
                console.log(data);
            }
            else {
                console.log('login failed');   
            }
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            console.log('tryLogin failed: ' + textStatus);
        });
    },
    verifyPersonalNumber: function() {
        var textfield = $(this).get(0);
        //textfield.setCustomValidity('');
        var input = $(this).val();
        var format = 'DEFAULT';        
        if (input.length < 1) { return; }
        
        var res = formator.personalid(input, format);
        if(res) {
            personalNumberIsValid = true;
            textfield.setCustomValidity('');
        }
        else {
            textfield.setCustomValidity('Felaktigt personnummer');
            personalNumberIsValid = false;            
        }
        textfield.reportValidity();
    },
    verifyEmailAddress: function() {
        var inputVal = $(this).val();
        var textfield = $(this).get(0);
        if(!formator.email(inputVal)) {
            emailIsValid = false;
            textfield.setCustomValidity('Din email adress är felaktig');            
        }
        else {
            emailIsValid = true;
            textfield.setCustomValidity('');
        }
        textfield.reportValidity();
        //var textfield = $(this).get(0);

        //textfield.setCustomValidity('');

    },
    verifyFirstName: function() {
        var textfield = $(this).get(0);
        //textfield.setCustomValidity('');
        var inputVal = $(this).val();
        textfield.setCustomValidity('');
        if(inputVal.length==0) {
        	firstName = false;
            textfield.setCustomValidity('Fältet får inte vara tomt');
        }
        else {
        	firstName = true;
        }
        textfield.reportValidity();
    },
    verifyLastName: function() {
        var textfield = $(this).get(0);
        var inputVal = $(this).val();
        textfield.setCustomValidity('');
        if(inputVal.length==0) {
        	lastName = false;
            textfield.setCustomValidity('Fältet får inte vara tomt');
        }
        else {
        	lastName = true;
        }
        textfield.reportValidity();
    },
    verifyStreetAddress: function() {
        var textfield = $(this).get(0);
        var inputVal = $(this).val();
        textfield.setCustomValidity('');
        if(inputVal.length==0) {
        	streetAddress = false;
            textfield.setCustomValidity('Fältet får inte vara tomt');
        }
        else {
        	streetAddress = true;
        }
        textfield.reportValidity();
    },
    verifyCity: function() {
        var textfield = $(this).get(0);
        textfield.setCustomValidity('');
        var inputVal = $(this).val();
        if(inputVal.length==0) {
        	city = false;
            textfield.setCustomValidity('Fältet får inte vara tomt');
        }
        else {
        	city = true;
        }
        textfield.reportValidity();
    },
    verifyZip: function() {
        var textfield = $(this).get(0);
        textfield.setCustomValidity('');
        var inputVal = $(this).val();
        if(inputVal.length==0) {
        	zip = false;
            textfield.setCustomValidity('Fältet får inte vara tomt');
        }
        else {
        	zip = true;
        }
        textfield.reportValidity();
    },
    verifyTelephone: function() {
        var textfield = $(this).get(0);
        textfield.setCustomValidity('');
        var inputVal = $(this).val();
        if(inputVal.length==0) {
        	telephone = false;
            textfield.setCustomValidity('Fältet får inte vara tomt');
        }
        else {
        	telephone = true;
        }
        textfield.reportValidity();
    },
    verifyEqualPasswords: function(el1, el2) {
        var textfield1 = $(el1).get(0);
        var textfield2 = $(el2).get(0);
        textfield1.setCustomValidity('');
        //textfield2.setCustomValidity('');
        var p1 = $(el1).val();
        var p2 = $(el2).val();
        var format = 'DEFAULT';        
        if (p1=='' || p2=='') { return; }
        var isPwEqual = p1==p2;
        var isPwLen8 = p1.length>7 && p2.length>7;
        //var res = p1==p2 && p1.length>7 && p2.length>7;
        if(isPwEqual && isPwLen8) {
            pwValid = true;
        }
        else {
            if(!isPwEqual) {
                textfield1.setCustomValidity('Lösenorden stämmer inte överens');
            }
            else if(!isPwLen8) {
                textfield1.setCustomValidity('Lösenordet måste vara minst 8 tecken');
            }
            pwValid = false;
            //$('[name="tx_form_formframework[tenantform][__currentPage]"]').on('click', function (event) { event.preventDefault(); });
            //$(this).closest('.tx-dl-bankid').find('button').attr('data-status','disabled');
            //$('[data-status="disabled"]').off();    
        }
        textfield1.reportValidity();
    },
    isAllFieldsOk: function() {
        if(
           personalNumberIsValid &&
           emailIsValid &&
           pwValid && 
           firstName &&
           lastName &&
           streetAddress &&
           city &&
           telephone &&
           zip
        ) {
            console.log('All fields is valid');
        	return true;
            //$(this).closest('.tx-dl-bankid').find('button').attr('data-status','enabled');
            //$(this).closest('.tx-dl-bankid').find('[data-status="enabled"]').off();
            //$(this).closest('.tx-dl-bankid').find('[data-status="enabled"]').on('click', DanLAction.command.trySign);
        }
        else {
        	console.log('personalNumberIsValid: '+personalNumberIsValid); 
        	console.log('emailIsValid: '+emailIsValid); 
        	console.log('pwValid: '+pwValid); 
        	console.log('firstName: '+firstName); 
        	console.log('lastName: '+lastName); 
        	console.log('streetAddress: '+streetAddress); 
        	console.log('city: '+city); 
        	console.log('telephone: '+telephone); 
        	console.log('zip: '+zip); 
            console.log('Some fields not valid'); 
            return false;
        }
    },
    submitForm: function() {
    	event.preventDefault();
    	//$('#reg-form').submit();
    	
    	if(DanLAction.command.isAllFieldsOk()) {
            console.log('submitForm isAllFieldsOk');
            //$(this).closest('form').submit();
            //$('#reg-form').submit();
    		DanLAction.command.trySign();
    	}
    	else {
    		//do nothing
    	}
    	console.log('submit clicked');
    }
}
$(function() {   
	/*
    $('[name="tx_form_formframework[tenantform][__currentPage]"]').on('click', function() {
        console.log('isAllFieldsOk');
        DanLAction.command.isAllFieldsOk();
    });
    */
    //$('#tenantform-email').on('input', DanLAction.command.verifyEmailAddress);
    $('#send').on('click', DanLAction.command.submitForm);
    /*$('#reg-form').submit(function(event){
      event.preventDefault();
    });*/
    //$('#reg-form').submit(DanLAction.command.submitForm);
    //$('#submit').on('click', DanLAction.command.submitForm);
/*
    DanLAction.command.verifyEmailAddress($('#email'));
    DanLAction.command.verifyFirstName($('#fn'));
    DanLAction.command.verifyLastName($('#ln'));
    DanLAction.command.verifyStreetAddress($('#sa'));
    DanLAction.command.verifyCity($('#city'));
    DanLAction.command.verifyZip($('#zip'));
    DanLAction.command.verifyTelephone($('#mobile'));
    DanLAction.command.verifyPersonalNumber($('#pn'));
    DanLAction.command.verifyEqualPasswords($('#pw'));
    DanLAction.command.verifyEqualPasswords($('#pw2'));
    DanLAction.command.verifyTelephone($('#mobile'));
*/

    //document.getElementById('emailEl').addEventListener('change', DanLAction.command.verifyEmailAddress, true);
    $('#emailEl').on('input', DanLAction.command.verifyEmailAddress);
    $('#fn').on('input', DanLAction.command.verifyFirstName);
    $('#ln').on('input', DanLAction.command.verifyLastName);
    $('#sa').on('input', DanLAction.command.verifyStreetAddress);
    $('#city').on('input', DanLAction.command.verifyCity);
    $('#zip').on('input', DanLAction.command.verifyZip);
    $('#mobile').on('input', DanLAction.command.verifyTelephone);
    /*
    $('[type="text"],#zip,#mobile').on('change invalid', function() {
        var textfield = $(this).get(0);
        //textfield.setCustomValidity('');
        if (!textfield.validity.valid) {
          textfield.setCustomValidity('Fältet får inte vara tomt');  
        }
    });
    */
    $('#pn').on('input', DanLAction.command.verifyPersonalNumber);
    $('#pw').on('change', function () {
        DanLAction.command.verifyEqualPasswords($(this), $('#pw2'));
    });
    $('#pw2').on('change', function () {
        DanLAction.command.verifyEqualPasswords($(this), $('#pw'));
    });

    /*
    $('#tenantform-email').on('input', DanLAction.command.verifyEmailAddress);
    $('#tenantform-social_security_number').on('input', DanLAction.command.verifyPersonalNumber);
    $('#tenantform-password-1').on('input', function () {
        DanLAction.command.verifyEqualPasswords($(this), $('#tenantform-password-2'));
    });
    $('#tenantform-password-2').on('input', function () {
        DanLAction.command.verifyEqualPasswords($(this), $('#tenantform-password-1'));
    });
    */   //DanLAction.command.trySign();
});
