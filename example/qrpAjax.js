$(document).ready(function(){
	$('#qrpConfirm').click(function(){


		$.post(

			$('$qrp').attr('action'),
			$('#qrp :input').serializeArray(),

			function(returnData){
				if(returnData){
					// use js to change front end rendering

					
					try
						var qr = $.parseJSON(returnData);
					catch(e)
					{
						console.log('ln 15 error ='+e);
					}
					renderFrontEnd(qr);
				}
			}

		)
		.success(function(){

			renderFrontEnd();
		});

		$('#qrp').submit(function(){
			return false;
		});
	});

});

function renderFrontEnd(){

}