<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
include_once("conn.php");
$sqlstr = "select * from doctor where ID=".$_SESSION['ID'];
$result = mysql_query($sqlstr,$conn);
$row = mysql_fetch_array($result);
if($_SESSION['flag7']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限查看!');";
      echo "document.location=\"index1.php\"";
      echo "</script>";
}
?>
<body class="body">
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
					<div><h2 align="center">添加医生</h2>
					<table  border="2" class="table2">
					<tr>
						<th width="133">姓名：</th>
						<td width="133" >
						<input name="name" type="text" />
						</td>
						<th width="133">工号：</th>
						<td width="133">
								<input name="gonghao" type="text" />
						</td>
					</tr>
					<tr>
						<th width="133">性别：</th>
						<td width="133">
								<input name="sex" type="radio" value="男" checked="checked"/>男
				 				<input name="sex"  type="radio" value="女" />女
						</td>
						<th width="133">年龄：</th>
						<td width="133">
							<input name="age" type="text" />
						</td>
					</tr>
					<tr>
						<th width="133">职称</th>
                                <td width="133"><select name="title">
									<option value="护士">护士</option>
									<option value="实习医生">实习医生</option>
									<option value="住院医生" >住院医生</option>
									<option value="主治医生" >主治医生</option>
									<option value="主任医生">主任医生</option>
								  </select>
								</td>
						<th width="133" >电话：</th>
						<td > 
							 <input name="tel"  type="text" />
						</td>
						
					</tr>
					<tr>
						<th width="133" >邮箱：</th>
						<td > 
							 <input  name="email"  type="text"/>
						</td>
						<th width="133" >密码：</th>
						<td > 
							 <input  name="password"  type="password" />
						</td>
					</tr>
					</table>
					</div>
					<div align="center">
					<input class="but1" type="submit" name="submit15" value="保存"  />
					<input  class="but2" type="button" onclick="window.history.go(-1)"value="返回" />
					</div>
					</form>
	</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>

