<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XX眼科</title>
</head>
<body>
<?php

//对用户是否正确进行检查，并获取其id，权限
session_start();
include_once("conn.php");
$name = $_POST['user'];
$password = $_POST['password'];
$type = check($name);
$sql = address($type,$password);
$result = mysql_query($sql,$conn);
$row = mysql_fetch_array($result);
 echo "<script language=\"javascript\">";
 echo "console.log('".$row[1]."');";
 echo "</script>";
$_SESSION['ID']=$row[0];
$_SESSION['doctorname']=$row[1];
$_SESSION['flag1']=$row[8];
$_SESSION['flag2']=$row[9];
$_SESSION['flag3']=$row[10];
$_SESSION['flag4']=$row[11];
$_SESSION['flag5']=$row[12];
$_SESSION['flag6']=$row[13];
$_SESSION['flag7']=$row[14];
$_SESSION['flag8']=$row[15];
if($row){
	  echo "<script language=\"javascript\">";
      echo "document.location=\"index1.php\"";
      echo "</script>";
}
else{
	  echo "<script language=\"javascript\">";
	  echo "alert('登录错误');";
      echo "document.location=\"index.php\"";
      echo "</script>";
}


function check($name){
	if(is_numeric($name)){
		return 1;
	}
	return 2;
}

function address($type,$password){
	switch ($type) {
		case 1:
			$sqlstr = "select * from doctor where password = '".$_POST['password']."' && gonghao = '".$_POST['user']."' ";
			break;
		
		case 2:
			$sqlstr = "select * from doctor where password = '".$_POST['password']."' && name = '".$_POST['user']."'";
			break;
		default:
		 	throw new \Exception('数据类型错误');
	}

	return $sqlstr;
} 

?>
</body>
</html>
