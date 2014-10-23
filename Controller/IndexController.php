<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Controller;

use Plux\Demo\Framework\Controller;

use Plux\Demo\Component\Header;
use Plux\Demo\Component\Footer;
use Plux\Demo\Component\TodoList;
use Plux\Demo\Component\AddForm;
use Plux\Demo\Component\Log;
use Plux\Demo\Component\Flash;

use Plux\Action;
use Plux\Plux;

class IndexController extends Controller{
	
	private static function components () {
		return [
			'header' 	=> new Header (),
			'footer' 	=> new Footer (),
			'todolist' 	=> new TodoList (),
			'addform' 	=> new AddForm (),
			'log' 		=> new Log (),
			'flash' 	=> new Flash (),
		];
	}
	
	public static function index () {
		$components = self::components();
		self::render ('index.php', $components);
	}
	
	public static function add () {
		if (!isset($_POST['text'])) {
			return;
		}
		
		$components = self::components();
		
		$action = new Action ('add', ['text' => $_POST['text']]);
		Plux::getDispatcher()->dispatch($action);
		
		self::render ('index.php', $components);
	}
	
	public static function delete () {
		if (!isset($_POST['id'])) {
			return;
		}
		
		$components = self::components();
		
		$action = new Action ('delete', ['id' => $_POST['id']]);
		Plux::getDispatcher()->dispatch($action);
		
		self::render ('index.php', $components);
	}
}