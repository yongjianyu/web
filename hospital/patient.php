<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XX眼科</title>
</head>
<link rel="stylesheet" href="style.css" type="text/css" />
<body>
<?php
session_start();
if(empty($_SESSION['ID']))
exit();
$conn = mysql_connect("localhost","zjwdb_6166430","WJ6126294nmb")
or die("连接服务器失败！".mysql_error());
$select= mysql_query("use zjwdb_6166430",$conn)or die ("error");
mysql_query("set names utf8");
$sql1 = "select * from patient where ID2 = ".$_GET['id'];
$result1 = mysql_query($sql1,$conn)or die("error");
$row1 = mysql_fetch_array($result1);
$sql2 = "select * from menzhen where ID2 = ".$_GET['id'];
$result2 = mysql_query($sql2,$conn)or die("error");
$row2 = mysql_fetch_array($result2);
$sql3 = "select * from checkin where ID2 = ".$_GET['id'];
$result3 = mysql_query($sql3,$conn)or die("error");
$row3 = mysql_fetch_array($result3);
$sql4 = "select * from operation where ID2 = ".$_GET['id'];
$result4 = mysql_query($sql4,$conn)or die("error");
$row4 = mysql_fetch_array($result4);
$sql5 = "select * from outcheck where ID2 = ".$_GET['id'];
$result5 = mysql_query($sql5,$conn)or die("error");
$row5 = mysql_fetch_array($result5);
$sql6 = "select * from aftercheck where ID2 = ".$_GET['id'];
$result6 = mysql_query($sql6,$conn)or die("error");
$row6 = mysql_fetch_array($result6);
?>
<div id="container">
<?php echo "编号：".$row1[0]; ?>
		<div id="header"><h1 align="center">患者记录</h1></div>
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
				<div><h2 align="center">眼科门诊</h2>
    			<table width="800px" border="2px">
					<tr>
						<th width="133">姓名：</th>
						<td width="133"  class="index1"><?php echo $row1[1]; ?></td>
						<th width="133">性别：</th>
						<td width="133" class="index1"><?php echo $row1[2]; ?></td>
						<th width="133">年龄：</th>
						<td width="133" class="index1"><?php echo $row1[3]; ?></td>
					</tr>
					<tr>
						<th width="133" >地址：</th>
						<td  colspan="5" class="index1"><?php echo $row1[4]; ?></td>
					</tr>
					<tr>
						<th width="133" >身份证：</th>
						<td  colspan="5" class="index1"><?php echo $row1[5]; ?></td>
					</tr>
					<tr>
						<th width="133" >电话：</th>
						<td  colspan="5" class="index1"><?php echo $row1[6]; ?></td>
					</tr>
					<tr>
						<th width="133" >邮箱：</th>
						<td  colspan="5" class="index1"><?php echo $row1[7]; ?></td>
					</tr>
					<tr>
						<th width="133">左眼视力：</th>
						<td width="133" class="index1"><?php echo $row2[1]; ?></td>
						<th width="133">右眼视力：</th>
						<td width="133" class="index1"><?php echo $row2[2]; ?></td>
						<th width="133">光感：</th>
						<td width="133" class="index1"><?php echo $row2[3]; ?></td>
					</tr>
					<tr>
						<th width="133">指数：</th>
						<td width="133" class="index1"><?php echo $row2[4]; ?></td>
						<th width="133">光定位：</th>
						<td width="133" class="index1"><?php echo $row2[5]; ?></td>
						<th width="133">辨别视力：</th>
						<td width="133" class="index1"><?php echo $row2[6]; ?></td>
					</tr>
					<tr>
						<th width="133">眼睑：</th>
						<td width="133" class="index1"><?php echo $row2[7]; ?></td>
						<th width="133">泪器：</th>
						<td width="133" class="index1"><?php echo $row2[8]; ?></td>
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row2[9]; ?></td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row2[10]; ?></td>
						<th width="133">虹膜：</th>
						<td width="133" class="index1"><?php echo $row2[11]; ?></td>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133" class="index1"><?php echo $row2[12]; ?></td>
					</tr>
					<tr>
						<th width="133">瞳孔-黏连：</th>
						<td width="133" class="index1"><?php echo $row2[13]; ?></td>
						<th width="133">瞳孔-大小：</th>
						<td width="133" class="index1"><?php echo $row2[14]; ?></td>
						<th width="133">晶体：</th>
						<td width="133" class="index1"><?php echo $row2[15]; ?></td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row2[16]; ?></td>
						<th width="133" >眼底：</th>
						<td width="133"class="index1"><?php echo $row2[17]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row2[18]; ?></td>
					</tr>
					<tr>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row2[19]; ?></td>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row2[20]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row2[21]; ?></td>
					</tr>
					<tr>
						<th >检查医生：</th>
						<td width="133" class="index1"><?php echo $row2[22]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1"><?php echo $row2[23]; ?></td>
					</tr>
				</table>
				</div>
				<div><h2 align="center">检查室</h2>
    			<table width="800px" border="2px">
					<tr>
						<th width="133">眼压：</th>
						<td width="133" class="index1"><?php echo $row3[1]; ?></th>
						<th width="133">角膜曲率K1：</td>
						<td width="133" class="index1"><?php echo $row3[2]; ?></th>
						<th width="133">角膜曲率K2：</td>
						<td width="133" class="index1"><?php echo $row3[3]; ?></th>
					</tr>
					<tr>
						<th width="133">眼轴A超：</th>
						<td width="133" class="index1"><?php echo $row3[4]; ?></td>
						<th width="133">眼轴激光：</th>
						<td width="133" class="index1"><?php echo $row3[5]; ?></td>
						<th width="133">内皮计数：</th>
						<td width="133" class="index1"><?php echo $row3[6]; ?></td>
					</tr>
					<tr>
						<th width="133">晶体度数：</th>
						<td width="133" class="index1"><?php echo $row3[7]; ?></th>
						<th width="133">预留度数：</td>
						<td width="133" class="index1"><?php echo $row3[8]; ?></th>
						<th width="133">验光：</td>
						<td width="133" class="index1"><?php echo $row3[9]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row3[10]; ?></td>
						<th width="133">柱镜：</th>
						<td  colspan="3" class="index1"><?php echo $row3[11]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1"><?php echo $row3[12]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1"><?php echo $row3[13]; ?></td>
					</tr>
				</table>
				</div>
				<div><h2 align="center">手术室</h2>
    			<table width="800px" border="2px">
					<tr>
						<th width="133" rowspan="3">护理：</th>
						<th  width="133">结膜冲洗：</th>
						<td width="133" class="index1"><?php echo $row4[1]; ?></td>
						<td width="133">执行人：</td>
						<td width="133" colspan="3" class="index1"><?php echo $row4[2]; ?></td>
					</tr>
					<tr>
						<th width="133" >皮肤消毒：</th>
						<td  class="index1"><?php echo $row4[3]; ?></td>
						<th width="133">执行人：</th>
						<td width="133" colspan="3" class="index1"><?php echo $row4[4]; ?></td>
		 			</tr>
					<tr>
						<th width="133" colspan="2" >器械消毒：</th>
						<th width="133">执行人：</th>
						<td  colspan="3" class="index1"><?php echo $row4[5]; ?></td>
					</tr>
					<tr>
						<th width="133">手术时间：</th>
						<td width="133" class="index1"><?php echo $row4[6]; ?></td>
						<th width="133">麻醉方式：</th>
						<td width="133" colspan="3" class="index1"><?php echo $row4[7]; ?></td>
					</tr>
					<tr>
						<th width="133">切口术中：</th>
						<td width="133" class="index1"><?php echo $row4[8]; ?></td>
						<th width="133">切口后来破裂：</th>
						<td width="133" class="index1"><?php echo $row4[9]; ?></td>
						<th width="133">切口晶体位置：</th>
						<td width="133" class="index1"><?php echo $row4[10]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1"><?php echo $row4[11]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1"><?php echo $row4[12]; ?></td>
					</tr>
				</table>
				</div>
					<div><h2 align="center">出院检查</h2>
    			<table width="800px" border="2px">
					<tr>
						<th width="133">左眼视力：</th>
						<td width="133" class="index1"><?php echo $row5[1]; ?></td>
						<th width="133">右眼视力：</th>
						<td width="133" class="index1"><?php echo $row5[2]; ?></td>
						<th width="133">验光-球镜：</th>
						<td width="133" class="index1"><?php echo $row5[3]; ?></td>
					</tr>
					<tr>
						<th width="133">验光-柱镜：</th>
						<td width="133" class="index1"><?php echo $row5[4]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row5[5]; ?></td>
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row5[6]; ?></td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row5[7]; ?></td>
						<th width="133">人工晶体：</th>
						<td width="133" class="index1"><?php echo $row5[8]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row5[9]; ?></td>
					</tr>
					<tr>
						<th width="133">眼底-视盘：</th>
						<td width="133" class="index1"><?php echo $row5[10]; ?></td>
						<th width="133">眼底-黄斑：</th>
						<td width="133" class="index1"><?php echo $row5[11]; ?></td>
						<th width="133">眼底-动脉：</th>
						<td width="133" class="index1"><?php echo $row5[12]; ?></td>
					</tr>
					<tr>
						<th width="133">眼底-网膜：</th>
						<td width="133" class="index1"><?php echo $row5[13]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1"><?php echo $row5[14]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1"><?php echo $row5[15]; ?></td>
					</tr>
				</table>
				</div>
					<div><h2 align="center">术后复查</h2>
    			<table width="800px" border="2px">
					<tr>
						<th width="133">左眼视力：</th>
						<td width="133" class="index1"><?php echo $row6[1]; ?></td>
						<th width="133">右眼视力：</th>
						<td width="133" class="index1"><?php echo $row6[2]; ?></td>
						<th width="133">验光-球镜：</th>
						<td width="133" class="index1"><?php echo $row6[3]; ?></td>
					</tr>
					<tr>
						<th width="133">验光-柱镜：</th>
						<td width="133" class="index1"><?php echo $row6[4]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row6[5]; ?></td>
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row6[6]; ?></td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row6[7]; ?></td>
						<th width="133">人工晶体：</th>
						<td width="133" class="index1"><?php echo $row6[8]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row6[9]; ?></td>
					</tr>
					<tr>
						<th width="133">眼底-视盘：</th>
						<td width="133" class="index1"><?php echo $row6[10]; ?></td>
						<th width="133">眼底-黄斑：</th>
						<td width="133" class="index1"><?php echo $row6[11]; ?></td>
						<th width="133">眼底-动脉：</th>
						<td width="133" class="index1"><?php echo $row6[12]; ?></td>
					</tr>
					<tr>
						<th width="133">眼底-网膜：</th>
						<td width="133" class="index1"><?php echo $row6[13]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1"><?php echo $row6[14]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1"><?php echo $row6[15]; ?></td>
					</tr>
				</table>
				</div>  
				<div align="center">
				<input type="button" style="height:40px; width:50px; margin-top:30px;" onclick="window.print();" value="打印" />     
				<?php echo"<a href=edit.php?action=edit&id=".$row1[0].">";?><button style="height:40px; width:50px; margin-top:30px;">修改</button><?php echo"</a>";?> 
				</div>
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
		</div>
</div>
</body>
</html>