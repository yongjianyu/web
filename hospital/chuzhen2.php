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
//非正常的检查js
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
if($_SESSION['flag1']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限查看!');";
      echo "document.location=\"chuzhen.php\"";
      echo "</script>";
}
$_SESSION['ID2']=$_GET['id'];
$time= date("Y-m-d H:i:s");
$time3= date("Y-m-d");
include_once("conn.php");
?>
<body class="body">
<a href="index.php" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
<div id="container">
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
				<div><h2 align="center">基本信息</h2></div>
					<table width="800" border="2px">
					<tr>
						<th width="133">姓名：</th>
						<td width="133" ><input name="patientname" type="text" value=""/></td>
						<th width="133">性别：</th>
						<td width="133"><input name="sex"   type="radio" value="男"checked />男
				 				<input name="sex"  type="radio" value="女" />女</td>
						<th width="133">年龄：</th>
						<td width="133"><input name="age" type="text" value=""/></td>
					</tr>
					<tr>
						<th width="133" >地址：</th>
						<td  colspan="5"><input type="text" name="address" value="" size="50"/></td>
					</tr>
					<tr>
						<th width="133" >身份证：</th>
						<td  colspan="5"><input name="idnum" type="text" value="" size="50"/></td>
					</tr>
					<tr>
						<th width="133" >电话：</th>
						<td  colspan="5"><input name="tel" type="text" value=""size="50" /></td>
					</tr>
					<tr>
						<th width="133" >邮箱：</th>
						<td  colspan="5"> <input  name="email"  type="text" value=""size="50" /></td>
					</tr>
					<tr>
						<td  colspan="5"> <input  name="date"  type="hidden" value="<?php echo $time3; ?>"size="50" h /></td>
					</tr>
					<tr>
						<td><input type="button" onclick="selType('left')" value="左眼"/></td>
						<td><input type="button" onclick="selType('right')" value="右眼"/></td>
					</tr>
					</table>
					<table width="800" border="2px" id="leftsight" style="display:block">
					<tr>
						<th width="133">左眼</th>
					</tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133"><select name="leftsight">
							    <option >请选择</option>
							    <option value="眼前指数">眼前指数</option>
							    <option value="手动">手动</option>
							    <option value="无光感">无光感</option>
							    <option value="一尺指数">一尺指数</option>
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
						  </select></td>
						  <th width="133">裸眼视力：</th>
						<td width="133"><select name="zhishu">
							    <option >请选择</option>
							    <option value="眼前指数">眼前指数</option>
							    <option value="手动">手动</option>
							    <option value="无光感">无光感</option>
							    <option value="一尺指数">一尺指数</option>
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
						<th width="133">光定位：</th>
						<td width="133"><select name="guangdingwei">
							  		<option >请选择</option>
        	                   		<option value="正常">正常</option>
									<option value="管状视野">管状视野</option>
									<option value="鼻翼缺陷">鼻翼缺陷</option>
   				  	      </select> </td>
					</tr>
					<tr>
						<th width="133">辨别视力：</th>
						<td width="133"><select name="bianbieshili">
							  <option >请选择</option>
							<option value="红" >红</option>	
							<option value="绿" >绿</option>
							<option value="红绿" >红绿</option>
							</select></td>
						<th width="133">眼睑：</th>
						<td width="133"><select name="yanjian">
							<option >请选择</option>
								<option value="正常" >正常</option>	
								<option value="侧生" >侧生</option>
								<option value="肥厚" >肥厚</option>	
							</select></td>
						<th width="133">泪器：</th>
						<td width="133"><select name="leiqi">
							<option >请选择</option>
								<option value="通畅" >通畅</option>	
								<option value="脓液" >脓液</option>
								<option value="返流" >返流</option>	
							</select>	</td>
					</tr>
					<tr>
						<th width="133">角膜：</th>
						<td width="133"><select name="jiaomo">
							  <option >请选择</option>
								<option value="透明" >透明</option>	
								<option value="薄翳" >薄翳</option>
								<option value="斑翳" >斑翳</option>	
								<option value="白斑" >白斑</option>	
							</select></td>
						<th width="133">前房：</th>
						<td width="133"><select name="qianfang">
							<option >请选择</option>
								<option value="正常" >正常</option>	
								<option value="浅" >浅</option>
								<option value="深" >深</option>	
							</select></td>
						<th width="133">虹膜：</th>
						<td width="133"><select name="hongmo">
							<option >请选择</option>
								<option value="清澈" >清澈</option>	
								<option value="模糊" >模糊</option>
							</select></td>
					</tr>
					<tr>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133"><select name="duiguangfanshe">
									<option >请选择</option>
										<option value="正常" >正常</option>	
										<option value="迟钝" >迟钝</option>
									</select></td>
						<th width="133">瞳孔-黏连：</th>
						<td width="133"><select name="nianlian">
									<option>请选择</option>
										<option value="无" >无</option>	
										<option value="有" >有</option>
									</select></td>
						<th width="133">瞳孔-大小：</th>
						<td width="133"><select name="daxiao">
									<option >请选择</option>
										<option value="正常" >正常</option>	
										<option value="中等散大" >中等散大</option>	
										<option value="极度散大" >极度散大</option>
									</select></td>
					</tr>
					<tr>
						<th width="133">晶体：</th>
						<td width="133"><select name="jingti">
							<option >请选择</option>
								<option value="透明" >透明</option>
								<option value="核性浑浊" >核性浑浊</option>	
								<option value="皮质浑浊" >皮质浑浊</option>
								<option value="后囊浑浊" >后囊浑浊</option>	
							</select></td>
						<th width="133">玻璃体：</th>
						<td width="133"><select name="boliti">
							<option >请选择</option>
								<option value="正常" >正常</option>	
								<option value="透明" >透明</option>	
								<option value="浑浊" >浑浊</option>
								<option value="积血" >积血</option>
							</select></td>
						<th width="133">球镜：</th>
						<td width="133"><input type="text" name="qiujing" /></td>
					</tr>
					<tr>
						<th width="133">柱镜：</th>
						<td width="133"><input type="text" name="zhujing" /></td>
						<th width="133">轴向：</th>
						<td width="133"><input type="text" name="zhouxiang" /></td>
						<th width="133">眼底：</th>
						<td width="133"><select id="sss" onchange="show();" name="yandi" >
								<option >请选择</option>
									<option value="正常" >正常</option>
									<option value="非正常" >非正常</option>
							  	</select> </td>
					</tr>
					<tr>
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
						<th width="133">动脉：</th>
						<td width="133"><select  id="ccc3"name="dongmai"style="display:none;">
								  <option >请选择</option>
									<option value="正常" >正常</option>
									<option value="纤细" >纤细</option>
									<option value="堵塞" >堵塞</option>
								  </select></td>
					</tr>
					<tr>
						<th width="133">网膜：</th>
						<td width="133"> <select  id="ccc4"name="wangmo"style="display:none;">
								  <option >请选择</option>
								  	<option value="正常" >正常</option>
									<option value="水肿" >水肿</option>
									<option value="出血" >出血</option>
									<option value="脱离" >脱离</option>
								  </select></td>
					</tr>
					</table>
					<table width="800" id="rightsight" border="2px" style="display:none">
					<tr>
						<th width="133">右眼</th>
					</tr>
					<tr>
						<th width="133">矫正视力：</th>
						<td width="133"><select name="rightsight">
							    <option >请选择</option>
							     <option value="眼前指数">眼前指数</option>
							    <option value="手动">手动</option>
							    <option value="无光感">无光感</option>
							    <option value="一尺指数">一尺指数</option>
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
						  </select></td>
						  <th width="133">裸眼视力：</th>
						<td width="133"><select name="zhishu2">
							    <option >请选择</option>
							     <option value="眼前指数">眼前指数</option>
							    <option value="手动">手动</option>
							    <option value="无光感">无光感</option>
							    <option value="一尺指数">一尺指数</option>
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
						<th width="133">光定位：</th>
						<td width="133"><select name="guangdingwei2">
							  		<option >请选择</option>
        	                   		<option value="正常">正常</option>
									<option value="管状视野">管状视野</option>
									<option value="鼻翼缺陷">鼻翼缺陷</option>
   				  	      </select> </td>
					</tr>
					<tr>
						<th width="133">辨别视力：</th>
						<td width="133"><select name="bianbieshili2">
							  <option >请选择</option>
							<option value="红" >红</option>	
							<option value="绿" >绿</option>
							<option value="红绿" >红绿</option>
							</select></td>
						<th width="133">眼睑：</th>
						<td width="133"><select name="yanjian2">
							<option >请选择</option>
								<option value="正常" >正常</option>	
								<option value="侧生" >侧生</option>
								<option value="肥厚" >肥厚</option>	
							</select></td>
						<th width="133">泪器：</th>
						<td width="133"><select name="leiqi2">
							<option >请选择</option>
								<option value="通畅" >通畅</option>	
								<option value="脓液" >脓液</option>
								<option value="返流" >返流</option>	
							</select>	</td>
					</tr>
					<tr>
						<th width="133">角膜：</th>
						<td width="133"><select name="jiaomo2">
							  <option >请选择</option>
								<option value="透明" >透明</option>	
								<option value="薄翳" >薄翳</option>
								<option value="斑翳" >斑翳</option>	
								<option value="白斑" >白斑</option>	
							</select></td>
						<th width="133">前房：</th>
						<td width="133"><select name="qianfang2">
							<option >请选择</option>
								<option value="正常" >正常</option>	
								<option value="浅" >浅</option>
								<option value="深" >深</option>	
							</select></td>
						<th width="133">虹膜：</th>
						<td width="133"><select name="hongmo2">
							<option >请选择</option>
								<option value="清澈" >清澈</option>	
								<option value="模糊" >模糊</option>
							</select></td>
					</tr>
					<tr>
						<th width="133">瞳孔-对光反射：</th>
						<td width="133"><select name="duiguangfanshe2">
									<option >请选择</option>
										<option value="正常" >正常</option>	
										<option value="迟钝" >迟钝</option>
									</select></td>
						<th width="133">瞳孔-黏连：</th>
						<td width="133"><select name="nianlian2">
									<option>请选择</option>
										<option value="无" >无</option>	
										<option value="有" >有</option>
									</select></td>
						<th width="133">瞳孔-大小：</th>
						<td width="133"><select name="daxiao2">
									<option >请选择</option>
										<option value="正常" >正常</option>
										<option value="中等散大" >中等散大</option>	
										<option value="极度散大" >极度散大</option>
									</select></td>
					</tr>
					<tr>
						<th width="133">晶体：</th>
						<td width="133"><select name="jingti2">
							<option >请选择</option>
								<option value="透明" >透明</option>	
								<option value="核性浑浊" >核性浑浊</option>
								<option value="皮质浑浊" >皮质浑浊</option>
								<option value="后囊浑浊" >后囊浑浊</option>	
							</select></td>
						<th width="133">玻璃体：</th>
						<td width="133"><select name="boliti2">
							<option >请选择</option>
								<option value="正常" >正常</option>	
								<option value="透明" >透明</option>	
								<option value="浑浊" >浑浊</option>
								<option value="积血" >积血</option>
							</select></td>
						<th width="133">球镜：</th>
						<td width="133"><input type="text" name="qiujing2" /></td>
					</tr>
					<tr>
						<th width="133">柱镜：</th>
						<td width="133"><input type="text" name="zhujing2" /></td>
						<th width="133">轴向：</th>
						<td width="133"><input type="text" name="zhouxiang2" /></td>
						<th width="133">眼底：</th>
						<td width="133"><select id="sss2" onchange="show();" name="yandi2" >
								<option >请选择</option>
									<option value="正常" >正常</option>
									<option value="非正常" >非正常</option>
							  	</select> </td>
					</tr>
					<tr>
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
						<th width="133">动脉：</th>
						<td width="133"><select  id="ccc7"name="dongmai2"style="display:none;">
								  <option >请选择</option>
									<option value="正常" >正常</option>
									<option value="纤细" >纤细</option>
									<option value="堵塞" >堵塞</option>
								  </select></td>
					</tr>
					<tr>
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
   							<input type="text" name="date" value="<?php echo $time; ?>" />
						</div>
			<div align="center">
			<input class="but1"  name="submit1" type="submit" value="保存"  />
			<input  class="but2" type="button" value="返回" onclick="window.location.href='chuzhen.php'"/></div>
		</form>
  		</div>
	</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>