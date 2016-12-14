<?php namespace houdunwang\zip;
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

use hdphp\kernel\ServiceProvider;

class ZipProvider extends ServiceProvider {

	//延迟加载
	public $defer = true;

	public function register() {
		$this->app->single( 'Zip', function () {
			return new PclZip();
		} );
	}
}