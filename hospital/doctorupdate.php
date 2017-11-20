<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XX眼科</title>
</head>

<body>
<?php
session_start();
if(empty($_SESSION['ID']))
exit();
$conn = mysql_connect("localhost","zjwdb_6166430","WJ6126294nmb")
or die("连接服务器失败！".mysql_error());
$select= mysql_query("use zjwdb_6166430",$conn)or die ("error");
mysql_query("set names utf8");
if($_GET['id']>1000){
$sql = "update patient set flag='0' where ID2=".$_GET['id'];
$result = mysql_query($sql,$conn);
echo "<script language=\"javascript\">";
	  echo "alert('删除成功!');";
      echo "document.location=\"index1.php\"";
      echo "</script>";
}else{
$sql = "update doctor set flag='0' where ID=".$_GET['id'];
$result = mysql_query($sql,$conn);
echo "<script language=\"javascript\">";
	  echo "alert('删除成功!');";
      echo "document.location=\"doctor.php\"";
      echo "</script>";
}
?>
</body>
</html>
