<?php
if ( !defined('ABSPATH') ) {
	require_once('./../../wp-load.php');
}
session_start();
if((stripos( $_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST'], 0 )!='') and ($_GET['cc']==$_COOKIE['PHPSESSID']) and ($_GET['cc']!='')){
$tmv = 'Thẩm mỹ viện Kangnam';
$domain = $_SERVER['SERVER_NAME'];
$hotline = '1900.6466';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
    body,td,th {font-family: Arial, Helvetica, sans-serif;}
</style>

<title>Đăng ký thành công</title>

</head >
    <body>
    
<div style=" font-family:Arial, Helvetica, sans-serif; line-height:30px; backgound:#eeefe;"><h2 style="font-size:18px; color:#026894; margin:0px; padding:0;"><?php echo $tmv;?> đã nhận được thông tin tư vấn của bạn!</h2><div style="font-size:14px">Chúng tôi sẽ gửi phản hồi sớm nhất có thể. <br><strong>Tổng Đài Tư Vấn: 
<span style="color:#c00; font-size:16px;"> <?php echo $hotline;?> </span>
</strong><br> Truy cập: <strong><?php echo $domain;?></strong> tìm hiểu thêm thông tin!<p><button style="padding:2px 10px; cursor:pointer" onclick="javascript:self.close()">Thoát</button></p></div></div>

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 980352463;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "Y8DwCLmkrAgQz_u70wM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/980352463/?label=Y8DwCLmkrAgQz_u70wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

    </body>
</html>
<?php  

}elseif($_GET['cc']==''){
    echo '
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="10;url=http://'.$domain.'/" />
    Trình duyệt chưa bật cookie. Vui lòng bật cookie để đăng ký! Cảm ơn
    <p><button style="padding:2px 10px; cursor:pointer" onclick="javascript:self.close()">Thoát</button></p>
    ';
}
else{    
    wp_redirect('/');
}
?>

