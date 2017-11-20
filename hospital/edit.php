<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>患者记录</title>
<script src="laydate/laydate.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" />
<?php
session_start();
if(empty($_SESSION['ID']))
exit();
$conn = mysql_connect("localhost","zjwdb_6166430","WJ6126294nmb")
or die("连接服务器失败！".mysql_error());
$select= mysql_query("use zjwdb_6166430",$conn)or die ("error");
mysql_query("set names utf8");
$_SESSION['id'] = $_GET['id'];
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
$sql7 = "select * from doctor where flag = 1";
$result7 = mysql_query($sql7,$conn);
$row7 = mysql_numrows($result7);
?>
<script>
function show(){
var value1 = document.getElementById('sss');
var div41 = document.getElementById('ccc1');
var div42 = document.getElementById('ccc2');
var div43 = document.getElementById('ccc3');
var div44 = document.getElementById('ccc4');
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
}
function jisuan(){
var a = document.getElementById('k1');
var b = document.getElementById('k2');
var c = document.getElementById('achao');
var d = document.getElementById('jingtidushu');
d.value = parseInt(a.value)+parseInt(b.value)+parseInt(c.value);
}
</script>
<body>
		<div id="container">
			<div id="header">
				<div id="header"><h1 align="center">患者记录</h1></div>
			</div>
			<div id="main">
				<div id="main1">
						<div><ul id="nav">
									<li><a href="index1.php" >首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a></li>
									<li><a href="change.php" >添加病人</a></li>
									<li><a href="doctorAdd.php" >添加医生</a></li>
									<li><a href="doctor.php" >医生信息</a></li>
									<li><a href="dustbin.php">回收站</a></li>
							 </ul>
						  <form method="post" action="search.php">
						  			<input name="text" type="text"  value="" style="height:30px; border:1px solid green;" size="20"  />
									<input type="submit"  class="search"  value="搜索"/>
								</form>
				  		</div>
						<h2 align="center">眼科门诊</h2>
				</div>

				<form name="patientchange"action="editpost.php" method="post" enctype="multipart/form-data">
					<div>
					<table width="800" border="2px">
					<tr>
						<th width="133">姓名：</th>
						<td width="133" >
						<input name="patientname" type="text" value="<?php echo $row1[1]; ?>" size="10"/>
						</td>
						<th width="133">性别：</th>
						<td width="133">
								<input name="sex"   type="radio" value="男"<?php if($row1[2]=="男"){?>checked<?php }?> />男
				 				<input name="sex"  type="radio" value="女"<?php if($row1[2]=="女"){?>checked<?php }?> />女
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
						<th width="133">左眼视力：</th>
						<td width="133">
							 <input name="leftsight" type="text" value="<?php echo $row2[1]; ?>" />
						</td>
						<th width="133">右眼视力：</th>
						<td width="133">
							<input name="rightsight" type="text" value="<?php echo $row2[2]; ?>" />
						</td>
						<th width="133">光感：</th>
						<td width="133">
							  <input name="guanggan" type="text" value="<?php echo $row2[3]; ?>"  />
						</td>
					</tr>
					<tr>
						<th width="133">指数：</th>
						<td width="133">
							  <select name="zhishu">
							    <option >请选择</option>
								<option <?php if($row2[4]=="0.1"){?>selected<?php }?>>0.1</option>
								<option <?php if($row2[4]=="0.12"){?>selected<?php }?>>0.12</option>
								<option <?php if($row2[4]=="0.15"){?>selected<?php }?>>0.15</option>
								<option <?php if($row2[4]=="0.2"){?>selected<?php }?>>0.2</option>
								<option <?php if($row2[4]=="0.25"){?>selected<?php }?>>0.25</option>
								<option <?php if($row2[4]=="0.3"){?>selected<?php }?>>0.3</option>
								<option <?php if($row2[4]=="0.4"){?>selected<?php }?>>0.4</option>
								<option <?php if($row2[4]=="0.5"){?>selected<?php }?>>0.5</option>
								<option <?php if($row2[4]=="0.6"){?>selected<?php }?>>0.6</option>
								<option <?php if($row2[4]=="0.8"){?>selected<?php }?>>0.8</option>
								<option <?php if($row2[4]=="1.0"){?>selected<?php }?>>1.0</option>
						  </select>
						 </td>
						<th width="133">光定位：</th>
						<td width="133">
							 <select name="guangdingwei">
							  		<option >请选择</option>
        	                   		<option <?php if($row2[5]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[5]=="管状视野"){?>selected<?php }?>>管状视野</option>
									<option <?php if($row2[5]=="鼻翼缺陷"){?>selected<?php }?>>鼻翼缺陷</option>
   				  	      </select> 
						 </td>
						<th width="133">辨别视力：</th>
						<td width="133">
							 <select name="bianbieshili">
							  <option >请选择</option>
							<option <?php if($row2[6]=="红"){?>selected<?php }?>>红</option>	
							<option <?php if($row2[6]=="绿"){?>selected<?php }?>>绿</option>
							</select>
						</td>
					</tr>
					<tr>
						<th width="133">眼睑：</th>
						<td width="133">
							<select name="yanjian">
							<option >请选择</option>
								<option <?php if($row2[7]=="正常"){?>selected<?php }?>>正常</option>	
								<option <?php if($row2[7]=="侧生"){?>selected<?php }?>>侧生</option>
								<option <?php if($row2[7]=="肥厚"){?>selected<?php }?>>肥厚</option>	
							</select>	
						</td>
						<th width="133">泪器：</th>
						<td width="133">
							<select name="leiqi">
							<option >请选择</option>
								<option <?php if($row2[8]=="通畅"){?>selected<?php }?>>通畅</option>	
								<option <?php if($row2[8]=="脓液"){?>selected<?php }?>>脓液</option>
								<option <?php if($row2[8]=="返流"){?>selected<?php }?>>返流</option>	
							</select>	
						</td>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo">
							  <option >请选择</option>
								<option <?php if($row2[9]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[9]=="薄翳"){?>selected<?php }?>>薄翳</option>
								<option <?php if($row2[9]=="斑翳"){?>selected<?php }?>>斑翳</option>	
								<option <?php if($row2[9]=="白斑"){?>selected<?php }?>>白斑</option>	
							</select>
						</td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133">
								<select name="qianfang">
							<option >请选择</option>
								<option <?php if($row2[10]=="正常"){?>selected<?php }?>>正常</option>	
								<option <?php if($row2[10]=="浅"){?>selected<?php }?>>浅</option>
								<option <?php if($row2[10]=="深"){?>selected<?php }?>>深</option>	
							</select>
						</td>
						<th width="133">虹膜：</th>
						<td width="133">
							<select name="hongmo">
							<option >请选择</option>
								<option <?php if($row2[11]=="清澈"){?>selected<?php }?>>清澈</option>	
								<option <?php if($row2[11]=="模糊"){?>selected<?php }?>>模糊</option>
							</select>
						</td>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133">
							<select name="duiguangfanshe">
									<option >请选择</option>
										<option <?php if($row2[12]=="正常"){?>selected<?php }?>>正常</option>	
										<option <?php if($row2[12]=="迟钝"){?>selected<?php }?>>迟钝</option>
									</select>
						</td>
					</tr>
					<tr>
						<th width="133">瞳孔-黏连：</th>
						<td width="133">
							<select name="nianlian">
									<option>请选择</option>
										<option <?php if($row2[13]=="无"){?>selected<?php }?>>无</option>	
										<option <?php if($row2[13]=="有"){?>selected<?php }?>>有</option>
									</select>
						</td>
						<th width="133">瞳孔-大小：</th>
						<td width="133">
								<select name="daxiao">
									<option >请选择</option>
										<option <?php if($row2[14]=="中等散大"){?>selected<?php }?>>中等散大</option>	
										<option <?php if($row2[14]=="极度散大"){?>selected<?php }?>>极度散大</option>
									</select>
						</td>
						<th width="133">晶体：</th>
						<td width="133">
							<select name="jingti">
							<option >请选择</option>
								<option <?php if($row2[15]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[15]=="皮质浑浊"){?>selected<?php }?>>皮质浑浊</option>
								<option <?php if($row2[15]=="后囊浑浊"){?>selected<?php }?>>后囊浑浊</option>	
							</select>
						</td>
					</tr>
					<tr>
						<th width="133">玻璃体：</th>
						<td width="133">
							<select name="boliti">
							<option >请选择</option>
								<option <?php if($row2[16]=="透明"){?>selected<?php }?>>透明</option>	
								<option <?php if($row2[16]=="浑浊"){?>selected<?php }?>>浑浊</option>
							</select>
						</td>
						<th width="133">眼底：</th>
						<td width="133">
							<select id="sss" onchange="show();" name="yandi">
								<option >请选择</option>
									<option value="正常"<?php if($row2[17]=="正常"){?>selected<?php }?>>正常</option>
									<option value="非正常" <?php if($row2[17]=="非正常"){?>selected<?php }?>>非正常</option>
							  	</select> 
						 </td>
						<th width="133">视盘：</th>
						<td width="133">
							 <select  name="shipan" >
								  <option >正常</option>
									<option <?php if($row2[18]=="色淡"){?>selected<?php }?>>色淡</option>
									<option <?php if($row2[18]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[18]=="边界模糊"){?>selected<?php }?>>边界模糊</option>
								  </select>  
						 </td>
					</tr>
					<tr>
						<th width="133">黄斑：</th>
						<td width="133">
							<select name="huangban">
								  <option >正常</option>
									<option <?php if($row2[19]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[19]=="变形"){?>selected<?php }?>>变形</option>
									<option <?php if($row2[19]=="萎缩"){?>selected<?php }?>>萎缩</option>
									<option <?php if($row2[19]=="出血"){?>selected<?php }?>>出血</option>
								  </select>
						</td>
						<th width="133">动脉：</th>
						<td width="133">
							  <select name="dongmai">
								  <option >正常</option>
									<option <?php if($row2[20]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row2[20]=="纤细"){?>selected<?php }?>>纤细</option>
									<option <?php if($row2[20]=="堵塞"){?>selected<?php }?>>堵塞</option>
								  </select>
						</td>
						<th width="133">网膜：</th>
						<td width="133">
							 <select name="wangmo">
								  <option >正常</option>
									<option <?php if($row2[21]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row2[21]=="出血"){?>selected<?php }?>>出血</option>
									<option <?php if($row2[21]=="脱离"){?>selected<?php }?>>脱离</option>
								  </select>
						</td>
					</tr>	 
				</table>
			</div>
			 <div align="right">
			接诊医生<select name="doctor1">
								<option  >请选择</option>
								<?php
								for($i = 0; $i <$row7; $i++){?>
								<option <?php if($row2[22]==mysql_result($result7,$i,"name")){?>selected<?php }?>><?php echo(mysql_result($result7,$i,"name"));?></option>
								<?php
								}
								?>
			</select><br>
   				<input readonly class="layinput" id="hello1" size="10" name="date1" value="<?php echo $row2[23]; ?>">
   				<div class="laydate-icon " onClick="laydate({elem: '#hello1'});" style="width:10px;display:inline-block;border:none;"></div>
			</div>
			<div id="main1"><h2 align="center">检查室</h2>
			<div>
				<table width="800px" border="2px">
					<tr>
						<th width="133">眼压：</th>
						<td width="133"> 
						 <input name="yanya" type="text" size="5" value="<?php echo $row3[1]; ?>" />mmHg
						 </th>
						<th width="133">角膜曲率K1：</td>
						<td width="133">
							 <input name="k1" type="text"  size="5" value="<?php echo $row3[2]; ?>" />
						</th>
						<th width="133">角膜曲率K2：</td>
						<td width="133">
							  <input name="k2" type="text" size="5" value="<?php echo $row3[3]; ?>" />
						</th>
					</tr>
					<tr>
						<th width="133">眼轴A超：</th>
						<td width="133"> 
						 <input name="achao" type="text" size="5" value="<?php echo $row3[4]; ?>" />mm
						 </td>
						<th width="133">眼轴激光：</th>
						<td width="133">
							  <input name="jiguang" type="text" size="5" value="<?php echo $row3[5]; ?>" />mm
						</td>
						<th width="133">内皮计数：</th>
						<td width="133">
							  <input name="neipijishu" type="text" size="5" value="<?php echo $row3[6]; ?>" /> 
						</td>
					</tr>
					<tr>
						<th width="133">晶体度数：</th>
						<td width="133">
							  <input name="jingtidushu" type="text"  size="5" value="<?php echo $row3[7]; ?>" />D
						</th>
						<th width="133">预留度数：</td>
						<td width="133">
							 <input name="yuliudushu" type="text" size="5" value="<?php echo $row3[8]; ?>" />D
						</th>
						<th width="133">验光：</td>
						<td width="133">
							 <input name="yanguang" type="text" size="5" value="<?php echo $row3[9]; ?>" />
						</td>
					</tr>
					<tr>
						<th width="133">球镜：</th>
						<td width="133">
							<input name="qiujing" type="text" size="5" value="<?php echo $row3[10]; ?>" />D
						</td>
						<th width="133">柱镜：</th>
						<td  colspan="3">
							<input name="zhujing" type="text" size="5" value="<?php echo $row3[11]; ?>" />DCX
						</td>
					</tr>
				</table>
			</div>
			<div>
				<table width="800px">
					<tr>
						<td align="right">
							检查医生：
							  <select name="doctor2">
							  <option  >请选择</option>
								<?php
								for($i = 0; $i <$row7; $i++){?>
								<option <?php if($row3[12]==mysql_result($result7,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result7,$i,"name"));?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
				</table>
			</div>
			
			<div>
				<table width="800px">
					<tr>
						<td align="right"><input readonly class="layinput" id="hello2" size="10" name="date2" value="<?php echo $row3[13]; ?>">
   				<div class="laydate-icon " onClick="laydate({elem: '#hello2'});" style="width:10px;display:inline-block;border:none;"></div></td>
					</tr>
				</table>
			</div>
		<div id="main2"><h2 align="center">手术室</h2>
			<table width="800px" border="2px">
					<tr>
						<th width="133" rowspan="3">护理：</th>
						<th  width="133">结膜冲洗：</th>
						<td width="133">
							<select name="jiemochongxi">
								<option  >请选择</option>
								<option <?php if($row4[1]=="安乐福"){?>selected<?php }?>>安乐福</option>
								<option <?php if($row4[1]=="碘伏"){?>selected<?php }?>>碘伏</option>
							</select>
						</td>
						<td width="133" align="center"><strong>执行人：</strong></td>
						<td width="133" colspan="3">
									<select name="zhixingren1">
								<option>请选择</option>
															<?php
								for($i = 0; $i <$row7; $i++){?>
								<option <?php if($row4[2]==mysql_result($result7,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result7,$i,"name"));?></option>
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
								<option <?php if($row4[3]=="安乐福"){?>selected<?php }?>>安乐福</option>
								<option <?php if($row4[3]=="碘伏"){?>selected<?php }?>>碘伏</option>
							</select>
						</td>
						<th width="133">执行人：</th>
						<td width="133" colspan="3">
							  <select name="zhixingren2">
								<option >请选择</option>
								<?php
								for($i = 0; $i <$row7; $i++){?>
								<option <?php if($row4[4]==mysql_result($result7,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result7,$i,"name"));?></option>
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
								for($i = 0; $i <$row7; $i++){?>
								<option <?php if($row4[5]==mysql_result($result7,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result7,$i,"name"));?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th width="133">手术时间：</th>
						<td width="133">
							 <input readonly class="layinput" id="hello3" size="10" name="shoushushijian" value="<?php echo $row4[6]; ?>">
   				<div class="laydate-icon " onClick="laydate({elem: '#hello3'});" style="width:10px;display:inline-block;border:none;"></div> 
						</td>
						<th width="133">麻醉方式：</th>
						<td width="133" colspan="3">
							<select name="mazuifangshi">
								<option  >请选择</option>
								<option <?php if($row4[7]=="表麻"){?>selected<?php }?>>表麻</option>
								<option <?php if($row4[7]=="结膜下"){?>selected<?php }?>>结膜下</option>
							</select>	
						</td>
					</tr>
					<tr>
						<th width="133">切口术中：</th>
						<td width="133">
							<select name="shuzhongqiekou">
								<option >请选择</option>
									<option <?php if($row4[8]=="环切"){?>selected<?php }?>>环切</option>
									<option <?php if($row4[8]=="截束"){?>selected<?php }?>>截束</option>
							  	</select> 
						</td>
						<th width="133">切口后来破裂：</th>
						<td width="133">
							  <select name="houlaipolie">
								  <option >请选择</option>
									<option <?php if($row4[9]=="有"){?>selected<?php }?>>有</option>
									<option <?php if($row4[9]=="无"){?>selected<?php }?>>无</option>
								  </select>  
						</td>
						<th width="133">切口晶体位置：</th>
						<td width="133">
							  <select name="jingtiweizhi">
								  <option>请选择</option>
									<option <?php if($row4[10]=="束袋内"){?>selected<?php }?>>束袋内</option>
									<option <?php if($row4[10]=="睫沟内"){?>selected<?php }?>>睫沟内</option>
								  </select>
						</td>
					</tr>
				</table>
			  </div>
			  <div>
				<table width="800px">
					<tr>
						<td align="right">
							手术医生：
							  <select name="doctor4">
								<option  >请选择</option>
								<?php
								for($i = 0; $i <$row7; $i++){?>
								<option <?php if($row4[11]==mysql_result($result7,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result7,$i,"name"));?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
				</table>
			</div>
			
			<div>
				<table width="800px">
					<tr>
						<td align="right"><input readonly class="layinput" id="hello4" size="10" name="date4">
   				<div class="laydate-icon " onClick="laydate({elem: '#hello4'});" style="width:10px;display:inline-block;border:none;"></div></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="main3"><h2 align="center">出院检查</h2>
				<table width="800px" border="2px">
					<tr>
						<th width="133">左眼视力：</th>
						<td width="133">
							  <input name="leftsight2" type="text" size="5" value="<?php echo $row5[1]; ?>" />
						</td>
						<th width="133">右眼视力：</th>
						<td width="133">
							<input name="rightsight2" type="text" size="5" value="<?php echo $row5[2]; ?>" />
						</td>
						<th width="133">验光-球镜：</th>
						<td width="133">
							 <input name="qiujing2" type="text" size="5" value="<?php echo $row5[3]; ?>" />
						</td>
					</tr>
					<tr>
						<th width="133">验光-柱镜：</th>
						<td width="133">
							  <input name="zhujing2" type="text" size="16" value="<?php echo $row5[4]; ?>" /> 
						</td>
						<th width="133">结膜：</th>
						<td width="133">
								<select name="jiemo2">
								<option>请选择</option>
								<option <?php if($row5[5]=="正常"){?>selected<?php }?>>正常</option>
								<option <?php if($row5[5]=="水肿"){?>selected<?php }?>>水肿</option>
								<option <?php if($row5[5]=="充血"){?>selected<?php }?>>充血</option>
							</select>	
						</td>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo2">
								<option>请选择</option>
								<option <?php if($row5[6]=="透明"){?>selected<?php }?>>透明</option>
								<option <?php if($row5[6]=="内皮皱褶"){?>selected<?php }?>>内皮皱褶</option>
								<option <?php if($row5[6]=="水肿"){?>selected<?php }?>>水肿</option>
							</select>	
						</td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133">
							<select name="qianfang2">
								<option >请选择</option>
									<option <?php if($row5[7]=="清澈"){?>selected<?php }?> >清澈</option>
									<option <?php if($row5[7]=="闪辉"){?>selected<?php }?>>闪辉</option>
							  	</select> 
						</td>
						<th width="133">人工晶体：</th>
						<td width="133">
							   <select name="rengongjingti2">
								  <option >请选择</option>
									<option <?php if($row5[8]=="透明"){?>selected<?php }?> >透明</option>
									<option <?php if($row5[8]=="机化膜"){?>selected<?php }?>>机化膜</option>
									<option <?php if($row5[8]=="后束浑浊"){?>selected<?php }?> >后束浑浊</option>
								  </select>  
						</td>
						<th width="133">玻璃体：</th>
						<td width="133">
							 <select name="boliti2">
								  <option >请选择</option>
									<option <?php if($row5[9]=="浑浊"){?>selected<?php }?>>浑浊</option>
									<option <?php if($row5[9]=="大量浑浊"){?>selected<?php }?>>大量浑浊</option>
									<option <?php if($row5[9]=="化脓"){?>selected<?php }?>>化脓</option>
								  </select>
						</td>
					</tr>
					<tr>
						<th width="133">眼底-视盘：</th>
						<td width="133">
							   <select name="shipan2">
								  <option >请选择</option>
									<option <?php if($row5[10]=="色淡"){?>selected<?php }?>>色淡</option>
									<option <?php if($row5[10]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row5[10]=="边界模糊"){?>selected<?php }?>>边界模糊</option>
								  </select>  
						</td>
						<th width="133">眼底-黄斑：</th>
						<td width="133">
							  <select name="huangban2">
								  <option >请选择</option>
									<option <?php if($row5[11]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row5[11]=="变形"){?>selected<?php }?>>变形</option>
									<option <?php if($row5[11]=="萎缩"){?>selected<?php }?>>萎缩</option>
									<option <?php if($row5[11]=="出血"){?>selected<?php }?>>出血</option>
								  </select>
						</td>
						<th width="133">眼底-动脉：</th>
						<td width="133">
							 <select name="dongmai2">
								  <option >请选择</option>
									<option <?php if($row5[12]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row5[12]=="纤细"){?>selected<?php }?>>纤细</option>
									<option <?php if($row5[12]=="堵塞"){?>selected<?php }?>>堵塞</option>
								  </select>
						</td>
					</tr>
					<tr>
						<th width="133">眼底-网膜：</th>
						<td width="133">
						  <select name="wangmo2">
								  <option >请选择</option>
									<option <?php if($row5[13]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row5[13]=="出血"){?>selected<?php }?>>出血</option>
									<option <?php if($row5[13]=="脱离"){?>selected<?php }?>>脱离</option>
								  </select>
						</td>
					</tr>
				</table>
			  </div>
			   <div align="right">检查医生
					  <select name="doctor5">
								<option >请选择</option>
								<?php
								for($i = 0; $i <$row7; $i++){?>
								<option <?php if($row5[14]==mysql_result($result7,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result7,$i,"name"));?></option>
								<?php
								}
								?>
				 </select><br>
					<input readonly class="layinput" id="hello5" size="10" name="date5" value="<?php echo $row5[15]; ?>">
   				<div class="laydate-icon " onClick="laydate({elem: '#hello5'});" style="width:10px;display:inline-block;border:none;"></div>
			</div>
		<div id="main4"><h2 align="center">术后复查</h2>
			<table width="800px" border="2px">
					<tr>
						<th width="133">左眼视力：</th>
						<td width="133">
							<input name="leftsight3" type="text" size="5" value="<?php echo $row6[1]; ?>" />
						</td>
						<th width="133">右眼视力：</th>
						<td width="133">
							<input name="rightsight3" type="text" size="5" value="<?php echo $row6[2]; ?>" />
						</td>
						<th width="133">验光-球镜：</th>
						<td width="133">
							 <input name="qiujing3" type="text" size="5" value="<?php echo $row6[3]; ?>" />
						</td>
					</tr>
					<tr>
						<th width="133">验光-柱镜：</th>
						<td width="133"> 
							<input name="zhujing3" type="text" size="16" value="<?php echo $row5[4]; ?>" /> 
						</td>
						<th width="133">结膜：</th>
						<td width="133">
							<select name="jiemo3">
								<option>请选择</option>
								<option <?php if($row5[6]=="正常"){?>selected<?php }?>>正常</option>
								<option <?php if($row5[6]=="水肿"){?>selected<?php }?>>水肿</option>
								<option <?php if($row5[6]=="充血"){?>selected<?php }?>>充血</option>
							</select>	
						</td>
						<th width="133">角膜：</th>
						<td width="133">
							<select name="jiaomo3">
								<option>请选择</option>
								<option <?php if($row6[6]=="透明"){?>selected<?php }?>>透明</option>
								<option <?php if($row6[6]=="内皮皱褶"){?>selected<?php }?>>内皮皱褶</option>
								<option <?php if($row6[6]=="水肿"){?>selected<?php }?>>水肿</option>
							</select>	
						</td>
					</tr>
					<tr>
						<th width="133">前房：</th>
						<td width="133">
							<select name="qianfang3">
								<option >请选择</option>
									<option <?php if($row6[7]=="清澈"){?>selected<?php }?> >清澈</option>
									<option <?php if($row6[7]=="闪辉"){?>selected<?php }?>>闪辉</option>
							  	</select> 
						</td>
						<th width="133">人工晶体：</th>
						<td width="133">
							  <select name="rengongjingti3">
								  <option >请选择</option>
									<option <?php if($row6[8]=="透明"){?>selected<?php }?> >透明</option>
									<option <?php if($row6[8]=="机化膜"){?>selected<?php }?>>机化膜</option>
									<option <?php if($row6[8]=="后束浑浊"){?>selected<?php }?> >后束浑浊</option>
								  </select>  
						</td>
						<th width="133">玻璃体：</th>
						<td width="133">
							 <select name="boliti3">
								  <option >请选择</option>
									<option <?php if($row6[9]=="浑浊"){?>selected<?php }?>>浑浊</option>
									<option <?php if($row6[9]=="大量浑浊"){?>selected<?php }?>>大量浑浊</option>
									<option <?php if($row6[9]=="化脓"){?>selected<?php }?>>化脓</option>
								  </select>
						</td>
					</tr>
					<tr>
						<th width="133">眼底-视盘：</th>
						<td width="133">
							   <select name="shipan3">
								  <option >请选择</option>
									<option <?php if($row6[10]=="色淡"){?>selected<?php }?>>色淡</option>
									<option <?php if($row6[10]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row6[10]=="边界模糊"){?>selected<?php }?>>边界模糊</option>
								  </select>  
						</td>
						<th width="133">眼底-黄斑：</th>
						<td width="133">
							 <select name="huangban3">
								  <option >请选择</option>
									<option <?php if($row6[11]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row6[11]=="变形"){?>selected<?php }?>>变形</option>
									<option <?php if($row6[11]=="萎缩"){?>selected<?php }?>>萎缩</option>
									<option <?php if($row6[11]=="出血"){?>selected<?php }?>>出血</option>
								  </select>
						</td>
						<th width="133">眼底-动脉：</th>
						<td width="133">
							  <select name="dongmai3">
								  <option >请选择</option>
									<option <?php if($row6[12]=="正常"){?>selected<?php }?>>正常</option>
									<option <?php if($row6[12]=="纤细"){?>selected<?php }?>>纤细</option>
									<option <?php if($row6[12]=="堵塞"){?>selected<?php }?>>堵塞</option>
								  </select>
						</td>
					</tr>
					<tr>
						<th width="133">眼底-网膜：</th>
						<td width="133">
							 <select name="wangmo3">
								  <option >请选择</option>
									<option <?php if($row6[13]=="水肿"){?>selected<?php }?>>水肿</option>
									<option <?php if($row6[13]=="出血"){?>selected<?php }?>>出血</option>
									<option <?php if($row6[13]=="脱离"){?>selected<?php }?>>脱离</option>
								  </select>
						</td>
					</tr>
				</table>
			  </div>
			   <div align="right">检查医生
					  <select name="doctor6">
								<option >请选择</option>
								<?php
								for($i = 0; $i <$row7; $i++){?>
								<option <?php if($row6[14]==mysql_result($result7,$i,"name")){?>selected<?php }?> ><?php echo(mysql_result($result7,$i,"name"));?></option>
								<?php
								}
								?>
				 </select><br>
					<input readonly class="layinput" id="hello6" size="10" name="date6" value="<?php echo $row6[15]; ?>">
   				<div class="laydate-icon " onClick="laydate({elem: '#hello6'});" style="width:10px;display:inline-block;border:none;"></div>
			</div>	
			<div id="footer" align="center" style="font-size:24px;">
			<input type="submit" name="submit2" value="保存"  />
			<input type="button" value="返回" />
			</div>
	</form>
</script>
</body>
</html>
