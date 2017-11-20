<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XX眼科</title>
</head>
<body>
<?php
/*
 主要是获取数据，然后向数据库插入或更新的文件
 */

session_start();
include_once("conn.php");
//向初诊表插入数据
if(isset($_POST['submit1'])){
$sql = "insert into chuzhen values('','".$_POST['leftsight']."','".$_POST['zhishu']."','".$_POST['guangdingwei']."','".$_POST['bianbieshili']."','".$_POST['yanjian']."','".$_POST['leiqi']."','".$_POST['jiaomo']."','".$_POST['qianfang']."','".$_POST['hongmo']."','".$_POST['duiguangfanshe']."','".$_POST['nianlian']."','".$_POST['daxiao']."','".$_POST['jingti']."','".$_POST['boliti']."','".$_POST['qiujing']."','".$_POST['zhujing']."','".$_POST['zhouxiang']."','".$_POST['yandi']."','".$_POST['shipan']."','".$_POST['huangban']."','".$_POST['dongmai']."','".$_POST['wangmo']."','".$_POST['rightsight']."','".$_POST['zhishu2']."','".$_POST['guangdingwei2']."','".$_POST['bianbieshili2']."','".$_POST['yanjian2']."','".$_POST['leiqi2']."','".$_POST['jiaomo2']."','".$_POST['qianfang2']."','".$_POST['hongmo2']."','".$_POST['duiguangfanshe2']."','".$_POST['nianlian2']."','".$_POST['daxiao2']."','".$_POST['jingti2']."','".$_POST['boliti2']."','".$_POST['qiujing2']."','".$_POST['zhujing2']."','".$_POST['zhouxiang2']."','".$_POST['yandi2']."','".$_POST['shipan2']."','".$_POST['huangban2']."','".$_POST['dongmai2']."','".$_POST['wangmo2']."','".$_POST['zhenduanjieguo']."','".$_POST['chulijianyi']."','".$_SESSION['doctorname']."','".$_POST['date']."','1')";
$result = mysql_query($sql,$conn)or die("222".mysql_error());

$sql = "insert into patient values('','".$_POST['patientname']."','".$_POST['sex']."','".$_POST['age']."','".$_POST['address']."','".$_POST['idnum']."','".$_POST['tel']."','".$_POST['email']."')";
$result = mysql_query($sql,$conn) or die("error1".mysql_error());
echo "<script language=\"javascript\">";
	  echo "alert('添加成功!');";
      echo "document.location=\"chuzhen.php\"";
      echo "</script>";
}

//向门诊表插入数据
if(isset($_POST['submit2'])){
$sql = "insert into menzhen values('".$_SESSION['ID2']."','".$_POST['leftsight']."','".$_POST['zhishu']."','".$_POST['guangdingwei']."','".$_POST['bianbieshili']."','".$_POST['yanjian']."','".$_POST['leiqi']."','".$_POST['jiaomo']."','".$_POST['qianfang']."','".$_POST['hongmo']."','".$_POST['duiguangfanshe']."','".$_POST['nianlian']."','".$_POST['daxiao']."','".$_POST['jingti']."','".$_POST['boliti']."','".$_POST['qiujing']."','".$_POST['zhujing']."','".$_POST['zhouxiang']."','".$_POST['yandi']."','".$_POST['shipan']."','".$_POST['huangban']."','".$_POST['dongmai']."','".$_POST['wangmo']."','".$_POST['rightsight']."','".$_POST['zhishu2']."','".$_POST['guangdingwei2']."','".$_POST['bianbieshili2']."','".$_POST['yanjian2']."','".$_POST['leiqi2']."','".$_POST['jiaomo2']."','".$_POST['qianfang2']."','".$_POST['hongmo2']."','".$_POST['duiguangfanshe2']."','".$_POST['nianlian2']."','".$_POST['daxiao2']."','".$_POST['jingti2']."','".$_POST['boliti2']."','".$_POST['qiujing2']."','".$_POST['zhujing2']."','".$_POST['zhouxiang2']."','".$_POST['yandi2']."','".$_POST['shipan2']."','".$_POST['huangban2']."','".$_POST['dongmai2']."','".$_POST['wangmo2']."','".$_POST['zhenduanjieguo']."','".$_POST['chulijianyi']."','".$_SESSION['doctorname']."','".$_POST['date']."','1')";
$result = mysql_query($sql,$conn)or die("222".mysql_error());

$sql = "update patient set name='".$_POST['patientname']."',sex='".$_POST['sex']."',age='".$_POST['age']."',address='".$_POST['address']."',idnum='".$_POST['idnum']."',tel='".$_POST['tel']."',email='".$_POST['email']."' where ID2 = ".$_SESSION['ID2'];
$result = mysql_query($sql,$conn) or die("error1".mysql_error());
echo "<script language=\"javascript\">";
	  echo "alert('添加成功!');";
      echo "document.location=\"menzhen.php\"";
      echo "</script>";
}


