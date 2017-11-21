<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Check extends Controller
{
    
    public function index($id)
    {   
        
    	/*$this->assign('page_name','首页');
    	$this->assign('url','add')*/
    	$result = Db::table('student')->query('select * from student where id='.$id.'');
    	$this->assign('re',$result);
    	//print_r($result);
    	$date =date("Y-m-d H:i:s");
    	$this->assign('date',$date);

        $result1 = Db::name('check')
                    ->where('id',$id)
                    ->select();
        $this->assign('result',$result1);
        $this->assign('__PUBLIC__',dirname(dirname(dirname(dirname($_SERVER['PHP_SELF'])))));
        return $this->fetch('check');

    }

    public function insert($id){

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

       $re = Db::name('check')->where('id',$id)->count();
       if($re == null){
         Db::name('student')->where('id',$id)->update(['ischeck'=>1]);
         Db::name('ischeck')->update(['id'=>$id,'date'=>input('date'),'check'=>$b]);
        Db::name('check')
        ->insert(['id'=>$id,'zhusu'=>input('zhusu'),'shiliOD'=>input('shiliOD'),'shiliOS'=>input('shiliOS'),'yanguangOD'=>input('yanguangOD'),'yanguangOS'=>input('yanguangOS'),'jianyi'=>input('jianyi'),'date'=>input('date'),'check'=>$b,'num'=>1]);
    }else{
         Db::name('check')
        ->insert(['id'=>$id,'zhusu'=>input('zhusu'),'shiliOD'=>input('shiliOD'),'shiliOS'=>input('shiliOS'),'yanguangOD'=>input('yanguangOD'),'yanguangOS'=>input('yanguangOS'),'jianyi'=>input('jianyi'),'date'=>input('date'),'check'=>$b,'num'=>(++$re)]);
        Db::name('ischeck')->where('id',$id)->update(['date'=>input('date'),'check'=>$b]);
    }

         $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
         $domain = $_SERVER['HTTP_HOST'];
        return $this->success('提交成功',$http_type.'://'.$domain.''.$url);
    }

   
}