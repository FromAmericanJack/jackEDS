<?php

/**
 * from https://github.com/FromAmericanJack/jackEDS 
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackindex\controller;
use think\Controller;
use think\facade\Session;
use think\Db;
use think\Validate;
use lib\Rule;

class Common extends Controller
{
	protected function initialize()
	{	
		$website_name = getConfigValue('website_name');
		$website_seo = json_decode(getConfigValue('website_seo'),true);
		$website_seo['title'] = $website_name;
		$this->assign([
			'navList'=>$this->navList(),
			'logo'=>getConfigValue('website_logo'),
			'website_name'=>$website_name,
			'website_seo'=>$website_seo,
		]);

	}

	protected function navList()
	{
		$data = Db::name('nav')->where('status','1')->order('sort desc')->select();
		$navList = Rule::Rulelayer($data);
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

	protected function uploadPic(){	    
	    $file = request()->file('pic');
	    $info = $file->validate(['size'=>500678,'ext'=>'jpg,png,gif'])->rule('uniqid')->move(env('root_path').'public/upload/image/'.date('Ymd'));	    
	    if($info){
	    	return ['code'=>'0','msg'=>lang('c_success'),'data'=>'/upload/image/'.date('Ymd').'/'.$info->getSaveName()];	        
	    }else{
	    	return ['code'=>'1','msg'=>$file->getError()];		        
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
