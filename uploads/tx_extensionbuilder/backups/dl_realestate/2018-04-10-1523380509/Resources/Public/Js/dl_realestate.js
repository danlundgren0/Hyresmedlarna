var DanL = DanL || {};
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
