<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Framework;

use Plux\ComponentTrait;

/**
 * In this implementation we want Components to manage routes themselves. 
 * Components declare a set of routes they handle.
 * 
 * Note that this feature was not included in Plux since it is very framework-
 * dependent. 
 */ 
abstract class Component {
	
	use ComponentTrait;
	
	/**
	 * Returns the list of routes handled by the component. The list should be
	 * an array of string <route> => callable
	 * @return array - the routes handled by this component
	 */ 
	public function getRoutes () {
		return [];
	}
}