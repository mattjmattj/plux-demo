<?php


namespace Plux\Demo\Store;

use \Plux\StoreTrait;
use \Plux\Action;

/**
 * For demo purpose : log all Action in session
 */ 
class ActionLog {
	
	use StoreTrait;
	
	public function handle (Action $action) {
		if (!isset($_SESSION['log'])) {
			$_SESSION['log'] = [];
		}
		$data = print_r($action->getData(),true);
		$_SESSION['log'][] = date('c') . " : " . $action->getType() . " ($data)";
		
		if ($action->getType() === 'clearlog') {
			$_SESSION['log'] = [];
			$this->emit('clear');
		}
	}
	
	/**
	 * Returns the all log
	 * @return string[] item list
	 */ 
	public function getData () {
		if (!isset($_SESSION['items'])) {
			return [];
		}
		
		return $_SESSION['log'];
	}
	
}