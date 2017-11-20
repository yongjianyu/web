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
if($_SESSION['flag2']==0){
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
$sql2 = "select * from chuzhen where ID2 = ".$_GET['id'];
$result2 = mysql_query($sql2,$conn)or die("error");
$row2 = mysql_fetch_array($result2);
$sql3 = "select * from menzhen where ID2 = ".$_GET['id'];
$result3 = mysql_query($sql3,$conn)or die("error");
$row3 = mysql_fetch_array($result3);
if($row3[49]==1){
echo "<script language=\"javascript\">";
	  echo "alert('您已添加病人信息!');";
      echo "document.location=\"menzhen.php\"";
      echo "</script>";
}
?>
<body class="body">
<a href="index.php" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
<div id="container">
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
  		<div id="right">
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
					<div><h2 align="center">住院医师表</h2></div>
					<table width="800" border="2px">
					<tr>
						<th width="133">姓名：</th>
						<td width="133" >
						<input name="patientname" type="text" value="<?php echo $row1[1]; ?>" size="10"/>
						</td>
						<th width="133">性别：</th>
						<td width="133">
								<input name="sex"   type="radio" value="男"<?php if($row1[2]=="男"){?>checked<?php }?> />男
				 				<input name="sex"   type="radio" value="女"<?php if($row1[2]=="女"){?>checked<?php }?> />女
						</td>
						<th width="133">年龄：</th>
						<td width="133">
							<input name="age" type="text" value="<?php echo $row1[3]; ?>"size="5" />
						</td>
					</tr>
					<tr>
						<th width="133" >地址：</th>
						<td  colspan="5">
								<input type="text" name="address" value="<?php echo $row1[4]; ?>" size="20" />
						</td>
					</tr>
					<tr>
						<th width="133" >身份证：</th>
						<td  colspan="5">
							  <input name="idnum" type="text" value="<?php echo $row1[5]; ?>" />
						</td>
					</tr>
					<tr>
						<th width="133" >电话：</th>
						<td  colspan="5">
							 <input type="text"  name="tel" value="<?php echo $row1[6]; ?>" />
						</td>
					</tr>
					<tr>
						<th width="133" >邮箱：</th>
						<td  colspan="5"> 
							 <input  name="email"  type="text" value="<?php echo $row1[7]; ?>" />
						</td>
					</tr>
					<tr>
						<td><input type="button" onclick="selType('left')" value="左眼"/></td>
						<td><input type="button" onclick="selType('right')" value="右眼"/></td>
					</tr>
				</table>
					<table width="800" border="2px"id="leftsight" style="display:block">
					<tr>
						<th width="133" >左眼</th>
					</tr>
					<tr>
						<th width="133" >矫正视力：</th>
						<td width="133">
							 <select name="leftsight">
							    <option >请选择</option>
							    <option <?php if($row2[1]=="眼前指数"){?>selected<?php }?>>眼前指数</option>
							    <option <?php if($row2[1]=="手动"){?>selected<?php }?>>手动</option>
							    <option <?php if($row2[1]=="无光感"){?>selected<?php }?>>无光感</option>
							    <option <?php if($row2[1]=="一尺指数"){?>selected<?php }?>>一尺指数</option>
								<option <?php if($row2[1]=="光感"){?>selected<?php }?>>光感</option>
								<option <?php if($row2[1]=="0.02"){?>selected<?php }?>>0.02</option>
								<option <?php if($row2[1]=="0.04"){?>selected<?php }?>>0.04</option>
								<option <?php if($row2[1]=="0.06"){?>selected<?php }?>>0.06</option>
								<option <?php if($row2[1]=="0.08"){?>selected<?php }?>>0.08</option>
								<option <?php if($row2[1]=="0.1"){?>selected<?php }?>>0.1</option>
								<option <?php if($row2[1]=="0.12"){?>selected<?php }?>>0.12</option>
								<option <?php if($row2[1]=="0.15"){?>selected<?php }?>>0.15</option>
								<option <?php if($row2[1]=="0.2"){?>selected<?php }?>>0.2</option>
								<option <?php if($row2[1]=="0.25"){?>selected<?php }?>>0.25</option>
								<option <?php if($row2[1]=="0.3"){?>selected<?php }?>>0.3</option>
								<option <?php if($row2[1]=="0.4"){?>selected<?php }?>>0.4</option>
								<option <?php if($row2[1]=="0.5"){?>selected<?php }?>>0.5</option>
								<option <?php if($row2[1]=="0.6"){?>selected<?php }?>>0.6</option>
								<option <?php if($row2[1]=="0.8"){?>selected<?php }?>>0.8</option>
								<option <?php if($row2[1]=="1.0"){?>selected<?php }?>>1.0</option>
						  </select>
						</td>
						<th width="133">裸眼视力：</th>
						<td width="133">
							  <select name="zhishu">
							    <option >请选择</option>
							    <option <?php if($row2[2]=="眼前指数"){?>selected<?php }?>>眼前指数</option>
							    <option <?php if($row2[2]=="手动"){?>selected<?php }?>>手动</option>
							    <option <?php if($row2[2]=="无光感"){?>selected<?php }?>>无光感</option>
							    <option <?php if($row2[2]=="一尺指数"){?>selected<?php }?>>一尺指数</option>
								<option <?php if($row2[2]=="光感"){?>selected<?php }?>>光感</option>
								<option <?php if($row2[2]=="0.02"){?>selected<?php }?>>0.02</option>
								<option <?php if($row2[2]=="0.04"){?>selected<?php }?>>0.04</option>
								<option <?php if($row2[2]=="0.06"){?>selected<?php }?>>0.06</option>
								<option <?php if($row2[2]=="0.08"){?>selected<?php }?>>0.08</option>
								<option <?php if($row2[2]=="0.1"){?>selected<?php }?>>0.1</option>
								<option <?php if($row2[2]=="0.12"){?>selected<?php }?>>0.12</option>
								<option <?php if($row2[2]=="0.15"){?>selected<?php }?>>0.15</option>
								<option <?php if($row2[2]=="0.2"){?>selected<?php }?>>0.2</option>
								<option <?php if($row2[2]=="0.25"){?>selected<?php }?>>0.25</option>
								<option <?php if($row2[2]=="0.3"){?>selected<?php }?>>0.3</option>
								<option <?php if($row2[2]=="0.4"){?>selected<?php }?>>0.4</option>
								<option <?php if($row2[2]=="0.5"){?>selected<?php }?>>0.5</option>
								<option <?php if($row2[2]=="0.6"){?>selected<?php }?>>0.6</option>
								<option <?php if($row2[2]=="0.8"){?>selected<?php }?>>0.8</option>
								<option <?php if($row2[2]=="1.0"){?>selected<?php }?>>1.0</option>
						  </select>
						 </td>
						<th width="133">光定位：</th>
						<td width="133">
							 <select name="guangdingwei">
							  		<option >请选择</option>
        	                   		<option <?php if($row2[3]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[3]=="管状视野"){?>selected<?php }?>>管状视野</option>
									<option <?php if($row2[3]=="鼻翼缺陷"){?>selected<?php }?>>鼻翼缺陷</option>
   				  	      </select> 
						 </td>
					</tr>
						<th width="133">辨别视力：</th>
						<td width="133">
							 <select name="bianbieshili">
							  <option >请选择</option>
							<option <?php if($row2[4]=="红"){?>selected<?php }?>>红</option>	
							<option <?php if($row2[4]=="绿"){?>selected<?php }?>>绿</option>
							<option <?php if($row2[4]=="红绿"){?>selected<?php }?>>红绿</option>
							</select>
						</td>
						<th width="133">眼睑：</th>
						<td width="133">
							<select name="yanjian">
							<option >请选择</option>
								<option <?php if($row2[5]=="正常"){?>selected<?php }?>>正常</option>	
								<option <?php if($row2[5]=="侧生"){?>selected<?php }?>>侧生</option>
								<option <?php if($row2[5]=="肥厚"){?>selected<?php }?>>肥厚</option>	
							</select>	
						</td>
						<th width="133">泪器：</th>
						<td width="133">
							<select name="leiqi">
							<option >请选择</option>
								<option <?php if($row2[6]=="通畅"){?>selected<?php }?>>通畅</option>	
								<option <?php if($row2[6]=="脓液"){?>selected<?php }?>>脓液</option>
								<option <?php if($row2[6]=="返流"){?>selected<?php }?>>返流</option>	
							</select>	
						</td>
					</tr>
					<tr>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo">
							  <option >请选择</option>
								<option <?php if($row2[7]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[7]=="薄翳"){?>selected<?php }?>>薄翳</option>
								<option <?php if($row2[7]=="斑翳"){?>selected<?php }?>>斑翳</option>	
								<option <?php if($row2[7]=="白斑"){?>selected<?php }?>>白斑</option>	
							</select>
						</td>
						<th width="133">前房：</th>
						<td width="133">
								<select name="qianfang">
							<option >请选择</option>
								<option <?php if($row2[8]=="正常"){?>selected<?php }?>>正常</option>	
								<option <?php if($row2[8]=="浅"){?>selected<?php }?>>浅</option>
								<option <?php if($row2[8]=="深"){?>selected<?php }?>>深</option>	
							</select>
						</td>
						<th width="133">虹膜：</th>
						<td width="133">
							<select name="hongmo">
							<option >请选择</option>
								<option <?php if($row2[9]=="清澈"){?>selected<?php }?>>清澈</option>	
								<option <?php if($row2[9]=="模糊"){?>selected<?php }?>>模糊</option>
							</select>
						</td>
					</tr>
					<tr>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133">
							<select name="duiguangfanshe">
									<option >请选择</option>
										<option <?php if($row2[10]=="正常"){?>selected<?php }?>>正常</option>	
										<option <?php if($row2[10]=="迟钝"){?>selected<?php }?>>迟钝</option>
									</select>
						</td>
						<th width="133">瞳孔-黏连：</th>
						<td width="133">
							<select name="nianlian">
									<option>请选择</option>
										<option <?php if($row2[11]=="无"){?>selected<?php }?>>无</option>	
										<option <?php if($row2[11]=="有"){?>selected<?php }?>>有</option>
									</select>
						</td>
						<th width="133">瞳孔-大小：</th>
						<td width="133">
								<select name="daxiao">
									<option >请选择</option>
										<option <?php if($row2[12]=="正常"){?>selected<?php }?>>正常</option>	
										<option <?php if($row2[12]=="中等散大"){?>selected<?php }?>>中等散大</option>	
										<option <?php if($row2[12]=="极度散大"){?>selected<?php }?>>极度散大</option>
									</select>
						</td>
					</tr>
					<tr>
						<th width="133">晶体：</th>
						<td width="133">
							<select name="jingti">
							<option >请选择</option>
								<option <?php if($row2[13]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[13]=="核性浑浊"){?>selected<?php }?>>核性浑浊</option>
								<option <?php if($row2[13]=="皮质浑浊"){?>selected<?php }?>>皮质浑浊</option>
								<option <?php if($row2[13]=="后囊浑浊"){?>selected<?php }?>>后囊浑浊</option>	
							</select>
						</td>
						<th width="133">玻璃体：</th>
						<td width="133">
							<select name="boliti">
							<option >请选择</option>
								<option <?php if($row2[14]=="正常"){?>selected<?php }?>>正常</option>	
								<option <?php if($row2[14]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[14]=="浑浊"){?>selected<?php }?>>浑浊</option>
								<option <?php if($row2[14]=="积血"){?>selected<?php }?>>积血</option>
							</select>
						</td>
						<th width="133">球镜：</th>
						<td width="133"><input type="text" name="qiujing" value="<?php echo $row2[15];?>" /></td>
					</tr>
					<tr>
						<th width="133">柱镜：</th>
						<td width="133"><input type="text" name="zhujing" value="<?php echo $row2[16];?>"/></td>
						<th width="133">轴向：</th>
						<td width="133"><input type="text" name="zhouxiang" value="<?php echo $row2[17];?>" /></td>
						<th width="133">眼底：</th>
						<td width="133">
							<select id="sss" onchange="show();" name="yandi">
								<option >请选择</option>
									<option value="正常"<?php if($row2[18]=="正常"){?>selected<?php }?>>正常</option>
									<option value="非正常" <?php if($row2[18]=="非正常"){?>selected<?php }?>>非正常</option>
							  	</select> 
						 </td>
					</tr>
					<tr>
						<th width="133">视盘：</th>
						<td width="133">
							 <select id="ccc1"name="shipan"style="display:none;">
								  <option >请选择</option>
								  	<option <?php if($row2[19]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[19]=="色淡"){?>selected<?php }?>>色淡</option>
									<option <?php if($row2[19]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[19]=="边界模糊"){?>selected<?php }?>>边界模糊</option>
								  </select>  
						 </td>
						<th width="133">黄斑：</th>
						<td width="133">
							<select id="ccc2" name="huangban"style="display:none;">
								  <option >请选择</option>
								  	<option <?php if($row2[20]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[20]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[20]=="变形"){?>selected<?php }?>>变形</option>
									<option <?php if($row2[20]=="萎缩"){?>selected<?php }?>>萎缩</option>
									<option <?php if($row2[20]=="出血"){?>selected<?php }?>>出血</option>
								  </select>
						</td>
						<th width="133">动脉：</th>
						<td width="133">
							  <select  id="ccc3"name="dongmai"style="display:none;">
								  <option >请选择</option>
									<option <?php if($row2[21]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[21]=="纤细"){?>selected<?php }?>>纤细</option>
									<option <?php if($row2[21]=="堵塞"){?>selected<?php }?>>堵塞</option>
								  </select>
						</td>
					</tr>	 
					<tr>
					<th width="133">网膜：</th>
						<td width="133">
							  <select  id="ccc4"name="wangmo"style="display:none;">
								  <option >请选择</option>
								  	<option <?php if($row2[22]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[22]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[22]=="出血"){?>selected<?php }?>>出血</option>
									<option <?php if($row2[22]=="脱离"){?>selected<?php }?>>脱离</option>
								  </select>
						</td>
					</tr>
				</table>
				<table width="800" border="2px"id="rightsight" style="display:none">
					<tr>
						<th width="133" >左眼</th>
					</tr>
					<tr>
						<th width="133" >矫正视力：</th>
						<td width="133">
							 <select name="leftsight">
							    <option >请选择</option>
							    <option <?php if($row2[23]=="眼前指数"){?>selected<?php }?>>眼前指数</option>
							    <option <?php if($row2[23]=="手动"){?>selected<?php }?>>手动</option>
							    <option <?php if($row2[23]=="无光感"){?>selected<?php }?>>无光感</option>
							    <option <?php if($row2[23]=="一尺指数"){?>selected<?php }?>>一尺指数</option>
								<option <?php if($row2[23]=="光感"){?>selected<?php }?>>光感</option>
								<option <?php if($row2[23]=="0.02"){?>selected<?php }?>>0.02</option>
								<option <?php if($row2[23]=="0.04"){?>selected<?php }?>>0.04</option>
								<option <?php if($row2[23]=="0.06"){?>selected<?php }?>>0.06</option>
								<option <?php if($row2[23]=="0.08"){?>selected<?php }?>>0.08</option>
								<option <?php if($row2[23]=="0.1"){?>selected<?php }?>>0.1</option>
								<option <?php if($row2[23]=="0.12"){?>selected<?php }?>>0.12</option>
								<option <?php if($row2[23]=="0.15"){?>selected<?php }?>>0.15</option>
								<option <?php if($row2[23]=="0.2"){?>selected<?php }?>>0.2</option>
								<option <?php if($row2[23]=="0.25"){?>selected<?php }?>>0.25</option>
								<option <?php if($row2[23]=="0.3"){?>selected<?php }?>>0.3</option>
								<option <?php if($row2[23]=="0.4"){?>selected<?php }?>>0.4</option>
								<option <?php if($row2[23]=="0.5"){?>selected<?php }?>>0.5</option>
								<option <?php if($row2[23]=="0.6"){?>selected<?php }?>>0.6</option>
								<option <?php if($row2[23]=="0.8"){?>selected<?php }?>>0.8</option>
								<option <?php if($row2[23]=="1.0"){?>selected<?php }?>>1.0</option>
						  </select>
						</td>
						<th width="133">裸眼视力：</th>
						<td width="133">
							  <select name="zhishu2">
							    <option >请选择</option>
							    <option <?php if($row2[24]=="眼前指数"){?>selected<?php }?>>眼前指数</option>
							    <option <?php if($row2[24]=="手动"){?>selected<?php }?>>手动</option>
							    <option <?php if($row2[24]=="无光感"){?>selected<?php }?>>无光感</option>
							    <option <?php if($row2[24]=="一尺指数"){?>selected<?php }?>>一尺指数</option>
								<option <?php if($row2[24]=="光感"){?>selected<?php }?>>光感</option>
								<option <?php if($row2[24]=="0.02"){?>selected<?php }?>>0.02</option>
								<option <?php if($row2[24]=="0.04"){?>selected<?php }?>>0.04</option>
								<option <?php if($row2[24]=="0.06"){?>selected<?php }?>>0.06</option>
								<option <?php if($row2[24]=="0.08"){?>selected<?php }?>>0.08</option>
								<option <?php if($row2[24]=="0.1"){?>selected<?php }?>>0.1</option>
								<option <?php if($row2[24]=="0.12"){?>selected<?php }?>>0.12</option>
								<option <?php if($row2[24]=="0.15"){?>selected<?php }?>>0.15</option>
								<option <?php if($row2[24]=="0.2"){?>selected<?php }?>>0.2</option>
								<option <?php if($row2[24]=="0.25"){?>selected<?php }?>>0.25</option>
								<option <?php if($row2[24]=="0.3"){?>selected<?php }?>>0.3</option>
								<option <?php if($row2[24]=="0.4"){?>selected<?php }?>>0.4</option>
								<option <?php if($row2[24]=="0.5"){?>selected<?php }?>>0.5</option>
								<option <?php if($row2[24]=="0.6"){?>selected<?php }?>>0.6</option>
								<option <?php if($row2[24]=="0.8"){?>selected<?php }?>>0.8</option>
								<option <?php if($row2[24]=="1.0"){?>selected<?php }?>>1.0</option>
						  </select>
						 </td>
						<th width="133">光定位：</th>
						<td width="133">
							 <select name="guangdingwei2">
							  		<option >请选择</option>
        	                   		<option <?php if($row2[25]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[25]=="管状视野"){?>selected<?php }?>>管状视野</option>
									<option <?php if($row2[25]=="鼻翼缺陷"){?>selected<?php }?>>鼻翼缺陷</option>
   				  	      </select> 
						 </td>
					</tr>
						<th width="133">辨别视力：</th>
						<td width="133">
							 <select name="bianbieshili2">
							  <option >请选择</option>
							<option <?php if($row2[26]=="红"){?>selected<?php }?>>红</option>	
							<option <?php if($row2[26]=="绿"){?>selected<?php }?>>绿</option>
							<option <?php if($row2[26]=="红绿"){?>selected<?php }?>>红绿</option>
							</select>
						</td>
						<th width="133">眼睑：</th>
						<td width="133">
							<select name="yanjian2">
							<option >请选择</option>
								<option <?php if($row2[27]=="正常"){?>selected<?php }?>>正常</option>	
								<option <?php if($row2[27]=="侧生"){?>selected<?php }?>>侧生</option>
								<option <?php if($row2[27]=="肥厚"){?>selected<?php }?>>肥厚</option>	
							</select>	
						</td>
						<th width="133">泪器：</th>
						<td width="133">
							<select name="leiqi2">
							<option >请选择</option>
								<option <?php if($row2[28]=="通畅"){?>selected<?php }?>>通畅</option>	
								<option <?php if($row2[28]=="脓液"){?>selected<?php }?>>脓液</option>
								<option <?php if($row2[28]=="返流"){?>selected<?php }?>>返流</option>	
							</select>	
						</td>
					</tr>
					<tr>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo2">
							  <option >请选择</option>
								<option <?php if($row2[29]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[29]=="薄翳"){?>selected<?php }?>>薄翳</option>
								<option <?php if($row2[29]=="斑翳"){?>selected<?php }?>>斑翳</option>	
								<option <?php if($row2[29]=="白斑"){?>selected<?php }?>>白斑</option>	
							</select>
						</td>
						<th width="133">前房：</th>
						<td width="133">
								<select name="qianfang2">
							<option >请选择</option>
								<option <?php if($row2[30]=="正常"){?>selected<?php }?>>正常</option>	
								<option <?php if($row2[30]=="浅"){?>selected<?php }?>>浅</option>
								<option <?php if($row2[30]=="深"){?>selected<?php }?>>深</option>	
							</select>
						</td>
						<th width="133">虹膜：</th>
						<td width="133">
							<select name="hongmo2">
							<option >请选择</option>
								<option <?php if($row2[31]=="清澈"){?>selected<?php }?>>清澈</option>	
								<option <?php if($row2[31]=="模糊"){?>selected<?php }?>>模糊</option>
							</select>
						</td>
					</tr>
					<tr>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133">
							<select name="duiguangfanshe2">
									<option >请选择</option>
										<option <?php if($row2[32]=="正常"){?>selected<?php }?>>正常</option>	
										<option <?php if($row2[32]=="迟钝"){?>selected<?php }?>>迟钝</option>
									</select>
						</td>
						<th width="133">瞳孔-黏连：</th>
						<td width="133">
							<select name="nianlian2">
									<option>请选择</option>
										<option <?php if($row2[33]=="无"){?>selected<?php }?>>无</option>	
										<option <?php if($row2[33]=="有"){?>selected<?php }?>>有</option>
									</select>
						</td>
						<th width="133">瞳孔-大小：</th>
						<td width="133">
								<select name="daxiao2">
									<option >请选择</option>
										<option <?php if($row2[34]=="正常"){?>selected<?php }?>>正常</option>	
										<option <?php if($row2[34]=="中等散大"){?>selected<?php }?>>中等散大</option>	
										<option <?php if($row2[34]=="极度散大"){?>selected<?php }?>>极度散大</option>
									</select>
						</td>
					</tr>
					<tr>
						<th width="133">晶体：</th>
						<td width="133">
							<select name="jingti2">
							<option >请选择</option>
								<option <?php if($row2[35]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[35]=="核性浑浊"){?>selected<?php }?>>核性浑浊</option>
								<option <?php if($row2[35]=="皮质浑浊"){?>selected<?php }?>>皮质浑浊</option>
								<option <?php if($row2[35]=="后囊浑浊"){?>selected<?php }?>>后囊浑浊</option>	
							</select>
						</td>
						<th width="133">玻璃体：</th>
						<td width="133">
							<select name="boliti2">
							<option >请选择</option>
								<option <?php if($row2[36]=="正常"){?>selected<?php }?>>正常</option>	
								<option <?php if($row2[36]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[36]=="浑浊"){?>selected<?php }?>>浑浊</option>
								<option <?php if($row2[36]=="积血"){?>selected<?php }?>>积血</option>
							</select>
						</td>
						<th width="133">球镜：</th>
						<td width="133"><input type="text" name="qiujing2" value="<?php echo $row2[37] ;?>" /></td>
					</tr>
					<tr>
						<th width="133">柱镜：</th>
						<td width="133"><input type="text" name="zhujing2" value="<?php echo $row2[38] ;?>"/></td>
						<th width="133">轴向：</th>
						<td width="133"><input type="text" name="zhouxiang2" value="<?php echo $row2[39] ;?>" /></td>
						<th width="133">眼底：</th>
						<td width="133">
							<select id="sss2" onchange="show();" name="yandi2" onfocus="show();">
								<option >请选择</option>
									<option value="正常"<?php if($row2[40]=="正常"){?>selected<?php }?>>正常</option>
									<option value="非正常" <?php if($row2[40]=="非正常"){?>selected<?php }?>>非正常</option>
							  	</select> 
						 </td>
					</tr>
					<tr>
						<th width="133">视盘：</th>
						<td width="133">
							 <select id="ccc5"name="shipan2"style="display:none;">
								  <option >请选择</option>
								  	<option <?php if($row2[41]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[41]=="色淡"){?>selected<?php }?>>色淡</option>
									<option <?php if($row2[41]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[41]=="边界模糊"){?>selected<?php }?>>边界模糊</option>
								  </select>  
						 </td>
						<th width="133">黄斑：</th>
						<td width="133">
							<select id="ccc6" name="huangban2"style="display:none;">
								  <option >请选择</option>
								  	<option <?php if($row2[42]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[42]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[42]=="变形"){?>selected<?php }?>>变形</option>
									<option <?php if($row2[42]=="萎缩"){?>selected<?php }?>>萎缩</option>
									<option <?php if($row2[42]=="出血"){?>selected<?php }?>>出血</option>
								  </select>
						</td>
						<th width="133">动脉：</th>
						<td width="133">
							  <select  id="ccc7"name="dongmai2"style="display:none;">
								  <option >请选择</option>
									<option <?php if($row2[43]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[43]=="纤细"){?>selected<?php }?>>纤细</option>
									<option <?php if($row2[43]=="堵塞"){?>selected<?php }?>>堵塞</option>
								  </select>
						</td>
					</tr>	 
					<tr>
					<th width="133">网膜：</th>
						<td width="133">
							  <select  id="ccc8"name="wangmo2"style="display:none;">
								  <option >请选择</option>
								  	<option <?php if($row2[44]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[44]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[44]=="出血"){?>selected<?php }?>>出血</option>
									<option <?php if($row2[44]=="脱离"){?>selected<?php }?>>脱离</option>
								  </select>
						</td>
					</tr>
				</table>
				诊断结果：
						<div >
							<textarea name="zhenduanjieguo" cols="111"  rows="4"wrap="hard" style="width:800px;"><?php echo $row2[45];?></textarea>
						</div>
				处理意见：
						<div >
							<textarea name="chulijianyi" cols="111"  rows="4"wrap="hard" style="width:800px;"><?php echo $row2[46];?></textarea>
						</div>
				时间日期:
						<div>
   							<input type="text" name="date" name="date" value="<?php echo $time; ?>" />
						</div>
						<div align="center">
			<input class="but1" type="submit" name="submit2" value="保存"  />
			<input  class="but2" type="button" value="返回"onclick="window.location.href='menzhen.php'" /></div>
				</form>
				</div>
				</div>
  		</div>
	</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>