<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康复医院</title>
      <link rel="stylesheet" href="css/style3.css" media="screen" type="text/css" />
	 <link rel="stylesheet" href="css/style4.css" media="screen" type="text/css" />
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="function.js" type="text/javascript"></script>
</head>
<?php
//展现一个病人的全部数据
date_default_timezone_set("PRC");
session_start();
if(empty($_SESSION['ID']))
exit();
$_SESSION['ID2']=$_GET['id'];
$time= date("Y-m-d H:i:s");
include_once("conn.php");
$sql1 = "select * from patient where ID2 = ".$_GET['id'];
$result1 = mysql_query($sql1,$conn)or die("error1");
$row1 = mysql_fetch_array($result1);
$sql2 = "select * from menzhen where ID2 = ".$_GET['id'];
$result2 = mysql_query($sql2,$conn)or die("error2");
$row2 = mysql_fetch_array($result2);
$sql3 = "select * from checkin where ID2 = ".$_GET['id'];
$result3 = mysql_query($sql3,$conn)or die("error3");
$row3 = mysql_fetch_array($result3);
$sql4 = "select * from operation where ID2 = ".$_GET['id'];
$result4 = mysql_query($sql4,$conn)or die("error");
$row4 = mysql_fetch_array($result4);
$sql5 = "select * from outcheck where ID2 = ".$_GET['id'];
$result5 = mysql_query($sql5,$conn)or die("error");
$row5 = mysql_fetch_array($result5);
$sql6 = "select * from aftercheck where ID2 = ".$_GET['id'];
$result6 = mysql_query($sql6,$conn)or die("error".mysql_error());
$row6 = mysql_fetch_array($result6);
$_SESSION['fucha']=0;
if($row6[35]==1){
$_SESSION['fucha']=1;
}
$sql7 = "select * from aftercheck2 where ID2 = ".$_GET['id'];
$result7 = mysql_query($sql7,$conn)or die("error".mysql_error());
$row7 = mysql_fetch_array($result7);
if($row7[35]==1){
$_SESSION['fucha']=2;
}
$sql8 = "select * from aftercheck3 where ID2 = ".$_GET['id'];
$result8 = mysql_query($sql8,$conn)or die("error".mysql_error());
$row8 = mysql_fetch_array($result8);
if($row8[35]==1){
$_SESSION['fucha']=3;
}
?>
<body class="body5">
<a href="index.php" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
<div id="container5">
	<div id="header" align="center"><h1>康复医院</h1></div>
	<div class="logo"></div>
	<div id="main">
  		<div class="wrap">
			 <a href="chuzhen.php" class="button three">门 诊</a>
		  	 <a href="menzhen.php" class="button three">住院医师</a>
 			 <a href="jiancha.php" class="button three">检查室</a>
		 	 <a href="shoushu.php" class="button three">手术室</a>
 			 <a href="chuyuan.php" class="button three">出院检查</a>
		 	 <a href="fucha.php" class="button three">术后复查</a>	
		</div>
		<div class="search">
		<form method="post" action="search.php" class="form">
				  			<input name="text"  class="search2" type="text"  value=""  size="35"  />
							<input type="submit" class="search1"  value="搜索"/>
		</form>
		</div>
	</div>
  		<div id="right5">
			 <ul class="nav">
   				<li><a href="index1.php">所有病人</a></li>
    			<li><a href="day3.php">三日以内</a></li>
 			    <li><a href="day7.php">一周以内</a></li>
   			    <li><a href="day30.php">一月以内</a></li>
		        <li><a href="user.php?ID=<?php  echo $_SESSION['ID'];?>">用户中心</a></li>
  		        <li><a href="admin.php">后台管理</a></li>
 	 	   </ul>
		   <div id="main3">
		   	<div class="table">
			<div style="position:relative; top:60px; left:80px;"><button   class="but1" onclick="window.location.href='index1.php'">返回</button></div>
				<table width="800">
				<tr>
				<td colspan="6" align="center"><h3>住院医师表</h3></td></tr>
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
					<tr><th>左眼:</th></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row2[1]; ?></td>
					</tr>
					<tr>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row2[2]; ?></td>
						<th width="133">光定位：</th>
						<td width="133" class="index1"><?php echo $row2[3]; ?></td>
						<th width="133">辨别视力：</th>
						<td width="133" class="index1"><?php echo $row2[4]; ?></td>
					</tr>
					<tr>
						<th width="133">眼睑：</th>
						<td width="133" class="index1"><?php echo $row2[5]; ?></td>
						<th width="133">泪器：</th>
						<td width="133" class="index1"><?php echo $row2[6]; ?></td>
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row2[7]; ?></td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row2[8]; ?></td>
						<th width="133">虹膜：</th>
						<td width="133" class="index1"><?php echo $row2[9]; ?></td>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133" class="index1"><?php echo $row2[10]; ?></td>
					</tr>
					<tr>
						<th width="133">瞳孔-黏连：</th>
						<td width="133" class="index1"><?php echo $row2[11]; ?></td>
						<th width="133">瞳孔-大小：</th>
						<td width="133" class="index1"><?php echo $row2[12]; ?></td>
						<th width="133">晶体：</th>
						<td width="133" class="index1"><?php echo $row2[13]; ?></td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row2[14]; ?></td>
						<th width="133" >球镜：</th>
						<td width="133"class="index1"><?php echo $row2[15]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row2[16]; ?></td>
					</tr>
					<tr>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row2[17]; ?></td>
						<th width="133" >眼底：</th>
						<td width="133"class="index1"><?php echo $row2[18]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row2[19]; ?></td>
					</tr>
					<tr>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row2[20]; ?></td>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row2[21]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row2[22]; ?></td>
					</tr>
					<tr><th>右眼:</th></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row2[23]; ?></td>
					</tr>
					<tr>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row2[24]; ?></td>
						<th width="133">光定位：</th>
						<td width="133" class="index1"><?php echo $row2[25]; ?></td>
						<th width="133">辨别视力：</th>
						<td width="133" class="index1"><?php echo $row2[26]; ?></td>
					</tr>
					<tr>
						<th width="133">眼睑：</th>
						<td width="133" class="index1"><?php echo $row2[27]; ?></td>
						<th width="133">泪器：</th>
						<td width="133" class="index1"><?php echo $row2[28]; ?></td>
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row2[29]; ?></td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row2[30]; ?></td>
						<th width="133">虹膜：</th>
						<td width="133" class="index1"><?php echo $row2[31]; ?></td>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133" class="index1"><?php echo $row2[32]; ?></td>
					</tr>
					<tr>
						<th width="133">瞳孔-黏连：</th>
						<td width="133" class="index1"><?php echo $row2[33]; ?></td>
						<th width="133">瞳孔-大小：</th>
						<td width="133" class="index1"><?php echo $row2[34]; ?></td>
						<th width="133">晶体：</th>
						<td width="133" class="index1"><?php echo $row2[35]; ?></td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row2[36]; ?></td>
						<th width="133" >球镜：</th>
						<td width="133"class="index1"><?php echo $row2[37]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row2[38]; ?></td>
					</tr>
					<tr>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row2[39]; ?></td>
						<th width="133" >眼底：</th>
						<td width="133"class="index1"><?php echo $row2[40]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row2[41]; ?></td>
					</tr>
					<tr>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row2[42]; ?></td>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row2[43]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row2[44]; ?></td>
					</tr>
					<tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row2[45]; ?></td>
					</tr>
					<tr class="ad">
						<th >处理意见：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row2[46]; ?></td>
					</tr>
					<tr>
						<th >检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row2[47]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row2[48]; ?></td>
					</tr>
					</table>
					</div>
					<div class="table">
					<table width="800">
					<tr><td colspan="6" align="center"><h3>检查表</h3></td></tr>
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
						<td class="index1"><?php echo $row3[11]; ?></td>
						<th width="133">轴向：</th>
						<td  class="index1"><?php echo $row3[12]; ?></td>
					</tr>
					<tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row3[13]; ?></td>
					</tr>
					<tr class="ad">
						<th >处理意见：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row3[14]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row3[15]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row3[16]; ?></td>
					</tr>
				</table>
			</div>
					<div class="table">
					<table width="800">
					<tr><td colspan="6" align="center"><h3>手术表</h3></td></tr>
					<tr>
						<th width="133" rowspan="3">护理：</th>
						<th  width="133">结膜冲洗：</th>
						<td width="133" class="index1"><?php echo $row4[1]; ?></td>
						<th width="133">执行人：</th>
						<td width="133" colspan="3" class="index1"><?php echo $row4[2]; ?></td>
					</tr>
					<tr>
						<th width="133" >皮肤消毒：</th>
						<td  class="index1"><?php echo $row4[3]; ?></td>
						<th width="133">执行人：</th>
						<td width="133" colspan="3" class="index1"><?php echo $row4[4]; ?></td>
		 			</tr>
					<tr>
						<th width="133" >器械消毒：</th>
						<td></td>
						<th width="133">执行人：</th>
						<td  colspan="3" class="index1"><?php echo $row4[5]; ?></td>
					</tr>
					<tr>
						<th width="133">手术时间：</th>
						<td width="133" class="index1" align="left"><?php echo $row4[6]; ?></td>
						<th width="133">麻醉方式：</th>
						<td width="133" colspan="3" class="index1"><?php echo $row4[7]; ?></td>
					</tr>
					<tr>
						<th width="133">撕囊类型：</th>
						<td width="133" class="index1"><?php echo $row4[8]; ?></td>
						<th width="133">后囊情况：</th>
						<td width="133" class="index1"><?php echo $row4[9]; ?></td>
						<th width="133">晶体位置：</th>
						<td width="133" class="index1"><?php echo $row4[10]; ?></td>
					</tr>
					<tr>
						<th width="133">切口类型：</th>
						<td width="133" class="index1"><?php echo $row4[11]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row4[12]; ?></td>
					</tr>
					<tr>
						<th width="133">手术医生：</th>
						<td width="133" class="index1"><?php echo $row4[18]; ?></td>
						<th width="133">手术助理：</th>
						<td width="133" class="index1"><?php echo $row4[19]; ?></td>
					</tr>
					<!--tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row4[13]; ?></td>
					</tr-->
					<tr class="ad">
						<th >备注：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row4[14]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row4[15]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row4[16]; ?></td>
					</tr>
				</table>
				</div>
				<div class="table">
				<table width="800">
				<tr><td colspan="6" align="center"><h3>出院表</h3></td></tr>
					<tr align="center"><td>左眼：</td></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row5[1]; ?></td>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row5[2]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row5[3]; ?></td>
					</tr>
					<tr>	
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row5[4]; ?></td>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row5[5]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row5[6]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row5[7]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row5[8]; ?></td>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row5[9]; ?></td>
					</tr>
					<tr>
						
						<th width="133">人工晶体：</th>
						<td class="index1"><?php echo $row5[10]; ?></td>
						
					</tr>
					<tr>
						<th width="133">眼底:</th>
						<td width="133" class="index1"><?php echo $row5[11]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row5[12]; ?></td>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row5[13]; ?></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row5[14]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row5[15]; ?></td>
						<th width="133">复查时间：</th>
						<td width="133" class="index1"><?php echo $row5[31]; ?></td>
					</tr>
					<tr align="center"><td>右眼：</td></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row5[16]; ?></td>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row5[17]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row5[18]; ?></td>
					</tr>
					<tr>	
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row5[19]; ?></td>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row5[20]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row5[21]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row5[22]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row5[23]; ?></td>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row5[24]; ?></td>
					</tr>
					<tr>
						
						<th width="133">人工晶体：</th>
						<td class="index1"><?php echo $row5[25]; ?></td>
						
					</tr>
					<tr>
						<th width="133">眼底:</th>
						<td width="133" class="index1"><?php echo $row5[26]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row5[27]; ?></td>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row5[28]; ?></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row5[29]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row5[30]; ?></td>
					</tr>
					<tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row5[32]; ?></td>
					</tr>
					<tr class="ad">
						<th >处理意见：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row5[33]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row5[34]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row5[35]; ?></td>
					</tr>
				</table>
				</div>
				<div class="table">
				<table width="800px">
				<tr><td colspan="6" align="center"><h3>复查表一</h3></td></tr>
				<tr align="center"><td>左眼：</td></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row6[1]; ?></td>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row6[2]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row6[3]; ?></td>
					</tr>
					<tr>	
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row6[4]; ?></td>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row6[5]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row6[6]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row6[7]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row6[8]; ?></td>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row6[9]; ?></td>
					</tr>
					<tr>
						
						<th width="133">人工晶体：</th>
						<td class="index1"><?php echo $row6[10]; ?></td>
						
					</tr>
					<tr>
						<th width="133">眼底:</th>
						<td width="133" class="index1"><?php echo $row6[11]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row6[12]; ?></td>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row6[13]; ?></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row6[14]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row6[15]; ?></td>
						<th width="133">复查时间：</th>
						<td width="133" class="index1"><?php echo $row6[31]; ?></td>
					</tr>
					<tr align="center"><td>右眼：</td></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row6[16]; ?></td>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row6[17]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row6[18]; ?></td>
					</tr>
					<tr>	
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row6[19]; ?></td>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row6[20]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row6[21]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row6[22]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row6[23]; ?></td>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row6[24]; ?></td>
					</tr>
					<tr>
						
						<th width="133">人工晶体：</th>
						<td class="index1"><?php echo $row6[25]; ?></td>
						
					</tr>
					<tr>
						<th width="133">眼底:</th>
						<td width="133" class="index1"><?php echo $row6[26]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row6[27]; ?></td>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row6[28]; ?></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row6[29]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row6[30]; ?></td>
					</tr>
					<tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row6[31]; ?></td>
					</tr>
					<tr class="ad">
						<th >处理意见：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row6[32]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row6[33]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row6[34]; ?></td>
					</tr>
				</table>
				<table width="800px">
				<tr><td colspan="6" align="center"><h3>复查表二</h3></td></tr>
				<tr align="center"><td>左眼：</td></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row7[1]; ?></td>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row7[2]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row7[3]; ?></td>
					</tr>
					<tr>	
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row7[4]; ?></td>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row7[5]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row7[6]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row7[7]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row7[8]; ?></td>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row7[9]; ?></td>
					</tr>
					<tr>
						
						<th width="133">人工晶体：</th>
						<td class="index1"><?php echo $row7[10]; ?></td>
						
					</tr>
					<tr>
						<th width="133">眼底:</th>
						<td width="133" class="index1"><?php echo $row7[11]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row7[12]; ?></td>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row7[13]; ?></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row7[14]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row7[15]; ?></td>
						<th width="133">复查时间：</th>
						<td width="133" class="index1"><?php echo $row7[31]; ?></td>
					</tr>
					<tr align="center"><td>右眼：</td></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row7[16]; ?></td>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row7[17]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row7[18]; ?></td>
					</tr>
					<tr>	
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row7[19]; ?></td>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row7[20]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row7[21]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row7[22]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row7[23]; ?></td>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row7[24]; ?></td>
					</tr>
					<tr>
						
						<th width="133">人工晶体：</th>
						<td class="index1"><?php echo $row7[25]; ?></td>
						
					</tr>
					<tr>
						<th width="133">眼底:</th>
						<td width="133" class="index1"><?php echo $row7[26]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row7[27]; ?></td>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row7[28]; ?></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row7[29]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row7[30]; ?></td>
					</tr>
					<tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row7[31]; ?></td>
					</tr>
					<tr class="ad">
						<th >处理意见：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row7[32]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row7[33]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row7[34]; ?></td>
					</tr>
				</table>
				<table width="800px">
				<tr><td colspan="6" align="center"><h3>复查表三</h3></td></tr>
				<tr align="center"><td>左眼：</td></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row8[1]; ?></td>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row8[2]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row8[3]; ?></td>
					</tr>
					<tr>	
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row8[4]; ?></td>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row8[5]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row8[6]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row8[7]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row8[8]; ?></td>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row8[9]; ?></td>
					</tr>
					<tr>
						
						<th width="133">人工晶体：</th>
						<td class="index1"><?php echo $row8[10]; ?></td>
						
					</tr>
					<tr>
						<th width="133">眼底:</th>
						<td width="133" class="index1"><?php echo $row8[11]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row8[12]; ?></td>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row8[13]; ?></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row8[14]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row8[15]; ?></td>
						<th width="133">复查时间：</th>
						<td width="133" class="index1"><?php echo $row8[31]; ?></td>
					</tr>
					<tr align="center"><td>右眼：</td></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row8[16]; ?></td>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row8[17]; ?></td>
						<th width="133">结膜：</th>
						<td width="133" class="index1"><?php echo $row8[18]; ?></td>
					</tr>
					<tr>	
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row8[19]; ?></td>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row8[20]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row8[21]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row8[22]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row8[23]; ?></td>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row8[24]; ?></td>
					</tr>
					<tr>
						
						<th width="133">人工晶体：</th>
						<td class="index1"><?php echo $row8[25]; ?></td>
						
					</tr>
					<tr>
						<th width="133">眼底:</th>
						<td width="133" class="index1"><?php echo $row8[26]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row8[27]; ?></td>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row8[28]; ?></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row8[29]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row8[30]; ?></td>
					</tr>
					<tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row8[31]; ?></td>
					</tr>
					<tr class="ad">
						<th >处理意见：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row8[32]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row8[33]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row8[34]; ?></td>
					</tr>
				</table>
				</div>
				<div align="center">
				<button   class="but1"  onclick="window.print()">打印</button>
				<button   class="but2"  onclick="window.location.href='index1.php'">返回</button>
				</div>
  		</div>
	</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>
