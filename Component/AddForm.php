<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Component;

use \Plux\Plux;
use \Plux\Action;

class AddForm extends \Plux\Demo\Framework\Component {
	
	public function render () {
		?>
		<form method="POST" action="?add">
			<label>New item
				<input type="text" name="text" placeholder="New item" />
			</label>
		</form>
		<?php
	}
	
	public function getRoutes () {
		return ['/?add' => [$this, 'add'] ];
	}
	
	public function add () {
		if (!isset($_POST['text'])) {
			return;
		}
		$action = new Action ('add', ['text' => $_POST['text']]);
		Plux::getDispatcher()->dispatch($action);
	}
	
}