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
<script>
function show(){
var value1 = document.getElementById('sss');
var div41 = document.getElementById('ccc1');
var div42 = document.getElementById('ccc2');
var div43 = document.getElementById('ccc3');
var div44 = document.getElementById('ccc4');
var value2 = document.getElementById('sss2');
var div45 = document.getElementById('ccc5');
var div46 = document.getElementById('ccc6');
var div47 = document.getElementById('ccc7');
var div48 = document.getElementById('ccc8');
if(value1.value=="非正常"){
div41.style.display="";
div42.style.display="";
div43.style.display="";
div44.style.display="";
}
else{
div41.style.display="none";
div42.style.display="none";
div43.style.display="none";
div44.style.display="none";
}
if(value2.value=="非正常"){
div45.style.display="";
div46.style.display="";
div47.style.display="";
div48.style.display="";
}
else{
div45.style.display="none";
div46.style.display="none";
div47.style.display="none";
div48.style.display="none";
}
}
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
$result5 = mysql_query($sql5,$conn)or die("error".mysql_error());
$row5 = mysql_fetch_array($result5);
if($row5[36]==1){
echo "<script language=\"javascript\">";
	  echo "alert('您已添加病人信息!');";
      echo "document.location=\"chuyuan.php\"";
      echo "</script>";
}
?>		
<body class="body3">
<a href="index.php" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
<div id="container3">
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
		<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';"></div>
  </div>
		<div id="left">
  		
  	</div>
  		<div id="right3">
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
					<div><h2 align="center">出院检查</h2></div>
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
						<td ><input type="button" onClick="selType('left')" value="左眼"/></td>
						<td ><input type="button" onClick="selType('right')" value="右眼"/></td>
					</tr>
					</table>
					<table width="800" border="2px" id="leftsight" style="display:block">
					<tr>
						<th width="133" >左眼</th>
					</tr>
					<tr>
						<th width="133" >矫正视力：</th>
						<td width="133">
							 <select name="leftsight">
							    <option >请选择</option>
								<option value="光感">光感</option>
								<option value="0.02">0.02</option>
								<option value="0.04">0.04</option>
								<option value="0.06">0.06</option>
								<option value="0.08">0.08</option>
								<option value="0.1">0.1</option>
								<option value="0.12">0.12</option>
								<option value="0.15">0.15</option>
								<option value="0.2">0.2</option>
								<option value="0.25">0.25</option>
								<option value="0.3">0.3</option>
								<option value="0.4">0.4</option>
								<option value="0.5">0.5</option>
								<option value="0.6">0.6</option>
								<option value="0.8">0.8</option>
								<option value="1.0">1.0</option>
						  </select>
						</td>
						<th width="133">裸眼视力：</th>
						<td width="133">
							  <select name="zhishu">
							    <option >请选择</option>
								<option value="光感">光感</option>
								<option value="0.02">0.02</option>
								<option value="0.04">0.04</option>
								<option value="0.06">0.06</option>
								<option value="0.08">0.08</option>
								<option value="0.1">0.1</option>
								<option value="0.12">0.12</option>
								<option value="0.15">0.15</option>
								<option value="0.2">0.2</option>
								<option value="0.25">0.25</option>
								<option value="0.3">0.3</option>
								<option value="0.4">0.4</option>
								<option value="0.5">0.5</option>
								<option value="0.6">0.6</option>
								<option value="0.8">0.8</option>
								<option value="1.0">1.0</option>
						  </select>
						</td>
						 <th width="133">结膜：</th>
						<td width="133">
								<select name="jiemo">
								<option>请选择</option>
								<option value="正常">正常</option>
								<option value="水肿">水肿</option>
								<option value="充血">充血</option>
							</select>	
						</td>
					</tr>
					<tr>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo">
								<option>请选择</option>
								<option value="透明">透明</option>
								<option value="内皮皱褶">内皮皱褶</option>
								<option value="水肿">水肿</option>
							</select>	
						</td>
						<th width="133">前房：</th>
						<td width="133">
							<select name="qianfang">
								<option >请选择</option>
									<option value="清澈" >清澈</option>
									<option value="闪辉" >闪辉</option>
							  	</select> 
						</td>
						<th width="133">玻璃体：</th>
						<td width="133">
							<select name="boliti">
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="浑浊" >浑浊</option>
									<option value="大量浑浊" >大量浑浊</option>
									<option value="化脓" >化脓</option>
								  </select>
						</td>
						<tr>
						<th width="133">球镜：</th>
						<td width="133"><input name="qiujing" type="text" size="5" value="" />D</td>
						<th width="133">柱镜：</th>
						<td width="133"><input name="zhujing" type="text" size="5" value="" />DC</td>
						<th width="133">轴向：</th>
						<td width="133"><input name="zhouxiang" type="text" size="5" value="" /></td>
					</tr>
					</tr>
					<tr style=" border:none;" >
						<th width="133">人工晶体：</th>
						<td colspan="5">
							  位正居中
							    <input type="checkbox" name="rengongjingti[]" value="位正居中">
						
							  位置偏斜
							  <input type="checkbox" name="rengongjingti[]" value="位置偏斜">
						
							  后囊浑浊<input type="checkbox" name="rengongjingti[]" value="后囊浑浊">
						
							  机化膜<input type="checkbox" name="rengongjingti[]" value="机化膜"> 
					  </td>
					</tr>
					<tr>
						<th width="133">眼底：</th>
						<td width="133"><select id="sss" onChange="show();" name="yandi" >
								<option >请选择</option>
									<option value="正常" >正常</option>
									<option value="非正常" >非正常</option>
							  	</select> </td>
						<th width="133">视盘：</th>
						<td width="133"><select id="ccc1"name="shipan"style="display:none;" >
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="色淡" >色淡</option>
									<option value="水肿" >水肿</option>
									<option value="边界模糊" >边界模糊</option>
								  </select>  </td>
						<th width="133">黄斑：</th>
						<td width="133"><select id="ccc2" name="huangban"style="display:none;">
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="水肿" >水肿</option>
									<option value="变形" >变形</option>
									<option value="萎缩" >萎缩</option>
									<option value="出血" >出血</option>
								  </select></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133"><select  id="ccc3"name="dongmai"style="display:none;">
								  <option >请选择</option>
									<option value="正常" >正常</option>
									<option value="纤细" >纤细</option>
									<option value="堵塞" >堵塞</option>
								  </select></td>
						<th width="133">网膜：</th>
						<td width="133"> <select  id="ccc4"name="wangmo"style="display:none;">
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="水肿" >水肿</option>
									<option value="出血" >出血</option>
									<option value="脱离" >脱离</option>
								  </select></td>
						<th width="133">复查时间：</th>
						<td width="133">
							 <select name="day">
								  <option >请选择</option>
									<option value="3" >3天</option>
									<option value="7" >一周</option>
									<option value="30" >一月</option>
								  </select>
						</td>
					</tr>
				</table>
				<table width="800"id="rightsight" border="2px" style="display:none">
					<tr>
						<th width="133" >右眼</th>
					</tr>
					<tr>
						<th width="133" >矫正视力：</th>
						<td width="133">
							 <select name="rightsight">
							    <option >请选择</option>
								<option value="光感">光感</option>
								<option value="0.02">0.02</option>
								<option value="0.04">0.04</option>
								<option value="0.06">0.06</option>
								<option value="0.08">0.08</option>
								<option value="0.1">0.1</option>
								<option value="0.12">0.12</option>
								<option value="0.15">0.15</option>
								<option value="0.2">0.2</option>
								<option value="0.25">0.25</option>
								<option value="0.3">0.3</option>
								<option value="0.4">0.4</option>
								<option value="0.5">0.5</option>
								<option value="0.6">0.6</option>
								<option value="0.8">0.8</option>
								<option value="1.0">1.0</option>
						  </select>
						</td>
						<th width="133">裸眼视力：</th>
						<td width="133">
							  <select name="zhishu2">
							    <option >请选择</option>
								<option value="光感">光感</option>
								<option value="0.02">0.02</option>
								<option value="0.04">0.04</option>
								<option value="0.06">0.06</option>
								<option value="0.08">0.08</option>
								<option value="0.1">0.1</option>
								<option value="0.12">0.12</option>
								<option value="0.15">0.15</option>
								<option value="0.2">0.2</option>
								<option value="0.25">0.25</option>
								<option value="0.3">0.3</option>
								<option value="0.4">0.4</option>
								<option value="0.5">0.5</option>
								<option value="0.6">0.6</option>
								<option value="0.8">0.8</option>
								<option value="1.0">1.0</option>
						  </select>
						</td>
						 <th width="133">结膜：</th>
						<td width="133">
								<select name="jiemo2">
								<option>请选择</option>
								<option value="正常">正常</option>
								<option value="水肿">水肿</option>
								<option value="充血">充血</option>
							</select>	
						</td>
					</tr>
					<tr>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo2">
								<option>请选择</option>
								<option value="透明">透明</option>
								<option value="内皮皱褶">内皮皱褶</option>
								<option value="水肿">水肿</option>
							</select>	
						</td>
						<th width="133">前房：</th>
						<td width="133">
							<select name="qianfang2">
								<option >请选择</option>
									<option value="清澈" >清澈</option>
									<option value="闪辉" >闪辉</option>
							  	</select> 
						</td>
						<th width="133">玻璃体：</th>
						<td width="133">
							<select name="boliti2">
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="浑浊" >浑浊</option>
									<option value="大量浑浊" >大量浑浊</option>
									<option value="化脓" >化脓</option>
								  </select>
						</td>
						<tr>
						<th width="133">球镜：</th>
						<td width="133"><input name="qiujing2" type="text" size="5" value="" />D</td>
						<th width="133">柱镜：</th>
						<td width="133"><input name="zhujing2" type="text" size="5" value="" />DC</td>
						<th width="133">轴向：</th>
						<td width="133"><input name="zhouxiang2" type="text" size="5" value="" /></td>
					</tr>
					</tr>
					<tr style=" border:none;" >
						<th width="133">人工晶体：</th>
						<td colspan="5">
							  位正居中<input type="checkbox" name="rengongjingti2[]" value="位正居中">
						
							  位置偏斜<input type="checkbox" name="rengongjingti2[]" value="位置偏斜">
						
							  后囊浑浊<input type="checkbox" name="rengongjingti2[]" value="后囊浑浊">
						
							  机化膜<input type="checkbox" name="rengongjingti2[]" value="机化膜"> 
						</td>
					</tr>
					<tr>
						<th width="133">眼底：</th>
						<td width="133"><select id="sss2" onChange="show();" name="yandi2" >
								<option >请选择</option>
									<option value="正常" >正常</option>
									<option value="非正常" >非正常</option>
							  	</select> </td>
						<th width="133">视盘：</th>
						<td width="133"><select id="ccc5"name="shipan2"style="display:none;" >
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="色淡" >色淡</option>
									<option value="水肿" >水肿</option>
									<option value="边界模糊" >边界模糊</option>
								  </select>  </td>
						<th width="133">黄斑：</th>
						<td width="133"><select id="ccc6" name="huangban2"style="display:none;">
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="水肿" >水肿</option>
									<option value="变形" >变形</option>
									<option value="萎缩" >萎缩</option>
									<option value="出血" >出血</option>
								  </select></td>
					</tr>
					<tr>
						<th width="133">动脉：</th>
						<td width="133"><select  id="ccc7"name="dongmai2"style="display:none;">
								  <option >请选择</option>
									<option value="正常" >正常</option>
									<option value="纤细" >纤细</option>
									<option value="堵塞" >堵塞</option>
								  </select></td>
						<th width="133">网膜：</th>
						<td width="133"> <select  id="ccc8"name="wangmo2"style="display:none;">
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="水肿" >水肿</option>
									<option value="出血" >出血</option>
									<option value="脱离" >脱离</option>
								  </select></td>
					</tr>
				</table>
				诊断结果：
						<div >
							<textarea name="zhenduanjieguo" cols="111"  rows="4"wrap="hard" style="width:800px;"></textarea>
						</div>
				处理意见：
						<div >
							<textarea name="chulijianyi" cols="111"  rows="4"wrap="hard" style="width:800px;"></textarea>
						</div>
				时间日期:
						<div>
   							<input type="text" name="date" name="date" value="<?php echo $time; ?>" />
						</div>
				</div>
				<div id="footer" align="center" style="font-size:24px;">
					<input  class="but1" type="submit" name="submit5" value="保存"  />
					<input  class="but2" type="button" value="返回"onclick="window.location.href='chuyuan.php'" />
				</div>
				</form>
				<div id="main3">
				<div class="table">
				<table width="800px">
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
					<tr><td  colspan="6" align="center"><h3>检查室</h3></td></tr>
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
					<table width="800">
					<tr><td  colspan="6" align="center"><h3>手术室</h3></td></tr>
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
</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</div>
</body>
</html>