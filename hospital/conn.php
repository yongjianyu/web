<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康复医院</title>
</head>

<body>
<?php
$conn = mysql_connect("localhost","root","yu902377")
or die("连接服务器失败！".mysql_error());
$select= mysql_query("use hospital",$conn);
mysql_query("set names utf8");
date_default_timezone_set("PRC");
?>

</body>
</html>
