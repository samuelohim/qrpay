<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="css/mobiscroll.jquery.min.css">
    <script src="js/mobiscroll.jquery.min.js"></script>
    <title>Samuel Yau - QRpay Prototype</title>
	
<script>
	window.addEventListener("touchstart", touchHandler, false);
			function touchHandler(event){
			    if(event.touches.length > 1){
			        //the event is multi-touch
			        //you can then prevent the behavior
			        event.preventDefault()
			    }
			}


			$(function () {

			    $('#qt').mobiscroll().select({
			        theme: 'ios',
			        display: 'center',
			        minWidth: 200
			    });

			});


</script>	
	

	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel = "stylesheet" href = "http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	

    <script src = 'qrpAjax.js' type = 'text/javascript'></script>
	<script src="./keypadjs/keypad.js"></script>

	<style>   
	
	.mbsc-page {
        padding: 1em;
    }
	.mbsc-fr-scroll {
	    background-color: #191818;

	    opacity: 0.9;
	}
    input {
    	float: left;
        width: 50%;
        margin: 0 0 5px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-family: arial, verdana, sans-serif;
        font-size: 10px;
        box-sizing: border-box;
        -webkit-appearance: none;
    }
		.keypad {
                        float: left;
		<!--	position: absolute; --->
			width: 100%;

			left: 0px;
			top: 0px;						
	
		<!---	bottom: 20px; -->
	
		}
		
		.keypad table {
			position: absolute;
			bottom: 0;
			width: 100%;
			text-align: center;
			vertical-align: middle;
			border-collapse: collapse;
			border-spacing: 0;
		}
		
		.keypad table > tbody> tr > td {
			border: 1px solid #aaa;
			height: 65px;
		}
		
		.keypad table button {
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
			border: none;
			background: #023833;
		    outline: none;
		    font-size: 20px;
		    color: #79fff2;
			font-weight: lighter;
		}
		
		.keypad table button.text-sm {
			font-size: 15px;
		}
		
		.keypad table button:active {
			background: #efefef;
		}
		
		h1 { margin:150px auto 30px auto; text-align:center; color:#fff;}
		
	  /*   input {
	              width: 50%;
	              padding: 10px;
	              box-sizing: border-box;
	              margin: 20px 0;
	          } */

        .keypadContainer {
            width:80%;
            height: 400px;
            margin-top: 0px; padding-top: 0px;
        }


	</style>

</head>
	<body>
<!---		<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">
				扫描支付模式一</div><br/>
			<img alt="模式一扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url1);?>" style="width:150px;height:150px;"/>
			<br/><br/><br/>
		<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付模式二</div>
			<br/> -->

<div style = "clear:both"></div>		
     	<div style = 'float: left; margin-bottom: 0px;
height: 255px;
 border: 0px solid yellow; display: inline;'>

				<form  id = 'qrp' action = 'qrpAjax.php' method = 'post' style = 'border: 0px solid blue; margin-bottom: 0px; padding-bottom:0px;
 height: 75px; width: 100%;'>

                <div mbsc-page="" class="demo-basic mbsc-comp"
                          style="float: left;background: #052b3a;padding-top: 15px;padding-bottom: 15px;padding-left: 38px;min-height:72px; width: 50%;" id="mobiscroll1504231876225">
                                        
					<input id="inputText" type="text" name = 'fee' placeholder="输 入 价 钱" size="135" maxlength ="3" />
			</div>		
						
					<div mbsc-page class="demo-basic"
 style = 'float: left; background: #052b3a; min-height: 50px; width: 50%;'>
					    <select id="qty" name = 'qty' style = 'float: left; width: 100%; margin-bottom: 15px; display: block;'>
					    	<option value = '' disabled selected>Quantity</option>
					        <option value="1">1</option>
					        <option value="2">2</option>
					        <option value="3">3</option>
					        <option value="4">4</option>
					        <option value="5">5</option>
					        <option value="6">6</option>
					        <option value="7">7</option>
					        <option value="8">8</option>
					        <option value="9">9</option>
					        <option value="10">10</option>
					    </select>
					    
					</div>

 	<div id = 'qrdiv' style = 'float: left; width:150px; height:198px; margin-left: 100px; display: block;'>
  	   <img id = 'qrc' src ='ot_logo.png' alt="模式二扫码支付" style="float: left; width:150px;height:1506ad6ffpx; margin-top: 28px; display: block;"/>
	</div>

	 				
	 				<div style = 'clear: both;'></div>
					
					
				</form>
     	</div>
		<div class="keypadContainer" style = 'width: 100%; background-color:#c3f3c3; margin-top: 0px; padding-top: 0px;'>
					<div style = 'width: 100%; background-color:#c3c3c3; margin-bottom: 0px; padding-bottom: 10px;'>
						<button type = 'submit' id = 'qrpConfirm' class = 'btn btn-sm btn-block btn-success' style = 'font-size:　38px; position: relative; top： 500px; height: 53px; width: 100%;'><span class = 'glyphicon glyphicon-off' style = 'font-size: 18px;'>&nbsp;确 定！</span>
						</button>
					</div>

		 </div>
		

		<script src="./keypadjs/keypad.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#inputText').keyPad({
					template : '#tpl-keypad',
					isRandom : false,
				});
			/*	$('#password').keyPad({
					//template : '#tpl-keypad',
					isRandom : true,
				}); */
			});
		</script>

		<script id="tpl-keypad" type="script/template">
			<div class="keypad">
				<table>
					<colgroup>
						<col width="33.33%">
						<col width="33.33%">
						<col width="33.33%">
					</colgroup>
					<tbody>
						<tr>
							<td><button type="button" class="1">1</button></td>
							<td><button type="button" class="2">2</button></td>
							<td><button type="button" class="3">3</button></td>
						</tr>
						<tr>
							<td><button type="button" class="4">4</button></td>
							<td><button type="button" class="5">5</button></td>
							<td><button type="button" class="6">6</button></td>
						</tr>
						<tr>
							<td><button type="button" class="7">7</button></td>
							<td><button type="button" class="8">8</button></td>
							<td><button type="button" class="9">9</button></td>
						</tr>
						<tr>
							<td><button type="button" id = 'qrpConfirm' class="text-sm" cmd="clear" style = 'color: #fff; background-color: #FF0F87'>
								清 除
								<span class = 'glyphicon glyphicon-trash'></span>
							</button></td>
							<td><button type="button" class="0">0</button></td>
							<td><button type="button" class="text-sm" style = 'background-color:　#ffaa3e;' cmd="back">

									更 改
									<span class = 'glyphicon glyphicon-remove-circle'></span>
								</button></td>
						</tr>
					</tbody>

				</table>
			</div>

		</script>

		<script>


			$(function () {
    
		        // Mobiscroll Select initialization
		        $('#qty').mobiscroll().select({
		            theme: 'ios',       // Specify theme like: theme: 'ios' or omit setting to use default
		            lang: 'en',         // Specify language like: lang: 'pl' or omit setting to use default
		            display: 'center',  // Specify display mode like: display: 'bottom' or omit setting to use default
		            minWidth: 200       // More info about minWidth: https://docs.mobiscroll.com/select#opt-minWidth
		        });

		        $('#show').click(function () {
		            $('#demo').mobiscroll('show');
		            return false;
		        });
		    
		        $('#clear').click(function () {
		            $('#demo').mobiscroll('clear');
		            return false;
		        });

		    });
    </script>
	</body>
</html>
