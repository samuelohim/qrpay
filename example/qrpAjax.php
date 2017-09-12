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
// $url1 = $notify->GetPrePayUrl("123456789");
// echo 'ln 12 = '.$url1;
//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */

$fee = $_POST['fee'];	// echo "<br>"."ln 32 fee = ".$fee."<br>";
$qty = $_POST['qty']; // $_POST['qty'];	echo "<br>"."ln 55 fee = ".$fee."<br>";
$totalfee = $qty * $fee;

$input = new WxPayUnifiedOrder();
$input->SetBody("test");										// anything
$input->SetAttach("test");										// must match
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));		// trade Number = append time stamp at the end; date("YmdHis") is imperative.
$input->SetTotal_fee($totalfee);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");

$input->SetNotify_url(WxPayConfig::NOTIFY_URL);	// imperative
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

// var_dump($result);

echo json_encode($result); // var_dump($result); // echo $result["code_url"];


?>