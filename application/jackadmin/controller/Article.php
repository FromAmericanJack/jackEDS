<?php

/**
 * from https://github.com/AmerianJake/jackEDS
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackadmin\controller;
use app\jackadmin\controller\Common;
use think\Db;
use think\facade\Request;
use lib\Rule;

class Article extends Common
{
	public function index()
	{
		$search = Request::param('search');
		if (isset($search) && is_numeric($search)) {
			$where[] = ['id','=',$search];
		}
		if (isset($search) && !is_numeric($search)) {
			$where[] = ['title','like','%'.$search.'%'];
		}	
		$where[] = ['id','<>',''];
		$articleList = Db::name('article')->where($where)->order('update_time desc, id desc')->paginate(10);
		

		$this->assign('articleList',$articleList);	
		return $this->fetch();
	}

	public function add()
	{
		$this->assign('navList',$this->lowLevelNav());
		return $this->fetch();
	}

	public function save()
	{
		$data = Request::param();
		if (!$data['title']) {
			$this->error(lang('c_name_empty'));
		}

		$data['pics'] = $this->upload();
		
		if (isset($data['id'])) { //amend
			$data['update_time'] = time();
			$result = Db::name('article')->update($data);
		}else{
			$data['create_time'] = $data['update_time'] = time();
			$result = Db::name('article')->insert($data);
		}
		if ($result) {
			$this->success(lang('c_success'),'jackadmin/article/index');
		}
		$this->error(lang('c_error'));
	}

	public function des()
	{
		$id = Request::param('id');
		$result = Db::name('article')->delete($id);
		$this->success(lang('c_success'),'jackadmin/article/index');
	}

	public function amend()
	{
		$id = Request::param('id');
		$result = Db::name('article')->find($id);
		$this->assign('navList',$this->lowLevelNav());
		return $this->fetch('',[
			'info'=>$result,
		]);
	}

	
}
