<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
    <title>Samuel Yau - QRpay Prototype</title>
	
	
	
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	
	
	<script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
	
	<script src="./keypadjs/keypad.js"></script>
	
<style>
	
	
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
			background: #fff;
			outline: none;
			font-size: 20px;
			font-weight: lighter;
		}
		
		.keypad table button.text-sm {
			font-size: 15px;
		}
		
		.keypad table button:active {
			background: #efefef;
		}
		
		h1 { margin:150px auto 30px auto; text-align:center; color:#fff;}
		
	       input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin: 20px 0;
        }

        .keypadContainer {
            width:80%;
            height: 400px;
            margin-top: 0px; padding-top: 0px;
        }


	</style>

</head>
	<body>
<!---		<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付模式一</div><br/>
		<img alt="模式一扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url1);?>" style="width:150px;height:150px;"/>
		<br/><br/><br/>
		<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付模式二</div><br/> -->
<?php
  if (isset($fee))
  {
?>
		<img alt="模式二扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="float: left; width:100px;height:100px;"/>
<?php
  }
?>
<div style = "clear:both"></div>		
            <div style = 'float: left; margin-bottom: 0px; border: 0px solid yellow;'>
		<form  id = 'qrp' action = 'qrpAjax.php' method = 'post' style = 'border: 0px solid blue; margin-bottom: 0px; padding-bottom:0px; '>
			<input id="inputText" type="text" name = 'fee' placeholder="Enter price"/>
	
		
			<button type = 'submit' id = 'qrpConfirm' class = 'btn btn-sm btn-warning'>confirm</button>
		</form>
             </div>
		<div class="keypadContainer">

		</div>
		
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
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
							<td><button type="button" class="text-sm" cmd="clear">Clear</button></td>
							<td><button type="button" class="0">0</button></td>
							<td><button type="button" class="text-sm" cmd="back">Back</button></td>
						</tr>
					</tbody>

				</table>
			</div>
		</script>


	</body>
</html>
