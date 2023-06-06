<?php

/**
 * from https://github.com/FromAmericanJack/jackEDS 
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackindex\controller;
use app\jackindex\controller\Common;
use think\Db;
use think\facade\Session;
use lib\Rule;

class Artdetail extends Common
{
    public function index()
    {
        $find = Db::name('article')->where('id',request()->param('id'))->find();
        if (!$find) {
            $this->error(lang('error'));
        }
        $nownav = Db::name('nav')->where('id',$find['nav_id'])->find();

        if (Session::get('cus_ip') != $_SERVER['REMOTE_ADDR']) { //hits add one
        	$setInc = Db::name('article')->where('id',request()->param('id'))->setInc('hits');
            Session::set('cus_ip',$_SERVER['REMOTE_ADDR']);
        }

        $data = Db::name('nav')->where('status','1')->order('sort desc')->select();
        $navbar = Rule::getParents($data,$nownav['id']);

        $this->assign([
        	'title'=>$find['title'],
        	'keyword'=>$find['keywords'],
        	'description'=>$find['description'],
        ]);
        return $this->fetch('',[
        	'detail'=>$find,
        	'navInfo'=>$nownav,
        	'nowNavName'=>$nownav['name'],
        	'ip'=>$_SERVER['REMOTE_ADDR'],
            'navbar'=>$navbar,
            'relative_list'=>Db::name('article')->where('nav_id',$nownav['id'])->where('status','1')->limit(10)->select(),
        ]);
    }

    
}
