<?php

/**
 * from https://github.com/AmerianJake/jackEDS
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackindex\controller;
use app\jackindex\controller\Common;
use think\Db;

class Index extends Common
{
    public function index()
    {
        
    	$allNav = Db::name('nav')->where('status','1')->select();
    	$recommendList = Db::name('article')->where('status','1')->where('recommend','1')->limit(10)->select();
    	$hotList = Db::name('article')->where('status','1')->where('hot','1')->limit(10)->select();
    	$hitsList = Db::name('article')->where('status','1')->order('hits desc')->limit(10)->select();
        $this->assign([
        	'nowNavName'=>'0',
        	'recommendList'=>$recommendList,
        	'hotList'=>$hotList,
        	'hitsList'=>$hitsList,
        	'navLabel'=>$allNav,
        ]);
        return $this->fetch();
    }

    
}
