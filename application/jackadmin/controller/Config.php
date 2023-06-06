<?php

/**
 * from https://github.com/FromAmericanJack/jackEDS 
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackadmin\controller;
use app\jackadmin\controller\Common;
use think\Db;
use think\facade\Request;

class Config extends Common
{
	public function Index()
	{
		$website_seo = json_decode(Db::name('config')->where('name','website_seo')->value('value'),true);
		$this->assign([
			'website_name'=>Db::name('config')->where('name','website_name')->value('value'),
			'website_logo'=>Db::name('config')->where('name','website_logo')->value('value'),
			'website_email'=>Db::name('config')->where('name','website_email')->value('value'),
			'website_seo'=>$website_seo,
		]);

		return $this->fetch();
	}

	public function save()
	{
		$data = Request::param();
		$data['website_seo'] = json_encode($data['website_seo']);
		
		$pic_path = $this->upload('website_logo');
		if ($pic_path) {
			$image = \think\Image::open(env('root_path').'public'.$pic_path);
			$image->thumb(150, 150)->save(env('root_path').'public'.$pic_path);
			$data['website_logo'] = $pic_path;
		}
		foreach ($data as $k => $v) {
			$update = Db::name('config')->where('name',$k)->update(['value'=>$v]);
		}
		if ($update) {
			$this->success(lang('c_success'));
		}
		$this->error(lang('c_error'));		

	}


}
