<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Add extends Controller
{
    public function index()
    {
    	$date =date("Y-m-d H:i:s");
    	$this->assign('date',$date);
        $this->assign('__PUBLIC__',dirname(dirname(dirname(dirname($_SERVER['PHP_SELF'])))));
        return $this->fetch('add');

    }

    public function insert(){
        $a_time = strtotime(input('date'));
        if(input('check')=='3个月'){
             $b_time = strtotime('+3 Month',$a_time);
        }
        if (input('check')=='6个月') {
            # code...
            $b_time = strtotime('+6 Month',$a_time);
        }
        if (input('check')=='12个月') {
            # code...
            $b_time = strtotime('+12 Month',$a_time);
        }

        $b = date("Y-m-d H:i:s",$b_time);
    	Db::table('student')
    	->insert(['name' => input('name'), 'sex' => input('sex'),'age'=>input('age'),
    	'tel'=>input('tel'),'address'=>input('address'),'shiliOD'=>input('shiliOD'),'shiliOS'=>input('shiliOS'),
    	'chufangOD'=>input('chufangOD'),'chufangOS'=>input('yanguangOD'),'yanguangOD'=>input('yanguangOD'),'yanguangOS'=>input('yanguangOS'),'yanguang2OD'=>input('yanguang2OD'),'yanguang2OS'=>input('yanguang2OS'),'zhudao'=>input('zhudao'),'xieshiOD'=>input('xieshiOD'),'xieshiOS'=>input('xieshiOS'),'zhenduan'=>input('zhenduan'),'fangan'=>input('fangan'),'date'=>input('date'),'check'=>$b,'ischeck'=>0]);
    	 return $this->success('新增成功','http://localhost/student/public/index.php');
    }

   
}
