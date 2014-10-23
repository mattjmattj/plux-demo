<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Framework;

class Controller {
	
	protected static function render ($view, $symbols=[]) {
		extract($symbols);
		include __DIR__ . '/../View/' . $view;
	}
}