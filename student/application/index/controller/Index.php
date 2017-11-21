<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
//use app\index\model\User ;
class Index extends Controller
{
    public function index()
    {
    	/*$this->assign('page_name','首页');
    	$this->assign('url','add')*/
    	//$result = Db::table('student')->query('select name,sex,age,tel,address,id from student ');
        // $db = db('student')->paginate(4);
        //$a = Db::name('check')->order('date','desc')->field('id')->select();
       // print_r($a);
       // print_r($a);
        //echo $a[0]['id'];
        /*if($a!=null){
            $b = Db::name('student')->where([
                                        'id'=>['in',$a],
                                        ])->select();

        }*/
        //$id = $_GET['page'];
        //echo $id;
        $time = date("Y-m-d H:i:s");
        $a = Db::name('student')->order('date','desc')->field('date,check,id')->select();
        $count = count($a);
        for($i=0;$i<$count;$i++){
            if($a[$i]['date']>=$a[$i]['check']){
                Db::name('student')->where('id',$a[$i]['id'])->update(['flag'=>'1']);
            }
        }
        $sql = Db::name('student')->where([
                                            'flag'=>'1',
                                            'ischeck'=>'0',
                                        ])->select();
        //print_r($sql);
        $num = count($sql);
        for($k=0;$k<$num;$k++){
            $n = Db::name('ischeck')->where('id',$sql[$k]['id'])->select();
            if($n==null){
                Db::name('ischeck')->insert(['id'=>$sql[$k]['id'],'date'=>$sql[$k]['date'],'check'=>$sql[$k]['check']]);
            }else{
                Db::name('ischeck')->update(['id'=>$sql[$k]['id'],'date'=>$sql[$k]['date'],'check'=>$sql[$k]['check']]);
            }
        }
        
        $pagesize = 5;
        $totalNum = Db::name('ischeck')->where('check','<=',$time)->count();
        $pagecount = ceil($totalNum/$pagesize);
        (!isset($_GET['page']))?($page = 1):$page = $_GET['page'];
        ($page <= $pagecount)?$page:($page = $pagecount);
        $f_pageNum = $pagesize * ($page - 1);                             
        //$sqlstr = $sqlstr." limit ".$f_pageNum.",".$pagesize;
        //$result = Db::name('ischeck')->where('check','<=',$time)->order('date','desc')->limit($f_pageNum,$pagesize)->select(); 
        //$result = Db::name('student')->query("select * from student where id in(select id from ischeck) limit ".$f_pageNum.",".$pagesize." order by date ");
        $id =$result = Db::name('ischeck')->where('check','<=',$time)->order('date','desc')->limit($f_pageNum,$pagesize)->select();
        $array = array();
       // print_r($id);
        $no = count($id);
        for($m=0;$m<$no;$m++){
            $result = Db::name('student')->where('id',$id[$m]['id'])->select();
            //print_r($result);
            $array[$m] = $result[0];
            
        }
       /* $w = "第".$page."页/共".$pagecount."页&nbsp;";
                        if($page!=1){//如果当前页不是1则输出有链接的首页和上一页
                            $a = "<a href='?page=1'>首页</a>&nbsp <a href='?page=".($page-1)."'>上一页</a>&nbsp;";
                        }else{//否则输出没有链接的首页和上一页
                            $a = "首页&nbsp;上一页&nbsp;";
                        }
                        if($page!=$pagecount){//如果当前页不是最后一页则输出有链接的下一页和尾页
                            $b = "<a href='?page=".($page+1)."'>下一页</a>&nbsp<a href='?page=".$pagecount."'>尾页</a>&nbsp;";
                        }else{//否则输出没有链接的下一页和尾页
                            $b  = "下一页&nbsp;尾页&nbsp;";
                        } */

             $w = "<ul class='pagination'>";
                        if($page!=1){//如果当前页不是1则输出有链接的首页和上一页
                            $a = "<li class='page-item'><a class='page-link' href='?page=".($page-1)."'><<</a></li>
                              <li class='page-item'><a class='page-link' href='?page=".($page-1)."'>".($page-1)."</a></li>
                               <li class='page-item active'><a class='page-link' href='?page=".($page)."'>".$page."</a></li>";
                        }else{//否则输出没有链接的首页和上一页
                            $a = "<li class='page-item disabled'><a class='page-link' href=''><<</a></li>
                              <li class='page-item disabled'><a class='page-link' href=''>&nbsp&nbsp</a></li>
                               <li class='page-item active'><a class='page-link' href='?page=".($page)."'>".$page."</a></li>";
                        }
                        if($page!=$pagecount){//如果当前页不是最后一页则输出有链接的下一页和尾页
                            $b = "<li class='page-item'><a class='page-link' href='?page=".($page+1)."'>".($page+1)."</a></li>
                              <li class='page-item'><a class='page-link' href='?page=".($page+1)."'>>></a></li>";
                        }else{//否则输出没有链接的下一页和尾页
                           $b = "<li class='page-item disabled'><a class='page-link' href=''>&nbsp&nbsp</a></li>
                              <li class='page-item disabled'><a class='page-link' href=''> >></a></li>";
                        }

                $w2 = "</ul>";
            
    	$this->assign('arr',$array);
        $this->assign('w',$w);
        $this->assign('a',$a);
        $this->assign('b',$b);
        $this->assign('w2',$w2);
        $this->assign('__PUBLIC__',dirname($_SERVER['PHP_SELF']));
       // $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        //echo $_SERVER['HTTP_HOST'] ;
        //echo $_SERVER["SERVER_NAME"] ;
        //echo $http_type;
    	//$list = UserModel::paginate(4);
		//$this->assign('list',$list);
        //echo url('index/index');
        return $this->fetch();

    }

   
}
