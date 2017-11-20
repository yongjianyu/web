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
include_once("conn.php");
$pattern = '/^[0-9]+$/i';	
if(empty($_POST['text'])){
	/*echo "<script language=\"javascript\">";
	  echo "alert('请输入查询信息!');";
      echo "document.location=\"index1.php\"";
      echo "</script>";*/
}
else{
	$_SESSION['search']=$_POST['text'];
}

$i=0;	
$sql= "select* from doctor where name like'%".$_POST['text']."%'";
$res=mysql_query($sql,$conn);
$myrow=mysql_fetch_array($res);
if($myrow){
		$i=1;
	   	$sqlstr1="select* from patient where ID2 IN(select ID2 from chuzhen where doctor='".$_SESSION['search']."') order by ID2";
	   	$sqlstr2="select* from patient where ID2 IN(select ID2 from menzhen where doctor = '".$_SESSION['search']."') order by ID2";
	   	$sqlstr3="select* from patient where ID2 IN(select ID2 from checkin where doctor = '".$_SESSION['search']."') order by ID2";
	   	$sqlstr4="select* from patient where ID2 IN(select ID2 from operation where doctor = '".$_SESSION['search']."') order by ID2";
	   	$sqlstr5="select* from patient where ID2 IN(select ID2 from outcheck where doctor = '".$_SESSION['search']."') order by ID2";
	   	$sqlstr6="select* from patient where ID2 IN(select ID2 from aftercheck where doctor = '".$_SESSION['search']."') order by ID2";
		$sqlstr7="select* from patient where ID2 IN(select ID2 from aftercheck2 where doctor = '".$_SESSION['search']."') order by ID2";
		$sqlstr8="select* from patient where ID2 IN(select ID2 from aftercheck3 where doctor = '".$_SESSION['search']."') order by ID2";
	   
	   /* $result1 = mysql_query($sqlstr1,$conn);
		$result2 = mysql_query($sqlstr2,$conn);
		$result3= mysql_query($sqlstr3,$conn);
		$result4 = mysql_query($sqlstr4,$conn);
		$result5 = mysql_query($sqlstr5,$conn);
		$result6= mysql_query($sqlstr6,$conn);*/
}
else{				
	if(preg_match($pattern,$_POST['text'])){
		$sqlstr = "select ID2,name,sex,age,address,idnum,tel from patient where ID2 =".$_POST['text']." or idnum=".$_POST['text']." order by ID2";
	}
	else{
			$sqlstr = "select * from patient where name like '%".$_POST['text']."%' order by ID2";
	}
	$result = mysql_query($sqlstr,$conn);
}
?>
<body class="body2">
<a href="index.php" ><?php echo "欢迎您,".$_SESSION['doctorname'];?></a>
<div id="container2">
	<div id="header" align="center"><h1>康复医院</h1></div>
	<div class="logo"></div>
	<div id="main">
  		<div class="wrap">
			 <a href="chuzhen.php" class="button three">门 诊</a>
		  	 <a href="menzhen.php" class="button three">住院医师</a>
 			 <a href="jiancha.php" class="button three">检查室</a>
		 	 <a href="shoushu.php" class="button three">手术室</a>
 			 <a href="chuyuan.php" class="button three">出院检查</a>
		 	 <a href="fucha.php" class="button three">术后复查</a>		</div>
		<div class="search">
		<form method="post" action="search.php" class="form">
				  			<input name="text"  class="search2" type="text"   size="35"  />
							<input type="submit" class="search1"  value="搜索"/>
		</form>
		</div>
	</div>
  		<div id="right2">
  		  <ul class="nav">
            <li><a href="index1.php">所有病人</a></li>
  		    <li><a href="day3.php">三日以内</a></li>
  		    <li><a href="day7.php">一周以内</a></li>
  		    <li><a href="day30.php">一月以内</a></li>
  		    <li><a href="user.php?ID=<?php  echo $_SESSION['ID'];?>">用户中心</a></li>
  		    <li><a href="admin.php">后台管理</a></li>
	      </ul>
  		  <div id="main2">
		  <div align="center"><h2>查询结果</h2></div>
					<?php
						if($i==1){
							$page=1;
							$pagesize1 = 5 ;									//每页显示记录
							//$sqlstr1 = "select * from patient order by ID2 desc ";//定义查询语句
							//$sql1=$sqlstr1;
							$total1 = mysql_query($sqlstr1,$conn);//执行查询语句
							$totalNum1 = mysql_num_rows($total1);					//总记录数
							$pagecount1 = ceil($totalNum1/$pagesize1);						//总页
							(!isset($_GET['page1']))?($page1 = 1):$page1 = $_GET['page1'];				//当前显示页数
							($page1 <= $pagecount1)?$page1:($page1 = $pagecount1);//当前页大于总页数时把当前页定义页�?
							$f_pageNum1 = $pagesize1 * ($page1 - 1);						//当前页的第一条?
							
							//$sql1 = $sql1." limit ".$f_pageNum1.",".$pagesize1;//定义SQL语句，通过limit关键字控制查询范围和数量
							$sql1 = $sql1." limit ".$f_pageNum1.",".$pagesize1;
							//$result = mysql_query($sql1,$conn)or die("error");								//执行查询语句					//循环输出查询结果
								if($result1=mysql_query($sql1,$conn)){
																
									echo"<table class='table1' border='3px' style='argin:auto;' width='800'>";
									echo"<tr><td align='center'  colspan='8'><h3>门诊</h3></td></tr>";
									echo"<tr>";
                      					echo"<th scope='col'>ID</th>";
                      					echo"<th scope='col'>姓名</th>";
                      					echo"<th scope='col'>性别</th>";
                      					echo"<th scope='col'>年龄</th>";
                      					echo"<th scope='col'>地址</th>";
                      					echo"<th scope='col'>身份</th>";
                      					echo"<th scope='col'>电话</th>";
                      					echo"<th scope='col'>查看</th>";
                    				echo"</tr>";
						
									while($row1 = mysql_fetch_array($result1)){
										echo"<tr>";
										echo"<td class='index1'>".$row[0]."</td>";
										echo"<td class='index1'>".$row[1]."</td>";
										echo"<td class='index1'>".$row[2]."</td>";
										echo"<td class='index1'>".$row[3]."</td>";
										echo"<td class='index1'>".$row[4]."</td>";
										echo"<td class='index1'>".$row[5]."</td>";
										echo"<td class='index1'>".$row[6]."</td>";
										echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";
										echo"</tr>";
									}
									echo"</table>";
								
									echo"<div class='div1'>";
									echo "第".$page1."页/共".$pagecount1."页&nbsp;";
									if($page1!=1){//如果当前页不是1则输出有链接的首页和上一页
										echo "<a href='?page1=1'>首页</a>&nbsp;";
										echo "<a href='?page1=".($page1-1)."'>上一页</a>&nbsp;;";
									}else{//否则输出没有链接的首页和上一页
										echo "首页&nbsp;上一页&nbsp;";
									}
									if($page1!=$pagecount1){//如果当前页不是最后一页则输出有链接的下一页和尾页
										echo "<a href='?page1=".($page1+1)."'>下一页</a>&nbsp;";
										echo "<a href='?page1=".$pagecount1."'>尾页</a>&nbsp;";
									}else{//否则输出没有链接的下一页和尾页
										echo "下一页&nbsp;尾页&nbsp;";
									}
									echo"</div>";
						}
			
					/*住院医师表*/
								$page=2;
								$pagesize2 = 5 ;									//每页显示记录
							//$sqlstr1 = "select * from patient order by ID2 desc ";//定义查询语句
							$sql2=$sqlstr2;
							$total2 = mysql_query($sql2,$conn);//执行查询语句
							$totalNum2 = mysql_num_rows($total2);					//总记录数
							$pagecount2 = ceil($totalNum2/$pagesize2);						//总页
							(!isset($_GET['page2']))?($page2 = 1):$page2 = $_GET['page2'];				//当前显示页数
							($page2 <= $pagecount2)?$page2:($page2 = $pagecount2);//当前页大于总页数时把当前页定义页�?
							$f_pageNum2 = $pagesize2 * ($page2 - 1);								//当前页的第一条?
							
							$sql2 = $sql2." limit ".$f_pageNum2.",".$pagesize2;//定义SQL语句，通过limit关键字控制查询范围和数量
							//$result = mysql_query($sql2,$conn)or die("error");								//执行查询语句					//循环输出查询结果					
							if($result2=mysql_query($sql2,$conn)){
								
								echo"<table class='table1' border='3px' style='argin:auto;' width='800'>";
								echo"<tr><td align='center'  colspan='8'><h3>住院医师</h3></td></tr>";
								echo"<tr>";
                      				echo"<th scope='col'>ID</th>";
                      				echo"<th scope='col'>姓名</th>";
                      				echo"<th scope='col'>性别</th>";
                      				echo"<th scope='col'>年龄</th>";
                      				echo"<th scope='col'>地址</th>";
                      				echo"<th scope='col'>身份</th>";
                      				echo"<th scope='col'>电话</th>";
                      				echo"<th scope='col'>查看</th>";
                    			echo"</tr>";
			
							
							 while($row = mysql_fetch_array($result2)){
								echo"<tr>";
								echo"<td class='index1'>".$row[0]."</td>";
								echo"<td class='index1'>".$row[1]."</td>";
								echo"<td class='index1'>".$row[2]."</td>";
								echo"<td class='index1'>".$row[3]."</td>";
								echo"<td class='index1'>".$row[4]."</td>";
								echo"<td class='index1'>".$row[5]."</td>";
								echo"<td class='index1'>".$row[6]."</td>";
								echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";
								echo"</tr>";
							}
							echo"</table>";
								
							echo"<div class='div1'>";
							echo "第".$page2."页/共".$pagecount2."页&nbsp;";
							if($page2!=1){//如果当前页不是1则输出有链接的首页和上一页
								echo "<a href='?page2=1'>首页</a>&nbsp;";
								echo "<a href='?page2=".($page2-1)."'>上一页</a>&nbsp;";
							}else{//否则输出没有链接的首页和上一页
								echo "首页&nbsp;上一页&nbsp;";
							}
							if($page2!=$pagecount2){//如果当前页不是最后一页则输出有链接的下一页和尾页
								echo "<a href='?page2=".($page2+1)."'>下一页</a>&nbsp;";
								echo "<a href='?page2=".$pagecount2."'>尾页</a>&nbsp;";
							}else{//否则输出没有链接的下一页和尾页
								echo "下一页&nbsp;尾页&nbsp;";
							}
							echo"</div>";
						}
		
						/*检查室*/
								$pagesize3 = 5 ;									//每页显示记录
							//$sqlstr1 = "select * from patient order by ID2 desc ";//定义查询语句
							$sql3=$sqlstr3;
							$total3 = mysql_query($sql3,$conn);//执行查询语句
							$totalNum3 = mysql_num_rows($total3);					//总记录数
							$pagecount3 = ceil($totalNum3/$pagesize3);						//总页
							(!isset($_GET['page3']))?($page3 = 1):$page3 = $_GET['page3'];				//当前显示页数
							($page3 <= $pagecount3)?$page3:($page3 = $pagecount3);//当前页大于总页数时把当前页定义页�?
							$f_pageNum3 = $pagesize3 * ($page3 - 1); //当前页的第一条?
				
							$sql3 = $sql3." limit ".$f_pageNum3.",".$pagesize3;//定义SQL语句，通过limit关键字控制查询范围和数量
							//$result = mysql_query($sql3,$conn)or die("error");								//执行查询语句					//循环输出查询结果	
							if($result3=mysql_query($sql3,$conn)){
								echo"<table class='table1' border='3px' style='argin:auto;' width='800'>";
								echo"<tr><td align='center'  colspan='8'><h3>检查室</h3></td></tr>";
								echo"<tr>";
                      				echo"<th scope='col'>ID</th>";
                      				echo"<th scope='col'>姓名</th>";
                      				echo"<th scope='col'>性别</th>";
                      				echo"<th scope='col'>年龄</th>";
                      				echo"<th scope='col'>地址</th>";
                      				echo"<th scope='col'>身份</th>";
                      				echo"<th scope='col'>电话</th>";
                      				echo"<th scope='col'>查看</th>";
                    			echo"</tr>";

							 while($row = mysql_fetch_array($result3)){
								echo"<tr>";
								echo"<td class='index1'>".$row[0]."</td>";
								echo"<td class='index1'>".$row[1]."</td>";
								echo"<td class='index1'>".$row[2]."</td>";
								echo"<td class='index1'>".$row[3]."</td>";
								echo"<td class='index1'>".$row[4]."</td>";
								echo"<td class='index1'>".$row[5]."</td>";
								echo"<td class='index1'>".$row[6]."</td>";
								echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";
								echo"</tr>";
							}
							echo"</table>";
								
							echo"<div class='div1'>";
							echo "第".$page3."页/共".$pagecount3."页&nbsp;";
							if($page3!=1){//如果当前页不是1则输出有链接的首页和上一页
								echo "<a href='?page3=1'>首页</a>&nbsp;";
								echo "<a href='?page3=".($page3-1)."'>上一页</a>&nbsp;";
							}else{//否则输出没有链接的首页和上一页
								echo "首页&nbsp;上一页&nbsp;";
							}
							if($page3!=$pagecount3){//如果当前页不是最后一页则输出有链接的下一页和尾页
								echo "<a href='?page3=".($page3+1)."'>下一页</a>&nbsp;";
								echo "<a href='?page3=".$pagecount3."'>尾页</a>&nbsp;";
							}else{//否则输出没有链接的下一页和尾页
								echo "下一页&nbsp;尾页&nbsp;";
							}
							echo"</div>";
						}
								/*手术室*/
								$pagesize4 = 5 ;									//每页显示记录
							//$sqlstr1 = "select * from patient order by ID2 desc ";//定义查询语句
							$sql4=$sqlstr4;
							$total4 = mysql_query($sql4,$conn);//执行查询语句
							$totalNum4 = mysql_num_rows($total4);					//总记录数
							$pagecount4 = ceil($totalNum4/$pagesize4);						//总页
							(!isset($_GET['page4']))?($page4 = 1):$page4 = $_GET['page4'];				//当前显示页数
							($page4 <= $pagecount4)?$page4:($page4 = $pagecount4);//当前页大于总页数时把当前页定义页�?
							$f_pageNum4 = $pagesize4 * ($page4 - 1);								//当前页的第一条?
							$sql4 = $sql4." limit ".$f_pageNum4.",".$pagesize4;//定义SQL语句，通过limit关键字控制查询范围和数量
							//$result = mysql_query($sql4,$conn)or die("error");								//执行查询语句					//循环输出查询结果
							if($result4=mysql_query($sql4,$conn)){
								echo"<table class='table1' border='3px' style='argin:auto;' width='800'>";
								echo"<tr><td align='center'  colspan='8'><h3>手术室</h3></td></tr>";
								echo"<tr>";
                      				echo"<th scope='col'>ID</th>";
                      				echo"<th scope='col'>姓名</th>";
                      				echo"<th scope='col'>性别</th>";
                      				echo"<th scope='col'>年龄</th>";
                      				echo"<th scope='col'>地址</th>";
                      				echo"<th scope='col'>身份</th>";
                      				echo"<th scope='col'>电话</th>";
                      				echo"<th scope='col'>查看</th>";
                    			echo"</tr>";
								
							 while($row = mysql_fetch_array($result4)){
								echo"<tr>";
								echo"<td class='index1'>".$row[0]."</td>";
								echo"<td class='index1'>".$row[1]."</td>";
								echo"<td class='index1'>".$row[2]."</td>";
								echo"<td class='index1'>".$row[3]."</td>";
								echo"<td class='index1'>".$row[4]."</td>";
								echo"<td class='index1'>".$row[5]."</td>";
								echo"<td class='index1'>".$row[6]."</td>";
								echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";
								echo"</tr>";
							}
							echo"</table>";
								
							echo"<div class='div1'>";
							echo "第".$page4."页/共".$pagecount4."页&nbsp;";
							if($page4!=1){//如果当前页不是1则输出有链接的首页和上一页
								echo "<a href='?page4=1'>首页</a>&nbsp;";
								echo "<a href='?page4=".($page4-1)."'>上一页</a>&nbsp;;";
							}else{//否则输出没有链接的首页和上一页
								echo "首页&nbsp;上一页&nbsp;";
							}
							if($page4!=$pagecount4){//如果当前页不是最后一页则输出有链接的下一页和尾页
								echo "<a href='?page4=".($page4+1)."'>下一页</a>&nbsp;";
								echo "<a href='?page4=".$pagecount4."'>尾页</a>&nbsp;";
							}else{//否则输出没有链接的下一页和尾页
								echo "下一页&nbsp;尾页&nbsp;";
							}
							echo"</div>";
						}
							/*出院检查*/
								$pagesize5 = 5 ;									//每页显示记录
							//$sqlstr1 = "select * from patient order by ID2 desc ";//定义查询语句
							$sql5=$sqlstr5;
							$total5 = mysql_query($sql5,$conn);//执行查询语句
							$totalNum5 = mysql_num_rows($total5);					//总记录数
							$pagecount5 = ceil($totalNum5/$pagesize5);						//总页
							(!isset($_GET['page5']))?($page5 = 1):$page5 = $_GET['page5'];				//当前显示页数
							($page5 <= $pagecount5)?$page5:($page5 = $pagecount5);//当前页大于总页数时把当前页定义页�?
							$f_pageNum5 = $pagesize5 * ($page5 - 1);								//当前页的第一条?
							$sql5 = $sql5." limit ".$f_pageNum5.",".$pagesize5;//定义SQL语句，通过limit关键字控制查询范围和数量
							//$result = mysql_query($sql5,$conn)or die("error");								//执行查询语句					//循环输出查询结果	
							if($result5=mysql_query($sql5,$conn)){
								echo"<table class='table1' border='3px' style='argin:auto;' width='800'>";
								echo"<tr><td align='center'  colspan='8'><h3>出院检查</h3></td></tr>";
								echo"<tr>";
                      				echo"<th scope='col'>ID</th>";
                      				echo"<th scope='col'>姓名</th>";
                      				echo"<th scope='col'>性别</th>";
                      				echo"<th scope='col'>年龄</th>";
                      				echo"<th scope='col'>地址</th>";
                      				echo"<th scope='col'>身份</th>";
                      				echo"<th scope='col'>电话</th>";
                      				echo"<th scope='col'>查看</th>";
                    			echo"</tr>";
								while($row = mysql_fetch_array($result5)){
									echo"<tr>";
									echo"<td class='index1'>".$row[0]."</td>";
									echo"<td class='index1'>".$row[1]."</td>";
									echo"<td class='index1'>".$row[2]."</td>";
									echo"<td class='index1'>".$row[3]."</td>";
									echo"<td class='index1'>".$row[4]."</td>";
									echo"<td class='index1'>".$row[5]."</td>";
									echo"<td class='index1'>".$row[6]."</td>";
									echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";
									echo"</tr>";
								}
								echo"</table>";
								
								echo"<div class='div1'>";
								echo "第".$page5."页/共".$pagecount5."页&nbsp;";
								if($page5!=1){//如果当前页不是1则输出有链接的首页和上一页
									echo "<a href='?page5=1'>首页</a>&nbsp;";
									echo "<a href='?page5=".($page5-1)."'>上一页</a>&nbsp;;";
								}else{//否则输出没有链接的首页和上一页
									echo "首页&nbsp;上一页&nbsp;";
								}
								if($page5!=$pagecount5){//如果当前页不是最后一页则输出有链接的下一页和尾页
									echo "<a href='?page5=".($page5+1)."'>下一页</a>&nbsp;";
									echo "<a href='?page5=".$pagecount5."'>尾页</a>&nbsp;";
								}else{//否则输出没有链接的下一页和尾页
									echo "下一页&nbsp;尾页&nbsp;";
								}
								echo"</div>";
							}
						/*复查表*/
								$pagesize6 = 5 ;									//每页显示记录
							//$sqlstr1 = "select * from patient order by ID2 desc ";//定义查询语句
							$sql6=$sqlstr6;
							$total6 = mysql_query($sql6,$conn);//执行查询语句
							$totalNum6 = mysql_num_rows($total6);					//总记录数
							$pagecount6 = ceil($totalNum6/$pagesize6);						//总页
							(!isset($_GET['page6']))?($page6 = 1):$page6 = $_GET['page6'];				//当前显示页数
							($page6 <= $pagecount6)?$page6:($page6 = $pagecount6);//当前页大于总页数时把当前页定义页�?
							$f_pageNum6 = $pagesize6 * ($page6 - 1);								//当前页的第一条?
							$sql6 = $sql6." limit ".$f_pageNum6.",".$pagesize6;//定义SQL语句，通过limit关键字控制查询范围和数量
							//$result = mysql_query($sql6,$conn)or die("error");								//执行查询语句					//循环输出查询结果
							if($result6=mysql_query($sql6,$conn)){
								echo"<table class='table1' border='3px' style='argin:auto;' width='800'>";
								echo"<tr><td align='center'  colspan='8'><h3>复查表一</h3></td></tr>";
								echo"<tr>";
                      				echo"<th scope='col'>ID</th>";
                      				echo"<th scope='col'>姓名</th>";
                      				echo"<th scope='col'>性别</th>";
                      				echo"<th scope='col'>年龄</th>";
                      				echo"<th scope='col'>地址</th>";
                      				echo"<th scope='col'>身份</th>";
                      				echo"<th scope='col'>电话</th>";
                      				echo"<th scope='col'>查看</th>";
                    			echo"</tr>";
							 	while($row = mysql_fetch_array($result6)){
									echo"<tr>";
									echo"<td class='index1'>".$row[0]."</td>";
									echo"<td class='index1'>".$row[1]."</td>";
									echo"<td class='index1'>".$row[2]."</td>";
									echo"<td class='index1'>".$row[3]."</td>";
									echo"<td class='index1'>".$row[4]."</td>";
									echo"<td class='index1'>".$row[5]."</td>";
									echo"<td class='index1'>".$row[6]."</td>";
									echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";
									echo"</tr>";
								}
							echo"</table>";
					
							echo"<div class='div1'>";
							echo "第".$page6."页/共".$pagecount6."页&nbsp;";
							if($page6!=1){//如果当前页不是1则输出有链接的首页和上一页
								echo "<a href='?page6=1'>首页</a>&nbsp;";
								echo "<a href='?page6=".($page6-1)."'>上一页</a>&nbsp;;";
							}else{//否则输出没有链接的首页和上一页
								echo "首页&nbsp;上一页&nbsp;";
							}
							if($page6!=$pagecount6){//如果当前页不是最后一页则输出有链接的下一页和尾页
								echo "<a href='?page6=".($page6+1)."'>下一页</a>&nbsp;";
								echo "<a href='?page6=".$pagecount6."'>尾页</a>&nbsp;";
							}else{//否则输出没有链接的下一页和尾页
								echo "下一页&nbsp;尾页&nbsp;";
							}
							echo"</div>";
							}
							
							/*复查表二*/
							$pagesize7 = 5 ;									//每页显示记录
							//$sqlstr1 = "select * from patient order by ID2 desc ";//定义查询语句
							$sql7=$sqlstr7;
							$total7 = mysql_query($sql7,$conn);//执行查询语句
							$totalNum7 = mysql_num_rows($total7);					//总记录数
							$pagecount7 = ceil($totalNum7/$pagesize7);						//总页
							(!isset($_GET['page7']))?($page7 = 1):$page7 = $_GET['page7'];				//当前显示页数
							($page7 <= $pagecount7)?$page7:($page7 = $pagecount7);//当前页大于总页数时把当前页定义页�?
							$f_pageNum7 = $pagesize7* ($page7 - 1);								//当前页的第一条?
							$sql7 = $sql7." limit ".$f_pageNum7.",".$pagesize7;//定义SQL语句，通过limit关键字控制查询范围和数量
							//$result = mysql_query($sql2,$conn)or die("error");								//执行查询语句					//循环输出查询结果					
							if($result7=mysql_query($sql7,$conn)){
								echo"<table class='table1' border='3px' style='argin:auto;' width='800'>";
								echo"<tr><td align='center'  colspan='8'><h3>复查表二</h3></td></tr>";
								echo"<tr>";
                      				echo"<th scope='col'>ID</th>";
                      				echo"<th scope='col'>姓名</th>";
                      				echo"<th scope='col'>性别</th>";
                      				echo"<th scope='col'>年龄</th>";
                      				echo"<th scope='col'>地址</th>";
                      				echo"<th scope='col'>身份</th>";
                      				echo"<th scope='col'>电话</th>";
                      				echo"<th scope='col'>查看</th>";
                    			echo"</tr>";
							 	while($row = mysql_fetch_array($result7)){
									echo"<tr>";
									echo"<td class='index1'>".$row[0]."</td>";
									echo"<td class='index1'>".$row[1]."</td>";
									echo"<td class='index1'>".$row[2]."</td>";
									echo"<td class='index1'>".$row[3]."</td>";
									echo"<td class='index1'>".$row[4]."</td>";
									echo"<td class='index1'>".$row[5]."</td>";
									echo"<td class='index1'>".$row[6]."</td>";
									echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";
									echo"</tr>";
							}
								echo"</table>";
					
							echo"<div class='div1'>";
							echo "第".$page7."页/共".$pagecount7."页&nbsp;";
							if($page7!=1){//如果当前页不是1则输出有链接的首页和上一页
								echo "<a href='?page7=1'>首页</a>&nbsp;";
								echo "<a href='?page7=".($page7-1)."'>上一页</a>&nbsp;;";
							}else{//否则输出没有链接的首页和上一页
								echo "首页&nbsp;上一页&nbsp;";
							}
							if($page7!=$pagecount7){//如果当前页不是最后一页则输出有链接的下一页和尾页
								echo "<a href='?page7=".($page7+1)."'>下一页</a>&nbsp;";
								echo "<a href='?page7=".$pagecount7."'>尾页</a>&nbsp;";
							}else{//否则输出没有链接的下一页和尾页
								echo "下一页&nbsp;尾页&nbsp;";
							}
							echo"</div>";
							}
							
							/*复查表三*/
							$pagesize8 = 5 ;									//每页显示记录
							//$sqlstr1 = "select * from patient order by ID2 desc ";//定义查询语句
							$sql8=$sqlstr8;
							$total8 = mysql_query($sql8,$conn);//执行查询语句
							$totalNum8 = mysql_num_rows($total8);					//总记录数
							$pagecount8 = ceil($totalNum8/$pagesize8);						//总页
							(!isset($_GET['page8']))?($page8 = 1):$page8 = $_GET['page8'];				//当前显示页数
							($page8 <= $pagecount8)?$page8:($page8 = $pagecount8);//当前页大于总页数时把当前页定义页�?
							$f_pageNum8 = $pagesize8* ($page8 - 1);								//当前页的第一条?
							$sql8 = $sql8." limit ".$f_pageNum8.",".$pagesize8;//定义SQL语句，通过limit关键字控制查询范围和数量
							//$result = mysql_query($sql2,$conn)or die("error");								//执行查询语句					//循环输出查询结果					
							if($result8=mysql_query($sql8,$conn)){
								echo"<table class='table1' border='3px' style='argin:auto;' width='800'>";
								echo"<tr><td align='center'  colspan='8'><h3>复查表三</h3></td></tr>";
								echo"<tr>";
                      				echo"<th scope='col'>ID</th>";
                      				echo"<th scope='col'>姓名</th>";
                      				echo"<th scope='col'>性别</th>";
                      				echo"<th scope='col'>年龄</th>";
                      				echo"<th scope='col'>地址</th>";
                      				echo"<th scope='col'>身份</th>";
                      				echo"<th scope='col'>电话</th>";
                      				echo"<th scope='col'>查看</th>";
                    			echo"</tr>";
							 	while($row = mysql_fetch_array($result8)){
									echo"<tr>";
									echo"<td class='index1'>".$row[0]."</td>";
									echo"<td class='index1'>".$row[1]."</td>";
									echo"<td class='index1'>".$row[2]."</td>";
									echo"<td class='index1'>".$row[3]."</td>";
									echo"<td class='index1'>".$row[4]."</td>";
									echo"<td class='index1'>".$row[5]."</td>";
									echo"<td class='index1'>".$row[6]."</td>";
									echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";
									echo"</tr>";
							}
								echo"</table>";
					
							echo"<div class='div1'>";
							echo "第".$page8."页/共".$pagecount8."页&nbsp;";
							if($page8!=1){//如果当前页不是1则输出有链接的首页和上一页
								echo "<a href='?page8=1'>首页</a>&nbsp;";
								echo "<a href='?page8=".($page8-1)."'>上一页</a>&nbsp;;";
							}else{//否则输出没有链接的首页和上一页
								echo "首页&nbsp;上一页&nbsp;";
							}
							if($page8!=$pagecount8){//如果当前页不是最后一页则输出有链接的下一页和尾页
								echo "<a href='?page8=".($page8+1)."'>下一页</a>&nbsp;";
								echo "<a href='?page8=".$pagecount8."'>尾页</a>&nbsp;";
							}else{//否则输出没有链接的下一页和尾页
								echo "下一页&nbsp;尾页&nbsp;";
							}
							echo"</div>";
							}
						}
						else{?>
						<table class="table2" border="3px" style=" margin:auto;"><tr>
                      		<th scope="col">ID</th>
                      		<th scope="col">姓名</th>
                      		<th scope="col">性别</th>
                      		<th scope="col">年龄</th>
                      		<th scope="col">地址</th>
                      		<th scope="col">身份</th>
                      		<th scope="col">电话</th>
                      		<th scope="col">查看</th>
                    	</tr>
						<?php while($row = mysql_fetch_array($result)){?>
                    <tr>
                      <td class="index1"><?php echo $row[0];?></td>
                      <td class="index1"><?php echo $row[1];?></td>
                      <td class="index1"><?php echo $row[2];?></td>
                      <td class="index1"><?php echo $row[3];?></td>
                      <td class="index1"><?php echo $row[4];?></td>
                      <td class="index1"><?php echo $row[5];?></td>
                      <td class="index1"><?php echo $row[6];?></td>
					  <?php echo "<td><a href=show.php?id=".$row[0].">查看</a></td>";?>
                    </tr> <?php }
						}?>
			</table>
	</div>
</div>
<div id="updown"><span class="up"></span><span class="down"></span></div>
</body>
</html>