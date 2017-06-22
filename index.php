<?php
/* *
 * 功能：二当家的支付宝支付接口和微信扫码支付接口集成demo
 * 版本：3.6
 * 日期：2016-06-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 更多请联系：扣扣826096331 或加群：368848856
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>二当家的支付宝支付接口和微信扫码支付接口集成demo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
*{
	margin:0;
	padding:0;
}
ul,ol{
	list-style:none;
}
.title{
    color: #ADADAD;
    font-size: 14px;
    font-weight: bold;
    padding: 8px 16px 5px 10px;
}
.hidden{
	display:none;
}

.new-btn-login-sp{
	border:1px solid #D74C00;
	padding:1px;
	display:inline-block;
}

.new-btn-login{
    background-color: #ff8c00;
	color: #FFFFFF;
    font-weight: bold;
	border: medium none;
	width:82px;
	height:28px;
}
.new-btn-login:hover{
    background-color: #ffa300;
	width: 82px;
	color: #FFFFFF;
    font-weight: bold;
    height: 28px;
}
.bank-list{
	overflow:hidden;
	margin-top:5px;
}
.bank-list li{
	float:left;
	width:153px;
	margin-bottom:5px;
}

#main{
	width:750px;
	margin:0 auto;
	font-size:14px;
	font-family:'宋体';
}
#logo{
	background-color: transparent;
    background-image: url("images/new-btn-fixed.png");
    border: medium none;
	background-position:0 0;
	width:166px;
	height:35px;
    float:left;
}
.red-star{
	color:#f00;
	width:10px;
	display:inline-block;
}
.null-star{
	color:#fff;
}
.content{
	margin-top:5px;
}

.content dt{
	width:160px;
	display:inline-block;
	text-align:right;
	float:left;
	
}
.content dd{
	margin-left:100px;
	margin-bottom:5px;
}
#foot{
	margin-top:10px;
}
.foot-ul li {
	text-align:center;
}
.note-help {
    color: #999999;
    font-size: 12px;
    line-height: 130%;
    padding-left: 3px;
}

.cashier-nav {
    font-size: 14px;
    margin: 15px 0 10px;
    text-align: left;
    height:30px;
    border-bottom:solid 2px #CFD2D7;
}
.cashier-nav ol li {
    float: left;
}
.cashier-nav li.current {
    color: #AB4400;
    font-weight: bold;
}
.cashier-nav li.last {
    clear:right;
}
.erdangjiade_link {
    text-align:right;
}
.erdangjiade_link a:link{
    text-decoration:none;
    color:#8D8D8D;
}
.erdangjiade_link a:visited{
    text-decoration:none;
    color:#8D8D8D;
}
</style>
</head>
<body text=#000000 bgColor=#ffffff leftMargin=0 topMargin=4>
	<div id="main">
		<div id="head">
            <dl class="erdangjiade_link">
                <a target="_blank" href="http://www.erdangjiade.com/"><span>二当家的支付接口</span></a>|
                <a target="_blank" href="http://www.erdangjiade.com/"><span>商家服务</span></a>|
                <a target="_blank" href="http://www.erdangjiade.com/"><span>帮助中心</span></a>
            </dl>
            <span class="title">二当家的PC和手机支付接口快速通道</span>
		</div>
        <div class="cashier-nav">
            <ol>
				<li class="current">1、确认信息 →</li>
				<li>2、点击确认 →</li>
				<li class="last">3、确认完成</li>
            </ol>
        </div>
        <form name=erdangjiadement action="/pay_demo/Alipay/alipayapi.php" method="post" target="_blank" id="form_id">
            <div id="body" style="clear:left">
                <dl class="content">
                    <dt>商户订单号：</dt>
                    <dd>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDout_trade_no" />
                        <span>商户网站订单系统中唯一订单号，<font color="red">必填</font></span>
                    </dd>
                    <dt>订单名称：</dt>
                    <dd>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDsubject" />
                        <span><font color="red">必填</font></span>
                    </dd>
                    <dt>付款金额：</dt>
                    <dd>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDtotal_fee" />
                        <span><font color="red">必填</font></span>
                    </dd>
                    <dt>订单描述</dt>
                    <dd>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDbody" />
						<span><font color="red">微信必填</font></span>
                    </dd>
                    <dd>
                        <th ><em class="type">支付方式：</em></th>
                        <input type="radio" class="message_rd" value="1" id="rd1" name="rd1" checked="checked" />
                        <label class="message_lab" for="rd1"><img src="http://pay.erdangjiade.com/pay_demo/images/alipay.png" width="30px" height="30px"></label>
                        <input type="radio" class="message_rd" value="0" id="rd2" name="rd1"  />
                        <label class="message_lab" for="rd2"><img src="http://pay.erdangjiade.com/pay_demo/images/wechat.png" width="30px" height="30px"></label>
                    </dd>
					<dt></dt>
                    <dd>
                        <span class="new-btn-login-sp">
                            <button class="new-btn-login" type="submit" style="text-align:center;" id="sure">确 认</button>
                        </span>
                    </dd>
                </dl>
            </div>
		</form>
        <div id="foot">
			<ul class="foot-ul">
				<li><font class="note-help">如果您点击“确认”按钮，即表示您同意该次的执行操作。 </font></li>
				<li>
					二当家的版权所有 2011-2016 erdangjiade.com
				</li>
			</ul>
		</div>
	</div>
</body>
</html>
<script src="http://www.erdangjiade.com/Public/js/jquery.js" type="text/javascript"></script>
<script>
	function is_weixin() {
		var ua = window.navigator.userAgent.toLowerCase();
		if (ua.match(/MicroMessenger/i) == 'micromessenger') {
			return true;
		}else {
			return false;
		}
	}
	$(function(){
        $("#sure").click(function(){
            var rd= $('input:radio:checked').val();
                if(rd==1){
                    $('#form_id').attr('action','http://pay.erdangjiade.com/pay_demo/Alipay/alipayapi.php');
                }else{
					if(is_weixin()){alert('是微信浏览器公众号支付，否则用扫码支付');
						 $('#form_id').attr('action','http://pay.erdangjiade.com/pay_demo/Wxpay/example/jsapi.php');	
					}else{alert('不是微信浏览器，用扫码支付，否则用公众号支付');
						$('#form_id').attr('action','http://pay.erdangjiade.com/pay_demo/Wxpay/example/native.php');
						
					}
                    
                }
        })
	})
</script>





