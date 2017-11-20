<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XX眼科</title>
</head>
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
#footer{
margin-bottom:130px;
}
</style>
<body>
<?php
session_start();
if(empty($_SESSION['ID']))
exit();
//输出病人信息
$conn = mysql_connect("localhost","root","yu902377")
or die("连接服务器失败！".mysql_error());
$select= mysql_query("use zjwdb_6166430",$conn)or die ("error");
mysql_query("set names utf8");
//实现分页功能
	$pagesize = 3 ;									//每页显示记录�?
	$sqlstr = "select * from doctor where flag=1 order by ID";//定义查询语句
	$total = mysql_query($sqlstr,$conn);//执行查询语句
	$totalNum = mysql_num_rows($total);					//总记录数
	$pagecount = ceil($totalNum/$pagesize);						//总页�?
	(!isset($_GET['page']))?($page = 1):$page = $_GET['page'];				//当前显示页数
	($page <= $pagecount)?$page:($page = $pagecount);//当前页大于总页数时把当前页定义为总页�?
	$f_pageNum = $pagesize * ($page - 1);								//当前页的第一条记�?
	$sqlstr = $sqlstr." limit ".$f_pageNum.",".$pagesize;//定义SQL语句，通过limit关键字控制查询范围和数量
	$result = mysql_query($sqlstr,$conn);
									//执行查询语句								//循环输出查询结果
	$sqlstr2 = "select * from doctor where flag = 2";
	$result2 = mysql_query($sqlstr2,$conn);
	
	$sqlstr3 = "select * from doctor where ID =".$_SESSION['ID'];
	$result3 = mysql_query($sqlstr3,$conn);
	$row3 = mysql_fetch_array($result3);
	if($row3[8]!=2){
	?>
<div id="container">
		<div id="header"><h1 align="center">医生记录</h1></div>
  <div id="main">
				<div id="main1">
						<div><ul id="nav">
									<li><a href="index1.php" >首页</a></li>
									<li><a href="change.php" >添加病人</a></li>
									<li><a href="doctorAdd.php" >添加医生</a></li>
									<li><a href="doctor.php" >医生信息</a></li>
									<li><a href="dustbin.php">回收站</a></li>
							 </ul>
						  		<form method="post" action="search.php">
						  			<input name="text" type="text"  value="" style="height:30px; border:1px solid green;" size="20"  />
									<input type="submit" class="search"  value="搜索"/>
								</form>
				  		</div>
				</div>
				<div id="main2"><h2>个人信息</h2>
				<table width="800px"height="196" border="1">
                    <tr>
                       <th scope="col">ID</th>
                      <th scope="col">姓名</th>
                      <th scope="col">性别</th>
                      <th scope="col">年龄</th>
                      <th scope="col">职称</th>
                      <th scope="col">电话</th>
                      <th scope="col">邮箱</th>
                    </tr>
					<?php
$sqlstr3 = "select * from doctor where ID =".$_SESSION['ID'];
	$result3 = mysql_query($sqlstr3,$conn);
					while($row3 = mysql_fetch_array($result3)){?>
                    <tr>
                      <td class="index1"><?php echo $row3[0];?></td>
                      <td class="index1"><?php echo $row3[1];?></td>
                      <td class="index1"><?php echo $row3[2];?></td>
                      <td class="index1"><?php echo $row3[3];?></td>
                      <td class="index1"><?php echo $row3[4];?></td>
                      <td class="index1"><?php echo $row3[5];?></td>
                      <td class="index1"><?php echo $row3[6];?></td>
                      <?php echo "<td class='m_td'><a href=update.php?action=updatedcotor&id=".$row3[0].">修改</a></td>";?>
                    </tr><?php }
					?>
                  </table>
				</div>
				<div id="footer">
				</div>
  </div>
</div>
</body>
</html>
	<?php
	exit();
	}
