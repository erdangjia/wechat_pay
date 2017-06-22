<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);
/**
 * 1、Autor:826096331@qq.com
 */
require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';
$notify = new NativePay();
//商户订单号
$WIDout_trade_no = $_POST['WIDout_trade_no'];
//订单描述
$WIDsubject = $_POST['WIDsubject'];
//订单金额
$WIDtotal_fee = $_POST['WIDtotal_fee']*100;
$WIDbody = $_POST['WIDbody'];
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */

$order_money = $_POST['WIDtotal_fee']*100;
$input = new WxPayUnifiedOrder();
$input->SetBody($_POST['WIDbody']);
$input->SetAttach($_POST['WIDsubject']);
$input->SetOut_trade_no($_POST['WIDout_trade_no']);
$input->SetTotal_fee($order_money);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag($_POST['WIDbody']);

$input->SetNotify_url("http://pay.erdangjiade.com/pay_demo/Wxpay/example/notify.php");

$input->SetTrade_type("NATIVE");

$input->SetProduct_id($_POST['WIDout_trade_no']);

$result = $notify->GetPayUrl($input);

$url2 = $result["code_url"];

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>二当家的微信支付样例</title>
</head>
<body>
	<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">二当家的微信支付接口demo</div><br/>
	<img alt="模式二扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="width:150px;height:150px;"/>
	
</body>
</html>