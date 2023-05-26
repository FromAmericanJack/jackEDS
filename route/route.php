<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//index
Route::rule('index','index/index');    
Route::rule('list/:id','artlist/index')->pattern(['id' => '\d+']);
Route::rule('detail/:id','artdetail/index')->pattern(['id' => '\d+']);
Route::rule('message/index','feedback/index');