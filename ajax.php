<?php
require_once('class.phpmailer.php');
$address = $_POST['email']; //收件人email
$mail = new PHPMailer(); //实例化
$mail->IsSMTP(); // 启用SMTP
$mail->Host = "smtp.qq.com"; //SMTP服务器 以163邮箱为例子
$mail->Port = 25;  //邮件发送端口
$mail->SMTPAuth = true;  //启用SMTP认证

$mail->CharSet = "UTF-8"; //字符集
$mail->Encoding = "base64"; //编码方式
$email_system = "zhengzaoxia@yaxzb.com";
$mail->Username = $email_system;  //你的邮箱
$mail->Password = "ZX200711zx";  //你的密码
$mail->Subject = "你好"; //邮件标题

$mail->From = $email_system;  //发件人地址（也就是你的邮箱）
$mail->FromName = "二当家的";  //发件人姓名
$mail->AddAddress($address, "亲"); //添加收件人（地址，昵称）

$mail->AddAttachment('send.xls', '我的附件.xls'); // 添加附件,并指定名称
$mail->IsHTML(true); //支持html格式内容
$mail->AddEmbeddedImage("logo.jpg", "my-attach", "logo.jpg"); //设置邮件中的图片
$mail->Body = '你好, <b>朋友</b>! <br/>这是一封来自<a href="http://www.erdangjiade.com" target="_blank">erdangjiade.com</a>的邮件！<br/><img alt="erdangjiade" src="cid:my-attach">'; //邮件主体内容
//发送
if (!$mail->Send()) {
    echo "发送失败: " . $mail->ErrorInfo;
} else {
    echo "1";  
}
?>