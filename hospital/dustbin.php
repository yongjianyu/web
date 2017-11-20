<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XX眼科</title>
</head>
<link rel="stylesheet" href="style.css" type="text/css" />
<?php
session_start();
if(empty($_SESSION['ID']))
exit();
$conn = mysql_connect("localhost","zjwdb_6166430","WJ6126294nmb")
or die("连接服务器失败！".mysql_error());
$select= mysql_query("use zjwdb_6166430",$conn)or die ("error");
mysql_query("set names utf8");

$sqlstr = "select * from doctor where flag=2 ";
$result = mysql_query($sqlstr,$conn);
$row = mysql_fetch_array($result);
if($_SESSION['ID'] != $row[0]){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限查看!');";
      echo "document.location=\"index1.php\"";
      echo "</script>";
}
//对普通用户禁止
$sql = "select * from patient where flag = 0";					
$result = mysql_query($sql,$conn)or die("error");
$sql2 = "select * from doctor where flag = 0";	
$result2 = mysql_query($sql2,$conn)or die("error");
?>
<body>
<div id="container">
		<div id="header"><h1 align="center">xx眼科记录</h1></div>
  <div id="main">
				<div id="main1">
						<div id="image"></div>
						<div><ul id="nav">
									<li><a href="index1.php" >首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a></li>
									<li><a href="change.php" >添加病人</a></li>
									<li><a href="doctorAdd.php" >添加医生</a></li>
									<li><a href="doctor.php" >医生信息</a></li>
									<li><a href="dustbin.php">回收站</a></li>
							 </ul>
							 	<form method="post" action="search.php">
						  			<input name="text" type="text"  value="" style="height:30px; border:1px solid green;" size="20"  />
									<input type="submit" class="search" value="搜索"/>
								</form>
				  		</div>
				</div>
				<div id="main2">
				</div>
				<div id="main3"><h2>病人信息</h2>
                  <table width="800px"border="1">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">姓名</th>
                      <th scope="col">性别</th>
                      <th scope="col">年龄</th>
                      <th scope="col">地址</th>
                      <th scope="col">身份证</th>
                      <th scope="col">电话</th>
                    </tr>
					<?php
					while($row = mysql_fetch_array($result)){?>
                    <tr>
                      <td class="index1"><?php echo $row[0];?></td>
                      <td class="index1"><?php echo $row[1];?></td>
                      <td class="index1"><?php echo $row[2];?></td>
                      <td class="index1"><?php echo $row[3];?></td>
                      <td class="index1"><?php echo $row[4];?></td>
                      <td class="index1"><?php echo $row[5];?></td>
                      <td class="index1"><?php echo $row[6];?></td>
                      <?php echo "<td><a href=delete.php?action=patientback&id=".$row[0].">还原</a>/<a href=delete.php?action=patient&id=".$row[0].">删除</a></td>";?>
                    </tr><?php }
					?>
                  </table>
				  <h2>病人信息</h2>
                  <table width="800px"border="1">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">姓名</th>
                      <th scope="col">性别</th>
                      <th scope="col">年龄</th>
                      <th scope="col">职称</th>
                      <th scope="col">电话</th>
                      <th scope="col">邮箱</th>
                      <th scope="col"></th>
                    </tr>
					<?php
					while($row2 = mysql_fetch_array($result2)){?>
                    <tr>
                      <td class="index1"><?php echo $row2[0];?></td>
                      <td class="index1"><?php echo $row2[1];?></td>
                      <td class="index1"><?php echo $row2[2];?></td>
                      <td class="index1"><?php echo $row2[3];?></td>
                      <td class="index1"><?php echo $row2[4];?></td>
                      <td class="index1"><?php echo $row2[5];?></td>
                      <td class="index1"><?php echo $row2[6];?></td>
                      <?php echo "<td><a href=delete.php?action=doctorback&id=".$row2[0].">还原</a>/<a href=delete.php?action=doctor&id=".$row2[0].">删除</a></td>";?>
                    </tr><?php }
					?>
                  </table>
				</div>
				<br />
				<br />
				
  </div>	
</div>

</body>
</html>
