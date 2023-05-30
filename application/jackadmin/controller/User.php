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

class User extends Common
{
	public function index()
	{
		$this->assign([
			'userList'=>Db::name('manage_user')->paginate(10),
			'empty'=>'no data',
		]);
		return $this->fetch();
	}

	public function add()
	{
		
		return $this->fetch();
	}

	public function amend()
	{
		$id = Request::param('id');
		$this->assign('info',Db::name('manage_user')->find($id));
		return $this->fetch();
	}
	//delete
	public function des()
	{
		$id = Request::param('id');
		if ($id==Session::get('user_id')) {
			$this->error('not delete yourself');
		}
		$result = Db::name('manage_user')->delete($id);		
		if ($result) {
			$this->success('success');
		}
		$this->error('Error');
	}

	public function save()
	{
		$data = Request::param();		
		if ($data['password']&&($data['password']!=$data['password_confirm'])) {
			$this->error('password is not the same as re-password');
		}		
		unset($data['password_confirm']);

		if (isset($data['id'])) { //amend
			if ($data['password']) {
				$data['password'] = md5($data['password']);	
			}else{
				unset($data['password']);
			}
			$result = Db::name('manage_user')->update($data);
		}else{  //add
			$nameOldId = Db::name('manage_user')->where('name',$data['name'])->value('id');
			if ($nameOldId) $this->error('Name is Existed');
			$data['password'] = md5($data['password']);			
			$result = Db::name('manage_user')->insert($data);
		}
		
		if ($result) {
			$this->success('success','jackadmin/user/index');
		}
		$this->error('Error');

	}

	public function logout()
	{
		$res = Session::clear();
		if (!$res) {
			$this->success('success','jackadmin/login/index');
		}
		$this->error('Error');
	}

	public function clearrunfile()
	{
		$fiels = scandir(env('runtime_path').'temp');
		foreach ($fiels as $k => $v) {
			if (is_file(env('runtime_path').'temp/'.$v)) {
				$res  = unlink(env('runtime_path').'temp/'.$v);
			}			
		}
		if ($res) {
			$this->success(lang('success'));
		}
		$this->error(lang('error'));

	}


}
