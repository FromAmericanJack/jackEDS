<?php

/**
 * from https://github.com/AmerianJake/jackEDS
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackadmin\controller;
use think\Controller;
use think\facade\Session;
use think\Db;
use think\Validate;
use lib\Rule;

class Common extends Controller
{
	protected function initialize()
	{
		if (!Session::get('user_id')) {
			$this->error('please login','jackadmin/login/index');
		}
	}

	/**
	 * nav list add '|-'
	 * @return [type] [description]
	 */
	protected function navList()
	{
		$data = Db::name('nav')->order('sort desc')->select();
		$navList = Rule::Rulelist($data);
		$n1 = [];		
		foreach ($navList as $k => $v) {
			if ($v['parent_id']!='0') {
				$num = '';
				for ($i=0; $i < $v['level']; $i++) { 
					$num = $num.'| - ';
				}
				$v['name'] = $num.$v['name'];				
			}
			$n1[$k] = $v;
		}
		return $n1;
	}

	/**
	 * file upload
	 * @param  string $form_name [form input name]
	 * @param  int $size      [max size]
	 * @param  string $dir       [upload dir]
	 * @param  string $ext       [support format]
	 * @return [type]            [file path or wrong json]
	 */
	protected function upload($form_name='pic',$dir='image',$size='200678',$ext='jpg,png,gif')
	{	
		if ($_FILES[$form_name]['size']) { //exist pic	
			$file = request()->file($form_name);
		    $info = $file->validate(['size'=>$size,'ext'=>$ext])->rule('uniqid')->move(env('root_path').'public/upload/'.$dir.'/'.date('Ymd'));	    
		    if($info){
		    	return '/upload/'.$dir.'/'.date('Ymd').'/'.$info->getSaveName();
		    }else{
		    	return $this->error($file->getError());        
		    }
		}else{
			return false;
		}	    
	}

	/**
	 * lowest level nav 
	 * @return [type] [description]
	 */
	protected function lowLevelNav()
	{
		$data = Db::name('nav')->where('status','1')->select();
		$data = Rule::Rulelist($data);
		foreach ($data as $k => $v) {
			foreach ($data as $k1 => $v1) {
				if ($v['id']==$v1['parent_id']) {
					$data[$k1]['name'] = $data[$k]['name'].' / '.$data[$k1]['name'];
				}
			}
		}
		foreach ($data as $k => $v) {
			foreach ($data as $k1 => $v1) {
				if ($v['id']==$v1['parent_id']) {
					unset($data[$k]);
				}
			}
		}
		return $data;		
	}


}