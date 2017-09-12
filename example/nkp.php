<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';

//模式一
/**
 * 流程：
 * 1、组装包含支付信息的url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
 * 5、支付完成之后，微信服务器会通知支付成功
 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$notify = new NativePay();
$url1 = $notify->GetPrePayUrl("123456789");
echo 'ln 12 = '.$url1;
//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$input = new WxPayUnifiedOrder();
$input->SetBody("test");										// anything
$input->SetAttach("test");										// must match
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));		// trade Number = append time stamp at the end; date("YmdHis") is imperative.

$fee = $_POST['fee']; echo "<br>"."fee = ".$fee;

$input->SetTotal_fee($fee);

$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
 $input->SetNotify_url("example/notify.php");	// imperative
 // http://paysdk.weixin.qq.com/example/notify.php
$input->SetTrade_type("NATIVE");
$input->SetProduct_id("123456789");		// anything

$result = $notify->GetPayUrl($input);	// == WxPayApi::unifiedOrder($input);
										// input is array
										// unifiedOrder($input)
										// $xml = $inputObj->ToXml();
										//			$url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
/**
														$response = self::postXmlCurl($xml, $url, false, $timeOut);
															$result = WxPayResults::Init($response);
															self::reportCostTime($url, $startTimeStamp, $result);		//上报请求花费时间

																return $result;
***/

$url2 = $result["code_url"];
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
    <title>微信支付样例-退款</title>
	
	
	
	
	
	
	<script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
	
	<script src="./keypadjs/keypad.js"></script>
	
	<style>
	
	
		.keypad {
			position: absolute;
			width: 100%;
			bottom: 0;
			left: 0;
			top: 0;
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
        }


	</style>

</head>
	<body>
		<form action="" method = 'POST'>
			<input id="inputText" name = "fee" type="text" placeholder="Enter price"/>
			<input type = 'submit' value = 'confirm'>
		</form>
		
	

	</body>
</html>
