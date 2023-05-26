<?php

/**
 * from https://github.com/AmerianJake/jackEDS
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackindex\controller;
use app\jackindex\controller\Common;
use think\Db;
use think\captcha\Captcha;
use think\facade\Request;

class Feedback extends Common
{
	public function index()
	{
		$this->assign('navList1',$this->lowLevelNav());	
		return $this->fetch('',[
			'email'=>Db::name('config')->where('name','website_email')->value('value'),
		]);
	}

	public function save()
	{
		$data = Request::param();
		$rule = [
	      'title'  => 'require|max:200|min:5',
	      'detail'   => 'require|max:500',
	      'email'   => 'email',
	      'code' => 'require|captcha',
	    ];

	    $result = $this->validate($data,$rule);
        if (true !== $result) {            
            $this->error($result);            
        }

        $data['title'] = $data['title'].'--from:'.$data['email'];
        $data['status'] = 0;
        $data['hits'] = 100;
        $data['create_time'] = $data['update_time'] = time();
        unset($data['code']);		
		unset($data['email']);
        
        $result = Db::name('article')->insert($data);
        if ($result) {
        	$this->success(lang('success'));   
        }else{
        	$this->error(lang('error')); 
        }

		
	}

	public function verify()
	{
		$captcha = new Captcha();
        return $captcha->entry();    
	}

}