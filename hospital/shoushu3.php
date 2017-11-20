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
date_default_timezone_set("PRC");
session_start();
if(empty($_SESSION['ID']))
exit();
if($_SESSION['flag4']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限查看!');";
      echo "document.location=\"index1.php\"";
      echo "</script>";
}
$_SESSION['ID2']=$_GET['id'];
$time= date("Y-m-d H:i:s");
include_once("conn.php");
$sql1 = "select * from patient where ID2 = ".$_GET['id'];
$result1 = mysql_query($sql1,$conn)or die("error");
$row1 = mysql_fetch_array($result1);
$sql2 = "select * from operation where ID2 = ".$_GET['id'];
$result2 = mysql_query($sql2,$conn)or die("error");
$row2 = mysql_fetch_array($result2);
$time2= strtotime($time)-strtotime($row2[12]);
if($row2[15]!=$_SESSION['doctorname'] && $_SESSION['flag7']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限修改病人信息!');";
      echo "document.location=\"shoushu.php\"";
      echo "</script>";
}
/*if($time2>86400&&$_SESSION['flag7']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您已无法修改病人信息!');";
      echo "document.location=\"shoushu.php\"";
      echo "</script>";
}*/
$sql3 = "select * from menzhen where ID2 = ".$_GET['id'];
$result3 = mysql_query($sql3,$conn)or die("error");
$row3 = mysql_fetch_array($result3);
$sql4 = "select * from checkin where ID2 = ".$_GET['id'];
$result4 = mysql_query($sql4,$conn)or die("error");
$row4 = mysql_fetch_array($result4);
$sql5 = "select * from doctor";
$result5 = mysql_query($sql5,$conn)or die("error");
$row5 = mysql_numrows($result5);
?>
<body class="body2">
<a href="index.php" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
<div id="container2">
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
		<div id="left"></div>
  		<div id="right2">
			<ul class="nav">
   				 <li><a href="index1.php">所有病人</a></li>
    			<li><a href="day3.php">三日以内</a></li>
 			    <li><a href="day7.php">一周以内</a></li>
   			    <li><a href="day30.php">一月以内</a></li>
		        <li><a href="user.php?ID=<?php  echo $_SESSION['ID'];?>">用户中心</a></li>
  		       <li><a href="admin.php">后台管理</a></li>
 	 	  </ul>
  			<form name="patientchange"action="editpost.php" method="post" enctype="multipart/form-data">
					<div id="main2">
					<div >
					<h2 align="center">手术室</h2>
					<table width="800px" border="2px">
					<tr>
						<th width="133" rowspan="3">护理：</th>
						<th  width="133">结膜冲洗：</th>
						<td width="133">
							<select name="jiemochongxi">
								<option  >请选择</option>
								<option <?php if($row2[1]=="安乐福"){?>selected<?php }?>>安乐福</option>
								<option <?php if($row2[1]=="碘伏"){?>selected<?php }?>>碘伏</option>
							</select>
						</td>
						<td width="133" align="center"><strong>执行人：</strong></td>
						<td width="133" colspan="3">
									<select name="zhixingren1">
								<option>请选择</option>
															<?php
								for($i = 0; $i <$row5; $i++){?>
								<option <?php if($row2[2]==mysql_result($result5,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result5,$i,"name"));?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th width="133" >皮肤消毒：</th>
						<td >
							<select name="pifuxiaodu">
								<option  >请选择</option>
								<option <?php if($row2[3]=="安乐福"){?>selected<?php }?>>安乐福</option>
								<option <?php if($row2[3]=="碘伏"){?>selected<?php }?>>碘伏</option>
							</select>
						</td>
						<th width="133">执行人：</th>
						<td width="133" colspan="3">
							  <select name="zhixingren2">
								<option >请选择</option>
								<?php
								for($i = 0; $i <$row5; $i++){?>
								<option <?php if($row2[4]==mysql_result($result5,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result5,$i,"name"));?></option>
								<?php
								}
								?>
							</select>
						</td>
		 			</tr>
					<tr>
						<th width="133" colspan="2" >器械消毒：</th>
						<th width="133">执行人：</th>
						<td  colspan="3">
							<select name="zhixingren3">
								<option >请选择</option>
								<?php
								for($i = 0; $i <$row5; $i++){?>
								<option <?php if($row2[5]==mysql_result($result5,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result5,$i,"name"));?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th width="133">手术时间：</th>
						<td width="133">
							<input type="text" name="date1" value="<?php echo $row2[6]; ?>" />
						</td>
						<th width="133">麻醉方式：</th>
						<td width="133">
							<select name="mazuifangfa">
								<option  >请选择</option>
								<option <?php if($row2[7]=="表麻"){?>selected<?php }?>>表麻</option>
								<option <?php if($row2[7]=="结膜下"){?>selected<?php }?>>结膜下</option>
								<option <?php if($row2[7]=="球后浸润麻醉"){?>selected<?php }?>>球后浸润麻醉</option>
							</select>	
						</td>
						<th width="133">撕囊类型：</th>
						<td width="133">
							<select name="shuzhongqiekou">
								<option >请选择</option>
									<option <?php if($row2[8]=="环形"){?>selected<?php }?>>环形</option>
									<option <?php if($row2[8]=="截囊"){?>selected<?php }?>>截囊</option>
							  	</select> 
						</td>
					</tr>
					<tr>
						<th width="133">后囊情况：</th>
						<td width="133">
							  <select name="houlaipolie">
								  <option >请选择</option>
									<option <?php if($row2[9]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[9]=="破裂"){?>selected<?php }?>>破裂</option>
								  </select>  
						</td>
						<th width="133">晶体位置：</th>
						<td width="133">
							  <select name="jingtiweizhi">
								  <option>请选择</option>
									<option <?php if($row2[10]=="囊袋内"){?>selected<?php }?>>囊袋内</option>
									<option <?php if($row2[10]=="睫状沟"){?>selected<?php }?>>睫状沟</option>
									<option <?php if($row2[10]=="前房型"){?>selected<?php }?>>前房型</option>
								  </select>
						</td>
						<th width="133">切口类型：</th>
						<td width="133">
							  <select name="qiekouleixing">
								  <option>请选择</option>
									<option <?php if($row2[11]=="巩膜"){?>selected<?php }?>>巩膜</option>
									<option <?php if($row2[11]=="隧道"){?>selected<?php }?>>隧道</option>
									<option <?php if($row2[11]=="角膜透明"){?>selected<?php }?>>角膜透明</option>
								  </select>
						</td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133">
							  <select name="boliti">
								  <option>请选择</option>
									<option <?php if($row2[12]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[12]=="脱出"){?>selected<?php }?>>脱出</option>
								  </select>
						</td>
						<th width="133">手术医生：</th>
						<td width="133">
							  <select name="zhixingren2">
								<option >请选择</option>
								<?php
								for($i = 0; $i <$row5; $i++){?>
								<option <?php if($row2[18]==mysql_result($result5,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result5,$i,"name"));?></option>
								<?php
								}
								?>
							</select>
						</td>

						<th width="133">手术助理：</th>
						<td width="133" colspan="3">
							  <select name="zhixingren2">
								<option >请选择</option>
								<?php
								for($i = 0; $i <$row5; $i++){?>
								<option <?php if($row2[19]==mysql_result($result5,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result5,$i,"name"));?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
				</table>
				<!--诊断结果：
						<div >
							<textarea name="zhenduanjieguo" cols="111"  rows="4"wrap="hard" style="width:800px;"><?php echo $row2[13];?></textarea>
						</div-->
				备注：
						<div >
							<textarea name="chulijianyi" cols="111"  rows="4"wrap="hard" style="width:800px;"><?php echo $row2[14];?></textarea>
						</div>
				时间日期:
						<div>
   							<input type="text" name="date2" value="<?php echo $time; ?>" />
						</div>
				</div>
				</div>
				<div id="footer" align="center" style="font-size:24px;">
			<input  class="but1" type="submit" name="submit10" value="保存"  />
			<input  class="but2" type="button" value="返回"onclick="window.location.href='shoushu.php'" />
			</div>
				</form>
				<div id="main3">
				<div class="table">
				<table width="800">
				<tr><td  colspan="6" align="center"><h3>住院医师表</h3></td></tr>
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
						<td width="133" class="index1"><?php echo $row3[1]; ?></td>
					</tr>
					<tr>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row3[2]; ?></td>
						<th width="133">光定位：</th>
						<td width="133" class="index1"><?php echo $row3[3]; ?></td>
						<th width="133">辨别视力：</th>
						<td width="133" class="index1"><?php echo $row3[4]; ?></td>
					</tr>
					<tr>
						<th width="133">眼睑：</th>
						<td width="133" class="index1"><?php echo $row3[5]; ?></td>
						<th width="133">泪器：</th>
						<td width="133" class="index1"><?php echo $row3[6]; ?></td>
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row3[7]; ?></td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row3[8]; ?></td>
						<th width="133">虹膜：</th>
						<td width="133" class="index1"><?php echo $row3[9]; ?></td>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133" class="index1"><?php echo $row3[10]; ?></td>
					</tr>
					<tr>
						<th width="133">瞳孔-黏连：</th>
						<td width="133" class="index1"><?php echo $row3[11]; ?></td>
						<th width="133">瞳孔-大小：</th>
						<td width="133" class="index1"><?php echo $row3[12]; ?></td>
						<th width="133">晶体：</th>
						<td width="133" class="index1"><?php echo $row3[13]; ?></td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row3[14]; ?></td>
						<th width="133" >球镜：</th>
						<td width="133"class="index1"><?php echo $row3[15]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row3[16]; ?></td>
					</tr>
					<tr>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row3[17]; ?></td>
						<th width="133" >眼底：</th>
						<td width="133"class="index1"><?php echo $row3[18]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row3[19]; ?></td>
					</tr>
					<tr>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row3[20]; ?></td>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row3[21]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row3[22]; ?></td>
					</tr>
					<tr><th>右眼:</th></tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133" class="index1"><?php echo $row3[23]; ?></td>
					</tr>
					<tr>
						<th width="133">裸眼视力：</th>
						<td width="133" class="index1"><?php echo $row3[24]; ?></td>
						<th width="133">光定位：</th>
						<td width="133" class="index1"><?php echo $row3[25]; ?></td>
						<th width="133">辨别视力：</th>
						<td width="133" class="index1"><?php echo $row3[26]; ?></td>
					</tr>
					<tr>
						<th width="133">眼睑：</th>
						<td width="133" class="index1"><?php echo $row3[27]; ?></td>
						<th width="133">泪器：</th>
						<td width="133" class="index1"><?php echo $row3[28]; ?></td>
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row3[29]; ?></td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row3[30]; ?></td>
						<th width="133">虹膜：</th>
						<td width="133" class="index1"><?php echo $row3[31]; ?></td>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133" class="index1"><?php echo $row3[32]; ?></td>
					</tr>
					<tr>
						<th width="133">瞳孔-黏连：</th>
						<td width="133" class="index1"><?php echo $row3[33]; ?></td>
						<th width="133">瞳孔-大小：</th>
						<td width="133" class="index1"><?php echo $row3[34]; ?></td>
						<th width="133">晶体：</th>
						<td width="133" class="index1"><?php echo $row3[35]; ?></td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row3[36]; ?></td>
						<th width="133" >球镜：</th>
						<td width="133"class="index1"><?php echo $row3[37]; ?></td>
						<th width="133">柱镜：</th>
						<td width="133" class="index1"><?php echo $row3[38]; ?></td>
					</tr>
					<tr>
						<th width="133">轴向：</th>
						<td width="133" class="index1"><?php echo $row3[39]; ?></td>
						<th width="133" >眼底：</th>
						<td width="133"class="index1"><?php echo $row3[40]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row3[41]; ?></td>
					</tr>
					<tr>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row3[42]; ?></td>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row3[43]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row3[44]; ?></td>
					</tr>
					<tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row3[45]; ?></td>
					</tr>
					<tr class="ad">
						<th >处理意见：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row3[46]; ?></td>
					</tr>
					<tr>
						<th >检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row3[47]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row3[48]; ?></td>
					</tr>
					</table>
					</div>
					<table width="800">
					<tr><td  colspan="6" align="center"><h3>检查室</h3></td></tr>
					<tr>
						<th width="133">眼压：</th>
						<td width="133" class="index1"><?php echo $row4[1]; ?></th>
						<th width="133">角膜曲率K1：</td>
						<td width="133" class="index1"><?php echo $row4[2]; ?></th>
						<th width="133">角膜曲率K2：</td>
						<td width="133" class="index1"><?php echo $row4[3]; ?></th>
					</tr>
					<tr>
						<th width="133">眼轴A超：</th>
						<td width="133" class="index1"><?php echo $row4[4]; ?></td>
						<th width="133">眼轴激光：</th>
						<td width="133" class="index1"><?php echo $row4[5]; ?></td>
						<th width="133">内皮计数：</th>
						<td width="133" class="index1"><?php echo $row4[6]; ?></td>
					</tr>
					<tr>
						<th width="133">晶体度数：</th>
						<td width="133" class="index1"><?php echo $row4[7]; ?></th>
						<th width="133">预留度数：</td>
						<td width="133" class="index1"><?php echo $row4[8]; ?></th>
						<th width="133">验光：</td>
						<td width="133" class="index1"><?php echo $row4[9]; ?></td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133" class="index1"><?php echo $row4[10]; ?></td>
						<th width="133">柱镜：</th>
						<td class="index1"><?php echo $row4[11]; ?></td>
						<th width="133">轴向：</th>
						<td  class="index1"><?php echo $row4[12]; ?></td>
					</tr>
					<tr class="ad">
						<th >诊断结果：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row4[13]; ?></td>
					</tr>
					<tr class="ad">
						<th >处理意见：</th>
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
				</div>
  		</div>
	</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>