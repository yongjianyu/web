<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>康复医院</title>
      <link rel="stylesheet" href="css/style3.css" media="screen" type="text/css" />
	 <link rel="stylesheet" href="css/style4.css" media="screen" type="text/css" />
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="function.js" type="text/javascript"></script>
</head>
<?php
date_default_timezone_set("PRC");
session_start();
if(empty($_SESSION['ID']))
exit();
$time= date("Y-m-d H:i:s");
$_SESSION['ID2']=$_GET['id'];
include_once("conn.php");
$sql1 = "select * from patient where ID2 = ".$_GET['id'];
$result1 = mysql_query($sql1,$conn)or die("error");
$row1 = mysql_fetch_array($result1);
$sql2 = "select * from menzhen where ID2 = ".$_GET['id'];
$result2 = mysql_query($sql2,$conn)or die("error");
$row2 = mysql_fetch_array($result2);
$sql3 = "select * from checkin where ID2 = ".$_GET['id'];
$result3 = mysql_query($sql3,$conn)or die("error");
$row3 = mysql_fetch_array($result3);
if($row3[17]==1){
echo "<script language=\"javascript\">";
	  echo "alert('您已添加病人信息!');";
      echo "document.location=\"jiancha.php\"";
      echo "</script>";
}
?>

<body class="body1">
<a href="index.php" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
<div id="container1">
	<div id="header" align="center"><h1>康复医院</h1></div>
	<div class="logo1"></div>
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
		<div id="left">
  		
  	</div>
  		<div id="right1">
				<ul class="nav">
   				 <li><a href="index1.php">所有病人</a></li>
    			<li><a href="day3.php">三日以内</a></li>
 			   <li><a href="day7.php">一周以内</a></li>
   			 <li><a href="day30.php">一月以内</a></li>
		   <li><a href="user.php?ID=<?php  echo $_SESSION['ID'];?>">用户中心</a></li>
  		 <li><a href="admin.php">后台管理</a></li>
 	 		</ul>
  				<form name="patientchange"action="editpost.php" method="post" enctype="multipart/form-data">
					<div  id="main2">
					<div><h2 align="center">基本信息</h2></div>
					<table width="800" border="2px">
					<tr>
						<th width="133">姓名：</th>
						<td width="133"  class="index1"><?php echo $row1[1]; ?></td>
						<th width="133">性别：</th>
						<td width="133" class="index1"><?php echo $row1[2]; ?></td>
						<th width="133">年龄：</th>
						<td width="133" class="index1"><?php echo $row1[3]; ?></td>
					</tr>
					<tr>
						<th width="133">眼压：</th>
						<td width="133"> <input name="yanya" type="text" size="5" value="" />mmHg</th>
						<th width="133">角膜曲率K1：</td>
						<td width="133"><input  id="k1" name="k1" type="text"  size="5" value="" /></th>
						<th width="133">角膜曲率K2：</td>
						<td width="133"> <input id="k2" name="k2" type="text" size="5" value="" /></th>
					</tr>
					<tr>
						<th width="133">眼轴A超：</th>
						<td width="133"><input  id="achao"name="achao" type="text" size="5" value="" />mm</td>
						<th width="133">眼轴激光：</th>
						<td width="133"><input name="jiguang" type="text" size="5" value="" />mm</td>
						<th width="133">内皮计数：</th>
						<td width="133"><input name="neipijishu" type="text" size="5" value="" /></td>
					</tr>
					<tr>
						<th width="133">晶体度数：</th>
						<td width="133" onClick="jisuan();"> <input id="jingtidushu" name="jingtidushu" type="text"  size="5" value="" />D</th>
						<th width="133">预留度数：</td>
						<td width="133"> <input name="yuliudushu" type="text" size="5" value="" />D</th>
						<th width="133">验光：</td>
						<td width="133"><input name="yanguang" type="text" size="5" value="" /></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133"><input name="qiujing" type="text" size="5" value="" />D</td>
						<th width="133">柱镜：</th>
						<td width="133"><input name="zhujing" type="text" size="5" value="" />DC</td>
						<th width="133">轴向：</th>
						<td width="133"><input name="zhouxiang" type="text" size="5" value="" /></td>
					</tr>
				</table>
				诊断结果：
						<div >
							<textarea name="zhenduanjieguo" cols="111"  rows="4"wrap="hard" style="width:800px;"></textarea>
						</div>
				备注：
						<div >
							<textarea name="chulijianyi" cols="111"  rows="4"wrap="hard" style="width:800px;"></textarea>
						</div>
				时间日期:
						<div>
   							<input type="text" name="date" value="<?php echo $time; ?>" />
						</div>
				</div>
				<div id="footer" align="center" style="font-size:24px;">
					<input class="but1" type="submit" name="submit3" value="保存"  />
					<input  class="but2" type="button" value="返回" onClick="window.location.href='jiancha.php'"/>
				</div>
				</form>
				<div id="main3">
				<table width="800px" >
				<tr><td  colspan="6"  align="center"><h3>住院医师表</h3></td></tr>
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
						<th >备注：</th>
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
</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</div>
</body>
</html>