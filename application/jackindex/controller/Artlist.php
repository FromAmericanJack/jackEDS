<?php

/**
 * from https://github.com/FromAmericanJack/jackEDS 
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackindex\controller;
use app\jackindex\controller\Common;
use think\Db;

class Artlist extends Common
{
    public function index()
    {    	
        $nownav = Db::name('nav')->where('id',request()->param('id'))->find();
        if (!$nownav) {
            $this->error(lang('error'));
        }

        $this->assign([
        	'title'=>$nownav['name'],
        	'keyword'=>$nownav['keywords'],
        	'description'=>$nownav['description'],
        ]);

        return $this->fetch('',[
        	'list'=>Db::name('article')->whereOr('nav_id',request()->param('id'))->paginate(10),
        	'navInfo'=>$nownav,
        	'nowNavName'=>$nownav['name'],
        ]);
    }

    
}
