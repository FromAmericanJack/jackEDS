<?php

/**
 * from https://github.com/AmerianJake/jackEDS
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackadmin\controller;
use app\jackadmin\controller\Common;
use think\Db;
use think\facade\Request;
use think\facade\Session;

class Lang extends Common
{
	public function index()
	{
		$path_index = env('app_path').'jackindex/lang/'.config('default_lang').'.php';
		$content_index = file_get_contents($path_index);

		$path_admin = env('app_path').'jackadmin/lang/'.config('default_lang').'.php';
		$content_admin = file_get_contents($path_admin);

		return $this->fetch('',[
			'content_admin'=>$content_admin,
			'content_index'=>$content_index,
		]);
	}

	public function save()
	{
		if (Request::param('type')=='index') {
			$path = env('app_path').'jackindex/lang/'.config('default_lang').'.php';
			$content = Request::param('content');
			$res = file_put_contents($path,$content);
			return $this->success(lang('c_success'),'jackadmin/lang/index');
		}

		if (Request::param('type')=='admin') {
			$path = env('app_path').'jackadmin/lang/'.config('default_lang').'.php';
			$content = Request::param('content');
			$res = file_put_contents($path,$content);
			return $this->success(lang('c_success'),'jackadmin/lang/index');
		}		

	}
	
}