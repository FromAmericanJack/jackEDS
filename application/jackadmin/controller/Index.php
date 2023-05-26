<?php

/**
 * from https://github.com/AmerianJake/jackEDS
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU GENERAL PUBLIC LICENSE
 */

namespace app\jackadmin\controller;
use app\jackadmin\controller\Common;
use think\Db;

class Index extends Common
{
	public function Index()
	{
		return $this->fetch();
	}


}

