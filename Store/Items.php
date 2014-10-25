<?php


namespace Plux\Demo\Store;

use \Plux\Store;
use \Plux\StoreTrait;
use \Plux\Action;

/**
 * This Store handles every action on items
 * For this demo we use the session to store items. We could of course use any
 * kind of persistence instead.
 */ 
class Items implements Store {
	
	use StoreTrait;
	
	public function handle (Action $action) {
		switch ($action->getType()) {
			
			case 'add' :
				$data = $action->getData();
				$this->addItem($data['text']);
				break;
				
			case 'delete' :
				$data = $action->getData();
				$this->deleteItem($data['id']);
				break;
		}
	}
	
	/**
	 * Returns all the data.
	 * This is not relevant in this demo, but in a real application we should
	 * use as much lazy-loading and caching as possible since such a method can
	 * be called by many independant Components
	 * @return string[] item list
	 */ 
	public function getData () {
		if (!isset($_SESSION['items'])) {
			return [];
		}
		
		return $_SESSION['items'];
	}
	
	private function addItem ($text) {
		if (!isset($_SESSION['items'])) {
			$_SESSION['items'] = [];
		}
		
		$id = uniqid();
		$_SESSION['items'][$id] = $text;
		
		$this->emit('add',[$id, $text]);
	}
	
	private function deleteItem ($id) {
		if (!isset($_SESSION['items'][$id])) {
			return;
		}
		
		$text = $_SESSION['items'][$id];
		unset($_SESSION['items'][$id]);
		
		$this->emit('delete',[$id, $text]);
	}
}