//向检查室表插入数据
if(isset($_POST['submit3'])){
$sql = "insert into checkin values('".$_SESSION['ID2']."','".$_POST['yanya']."','".$_POST['k1']."','".$_POST['k2']."','".$_POST['achao']."','".$_POST['jiguang']."','".$_POST['neipijishu']."','".$_POST['jingtidushu']."','".$_POST['yuliudushu']."','".$_POST['yanguang']."','".$_POST['qiujing']."','".$_POST['zhujing']."','".$_POST['zhouxiang']."','".$_POST['zhenduanjieguo']."','".$_POST['chulijianyi']."','".$_SESSION['doctorname']."','".$_POST['date']."','1')";
$result = mysql_query($sql,$conn)or die("333".mysql_error());

echo "<script language=\"javascript\">";
	  echo "alert('添加成功!');";
      echo "document.location=\"jiancha.php\"";
      echo "</script>";
}

//向手术室插入数据
if(isset($_POST['submit4'])){
$sql = "insert into operation values('".$_SESSION['ID2']."','".$_POST['jiemochongxi']."','".$_POST['zhixingren1']."','".$_POST['pifuxiaodu']."','".$_POST['zhixingren2']."','".$_POST['zhixingren3']."','".$_POST['date1']."','".$_POST['mazuifangfa']."','".$_POST['shuzhong']."','".$_POST['houlaipolie']."','".$_POST['jingtiweizhi']."','".$_POST['qiekouleixing']."','".$_POST['boliti']."','".$_POST['zhenduanjieguo']."','".$_POST['chulijianyi']."','".$_SESSION['doctorname']."','".$_POST['date2']."','1','".$_POST['ssys']."','".$_POST['sszl']."')";
$result = mysql_query($sql,$conn)or die("444".mysql_error());

echo "<script language=\"javascript\">";
	  echo "alert('添加成功!');";
      echo "document.location=\"shoushu.php\"";
      echo "</script>";
}
if(isset($_POST['submit5'])){
	if(!empty($_POST["rengongjingti"])){
	$array = $_POST["rengongjingti"];
	$rengongjingti = implode('|',$array);
	}
	if(!empty($_POST["rengongjingti2"])){
	$array2 = $_POST["rengongjingti2"];
	$rengongjingti2 = implode('|',$array2);
	}
	$sql = "insert into outcheck values('".$_SESSION['ID2']."','".$_POST['leftsight']."','".$_POST['zhishu']."','".$_POST['jiemo']."','".$_POST['jiaomo']."','".$_POST['qianfang']."','".$_POST['boliti']."','".$_POST['qiujing']."','".$_POST['zhujing']."','".$_POST['zhouxiang']."','".$rengongjingti."','".$_POST['yandi']."','".$_POST['shipan']."','".$_POST['huangban']."','".$_POST['dongmai']."','".$_POST['wangmo']."','".$_POST['rightsight']."','".$_POST['zhishu2']."','".$_POST['jiemo2']."','".$_POST['jiaomo2']."','".$_POST['qianfang2']."','".$_POST['boliti2']."','".$_POST['qiujing2']."','".$_POST['zhujing2']."','".$_POST['zhouxiang2']."','".$rengongjingti2."','".$_POST['yandi2']."','".$_POST['shipan2']."','".$_POST['huangban2']."','".$_POST['dongmai2']."','".$_POST['wangmo2']."','".$_POST['day']."','".$_POST['zhenduanjieguo']."','".$_POST['chulijianyi']."','".$_SESSION['doctorname']."','".$_POST['date']."','1')";
$result = mysql_query($sql,$conn)or die("555".mysql_error());
echo "<script language=\"javascript\">";
	  echo "alert('添加成功!');";
      echo "document.location=\"chuyuan.php\"";
      echo "</script>";
}
if(isset($_POST['submit6'])){
if(!empty($_POST["rengongjingti"])){
	$array = $_POST["rengongjingti"];
	$rengongjingti = implode('|',$array);
	}
	if(!empty($_POST["rengongjingti2"])){
	$array2 = $_POST["rengongjingti2"];
	$rengongjingti2 = implode('|',$array2);
	}
if($_SESSION['fucha']==1){
	$sql = "insert into aftercheck2 values('".$_SESSION['ID2']."','".$_POST['leftsight']."','".$_POST['zhishu']."','".$_POST['jiemo']."','".$_POST['jiaomo']."','".$_POST['qianfang']."','".$_POST['boliti']."','".$_POST['qiujing']."','".$_POST['zhujing']."','".$_POST['zhouxiang']."','".$rengongjingti."','".$_POST['yandi']."','".$_POST['shipan']."','".$_POST['huangban']."','".$_POST['dongmai']."','".$_POST['wangmo']."','".$_POST['rightsight']."','".$_POST['zhishu2']."','".$_POST['jiemo2']."','".$_POST['jiaomo2']."','".$_POST['qianfang2']."','".$_POST['boliti2']."','".$_POST['qiujing2']."','".$_POST['zhujing2']."','".$_POST['zhouxiang2']."','".$rengongjingti2."','".$_POST['yandi2']."','".$_POST['shipan2']."','".$_POST['huangban2']."','".$_POST['dongmai2']."','".$_POST['wangmo2']."','".$_POST['zhenduanjieguo']."','".$_POST['chulijianyi']."','".$_SESSION['doctorname']."','".$_POST['date']."','1')";}
	elseif($_SESSION['fucha']==2){
	$sql = "insert into aftercheck3 values('".$_SESSION['ID2']."','".$_POST['leftsight']."','".$_POST['zhishu']."','".$_POST['jiemo']."','".$_POST['jiaomo']."','".$_POST['qianfang']."','".$_POST['boliti']."','".$_POST['qiujing']."','".$_POST['zhujing']."','".$_POST['zhouxiang']."','".$rengongjingti."','".$_POST['yandi']."','".$_POST['shipan']."','".$_POST['huangban']."','".$_POST['dongmai']."','".$_POST['wangmo']."','".$_POST['rightsight']."','".$_POST['zhishu2']."','".$_POST['jiemo2']."','".$_POST['jiaomo2']."','".$_POST['qianfang2']."','".$_POST['boliti2']."','".$_POST['qiujing2']."','".$_POST['zhujing2']."','".$_POST['zhouxiang2']."','".$rengongjingti2."','".$_POST['yandi2']."','".$_POST['shipan2']."','".$_POST['huangban2']."','".$_POST['dongmai2']."','".$_POST['wangmo2']."','".$_POST['zhenduanjieguo']."','".$_POST['chulijianyi']."','".$_SESSION['doctorname']."','".$_POST['date']."','1')";
	}else{
	$sql = "insert into aftercheck values('".$_SESSION['ID2']."','".$_POST['leftsight']."','".$_POST['zhishu']."','".$_POST['jiemo']."','".$_POST['jiaomo']."','".$_POST['qianfang']."','".$_POST['boliti']."','".$_POST['qiujing']."','".$_POST['zhujing']."','".$_POST['zhouxiang']."','".$rengongjingti."','".$_POST['yandi']."','".$_POST['shipan']."','".$_POST['huangban']."','".$_POST['dongmai']."','".$_POST['wangmo']."','".$_POST['rightsight']."','".$_POST['zhishu2']."','".$_POST['jiemo2']."','".$_POST['jiaomo2']."','".$_POST['qianfang2']."','".$_POST['boliti2']."','".$_POST['qiujing2']."','".$_POST['zhujing2']."','".$_POST['zhouxiang2']."','".$rengongjingti2."','".$_POST['yandi2']."','".$_POST['shipan2']."','".$_POST['huangban2']."','".$_POST['dongmai2']."','".$_POST['wangmo2']."','".$_POST['zhenduanjieguo']."','".$_POST['chulijianyi']."','".$_SESSION['doctorname']."','".$_POST['date']."','1')";
	}
$result = mysql_query($sql,$conn)or die("666".mysql_error());

echo "<script language=\"javascript\">";
	  echo "alert('添加成功!');";
      echo "document.location=\"fucha.php\"";
      echo "</script>";
}
if(isset($_POST['submit7'])){
$sql = "update patient set name='".$_POST['patientname']."',sex='".$_POST['sex']."',age='".$_POST['age']."',address='".$_POST['address']."',idnum='".$_POST['idnum']."',tel='".$_POST['tel']."',email='".$_POST['email']."' where ID2 = ".$_SESSION['ID2'];
$result = mysql_query($sql,$conn) or die("error1".mysql_error());

$sql1 = "update chuzhen set leftsight='".$_POST['leftsight']."',zhishu='".$_POST['zhishu']."',guangdingwei='".$_POST['guangdingwei']."',bianbieshili='".$_POST['bianbieshili']."',yanjian='".$_POST['yanjian']."',leiqi='".$_POST['leiqi']."',jiaomo='".$_POST['jiaomo']."',qianfang='".$_POST['qianfang']."',hongmo='".$_POST['hongmo']."',duiguangfanshe='".$_POST['duiguangfanshe']."',nianlian='".$_POST['nianlian']."',daxiao='".$_POST['daxiao']."',jingti='".$_POST['jingti']."',boliti='".$_POST['boliti']."',qiujing='".$_POST['qiujing']."',zhujing='".$_POST['zhujing']."',zhouxiang='".$_POST['zhouxiang']."',yandi='".$_POST['yandi']."',shipan='".$_POST['shipan']."',huangban='".$_POST['huangban']."',dongmai='".$_POST['dongmai']."',wangmo='".$_POST['wangmo']."',rightsight='".$_POST['rightsight']."',zhishu2='".$_POST['zhishu2']."',guangdingwei2='".$_POST['guangdingwei2']."',bianbieshili2='".$_POST['bianbieshili2']."',yanjian2='".$_POST['yanjian2']."',leiqi2='".$_POST['leiqi2']."',jiaomo2='".$_POST['jiaomo2']."',qianfang2='".$_POST['qianfang2']."',hongmo2='".$_POST['hongmo2']."',duiguangfanshe2='".$_POST['duiguangfanshe2']."',nianlian2='".$_POST['nianlian2']."',daxiao2='".$_POST['daxiao2']."',jingti2='".$_POST['jingti2']."',boliti2='".$_POST['boliti2']."',qiujing2='".$_POST['qiujing2']."',zhujing2='".$_POST['zhujing2']."',zhouxiang2='".$_POST['zhouxiang2']."',yandi2='".$_POST['yandi2']."',shipan2='".$_POST['shipan2']."',huangban2='".$_POST['huangban2']."',dongmai2='".$_POST['dongmai2']."',wangmo2='".$_POST['wangmo2']."',zhenduanjieguo='".$_POST['zhenduanjieguo']."',chulijianyi='".$_POST['chulijianyi']."',date='".$_POST['date']."' where ID2 = ".$_SESSION['ID2'];
$result1 = mysql_query($sql1,$conn) or die("error2");

echo "<script language=\"javascript\">";
	  echo "alert('修改成功!');";
      echo "document.location=\"chuzhen.php\"";
      echo "</script>";
}
if(isset($_POST['submit8'])){
$sql = "update patient set name='".$_POST['patientname']."',sex='".$_POST['sex']."',age='".$_POST['age']."',address='".$_POST['address']."',idnum='".$_POST['idnum']."',tel='".$_POST['tel']."',email='".$_POST['email']."' where ID2 = ".$_SESSION['ID2'];
$result = mysql_query($sql,$conn) or die("error1");

$sql1 = "update menzhen set leftsight='".$_POST['leftsight']."',zhishu='".$_POST['zhishu']."',guangdingwei='".$_POST['guangdingwei']."',bianbieshili='".$_POST['bianbieshili']."',yanjian='".$_POST['yanjian']."',leiqi='".$_POST['leiqi']."',jiaomo='".$_POST['jiaomo']."',qianfang='".$_POST['qianfang']."',hongmo='".$_POST['hongmo']."',duiguangfanshe='".$_POST['duiguangfanshe']."',nianlian='".$_POST['nianlian']."',daxiao='".$_POST['daxiao']."',jingti='".$_POST['jingti']."',boliti='".$_POST['boliti']."',qiujing='".$_POST['qiujing']."',zhujing='".$_POST['zhujing']."',zhouxiang='".$_POST['zhouxiang']."',yandi='".$_POST['yandi']."',shipan='".$_POST['shipan']."',huangban='".$_POST['huangban']."',dongmai='".$_POST['dongmai']."',wangmo='".$_POST['wangmo']."',rightsight='".$_POST['rightsight']."',zhishu2='".$_POST['zhishu2']."',guangdingwei2='".$_POST['guangdingwei2']."',bianbieshili2='".$_POST['bianbieshili2']."',yanjian2='".$_POST['yanjian2']."',leiqi2='".$_POST['leiqi2']."',jiaomo2='".$_POST['jiaomo2']."',qianfang2='".$_POST['qianfang2']."',hongmo2='".$_POST['hongmo2']."',duiguangfanshe2='".$_POST['duiguangfanshe2']."',nianlian2='".$_POST['nianlian2']."',daxiao2='".$_POST['daxiao2']."',jingti2='".$_POST['jingti2']."',boliti2='".$_POST['boliti2']."',qiujing2='".$_POST['qiujing2']."',zhujing2='".$_POST['zhujing2']."',zhouxiang2='".$_POST['zhouxiang2']."',yandi2='".$_POST['yandi2']."',shipan2='".$_POST['shipan2']."',huangban2='".$_POST['huangban2']."',dongmai2='".$_POST['dongmai2']."',wangmo2='".$_POST['wangmo2']."',zhenduanjieguo='".$_POST['zhenduanjieguo']."',chulijianyi='".$_POST['chulijianyi']."',date='".$_POST['date']."' where ID2 = ".$_SESSION['ID2'];
$result1 = mysql_query($sql1,$conn) or die("error2");

echo "<script language=\"javascript\">";
	  echo "alert('修改成功!');";
      echo "document.location=\"menzhen.php\"";
      echo "</script>";
}
if(isset($_POST['submit9'])){
$sql2 = "update checkin set yanya='".$_POST['yanya']."',k1='".$_POST['k1']."',achao='".$_POST['achao']."',k2='".$_POST['k2']."',jiguang='".$_POST['jiguang']."',neipijishu='".$_POST['neipijishu']."',jingtidushu='".$_POST['jingtidushu']."',yuliudushu='".$_POST['yuliudushu']."',yanguang='".$_POST['yanguang']."',qiujing='".$_POST['qiujing']."',zhujing='".$_POST['zhujing']."',zhouxiang='".$_POST['zhouxiang']."',zhenduanjieguo='".$_POST['zhenduanjieguo']."',chulijianyi='".$_POST['chulijianyi']."',date='".$_POST['date']."' where ID2 = ".$_SESSION['ID2'];
$result2 = mysql_query($sql2,$conn) or die("error3");
echo "<script language=\"javascript\">";
	  echo "alert('修改成功!');";
      echo "document.location=\"jiancha.php\"";
      echo "</script>";
}
if(isset($_POST['submit10'])){
$sql3 = "update operation set jiemochongxi='".$_POST['jiemochongxi']."',zhixingren1='".$_POST['zhixingren1']."',pifuxiaodu='".$_POST['pifuxiaodu']."',zhixingren2='".$_POST['zhixingren2']."',zhixingren3='".$_POST['zhixingren3']."',shoushushijian='".$_POST['date1']."',mazuifangfa='".$_POST['mazuifangfa']."',shuzhongqiekou='".$_POST['shuzhongqiekou']."',houlaipolie='".$_POST['houlaipolie']."',jingtiweizhi='".$_POST['jingtiweizhi']."',qiekouleixing='".$_POST['qiekouleixing']."',boliti='".$_POST['boliti']."',zhenduanjieguo='".$_POST['zhenduanjieguo']."',chulijianyi='".$_POST['chulijianyi']."',date='".$_POST['date2']."' where ID2 = ".$_SESSION['ID2'];
$result3 = mysql_query($sql3,$conn) or die("error4".mysql_error());
echo "<script language=\"javascript\">";
	  echo "alert('修改成功!');";
      echo "document.location=\"shoushu.php\"";
      echo "</script>";
}
if(isset($_POST['submit11'])){
	if(!empty($_POST["rengongjingti"])){
	$array = $_POST["rengongjingti"];
	$rengongjingti = implode('|',$array);
	}
	if(!empty($_POST["rengongjingti2"])){
	$array2 = $_POST["rengongjingti2"];
	$rengongjingti2 = implode('|',$array2);
	}
$sql4 = "update outcheck set leftsight='".$_POST['leftsight']."',rightsight='".$_POST['rightsight']."',qiujing='".$_POST['qiujing']."',zhujing='".$_POST['zhujing']."',zhouxiang='".$_POST['zhouxiang']."',zhouxiang2='".$_POST['zhouxiang2']."',qiujing2='".$_POST['qiujing2']."',zhujing2='".$_POST['zhujing2']."',jiemo='".$_POST['jiemo']."',jiaomo='".$_POST['jiaomo']."',qianfang='".$_POST['qianfang']."',rengongjingti='".$rengongjingti."',boliti='".$_POST['boliti']."',yandi='".$_POST['yandi']."',yandi2='".$_POST['yandi2']."',shipan='".$_POST['shipan']."',huangban='".$_POST['huangban']."',dongmai='".$_POST['dongmai']."',wangmo='".$_POST['wangmo']."',qiujing2='".$_POST['qiujing2']."',zhujing2='".$_POST['zhujing2']."',jiemo2='".$_POST['jiemo2']."',jiaomo2='".$_POST['jiaomo2']."',qianfang2='".$_POST['qianfang2']."',rengongjingti2='".$rengongjingti2."',boliti2='".$_POST['boliti2']."',shipan2='".$_POST['shipan2']."',huangban2='".$_POST['huangban2']."',dongmai2='".$_POST['dongmai2']."',wangmo2='".$_POST['wangmo2']."',day='".$_POST['day']."',date='".$_POST['date']."' where ID2 = ".$_SESSION['ID2'];
$result4 = mysql_query($sql4,$conn) or die("errors!!".mysql_error());
echo "<script language=\"javascript\">";
	  echo "alert('修改成功!');";
      echo "document.location=\"chuyuan.php\"";
      echo "</script>";
}
if(isset($_POST['submit12'])){
		if(!empty($_POST["rengongjingti"])){
	$array = $_POST["rengongjingti"];
	$rengongjingti = implode('|',$array);
	}
	if(!empty($_POST["rengongjingti2"])){
	$array2 = $_POST["rengongjingti2"];
	$rengongjingti2 = implode('|',$array2);
	}
$sql5 = "update aftercheck set leftsight='".$_POST['leftsight']."',rightsight='".$_POST['rightsight']."',qiujing='".$_POST['qiujing']."',zhujing='".$_POST['zhujing']."',jiemo='".$_POST['jiemo']."',jiaomo='".$_POST['jiaomo']."',qianfang='".$_POST['qianfang']."',rengongjingti='".$rengongjingti."',boliti='".$_POST['boliti']."',shipan='".$_POST['shipan']."',huangban='".$_POST['huangban']."',dongmai='".$_POST['dongmai']."',wangmo='".$_POST['wangmo']."',qiujing2='".$_POST['qiujing2']."',zhujing2='".$_POST['zhujing2']."',jiemo2='".$_POST['jiemo2']."',jiaomo2='".$_POST['jiaomo2']."',qianfang2='".$_POST['qianfang2']."',rengongjingti2='".$rengongjingti2."',boliti2='".$_POST['boliti2']."',shipan2='".$_POST['shipan2']."',huangban2='".$_POST['huangban2']."',dongmai2='".$_POST['dongmai2']."',wangmo2='".$_POST['wangmo2']."',date='".$_POST['date']."' where ID2 = ".$_SESSION['ID2'];
$result5 = mysql_query($sql5,$conn) or die("errors!!!!");
echo "<script language=\"javascript\">";
	  echo "alert('修改成功!');";
      echo "document.location=\"fucha.php\"";
      echo "</script>";
}
if(isset($_POST['submit13'])){
$sql5 = "update doctor set name='".$_POST['name']."',sex='".$_POST['sex']."',age='".$_POST['age']."',title='".$_POST['title']."',tel='".$_POST['tel']."',email='".$_POST['email']."',password='".$_POST['password']."',flag1 = '".$_POST['flag1']."',flag2 = '".$_POST['flag2']."',flag3 = '".$_POST['flag3']."',flag4 = '".$_POST['flag4']."',flag5 = '".$_POST['flag5']."',flag6 = '".$_POST['flag6']."',flag8 = '".$_POST['flag8']."' where ID = ".$_SESSION['ID3'];
$result5 = mysql_query($sql5,$conn) or die("errors!!!!");
echo "<script language=\"javascript\">";
	  echo "alert('修改成功!');";
      echo "document.location=\"admin.php\"";
      echo "</script>";
}
if(isset($_POST['submit14'])){
$sqlstr = "update doctor set name='".$_POST['name']."',sex='".$_POST['sex']."',age='".$_POST['age']."',tel='".$_POST['tel']."',email='".$_POST['email']."',password='".$_POST['password']."' where ID = ".$_SESSION['ID'];
$result = mysql_query($sqlstr,$conn) or die(mysql_error());
echo "<script language=\"javascript\">";
	  echo "alert('修改成功!');";
      echo "document.location=\"user.php?ID=".$_SESSION['ID']."\"";
      echo "</script>";
}
if(isset($_POST['submit15'])){
$sql = "insert into doctor values('','".$_POST['name']."','".$_POST['sex']."','".$_POST['age']."','".$_POST['title']."','".$_POST['tel']."','".$_POST['email']."','".$_POST['password']."','','','','','','','','','".$_POST['gonghao']."')";
$result = mysql_query($sql,$conn)or die("333".mysql_error());

echo "<script language=\"javascript\">";
	  echo "alert('添加成功!');";
      echo "document.location=\"admin.php\"";
      echo "</script>";
}
?>
</body>
</html>
