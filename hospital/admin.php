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
session_start();
if(empty($_SESSION['ID']))
exit();
if($_SESSION['flag7']==0){
echo "<script language=\"javascript\">";
	  echo "alert('您没有权限查看!');";
      echo "document.location=\"index1.php\"";
      echo "</script>";
}
include_once("conn.php");
$pagesize = 5 ;									//每页显示记录
	$sqlstr = "select * from doctor order by ID";//定义查询语句
	$total = mysql_query($sqlstr,$conn);//执行查询语句
	$totalNum = mysql_num_rows($total);					//总记录数
	$pagecount = ceil($totalNum/$pagesize);						//总页
	(!isset($_GET['page']))?($page = 1):$page = $_GET['page'];				//当前显示页数
	($page <= $pagecount)?$page:($page = $pagecount);//当前页大于总页数时把当前页定义页�?
	$f_pageNum = $pagesize * ($page - 1);								//当前页的第一条?
	$sqlstr = $sqlstr." limit ".$f_pageNum.",".$pagesize;//定义SQL语句，通过limit关键字控制查询范围和数量
	$result = mysql_query($sqlstr,$conn)or die("error2".mysql_error());								//执行查询语句					//循环输出查询结果
?>
<body class="body">
<a href="index.php" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
<div  id="container">
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
		<div id="left"></div>
  		<div id="right">
			 <ul class="nav">
   				  <li><a href="index1.php">所有病人</a></li>
    			  <li><a href="day3.php">三日以内</a></li>
 			      <li><a href="day7.php">一周以内</a></li>
   			     <li><a href="day30.php">一月以内</a></li>
		         <li><a href="user.php?ID=<?php  echo $_SESSION['ID'];?>">用户中心</a></li>
  		         <li><a href="admin.php">后台管理</a></li>
 	 	   </ul>
		   <div id="main2">	
		   			<div align="center"><h2>医生信息</h2></div>
					<button id="png" onclick="window.location.href='doctorAdd.php'"></button>
  			<table class="table2" border="3px" style=" margin:auto;"><tr>
                      <th scope="col">ID</th>
                      <th scope="col">工号</th>
                      <th scope="col">姓名</th>
                      <th scope="col">职称</th>
					  <th scope="col">初诊</th>
					  <th scope="col">门诊</th>
					  <th scope="col">检查</th>
					  <th scope="col">手术</th>
					  <th scope="col">出院</th>
					  <th scope="col">复查</th>
					  <th scope="col">实习</th>
					  <th scope="col"></th>
                    </tr>
					<?php
					while($row = mysql_fetch_array($result)){?>
                    <tr>
                      <td class="index1"><?php echo $row[0];?></td>
                      <td class="index1"><?php echo $row[16];?></td>
                      <td class="index1"><?php echo $row[1];?></td>
                      <td class="index1"><?php echo $row[4];?></td>
					  <td class="index1"><input  type="checkbox" <?php if($row[8]=="1"){?>checked<?php }?> ></td>
                      <td class="index1"><input  type="checkbox" <?php if($row[9]=="1"){?>checked<?php }?> ></td>
						<td class="index1"><input type="checkbox" <?php if($row[10]=="1"){?>checked<?php }?> ></td>
						<td class="index1"><input  type="checkbox" <?php if($row[11]=="1"){?>checked<?php }?> ></td>
						<td class="index1"><input  type="checkbox" <?php if($row[12]=="1"){?>checked<?php }?> ></td>
						<td class="index1"><input  type="checkbox" <?php if($row[13]=="1"){?>checked<?php }?> ></td>
						<td class="index1"><input type="checkbox" <?php if($row[15]=="1"){?>checked<?php }?> ></td>
					  <?php echo "<td><a href=correct.php?ID=".$row[0].">修改</a></td>";?>
                    </tr><?php }
					?>
			</table>
		  </div>
				<div style="position:relative; left:620px; top:-330px; width:400px;">
					<?php
						echo "第".$page."页/共".$pagecount."页&nbsp;";
						if($page!=1){//如果当前页不是1则输出有链接的首页和上一页
							echo "<a href='?page=1'>首页</a>&nbsp;";
							echo "<a href='?page=".($page-1)."'>上一页</a>&nbsp;";
						}else{//否则输出没有链接的首页和上一页
							echo "首页&nbsp;上一页&nbsp;";
						}
						if($page!=$pagecount){//如果当前页不是最后一页则输出有链接的下一页和尾页
							echo "<a href='?page=".($page+1)."'>下一页</a>&nbsp;";
							echo "<a href='?page=".$pagecount."'>尾页</a>&nbsp;";
						}else{//否则输出没有链接的下一页和尾页
							echo "下一页&nbsp;尾页&nbsp;";
						}
					?>
  				</div>

  </div>
		</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>