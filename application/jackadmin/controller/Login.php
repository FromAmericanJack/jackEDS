<?php

/**
 * from https://github.com/FromAmericanJack/jackEDS 
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackadmin\controller;
use think\Db;
use think\Controller;
use think\captcha\Captcha;
use think\facade\Request;
use think\facade\Session;

class Login extends Controller
{
	public function Index()
	{
		return $this->fetch();
	}

	public function checkLogin()
	{
		$re = Request::param();
		if( !captcha_check($re['captcha'])){
			$this->error('Code wrong!');
		}
		$res = Db::name('manage_user')
			->where('name',$re['name'])
			->where('password',md5($re['password']))
			->value('id');
		if (!$res) {
			$this->error('name or password wrong!');
		}
		Session::set('user_id',$res);
		$this->success('success login','jackadmin/index/index');
	}

	public function verify()
    {
        $captcha = new Captcha();
        return $captcha->entry();    
    }


}