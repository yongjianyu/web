<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<?php
$conn = mysql_connect("localhost","zjwdb_6166430","WJ6126294nmb")
or die("连接服务器失败！".mysql_error());
$select= mysql_query("use zjwdb_6166430",$conn)or die ("error");
mysql_query("set names utf8");
if($_GET['action']=="doctor"){
$sql = "delete from doctor where ID=".$_GET['id'];
}
if($_GET['action']=="patient"){
$sql = "delete from patient where ID2=".$_GET['id'];	
}
if($_GET['action']=="patientback"){
$sql = "update patient set flag='1' where ID2=".$_GET['id'];
}	
if($_GET['action']=="doctorback"){
$sql = "update doctor set flag='1' where ID=".$_GET['id'];
}			
$result = mysql_query($sql,$conn)or die("error");
if($result){
	echo "<script language=\"javascript\">";
	  echo "alert('成功!');";
      echo "document.location=\"dustbin.php\"";
      echo "</script>";
}
?>
</body>
</html>
