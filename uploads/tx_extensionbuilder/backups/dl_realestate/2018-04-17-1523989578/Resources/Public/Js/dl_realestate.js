var DanL = DanL || {};
var DanLRealEstate = DanLRealEstate || {};
var noOfValidFields = 0;
var noOfRequiredFields = 0;
DanL.ajax = {
	fetch: function(params){
		return $.ajax({
			type: 'GET',
			url: '/?type=777888',
			data: { command: params.command, arguments: params.arguments, L: params.syslanguage },
			dataType: 'json',
		});
	}
}
DanLRealEstate.command = {
    verifyNotEmptyField: function(el) {
    	//var me = (el)
    	var retVal = 0;
    	if(el) {
    		console.log(el);
    		//$(this) = $(el);	
    	}
        var textfield = $(el).get(0);
        //textfield.setCustomValidity('');
        var inputVal = $(el).val();
        textfield.setCustomValidity('');
        if(inputVal.length==0) {        	
            textfield.setCustomValidity('Fältet får inte vara tomt');
            retVal = 0;
        }
        else {
        	retVal = 1;
        }
        textfield.reportValidity();
        return retVal;
    },
    isAllFieldsOk: function() {
    	event.preventDefault();
    	noOfRequiredFields = $('.required').closest('.form-group').find('input').length;
    	$('.required').closest('.form-group').find('input').each(function() {
    		isValid = DanLRealEstate.command.verifyNotEmptyField($(this));
    		noOfValidFields+=isValid;
    	});
    	if(noOfValidFields == noOfRequiredFields) {
    		$('[name="newRealestate"]').submit();
    		//$('[type="submit"]').submit();
    	}
    	noOfValidFields = 0;
    }
}
$(function() {	
	//$('[type="submit"]').on('click', DanLRealEstate.command.isAllFieldsOk);
    $('.real-estate-submit').on('click', DanLRealEstate.command.isAllFieldsOk);
    
	$('.required').closest('.form-group').find('input').on('change', function() {
		DanLRealEstate.command.verifyNotEmptyField($(this));
	});
	console.log($('.required').closest('.form-group').find('input'));
});
