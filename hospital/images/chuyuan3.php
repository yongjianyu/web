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
<script>
function selType(val){
var bt1 = document.getElementById('leftsight');
var bt2 = document.getElementById('rightsight');
if(val == "left"){
	bt1.style.display = "block";
	bt2.style.display = "none";
}
if(val == "right"){
	bt1.style.display = "none";
	bt2.style.display = "block";

}
}
</script>
<?php
session_start();
if(empty($_SESSION['ID']))
exit();
if($_SESSION['flag5']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限查看!');";
      echo "document.location=\"index1.php\"";
      echo "</script>";
}
$_SESSION['ID2']=$_GET['id'];
$time= date("Y-m-d H:i:s");
$conn = mysql_connect("localhost","zjwdb_6166430","WJ6126294nmb")
or die("连接服务器失败！".mysql_error());
$select= mysql_query("use zjwdb_6166430",$conn)or die ("error");
mysql_query("set names utf8");
$sql1 = "select * from patient where ID2 = ".$_GET['id'];
$result1 = mysql_query($sql1,$conn)or die("error");
$row1 = mysql_fetch_array($result1);
$sql2 = "select * from outcheck where ID2 = ".$_GET['id'];
$result2 = mysql_query($sql2,$conn)or die("error");
$row2 = mysql_fetch_array($result2);
$time2= strtotime($time)-strtotime($row2[15]);
if($row2[26]!=$_SESSION['doctorname']&&$_SESSION['flag7']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限修改病人信息!');";
      echo "document.location=\"chuyuan.php\"";
      echo "</script>";
}
//使用explode函数对人工晶体数据解析，实现复选框功能
$rengongjingti = explode('|',$row2[7]);
$count1 = count($rengongjingti);
$rengongjingti2 = explode('|',$row2[19]);
$count2 = count($rengongjingti2);
/*if($time2>86400&&$_SESSION['flag7']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您已无法修改病人信息!');";
      echo "document.location=\"chuyuan.php\"";
      echo "</script>";
}*/
$sql3 = "select * from menzhen where ID2 = ".$_GET['id'];
$result3 = mysql_query($sql3,$conn)or die("error");
$row3 = mysql_fetch_array($result3);
$sql4 = "select * from checkin where ID2 = ".$_GET['id'];
$result4 = mysql_query($sql4,$conn)or die("error");
$row4 = mysql_fetch_array($result4);
$sql5 = "select * from operation where ID2 = ".$_GET['id'];
$result5 = mysql_query($sql5,$conn)or die("error");
$row5= mysql_fetch_array($result5);
$sql6 = "select * from patient where ID2 = ".$_GET['id'];
$result6 = mysql_query($sql6,$conn)or die("error");
$row6= mysql_fetch_array($result6);
?>
<body class="body1">
<a href="index.html" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
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
		<div id="left"></div>
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
					<div id="main2">
					<h2 align="center">出院检查</h2>
					<table width="800" border="2px">
					<tr>
						<th width="133">姓名：</th>
						<td width="133"  class="index1"><?php echo $row6[1]; ?></td>
						<th width="133">性别：</th>
						<td width="133" class="index1"><?php echo $row6[2]; ?></td>
						<th width="133">年龄：</th>
						<td width="133" class="index1"><?php echo $row6[3]; ?></td>
					</tr>
					<tr>
						<td><input type="button" onclick="selType('left')" value="左眼"/></td>
						<td><input type="button" onclick="selType('right')" value="右眼"/></td>
					</tr>
					</table>
					<table width="800px" border="2px" id="leftsight" style="display:block">
					<tr>
						<th width="133">左眼视力：</th>
						<td width="133">
							  <input name="leftsight" type="text" size="5" value="<?php echo $row2[1]; ?>" />
						</td>
						<th width="133">验光-球镜：</th>
						<td width="133">
							 <input name="qiujing" type="text" size="5" value="<?php echo $row2[2]; ?>" />
						</td>
						<th width="133">验光-柱镜：</th>
						<td width="133">
							  <input name="zhujing" type="text" size="16" value="<?php echo $row2[3]; ?>" /> 
						</td>
					</tr>
					<tr>
						<th width="133">结膜：</th>
						<td width="133">
								<select name="jiemo">
								<option>请选择</option>
								<option <?php if($row2[4]=="正常"){?>selected<?php }?>>正常</option>
								<option <?php if($row2[4]=="水肿"){?>selected<?php }?>>水肿</option>
								<option <?php if($row2[4]=="充血"){?>selected<?php }?>>充血</option>
							</select>	
						</td>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo">
								<option>请选择</option>
								<option <?php if($row2[5]=="透明"){?>selected<?php }?>>透明</option>
								<option <?php if($row2[5]=="内皮皱褶"){?>selected<?php }?>>内皮皱褶</option>
								<option <?php if($row2[5]=="水肿"){?>selected<?php }?>>水肿</option>
							</select>	
						</td>
						<th width="133">前房：</th>
						<td width="133">
							<select name="jiaomo2">
								<option>请选择</option>
								<option <?php if($row2[6]=="清澈"){?>selected<?php }?>>清澈</option>
								<option <?php if($row2[6]=="闪辉"){?>selected<?php }?>>闪辉</option>
							</select>
					</tr>
					<tr>
						<th width="133">人工晶体：</th>
						<td>
							  位正居中：<input type="checkbox" name="rengongjingti[]" value="位正居中" <?php for($i=0,$i<count1,$i++){if($rengongjingti=="位正居中"){?>checked<?php }} ?>>
						</td>
						<td>
							  位置偏斜：<input type="checkbox" name="rengongjingti[]" value="位置偏斜"<?php for($i=0,$i<count1,$i++){if($rengongjingti=="位置偏斜"){?>checked<?php }} ?>>
						</td>
						<td>
							  后囊浑浊<input type="checkbox" name="rengongjingti[]" value="后囊浑浊"<?php for($i=0,$i<count1,$i++){if($rengongjingti=="后囊浑浊"){?>checked<?php }} ?>>
						</td>
						<td>
							  机化膜<input type="checkbox" name="rengongjingti[]" value="机化膜"<?php for($i=0,$i<count1,$i++){if($rengongjingti=="机化膜"){?>checked<?php }} ?>> 
						</td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133">
							 <select name="boliti">
								  <option >请选择</option>
								  	<option <?php if($row2[8]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[8]=="浑浊"){?>selected<?php }?>>浑浊</option>
									<option <?php if($row2[8]=="大量浑浊"){?>selected<?php }?>>大量浑浊</option>
									<option <?php if($row2[8]=="化脓"){?>selected<?php }?>>化脓</option>
								  </select>
						</td>
						<th width="133">眼底-视盘：</th>
						<td width="133">
							   <select name="shipan">
								  <option >请选择</option>
								  	<option <?php if($row2[9]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[9]=="色淡"){?>selected<?php }?>>色淡</option>
									<option <?php if($row2[9]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[9]=="边界模糊"){?>selected<?php }?>>边界模糊</option>
								  </select>  
						</td>
						<th width="133">眼底-黄斑：</th>
						<td width="133">
							  <select name="huangban">
								  <option >请选择</option>
								  	<option <?php if($row2[10]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[10]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[10]=="变形"){?>selected<?php }?>>变形</option>
									<option <?php if($row2[10]=="萎缩"){?>selected<?php }?>>萎缩</option>
									<option <?php if($row2[10]=="出血"){?>selected<?php }?>>出血</option>
								  </select>
						</td>
					</tr>
					<tr>
						<th width="133">眼底-动脉：</th>
						<td width="133">
							 <select name="dongmai">
								  <option >请选择</option>
									<option <?php if($row2[11]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[11]=="纤细"){?>selected<?php }?>>纤细</option>
									<option <?php if($row2[11]=="堵塞"){?>selected<?php }?>>堵塞</option>
								  </select>
						</td>
						<th width="133">眼底-网膜：</th>
						<td width="133">
						  <select name="wangmo">
								  <option >请选择</option>
								  	<option <?php if($row2[12]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[12]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[12]=="出血"){?>selected<?php }?>>出血</option>
									<option <?php if($row2[12]=="脱离"){?>selected<?php }?>>脱离</option>
								  </select>
						</td>
						<th width="133">复查时间：</th>
						<td width="133">
							 <select name="day">
								  <option >请选择</option>
									<option <?php if($row2[25]=="3"){?>selected<?php }?>>3天</option>
									<option <?php if($row2[25]=="7"){?>selected<?php }?>>一周</option>
									<option <?php if($row2[25]=="30"){?>selected<?php }?>>一月</option>
								  </select>
						</td>
					</tr>
				</table>
					<table width="800px" border="2px" id="rightsight" style="display:none">
					<tr>
						<th width="133">右眼视力：</th>
						<td width="133">
							  <input name="rightsight" type="text" size="5" value="<?php echo $row2[13]; ?>" />
						</td>
						<th width="133">验光-球镜：</th>
						<td width="133">
							 <input name="qiujing2" type="text" size="5" value="<?php echo $row2[14]; ?>" />
						</td>
						<th width="133">验光-柱镜：</th>
						<td width="133">
							  <input name="zhujing2" type="text" size="16" value="<?php echo $row2[15]; ?>" /> 
						</td>
					</tr>
					<tr>
						<th width="133">结膜：</th>
						<td width="133">
								<select name="jiemo2">
								<option>请选择</option>
								<option <?php if($row2[16]=="正常"){?>selected<?php }?>>正常</option>
								<option <?php if($row2[16]=="水肿"){?>selected<?php }?>>水肿</option>
								<option <?php if($row2[16]=="充血"){?>selected<?php }?>>充血</option>
							</select>	
						</td>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo2">
								<option>请选择</option>
								<option <?php if($row2[17]=="透明"){?>selected<?php }?>>透明</option>
								<option <?php if($row2[17]=="内皮皱褶"){?>selected<?php }?>>内皮皱褶</option>
								<option <?php if($row2[17]=="水肿"){?>selected<?php }?>>水肿</option>
							</select>	
						</td>
						<th width="133">前房：</th>
						<td width="133">
							<select name="jiaomo2">
								<option>请选择</option>
								<option <?php if($row2[18]=="清澈"){?>selected<?php }?>>清澈</option>
								<option <?php if($row2[18]=="闪辉"){?>selected<?php }?>>闪辉</option>
							</select>	
						</td>
					</tr>
					<tr>
						<th width="133">人工晶体：</th>
						
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133">
							 <select name="boliti2">
								  <option >请选择</option>
								  	<option <?php if($row2[20]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[20]=="浑浊"){?>selected<?php }?>>浑浊</option>
									<option <?php if($row2[20]=="大量浑浊"){?>selected<?php }?>>大量浑浊</option>
									<option <?php if($row2[20]=="化脓"){?>selected<?php }?>>化脓</option>
								  </select>
						</td>
						<th width="133">眼底-视盘：</th>
						<td width="133">
							   <select name="shipan2">
								  <option >请选择</option>
								  	<option <?php if($row2[21]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[21]=="色淡"){?>selected<?php }?>>色淡</option>
									<option <?php if($row2[21]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[21]=="边界模糊"){?>selected<?php }?>>边界模糊</option>
								  </select>  
						</td>
						<th width="133">眼底-黄斑：</th>
						<td width="133">
							  <select name="huangban2">
								  <option >请选择</option>
								  	<option <?php if($row2[22]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[22]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[22]=="变形"){?>selected<?php }?>>变形</option>
									<option <?php if($row2[22]=="萎缩"){?>selected<?php }?>>萎缩</option>
									<option <?php if($row2[22]=="出血"){?>selected<?php }?>>出血</option>
								  </select>
						</td>
					</tr>
					<tr>
						<th width="133">眼底-动脉：</th>
						<td width="133">
							 <select name="dongmai2">
								  <option >请选择</option>
									<option <?php if($row2[23]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[23]=="纤细"){?>selected<?php }?>>纤细</option>
									<option <?php if($row2[23]=="堵塞"){?>selected<?php }?>>堵塞</option>
								  </select>
						</td>
						<th width="133">眼底-网膜：</th>
						<td width="133">
						  <select name="wangmo2">
								  <option >请选择</option>
								  	<option <?php if($row2[24]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[24]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[24]=="出血"){?>selected<?php }?>>出血</option>
									<option <?php if($row2[24]=="脱离"){?>selected<?php }?>>脱离</option>
								  </select>
						</td>
					</tr>
				</table>
				时间日期:
						<div>
   							<input type="text" name="date" value="<?php echo $time; ?>" />
						</div>
						</div>
					<div id="footer" align="center" style="font-size:24px;">
			<input  class="but1" type="submit" name="submit11" value="保存"  />
			<input  class="but2" type="button" value="返回" onclick="window.location.href='chuyuan.php'"/>
			</div>
			</form>
				<div id="main3">
				<div class="table">
				<table width="800">
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
					<tr align="center"><td>左眼：</td></tr>
					<tr>
						<th width="133">左眼视力：</th>
						<td width="133" class="index1"><?php echo $row3[1]; ?></td>
					</tr>
					<tr>
						<th width="133">指数：</th>
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
						<th width="133" >眼底：</th>
						<td width="133"class="index1"><?php echo $row3[15]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row3[16]; ?></td>
					</tr>
					<tr>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row3[17]; ?></td>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row3[18]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row3[19]; ?></td>
					</tr>
					<tr align="center"><td>右眼：</td></tr>
					<tr>
						<th width="133">右眼视力：</th>
						<td width="133" class="index1"><?php echo $row3[20]; ?></td>
					</tr>
					<tr>
						<th width="133">指数：</th>
						<td width="133" class="index1"><?php echo $row3[21]; ?></td>
						<th width="133">光定位：</th>
						<td width="133" class="index1"><?php echo $row3[22]; ?></td>
						<th width="133">辨别视力：</th>
						<td width="133" class="index1"><?php echo $row3[23]; ?></td>
					</tr>
					<tr>
						<th width="133">眼睑：</th>
						<td width="133" class="index1"><?php echo $row3[24]; ?></td>
						<th width="133">泪器：</th>
						<td width="133" class="index1"><?php echo $row3[25]; ?></td>
						<th width="133">角膜：</th>
						<td width="133" class="index1"><?php echo $row3[26]; ?></td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133" class="index1"><?php echo $row3[27]; ?></td>
						<th width="133">虹膜：</th>
						<td width="133" class="index1"><?php echo $row3[28]; ?></td>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133" class="index1"><?php echo $row3[29]; ?></td>
					</tr>
					<tr>
						<th width="133">瞳孔-黏连：</th>
						<td width="133" class="index1"><?php echo $row3[30]; ?></td>
						<th width="133">瞳孔-大小：</th>
						<td width="133" class="index1"><?php echo $row3[31]; ?></td>
						<th width="133">晶体：</th>
						<td width="133" class="index1"><?php echo $row3[32]; ?></td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row3[33]; ?></td>
						<th width="133" >眼底：</th>
						<td width="133"class="index1"><?php echo $row3[34]; ?></td>
						<th width="133">视盘：</th>
						<td width="133" class="index1"><?php echo $row3[35]; ?></td>
					</tr>
					<tr>
						<th width="133">黄斑：</th>
						<td width="133" class="index1"><?php echo $row3[36]; ?></td>
						<th width="133">动脉：</th>
						<td width="133" class="index1"><?php echo $row3[37]; ?></td>
						<th width="133">网膜：</th>
						<td width="133" class="index1"><?php echo $row3[38]; ?></td>
					</tr>
					<tr class="ad">
						<th>诊断意见：</th>
						<td width="133" class="index1" colspan="5"><?php echo $row3[39]; ?></td>
					</tr>
					<tr align="right">
						<th >检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row3[40]; ?></td>
					</tr>
					<tr align="right">
						<th>时间日期：</th>
						<td width="133" class="index1" colspan="2" align="left"><?php echo $row3[41]; ?></td>
					</tr>
					</table>
					</div>
					<div class="table">
					<table width="800">
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
						<td  colspan="3" class="index1"><?php echo $row4[11]; ?></td>
						<th width="133">轴向：</th>
						<td  colspan="3" class="index1"><?php echo $row4[12]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row4[13]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row4[14]; ?></td>
					</tr>
				</table>
			</div>
					<div class="table">
					<table width="800">
					<tr>
						<th width="133" rowspan="3">护理：</th>
						<th  width="133">结膜冲洗：</th>
						<td width="133" class="index1"><?php echo $row5[1]; ?></td>
						<th width="133">执行人：</th>
						<td width="133" colspan="3" class="index1"><?php echo $row5[2]; ?></td>
					</tr>
					<tr>
						<th width="133" >皮肤消毒：</th>
						<td  class="index1"><?php echo $row5[3]; ?></td>
						<th width="133">执行人：</th>
						<td width="133" colspan="3" class="index1"><?php echo $row5[4]; ?></td>
		 			</tr>
					<tr>
						<th width="133" >器械消毒：</th>
						<td></td>
						<th width="133">执行人：</th>
						<td  colspan="3" class="index1"><?php echo $row5[5]; ?></td>
					</tr>
					<tr>
						<th width="133">手术时间：</th>
						<td width="133" class="index1" align="left"><?php echo $row5[6]; ?></td>
						<th width="133">麻醉方式：</th>
						<td width="133" colspan="3" class="index1"><?php echo $row5[7]; ?></td>
					</tr>
					<tr>
						<th width="133">撕囊类型：</th>
						<td width="133" class="index1"><?php echo $row5[8]; ?></td>
						<th width="133">后囊情况：</th>
						<td width="133" class="index1"><?php echo $row5[9]; ?></td>
						<th width="133">晶体位置：</th>
						<td width="133" class="index1"><?php echo $row5[10]; ?></td>
					</tr>
					<tr>
						<th width="133">切口类型：</th>
						<td width="133" class="index1"><?php echo $row5[11]; ?></td>
						<th width="133">玻璃体：</th>
						<td width="133" class="index1"><?php echo $row5[12]; ?></td>
					</tr>
					<tr>
						<th>检查医生：</th>
						<td width="133" class="index1" align="left"><?php echo $row5[13]; ?></td>
					</tr>
					<tr>
						<th>时间日期：</th>
						<td width="133" class="index1" align="left" colspan="2"><?php echo $row5[14]; ?></td>
					</tr>
				</table>
				</div>
  		</div>
	</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>