<?php namespace houdunwang\zip;

use houdunwang\zip\build\PclZip;

class Zip {
	//连接
	protected $link;

	//更改缓存驱动
	protected function driver() {
		$this->link = new PclZip();

		return $this;
	}

	public function __call( $method, $params ) {
		if ( is_null( $this->link ) ) {
			$this->driver();
		}
		if ( method_exists( $this->link, $method ) ) {
			return call_user_func_array( [ $this->link, $method ], $params );
		}
	}

	public static function single() {
		static $link = null;
		if ( is_null( $link ) ) {
			$link = new static();
		}

		return $link;
	}

	public static function __callStatic( $name, $arguments ) {
		return call_user_func_array( [ static::single(), $name ], $arguments );
	}
}