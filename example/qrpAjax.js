$(document).ready(function(){
	$('#qrpConfirm').click(function(){
		$.post(

			$('#qrp').attr('action'),

			$('#qrp :input').serializeArray(),

				function(returnData){

					if(returnData){
						// use js to change front end rendering
						//	$('#qrp :input').val('');
							console.log('ln 13 = '+returnData);
							returnData = $.parseJSON(returnData);

						try{
							var qr = $.parseJSON(returnData);
							console.log('try ln 17 = '+qr);
						}
						catch(e)
						{
							console.log('ln 15 error ='+e);
						}
						renderFrontEnd(returnData);

					}

				}
		)
		.done(
			function(){
				// alert('ln 32');
			}
		);

	});

	$('#qrp').submit(function(){
		return false;

	});


});

function renderFrontEnd(returnData){

	
	var qrl = returnData['code_url']; // encodeURI(returnData);
		console.log('ln 51 = '+qrl);
	$('#qrc').css({"display":"inline"});

	// alert(returnData);
	$('#qrc').attr('src', "http://paysdk.weixin.qq.com/example/qrcode.php?data="+qrl);


}