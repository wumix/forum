<?php namespace Eubby\Libs\Facades;

use Illuminate\Support\Facades\Facade;

class Provider extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'Provider'; }

}