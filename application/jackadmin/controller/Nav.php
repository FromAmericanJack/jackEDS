<?php

/**
 * from https://github.com/FromAmericanJack/jackEDS 
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackadmin\controller;
use app\jackadmin\controller\Common;
use think\Db;
use think\facade\Request;
use think\facade\Session;
use lib\Rule;

class Nav extends Common
{
	public function index()
	{
		
		$data1 = Db::name('nav')->order('sort desc')->paginate(10);

		$this->assign('pageList',$data1);
		$data1 = $data1->toArray();
		$data = $data1['data'];

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

		$this->assign([
			'navList'=>$n1,
			'empty'=>'no data',
		]);		
		return $this->fetch();
	}


	public function add()
	{
		$this->assign('navList',$this->navList());
		return $this->fetch();
	}

	public function amend()
	{
		$id = Request::param('id');
		$this->assign('info',Db::name('nav')->find($id));

		$this->assign('navList',$this->navList());

		return $this->fetch();
	}


	//delete
	public function des()
	{
		$id = Request::param('id');

		$exist_child = Db::name('nav')->where('parent_id',$id)->value('id');
		$exist_article = Db::name('article')->where('nav_id',$id)->value('id');
		if ($exist_child || $exist_article) {
			$this->error(lang('nav_del_exist'));
		}
		
		$result = Db::name('nav')->delete($id);		
		if ($result) {
			$this->success(lang('c_success'));
		}
		$this->error(lang('c_error'));
	}

	public function save()
	{
		$data = Request::param();
		if (!$data['name']) {
			$this->error(lang('c_name_empty'));
		}		
		if (isset($data['id'])) { //amend
			$result = Db::name('nav')->where('id',$data['id'])->update($data);
		}else{ //add
			$data['create_time'] = $data['update_time'] = time();
			if ($data['parent_id']!='0') {
				$parent_level = Db::name('nav')->where('id',$data['parent_id'])->value('level');
				$data['level'] = $parent_level+1;
			}
			$result = Db::name('nav')->insert($data);			
		}
		if ($result) {
			$this->success(lang('c_success'),'jackadmin/nav/index');
		}
		$this->error(lang('c_error'));

	}

	public function logout()
	{
		$res = Session::clear();
		if (!$res) {
			$this->success(lang('c_success'),'jackadmin/login/index');
		}
		$this->error(lang('c_error'));
	}


}
