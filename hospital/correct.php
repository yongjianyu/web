﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康复医院</title>
    <link rel="stylesheet" href="css/style3.css" media="screen" type="text/css" />
	 <link rel="stylesheet" href="css/style3.css" media="screen" type="text/css" />
	 <link rel="stylesheet" href="css/style4.css" media="screen" type="text/css" />
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="function.js" type="text/javascript"></script>
</head>
<?php
session_start();
if(empty($_SESSION['ID']))
exit();
if($_SESSION['flag7']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限查看!');";
      echo "document.location=\"index1.php\"";
      echo "</script>";
}
$_SESSION['ID3'] = $_GET['ID'];
include_once("conn.php");
$sql = "select * from doctor where ID = ".$_GET['ID'];
$result = mysql_query($sql,$conn)or die("error");
$row = mysql_fetch_array($result);
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
   				     <li><a href="index1.php">今日病人</a></li>
    				<li><a href="day3.php">三日以内</a></li>
 			        <li><a href="day7.php">一周以内</a></li>
   			        <li><a href="day30.php">一月以内</a></li>
		            <li><a href="user.php?ID=<?php  echo $_SESSION['ID'];?>">用户中心</a></li>
  		            <li><a href="admin.php">后台管理</a></li>
 	 	       </ul>
			  	
  		<form name="patientchange"action="editpost.php" method="post" enctype="multipart/form-data">
		<div id="main2">
					<div><h2 align="center">用户信息</h2>
					<table  border="2" class="table2">
					<tr>
						<th width="133">姓名：</th>
						<td  colspan="3" >
						<input name="name" type="text" value="<?php echo $row[1]; ?>" size="10" />
						</td>
						<th width="133">工号：</th>
						<td  colspan="2" >
						<input name="name" type="text" value="<?php echo $row[16]; ?>" size="10" />
						</td>
						
					</tr>
					<tr>
						<th width="133">性别：</th>
						<td  colspan="3">
								<input name="sex"   type="radio" value="男"<?php if($row[2]=="男"){?>checked<?php }?> />男
				 				<input name="sex"   type="radio" value="女"<?php if($row[2]=="女"){?>checked<?php }?> />女
						</td>
						<th width="133">年龄：</th>
						<td  colspan="2">
							<input name="age" type="text" value="<?php echo $row[3]; ?>"size="5" />
						</td>
						
					</tr>
					<tr>
						<th width="133">职称</th>
                        <td  colspan="3"><select name="title">
									<option <?php if($row[4]=="护士"){?>selected<?php }?> >护士</option>
									<option <?php if($row[4]=="实习医生"){?>selected<?php }?> >实习医生</option>
									<option <?php if($row[4]=="住院医生"){?>selected<?php }?>>住院医生</option>
									<option <?php if($row[4]=="主治医生"){?>selected<?php }?>>主治医生</option>
									<option <?php if($row[4]=="主任医生"){?>selected<?php }?> >主任医生</option>
								  </select>
						</td>
						<th width="133" >电话：</th>
						<td  colspan="2"> 
							 <input  name="tel"  type="text" value="<?php echo $row[5]; ?>" />
						</td>
						
					</tr>
					<tr>
						<th width="133" >邮箱：</th>
						<td  colspan="3"> 
							 <input  name="email"  type="text" value="<?php echo $row[6]; ?>" />
						</td>
						<th >密码：</th>
						<td colspan="6"> 
							 <input  name="password"  type="password" value="<?php echo $row[7]; ?>" />
						</td>
					</tr>
					<tr>
							<td width="114"> <input name="flag1" type="checkbox" <?php if($row[8]=="1"){?>checked<?php }?> value="1" >初诊</td>
							<td width="114"> <input name="flag2" type="checkbox" <?php if($row[9]=="1"){?>checked<?php }?> value="1" >门诊</td>
							<td width="114"> <input name="flag3" type="checkbox" <?php if($row[10]=="1"){?>checked<?php }?> value="1" >检查</td>
							<td width="114"> <input name="flag4" type="checkbox" <?php if($row[11]=="1"){?>checked<?php }?> value="1" >手术</td>
							<td width="114"> <input name="flag5" type="checkbox" <?php if($row[12]=="1"){?>checked<?php }?> value="1" >出院</td>
							<td width="114"> <input name="flag6" type="checkbox" <?php if($row[13]=="1"){?>checked<?php }?> value="1" >复查</td>
							<td width="114"> <input name="flag8" type="checkbox" <?php if($row[14]=="1"){?>checked<?php }?> value="1" >实习
						</td>
					</tr>
					</table>
					</div>
					<div align="center">
					<input  class="but1" type="submit" name="submit13" value="保存"  />
					<input  class="but2" type="button" value="返回"onclick="window.history.go(-1)" />
					</div>
					</form>
					</div>
	</div>

<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>