?>
<div id="container">
		<div id="header"><h1 align="center">医生记录</h1></div>
  <div id="main">
				<div id="main1">
						<div id="image"></div>
						<div><ul id="nav">
									<li><a href="index1.php" >首页</a></li>
									<li><a href="change.php" >添加病人</a></li>
									<li><a href="doctorAdd.php" >添加医生</a></li>
									<li><a href="doctor.php" >医生信息</a></li>
									<li><a href="dustbin.php">回收站</a></li>
							 </ul>
						  		<form method="post" action="search.php">
						  			<input name="text" type="text"  value="" style="height:30px; border:1px solid green;" size="20"  />
									<input type="submit" class="search"  value="搜索"/>
								</form>
				  		</div>
				</div>
				<div id="main2"><h2>管理员信息</h2>
				<table width="800px"height="196" border="1">
                    <tr>
                       <th scope="col">ID</th>
                      <th scope="col">姓名</th>
                      <th scope="col">性别</th>
                      <th scope="col">年龄</th>
                      <th scope="col">职称</th>
                      <th scope="col">电话</th>
                      <th scope="col">邮箱</th>
                      <th scope="col">密码</th>
					  <th scope="col"></th>
                    </tr>
					<?php
					while($row2 = mysql_fetch_array($result2)){?>
                    <tr>
                      <td class="index1"><?php echo $row2[0];?></td>
                      <td class="index1"><?php echo $row2[1];?></td>
                      <td class="index1"><?php echo $row2[2];?></td>
                      <td class="index1"><?php echo $row2[3];?></td>
                      <td class="index1"><?php echo $row2[4];?></td>
                      <td class="index1"><?php echo $row2[5];?></td>
                      <td class="index1"><?php echo $row2[6];?></td>
					  <td class="index1"><?php echo $row2[7];?></td>
                      <?php echo "<td class='m_td'><a href=update.php?action=updatedcotor&id=".$row2[0].">修改</a></td>";?>
                    </tr><?php }
					?>
                  </table>
				</div>
				<div id="main3"><h2>医生信息</h2>
                  <table width="800px"height="196" border="1">
                    <tr>
                       <th scope="col">ID</th>
                      <th scope="col">姓名</th>
                      <th scope="col">性别</th>
                      <th scope="col">年龄</th>
                      <th scope="col">职称</th>
                      <th scope="col">电话</th>
                      <th scope="col">邮箱</th>
                      <th scope="col"></th>
                    </tr>
					<?php
					while($row = mysql_fetch_array($result)){?>
                    <tr>
                      <td class="index1"><?php echo $row[0];?></td>
                      <td class="index1"><?php echo $row[1];?></td>
                      <td class="index1"><?php echo $row[2];?></td>
                      <td class="index1"><?php echo $row[3];?></td>
                      <td class="index1"><?php echo $row[4];?></td>
                      <td class="index1"><?php echo $row[5];?></td>
                      <td class="index1"><?php echo $row[6];?></td>
                      <?php echo "<td><a href=update.php?action=updatedcotor&id=".$row[0].">修改</a>/<a href=doctorupdate.php?action=doctorupdate&id=".$row[0].">删除</a></td>";?>
                    </tr><?php }
					?>
                  </table>
				</div>
  </div>
		<div id="footer" style="width:800px;" align="right">
				<?php
						echo "第".$page."页/共".$pagecount."页&nbsp;&nbsp;";
						if($page!=1){//如果当前页不是1则输出有链接的首页和上一页
							echo "<a href='?page=1'>首页</a>&nbsp;";
							echo "<a href='?page=".($page-1)."'>上一页</a>&nbsp;&nbsp;";
						}else{//否则输出没有链接的首页和上一页
							echo "首页&nbsp;上一页&nbsp;&nbsp;";
						}
						if($page!=$pagecount){//如果当前页不是最后一页则输出有链接的下一页和尾页
							echo "<a href='?page=".($page+1)."'>下一页</a>&nbsp;";
							echo "<a href='?page=".$pagecount."'>尾页</a>&nbsp;&nbsp;";
						}else{//否则输出没有链接的下一页和尾页
							echo "下一页&nbsp;尾页&nbsp;&nbsp;";
						}
					?>
		</div>	
</div>
</body>
</html>