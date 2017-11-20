<?

namespace app\index\controller;
use think\Controller;
use think\Db;
//use app\index\model\User ;
class Search extends Controller
{
    public function search()
    {
    	$re = Db::name('student')->where('name','like','%'.input('keyword').'%')->select();
    	$this->assign('re',$re);
    	$this->assign('__PUBLIC__',dirname(dirname(dirname(dirname($_SERVER['PHP_SELF'])))));
    	return $this->fetch('search');
    }
 }